<?php   
@session_start(); 
?>
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
$sql_consulta="SELECT * FROM controle_pn_bko WHERE ($regional) and ($tramite) and ($turno) and data_inicial BETWEEN '$data_1' and '$data_2' ORDER BY data_inicial";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
$sql_consulta="SELECT * FROM controle_pn_bko WHERE ($regional) and ($tramite) and ($turno) and data_inicial BETWEEN '$data_1' and '$data_2' ORDER BY data_inicial";
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
   
   $export_file = "relatorios/Base_PN.xls";
	  
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
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Inicial</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Numero Pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Revisao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status Pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Nome Cliente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Ultima Atualizacao Status</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Codigo Adabas</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Cpf Cnpj Cliente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Cpf Cnpj Cliente Raiz</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Canal</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Nº Ordem</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Ordem Manual</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Pistolagem Leitura</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tmo</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Janela</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Aprovacao Pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Chamado</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Erro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Plano Acao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status Atlys</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status Spn</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Falando</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tratamento</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Obs Erro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Pn</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Status Tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Disc Status Tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Fila</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Login</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Id Tabelao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Nome2</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Turno</font></td>
                  <td id=\"t_tdrel\"><font color=\"#FFFFFF\">Data Tramite2</font></td>
			   </tr>
			   </table>
	           "; 
	


	
if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
                  $regional=$linha['regional'];
                  $data_inicial=$linha['data_inicial'];
                  $numero_pedido=$linha['numero_pedido'];
                  $revisao=$linha['revisao'];
                  $status_pedido=$linha['status_pedido'];
                  $nome_cliente=$linha['nome_cliente'];
                  $ultima_atualizacao_status=$linha['ultima_atualizacao_status'];
                  $codigo_adabas=$linha['codigo_adabas'];
                  $cpf_cnpj_cliente=$linha['cpf_cnpj_cliente'];
                  $cpf_cnpj_cliente_raiz=$linha['cpf_cnpj_cliente_raiz'];
                  $canal=$linha['canal'];
                  $nro_ordem=$linha['nro_ordem'];
                  $ordem_manual=$linha['ordem_manual'];
                  $pistolagem_leitura=$linha['pistolagem_leitura'];
                  $data_tramite=$linha['data_tramite'];
                  $tmo=$linha['tmo'];
                  $data_janela=$linha['data_janela'];
                  $aprovacao_pedido=$linha['aprovacao_pedido'];
                  $chamado=$linha['chamado'];
                  $erro=$linha['erro'];
                  $plano_acao=$linha['plano_acao'];
                  $status_atlys=$linha['status_atlys'];
                  $status_spn=$linha['status_spn'];
                  $falando=$linha['falando'];
                  $tratamento=$linha['tratamento'];
                  $obs_erro=$linha['obs_erro'];
                  $pn=$linha['pn'];
                  $status_tp=$linha['status_tp'];
                  $disc_status_tp=$linha['disc_status_tp'];
                  $fila=$linha['fila'];
                  $login=$linha['login'];
                  $id_tabelao=$linha['id_tabelao'];
                  $nome2=$linha['nome2'];
                  $tramite=$linha['tramite'];
                  $turno=$linha['turno'];
                  $data_tramite2=$linha['data_tramite2'];


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
echo "<table border=\"1\" bordercolor=\"#CCCCCC\" width=\"100%\">
               <tr>
			      <td id=\"t_tdrel\"><font color=\"#000000\">$regional</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_inicial</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$numero_pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$revisao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status_pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$nome_cliente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$ultima_atualizacao_status</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$codigo_adabas</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$cpf_cnpj_cliente</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$cpf_cnpj_cliente_raiz</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$canal</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$nro_ordem</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$ordem_manual</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$pistolagem_leitura</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tmo</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_janela</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$aprovacao_pedido</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$chamado</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$erro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$plano_acao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status_atlys</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status_spn</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$falando</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tratamento</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$obs_erro</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$pn</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$status_tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$disc_status_tp</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$fila</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$login</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$id_tabelao</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$nome2</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$tramite</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$turno</font></td>
                  <td id=\"t_tdrel\"><font color=\"#000000\">$data_tramite2</font></td></h5>
         		   </tr>	  	  
	           </table>
	           ";
	  

	  }
      }
	  
	 

	  
?>

<body>
</body>
</html>