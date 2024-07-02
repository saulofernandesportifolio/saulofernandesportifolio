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

</head>
<body id="logar" background="../../tp/img/background.JPG">
<p>
  
</p>


<?php
//Testa se o perfil está correto.

	if($_SESSION["prioriza_erros"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
	
$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];

//echo $login
	
?>


<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
    </div>
    
    <div id="caixa">
    
         <div id="conteudo">
        
            <p id="p_padrao">Supervisão - &nbsp; <?php echo $nome; ?>.</p><br>
           <p id="p_padrao" align="center">Retornar para Visão do operador.</p>
    <?php 
	      
   include "../conexao.php";
	$tempo = 0;

	 set_time_limit($tempo);
 	date_default_timezone_set("Brazil/East");
	$data_dia= date("y/m/d");
	
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
$sql_update ="UPDATE base_erros SET fila = 2,
                                        usuario = '$nome_priorizar',
										nome2 = '$nome_usuario',
										tramite ='Tratando',
										status_tp = 1,
										disc_status_tp = 'Aberta',
										data_tramite = '$data_dia',
										turno = '$turno'
										WHERE id= '$id'";

$acao = mysql_query($sql_update) or die (mysql_error());
}
//echo $sql_update;

	  echo"
		<script type=\"text/javascript\">
		alert('Pedido Priorizado!');
		javascript: history.go(-2);
		</script>
 		";
?>
	<form>
	<input name="login" type="hidden"  value="<?php echo $_SESSION["login"];?>" /> 
	</form>     
       </div>        
     </div>
    
    </div>
</body>
</html>