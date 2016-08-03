<?php

namespace App\Cesudesk\Projeto;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Projeto extends Model
{
    /* Tabela a qual o módulo está associado*/
    protected $table = 'projeto';
    /* Campos que podem ser preechidos pelo usuário */
    protected $fillable = ['descricao','dh_inicio','dh_fechamento', 'ds_info_complementar', 'tp_status', 'active'];
    protected $dates = ['dh_inicio', 'dh_fechamento','created_at', 'updated_at'];


    public function getDhInicioAttribute($date) {
        if ($date) {
            return Carbon::parse($date)->format('d/m/Y');
        }
    }

    public function getDhFechamentoAttribute($date) {
        if ($date) {
            return trim(Carbon::parse($date)->format('d/m/Y'));
        }
    }

    public function setDhInicioAttribute($dataInicio) {
            $this->attributes['dh_inicio'] = Carbon::createFromFormat('d/m/Y', $dataInicio);
    }

    public function setDhFechamentoAttribute($date) {
        if ($date) {
            $this->attributes['dh_fechamento'] = Carbon::createFromFormat('d/m/Y', $date);
         }
    }
}
