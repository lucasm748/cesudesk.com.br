@extends('layouts.app')
@section('content')
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <<li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@if ($cargo->id >0)
        <form action="{{ url('cargos', $cargo->id) }}" method="post" accept-charset="utf-8">
            <div class="container-fluid">
            <h3 class="text-info"><strong>Cargo ID:</strong> {{ $cargo->id }} - {{ $cargo->descricao }}</h3>
                <input name="_method" type="hidden" value="PUT">
@else
        <form action="{{ url('cargos') }}" method="post" accept-charset="utf-8">
            <div class="container-fluid">
            <h3 class="text-info"><strong>Cargo:</strong> Novo Cargo </h3>
                <input name="_method" type="hidden" value="POST">
                @endif
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Descrição</label>
                    <input class="form-control" id="descricao" type="text" name="descricao" value="{{ $cargo->descricao }}" placeholder="Informe a descricão completa" required="true"/>
                </div>
                    @if ($cargo->active === true && $cargo->id)
                        <div>
                            <label>Ativo </label>
                                {{ Form::checkbox('active', false, true) }}
                        </div>
                    @elseif ($cargo->active === false && $cargo->id)
                        <div>
                            <label>Ativo </label>
                                {{ Form::checkbox('active', true, false) }}
                        </div>
                    @endif
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Salvar"/>
                    <a class="btn btn-danger" type="reset" href="/cargos">Cancelar</a>
                </div>
            </form>
            @stop
