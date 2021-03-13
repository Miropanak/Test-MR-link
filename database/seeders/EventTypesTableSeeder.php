<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('event_types')->delete();
        
        \DB::table('event_types')->insert(array (
            0 => 
            array (
                'name' => 'Polytomická',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'name' => 'Dichotomická',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'name' => 'Doplňovacia',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'name' => 'Usporiadacia',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'name' => 'Priraďovacia',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'name' => 'Diktát',
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'name' => 'Bez odpovede',
                'created_at' => '2021-03-01 15:36:38',
                'updated_at' => '2021-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
