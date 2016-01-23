<?php

use App\User;
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
        DB::table('users')->insert(
            [
                'name' => 'shoodey',
                'email' => 'shoodey@gmail.com',
                'password' => bcrypt('230074'),
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@uir-events.com',
                'password' => bcrypt('admin'),
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        DB::table('users')->insert(
            [
                'name' => 'user',
                'email' => 'user@uir-events.com',
                'password' => bcrypt('user'),
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        factory(User::class, 2)->create();
    }
}
