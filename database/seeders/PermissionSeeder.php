<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add 'super admin' Role
        $superAdminRole = Role::where('name', config('roles.super_admin.roles'))->first();
        if (!$superAdminRole) {
            $superAdminRole = Role::create([
                'name' => config('roles.super_admin.roles'),
                'guard_name' => config('auth.guards.admin.name'),
            ]);
        }

        // Add other Role
        $newRoles = $this->createAdminRoles('roles.admin.roles');
        Role::insert($newRoles);

        // Add full Permissions
        $newPermissions = $this->createAdminPermissions('roles.admin.permissions');
        Permission::insert($newPermissions);

        // Assign permission to 'super admin' role
        $superAdminRole->syncPermissions(config('roles.admin.permissions'));

        // Assign permission to other role
        $configServicePermissions = [
            'add tour',
            'edit tour',
            'delete tour',
            'add image tour',
            'delete image tour',
            'add tour plan',
            'edit tour plan',
            'delete tour plan',

            'add booking',
            'edit booking',
            'delete booking',

            'view transaction',
            'view report',
        ];
        Role::where('name', 'service management')->first()->syncPermissions($configServicePermissions);

        $configCategoryPermissions = [
            'add tag',
            'edit tag',
            'delete tag',

            'add vehicle',
            'edit vehicle',
            'delete vehicle',

            'add slider',
            'edit slider',
            'delete slider',

            'add article',
            'edit article',
            'delete article',

            'add area',
            'edit area',
            'delete area',

            'add location',
            'edit location',
            'delete location',

            'add promotion',
            'edit promotion',
            'delete promotion',

            'add contact',
            'edit contact',
            'delete contact',

            'add about',
            'edit about',
            'delete about',
        ];
        Role::where('name', 'category management')->first()->syncPermissions($configCategoryPermissions);

        $configAccountPermissions = [
            'add account',
            'edit account',
            'decentralization',
        ];
        Role::where('name', 'account management')->first()->syncPermissions($configAccountPermissions);
    }

    /**
     * Get list new permission from file config/roles.php
     * @param string $config
     * @return array
     */
    private function createAdminPermissions(string $config)
    {
        $currentPermissions = Permission::get('name')->pluck('name')->toArray();
        $newPermissions = [];
        $configPermissions = config($config);
        foreach ($configPermissions as $configPermission) {
            if (!in_array($configPermission, $currentPermissions)) {
                $newPermissions[] = [
                    'name' => $configPermission,
                    'guard_name' => config('auth.guards.admin.name'),
                ];
            }
        }

        return $newPermissions;
    }

    /**
     * Get list new admin role from file config/roles.php
     * @param string $config
     * @return array
     */
    private function createAdminRoles(string $config)
    {
        $currentRoles = Role::get('name')->pluck('name')->toArray();
        $newRoles = [];
        $configRoles = config($config);
        foreach ($configRoles as $configRole) {
            if (!in_array($configRole, $currentRoles)) {
                $newRoles[] = [
                    'name' => $configRole,
                    'guard_name' => config('auth.guards.admin.name'),
                ];
            }
        }

        return $newRoles;
    }
}
