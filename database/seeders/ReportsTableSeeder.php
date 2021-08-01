<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Report;
use Log;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::info('Seeding Reports');
        ray ('Seeding Reports');
        /*
            Query lista relazioni drupal

            SELECT node.created AS node_created, node.nid AS nid, 'relazioni_blocks:page_2' AS view_name
            FROM 
            {node} node
            LEFT JOIN {users} users_node ON node.uid = users_node.uid
            INNER JOIN {field_data_field_tipo_contenuto} field_data_field_tipo_contenuto ON node.nid = field_data_field_tipo_contenuto.entity_id AND (field_data_field_tipo_contenuto.entity_type = 'node' AND field_data_field_tipo_contenuto.deleted = '0')
            WHERE (( (node.status = '1') AND (field_data_field_tipo_contenuto.field_tipo_contenuto_tid = '1687') ))
            ORDER BY node_created DESC
            LIMIT 1 OFFSET 0
            */


            /*
            SELECT *,field_data_field_tipo_contenuto.* FROM node INNER JOIN field_data_field_tipo_contenuto ON node.nid = field_data_field_tipo_contenuto.entity_id AND (field_data_field_tipo_contenuto.entity_type = 'node' AND field_data_field_tipo_contenuto.deleted = '0') WHERE (( (node.type ="relazioni") AND (node.status = '1') AND (field_data_field_tipo_contenuto.field_tipo_contenuto_tid = '1687') )) ORDER BY `nid`  DESC
            
            essenziale:
            SELECT * FROM node JOIN field_revision_body on node.nid = field_revision_body.entity_id where field_revision_body.bundle ="relazioni" 

            SELECT * FROM node JOIN field_revision_body on node.nid = field_revision_body.entity_id and field_revision_body.bundle = "relazioni" JOIN field_data_field_difficolt_ on node.nid = field_data_field_difficolt_.entity_id
            */
/*
            $reports = DB::connection('mysqlold')->table('node')->where('type','relazioni')->where('status',1)->leftJoin('field_data_body', function($q){
                $q->on('field_data_body.entity_id','=','node.nid');
            })->leftJoin('field_data_field_difficolt_', function($q){
                $q->on('field_data_field_difficolt_.entity_id','=','node.nid');
            })->get();
*/

$reports = DB::connection('mysqlold')->table('node')->where('type','relazioni')->where('status',1)->leftJoin('field_data_body', function($q){
    $q->on('field_data_body.entity_id','=','node.nid');
     $q->where('field_data_body.language','=','it');
})->leftJoin('field_data_field_difficolt_', function($q){
    $q->on('field_data_field_difficolt_.entity_id','=','node.nid');
})->get();

            //        $reports = DB::connection('mysqlold')->table('node')->where('type','=','relazioni')->join('node_revisions', function($q){
            //        $q->on('node_revisions.nid','=','node.nid')->whereRaw('node_revisions.timestamp IN (select MAX(revs.timestamp) from node_revisions as revs where revs.nid = node.nid) '/* where (revs.nid=node.nid) )'*/);
            //        })->get();
            /*
            $reports = DB::connection('mysqlold')->table('node')->where('type','=','relazioni')->join('node_revisions', function($q){
                $q->on('node_revisions.nid','=','node.nid');
            })->get();
            */
            //dd($reports);
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('reports')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       // Report::truncate();

            foreach ($reports as $key => $value) {
                if (!User::where('id',$value->uid)->first()) continue;
ray ($value->title);
                $r = new Report;
                //$r = Report::firstOrNew(['id' =>  request('email')]);

                $r->title = $value->title;
                $r->slug = Str::slug($value->title);
                $r->content = $value->body_value;
                $r->excerpt = $value->body_summary;
                $r->owner_id = $value->uid;
                //$r->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');

                $r->created_at = $value->created;
                $r->save();
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
/*
                $covers = DB::connection('mysqlold')->table('field_data_field_copertina')->where('entity_id','=',$value->nid)->where('deleted','=',0)->join('files', function($q){
                    $q->on('field_data_field_copertina.field_copertina_fid','=','files.fid');
                })->get();
*/
$covers = DB::connection('mysqlold')->table('field_data_field_copertina')->where('entity_id','=',$value->nid)->where('deleted','=',0)->join('file_managed', function($q){
    $q->on('field_data_field_copertina.field_copertina_fid','=','file_managed.fid');
})->get();

                foreach($covers as $img ) {
                    $path='/home/inalto/public_html_old/sites/default/files/'.substr($img->uri,9);
                    if (!file_exists ( $path )) { Log::info('missing image->'.$path); continue; }
                    //Log::info('cover image->'.$path);                
                $r->addMedia($path)
                    ->preservingOriginal()
                    ->withResponsiveImages()
                    ->withCustomProperties([
                        'alt' => $img->field_copertina_alt,
                        'title' => $img->field_copertina_title
                        ])
                    ->toMediaCollection('photos');
                }
/*
                $images = DB::connection('mysqlold')->table('field_data_field_galleria_fotografica')->where('entity_id','=',$value->nid)->where('deleted','=',0)->join('files', function($q){
                    $q->on('field_data_field_galleria_fotografica.field_galleria_fotografica_fid','=','files.fid');
                })->get();
*/
                $images = DB::connection('mysqlold')->table('field_data_field_galleria_fotografica')->where('entity_id','=',$value->nid)->where('deleted','=',0)->join('file_managed', function($q){
                    $q->on('field_data_field_galleria_fotografica.field_galleria_fotografica_fid','=','file_managed.fid');
                })->get();

/*
                $images = DB::connection('mysqlold')->table('content_field_immagini')->where('nid','=',$value->nid)->join('files', function($q){
                    $q->on('content_field_immagini.field_immagini_fid','=','files.fid');
                })->toSql();
DB::connection('mysqlold')->table('field_data_field_galleria_fotografica')->where('entity_id','=',$value->nid)->join('files', function($q){$q->on('field_data_field_galleria_fotografica.field_galleria_fotografica_fid','=','files.fid');})->get()
                Log::info($images);
                */
                
                foreach($images as $img ) {
                    $path='/home/inalto/public_html_old/sites/default/files/'.substr($img->uri,9);
                    if (!file_exists ( $path )) { Log::info('missing image->'.$path); continue; }
  /*              
                    Log::info('image->/home/inalto/public_html_old/'.$img->filepath);
                    Log::info('name->'.$img->filename);
                    
                    Log::info('alt->'.$img->field_galleria_fotografica_alt);
                    Log::info('title->'.$img->field_galleria_fotografica_title);
                    Log::info('fid->'.$img->field_galleria_fotografica_fid);
                    Log::info('uid->'.$value->uid);
*/
//Log::info('image->'.$path);

$filename = pathinfo($path,8).".".$this->mime2ext($path);

                    $r->addMedia($path)
                    ->preservingOriginal()
                    ->withResponsiveImages()
                    ->usingFileName($filename)
                    ->withCustomProperties([
                        'alt' => $img->field_galleria_fotografica_alt,
                        'title' => $img->field_galleria_fotografica_title
                        ])
                    ->toMediaCollection('photos');
                }
                
            }
        }


        private function mime2ext($file) {
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