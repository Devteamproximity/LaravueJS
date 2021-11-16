<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matieres extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'libelle','codeEtab','session','coef','classe'.'teacher','classe_id','enseignants_id'
    ];

    public function Enseignants () {

        return $this->belongsTo(Enseignants::class);

    }

    public function Classe () {

        return $this->belongsTo(Enseignants::class);

    }

}
