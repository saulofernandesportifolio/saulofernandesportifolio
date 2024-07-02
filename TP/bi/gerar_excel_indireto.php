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
$sql_consulta="SELECT * FROM ilha_reversao_indireto_bko WHERE ($regional) and ($tramite) and ($turno) and data_tramite BETWEEN '$data_1' and '$data_2' ORDER BY criado_em";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
$sql_consulta="SELECT * FROM ilha_reversao_indireto_bko WHERE ($regional) and ($tramite) and ($turno) and data_tramite BETWEEN '$data_1' and '$data_2' ORDER BY criado_em";
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
   
   $export_file = "relatorios/Base_INDIRETO.xls";
	  
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
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Criado_em</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Codigo_Adabas</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Pedido</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tipo_Servico</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Qtd_Linhas</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Cliente</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Revisao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Comentarios</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data_Analise</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tipo_Erro</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Descricao_do_Erro</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Parecer</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Operador</font></td>
               <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Ofensor</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Analise</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Analista_da_Atividade</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data_Analise_Reversao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Prioridade</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Qtd_Linhas_Prioridade</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Solicitado_Por_Prioridade</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status_Correcao_Aprovacao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status_Tp</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Disc_Status_Tp</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Fila</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Nome2</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tramite</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data_Tramite</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Usuario</font></td>
			   <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Turno</font></td>
			   </tr>
			
			   </table>
	           "; 
	


	
if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
                   $regional=$linha['regional'];
                   $criado_em=$linha['criado_em'];
                   $codigo_adabas=$linha['codigo_adabas'];
                   $pedido=$linha['pedido'];
                   $tipo_servico=$linha['tipo_servico'];
                   $qtd_linhas=$linha['qtd_linhas'];
                   $cliente=$linha['cliente'];
                   $revisao=$linha['revisao'];
                   $comentarios=$linha['comentarios'];
                   $data_analise=$linha['data_analise'];
                   $tipo_erro=$linha['tipo_erro'];
                   $descricao_do_erro=$linha['descricao_do_erro'];
                   $parecer=$linha['parecer'];
                   $operador=$linha['operador'];
                   $ofensor=$linha['ofensor'];
                   $analise=$linha['analise'];
                   $analista_da_atividade=$linha['analista_da_atividade'];
                   $data_analise_reversao=$linha['data_analise_reversao'];
                   $prioridade=$linha['prioridade'];
                   $qtd_linhas_prioridade=$linha['qtd_linhas_prioridade'];
                   $solicitacao_por_prioridade=$linha['solicitado_por_prioridade'];
                   $status_correcao_aprovacao=$linha['status_correcao_aprovacao'];
                   $status_tp=$linha['status_tp'];
                   $disc_status_tp=$linha['disc_status_tp'];
                   $fila=$linha['fila'];
                   $nome2=$linha['nome2'];
                   $tramite=$linha['tramite'];
                   $data_tramite=$linha['data_tramite'];
                   $usuario=$linha['usuario'];
                   $turno=$linha['turno'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
               <tr>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$regional</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$criado_em</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$codigo_adabas</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$pedido</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$tipo_servico</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$qtd_linhas</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$cliente</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$revisao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$comentarios</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$data_analise</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$tipo_erro</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$descricao_do_erro</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$parecer</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$operador</font></td>
               <td id=\"t_tdrel\"><font color=\"#000000\">$ofensor</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$analise</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$analista_da_atividade</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$data_analise_reversao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$prioridade</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$qtd_linhas_prioridade</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$solicitacao_por_prioridade</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$status_correcao_aprovacao</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$status_tp</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$disc_status_tp</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$fila</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$nome2</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$tramite</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$data_tramite</font></td>
			   <td id=\"t_tdrel\"><font color=\"#000000\">$usuario</font></td>
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