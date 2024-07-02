<?php   
@session_start(); 

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">

<?php
	if($_SESSION["prioriza_erros"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../tp/logout.php');
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
        
            <p id="p_padrao">Filtro - Operador :&nbsp; <?php echo $_SESSION["nome"]; ?>.</p>
            
            <form action="../../tp/erros/erros_filtro_fila_priorizar.php" method="post">
                                       
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                  		<td id="t_td"><span id="texto">Marcar Todos</span></td>
                        <td>
                            <input id="checkbox_master" onClick="marca_desmarca();" type="checkbox"></input>
                    	</td>
                   </tr>
                   <tr></tr>
                   <tr>
                        <td id="t_td">Erro de serviço</td>
                        <td>
                            <input name="tipos[]" type="checkbox" value="Erro de serviço">
                    	</td>
                        <td id="t_td">OV</td>
                        <td width="5px">
                            <input name="tipos[]" type="checkbox" value="OV" >
                    	</td>
                   </tr>
                   <tr></tr>
                   <tr>
                        <td id="t_td">Linha</td>
                        <td>
                            <input name="tipos[]"  type="checkbox" value="Linha">
                    	</td>
                        <td id="t_td">Cliente Conta</td>
                        <td width="5px">
                            <input name="tipos[]"  type="checkbox" value="Cliente Conta" >
                    	</td>
                   </tr>
                   <tr></tr>
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
                            <input name="regional[]"  type="checkbox" value="Norte">
                    	</td>
                        <td id="t_td">Sul</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="SUL">
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
                   <tr>
                        <td id="t_td">SP</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="SP">
                    	</td>
                        <td id="t_td">CO</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="CO">
                    	</td>
                   
                   </tr>
                   <tr>
                        <td id="t_td">Nordeste</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="NE">
                    	</td>
                         <td id="t_td">ND</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="ND">
                    	</td>
                  
                   </tr>
                   <tr>
                        <td id="t_td"><p style="font-weight:bold;">Carteira</p></td>
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
                            <input name="carteira[]"  type="checkbox" value="Nao">
                    	</td>
                         <td id="t_td">VPE</td>
                        <td>
                            <input name="carteira[]"  type="checkbox" value="Sim">
                    	</td>
                  
                   </tr>
                   <tr>
                   		<td><br></td>
                    	<td></td>
                   </tr>
                   <tr align="center" >
                   		<td >
                        	<input name="enviar" type="submit" value="Abrir" class="botao_padrao" >
               	  		</td>
                   <td>
                   			<input name="limpar" type="reset" value="Limpar" class="botao_padrao">
                   </td>
                   			<td></td>
                            <td></td>
                   </table>
            </form>
        
        </div>
        
    </div>
    
</div>
</body>
</html>