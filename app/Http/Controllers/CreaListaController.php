<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\TitoliLibri;
use App\Models\ListaLibri;


class CreaListaController extends Controller
{
    public function index()
    {
        if(!Session::has('user_id')){
            return redirect('/login');
        }
        return view('crea_lista');
    }

    public function getTitoliLibri()
    {
        $titoli = TitoliLibri::select('titolo')->orderBy('numero_uscita')->get();

        $libri = [];

        foreach ($titoli as $titolo) {
            $libri[] = $titolo->titolo;
        }

        return response()->json($libri);
    }

    public function queryListaLibri(Request $request)
    {
        // Recupera l'ID utente dalla sessione
        $user_id = session('user_id');
    
        // Inizializzazione delle variabili delle query
        $query_letti = ListaLibri::select('titolo')
                        ->distinct()
                        ->where('stato', 'letti')
                        ->where('user_id', $user_id);
    
        $query_non_letti = ListaLibri::select('titolo')
                            ->distinct()
                            ->where('stato', 'non_letti')
                            ->where('user_id', $user_id);
    
        $query_non_ricordo = ListaLibri::select('titolo')
                            ->distinct()
                            ->where('stato', 'non_ricordo')
                            ->where('user_id', $user_id);
    
        // Se è stato inviato il parametro nome_lista, aggiungi il filtro alla query
        if ($request->has('nome_lista')) {
            $nome_lista = $request->input('nome_lista');
            $query_letti->where('nome_lista', $nome_lista);
            $query_non_letti->where('nome_lista', $nome_lista);
            $query_non_ricordo->where('nome_lista', $nome_lista);
        }
    
        // Esegui le query e ottieni i risultati
        $libri_letti = $query_letti->get()->pluck('titolo')->toArray();
        $libri_non_letti = $query_non_letti->get()->pluck('titolo')->toArray();
        $libri_non_ricordo = $query_non_ricordo->get()->pluck('titolo')->toArray();

        //senza pluck non mi funzionava... posso provare con altro
        //in sostanza è  per iterare manualmente sui risultati restituiti dai query builder e raccogliere i titoli in un array
        // cioè: 
        /*      $libri_letti = [];
                $result_letti = $query_letti->get();
                foreach ($result_letti as $libro) {
                    $libri_letti[] = $libro->titolo;
                } 
        */
    
        // Restituisci i libri come JSON
        return response()->json([
            "libri_letti" => $libri_letti,
            "libri_non_letti" => $libri_non_letti,
            "libri_non_ricordo" => $libri_non_ricordo
        ]);
    }
    



    public function gestioneListaLibri(Request $request)
    {
        // Recupera l'ID utente dalla sessione
        $user_id = session('user_id');

        $error = '';

        if ($request->isMethod('post')) {
            $nome_lista = $request->input('nome_lista'); // Ottieni il nome della lista dal form

            // Controlla se esiste già una lista con lo stesso nome per lo stesso utente
            $num_liste = ListaLibri::where('user_id', $user_id)
                            ->where('nome_lista', $nome_lista)
                            ->count();

            if ($num_liste > 0) {
                // Modifica una lista esistente
                $libri = TitoliLibri::select('titolo')->get();

                $all_selected = true;
                foreach ($libri as $index => $titolo) {
                    $input_name = 'libro' . $index;
                    if (!$request->has($input_name)) {
                        $all_selected = false;
                        break;
                    }
                }

                if ($all_selected) {
                    foreach ($libri as $index => $titolo) {
                        $input_name = 'libro' . $index;
                        $stato = $request->input($input_name);

                        // Controlla se esiste già una risposta per questo libro nella lista specificata
                        $exists = ListaLibri::where('user_id', $user_id)
                                    ->where('titolo', $titolo->titolo)
                                    ->where('nome_lista', $nome_lista)
                                    ->exists();

                        if ($exists) {
                            // Se esiste già, aggiorna la risposta
                            ListaLibri::where('user_id', $user_id)
                                ->where('titolo', $titolo->titolo)
                                ->where('nome_lista', $nome_lista)
                                ->update(['stato' => $stato]);
                        } else {
                            // Altrimenti, inserisci una nuova risposta nella lista specificata
                            ListaLibri::insert([
                                'titolo' => $titolo->titolo,
                                'stato' => $stato,
                                'user_id' => $user_id,
                                'nome_lista' => $nome_lista
                            ]);
                        }
                    }
                } else {
                    $error = "E' NECESSARIO SELEZIONARE UN'OPZIONE PER OGNI LIBRO";
                }
            } else {
                // Crea una nuova lista
                $libri = TitoliLibri::select('titolo')->get();

                $all_selected = true;
                foreach ($libri as $index => $titolo) {
                    $input_name = 'libro' . $index;
                    if (!$request->has($input_name)) {
                        $all_selected = false;
                        break;
                    }
                }

                if ($all_selected) {
                    foreach ($libri as $index => $titolo) {
                        $input_name = 'libro' . $index;
                        $stato = $request->input($input_name);

                        // Inserisci una nuova lista con il nome specificato
                        ListaLibri::insert([
                            'titolo' => $titolo->titolo,
                            'stato' => $stato,
                            'user_id' => $user_id,
                            'nome_lista' => $nome_lista
                        ]);
                    }
                } else {
                    $error = "E' NECESSARIO SELEZIONARE UN'OPZIONE PER OGNI LIBRO";
                }
            }
        }

        if ($error) {
            return response()->json(['error' => $error]);
        } else {
            return response()->json(['success' => true]);
        }
    }


    public function loadListe(Request $request)
    {
        // Recupera l'ID utente dalla sessione
        $user_id = session('user_id');

        // Query per ottenere i nomi delle liste distinte dell'utente
        $liste = ListaLibri::where('user_id', $user_id)
                    ->distinct()
                    ->select('nome_lista')
                    ->get();

        // Converte i risultati in un array semplice di nomi di lista
        // $liste = [];
        // foreach ($query as $result) {
        //     $liste[] = $result->nome_lista;
        // }

        // Restituisci i nomi delle liste come JSON
        return response()->json($liste);
    }



    public function viewValoriLista(Request $request)
    {
        // Recupera l'ID utente dalla sessione
        $user_id = session('user_id');

        // Recupera il parametro nome_lista dalla richiesta GET
        $nome_lista = $request->query('nome_lista');

        // Query per ottenere i libri della lista specificata
        $query = ListaLibri::where('nome_lista', $nome_lista)
                    ->where('user_id', $user_id)
                    ->select('titolo', 'stato')
                    ->get();

        // Converte i risultati in un array di libri
        $libri = [];
        foreach ($query as $result) {
            $libri[] = [
                "titolo" => $result->titolo,
                "stato" => $result->stato
            ];
        }

        // Restituisci i libri della lista come JSON
        return response()->json($libri);
    }



}
