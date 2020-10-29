<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	\DB::table('categories')->delete();
	\DB::table('categories')->insert(array (

	0 =>
	array (
	    'type' => 1,
	    'value' => 'Informatika',
	    'created_at' => '2020-10-29 23:00:00',
	    'updated_at' => '2020-10-29 23:00:00',
	),
	1 =>
	array (
     	    'type' => 2,
            'value' => 'Procedurálne programovanie',
   	    'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	2 =>
        array (
            'type' => 2,
            'value' => 'Jazyk C',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	3 =>
	array (
            'type' => 3,
            'value' => 'tretí',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	4 =>
        array (
            'type' => 4,
            'value' => '3A',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	5 =>
	array (
            'type' => 4,
	    'value' => '3B',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	6 =>
        array (
            'type' => 5,
            'value' => '#programovanie',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	7 =>
	array (
	    'type' => 5,
	    'value' => '#informatika',
	    'created_at' => '2020-10-29 23:00:00',
	    'updated_at' => '2020-10-29 23:00:00',
	),
	8 =>
        array (
            'type' => 5,
            'value' => '#3',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	9 =>
        array (
            'type' => 1,
            'value' => 'Informatika',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	10 =>
        array (
            'type' => 2,
            'value' => 'Procedurálne programovanie',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	11 =>
        array (
            'type' => 2,
            'value' => 'Knižnice',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	12 =>
        array (
            'type' => 3,
            'value' => 'štvrtý',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	13 =>
        array (
            'type' => 4,
            'value' => '4A',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
	),
	14 =>
        array (
            'type' => 5,
            'value' => '#programovanie',
            'created_at' => '2020-10-29 23:00:00',
            'updated_at' => '2020-10-29 23:00:00',
        ),


	));

    }
}
