$(document).ready(function() {
     $('#form_tramitacao_itens_preencher_operador').click(function(){
            var idUsuario = $('#id_usuario_tramitacao').val();
            var fase = $('#solicitacao_pendentes_tramitacao').val();
                              
            document.location.replace('../fixa_top/principal.php?idu='+idUsuario+'&solicitacao_pendentes='+fase+'&t=View/SolicitacaoPendenteTramitacao.php');
     })

    $('#form_tramitacao_itens_aguardo_operador').click(function(){
            var idUsuario = $('#id_usuario_tramitacao').val();
            var fase = $('#solicitacao_pendentes_tramitacao').val();
                              
            document.location.replace('../fixa_top/principal.php?idu='+idUsuario+'&solicitacao_pendentes='+fase+'&t=View/SolicitacaoAguardoTramitacao.php');
     })

     $('#form_aprovacao_itens_preencher_operador').click(function(){
            var idUsuario = $('#id_usuario_aprovacao').val();
            var fase = $('#solicitacao_pendentes_aprovacao').val();
                              
            document.location.replace('../fixa_top/principal.php?idu='+idUsuario+'&solicitacao_pendentes='+fase+'&t=View/SolicitacaoPendenteAprovacao.php');
     })

     // consulta redistribuicao
    $('#consultaSolicitacoesRedistribuicao').click(function(e) {
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

    $('#consultaSolicitacoesRedistribuicao').blur(function(e){
        //atualiza opcao de redistribuicao
       
        var tramitacao = $('#tramitacaor').text();
        var aprovacao = $('#aprovacaor').text();

        if(tramitacao == "Com operador" || tramitacao == "Conclu\u00eddo" && aprovacao == ''){
             $('#faseRedistribuicao').html("<option value='tramitacao'>Tramita\u00e7\u00e3o</option>").show();
        }else if(aprovacao == "Com operador" || aprovacao == "Conclu\u00eddo"){
             var option = "<option value='tramitacao'>Tramita\u00e7\u00e3o</option>";
                option += "<option value='aprovacao'>Aprova\u00e7\u00e3o</option>"
             $('#faseRedistribuicao').html(option).show();
        }
    })

     $('#faseRedistribuicao').blur(function(e){
        //atualiza opcao de redistribuicao
        var fase = $('#faseRedistribuicao').val();
        var idUsuarioCriptografado = $('#id_usuario').val();

        $.getJSON('app/Controller/SolicitacaoController.php?opcao=usuario_fase&fase=' + fase + '&idUsuarioCriptografado=' + idUsuarioCriptografado , function(dados) {
            if (dados.length > 0) {
                var option = '<option>Selecione o operador</option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj[0] + '">' + obj[1] +  ' - ' + obj[2] +'(pedidos)'+ '</option>';
                })
            } else {
                Reset();
            }
            $('#operadorRedistribuir').html(option).show();
        }).error(function() { 
            var option = '<option></option>';
            $('#operadorRedistribuir').html(option).show();
        })
    })

      $("#bt_enviar_form").click(function() {
        //somente será permitido cnpjs válidos
        if ($('#cnpj_cpf').val() != "") {
            validaCnpj($('#cnpj_cpf').val());
        }
    });

      $('#consultaSolicitacaoExistente').click(function(e){
        var solicitacaoExistente = $('#n_solicitacao_existente').val();
        solicitacaoExistente = solicitacaoExistente.toUpperCase();

        $.getJSON('app/Controller/SolicitacaoController.php?opcao=consultaSolicitacaoExistente&ids=' + solicitacaoExistente , function(dados) {
            if (dados.length > 0) 
            {
                 $.each(dados, function(i, obj) {
                        if(obj[1] == 5 || obj[1] == 16 && obj[2] == "Pendente chamado")
                        {
                            alert("Necess\u00e1rio atualizar chamado no sistema");
                            $('#n_solicitacao_existente').val('');
                        }
                        else
                        {
                            $('#solicitacao_manual_nova').show();
                            $('#solicitacao_manual_existente').hide();
                            $('#n_solicitacao_manual').val(solicitacaoExistente);
                            $('#form_solicitacao_manual').hide();
                        }
                })
            } 
            else 
            {
                alert("Solicita\u00e7\u00e3o n\u00e3o encontrada na lista de pendentes!");
                $('#n_solicitacao_existente').val('');
            }
        }).error(function() { 
           alert("Solicita\u00e7\u00e3o n\u00e3o encontrada na lista de pendentes!");
           $('#n_solicitacao_existente').val('');
        })
     })

        // Carrega tabela devolucao
    $('#ConsultaSolicitacoesHistorico').click(function(e) {

        var n_solicitacao = $('#n_solicitacao').val();
        
        n_solicitacao = n_solicitacao.trim();

        if(n_solicitacao == '' || n_solicitacao == undefined){n_solicitacao = null};

        $.getJSON('app/Controller/SolicitacaoController.php?opcao=consultaHistoricoSolicitacao&n_solicitacao=' + n_solicitacao, function(dados) {
            if (dados.length > 0) {
                var tr = '<tr style="display: none;"></tr>';
                $.each(dados, function(i, obj) {
                    tr += '<tr>';
                    tr += '<td class="lalign">' + obj[0] + '</td>';
                    tr += '<td class="lalign">' + obj[1] + '</td>';
                    tr += '<td class="lalign">' + obj[2] + '</td>';
                    tr += '<td class="lalign">' + obj[3] + '</td>';
                    tr += '<td class="lalign">' + obj[4] + '</td>';
                    tr += '<td class="lalign">' + obj[5] + '</td>';
                    tr += '<td class="lalign">' + obj[6] + '</td>';
                    tr += '<td class="lalign">' + obj[7] + '</td>';
                    tr += '<td class="lalign">' + obj[8] + '</td>';
                    tr += '<td class="lalign">' + obj[9] + '</td>';
                    tr += '</tr>';
                })
            } else {
                Reset();
            }
            $('#rowSolicitacoes').html(tr).show();
             $('#keywords').tablesorter(); 
        }).error(function() { 
            var tr = '<tr><td colspan="10">Nenhum registro encontrado</td></tr>';
            $('#rowSolicitacoes').html(tr);
        })
    })

    //consulta redistribuicao
    $('#servico').change(function() {
        $('#complemento_servico').val('');
        var servico = $('#servico').val();
        var fonte = $('#fonte').val();

        if(servico == "" || servico == undefined)
        {
            return;
        }

        $.getJSON('app/Controller/TramitacaoController.php?opcao=busca_complemento_solicitacao&servico=' + servico + '&fonte=' + fonte, function(dados) 
        {
           if (dados.length > 0) 
           {
                var option = '<option>Selecione o complemento do servi\u00e7o</option>';
                $.each(dados, function(i, obj) 
                {
                    option += '<option value="' + obj + '">' + obj + '</option>';
                })
            }
            else 
            {
                Reset();
            }
            $('#complemento_servico').html(option).show();
        }).error(function() 
        { 
            var option = '<option>N\u00e3o encontrado</option>';
            $('#complemento_servico').html(option).show();
        })
    })

    $('#status_solicitacao').change(function()
    {
        var status = $('#status_solicitacao').val();
        if(status != 12 && status != 28 && status != 0 && status != 23)
        {
            //ativa campos de devolucao e tornar obrigatorio campos
            $("#motivo_devolucao").removeAttr("disabled");
            $("#descricao_motivo_devolucao").removeAttr("disabled");

            $("#motivo_devolucao").attr("required", true);
            $("#descricao_motivo_devolucao").attr("required", true);

            //mostra campos de devolucao
            $("#rcd1").removeClass("campos_devolucao");
            $("#rcd2").removeClass("campos_devolucao");
            $("#rcd3").removeClass("campos_devolucao");

            //busca motivos de acordo com status
            $('#motivo_devolucao').val('');
            
            $.getJSON('app/Controller/TramitacaoController.php?opcao=busca_motivo_devolucao&status=' + status, function(dados) 
            {
               if (dados.length > 0) 
               {
                    var option = '<option>Selecione o motivo</option>';
                    $.each(dados, function(i, obj) 
                    {
                        option += '<option value="' + obj + '">' + obj + '</option>';
                    })
                }
                else 
                {
                    Reset();
                }
                $('#motivo_devolucao').html(option).show();
            }).error(function() 
            { 
                var option = '<option>N\u00e3o encontrado</option>';
                $('#motivo_devolucao').html(option).show();
            })
        }
        else
        {
            $("#area_devolucao").attr('disabled', 'disabled');
            $("#motivo_devolucao").attr('disabled', 'disabled');
            $("#descricao_motivo_devolucao").attr('disabled', 'disabled');

            //esconde campos de devolucao
            $("#rcd1").addClass("campos_devolucao");
            $("#rcd2").addClass("campos_devolucao");
            $("#rcd3").addClass("campos_devolucao");

            //observacao não é obrigatoria neste caso
            $("#obs").removeAttr("required");
            $("#obs_label").text("Obs");

            //esconde campos de devolucao
            $("#rcd1").addClass("campos_devolucao");
            $("#rcd2").addClass("campos_devolucao");
            $("#rcd3").addClass("campos_devolucao");
        }
    })

    $('#motivo_devolucao').change(function()
    {
        $('#descricao_motivo_devolucao').val('');
    })
});

