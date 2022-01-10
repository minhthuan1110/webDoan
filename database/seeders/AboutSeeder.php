<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
            'about_us' => 'Giới thiệu về VieTour',
            'facebook' => 'https://www.facebook.com',
            'youtube' => 'https://www.youtube.com',
            'instagram' => 'https://www.instagram.com',
            'twitter' => 'https://www.twitter.com',
            'pinterest' => 'https://www.pinterest.com',
        ]);
    }
}
