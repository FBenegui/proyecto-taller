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
            ['email' => 'admin@tienda.com'],
            [
                'nombre' => 'Admin',
                'apellido' => 'Principal',
                'password' => bcrypt('12345678'),
                'rol_id' => $adminRole->id,
            ]
        );

        \App\Models\Usuario::firstOrCreate(
            ['email' => 'cliente@tienda.com'],
            [
                'nombre' => 'Usuario',
                'apellido' => 'Prueba',
                'password' => bcrypt('12345678'),
                'rol_id' => $clienteRole->id,
            ]
        );
        
        // Crear categorías iniciales
        \App\Models\Categoria::firstOrCreate(['slug' => 'yerba'], ['nombre' => 'Yerba', 'slug' => 'yerba']);
        \App\Models\Categoria::firstOrCreate(['slug' => 'mates'], ['nombre' => 'Mates', 'slug' => 'mates']);
        \App\Models\Categoria::firstOrCreate(['slug' => 'bombillas'], ['nombre' => 'Bombillas', 'slug' => 'bombillas']);
        \App\Models\Categoria::firstOrCreate(['slug' => 'materas'], ['nombre' => 'Materas', 'slug' => 'materas']);
    }

    
}
