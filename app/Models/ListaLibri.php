<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaLibri extends Model
{
    use HasFactory;

    protected $table = 'lista_libri'; // specifica il nome della tabella

    protected $fillable = [
        'user_id',
        'nome_lista',
        'titolo',
        'stato',
    ];

    // Se hai delle relazioni, puoi definirle qui
    public function user()
    {
        return $this->belongsTo(Utente::class, 'user_id', 'id');
    }
}
