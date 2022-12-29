<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'CAMERA']);
        Category::create(['name' => 'PROJECTOR']);
        Category::create(['name' => 'PRINTER']);
        Category::create(['name' => 'COMPUTER']);
        Category::create(['name' => 'LAPTOP']);
        Category::create(['name' => 'RADIO']);
    }
}
