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
<script src="../../tp/jquery.popupWindow.js" type="text/javascript"></script>

</head>
<body id="logar" background="../../tp/img/background.JPG">

<?php
//Testa se o perfil está correto.

	if($_SESSION["diretoria_sup"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
		
					}
//echo $login;

;

?>



<?php

 $turno1 = $turnoo;
 $login_usuario1 = $login_usuario;
 $tramite1 = $tramite;
 $pesquisa_data1 = $pesquisa_data;
 $dt_dia = date("Y-m-d");
include("../../tp/conexao.php");

if ($pesquisa_data1 == 'mes'){
	 $dt_dia = date("Y-m-");
$atv_op="SELECT * FROM base_diretoria WHERE turno = '$turno1' and nome2 = '$login_usuario1' and disc_status_tp = '$tramite1' and data_tramite like '%$dt_dia%' order by tmt";
} else $atv_op="SELECT * FROM base_diretoria WHERE turno = '$turno1' and nome2 = '$login_usuario1' and disc_status_tp = '$tramite1' and data_tramite like '%$dt_dia' order by tmt";

//echo $atv_op;

         
		echo "<table bgcolor='D6CA98' align='center' border='0'>
        <tr>
		<td id=\"t_td\" width=\"7%\">
        <strong><font color=\"#000000\">Pedido</font></strong>
        </td>
		<td id=\"t_td\" width=\"8%\">
        <strong><font color=\"#000000\">Ofensor</font></strong>
        </td>
        <td id=\"t_td\" width=\"17%\">
        <strong><font color=\"#000000\">Comentário</font></strong>
		</td>
        <td id=\"t_td\" width=\"10%\">
        <strong><font color=\"#000000\">Remetente</font></strong>
        </td>
		<td id=\"t_td\" width=\"3%\">
        <strong><font color=\"#000000\">TMT</font></strong>
        </td>
		</tr>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		$nome = $_SESSION["nome"];
		$login = $_SESSION["login"];
		$data_hoje = date("Y-m-d");
		$sql_consulta=$atv_op;
		//echo $sql_consulta;
		$acao_op=mysql_query($sql_consulta,$conecta);
		while ($dado=mysql_fetch_array($acao_op))
			{
				$id = $dado["id"];
				$pedido      = $dado ["pedido"];
				$ofensor     = $dado ["ofensor"];
				$comentario  = $dado ["comentario"];
				$remetente   = $dado ["remetente"];
				$tmt         = $dado ["tmt"];
			
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
       	<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"../../tp/diretoria/diretoria_bko_sup_detalhe.php?&id=$id\">$pedido</a></td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$ofensor</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$comentario</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$remetente</td>
					<td id=\"t_td\" bgcolor=\"$cor\">$tmt</td>
               		</tr>";
				}
				echo "</table>";   
			 	?>
</body>
</html>