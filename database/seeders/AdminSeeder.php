<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $countAdmin = Admin::count();
        // if (!$countAdmin) {
        // create admin account
        $admin = Admin::create([
            'name' => 'super-admin',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // create role super-admin
        // Role::create([
        //     'name' => config('roles.super_admin.roles.name'),
        //     'guard_name' => config('auth.guards.admin.name'),
        // ]);
        // Assign role vao admin account
        $admin->assignRole(config('roles.super_admin.roles'));
        // }
    }
}
