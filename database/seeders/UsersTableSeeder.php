<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'name' => 'Admin',
        ]);

    }
}
