<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class EventTestUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('event_test_user')->delete();
        
        
        
    }
}
