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
            ['name' => 'Admin'],
            ['name' => 'Almacen'],
            ['name' => 'Inyeccion'],
            ['name' => 'Ensamble'],
            // ['name' => 'Ensamble'],
            ['name' => 'Transporte'],
            ['name' => 'Metal Mecanica'],
            // Agrega más roles si es necesario
        ];

        DB::table('roles')->insert($roles);
    }
}
