@extends('layouts.app')
@section('content')
<form role="form">
    <div>
        <h2 class="text-center text-info">Cadastro de Modulos</h2>
    </div> 
    <div class="contents container-fluid">
        <table id="tabela" class="table  table-striped table-hover table-condensed table-responsive" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modulos as $modulo)
                <tr>
                    <td>{!! $modulo->id !!}</td>
                    <td>{!! $modulo->descricao !!}</td>
                    <td>
                        @if ($modulo->active === true) Sim @else Não @endif
                     </td>
                    <td>
                        <form action="{{ url('/modulos/'.$modulo->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <a href="/modulos/{{$modulo->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
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
        <a href="/modulos/create" type="button" class="btn btn-md btn-success"> Novo</a>
        <a class="btn btn-danger" type="reset" href="/">Cancelar</a>
    </div>
    <script>
    $(document).ready(function(){
    setTimeout("$('#alert').fadeOut()", 4000);
    $('#tabela').myDataTableConfig().DataTable({
    "sorting": [[ 1, "asc" ]],
    });
    });
    </script>
</form>
@stop
