@extends('layouts.app')
@section('content')
@if($projeto->descricao)
<h1 class="text-info">Projeto: {{ $projeto->descricao }}</h1>
@else
<h1 class="text-info"> Projeto: Novo Projeto </h1>
@endif
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <<li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@if ($projeto->id >0)
<form action="{{ url('projetos', $projeto->id) }}" method="post" accept-charset="utf-8">
    <div class="container-fluid">
        <input name="_method" type="hidden" value="PUT">
        @else
        <form action="{{ url('projetos') }}" method="post" accept-charset="utf-8">
            <div class="container-fluid">
                <input name="_method" type="hidden" value="POST">
                @endif
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Descrição</label>
                    <input class="form-control" id="descricao" type="text" name="descricao" value="{{ $projeto->descricao }}" placeholder="Informe a descricão completa" required="true"/>
                </div>
                <div class="form-group">
                    <label>Início</label>
                        <input type="text" class="form-control" id="dh_inicio" name="dh_inicio" value="{{ $projeto->dh_inicio }}" placeholder="Data de Início do Projeto">
                    <script>
                    $(function() {
                            $('#dh_inicio').datepicker({
                                dateFormat: 'dd/mm/yy',
                                showOtherMonths: true,
                                selectOtherMonths: true,
                                showButtonPanel:true,
                                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
                            });
                        });
                    </script>
                </div>
                <div class="form-group">
                    <label>Fechamento</label>
                        <input class="form-control" id="dh_fechamento" name="dh_fechamento" class="span2" size="16" type="text"  value="{{ $projeto->dh_fechamento }}" placeholder="Data de finalização ou cancelamento do projeto">
                        <!-- {!! Form::input('text', 'dh_fechamento', date('d-m-Y H:i:s'), ['class' => 'form-control', 'name' => 'dh_fechamento', 'id' => 'dh_fechamento']) !!} -->
                    <script>
                    $(function() {
                            $('#dh_fechamento').datepicker({
                                dateFormat: 'dd/mm/yy',
                                showOtherMonths: true,
                                selectOtherMonths: true,
                                showButtonPanel:true,
                                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
                            });
                        });
                    </script>

                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" required="true" name="tp_status" id="tp_status">
                        <option value="N" @if(trim($projeto->tp_status) == 'N') selected="selected" @endif>Andamento</option>
                        <option value="F" @if(trim($projeto->tp_status) == 'F') selected="selected" @endif>Fechado</option>
                        <option value="C" @if(trim($projeto->tp_status) == 'C') selected="selected" @endif>Cancelado</option>
                    </select>
                </div>
                    @if ($projeto->active === true && $projeto->id)
                        <div>
                            <label>Ativo </label>
                                {{ Form::checkbox('active', false, true) }}
                        </div>
                    @elseif ($projeto->active === false && $projeto->id)
                        <div>
                            <label>Ativo </label>
                                {{ Form::checkbox('active', true, false) }}
                        </div>
                    @endif
                <div class="form-group">
                    <label>Informações Complementares</label>
                    <textarea class="form-control" name="ds_info_complementar" id="ds_info_complementar" rows="5" cols="30" placeholder="Informações complementares do projeto">{!!$projeto->ds_info_complementar!!}</textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Salvar"/>
                    <a class="btn btn-danger" type="reset" href="/projetos">Cancelar</a>
                </div>
            </form>
            @stop
