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

	if($_SESSION["SUP_PN"] == 0){  
    	
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


include("../../tp/conexao.php");


 $pesquisa_data1 = $pesquisa_data;
 $dt_dia = date("Y-m-d");
include("../../tp/conexao.php");

if ($pesquisa_data1 == 'mes'){
	 $dt_dia = date("Y-m-");

$atv_op="SELECT * FROM controle_pn_bko WHERE turno = '$turno1' and nome2 = '$login_usuario1' and disc_status_tp = '$tramite1' and data_tramite2 like '%$dt_dia%'";
}else $atv_op="SELECT * FROM controle_pn_bko WHERE turno = '$turno1' and nome2 = '$login_usuario1' and disc_status_tp = '$tramite1' and data_tramite2 like '%$dt_dia'";


	echo "<table bgcolor='D6CA98' align='left' border='0'>
        <tr>
		<td id=\"t_td\" width=\"35%\">
        <strong><font color=\"#000000\">Pedido</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Status pedido</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Trâmite</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Regional</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Erro</font></strong>
        </td>
		 
		</tr>
		";


$cor= "#FFFFFF";
$acao_op=mysql_query($atv_op,$conecta);
while ($dado= mysql_fetch_array($acao_op))
		                {
		               
		               
				        $login8 = $dado['login'];
						$regional = $dado['regional'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_inicial = $dado['data_inicial'];
						$tramite = $dado['disc_status_tp'];
						$nome2 = $dado['nome2'];
						$data_tramite2 = $dado['data_tramite2'];
						$turno = $dado['turno'];
						$status_pedido = $dado['status_pedido'];
						$erro = $dado['erro'];
						$id = $dado['id_pn'];
						$numero_pedido = $dado['numero_pedido'];
						
						
				$data_americano = "$data_inicial"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_inicial2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
				
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
				$data_americano2 = "$data_tramite2"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data2 = explode(" ",$data_americano2);
				$data2="$partes_da_data2[0]";
				
				$datatransf2 = explode("-",$data2);
				$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
				//$datacompleta = $data;
				
				$data_tramite3 = $data2;
													
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
                  	<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"../../tp/pn/pn_bko_sup_detalhe.php?&id=$id\">$numero_pedido</font></a></a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$status_pedido</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$tramite</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$regional</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$erro</a></td>
					</tr>";
					}
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">

					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					
		           </tr>
				    ";
				echo "</table>";  

//echo $atv_op;						
?>
</body>
</html>