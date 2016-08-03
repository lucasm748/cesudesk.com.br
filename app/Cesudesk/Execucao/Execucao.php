<?php

namespace App\Cesudesk\Execucao;

use Illuminate\Database\Eloquent\Model;
use App\Cesudesk\Modulo\Modulo;

class Execucao extends Model
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'execucao';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['dh_inicio','dh_fim'];

    public function triagem()
    {
        return $this->belongsTo('App\Cesudesk\Triagem\Triagem', 'id_triagem');
    }

}
