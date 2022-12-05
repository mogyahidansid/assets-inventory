<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\EmployeeInformation;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com ',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        EmployeeInformation::create([
            'firstname' => 'Admin',
            'middlename' => 'Admin',
            'lastname' => 'Admin',
            'address' => 'Admin',
            'contact' => 'Admin',
            'user_id' => $user->id,
            'department_id' => 1,
        ]);

        $user = User::create([
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'password' => Hash::make('password'),
            'role' => 0,
        ]);

        EmployeeInformation::create([
            'firstname' => 'Employee',
            'middlename' => 'Employee',
            'lastname' => 'Employee',
            'address' => 'Employee',
            'contact' => 'Employee',
            'user_id' => $user->id,
            'department_id' => 3,
        ]);
    }
}
