<?php

use Illuminate\Database\Seeder;

class ActivityUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_unit')->insert([
            'id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 6
        ]);
        DB::table('activity_unit')->insert([
            'id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 7
        ]);
        DB::table('activity_unit')->insert([
            'id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 8
        ]);
        DB::table('activity_unit')->insert([
            'id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 9
        ]);
        DB::table('activity_unit')->insert([
            'id' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 10
        ]);
        DB::table('activity_unit')->insert([
            'id' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 11
        ]);
        DB::table('activity_unit')->insert([
            'id' => 7,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 12
        ]);
    }
}
