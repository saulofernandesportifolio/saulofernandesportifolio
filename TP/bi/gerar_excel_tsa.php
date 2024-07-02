<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
</head>
<?php

   include "../conexao.php";
   
$acao = $_POST['acao']; 
$erro = $_POST["erro"];
$analise=$_POST["analise_bko"];
$data_1=$_POST["data_1"];   
  
$data_1 = substr($data_1,6,4)."/".substr($data_1,3,2)."/".substr($data_1,0,2);

if($data_2 <> '')
{
	$data_2 = substr($data_2,6,4)."/".substr($data_2,3,2)."/".substr($data_2,0,2);
}

else
{

	$data_2 = date("Y/m/d");
}	

if($data_1 <> ''){
$sql_consulta="SELECT * FROM base_tsa 
                WHERE `acao` LIKE '$acao' and 
                      `erro`          LIKE '$erro' and
                      `analise bko`   LIKE '$analise' and
                `data_hora_auditoria` BETWEEN '$data_1' and '$data_2' 
                ORDER BY `data_hora_auditoria`";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
$sql_consulta="SELECT * FROM base_tsa 
                WHERE `acao` LIKE '$acao' and 
                      `erro`          LIKE '$erro' and
                      `analise bko`   LIKE '$analise'  
                ORDER BY `data_hora_auditoria`";
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if ($num == '0'){
	
	

				echo"
			<script type=\"text/javascript\">
			alert('Não consta pedidos com estes critérios');
			javascript: history.go(-1);
			
			</script>
			";
	die;
}
   
   $export_file = "relatorios/Base_TSA.xls";
	  
	ob_end_clean();
	ini_set('zlib.output_compression','Off');
    header('Pragma: public');
	header('Pragma: public');
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");				  // Data no passado
	header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');	 // HTTP/1.1
	header('Cache-Control: pre-check=0, post-check=0, max-age=0');	// HTTP/1.1
	header("Pragma: no-cache");
	header("Expires: 0");
	header('Content-Transfer-Encoding: none');
	header('Content-Type: application/vnd.ms-excel;');				 // IE & Opera
	header("Content-type: application/x-msexcel");					// Outros
	header('Content-Disposition: attachment; filename="'.basename($export_file).'"');
   

echo "<table bgcolor='D6CA98' align='left' border='0' class='combobox_padrao'>
		<tr>
		<td id=\"t_td\"><strong><font color=\"#000000\">	Nº da monitoria	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Data Auditoria	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Data Correcao	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Pedido	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Qtde de Revisões	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Indice Qualidade	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Operacao	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Parecer Auditoria	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Acao Auditada	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Erro	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Descricao Do Erro	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Ofertas	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Analise Bko	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Manifestacao Bko	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Operador Ofensor	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Analista da Atividade	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Necessario Correcao	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Area de Correcao	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Acao de Correcao	</font></strong></td>
        <td id=\"t_td\"><strong><font color=\"#000000\">	Status da Correcao	</font></strong></td>
		</tr>
		";

$sql="SELECT * FROM base_tsa";
$consulta = mysql_query($sql);

if(mysql_num_rows($consulta) == 0)
{
     echo " <tr bgcolor=\"#FFFFFF\">
            <td bgcolor=\"#FFFFFF\" id=\"t_td\" colspan='21'>
            <strong><center>
            <font color=\"#000000\">Nenhuma TSA Cadastrada.</font>
            </center></strong>
            </td>
            </tr>";
}else
{
    $cor= "#FFFFFF";
    while ($dado= mysql_fetch_array($consulta))
    {
        $n_monitoria = $dado["n_monitoria"];
        $dt_auditoria = $dado["data_hora_auditoria"];
        $pedido = $dado["pedido"];
        $q_revisoes = $dado["qtde de revisões"];
        $i_qualidade =  $dado["indice qualidade"];
        $operacao = $dado["operacao"];
        $parecer = $dado["parecer auditoria"];
        $acao = $dado["acao"];
        $erro = $dado["erro"];
        $desc_erro = $dado["descricao do erro"];
        $dt_correcao = $dado["data_correcao"];
        $desc_oferta = $dado["ofertas"];
        $analise_bko = $dado["analise bko"];    
        $manifestacao = $dado["manifestacao bko"];
        $ofensor = $dado["operador ofensor"];
        $op_correcao = $dado["us_correcao"];
        $correcao = $dado["necessario correcao"];
        $acao_correcao = $dado["area de correcao"];
        $area_correcao = $dado["acao de correcao"];
        $status_correcao =  $dado["status da correcao"];

     if($cor == "#CCCCCC")
     {
       	$cor= "#FFFFFF";
     }else{
        $cor= "#CCCCCC";
	 }
     
     echo " <tr bgcolor=\"$cor\">
    		<td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$n_monitoria</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$dt_auditoria</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$dt_correcao</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$pedido</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$q_revisoes</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$i_qualidade</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$operacao</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$parecer</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$acao</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$erro</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$desc_erro</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$desc_oferta</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$analise_bko</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$manifestacao</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$ofensor</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$op_correcao</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$correcao</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$area_correcao</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$acao_correcao</font></strong></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><strong><font color=\"#000000\">$status_correcao</font></strong></td>
    		</tr>
    		";
    }
}
?>

<body>
</body>
</html>