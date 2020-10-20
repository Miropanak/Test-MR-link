<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class ActivityUnitTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activity_unit')->delete();
        
        \DB::table('activity_unit')->insert(array (
            0 => 
            array (
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'activity_id' => 1,
                'unit_id' => 1,
                'unit_order_number' => 0,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'activity_id' => 1,
                'unit_id' => 2,
                'unit_order_number' => 1,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'activity_id' => 1,
                'unit_id' => 3,
                'unit_order_number' => 2,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'activity_id' => 1,
                'unit_id' => 4,
                'unit_order_number' => 3,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'activity_id' => 1,
                'unit_id' => 5,
                'unit_order_number' => 4,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'created_at' => '2020-03-01 15:36:40',
                'updated_at' => '2020-03-01 15:36:40',
                'activity_id' => 1,
                'unit_id' => 6,
                'unit_order_number' => 5,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'created_at' => '2020-03-01 15:36:40',
                'updated_at' => '2020-03-01 15:36:40',
                'activity_id' => 1,
                'unit_id' => 7,
                'unit_order_number' => 6,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'created_at' => '2020-03-04 19:54:41',
                'updated_at' => '2020-03-04 19:54:41',
                'activity_id' => 2,
                'unit_id' => 8,
                'unit_order_number' => 0,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'created_at' => '2020-03-04 20:00:54',
                'updated_at' => '2020-03-04 20:00:54',
                'activity_id' => 2,
                'unit_id' => 9,
                'unit_order_number' => 1,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
