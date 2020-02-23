<?php

/**
 * Created by Bernad on 11/6/2017.
 */
/**
 * Changed by Bende on 14/10/2018.
 */

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * This class contains list and order of all seeds to be run
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(EventTypesSeeder::class);
         $this->call(UserTypesSeeder::class);
         $this->call(UsersSeeder::class);
         $this->call(EventsSeeder::class);
         $this->call(OptionsSeeder::class);
         $this->call(StudyFieldsSeeder::class);
         $this->call(ActivitiesSeeder::class);
         $this->call(UnitsSeeder::class);
         $this->call(UnitsEventsSeeder::class);
         $this->call(ActivityUsersSeeder::class);
         $this->call(PermissionsSeeder::class);
         $this->call(UserTypesPermissionsSeeder::class);
		 $this->call(TestsTableSeeder::class);
		 $this->call(UserTestsSeeder::class);
		 $this->call(EventTestsSeeder::class);
         $this->call(HelpSeeder::class);
         $this->call(ActivityUnitSeeder::class);
		 //$this->call(AnonymPermissions::class);
         //$this->call(StudentPermissions::class);
         //$this->call(AuthorPermissions::class);
         //$this->call(TeacherPermissions::class);
         //$this->call(CommissionerPermissions::class);
    }
}
