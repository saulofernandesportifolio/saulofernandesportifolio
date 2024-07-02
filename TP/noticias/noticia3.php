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
	/*if($_SESSION["NOTICIAS"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('index.php');
			</script>
 		";
	}*/
?>

<div id="principal">

<div id="menu" >
 <?php 
 include("../menu.php");  
?>
</div>


<?PHP
$_SESSION["nome"];

?>
<div id="conteudo" style="padding:20px">

<?php
include "../conexao.php";  

//echo $id;

   	?>
    <br><br>
    <table width="100%" border="0" bordercolor="#000000" align="center" bgcolor="#FFFFFF" style="padding-left: 120px;">
    <tr>
     <td>
    <tr><td><b><font face="Verdana, Geneva, sans-serif" size="3"><?php
    include "../conexao.php"; 
	$sql_ntf3 ="SELECT * FROM noticias_filtro WHERE id_ft = 3";
	$acao_ntf3 = mysql_query($sql_ntf3,$conecta);
    while($linhaf3= mysql_fetch_array($acao_ntf3))
	{
    $id_ntf3 = $linhaf3["id_nt"];
	}
	$sql_nt3 ="SELECT * FROM noticias WHERE id_nt = '$id_ntf3'";
	$acao_nt3 = mysql_query($sql_nt3,$conecta);
    while($linha3= mysql_fetch_array($acao_nt3))
	{
    $titulo3 = $linha3["titulo"];
	}
	echo $titulo3 ?></font><b></td></tr>
    <tr>
    <td><?php
	$sql_ntf3 ="SELECT * FROM noticias_filtro WHERE id_ft = 3";
	$acao_ntf3 = mysql_query($sql_ntf3,$conecta);
    while($linhaf3= mysql_fetch_array($acao_ntf3))
	{
    $id_ntf3 = $linhaf3["id_nt"];
	}
	$sql_nt3 ="SELECT * FROM noticias WHERE id_nt = '$id_ntf3'";
	$acao_nt3 = mysql_query($sql_nt3,$conecta);
    while($linha3= mysql_fetch_array($acao_nt3))
	{
    $nt3 = $linha3["noticia"];
	}
	 echo $nt3 ?></td>
    </tr>
    <tr>
    <td align="center"><a href='../../tp/home.php'>Voltar</a></td>
    </tr>
    </table>
    
</div>
</div>
</body>
</html>