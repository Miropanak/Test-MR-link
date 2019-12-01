<?php

/**
 * Created by Bernad on 11/6/2017.
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "dedenie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 12,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "agregácia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 12,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "integrácia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 12,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "segregácia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 12,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "generickosť",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 12,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je obsiahnutá v konštruktoroch",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 13,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vzniká dedením",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 13,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je zabezpečená statickými metódami",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 13,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je obsiahnutá v metóde main()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 13,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "vzniká v interakcií objektov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 13,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nemôže mať argumenty",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 14,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí mať vždy len jeden argument",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 14,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "nemusí byť explicitne poskytnutý",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 14,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "môže vraciať ľubovoľnú hodnotu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 14,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nemôže byť preťažený",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 14,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "triedu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 15,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "inštanciu triedy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 15,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "inštanciu triedy alebo rozhrania",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 15,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "typ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 15,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "modul",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 15,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "sprístupňuje všetky typy definované v balíku abc.xyz okrem typov v podbalíkoch",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 16,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "deklaruje balík abc.xyz a môže sa vyskytovať len v jednom súbore",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 16,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "deklaruje balík abc.xyz a môže sa vyskytovať v ľubovoľnom počte súborov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 16,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "sprístupňuje všetky typy definované v balíku abc.xyz",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 16,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "sprístupňuje triedu xyz z balíka abc",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 16,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "bolo ľahšie zachytiť výnimku IOException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 17,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "bolo vôbec možné pracovať s tokom údajov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 17,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "prístup k toku údajom mohol byť realizovaný operáciami vyššej úrovne",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 17,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nedošlo k strate údajov v dôsledku vysokej rýchlosti ich prúdenia tokom údajov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 17,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "bolo možné tok údajov presmerovať",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 17,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "sprístupní priestor názvov všetkých typov balíka java.util, ale bez typov v podbalíkoch",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 18,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "sprístupní priestor názvov všetkých typov balíka java.util vrátane typov v podbalíkoch",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 18,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "fyzicky pripojí typy balíka java.util k programu bez typov v podbalíkoch",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 18,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "fyzicky pripojí len skutočne použité typy balíka java.util k programu bez typov v podbalíkoch",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 18,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "fyzicky pripojí všetky typy balíka java.util k programu vrátane typov v podbalíkoch",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 18,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "príkazom System.open()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 19,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "jeho konštrukciou",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 19,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "jeho prvým použitím",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 19,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "jeho metódou open()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 19,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "príkazom IOStream.open()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 19,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nemusí byť zavolaný",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 20,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nemôže byť zavolaný",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 20,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je lepšie, aby nebol zavolaný",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 20,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nemá význam volať",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 20,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "musí byť zavolaný",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 20,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "mení stav objektu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 21,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "mení správanie objektu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 21,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "mení stav a správanie objektu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 21,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "mení identitu objektu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 21,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "inicializuje objekt",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 21,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "stanovuje kritéria pre použitie abstraktných tried",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 22,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "znamená spájanie objektov do väčších celkov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 22,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "umožňuje, aby sa objekt uplatnil namiesto objektu jeho nadtypu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 22,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "znamená skrytie implementácie objektu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 22,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "predstavuje kritérium pre použitie dedenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 22,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nemôže dediť",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 23,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "môže mať len abstraktné metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 23,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nemôže mať polia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 23,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "môže mať statické metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 23,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nemôže mať prekonávajúce metód",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 23,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "vzniká v interakcií objektov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 24,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je obsiahnutá v metóde main()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 24,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je zabezpečená statickými metódami",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 24,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je obsiahnutá v konštruktoroch",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 24,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vzniká dedením",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 24,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nič",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 25,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "AAfBfABf",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 25,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "AAfBfABfAf",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 25,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "BAfBfBBfAf",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 25,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "BAfBfABfAf",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 25,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "pomocou new A().f()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 26,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "aj pomocou new A().f(), aj pomocou A.m().f();",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 26,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "pomocou A.f().m();",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 26,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "pomocou A.m().f();",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 26,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "aj pomocou new A().f(), aj pomocou A.f().m();",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 26,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Nie, lebo sa nededia.",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 27,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Áno, lebo sa vykonajú rýchlejšie.",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 27,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "Nie, lebo neumožňujú polymorfizmus.",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 27,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Áno, lebo sa dajú prekonať.",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 27,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Nie, lebo nepodporujú zapuzdrenie.",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 27,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "typ údajov uchovávaných v zozname",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 28,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "reťazec znakov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 28,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "referenciu na údaje uchovávané v zozname",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 28,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "názov zoznamu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 28,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "neznámu premennú",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 28,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zapuzdreniu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 29,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "perzistencii",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 29,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "súdržnosti",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 29,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "agregácii",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 29,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "polymorfizmu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 29,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zmeniť zoznam jeho atribútov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 30,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zmeniť jeho metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 30,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "zmeniť hodnoty jeho atribútov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 30,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zmeniť jeho konštruktor",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 30,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zmeniť jeho inicializáciu ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 30,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je nevyhnutný",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 31,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "nie je nevyhnutný",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 31,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nie je nevyhnutný, ale java.io.∗ musíme zadať pri kompilácii",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 31,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nie je nevyhnutný, ale potrebné triedy V/V systému musíme skopírovať do vlastného programu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 31,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je zbytočný",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 31,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "Visitor",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 32,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Observer",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 32,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Composite",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 32,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "MVC",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 32,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Strategy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 32,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len ošetriť",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 33,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len zhltnúť",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 33,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len vypísať",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 33,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "znovu vyhodiť",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 33,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len vypísať a/alebo ošetriť",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 33,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "prekladáč hlási chybu pre neznámu veľkosť poľa a",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 34,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "pri vykonávaní vznikne výnimka pre neznámu veľkosť poľa a",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 34,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "prekladáč hlási chybu pre nekonzistenciu typov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 34,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "pri vykonávaní vznikne výnimka pre nekonzistenciu typov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 34,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "prebehne korektne",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 34,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vysporiadanie sa s veľkým počtom objektov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 35,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "realizáciu viacnásobného polymorfizmu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 35,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "implementáciu variability v uskutočňovaní určitého procesu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 35,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zabezpečenie viacnásobného dedenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 35,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "dodržanie Liskovej princípu substitúcie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 35,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "v odvodených triedach toho istého balíka",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 36,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "v danej triede",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 36,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "v triedach toho istého balíka",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 36,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "v odvodených triedach",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 36,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "v odvodených triedach a v triedach toho istého balíka",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 36,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "označovaním súborov so zdrojovým kódom názvami balíkov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 37,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zaradením súborov so zdrojovým kódom do hierarchie adresárov, ktorá zodpovedá želanej hierarchii balíkov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 37,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zaradením zdrojového kódu tried do súborov, ktoré reprezentujú balíky",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 37,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zaradením súborov so skompilovaným kódom do hierarchie adresárov, ktorá zodpovedá želanej hierarchii balíkov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 37,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "importovaním tried",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 37,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "jeho konštruktorom",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 38,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "príkazom System.open()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 38,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "jeho metódou open()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 38,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "jeho prvým použitím",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 38,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "príkazom IOStream.open()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 38,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je špeciálnou vlastnosťou Javy, ktorá nesúvisí s objektmi",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 39,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je dôsledkom optimalizácie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 39,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "je dôsledkom toho, že pole v Jave je objekt",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 39,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je dôsledkom novších rozšírení Javy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 39,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je spôsobené vyššou dostupnosťou pamäte",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 39,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Composite",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 40,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "Visitor",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 40,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "žiadne",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 40,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Strategy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 40,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Observer",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 40,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "v metóde main()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 41,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "ako metódu okna, v ktorom sa nachádza tlačidlo",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 41,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "v implementácii prijímača (listener) tlačidla",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 41,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "ako metódu tlačidla",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 41,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "v zodpovedajúcej triede aplikačnej logiky",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 41,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "nie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 42,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "áno",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 42,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "áno, ale len ak neobsahuje metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 42,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "áno, ale nebudú sa dať zavolať jeho metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 42,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "áno, ale len ak obsahuje výlučne statické prvky",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 42,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "volaním metódy actionPerformed() príslušného tlačidla v slučke",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 43,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "metódou onClick() tlačidla implementovanou pri odvodení od všeobecného tlačidla JButton",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 43,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zavolaním statickej metódy EventQueue.onClick() a následným zistením, či sa kliknutie vzťahuje na dané tlačidlo",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 43,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "automaticky po pridaní tlačidla do okna metódou add()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 43,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "prijímačom udalosti kliknutia registrovaným pre dané tlačidlo",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 43,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "znamená uzamknutie objektu triedy pre hocijaký iný prístup",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 44,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nie je možná",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 44,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "znamená uzamknutie objektu triedy pre hocijaký iný synchronizovaný prístup",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 44,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "znamená uzamknutie objektu this pre hocijaký iný synchronizovaný prístup",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 44,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "znamená uzamknutie objektu this pre hocijaký iný prístup",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 44,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je abstraktná",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 45,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je statická",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 45,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je generická",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 45,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je polymorfná",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 45,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "nejestvuje",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 45,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "implementáciu metód, ktorá sa dá prekonať",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 46,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "správanie bez implementácie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 46,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vzťahy dedenia medzi inými triedami",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 46,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vzťahy dedenia medzi inými rozhraniami",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 46,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "implementáciu metód, ktorá sa nedá prekonať",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 46,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len to čo predpisuje rozhranie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 47,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len ďalšie polia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 47,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len metódy ktoré predpisuje rozhranie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 47,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "aj iné metódy než predpisuje rozhranie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 47,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len konkrétne metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 47,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zlé sú všetky tri riadky",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 48,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len tretí riadok je zlý",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 48,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "druhý a tretí riadok sú zlé",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 48,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "len druhý riadok je zlý",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 48,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len prvý riadok je zlý",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 48,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len ďalšie polia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 49,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "ľubovoľné ďalšie polia a metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 49,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len ďalšie metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 49,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len metódy deklarované v rozhraní",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 49,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "len metódy nedeklarované v rozhraní",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 49,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nebude možné, lebo trieda C nie je finálna",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 50,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nebude možné preto, že trieda C obsahuje príliš veľký atribút s",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 50,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nebude možné, lebo trieda C nie je označená ako public",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 50,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "nebude možné, lebo nie sú prepojené",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 50,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "bude možné",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 50,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Z musí byť rozhranie, a typy X a Y triedy, ktoré ho implementujú",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 51,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "typy X a Y musia byť triedy priamo alebo nepriamo odvodené od typu Z",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 51,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Z musí byť abstraktná trieda, a typy X a Y triedy od nej odvodené",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 51,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "typy X a Y musia byť triedy odvodené od typu Z, ale X nesmie byť odvodené od Y alebo naopak",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 51,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "typ X musí byť odvodený od typu Y alebo naopak",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 51,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "B.m(int i, int j) preťažuje A.m(int i)",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 52,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "B.n(int i) prekonáva A.m(int i)",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 52,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "A.m(int i, int j) prekonáva A.m(int i)",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 52,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "B.m(int i, int j) preťažuje B.n(int i)",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 52,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "B.n(int i) preťažuje A.m(int i)",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 52,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "spôsobí chybu pri preklade",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 53,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vypíše text „Kruh farby 12“",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 53,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "nevypíše nič",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 53,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "spôsobí chybu počas vykonávania",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 53,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vypíše text „Kruh farby“ ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 53,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "bezprostredne prekonaná metóda z prekonávajúcej",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 54,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "prekonávajúca metóda z prekonanej na ľubovoľnej úrovni dedenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 54,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "ľubovoľná metóda nadtypu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 54,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "prekonaná metóda z prekonávajúcej na ľubovoľnej úrovni dedenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 54,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "bezprostredne prekonávajúca metóda z prekonanej",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 54,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "spomalenie programu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 55,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zvýšenie veľkosti výsledného JAR súboru",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 55,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "riešiteľnú kolíziu názvov zavedených prvkov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 55,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "neriešiteľnú kolíziu názvov zavedených prvkov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 55,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zvýšenie veľkosti class súborov tried, ktoré používajú prvky príslušného balíka ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 55,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "sa nezapíše do súboru pri serializácii objektu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 56,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je dostupný len v danej hierarchii tried",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 56,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je dostupný len v rámci jednej nite",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 56,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "je dostupný len v danej triede",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 56,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je chránený pred zápisom",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 56,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zväčší tento program len v preloženom tvare o kód z balíka",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 57,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zväčší tento program aj v nepreloženom, aj v preloženom tvare o kód z balíka",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 57,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zväčší tento program len v preloženom tvare o skutočne použitý kód z balíka",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 57,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "nezväčší tento program",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 57,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zväčší tento program len v nepreloženom tvare o kód z balíka ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 57,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "automaticky z každej metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 58,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "automaticky pre každú triedu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 58,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "využitím príslušného mechanizmu Java API",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 58,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "procesom opačným k serializácii",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 58,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "pre každú metódu označenú kľúčovým slovom synchronized ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 58,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "opravuje vzniknutú chybu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 59,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "signalizuje výnimočnú situáciu hlavnej metóde v programe",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 59,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "uvoľňuje pamäť od zbytočných objektov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 59,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "posiela správu vedúcemu programátorovi",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 59,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "signalizuje výnimočnú situáciu klientskemu kódu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 59,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je korektná",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 60,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí deklarovať že vyhadzuje výnimku typu MyException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 60,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "musí deklarovať alebo ošetrovať výnimku typu MyException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 60,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí ošetrovať výnimku typu MyException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 60,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí vyhadzovať výnimku typu MyException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 60,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "blokom kódu spracovania na mieste jej vyhodenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 61,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "implementáciou metódy try() v triede výnimky",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 61,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "v metóde main()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 61,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "implementáciou metódy catch() v triede výnimky",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 61,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "blokom kódu spracovania na mieste jej zachytenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 61,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "prenos funkcionality",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 62,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zrýchlenie programu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 62,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zmenšenie programu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 62,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zvýšenie bezpečnosti",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 62,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "šetrenie pamäťou ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 62,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí zachytávať výnimku typu XException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 63,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "je korektná",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 63,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí ošetrovať výnimku typu XException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 63,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nesmie obsahovať klauzulu throws",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 63,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí vyhadzovať výnimku typu XException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 63,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "sa rovnomerne striedajú",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 64,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "sa spúšťajú a končia naraz",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 64,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "bránia uviaznutiu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 64,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "predstavujú kritické regióny programu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 64,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "predstavujú nite programu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 64,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí v časti try bloku spracovania výnimky vyhadzovať výnimku typu MyException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 65,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí v časti finally bloku spracovania výnimky vyhadzovať výnimku typu MyException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 65,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "je korektná z pohľadu výnimiek",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 65,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "musí obsahovať klauzulu throws MyException alebo blok spracovania výnimky typu MyException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 65,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí obsahovať klauzulu throws MyException a zároveň aj blok spracovania výnimky typu MyException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 65,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "musí v časti catch bloku spracovania výnimky vyhadzovať výnimku typu MyException",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 65,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "rušenie prvkov v zoskupeniach",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 66,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "prechádzanie zoskupeniami",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 66,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "volania abstraktných metód",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 66,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "opakovanie vykonávania ľubovoľného kódu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 66,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "pridávanie prvkov do zoskupení ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 66,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "dá vytvoriť",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 67,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nedá vytvoriť, lebo metóda a() je abstraktná",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 67,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "dá vytvoriť, ale nebude sa dať zavolať metóda a()",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 67,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "dá vytvoriť, ale bude ukazovať na null",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 67,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "nedá vytvoriť",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 67,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "potrebuje explicitné zadanie iterátora zoskupenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 68,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "automaticky získa inkrementátor zoskupenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 68,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "potrebuje explicitné zadanie inkrementátora zoskupenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 68,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "automaticky získa iterátor zoskupenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 68,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "pracuje cez iteračnú premennú",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 68,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "inverziu generalizácie a špecializácie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 69,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "chybu pri preklade",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 69,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "neočakávané správanie klientskeho kódu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 69,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nekonečnú rekurziu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 69,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zvýšenie zviazania tried",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 69,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "áno, ako hociktorej inej triedy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 70,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "nie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 70,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "áno, ale len ak trieda neobsahuje abstraktné metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 70,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "áno, ale nebudú sa dať zavolať abstraktné metódy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 70,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "áno, ale bude abstraktná",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 70,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "preloží a vykoná korektne",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 71,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nepreloží, lebo prekladač hlási chybu na riadku 3",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 71,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nepreloží, lebo prekladač hlási chybu na riadku 4",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 71,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "preloží, ale vznikne chyba pri vykonávaní riadku 3",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 71,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "preloží, ale vznikne chyba pri vykonávaní riadku 4",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 71,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "princíp zapuzdrenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 72,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "pravidlá dedenia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 72,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Liskovej princíp substitúcie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 72,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "princíp otvorenosti a uzavretosti",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 72,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "pravidlá polymorfizmu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 72,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "počet riadkov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 73,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "typ návratovej hodnoty",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 73,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "súdržnosť a zviazanosť",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 73,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "implicitné predpoklady a dôsledky",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 73,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "synchronizáciu a implicitné nite ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 73,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "tok údajov pred čítaním treba otvoriť, ale pred skončením programu uzavrieť",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 74,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "tok údajov pred čítaním treba otvoriť, a tým sa automaticky zabezpečí aj jeho uzavretie po skončení programu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 74,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "softvérové entity majú byt voľne zviazané, ale vysoko súdržne",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 74,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "softvérové entity majú byt otvorené pre rozšírenie, ale uzavreté pre zmeny",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 74,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "správanie objektu môže byť otvorené, ale jeho implementácia má byť uzavretá",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 74,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "predstavuje kritérium pre použitie agregácie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 75,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "predstavuje spôsob tvorenia hierarchie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 75,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "umožňuje znížiť závislosť klientskeho kódu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 75,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "umožňuje, aby sa objekt uplatnil namiesto objektu jeho nadtypu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 75,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "umožňuje spájanie objektov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 75,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "sa vyvolajú automaticky na miestach zachytených zodpovedajúcimi bodovými prierezmi",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 76,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "sa musia zavolať explicitne na miestach zachytených zodpovedajúcimi bodovými prierezmi",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 76,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "neposkytujú vlastnú funkcionalitu, len zachytávajú body spájania",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 76,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "sa vykonajú ihneď po vzniku inštancie aspektu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 76,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "slúžia na tvorbu inštancií aspektov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 76,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "volanie operácie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 77,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "vykonávanie operácie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 77,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vytvorenie operácie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 77,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "prepnutie operácie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 77,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "zmenu operácie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 77,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "trieda",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 78,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "rozhranie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 78,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "objekt",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 78,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "metóda",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 78,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "atribút",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 78,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "double trouble",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 79,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "double select",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 79,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "double dispatch",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 79,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "double mismatch",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 79,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "double method",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 79,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "princípe otvorenosti a uzávretosti",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 80,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "princípe, že návrhu musí predchádzať zmluva",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 80,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "dôslednom ošetrovaní výnimiek",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 80,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "princípe, že implementácii musí predchádzať návrh",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 80,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "Liskovej princípe substitúcie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 80,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vytvárania objektov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 81,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "uplatnenia objektovo-orientovaného programovania",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 81,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "existencie vzťahu typ–podtyp",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 81,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "náhradenia prametrizovaných typov",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 81,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "nahradenia programu iným programom",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 81,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "čítanie zo štandardného vstupu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 82,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "otvorenie štandardného vstupu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 82,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vytvorenie a otvorenie štandardného vstupu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 82,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "vytvorenie štandardného vstupu",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 82,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "pohodlnejšiu prácu so štandardným vstupom ",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 82,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Z musí byť rozhranie, a typy X a Y triedy, ktoré ho implementujú",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 83,
        ]);

        DB::table('options')->insert([
            'correct_answer' => true,
            'answer_data' => "typy X a Y musia byť triedy priamo alebo nepriamo odvodené od typu Z",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 83,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "Z musí byť abstraktná trieda, a typy X a Y triedy od nej odvodené",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 83,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "typy X a Y musia byť triedy odvodené od typu Z, ale X nesmie byť odvodené od Y alebo naopak",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 83,
        ]);

        DB::table('options')->insert([
            'correct_answer' => false,
            'answer_data' => "typ X musí byť odvodený od typu Y alebo naopak",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'event_id' => 83,
        ]);

    }
}
