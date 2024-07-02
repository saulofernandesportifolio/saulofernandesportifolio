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
   

$data_1=$_POST["data_1"];   
$data_2=$_POST["data_2"];    
$planilha=$_POST["planilha"];

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
$sql_consulta="SELECT * FROM $planilha WHERE data_cadastro BETWEEN '$data_1' and '$data_2' ORDER BY data_cadastro";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
$sql_consulta="SELECT * FROM $planilha WHERE data_cadastro BETWEEN '$data_1' and '$data_2' ORDER BY data_cadastro";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}
//echo $sql_consulta;
if ($num == '0'){
	
	

				echo"
			<script type=\"text/javascript\">
			alert('Não consta pedidos com estes critérios');
			javascript: history.go(-1);
			
			</script>
			";
	die;
}

   $export_file = "relatorios/Base_treinamento.xls";
	  
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
   

if ($planilha == 'controle_de_questionamentos'){

  echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
	          <tr bgcolor=\"#000033\">
			  <h5><td id=\"t_tdrel\"><font color=\"#FFFFFF\">ID</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Comentario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Destinatario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Orientador</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data de Cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Hora de cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data de conclusão</font></td>
			   </tr>
			   </table>
	           "; 
	


	
if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
                  $id=$linha['id'];
                  $comentario=$linha['comentario'];
                  $destinatario=$linha['destinatario'];
                  $status=$linha['status'];
                  $orientador=$linha['orientador'];
                  $data_cadastro=$linha['data_cadastro'];
                  $hora_cadastro=$linha['hora_cadastro'];
                  $data_conclusao=$linha['data_conclusao'];
                

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
               <tr>
			      <td id=\"t_tdrel\"><font color=\"#000000\">$id</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$comentario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$destinatario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$orientador</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$hora_cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_conclusao</font></td>
         		   </tr>	  	  
	           </table>
	           ";
	  

	  }
      }
}
	  
if ($planilha == 'plano_de_acao'){

  echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
	          <tr bgcolor=\"#000033\">
			  <h5><td id=\"t_tdrel\"><font color=\"#FFFFFF\">ID</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Atividade</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data de Cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Comentario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Operador</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Parecer</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Reincidente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Orientador</font></td>
				  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Hora do Cadastro</font></td>
				  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Ilha/BKO</font></td>
			   </tr>
			   </table>
	           "; 
	


	
if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
                  $id=$linha['id'];
                  $atividade=$linha['atividade'];
                  $data_cadastro=$linha['data_cadastro'];
                  $comentario=$linha['comentario'];
                  $operador=$linha['operador'];
                  $parecer=$linha['parecer'];
                  $reincidente=$linha['reincidente'];
                  $orientador=$linha['orientador'];
				  $hora_cadastro=$linha['hora_cadastro'];
                  $ilha_bko=$linha['ilha_bko'];
                

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
               <tr>
			      <td id=\"t_tdrel\"><font color=\"#000000\">$id</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$atividade</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$comentario</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$operador</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$parecer</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$reincidente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$orientador</font></td>
				  <td id=\"t_tdrel\"><font color=\"#000000\">$hora_cadastro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$ilha_bko</font></td>
         		   </tr>	  	  
	           </table>
	           ";
	  

	  }
      }
}	  
	 

	  
?>

<body>
</body>
</html>