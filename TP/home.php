<?php  
@session_start(); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/padrao.css" rel="stylesheet" style="text/css"/>

<title>Tramitação de Pedidos</title>

</head>


<body  id="logar">

<?php
	if($_SESSION["valida"] <> 1){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('index.php');
			</script>
 		";
	}
?>

<div id="principal"><br />

<div id="menu" >
 <?php 
 include("menu.php");  
?>
</div>


<?php
$_SESSION["nome"];
include("conexao.php");
$sql_user="SELECT * FROM usuarios WHERE login = '$login'";
$acao_op=mysql_query($sql_user,$conecta);
while($dado= mysql_fetch_array($acao_op)){
					    
$login = $dado["login"];
						}
//echo $login;
?>

</body>
</html>