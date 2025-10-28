<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Администратор Системы',
            'nickname' => 'administratorov',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Менеджер Системы',
            'nickname' => 'managerov',
            'email' => 'manager@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Василий игроманов',
            'nickname' => 'igromanov',
            'email' => 'igroman@mail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
