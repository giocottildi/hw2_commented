<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\OLSalvato;
use App\Models\Utente;

class OLController extends Controller
{
    public function index()
    {
        if(!Session::has('user_id')){
            return redirect('/login');
        }
        return view('OL_search');
    }
    
    public function indexSave()
    {
        return view ('OL_salvati');
    }

    public function ricercaOL(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $url = "https://openlibrary.org/search.json?q=" . urlencode($query) . "&limit=12";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPGET, true);

            $response = curl_exec($ch);

            if ($response === false) {
                $error = curl_error($ch);
                curl_close($ch);
                return response()->json(['error' => 'Errore nella richiesta cURL: ' . $error]);
            }

            curl_close($ch);

            $data = json_decode($response, true);

            // Ottieni l'ID dell'utente corrente
            $user = session('username'); 
            $userId = Utente::where('username', $user)->value('id');

            if ($userId) {
                // Controlla quali libri sono già salvati dall'utente
                $savedBooks = OLSalvato::where('id_user', $userId)
                                ->whereIn('title', array_column($data['docs'], 'title_suggest'))
                                ->pluck('title')
                                ->toArray();

                // Aggiungi informazione di salvataggio ai risultati
                foreach ($data['docs'] as &$book) {
                    $book['is_saved'] = in_array($book['title_suggest'], $savedBooks);
                }
            }


            return response()->json($data);
        } else {
            return response()->json(['error' => 'Search query is required']);
        }
    }

    public function addSaveBook(Request $request)
    {
        // Recupero dei dati JSON inviati
        $data = $request->json()->all();

        // Validazione dei dati ricevuti
        if (!isset($data['cover_id']) || !isset($data['title']) || !isset($data['author']) || !isset($data['publishYear'])) {
            return response()->json(['success' => false, 'message' => 'Dati mancanti']);
        }

        // Escape delle variabili per evitare SQL injection
        $user = session('username'); // Recupera l'username dalla sessione

        // Ottieni l'ID dell'utente
        $userId = Utente::where('username', $user)->value('id');

        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Nessun utente trovato']);
        }

        // Inserisci il libro salvato nel database
        $inserted = OLSalvato::insert([
            'id_user' => $userId,
            'title' => $data['title'],
            'cover_id' => $data['cover_id'],
            'autore' => $data['author'],
            'anno_pubblicazione' => intval($data['publishYear'])
        ]);

        if ($inserted) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Errore durante l\'inserimento nel database']);
        }
    }


    public function deleteSaveBook(Request $request)
    {
        // Recupero dei dati JSON inviati
        $data = $request->json()->all();

        // Validazione dei dati ricevuti
        if (!isset($data['cover_id']) || !isset($data['title'])) {
            return response()->json(['success' => false, 'message' => 'Dati mancanti']);
        }

        // Recupera l'username dall'autenticazione o dalla sessione
        $user = session('username'); // Supponendo che l'username sia salvato nella sessione

        // Ottieni l'ID dell'utente
        $userId = Utente::where('username', $user)->value('id');

        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Nessun utente trovato'],);
        }

        // Elimina il libro salvato dal database
        $deleted = OLSalvato::where('id_user', $userId)
                    ->where('title', $data['title'])
                    ->where('cover_id', $data['cover_id'])
                    ->delete();

        if ($deleted) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Errore durante l`eliminazione nel database']);
        }
    }


    public function selectSaveBook()
    {
        // Escape delle variabili per evitare SQL injection
        $user = session('username'); // Recupera l'username dalla sessione

        // Ottieni l'ID dell'utente
        $userId = Utente::where('username', $user)->value('id');

        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Nessun utente trovato']);
        }

        // Esegui la query per recuperare i libri salvati per l'utente
        $books = OLSalvato::where('id_user', $userId)
                         ->select('title', 'cover_id', 'autore', 'anno_pubblicazione')
                         ->get();

        if ($books->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Nessun libro salvato trovato']);
        }

        return response()->json(['success' => true, 'books' => $books]);
    }




}
