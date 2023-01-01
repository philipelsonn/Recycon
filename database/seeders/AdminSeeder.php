<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'type' => "USER",
                'username' => "User",
                'email' => "user@gmail.com",
                'password' => Hash::make('password'),
            ],
            [
                'type' => "ADMIN",
                'username' => "Admin",
                'email' => "admin@gmail.com",
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
