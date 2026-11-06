<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'manage students',
            'manage lecturers',
            'manage courses',
            'manage registrations',
            'manage users',
            'view assigned courses',
            'view course students',
            'view available courses',
            'view own registrations',
            'register courses',
        ];

        foreach ($permissions as $name) {
            Permission::findOrCreate($name, 'web');
        }

        Role::findOrCreate('admin', 'web')->syncPermissions([
            'manage students',
            'manage lecturers',
            'manage courses',
            'manage registrations',
            'manage users',
        ]);

        Role::findOrCreate('lecturer', 'web')->syncPermissions([
            'view assigned courses',
            'view course students',
        ]);

        Role::findOrCreate('student', 'web')->syncPermissions([
            'view available courses',
            'view own registrations',
            'register courses',
        ]);
    }
}
