<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'none',
                'email' => 'none',
                'password' => '123456',
                'phone' => '0000000000',
                'created_at' => now(),
            ],
            // [
            //     'name' => 'user01',
            //     'email' => 'user01@mail.xxx',
            //     'password' => Hash::make('123456'),
            //     'phone' => '0123456788',
            //     'created_at' => now(),
            // ],
        ];
        User::insert($data);
    }
}
