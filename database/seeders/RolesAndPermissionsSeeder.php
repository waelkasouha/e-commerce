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
        // Create roles
        $ownerRole = Role::create(['name' => 'owner']);
        $adminRole = Role::create(['name' => 'admin']);
        $sellerRole = Role::create(['name' => 'seller']);
        $customerRole = Role::create(['name' => 'customer']);

        // Create permissions
        Permission::create(['name' => 'manage-system']);
        Permission::create(['name' => 'manage-users']);
        Permission::create(['name' => 'manage-categories']);
        Permission::create(['name' => 'manage-brands']);
        Permission::create(['name' => 'manage-products']);
        Permission::create(['name' => 'manage-orders']);
        Permission::create(['name' => 'manage-shopping-carts']);
        Permission::create(['name' => 'manage-own-products']);
        Permission::create(['name' => 'view-own-orders']);
        Permission::create(['name' => 'update-own-orders']);
        Permission::create(['name' => 'browse-products']);
        Permission::create(['name' => 'add-to-cart']);
        Permission::create(['name' => 'place-order']);
        
        $ownerPermissions = [
            'manage-system',
            'manage-users',
            'manage-categories',
            'manage-brands',
            'manage-products',
            'manage-orders',
            'manage-shopping-carts',
        ];

        $adminPermissions = [
            'manage-users',
            'manage-categories',
            'manage-brands',
            'manage-products',
            'manage-orders',
            'manage-shopping-carts',
        ];

        $sellerPermissions = [
            'manage-own-products',
            'view-own-orders',
            'update-own-orders',
        ];

        $customerPermissions = [
            'browse-products',
            'add-to-cart',
            'place-order',
            'view-own-orders',
            'update-own-orders',
        ];

        // Assign permissions to roles
        $ownerRole->syncPermissions($ownerPermissions);
        $adminRole->syncPermissions($adminPermissions);
        $sellerRole->syncPermissions($sellerPermissions);
        $customerRole->syncPermissions($customerPermissions);
    }
}
