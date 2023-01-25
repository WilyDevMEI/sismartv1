<?php

namespace Database\Seeders;

use App\Models\Plantest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CUSTOMER
        Permission::create(['name' => 'create customer']);
        Permission::create(['name' => 'read customer']);
        Permission::create(['name' => 'edit customer']);
        Permission::create(['name' => 'delete customer']);

        // PRODUCT
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'read product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);

        // RELATIONSHIP
        Permission::create(['name' => 'create relationship']);
        Permission::create(['name' => 'read relationship']);
        Permission::create(['name' => 'edit relationship']);
        Permission::create(['name' => 'delete relationship']);

        // MAPPING
        Permission::create(['name' => 'create mapping']);
        Permission::create(['name' => 'read mapping']);
        Permission::create(['name' => 'edit mapping']);
        Permission::create(['name' => 'delete mapping']);

        // INTRODUCTION
        Permission::create(['name' => 'create introduction']);
        Permission::create(['name' => 'read introduction']);
        Permission::create(['name' => 'edit introduction']);
        Permission::create(['name' => 'delete introduction']);

        // PENETRATION
        Permission::create(['name' => 'create penetration']);
        Permission::create(['name' => 'read penetration']);
        Permission::create(['name' => 'edit penetration']);
        Permission::create(['name' => 'delete penetration']);

        // PLANTEST
        Permission::create(['name' => 'create plantest']);
        Permission::create(['name' => 'read plantest']);
        Permission::create(['name' => 'edit plantest']);
        Permission::create(['name' => 'delete plantest']);

        // QUOTATION
        Permission::create(['name' => 'create quotation']);
        Permission::create(['name' => 'read quotation']);
        Permission::create(['name' => 'edit quotation']);
        Permission::create(['name' => 'delete quotation']);

        // DEAL
        Permission::create(['name' => 'create deal']);
        Permission::create(['name' => 'read deal']);
        Permission::create(['name' => 'edit deal']);
        Permission::create(['name' => 'delete deal']);

        // SUPPLY
        Permission::create(['name' => 'create supply']);
        Permission::create(['name' => 'read supply']);
        Permission::create(['name' => 'edit supply']);
        Permission::create(['name' => 'delete supply']);

        // MAINTENANCE
        Permission::create(['name' => 'create maintenance']);
        Permission::create(['name' => 'read maintenance']);
        Permission::create(['name' => 'edit maintenance']);
        Permission::create(['name' => 'delete maintenance']);

        // USER
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        // ROLE
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'read role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']);

        // PERMISSION
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'read permission']);
        Permission::create(['name' => 'edit permission']);
        Permission::create(['name' => 'delete permission']);
    }
}
