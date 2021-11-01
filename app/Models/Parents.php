<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomParent',
        'prenomParent',
        'user_id',
        'telParent',
        'emailParent',
        'cniParent',
        'professionParent',
        'nationaliteParent',
        'sexeParent',
        'addressParent',
        'session',
        'codeEtab'
        
    ];

}
