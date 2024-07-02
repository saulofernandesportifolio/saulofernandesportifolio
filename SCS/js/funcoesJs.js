//Pega as variaveis get para o contesto do script
function pegaGet(){
    var url = location.href;
    if(url.indexOf("?") > 0){
        query = url.split("?"); 
        param = query[1].split("&");
        for (i=0; i < param.length; i++) {
            v = param[i].split("="); 
            eval("var "+v[0]+"='"+v[1]+"';"); 
        } 
    }
}
function startTime(){
                var today = new Date();
                var h=today.getHours();
                var m=today.getMinutes();
                var s=today.getSeconds();
                
                function checkTime(i){
                               if (i<10){
                               i="0" + i;
                               }
                               return i;
                }
    h=checkTime(h);
                m=checkTime(m);
                s=checkTime(s);
                document.getElementById('hora').innerHTML ="<b>Hora: </b>" + h + ":" + m + ":" + s;
                //alert(h + ":" + m + ":" + s);
                t=setTimeout('startTime()',900);
}
function renovaCookie(login){
    var d = new Date();
    d.setTime(d.getTime()+(10));
    var expires = "expires="+d.toGMTString();
    document.cookie = "login=" + login + "; " + expires;
}

function identificaBrowser(){
    var nom = navigator.appName;
    var elem = document.getElementById("div_dest");
    if (nom !== "Netscape"){  
        elem.className = 'IE';
    }
    else{  
        elem.className = 'NET';
    }
}

//Cria uma conex�o com o banco de dados
function createRequest(){
    try{
      request = new XMLHttpRequest();
    } catch (tryMS) {
      try{
        request = new ActiveXObject("Msxm12.XMLHTTP");
      } catch(otherMS) {
        try{
          request = new ActiveXObject("Microsoft.XMLHTTP");
        } catch(failed) {
          request = null;
        }
      }
    }
    return request;
}
//Recebe o ID de um campo de formul�rio e envia um arquivo (.php) de consulta ao banco de dados
function atualizaTabelaChamados(arquivo){
    request = createRequest();
    
    if(request === null){
        alert("Não foi possivel criar conexão com o banco de dados!");        
    }else{
        if(document.getElementById("pesquisa_num").value == ""){
            
            var n_chamado = '%';
        }else
        {
            var n_chamado = document.getElementById("pesquisa_num").value;
        }
        
        if(document.getElementById("pesquisa_sol").value == ""){
            solicitacao = '%';
        }else{
            solicitacao = document.getElementById("pesquisa_sol").value;
        }
        
        if(document.getElementById("pesquisa_tipo").value == ""){
            tipo = '%';
        }else{
            tipo = document.getElementById("pesquisa_tipo").value == "";
        }
        
        if(document.getElementById("pesquisa_sis").value == ""){
            sistema = '%';
        }else{
            sistema = document.getElementById("pesquisa_sis").value;
        }
        
        if(document.getElementById("pesquisa_log").value == ""){
            login = '%';
        }else{
            login = document.getElementById("pesquisa_log").value;
        }
        if(document.getElementById("pesquisa_dt_i").value == ""){
            dt_solic = '%';
        }else{
            dt_solic = document.getElementById("pesquisa_dt_i").value;
        }
        if(document.getElementById("pesquisa_l_in").value == ""){
            l_input = '%';
        }else{
            l_input = document.getElementById("pesquisa_l_in").value;
        }
        if(document.getElementById("pesquisa_dt_f").value == ""){
            dt_conclusao = '%';
        }else{
            dt_conclusao = document.getElementById("pesquisa_dt_f").value;
        }
        var url = arquivo + ".php?ide=1&" + 
                            "n_chamado=" +	n_chamado +
                            "&solicitacao=" +	solicitacao +
                            "&tipo=" +	tipo +
                            "&sistema=" +	sistema +
                            "&login=" +	login +
                            "&dt_solic=" +	dt_solic +
                            "&l_input=" +	l_input +
                            "&dt_conclusao=" +	dt_conclusao;
        request.onreadystatechange = alert(request.responseText);
        request.open("GET", url, true)
        request.send(null);
    }
}
function ValidaRetorno(){     
    if(request.readyState === 4){        
        if(request.status === 200){
        }
    }
}

function ValidaEntrada(objeto, tipo){
    switch (tipo){
        case 'dateTime':
            regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9] ([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/;
            break;
        case 'pedido':
            regex = /^1-[0-9]{10}$/;
            break;
        case 'date':
            regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9]$/;
            break;
        case 'text':
            regex = /^[a-zA-Z]{1}([áÁàÀãÃéÉíÍïÏóÓòÒóÓõÕúÚüÜ,?!;:_$#*/&>.<%\{\[\(\)\]\}@�=+����\"\'\\ A-Za-z0-9-]?)+$/;
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
            regex = /^((0?[1-9])|([1-9][0-9]))+$/;
            break;
        case 'combo':
            regex = /^[^0]+$/;
            break;
    }
    resultado = regex.exec(objeto.value);
    if(!resultado){
        objeto.style.backgroundColor = "#FFAA99";  
        document.getElementById("bt_enviar").disabled = true;
        document.getElementById("msg_erro_"+objeto.name).innerHTML = "Caractere inválido!";
        document.getElementById("bt_enviar").name += '_block_' +objeto.id;
     }
     else{
        var block = document.getElementById("bt_enviar").name;
        while(block.match('_block_' +objeto.id)){
            var block = document.getElementById("bt_enviar").name;
            var filtro = block.replace('_block_' +objeto.id,'');
            document.getElementById("bt_enviar").name = filtro;
        }
        objeto.style.backgroundColor = "#FFF";
          if(document.getElementById("bt_enviar").name === "bt_enviar"){
            document.getElementById("bt_enviar").disabled = false;
        }
    }
}

function logout(){
    window.location.assign('logout.php');
}