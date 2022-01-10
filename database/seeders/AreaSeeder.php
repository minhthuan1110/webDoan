<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::insert([
            [
                'name' => 'Miền Bắc',
                'created_at' => now(),
            ], [
                'name' => 'Miền Trung',
                'created_at' => now(),
            ], [
                'name' => 'Miền Nam',
                'created_at' => now(),
            ],
        ]);
    }
}
