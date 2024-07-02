<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<link href="css/padrao.css" rel="stylesheet" style="text/css">
</head>
<body id="logar">

<?php
	if($_SESSION["pesquisa"] == 0){  
    	
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
    
    <div id="caixa" style="height:550px;">
    
        <div id="conteudo" >
    	
        
        
        
        </div>
        
    </div>
    
</div>
</body>
</html>