<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@teste.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Bibliotecário',
            'email' => 'library@teste.com',
            'password' => Hash::make('123456'),
            'role' => 'library',
        ]);

        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@teste.com',
            'password' => Hash::make('123456'),
            'role' => 'client',
        ]);
    }
}
