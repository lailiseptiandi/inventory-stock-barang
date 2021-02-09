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
        // kategori
        Permission::create(['name' => 'categories.index']);
        Permission::create(['name' => 'categories.create']);
        Permission::create(['name' => 'categories.edit']);
        Permission::create(['name' => 'categories.delete']);

        // produk
        Permission::create(['name' => 'products.index']);
        Permission::create(['name' => 'products.create']);
        Permission::create(['name' => 'products.edit']);
        Permission::create(['name' => 'products.delete']);

        // produk
        Permission::create(['name' => 'productsIn.index']);
        Permission::create(['name' => 'productsIn.create']);
        Permission::create(['name' => 'productsIn.edit']);
        Permission::create(['name' => 'productsIn.delete']);

        // produk
        Permission::create(['name' => 'productsOut.index']);
        Permission::create(['name' => 'productsOut.create']);
        Permission::create(['name' => 'productsOut.edit']);
        Permission::create(['name' => 'productsOut.delete']);

        // customer
        Permission::create(['name' => 'customers.index']);
        Permission::create(['name' => 'customers.create']);
        Permission::create(['name' => 'customers.edit']);
        Permission::create(['name' => 'customers.delete']);

        // sales
        Permission::create(['name' => 'sales.index']);
        Permission::create(['name' => 'sales.create']);
        Permission::create(['name' => 'sales.edit']);
        Permission::create(['name' => 'sales.delete']);

        // suplier
        Permission::create(['name' => 'suppliers.index']);
        Permission::create(['name' => 'suppliers.create']);
        Permission::create(['name' => 'suppliers.edit']);
        Permission::create(['name' => 'suppliers.delete']);

        // roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);

        // permission
        Permission::create(['name' => 'permissions.index']);

        // users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
    }
}
