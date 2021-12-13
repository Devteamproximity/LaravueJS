<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presences extends Model
{
    use HasFactory;

    protected $fillable = [

        'student_id',
        'user_id',
        'classe_id',
        'dateHeure',
        'date' ,
        'heure',
        'duree',
        'matiere',
        'session',
        'codeEtab'

    ];


    public function student () {

        return $this->belongsTo(Student::class);
    }



}
