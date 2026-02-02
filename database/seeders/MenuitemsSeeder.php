<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemsSeeder extends Seeder
{
    public function run(): void
    {
        $menuItems = [
            [
                'name' => 'BAKSO SPESIAL',
                'category' => 'bakso',
                'description' => 'Bakso gurih + kuah kaldu + sawi + bihun + tahu + telur',
                'price' => 20000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Mie Ayam Biasa',
                'category' => 'mie',
                'description' => 'Mie ayam dengan kaldu gurih dan ayam tender',
                'price' => 15000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Paket Hemat Keluarga',
                'category' => 'paket',
                'description' => '4 porsi bakso untuk keluarga',
                'price' => 70000,
                'image_path' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Es Teh Manis',
                'category' => 'minuman',
                'description' => 'Es teh asli yang segar dan nikmat',
                'price' => 8000,
                'image_path' => null,
                'is_active' => true,
            ],
        ];

        foreach ($menuItems as $item) {
            MenuItem::create($item);
        }
    }
}