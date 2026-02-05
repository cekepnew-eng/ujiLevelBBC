<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing menu items
        DB::table('menu_items')->delete();

        $menuItems = [
            // Bakso Variants
            [
                'name' => 'Bakso Urat',
                'category' => 'bakso',
                'description' => 'Bakso dengan daging urat pilihan yang kenyal dan gurih',
                'price' => 25000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bakso Halus',
                'category' => 'bakso',
                'description' => 'Bakso dengan tekstur halus dan lembut',
                'price' => 23000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bakso Jumbo',
                'category' => 'bakso',
                'description' => 'Bakso ukuran jumbo dengan daging lebih banyak',
                'price' => 35000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bakso Telur',
                'category' => 'bakso',
                'description' => 'Bakso dengan isian telur rebus di dalamnya',
                'price' => 28000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bakso Beranak',
                'category' => 'bakso',
                'description' => 'Bakso besar dengan bakso kecil di dalamnya',
                'price' => 32000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Mie Variants
            [
                'name' => 'Mie Ayam',
                'category' => 'mie',
                'description' => 'Mie ayam dengan topping ayam suwir dan sayuran',
                'price' => 22000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mie Ayam Bakso',
                'category' => 'mie',
                'description' => 'Kombinasi mie ayam dengan bakso',
                'price' => 28000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mie Goreng',
                'category' => 'mie',
                'description' => 'Mie goreng dengan topping ayam dan sayuran',
                'price' => 20000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kwetiau Goreng',
                'category' => 'mie',
                'description' => 'Kwetiau goreng dengan seafood dan sayuran',
                'price' => 25000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mie Rebus',
                'category' => 'mie',
                'description' => 'Mie rebus dengan kaldu gurih',
                'price' => 18000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Minuman Variants
            [
                'name' => 'Es Teh Manis',
                'category' => 'minuman',
                'description' => 'Teh manis dingin yang segar',
                'price' => 8000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Teh Tawar',
                'category' => 'minuman',
                'description' => 'Teh tawar dingin tanpa gula',
                'price' => 6000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teh Hangat',
                'category' => 'minuman',
                'description' => 'Teh hangat yang nikmat',
                'price' => 5000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Jeruk',
                'category' => 'minuman',
                'description' => 'Jeruk segar dengan es',
                'price' => 10000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Campur',
                'category' => 'minuman',
                'description' => 'Campuran buah segar dengan es dan susu',
                'price' => 15000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jus Alpukat',
                'category' => 'minuman',
                'description' => 'Jus alpukat segar dengan susu',
                'price' => 18000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jus Mangga',
                'category' => 'minuman',
                'description' => 'Jus mangga manis dan segar',
                'price' => 16000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Tambahan Variants
            [
                'name' => 'Bakso Mercon',
                'category' => 'bakso',
                'description' => 'Bakso pedas dengan cabai mercon',
                'price' => 30000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bakso Iga',
                'category' => 'bakso',
                'description' => 'Bakso dengan iga sapi yang empuk',
                'price' => 45000,
                'image_path' => null,
                'is_recommended' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mie Aceh',
                'category' => 'mie',
                'description' => 'Mie khas Aceh dengan bumbu rempah',
                'price' => 30000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Teh Lemon',
                'category' => 'minuman',
                'description' => 'Teh dengan perasan lemon segar',
                'price' => 12000,
                'image_path' => null,
                'is_recommended' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('menu_items')->insert($menuItems);
    }
}
