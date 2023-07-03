<?php

namespace App\Support\Inalto\Import;

use App\Models\HaveBeenThere as HaveBeenThere;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Str;

class HBT
{
    public static function import($o, $options)
    {
        extract($options);

        $o->writeln('start');
        $qry = DB::connection('mysqlold')->table('node')->where('type', 'ci_sono_stato')->where('status', 1);

        $qry->leftJoin('field_data_body', function ($q) {
            $q->on('field_data_body.entity_id', '=', 'node.nid');
            //    $q->where('field_data_body.language','=','it');
        });
        $qry->leftJoin('field_data_field_difficolt_', function ($q) {
            $q->on('field_data_field_difficolt_.entity_id', '=', 'node.nid');
        });
        $qry->leftJoin('field_data_field_tempo_di_salita', function ($q) {
            $q->on('field_data_field_tempo_di_salita.entity_id', '=', 'node.nid');
        });
        $qry->leftJoin('field_data_field_tempo_di_discesa', function ($q) {
            $q->on('field_data_field_tempo_di_discesa.entity_id', '=', 'node.nid');
        });
        $qry->leftJoin('field_data_field_data', function ($q) {
            $q->on('field_data_field_data.entity_id', '=', 'node.nid');
        });

        if ($new) {
            $start = HaveBeenThere::query()->orderBy('nid', 'desc')->first()->nid;
            $qry->where('node.nid', '>', $start);
        }

        if ($start_from) {
            $qry->where('node.nid', '>=', $start_from);
        }

        if ($nid) {
            $qry->where('node.nid', '=', $nid);
        }

        $qry->orderBy('node.nid');

        $reports = $qry->get();
        //  var_dump($reports);
        //echo $qry->toSql();
        $bar = $o->createProgressBar(count($reports));

        if (! $dry_run) {
            if ($truncate) {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                HaveBeenThere::all()->each->delete();
                DB::table('havebeentheres')->truncate();
                DB::table('media')->where('model_type', 'App\Models\HaveBeenThere')->delete();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
        }

        foreach ($reports as $key => $value) {

  //          $o->writeln("key->".$key);
            if (! User::where('id', $value->uid)->first()) {
                continue;
            }

            /*
            * Skip already imported node ids
            */
            if ($skip) {
                if (HaveBeenThere::where('nid', $value->nid)->get()->first()) {
                    $bar->advance();
                    continue;
                }
            }

            $hbt = HaveBeenThere::firstOrNew(['nid' => $value->nid]);

            /*
            * Skip approved
            */

            if ($hbt->approved) {
                $bar->advance();
                continue;
            }

            $hbt->title = $value->title;

            $hbt->slug = Str::slug($value->title);
            $hbt->content = $value->body_value;
            $hbt->nid = $value->nid;
            $hbt->owner_id = $value->uid;
            $hbt->difficulty = self::resolveDifficulty(intval($value->field_difficolt__value));

            if (! empty($value->field_tempo_di_salita_value)) {
                $hbt->time_a = Carbon::createFromFormat('H*i*', $value->field_tempo_di_salita_value)->toDateTimeString();
            }
            if (! empty($value->field_tempo_di_discesa_value)) {
                $hbt->time_r = Carbon::createFromFormat('H*i*', $value->field_tempo_di_discesa_value)->toDateTimeString();
            }
            ray($value->field_data_value);
            if (! empty($value->field_data_value)) {
                $hbt->time_r = Carbon::parse($value->field_data_value)->toDateTimeString();
            }

            $hbt->created_at = Carbon::createFromTimestamp($value->created)->format('Y-m-d H:i:s');
            $hbt->updated_at = Carbon::createFromTimestamp($value->changed)->format('Y-m-d H:i:s');

            if (! $dry_run) {
                $hbt->save();
            } else {
                $o->writeln('Title->'.$value->title);
                $o->writeln('uid->'.$value->uid);
            }

            /*
                Immagini
                SELECT * FROM inalto_d7.content_field_immagini join files on content_field_immagini.field_immagini_fid = files.fid where nid=468;

                field_data_field_galleria_fotografica.entity_id
                field_galleria_fotografica_alt
                field_galleria_fotografica_title

                $mediaItem = $newsItem
                                ->addMedia($pathToFile)
                                ->withCustomProperties(['mime-type' => 'image/jpeg'])
                                ->toMediaLibrary();

                */

            $covers = DB::connection('mysqlold')->table('field_data_field_copertina')
                ->where('entity_id', '=', $value->nid)
                ->where('deleted', '=', 0)
                ->join('file_managed', function ($q) {
                    $q->on('field_data_field_copertina.field_copertina_fid', '=', 'file_managed.fid');
                })->get();

            foreach ($covers as $img) {
                ray($img->uri);
                $path = '/home/inalto/public_html_old/sites/default/files/'.substr($img->uri, 9);
                if (! file_exists($path)) {
                    continue;
                }
                if (self::photo_exists($hbt->photos, $path)) {
                    continue;
                } else {
                    $hbt->addMedia($path)
                    ->preservingOriginal()
                    ->withResponsiveImages()
                    ->withCustomProperties([
                        'alt' => $img->field_copertina_alt,
                        'title' => $img->field_copertina_title,
                    ])
                    ->toMediaCollection('havebeenthere_photos');
                }
            }

            $images = DB::connection('mysqlold')->table('field_data_field_galleria_fotografica')->where('entity_id', '=', $value->nid)->where('deleted', '=', 0)->join('file_managed', function ($q) {
                $q->on('field_data_field_galleria_fotografica.field_galleria_fotografica_fid', '=', 'file_managed.fid');
            })->get();

            foreach ($images as $img) {
                $path = '/home/inalto/public_html_old/sites/default/files/'.substr($img->uri, 9);
                if (! file_exists($path)) {
                    echo 'missing '.$path."\n";
                    continue;
                }

                if (! self::photo_exists($hbt->photos, $path)) {
                    $filename = pathinfo($path, 8).'.'.self::mime2ext($path);
                    $hbt->addMedia($path)
                    ->preservingOriginal()
                    ->withResponsiveImages()
                    ->usingFileName($filename)
                    ->withCustomProperties([
                        'alt' => $img->field_galleria_fotografica_alt,
                        'title' => $img->field_galleria_fotografica_title,
                    ])
                    ->toMediaCollection('havebeenthere_photos');
                }
            }

            $bar->advance();
        }
    }

    public static function photo_exists($photos, $filename)
    {
        foreach ($photos as $photo) {
            if ($photo['name'] == pathinfo($filename, PATHINFO_FILENAME)) {
                return true;
            }
        }

        return false;
    }

    public static function resolveDifficulty($id)
    {
        $difficulty = [
            '1' => 'T1',
            '2' => 'T2',
            '3' => 'T3',
            '4' => 'T4',
            '5' => 'T5',
            '7' => 'F-',
            '8' => 'F',
            '9' => 'F+',
            '10' => 'PD-',
            '11' => 'PD',
            '12' => 'PD+',
            '13' => 'AD-',
            '14' => 'AD',
            '15' => 'AD+',
            '16' => 'D-',
            '17' => 'D',
            '18' => 'D+',
            '19' => 'TD-',
            '20' => 'TD',
            '21' => 'TD+',
            '22' => 'ED-',
            '23' => 'ED',
            '24' => 'ED+',
            '26' => 'WT1',
            '27' => 'WT2',
            '28' => 'WT3',
            '29' => 'WT4',
            '30' => 'WT5',
            '32' => 'MS',
            '33' => 'MSA',
            '34' => 'BS',
            '35' => 'BSA',
            '36' => 'OS',
            '37' => 'OSA',
        ];

        if (array_key_exists($id, $difficulty)) {
            return $difficulty[$id];
        }
    }

    private static function mime2ext($file)
    {
        $mime = mime_content_type($file);
        $mime_map = [
            'video/3gpp2' => '3g2',
            'video/3gp' => '3gp',
            'video/3gpp' => '3gp',
            'application/x-compressed' => '7zip',
            'audio/x-acc' => 'aac',
            'audio/ac3' => 'ac3',
            'application/postscript' => 'ai',
            'audio/x-aiff' => 'aif',
            'audio/aiff' => 'aif',
            'audio/x-au' => 'au',
            'video/x-msvideo' => 'avi',
            'video/msvideo' => 'avi',
            'video/avi' => 'avi',
            'application/x-troff-msvideo' => 'avi',
            'application/macbinary' => 'bin',
            'application/mac-binary' => 'bin',
            'application/x-binary' => 'bin',
            'application/x-macbinary' => 'bin',
            'image/bmp' => 'bmp',
            'image/x-bmp' => 'bmp',
            'image/x-bitmap' => 'bmp',
            'image/x-xbitmap' => 'bmp',
            'image/x-win-bitmap' => 'bmp',
            'image/x-windows-bmp' => 'bmp',
            'image/ms-bmp' => 'bmp',
            'image/x-ms-bmp' => 'bmp',
            'application/bmp' => 'bmp',
            'application/x-bmp' => 'bmp',
            'application/x-win-bitmap' => 'bmp',
            'application/cdr' => 'cdr',
            'application/coreldraw' => 'cdr',
            'application/x-cdr' => 'cdr',
            'application/x-coreldraw' => 'cdr',
            'image/cdr' => 'cdr',
            'image/x-cdr' => 'cdr',
            'zz-application/zz-winassoc-cdr' => 'cdr',
            'application/mac-compactpro' => 'cpt',
            'application/pkix-crl' => 'crl',
            'application/pkcs-crl' => 'crl',
            'application/x-x509-ca-cert' => 'crt',
            'application/pkix-cert' => 'crt',
            'text/css' => 'css',
            'text/x-comma-separated-values' => 'csv',
            'text/comma-separated-values' => 'csv',
            'application/vnd.msexcel' => 'csv',
            'application/x-director' => 'dcr',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
            'application/x-dvi' => 'dvi',
            'message/rfc822' => 'eml',
            'application/x-msdownload' => 'exe',
            'video/x-f4v' => 'f4v',
            'audio/x-flac' => 'flac',
            'video/x-flv' => 'flv',
            'image/gif' => 'gif',
            'application/gpg-keys' => 'gpg',
            'application/x-gtar' => 'gtar',
            'application/x-gzip' => 'gzip',
            'application/mac-binhex40' => 'hqx',
            'application/mac-binhex' => 'hqx',
            'application/x-binhex40' => 'hqx',
            'application/x-mac-binhex40' => 'hqx',
            'text/html' => 'html',
            'image/x-icon' => 'ico',
            'image/x-ico' => 'ico',
            'image/vnd.microsoft.icon' => 'ico',
            'text/calendar' => 'ics',
            'application/java-archive' => 'jar',
            'application/x-java-application' => 'jar',
            'application/x-jar' => 'jar',
            'image/jp2' => 'jp2',
            'video/mj2' => 'jp2',
            'image/jpx' => 'jp2',
            'image/jpm' => 'jp2',
            'image/jpeg' => 'jpg',
            'image/pjpeg' => 'jpg',
            'application/x-javascript' => 'js',
            'application/json' => 'json',
            'text/json' => 'json',
            'application/vnd.google-earth.kml+xml' => 'kml',
            'application/vnd.google-earth.kmz' => 'kmz',
            'text/x-log' => 'log',
            'audio/x-m4a' => 'm4a',
            'audio/mp4' => 'm4a',
            'application/vnd.mpegurl' => 'm4u',
            'audio/midi' => 'mid',
            'application/vnd.mif' => 'mif',
            'video/quicktime' => 'mov',
            'video/x-sgi-movie' => 'movie',
            'audio/mpeg' => 'mp3',
            'audio/mpg' => 'mp3',
            'audio/mpeg3' => 'mp3',
            'audio/mp3' => 'mp3',
            'video/mp4' => 'mp4',
            'video/mpeg' => 'mpeg',
            'application/oda' => 'oda',
            'audio/ogg' => 'ogg',
            'video/ogg' => 'ogg',
            'application/ogg' => 'ogg',
            'font/otf' => 'otf',
            'application/x-pkcs10' => 'p10',
            'application/pkcs10' => 'p10',
            'application/x-pkcs12' => 'p12',
            'application/x-pkcs7-signature' => 'p7a',
            'application/pkcs7-mime' => 'p7c',
            'application/x-pkcs7-mime' => 'p7c',
            'application/x-pkcs7-certreqresp' => 'p7r',
            'application/pkcs7-signature' => 'p7s',
            'application/pdf' => 'pdf',
            'application/octet-stream' => 'pdf',
            'application/x-x509-user-cert' => 'pem',
            'application/x-pem-file' => 'pem',
            'application/pgp' => 'pgp',
            'application/x-httpd-php' => 'php',
            'application/php' => 'php',
            'application/x-php' => 'php',
            'text/php' => 'php',
            'text/x-php' => 'php',
            'application/x-httpd-php-source' => 'php',
            'image/png' => 'png',
            'image/x-png' => 'png',
            'application/powerpoint' => 'ppt',
            'application/vnd.ms-powerpoint' => 'ppt',
            'application/vnd.ms-office' => 'ppt',
            'application/msword' => 'doc',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
            'application/x-photoshop' => 'psd',
            'image/vnd.adobe.photoshop' => 'psd',
            'audio/x-realaudio' => 'ra',
            'audio/x-pn-realaudio' => 'ram',
            'application/x-rar' => 'rar',
            'application/rar' => 'rar',
            'application/x-rar-compressed' => 'rar',
            'audio/x-pn-realaudio-plugin' => 'rpm',
            'application/x-pkcs7' => 'rsa',
            'text/rtf' => 'rtf',
            'text/richtext' => 'rtx',
            'video/vnd.rn-realvideo' => 'rv',
            'application/x-stuffit' => 'sit',
            'application/smil' => 'smil',
            'text/srt' => 'srt',
            'image/svg+xml' => 'svg',
            'application/x-shockwave-flash' => 'swf',
            'application/x-tar' => 'tar',
            'application/x-gzip-compressed' => 'tgz',
            'image/tiff' => 'tiff',
            'font/ttf' => 'ttf',
            'text/plain' => 'txt',
            'text/x-vcard' => 'vcf',
            'application/videolan' => 'vlc',
            'text/vtt' => 'vtt',
            'audio/x-wav' => 'wav',
            'audio/wave' => 'wav',
            'audio/wav' => 'wav',
            'application/wbxml' => 'wbxml',
            'video/webm' => 'webm',
            'image/webp' => 'webp',
            'audio/x-ms-wma' => 'wma',
            'application/wmlc' => 'wmlc',
            'video/x-ms-wmv' => 'wmv',
            'video/x-ms-asf' => 'wmv',
            'font/woff' => 'woff',
            'font/woff2' => 'woff2',
            'application/xhtml+xml' => 'xhtml',
            'application/excel' => 'xl',
            'application/msexcel' => 'xls',
            'application/x-msexcel' => 'xls',
            'application/x-ms-excel' => 'xls',
            'application/x-excel' => 'xls',
            'application/x-dos_ms_excel' => 'xls',
            'application/xls' => 'xls',
            'application/x-xls' => 'xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
            'application/vnd.ms-excel' => 'xlsx',
            'application/xml' => 'xml',
            'text/xml' => 'xml',
            'text/xsl' => 'xsl',
            'application/xspf+xml' => 'xspf',
            'application/x-compress' => 'z',
            'application/x-zip' => 'zip',
            'application/zip' => 'zip',
            'application/x-zip-compressed' => 'zip',
            'application/s-compressed' => 'zip',
            'multipart/x-zip' => 'zip',
            'text/x-scriptzsh' => 'zsh',
        ];

        return isset($mime_map[$mime]) ? $mime_map[$mime] : false;
    }
}
