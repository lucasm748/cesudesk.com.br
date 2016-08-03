@extends('layouts.app')
@section('content')
@if($usuario->nome)
<h1 class="text-info">Usuário: {{ $usuario->nome }}</h1>
@else
<h1 class="text-info"> Usuário: Novo Usuário </h1>
@endif
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <<li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@if ($usuario->id >0)
<form name="form" role="form" id="form" action="{{ url('usuarios', $usuario->id) }}" method="post" accept-charset="utf-8">
    <div class="container-fluid">
        <input name="_method" type="hidden" value="PUT">
        @else
        <form name="form" role="form" id="form" action="{{ url('usuarios') }}" method="post" accept-charset="utf-8">
            <div class="container-fluid">
                <input name="_method" type="hidden" value="POST">
                @endif
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" id="nome" type="text" name="nome" value="{{ $usuario->nome }}" placeholder="Informe o nome completo" required="true"/>
                </div>
                <div class="form-group">
                    <label>Login</label>
                    <input class="form-control" id="login" type="text" name="login" value="{{ $usuario->login }}" placeholder="Informe um login válido e único" required="true"/>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" id="password" type="password" name="password" value="{{ $usuario->password }}" placeholder="Informe uma password" required="true"/>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" id="email" type="email" name="email" value="{{ $usuario->email }}" placeholder="Informe o e-mail do contato" required="true"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Equipe</label>
                    <?php  $selecionado = (int) $usuario->id_equipe;
                        echo Form::select('id_equipe', $equipes, $selecionado, [
                        'placeholder' => 'Selecione a Equipe',
                        'class' => 'form-control',
                        'required' => 'true'
                        ]);
                    ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Cargo</label>
                    <?php  $selecionado = (int) $usuario->id_cargo;
                        echo Form::select('id_cargo', $cargos, $selecionado, [
                        'placeholder' => 'Selecione o Cargo',
                        'class' => 'form-control',
                        'required' => 'true'
                        ]);
                    ?>
                </div>
                <div>
                    <label>Ativo </label>
                    @if ($usuario->active)
                    {{ Form::checkbox('active', 0, $usuario->active) }}
                    @else
                    {{ Form::checkbox('active', 1, $usuario->active) }}
                    @endif
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Salvar"/>
                    <a class="btn btn-danger" type="reset" href="/usuarios">Cancelar</a>
                </div>
            </form>
            @stop
