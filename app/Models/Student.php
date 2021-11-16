<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [

        'nom',
        'prenom',
        'user_id',
        'parent_id',
        'classe_id',
        'matricule',
        'email',
        'nationalite',
        'sexe',
        'dateNaiss',
        'lieuNaiss',
        'statut',
        'codeEtab',
        'session',
        'user_id',
        'classe',
        'dateNaiss',
        'lieuNaiss',
        'doublant'

    ];

    public function user () {

        return $this->belongsTo(User::class);

    }
}
