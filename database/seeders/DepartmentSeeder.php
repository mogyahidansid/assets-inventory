<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'ADMIN',
        ]);

        Department::create([
            'name' => 'Procurement Office',
        ]);

        Department::create([
            'name' => 'ED',
        ]);

        Department::create([
            'name' => 'CYE',
        ]);

        Department::create([
            'name' => 'CO',
        ]);
    }
}
