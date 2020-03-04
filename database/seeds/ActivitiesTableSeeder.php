<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activities')->delete();
        
        \DB::table('activities')->insert(array (
            0 => 
            array (
                'title' => 'Objektovo orientované programovanie',
                'content' => 'Tento predmet sa zaoberá programovaním založeným na objektoch',
                'public' => true,
                'validated' => true,
                'study_field_id' => 1,
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 2,
            ),
            1 => 
            array (
                'title' => 'Programovanie v jazyku C',
                'content' => '<p>Základy programovania v jazyku C</p>',
                'public' => false,
                'validated' => true,
                'study_field_id' => 1,
                'created_at' => '2020-03-04 19:52:52',
                'updated_at' => '2020-03-04 19:52:52',
                'deleted_at' => NULL,
                'author_id' => 6,
            ),
        ));
        
        
    }
}