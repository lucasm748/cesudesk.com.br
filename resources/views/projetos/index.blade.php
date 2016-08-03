@extends('layouts.app')
@section('content')
<form role="form">
    <div>
        <h2 class="text-center text-info">Cadastro de Projetos</h2>
    </div> 
    <div class="contents container-fluid">
        <table id="tabela" class="table  table-striped table-hover table-condensed table-responsive" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Início</th>
                    <th>Fechamento</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projetos as $projeto)
                <tr>
                    <td>{!! $projeto->id !!}</td>
                    <td>{!! $projeto->descricao !!}</td>
                    <td>
                    <?php 
                    switch (trim($projeto->tp_status)) {
                        case 'N':
                            echo 'Andamento';
                            break;
                        case 'F':
                            echo 'Fechado';
                            break;
                        case 'C':
                            echo 'Cancelado';
                            break;
                        default:
                            echo $projeto->tp_status;
                            break;
                    }
                    ?>
                    </td>
                    <td>{!! $projeto->dh_inicio !!}</td>
                    <td>{!! $projeto->dh_fechamento !!}</td>
                    <td>
                        @if ($projeto->active === true) Sim @else Não @endif
                    </td>
                    <td>
                        <form action="{{ url('/projetos/'.$projeto->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <a href="/projetos/{{$projeto->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                            <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(Session::has('status'))
        <div id="alert" class="{{ Session::get('alert-class') }}">
            <a class="close" data-target="#alert" data-dismiss="alert">*</a>
            <strong>Status: </strong> {!!Session::get('status')!!}
        </div>
        @endif
        <a href="/projetos/create" type="button" class="btn btn-md btn-success"> Novo</a>
        <a class="btn btn-danger" type="reset" href="/">Cancelar</a>
    </div>
    <script>
    $(document).ready(function(){
    setTimeout("$('#alert').fadeOut()", 4000);
    $('#tabela').myDataTableConfig().DataTable({
    "sorting": [[ 2, "desc" ]],
    });
    });
    </script>
</form>
@stop
