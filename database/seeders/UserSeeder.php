<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password123'),
                'name' => 'Administrator',
                'role' => 'admin',
            ],
            [
                'username' => 'rill',
                'email' => 'aril@gmail.com',
                'password' => Hash::make('password123'),
                'name' => 'Aril',
                'role' => 'user',
            ]
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
