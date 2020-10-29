<?php

use Illuminate\Database\Seeder;

class EventCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	\DB::table('event_categories')->delete();
        \DB::table('event_categories')->insert(array (
	
	0 =>
        array (
	    'event_id' => 74,
	    'category_id' => 1,
	    'created_at' => '2020-10-30 00:30:39',
	    'updated_at' => '2020-10-30 00:30:39',
	),
	1 =>
        array (
            'event_id' => 74,
            'category_id' => 2,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	2 =>
        array (
            'event_id' => 74,
            'category_id' => 3,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	3 =>
        array (
            'event_id' => 74,
            'category_id' => 4,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	4 =>
        array (
            'event_id' => 74,
            'category_id' => 5,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	5 =>
        array (
            'event_id' => 74,
            'category_id' => 6,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	6 =>
        array (
            'event_id' => 74,
            'category_id' => 7,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	7 =>
        array (
            'event_id' => 74,
            'category_id' => 8,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	8 =>
        array (
            'event_id' => 74,
            'category_id' => 9,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	9 =>
        array (
            'event_id' => 78,
            'category_id' => 10,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	10 =>
        array (
            'event_id' => 78,
            'category_id' => 11,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	11 =>
        array (
            'event_id' => 78,
            'category_id' => 12,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	12 =>
        array (
            'event_id' => 78,
            'category_id' => 13,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	13 =>
        array (
            'event_id' => 78,
            'category_id' => 14,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),
	14 =>
        array (
            'event_id' => 78,
            'category_id' => 15,
            'created_at' => '2020-10-30 00:30:39',
            'updated_at' => '2020-10-30 00:30:39',
	),

    ));

    }
}
