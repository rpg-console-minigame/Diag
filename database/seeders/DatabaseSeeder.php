<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sede;

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

        $sedes = [
            ['nombre' => 'Albacete', 'siglas' => 'A'],
            ['nombre' => 'Alicante', 'siglas' => 'AL'],
            ['nombre' => 'Alicante II', 'siglas' => 'ALII'],
            ['nombre' => 'Almería', 'siglas' => 'I'],
            ['nombre' => 'Córdoba', 'siglas' => 'C'],
            ['nombre' => 'Leganés', 'siglas' => 'L'],
            ['nombre' => 'Granada', 'siglas' => 'G'],
            ['nombre' => 'Huelva', 'siglas' => 'H'],
            ['nombre' => 'Jerez', 'siglas' => 'J'],
            ['nombre' => 'Madrid', 'siglas' => 'M'],
            ['nombre' => 'Málaga', 'siglas' => 'MG'],
            ['nombre' => 'Murcia', 'siglas' => 'MU'],
            ['nombre' => 'Sevilla', 'siglas' => 'S'],
            ['nombre' => 'Valencia', 'siglas' => 'V'],
            ['nombre' => 'Zaragoza', 'siglas' => 'Z'],
        ];

        foreach ($sedes as $sede) {
            Sede::create($sede);
        }

        $codificacionMuestras = [
            ['nombre' => 'Biopsias', 'sigla' => 'B'],
            ['nombre' => 'Biopsias veterinarias', 'sigla' => 'BV'],
            ['nombre' => 'Cavidad bucal', 'sigla' => 'CB'],
            ['nombre' => 'Citología vaginal', 'sigla' => 'CV'],
            ['nombre' => 'Extensión sanguínea', 'sigla' => 'EX'],
            ['nombre' => 'Orinas', 'sigla' => 'O'],
            ['nombre' => 'Esputos', 'sigla' => 'E'],
            ['nombre' => 'Semen', 'sigla' => 'ES'],
            ['nombre' => 'Improntas', 'sigla' => 'T'],
            ['nombre' => 'Frotis', 'sigla' => 'F'],
        ];

        foreach ($codificacionMuestras as $codificacionMuestra) {
            \App\Models\Tipo_naturaleza::create($codificacionMuestra);
        }
    }
}
