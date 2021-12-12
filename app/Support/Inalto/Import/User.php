<?php

namespace App\Support\Inalto\Import;

use DB;
use Str;
use Log;
use App\Models\User as U;

use Carbon\Carbon;

use Spatie\MediaLibrary\MediaCollections\Models\Media;


class User
{




    public static function import($o,$uid=0,$truncate=false)
    {

        if ($truncate) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('users')->where('id','>',3)->delete();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
            Media::where('model_type','App\Models\User')->delete();
        }

        $query = DB::connection('mysqlold')->table('users');

        //
        $query->leftJoin('file_managed', function ($q) {
                        $q->on('users.picture', '=', 'file_managed.fid');
                        //    $q->where('field_data_body.language','=','it');
                    });

        $query->leftJoin('field_data_field_nome', function($q){$q->on('field_data_field_nome.entity_id','=','users.uid');});
        $query->leftJoin('field_data_field_cognome', function($q){$q->on('field_data_field_cognome.entity_id','=','users.uid');});
        $query->leftJoin('field_data_field_data_di_nascita', function($q){$q->on('field_data_field_data_di_nascita.entity_id','=','users.uid');});
        $query->leftJoin('field_data_field_bio', function($q){$q->on('field_data_field_bio.entity_id','=','users.uid');});
        $query->leftJoin('field_data_field_indirizzo', function($q){$q->on('field_data_field_indirizzo.entity_id','=','users.uid');});
        $query->leftJoin('field_data_field_cap', function($q){$q->on('field_data_field_cap.entity_id','=','users.uid');});
        $query->leftJoin('field_data_field_comune', function($q){$q->on('field_data_field_comune.entity_id','=','users.uid');});
        $query->leftJoin('field_data_field_nazione', function($q){$q->on('field_data_field_nazione.entity_id','=','users.uid');});
        $query->leftJoin('field_data_field_occupazione', function($q){$q->on('field_data_field_occupazione.entity_id','=','users.uid');});
        $query->leftJoin('field_data_field_interessi_personali', function($q){$q->on('field_data_field_interessi_personali.entity_id','=','users.uid');});

        $query->where('users.status','=',1);
        $query->select('users.uid','users.name','users.mail','users.pass','users.created','users.access',
        "field_nome_value",
        "field_nome_format",
        "field_cognome_value",
        "field_cognome_format",
        "field_data_di_nascita_value",
        "field_bio_value",
        "field_bio_format",
        "field_indirizzo_value",
        "field_indirizzo_format",
        "field_cap_value",
        "field_cap_format",
        "field_comune_value",
        "field_comune_format",
        "field_nazione_value",
        "field_nazione_format",
        "field_occupazione_value",
        "field_occupazione_format",
        "field_interessi_personali_value",
        "field_interessi_personali_format",
        'file_managed.uri'
    );
        if ($uid>0) {
            $query->where('users.uid','=',$uid);
        } else {
            $query->where('users.uid','>',3);
        }


        $users=$query->get();

        $bar= $o->createProgressBar(count($users));

