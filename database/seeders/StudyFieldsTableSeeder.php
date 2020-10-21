<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class StudyFieldsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('study_fields')->delete();
        
        \DB::table('study_fields')->insert(array (
            0 => 
            array (
                'code' => 'UISI568',
                'name' => 'GYM',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'code' => 'UISI568',
                'name' => 'DEŠ',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
