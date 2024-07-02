<?php   
@session_start();
include '../conexao.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php
	if($_SESSION["prioriza_indireto"] == 0){  
    echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../logout.php');
		</script>
 		";
	}

?>
<div id="principal">
<?php
		$ling            =$_POST["ling"];
		$nome_priorizar  =$_POST["operador"];
//echo $motivo;	
		$login 		= $_SESSION["login"];
		$nome  		= $_SESSION["nome"];
		$data_dia	= date("y/m/d");

if (empty($_POST["ling"]))
{
echo "<script>alert('Nenhum pedido selecionado.'); 
      window.history.go(-3); </script>\n; </script>";
exit;
}	


$query1= "SELECT * FROM usuarios WHERE login = '$nome_priorizar'";
$result1 = mysql_query($query1) or die (mysql_error());
		while($dado1= mysql_fetch_array($result1)){
         $nome_usuario = $dado1['nome'];
		 $turno        = $dado1['turno'];
		}

 foreach($_POST["ling"] as $id)
{ 	 
$sql_update ="UPDATE ilha_reversao_indireto_bko SET fila = 2,
                                        usuario = '$nome_priorizar',
										nome2 = '$nome_usuario',
										tramite ='Tratando',
										status_tp = 1,
										disc_status_tp = 'Aberta',
										data_tramite = '$data_dia',
										turno = '$turno'
										WHERE id_reversaoind = '$id'";

$acao = mysql_query($sql_update) or die (mysql_error());
}
//echo $sql_update;

	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		javascript: history.go(-2);
		</script>
 		";

?>
    
</div>
</body>
</html>