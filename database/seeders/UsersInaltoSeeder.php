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
        $users = DB::connection('mysqlold')->table('users')
          ->leftJoin('field_data_field_nome', function($q){$q->on('field_data_field_nome.entity_id','=','users.uid');})
          ->leftJoin('field_data_field_cognome', function($q){$q->on('field_data_field_cognome.entity_id','=','users.uid');})
          ->leftJoin('field_data_field_data_di_nascita', function($q){$q->on('field_data_field_data_di_nascita.entity_id','=','users.uid');})
          ->leftJoin('field_data_field_bio', function($q){$q->on('field_data_field_bio.entity_id','=','users.uid');})
          ->leftJoin('field_data_field_indirizzo', function($q){$q->on('field_data_field_indirizzo.entity_id','=','users.uid');})
          ->leftJoin('field_data_field_cap', function($q){$q->on('field_data_field_cap.entity_id','=','users.uid');})
          ->leftJoin('field_data_field_comune', function($q){$q->on('field_data_field_comune.entity_id','=','users.uid');})
          ->leftJoin('field_data_field_nazione', function($q){$q->on('field_data_field_nazione.entity_id','=','users.uid');})
          ->leftJoin('field_data_field_occupazione', function($q){$q->on('field_data_field_occupazione.entity_id','=','users.uid');})
          ->leftJoin('field_data_field_interessi_personali', function($q){$q->on('field_data_field_interessi_personali.entity_id','=','users.uid');})
          ->where('users.uid','>',1)->get();

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
            $u->bio = $value->field_bio_value;
            $u->birth = $value->field_data_di_nascita_value;
            $u->address = $value->field_indirizzo_value;
            $u->zip = $value->field_cap_value;
            $u->city = ucwords(strtolower($value->field_comune_value));
            $u->country = ucwords(strtolower($value->field_nazione_value));
            $u->work = $value->field_occupazione_value;
            $u->interests = $value->field_interessi_personali_value;
            $u->save();

            
            }

        }
    }
}
