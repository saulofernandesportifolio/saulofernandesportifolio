<?php   
@session_start();
include '../conexao.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php
	if($_SESSION["tsa"] == 0){  
    echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../logout.php');
		</script>
 		";
	}
	$tempo = 0;
function transforme_data_hora_amd($data){
    $dataHora = explode(" ",$data);
    $dt = explode("-",$dataHora[0]);
    return $dt[2]."/".$dt[1]."/".$dt[0]." ".$dataHora[1];
}
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");
?>
<div id="principal">

    <div id="menu">
   <?php 
    include("../menu.php") ?>
    </div>
    <div id="caixa" style="height:460px;">
        <div id="conteudo">
            <p id="p_padrao">TSA - <?php echo $_SESSION["nome"]; ?>.</p>
<?php
echo "<table bgcolor='D6CA98' align='left' border='0'>
		<tr>
		<td width='20%' id=\"t_td\"><strong><font color=\"#000000\">	Nº da monitoria	</font></strong></td>
        <td width='30%' id=\"t_td\"><strong><font color=\"#000000\">	Data Auditoria	</font></strong></td>
        <td width='20%' id=\"t_td\"><strong><font color=\"#000000\">	Pedido	</font></strong></td>
        <td width='15%' id=\"t_td\"><strong><font color=\"#000000\">	Revisões	</font></strong></td>
        <td width='15%' id=\"t_td\"><strong><font color=\"#000000\">	Sub-status	</font></strong></td>
		</tr>
		";

$sql="SELECT * FROM base_tsa WHERE `sub-status da correcao` = 'pendente'";
$consulta = mysql_query($sql);

if(mysql_num_rows($consulta) == 0)
{
     echo " <tr bgcolor=\"#FFFFFF\">
            <td bgcolor=\"#FFFFFF\" id=\"t_td\" colspan='21'>
            <strong><center>
            <font color=\"#000000\">Nenhuma TSA pendente foi encontrada.</font>
            </center></strong>
            </td>
            </tr>";
}else
{
    $cor= "#FFFFFF";
    while ($dado= mysql_fetch_array($consulta))
    {
        $id          = $dado["codigo"];
        $n_monitoria = $dado["n_monitoria"];
        $dt_auditoria = $dado["data_hora_auditoria"];
        $pedido = $dado["pedido"];
        $q_revisoes = $dado["qtde de revisões"];
        $subStatus_correcao =  $dado["sub-status da correcao"];

     if($cor == "#CCCCCC")
     {
       	$cor= "#FFFFFF";
     }else{
        $cor= "#CCCCCC";
	 }
     
     echo " <tr bgcolor=\"$cor\">
    		<td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\"><a href='abre_tsa.php?id=$id'>$n_monitoria</a></font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">".transforme_data_hora_amd($dt_auditoria)."</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$pedido</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$q_revisoes</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$subStatus_correcao</font></strong></td>
    		</tr>
    		";
    }
}		
?>
        </div>        
    </div>   
</div>    
</body>
</html>