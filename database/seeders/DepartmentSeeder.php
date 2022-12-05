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
            'name' => 'IT Department',
        ]);

        Department::create([
            'name' => 'HR Department',
        ]);

        Department::create([
            'name' => 'Finance Department',
        ]);

        Department::create([
            'name' => 'Marketing Department',
        ]);

        Department::create([
            'name' => 'Sales Department',
        ]);

        Department::create([
            'name' => 'Production Department',
        ]);

        Department::create([
            'name' => 'Accounting Department',
        ]);

        Department::create([
            'name' => 'Purchasing Department',
        ]);

        Department::create([
            'name' => 'Warehouse Department',
        ]);
    }
}
