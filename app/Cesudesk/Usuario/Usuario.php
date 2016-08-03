<?php

namespace App\Cesudesk\Usuario;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'usuario';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['nome','login', 'password', 'email', 'active', 'id_cargo', 'id_equipe'];
    protected $hidden = ['password', 'remember_token'];

    public function cargo()
    {
        return $this->belongsTo('App\Cesudesk\Cargo\Cargo', 'id_cargo');
    }

    public function equipe()
    {
        return $this->belongsTo('App\Cesudesk\Equipe\Equipe', 'id_equipe');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}
