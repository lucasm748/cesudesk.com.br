<?php

namespace App\Cesudesk\Equipe;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'equipe';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['descricao', 'active'];

    public function usuarios()
    {
        return $this->hasMany('Usuario');
    }

}
