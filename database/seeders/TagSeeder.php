<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::insert([
            [
                'name' => 'hot',
                'created_at' => now(),
            ], [
                'name' => 'new',
                'created_at' => now(),
            ],
        ]);
    }
}
