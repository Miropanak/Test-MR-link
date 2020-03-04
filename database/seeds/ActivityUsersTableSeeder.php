<?php

use Illuminate\Database\Seeder;

class ActivityUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activity_users')->delete();
        
        \DB::table('activity_users')->insert(array (
            0 => 
            array (
                'activity_id' => 1,
                'subscriber_id' => 1,
                'user_type_id' => 5,
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}