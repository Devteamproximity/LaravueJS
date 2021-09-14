<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'codeEtab', 'libelleEtab', 'sigleEtab', 'sloganEtab', 
        'emailEtab', 'datecreationEtab', 'principaltelEtab', 'secondairetelEtab', 
        'villeEtab', 'paysEtab','sitewebEtab','directeurEtab','mixteEtab ','groupstateEtab','groupnameEtab',
        'typeEtab','principalteldirecteurEtab','adresseEtab','logoEtab'
    ];
}
