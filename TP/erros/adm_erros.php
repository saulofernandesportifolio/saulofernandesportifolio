<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">



<?php
//Testa se o perfil está correto.
if(!isset($_GET['aut2']))
    $_GET['aut2']=0;

	if($_SESSION["carrega_base_erros"] == 0 && $_GET['aut2'] != 1){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
?>

<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
   
    </div>
    
    <div id="caixa" >
    
        <div id="conteudo" >
        
            <p id="p_padrao">Administrador - &nbsp; <?php echo $_SESSION["nome"]; ?>.</p>
            
            <form action="carregar_base_erros.php"  method="post" enctype="multipart/form-data" name="form1">
                
                <table id="table_conteudo"  align="center" border="0">
                             
                	<tr>
                        <td id="t_td">* Selecionar Base erros a ser Carregada:</td>
                         </tr>
                         <tr>
                         <td>
                    		<input name="file" type="file" class="combobox_padrao_grande" />
                    	 </td>
       		 	  </tr>
                        <td><a href="../../tp/planilhas/modelo/modelo_base_erros.zip">Modelo de planilha</a></td>
                        <td></td>
                	</tr>
                    
           	    <tr align="left">
                    	<td colspan="1">
                    		<input name="enviar" type="submit" value="Enviar" class="botao_padrao" />
                            <input name="limpar" type="reset" value="Limpar" class="botao_padrao" />
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