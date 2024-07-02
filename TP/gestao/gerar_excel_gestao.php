<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
</head>
<?php

   include "../conexao.php";
   
$regional = $_POST['regional']; 
$tramite = $_POST["tramite"];
$turno=$_POST["turno2"];
$data_1=$_POST["data_1"];   
  
$data_1 = ($data_1<> '')?(substr($data_1,6,4)."/".  substr($data_1,3,2)."/".substr($data_1,0,2)):"";
$data_2 = ($data_2 <> '')?(substr($data_2,6,4)."/".substr($data_2,3,2)."/".substr($data_2,0,2)):date("Y/m/d");

if($data_1 <> ''){
 $sql_consulta="SELECT * FROM base_gestao WHERE ($regional) and ($tramite) and ($turno) and termino_efetivo
 BETWEEN '$data_1' and '$data_2' ORDER BY termino_efetivo";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
 $sql_consulta="SELECT * FROM base_gestao WHERE ($regional) and ($tramite) and ($turno) and termino_efetivo
 < '$data_2' ORDER BY termino_efetivo";
$resultado = mysql_query($sql_consulta) or die (mysql_error());
$num = mysql_num_rows($resultado);
}
if ($num == 0){
   // die($sql_consulta);
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
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Pedido</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Revisao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Canal</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Codigo_Adabas</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Cliente</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status_do_Cliente</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Termino_Efetivo</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Acao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Comentario</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Email_do_Cliente</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data_Tramite</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Fila</font></td>
               <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status_Tp</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Disc_Status_Tp</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tramite</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Usuario</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Nome2</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">GC</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Senha</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Login_Gestao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Turno</font></td>
			    </tr>
			
			   </table>
	           "; 
	
if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
                     $regional=$linha['regional'];
			         $pedido=$linha['pedido'];
                     $revisao=$linha['revisao'];
                     $canal=$linha['canal'];
                     $codigo_adabas=$linha['codigo_adabas'];
                     $cliente=$linha['cliente'];
                     $status_do_cliente=$linha['status_do_cliente'];
                     $termino_efetivo=$linha['termino_efetivo'];
                     $acao=$linha['acao'];
                     $comentario=$linha['comentario'];
                     $status=$linha['status'];
                     $email_do_cliente=$linha['email_do_cliente'];
                     $data_tramite=$linha['data_tramite'];
                     $fila=$linha['fila'];
                     $status_tp=$linha['status_tp'];
                     $disc_status_tp=$linha['disc_status_tp'];
                     $tramite=$linha['tramite'];
                     $usuario=$linha['usuario'];
                     $nome2=$linha['nome2'];
                     $gc=$linha['gc'];
                     $senha=$linha['senha'];
                     $login_gestao=$linha['login_gestao'];
                     $turno=$linha['turno'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
               <tr>
			   <td id=\"t_tdrel\"><font color=\"#000000\" cont'>$regional</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$pedido</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$revisao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$canal</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$codigo_adabas</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$cliente</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$status_do_cliente</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$termino_efetivo</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$acao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$comentario</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$status</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$email_do_cliente</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$data_tramite</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$fila</font></td>
               <td id=\"t_tdrel\"><font color=\"#000000\">$status_tp</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$disc_status_tp</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$tramite</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$usuario</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$nome2</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$gc</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$senha</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$login_gestao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$turno</font></td></h5>
			   </tr>	  	  
	           </table>
	           ";

	  }
      }
	  
?>

<body>
</body>
</html>
