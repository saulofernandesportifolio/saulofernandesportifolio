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

<script type="text/javascript">
      function valida(element, tipo){
        switch (tipo)
        {
            case 'dateTime':
                regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9] ([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/;
                break;
            case 'pedido':
                regex = /^(1-[0-9]{10,16})?$/;
                break;
            
            case 'date':
                regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9]$/;
                break;
            case 'text':
                regex = /^[ÃãÂâÁáÀàçéÉóÓõÕÔôÍíÚú,?!;:_$#*/&>.<%\{\[\(\)\]\}@¨=+ºª°€\"\'\\ A-Za-z0-9-]+$/;
                break;
            case 'indexQ':
                regex = /^(0|([0]{0,2}[1-9])|([0]{0,1}[1-9][0-9])|(100))$/;
                break;
            case 'senha':
                regex = /^([@#$&?!-. A-Za-z0-9])$/;
                break;
            case 'login':
                regex = /^[ .-A-Za-z0-9]+$/;
                break;       
        }
        resultado = regex.exec(element.value);
        if(!resultado) {
            element.style.backgroundColor = "#FFAA99";
            document.getElementById("enviar").disabled = 1;
        }
        else {
            element.style.backgroundColor = "#FFF";
            document.getElementById("enviar").disabled = 0;
        }
     }
</script>




</head>
<body id="logar">
<?php
	if($_SESSION["operador_gestao"] == 0){  
 	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
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
        
            <p id="p_padrao">Filtro - Operador :&nbsp; <?php echo $_SESSION["nome"]; ?>.</p>
            
            <form action="filtro_pendente_operador.php" method="post">
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
                        <td id="t_td">Norte</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="Norte">
                    	</td>
                        <td id="t_td">Sul</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="Sul">
                    	</td>
                   </tr>
                   <tr>
                        <td id="t_td">MG</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="MG">
                    	</td>
                        <td id="t_td">Leste</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="Leste">
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
                  
                   </tr>
                   <tr>
                   	   <tr>
                   		<td>Numero do pedido: </td>
                    	<td>
                            <input id="n_pedido" onkeyup="valida(this, 'pedido')" type="text" name="nu_pedido" />
                    	</td>
                   </tr>
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