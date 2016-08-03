@extends('layouts.app')
@section('content')
@if($tarefa->descricao)
<h2 class="text-info">Tarefa: {{ $tarefa->titulo }}</h2>
@else
<h1 class="text-info"> Tarefa: Nova Tarefa </h1>
@endif
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <<li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@if ($tarefa->id >0)
<form name="form" role="form" id="form" action="{{ url('tarefas', $tarefa->id) }}" method="post" accept-charset="utf-8">
    <div class="container-fluid">
        <input name="_method" type="hidden" value="PUT">
        @else
        <form name="form" role="form" id="form" action="{{ url('tarefas') }}" method="post" accept-charset="utf-8">
            <input name="_method" type="hidden" value="POST">
            @endif
            {!! csrf_field() !!}
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="ative"><a data-toggle="tab" href="#tabs-1">Dados da Solicitação</a></li>
                        <li><a data-toggle="tab" href="#tabs-2">Informações Adicionais</a></li>
                        <li><a data-toggle="tab" href="#tabs-3">Triagens</a></li>
                        <li><a data-toggle="tab" href="#tabs-4">Anexos</a></li>
                        <li><a data-toggle="tab" href="#tabs-5">Comentários</a></li>
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
                        </div>
                        <div id="tabs-2" class="tab-pane fade">
                            <div class="form-group">
                                <label>Informações Adicionais</label>
                                <textarea class="form-control" name="ds_info_complementar" id="ds_info_complementar" rows="6" cols="15" placeholder="Informações adicionais diversas">{!!$tarefa->ds_info_complementar!!}</textarea>
                            </div>
                        </div>
                        <div id="tabs-3" class="tab-pane fade">
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#triagens">Nova Triagem</button>
                            @if (!(count($tarefa->triagens)>0))
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-md-4 col-md-offset-4">
                                    <label class="alert alert-info">Nenhum registro encontrado.</label>
                                </div>
                            </div>
                            @else
                            <table class="table table-striped table-hover table-responsive table-condensed">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Usuário</td>
                                        <td>Descrição</td>
                                        <td>Início</td>
                                        <td>Fechamento</td>
                                        <td>Horas gastas</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tarefa->triagens as $triagem)
                                    <tr>
                                        <td>{{ $triagem->id}}</td>
                                        <td>{{ $triagem->usuario->login}}</td>
                                        <td>{{ $triagem->descricao}}</td>
                                        <td>{{ $triagem->dh_inicio_triagem}}</td>
                                        <td>{{ $triagem->dh_fim_triagem}}</td>
                                        <td>{{ $triagem->qt_horas}}</td>
                                        <td>{{ $triagem->tp_status}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                            <!-- Modal -->
                            <div id="triagens" role="dialog" class="modal fade">
                            <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Triagens</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div id="triagem-area">
                                                <div class="form-group">
                                                    <label class="control-label">Descrição</label>
                                                    <input type="text" class="form-control" placeholder="Breve descrição sobre a finalidade da triagem">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Usuário</label>
                                                    <select name="usuario" class="form-control">
                                                        <option value="1">Usuario 1</option>
                                                        <option value="2">Usuario 2</option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Início Triagem</label>
                                                        <input type="text" class="form-control" id="dh_inicio_triagem" name="dh_inicio_triagem" value="{{ $tarefa->dh_inicio_triagem }}" placeholder="Data de início da triagem">
                                                        <script>
                                                        $(function() {
                                                        $('#dh_inicio_triagem').datetimepicker({
                                                        dateFormat: 'dd/mm/yy H:i:s',
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
                                                        dateFormat: 'dd/mm/yy H:i:s',
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
                                            <button type="button" class="btn btn-md btn-primary">Salvar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        </div>
                                </div>
                            </div>
                            </div>
                            </div>

                        </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" value="Salvar"/>
                            <a class="btn btn-danger" type="reset" href="/tarefas">Cancelar</a>
                        </div>
                    </div>
                    </form>
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
