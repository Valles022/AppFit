<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','objetivo','imagen'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany('App\Roles','role_user');
    }
    public function entrenamientos()
    {
        return $this->belongsToMany('App\Entrenamiento','entrenamiento_user');
    }
    public function esCliente()
    {
        $role = $this->roles()->first();
        if($role->nombre == 'Cliente'){
            return true;
        }
        return false;
    }
    public function esEntrenador()
    {
        $role = $this->roles()->first();
        if($role->nombre == 'Entrenador'){
            return true;
        }
        return false;
    }
    public function esAdmin()
    {
        $role = $this->roles()->first();
        if($role->nombre == 'Administrador'){
            return true;
        }
        return false;
    }
}
