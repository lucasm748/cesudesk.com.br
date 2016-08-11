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
            type: formMethod,
            url: formAction,
            data: formData,
            cache: false,
            success: function(data) {
                $('#triagens').modal('show');
            },
            error: function() {
                console.log('Erro executando atualização.')
            }
        });
        return false; // prevent send form
    });
    $('#triagens').on('click', '#btnsvtriagem', function(e) {
        e.preventDefault();
        var formData = $('#formtri').serialize();
        var dh_inicio_triagem = $('#dh_inicio_triagem').val();
        // var dh_fim_triagem = $('#dh_fim_triagem').val();
        var id_usuario = $('#usutri').val();
        if (!id_usuario > 0) {
            setTimeout("$('#mensagem').fadeOut()", 4000);
            $('#mensagem').html('<p class="text-center bg-danger">O usuário deve ser selecionado.</p>');
        }
        if (!dh_inicio_triagem) {
            setTimeout("$('#mensagem').fadeOut()", 4000);
            $('#mensagem').html('<p class="text-center bg-danger">Informe uma data de início válida.</p>');

        }
        // if (dh_fim_triagem < dh_inicio_triagem) {
        //     $('#mensagem').html('<p class="text-center bg-danger">O horário final de execução deve ser maio que o início.</p>');
        // } else {

            var formAction = $('#formtri').attr('action');
            var formMethod = $('#formtri').attr('method');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                }
            });
            $.ajax({
                type: formMethod,
                url: formAction,
                data: formData,
                cache: false,
                success: function(data) {
                    $('#triagens').modal('hide');
                    $('#tbtriagens').load(location.href + ' #tbtriagens',
                        function(responseText, status) {
                            $('#formtri')[0].reset();
                            if (!status == 'success') {
                                console.log('Falha recarregando a tabela');
                            }
                        });
                },
                error: function() {
                    console.log('Erro executando atualização.')
                }
            });
        // } // Else da validação de hora
        return false; // prevent send form
    });
    $('#tbtriagens').on("click", ".btn-xs.btn.btn-danger", function(e) {
        $('#modalconfirm').modal('show');
        idTriagem = ($(this).attr("data-id"));
    });
    $('#modalconfirm').on("click", ".btn-primary", function(e) {
        var formAction = '/triagens/' + idTriagem;
        var formMethod = 'DELETE';
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
            }
        });
        $.ajax({
            type: formMethod,
            url: formAction,
            data: {
                id: idTriagem
            },
            cache: false,
            success: function(data) {
                $('#modalconfirm').modal('hide');
                $('#tbtriagens').load(location.href + ' #tbtriagens', function(responseText, status) {
                    if (!status == 'success') {
                        console.log('Falha recarregando a tabela');
                    }
                });
            },
            error: function(xhr, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            },
        });
    });
});
$(function() {
    $('#dh_inicio_triagem').datetimepicker({
        dateFormat: 'dd/mm/yy',
        showOtherMonths: true,
        selectOtherMonths: true,
        showButtonPanel: true,
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
    });
});
$(function() {
    $('#dh_fim_triagem').datetimepicker({
        dateFormat: 'dd/mm/yy',
        showOtherMonths: true,
        selectOtherMonths: true,
        showButtonPanel: true,
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
    });
});
$(function() {
    $('#dh_entrega_prev').datepicker({
        dateFormat: 'dd/mm/yy',
        showOtherMonths: true,
        selectOtherMonths: true,
        showButtonPanel: true,
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
    });
});
