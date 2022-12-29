<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventories = [
            [
                'asset_id' => 1,
                'inventory_code' => 'IMAN-003',
                'is_bundle' => false,
            ],
            [
                'asset_id' => 2,
                'inventory_code' => 'IMAN-002',
                'is_bundle' => false,
            ],
            [
                'asset_id' => 3,
                'inventory_code' => 'IMAN-001',
                'is_bundle' => false,
            ],
            [
                'asset_id' => 4,
                'inventory_code' => 'IMAN-002-A',
                'is_bundle' => false,
            ],
            [
                'asset_id' => 5,
                'inventory_code' => 'IMAN-001-A',
                'is_bundle' => false,
            ],
            [
                'asset_id' => 6,
                'inventory_code' => 'IMAN-001-B',
                'is_bundle' => false,
            ],
            [
                'asset_id' => 7,
                'inventory_code' => 'IMAN-001-C',
                'is_bundle' => false,
            ],
            [
                'asset_id' => 8,
                'inventory_code' => 'IMAN-001-D',
                'is_bundle' => false,
            ],
            [
                'asset_id' => 9,
                'inventory_code' => 'IMAN-003',
                'is_bundle' => false,
            ],
            [
                'asset_id' => 10,
                'inventory_code' => 'IMAN-007',
                'is_bundle' => false,
            ],
            [
                'asset_id' => 11,
                'inventory_code' => 'IMAN-001-E',
                'is_bundle' => false,
            ],
        ];

        foreach ($inventories as $key => $value) {
            Inventory::create($value);
        }
    }
}
