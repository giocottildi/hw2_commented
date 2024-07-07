<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitoliLibriSeeder extends Seeder
{
    public function run()
    {
        // Esempio di dati da inserire
        $titoli = [
            [
                'titolo' => 'Il mastino dei Baskerville',
                'numero_uscita' => '1',
                'data_uscita' => '2023-04-01',
            ],
            [
                'titolo' => 'Uno Studio in Rosso',
                'numero_uscita' => '2',
                'data_uscita' => '2023-04-08',
            ],
            [
                'titolo' => 'Il Segno dei Quattro',
                'numero_uscita' => '3',
                'data_uscita' => '2023-04-15',
            ],
            [
                'titolo' => 'Uno Scandalo in Boemia',
                'numero_uscita' => '4',
                'data_uscita' => '2023-04-22',
            ],
            [
                'titolo' => 'Il Carbonchio Azzurro',
                'numero_uscita' => '5',
                'data_uscita' => '2023-04-29',
            ],
            [
                'titolo' => 'Wisteria Lodge',
                'numero_uscita' => '10',
                'data_uscita' => '2023-05-25',
            ],
            [
                'titolo' => 'La casa vuota',
                'numero_uscita' => '8',
                'data_uscita' => '2023-05-01',
            ],
            [
                'titolo' => 'Charles Augustus Milverton',
                'numero_uscita' => '9',
                'data_uscita' => '2023-05-08',
            ],
            [
                'titolo' => 'Barbaglio d`Argento',
                'numero_uscita' => '6',
                'data_uscita' => '2023-04-29',
            ],
            [
                'titolo' => 'Il problema finale',
                'numero_uscita' => '7',
                'data_uscita' => '2023-04-30',
            ],
        ];

        DB::table('titoli_libri')->insert($titoli);
    }
}








