<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../TP/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../TP/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../../TP/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">

<?php
//Testa se o perfil está correto.
	if($_SESSION["reversao_ind_bko"] == 0){  
   			echo"<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../../tp/logout.php');
			</script>
 		";
	}
include "../../tp/conexao.php";

$tempo = 0;

 set_time_limit($tempo);
 date_default_timezone_set("Brazil/East");
 $data_dia= date("Y/m/d"); 
//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario
$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
//echo $login;
$sql_verifca = "SELECT * FROM ilha_reversao_indireto_bko WHERE fila=2 and usuario='$login' ORDER BY criado_em ASC";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());
$num = mysql_num_rows($acao_verifica);
if($num <= 0)
{       
		echo "<script type=\"text/javascript\">
        alert('Voce nao possui atividades em sua visao. Por favor entre em contato com a distribuicao.');
		document.location.replace('../../tp/indireto/indireto_filtro.php');
		</script>";
        exit;
}
$sql_pedidos = "SELECT * FROM ilha_reversao_indireto_bko WHERE fila=2 and usuario='$login' ORDER BY criado_em ASC";
$acao_pedidos = mysql_query($sql_pedidos) or die (mysql_error());
?>
</body>
</html>