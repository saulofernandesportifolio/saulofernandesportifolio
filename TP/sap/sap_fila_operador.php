<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">

<?php
//Testa se o perfil está correto.

	if($_SESSION["sap_bko"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
?>
<?php
include "../conexao.php";


$tempo = 0;


  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("y/m/d"); 

$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$loga = $_SESSION["sql_consulta"];
//echo $login;
//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario

if($_SESSION["sap_bko"] == 1){
$sql_verifca = $_SESSION["sql_consulta"];
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());

$num = mysql_num_rows($acao_verifica);


if($num <= 0)
{       
		 echo "<script type=\"text/javascript\">
        alert('Voce nao possui atividades em sua visao. Por favor entre em contato com a distribuicao.');
		document.location.replace('../../tp/sap/sap_filtro.php');
		</script>";
        exit;
}
		
$sql_pedidos = $_SESSION["sql_consulta"];
$acao_pedidos = mysql_query($sql_pedidos) or die (mysql_error());

}
?>
</body>
</html>