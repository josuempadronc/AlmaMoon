<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin'], //1
            ['name' => 'Almacen'], //2
            ['name' => 'Inyeccion'], //3
            ['name' => 'Ensamble'], //4
            ['name' => 'Transporte'], //5
            ['name' => 'Metal Mecanica'], //6
            ['name' => 'Mantenimiento'], //7
            ['name' => 'Recursos Humanos'], //8
            ['name' => 'Administracion'], //9
            ['name' => 'Ventas'], //10
            // Agrega más roles si es necesario
        ];

        DB::table('roles')->insert($roles);
    }
}
