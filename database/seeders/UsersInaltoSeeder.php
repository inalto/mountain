<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersInaltoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            $u->password = $value->pass;
            $u->name =$value->name;
            //$u->verified = $value->status;
            
            $u->first_name = ucwords(strtolower($value->field_nome_value));
            $u->last_name = ucwords(strtolower($value->field_cognome_value));
            $u->save();

            
            }

        }
    }
}
