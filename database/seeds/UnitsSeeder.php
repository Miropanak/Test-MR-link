<?php

/**
 * Created by Bernad on 11/6/2017.
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('units')->insert([
//            'id' => 1,
            'title' => "Prednáška 1: Vhľad do objektovo-orientovaného programovania",
            'description' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
//            'id' => 2,
            'title' => "Prednáška 2: Polymorfizmus a objektovo-orientovaná modularizácia",
            'description' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
//            'id' => 3,
            'title' => "Prednáška 3: Návrhové vzory",
            'description' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
//            'id' => 4,
            'title' => "Prednáška 4: Grafické používateľské rozhranie a jeho oddelenie od aplikačnej logiky",
            'description' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
//            'id' => 5,
            'title' => "Prednáška 5: Štruktúrované typy údajov, generickosť a perzistencia",
            'description' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
//            'id' => 6,
            'title' => "Prednáška 6: Paralelné spracovanie, robustnosť programu a reflexia",
            'description' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
//            'id' => 7,
            'title' => "Prednáška 7: Kvalitný objektovo-orientovaný návrh",
            'description' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


    }
}
