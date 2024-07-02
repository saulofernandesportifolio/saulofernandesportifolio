<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

</head>
<body id="logar" background="../../tp/img/background.JPG">
<p>
  
</p>


<?php
//Testa se o perfil está correto.

	if($_SESSION["bi"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];


//echo $login;

?>


   <?php        
   include "../conexao.php";
	$tempo = 0;

	 set_time_limit($tempo);
 	date_default_timezone_set("Brazil/East");
	$data_dia= date("y/m/d");
	
	//echo "$validador";
	
	
    switch($validador)
	{
	case 1: echo"
			<script>
			document.location.replace('filtro_sap.php');
			</script>
 		";
	break;
	
	case 2: echo"
			<script>
			document.location.replace('filtro_erros.php');
			</script>
 		";
	break;
	
	case 3: echo"
			<script>
			document.location.replace('filtro_pn.php');
			</script>
 		";
	break;
	
	case 4: echo"
			<script>
			document.location.replace('filtro_direto.php');
			</script>
 		";
	break;
	
	case 5: echo"
			<script>
			document.location.replace('filtro_indireto.php');
			</script>
 		";
	break;
	
	case 6: echo"
			<script>
			document.location.replace('filtro_gestao.php');
			</script>
 		";
	break;
	
		case 7: echo"
			<script>
			document.location.replace('filtro_diretoria.php');
			</script>
 		";
	break;
		case 8: echo"
			<script>
			document.location.replace('filtro_treinamento.php');
			</script>
 		";
	break;
        case 9: echo"
			<script>
            document.location.replace('filtro_tsa.php');
			</script>
 		";
	break;
	
	}
	 
	?>
  

</body>
</html>