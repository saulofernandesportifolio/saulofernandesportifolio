<?php  
@session_start(); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/padrao.css" rel="stylesheet" style="text/css">

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

<div id="principal">

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
<div id="conteudo" >

<?php
include "conexao.php";  

//echo $id;

   	?>
    <br/><br/>
    <table border="0" bordercolor="#000000"  align="center" style="padding-left: 200px;">
    <td></td>
    <td>
    <table border="0" bordercolor="#000000"  align="center" bgcolor="#FFFFFF">
    <tr>
    <td><b><font face="Verdana, Geneva, sans-serif" size="3"><?php
    include "conexao.php"; 
	$sql_ntf1 ="SELECT * FROM noticias_filtro WHERE id_ft = 1";
	$acao_ntf1 = mysql_query($sql_ntf1,$conecta);
    while($linhaf1= mysql_fetch_array($acao_ntf1))
	{
    $id_ntf1 = $linhaf1["id_nt"];
	}
	$sql_nt1 ="SELECT * FROM noticias WHERE id_nt = '$id_ntf1'";
	$acao_nt1 = mysql_query($sql_nt1,$conecta);
    while($linha1= mysql_fetch_array($acao_nt1))
	{
    $titulo1 = $linha1["titulo"];
	}
	echo $titulo1 ?></font></b></td>
    
    <td><b><font face="Verdana, Geneva, sans-serif" size="3"><?php
    include "conexao.php"; 
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
	echo $titulo2 ?></font><b></td>
    </tr>
    <tr>
    <td><div class="divrolagem" style="padding-left:7px; padding-bottom:3px;"><?php
    include "conexao.php"; 
	$sql_ntf1 ="SELECT * FROM noticias_filtro WHERE id_ft = 1";
	$acao_ntf1 = mysql_query($sql_ntf1,$conecta);
    while($linhaf1= mysql_fetch_array($acao_ntf1))
	{
    $id_ntf1 = $linhaf1["id_nt"];
	}
	$sql_nt1 ="SELECT * FROM noticias WHERE id_nt = '$id_ntf1'";
	$acao_nt1 = mysql_query($sql_nt1,$conecta);
    while($linha1= mysql_fetch_array($acao_nt1))
	{
    $nt1 = $linha1["noticia"];
	}
	echo $nt1 ?></div></td>
    <td><div class="divrolagem" style="padding-left:7px; padding-bottom:3px;"><?php 
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
	echo $nt2 ?></div></td>

    </tr>
    <tr>
    <td align="center"><a href='../../tp/noticias/noticia1.php'>Leia Mais</a></td>
    <td align="center"><a href='../../tp/noticias/noticia2.php'>Leia Mais</a></td>
    </tr>
    <tr>
   <td>
    <tr><td><b><font face="Verdana, Geneva, sans-serif" size="3"><?php
    include "conexao.php"; 
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
	echo $titulo3 ?></font><b></td>
    <td><b><font face="Verdana, Geneva, sans-serif" size="3"><?php
    include "conexao.php"; 
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
	echo $titulo4 ?></font><b></td>
    </tr>
       <tr>
    <td><div class="divrolagem" style="padding-left:7px; padding-bottom:3px;"><?php
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
	 echo $nt3 ?></div></td>
     <td><div class="divrolagem" style="padding-left:7px; padding-bottom:3px;"><?php 
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
	
	echo $nt4 ?></div></td>
    </tr>
     <tr>
    <td align="center"><a href='../../tp/noticias/noticia3.php'>Leia Mais</a></td>
    <td align="center"><a href='../../tp/noticias/noticia4.php'>Leia Mais</a></td>
    </tr>
       </table>
       </td>
       </table>
</div>
</div>
</body>
</html>