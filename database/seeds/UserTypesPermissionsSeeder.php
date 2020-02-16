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
            'user_type_id' => 1,
            'permission_id' => 1,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 1,
            'permission_id' => 2,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 2,
            'permission_id' => 2,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 2,
            'permission_id' => 3,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 2,
            'permission_id' => 4,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 2,
            'permission_id' => 5,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 2,
            'permission_id' => 6,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 2,
            'permission_id' => 7,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 2,
            'permission_id' => 8,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 2,
            'permission_id' => 9,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 2,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 3,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 4,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 5,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 6,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 7,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 8,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 9,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 10,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 11,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 12,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 13,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 14,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 15,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 3,
            'permission_id' => 16,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 2,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 3,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 4,
        ]);
		
        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 5,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 6,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 7,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 8,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 9,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 10,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 11,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 12,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 13,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 14,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 15,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 16,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 17,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 18,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 19,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 4,
            'permission_id' => 20,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 2,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 3,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 4,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 5,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 6,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 7,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 8,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 9,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 10,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 11,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 12,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 13,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 14,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 15,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 16,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 17,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 20,
        ]);

        DB::table('user_types_permissions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_type_id' => 5,
            'permission_id' => 21,
        ]);
    }
}