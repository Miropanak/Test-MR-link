<?php

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
			6 => 
            array (
                'name' => 'Simona Lucy Galová',
                'email' => 'student1@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			7 => 
            array (
                'name' => 'Viktória Göndörová',
                'email' => 'student2@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			8 => 
            array (
                'name' => 'Janka Halušková',
                'email' => 'student3@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			9 => 
            array (
                'name' => 'Slavka Halušková',
                'email' => 'student4@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			10 => 
            array (
                'name' => 'Laura Chovancová',
                'email' => 'student5@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			11 => 
            array (
                'name' => 'Matúš Kmeť',
                'email' => 'student6@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			12 => 
            array (
                'name' => 'Ema Kováčová',
                'email' => 'student7@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			13 => 
            array (
                'name' => 'Nina Kováčová',
                'email' => 'student8@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			14 => 
            array (
                'name' => 'Maroš Kupec',
                'email' => 'student9@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			15 => 
            array (
                'name' => 'Ľudmila Pomaj',
                'email' => 'student10@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			16 => 
            array (
                'name' => 'Alexandra Štempelová',
                'email' => 'student11@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			17 => 
            array (
                'name' => 'Vanessa Trnavská',
                'email' => 'student12@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			18 => 
            array (
                'name' => 'Nina Natália Vavreková',
                'email' => 'student13@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			19 => 
            array (
                'name' => 'Jonáš Bábela',
                'email' => 'student14@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			20 => 
            array (
                'name' => 'Kristína Balková',
                'email' => 'student15@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			21 => 
            array (
                'name' => 'Lucia Brndiarová',
                'email' => 'student16@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			22 => 
            array (
                'name' => 'Milan Buček',
                'email' => 'student17@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			23 => 
            array (
                'name' => 'Viera Dujničová',
                'email' => 'student18@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			24 => 
            array (
                'name' => 'Martin Feranec',
                'email' => 'student19@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
			25 => 
            array (
                'name' => 'Lenka Ferenczová',
                'email' => 'student20@gmail.com',
                'password' => '$2y$10$qOj1iMALDTewL.Njs1dj0uoAXZmysxMAweCfoa3zg2O.gT/uwC5em',
                'remember_token' => '',
                'user_type_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
                'confirm_private_policy' => false,
				'organization_id' => 2,
            ),
        ));
        
        
    }
}