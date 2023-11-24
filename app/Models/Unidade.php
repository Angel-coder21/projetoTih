<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    //use HasFactory;
    protected $table = 'tih_unidade';
    protected $fillable = [
        'tipo',
        'nome',
        'endereco',
        'numero',
        'bairro',
        'municipio',
        'contato_tel',
        'contato_email',     
    ];
    
    protected $hidden = [
        '_token',
     
    ];

    protected $casts = [
        //
     ];
}