function buscaSolicitacoesPendentes(){
      
      var idUsuario = $('#id_usuario').val();
      var fase = $('#fase').val();

      $.getJSON('app/Controller/SolicitacaoController.php?opcao=consultaItensPendentesFasesOperador&idUsuarioCriptografado=' + idUsuario + '&fase=' + fase, function(dados) {
        if (dados.length > 0) {
             var tr = '<tr style="display: none;"></tr>';
            $.each(dados, function(i, obj) {
                if(obj[10] == 'Tramitacao')
                {
                    var pagina = 'Tramitacao.php';
                }
                else if(obj[10] == 'Aprovacao')
                {
                    var pagina = 'Aprovacao.php';
                }else
                {
                    var pagina = 'TramitacaoManual.php';
                }
                tr += '<tr>';
                    tr += '<td class="lalign">' + obj[0] + '</td>';
                    tr += '<td class="lalign">' + obj[1] + '</td>';
                    tr += '<td class="lalign">' + obj[2] + '</td>';
                    tr += '<td class="lalign">' + obj[3] + '</td>';
                    tr += '<td class="lalign">' + obj[4] + '</td>';
                    tr += '<td class="lalign">' + obj[5] + '</td>';
                    tr += '<td class="lalign">' + obj[6] + '</td>';
                    tr += '<td class="lalign">' + obj[7] + '</td>';
                    tr += '<td class="lalign">' + obj[8] + '</td>';
                    tr += '<td class="lalign">' + obj[9] + '</td>';
                    tr += '<td><form action="principal.php?t=View/'+ pagina+'"method="post">';
                    tr += '<input type="hidden" value=' +obj[2]+' name="revisao" id="revisao"></input>';
                    tr += '<input type="hidden" value=' +idUsuario+' name="id_usuario" id="id_usuario"></input>';
                    tr += '<input type="hidden" value=' +obj[1]+' name="id_solicitacao" id="id_solicitacao"></input>';
                    tr += '<input type="submit" value="Preencher" class="ItensDistribuidos">';
                    tr += '</form></td>';
                    tr += '</tr>';                    

            })
            $('#rowSolicitacoes').html(tr).show();
        }
    })
 }

 function buscaSolicitacoesAguardo(){
      
      var idUsuario = $('#id_usuario').val();
      var fase = $('#fase').val();

      $.getJSON('app/Controller/SolicitacaoController.php?opcao=consultaItensAguardoFasesOperador&idUsuarioCriptografado=' + idUsuario + '&fase=' + fase, function(dados) {
        if (dados.length > 0) {
             var tr = '<tr style="display: none;"></tr>';
            $.each(dados, function(i, obj) {
                if(obj[0].substr(0,2) == "ST")
                {
                    var pagina = 'TramitacaoManual.php';
                }
                else
                {
                    var pagina = 'Tramitacao.php';
                }
            
                tr += '<tr>';
                    tr += '<td class="lalign">' + obj[0] + '</td>';
                    tr += '<td class="lalign">' + obj[1] + '</td>';
                    tr += '<td class="lalign">' + obj[2] + '</td>';
                    tr += '<td class="lalign">' + obj[3] + '</td>';
                    tr += '<td class="lalign">' + obj[4] + '</td>';
                    tr += '<td class="lalign">' + obj[5] + '</td>';
                    tr += '<td class="lalign">' + obj[6] + '</td>';
                    tr += '<td class="lalign">' + obj[7] + '</td>';
                    tr += '<td class="lalign">' + obj[8] + '</td>';
                    tr += '<td class="lalign">' + obj[9] + '</td>';
                    tr += '<td class="lalign">' + obj[10] + '</td>';
                    tr += '<td><form action="principal.php?t=View/'+ pagina+'"method="post">';
                    tr += '<input type="hidden" value=' +obj[10]+' name="revisao" id="revisao"></input>';
                    tr += '<input type="hidden" value=' +idUsuario+' name="id_usuario" id="id_usuario"></input>';
                    tr += '<input type="hidden" value=' +obj[0]+' name="id_solicitacao" id="id_solicitacao"></input>';
                    tr += '<input type="submit" value="Preencher" class="ItensDistribuidos">';
                    tr += '</form></td>';
                    tr += '</tr>';                    

            })
            $('#rowSolicitacoes').html(tr).show();
        }
    })
 }

