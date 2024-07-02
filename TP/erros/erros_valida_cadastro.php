<?php   
@session_start();
include '../conexao.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php
	if($_SESSION["erros_bko"] == 0){  
    echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../logout.php');
		</script>
 		";
	}
	$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");
?>
 
<div id="principal">
<?php
	$id_filtro=			$_POST["id_filtro"];
	$pedido= 			$_POST["pedido"];
	$adabas= 			$_POST["adabas"];
	$criado_em= 		$_POST["criado_em"];
	$revisao=			$_POST["revisao"];
	$cliente=           $_POST["cliente"];
	$portabilidade= 	$_POST["portabilidade"];
	$status_do_pedido=	$_POST["status_do_pedido"];
	$regional=		 	$_POST["regional"];
	$tipo_de_servico=   $_POST["tipo_de_servico"];
	$ofensor=       	$_POST["ofensor"];
	$cnpj=       	    $_POST["cnpj"];
	$operador=       	$_POST["operador"];
	$linhas=            $_POST["linhas"];
	$motivo_erro=  	    $_POST["motivo"];	
	$comentario= 	    $_POST["comentario"];
	
$data_cadastro = date("Y-m-d");	
$data_cadastro_comentario = date('d/m/Y');	
//VARIAVEL COM A DATA NO FORMATO AMERICANO
				$data_americano = "$criado_em";

				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("/",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$criado_em2 = $data;

$login = $_SESSION["login"];
$nome1 = $_SESSION["nome"];
$turno = $_SESSION["turno"];
//$comentario = $data_cadastro_comentario." : ".trim($comentario)." "."-"." ".$nome1;
$variavel1oe = $comentario;
$variavel2oe=  $data_cadastro_comentario;
$variavel3oe = $nome1;
$comentario =$variavel2oe." "."-"." ".$variavel1oe." "."-"." ".$variavel3oe;



$raiz1=$cnpj[0].$cnpj[1].$cnpj[2].$cnpj[3].$cnpj[4].$cnpj[5].$cnpj[6].$cnpj[7];

if ($id_filtro == '1'){
		$tipo = 'Erro de serviço';
	}
if ($id_filtro == '2'){
		$tipo = 'OV';
	}
if ($id_filtro == '3'){
		$tipo = 'Linhas';
	}
if ($id_filtro == '4'){
		$tipo = 'Cliente conta';
	}
	
if ($portabilidade== 'Sim'){
	$portabilidade='Y';
	}else $portabilidade='N';

if ($tipo_de_servico=='Alta'){
	$alta = 'Y';
	$troca = 'N';
	$transferencia_titularidade = 'N';
	}

if($tipo_de_servico=='Troca'){
	$alta = 'N';
	$troca = 'Y';
	$transferencia_titularidade = 'N';
	}
if($tipo_de_servico == 'Transferência de titularidade'){	
	$alta = 'N';
	$troca = 'N';
	$transferencia_titularidade = 'Y';
}
$data_atual = date('Y/m/d');
//echo $status_do_pedido;
$query="INSERT INTO base_erros(
                   pedido,
				   comentario,
				   tipo,
				   portabilidade,
				   cliente,
				   status,
				   motivo_erro,
				   status_do_pedido,
				   revisao,
				   regional,
				   criado_em,
				   alta,
				   troca,
				   transferencia_titularidade,
				   ofensor,
				   adabas,
				   usuario,
				   fila,
				   nome2,
				   tramite,
				   data_tramite,
				   cnpj,
				   cnpj_raiz,
				   status_tp,
			       disc_status_tp,
				   operador,
				   linhas,
				   cadastro_manual
				    ) 
				   VALUES				   
				   ('$pedido',
				   '$comentario',
				   '$tipo',
				   '$portabilidade',
				   '$cliente',
				   'Pendente',
				   '$motivo_erro',
				   '$status_do_pedido',
				   '$revisao',
				   '$regional',
				   '$criado_em2',
				   '$alta',
				   '$troca',
				   '$transferencia_titularidade',
				   '$ofensor',
				   '$adabas',
                   'Aguardando Operador',
                   '1',
                   'Aguardando Operador',
                   'Aguardando',
                   '$data_atual',
                   '$cnpj',
				   '$raiz1',
				   '1',
                   'Aberto',
				   '$operador',
				   '$linhas',
				   'Sim'
				   )";
(!mysql_query($query,$conecta)); 


$sql_valida2 ="SELECT pedido,cnpj,cnpj_raiz from base_erros where cnpj = '$cnpj'";
			$acao_valida2 = mysql_query($sql_valida2) or die (mysql_error());	
								
				while($dado= mysql_fetch_array($acao_valida2))
				{
				$cnpj2 = $dado["cnpj_raiz"];
				
							
				//echo $cnpj2;
				
				$sql_atualiza="UPDATE base_erros SET vpe = 'sim' WHERE cnpj_raiz = '$cnpj2'";
                $acao_vpe = mysql_query($sql_atualiza) or die (mysql_error()); 
				
				}


	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('../../tp/home.php');
		</script>
 		";

?>
    
</div>
</body>
</html>