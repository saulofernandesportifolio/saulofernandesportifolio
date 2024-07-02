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
        $("#cnpj_cpf").val((formata_cpf_cnpj(cnpj)));
    } else {
        alert('CNPJ/CPF incorreto!');
        $("#cnpj_cpf").val('');
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


function showLoader() {
    $('#loader').css('visibility', 'visible');
    return true;
};



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
                                        s[i][20],  //Obs
                                        s[i][21], //Revisão
                                        s[i][22] //Complemento Serviço
                                   ]);
                            }else if(rel == 'tram'){
                                $('#tabela3').dataTable().fnAddData([
                                      s[i][0],
                                      s[i][1],
                                      s[i][2],
                                      s[i][3],
                                      s[i][4],
                                      s[i][5],
                                      s[i][6],
                                      s[i][7],
                                      s[i][8],
                                      s[i][9],
                                      s[i][10],
                                      s[i][11],
                                      s[i][12],
                                      s[i][13],
                                      s[i][14],
                                      s[i][15],
                                      s[i][16],
                                      s[i][17],
                                      s[i][18],
                                      s[i][19],
                                      s[i][20],
                                      s[i][21]
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
                                    s[i][21]  //complemento_servico
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
                                      s[i][20] // protocolo,
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
                                      s[i][8], //produto               
                                      s[i][9], //data_trativa           
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
                                      s[i][27]  //status        
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

