<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Report;
use DB;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa relazioni da inalto';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Importazione relazioni");

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
 essenziale:
SELECT * FROM node JOIN field_revision_body on node.nid = field_revision_body.entity_id where field_revision_body.bundle ="relazioni" 

SELECT * FROM node JOIN field_revision_body on node.nid = field_revision_body.entity_id and field_revision_body.bundle = "relazioni" JOIN field_data_field_difficolt_ on node.nid = field_data_field_difficolt_.entity_id
 */

$reports = DB::connection('mysqlold')->table('node')->join('field_revision_body', function($q){
    $q->on('field_revision_body.entity_id','=','node.nid')->where('field_revision_body.bundle','=','relazioni');
})->join('field_data_field_difficolt_', function($q){
    $q->on('field_data_field_difficolt_.entity_id','=','node.nid');
})

->get();

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

            $r = new Report;

            $r->title = $value->title;
            $r->content = $value->body_value;
            $r->created_at = $value->created;
            $r->save();

            $this->info($value->title." ".$value->field_difficolt__value);

        }
        return 0;
    }
}
