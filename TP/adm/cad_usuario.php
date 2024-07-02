<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php
//Testa se o perfil está correto.

	if($_SESSION["BI"] == 0){  
    	
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
   <?php 
   //require_once("menu.php");
include("../../tp/menu.php") ?>
   
    </div>
    
    <div id="caixa" >
    
        <div id="conteudo" >
          <form name="form1" method="post" action="">
            
            <span id="sprytextfield1">
            <label for="nome">Usuário:</label>
              <input type="text" name="nome" id="nome">
              <span class="textfieldRequiredMsg">A value is required.</span></span><br>
            <span id="sprytextfield2">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
            <span class="textfieldRequiredMsg">A value is required.</span></span>
          </form>
			
        </div>
        
    </div>
    
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
</body>
</html>