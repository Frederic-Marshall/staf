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
            'name' => 'Автор',
            'nickname' => 'avtorov',
            'email' => 'avtor@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Главный Менеджер',
            'nickname' => 'glav_managerov',
            'email' => 'manager@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Менеджер Контента',
            'nickname' => 'content_manager',
            'email' => 'conmanager@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Обычный пользователь',
            'nickname' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