        foreach ($users as $user) {

            ray($user);
            $u = U::firstOrNew([
                'id'=>$user->uid
            ]);
            $u->id = $user->uid;
            $u->email = $user->mail;
            $u->password = $user->pass;
            $u->name =$user->name;
            
            $u->first_name = ucwords(strtolower($user->field_nome_value));
            $u->last_name = ucwords(strtolower($user->field_cognome_value));
            $u->bio = $user->field_bio_value;
            $u->birth = $user->field_data_di_nascita_value;
            $u->address = $user->field_indirizzo_value;
            $u->zip = $user->field_cap_value;
            $u->city = ucwords(strtolower($user->field_comune_value));
            $u->country = ucwords(strtolower($user->field_nazione_value));
            $u->work = $user->field_occupazione_value;
            $u->interests = $user->field_interessi_personali_value;

            $u->created_at = Carbon::createFromTimestamp($user->created)->format('Y-m-d H:i:s');
            $u->updated_at = Carbon::createFromTimestamp($user->access)->format('Y-m-d H:i:s');
            $u->save();

            self::importAvatarImage($user,$u);
            $bar->advance();
        }

    }





    public static function importAvatarImage($uri,$u) {

        if (empty($user->uri)) {return;}

        $path = self::getAvatarImage($user->uri);

        if (empty($u->avatar)) {
                    
        $filename = pathinfo($path, 8) . "." . self::mime2ext($path);
        
        $u->addMedia($path)
            ->preservingOriginal()
            ->withResponsiveImages()
            ->usingFileName($filename)
            ->toMediaCollection('avatars');
        }
    }


    public static function getAvatarImage($uri) {
        return str_replace('public://','/home/inalto/public_html_old/sites/default/files/', $uri );    
    }

    private static function mime2ext($file) {
        $mime = mime_content_type($file);
        $mime_map = [
            'video/3gpp2'                                                               => '3g2',
            'video/3gp'                                                                 => '3gp',
            'video/3gpp'                                                                => '3gp',
            'application/x-compressed'                                                  => '7zip',
            'audio/x-acc'                                                               => 'aac',
            'audio/ac3'                                                                 => 'ac3',
            'application/postscript'                                                    => 'ai',
            'audio/x-aiff'                                                              => 'aif',
            'audio/aiff'                                                                => 'aif',
            'audio/x-au'                                                                => 'au',
            'video/x-msvideo'                                                           => 'avi',
            'video/msvideo'                                                             => 'avi',
            'video/avi'                                                                 => 'avi',
            'application/x-troff-msvideo'                                               => 'avi',
            'application/macbinary'                                                     => 'bin',
            'application/mac-binary'                                                    => 'bin',
            'application/x-binary'                                                      => 'bin',
            'application/x-macbinary'                                                   => 'bin',
            'image/bmp'                                                                 => 'bmp',
            'image/x-bmp'                                                               => 'bmp',
            'image/x-bitmap'                                                            => 'bmp',
            'image/x-xbitmap'                                                           => 'bmp',
            'image/x-win-bitmap'                                                        => 'bmp',
            'image/x-windows-bmp'                                                       => 'bmp',
            'image/ms-bmp'                                                              => 'bmp',
            'image/x-ms-bmp'                                                            => 'bmp',
            'application/bmp'                                                           => 'bmp',
            'application/x-bmp'                                                         => 'bmp',
            'application/x-win-bitmap'                                                  => 'bmp',
            'application/cdr'                                                           => 'cdr',
            'application/coreldraw'                                                     => 'cdr',
            'application/x-cdr'                                                         => 'cdr',
            'application/x-coreldraw'                                                   => 'cdr',
            'image/cdr'                                                                 => 'cdr',
            'image/x-cdr'                                                               => 'cdr',
            'zz-application/zz-winassoc-cdr'                                            => 'cdr',
            'application/mac-compactpro'                                                => 'cpt',
            'application/pkix-crl'                                                      => 'crl',
            'application/pkcs-crl'                                                      => 'crl',
            'application/x-x509-ca-cert'                                                => 'crt',
            'application/pkix-cert'                                                     => 'crt',
            'text/css'                                                                  => 'css',
            'text/x-comma-separated-values'                                             => 'csv',
            'text/comma-separated-values'                                               => 'csv',
            'application/vnd.msexcel'                                                   => 'csv',
            'application/x-director'                                                    => 'dcr',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'   => 'docx',
            'application/x-dvi'                                                         => 'dvi',
            'message/rfc822'                                                            => 'eml',
            'application/x-msdownload'                                                  => 'exe',
            'video/x-f4v'                                                               => 'f4v',
            'audio/x-flac'                                                              => 'flac',
            'video/x-flv'                                                               => 'flv',
            'image/gif'                                                                 => 'gif',
            'application/gpg-keys'                                                      => 'gpg',
            'application/x-gtar'                                                        => 'gtar',
            'application/x-gzip'                                                        => 'gzip',
            'application/mac-binhex40'                                                  => 'hqx',
            'application/mac-binhex'                                                    => 'hqx',
            'application/x-binhex40'                                                    => 'hqx',
            'application/x-mac-binhex40'                                                => 'hqx',
            'text/html'                                                                 => 'html',
            'image/x-icon'                                                              => 'ico',
            'image/x-ico'                                                               => 'ico',
            'image/vnd.microsoft.icon'                                                  => 'ico',
            'text/calendar'                                                             => 'ics',
            'application/java-archive'                                                  => 'jar',
            'application/x-java-application'                                            => 'jar',
            'application/x-jar'                                                         => 'jar',
            'image/jp2'                                                                 => 'jp2',
            'video/mj2'                                                                 => 'jp2',
            'image/jpx'                                                                 => 'jp2',
            'image/jpm'                                                                 => 'jp2',
            'image/jpeg'                                                                => 'jpeg',
            'image/pjpeg'                                                               => 'jpeg',
            'application/x-javascript'                                                  => 'js',
            'application/json'                                                          => 'json',
            'text/json'                                                                 => 'json',
            'application/vnd.google-earth.kml+xml'                                      => 'kml',
            'application/vnd.google-earth.kmz'                                          => 'kmz',
            'text/x-log'                                                                => 'log',
            'audio/x-m4a'                                                               => 'm4a',
            'audio/mp4'                                                                 => 'm4a',
            'application/vnd.mpegurl'                                                   => 'm4u',
            'audio/midi'                                                                => 'mid',
            'application/vnd.mif'                                                       => 'mif',
            'video/quicktime'                                                           => 'mov',
            'video/x-sgi-movie'                                                         => 'movie',
            'audio/mpeg'                                                                => 'mp3',
            'audio/mpg'                                                                 => 'mp3',
            'audio/mpeg3'                                                               => 'mp3',
            'audio/mp3'                                                                 => 'mp3',
            'video/mp4'                                                                 => 'mp4',
            'video/mpeg'                                                                => 'mpeg',
            'application/oda'                                                           => 'oda',
            'audio/ogg'                                                                 => 'ogg',
            'video/ogg'                                                                 => 'ogg',
            'application/ogg'                                                           => 'ogg',
            'font/otf'                                                                  => 'otf',
            'application/x-pkcs10'                                                      => 'p10',
            'application/pkcs10'                                                        => 'p10',
            'application/x-pkcs12'                                                      => 'p12',
            'application/x-pkcs7-signature'                                             => 'p7a',
            'application/pkcs7-mime'                                                    => 'p7c',
            'application/x-pkcs7-mime'                                                  => 'p7c',
            'application/x-pkcs7-certreqresp'                                           => 'p7r',
            'application/pkcs7-signature'                                               => 'p7s',
            'application/pdf'                                                           => 'pdf',
            'application/octet-stream'                                                  => 'pdf',
            'application/x-x509-user-cert'                                              => 'pem',
            'application/x-pem-file'                                                    => 'pem',
            'application/pgp'                                                           => 'pgp',
            'application/x-httpd-php'                                                   => 'php',
            'application/php'                                                           => 'php',
            'application/x-php'                                                         => 'php',
            'text/php'                                                                  => 'php',
            'text/x-php'                                                                => 'php',
            'application/x-httpd-php-source'                                            => 'php',
            'image/png'                                                                 => 'png',
            'image/x-png'                                                               => 'png',
            'application/powerpoint'                                                    => 'ppt',
            'application/vnd.ms-powerpoint'                                             => 'ppt',
            'application/vnd.ms-office'                                                 => 'ppt',
            'application/msword'                                                        => 'doc',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
            'application/x-photoshop'                                                   => 'psd',
            'image/vnd.adobe.photoshop'                                                 => 'psd',
            'audio/x-realaudio'                                                         => 'ra',
            'audio/x-pn-realaudio'                                                      => 'ram',
            'application/x-rar'                                                         => 'rar',
            'application/rar'                                                           => 'rar',
            'application/x-rar-compressed'                                              => 'rar',
            'audio/x-pn-realaudio-plugin'                                               => 'rpm',
            'application/x-pkcs7'                                                       => 'rsa',
            'text/rtf'                                                                  => 'rtf',
            'text/richtext'                                                             => 'rtx',
            'video/vnd.rn-realvideo'                                                    => 'rv',
            'application/x-stuffit'                                                     => 'sit',
            'application/smil'                                                          => 'smil',
            'text/srt'                                                                  => 'srt',
            'image/svg+xml'                                                             => 'svg',
            'application/x-shockwave-flash'                                             => 'swf',
            'application/x-tar'                                                         => 'tar',
            'application/x-gzip-compressed'                                             => 'tgz',
            'image/tiff'                                                                => 'tiff',
            'font/ttf'                                                                  => 'ttf',
            'text/plain'                                                                => 'txt',
            'text/x-vcard'                                                              => 'vcf',
            'application/videolan'                                                      => 'vlc',
            'text/vtt'                                                                  => 'vtt',
            'audio/x-wav'                                                               => 'wav',
            'audio/wave'                                                                => 'wav',
            'audio/wav'                                                                 => 'wav',
            'application/wbxml'                                                         => 'wbxml',
            'video/webm'                                                                => 'webm',
            'image/webp'                                                                => 'webp',
            'audio/x-ms-wma'                                                            => 'wma',
            'application/wmlc'                                                          => 'wmlc',
            'video/x-ms-wmv'                                                            => 'wmv',
            'video/x-ms-asf'                                                            => 'wmv',
            'font/woff'                                                                 => 'woff',
            'font/woff2'                                                                => 'woff2',
            'application/xhtml+xml'                                                     => 'xhtml',
            'application/excel'                                                         => 'xl',
            'application/msexcel'                                                       => 'xls',
            'application/x-msexcel'                                                     => 'xls',
            'application/x-ms-excel'                                                    => 'xls',
            'application/x-excel'                                                       => 'xls',
            'application/x-dos_ms_excel'                                                => 'xls',
            'application/xls'                                                           => 'xls',
            'application/x-xls'                                                         => 'xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'         => 'xlsx',
            'application/vnd.ms-excel'                                                  => 'xlsx',
            'application/xml'                                                           => 'xml',
            'text/xml'                                                                  => 'xml',
            'text/xsl'                                                                  => 'xsl',
            'application/xspf+xml'                                                      => 'xspf',
            'application/x-compress'                                                    => 'z',
            'application/x-zip'                                                         => 'zip',
            'application/zip'                                                           => 'zip',
            'application/x-zip-compressed'                                              => 'zip',
            'application/s-compressed'                                                  => 'zip',
            'multipart/x-zip'                                                           => 'zip',
            'text/x-scriptzsh'                                                          => 'zsh',
        ];
    
        return isset($mime_map[$mime]) ? $mime_map[$mime] : false;
    }


}