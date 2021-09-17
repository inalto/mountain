<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Poi;
use Log;
use Swift_Plugins_Loggers_EchoLogger;

class PoiUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:poi_update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncronize old inalto reports';

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

        $pois = DB::connection('mysqlold')->table('node')->where('type','scheda')->where('status',1)
        ->leftJoin('field_data_body', function($q){
            $q->on('field_data_body.entity_id','=','node.nid');
        //    $q->where('field_data_body.language','=','it');
        })
    //    ->leftJoin('field_data_field_difficolt_', function($q){$q->on('field_data_field_difficolt_.entity_id','=','node.nid');})
    //    ->leftJoin('field_data_field_tempo_di_salita', function($q){$q->on('field_data_field_tempo_di_salita.entity_id','=','node.nid');})
    //    ->leftJoin('field_data_field_tempo_di_discesa', function($q){$q->on('field_data_field_tempo_di_discesa.entity_id','=','node.nid');})
    //    ->leftJoin('field_data_field_lunghezza', function($q){$q->on('field_data_field_lunghezza.entity_id','=','node.nid');})
    //    ->leftJoin('field_data_field_quota_di_partenza', function($q){$q->on('field_data_field_quota_di_partenza.entity_id','=','node.nid');})
        ->leftJoin('field_data_field_altitudine', function($q){$q->on('field_data_field_altitudine.entity_id','=','node.nid');})
    //    ->leftJoin('field_data_field_dislivello', function($q){$q->on('field_data_field_dislivello.entity_id','=','node.nid');})
        ->get();

        foreach ($pois as $key => $value) {
            if (!User::where('id',$value->uid)->first()) continue;

            $p = Poi::firstOrNew(['nid' =>  $value->nid]);
            
            echo $value->title ." ->".$value->nid."\n";

            if ($p->translate('it')) {
            //echo $p->translate('it')->name ." ->".$p->nid."\n";
                if (empty($p->translate('it')->name)) {
                    $p->translate('it')->name = $value->title;
                } 
            } else {
              
                $p->translateOrNew('it')->name = $value->title;
                $p->translateOrNew('it')->slug = Str::slug($value->title);
                $p->translateOrNew('it')->content = $p->translateOrNew('it')->content ."<!--".$p->language."-->". $value->body_value;
                $p->translateOrNew('it')->excerpt = $p->translateOrNew('it')->excerpt ."<!--".$p->language."-->". $value->body_summary;

                $p->height = intval($value->field_altitudine_value);
                $p->nid = $value->nid;
                $p->owner_id = $value->uid;
                
                $p->save();
            }
        }

        return 0;
    }
}
