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
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],
            [
                'name' => 'Emp Employee',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('password'),
                'role' => 0
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
