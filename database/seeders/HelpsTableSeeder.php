<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class HelpsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('helps')->delete();
        
        \DB::table('helps')->insert(array (
            0 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 29, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 73,
                'created_at' => '2020-03-04 19:32:16',
                'updated_at' => '2020-03-04 19:32:16',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 35 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 73,
                'created_at' => '2020-03-04 19:32:16',
                'updated_at' => '2020-03-04 19:32:16',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 29, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 74,
                'created_at' => '2020-03-04 19:33:18',
                'updated_at' => '2020-03-04 19:33:18',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 35 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 74,
                'created_at' => '2020-03-04 19:33:18',
                'updated_at' => '2020-03-04 19:33:18',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 36 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 75,
                'created_at' => '2020-03-04 19:35:08',
                'updated_at' => '2020-03-04 19:35:08',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 30, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 75,
                'created_at' => '2020-03-04 19:35:08',
                'updated_at' => '2020-03-04 19:35:08',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 36 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 76,
                'created_at' => '2020-03-04 19:36:56',
                'updated_at' => '2020-03-04 19:36:56',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 30, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 76,
                'created_at' => '2020-03-04 19:36:56',
                'updated_at' => '2020-03-04 19:36:56',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 30, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 77,
                'created_at' => '2020-03-04 19:39:10',
                'updated_at' => '2020-03-04 19:39:10',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 36 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 77,
                'created_at' => '2020-03-04 19:39:10',
                'updated_at' => '2020-03-04 19:39:10',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 33, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 78,
                'created_at' => '2020-03-04 19:43:50',
                'updated_at' => '2020-03-04 19:43:50',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 39 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 78,
                'created_at' => '2020-03-04 19:43:50',
                'updated_at' => '2020-03-04 19:43:50',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 33, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 79,
                'created_at' => '2020-03-04 19:46:57',
                'updated_at' => '2020-03-04 19:46:57',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 39 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 79,
                'created_at' => '2020-03-04 19:46:57',
                'updated_at' => '2020-03-04 19:46:57',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 17, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 80,
                'created_at' => '2020-03-04 19:48:04',
                'updated_at' => '2020-03-04 19:48:04',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 23 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 80,
                'created_at' => '2020-03-04 19:48:04',
                'updated_at' => '2020-03-04 19:48:04',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 33, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 81,
                'created_at' => '2020-03-04 19:49:21',
                'updated_at' => '2020-03-04 19:49:21',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 39 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 81,
                'created_at' => '2020-03-04 19:49:21',
                'updated_at' => '2020-03-04 19:49:21',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 34, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 82,
                'created_at' => '2020-03-04 19:50:59',
                'updated_at' => '2020-03-04 19:50:59',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 40 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 82,
                'created_at' => '2020-03-04 19:50:59',
                'updated_at' => '2020-03-04 19:50:59',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 30, Učebnice jazyka C, Pavel Herout (III. upravené vydanie), 1994',
                'event_id' => 83,
                'created_at' => '2020-03-04 19:59:54',
                'updated_at' => '2020-03-04 19:59:54',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'name' => 'Učebnice jazyka C',
            'url' => 'str. 36 Učebnice jazyka C, Pavel Herout (VI. upravené vydanie), 2009',
                'event_id' => 83,
                'created_at' => '2020-03-04 19:59:54',
                'updated_at' => '2020-03-04 19:59:54',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
