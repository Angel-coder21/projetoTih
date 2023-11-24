<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viatura extends Model
{
    //use HasFactory;
    protected $table = 'tih_viatura';
    protected $fillable = [
        'identificacao',
        'placa',
        'tipo',
        'situacao',
        'id_gps',     
    ];
    
    protected $hidden = [
        '_token',
     
    ];

    protected $casts = [
        //
     ];
}
