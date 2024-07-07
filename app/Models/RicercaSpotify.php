<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RicercaSpotify extends Model
{
    protected $table = 'ricerche_spotify';

    protected $primaryKey = 'id_ricerca';

    protected $fillable = [
        'id_user',
        'ricerca',
    ];

    // Definizione della relazione con il modello Utente
    public function utente()
    {
        return $this->belongsTo(Utente::class, 'id_user');
    }
}
