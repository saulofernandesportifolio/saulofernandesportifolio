<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>
<?php

   include "../bd.php";
   

$sql_consulta="SELECT * FROM tbl_chamados ORDER BY n_chamado";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;

if ($num == '0'){
	
	

				echo"
			<script type=\"text/javascript\">
			alert('Não consta pedidos com estes critérios');
			javascript: history.go(-1);
			
			</script>
			";
	die;
}




   
   $export_file = "Base_Chamados.xls";
	  
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
 ?>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

   echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
	          <tr bgcolor=\"#000033\">
			  <h5><td id=\"t_tdrel\"><font color=\"#FFFFFF\">n_chamado</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">solicitacao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">sistema</font></td>
				  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">tipo</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">descricao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">l_input</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">login</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">dt_solic</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">dt_conclusao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">dt_devolucao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">dt_finalizacao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">status</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">prioridade</font></td>
                  </tr>
			   </table>
	           "; 	


	
if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
                  $n_chamado=$linha['n_chamado'];
                  $solicitacao=$linha['solicitacao'];
                  $tipo=$linha['tipo'];
                  $sistema=$linha['sistema'];
                  $descricao=$linha['descricao'];
                  $l_input=$linha['l_input'];
                  $login=$linha['login'];
                  $dt_solic=$linha['dt_solic'];
                  $dt_conclusao=$linha['dt_conclusao'];
                  $dt_devolucao=$linha['dt_devolucao'];
                  $dt_finalizacao=$linha['dt_finalizacao'];
                  $status=$linha['status'];
                  $prioridade=$linha['prioridade'];
                ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
               <tr>
			      <td id=\"t_tdrel\"><font color=\"#000000\">$n_chamado</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$solicitacao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tipo</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$sistema</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$descricao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$l_input</font></td>
				  <td id=\"t_tdrel\"><font color=\"#000000\">$login</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$dt_solic</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$dt_conclusao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$dt_devolucao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$dt_finalizacao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$prioridade</font></td>
				  </h5>
         		  </tr>	  	  
	           </table>
	           ";

	  

	  }
      }
	  
	 

	  
?>

<body>
</body>
</html>