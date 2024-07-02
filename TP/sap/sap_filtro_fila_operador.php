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


if (empty($_POST["tipos"]))
{
echo "<script>alert('Nenhum erro selecionado.'); document.location.replace('sap_filtro_operador.php'); </script>\n";
exit;
}
if (empty($_POST["regional"]))
{
echo "<script>alert('Nenhuma regional selecionada.'); document.location.replace('sap_filtro_operador.php'); </script>\n";
exit;
}


$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];
//echo $login;
//echo "<br>";
//echo $nome;
//echo "<br>";

$tipo = $_POST['tipos']; 
$valores = ''; 
foreach($tipo as $k => $v){ 
$valores.= ",or, "."tipo_de_solicitacao="."'".$v."'";
}
//DELETE($valores,1,2);
$valores = "teste".$valores.") and (status_tp = 1 or status_tp = 2";
$lista = explode(",", $valores);
$lista2 = array_slice($lista,2,55);
$novavar = implode("", $lista2);
//$sql_consulta="SELECT * FROM controle_pn_bko WHERE $novavar ORDER BY criado_em ASC";
//print $sql_consulta; 

$tipo = $_POST['regional']; 
$regionais = ''; 
foreach($tipo as $k => $v){ 
$regionais.= ", or, "."regional="."'".$v."'";
}
//DELETE($valores,1,2);
$regionais = "teste".$regionais;
$regiao = explode(",", $regionais);
$regiao2 = array_slice($regiao,2,55);
$novavar2 = implode("", $regiao2);
$sql_consulta="Select * from diario_sap_bko where (fila = 2) and (login ='$login') and ($novavar2) and ($novavar) ORDER BY data_cadastro ASC";
$_SESSION["sql_consulta"] = $sql_consulta;
//echo $sql_consulta;	

$tempo = 0;


  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("y/m/d"); 

//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario

$sql_verifca = "$sql_consulta";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());



//echo $sql_consulta;
echo "<script type=\"text/javascript\">
        document.location.replace('../../tp/sap/pedido_sap_bko_operador.php');
		</script>";
        exit;


?>
</body>
</html>