@extends('layouts.app')
@section('content')
@if($equipe->descricao)
<h1 class="text-info">Equipe: {{ $equipe->descricao }}</h1>
@else
<h1 class="text-info"> Equipe: Novo Equipe </h1>
@endif
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <<li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@if ($equipe->id >0)
<form action="{{ url('equipes', $equipe->id) }}" method="post" accept-charset="utf-8">
    <div class="container-fluid">
        <input name="_method" type="hidden" value="PUT">
        @else
        <form action="{{ url('equipes') }}" method="post" accept-charset="utf-8">
            <div class="container-fluid">
                <input name="_method" type="hidden" value="POST">
                @endif
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Descrição</label>
                    <input class="form-control" id="descricao" type="text" name="descricao" value="{{ $equipe->descricao }}" placeholder="Informe a descricão completa" required="true"/>
                </div>
                    @if ($equipe->active === true && $equipe->id)
                        <div>
                            <label>Ativo </label>
                                {{ Form::checkbox('active', false, true) }}
                        </div>
                    @elseif ($equipe->active === false && $equipe->id)
                        <div>
                            <label>Ativo </label>
                                {{ Form::checkbox('active', true, false) }}
                        </div>
                    @endif
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Salvar"/>
                    <a class="btn btn-danger" type="reset" href="/equipes">Cancelar</a>
                </div>
            </form>
            @stop
