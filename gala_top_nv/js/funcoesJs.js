function renovaCookie(login){
    var d = new Date();
    d.setTime(d.getTime()+(10));
    var expires = "expires="+d.toGMTString();
    document.cookie = "login=" + login + "; " + expires;
}

function identificaBrowser(){
    var nom = navigator.appName;
    var elem = document.getElementById("div_dest");
    if (nom != "Netscape"){  
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
function ConfereDados(objeto, arquivo){
    request = createRequest();
    if(request == null){
        alert("N�o foi possivel criar conex�o com o banco de dados!");        
    }else if(objeto.id == "login"){
        var url = arquivo + ".php?tabela="+document.getElementById("tabela").value + "&"+ objeto.id +"="+objeto.value;
        
        request.onreadystatechange = ValidaLogin;
        request.open("GET", url, true);
        request.send();        
    }else if(objeto.id == "senha"){
        var login =  document.getElementById("login");
        var url = arquivo + ".php?tabela="+document.getElementById("tabela").value +
                  "&"+ login.id +"="+login.value+ 
                  "&"+ objeto.id +"="+objeto.value;
        
        request.onreadystatechange = ValidaSenha;
        request.open("GET", url, true);
        request.send();
    }
}

function ValidaLogin(){
    if(request.readyState == 4){
        if(request.status == 200){
            if(request.responseText == "N/A"){
                document.getElementById("login").style.backgroundColor = "#FFAA99";
                document.getElementById("msg_erro_login").innerHTML = "Login n�o encontrado!";        
                document.getElementById("bt_enviar").disabled = true;
                document.getElementById("bt_enviar").name = 'login_block';
            }
            else if(request.responseText == "DUP"){
                document.getElementById("login").style.backgroundColor = "#FFAA99";
                document.getElementById("msg_erro_login").innerHTML = "Login duplicado!";        
                document.getElementById("bt_enviar").disabled = true;
                document.getElementById("bt_enviar").name = 'login_block';
            }
            else if(request.responseText == "OK"){
                document.getElementById("msg_erro_login").style.backgroundColor = "#FFF";
                document.getElementById("login").innerHTML = "";        
                document.getElementById("bt_enviar").disabled = false;
                document.getElementById("bt_enviar").name = 'bt_enviar';
            }            
            else if(request.responseText == "ERRO"){                
                document.getElementById("msg_erro_login").style.backgroundColor = "#FFF";
                document.getElementById("login").innerHTML = "Erro inesperado!";        
                document.getElementById("bt_enviar").disabled = true;
                document.getElementById("bt_enviar").name = 'login_block';
            }
        }
    }
}

function ValidaSenha(){
    if(request.readyState == 4){
        if(request.status == 200){
            if(document.getElementById("bt_enviar").name != 'login_block'){
                if(request.responseText == "N/A"){
                    document.getElementById("senha").style.backgroundColor = "#FFAA99";
                    document.getElementById("msg_erro_senha").innerHTML = "Senha incorreta!";        
                    document.getElementById("bt_enviar").disabled = true;
                    document.getElementById("bt_enviar").name = 'senha_block';
                }
                else if(request.responseText == "OK"){
                    document.getElementById("msg_erro_login").style.backgroundColor = "#FFF";
                    document.getElementById("login").innerHTML = "";        
                    document.getElementById("bt_enviar").disabled = false;
                    document.getElementById("bt_enviar").name = 'bt_enviar';
                }            
                else if(request.responseText == "ERRO"){                
                    document.getElementById("msg_erro_senha").style.backgroundColor = "#FFF";
                    document.getElementById("senha").innerHTML = "Erro inesperado!";        
                    document.getElementById("bt_enviar").disabled = true;
                    document.getElementById("bt_enviar").name = 'senha_block';
                }
            }
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
            regex = /^[A-Za-z�-�]{1}([���������������������,?!;:_$#*/&>.<%\{\[\(\)\]\}@�=+����\"\'\\ A-Za-z�-�0-9-]?)+$/;
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
        case 'cpf':
            regex = /^(([1-9])|([0-9]))+$/;
            break;    
        case 'combo':
            regex = /^[^""]+$/;
            break;
    
       case 'textarea':
            regex =/^[^""]+$/;
            break;
    }
    resultado = regex.exec(objeto.value);
    if(!resultado){
        objeto.style.backgroundColor = "#FFAA99";  
        document.getElementById("bt_enviar").disabled = true;
        document.getElementById("bt_enviar").name += '_block_' +objeto.id;
    
     }
     else{
        var block = document.getElementById("bt_enviar").name;
        while(block.match('_block_' +objeto.id)){
            var block = document.getElementById("bt_enviar").name;
            var filtro = block.replace('_block_' +objeto.id,'');
            document.getElementById("bt_enviar").name = filtro;
            
        }
        objeto.style.backgroundColor = "#FFFFFF";
          if(document.getElementById("bt_enviar").name == "bt_enviar"){
            document.getElementById("bt_enviar").disabled = false;
        }       
    }
}

function logout(login){
    var url = "logout.php?login=" + login;
    request.onreadystatechange = alert('Logout realizado com sucesso!');
    request.open("GET", url, true);
    request.send();
    document.location.replace('gala/index.php');
}

function Formatadata(Campo, teclapres){
	var tecla = teclapres.keyCode;
	var vr = new String(Campo.value);
	vr = vr.replace("/", "");
	vr = vr.replace("/", "");
	vr = vr.replace("/", "");
	tam = vr.length + 1;
	if (tecla != 8 && tecla != 8)
	{
		if (tam > 0 && tam < 2)
			Campo.value = vr.substr(0, 2) ;
		if (tam > 2 && tam < 4)
			Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
		if (tam > 4 && tam < 7)
			Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
	}
}

function enviardados(){
	if (document.dados.data_1.value=="")
	{
			alert( "Preencha o campo de data" );
			document.dados.data_1.focus();
			return false;
	}

	return true;
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
                document.getElementById('hora').innerHTML ="Hora:" + h + ":" + m + ":" + s;
                //alert(h + ":" + m + ":" + s);
                t=setTimeout('startTime()',900);
   
            
}


function resizePage() {
        document.getElementById("resolucao").style.height = (document.body.clientHeight - 100) * 0.9;
        document.getElementById("resolucao").style.width = (document.body.clientWidth - 100) * 0.9;
      }

function fecha(){
  if (confirm("Tem certeza que deseja sair dessa p�gina")) { 
    fecha.returnValue=location.assign("logout.php");
    window.close();
  } else {
    fecha.returnValue=location.assign("logout.php");
    return false
  }
;
    }
    
 /* Javascript */
$('#data_1','#data_2').focus(function()
{	
       $(this).dhtmlgoodies_calendar({		
	            target:'data_1',
				target:'data_2',
				closeClick:false
					});
});   

function HabCampos(objeto) 
{
         
	  if (objeto.id == '2') 
	  {
	    document.getElementById('campos').style.display = "";
        document.getElementById('locacao').value= "";
        document.getElementById('locacao').focus();
       
	  }  
      else
      {
       document.getElementById('campos').style.display = "none";
       document.getElementById('locacao').value= "Eco Berrini";
	  }
        
	   
     
}   

function HabCamposrel(){
	  if (document.getElementById('2').checked){
			document.getElementById('campos').style.display = "";
            document.getElementById('driver_oculta').style.display = "";
	  }
	  else{
			document.getElementById('campos').style.display = "none";
	  }
      if (document.getElementById('3').checked){
			document.getElementById('driver_oculta').style.display = "none";
            document.getElementById('form_rel').action = "principal.php?t=forms/gera_relatorio_driver.php";
	  }
	  else{
			document.getElementById('driver_oculta').style.display = "";
            document.getElementById('form_rel').action = "principal.php?t=forms/gera_relatorio.php";
	  }
}
 
 
 
