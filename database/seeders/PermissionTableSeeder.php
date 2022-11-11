<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'toe-list',
           'toe-create',
           'toe-edit',
           'toe-delete',
           'toe-close',
           'toe-open',
           'zone-list',
           'zone-create',
           'zone-edit',
           'zone-delete'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
