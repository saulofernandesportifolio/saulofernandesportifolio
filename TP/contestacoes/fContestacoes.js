function Formatadata(Campo, teclapres)
{
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


function Formatahora(Campo, teclapres)
			{
				var tecla = teclapres.keyCode;
				var vr = new String(Campo.value);
				vr = vr.replace(":", "");
				tam = vr.length + 1;
				if (tecla != 8 && tecla != 8)
				{
					if (tam > 0 && tam < 2)
						Campo.value = vr.substr(0, 2) ;
					if (tam > 2 && tam < 4)
						Campo.value = vr.substr(0, 2) + ':' + vr.substr(2, 2);
					
				}
			}

/*-----------------------------------------------------------------------
Máscara para o campo data dd/mm/aaaa hh:mm:ss
Exemplo: <input maxlength="16" name="datahora" onKeyPress="DataHora(event, this)">
-----------------------------------------------------------------------*/
function DataHora(evento, objeto){
	var keypress=(window.event)?event.keyCode:evento.which;
	campo = eval (objeto);
	if (campo.value == '00/00/0000 00:00:00')
	{
		campo.value=""
	}
 
	caracteres = '0123456789';
	separacao1 = '/';
	separacao2 = ' ';
	separacao3 = ':';
	conjunto1 = 2;
	conjunto2 = 5;
	conjunto3 = 10;
	conjunto4 = 13;
	conjunto5 = 16;
	if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19))
	{
		if (campo.value.length == conjunto1 )
		campo.value = campo.value + separacao1;
		else if (campo.value.length == conjunto2)
		campo.value = campo.value + separacao1;
		else if (campo.value.length == conjunto3)
		campo.value = campo.value + separacao2;
		else if (campo.value.length == conjunto4)
		campo.value = campo.value + separacao3;
		else if (campo.value.length == conjunto5)
		campo.value = campo.value + separacao3;
	}
	else
		event.returnValue = false;
}




$(document).ready(function(){
         $("select[name=motivos_erro]").change(function(){
            $("select[name=ofertas]").html('<option value="">Carregando...</option>');
            $.post("desc_oferta.php", 
                  {erro:$(this).val()},
                  function(valor){
                     $("select[name=ofertas]").html(valor);				  }
                  )
         })
      })
      
$(document).ready(function(){$("select[name=tp_ofensor_input]").change(function(){
                $("select[name=motivos_erro_input]").html('<option value="">Carregando...</option>');
                $.post("tipo_erro_input.php", 
                      {erro:$(this).val()},
                      function(valor){
                         $("select[name=motivos_erro_input]").html(valor);}
                      )
             }
         )
    }
)      
      
      
$(document).ready(function(){$("select[name=motivos_erro_input]").change(function(){
                $("select[name=dc_erro]").html('<option value="">Carregando...</option>');
                $.post("desc_erro_input.php", 
                      {erro:$(this).val()},
                      function(valor){
                         $("select[name=dc_erro]").html(valor);}
                      )
             }
         )
    }
)

$(document).ready(function(){$("select[name=motivos_erro]").change(function(){
                $("select[name=dc_erro]").html('<option value="">Carregando...</option>');
                $.post("desc_erro.php", 
                      {erro:$(this).val()},
                      function(valor){
                         $("select[name=dc_erro]").html(valor);}
                      )
             }
         )
    }
)


$(document).ready(function(){$("select[name=operador]").change(function(){
         
            $.post("turno_ofensor.php", 
                  {ofensor:$(this).val()},
                  function(valor){
                     $("#turno").html(valor);				  }
                  )
         })
      })

$(document).ready(function(){$("select[name=operador_input]").change(function(){
         
            $.post("turno_ofensor_input.php", 
                  {ofensor:$(this).val()},
                  function(valor){
                     $("#turno").html(valor);				  }
                  )
         })
      })





