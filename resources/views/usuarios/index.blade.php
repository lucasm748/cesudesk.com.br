@extends('layouts.app')
@section('content')
<form role="form">
    <div>
        <h2 class="text-center text-info">Cadastro de Usuários</h2>
    </div> 
    <div class="contents container-fluid">
         <table id="tabela" class="table  table-striped table-hover table-condensed table-responsive" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Equipe</th>
                    <th>Ativo</th>
                    <th>Cargo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->login }}</td>
                    <td>{{ $usuario->equipe->descricao }}</td>
                    <td>
                        @if ($usuario->active === true) Sim @else Não @endif
                     </td>
                    <td>{{ $usuario->cargo->descricao}}</td>
                    <td>
                        <form action="{{ url('/usuarios/'.$usuario->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <a href="/usuarios/{{$usuario->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                            <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/usuarios/create" type="button" class="btn btn-md btn-success"> Novo</a>
        <a class="btn btn-danger" type="reset" href="/">Cancelar</a>
    </div>
    <script>
    $(document).ready(function(){
    $('#tabela').myDataTableConfig().DataTable({
        "sorting": [[ 0, "asc" ]],
    });
    });
    </script>
</form>
@stop
