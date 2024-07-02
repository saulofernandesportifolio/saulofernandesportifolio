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
echo "<script>alert('Nenhum erro selecionado.'); document.location.replace('sap_filtro.php'); </script>\n";
exit;
}
if (empty($_POST["regional"]))
{
echo "<script>alert('Nenhuma regional selecionada.'); document.location.replace('sap_filtro.php'); </script>\n";
exit;
}

$tipo = $_POST['tipos']; 
$valores = ''; 
foreach($tipo as $k => $v){ 
$valores.= ",or, "."tipo_de_solicitacao="."'".$v."'";
}
//DELETE($valores,1,2);
$valores = "teste".$valores.") and (status_tp = 1";
$lista = explode(",", $valores);
$lista2 = array_slice($lista,2,55);
$novavar = implode("", $lista2);
//$sql_consulta="SELECT * FROM controle_pn_bko WHERE $novavar ORDER BY criado_em ASC";
//print $sql_consulta; 


//////////////////////////////////////////////////////////////////////////////////////////////////////////////



$tipo = $_POST['regional']; 
$regionais = ''; 
foreach($tipo as $k => $v){ 
$regionais.= ",or, "."regional="."'".$v."'";
}
//DELETE($valores,1,2);
$regionais = "teste".$regionais;
$regiao = explode(",", $regionais);
$regiao2 = array_slice($regiao,2,55);
$novavar2 = implode("", $regiao2);
$sql_consulta="SELECT * FROM diario_sap_bko WHERE ($novavar2) and ($novavar) ORDER BY data_cadastro ASC";

//echo $sql_consulta;	

$tempo = 0;


  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("y/m/d"); 

//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario

if($_SESSION["sap_bko"] == 1){
$sql_verifca = "$sql_consulta";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());

$num = mysql_num_rows($acao_verifica);


if($num <= 0)
{       
		echo "<script type=\"text/javascript\">
        alert('Voce nao possui atividades pendentes.');
		document.location.replace('home.php');
		</script>";
        exit;

    }
$sql_pedidos = "$sql_consulta";
$acao_pedidos = mysql_query($sql_pedidos) or die (mysql_error());

}
?>
</body>
</html>