<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tests')->delete();
        
        
        
    }
}