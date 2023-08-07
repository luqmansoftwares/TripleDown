<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Rehan',
                'email' => 'rehan@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => 0,

            ],
            [
                'name' => 'Luqman',
                'email' => 'luqman@gmail.com',
                'password' => Hash::make("password"),
                'is_admin' =>1,

            ]



        ]);
    }
}
