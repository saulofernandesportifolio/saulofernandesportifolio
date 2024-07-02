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

	if($_SESSION["supervisor_gestao"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
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

				$atv_op="SELECT * FROM base_gestao WHERE turno = '$turno1' and usuario = '$login_usuario1' and disc_status_tp = '$tramite1' and data_tramite like '%$dt_dia%'";
}else 			$atv_op="SELECT * FROM base_gestao WHERE turno = '$turno1' and usuario = '$login_usuario1' and disc_status_tp = '$tramite1' and data_tramite like '%$dt_dia'";
$acao_op=mysql_query($atv_op,$conecta);	  
	                               
          
		echo "<table bgcolor='D6CA98' align='center' border='0'>
        <tr>
		<td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Pedido</font></strong>
        </td>
		<td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Regional</font></strong>
        </td>
        <td id=\"t_td\" width=\"20%\">
        <strong><font color=\"#000000\">GC</font></strong>
		<td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Data Trâmite</font></strong>
        </td>                   
		</tr>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado=mysql_fetch_array($acao_op))
			{
				$id_gestao = $dado["id_gestao"];
				$regional = $dado["regional"];
				$pedido = $dado["pedido"];
				$gc = $dado["gc"];
				$termino_efetivo = $dado ["termino_efetivo"];
				
	if ($termino_efetivo <> 0){   
$data_americano2 = "$termino_efetivo";
$partes_da_data2 = explode(" ",$data_americano2);
$data2="$partes_da_data2[0]";
$datatransf2= explode("-",$data2);
$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
$termino_efetivo = $data2;
}
else
{
$criado_em = "";
}			
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
               	<td id=\"t_td\" bgcolor=\"$cor\">
				<a href=\"gestao_bko_sup_detalhe.php?&id_gestao=$id_gestao\">$pedido</a>
				</td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$regional</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$gc</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$termino_efetivo</td>
               		</tr>";
                }
				echo "</table>"; 
				
				//echo $atv_op;  
			 	?>
</body>
</html>