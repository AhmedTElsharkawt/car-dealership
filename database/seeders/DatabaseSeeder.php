<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TypesTableSeeder::class,
            MakesTableSeeder::class,
            UsersTableSeeder::class,
            ProductsTableSeeder::class,
            ProductImagesTableSeeder::class,
            AboutTableSeeder::class,
            ServicesTableSeeder::class,
        ]);
    }
}
