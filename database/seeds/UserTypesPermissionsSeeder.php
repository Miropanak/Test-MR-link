<?php
/**
 * Created by PhpStorm.
 * User: Bende
 * Date: 12.10.2018
 * Time: 04:07
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;


class UserTypesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 1,
            'id_permissions' => 1,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 1,
            'id_permissions' => 2,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 2,
            'id_permissions' => 2,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 2,
            'id_permissions' => 3,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 2,
            'id_permissions' => 4,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 2,
            'id_permissions' => 5,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 2,
            'id_permissions' => 6,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 2,
            'id_permissions' => 7,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 2,
            'id_permissions' => 8,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 2,
            'id_permissions' => 9,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 2,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 3,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 4,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 5,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 6,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 7,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 8,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 9,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 10,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 11,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 12,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 13,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 14,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 15,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 3,
            'id_permissions' => 16,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 2,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 3,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 4,
        ]);
		
        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 5,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 6,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 7,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 8,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 9,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 10,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 11,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 12,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 13,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 14,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 15,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 16,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 17,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 18,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 19,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 4,
            'id_permissions' => 20,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 2,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 3,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 4,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 5,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 6,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 7,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 8,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 9,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 10,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 11,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 12,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 13,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 14,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 15,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 16,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 17,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 20,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'id_user_types' => 5,
            'id_permissions' => 21,
        ]);
    }
}