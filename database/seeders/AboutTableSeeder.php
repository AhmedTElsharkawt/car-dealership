<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
            'owner_name' => 'Ahmed Taha',
            'shop_name' => 'Generic Dealership, Inc.',
            'description' => 'We sell cars!',
            'hours' => 'Sat - Thu - 9a-5p or by appointment!',
            'phone' => '(888)888-1234',
            'address' => '123 Main St. | Anytown, NE 87654',
            'gmap' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110526.8397811121!2d31.29165122612866!3d30.03789801517081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583c1380cba7ef%3A0xd541260e9e06978d!2sNasr%20City%2C%20Cairo%20Governorate%2C%20Egypt!5e0!3m2!1sen!2sus!4v1752786608144!5m2!1sen!2sus',
            'email' => 'anyemail@site.biz',
            'fax' => '(888)888-4321',
        ]);
    }
}
