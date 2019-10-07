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
            'id' => 6,
            'title' => "Prednáška 1: Vhľad do objektovo-orientovaného programovania",
            'description' => "",
            'id_activities' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
            'id' => 7,
            'title' => "Prednáška 2: Polymorfizmus a objektovo-orientovaná modularizácia",
            'description' => "",
            'id_activities' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
            'id' => 8,
            'title' => "Prednáška 3: Návrhové vzory",
            'description' => "",
            'id_activities' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
            'id' => 9,
            'title' => "Prednáška 4: Grafické používateľské rozhranie a jeho oddelenie od aplikačnej logiky",
            'description' => "",
            'id_activities' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
            'id' => 10,
            'title' => "Prednáška 5: Štruktúrované typy údajov, generickosť a perzistencia",
            'description' => "",
            'id_activities' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
            'id' => 11,
            'title' => "Prednáška 6: Paralelné spracovanie, robustnosť programu a reflexia",
            'description' => "",
            'id_activities' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('units')->insert([
            'id' => 12,
            'title' => "Prednáška 7: Kvalitný objektovo-orientovaný návrh",
            'description' => "",
            'id_activities' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


    }
}
