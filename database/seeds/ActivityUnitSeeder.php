<?php

use Carbon\Carbon;
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
//            'id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 1,
            'unit_order_number' => 0
        ]);
        DB::table('activity_unit')->insert([
//            'id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 2,
            'unit_order_number' => 1,
        ]);
        DB::table('activity_unit')->insert([
//            'id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 3,
            'unit_order_number' => 2,
        ]);
        DB::table('activity_unit')->insert([
//            'id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 4,
            'unit_order_number' => 3,
        ]);
        DB::table('activity_unit')->insert([
//            'id' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 5,
            'unit_order_number' => 4,
        ]);
        DB::table('activity_unit')->insert([
//            'id' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 6,
            'unit_order_number' => 5,
        ]);
        DB::table('activity_unit')->insert([
//            'id' => 7,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'activity_id' => 1,
            'unit_id' => 7,
            'unit_order_number' => 6,
        ]);
    }
}