function buscaSolicitacoesDistribuicaoByFase(idUsuarioCriptografado)
{
    var faseDistribuirSolicitacao = $('#areaConsultaFaseItens').val();
    var siscom = $('#siscom_solicitacao_distribuir').val();

    if(siscom == '' || siscom == 'undefined')
    {
        siscom = null;
    }

    if(faseDistribuirSolicitacao == "tramitacao")
    {

        //atualiza cabeçalho de acordo com a fase
        var th = '<th><span></span></th>';
            th += '<th><span>Priorizar</span></th>';
            th += '<th><span>Horas Prioridade</span></th>';
            th += '<th><span>Siscom</span></th>'; 
            th += '<th><span>CNPJ/CPF</span></th>'; 
            th += '<th><span>Raz\u00e3o Social</span></th>'; 
            th += '<th><span>Gerente Neg\u00f3cio</span></th>'; 
            th += '<th><span>Escrit\u00f3rio GN</span></th>';
            th += '<th style="width: 4%;"><span>Gn respons\u00e1vel</span></th>';
            th += '<th><span>Status</span></th>';
            th += '<th><span>Revis\u00e3o</span></th>';
            th += '<th><span>Importa\u00e7\u00e3o Data</span></th>';
            th += '<th><span>Data Siscom(In\u00edcio SLA)</span></th>';
            th += '<th><span>Data Vencimento SLA</span></th>';
            th += '<th><span>Tempo Restante</span></th>';
            th += '<th><span>Importa\u00e7\u00e3o usu\u00e1rio</span></th>'; 
            th += '<th><span>Origem</span></th>';
            th += '<th style="width: 9%;"><span>Usu\u00e1rio Tramita\u00e7\u00e3o Ultima vers\u00e3o</span></th>';

    }
    
    if(faseDistribuirSolicitacao == "aprovacao")
    {

       //atualiza cabeçalho de acordo com a fase
        var th = '<th><span></span></th>';
            th += '<th><span>Priorizar</span></th>';
            th += '<th><span>Horas Prioridade</span></th>';
            th += '<th><span>Siscom</span></th>';
            th += '<th><span>Revis\u00e3o</span></th>'; 
            th += '<th><span>Data Siscom(In\u00edcio SLA)</span></th>';
            th += '<th><span>Data Vencimento SLA</span></th>';
            th += '<th><span>Tempo Restante</span></th>'; 
            th += '<th><span>Qtde Acessos</span></th>';
            th += '<th><span>CNPJ/CPF</span></th>'; 
            th += '<th><span>Raz\u00e3o Social</span></th>'; 
            th += '<th><span>Status Tramita\u00e7\u00e3o</span></th>';
            th += '<th><span>Obs Tramita\u00e7\u00e3o</span></th>';          
            th += '<th><span>Operador Tramita\u00e7\u00e3o</span></th>';
            th += '<th><span>Data de Finaliza\u00e7\u00e3o Tramita\u00e7\u00e3o</span></th>';
     }       

    //cola o cabeçalho
    $('#keywords thead tr').html(th).show();

    //buscando os dados
        if(faseDistribuirSolicitacao == "tramitacao")
        {

            //busca itens
            $.getJSON('app/Controller/SolicitacaoController.php?opcao=buscaSolicitacoesTramitacaoDistribuir&siscom=' + siscom, function(dados) {
               
               //monta os dados
               if (dados.length > 0) 
               {
                   var tr = '<tr style="display: none;"></tr>';
                    $.each(dados, function(i, obj) {
                        if(obj[11] == null)
                        {
                            var usuario_tramitacao = '';
                        }else{
                            var usuario_tramitacao = obj[11];
                        }


                        tr += '<tr>';
                        tr += '<td><input type="checkbox" style="width: 12px;" class="checkboxSiscom" name="cod_siscom_tramitacao[]" value="' + obj[0] + '&' + obj[7] + '">';
                        tr += '</td>';
                        tr += '<td><input type="text" value="0" id="priorizar" name="priorizar[]" style="width: 30px;text-align: center;">';
                        tr += '<td><input type="text" value="0" id="numero_horas_prioridade" name="numero_horas_prioridade[]" style="width: 30px;text-align: center;">';
                        tr += '<td class="lalign">' + obj[0] + '</td>'; //Siscom
                        tr += '<td class="lalign">' + obj[1] + '</td>'; //cnpj
                        tr += '<td class="lalign">' + obj[2] + '</td>'; //razao_social
                        tr += '<td class="lalign">' + obj[3] + '</td>'; //gerente negocio
                        tr += '<td class="lalign">' + obj[4] + '</td>'; //escritorio gn
                        tr += '<td class="lalign">' + obj[5] + '</td>'; //gn responsavel
                        tr += '<td class="lalign">' + obj[6] + '</td>'; //status
                        tr += '<td class="lalign">' + obj[7] + '</td>'; //revisao
                        tr += '<td class="lalign">' + obj[8] + '</td>'; //importacao data
                        tr += '<td class="lalign">' + obj[12] + '</td>'; //data siscom
                        tr += '<td class="lalign">' + obj[13] + '</td>'; //data_vencimento_sla
                        tr += '<td class="lalign">' + obj[14] + '</td>'; //tempo_restante
                        tr += '<td class="lalign">' + obj[9] + '</td>'; //importacao_usuario
                        tr += '<td class="lalign">' + obj[10] + '</td>'; //origem
                        tr += '<td class="lalign">' + usuario_tramitacao + '</td>'; //usuario tramitacao
                        tr += '</tr>';                    
                    })
                }

                //cola os dados
                $('#areaConsultaFaseItensDados').html(tr).show();

            }).error(function() { 
                 var tr = '<tr><td colspan="15">Nenhum registro encontrado</td></tr>';

                //cola mensagem de retorno
                $('#areaConsultaFaseItensDados').html(tr).show();
            })

            $('#excluirSolicitacoesSiscom').css({ "display": "" });
        }
        else if(faseDistribuirSolicitacao == "aprovacao")
        {
            //busca itens
            $.getJSON('app/Controller/SolicitacaoController.php?opcao=buscaSolicitacoesAprovacaoDistribuir&idUsuarioCriptografado=' + idUsuarioCriptografado + '&siscom=' + siscom, function(dados) {
               
               //monta os dados
               if (dados.length > 0) 
               {
                   var tr = '<tr style="display: none;"></tr>';
                    $.each(dados, function(i, obj) {
                            tr += '<tr>';  
                            tr += '<td><input type="checkbox" style="width: 12px;" class="checkboxSiscom" name="cod_siscom_aprovacao[]" value="' + obj[0] + '&' + obj[1] + '">';
                            tr += '</td>';
                            tr += '<td><input type="text" value="0" id="priorizar" name="priorizar[]" style="width: 30px;text-align: center;">';
                            tr += '<td><input type="text" value="'+ obj[12] +'" disabled class="campos_desabilitados" id="numero_horas_prioridade" name="numero_horas_prioridade[]" style="width: 30px;text-align: center;">';
                            tr += '<td class="lalign">' + obj[0] + '</td>'; //Siscom
                            tr += '<td class="lalign">' + obj[1] + '</td>'; //revisao
                            tr += '<td class="lalign">' + obj[2] + '</td>'; //data siscom
                            tr += '<td class="lalign">' + obj[3] + '</td>'; //data vencimento sla
                            tr += '<td class="lalign">' + obj[4] + '</td>'; //tempo restante
                            tr += '<td class="lalign">' + obj[5] + '</td>'; //quantidade de acessos
                            tr += '<td class="lalign">' + obj[6] + '</td>'; //cnpj
                            tr += '<td class="lalign">' + obj[7] + '</td>'; //razao social
                            tr += '<td class="lalign">' + obj[8] + '</td>'; //status tramitacao
                            tr += '<td class="lalign">' + obj[9] + '</td>'; //obs tramitacao
                            tr += '<td class="lalign">' + obj[10] + '</td>'; //operador tramitacao
                            tr += '<td class="lalign">' + obj[11] + '</td>'; //data finalizacao tramitacao
                            tr += '</tr>';  
                    })                 

                    //cola os dados
                    $('#areaConsultaFaseItensDados').html(tr).show();
                }
            }).error(function() { 
                 var tr = '<tr><td colspan="15">Nenhum registro encontrado</td></tr>';

                //cola mensagem de retorno
                $('#areaConsultaFaseItensDados').html(tr).show();
            })

               $('#excluirSolicitacoesSiscom').css({ "display": "none" });
        }

    //carrega usuarios

    if(faseDistribuirSolicitacao == "tramitacao")
    {
        var option = '<option>Selecione o operador</option>';
        //carregar os usuarios de acordo com a fase
        $.getJSON('app/Controller/SolicitacaoController.php?opcao=buscaSolicitacoesTramitacaoOperador&idUsuarioCriptografado=' + idUsuarioCriptografado, function(dadosOperadores) {
            //monta os dados
           if (dadosOperadores.length > 0) 
           {
                
                $.each(dadosOperadores, function(i, obj) {
                    if(obj[0] == "S"){ 
                        option += '<option style="font-weight: bold;" value="'+ obj[0]+'">'+ obj[1] + ' - ' + obj[2] + ' (Pedidos) </option>';
                    }else{
                        option += '<option value="'+ obj[0]+'">'+ obj[1] + ' - ' + obj[2] + ' (Pedidos) </option>';
                    }
                })

                $('#operadorDistribuir').html(option).show();
           }
        })

    }else if(faseDistribuirSolicitacao == "aprovacao")
    {
        var option = '<option>Selecione o operador</option>';
        $.getJSON('app/Controller/SolicitacaoController.php?opcao=buscaSolicitacoesAprovacaoOperador&idUsuarioCriptografado=' + idUsuarioCriptografado + '&fase=' + faseDistribuirSolicitacao, function(dadosOperadores) {
            //monta os dados
           if (dadosOperadores.length > 0) 
           {
                $.each(dadosOperadores, function(i, obj) { 
                    if(obj[3] == "S"){
                        option += '<option style="font-weight: bold;" value="'+ obj[0]+'">'+ obj[1] + ' - ' + obj[2] + ' (Pedidos) </option>';
                    }else{
                        option += '<option value="'+ obj[0]+'">'+ obj[1] + ' - ' + obj[2] + ' (Pedidos) </option>';
                    }
                })
                $('#operadorDistribuir').html(option).show();
           }
        })
    }
}


