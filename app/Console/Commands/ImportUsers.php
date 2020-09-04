<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Report;
use DB;

class ImportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:importusers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa utenti da inalto';

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
        $this->info("Importazione utenti");

        $users = DB::connection('mysqlold')->table('users')->leftJoin('field_data_field_nazione', function($q){
            $q->on('field_data_field_nazione.entity_id','=','users.uid');
        })->leftJoin('field_data_field_nome', function($q){
            $q->on('field_data_field_nome.entity_id','=','users.uid');
        })->leftJoin('field_data_field_cognome', function($q){
            $q->on('field_data_field_cognome.entity_id','=','users.uid');
        })->where('users.uid','>',1)->get();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->where('id','>',1)->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       // Report::truncate();
//dd($users);
        foreach ($users as $key => $value) {

            if (!User::where('email',$value->mail)->first()) {
            //$u = User::firstOrNew(['email'=>$value->mail]);
            $u = new User();
            $u->id = $value->uid;
            $u->email = $value->mail;
            $u->verified = $value->status;
            $u->name = ucwords(strtolower($value->field_nome_value));
            $u->last_name = ucwords(strtolower($value->field_cognome_value));
            $u->save();

            $this->info($value->mail." ".$value->field_nome_value." ".$value->field_cognome_value);
            }

        }

        /*
        SELECT * FROM `users` LEFT JOIN field_data_field_nazione on users.uid = field_data_field_nazione.entity_id
        */
       
        return 0;
    }
}
