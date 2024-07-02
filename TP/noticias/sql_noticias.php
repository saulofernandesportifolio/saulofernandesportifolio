<?php   
@session_start(); 

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>Tramitação de Pedidos</title>
</head>
<body  id="logar" background="img/background.JPG">

<?php
	if($_SESSION["NOTICIAS"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../../tp/index.php');
			</script>
 		";
	}
?>

 <?php 
 include("../../tp/conexao.php");  
   
$_SESSION["nome"];

$nt=$_POST["noticia"];

if (empty($_POST["posicao"])){
echo "<script>alert('Selecionar Noticia!');
      document.location.replace('noticias.php');
                           </script>";
		exit;			   
		  }	
if (empty($_POST["titulo"])){
echo "<script>alert('Definir um Título para a Noticia!');
      document.location.replace('noticias.php');
                           </script>";
		exit;			   
		  }	
$sql_insert = "INSERT INTO noticias (noticia,
                                     posicao,
									 titulo)VALUE('$nt',
									               '$posicao',
												   '$titulo')";
$result = mysql_query($sql_insert,$conecta);
 
    $sql_nt1 ="SELECT * FROM noticias";
	$acao_nt1 = mysql_query($sql_nt1,$conecta);
    while($linha1= mysql_fetch_array($acao_nt1))
	{
    $id = $linha1["id_nt"];
	}
if($posicao == 1){

$sql_updatent = "UPDATE noticias_filtro SET id_nt = '$id',
                                            posicao = '$posicao'
											where id_ft = 1";
$result = mysql_query($sql_updatent,$conecta);
}
if($posicao == 2){

$sql_updatent = "UPDATE noticias_filtro SET id_nt = '$id',
                                            posicao = '$posicao'
											where id_ft = 2";
$result = mysql_query($sql_updatent,$conecta);
}
if($posicao == 3){

$sql_updatent = "UPDATE noticias_filtro SET id_nt = '$id',
                                            posicao = '$posicao'
											where id_ft = 3";
$result = mysql_query($sql_updatent,$conecta);
}
if($posicao == 4){

$sql_updatent = "UPDATE noticias_filtro SET id_nt = '$id',
                                            posicao = '$posicao'
											where id_ft = 4";
$result = mysql_query($sql_updatent,$conecta);
}

/*echo "o id é$id";
echo "<br>";
echo "A NOTICIA é $nt";
echo "<br>";
echo "A POSICÃO É $posicao";
echo "<br>";	*/




echo "<script>alert('Noticia cadastrada com sucesso!');
      document.location.replace('../../tp/home.php');
                           </script>";



?>

</div>
</div>

</body>
</html>