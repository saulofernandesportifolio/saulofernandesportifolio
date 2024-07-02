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

	if($_SESSION["SUP_SAP"] == 0){  
    	
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
$atv_op="SELECT * FROM diario_sap_bko WHERE turno = '$turno1' and nome2 = '$login_usuario1' and disc_status_tp = '$tramite1' and data_tramite like '%$dt_dia%'";
} else $atv_op="SELECT * FROM diario_sap_bko WHERE turno = '$turno1' and nome2 = '$login_usuario1' and disc_status_tp = '$tramite1' and data_tramite like '%$dt_dia'";

	echo "<table bgcolor='D6CA98' align='left' border='0'>
        <tr>
		<td id='t_td' width='23%'>
        <strong><font color='#000000' size='2'>Pedido</font></strong>
        </td>
        <td id='t_td' width='4%'><font color='#000000' size='2'>
        <strong>OV</font></strong>
        </td>
		<td id='t_td' width='4%'><font color='#000000' size='2'>
        <strong>cliente</font></strong>
        </td>
		<td id='t_td' width='5%'>
        <strong><font color='#000000' size='2'>Regional</font></strong>
        </td>
        <td id='t_td' width='25%'>
        <strong><font color='#000000' size='2'>Motivo</font></strong>
		</td>
       	<td id='t_td' width='5%'>
        <strong><font color='#000000' size='2'>Data Tramite</font></strong>
        </td>
		<td id='t_td' width='3%'>
        <strong><font color='#000000' size='2'>tramite</font></strong>
        </td>  
        <td id='t_td' width='23%'>
        <strong><font color='#000000' size='2'>Operador</font></strong>
        </td> 
         <td id='t_td' width='23%'>
        <strong><font color='#000000' size='2'>Turno</font></strong>
        </td>                 
		</tr>
		";


$cor= "#FFFFFF";
$acao_op=mysql_query($atv_op,$conecta);
while ($dado=mysql_fetch_array($acao_op))
			{
				$id_sap = $dado["id_sap"];
				$regional = $dado["regional"];
				$adabas = $dado["adabas"];
				$pedido = $dado ["pedido"];
				$ov = $dado["ov"];
				$nova_ov = $dado["nova_ov"];
				$tipo_ov = $dado ["tipo_ov"];
				$qtde_linhas_pedidos = $dado["qtde_linhas_pedido"];
				$qtde_linhas_ov = $dado["qtde_linhas_ov"];
				$data_do_desbloqueio = $dado["data_do_desbloqueio"];
                $motivo = $dado["motivo"];
				$solicitado_por = $dado["solicitado_por"];
				$cliente = $dado["cliente"];
				$disc_status_tp = $dado["disc_status_tp"];
				$nome2 = $dado["nome2"];
				$tramite = $dado["tramite"];
				$data_tramite = $dado["data_tramite"];
				$turno = $dado["turno"];
				$data_cadastro = $dado["data_cadastro"];
				$data_sla = $data_cadastro;
				$data_cadastro = explode('-', $data_cadastro);
				$data_cad = $data_cadastro[2].'/'.$data_cadastro[1].'/'.$data_cadastro[0];
				//VARIAVEL COM A DATA NO FORMATO AMERICANO
				$data_americano = "$data_do_desbloqueio";


				$data_atual = date("Y-m-j"); 
				$data1=explode('-', $data_atual);
				$data_atu= $data1[2];
				$data_cadastr = $data_sla;
				$data2=explode('-', $data_cadastr);
				$data_cad1= $data2[2];
				$sla = $data_atu - $data_cad1;
				
				if ($sla >=3){
					$tempo_sla= "<font color='#FF0000'><b>$sla</b></font>";
				}
				else{
					$tempo_sla = $sla;
				}


 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_inicial2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
				
				if( $data_tramite == 0000-00-00)
				{
					$data_tramite2 = "";
				}
				else
				{				
				$data_americano2 = "$data_tramite";
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data2 = explode(" ",$data_americano2);
				$data2="$partes_da_data2[0]";
				
				$datatransf2 = explode("-",$data2);
				$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
				//$datacompleta = $data;
				
				$data_tramite2 = $data2;
				//$linha['visao_ilha']=$visao_ilha2;
				}
													
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
                  	<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"../../tp/sap/sap_bko_sup_detalhe.php?&id_sap=$id_sap\">$pedido</font></a></a></td>
					<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"../../tp/sap/sap_bko_sup_detalhe.php?&id_sap=$id_sap\">$ov</font></a></a></td>
					<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"../../tp/sap/sap_bko_sup_detalhe.php?&id_sap=$id_sap\">$cliente</font></a></a></td>
                  	<td id='t_td1' bgcolor=$cor >
					<font color='#000000' size='2'>$regional</font></td>
                  	<td id='t_td1'  bgcolor=$cor >
					<font color='#000000' size='2'>$motivo </font></td> 
                  	<td id='t_td1'  bgcolor=$cor >
					<font color='#000000' size='2'>$data_tramite2 </font></td>
				  	<td id='t_td1'  bgcolor=$cor >
					<font color='#000000' size='2'>$tramite </font></td>
                    <td id='t_td1'  bgcolor=$cor >
					<font color='#000000' size='2'>$nome2 </font></td>
                    <td id='t_td1'  bgcolor=$cor >
					<font color='#000000' size='2'>$turno </font></td>
               		</tr>
					";
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

						
?>
</body>
</html>