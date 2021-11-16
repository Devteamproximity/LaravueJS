<?php

namespace App\Models;


use App\Models\Eleves;
use App\Models\Student;
use App\Models\Enseignants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'libelleClasse','inscription_Classe','scolarite_Classe','scolariteaff_Classe','codeEtabClasse','sessionClasse','emp_Classe'
    ];


    public function eleves(){

        return $this->hasMany(Student::class);
    }

    public function Enseignants () {
        return $this->belongsToMany(Enseignants::class);
    }


}
