<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;

class GutenbergController extends Controller
{
    public function index()
    {
        return view('index', [
            'books' => null
        ]);
    }
    
    public function search(Request $request)
    {
        $topic = $request->input('topic');
        $language = $request->input('language');
    
        // Esegui la ricerca su Gutenberg
        $restUrl = 'https://gutendex.com/books/?topic=' . urlencode($topic) . '&language=' . urlencode($language);
        $response = Http::get($restUrl);
    
        // Inizializza $books a null per default
        $books = null;
    
        // Verifica la risposta
        if ($response->successful()) {
            $books = $response->json();
    
            // Limita a massimo 10 risultati
            if (isset($books['results'])) {
                $books['results'] = array_slice($books['results'], 0, 10);
            }

            // Memorizza i valori dell'ultima ricerca nella sessione
            Session::put('lastTopic', $topic);
            Session::put('lastLanguage', $language);
            Session::put('searched', true);
        }
    
        // Carica i risultati nella vista
        return view('index', [
            'books' => $books,
            'lastTopic' => Session::get('lastTopic'),
            'lastLanguage' => Session::get('lastLanguage'),
            
        ]);
    }
    
}