<?php   
@session_start(); 

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
        <meta name="description" content="jquery"/>
        <meta name="keywords" content="jquery" />
		<meta name="robots" content="all, index, follow" />
		<!--<link href="_style/default.css" rel="stylesheet" type="text/css"/>-->
		<link  href="calendario/_style/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="calendario/_scripts/jquery.js"></script>
		<script type="text/javascript" src="calendario/_scripts/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="calendario/_scripts/exemplo-calendario.js"></script>


<script>
<!-- Marcara para Datas -->

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

<!-- Função valida campos vazios -->

/*function enviardados()
{

	if (document.dados.data_1.value=="")
	{
			alert("Preencha o campo de data");
			document.dados.data_1.focus();
			return false;
	}

	return true;
}*/

/* Javascript
$('#data_1').focus(function()
{	
$(this).calendario({target:'data_1',top:0,left:130});

});

/* Javascript 
$('#data_2').focus(function()
{	
$(this).calendario({target:'data_2',top:0,left:130});

});*/

/* Javascript */
$('#data_1','#data_2').focus(function()
{	
       $(this).calendario({		
	            target:'data_1',
				target:'data_2',
				closeClick:false
					});
					});
					


</script>
</head>
<body id="logar">

<?php
	if($_SESSION["pn_bko"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
?>
  
 <script type="text/javascript"> 
function marca_desmarca() 
{ 
        var e = document.getElementsByTagName("input"); 
        var x = document.getElementById("texto"); 
        var master = document.getElementById("checkbox_master");         
        var bool; 
 
        if (x.innerHTML == "Marcar Todos") // if (master.checked == true) // <-- substituir "IF" para var master.checked sempre true. 
        { bool = true;  x.innerHTML = "Desmarcar Todos";        } 
        else 
        { bool = false; x.innerHTML = "Marcar Todos";           } 
 
        for(var i=1;i<e.length;i++) 
        { 
                if (e[i].type=="checkbox") 
                { 
                        e[i].checked = bool; 
                }        
        } 
        master.checked = false; // se var master.checked for sempre true -> apagar esta linha 
} 
</script> 
 
<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
    </div>
    
    <div id="caixa" style="height:480px;">
    
        <div id="conteudo" >
        
            <p id="p_padrao">Filtro PN - Operador :&nbsp; <?php echo $_SESSION["nome"]; ?>.</p>
            
            <form action="../../tp/pn/pn_fila_filtro_aguardando_janela.php" method="post">
                                       
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                  
                        <td id="t_td"><span id="texto">Marcar Todos</span></td>
                        <td>
                            <input id="checkbox_master" onClick="marca_desmarca();" type="checkbox"></input>
                    	</td>
                        </tr>
                        <tr>
                        <td id="t_td" >Backoffice Aprovado</td>
                        <td> 
                            <input name="tipos[]" type="checkbox" value="Backoffice aprovado">
                    	</td>
                        <tr>
                        <td id="t_td">Executado parcialmente</td>
                        <td>
                            <input name="tipos[]"  type="checkbox" value="Executado parcialmente">
                    	</td>
                         <td id="t_td">Aguardando Janela</td>
                        <td>
                            <input name="tipos[]"  type="checkbox" value="Aguardando Janela"></td>
                       <tr>
                           <td colspan="3" align="right"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Data Inicial</font>:
                            <input type="text" name="data_1" id="data_1" size="10" maxlength="10"/>
                    	</td>
                        <td>
                        <font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Data Final</font>:</td>
                      <td><input type="text" name="data_2" id="data_2" size="10" maxlength="10"/></td></tr>
                   </tr><tr></tr>
                                               
                   <tr><td><br></td><td></td></tr> 
                    
                    <tr>
                        <td id="t_td"><p style="font-weight:bold;">Regionais</p></td>
                        <td>
                            
                    	</td>
                        <td id="t_td"></td>
                        <td>
                        </td>
                        <td>
                        </td>
                   </tr>
                   <tr>
                        <td id="t_td">Norte</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="NORTE">
                    	</td>
                        <td id="t_td">CO/N</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="CO/N">
                    	</td>
                      
                   </tr>
                   <tr>
                        <td id="t_td">MG</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="MG">
                    	</td>
                        <td id="t_td">Leste</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="LESTE">
                    	</td>
                   </tr>
                   
                                      </tr>
                   <tr>
                        <td id="t_td">Sul</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="SUL">
                    	</td>
                        <td id="t_td">Nordeste</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="NE">
                    	</td>
                   </tr>
                   <tr>
                        <td id="t_td">SP</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="SP">
                    	</td>
                        <td id="t_td"></td>
                        <td>
                          	
                    	</td>
                   </tr>
                   
                   <tr><td><br></td><td></td></tr>
                     <tr>
                        <td id="t_td"><p style="font-weight:bold;">Canal</p></td>
                        <td>
                            
                    	</td>
                        <td id="t_td"></td>
                        <td>
                        </td>
                        <td>
                        </td>
                   </tr>
                   <tr>
                        <td id="t_td">VPG</td>
                        <td>
                            <input name="canal[]"  type="checkbox" value="VPG">
                    	</td>
                        <td id="t_td">VPE</td>
                        <td>
                            <input name="canal[]"  type="checkbox" value="VPE">
                    	</td>
                      
                   </tr>
                   <tr>
                        <td id="t_td">Tele - Vendas</td>
                        <td>
                            <input name="canal[]"  type="checkbox" value="Tele - Vendas">
                            </td>
                    	 </tr>
 
                  <tr><td><br></td><td></td></tr>  
                    
                <tr align="center" >
                   	<td >
                    
                  		<input name="enviar" type="submit" value="Abrir" class="botao_padrao" >
               	  </td>
                    <td>
                   		<input name="limpar" type="reset" value="Limpar" class="botao_padrao">
                   	</td>
                    <td></td><td></td>
                </table>
            </form>
        
        </div>
        
    </div>
    
</div>
</body>
</html>