<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Only seed available seeders to avoid missing class errors
            MenuItemsSeeder::class,
        ]);
    }
}