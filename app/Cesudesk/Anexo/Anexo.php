<?php

namespace App\Cesudesk\Anexo;

use Illuminate\Database\Eloquent\Model;
use App\Cesudesk\Modulo\Modulo;

class Anexo extends Model
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'anexo';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['name', 'size', 'arquivo'];

    public function tarefa()
    {
        return $this->belongsTo('App\Cesudesk\Tarefa\Tarefa', 'id_tarefa');
    }

}
