<?php
namespace Database\Seeders;
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
        $this->call(EventTypesTableSeeder::class);
	$this->call(UserTypesTableSeeder::class);
	$this->call(OrganizationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        
        $this->call(OptionsTableSeeder::class);
        $this->call(StudyFieldsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(UnitsEventsTableSeeder::class);
        $this->call(ActivityUsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UserTypesPermissionsTableSeeder::class);
        $this->call(EventTestUserTableSeeder::class);
        $this->call(HelpsTableSeeder::class);
        $this->call(TestsTableSeeder::class);
	$this->call(ActivityUnitTableSeeder::class);
	$this->call(CategoriesTableSeeder::class);
	$this->call(EventCategoriesTableSeeder::class);
    $this->call(MixedSeeder::class);
    }
}
