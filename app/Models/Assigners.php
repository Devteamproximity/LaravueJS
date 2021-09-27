<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigners extends Model
{
    use HasFactory;
    protected $fillable = [
        'codeEtabAssisgn',
        'user_id',
        
    ];
}
