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
$sql_consulta="SELECT * FROM base_erros WHERE ($regional) and ($tramite) and ($turno) and data_tramite BETWEEN '$data_1' and '$data_2' ORDER BY criado_em";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
$sql_consulta="SELECT * FROM base_erros WHERE ($regional) and ($tramite) and ($turno) and data_tramite BETWEEN '$data_1' and '$data_2' ORDER BY crido_em";
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
   
   $export_file = "relatorios/Base_ERROS.xls";
	  
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
			  <h5><td id=\"t_tdrel\"><font color=\"#FFFFFF\">Pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Comentario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tipo</font></td>
				  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tipo_Vivocorp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Motivo Erro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Portabilidade</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Cliente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status Do Pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Revisao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Regional</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Criado_em</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Alta</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Troca</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Transferencia Titularidade</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Correcao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Ofensor</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Adabas</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Usuario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Id Tabelao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Fila</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Nome2</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Turno</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Cnpj</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status Tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Disc Status Tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Vpe</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Cnpj Raiz</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Operador</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Linhas</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Cadastro Manual</font></td>
			   </tr>
			   </table>
	           "; 
	


	
if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
                  $pedido=$linha['pedido'];
                  $comentario=$linha['comentario'];
                  $tipo=$linha['tipo'];
                  $motivo_erro=$linha['motivo_erro'];
                  $portabilidade=$linha['portabilidade'];
                  $cliente=$linha['cliente'];
                  $status=$linha['status'];
                  $status_do_pedido=$linha['status_do_pedido'];
                  $revisao=$linha['revisao'];
                  $regional=$linha['regional'];
                  $criado_em=$linha['criado_em'];
                  $alta=$linha['alta'];
                  $troca=$linha['troca'];
                  $transferencia_titularidade=$linha['transferencia_titularidade'];
                  $data_correcao=$linha['data_correcao'];
                  $ofensor=$linha['ofensor'];
                  $adabas=$linha['adabas'];
                  $usuario=$linha['usuario'];
                  $id_tabelao=$linha['id_tabelao'];
                  $fila=$linha['fila'];
                  $nome2=$linha['nome2'];
                  $tramite=$linha['tramite'];
                  $data_tramite=$linha['data_tramite'];
                  $turno=$linha['turno'];
                  $cnpj=$linha['cnpj'];
                  $status_tp=$linha['status_tp'];
                  $disc_status_tp=$linha['disc_status_tp'];
                  $vpe=$linha['vpe'];
                  $cnpj_raiz=$linha['cnpj_raiz'];
                  $operador=$linha['operador'];
                  $linhas=$linha['linhas'];
                  $cadastro_manual=$linha['cadastro_manual'];
                  $tipo_vivocorp=$linha['tipo_vivocorp'];


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
               <tr>
			      <td id=\"t_tdrel\"><font color=\"#000000\">$pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$comentario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tipo</font></td>
				  <td id=\"t_tdrel\"><font color=\"#000000\">$tipo_vivocorp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$motivo_erro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$portabilidade</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$cliente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status_do_pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$revisao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$regional</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$criado_em</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$alta</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$troca</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$transferencia_titularidade</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_correcao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$ofensor</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$adabas</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$usuario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$id_tabelao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$fila</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$nome2</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$turno</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$cnpj</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status_tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$disc_status_tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$vpe</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$cnpj_raiz</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$operador</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$linhas</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$cadastro_manual</font></td></h5>
				  </tr>	  	  
	           </table>
	           ";
	  

	  }
      }
	  
	 

	  
?>

<body>
</body>
</html>