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
	if($_SESSION["prioriza_direto"] == 0){  
    	
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
            
            <form action="../../tp/direto/direto_filtro_fila_priorizar.php" method="post">
                                       
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                       <td id="t_td"><span id="texto">Marcar Todos</span></td>
                       <td>
                       <input id="checkbox_master" onClick="marca_desmarca();" type="checkbox"></input>
                       </td>
                       <td id="t_td"></td>
                       <td>
                       </td>
					</tr>
                    <tr>
                       <td id="t_td"><span id="texto"><strong>Regional</strong></span></td>
                       <td>
                       
                       </td>
                       <td id="t_td"></td>
                       <td>
                       </td>
					</tr>
                    <tr>
                        <td id="t_td">VPE</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="VPE">
                    	</td>
                        <td id="t_td">SP</td>
                        <td>
                            <input name="regional[]"  type="checkbox" value="SP">
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
                        <td id="t_td"><strong>Revisão</strong></td>
                        <td>

                    	</td>
                        <td id="t_td"></td>
                        <td>
                    	</td>
                   <tr>
                        <td id="t_td">1</td>
                        <td>
                            <input name="revisao[]"  type="checkbox" value="=1">
                    	</td>
                        <td id="t_td">2</td>
                        <td>
                            <input name="revisao[]"  type="checkbox" value="=2">
                    	</td>
                   </tr>
                   <tr>
                        <td id="t_td">3</td>
                        <td>
                            <input name="revisao[]"  type="checkbox" value="=3">
                    	</td>
                        <td id="t_td">4 ou mais</td>
                        <td>
                            <input name="revisao[]"  type="checkbox" value=">=4">
                    	</td>
                   </tr>                      
                   </tr>
                  <tr align="center" >
                  	<td>
                 		<input name="enviar" type="submit" value="Abrir" class="botao_padrao" >
               	    </td>
                    <td>
                   		<input name="limpar" type="reset" value="Limpar" class="botao_padrao">
                   	</td>
                    <td></td>	<td></td>
                </table>
            </form>
        
        </div>
        
    </div>
    
</div>
</body>
</html>