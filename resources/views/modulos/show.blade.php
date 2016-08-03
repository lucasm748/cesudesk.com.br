@extends('layouts.app')
@section('content')
@if($modulo->descricao)
<h1 class="text-info">Modulo: {{ $modulo->descricao }}</h1>
@else
<h1 class="text-info"> Modulo: Novo Modulo </h1>
@endif
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <<li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@if ($modulo->id >0)
<form action="{{ url('modulos', $modulo->id) }}" method="post" accept-charset="utf-8">
    <div class="container-fluid">
        <input name="_method" type="hidden" value="PUT">
        @else
        <form action="{{ url('modulos') }}" method="post" accept-charset="utf-8">
            <div class="container-fluid">
                <input name="_method" type="hidden" value="POST">
                @endif
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Descrição</label>
                    <input class="form-control" id="descricao" type="text" name="descricao" value="{{ $modulo->descricao }}" placeholder="Informe a descricão completa" required="true"/>
                </div>
                    @if ($modulo->active === true && $modulo->id)
                        <div>
                            <label>Ativo </label>
                                {{ Form::checkbox('active', false, true) }}
                        </div>
                    @elseif ($modulo->active === false && $modulo->id)
                        <div>
                            <label>Ativo </label>
                                {{ Form::checkbox('active', true, false) }}
                        </div>
                    @endif
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Salvar"/>
                    <a class="btn btn-danger" type="reset" href="/modulos">Cancelar</a>
                </div>
            </form>
            @stop
