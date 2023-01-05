<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2021-12-25 14:07:19',
                'updated_at' => '2021-12-25 14:07:19',
                'deleted_at' => NULL,
                '_lft' => 1,
                '_rgt' => 2,
                'parent_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2022-05-03 13:10:26',
                'updated_at' => '2022-05-03 13:10:26',
                'deleted_at' => NULL,
                '_lft' => 3,
                '_rgt' => 4,
                'parent_id' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => '2022-06-05 11:03:50',
                'updated_at' => '2022-06-05 11:03:50',
                'deleted_at' => NULL,
                '_lft' => 5,
                '_rgt' => 6,
                'parent_id' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => '2022-08-21 18:22:36',
                'updated_at' => '2022-08-21 18:22:36',
                'deleted_at' => NULL,
                '_lft' => 7,
                '_rgt' => 8,
                'parent_id' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'created_at' => '2022-08-21 18:23:18',
                'updated_at' => '2022-08-21 18:23:18',
                'deleted_at' => NULL,
                '_lft' => 9,
                '_rgt' => 10,
                'parent_id' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'created_at' => '2022-09-02 17:30:56',
                'updated_at' => '2022-09-02 17:30:56',
                'deleted_at' => NULL,
                '_lft' => 11,
                '_rgt' => 12,
                'parent_id' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'created_at' => '2022-09-26 16:54:55',
                'updated_at' => '2022-09-26 16:54:55',
                'deleted_at' => NULL,
                '_lft' => 13,
                '_rgt' => 14,
                'parent_id' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'created_at' => '2022-09-26 16:55:40',
                'updated_at' => '2022-09-26 16:55:40',
                'deleted_at' => NULL,
                '_lft' => 15,
                '_rgt' => 16,
                'parent_id' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'created_at' => '2022-10-16 07:41:46',
                'updated_at' => '2022-10-16 07:41:46',
                'deleted_at' => NULL,
                '_lft' => 17,
                '_rgt' => 18,
                'parent_id' => NULL,
            ),
        ));
        
        
    }
}