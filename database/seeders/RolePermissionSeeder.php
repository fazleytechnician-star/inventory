<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        $permissions = ['products-view', 'products-create', 'products-update', 'products-delete'];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions(Permission::all());

        $staff = Role::firstOrCreate(['name' => 'staff']);
        $staff->syncPermissions(['products-view', 'products-create', 'products-update']);

        $viewer = Role::firstOrCreate(['name' => 'viewer']);
        $viewer->syncPermissions(['products-view']);
    }
}
