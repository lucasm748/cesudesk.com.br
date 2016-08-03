<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cesudesk - SD</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery/jquery-ui-timepicker-addon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('simple-sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/login-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome-4.6.3/css/font-awesome.min.css') }}" >
 

</head>
<body>
    <script type="text/javascript" src="{{ asset('jquery/external/jquery/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('jquery/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('jquery/jquery-ui-timepicker-addon.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables/dataTables.responsive.min.js') }}"></script>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
                <li>
                    <a href="/"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> <h2>Cesudesk</h2></a>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-archive fa-stack-1x "></i></span> Cadastros</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="/cargos">Cargos</a></li>
                        <li><a href="/equipes">Equipes</a></li>
                        <li><a href="/modulos">Módulos</a></li>
                        <li><a href="/projetos">Projetos</a></li>
                        <li><a href="/tipoTarefas">Tipos de Tarefa</a></li>
                        <li><a href="/usuarios">Usuários</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span> Tarefas</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span>Minhas</a></li>
                        <li><a href="/tarefas"><span class="fa-stack fa-lg pull-left"><i class="fa fa-tasks fa-stack-1x "></i></span>Todas</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span>Relatórios</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-bar-chart fa-stack-1x "></i></span>Metas</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-list-alt fa-stack-1x "></i></span>Projetos</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-list-ul fa-stack-1x "></i></span>Tarefas</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-align-center fa-stack-1x "></i></span>Volumes</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-wrench fa-stack-1x "></i></span>Configurações</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-wrench fa-stack-1x "></i></span>Parâmetros</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-paint-brush fa-stack-1x "></i></span>Preferências</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-youtube-play fa-stack-1x "></i></span>Sobre</a>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Contato</a>
                </li>
                <li>
                    @if(Auth::check())
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span>{{ Auth::user()->login }}</a>
                    @endif
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li>
                            @if(Auth::check())
                            <a href="{{ url('logout') }}"><span class="fa-stack fa-lg pull-left"><i class="fa fa-close fa-stack-1x "></i></span>Sair</a>
                            @endif
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-default" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                    </a>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->
<script>
$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});
$("#menu-toggle-2").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled-2");
$('#menu ul').hide();
});

function initMenu() {
$('#menu ul').hide();
$('#menu ul').children('.current').parent().show();
//$('#menu ul:first').show();
$('#menu li a').click(
function() {
var checkElement = $(this).next();
if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
return false;
}
if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
$('#menu ul:visible').slideUp('normal');
checkElement.slideDown('normal');
return false;
}
}
);
}
$(document).ready(function() {initMenu();});
$.fn.myDataTableConfig = function() {
$.extend( $.fn.dataTable.defaults, {
"responsive": true,
"sorting": [],
"language": {
"lengthMenu": "Exibir _MENU_ registros por página",
"zeroRecords": "Nenhum registro encontrado",
"info": "_TOTAL_ registro(s) encontrado(s) | Exibindo de _START_ a _END_ | Página _PAGE_ de _PAGES_.",
"infoEmpty": "Não há itens para o filtro selecionado.",
"infoFiltered": " | Total de _MAX_ registros",
"search": "Pesquisar:",
"paginate": {
"previous": "Anterior",
"next": "Próximo"
}
},
"search": {
"regex": true,
},
});
return this;
}
</script>
</body>
</html>
