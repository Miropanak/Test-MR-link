<?php

/**
 * Created by Bernad on 11/6/2017.
 */

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StudyFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_fields')->insert([
            'code' => "UISI344",
            'name' => "AOVS",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('study_fields')->insert([
            'code' => "UISI654",
            'name' => "MAM",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('study_fields')->insert([
            'code' => "UISI568",
            'name' => "DEŠ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
