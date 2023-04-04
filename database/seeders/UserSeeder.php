<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' =>'管理者',
            'email' =>'admin@example.com',
            'password'=>Hash::make('password'),
            'role' =>'admin',
        ]);
        User::create([
            'name' =>'test',
            'email' =>'test@example.com',
            'password'=>Hash::make('password'),
            'role' =>'user',
        ]);
    }
}
