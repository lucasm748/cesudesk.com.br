<?php

namespace App\Cesudesk\Anexo;

use Illuminate\Database\Eloquent\Model;
use App\Cesudesk\Modulo\Modulo;

class Anexo extends Model
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'anexo';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['descricao','dh_cadastro', 'dh_entrega_prev', 'dh_fechamento', 'ds_info_complementar', 'prioridade', 'qt_horas_gastar','titulo','tp_status','id_modulo', 'id_projeto', 'id_solicitante', 'id_tipo_anexo'];

    public function usuario()
    {
        return $this->belongsTo('App\Cesudesk\Usuario\Usuario', 'id_usuario');
    }

    public function tipoAnexo()
    {
        return $this->belongsTo('App\Cesudesk\TipoAnexo\TipoAnexo', 'id_tipo_anexo');
    }

    public function modulo()
    {
        return $this->belongsTo('App\Cesudesk\Modulo\Modulo', 'id_modulo');
    }

    public function projeto()
    {
        return $this->belongsTo('App\Cesudesk\Projeto\Projeto', 'id_projeto');
    }

}
