@extends('layouts.app')
@section('content')
<form role="form">
    <div>
        <h2 class="text-center text-info">Gerenciamento de Tarefas</h2>
    </div> 
    <div class="contents container-fluid">
         <table id="tabela" class="table  table-striped table-hover table-condensed table-responsive" width="100%">
            <thead>
                <tr>´
                    <th>ID</th>
                    <th>Título</th>
                    <th>Solicitante</th>
                    <th>Cadastro</th>
                    <th>Prioridade</th>
                    <th>Status</th>
                    <th>Horas Gastas</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->titulo }}</td>
                    <td>{{ $tarefa->solicitante->login }}</td>
                    <td>{{ $tarefa->dh_cadastro }}</td>
                    <td>
                    <?php
                        switch (trim($tarefa->prioridade)) {
                            case '1':
                                echo 'Alta';
                                break;
                            case '2':
                                echo 'Média';
                                break;
                            case '3':
                                echo 'Baixa';
                                break;
                            default:
                                echo $tarefa->prioridade;
                                break;
                        }
                    ?>
                    </td>
                    <td>
                    <?php 
                    switch (trim($tarefa->tp_status)) {
                        case 'A':
                            echo 'Aberto';
                            break;
                        case 'N':
                            echo 'Andamento';
                            break;
                        case 'F':
                            echo 'Fechada';
                            break;
                        case 'C':
                            echo 'Cancelada';
                            break;
                        default:
                            echo $tarefa->tp_status;
                            break;
                    }
                    ?>
                     </td>
                     <td>
                         {{ $tarefa->qt_horas_gastas}}
                     </td>
                    <td>
                        <form action="{{ url('/tarefas/'.$tarefa->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <a href="/tarefas/{{$tarefa->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                            <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/tarefas/create" type="button" class="btn btn-md btn-success"> Nova</a>
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
