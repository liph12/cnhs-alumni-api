<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Madz Dedal',
                'email' => 'madzdedal@gmail.com'
            ],
            [
                'name' => 'Amping Salidaga',
                'email' => 'ampingsalidaga@gmail.com'
            ],
            [
                'name' => 'Betbet Sanico',
                'email' => 'silvestremsanico@gmail.com'
            ],
            [
                'name' => 'Jessa',
                'email' => 'jimbotheodore09@yahoo.com'
            ],
            [
                'name' => 'Philip Libres',
                'email' => 'libresphilip14@gmail.com'
            ],
        ];

        foreach($users as $user)
        {
            $password = Hash::make('assocadmin#2025');
            $user['password'] = $password;

            User::create($user);
        }
    }
}