function enviarSolicitacao(dados, idUsuario, acao, fase) 
{
    //get checkbox selected
    solicitacoesMarcadas = new Array();

    //get operador
    if (acao == 'red') 
    {
        if($('#faseRedistribuicao').val() == null){
            alert("Nenhuma fase selecionada!");
            return;
        }else if($('#operadorRedistribuir').val() == null){
            alert("Nenhuma usuario selecionado!");
            return;
        }else{
            var operador = $('#operadorRedistribuir').val();
            var fase = $('#faseRedistribuicao').val();
            var ids = $('#nSolicitacaoRedistribuicao').val();
            var source = "redistribuicao";
            var supervisorid = idUsuario;
            var ngs = $('#nGsRedistribuicao').val();

            if(ids != undefined)
                solicitacoesMarcadas.push(ids + '&' + $('#revisaor').text());
            else if(ngs != undefined)
                solicitacoesMarcadas.push(ngs + '&' + $('#revisaor').text());
        }
    } 
    else if (acao == 'dist') 
    {
         if($('#operadorDistribuir').val() == null || $('#operadorDistribuir').val() == "Selecione o operador"){
            alert("Nenhuma usuario selecionado!");
            return;
        }

        var fase = $('#areaConsultaFaseItens').val();

        var OperadorId = $('#operadorDistribuir').val();

        if (fase == 'tramitacao') 
        {

            $("input[type=checkbox][name='cod_siscom_tramitacao[]']:checked").each(function() 
            {
                var priorizar = $(this).parent().next().find('input').val();
                var horasPrioridade = $(this).parent().next().find('input').parent().next().find('input').val();;

                if(priorizar == null || priorizar == undefined || priorizar == "")
                {
                    priorizar = 0;
                }

                if(horasPrioridade == null || horasPrioridade == undefined || horasPrioridade == "" || horasPrioridade == 0)
                {
                    horasPrioridade = 24;
                }

                solicitacoesMarcadas.push($(this).val() + '&' + priorizar + '&' + horasPrioridade);
            });

            //verifica se existem checkbox selecionados
            if (solicitacoesMarcadas.length == 0) 
            {
                alert("Nenhuma solicita\u00e7\u00e3o selecionada!");
                return;
            }

            var operador = OperadorId;
            var source =  "distribuicao_sup";
        } 
        else if (fase == 'aprovacao') 
        {
            $("input[type=checkbox][name='cod_siscom_aprovacao[]']:checked").each(function() 
            {
                var priorizar = $(this).parent().next().find('input').val();
                var horasPrioridade = $(this).parent().next().find('input').parent().next().find('input').val();

                if(priorizar == null || priorizar == undefined || priorizar == "")
                {
                    priorizar = 0;
                }

                solicitacoesMarcadas.push($(this).val() + '&' + priorizar + '&' + horasPrioridade);
            });

            //verifica se existem checkbox selecionados
            if (solicitacoesMarcadas.length == 0)
            {
                alert("Nenhuma solicita\u00e7\u00e3o selecionada!");
                return;
            }

            var operador = OperadorId;
            var source =  "distribuicao_sup";
        }
    }
    else if(acao == 'solicitacao_manual')
    {
        if(fase == 'tramitacao')
        {

            var n_solicitacao =  $('#n_solicitacao_manual').val();
            var data_recebimento = $('#data_recebimento_solicitacao').val();
            var operador = idUsuario;
            
            solicitacoesMarcadas.push(n_solicitacao);
            var source =  "distribuicao_manual";

            if(n_solicitacao == "" || data_recebimento == "")
            {
                alert("Preencha todos os campos!");
                return;
            }

        }
    }

    //get supervisor id
    var supervisorid = idUsuario;

    //checking correct url
    if (acao == 'red') 
    {
        var url = "principal.php?t=Controller/SolicitacaoController.php";
        var msgRequisicao = "Redistribui\u00e7\u00e3o feita com sucesso";
        var opcao = "redistribuirSolicitacoes";
    } 
    else if (acao == 'dist') 
    {
        var url = "principal.php?t=Controller/SolicitacaoController.php";
        var msgRequisicao = "Distribui\u00e7\u00e3o feita com sucesso";
        var opcao = "distribuirSolicitacoes";
    } 
    else if(acao == 'solicitacao_manual')
    {
         var url = "principal.php?t=Controller/SolicitacaoController.php";
         var msgRequisicao = "Solicita\u00e7\u00e3o habilitada para preenchimento";
         var opcao = "distribuirSolicitacoes";
    }


    //call ajax function
    $.ajax({
        type: "POST",
        data: { sm: solicitacoesMarcadas, op: operador, sup: supervisorid, fase: fase, source:source, data:data_recebimento, opcao:opcao},
        url: url,
        success: function(data) {
            alert(msgRequisicao);
            document.location.replace('../fixa_top/principal.php?id='+idUsuario+'&t=View/home.php');
        }
    });
}


