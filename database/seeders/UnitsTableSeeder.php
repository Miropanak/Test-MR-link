<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('units')->delete();
        
        \DB::table('units')->insert(array (
            0 => 
            array (
                'title' => 'Prednáška 1: Vhľad do objektovo-orientovaného programovania',
                'description' => '',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 1,
            ),
            1 => 
            array (
                'title' => 'Prednáška 2: Polymorfizmus a objektovo-orientovaná modularizácia',
                'description' => '',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 1,
            ),
            2 => 
            array (
                'title' => 'Prednáška 3: Návrhové vzory',
                'description' => '',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 1,
            ),
            3 => 
            array (
                'title' => 'Prednáška 4: Grafické používateľské rozhranie a jeho oddelenie od aplikačnej logiky',
                'description' => '',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 1,
            ),
            4 => 
            array (
                'title' => 'Prednáška 5: Štruktúrované typy údajov, generickosť a perzistencia',
                'description' => '',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 1,
            ),
            5 => 
            array (
                'title' => 'Prednáška 6: Paralelné spracovanie, robustnosť programu a reflexia',
                'description' => '',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 1,
            ),
            6 => 
            array (
                'title' => 'Prednáška 7: Kvalitný objektovo-orientovaný návrh',
                'description' => '',
                'created_at' => '2020-03-01 15:36:39',
                'updated_at' => '2020-03-01 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 1,
            ),
            7 => 
            array (
                'title' => 'Aritmetické výrazy',
                'description' => 'Aritmetické výrazy v jazyku C',
                'created_at' => '2020-03-04 19:54:41',
                'updated_at' => '2020-03-04 19:54:41',
                'deleted_at' => NULL,
                'author_id' => 6,
            ),
            8 => 
            array (
                'title' => 'Terminálový vstup a výstup',
                'description' => 'Terminálový vstup a výstup v jazyku C',
                'created_at' => '2020-03-04 20:00:54',
                'updated_at' => '2020-03-04 20:00:54',
                'deleted_at' => NULL,
                'author_id' => 6,
            ),
        ));
        
        
    }
}
