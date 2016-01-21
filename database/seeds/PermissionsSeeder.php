<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Users:
         * ------------
         */

        DB::table('permissions')->insert(
            [
                'model' => 'users',
                'name' => 'index-users',
                'display_name' => 'List users',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'users',
                'name' => 'show-users',
                'display_name' => 'Show a user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'users',
                'name' => 'create-users',
                'display_name' => 'Create users',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'users',
                'name' => 'store-users',
                'display_name' => 'Save users',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'users',
                'name' => 'edit-users',
                'display_name' => 'Edit users',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'users',
                'name' => 'update-users',
                'display_name' => 'Update users',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'users',
                'name' => 'destroy-users',
                'display_name' => 'Delete users',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        /*
         * Roles:
         * ------
         */

        DB::table('permissions')->insert(
            [
                'model' => 'roles',
                'name' => 'index-roles',
                'display_name' => 'List roles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'roles',
                'name' => 'show-roles',
                'display_name' => 'Show a role',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'roles',
                'name' => 'create-roles',
                'display_name' => 'Create roles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'roles',
                'name' => 'store-roles',
                'display_name' => 'Save roles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'roles',
                'name' => 'edit-roles',
                'display_name' => 'Edit roles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'roles',
                'name' => 'update-roles',
                'display_name' => 'Update roles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'roles',
                'name' => 'destroy-roles',
                'display_name' => 'Delete roles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        /*
         * Permissions:
         * ------------
         */

        DB::table('permissions')->insert(
            [
                'model' => 'permissions',
                'name' => 'index-permissions',
                'display_name' => 'List permissions',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'permissions',
                'name' => 'show-permissions',
                'display_name' => 'Show a permission',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'permissions',
                'name' => 'create-permissions',
                'display_name' => 'Create permissions',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'permissions',
                'name' => 'store-permissions',
                'display_name' => 'Save permissions',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'permissions',
                'name' => 'edit-permissions',
                'display_name' => 'Edit permissions',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'permissions',
                'name' => 'update-permissions',
                'display_name' => 'Update permissions',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        DB::table('permissions')->insert(
            [
                'model' => 'permissions',
                'name' => 'destroy-permissions',
                'display_name' => 'Delete permissions',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }
}
