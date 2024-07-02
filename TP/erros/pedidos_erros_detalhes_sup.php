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

	if($_SESSION["adm_erros"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
		
					}
;

?>

<?php

 $turno1 = $turnoo;
 $login_usuario1 = $login_usuario;
 $tramite1 = $tramite;

include("../../tp/conexao.php");

 $pesquisa_data1 = $pesquisa_data;
 $dt_dia = date("Y-m-d");
include("../../tp/conexao.php");

if ($pesquisa_data1 == 'mes'){
	 $dt_dia = date("Y-m-");

$atv_op="SELECT * FROM base_erros WHERE turno = '$turno1' and usuario = '$login_usuario1' and disc_status_tp = '$tramite1' and data_tramite like '%$dt_dia%'";
}else $atv_op="SELECT * FROM base_erros WHERE turno = '$turno1' and usuario = '$login_usuario1' and disc_status_tp = '$tramite1' and data_tramite like '%$dt_dia'";

//echo $atv_op;

?>
   <div id="conteudo_pn" >
     
	<?php           
		echo "<table bgcolor='D6CA98' align='center' border='0'>
        <tr>
		<td id=\"t_td\" width=\"8%\">
        <strong><font color=\"#000000\">Pedido</font></strong>
        </td>
		<td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Regional</font></strong>
        </td>
        <td id=\"t_td\" width=\"17%\">
        <strong><font color=\"#000000\">Tipo</font></strong>
		</td>
        <td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Data</font></strong>
        </td>
		</tr>
		";
              
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
			$acao_pedidos = mysql_query($atv_op) or die (mysql_error());
		while ($dado=mysql_fetch_array($acao_pedidos))
			{
				$id = $dado["id"];
				$regional = $dado["regional"];
				$adabas = $dado["adabas"];
				$pedido = $dado ["pedido"];
				$tipo = $dado ["tipo"];
				$data_cadastro = $dado["criado_em"];
				$data_sla = $data_cadastro;
				$data_cadastro = explode('-', $data_cadastro);
				$data_cad = $data_cadastro[2].'/'.$data_cadastro[1].'/'.$data_cadastro[0];

				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"erros_bko_sup_detalhe.php?&id=$id\">$pedido</a></td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$regional</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$tipo</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$data_cad</td>

               		</tr>";
         
					}
				echo "</table>";   
			 	?>
			</div>
</body>
</html>