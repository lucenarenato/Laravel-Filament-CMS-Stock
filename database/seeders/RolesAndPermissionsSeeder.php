<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::createOrFirst(['name' => 'admin', 'guard_name' => 'web']);

        $array = [
            'view-any User',
            'view User',
            'create User',
            'update User',
            'delete User',
            'restore User',
            'force-delete User',

            'view-any Role',
            'view Role',
            'create Role',
            'update Role',
            'delete Role',
            'restore Role',
            'force-delete Role',

            'view-any Permission',
            'view Permission',
            'create Permission',
            'update Permission',
            'delete Permission',
            'restore Permission',
        ];

        foreach ($array as $permission) {
            Permission::createOrFirst(['name' => $permission, 'guard_name' => 'web']);
        }

        $role->givePermissionTo(Permission::all());
    }
}
