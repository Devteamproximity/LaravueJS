<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Matieres;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enseignants extends Model

{
    use HasFactory;

    protected $fillable = [

        'nom',
        'prenom',
        'user_id',
        'matricule',
        'tel',
        'email',
        'nationalite',
        'sexe',
        'situation',
        'matricule',
        'salaire',
        'dateEmbauche',
        'type',
        'statut',
        'codeEtab',
        'session',
        'nationalite'
    ];


    public function Matieres () {
        return $this->hasMany(Matieres::class);
    }

    public function Classe () {
        return $this->belongsToMany(Classe::class);
    }

    // public function Classe () {
    //     return $this->hasMany(Classe::class);
    // }

}
