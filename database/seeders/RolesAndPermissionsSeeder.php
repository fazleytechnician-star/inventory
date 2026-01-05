<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'products-view',
            'products-create',
            'products-update',
            'products-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $staff = Role::firstOrCreate(['name' => 'staff']);
        $viewer = Role::firstOrCreate(['name' => 'viewer']);

        $admin->givePermissionTo($permissions);
        $staff->givePermissionTo(['products-view', 'products-create', 'products-update']);
        $viewer->givePermissionTo(['products-view']);
    }
}

