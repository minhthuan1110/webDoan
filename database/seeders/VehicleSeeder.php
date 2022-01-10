<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::insert([
            [
                'name' => 'Xe máy',
                'created_at' => now(),
            ], [
                'name' => 'Ô tô',
                'created_at' => now(),
            ], [
                'name' => 'Máy bay',
                'created_at' => now(),
            ],
        ]);
    }
}
