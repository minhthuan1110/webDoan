<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::insert([
            'name' => 'Hà Nội',
            'email' => 'vietour@gmail.com',
            'phone' => '0998887766',
            'address' => 'Mỹ Đình - Nam Từ Liêm - Hà Nội',
        ]);
    }
}
