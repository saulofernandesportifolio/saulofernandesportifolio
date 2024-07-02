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
</head>
<body id="logar">

<?php
	if($_SESSION["SUP_PN"] == 0){  
    	
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
            
            <form action="../../tp/pn/pn_fila_filtro_sup.php" method="post">
                                       
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                  
                        <td id="t_td"><span id="texto">Marcar Todos</span></td>
                        <td>
                            <input id="checkbox_master" onClick="marca_desmarca();" type="checkbox"></input>
                    	</td>
                        <td id="t_td" >Backoffice Aprovado</td>
                        <td> 
                            <input name="tipos[]" type="checkbox" value="Backoffice aprovado">
                    	</td>
                   </tr><tr></tr>
                   <tr>
                        <td id="t_td">Cancelado Pendente portin</td>
                        <td>
                            <input name="tipos[]" type="checkbox" value="Cancelado pendente port.">
                    	</td>
                        <td id="t_td">Aguardando autorização de portin</td>
                        <td width="5px">
                            <input name="tipos[]" type="checkbox" value="Aguardando Autorização PORTIN" >
                    	</td>
                   </tr><tr></tr>
                   
                                                     <tr>
                        <td id="t_td">Erro portabilidade</td>
                        <td>
                            <input name="tipos[]"  type="checkbox" value="Erro Portabilidade">
                    	</td>
                        <td id="t_td">Erro solicitação de portin</td>
                        <td width="5px">
                            <input name="tipos[]"  type="checkbox" value="Erro solicitação de PORTIN" >
                    	</td>
                   </tr><tr></tr>
                                      <tr>
                        <td id="t_td">Executado parcialmente</td>
                        <td>
                            <input name="tipos[]"  type="checkbox" value="Executado parcialmente">
                    	</td>
                         <td id="t_td">Aguardando cancelamento de portin</td>
                        <td>
                            <input name="tipos[]"  type="checkbox" value="Aguard. cancelamento port.">
                    	</td>
                   </tr><tr></tr>
                   
                       <tr>
                        <td id="t_td">Validando portin</td>
                        <td>
                            <input name="tipos[]"  type="checkbox" value="Validando PORTIN">
                    	</td>
                      

                        <td>
 
                        </td>
                   </tr>
                                  
                    
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