<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Carlos',
            'email' => 'carlos@email.com',
            'cargo' => 'Administrator',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Edgar',
            'email' => 'edgar@email.com',
            'cargo' => 'Editor',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Luana',
            'email' => 'luana@email.com',
            'cargo' => 'Moderator',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Bruno',
            'email' => 'bruno@email.com',
            'cargo' => 'User',
            'password' => bcrypt('123456'),
        ]);
    }
}
