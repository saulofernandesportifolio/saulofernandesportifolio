
$(document).ready(function() {

    //abaixo usamos o seletor da jQuery para acessar o botão, e em seguida atribuir à ele um evento de click
    $("#entrar").click(function() {

        //Aqui chamamos a função validaLogin(), e passamos a ela o que foi digitado no campo cpf e no campo senha
        validaLogin($("#cpf"), $("#senha"));
        return;

    });

    $("#bt_enviar").click(function() {
        //somente será permitido cpfs válidos
        if ($('#cpf').val() != "") {
            validaCpf($('#cpf').val());
        }
    });

    $("#bt_enviar_form").click(function() {
        //somente será permitido cnpjs válidos
        if ($('#cnpj').val() != "") {
            validaCnpj($('#cnpj').val());
        }
    });

    $("#status_solicitacao").change(function() {
        //seleciona status
        if($("#status_solicitacao").val() == 8 || $("#status_solicitacao").val() == 15 || $("#status_solicitacao").val() == 12){
            //em analise(pre) ,ag. aprovacao vantive(tra) ou encerrado analista(tra-voz) é solicitacao aprovada
            //desabilita campos devolucao
            $("#area_devolucao").attr('disabled', 'disabled');
            $("#motivo_devolucao").attr('disabled', 'disabled');
            $("#data_devolucao").attr('disabled', 'disabled');
            $("#descricao_motivo_devolucao").attr('disabled', 'disabled');

            //seta campo aprovacao = 'Sim' e ativa campo aprovacao
            $('#aprovacao').val('Sim');

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

            //caso de aprovação campo data de encerramento é obrigatório
            $("#data_encerramento_label").text("Data de Encerramento*");
            $("#data_encerramento").attr("required",true);
        }else if($("#status_solicitacao").val() == 5){
            //quando sistemas não será mostrado campos devolucao, os mesmos serão mostrados na tela de chamados
            //desativa campos de devolucao
            $("#area_devolucao").attr('disabled', 'disabled');
            $("#motivo_devolucao").attr('disabled', 'disabled');
            $("#data_devolucao").attr('disabled', 'disabled');
            $("#descricao_motivo_devolucao").attr('disabled', 'disabled');

            //seta campo aprovacao = 'Não' e desativa campo aprovacao
            $('#aprovacao').val('N\u00e3o');
            $('#aprovacao').addClass("campos_desabilitados");

            //esconde campos de devolucao
            $("#rcd1").addClass("campos_devolucao");
            $("#rcd2").addClass("campos_devolucao");
            $("#rcd3").addClass("campos_devolucao");

            //observacao é obrigatoria neste caso
            $("#obs").attr("required", true);
            $("#obs_label").text("Obs*");
        }
        else if($("#status_solicitacao").val() == 1 && $('#cat_prod').val() == 'Voz' && $('#qtd_acessos').val() < 200)
        {
            //se for voz o status somente podera ser ag. aprovação comercial quando for mais de 200 acessos
            alert("Somente status Ag. Aprova\u00e7\u00e3o do Comercial quando for mais de 200 acessos");
            $("#status_solicitacao").val('');
            $("#status_solicitacao").focus();
            return;
        }else{
            //neste caso obs não é obrigatoria
            $("#obs_label").removeAttr("required");        
            $("#obs_label").text("Obs");

            //ativa campos de devolucao e tornar obrigatorio campos
            $("#area_devolucao").removeAttr("disabled");
            $("#motivo_devolucao").removeAttr("disabled");
            $("#data_devolucao").removeAttr("disabled");
            $("#descricao_motivo_devolucao").removeAttr("disabled");

            $("#area_devolucao").attr("required", true);
            $("#motivo_devolucao").attr("required", true);
            $("#data_devolucao").attr("required", true);
            $("#descricao_motivo_devolucao").attr("required", true);

            //caso de devolução campo data de encerramento não é obrigatório
            $("#data_encerramento_label").text("Data de Encerramento");
            $("#data_encerramento").removeAttr("required");

            //seta campo aprovacao = 'Não' e desativa campo aprovacao
            $('#aprovacao').val('N\u00e3o');
            $('#aprovacao').addClass("campos_desabilitados");

            //mostra campos de devolucao
            $("#rcd1").removeClass("campos_devolucao");
            $("#rcd2").removeClass("campos_devolucao");
            $("#rcd3").removeClass("campos_devolucao");
        }
    });

    $("#servicoIntragov").blur(function() {
        var servicoSelecionado = $('#servicoIntragov').val();
        if (servicoSelecionado == "CANCELAMENTO") {
            $("#motivo_cancelamento").removeAttr("disabled");
            $("#descricao_motivo_devolucao").removeAttr("disabled");

            $("#motivo_cancelamento").attr("required", true);
            $("#descricao_motivo_devolucao").attr("required", true);
        } else {
            $("#motivo_cancelamento").attr('disabled', 'disabled');
            $("#descricao_motivo_devolucao").attr('disabled', 'disabled');
        }
    });
    //mascaras
    $("#cpf").mask("999.999.999-99");
    $("#cnpj").mask("99.999.999/9999-99");
    $(".campoData").mask("99/99/9999");
     $(".campoDataHora").mask("99/99/9999 99:99:99");

    //valida se navegador é ie
    if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
        var ieversion = new Number(RegExp.$1)
        if (ieversion >= 8) {
            // Para IE8
            $("#fieldset_style").css({ "width": "650px" });

            //fix placeholder for IE7 and IE8
            $(function() {
                if (!$.support.placeholder) {
                    $("[placeholder]").focus(function() {
                        if ($(this).val() == $(this).attr("placeholder")) $(this).val("");
                    }).blur(function() {
                        if ($(this).val() == "") $(this).val($(this).attr("placeholder"));
                    }).blur();

                    $("[placeholder]").parents("form").submit(function() {
                        $(this).find('[placeholder]').each(function() {
                            if ($(this).val() == $(this).attr("placeholder")) {
                                $(this).val("");
                            }
                        });
                    });
                }
            });

            // fix required fields for IE < 11
            if ($("<input />").prop("required") === undefined) {
                $(document).on("submit", function(e) {
                    $(this)
                        .find("input, select, textarea")
                        .filter("[required]")
                        .filter(function() {
                            return this.value == ''; })
                        .each(function() {
                            e.preventDefault();
                            $(this).css({ "border-color": "red" });
                        });
                });

            }
        } else if (ieversion >= 7)
        // Para IE7
            $("#fieldset_style").css({ "width": "650px" });
        else if (ieversion >= 6)
        // Para IE6
            $("#fieldset_style").css({ "width": "650px" });
    }

    $("#status_solicitacao_postramitacao").click(function() {
        if ($("#status_solicitacao_postramitacao").val() == 15) {
            $("#motivo_devolucao").val('');
            $("#motivo_devolucao").attr('disabled', 'disabled');
        } else {
            $("#motivo_devolucao").attr("required", true);
            $("#motivo_devolucao").removeAttr("disabled");
        }
    });


    //FILTROS ENCADEADO
      $("#produto_servico").ready(function(e) {
           var form;

            if ($("#form_pretramitacao").length) {
                if ($("#cat_prod").val() == "Voz") {
                    form = 'pretramitacao_voz';
                } else if ($("#cat_prod").val() == "Dados") {
                    form = 'pretramitacao_dados';
                } else if ($("#cat_prod").val() == "Dados-voz") {
                    form = 'pretramitacao_dados_voz';
                }
            }else{
                return;
            }

            var cat_prod = $('#cat_prod').val();
            $.getJSON('site/views/consulta_dados.php?opcao=produto_manual&valor=' + cat_prod + '&form=' + form, function(dados) {
                if (dados.length > 0) {
                    var option = '<option>Selecione o produto</option>';
                    $.each(dados, function(i, obj) {
                        option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                    })
                } else {
                    Reset();
                }
                $('#produto_servico').html(option).show();
            }).error(function() { 
                var option = '<option>N\u00e3o encontrado</option>';
                $('#produto_servico').html(option).show();
            })
        })


    $("#cat_prod").change(function(e) {
            if ($("#form_pretramitacao").length) {
                //limpa os dados autoamticamente preenchidos
                $("#produto_manual").val('');
                $("#produto_servico").val('');
                $("#tipo_solicitacao").val('');
                $("#complemento_tipo_solicitacao").val('');
                

                if ($("#cat_prod").val() == "Voz") {
                    form = 'pretramitacao_voz';
                } else if ($("#cat_prod").val() == "Dados") {
                    form = 'pretramitacao_dados';
                } else if ($("#cat_prod").val() == "Dados-voz") {
                    form = 'pretramitacao_dados_voz';
                }else{
                    return;
                }

                //atualiza produtos
                var cat_prod = $('#cat_prod').val();
                $.getJSON('site/views/consulta_dados.php?opcao=produto_manual&valor=' + cat_prod + '&form=' + form, function(dados) {
                    if (dados.length > 0) {
                        var option = '<option>Selecione o produto</option>';
                        $.each(dados, function(i, obj) {
                            option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                        })
                    } else {
                        Reset();
                    }
                    
                    if($('#produto_servico').length){
                        $('#produto_servico').html(option).show();
                    }else if($('#produto_manual').length){
                        $('#produto_manual').html(option).show();
                    }
                }).error(function() { 
                    var option = '<option>N\u00e3o encontrado</option>';
                    if($('#produto_servico').length){
                        $('#produto_servico').html(option).show();
                    }else if($('#produto_manual').length){
                        $('#produto_manual').html(option).show();
                    }
                })

                //atualiza servicos
                $.getJSON('site/views/consulta_dados.php?opcao=tipo_solicitacao&valor=' + cat_prod + '&form=' + form, function(dados) {
                if (dados.length > 0) {
                        var option = '<option>Selecione o servi\u00e7o</option>';
                        $.each(dados, function(i, obj) {
                            option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                        })
                    } else {
                        Reset();
                    }
                    $('#tipo_solicitacao').html(option).show();
                }).error(function() { 
                    var option = '<option>N\u00e3o encontrado</option>';
                    $('#tipo_solicitacao').html(option).show();
                })

            }else{

                $('#servicoIntragov').val('');
                $('#complementoServicoIntragov').val('');

                var form = "Intragov";

                $.getJSON('site/views/consulta_dados.php?opcao=servico_intragov&form=' + form, function(dados) {
                if (dados.length > 0) {
                        var option = '<option>Selecione o servi\u00e7o</option>';
                        $.each(dados, function(i, obj) {
                            option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                        })
                    } else {
                        Reset();
                    }
                    $('#servicoIntragov').html(option).show();
                }).error(function() { 
                    var option = '<option>N\u00e3o encontrado</option>';
                    $('#servicoIntragov').html(option).show();
                })
            }

        
    })


    $("#tipo_solicitacao").ready(function(e) {
        //limpa os dados de devolucao a cada mudanca
        $('#complemento_tipo_solicitacao').val('');

        var form;

        if ($("#form_pretramitacao").length) {
            if ($("#cat_prod").val() == "Voz") {
                form = 'pretramitacao_voz';
            } else if ($("#cat_prod").val() == "Dados") {
                form = 'pretramitacao_dados';
            } else if ($("#cat_prod").val() == "Dados-voz") {
                form = 'pretramitacao_dados_voz';
            }
        }else{
            return;
        }

        var cat_prod = $('#cat_prod').val();
        $.getJSON('site/views/consulta_dados.php?opcao=tipo_solicitacao&valor=' + cat_prod + '&form=' + form, function(dados) {
            if (dados.length > 0) {
                var option = '<option>Selecione o servi\u00e7o</option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                })
            } else {
                Reset();
            }
            $('#tipo_solicitacao').html(option).show();
        }).error(function() { 
            var option = '<option>N\u00e3o encontrado</option>';
            $('#tipo_solicitacao').html(option).show();
        })
    })

     //FILTROS produtos
    $("#produto_manual").ready(function(e) {

        var form;

        if ($("#form_pretramitacao").length) {
            if ($("#cat_prod").val() == "Voz") {
                form = 'pretramitacao_voz';
            } else if ($("#cat_prod").val() == "Dados") {
                form = 'pretramitacao_dados';
            } else if ($("#cat_prod").val() == "Dados-voz") {
                form = 'pretramitacao_dados_voz';
            }
        }else{
            return;
        }

        var cat_prod = $('#cat_prod').val();
        $.getJSON('site/views/consulta_dados.php?opcao=produto_manual&valor=' + cat_prod + '&form=' + form, function(dados) {
            if (dados.length > 0) {
                var option = '<option>Selecione o produto</option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                })
            } else {
                Reset();
            }
            $('#produto_manual').html(option).show();
        }).error(function() { 
            var option = '<option>N\u00e3o encontrado</option>';
            $('#produto_manual').html(option).show();
        })
    })

    $("#produtoIntragov").change(function(e) {
        $('#servicoIntragov').val('');
        $('#complementoServicoIntragov').val('');

        var form = "Intragov";

        $.getJSON('site/views/consulta_dados.php?opcao=servico_intragov&form=' + form, function(dados) {
            if (dados.length > 0) {
                var option = '<option>Selecione o servi\u00e7o</option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                })
            } else {
                Reset();
            }
            $('#servicoIntragov').html(option).show();
        }).error(function() { 
            var option = '<option>N\u00e3o encontrado</option>';
            $('#servicoIntragov').html(option).show();
        })
    })


     $("#servicoIntragov").change(function(e) {
        $('#complementoServicoIntragov').val('');

        var form = "Intragov";
        var servicoIntragov = $("#servicoIntragov").val();

        $.getJSON('site/views/consulta_dados.php?opcao=complemento_tipo_solicitacao&valor=' + form + '&valor2=' + servicoIntragov, function(dados) {
            if (dados.length > 0) {
                var option = '<option>Selecione o complemento</option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                })
            } else {
                Reset();
            }
            $('#complementoServicoIntragov').html(option).show();
        }).error(function() { 
            var option = '<option>N\u00e3o encontrado</option>';
            $('#complementoServicoIntragov').html(option).show();
        })

         if(servicoIntragov == 'CANCELAMENTO' || servicoIntragov == 'RETIRADA')
        {
            $('#div_data_pedido_cancelamento_cliente').css('display', 'inline-block');
            $('#data_pedido_cancelamento_cliente').attr("required",true);
        }else{
            $('#div_data_pedido_cancelamento_cliente').css('display', 'none');
            $('#data_pedido_cancelamento_cliente').removeAttr("required");
        }
    })

    $("#tipo_solicitacao").change(function(e) {
        //limpa os dados de devolucao a cada mudanca
        $('#complemento_tipo_solicitacao').val('');

        var form;

        if ($("#form_pretramitacao").length) {
            if ($("#cat_prod").val() == "Voz") {
                form = 'pretramitacao_voz';
            } else if ($("#cat_prod").val() == "Dados") {
                form = 'pretramitacao_dados';
            } else if ($("#cat_prod").val() == "Dados-voz") {
                form = 'pretramitacao_dados_voz';
            }
        }

        var cat_prod = $('#cat_prod').val();
        var tipo_solicitacao = $("#tipo_solicitacao").val();

        $.getJSON('site/views/consulta_dados.php?opcao=complemento_tipo_solicitacao&valor=' + cat_prod + '&form=' + form + '&valor2=' + tipo_solicitacao, function(dados) {
            if (dados.length > 0) {
                var option = '<option>Selecione o complemento</option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                })
            } else {
                Reset();
            }
            $('#complemento_tipo_solicitacao').html(option).show();
        }).error(function() { 
            var option = '<option>N\u00e3o encontrado</option>';
            $('#complemento_tipo_solicitacao').html(option).show();
        })

        if(tipo_solicitacao == 'CANCELAMENTO' || tipo_solicitacao == 'RETIRADA')
        {
            $('#div_data_pedido_cancelamento_cliente').css('display', 'inline-block');
            $('#data_pedido_cancelamento_cliente').attr("required",true);
        }else{
            $('#div_data_pedido_cancelamento_cliente').css('display', 'none');
            $('#data_pedido_cancelamento_cliente').removeAttr("required");
        }
    })

  
    // Carrega os motivos
    $('#area_devolucao').change(function(e) {
        //limpa os dados de devolucao a cada mudanca
        $('#motivo_devolucao').val('');
        $('#descricao_motivo_devolucao').val('');

        var form;

        if ($("#form_pretramitacao").length) {
            if ($("#cat_prod").val() == "Voz") {
                form = 'pretramitacao_voz';
            } else if ($("#cat_prod").val() == "Dados") {
                form = 'pretramitacao_dados';
            } else if ($("#cat_prod").val() == "Dados-voz") {
                form = 'pretramitacao_dados';
            }
        }else if($('#form_tramitacao').length){
            if ($("#cat_prod").val() == "Voz") {
                form = 'tramitacao_voz';
            } else if ($("#cat_prod").val() == "Dados") {
                form = 'tramitacao_dados';
            } else if ($("#cat_prod").val() == "Dados-voz") {
                form = 'tramitacao_dados';
            }
        }else if($('#form_postramitacao').length){
            form = "postramitacao_dados";
        }else if($('#div_form_intragov').length){
            form = "intragov";
        }else if($('#div_form_gcom').length){
            form = "gcon";
        }

        var area_devolucao = $('#area_devolucao').val();
        $.getJSON('site/views/consulta_dados.php?opcao=motivo&valor=' + area_devolucao + '&form=' + form, function(dados) {
            if (dados.length > 0) {
                var option = '<option></option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                })
            } else {
                Reset();
            }
            $('#motivo_devolucao').html(option).show();
        }).error(function() { 
            var option = '<option>N\u00e3o encontrado</option>';
            $('#motivo_devolucao').html(option).show();
        })
    })

    // Carrega a descricao do motivo
    $('#motivo_devolucao').change(function(e) {
        $('#descricao_motivo_devolucao').val('');
        var form;

        if ($("#form_pretramitacao").length) {
            if ($("#cat_prod").val() == "Voz") {
                form = 'pretramitacao_voz';
            } else if ($("#cat_prod").val() == "Dados") {
                form = 'pretramitacao_dados';
            } else if ($("#cat_prod").val() == "Dados-voz") {
                form = 'pretramitacao_dados';
            }
        }else if($('#form_tramitacao').length){
            if ($("#cat_prod").val() == "Voz") {
                form = 'tramitacao_voz';
            } else if ($("#cat_prod").val() == "Dados") {
                form = 'tramitacao_dados';
            } else if ($("#cat_prod").val() == "Dados-voz") {
                form = 'tramitacao_dados';
            }
        }else if($('#form_postramitacao').length){
            form = "postramitacao_dados";
        }else if($('#div_form_intragov').length){
            form = "intragov";
        }else if($('#div_form_gcom').length){
            form = "gcon";
        }

        var motivo_devolucao = $('#motivo_devolucao').val();
        $.getJSON('site/views/consulta_dados.php?opcao=descricao_motivo&valor=' + motivo_devolucao + '&form=' + form, function(dados) {
            if (dados.length > 0) {
                var option = '<option>Selecione a descricao</option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj[0] + '">' + obj[0] + '</option>';
                })
            } else {
                Reset();
            }
            $('#descricao_motivo_devolucao').html(option).show();
        }).error(function() { 
            var option = '<option>N\u00e3o encontrado</option>';
            $('#descricao_motivo_devolucao').html(option).show();
        })
    })

    // Carrega tabela devolucao
    $('#consultaDevolucoes').click(function(e) {
        var area = $('#areaConsulta').val();
        $.getJSON('site/views/consulta_dados.php?opcao=tabela_devolucao&valor=' +area, function(dados) {
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
                     tr += '<td class="lalign">'+ obj[9] + '</td>';
                    tr += '</tr>';
                })
            } else {
                Reset();
            }
            $('#rowDevolucoes').html(tr).show();
        }).error(function() { 
            var tr = '<tr><td colspan="9">Nenhum registro encontrado</td></tr>';
            $('#rowDevolucoes').html(tr);
        })
    })

  // Carrega tabela devolucao
    $('#estiloLupaConsultaSolicitacoes').click(function(e) {

        var n_gs = $('#n_gs_consulta_solicitacao').val();
        var n_solicitacao = $('#n_solicitacao').val();
        
        n_solicitacao = n_solicitacao.trim();

        if(n_gs == '' || n_gs == undefined){n_gs = null};
        if(n_solicitacao == '' || n_solicitacao == undefined){n_solicitacao = null};

        $.getJSON('site/views/consulta_dados.php?opcao=tabela_solicitacao&n_gs=' + n_gs + '&n_solicitacao=' + n_solicitacao, function(dados) {
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
                    tr += '<td class="lalign">' + obj[10] + '</td>';
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

     // consulta redistribuicao
    $('#consultaSolicitacoesRedistribuicao').click(function(e) {
        $('#faseRedistribuicao').html('');
        $('#operadorRedistribuir').html('');


            var n_solicitacao = $('#nSolicitacaoRedistribuicao').val();

        if(n_solicitacao == '' || n_solicitacao == undefined){n_solicitacao = '0'};


        $.getJSON('site/views/consulta_dados.php?opcao=tabela_redistribuicao&n_solicitacao=' + n_solicitacao, function(dados) {
            if (dados.length > 0) {
                var tr = '<tr style="display: none;"></tr>';
                $.each(dados, function(i, obj) {
                    if($('#tipo_redistribuicao').val() == 'gcon_intragov'){
                         tr += '<tr>';
                            tr += '<td class="lalign">' + obj[0] + '</td>';
                            tr += '<td class="lalign">' + obj[1] + '</td>';
                            tr += '<td id="gconr" class="lalign">' + obj[7] + '</td>';
                            tr += '<td id="intragovr" class="lalign">' + obj[8] + '</td>';
                            tr += '<td class="lalign">' + obj[5] + '</td>';
                            tr += '<td id="revisaor" class="lalign">' + obj[6] + '</td>';
                        tr += '</tr>';
                    }else if($('#tipo_redistribuicao').val() == 'tramitacao'){
                         tr += '<tr>';
                            tr += '<td class="lalign">' + obj[0] + '</td>';
                            tr += '<td class="lalign">' + obj[1] + '</td>';
                            tr += '<td id="pretramitacaor" class="lalign">' + obj[2] + '</td>';
                            tr += '<td id="tramitacaor" class="lalign">' + obj[3] + '</td>';
                            tr += '<td id="postramitacaor" class="lalign">' + obj[4] + '</td>';
                            tr += '<td class="lalign">' + obj[5] + '</td>';
                            tr += '<td id="revisaor" class="lalign">' + obj[6] + '</td>';
                        tr += '</tr>';        
                    }
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
        var pretramitacao = $('#pretramitacaor').text();
        var tramitacao = $('#tramitacaor').text();
        var postramitacao = $('#postramitacaor').text();
        var gcon = $('#gconr').text();
        var intragov = $('#intragovr').text();

        if(pretramitacao == "Com operador" || pretramitacao == "Conclu\u00eddo" && tramitacao == '' && postramitacao == ''){
             $('#faseRedistribuicao').html("<option value='pre_tramitacao'>Pre-Tramita\u00e7\u00e3o</option>").show();
        }else if(tramitacao == "Com operador" || tramitacao == "Conclu\u00eddo" && postramitacao == ''){
             var option = "<option value='pre_tramitacao'>Pre-Tramita\u00e7\u00e3o</option>";
                option += "<option value='tramitacao'>Tramita\u00e7\u00e3o</option>";
             $('#faseRedistribuicao').html(option).show();
        }else if(postramitacao == "Com operador" || postramitacao == "Conclu\u00eddo"){
             var option = "<option value='tramitacao'>Tramita\u00e7\u00e3o</option>";
                option += "<option value='pos_tramitacao'>P\u00f3s-Tramita\u00e7\u00e3o</option>"
             $('#faseRedistribuicao').html(option).show();
        }else if(gcon == "Com operador" || gcon == "Conclu\u00eddo"){
             var option = "<option value='gcon'>Gcon</option>";
             $('#faseRedistribuicao').html(option).show();
        }else if(intragov == "Com operador" || intragov == "Conclu\u00eddo"){
             var option = "<option value='intragov'>Intragov</option>";
             $('#faseRedistribuicao').html(option).show();
        }
    })

     $('#faseRedistribuicao').blur(function(e){
        //atualiza opcao de redistribuicao
        var fase = $('#faseRedistribuicao').val();
        var idUsuarioCriptografado = $('#id_usuario').val();

        $.getJSON('site/views/consulta_dados.php?opcao=usuario_fase&fase=' + fase + '&idUsuarioCriptografado=' + idUsuarioCriptografado , function(dados) {
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



     $('#form_pre_itens_preencher_operador').click(function(e){
            var idUsuario = $('#id_usuario_pre').val();
            var fase = $('#solicitacao_pendentes_pre').val();
                              
            document.location.replace('../fixa/principal.php?idu='+idUsuario+'&solicitacao_pendentes='+fase+'&t=views/v_itens_pendentes_usuario.php');
     })

      $('#form_tram_itens_preencher_operador').click(function(e){
        var idUsuario = $('#id_usuario_tram').val();
        var fase = $('#solicitacao_pendentes_tram').val();
                              
        document.location.replace('../fixa/principal.php?idu='+idUsuario+'&solicitacao_pendentes='+fase+'&t=views/v_itens_pendentes_usuario.php');
     })

    $('#form_pos_itens_preencher_operador').click(function(e){
        var idUsuario = $('#id_usuario_pos').val();
        var fase = $('#solicitacao_pendentes_pos').val();
                              
        document.location.replace('../fixa/principal.php?idu='+idUsuario+'&solicitacao_pendentes='+fase+'&t=views/v_itens_pendentes_usuario.php');
    })

    $('#form_gcon_itens_preencher_operador').click(function(e){
        var idUsuario = $('#id_usuario_gcon').val();
        var fase = $('#solicitacao_pendentes_gcon').val();
                              
        document.location.replace('../fixa/principal.php?idu='+idUsuario+'&solicitacao_pendentes='+fase+'&t=views/v_itens_pendentes_usuario.php');
     })

    $('#form_intragov_itens_preencher_operador').click(function(e){
        var idUsuario = $('#id_usuario_intragov').val();
        var fase = $('#solicitacao_pendentes_intragov').val();
                              
        document.location.replace('../fixa/principal.php?idu='+idUsuario+'&solicitacao_pendentes='+fase+'&t=views/v_itens_pendentes_usuario.php');
     })


     $("#status_solicitacao_chamados").change(function() {
        //se devolucao para tramitacao desabilita campos chamado
        if($("#status_solicitacao_chamados").val() == 17)
        {
            $('#numero_chamado').removeAttr("required");
            $('#sistema_chamado').removeAttr("required");
            $('#motivo_devolucao_chamado').removeAttr("required");
            $('#descricao_motivo_devolucao_chamados').removeAttr("required");

            $('#numero_chamado').addClass("campos_desabilitados");
            $('#sistema_chamado').addClass("campos_desabilitados");
            $('#motivo_devolucao_chamado').addClass("campos_desabilitados");
            $('#descricao_motivo_devolucao_chamados').addClass("campos_desabilitados");
        }
        else if($("#status_solicitacao_chamados").val() == 16)
        {
             $('#numero_chamado').attr("required","required");
            $('#sistema_chamado').attr("required","required");
            $('#motivo_devolucao_chamado').attr("required","required");
            $('#descricao_motivo_devolucao_chamados').attr("required","required");

            $('#numero_chamado').removeClass("campos_desabilitados");
            $('#sistema_chamado').removeClass("campos_desabilitados");
            $('#motivo_devolucao_chamado').removeClass("campos_desabilitados");
            $('#descricao_motivo_devolucao_chamados').removeClass("campos_desabilitados");
        }
        
    })

     $('#consultaSolicitacaoExistente').click(function(e){
        var solicitacaoExistente = $('#n_solicitacao_existente').val();
        solicitacaoExistente = solicitacaoExistente.toUpperCase();

        $.getJSON('site/views/consulta_dados.php?opcao=consultaSolicitacaoExistente&ids=' + solicitacaoExistente , function(dados) {
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

  
});

/** Função responsável por validar os dados do formulário no lado Cliente, e enviar para a cama Controller (que está no Servidor) os dados informados pelo usuário para serem autenticados */
function validaLogin(cpf, senha) {

    //Se o usuário informou login e senha, então é hora do Ajax entrar em ação
    //Adicionamos um texto na DIV #resultado para alertar o usuário que o sistema está autenticando os dados
    $("#resultado").html("Autenticando...");

    /**Função ajax nativa da jQuery, onde passamos como parâmetro o endereço do arquivo que queremos chamar, os dados que irá receber, e criamos de forma encadeada a função que irá armazenar o que foi retornado pelo servidor, para poder se trabalhar com o mesmo */

    $.post("valida.usuario.php", { usuario: cpf.val(), senha: senha.val() },

        function(retorno) {

            //Insere na DIV #resultado o que foi retornado pelas classes de manipulação do Usuário (Se os dados estão corretos ou não)
            $("#resultado").html(retorno);

        } //function(retorno)
    ); //$.post()
} //validaLogin()
