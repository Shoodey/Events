<?php

use App\Permission;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => "Complete access of administration.",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        foreach(Permission::get() as $permission){
            DB::table('permission_role')->insert(
                [
                    'permission_id' => $permission->id,
                    'role_id' => 1
                ]
            );
        }

        DB::table('role_user')->insert(
            [
                'user_id' => '1',
                'role_id' => '1'
            ]
        );
        DB::table('role_user')->insert(
            [
                'user_id' => '2',
                'role_id' => '1'
            ]
        );
    }
}
