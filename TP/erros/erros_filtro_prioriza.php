<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">
<?php
	if( $_SESSION["prioriza_erros"] == 0){  
 	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
	
$nome = $_SESSION["nome"];
//$login = $_SESSION["login"];
$turno = $_SESSION["turno"];

include("../../tp/conexao.php");

$sql_user="SELECT * FROM usuarios WHERE login = '$login'";
$acao_op=mysql_query($sql_user,$conecta);
while($dado= mysql_fetch_array($acao_op)){
					    
$login = $dado["login"];
						}
//echo $login;

;
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
    
    <div id="caixa" style="height:360px;">
    
        <div id="conteudo" >
        
            <p id="p_padrao">Filtro Erros Prioriza - Operador :&nbsp; <?php echo $_SESSION["nome"]; ?>.</p>
            
            <form action="../../tp/erros/erros_filtro_fila_prioriza.php" method="post">
            <input name="login" type="hidden"  value="<?php echo $_SESSION["login"];?>" />
                                       
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
                            <input name="tipo[]" type="checkbox" value="Erro de serviço">
                    	</td>
                        <td id="t_td">OV</td>
                        <td width="5px">
                            <input name="tipo[]" type="checkbox" value="OV" >
                    	</td>
                   </tr>
                   <tr></tr>
                   <tr>
                        <td id="t_td">Linha</td>
                        <td>
                            <input name="tipo[]"  type="checkbox" value="Linha">
                    	</td>
                        <td id="t_td">Cliente Conta</td>
                        <td width="5px">
                            <input name="tipo[]"  type="checkbox" value="Cliente Conta" >
                    	</td>
                   </tr>
                      <tr>
                        <td id="t_td">Geral de Comunicação </td>
                        <td>
                            <input name="tipo[]"  type="checkbox" value="Falha Geral de Comunicação">
                    	</td>
                        <td id="t_td">Pendente de Prosseguir</td>
                        <td width="5px">
                            <input name="tipo[]"  type="checkbox" value="Pendente de Prosseguir" >
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
                            <input name="carteira[]"  type="checkbox" value="vpg">
                    	</td>
                         <td id="t_td">VPE</td>
                        <td>
                            <input name="carteira[]"  type="checkbox" value="vpe">
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