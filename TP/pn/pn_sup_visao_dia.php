<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E - GTQ  - Gestão Tramite Qualidade</title>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar" background="../../tp/img/background.JPG">

<?php
//Testa se o perfil está correto.

	if($_SESSION["SUP_PN"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
$login = $_SESSION["login"];
$nome = $_SESSION["nome"];

?>

<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
    </div>
    
    <div id="caixa" >
    
         <div id="conteudo" >
        
            <p id="p_padrao">PN Supervisor - &nbsp; <?php echo $_SESSION["nome"]; ?>.</p>
                           
               <?php
			 				
				include("../../tp/pn/visao_dia_pn_sup.php");
				   
			 	?>
        
        </div>
        
    </div>
    
</div>
</body>
</html>