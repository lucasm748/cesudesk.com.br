<?php

namespace App\Cesudesk\Cargo;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'cargo';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['descricao', 'active'];

    public function usuarios()
    {
        return $this->hasMany('Usuario');
    }

}
