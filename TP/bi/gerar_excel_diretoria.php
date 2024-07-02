<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
</head>
<?php

   include "../conexao.php";
   
$diretoria = $_POST['diretoria']; 
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
 $sql_consulta="SELECT * FROM base_diretoria WHERE ($diretoria) and ($tramite) and ($turno) and data_tramite
 BETWEEN '$data_1' and '$data_2' ORDER BY data_cadastro";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
 $sql_consulta="SELECT * FROM base_gestao WHERE ($diretoria) and ($tramite) and ($turno) and data_tramite
 BETWEEN '$data_1' and '$data_2' ORDER BY data_cadastro";
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
   
   $export_file = "relatorios/Base_DIRETORIA.xls";
	  
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
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Hora Cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Ofensor</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Comentario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Operador</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Diretoria</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Erro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Motivo Erro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Remetente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tmt</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Fila</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status Tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Disc Status Tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Usuario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Turno</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Nome2</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Hora Tramite</font></td>
			    </tr>
			
			   </table>
	           "; 
	






  
	
if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
                  $pedido=$linha['pedido'];
                  $data_cadastro=$linha['data_cadastro'];
                  $hora_cadastro=$linha['hora_cadastro'];
                  $ofensor=$linha['ofensor'];
                  $comentario=$linha['comentario'];
                  $operador=$linha['operador'];
                  $diretoria=$linha['diretoria'];
                  $erro=$linha['erro'];
                  $motivo_erro=$linha['motivo_erro'];
                  $remetente=$linha['remetente'];
                  $tmt=$linha['tmt'];
                  $fila=$linha['fila'];
                  $status_tp=$linha['status_tp'];
                  $disc_status_tp=$linha['disc_status_tp'];
                  $usuario=$linha['usuario'];
                  $turno=$linha['turno'];
                  $data_tramite=$linha['data_tramite'];
                  $tramite=$linha['tramite'];
                  $nome2=$linha['nome2'];
                  $hora_tramite=$linha['hora_tramite'];

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
               <tr>
			      <td id=\"t_tdrel\"><font color=\"#000000\">$pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$hora_cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$ofensor</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$comentario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$operador</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$diretoria</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$erro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$motivo_erro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$remetente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tmt</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$fila</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status_tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$disc_status_tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$usuario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$turno</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$nome2</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$hora_tramite</font></td></h5>
			   </tr>	  	  
	           </table>
	           ";
	  

	  }
      }
	  
	 

	  
?>

<body>
</body>
</html>
