<?php

/**
 * Created by Bernad on 11/6/2017.
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Ján Lang",
            'email' => "fiittim10@gmail.com",
            'password' => "$2y$10\$yL0JX.ryxyQAo9WshBFWNuGKfsqqwqTbQx6VRJdDBPeOFuCF2xUbO",
            'remember_token' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 6
        ]);

        DB::table('users')->insert([
            'name' => "doc. Ing. Valentino Vranić, PhD.",
            'email' => "vranic@stuba.sk",
            'password' => "$2y$10\$IK3jaoZtKBQbDWDsfmdvr.0QmFx8Sp9qppCvT2r/0b5fbTqaR9ahq",
            'remember_token' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4
        ]);

        DB::table('users')->insert([
            'name' => "Komisár",
            'email' => "komisar@gmail.com",
            'password' => "$2y$10\$yL0JX.ryxyQAo9WshBFWNuGKfsqqwqTbQx6VRJdDBPeOFuCF2xUbO",
            'remember_token' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5
        ]);

        DB::table('users')->insert([
            'name' => "Učiteľ",
            'email' => "ucitel@gmail.com",
            'password' => "$2y$10\$yL0JX.ryxyQAo9WshBFWNuGKfsqqwqTbQx6VRJdDBPeOFuCF2xUbO",
            'remember_token' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4
        ]);

        DB::table('users')->insert([
            'name' => "Autor",
            'email' => "autor@gmail.com",
            'password' => "$2y$10\$yL0JX.ryxyQAo9WshBFWNuGKfsqqwqTbQx6VRJdDBPeOFuCF2xUbO",
            'remember_token' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3
        ]);

        DB::table('users')->insert([
            'name' => "Študent",
            'email' => "student@gmail.com",
            'password' => "$2y$10\$yL0JX.ryxyQAo9WshBFWNuGKfsqqwqTbQx6VRJdDBPeOFuCF2xUbO",
            'remember_token' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 2
        ]);

    }
}
