<?php

namespace App\Cesudesk\Modulo;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'modulo';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['descricao', 'active'];

}
