<?php

namespace App\Cesudesk\Tarefa;

use Illuminate\Database\Eloquent\Model;
use App\Cesudesk\Modulo\Modulo;
use \Carbon\Carbon;

class Tarefa extends Model
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'tarefa';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['descricao','dh_cadastro', 'dh_entrega_prev', 'dh_fechamento', 'ds_info_complementar', 'prioridade', 'qt_horas_gastas','titulo','tp_status','id_modulo', 'id_projeto', 'id_solicitante', 'id_tipo_tarefa'];

    protected $dates = ['dh_cadastro', 'dh_fechamento','dh_entrega_prev','created_at', 'updated_at'];

    public function solicitante()
    {
        return $this->belongsTo('App\Cesudesk\Usuario\Usuario', 'id_solicitante');
    }

    public function tipoTarefa()
    {
        return $this->belongsTo('App\Cesudesk\TipoTarefa\TipoTarefa', 'id_tipo_tarefa');
    }

    public function modulo()
    {
        return $this->belongsTo('App\Cesudesk\Modulo\Modulo', 'id_modulo');
    }

    public function projeto()
    {
        return $this->belongsTo('App\Cesudesk\Projeto\Projeto', 'id_projeto');
    }

    public function triagens()
    {
        return $this->hasMany('App\Cesudesk\Triagem\Triagem', 'id_tarefa');
    }

    public function getDhCadastroAttribute($timestamp) {
        if ($timestamp) {
            return Carbon::parse($timestamp)->format('d/m/Y H:i:s');
        }
    }

    public function getDhFechamentoAttribute($timestamp) {
        if ($timestamp) {
            return trim(Carbon::parse($timestamp)->format('d/m/Y H:i:s'));
        }
    }

    public function getDhEntregaPrevAttribute($date) {
        if ($date) {
            return trim(Carbon::parse($date)->format('d/m/Y'));
        }
    }

    public function setDhCadastroAttribute($timestamp) {
        $this->attributes['dh_cadastro'] = Carbon::createFromFormat('d/m/Y H:i:s', $timestamp);
    }

    public function setDhFechamentoAttribute($timestamp) {
            $this->attributes['dh_fechamento'] = Carbon::createFromFormat('d/m/Y H:i:s', $timestamp);
    }

    public function setDhEntregaPrevAttribute($date) {
            $this->attributes['dh_entrega_prev'] = Carbon::createFromFormat('d/m/Y', $date);
    }
}
