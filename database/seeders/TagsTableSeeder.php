<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
//use App\Models\User;
use App\Models\Tag;
use Log;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
$tags = DB::connection('mysqlold')->table('taxonomy_term_data')->where('vid',1)->get();


            foreach ($tags as $tag) {
                

                Tag::firstOrCreate(
                    [
                        'tid' => $tag->tid
                    ],
                    [
                        'name' => $tag->name,
                'description' => $tag->description,
                'tid' => $tag->tid
                
                    ]);
                
                ;
                
                
            }
        }


    }