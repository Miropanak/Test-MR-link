<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class MixedSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

         #$users = \DB::table('users')->select('id')->orderBy('id', 'desc')->take(1);
         #echo $users;
        \DB::table('events')->insert(array (
            array (
                'message' => 'Úloha 1',
                'header' => 'Napíšte text podľa predlohy (časť. 1). ',
                'time_to_explain' => 0,
                'time_to_handle' => 5,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            ),             
        ));
        
        $event_id=\DB::getPDO() -> lastInsertId();
        
        \DB::table('activities')->insert(array (
            array (
                'title' => 'Informatika',
                'content' => 'Tento predmet sa zaoberá učením informatiky na strednej škole',
                'public' => true,
                'validated' => false,
                'study_field_id' => 1,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 6,
            ),
        ));
        
        $activity_id=\DB::getPDO() -> lastInsertId();
        
        \DB::table('units')->insert(array (
            array (
                'title' => 'Prednáška 1: základy MS word',
                'description' => '',
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 6,
            ),
        ));
        
        $unit_id=\DB::getPDO() -> lastInsertId();
        
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
        ));
        
        \DB::table('activity_unit')->insert(array (
            array (
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'activity_id' => $activity_id,
                'unit_id' => $unit_id,
                'unit_order_number' => 0,
                'deleted_at' => NULL,
            ),
        ));         
            
    }
}