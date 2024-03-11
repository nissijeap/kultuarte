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
        $artist = Role::create(['name' => 'Artist']);
        $cultural_organization = Role::create(['name' => 'Cultural Organization']);

        $artist->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-product',
            'edit-product',
            'delete-product'
        ]);

        $cultural_organization->givePermissionTo([
            'create-product',
            'edit-product',
            'delete-product'
        ]);
    }
}
