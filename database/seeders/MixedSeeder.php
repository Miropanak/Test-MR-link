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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
                'event_type_id' => 7,
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
        
		#Word3
        \DB::table('units')->insert(array (
            array (
                'title' => 'Prednáška 3: orámovanie a podfarbenie MS Word',
                'description' => '',
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 6,
            ),
        ));
        $unit_id=\DB::getPDO() -> lastInsertId();
        \DB::table('activity_unit')->insert(array (
            array (
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'activity_id' => $activity_id,
                'unit_id' => $unit_id,
                'unit_order_number' => 0,
                'deleted_at' => NULL,
            ),
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'link na predlohu',
                'header' => 'Sformátujte text predlohy podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Nadpis „Precvičovanie“ napíšte písmom Verdana, veľkosťou 18 bodov, tučne, farba tmavomodrá, podčiarknuté dvojitou čarou, medzery medzi znakmi (riadkovanie) rozšírené o 4 body. Nadpis je zarovnaný na stred, medzera za nadpisom (odstavcom) je 42 bodov. Podfarbenie celého riadku stredne tmavou modrou farbou (-40%). ',
                'header' => 'Naformátuj nadpis "Precvičovanie" podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Podnadpis „Ohraničenie a tieňovanie“ napíšte písmom Verdana, veľkosťou 16 bodov, zarovnaný na stred, medzera pred odstavcom je 12 bodov a medzera za odstavcom je 18 bodov.',
                'header' => 'Naformátuj podnadpis „Ohraničenie a tieňovanie“ podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
       
       \DB::table('events')->insert(array (
            array (
                'message' => 'Ostatný text napíšte písmom Verdana, veľkosťou 11, medzery pred i za odstavcom sú 12 bodov. ',
                'header' => 'Naformátuj zvyšný text podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
       
        \DB::table('events')->insert(array (
            array (
                'message' => 'Prvý odstavec je zarovnaný do bloku, ohraničený okolo čiernou čiarou o šírke 1,5 bodu. Vzdialenosť medzi ohraničením a textom je hore a dole 5 bodov, vľavo a vpravo 7 bodov. ',
                'header' => 'Naformátuj prvý odstavec podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));

        \DB::table('events')->insert(array (
            array (
                'message' => 'Druhý odstavec je zarovnaný do bloku, prvý riadok je odsadený o 2 cm, riadkovanie1,5 riadku.',
                'header' => 'Naformátuj druhý odstavec podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));        

        \DB::table('events')->insert(array (
            array (
                'message' => 'Tretí odstavec je zarovnaný na stred, odsadenie zľava aj sprava o 2 cm, riadkovanie 1,5 riadku. Ohraničený zhora i zdola dvojitou čiernou čiarou o šírke 0,5 bodu. ',
                'header' => 'Naformátuj tretí odstavec podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        )); 
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Štvrtý odstavec je zarovnaný do bloku, prvý riadok je predsadený o 1,5 cm, riadkovanie 1,5 riadku. ',
                'header' => 'Naformátuj štvrtý odstavec podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        )); 
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Piaty odstavec je zarovnaný vľavo, prvý riadok je predsadený o 2 cm, riadkovanie dvojité. Ohraničenie šedou čiarou o šírke 1,5 bodu, tieňovaný. (50%). ',
                'header' => 'Naformátuj piaty odstavec podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'celá stránka je ohraničená pomocou efektu žltej hviezdičky .',
                'header' => 'Naformátuj ohraničenie podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'celá stránka je podfarbená svetlomodrou farbou (modrá, zvýraznenie 1, 80%)',
                'header' => 'Naformátuj podfarbenie podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'na stránku umiestnime  vodotlač s červeným šikmým textom „Dôverné !!!“',
                'header' => 'Na stránku umiestnime  vodotlač podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        #word4
        \DB::table('units')->insert(array (
            array (
                'title' => 'Prednáška 4: odrážky a číslovanie v MS Word',
                'description' => '',
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
                'author_id' => 6,
            ),
        ));
        $unit_id=\DB::getPDO() -> lastInsertId();
        \DB::table('activity_unit')->insert(array (
            array (
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'activity_id' => $activity_id,
                'unit_id' => $unit_id,
                'unit_order_number' => 0,
                'deleted_at' => NULL,
            ),
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'link na predlohu',
                'header' => 'Sformátujte text predlohy podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
       \DB::table('events')->insert(array (
            array (
                'message' => 'Text napíšte písmom Verdana, veľkosťou 11 bodov, podnadpisy sú tučné, veľkosťou 12 bodov a nadpis „Tematický plán“ veľkosťou 14 bodov, tučne. Medzera za nadpisom 12 bodov-jednotlivé časti oddeľte vodorovnou čiarou od jedného okraja po druhý, hrúbka čiary 1, farba tmavošedá',
                'header' => 'Naformátujte text, podnadpisy a nadpisy predlohy podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        )); 
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Odrážka je typu šípka vpravo odsadená na zarážke 0,5 cm a text za odrážkou je odsadený na zarážke 1 cm. V druhom odstavci nastavte číslovanie písmenom (a,b,c...), ktoré je odsadené na zarážke 0,5 cm a text za číslom je odsadený na zarážke 2,2 cm, pred číslovanie je napísané slovo „bod“. ',
                'header' => 'Naformátujte časť 1 podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Viacúrovňové číslovanie. Nadpis „Tematický plán“ je bez číslovania- 1. úroveň (podnadpisy)– číslovanie (číslom) je pri ľavom okraji, text je odsadený na zarážke 0,7 cm. 2. úroveň – číslovanie (číslom v tvare 1.1, 1.2 ...)  je odsadené na zarážke 0,7 cm, text je odsadený na zarážke 1,6 cm. ',
                'header' => 'Naformátujte časť 2 podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 5,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
        
        \DB::table('events')->insert(array (
            array (
                'message' => 'Viacúrovňové číslovanie. Nadpis „Tematický plán“ je s číslom 1. 1. úroveň – číslovanie (číslom) je pri ľavom okraji, text je odsadený na zarážke 0,7 cm. 2. úroveň (podnadpisy)– číslovanie (číslo.písmeno) je odsadené na zarážke 0,7 cm, text je odsadený na zarážke 1,8 cm. 3. úroveň –(odrážka) je odsadený na úroveň 1,8 cm. Odrážka je z knižnice odrážok – šipka dole čierna, hore čiernobiela. Text je odsadený na zarážke 2,3 cm',
                'header' => 'Naformátujte časť 3 podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
                'author_id' => 6,
                'created_at' => '2021-03-10 12:59:54',
                'updated_at' => '2021-03-10 12:59:54',
                'deleted_at' => NULL,
            )             
        ));
        $event_id=\DB::getPDO() -> lastInsertId();
        \DB::table('units_events')->insert(array (
            array (
                'event_id' => $event_id,
                'unit_id' => $unit_id,
                'created_at' => '2021-03-10 15:36:39',
                'updated_at' => '2021-03-10 15:36:39',
                'deleted_at' => NULL,
            )
        ));
		
		#zadanie5
        \DB::table('units')->insert(array (
            array (
                'title' => 'Prednáška 5: pokračovanie v MS word',
                'description' => 'tabulátory',
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
		
        #otázky k zadaniu 5
        \DB::table('events')->insert(array (
            array (
                'message' => 'link na predlohu, link na obrazok',
                'header' => 'Napíšte text podľa predlohy:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Prvý nadpis napíšte písmom Monotype Corsiva, veľkosťou 20 bodov, tučné, medzera pred odstavcom je 6 bodov a medzera za odstavcom je 24 bodov, text je zarovnaný na stred.',
                'header' => 'Upravte nadpis a text:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Nadpis „Jedálny lístok“ napíšte písmom Monotype Corsiva, veľkosťou 36 bodov, tučne, medzera pred odstavcom je 6 bodov a medzera za odstavcom je 18 bodov, text je zarovnaný na stred. Písmo je rozšírené o 4 body.',
                'header' => 'Upravte nadpis „Jedálny lístok“ nasledovne:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Prvý tabulátor (kde je váha jedla) je umiestnený na pozícii 2 cm so zarovnaním vpravo (Zarovnanie vpravo je použité preto, aby jednotky hmotnosti (gramy) boli umiestnené pod sebou) Zarážka druhého tabulátoru je umiestnená na pozícii 3 cm, zarovnanie vľavo. Tu je názov jedla. Posledný tabulátor je umiestnený na 15 cm, je zarovnaný doprava a je tu použitý vodiaci znak - bodka.',
                'header' => 'Tabulátory nastavte nasledovne:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Text „Dobrou chuť prajú majiteľ ...“ napíšte písmom Tahoma, veľkosťou 9 bodov, kurzívou a je zarovnaný vpravo.',
                'header' => 'Ďalej upravte text „Dobrou chuť prajú majiteľ ...“:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Jedálny lístok je ohraničený (ohraničenie stránky) pomocí efektu – zelené lístky. Na pozadie dáme zámok, ktorý sa nachádza medzi prílohami v prvej úlohe',
                'header' => 'Pokračujte vo formátovaní:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Nakoniec upravíme medzery medzi riadkami aby to vyšlo na 1 stranu.',
                'header' => 'Upravte text tak, aby sa zmestil na jednu stranu:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
		
		#zadanie 9
        \DB::table('units')->insert(array (
            array (
                'title' => 'Prednáška 9: pokračovanie v MS word',
                'description' => 'štýly, obsah, citacie, poznámky pod čiarou',
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
        
        #otázky k zadaniu 9
        \DB::table('events')->insert(array (
            array (
                'message' => 'link na predlohu - Zadanie č_9 text.docx, priloha2 - zoznam obrázkov, priloha3 - obrazok1 k hyperlinkom, priloha4 - obrazok2 k hyperlinkom, priloha5 - obrazok3 k hyperlinkom',
                'header' => 'Napíšte text podľa predlohy:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Celý text napíšte písmom Times New Roman, veľkosťou 12 bodov, zarovnaný do bloku. Riadkovanie 1,5, Medzera za odstavcom je 12 bodov. Prvý riadok odstavca odsadený o 1,5 cm. Text je A4 na orientovaný na výšku, ľavý okraj 3,5cm, pravý, horný, dolný 2,5cm.',
                'header' => 'Text je formátovaný pomocou štýlov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Vulkány, Vznik vulkánov, Typy vulkánov – nastavte na Nadpis 1 – prvá úroveň viacúrovňového zoznamu (1.) – písmom Verdana - veľkosť 16 – tučne, medzera za nadpisom 16, pred 0. Ďalej pokračujte s nadpismi: Erupcie vulkánov, Signály vulkánov, Monitorovanie vulkánov, Štítový vulkán,...  - Nadpis 2– druhá úroveň viacúrovňového zoznamu (1.1.) - písmom Verdana veľkosť 12 tučne, medzera za nadpisom 12, pred 6.',
                'header' => 'Pokračujte vo formátovaní nadpisov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Každá hlavná kapitola začína na novej strane. 2,3 a 4 odstavec časti 2 Vznik vulkánov je odsadený vlastnou odrážkou sopka - Odsadenie odrážky je 0 cm a odsadenie textu za odrážkou je 1 cm, farba odrážky červená, tučne veľkosť 14',
                'header' => 'Text ďalej upravujte nasledovne:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Povkladajte na začiatok 3 prázdne strany, 1. bude názov, 2. obsah a 3. Úvod. Z textu vygenerujte na 2. stranu obsah',
                'header' => 'Pridajte prázdne strany a vygenerujte obsah:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Na 1. Stranu dajte cez textové pole nadpis VULKÁNY písmom Tahoma, tučné veľkosť 48, medzery medzi písmenami rozšírené o 5 bodov, všetko veľkými písmenami, modrou tučne do stredu strany. Vložte nejaký text na - 3.stranu Úvod a na koniec Záver. Následne aktualizujte obsah!',
                'header' => 'Pokračujte vo formátovaní nadpisov a textov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'V texte sú použité obrázky. Prvý obrázok (Láva.jpg) – veľkosť obrázku je podľa potreby, umiestnenie na stred. Druhý obrázok (Stromboli.jpg) – umiestnenie na stred. Obrázky sú otitulkované. Titulok napíšte písmom Times new Roman, veľkosťou 9, kurzíva',
                'header' => 'Pracujte s obrázkami podľa pokynov:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Vložte na koniec zoznam obrázkov, ktorý sa nachádza medzi prílohami vyššie. Vymažte zbytočné medzery a entery, aktualizujte obsah',
                'header' => 'Pridajte zoznam obrázkov a aktualizujte obsah:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'Vložte zdroje a vygenerujte Požitú literatúru, aktualizujte obsah. Číslovanie strán je číslované bez prvej a druhej strany, na ktorej je obsah (na tretej strane (úvod) však číslovanie začína číslom 3)',
                'header' => 'Vložte zdroje a upravte číslovanie:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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
                'message' => 'To je veľmi jednoduché - označíte slovo alebo viac slov, kliknete pravým tlačidlom myši a vyberiete vložiť hypertextové prepojenie - do adresy prilepíte odkaz - slovo vám zmodrie a funguje ako odkaz(cez CTRL + klik), podobne si viete vkladať odkazy aj na iné dokumenty, obrázky vo Vašom počítači. Inšpirovať sa môžete obrázkami, ktoré sú súčasťou prílohy na začiatku zadania',
                'header' => 'Vložte hypertextový odkaz do textu:',
                'time_to_explain' => 2,
                'time_to_handle' => 3,
                'event_type_id' => 7,
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