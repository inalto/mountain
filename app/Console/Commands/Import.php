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

        $reports = DB::connection('mysqlold')->table('node')->join('node_revisions', function($q){
        $q->on('node_revisions.nid','=','node.nid')->whereRaw('node_revisions.timestamp IN (select MAX(revs.timestamp) from node_revisions as revs where revs.nid = node.nid) '/* where (revs.nid=node.nid) )'*/);
        })->get();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('reports')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       // Report::truncate();

        foreach ($reports as $key => $value) {
            
            $r = new Report;

            $r->title = $value->title;
            $r->content = $value->body;
            $r->save();

            $this->info($value->title);

        }
        return 0;
    }
}
