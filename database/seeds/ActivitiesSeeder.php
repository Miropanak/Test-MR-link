<?php

/**
 * Created by Bernad on 11/6/2017.
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('activities')->insert([
		    'id' => 1,
            'title' => "Objektovo orientované programovanie",
            'content' => "Tento predmet sa zaoberá programovaním založeným na objektoch",
            'public' => true,
            'validated' => true,
            'study_field_id' => 1,
            'id_author' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
