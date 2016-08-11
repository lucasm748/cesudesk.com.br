$(document).ready(function() {
    initMenu();
});
$.fn.myDataTableConfig = function() {
    $.extend($.fn.dataTable.defaults, {
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
            if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                return false;
            }
            if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                $('#menu ul:visible').slideUp('normal');
                checkElement.slideDown('normal');
                return false;
            }
        }
    );
}
