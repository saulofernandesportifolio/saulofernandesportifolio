<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="css/padrao.css" rel="stylesheet" style="text/css">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">

<?php
//Testa se o perfil está correto.

	if($_SESSION["ADM"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
?>

<div id="principal">

    <div id="menu">
   <?php include("menu.php") ?>
   
    </div>
    
    <div id="caixa" >
    
        <div id="conteudo" >
        
            <p id="p_padrao">Administrador</p>
            
            <form action="carregar_base.php"  method="post" enctype="multipart/form-data" name="form1">
                
                <table id="table_conteudo"  align="center" border="0">
                             
                	<tr>
                        <td id="t_td">* Selecionar Base a ser Carregada:</td>
                         </tr>
                         <tr>
                         <td>
                    		<input name="file" type="file" class="carregar">
                    	 </td>
       		 	  </tr>
                        <td><br></td>
                        <td></td>
                	</tr>
                    
           	    <tr align="left">
                    	<td colspan="1">
                    		<input name="enviar" type="submit" value="Enviar" class="botao_padrao2" >
                            <input name="limpar" type="reset" value="Limpar" class="botao_padrao2">
                 		</td>
                        <td>
                    		
       	    </td>
                        <td></td>
                  </tr>
                
                </table>
            </form>
        
        </div>
        
    </div>
    
</div>
</body>
</html>