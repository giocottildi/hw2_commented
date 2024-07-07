<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\RicercaSpotify;
use App\Models\Utente;

class SpotifyController extends Controller
{
    public function index()
    {
        if(!Session::has('user_id')){
            return redirect('/login');
        }
        return view('/spotify');
    }

    
    public function addCronologia(Request $request)
    {
        // Ottieni i dati dalla richiesta
        $data = $request->json()->all();

        // Ottieni l'utente dalla sessione
        $user = Session::get('username');

        // Controlla se l'utente è nella sessione
        if (!$user) {
            echo json_encode([
                "username" => false,
                "save" => false
            ]);
            return;
        }

        // Filtra i dati in modo sicuro
        $nomePlaylist = $data['playlist_searched'];

        // Ottieni l'ID dell'utente
        $userID = Utente::where('username', $user)->value('id');

        // Controlla se l'ID dell'utente è stato trovato
        if (!$userID) {
            echo json_encode([
                "username" => false,
                "save" => false
            ]);
            return;
        }

        // Crea una nuova istanza del modello RicercaSpotify
        $ricerca = new RicercaSpotify([
            'id_user' => $userID,
            'ricerca' => $nomePlaylist
        ]);

        // Salva la ricerca nel database
        if ($ricerca->save()) {
            echo json_encode([
                "username" => true,
                "save" => true
            ]);
        } else {
            echo json_encode([
                "username" => true,
                "save" => false
            ]);
        }
    }


    public function deleteCronologia(Request $request)
    {
        // Ottieni l'utente dalla sessione
        $user = Session::get('username');

        // Controlla se l'utente è nella sessione
        if (!$user) {
            return response()->json([
                "username" => false,
                "delete" => false
            ]);
        }

        // Ottieni l'ID dell'utente
        $userID = Utente::where('username', $user)->value('id');

        // Controlla se l'ID dell'utente è stato trovato
        if (!$userID) {
            return response()->json([
                "username" => false,
                "delete" => false
            ]);
        }

        // Elimina le ricerche nel database
        $deleted = RicercaSpotify::where('id_user', $userID)->delete();

        // Controlla se l'eliminazione è avvenuta con successo
        if ($deleted) {
            return response()->json([
                "username" => true,
                "delete" => true
            ]);
        } else {
            return response()->json([
                "username" => true,
                "delete" => false
            ]);
        }
    }


    public function prendiCronologia(Request $request)
    {
        // Ottieni l'utente dalla sessione
        $user = Session::get('username');

        // Controlla se l'utente è nella sessione
        if (!$user) {
            return response()->json([
                "crono" => false,
                "save" => false,
                "message" => "Utente non autenticato"
            ]);
        }

        // Ottieni l'oggetto Utente tramite il modello
        $utente = Utente::where('username', $user)->first();

        // Controlla se l'utente è stato trovato
        if (!$utente) {
            return response()->json([
                "crono" => false,
                "save" => false,
                "message" => "Utente non trovato"
            ]);
        }

        // Ottieni la cronologia delle ricerche
        $userID = Utente::where('username', $user)->value('id');

        $crono = RicercaSpotify::select('ricerca')
        ->where('id_user', $userID)
        ->get()
        ->toArray();  // Converte la collection in un array

        // Controlla se ci sono risultati
        if (!empty($crono)) {
            return response()->json([
                "crono" => $crono,
                "save" => true
            ]);
        } else {
            return response()->json([
                "crono" => "la cronologia parte da qui!",
                "save" => false,
                "message" => "Nessuna cronologia trovata per l'utente"
            ]);
        }
    }



    public function getPlaylist(Request $request)
    {
        $playlist_name = $request->input('playlist_searched');

        // Funzione per ottenere l'access token da Spotify
        function access_spotify()
        {
            $client_id = "b578f91cd2f642d5b42918f1d732b32a";
            $client_secret = "92148741eb824bb5898f8b23b8695f46";

            $ch = curl_init();

            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://accounts.spotify.com/api/token',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
                CURLOPT_HTTPHEADER => [
                    'Authorization: Basic ' . base64_encode($client_id . ':' . $client_secret)
                ]
            ]);

            $response = curl_exec($ch);
            curl_close($ch);

            $token_info = json_decode($response, true);

            if (isset($token_info['access_token'])) {
                return $token_info['access_token'];
            } else {
                // Log error message for debugging
                error_log("Spotify access token error: " . json_encode($token_info));
                return null;
            }
        }

        // Funzione per eseguire la ricerca della playlist su Spotify
        function request($access_token, $playlist_name)
        {
            $ch = curl_init();
            $query = urlencode($playlist_name);

            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://api.spotify.com/v1/search?q=' . $query . '&type=playlist&limit=12',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $access_token
                ]
            ]);

            $response = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($response, true);

            if (isset($result['error'])) {
                // Log error message for debugging
                error_log("Spotify request error: " . json_encode($result));
            }

            return $result;
        }

        // Ottieni l'access token da Spotify
        $access_token = access_spotify();

        if (!$access_token) {
            return response()->json([
                "getPlaylist" => false,
                "message" => "Errore durante l'autenticazione con Spotify"
            ]);
        }

        // Esegui la richiesta per ottenere la playlist
        $getPlaylist = request($access_token, $playlist_name);

        if ($getPlaylist && isset($getPlaylist['playlists'])) {
            return response()->json([
                "getPlaylist" => $getPlaylist['playlists'],
                "playlist" => $playlist_name
            ]);
        } else {
            return response()->json([
                "getPlaylist" => false,
                "message" => isset($getPlaylist['error']) ? $getPlaylist['error']['message'] : "Errore durante la ricerca della playlist su Spotify"
            ]);
        }
    }

}