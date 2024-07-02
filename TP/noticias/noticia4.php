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
	$sql_ntf4 ="SELECT * FROM noticias_filtro WHERE id_ft = 4";
	$acao_ntf4 = mysql_query($sql_ntf4,$conecta);
    while($linhaf4= mysql_fetch_array($acao_ntf4))
	{
    $id_ntf4 = $linhaf4["id_nt"];
	}
	$sql_nt4 ="SELECT * FROM noticias WHERE id_nt = '$id_ntf4'";
	$acao_nt4 = mysql_query($sql_nt4,$conecta);
    while($linha4= mysql_fetch_array($acao_nt4))
	{
    $titulo4 = $linha4["titulo"];
	}
	echo $titulo4 ?></font><b></td></tr>
    <tr>
    <td><?php 
    $sql_ntf4 ="SELECT * FROM noticias_filtro WHERE id_ft = 4";
	$acao_ntf4 = mysql_query($sql_ntf4,$conecta);
    while($linhaf4= mysql_fetch_array($acao_ntf4))
	{
    $id_ntf4 = $linhaf4["id_nt"];
	}
	$sql_nt4 ="SELECT * FROM noticias WHERE id_nt = '$id_ntf4'";
	$acao_nt4 = mysql_query($sql_nt4,$conecta);
    while($linha4= mysql_fetch_array($acao_nt4))
	{
    $nt4 = $linha4["noticia"];
	}
	
	echo $nt4 ?></td>
    </tr>
    <tr>
    <td align="center"><a href='../../tp/home.php'>Voltar</a></td>
    </tr>
    </table>
  
</div>
</div>
</body>
</html>