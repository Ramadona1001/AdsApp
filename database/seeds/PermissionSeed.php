<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'create_ads']);
        Permission::create(['name'=>'update_ads']);
        Permission::create(['name'=>'show_ads']);
        Permission::create(['name'=>'delete_ads']);
        Permission::create(['name'=>'create_roles']);
        Permission::create(['name'=>'update_roles']);
        Permission::create(['name'=>'show_roles']);
        Permission::create(['name'=>'delete_roles']);
        Permission::create(['name'=>'show_permissions']);
        Permission::create(['name'=>'assign_permissions']);
        Permission::create(['name'=>'create_categories']);
        Permission::create(['name'=>'update_categories']);
        Permission::create(['name'=>'show_categories']);
        Permission::create(['name'=>'delete_categories']);
        Permission::create(['name'=>'create_tags']);
        Permission::create(['name'=>'update_tags']);
        Permission::create(['name'=>'show_tags']);
        Permission::create(['name'=>'delete_tags']);
        Permission::create(['name'=>'create_users']);
        Permission::create(['name'=>'update_users']);
        Permission::create(['name'=>'show_users']);
        Permission::create(['name'=>'delete_users']);
    }
}
