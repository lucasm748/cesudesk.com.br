@extends('layouts.app')
@section('content')
@if($tipoTarefa->descricao)
<h1 class="text-info">TipoTarefa: {{ $tipoTarefa->descricao }}</h1>
@else
<h1 class="text-info"> TipoTarefa: Novo TipoTarefa </h1>
@endif
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <<li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@if ($tipoTarefa->id >0)
<form action="{{ url('tipoTarefas', $tipoTarefa->id) }}" method="post" accept-charset="utf-8">
    <div class="container-fluid">
        <input name="_method" type="hidden" value="PUT">
        @else
        <form action="{{ url('tipoTarefas') }}" method="post" accept-charset="utf-8">
            <div class="container-fluid">
                <input name="_method" type="hidden" value="POST">
                @endif
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Descrição</label>
                    <input class="form-control" id="descricao" type="text" name="descricao" value="{{ $tipoTarefa->descricao }}" placeholder="Informe a descricão completa" required="true"/>
                </div>
                    @if ($tipoTarefa->active === true && $tipoTarefa->id)
                        <div>
                            <label>Ativo </label>
                                {{ Form::checkbox('active', false, true) }}
                        </div>
                    @elseif ($tipoTarefa->active === false && $tipoTarefa->id)
                        <div>
                            <label>Ativo </label>
                                {{ Form::checkbox('active', true, false) }}
                        </div>
                    @endif
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Salvar"/>
                    <a class="btn btn-danger" type="reset" href="/tipoTarefas">Cancelar</a>
                </div>
            </form>
            @stop
