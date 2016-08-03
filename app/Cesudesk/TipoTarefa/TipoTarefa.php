<?php

namespace App\Cesudesk\TipoTarefa;

use Illuminate\Database\Eloquent\Model;

class TipoTarefa extends Model
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'tipoTarefa';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['descricao'];
}
