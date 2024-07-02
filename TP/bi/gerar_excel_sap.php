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
   
$regional = $_POST['regional']; 
$tramite = $_POST["tramite"];
$turno=$_POST["turno2"];
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
$sql_consulta="SELECT * FROM diario_sap_bko WHERE ($regional) and ($tramite) and ($turno) and data_tramite BETWEEN '$data_1' and '$data_2' ORDER BY data_cadastro";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
$sql_consulta="SELECT * FROM diario_sap_bko WHERE ($regional) and ($tramite) and ($turno) and data_tramite BETWEEN '$data_1' and '$data_2' ORDER BY data_cadastro";
$sql=$sql_consulta; 
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
   
   $export_file = "relatorios/Base_SAP.xls";
	  
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
   


  echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
	          <tr bgcolor=\"#000033\">
			  <h5><td id=\"t_tdrel\"><font color=\"#FFFFFF\">Regional</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Adabas</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Ov</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Nova Ov</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tipo Ov</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Qtde Linhas Pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Qtde Linhas Ov</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Do Desbloqueio</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Motivo</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Solicitado_por</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Ofensor</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Operador</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Material Antigo</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Material Novo</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tratado Por</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status Tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Disc Status Tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Cliente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tipo De Solicitacao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Comentario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Id Tabelao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Fila</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Login</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Nome2</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Turno</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Cadastro Manual</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Motivo Pendente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Enviado Para</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Acao OV</font></td>
			   </tr>
			   </table>
	           "; 
	


	
if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
                  $regional=$linha['regional'];
                  $adabas=$linha['adabas'];
                  $pedido=$linha['pedido'];
                  $ov=$linha['ov'];
                  $nova_ov=$linha['nova_ov'];
                  $tipo_ov=$linha['tipo_ov'];
                  $qtde_linhas_pedido=$linha['qtde_linhas_pedido'];
                  $qtde_linhas_ov=$linha['qtde_linhas_ov'];
                  $data_do_desbloqueio=$linha['data_do_desbloqueio'];
                  $motivo=$linha['motivo'];
                  $solicitado_por=$linha['solicitado_por'];
                  $ofensor=$linha['ofensor'];
                  $operador=$linha['operador'];
                  $material_antigo=$linha['material_antigo'];
                  $material_novo=$linha['material_novo'];
                  $tratado_por=$linha['tratado_por'];
                  $status_tp=$linha['status_tp'];
                  $disc_status_tp=$linha['disc_status_tp'];
                  $cliente=$linha['cliente'];
                  $tipo_de_solicitacao=$linha['tipo_de_solicitacao'];
                  $data_cadastro=$linha['data_cadastro'];
                  $comentario=$linha['comentario'];
                  $id_tabelao=$linha['id_tabelao'];
                  $fila=$linha['fila'];
                  $login=$linha['login'];
                  $nome2=$linha['nome2'];
                  $tramite=$linha['tramite'];
                  $data_tramite=$linha['data_tramite'];
                  $turno=$linha['turno'];
                  $cadastro_manual=$linha['cadastro_manual'];
                  $motivo_pendente=$linha['motivo_pendente'];
                  $enviado_para=$linha['enviado_para'];
                  $acao_ov=$linha['acao_ov'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
               <tr>
			      <td id=\"t_tdrel\"><font color=\"#000000\">$regional</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$adabas</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$ov</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$nova_ov</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tipo_ov</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$qtde_linhas_pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$qtde_linhas_ov</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_do_desbloqueio</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$motivo</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$solicitado_por</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$ofensor</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$operador</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$material_antigo</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$material_novo</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tratado_por</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status_tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$disc_status_tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$cliente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tipo_de_solicitacao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$comentario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$id_tabelao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$fila</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$login</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$nome2</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$turno</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$cadastro_manual</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$motivo_pendente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$enviado_para</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$acao_ov</font></td></h5>
				  </tr>	  	  
	           </table>
	           ";
	  

	  }
      }
	  
	 

	  
?>

<body>
</body>
</html>