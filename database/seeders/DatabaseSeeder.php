<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear los roles
        $adminRole = \App\Models\Rol::firstOrCreate(['nombre' => 'admin'], ['descripcion' => 'Administrador']);
        $clienteRole = \App\Models\Rol::firstOrCreate(['nombre' => 'cliente'], ['descripcion' => 'Cliente']);

        // 2. Crear el usuario administrador
        \App\Models\Usuario::firstOrCreate(
            ['email' => 'admin@tienda.com'], // Busca por email para no duplicar
            [
                'nombre' => 'Admin',
                'apellido' => 'Principal',
                'password' => bcrypt('12345678'),
                'rol_id' => $adminRole->id,
            ]
        );
    }

    
}