function validaData(dataCampo) 
{
    if (dataCampo.value != "") 
    {
        if(dataCampo.name == "data_entrada_siscom" || dataCampo.name == "data_recebimento_solicitacao")
        {
             if (dataCampo.value.length < 9) 
            {
                alert("Data incorreta - Informe no formato hh:mm:ss");
                $(dataCampo).val('');
                $(dataCampo).focus();
                return false;
            } 
            else 
            {   

                var hoje = new Date();
                
                var hora = dataCampo.value.substring(20,11);
                hora = hora.split(':');

                //valida hora
                if(hora[0] > 24 || hora[0] < 1 || hora[1] > 60 || hora[1] < 1 || hora[2] > 60 || hora[2] < 0)
                {
                    alert("Hora inv\u00e1lida");
                    $(dataCampo).val('');
                    $(dataCampo).focus();
                    return false;
                }


                var data = dataCampo.value.substring(0, 10);

                data = data.split('/');
                //valida os dias
                if(data[0] > 31 || data[0] < 1 || data[1] > 12 || data[1] < 1)
                {
                    alert("Dia ou mes inv\u00e1lido");
                    $(dataCampo).val('');
                    $(dataCampo).focus();
                    return false;
                }
                else if(data[2] != "2016")
                {
                    //gcon pode ter data diferente de 2016
                    if(!dataCampo.classList.contains('gcon'))
                    {
                        alert("Ano deve ser 2016");
                        $(dataCampo).val('');
                        $(dataCampo).focus();
                        return false;
                    }
                }

                var data = new Date(data[2] + '-' + data[1] + '-' + data[0]);
                data.setDate(data.getDate() + 1);
                //zera hora de ambos
                hoje.setHours(0, 0, 0, 0);
                data.setHours(0, 0, 0, 0);

                if (data > hoje) 
                {
                    alert("Data n\u00e3o pode ser maior que a data atual");
                    $(dataCampo).val('');
                    $(dataCampo).focus();
                    return false;
                }
            }
        }
        else
        {
            if (dataCampo.value.length < 5) 
            {
                alert("Data incorreta");
                $(dataCampo).val('');
                $(dataCampo).focus();
                return false;
            } 
            else 
            {
                var hoje = new Date();
                var data = dataCampo.value.split('/');
                //valida os dias
                if(data[0] > 31 || data[0] < 1 || data[1] > 12 || data[1] < 1)
                {
                    alert("Dia ou mes inv\u00e1lido");
                    $(dataCampo).val('');
                    $(dataCampo).focus();
                    return false;
                }
                else if(data[2] != "2016")
                {
                    //gcon pode ter data diferente de 2016
                    if(!dataCampo.classList.contains('gcon'))
                    {
                        alert("Ano deve ser 2016");
                        $(dataCampo).val('');
                        $(dataCampo).focus();
                        return false;
                    }
                }

                var data = new Date(data[2] + '-' + data[1] + '-' + data[0]);
                data.setDate(data.getDate() + 1);
                //zera hora de ambos
                hoje.setHours(0, 0, 0, 0);
                data.setHours(0, 0, 0, 0);

                if (data > hoje) 
                {
                    alert("Data n\u00e3o pode ser maior que a data atual");
                    $(dataCampo).val('');
                    $(dataCampo).focus();
                    return false;
                } 
                else 
                {
                    //se for devolucao nao valida datas
                    if($('#solicitacaoNova').val() == '0')
                    {
                        return true;
                    }
                    else
                    {
                        if($('#div_form_tramitacao').length == 1)
                        {
                            if($('#data_entrada_siscom').length == 1)
                            {
                                var data_entrada_siscom = $('#data_entrada_siscom').val().split('/');
                                data_entrada_siscom = new Date(data_entrada_siscom[2] + '-' + data_entrada_siscom[1] + '-' + data_entrada_siscom[0]);
                                data_entrada_siscom.setDate(data_entrada_siscom.getDate() + 1);
                                data_entrada_siscom.setHours(0, 0, 0, 0);
                            }else{
                                var data_entrada_siscom = $('#data_recebimento_solicitacao').val().split('/');
                                data_entrada_siscom = new Date(data_entrada_siscom[2] + '-' + data_entrada_siscom[1] + '-' + data_entrada_siscom[0]);
                                data_entrada_siscom.setDate(data_entrada_siscom.getDate() + 1);
                                data_entrada_siscom.setHours(0, 0, 0, 0);
                            }

                            //valida data de encerramento
                            if(dataCampo.name == "data_encerramento")
                            {
                                if($('#status_solicitacao').val() == 12)
                                {
                                    if(data < data_entrada_siscom)
                                    {
                                        alert("Data de encerramento deve ser maior ou igual que data de entrada do Siscom!");
                                        $(dataCampo).val('');
                                        $(dataCampo).focus();
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                                }
                            }
                            else if(dataCampo.name == "data_devolucao")
                            {
                                if($('#status_solicitacao').val() != 12)
                                {
                                    //data devolucao > data siscom
                                    if(data < data_entrada_siscom)
                                    {
                                        alert("Data de devolução deve ser maior que data de entrada do Siscom!");
                                        $(dataCampo).val('');
                                        $(dataCampo).focus();
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                                }
                            }
                        }
                        else if($('#div_form_aprovacao').length == 1)
                        {
                            var data_entrada_siscom = $('#data_recebimento_aprovacao').val();
                            data_entrada_siscom = data_entrada_siscom.substr(0, 10);
                            data_entrada_siscom = data_entrada_siscom.split('/');
                            data_entrada_siscom = new Date(data_entrada_siscom[2] + '-' + data_entrada_siscom[1] + '-' + data_entrada_siscom[0]);
                            data_entrada_siscom.setDate(data_entrada_siscom.getDate() + 1);
                            data_entrada_siscom.setHours(0, 0, 0, 0);

                            //valida data de encerramento
                            if(dataCampo.name == "data_finalizado")
                            {
                                if($('#status_solicitacao').val() == 23)
                                {
                                    if(data < data_entrada_siscom)
                                    {
                                        alert("Data de finaliza\u00e7\u00e3o deve ser maior ou igual que data de recebimento da solicita\u00e7\u00e3o!");
                                        $(dataCampo).val('');
                                        $(dataCampo).focus();
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                                }
                            }
                            else if(dataCampo.name == "data_devolucao")
                            {
                                if($('#status_solicitacao').val() != 23)
                                {
                                    //data devolucao > data siscom
                                    if(data < data_entrada_siscom)
                                    {
                                        alert("Data de devolução deve ser maior que data de entrada do Siscom!");
                                        $(dataCampo).val('');
                                        $(dataCampo).focus();
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

function excluirSolicitacoesSiscom(idUsuario) 
{
    //get checkbox selected
    solicitacoesMarcadas = new Array();

    var fase = $('#areaConsultaFaseItens').val();
    var listaItens = "";

    if (fase == 'tramitacao') 
    {

        $("input[type=checkbox][name='cod_siscom_tramitacao[]']:checked").each(function() 
        {
            var itens = $(this).val().split("&");    
            solicitacoesMarcadas.push($(this).val());
            listaItens = listaItens + ' ' + itens[0];

        });

        //verifica se existem checkbox selecionados
        if (solicitacoesMarcadas.length == 0) 
        {
            alert("Nenhuma solicita\u00e7\u00e3o selecionada!");
            return;
        }
    }

    //confirma exclusao
    var r=confirm("Confirma exclusão destes itens" + listaItens + "?");
    if (r==true)
    {
        var url = "principal.php?t=Controller/SolicitacaoController.php";
        var msgRequisicao = "Exclusão feita com sucesso";
        var opcao = "excluirItensSiscom";
        var sup = idUsuario;
        var source = "exclusao_itens_siscom"

        //call ajax function
        $.ajax({
            type: "POST",
            data: { sm: solicitacoesMarcadas, sup: sup, fase: fase, source:source, opcao:opcao, listaItens:listaItens},
            url: url,
            success: function(data) {
                alert(msgRequisicao);
                document.location.replace('../fixa_top/principal.php?id='+idUsuario+'&t=View/home.php');
            }
        });
    }
    else
    {
        return false;
    }   
}


 