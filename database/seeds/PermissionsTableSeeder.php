<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'name' => 'register',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'name' => 'read_site',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'name' => 'be_added',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'name' => 'create_event',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'name' => 'be_tested',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'name' => 'view_material',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'name' => 'add_material',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'name' => 'rate_material',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'name' => 'rate_activity',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'name' => 'create_activity',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'name' => 'create_unit',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'name' => 'edit_his_activity',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'name' => 'edit_his_unit',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'name' => 'delete_his_activity',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'name' => 'delete_his_unit',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'name' => 'delete_his_unvalidated_event',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'name' => 'add_student',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'name' => 'view_activity_statistic',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'name' => 'view_activity_students_statistic',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'name' => 'delete_material',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'name' => 'validate_event',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}