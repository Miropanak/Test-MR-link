<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	\DB::table('organizations')->delete();
	\DB::table('organizations')->insert(array (
	
	0 =>
	array (
	    'name' => 'Fakulta informatiky a informačných technológií Slovenskej technickej univerzity',
	    'created_at' => '2020-11-07 17:00:00',
	    'updated_at' => '2020-11-07 17:00:00',
	),
	1 =>
	array (
	    'name' => 'Fakulta matematiky, fyziky a informatiky (Univerzita Komenského)',
	    'created_at' => '2020-11-07 17:00:00',
	    'updated_at' => '2020-11-07 17:00:00',
	),
	2 =>
	array (
	    'name' => 'Evanjelické gymnázium Tisovec',
	    'created_at' => '2021-03-23 17:00:00',
	    'updated_at' => '2021-03-23 17:00:00',
	),
	));
    }
}
