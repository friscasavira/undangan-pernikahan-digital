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
        $Users = [
            [
             'username' => 'admin1',
             'email' => 'Admin1@example.cm',
             'password' => Hash::make('password123'),
             'role' => 'admin',
            ],
            
             [
             'username' => 'admin2',
             'email' => 'Admin2@example.com',
             'password' => Hash::make('password123'),
             'role' => 'pengguna',
             ]
            ];
            foreach ($Users as $user){
                User::create($user);
            }
    }
}
