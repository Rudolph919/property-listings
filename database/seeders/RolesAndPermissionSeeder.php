<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-listing']);
        Permission::create(['name' => 'edit-listing']);
        Permission::create(['name' => 'delete-listing']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);

        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        $adminRole->givePermissionTo([
            'create-listing',
            'edit-listing',
            'delete-listing',
            'create-user',
            'edit-user',
            'delete-user',
        ]);

        $userRole->givePermissionTo([
            'create-listing',
            'edit-listing',
            'edit-user',
        ]);



    }
}
