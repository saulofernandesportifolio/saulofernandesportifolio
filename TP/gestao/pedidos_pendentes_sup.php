<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
//Testa se o perfil está correto.
	if($_SESSION["supervisor_gestao"] == 0){  
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
$nome  = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];
	}
	include "../conexao.php";
	$tempo = 0;

	set_time_limit($tempo);
 	date_default_timezone_set("Brazil/East");
	$data_dia= date("y/m/d"); 

	include "pendente_sup_fila.php";
	$acao_pedidos = mysql_query($sql_consulta) or die (mysql_error());
	$num_ = mysql_num_rows($acao_pedidos);
?>

	<div id="principal">
    <div id="menu">
    
	<?php include("../menu.php") ?>
    
    </div>
    <div>
    <div id="conteudo_pn">
     
    <p id="p_padrao">Você tem <?php echo "$num_" ?> Solicitações pendente.</p>
    
	<?php          
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
		while ($dado=mysql_fetch_array($acao_pedidos))
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
				<a href=\"gestao_bko_sup.php?&id_gestao=$id_gestao\">$pedido</a>
				</td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$regional</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$gc</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$termino_efetivo</td>
               		</tr>";
                }
				echo "</table>";   
			 	?>
			</div>
		</div>
	</div>
</body>
</html>