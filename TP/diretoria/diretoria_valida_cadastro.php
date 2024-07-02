<?php   
@session_start();
include '../conexao.php';
include '../funcoes.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php
if($_SESSION["nome"] == ''){  
    echo"
		<script type=\"text/javascript\">
		alert('Erro no perfil, favor logar novamente!');
		document.location.replace('../logout.php');
		</script>
 		";
	}
	$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");
  $calcula_data = date("d/m/Y");	
  $dt_dia = date("Y-m-d");
?>
 
<div id="principal">
<?php
	
	$pedido           =	$_POST["pedido"];
	$data_cadastro    =	$_POST["data_cadastro"];
	$hora_cadastro    = $_POST["hora_cadastro"];
	$ofensor          = $_POST["ofensor"];
	$comentario       = $_POST["comentario"];
	$operador         =	$_POST["operador"];
	$diretoria        =	$_POST["diretoria"];
	$motivo           =	$_POST["motivo"];
	$id_filtro        =	$_POST["id_filtro"];
	$remetente        =	$_POST["remetente"];
	$login            = $_SESSION["login"];
	$nome1            = $_SESSION["nome"];
	$turno            = $_SESSION["turno"];


$contagem = strlen($data_cadastro);
if ($contagem <> 10)
{
echo "<script>alert('Data inválida.'); javascript: history.go(-1); </script>\n";
}

$sql = "SELECT * FROM tipos_erros_diretoria where id_filtro = '$id_filtro' ";
$qr = mysql_query($sql) or die(mysql_error());
                       while($ln = mysql_fetch_assoc($qr)){
                       $id_motivo = $ln['motivo'];
                       }
$data = $data_cadastro;
$data_exp_v1 = explode ('/',$data);
$dia = $data_exp_v1[0];
		switch (date('w',mktime(0,0,0,$data_exp_v1[1],$dia,$data_exp_v1[2]))) {
				case 6:
				$teste = 'sabado';
				break;
				default:
				$teste = 'ok';
				break;
		}
							   
$data_modificada_dma = explode('/', $data_cadastro);
$data_cadastro = $data_modificada_dma[0].'/'.$data_modificada_dma[1].'/'.$data_modificada_dma[2];
$teste1 = calcula_data_sla($data_cadastro,$calcula_data);

if($teste == 'sabado'){
	$hora1 = diminui_hora($hora_cadastro ,'12:00');
	}else $hora1 = diminui_hora($hora_cadastro ,'18:00');
//echo '<BR> hora um =' . $hora1;
$hora_atual = date ('H:i');
$hora2 = diminui_hora('09:00',$hora_atual);
//echo $hora2 . '<br>';
if($hora2 < '00:01'){
	$teste = explode (':' , $hora2);
	$teste2 = $teste[1] * -1;
    $hora2 = '00:' . $teste2;
	}
//echo '<BR> hora um =' . $hora1;
$total_um = soma_hora($hora1,$hora2);
//echo '<BR> total um =' . $total_um;
$total = soma_hora($total_um,$teste1);
$data_modificada_dma = explode('/', $data_cadastro);
$data_cadastro1 = $data_modificada_dma[2].'-'.$data_modificada_dma[1].'-'.$data_modificada_dma[0];
//echo '<BR> total um =' . $total;
if ($data_cadastro == $calcula_data){
	$total = diminui_hora($hora_cadastro,$hora_atual);
}

$query="INSERT INTO base_diretoria(
                   pedido,
				   data_cadastro,
				   hora_cadastro,
				   ofensor,
				   comentario,
				   operador,
				   diretoria,
				   erro,
				   motivo_erro,
				   remetente,
				   tmt,
				   fila,
				   status_tp,
				   disc_status_tp,
				   usuario,
				   turno,
				   data_tramite,
				   tramite,
				   hora_tramite,
				   nome2
				    ) 
				   VALUES  (
				   '$pedido',
				   '$data_cadastro1',
				   '$hora_cadastro',
				   '$ofensor',
				   '$comentario',
				   '$operador',
				   '$diretoria',
				   '$id_motivo',
				   '$motivo',
				   '$remetente',
				   '$total',
				   '3',
				   '3',
				   'Tratado',
				   '$login',
				   '$turno',
				   '$dt_dia',
				   'Tratado',
				   '$hora_atual',
				   '$nome1'				   
				   )";
(!mysql_query($query,$conecta)); 

	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('diretoria.php');
		</script>
 		";
		
?>    
</div>
</body>
</html>