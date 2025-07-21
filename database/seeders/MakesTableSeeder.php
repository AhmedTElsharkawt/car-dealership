<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('makes')->insert([
            'name' => 'Chevy',
            'type_id' => 1,
        ]);
        DB::table('makes')->insert([
            'name' => 'Dodge',
            'type_id' => 1,
        ]);
        DB::table('makes')->insert([
            'name' => 'Chevy',
            'type_id' => 2,
        ]);
        DB::table('makes')->insert([
            'name' => 'Box Trucks',
            'type_id' => 3,
        ]);
        DB::table('makes')->insert([
            'name' => 'Pontiac',
            'type_id' => 2,
        ]);
    }
}
