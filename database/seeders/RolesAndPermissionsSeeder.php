<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();





        // ==================== (Permissions) ======================\\

        // Post Permission
        Permission::create(['name' => 'View Posts']);
        Permission::create(['name' => 'Create And Modify Posts']);


        // Category Permission
        Permission::create(['name' => 'View Categories']);
        Permission::create(['name' => 'Create And Modify Categories']);

        // User Permission
        Permission::create(['name' => 'View Users']);
        Permission::create(['name' => 'Create And Modify Users']);



        // Role & Permission
        // Permission::create(['name' => 'Modify Roles And Permission To Users']);


        // ==================== (Roles) ======================\\
        // Role::create(['name' => 'Viewer'])->givePermissionTo([
        //     // Posts
        //     'View Posts',
        //     // Categories
        //     'View Categories',
        //     // Users
        //     'View Users',

        // ]);
        Role::create(['name' => 'Editor'])->givePermissionTo([
            // Posts
            'View Posts',
            'Create And Modify Posts',
            // Categories
            'View Categories',
            'Create And Modify Categories',
            // Users
            'View Users',
        ]);

        // Admin Can Access All Permissions
        Role::create(['name' => 'Admin'])->givePermissionTo(Permission::all());
    }
}