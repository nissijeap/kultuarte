<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $productManager = Role::create(['name' => 'Product Manager']);

        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-product',
            'edit-product',
            'delete-product',
            'create-category',
            'edit-category',
            'delete-category',
            'create-post',
            'edit-post',
            'delete-post',
            'create-post-media',
            'edit-post-media',
            'delete-post-media',
        ]);

        $productManager->givePermissionTo([
            'create-product',
            'edit-product',
            'delete-product'
        ]);
    }
}