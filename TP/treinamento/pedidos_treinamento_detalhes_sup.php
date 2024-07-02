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
<script src="../../tp/jquery.popupWindow.js" type="text/javascript"></script>

</head>
<body id="logar" background="../../tp/img/background.JPG">

<?php
//Testa se o perfil está correto.

	if($_SESSION["treinamento_sup"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
		
					}
//echo $login;

;

?>



<?php

include("../../tp/conexao.php");

$atv_op="SELECT * FROM plano_de_acao WHERE operador = '$operador' and atividade = '$atividade' and reincidente = '$reincidente'  order by operador";

//echo $atv_op;

         
		echo "<table bgcolor='D6CA98' align='center' border='0'>
        <tr>
		<td id=\"t_td\" width=\"20%\">
        <strong><font color=\"#000000\">Operador</font></strong>
        </td>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Atividade</font></strong>
        </td>
        <td id=\"t_td\" width=\"10%\">
        <strong><font color=\"#000000\">Reincidente</font></strong>
		</td>
        <td id=\"t_td\" width=\"2%\">
        <strong><font color=\"#000000\">ID</font></strong>
        </td>
		</tr>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";

		$acao_op=mysql_query($atv_op,$conecta);
		while ($dado=mysql_fetch_array($acao_op))
			{
				$id = $dado["id"];
				$operador      = $dado ["operador"];
				$atividade     = $dado ["atividade"];
				$reincidente  = $dado ["reincidente"];
				$id   = $dado ["id"];
			
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
      
                  	<td id=\"t_td\" bgcolor=\"$cor\">$operador</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$atividade</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$reincidente</td>
				 	<td id=\"t_td\" bgcolor=\"$cor\">
					<a href=\"../../tp/treinamento/treinamento_sup_detalhe.php?&id=$id\">$id</a></td>
               		</tr>";
				}
				echo "</table>";   
			 	?>
</body>
</html>