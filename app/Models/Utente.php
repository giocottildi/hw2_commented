<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected $table = 'utenti';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function history()
    {
        return $this->hasMany(RicercaSpotify::class, 'id_user', 'id');
    }
}
