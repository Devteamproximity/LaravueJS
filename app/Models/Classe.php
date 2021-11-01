<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'libelleClasse','inscription_Classe','scolarite_Classe','scolariteaff_Classe','codeEtabClasse','sessionClasse','emp_Classe'
    ];

}
