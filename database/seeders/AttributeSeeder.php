<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::insert([
            [
                'name' => 'included',
                'created_at' => now(),
            ], [
                'name' => 'not included',
                'created_at' => now(),
            ],
        ]);
    }
}
