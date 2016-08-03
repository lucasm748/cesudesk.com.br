<?php

namespace App\Cesudesk\Triagem;

use Illuminate\Database\Eloquent\Model;
use App\Cesudesk\Modulo\Modulo;

class Triagem extends Model
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'triagem';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['descricao','dh_ds_info_complementar', 'dh_inicio_triagem', 'dh_fim_triagem', 'qt_horas', 'tp_status', 'id_usuario'];

    public function usuario()
    {
        return $this->belongsTo('App\Cesudesk\Usuario\Usuario', 'id_usuario');
    }

    public function tarefa()
    {
        return $this->belongsTo('App\Cesudesk\Tarefa\Tarefa', 'id_tarefa');
    }

    public function execucoes()
    {
        return $this->hasMany('App\Cesudesk\Execucao\Execucao');
    }

}
