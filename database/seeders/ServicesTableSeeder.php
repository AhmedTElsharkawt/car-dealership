<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Inspections',
        ]);
        DB::table('services')->insert([
            'name' => 'Brakes',
        ]);
        DB::table('services')->insert([
            'name' => 'Mufflers',
        ]);
    }
}
