<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ejercicio extends Model
{
    protected $fillable = [
        'nombre','musculo','descripcion','imagen'
    ];
    public function entrenamientos()
    {
        return $this->belongsToMany('App\Entrenamiento','ejercicio_entrenamiento');
    }
}
