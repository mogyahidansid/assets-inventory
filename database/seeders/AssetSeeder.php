<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assets = [
            [
                'name' => 'Black Camera Nikon',
                'description' => '1 Set CAMERA NIKON D5600 W/MEMORY CARD & CAMERA BAG',
                'price' => '36970',
                'remarks' => 1,
                'serial_number' => '8258569 MISS',
                'category_id' => 1,
            ],
            [
                'name' => 'BLACK CAMERA CANON EOS300D',
                'description' => '1 Set CAMERA CANON 300D',
                'price' => '21450',
                'remarks' => 1,
                'serial_number' => '198070002162  MISS',
                'category_id' => 1,
            ],
            [
                'name' => 'EPSON LCD PROJECTOR',
                'description' => '1 Set WHITE EPSON LCD PROJECTOR  W/REMOTE CONTROL & BAG. EB-S41 MODELH842C W/REMOTE 218178800 & BLACK BAG',
                'price' => '21990',
                'remarks' => 1,
                'serial_number' => 'X4HL9900319/C634D MISS',
                'category_id' => 2,
            ],
            [
                'name' => 'EPSON LCD PROJECTOR',
                'description' => '1 Set WHITE EPSON LCD PROJECTOR  W/REMOTE CONTROL & BAG',
                'price' => '21990',
                'remarks' => 1,
                'serial_number' => 'X4HL9900254/C634D MISS',
                'category_id' => 2,
            ],
            [
                'name' => 'PROJECTOR',
                'description' => '1 Set PROJECTOR WITH BAG',
                'remarks' => 1,
                'serial_number' => 'PROJECTORE 1-IMAN PRO',
                'category_id' => 2,
            ],
            [
                'name' => 'PROJECTOR',
                'description' => '1 Set PROJECTOR WITH BAG',
                'remarks' => 1,
                'serial_number' => 'PROJECTORE 2-IMAN PRO S/NWDWK6900448',
                'category_id' => 2,
            ],
            [
                'name' => 'PROJECTOR',
                'description' => '1 Set PROJECTOR WITH BAG',
                'remarks' => 1,
                'serial_number' => 'PROJECTOR 3-IMAN S/NX4HL9900254',
                'category_id' => 2,
            ],
            [
                'name' => 'PROJECTOR',
                'description' => '1 Set PROJECTOR WITH BAG',
                'remarks' => 1,
                'serial_number' => 'PROJECTOR 4-IMAN S/NX4HL9900319',
                'category_id' => 2,
            ],
            [
                'name' => 'EPSON L3110',
                'description' => '1 SET PRINTED EPSON L3110',
                'price' => '7595',
                'remarks' => 1,
                'serial_number' => 'X5DY235360/C634D',
                'category_id' => 3,
            ],
            [
                'name' => 'COMPUTER DESKTOP',
                'description' => '1 SET COMPUTER DISKTOP PHILIPS W/LCD MONITOR,CPU EXTREME POWER CASE & AVR  INCLUSIVE MOUSE PAD ,KEYBOARD , 1  PAIR SPEAKER MOUSE',
                'price' => '21210',
                'remarks' => 1,
                'serial_number' => 'ZVOA19007006639 (LCDMONITOR) CPU 0338449 CONTROL #12456',
                'category_id' => 4,
            ],
            [
                'name' => 'PROJECTOR',
                'description' => '1 SET EPSON LCD PROJECTOR W/B.BAG &COMPLETE CORD&REMOTE(IMAN-001 OLD FILE',
                'remarks' => 1,
                'serial_number' => 'TUNK42015C9',
                'category_id' => 2,
            ],
        ];

        foreach ($assets as $key => $value) {
            Asset::create($value);
        }
    }
}
