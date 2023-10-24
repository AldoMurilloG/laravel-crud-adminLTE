<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $rol_admin = Role::create(['name' => 'admin']);
        $rol_vendedor = Role::create(['name' => 'vendedor']);
        $rol_cliente = Role::create(['name' => 'cliente']);
        // Permisos para cada Rol
        Permission::create(['name' => 'lista_usuarios'])->assignRole($rol_admin);
        Permission::create(['name' => 'lista_productos'])->assignRole($rol_vendedor);
        Permission::create(['name' => 'lista_compras'])->assignRole($rol_cliente);
        //Permission::create(['name' => 'lista_pagos'])->syncRoles([$rol_vendedor,$rol_cliente]);
    }
}
