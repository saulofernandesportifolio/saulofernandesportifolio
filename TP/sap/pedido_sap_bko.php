<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>E - GTQ  - Gestão Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php
//Testa se o perfil está correto.
	if($_SESSION["sap_bko"] == 0){  
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];
	}

	include "../conexao.php";
	$tempo = 0;

	 set_time_limit($tempo);
 	date_default_timezone_set("Brazil/East");
	 $data_dia= date("y/m/d"); 

	include "sap_fila.php";
	$acao_pedidos = mysql_query($sql_verifca) or die (mysql_error());
	$num_ = mysql_num_rows($acao_pedidos);
?>

	<div id="principal">
    <div id="menu">
    
	<?php include("../menu.php") ?>
    
    </div>
    <div>
    <div id="conteudo_pn" >
     
    <p id="p_padrao">Você tem <?php echo "$num" ?> Solicitações pendente.</p>
    
	<?php          
		echo "<table bgcolor='D6CA98' align='center' border='0'>
        <tr>
		<td id=\"t_td\" width=\"8%\">
        <strong><font color=\"#000000\">Pedido</font></strong>
        </td>
        <td id=\"t_td\" width=\"4%\"><font color=\"#000000\">
        <strong>OV</font></strong>
        </td>
		<td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Cliente</font></strong>
        </td>
        <td id=\"t_td\" width=\"17%\">
        <strong><font color=\"#000000\">Motivo</font></strong>
		</td>
        <td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Regional</font></strong>
        </td>
		<td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Data</font></strong>
        </td>
		<td id=\"t_td\" width=\"3%\">
        <strong><font color=\"#000000\">SLA</font></strong>
        </td>                   
		</tr>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado=mysql_fetch_array($acao_pedidos))
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
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"sap_bko.php?&id_sap=$id_sap\">$pedido</a></td>
                  	<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"sap_bko.php?&id_sap=$id_sap\">$ov</td>
                  	<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"sap_bko.php?&id_sap=$id_sap\">$cliente</td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$motivo</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$regional</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$data_cad</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$tempo_sla</td>
               		</tr>";
         
					}
				echo "</table>";   
			 	?>
			</div>
		</div>
	</div>
</body>
</html>