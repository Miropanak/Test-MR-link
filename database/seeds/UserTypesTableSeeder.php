<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_types')->delete();
        
        \DB::table('user_types')->insert(array (
            0 => 
            array (
                'name' => 'anonym',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'name' => 'student',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'name' => 'autor',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'name' => 'ucitel',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'name' => 'komisar',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'name' => 'administrator',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}