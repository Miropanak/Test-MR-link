<?php

/**
 * Created by Bernad on 11/6/2017.
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ActivityUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		DB::table('activity_users')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 1,
            'activity_id' => 1,
            'user_type_id' => 5,
        ]);

    }
}
