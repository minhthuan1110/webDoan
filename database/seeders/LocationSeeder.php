<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::insert([
            [
                'area_id' => 1,
                'name' => 'Hà Nội',
                'created_at' => now(),
            ], [
                'area_id' => 2,
                'name' => 'Đà Nẵng',
                'created_at' => now(),
            ], [
                'area_id' => 3,
                'name' => 'Hồ Chí Minh',
                'created_at' => now(),
            ],
        ]);
    }
}
