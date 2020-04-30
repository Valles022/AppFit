<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entrenamiento extends Model
{
    protected $fillable = [
        'tipo_entrenamiento','descripcion'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User','entrenamiento_user');
    }

    public function ejercicios()
    {
        return $this->belongsToMany('App\Ejercicio','ejercicio_entrenamiento')->withPivot('num_series', 'num_repes');
    }
}
