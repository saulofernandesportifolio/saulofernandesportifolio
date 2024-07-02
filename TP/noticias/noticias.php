<?php   
@session_start(); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>Tramitação de Pedidos</title>
</head>
<body  id="logar">

<?php
	if($_SESSION["NOTICIAS"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('index.php');
			</script>
 		";
	}
?>

<div id="principal">

<div id="menu">
 <?php 
 include("../menu.php");  
 ?>
</div>
<?PHP
$_SESSION["nome"];

?>
<div id="conteudo">

<?php
include ("editor.php");
?>
</div>
</div>

</body>
</html>