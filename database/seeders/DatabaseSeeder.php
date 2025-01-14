<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $formatos = [
            'Fresco',
            'Formol',
            'Etanol 70%'
        ];

        foreach ($formatos as $formato) {
            \App\Models\Formato_muestra::factory()->create([
                'nombre' => $formato
            ]);
        }
    }
}
