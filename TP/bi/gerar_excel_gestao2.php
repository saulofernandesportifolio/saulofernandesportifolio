<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>
<?php

   include "../conexao.php";
   
$regional = $_POST['regional']; 
$tramite = $_POST["tramite"];
$turno=$_POST["turno2"];
echo $data_1=$_POST["data_1"];     
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
 $sql_consulta="SELECT pedido FROM base_gestao WHERE ($regional) and ($tramite) and ($turno) and termino_efetivo
 BETWEEN '$data_1' and '$data_2' ORDER BY termino_efetivo";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
 $sql_consulta="SELECT * FROM base_gestao WHERE ($regional) and ($tramite) and ($turno) and termino_efetivo
 BETWEEN '$data_1' and '$data_2' ORDER BY termino_efetivo";
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

   $export_file = "relatorios/Base_GESTAO.xls";
	  
	ob_end_clean();
	ini_set('zlib.output_compression','Off');
   
	header('Pragma: public');
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");				  // Data no passado
	header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');	 // HTTP/1.1
	header('Cache-Control: pre-check=0, post-check=0, max-age=0');	// HTTP/1.1
	header ("Pragma: no-cache");
	header("Expires: 0");
	header('Content-Transfer-Encoding: none');
	header('Content-Type: application/vnd.ms-excel;');				 // IE & Opera
	header("Content-type: application/x-msexcel");					// Outros
	header('Content-Disposition: attachment; filename="'.basename($export_file).'"');
   


  echo "<table border=\"1\">
	           <tr>
			   <td>regional<td>
			   <td>Pedido</td>
			   </tr>
			   </table>
	           "; 
	






  
	
if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
                     $regional=$linha['regional'];
			         $pedido=$linha['pedido'];
                   /*$linha['revisao'],
                   $linha['canal'],
                   $linha['codigo_adabas'],
                   $linha['cliente'],
                   $linha['status_do_cliente'],
                   $linha['termino_efetivo'],
                   $linha['acao'],
                   $linha['comentario'],
                   $linha['status'],
                   $linha['email_do_cliente'],
                   $linha['data_tramite'],
                   $linha['fila'],
                   $linha['status_tp'],
                   $linha['disc_status_tp'],
                   $linha['tramite'],
                   $linha['usuario'],
                   $linha['nome2'],
                   $linha['gc'],
                   $linha['senha'],
                   $linha['login_gestao'],
                   $linha['turno']*/

	  	  echo "<table border=\"1\">
	            <tr>
			   <td>$pedido</td>
			   </tr>	  	  
	           </table>
	           ";
	  

	  }
      }
	  
	 

	  
?>

<body>
</body>
</html>