function valida(element, tipo){
    switch (tipo)
    {
    case 'dateTime':
        regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/+(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9] ([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/;
        break;
     
      case 'atividade':
        regex=/^1-(.|\s{8})+$/;
        //regex = /^1-[0-9]{9}$/;
        break;
        
      case 'atividade_pedido':
        regex=/^1-(.|\s{8})+$/;
        //regex = /^1-[0-9]{9}$/;
        break;  
    
    case 'pedido':
        regex = /^1-[0-9]{10,15}$/;
        break;
    
    case 'date':
        regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9]$/;
        break;
        
    case 'text':
        regex = /^(.|\s)+$/;
        break;
        
    case 'indexQ':
        regex = /^(0|([0]{0,2}[1-9])|([0]{0,1}[1-9][0-9])|(100))$/;
        break;
        
    case 'senha':
        regex = /^([@#$&?!-. A-Za-z0-9])$/;
        break;
        
    case 'int':
        regex = /^[0-9]+$/;
        break;
    
    case 'select':
        regex = /^(.)+$/;
        break;
        
    case 'login':
        regex = /^[ .-A-Za-z0-9]+$/;
        break;
    
    case 'cnpj':
        regex = /^[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2}/;
        break;
            
    }
    resultado = regex.exec(element.value);
    if(!resultado) {
        element.style.backgroundColor = "#FFAA99";
        document.getElementById("bt_enviar").disabled = 1;
    }
    else {
        element.style.backgroundColor = "#FFF";
        document.getElementById("bt_enviar").disabled = 0;
    }
}

//AJAX
function CriaRequest(){
    try
    {
        request = new XMLHttpRequest(); 
    }
    catch (IEAtual)
    {
        try
        {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(IEAntigo)
        {
            try
            {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(falha)
            {
                request = false;
            }
        }
    }
    if(!request){
        alert("Seu Navegador n�o suporta Ajax!");        
    }
    else{
        return request;
    }
}
function pesquisa() {
    var nome = document.getElementById("n_pedido").value;
    var result = document.getElementById("Resultado");
    var xmlreq = CriaRequest();
    result.innerHTML = 'Pesquisando...';    
    xmlreq.open("GET", "pesquisa_contestacoes2.php?n_pedido=" + nome, true);
     
    xmlreq.onreadystatechange = function(){ 
        
        if (xmlreq.readyState == 4)
        {  
            if (xmlreq.status == 200)
            {
                result.innerHTML = xmlreq.responseText;
            }else{
                result.innerHTML = "Erro: " + xmlreq.statusText + "Result: " + xmlreq.responseText;;
            }
        }
    };
    xmlreq.send(null);
}

function pesquisa_atv() {
    var nome2 = document.getElementById("n_pesquisa").value;
    var result = document.getElementById("Resultado");
    var xmlreq = CriaRequest();
    result.innerHTML = 'Pesquisando...';    
    xmlreq.open("GET", "pesquisa_contestacoes_atv2.php?n_pesquisa=" + nome2, true);
 
    xmlreq.onreadystatechange = function(){ 
        if (xmlreq.readyState == 4)
        {  
            if (xmlreq.status == 200)
            {
                result.innerHTML = xmlreq.responseText;
            }else{
                result.innerHTML = "Erro: " + xmlreq.statusText + "Result: " + xmlreq.responseText;;
            }
        }
    };
    xmlreq.send(null);
}

function enviardados()
{

 	if (document.form1.item_fdv2.value == "")
	{
			alert( "Preencha o FDV" );
			document.form1.item_fdv2.focus();
         
			return false;
	}
   	
	if (document.form1.parecer2.value=="")
	{
			alert( "Preencha o Parecer" );
			document.form1.parecer2.focus();
           
			return false;
	}
    
    
    	if (document.form1.email2.value=="")
	{
			alert( "Preencha o Retorno do email");
			document.form1.email2.focus();
           
			return false;
	}
    
    	return true;
}


