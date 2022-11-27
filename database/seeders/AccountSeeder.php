<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com ',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        User::create([
            'name' => 'Employee',
            'email' => 'employee',
            'password' => Hash::make('password'),
            'role' => 0,
        ]);
    }
}
