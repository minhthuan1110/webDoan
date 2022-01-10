<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AboutSeeder::class,
            ContactSeeder::class,
            AreaSeeder::class,
            LocationSeeder::class,
            AttributeSeeder::class,
            PaymentSeeder::class,
            TagSeeder::class,
            VehicleSeeder::class,
            PermissionSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
        ]);
    }
}
