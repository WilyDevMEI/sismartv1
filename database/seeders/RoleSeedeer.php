<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Directur']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Head Departement']);
        Role::create(['name' => 'Sales & Marketing']);
        $admin = Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Staff']);

        $super_admin->givePermissionTo(Permission::all());
        $admin->givePermissionTo(Permission::all());
    }
}
