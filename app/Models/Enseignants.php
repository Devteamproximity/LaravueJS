<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'statut'
        
    ];
}
