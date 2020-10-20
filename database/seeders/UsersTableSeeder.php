<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'name' => 'Ján Lang',
                'email' => 'fiittim10@gmail.com',
                'password' => '$2y$10$yL0JX.ryxyQAo9WshBFWNuGKfsqqwqTbQx6VRJdDBPeOFuCF2xUbO',
                'remember_token' => '',
                'user_type_id' => 6,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
            ),
            1 => 
            array (
                'name' => 'doc. Ing. Valentino Vranić, PhD.',
                'email' => 'vranic@stuba.sk',
                'password' => '$2y$10$IK3jaoZtKBQbDWDsfmdvr.0QmFx8Sp9qppCvT2r/0b5fbTqaR9ahq',
                'remember_token' => '',
                'user_type_id' => 4,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
            ),
            2 => 
            array (
                'name' => 'Komisár',
                'email' => 'komisar@gmail.com',
                'password' => '$2y$10$yL0JX.ryxyQAo9WshBFWNuGKfsqqwqTbQx6VRJdDBPeOFuCF2xUbO',
                'remember_token' => '',
                'user_type_id' => 5,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
            ),
            3 => 
            array (
                'name' => 'Autor',
                'email' => 'autor@gmail.com',
                'password' => '$2y$10$yL0JX.ryxyQAo9WshBFWNuGKfsqqwqTbQx6VRJdDBPeOFuCF2xUbO',
                'remember_token' => '',
                'user_type_id' => 3,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
            ),
            4 => 
            array (
                'name' => 'Študent',
                'email' => 'student@gmail.com',
                'password' => '$2y$10$yL0JX.ryxyQAo9WshBFWNuGKfsqqwqTbQx6VRJdDBPeOFuCF2xUbO',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
            ),
            5 => 
            array (
                'name' => 'Učiteľ',
                'email' => 'ucitel@gmail.com',
                'password' => '$2y$10$yL0JX.ryxyQAo9WshBFWNuGKfsqqwqTbQx6VRJdDBPeOFuCF2xUbO',
                'remember_token' => '',
                'user_type_id' => 3,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-04 19:59:54',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
            ),
        ));
        
        
    }
}
