function renovaCookie(login) {
    var d = new Date();
    d.setTime(d.getTime() + (10));
    var expires = "expires=" + d.toGMTString();
    document.cookie = "login=" + login + "; " + expires;
}

function identificaBrowser() {
    var nom = navigator.appName;
    var elem = document.getElementById("div_dest");
    if (nom != "Netscape") {
        elem.className = 'IE';
    } else {
        elem.className = 'NET';
    }
}
//Cria uma conexão com o banco de dados
function createRequest() {
    try {
        request = new XMLHttpRequest();
    } catch (tryMS) {
        try {
            request = new ActiveXObject("Msxm12.XMLHTTP");
        } catch (otherMS) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                request = null;
            }
        }
    }
    return request;
}
//Recebe o ID de um campo de formulário e envia um arquivo (.php) de consulta ao banco de dados
function ConfereDados(objeto, arquivo) {
    request = createRequest();
    if (request == null) {
        alert("Não foi possivel criar conexão com o banco de dados!");
    } else if (objeto.id == "login") {
        var url = arquivo + ".php?tabela=" + document.getElementById("tabela").value + "&" + objeto.id + "=" + objeto.value;

        request.onreadystatechange = ValidaLogin;
        request.open("GET", url, true);
        request.send();
    } else if (objeto.id == "senha") {
        var login = document.getElementById("login");
        var url = arquivo + ".php?tabela=" + document.getElementById("tabela").value +
            "&" + login.id + "=" + login.value +
            "&" + objeto.id + "=" + objeto.value;

        request.onreadystatechange = ValidaSenha;
        request.open("GET", url, true);
        request.send();
    }
}

function ValidaLogin() {
    if (request.readyState == 4) {
        if (request.status == 200) {
            if (request.responseText == "N/A") {
                document.getElementById("login").style.backgroundColor = "#FFAA99";
                document.getElementById("msg_erro_login").innerHTML = "Login não encontrado!";
                document.getElementById("bt_enviar").disabled = true;
                document.getElementById("bt_enviar").name = 'login_block';
            } else if (request.responseText == "DUP") {
                document.getElementById("login").style.backgroundColor = "#FFAA99";
                document.getElementById("msg_erro_login").innerHTML = "Login duplicado!";
                document.getElementById("bt_enviar").disabled = true;
                document.getElementById("bt_enviar").name = 'login_block';
            } else if (request.responseText == "OK") {
                document.getElementById("msg_erro_login").style.backgroundColor = "#FFF";
                document.getElementById("login").innerHTML = "";
                document.getElementById("bt_enviar").disabled = false;
                document.getElementById("bt_enviar").name = 'bt_enviar';
            } else if (request.responseText == "ERRO") {
                document.getElementById("msg_erro_login").style.backgroundColor = "#FFF";
                document.getElementById("login").innerHTML = "Erro inesperado!";
                document.getElementById("bt_enviar").disabled = true;
                document.getElementById("bt_enviar").name = 'login_block';
            }
        }
    }
}

function ValidaSenha() {
    if (request.readyState == 4) {
        if (request.status == 200) {
            if (document.getElementById("bt_enviar").name != 'login_block') {
                if (request.responseText == "N/A") {
                    document.getElementById("senha").style.backgroundColor = "#FFAA99";
                    document.getElementById("msg_erro_senha").innerHTML = "Senha incorreta!";
                    document.getElementById("bt_enviar").disabled = true;
                    document.getElementById("bt_enviar").name = 'senha_block';
                } else if (request.responseText == "OK") {
                    document.getElementById("msg_erro_login").style.backgroundColor = "#FFF";
                    document.getElementById("login").innerHTML = "";
                    document.getElementById("bt_enviar").disabled = false;
                    document.getElementById("bt_enviar").name = 'bt_enviar';
                } else if (request.responseText == "ERRO") {
                    document.getElementById("msg_erro_senha").style.backgroundColor = "#FFF";
                    document.getElementById("senha").innerHTML = "Erro inesperado!";
                    document.getElementById("bt_enviar").disabled = true;
                    document.getElementById("bt_enviar").name = 'senha_block';
                }
            }
        }
    }
}

function ValidaEntrada(objeto, tipo) {

    switch (tipo) {
        case 'dateTime':
            regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9] ([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/;
            break;
        case 'pedido':
            regex = /^1-[0-9]{10}$/;
            break;
        case 'date':
            regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9]$/;
            break;
        case 'indexQ':
            regex = /^(0|([0]{0,2}[1-9])|([0]{0,1}[1-9][0-9])|(100))$/;
            break;
        case 'senha':
            regex = /^[A-Za-z0-9 @#$&?!.-]*$/;
            break;
        case 'login':
            regex = /^[ .-A-Za-z0-9_]*$/;
            break;
        case 'int':
            regex = /^(([1-9])|([0-9][0-9]))+$/;
            //regex = /^((0?[1-9])|([1-9][0-9]))+$/;
            break;
        case 'combo':
            regex = /^(.)+$/;
            break;
    }
    resultado = regex.exec(objeto.value);
    if (!resultado) {
        objeto.style.backgroundColor = "#FFAA99";
        document.getElementById("bt_enviar").disabled = true;
        document.getElementById("bt_enviar").name += '_block_' + objeto.id;

    } else {
        var block = document.getElementById("bt_enviar").name;
        while (block.match('_block_' + objeto.id)) {
            var block = document.getElementById("bt_enviar").name;
            var filtro = block.replace('_block_' + objeto.id, '');
            document.getElementById("bt_enviar").name = filtro;

        }
        objeto.style.backgroundColor = "#FFF";
        if (document.getElementById("bt_enviar").name == "bt_enviar") {
            document.getElementById("bt_enviar").disabled = false;
        }
    }
}

function logout(login) {
    var url = "logout.php?login=" + login;
    request.onreadystatechange = alert('Logout realizado com sucesso!');
    request.open("GET", url, true);
    request.send();
    document.location.replace('fixa/index.php');
}

function Formatadata(Campo, teclapres) {
    var tecla = teclapres.keyCode;
    var vr = new String(Campo.value);
    vr = vr.replace("/", "");
    vr = vr.replace("/", "");
    vr = vr.replace("/", "");
    tam = vr.length + 1;
    if (tecla != 8 && tecla != 8) {
        if (tam > 0 && tam < 2)
            Campo.value = vr.substr(0, 2);
        if (tam > 2 && tam < 4)
            Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
        if (tam > 4 && tam < 7)
            Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
    }
}

function enviardados() {
    if (document.dados.data_1.value == "") {
        alert("Preencha o campo de data");
        document.dados.data_1.focus();
        return false;
    }

    return true;
}


function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('hora').innerHTML = "Hora:" + h + ":" + m + ":" + s;
    //alert(h + ":" + m + ":" + s);
    t = setTimeout('startTime()', 900);
}



function resizePage() {
    document.getElementById("resolucao").style.height = (document.body.clientHeight - 100) * 0.9;
    document.getElementById("resolucao").style.width = (document.body.clientWidth - 100) * 0.9;
}

function fecha() {
    if (confirm("Tem certeza que deseja sair dessa página")) {
        fecha.returnValue = location.assign("logout.php");
        window.close();
    } else {
        fecha.returnValue = location.assign("logout.php");
        return false;
    }
}



function validaCpf(cpf) {

    // Testa a validação e formata se estiver OK
    if (formata_cpf_cnpj(cpf)) {
        $("#cpf").val((formata_cpf_cnpj(cpf)));
    } else {
        alert('CPF incorreto!');
        $("#cpf").val('');
    }
}

function validaCnpj(cnpj) {

    // Testa a validação e formata se estiver OK
    if (formata_cpf_cnpj(cnpj)) {
        $("#cnpj").val((formata_cpf_cnpj(cnpj)));
    } else {
        alert('CNPJ incorreto!');
        $("#cnpj").val('');
    }
}

function createFormatData(data) {

    if (data != "") {
        data = new Date(data);
        var dia = data.getDate();
        var mes = data.getMonth() + 1;

        if (mes < 10) {
            mes = '0' + mes;
        }

        var ano = data.getFullYear();
        data = dia + '/' + mes + '/' + ano;
    }

    return data;
}

