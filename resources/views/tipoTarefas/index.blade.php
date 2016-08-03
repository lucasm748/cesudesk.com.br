@extends('layouts.app')
@section('content')
<form role="form">
    <div>
        <h2 class="text-center text-info">Cadastro de TipoTarefas</h2>
    </div> 
    <div class="contents container-fluid">
        <table id="tabela" class="table  table-striped table-hover table-condensed table-responsive" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipoTarefas as $tipoTarefa)
                <tr>
                    <td>{!! $tipoTarefa->id !!}</td>
                    <td>{!! $tipoTarefa->descricao !!}</td>
                    <td>
                        <form action="{{ url('/tipoTarefas/'.$tipoTarefa->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <a href="/tipoTarefa/{{$tipoTarefa->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                            <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/tipoTarefas/create" type="button" class="btn btn-md btn-success"> Novo</a>
        <a class="btn btn-danger" type="reset" href="/">Cancelar</a>
    </div>
    <script>
    $(document).ready(function(){
    $('#tabela').myDataTableConfig().DataTable({
    "sorting": [[ 1, "asc" ]],
    });
    });
    </script>
</form>
@stop
