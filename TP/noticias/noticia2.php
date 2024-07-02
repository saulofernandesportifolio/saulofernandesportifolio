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
	$sql_ntf2 ="SELECT * FROM noticias_filtro WHERE id_ft = 2";
	$acao_ntf2 = mysql_query($sql_ntf2,$conecta);
    while($linhaf2= mysql_fetch_array($acao_ntf2))
	{
    $id_ntf2 = $linhaf2["id_nt"];
	}
	$sql_nt2 ="SELECT * FROM noticias WHERE id_nt = '$id_ntf2'";
	$acao_nt2 = mysql_query($sql_nt2,$conecta);
    while($linha2= mysql_fetch_array($acao_nt2))
	{
    $titulo2 = $linha2["titulo"];
	}
	echo $titulo2 ?></font><b></td></tr>
     <tr>
    <td><?php 
	$sql_ntf2 ="SELECT * FROM noticias_filtro WHERE id_ft = 2";
	$acao_ntf2 = mysql_query($sql_ntf2,$conecta);
    while($linhaf2= mysql_fetch_array($acao_ntf2))
	{
    $id_ntf2 = $linhaf2["id_nt"];
	}
	$sql_nt2 ="SELECT * FROM noticias WHERE id_nt = '$id_ntf2'";
	$acao_nt2 = mysql_query($sql_nt2,$conecta);
    while($linha2= mysql_fetch_array($acao_nt2))
	{
    $nt2 = $linha2["noticia"];
	}
	echo $nt2 ?></td>
    </tr>
    <tr>
    <td align="center"><a href='../../tp/home.php'>Voltar</a></td>
    </tr>
    </table>
</div>
</div>
</body>
</html>