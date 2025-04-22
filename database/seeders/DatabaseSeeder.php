<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'last_education' => 'D3',
                'position' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('14062003'),
                'role' => 'admin',
            ],
        ];
        foreach($userData as $key =>$val){
            User::create($val);
        }
    }
}