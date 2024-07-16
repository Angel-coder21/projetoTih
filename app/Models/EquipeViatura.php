<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipeViatura extends Model
{
    // use HasFactory;
    protected $table = 'tih_equipe_viatura';
    protected $fillable = [
        'fk_viatura',
        'fk_user_condutor',
        'fk_user_medico',
        'fk_user_enfermeiro',
        'fk_user_tec_enfermagem',
        'data',
        'status',     
    ];
    
    protected $hidden = [
        '_token',
     
    ];

    protected $casts = [
        'data' => 'date'
     ];
}
