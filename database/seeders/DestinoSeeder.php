<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('destinos')->insert(
            [
                'nombre' => 'Gasto',
                'descripcion' => 'Gasto',
            ],
            [
                'nombre' => 'Inventario',
                'descripcion' => 'Inventario',
            ]
        );
    }
}
