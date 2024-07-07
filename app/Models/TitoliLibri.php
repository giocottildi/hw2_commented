<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitoliLibri extends Model
{
    use HasFactory;

    protected $table = 'titoli_libri'; 

    protected $fillable = [
        'titolo',
        'numero_uscita',
        'data_uscita',
    ];

    protected $dates = ['data_uscita']; // Specifica che 'data_uscita' è di tipo data //non so se necessario, devo controllare
}
