<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OLSalvato extends Model
{
    use HasFactory;

    protected $table = 'ol_salvati';

    protected $primaryKey = 'id_salvato';

    protected $fillable = [
        'id_user',
        'title',
        'cover_id',
        'autore',
        'anno_pubblicazione'
    ];

    public function user()
    {
        return $this->belongsTo(Utente::class, 'id_user', 'id');
    }
}
