<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TitoliLibri;

class HomeController extends Controller
{
    public function index()
    {
        $username = session('username');
        return view('index', ['username' => $username]);
    }


    public function getTitoliLibri()
    {
        // Esegui la query per ottenere i titoli dei libri
        $titoliLibri = TitoliLibri::select('titolo', 'numero_uscita')
                                  ->selectRaw("DATE_FORMAT(data_uscita, '%d/%m/%Y') AS data_uscita_format")
                                  ->orderBy('numero_uscita')
                                  ->get();

        // Restituisci i dati in formato JSON
        return response()->json($titoliLibri);
        
    }

    // Mi serviva droppare i record per effettuare una modifica sul tipo di un attributo

    // public function dropTitoliLibriRecords()
    // {
    //     TitoliLibri::truncate();
    //     return 'Records droppati con successo.';
    // }

}


