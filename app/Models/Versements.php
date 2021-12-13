<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versements extends Model
{
    use HasFactory;

    protected $fillable = [

        'classe_id',
        'student_id',
        'codeEtab',
        'session',
        'date',
        'code',
        'motif',
        'mode',
        'deposant',
        'receptionneur',
        'montantverser'

    ];
}
