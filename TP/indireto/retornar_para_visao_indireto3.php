<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E - GTQ  - Gestão Tramite Qualidade</title>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

</head>
<body id="logar" background="../../tp/img/background.JPG">
<p>
  
</p>


<?php
//Testa se o perfil está correto.

	if($_SESSION["ADM_REVERSAO_IND"] == 0){  
    	
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
	$data_dia=  date("y/m/d");
	$data_dia2= date("y/m/d");
	$hora_atual = date ('H:i');
if (empty($_POST["ling"]))
{
echo "<script>alert('Nenhuma atividade selecionada.'); 
      window.history.go(-3); </script>\n; </script>";
exit;
}	
 foreach($_POST["ling"] as $id)
{ 	 
$sql_update ="UPDATE ilha_reversao_indireto_bko SET fila = 1,
                                        usuario = 'Aguardando Operador',
										nome2 = 'Aguardando Operador',
										tramite ='Aguardando',
										status_tp = 1,
										disc_status_tp = 'Aberta',
										data_tramite = '$data_dia',
										fila=1,
										hora_retorno = '$hora_atual',
										data_retorno = '$data_dia2',
										nome_retorno = '$nome',
										turno = 'ND'
										WHERE id_reversaoind = '$id'";

$acao = mysql_query($sql_update) or die (mysql_error());
}

echo "<script>alert('Pedido Retornado para fila.'); 
       document.location.replace('../../tp/home.php');
	   </script>";

?>
	<form>
	<input name="login" type="hidden"  value="<?php echo $_SESSION["login"];?>" /> 
	</form>     
       </div>        
     </div>
    
    </div>
</body>
</html>