/* Get the rows which are currently selected */
function fnGetSelected(oTableLocal) {
    return oTableLocal.$('tr.row_selected');
}


function validaData(dataCampo) 
{
    if (dataCampo.value != "") 
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
            else if(data < hoje && !dataCampo.classList.contains('gcon'))
            {   
                var oneDay = 24*60*60*1000;
                var diffDays = Math.round(Math.abs((hoje.getTime() - data.getTime())/(oneDay)));
                var msgErro = "Data n\u00e3o pode ter mais de 3 dias de diferen\u00e7a em rela\u00e7\u00e3o a data atual!";
                
                //0-domingo, 1-segunda, 2-terca, 3-quarta, 4-quinta, 5-sexta, 6-sabado 
                //no maximo cadastrar com 3 dias de diferenca da data atual

                switch(data.getDay()) 
                {
                    case 1:
                         //(segunda): domingo,sabado,sexta,quinta,quarta
                        if(diffDays > 5)
                        {
                            alert(msgErro);
                            $(dataCampo).val('');
                            $(dataCampo).focus();
                            return false;
                        }   
                        break;
                    case 2:
                          //(terça): segunda,domingo, sabado,sexta, quinta
                        if(diffDays > 5)
                        {
                            alert(msgErro);
                            $(dataCampo).val('');
                            $(dataCampo).focus();
                            return false;
                        }   
                        break;
                    case 3:
                          //(quarta)terca,segunda,domingo, sabado,sexta
                        if(diffDays > 5)
                        {
                            alert(msgErro);
                            $(dataCampo).val('');
                            $(dataCampo).focus();
                            return false;
                        }   
                        break;
                    case 4:
                          //(quinta)quarta,terca,segunda
                        if(diffDays > 3)
                        {
                            alert(msgErro);
                            $(dataCampo).val('');
                            $(dataCampo).focus();
                            return false;
                        }   
                        break;
                    case 5:
                          //(sexta)quinta,quarta,terca
                        if(diffDays > 3)
                        {
                            alert(msgErro);
                            $(dataCampo).val('');
                            $(dataCampo).focus();
                            return false;
                        }   
                        break;
                     case 6:
                          //(sabado)sexta, quinta, quarta
                        if(diffDays > 3)
                        {
                            alert(msgErro);
                            $(dataCampo).val('');
                            $(dataCampo).focus();
                            return false;
                        }   
                        break;
                }
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

                    if(dataCampo.name == "data_abertura_gestao" || dataCampo.name == "data_encerramento" || dataCampo.name == "data_finalizado" || dataCampo.name == "data_abert_gestao" || dataCampo.name == "data_tratativa" || dataCampo.name == "data_devolucao")
                    {
                        if($('#div_form_pretramitacao').length == 1)
                        {
                            var data_recebimento_solicitacao = $('#data_receb').val().split('/');
                            data_recebimento_solicitacao = new Date(data_recebimento_solicitacao[2] + '-' + data_recebimento_solicitacao[1] + '-' + data_recebimento_solicitacao[0]);
                            data_recebimento_solicitacao.setDate(data_recebimento_solicitacao.getDate() + 1);
                            data_recebimento_solicitacao.setHours(0, 0, 0, 0);

                            //valida data de devolucao
                            if(dataCampo.name == "data_devolucao")
                            {
                                if($('#devolucao').val() == "Sim")
                                {
                                    if(data < data_recebimento_solicitacao)
                                    {
                                        alert("Data de devolu\u00e7\u00e3o deve ser maior ou igual a data de recebimento da solicita\u00e7\u00e3o!");
                                        $(dataCampo).val('');
                                        $(dataCampo).focus();
                                        return false;
                                    }
                                }
                            }

                            //Pré: Data de recebimento da solicitação =< data de abertura do gestão
                            if(data < data_recebimento_solicitacao)
                            {
                                alert("Data de abertura do GS deve ser maior ou igual a data de recebimento da solicita\u00e7\u00e3o!");
                                $(dataCampo).val('');
                                $(dataCampo).focus();
                                return false;
                            }
                            else
                            {
                                return true;
                            }
                        }
                        else if($('#div_form_tramitacao').length == 1)
                        {
                            var data_abertura_gestao = $('#data_abertura_gestao').val().split('/');
                            data_abertura_gestao = new Date(data_abertura_gestao[2] + '-' + data_abertura_gestao[1] + '-' + data_abertura_gestao[0]);
                            data_abertura_gestao.setDate(data_abertura_gestao.getDate() + 1);
                            data_abertura_gestao.setHours(0, 0, 0, 0);


                            //Tram: Data de abertura do gestão =< Data de encerramento
                            if(data != '')
                            {
                                if(data_abertura_gestao > data)
                                {
                                    alert("Data de encerramento deve ser maior ou igual a data de abertura do GS!");
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
                        else if($('#div_form_postramitacao').length == 1)
                        {
                            var data_recebimento_pos = $('#data_recebimento_pos').val().split('/');
                            data_recebimento_pos = new Date(data_recebimento_pos[2] + '-' + data_recebimento_pos[1] + '-' + data_recebimento_pos[0]);
                            data_recebimento_pos.setDate(data_recebimento_pos.getDate() + 1);
                            data_recebimento_pos.setHours(0, 0, 0, 0);

                             //valida data de devolucao
                            if(dataCampo.name == "data_devolucao")
                            {
                                if($('#devolucao').val() == "Sim")
                                {
                                    if(data < data_recebimento_pos)
                                    {
                                        alert("Data de devolu\u00e7\u00e3o deve ser maior ou igual a data de recebimento da solicita\u00e7\u00e3o!");
                                        $(dataCampo).val('');
                                        $(dataCampo).focus();
                                        return false;
                                    }
                                }
                            }

                            //data de recebimento pós =< Data finalizado
                            if(data < data_recebimento_pos)
                            {
                                alert("Data finalizado deve ser maior ou igual a data de recebimento!");
                                $(dataCampo).val('');
                                $(dataCampo).focus();
                                return false;
                            }
                            else
                            {
                                return true;
                            }
                        }   
                        else if($('#div_form_intragov').length == 1)
                        {
                            var data_recebimento_solicitacao = $('#data_solicitacao').val().split('/');
                            data_recebimento_solicitacao = new Date(data_recebimento_solicitacao[2] + '-' + data_recebimento_solicitacao[1] + '-' + data_recebimento_solicitacao[0]);
                            data_recebimento_solicitacao.setDate(data_recebimento_solicitacao.getDate() + 1);
                            data_recebimento_solicitacao.setHours(0, 0, 0, 0);

                            //valida data de devolucao
                            if(dataCampo.name == "data_devolucao")
                            {
                                if($('#devolucao').val() == "Sim")
                                {
                                    if(data < data_recebimento_solicitacao)
                                    {
                                        alert("Data de devolucao deve ser maior ou igual a data de recebimento da solicita\u00e7\u00e3o!");
                                        $(dataCampo).val('');
                                        $(dataCampo).focus();
                                        return false;
                                    }
                                }
                            }

                            var data_abert_gestao = $('#data_abert_gestao').val().split('/');
                            data_abert_gestao = new Date(data_abert_gestao[2] + '-' + data_abert_gestao[1] + '-' + data_abert_gestao[0]);
                            data_abert_gestao.setDate(data_abert_gestao.getDate() + 1);
                            data_abert_gestao.setHours(0, 0, 0, 0);

                            //Data de recebimento da solicitação =< data de abertura do gestão
                            if(data_abert_gestao < data_recebimento_solicitacao)
                            {
                                alert("Data de abertura do GS deve ser maior ou igual a data de recebimento da solicita\u00e7\u00e3o!");
                                $('#data_abert_gestao').val('');
                                $('#data_abert_gestao').focus();
                                return false;
                            }

                            //Data de abertura do gestão =< Data de encerramento
                            if(data_abert_gestao > data)
                            {
                                alert("Data de abertura do GS deve ser menor ou igual a data de encerramento!");
                                $(dataCampo).val('');
                                $(dataCampo).focus();
                                return false;
                            }
                            else
                            {
                                return true;
                            }
                        }
                        else if($('#div_form_gcom').length == 1)
                        {
                            var data_recebimento_doc = $('#data_recebimento_doc').val().split('/');
                            data_recebimento_doc = new Date(data_recebimento_doc[2] + '-' + data_recebimento_doc[1] + '-' + data_recebimento_doc[0]);
                            data_recebimento_doc.setDate(data_recebimento_doc.getDate() + 1);
                            data_recebimento_doc.setHours(0, 0, 0, 0);

                            //valida data de devolucao
                            if(dataCampo.name == "data_devolucao")
                            {
                                if($('#devolucao').val() == "Sim")
                                {
                                    if(data < data_recebimento_doc)
                                    {
                                        alert("Data de devolucao deve ser maior ou igual a data de recebimento da solicita\u00e7\u00e3o!");
                                        $(dataCampo).val('');
                                        $(dataCampo).focus();
                                        return false;
                                    }
                                }
                            }

                            if(dataCampo.name == "data_encerramento")
                            {
                                if(data < data_recebimento_doc)
                                {
                                    alert("Data de encerramento deve ser maior ou igual a data de recebimento do documento!");
                                    $(dataCampo).val('');
                                    $(dataCampo).focus();
                                    return false;
                                } 
                                else
                                {
                                    return true;
                                }
                            }

                            //Data de recebimento documento =< data tratativa
                            if(data_recebimento_doc > data)
                            {
                                alert("Data de tratativa deve ser maior ou igual a data de recebimento do documento!");
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
                    else
                    {
                        return true;
                    }
                }
            }
        }
    }
}

function showLoader() {
    $('#loader').css('visibility', 'visible');
    return true;
};

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

        if (fase == 'pre_tramitacao') 
        {

            $("input[type=checkbox][name='cod_siscom_pre[]']:checked").each(function() 
            {
                var priorizar = $(this).parent().next().find('input').val();
                if(priorizar == null || priorizar == undefined || priorizar == ""){
                    priorizar = 0;
                }
                solicitacoesMarcadas.push($(this).val() + '&' + priorizar);
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
        else if (fase == 'tramitacao') 
        {

            $("input[type=checkbox][name='cod_siscom_tramitacao[]']:checked").each(function() 
            {
                var priorizar = $(this).parent().next().find('input').val();
                if(priorizar == null || priorizar == undefined || priorizar == ""){
                    priorizar = 0;
                }
                solicitacoesMarcadas.push($(this).val() + '&' + priorizar);
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
        else if (fase == 'pos_tramitacao') 
        {
            
            $("input[type=checkbox][name='cod_siscom_pos[]']:checked").each(function() 
            {
                var priorizar = $(this).parent().next().find('input').val();
                if(priorizar == null || priorizar == undefined || priorizar == ""){
                    priorizar = 0;
                }
                solicitacoesMarcadas.push($(this).val() + '&' + priorizar);
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
        if(fase == 'pre_tramitacao')
        {

            var n_solicitacao =  $('#n_solicitacao_manual').val();
            n_solicitacao = n_solicitacao.trim();
            
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
        else if(fase == 'intragov')
        {
            var n_solicitacao =  $('#n_solicitacao_manual').val();
            n_solicitacao = n_solicitacao.trim();

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
        else if(fase == 'gcom')
        {
            var n_solicitacao =  $('#n_solicitacao_manual').val();
            n_solicitacao = n_solicitacao.trim();
            
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
        var url = "principal.php?t=controles/sql_redistribuir_solicitacoes.php";
        var msgRequisicao = "Redistribui\u00e7\u00e3o feita com sucesso";
    } 
    else if (acao == 'dist') 
    {
        var url = "principal.php?t=controles/sql_distribuir_solicitacoes.php";
        var msgRequisicao = "Distribui\u00e7\u00e3o feita com sucesso";
    } 
    else if(acao == 'solicitacao_manual')
    {
         var url = "principal.php?t=controles/sql_distribuir_solicitacoes.php";
         var msgRequisicao = "Solicita\u00e7\u00e3o habilitada para preenchimento";
    }


    //call ajax function
    $.ajax({
        type: "POST",
        data: { sm: solicitacoesMarcadas, op: operador, sup: supervisorid, fase: fase, source:source, data:data_recebimento},
        url: url,
        success: function(data) {
            alert(msgRequisicao);
            document.location.replace('../fixa/principal.php?id='+idUsuario+'&t=views/home.php');
        }
    });
}

function buscaSolicitacoesPendentes(){
      
      var idUsuario = $('#id_usuario').val();
      var fase = $('#fase').val();

      $.getJSON('site/views/consulta_dados.php?opcao=consultaItensPendentesFasesOperador&idUsuarioCriptografado=' + idUsuario + '&fase=' + fase, function(dados) {
        if (dados.length > 0) {
             var tr = '<tr style="display: none;"></tr>';
            $.each(dados, function(i, obj) {
                if(obj[8] == 'Entrada Manual Pre')
                {
                    var pagina = 'form_pretramitacao_manual.php';
                }else  if(obj[8] == 'tramitacao'){
                    var pagina = 'form_tramitacao.php';
                }else  if(obj[8] == 'pos_tramitacao'){
                    var pagina = 'form_pos_tramitacao.php';
                }else  if(obj[8] == 'intragov'){
                    var pagina = 'form_intragov.php';
                }else  if(obj[8] == 'gcon'){
                    var pagina = 'form_gcom.php';
                }else{
                    var pagina = 'form_pretramitacao.php';
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
                    tr += '<td><form action="principal.php?t=views/'+ pagina+'"method="post">';
                    tr += '<input type="hidden" value=' +obj[7]+' name="revisao" id="revisao"></input>';
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

function consultaFilaChamados(usuario){
     $.getJSON('site/views/consulta_dados.php?opcao=consultaFilaChamados&idUsuarioCriptografado=' + usuario, function(dados) {
        if (dados.length > 0) {
             var pendente = "Pendente de A\u00e7\u00e3o";
             var tr = '<tr style="display: none;"></tr>';
            $.each(dados, function(i, obj) {
                    var situacao = "'" + obj[10] + "'";
                    if(obj[10] == pendente || obj[10] == "Ag. TI")
                    {
                       var inputButton = '<input type="submit" value="Inserir Intera\u00e7\u00e3o" id="acao_chamados" class="ItensDistribuidos">';
                       var pagina = "v_chamados_detalhes.php";
                    }
                    else
                    { 
                        var inputButton = '<input type="submit" value="Ver chamado" id="acao_chamados" class="ItensDistribuidos">';
                        var pagina = "v_chamados_historico.php";
                    }

                    tr += '<tr>';
                    tr += '<td class="lalign">' + obj[0] + '</td>'; //data
                    tr += '<td class="lalign">' + obj[1] + '</td>'; //operador
                    tr += '<td class="lalign">' + obj[2] + '</td>'; //cpf
                    tr += '<td class="lalign">' + obj[3] + '</td>'; //protocolo
                    tr += '<td class="lalign">' + obj[4] + '</td>'; //ngs
                    tr += '<td class="lalign">' + obj[5] + '</td>'; //canal entrada
                    tr += '<td class="lalign">' + obj[6] + '</td>'; //status
                    tr += '<td class="lalign">' + obj[7] + '</td>'; //obs
                    tr += '<td class="lalign">' + obj[8] + '</td>'; //qtde acessos
                    tr += '<td class="lalign">' + obj[9] + '</td>'; //revisao
                    tr += '<td class="lalign">' + obj[10] + '</td>'; //situacao
                    tr += '<td class="lalign">' + obj[11] + '</td>'; //chamado
                    tr += '<td>';
                    tr += '<form action="principal.php?t=views/' + pagina + '" method="post">';
                    tr += '<input type="hidden" value=' +obj[3]+' name="protocolo_chamado" id="protocolo_chamado"></input>';
                    tr += '<input type="hidden" value=' +usuario+' name="usuario_chamado" id="usuario_chamado"></input>';
                    tr += '<input type="hidden" value=' +obj[9]+' name="revisao" id="revisao"></input>';
                    tr += '<input type="hidden" value=' +situacao+' name="situacao" id="situacao"></input>';
                    tr += '<input type="hidden" name="nro_chamado" id="nro_chamado" value=' +obj[11]+' ></input>';
                    tr += inputButton;
                    tr += '</form>';
                    tr += '</td>';
                    tr += '</tr>';                    
            })

            $('#rowSolicitacoes').html(tr).show();
        }
    })
}

function atualizaDescricaoMotivoDevolucaoChamados(motivoDevolucao)
{
       if(motivoDevolucao.value == "REMEDY")
       {    
            option = '<option value="ABERTO CHAMADO NO REMEDY">ABERTO CHAMADO NO REMEDY</option>';
            $('#descricao_motivo_devolucao_chamados').html(option).show();
       }
       else if(motivoDevolucao.value == "PROBLEMAS NO CATALOGO DO VANTIVE")
       {
            option = '<option value="ERRO SISTEMICO">ERRO SISTEMICO</option>';
            $('#descricao_motivo_devolucao_chamados').html(option).show();
       }else{
            option = '<option></option>';
            $('#descricao_motivo_devolucao_chamados').html(option).show();
       }   
}


function  getCurrentDate(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var today = dd+'/'+mm+'/'+yyyy;

    return today;
}

function validaIntFields(campoInt){
    if (isNaN(campoInt.value)){  
           alert("Digite apenas n\u00fameros!");  
           campoInt.value = '';
           campoInt.focus();  
           return false;  
    } else {
         return true;
    }
}

function buscaRazaoSocialByCNPJ(cnpj){
    if(cnpj == "" || cnpj == undefined){cnpj = null;}
     $.getJSON('site/views/consulta_dados.php?opcao=buscaRazaoSocial&cnpj=' + cnpj, function(dados) {
        if (dados.length > 0) {
             var razaoSocial = dados;
             $('#razao_social').val(razaoSocial);
             $('#razao_social_hidden').val(razaoSocial);               
        }
    }).error(function() { 
         alert("CNPJ n\u00e3o encontrado");
         $('#razao_social').val('');
         $('#razao_social_hidden').val('');
         $('#cnpj').val(''); 
         $('#cnpj').focus();
    })
}

function buscaSolicitacoesDistribuicaoByFase(idUsuarioCriptografado)
{
    var faseDistribuirSolicitacao = $('#areaConsultaFaseItens').val();

    if(faseDistribuirSolicitacao == "pretramitacao")
    {
       //monta o cabeçalho independente se tem dados
        var th = '<th style="width: 1%;"></th>';
        th += '<th><span>Priorizar</span></th>';
        th += '<th><span>Data Ent. Siscom</span></th>'; //data + hora
        th += '<th><span>Prot. Solic.</span></th>'; //id_solicitacao
        th += '<th><span>Data Imp.</span></th>'; //importacao_data
        th += '<th><span>CNPJ</span></th>'; //cnpj
        th += '<th><span>Raz\u00e3o Social</span></th>'; //razao_social
        th += '<th><span>Status Siscom</span></th>'; //status
        th += '<th><span>Acessos</span></th>'; //acessos
        th += '<th><span>Revis\u00e3o</span></th>'; //revisao
        th += '<th><span>Fonte</span></th>'; //fonte
        th += '<th><span>Imp Usu\u00e1rio</span></th>'; //importacao_usuario      
    }
    else if(faseDistribuirSolicitacao == "tramitacao")
    {
        //atualiza cabeçalho de acordo com a fase
        var th = '<th><span></span></th>';
            th += '<th><span>Priorizar</span></th>';
            th += '<th><span>Prot. Solic.</span></th>'; //id_solicitacao
            th += '<th><span>N GS</span></th>'; //n_gs
            th += '<th><span>Data Distrib.</span></th>'; //data_inicio
            th += '<th><span>Data Final. Pre</span></th>'; //data_final
            th += '<th><span>Dias Tratativa</span></th>';
            th += '<th><span>Data Abert. GS</span></th>'; //data_abert
            th += '<th><span>CNPJ</span></th>'; //cnpj
            th += '<th><span>Raz\u00e3o Social</span></th>'; //razao_social
            th += '<th><span>Qtd. Acessos</span></th>'; //acessos
            th += '<th><span>Obs. Pre</span></th>'; //obs_pre
            th += '<th><span>Usu\u00e1rio Pre</span></th>'; //usuario_pre            
            th += '<th><span>Revis\u00e3o</span></th>'; //revisao
    }
    
    if(faseDistribuirSolicitacao == "pos_tramitacao")
    {
        var th = '<th><span></span></th>';
        th += '<th><span>Priorizar</span></th>';
        th += '<th><span>Prot. Solic.</span></th>'; //id_solicitacao
        th += '<th><span>N GS</span></th>'; //n_gs
        th += '<th><span>Data Distrib.</span></th>'; //data_inicio
        th += '<th><span>Data Final. Pre</span></th>'; //data_final
        th += '<th><span>Data Abert. GS</span></th>'; //data_abert
        th += '<th><span>CNPJ</span></th>'; //cnpj
        th += '<th><span>Raz\u00e3o Social</span></th>'; //razao_social
        th += '<th><span>Acessos</span></th>'; //acessos
        th += '<th><span>Obs. Pre</span></th>'; //obs_pre
        th += '<th><span>Usu\u00e1rio Pre</span></th>'; //usuario_pre            
        th += '<th><span>Revis\u00e3o</span></th>'; //revisao
        th += '<th><span>Data Final. Tram</span></th>'; //data_final_tram
        th += '<th><span>Obs. Tram</span></th>'; //obs_tram
        th += '<th><span>Usu\u00e1rio Tram</span></th>'; //usuario_tram
        th += '<th><span>Dias Tratativa Total</span></th>';          
    }

    //cola o cabeçalho
    $('#keywords thead tr').html(th).show();

    //buscando os dados
        if(faseDistribuirSolicitacao == "pretramitacao")
        {
            //busca itens
            $.getJSON('site/controles/sql_busca_solicitacoes_distribuir.php?opcao=buscaSolicitacoesPreDistribuir&idUsuarioCriptografado=' + idUsuarioCriptografado, function(dados) {
               
               //monta os dados
               if (dados.length > 0) 
               {
                   var tr = '<tr style="display: none;"></tr>';
                    $.each(dados, function(i, obj) {
                        if(obj[13] == "S")
                        {
                            tr += '<tr style="font-weight: bold;">';
                        }
                        else
                        {
                            tr += '<tr>';
                        }
                        tr += '<td><input type="checkbox" style="width: 12px;" class="checkboxSiscom" name="cod_siscom_pre[]" value="' + obj[2] + '&' + obj[9] + '">';
                        tr += '</td>';
                        tr += '<td><input type="text" value="0" id="priorizar" name="priorizar[]" style="width: 30px;text-align: center;">';
                        tr += '<td class="lalign">' + obj[0] + ' '  + obj[1] + '</td>'; //data + hora
                        tr += '<td class="lalign">' + obj[2] + '</td>'; //id_solicitacao
                        tr += '<td class="lalign">' + obj[3] + '</td>'; //importacao_data
                        tr += '<td class="lalign">' + obj[4] + '</td>'; //cnpj
                        tr += '<td class="lalign">' + obj[5] + '</td>'; //razao_social
                        tr += '<td class="lalign">' + obj[6] + '</td>'; //status
                        tr += '<td class="lalign">' + obj[7] + '</td>'; //acessos
                        tr += '<td class="lalign">' + obj[8] + '</td>'; //revisao
                        tr += '<td class="lalign">' + obj[9] + '</td>'; //fonte
                        tr += '<td class="lalign">' + obj[10] + '</td>'; //importacao_usuario
                        tr += '</tr>';                    
                    })
                }

                //cola os dados
                $('#areaConsultaFaseItensDados').html(tr).show();

            }).error(function() { 
                 var tr = '<tr><td colspan="12">Nenhum registro encontrado</td></tr>';

                //cola mensagem de retorno
                $('#areaConsultaFaseItensDados').html(tr).show();
            })
        }
        else
        {
            //busca itens
            $.getJSON('site/controles/sql_busca_solicitacoes_distribuir.php?opcao=buscaSolicitacoesTramPosDistribuir&idUsuarioCriptografado=' + idUsuarioCriptografado + '&fase=' + faseDistribuirSolicitacao, function(dados) {
               
               //monta os dados
               if (dados.length > 0) 
               {
                   var tr = '<tr style="display: none;"></tr>';
                    $.each(dados, function(i, obj) {
                        if(faseDistribuirSolicitacao == "tramitacao")
                        {
                            if(obj[8] == "S")
                            {
                                tr += '<tr style="font-weight: bold;">';
                            }
                            else
                            {
                                tr += '<tr>';
                            }
                            tr += '<td><input type="checkbox" style="width: 12px;" class="checkboxSiscom" name="cod_siscom_tramitacao[]" value="' + obj[0] + '&' + obj[12] + '">';
                            tr += '</td>';
                            tr += '<td><input type="text" value="" id="priorizar" name="priorizar[]" style="width: 30px;text-align: center;">';
                            tr += '<td class="lalign">' + obj[0] + '</td>'; //id_solicitacao
                            tr += '<td class="lalign">' + obj[1] + '</td>'; //n_gs
                            tr += '<td class="lalign">' + obj[2] + '</td>'; //data_inicio
                            tr += '<td class="lalign">' + obj[3] + '</td>'; //data_final
                            tr += '<td class="lalign">' + obj[4] + '</td>'; //qtdade de dias tratativa
                            tr += '<td class="lalign">' + obj[5] + '</td>'; //data_abert
                            tr += '<td class="lalign">' + obj[6] + '</td>'; //cnpj
                            tr += '<td class="lalign">' + obj[7] + '</td>'; //razao_social
                            tr += '<td class="lalign">' + obj[9] + '</td>'; //acessos
                            tr += '<td class="lalign">' + obj[10] + '</td>'; //obs_pre
                            tr += '<td class="lalign">' + obj[11] + '</td>'; //usuario_pre
                            tr += '<td class="lalign">' + obj[12] + '</td>'; //revisao
                        }
                        else if(faseDistribuirSolicitacao == "pos_tramitacao")
                        {
                            if(obj[8] == "S")
                            {
                                tr += '<tr style="font-weight: bold;">';
                            }
                            else
                            {
                                tr += '<tr>';
                            }
                            tr += '<td><input type="checkbox" style="width: 12px;" class="checkboxSiscom" name="cod_siscom_pos[]" value="' + obj[0] + '&' + obj[12] + '">';
                            tr += '</td>';
                            tr += '<td><input type="text" value="" id="priorizar" name="priorizar[]" style="width: 30px;text-align: center;">';
                            tr += '<td class="lalign">' + obj[0] + '</td>'; //id_solicitacao
                            tr += '<td class="lalign">' + obj[1] + '</td>'; //n_gs
                            tr += '<td class="lalign">' + obj[2] + '</td>'; //data_inicio
                            tr += '<td class="lalign">' + obj[3] + '</td>'; //data_final
                            tr += '<td class="lalign">' + obj[5] + '</td>'; //data_abert
                            tr += '<td class="lalign">' + obj[6] + '</td>'; //cnpj
                            tr += '<td class="lalign">' + obj[7] + '</td>'; //razao_social
                            tr += '<td class="lalign">' + obj[9] + '</td>'; //acessos
                            tr += '<td class="lalign">' + obj[10] + '</td>'; //obs_pre
                            tr += '<td class="lalign">' + obj[11] + '</td>'; //usuario_pre
                            tr += '<td class="lalign">' + obj[12] + '</td>'; //revisao
                            tr += '<td class="lalign">' + obj[13] + '</td>'; //data_final_tram
                            tr += '<td class="lalign">' + obj[14] + '</td>'; //obs_tram
                            tr += '<td class="lalign">' + obj[15] + '</td>'; //usuario_tram
                            tr += '<td class="lalign">' + obj[4] + '</td>'; //qtdade de dias tratativa total
                        }

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
        }

    //carrega usuarios

    if(faseDistribuirSolicitacao == "pretramitacao")
    {
        var option = '<option>Selecione o operador</option>';
        //carregar os usuarios de acordo com a fase
        $.getJSON('site/controles/sql_busca_solicitacoes_distribuir.php?opcao=buscaSolicitacoesPreOperador&idUsuarioCriptografado=' + idUsuarioCriptografado, function(dadosOperadores) {
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

    }else if(faseDistribuirSolicitacao == "tramitacao")
    {
        var option = '<option>Selecione o operador</option>';
        $.getJSON('site/controles/sql_busca_solicitacoes_distribuir.php?opcao=buscaSolicitacoesTramOperador&idUsuarioCriptografado=' + idUsuarioCriptografado + '&fase=' + faseDistribuirSolicitacao, function(dadosOperadores) {
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
    }else if(faseDistribuirSolicitacao == "pos_tramitacao")
    {
        var option = '<option>Selecione o operador</option>';
        $.getJSON('site/controles/sql_busca_solicitacoes_distribuir.php?opcao=buscaSolicitacoesTramOperador&idUsuarioCriptografado=' + idUsuarioCriptografado + '&fase=' + faseDistribuirSolicitacao, function(dadosOperadores) {
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

function carregaHistoricoComentarios(chamado, protocolo, revisao)
{
    if(chamado != '')
    {

        $.getJSON('site/controles/sql_busca_info_chamados.php?opcao=buscaHistoricoRetornoTi&chamado=' + chamado + '&protocolo=' + protocolo + '&revisao=' + revisao, function(dados) 
        {        
           //monta os dados
           if (dados.length > 0) 
           {
               var tr = '<tr style="display: none;"></tr>';
                $.each(dados, function(i, obj) 
                {
                    if(obj[0] != '')
                    {
                        tr += '<tr>';
                        tr += '<td>';
                        tr += '<div class="div_forms">';
                        tr += '<label>Data retorno TI</label>';
                        tr += '<input type="text" value="' + obj[0] + '" disabled="true" class="campos_desabilitados txt2comboboxpadraoChamados"/>';
                        tr += '</div>';
                        tr += '</td>'; 
                        tr += '<td>';
                        tr += '<div class="div_forms">';
                        tr += '<label>Parecer TI</label>';
                        tr += '<input type="text" value="' + obj[1] + '" disabled="true" class="campos_desabilitados"/>';
                        tr += '</div>';
                        tr += '</td>'; //comentario
                        tr += '</tr>';
                    }
                })

                $('#form_chamados tr:last').after(tr);  
            }
        })

        $.getJSON('site/controles/sql_busca_info_chamados.php?opcao=buscaHistoricoComentarios&chamado=' + chamado + '&protocolo=' + protocolo + '&revisao=' + revisao, function(dados) 
        {        
           //monta os dados
           if (dados.length > 0) 
           {
               var tr = '<tr style="display: none;"></tr>';
                $.each(dados, function(i, obj) 
                {
                        tr += '<tr>';
                        tr += '<td>';
                        tr += '<div class="div_forms">';
                        tr += '<label>Intera\u00e7\u00e3o</label>';
                        tr += '<input type="text" value="' + obj[1] +  ' - ' + obj[0] + '" disabled="true" class="campos_desabilitados txt2comboboxpadraoChamados"/>';
                        tr += '</div>';
                        tr += '</td>'; //reg_data + reg_usuario
                        tr += '<td>';
                        tr += '<div class="div_forms">';
                        tr += '<label>Coment\u00e1rio</label>';
                        tr += '<input type="text" value="' + obj[2] + '" disabled="true" class="campos_desabilitados"/>';
                        tr += '</div>';
                        tr += '</td>'; //comentario
                        tr += '</tr>';
                })

                tr += '<tr>';
                tr += '<td>';
                tr += '<div class="div_forms">';
                tr += '<label>Coment\u00e1rio</label>';
                tr += '<input type="text" name="comentario_chamado"/>';
                tr += '</div>';
                tr += '</td>'; //comentario
                tr += '</tr>';

                $('#form_chamados tr:last').after(tr);  
            }
        })
    }
}

function consultaFilaItensPendentes()
{
    var n_solicitacao = $('#n_solicitacao').val();
        
    n_solicitacao = n_solicitacao.trim();

    if(n_solicitacao == '' || n_solicitacao == undefined){n_solicitacao = null};


    $.getJSON('site/controles/sql_busca_solicitacoes_distribuir.php?opcao=buscaSolicitacoesFila&n_solicitacao=' + n_solicitacao, function(dados) 
    {        
       //monta os dados
       if (dados.length > 0) 
       {
           var tr = '<tr style="display: none;"></tr>';
            $.each(dados, function(i, obj) 
            {
                    tr += '<tr>';
                    tr += '<td>'+ obj[0]+'</td>';
                    tr += '<td>'+ obj[1]+'</td>';
                    tr += '<td>'+ obj[2]+'</td>';
                    tr += '<td>'+ obj[3]+'</td>';
                    tr += '<td>'+ obj[4]+'</td>';
                    tr += '<td>'+ obj[5]+'</td>';
                    tr += '<td>'+ obj[6]+'</td>';
                    tr += '</tr>';
            })

            $('#rowItensFilaPendentes').html(tr).show(); 
        }
    }).error(function() { 
         var tr = '<tr><td colspan="15">Nenhum registro encontrado</td></tr>';

        //cola mensagem de retorno
        $('#rowItensFilaPendentes').html(tr).show();
    })
}


 function iniciaPaginacao(){
    $("#keywords").slimtable({
        tableData: null,
        dataUrl: null,
         
        itemsPerPage: 10,
        ipp_list: [5,10,20],
         
        colSettings: [],
         
        text1: "itens/pag.",
        text2: "Carregando...",
         
        sortStartCB: null,
        sortEndCB: null
    });
}

function carregaRelatorio(){
     $('#tabela3').dataTable().fnClearTable();
    $('#loader').css('visibility', 'visible');

    if($('#mesRelatorioPre').length == 1){
        var mes = $('#mesRelatorioPre').val();
        var url = 'sql_rel_pre_tramitacao.php?method=fetchdata';
        var rel = 'pre';
    }else if($('#mesRelatorioTram').length == 1){
        var mes = $('#mesRelatorioTram').val();
        var url = 'sql_rel_tramitacao.php?method=fetchdata';
        var rel = 'tram';
    }else if($('#mesRelatorioPos').length == 1){
        var mes = $('#mesRelatorioPos').val();
        var url = 'sql_rel_postramitacao.php?method=fetchdata';
        var rel = 'pos';
    }else if($('#mesRelatorioIntragov').length == 1){
        var mes = $('#mesRelatorioIntragov').val();
        var url = 'sql_rel_intragov.php?method=fetchdata';
        var rel = 'intragov';
    }else if($('#mesRelatorioGcon').length == 1){
        var mes = $('#mesRelatorioGcon').val();
        var url = 'sql_rel_gcom.php?method=fetchdata';
        var rel = 'gcon';
    }else if($('#mesRelatorioSCSiscom').length == 1){
        var mes = $('#mesRelatorioSCSiscom').val();
        var url = 'sql_rel_scsiscom.php?method=fetchdata';
        var rel = 'scsiscom';
    }else if($('#mesRelatorioSCWcd').length == 1){
        var mes = $('#mesRelatorioSCWcd').val();
        var url = 'sql_rel_scwcd.php?method=fetchdata';
        var rel = 'scwcd';
    }else if($('#mesRelatorioSCProcessum').length == 1){
        var mes = $('#mesRelatorioSCProcessum').val();
        var url = 'sql_rel_scprocessum.php?method=fetchdata';
        var rel = 'scprocessum';
    }else if($('#mesRelatorioSCCancelamento').length == 1){
        var mes = $('#mesRelatorioSCCancelamento').val();
        var url = 'sql_rel_sccancelamento.php?method=fetchdata';
        var rel = 'sccancelamento';
    }else if($('#mesRelatorioSCPendencia').length == 1){
        var mes = $('#mesRelatorioSCPendencia').val();
        var url = 'sql_rel_scpendencia.php?method=fetchdata';
        var rel = 'scpendencia';
    }else if($('#mesRelatorioSCMovel').length == 1){
        var mes = $('#mesRelatorioSCMovel').val();
        var url = 'sql_rel_scmovel.php?method=fetchdata';
        var rel = 'scmovel';
    }else if($('#mesRelatorioSCCartas').length == 1){
        var mes = $('#mesRelatorioSCCartas').val();
        var url = 'sql_rel_sccartas.php?method=fetchdata';
        var rel = 'sccartas';
    }
   
   //busca dados
    $.ajax({
        url: url,
        dataType: 'json',
        type:'post',
        data: {mes: mes},
        success: function(s){
        //console.log(s);
            $('#tabela3').dataTable().fnClearTable();
              for(var i = 0; i < s.length; i++) {
                            if(rel == 'pre')
                            {
                                $('#tabela3').dataTable().fnAddData([
                                        s[i][0], //Data
                                        s[i][1], //Analista
                                        s[i][2], //Protolo Solicitação(Siscom/Nº Pact Siscom)
                                        s[i][3], //Categ. Prod.
                                        s[i][4], //Devolução
                                        s[i][5], //Canal Entrada
                                        s[i][6], //Data Receb. da Solicitação
                                        s[i][7], //Nº Pact Siscom
                                        s[i][8], //Prod
                                        s[i][9], //Tipo Solicitação(categ prod + servico)
                                        s[i][10], //Serviços 
                                        s[i][11], //Cnpj
                                        s[i][12], //Razão Social
                                        s[i][13], //Qtde Acessos
                                        s[i][14], //Nº GS
                                        s[i][15], //Data Abert. Gestão
                                        s[i][16], //Motivo Devolução
                                        s[i][17], //Área Devolução
                                        s[i][18], //Data Devolução
                                        s[i][19], //Status
                                        s[i][20], //Obs
                                        s[i][21], //Revisão
                                        s[i][22], //Complemento Serviço
                                        s[i][23]  //data_pedido_cancelamento_cliente
                                   ]);
                            }else if(rel == 'tram'){
                                $('#tabela3').dataTable().fnAddData([
                                      s[i][0], //Data</th>
                                      s[i][1], //Analista</th>
                                      s[i][2], //Devolução</th>
                                      s[i][3], //Protocolo Solicitação(Siscom/Nº Pact Siscom)</th>
                                      s[i][4], //Dt Entrada Siscom</th>
                                      s[i][5], //Canal Entrada</th>
                                      s[i][6], //Prod.</th>
                                      s[i][7], //Tipo Solicitação</th>
                                      s[i][8], //Serviços</th>
                                      s[i][9], //Qtde Acessos</th>
                                      s[i][10], //Nº Pact Siscom</th>
                                      s[i][11], //Cnpj</th>
                                      s[i][12], //Razão Social</th>
                                      s[i][13], //Nº GS</th>
                                      s[i][14], //Data Abert. Gestão</th>
                                      s[i][15], //Categoria</th>
                                      s[i][16], //Data Devolução</th>
                                      s[i][17], //Data Encerramento</th>
                                      s[i][18], //Status</th>
                                      s[i][19], //Obs</th>
                                      s[i][20], //Revisão</th>
                                      s[i][21], //Complem. Serviço</th>
                                      s[i][22] //Data do pedido de Cancelamento Cliente</th>
                                ]);
                            }else if(rel == 'pos'){
                                $('#tabela3').dataTable().fnAddData([
                                    s[i][0],  //data_hora,
                                    s[i][1],  //usuario,      
                                    s[i][2],  //solicitacao, 
                                    s[i][3],  //data_entrada_siscom,                        
                                    s[i][4],  //canal_entrada,               
                                    s[i][5],  //produto,              
                                    s[i][6],  //tipo_solicitacao,            
                                    s[i][7],  //servico,
                                    s[i][8],  //qtd_acessos,                      
                                    s[i][9],  //cnpj,                           
                                    s[i][10], //razao_social,                          
                                    s[i][11], //n_gestao_servicos,              
                                    s[i][12], //motivo_devolucao,                      
                                    s[i][13], //oportunidade,                   
                                    s[i][14], //proposta,
                                    s[i][15], //data_recebiment_pos,
                                    s[i][16], //data_finalizado,                       
                                    s[i][17], //contrato_mae,                              
                                    s[i][18], //obs
                                    s[i][19], //status
                                    s[i][20], //revisao
                                    s[i][21],  //complemento_servico
                                    s[i][22], // Data do pedido de Cancelamento Cliente 
                                    s[i][23], //Data Assinatura Contrato 
                                    s[i][24] //Qtde Contratos Analisados
                                ]);
                            }else if(rel == 'intragov'){
                                $('#tabela3').dataTable().fnAddData([
                                   s[i][0], // data,
                                      s[i][1], // data_solicitacao,
                                      s[i][2], // analista, 
                                      s[i][3], // devolucao,
                                      s[i][4], // canal_entrada,
                                      s[i][5], // produto,
                                      s[i][6], // servico,
                                      s[i][7], // qtd_acessos,
                                      s[i][8], // motivo_cancelamento,
                                      s[i][9], //cnpj,
                                      s[i][10],// razao_social,
                                      s[i][11],// n_gestao_servicos,
                                      s[i][12],// data_abertura_gestao,
                                      s[i][13],// motivo_devolucao,
                                      s[i][14],// area_solicitante,
                                      s[i][15],// data_devolucao,
                                      s[i][16],// data_encerramento,
                                      s[i][17],// status_solicitacao
                                      s[i][18],// obs
                                      s[i][19],// revisao
                                      s[i][20],// protocolo
                                      s[i][21] //data_pedido_cancelamento_cliente
                                ]);
                            }else if(rel == 'gcon'){
                                $('#tabela3').dataTable().fnAddData([
                                      s[i][0] , //reg_dt_entrada(data) 
                                      s[i][1] , //data_receb_documento      
                                      s[i][2] , //tipo_entrada             
                                      s[i][3] , //contrato_mae          
                                      s[i][4] , //data_assinatura_doc    
                                      s[i][5] , //numero_documento       
                                      s[i][6] , //sistema_validacao     
                                      s[i][7] , //n_vantive              
                                      s[i][8] , //produto               
                                      s[i][9] , //data_trativa           
                                      s[i][10], //nome_solicitante
                                      s[i][11], //analista       
                                      s[i][12], //n_gestao_servicos                 
                                      s[i][13], //razao_social           
                                      s[i][14], //cnpj                   
                                      s[i][15], //plano_solicitado       
                                      s[i][16], //qtde_acesso            
                                      s[i][17], //data_finalizacao
                                      s[i][18], //ngs
                                      s[i][19], //numero_wcd
                                      s[i][20], //contrato
                                      s[i][21], //revisao 
                                      s[i][22], //protocolo
                                      s[i][23], //devolucao         
                                      s[i][24], //motivo_devolucao  
                                      s[i][25], //area_devolucao    
                                      s[i][26], //data_devolucao    
                                      s[i][27], //status 
                                      s[i][28], // Data Assinatura Contrato
                                      s[i][29]  //Qtde Contratos Analisados        
                                ]);
                            }  else if(rel == 'scsiscom'){
                                $('#tabela3').dataTable().fnAddData([
                                      s[i][0]  , //Solicitação
                                      s[i][1]  , //Data Recebimento Solicitação 
                                      s[i][2]  , //Canal Entrada      
                                      s[i][3]  , //Categoria Produto             
                                      s[i][4]  , //Produto          
                                      s[i][5]  , //Serviço    
                                      s[i][6]  , //Complemento Serviço       
                                      s[i][7]  , //Quantidade     
                                      s[i][8]  , //CNPJ/CPF              
                                      s[i][9]  , //Razão Social               
                                      s[i][10] , //Gerente Vendas
                                      s[i][11] , //Gerente Negócio
                                      s[i][12] , //UF
                                      s[i][13] , //Valor Proposta
                                      s[i][14] , //Obs
                                      s[i][15] , //Status 
                                      s[i][16] , //Motivo Devolução 
                                      s[i][17] , //Descrição Motivo Devolução 
                                      s[i][18] , //Analista
                                      s[i][19]  //Data Finalização                 
                                ]);
                            } else if(rel == 'scwcd'){
                                $('#tabela3').dataTable().fnAddData([
                                      s[i][0]  , //Solicitação
                                      s[i][1]  , //Data Recebimento Solicitação 
                                      s[i][2]  , //Canal Entrada      
                                      s[i][3]  , //Categoria Produto             
                                      s[i][4]  , //Produto          
                                      s[i][5]  , //Quantidade     
                                      s[i][6]  , //CNPJ/CPF              
                                      s[i][7]  , //Razão Social               
                                      s[i][8]  , //Gerente Vendas
                                      s[i][9]  , //Gerente Negócio
                                      s[i][10] , //oportunidade
                                      s[i][11] , //Valor Proposta
                                      s[i][12] , //Obs
                                      s[i][13] , //Status 
                                      s[i][14] , //Motivo Devolução 
                                      s[i][15] , //Descrição Motivo Devolução 
                                      s[i][16] , //Analista
                                      s[i][17]  //Data Finalização                 
                                ]);
                            }
                            else if(rel == 'scprocessum')
                            {
                                $('#tabela3').dataTable().fnAddData([
                                      s[i][0]  , //Solicitação
                                      s[i][1]  , //Data Recebimento Solicitação 
                                      s[i][2]  , //Canal Entrada      
                                      s[i][3]  , //Categoria Produto                 
                                      s[i][4]  , //CNPJ/CPF              
                                      s[i][5]  , //Razão Social               
                                      s[i][6]  , //Gerente Vendas
                                      s[i][7]  , //Gerente Negócio
                                      s[i][8] , //Obs
                                      s[i][9] , //Status 
                                      s[i][10] , //Motivo Devolução 
                                      s[i][11] , //Descrição Motivo Devolução 
                                      s[i][12] , //Analista
                                      s[i][13]  //Data Finalização                 
                                ]);
                            } 
                            else if(rel == 'sccancelamento'){
                                $('#tabela3').dataTable().fnAddData([
                                      s[i][0]  , //Solicitação
                                      s[i][1]  , //Data Recebimento Solicitação 
                                      s[i][2]  , //Canal Entrada      
                                      s[i][3]  , //Categoria Produto             
                                      s[i][4]  , //Produto          
                                      s[i][5]  , //Serviço    
                                      s[i][6]  , //Complemento Serviço       
                                      s[i][7]  , //Quantidade     
                                      s[i][8]  , //CNPJ/CPF              
                                      s[i][9]  , //Razão Social               
                                      s[i][10] , //Gerente Vendas
                                      s[i][11] , //Gerente Negócio
                                      s[i][12] , //UF
                                      s[i][13] , //Obs
                                      s[i][14] , //Status 
                                      s[i][15] , //Motivo Devolução 
                                      s[i][16] , //Descrição Motivo Devolução 
                                      s[i][17] , //Analista
                                      s[i][18]  //Data Finalização                 
                                ]);
                            } 
                            else if(rel == 'scpendencia'){
                                $('#tabela3').dataTable().fnAddData([
                                            s[i][0]   , // Solicitação
                                            s[i][1]   , // Data Recebimento Solicitação
                                            s[i][2]   , // Canal Entrada
                                            s[i][3]   , // Categoria Produto
                                            s[i][4]   , // Produto
                                            s[i][5]   , // CNPJ/CPF  
                                            s[i][6]   , // Razão Social
                                            s[i][7]   , // Gerente Senior
                                            s[i][8]   , // Gerente Negócio
                                            s[i][9]   , // Diretor
                                            s[i][10]  , // Data Base
                                            s[i][11]  , // Prazo Contratual
                                            s[i][12]  , // Valor Pendência
                                            s[i][13]  , // FUP Envio
                                            s[i][14]  , // Obs
                                            s[i][15]  , // Status
                                            s[i][16]  , // Devido
                                            s[i][17]  , // Motivo Devolução
                                            s[i][18]  , // Descrição Motivo Devolução
                                            s[i][19]  , // Analista
                                            s[i][20]    // Data Finalização              
                                ]);
                            }  
                            else if(rel == 'scmovel'){
                                $('#tabela3').dataTable().fnAddData([
                                        s[i][0]  , //Solicitação
                                        s[i][1]  , //Data Recebimento Solicitação 
                                        s[i][2]  , //Canal Entrada      
                                        s[i][3]  , //Categoria Produto             
                                        s[i][4]  , //Produto          
                                        s[i][5]  , //Serviço    
                                        s[i][6]  , //Complemento Serviço       
                                        s[i][7]  , //Quantidade     
                                        s[i][8]  , //CNPJ/CPF              
                                        s[i][9]  , //Razão Social               
                                        s[i][10] , //Gerente Vendas
                                        s[i][11] , //Gerente Negócio
                                        s[i][12] , //Simulação
                                        s[i][13] , //UF
                                        s[i][14] , //Valor Proposta
                                        s[i][15] , //Obs
                                        s[i][16] , //Status 
                                        s[i][17] , //Motivo Devolução 
                                        s[i][18] , //Descrição Motivo Devolução 
                                        s[i][19] , //Analista
                                        s[i][20]   //Data Finalização                   
                                ]);
                            }
                            else if(rel == 'sccartas')
                            {
                                $('#tabela3').dataTable().fnAddData([
                                      s[i][0]  , //Solicitação
                                      s[i][1]  , //Data Recebimento Solicitação 
                                      s[i][2]  , //Canal Entrada      
                                      s[i][3]  , //tipo_documento                 
                                      s[i][4]  , //CNPJ/CPF              
                                      s[i][5]  , //Razão Social               
                                      s[i][6]  , //Gerente Vendas
                                      s[i][7]  , //Gerente Negócio
                                      s[i][8]  , //data envio cliente
                                      s[i][9]  , //endereco envio
                                      s[i][10] , //Obs
                                      s[i][11] , //Status 
                                      s[i][12] , //Motivo Devolução 
                                      s[i][13] , //Descrição Motivo Devolução 
                                      s[i][14] , //Analista
                                      s[i][15]  //Data Finalização                 
                                ]);
                            }                                           
                      } // End For
                      
        },
        error: function(e){
           $('#tabela3').dataTable().fnClearTable();
        },
          complete: function(){
             $('#loader').css('visibility', 'hidden');
          }
      });
}

function carregaRelatorioAuditoria(){
    //pega mes
    var mes = $('#mesRelatorioAuditoria').val();

    $.getJSON('site/controles/sql_busca_relatorios.php?opcao=buscaRelatorioAuditoria&mes=' + mes, function(dados) 
    {        
       //monta os dados
       if (dados.length > 0) 
       {
           var tabelaAuditoria = '<table style="text-align: center; width: 90%;" id="keywords" class="sortable" cellspacing="0" cellpadding="0">';
               tabelaAuditoria +='<thead>';
               tabelaAuditoria += '<th><span>Evolu\u00e7\u00e3o Auditoria</span></th>';
        
                $.each(dados, function(i, obj) 
                {
                        tabelaAuditoria += '<th><span>'+ obj[0]+ '/' + mes +'</span></th>';
                })
               tabelaAuditoria += '</thead>';
               tabelaAuditoria += '<tbody>';
               tabelaAuditoria += '<tr style="background-color: beige;">';
               tabelaAuditoria += '<td><span>Auditoria VPE-VOZ</span></td>';
               
                $.each(dados, function(i, obj) 
                {
                        tabelaAuditoria += '<td>'+ obj[1]+'</td>';
                })

                tabelaAuditoria += '</tr>';
                tabelaAuditoria += '<thead>';
                tabelaAuditoria += '<th><span>Total Geral:</span></th>';
                $.each(dados, function(i, obj) 
                {
                        tabelaAuditoria += '<th><span>'+ obj[1]+'</span></th>';
                })
                tabelaAuditoria += '</tr>';
                tabelaAuditoria += '</thead>';
                tabelaAuditoria += '</table>';

            $('#tabela_evolucao_auditoria').html(tabelaAuditoria).show(); 

            //remove total
            dados.pop(dados[dados.length - 1]);

            var d1 = dados;
            

            var dataset = [{label: "Solicitações",data: d1}];
 
            var options = {
                xaxis: {
                    axisLabel: "Dias do Mês - Auditoria VPE-VOZ"
                },
                yaxes: {
                    axisLabel: "Nº Solicitações",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Verdana, Arial',
                    axisLabelPadding: 3
                }
            }

            $.plot($("#placeholder"), dataset, options);
            $('#titulo_evolucao_auditoria').removeAttr('style');
        }
    })


    //status
     $.getJSON('site/controles/sql_busca_relatorios.php?opcao=buscaRelatorioAuditoriaStatus&mes=' + mes, function(dados) 
     {
        var tabelaAuditoriaStatus = '<table class="tabela_auditoria_status" id="keywords" class="sortable" cellspacing="0" cellpadding="0">';
               tabelaAuditoriaStatus +='<thead>';
               tabelaAuditoriaStatus += '<th><span>Aprovado</span></th>';
               tabelaAuditoriaStatus += '<th><span>Total</span></th>';
               tabelaAuditoriaStatus += '</thead>';
               tabelaAuditoriaStatus += '<tbody>';
               
                $.each(dados, function(i, obj) 
                {
                        tabelaAuditoriaStatus += '<tr style="background-color: beige;">';
                        tabelaAuditoriaStatus += '<td>'+ obj[0]+'</td>';
                        tabelaAuditoriaStatus += '<td>'+ obj[1]+ '%' + '</td>';
                        tabelaAuditoriaStatus += '</tr>';
                })
               
                tabelaAuditoriaStatus += '</tbody>';
                tabelaAuditoriaStatus +='<thead>';
                tabelaAuditoriaStatus += '<th><span>Total Geral</span></th>';
                tabelaAuditoriaStatus += '<th><span>100%</span></th>';
                tabelaAuditoriaStatus += '</thead>';
                tabelaAuditoriaStatus += '</table>';

            $('#tabela_evolucao_auditoria_status').html(tabelaAuditoriaStatus).show(); 

 
            var dataSet = [
                {label: "Sim", data: dados[1][1], color: "#005CDE" },
                { label: "Nao", data: dados[0][1], color: "#00A36A" }
            ];

            var options = {
                series: {
                    pie: {
                        show: true,                
                        label: {
                            show:true
                        }
                    }
                }
                    
            }

            $.plot($("#placeholderstatus"), dataSet, options);
            $('#titulo_evolucao_auditoria_status').removeAttr('style');
     })   
}

function gerarProtocoloSolicitacao(tipo)
{
    var novaSolicitacao = $('input[name="nova_solicitacao"]:checked').val();

     $('#solicitacao_manual_nova').hide();
     $('#solicitacao_manual_existente').hide();

    if(novaSolicitacao == "Sim")
    {
         $.getJSON('site/controles/sql_busca_solicitacoes_distribuir.php?opcao=buscaProtocoloSolicitacao&tipo=' + tipo, function(dados) 
         {        
               $('#n_solicitacao_manual').val(dados);
               $('#solicitacao_manual_nova').show();
               $('#solicitacao_manual_existente').hide();
         })
     }
     else
     {
        $('#solicitacao_manual_nova').hide();
        $('#solicitacao_manual_existente').show();
    }
}

function validaQtdeAcessos(qtd_acessos)
{
    if (isNaN(qtd_acessos.value))
    {  
           alert("Digite apenas n\u00fameros!");  
           qtd_acessos.value = '';
           qtd_acessos.focus();  
           return false;  
    } 
    else 
    {
        if(qtd_acessos.value.length > 3)
        {
            var x;
            var r=confirm("Confirma quantidade de acessos com 4 digitos?");
            if (r==true)
            {
               return true;
            }
            else
            {
                qtd_acessos.value = '';
                qtd_acessos.focus();  
                return false;
            }
        }
    }
}

