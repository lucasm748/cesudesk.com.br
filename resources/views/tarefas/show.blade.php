@extends('layouts.app')
@section('content')
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <<li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@if ($tarefa->id >0)
        <form name="form" role="form" id="form" action="{{ url('tarefas', $tarefa->id) }}" method="post" accept-charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}" />
        <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap-disabled-tabclick.js') }}"></script>
            <div class="container-fluid">
                <input name="_method" type="hidden" value="PUT"/>
            <h3 class="text-info"><strong>Ticket ID:</strong>{{ $tarefa->id }} - {{ $tarefa->titulo }}</h3>
@else
        <form name="form" role="form" id="form" action="{{ url('tarefas') }}" method="post" accept-charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}" />
            <input name="_method" type="hidden" value="POST"/>
        <h3 class="text-info"><strong>Ticket ID:</strong> Nova Tarefa </h3>
            @endif
            {!! csrf_field() !!}
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="body_dados" class="ative">
                            <a id="link_body_dados" data-toggle="tab" href="#tabs-1">Dados da Solicitação</a>
                        </li>
                        @if($tarefa->id)
                        <li id="body_triagens">
                            <a id="link_body_dados" data-toggle="tab" href="#tabs-3">Triagens</a>
                        </li>
                        <li id="body_anexos">
                            <a id="link_body_anexos" data-toggle="tab" href="#tabs-4">Anexos</a>
                        </li>
                        <li id="body_comentarios">
                            <a id="link_body_comentarios" data-toggle="tab" href="#tabs-5">Comentários</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="tabs-1" class="tab-pane fade in active">
                            <div class="form-group">
                                <label>Título</label>
                                <input class="form-control" id="titulo" type="text" name="titulo" value="{{ $tarefa->titulo }}" placeholder="Informe o título da tarefa" required="true"/>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Data Cadastro</label>
                                    <input type="text" class="form-control" id="dh_cadastro" name="dh_cadastro" value="{{ $tarefa->dh_cadastro }}" readonly="true">
                                </div>
                                <div class="col-md-6">
                                    <label>Data Entrega Acordada</label>
                                    <input type="text" class="form-control" id="dh_entrega_prev" name="dh_entrega_prev" value="{{ $tarefa->dh_entrega_prev }}" placeholder="Data de entrega prevista">
                                    <script>
                                    $(function() {
                                    $('#dh_entrega_prev').datepicker({
                                    dateFormat: 'dd/mm/yy',
                                    showOtherMonths: true,
                                    selectOtherMonths: true,
                                    showButtonPanel:true,
                                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
                                    });
                                    });
                                    </script>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-4">
                                    <label class="control-label">Solicitante</label>
                                    <?php  $sol = (int) $tarefa->id_solicitante;
                                    echo Form::select('id_solicitante', $usuarios, $sol, [
                                    'placeholder' => 'Selecione o Solicitante',
                                    'class' => 'form-control',
                                    'required' => 'true'
                                    ]);
                                    ?>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Prioridade</label>
                                    <select name="prioridade" class="form-control">
                                        <option value="1" @if($tarefa->prioridade == '1') selected="selected" @endif>Alta</option>
                                        <option value="2" @if($tarefa->prioridade == '2') selected="selected" @endif>Média</option>
                                        <option value="3" @if($tarefa->prioridade == '3') selected="selected" @endif>Baixa</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Horas Gastas</label>
                                    <input type="text" class="form-control" readonly="true">
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-4">
                                    <label class="control-label">Projeto</label>
                                    <?php  $proj = (int) $tarefa->id_projeto;
                                    echo Form::select('id_projeto', $projetos, $proj, [
                                    'placeholder' => 'Selecione o Projeto',
                                    'class' => 'form-control',
                                    'required' => 'true'
                                    ]);
                                    ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Tipo da Tarefa</label>
                                    <?php  $tt = (int) $tarefa->id_tipo_tarefa;
                                    echo Form::select('id_tipo_tarefa', $tipoTarefas, $tt, [
                                    'placeholder' => 'Selecione o tipo da tarefa',
                                    'class' => 'form-control',
                                    'required' => 'true'
                                    ]);
                                    ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Módulo</label>
                                    <?php  $mod = (int) $tarefa->id_modulo;
                                    echo Form::select('id_modulo', $modulos, $mod, [
                                    'placeholder' => 'Selecione o Módulo',
                                    'class' => 'form-control',
                                    'required' => 'true'
                                    ]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label>Solicitação (Descrição)</label>
                                <textarea class="form-control" name="descricao" id="descricao" rows="4" cols="15" placeholder="Descrição do chamado">{!!$tarefa->descricao!!}</textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Salvar"/>
                                <a class="btn btn-danger" type="reset" href="/tarefas">Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <div id="tabs-3" class="tab-pane fade">
                        <!-- Trigger the modal with a button -->
                        <button id="bttriagens" type="button" class="btn btn-info btn-md">Nova Triagem</button>
                        <table id="tbtriagens" class="table table-striped table-hover table-responsive table-condensed">
                            <thead>
                                <tr>
                                    <td><b>Usuário</b></td>
                                    <td><b>Descrição</b></td>
                                    <td><b>Início</b></td>
                                    <td><b>Fechamento</b></td>
                                    <td><b>Horas gastas</b></td>
                                    <td><b>Status</b></td>
                                    <td><b>Ações</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tarefa->triagens as $triagem)
                                <tr>
                                    <td>{{ $triagem->usuario->login}}</td>
                                    <td>{{ $triagem->descricao}}</td>
                                    <td>{{ $triagem->dh_inicio_triagem}}</td>
                                    <td>{{ $triagem->dh_fim_triagem}}</td>
                                    <td>
                                        @if(!($triagem->qt_horas)>0)
                                        <?php echo 'Sem execuções'; ?>
                                        @else
                                        {{ $triagem->qt_horas }}
                                        @endif
                                    </td>
                                    <td>
                                    <?php 
                                        switch ($triagem->tp_status) {
                                            case 'A':
                                                echo 'Aberta';
                                                break;
                                            case 'N':
                                                echo 'Andamento';
                                                break;
                                            case 'F':
                                                echo 'Fechada';
                                                break;
                                            default:
                                                echo $triagem->tp_status;
                                                break;
                                        }
                                    ?>
                                    </td>
                                    <td>
                                        <form action="{{ url('/triagem/del/'.$triagem->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a href="/triagens/{{$triagem->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                                            <button type="button" id="btndeltri{{ $triagem->id }}" data-id="{{ $triagem->id }}" class="btn-xs btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Modal  Triagem -->
                        <div id="triagens" role="dialog" class="modal fade" style="margin-top: 10%;">
                           <div class="modal-dialog">
                            <form name="form" role="form" id="formtri" action="{{ url('triagens') }}" method="post" accept-charset="utf-8">
                            <meta name="csrf_token" content="{{ csrf_token() }}" />
                                {!! csrf_field() !!}
                                <!-- Modal content-->
                                <input type="hidden" name="id_tarefa" value="{{ $triagem->id_tarefa }}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Triagens</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div id="triagem-area">
                                            <div class="form-group">
                                                <label class="control-label">Descrição</label>
                                                <input id="desctri" name="descricao" type="text" class="form-control" placeholder="Breve descrição sobre a finalidade da triagem">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Usuário</label>
                                                <?php echo Form::select('id_usuario', $usuariosTriagem, null, [
                                                'placeholder' => 'Selecione o usuário',
                                                'class' => 'form-control',
                                                'required' => 'true',
                                                'id' => 'usutri'
                                                ]);
                                                ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Início Triagem</label>
                                                    <input type="text" class="form-control" id="dh_inicio_triagem" name="dh_inicio_triagem" value="{{ $tarefa->dh_inicio_triagem }}" placeholder="Data de início da triagem">
                                                    <script>
                                                    $(function() {
                                                    $('#dh_inicio_triagem').datetimepicker({
                                                    dateFormat: 'dd/mm/yy',
                                                    showOtherMonths: true,
                                                    selectOtherMonths: true,
                                                    showButtonPanel:true,
                                                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                                                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                                                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                                                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                                                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
                                                    });
                                                    });
                                                    </script>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Fechamento Triagem</label>
                                                    <input type="text" class="form-control" id="dh_fim_triagem" name="dh_fim_triagem" value="{{ $tarefa->dh_fim_triagem }}" placeholder="Data de fechamento da triagem">
                                                    <script>
                                                    $(function() {
                                                    $('#dh_fim_triagem').datetimepicker({
                                                    dateFormat: 'dd/mm/yy',
                                                    showOtherMonths: true,
                                                    selectOtherMonths: true,
                                                    showButtonPanel:true,
                                                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                                                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                                                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                                                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                                                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
                                                    });
                                                    });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btnsvtriagem" class="btn btn-md btn-primary" >Salvar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                                        <script>
                                        $(document).ready(function() {
                                        $('#tabs-3').on('click', "#bttriagens", function(e) {
                                            e.preventDefault();
                                            var formData = $('#form').serialize();
                                            var formAction = $('#form').attr('action');
                                            var formMethod = $('#form').attr('method');
                                            $.ajaxSetup({
                                            headers: {
                                            'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                                            }
                                            });
                                            $.ajax({
                                            type  : formMethod,
                                            url   : formAction,
                                            data  : formData,
                                            cache : false,
                                            success : function(data) {
                                            $('#triagens').modal('show');
                                            },
                                            error : function() {
                                            console.log('Erro executando atualização.')
                                            }
                                            });
                                            return false; // prevent send form
                                            });
                                        $('#triagens').on('click', '#btnsvtriagem', function(e) {
                                        e.preventDefault();
                                        var formData = $('#formtri').serialize();
                                        var dh_inicio_triagem = $('#dh_inicio_triagem').val();
                                        var dh_fim_triagem = $('#dh_fim_triagem').val();
                                        var id_usuario = $('#usutri').val();
                                        if (!id_usuario > 0) {
                                            alert('Selecione o usuário destino da triagem');
                                        }
                                        if (dh_fim_triagem < dh_inicio_triagem ){
                                            alert('O horário de término deve ser maior que o de início');
                                        } else {
                                            
                                        var formAction = $('#formtri').attr('action');
                                        var formMethod = $('#formtri').attr('method');
                                        $.ajaxSetup({
                                        headers: {
                                        'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                                        }
                                        });
                                        $.ajax({
                                        type  : formMethod,
                                        url   : formAction,
                                        data  : formData,
                                        cache : false,

                                        success : function(data) {
                                        $('#triagens').modal('hide');
                                        $('#tbtriagens').load(location.href + ' #tbtriagens', 
                                            function (responseText, status) {
                                        $('#formtri')[0].reset();
                                        if (!status == 'success') {
                                        console.log('Falha recarregando a tabela');
                                        }
                                        });
                                        },
                                        error : function() {
                                        console.log('Erro executando atualização.')
                                        }
                                        });
                                        }                                        
                                        return false; // prevent send form
                                        });
                                        $('#tbtriagens').on("click", ".btn-xs.btn.btn-danger",function(e) {
                                            $('#modalconfirm').modal('show');
                                            idTriagem = ($(this).attr("data-id"));
                                        });
                                        $('#modalconfirm').on("click", ".btn-primary", function(e) {

                                            var formAction = '/triagens/'+idTriagem;
                                            var formMethod = 'DELETE';

                                            $.ajaxSetup({
                                            headers: {
                                            'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                                            }
                                            });
                                            $.ajax({
                                            type  : formMethod,
                                            url   : formAction,
                                            data  : {id : idTriagem},
                                            cache : false,

                                            success : function(data) {
                                            $('#modalconfirm').modal('hide');
                                            $('#tbtriagens').load(location.href + ' #tbtriagens', function (responseText, status) {
                                            if (!status == 'success') {
                                            console.log('Falha recarregando a tabela');
                                            }
                                            });
                                            },
                                              error: function(xhr, textStatus, errorThrown) { 
                                                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                                                    },
                                            });
                                            });
                                        });
                                        </script>
                            </form>
                            </div>
                        </div>
                        <div id="modalconfirm" role="dialog" class="modal fade" style="margin-top :10%;">
                            <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Confirma exclusão do Registro</h4>
                                        </div>
                                    <div class="modal-body bg-danger">
                                        <p><strong>Deseja realmente exluir a triagem selecionada? Esta ação é irreversível</strong></p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" id="btconfdel" class="btn btn-md btn-primary" >Confirma</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancela</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css" media="screen">
.panel.with-nav-tabs .panel-heading{
padding: 5px 5px 0 5px;
}
.panel.with-nav-tabs .nav-tabs{
border-bottom: none;
}
.panel.with-nav-tabs .nav-justified{
margin-bottom: -1px;
}
/********************************************************************/
/*** PANEL DEFAULT ***/
.with-nav-tabs.panel-default .nav-tabs > li > a,
.with-nav-tabs.panel-default .nav-tabs > li > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li > a:focus {
color: #777;
}
.with-nav-tabs.panel-default .nav-tabs > .open > a,
.with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-default .nav-tabs > li > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li > a:focus {
color: #777;
background-color: #ddd;
border-color: transparent;
}
.with-nav-tabs.panel-default .nav-tabs > li.active > a,
.with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
color: #555;
background-color: #fff;
border-color: #ddd;
border-bottom-color: transparent;
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
background-color: #f5f5f5;
border-color: #ddd;
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
color: #777;
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
background-color: #ddd;
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
color: #fff;
background-color: #555;
}
/********************************************************************/
/*** PANEL PRIMARY ***/
.with-nav-tabs.panel-primary .nav-tabs > li > a,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
color: #fff;
}
.with-nav-tabs.panel-primary .nav-tabs > .open > a,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
color: #fff;
background-color: #3071a9;
border-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
color: #428bca;
background-color: #fff;
border-color: #428bca;
border-bottom-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
background-color: #428bca;
border-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
color: #fff;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
background-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
background-color: #4a9fe9;
}
}
</style>
@stop
