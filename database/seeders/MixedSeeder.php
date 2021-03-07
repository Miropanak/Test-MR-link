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
                'message' => 'link na predlohu',
                'header' => 'Napíšte text podľa predlohy. ',
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

        \DB::table('events')->insert(array (
            array (
                'message' => 'Nadpis „Dvojsýtne kyseliny“ napíšte písmom Verdana, veľkosťou  16 bodov, farba písma modrá, tučné, podčiarknuté jednoduchou čiarou (farbou písma), medzery medzi znakmi sú rozšírené o 3 body.',
                'header' => 'Naformátuj nadpis podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 2,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )                            
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => '',
                'header' => 'V texte je použitý symbol európskej menovej jednotky €.',
                'time_to_explain' => 1,
                'time_to_handle' => 1,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => '',
                'header' => 'V texte je použitý dolný aj horný index.',
                'time_to_explain' => 1,
                'time_to_handle' => 1,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Podnadpisy „Kyselina sírová“ a „Kyselina uhličitá“ napíšte písmom Verdana, veľkosť 12 bodov, tučne. ',
                'header' => 'Naformátuj podnadpisy časti 1 podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 2,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            ),             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Ostatný text napíšte písmom Verdana, veľkosťou 11 bodov. Vzorce kyselín napíšte kurzívou.',
                'header' => 'Naformátuj text časti 1 podľa zadania',
                'time_to_explain' => 1,
                'time_to_handle' => 2,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            ),
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Podnadpisy „Kyselina sírová“ a „Kyselina uhličitá“ napíšte písmom Verdana, veľkosťou 14 bodov, tučne. Štýl písma – Obrys, mierka 130%. ',
                'header' => 'Naformátuj podnadpisy časti 2 podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
            
        \DB::table('events')->insert(array (
            array (
                'message' => 'Ostatný text napíšte písmom Verdana, veľkosťou 11 bodov, podčiarknuté (podčiarknite len slová). ',
                'header' => 'Naformátuj text časti 2 podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )              
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));

        \DB::table('events')->insert(array (
            array (
                'message' => 'Podnadpisy „Kyselina sírová“ a „Kyselina uhličitá“ napíšte písmom Verdana, veľkosťou 14 bodov, farba písma červená, podčiarknuté dvojitou čarou (farbou písma). Štýl písma – Kapitálky. ',
                'header' => 'Naformátuj podnadpisy časti 3 podľa zadania',
                'time_to_explain' => 3,
                'time_to_handle' => 4,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));        
            
        \DB::table('events')->insert(array (
            array (
                'message' => 'Text o kyseline sírovej napíšte písmom Times New Roman, veľkosťou 11 bodov. Štýl písma – Všetky veľké. Text „dvojsýtna kyselina“ je umiestnený o 3 body vyššie. ',
                'header' => 'Naformátuj časť textu časti 3 podľa zadania.',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )              
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));    
            
        \DB::table('events')->insert(array (
            array (
                'message' => 'Text o kyseline uhličité napíšte písmom Courier New, veľkosťou 11 bodov. Štýl písma – Všetky veľké. Text „je H2CO3“ je umiestnený o 3 body nižšie.',
                'header' => 'Naformátuj časť text časti 3 podľa zadania.',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));

        \DB::table('events')->insert(array (
            array (
                'message' => '',
                'header' => 'Text upravte tak, aby sa zmestil akurát na jednu stranu.',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        #zadanie2
        \DB::table('units')->insert(array (
            array (
                'title' => 'Prednáška 2: pokračovanie v MS word',
                'description' => 'zarovnávanie, riadkovanie, odsadzovanie',
                'created_at' => '2021-03-06 12:36:39',
                'updated_at' => '2021-03-06 12:36:39',
                'deleted_at' => NULL,
                'author_id' => 6,
            ),
        ));
        
        $unit_id=\DB::getPDO() -> lastInsertId();     
        
        \DB::table('activity_unit')->insert(array (
            array (
                'created_at' => '2021-06-01 12:36:39',
                'updated_at' => '2021-06-01 12:36:39',
                'activity_id' => $activity_id,
                'unit_id' => $unit_id,
                'unit_order_number' => 0,
                'deleted_at' => NULL,
            ),
        )); 
        
        #otázky k zadaniu 2
        \DB::table('events')->insert(array (
            array (
                'message' => 'link na predlohu',
                'header' => 'Napíšte text podľa predlohy.',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Nadpis „DESKTOP“ napíšte písmom Verdana veľkosťou 12 bodov, tučne, podčiarknutý jednoduchou čarou. Nadpis „HISTORIE“ napíšte písmom Verdana, veľkosťou 11 bodov, tučne.',
                'header' => 'Naformátuj nadpisy podľa zadania.',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Text napíšte typom písma Verdana, veľkosťou 11 bodov. Medzery za odstavcami sú 18 bodov. ',
                'header' => 'Naformátuj text podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Prvý odstavec je zarovnaný do bloku, prvý riadok je odsadený o 1,25 cm, riadkovanie jednoduché. ',
                'header' => 'Nastav prvý odstavec podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Druhý odstavec je zarovnaný vľavo, prvý riadok je predsadený o 1,25 cm, riadkovanie 1,5 riadku.',
                'header' => 'Nastav druhý odstavec podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Tretí odstavec je zarovnaný vpravo, riadkovanie 1,5 riadku. ',
                'header' => 'Nastav tretí odstavec podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Štvrtý odstavec je zarovnaný do bloku, zarážky zľava 2,5 cm a sprava 2,5 cm, riadkovanie 1,5 riadku.',
                'header' => 'Nastav štvrtý odstavec podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Piaty odstavec je zarovnaný vľavo, prvý riadok je odsadený o 2 cm, riadkovanie dvojité.',
                'header' => 'Nastav piaty odstavec podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Posledný odstavec je zarovnaný na stred, riadkovanie 1,5 riadku.',
                'header' => 'Nastav posledný odstavec podľa zadania',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 3,
                'author_id' => 6,
                'created_at' => '2021-03-01 12:59:54',
                'updated_at' => '2021-03-01 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-01 15:36:39',
                'updated_at' => '2021-03-01 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
    }
}