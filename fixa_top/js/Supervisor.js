 $(document).ready(function() {
    //consulta redistribuicao
    $('#solicitacao_operador_usuario_visao_supervisor').click(function(e) {
        $('#faseRedistribuicao').html('');
        $('#operadorRedistribuir').html('');


            var n_solicitacao = $('#nSolicitacaoRedistribuicao').val();

        if(n_solicitacao == '' || n_solicitacao == undefined){n_solicitacao = '0'};


        $.getJSON('app/Controller/SolicitacaoController.php?opcao=tabela_redistribuicao&n_solicitacao=' + n_solicitacao, function(dados) {
            if (dados.length > 0) {
                var tr = '<tr style="display: none;"></tr>';
                $.each(dados, function(i, obj) {
                            tr += '<tr>';
                            tr += '<td class="lalign">' + obj[0] + '</td>';
                            tr += '<td id="tramitacaor" class="lalign">' + obj[1] + '</td>';
                            tr += '<td id="aprovacaor" class="lalign">' + obj[2] + '</td>';
                            tr += '<td class="lalign">' + obj[3] + '</td>';
                            tr += '<td id="revisaor" class="lalign">' + obj[4] + '</td>';
                        tr += '</tr>';        
                })
            } else {
                Reset();
            }
            $('#rowSolicitacoes').html(tr).show();
        }).error(function() { 
            var tr = '<tr><td colspan="10">Nenhum registro encontrado</td></tr>';
            $('#rowSolicitacoes').html(tr);
        })
    })

    $('.detalhes_itens_pendentes_operador_area_supervisor').click(function(e){
        var dados = e.currentTarget.childNodes[1].innerHTML;
        dados = dados.split('$');
        usuario = dados[0].trim();
        fase = dados[1].trim();

        if($('#icone_'+usuario).hasClass("fa-plus"))
        {
            $.getJSON('app/Controller/SolicitacaoController.php?opcao=itens_operador_area_supervisor&usuario=' + usuario + '&fase=' + fase, function(dados) {
                if (dados.length > 0) {
                    var tr = '<tr class="itens_pendentes_' + usuario +'" >';
                        tr += '<td class="cabecalho_itens_pendentes">Solicita\u00e7\u00e3o</td>';
                        tr += '<td class="cabecalho_itens_pendentes">Revis\u00e3o</td>';
                        tr += '<td class="cabecalho_itens_pendentes">Data de Recebimento</td>';
                        tr += '</tr>';
                    $.each(dados, function(i, obj) {
                        tr += '<tr class="itens_pendentes_' + usuario + '" style="width:100%; background-color:lightgoldenrodyellow;">';
                        tr += '<td style="width:50%" class="lalign">' + obj[0] + '</td>';
                        tr += '<td style="width:50%" class="lalign">' + obj[1] + '</td>';
                        tr += '<td style="width:80%" class="lalign">' + obj[2] + '</td>';
                        tr += '</tr>';        
                    })
                } else {
                    Reset();
                }
                $('#itens_pendentes_operador_area_supervisor_'+usuario).html(tr).show();
                $('#icone_'+usuario).addClass("fa-minus");
                $('#icone_'+usuario).removeClass("fa-plus");
            }).error(function() { 
                var tr = '<tr class="itens_pendentes_' + usuario +'"><td colspan="50">Nenhum registro encontrado</td></tr>';
                $('#itens_pendentes_operador_area_supervisor_'+usuario).html(tr);
            })
        }
        else if($('#icone_'+usuario).hasClass("fa-minus"))
        {
            $('#icone_'+usuario).addClass("fa-plus");
            $('#icone_'+usuario).removeClass("fa-minus");
            $('.itens_pendentes_'+usuario).remove();
        }
    })
});