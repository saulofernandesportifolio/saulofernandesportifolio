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
	 if($_SESSION["nome"] == '' or $_SESSION["turno"] ==''){  
    echo"
		<script type=\"text/javascript\">
		alert('Erro no perfil, favor logar novamente!');
		document.location.replace('../logout.php');
		</script>
 		";
	}
setcookie ("atualizada", "atualizar");

?>
 
<div id="principal">
<?php
//Prepara variavel
	$_POST["parecer_novo"] = preg_replace ("/[^a-zA-Z0-9_.]/", " ",strtr($_POST["parecer_novo"],  "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇNº# ",
  "aaaaeeiooouucAAAAEEIOOOUUCN  "));

	$analista_da_atividade          = $_SESSION["nome"];
	$qtd_linhas           			= $_POST["qtd_linhas"];
	$tipo_servico          			= $_POST["tipo_servico"];
	$id_filtro             			= $_POST["id_filtro"];
	$motivo                			= $_POST["motivo"];
	$parecer_antigo        			= $_POST["parecer_antigo"];
	$parecer_novo        			= $_POST["parecer_novo"];
	$codigo_adabas         			= $_POST["codigo_adabas"];
	$operador              			= $_POST["operador"];
	$prioridade           			= $_POST["prioridade"];
	$ofensor               			= $_POST["ofensor"];
	$analise               			= $_POST["analise"];
	//$analista_da_atividade 		= $_POST["analista_da_atividade"];
	$data_da_analise_reversao 		= $_POST["data_da_analise_reversao"];
	$data_da_analise_tramitacao		= $_POST["data_da_analise_tramitacao"];
	$status_analise               	= $_POST["status_analise"];
	$id                    			= $_POST["id"];

$login = $_SESSION["login"];
$nome1 = $_SESSION["nome"];
$turno = $_SESSION["turno"];

if ($prioridade == ''){
					echo"
			<script type=\"text/javascript\">
			alert('Informe o campo prioridade!');
			javascript: history.go(-1);
			</script>
			";
		}else $seguranca = "ok";
	
if ($prioridade == 'sim'){
		if ($qtd_linhas_prioridade=="" or $solicitado_por_prioridade == ""){
			echo"
			<script type=\"text/javascript\">
			alert('Informar os campos de prioridade!');
			javascript: history.go(-1);
			</script>
			";
		}else $seguranca = "ok";
	}
if ($prioridade == 'nao'){
		if ($qtd_linhas_prioridade!="" or $solicitado_por_prioridade != ""){
			echo"
			<script type=\"text/javascript\">
			alert('Não preencher os campos de prioridade');
			javascript: history.go(-1);
			</script>
			";
		}else $seguranca = "ok";
	}
	
$data_cadastro_comentario = date('d/m/Y');		
$pula = "\n";
$parecer = $parecer_antigo.$pula.$data_cadastro_comentario." : ".$parecer_novo." "."-"." ".$nome1;
	
/////////////////////////////////////////////////////////////////
$partes_da_data = explode(" ",$data_da_analise_reversao);
$data="$partes_da_data[0]";
$datatransf = explode("/",$data);
$data_reversao = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
$data_da_analise_reversao = $data_reversao;
/////////////////////////////////////////////////////////////////
$partes_da_data = explode(" ",$data_da_analise_tramitacao);
$data="$partes_da_data[0]";
$datatransf = explode("/",$data);
$data_reversao = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
$data_da_analise_tramitacao = $data_reversao;

$data_tramite = date("Y-m-d");
$tipo = null;

if($status_analise == "Tratando"){
	$fila = "2";
	$status_tp = "2";
	$disc_status_tp = "Tratando";
	}else $fila ="3" and $status_tp = "3" and $disc_status_tp='Tratado';

if($id_filtro == 1 or $id_filtro == 2 or $id_filtro == 3 or $id_filtro == 4 or $id_filtro == 5 or $id_filtro == 6 or $id_filtro == 7 or $id_filtro == 8 or $id_filtro == 9 or $id_filtro == 10 or $id_filtro == 11 or $id_filtro == 12 or $id_filtro == 13){	
	//criar array para a data
	$sql_reverind = "select tipo from filtro_reversao_indireto_bko where id_filtro=$id_filtro";
		         $result = mysql_query($sql_reverind,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $tipo                        = $dado["tipo"];
				 }
}else $tipo = $id_filtro;

		$query="UPDATE ilha_reversao_indireto_bko SET
						   codigo_adabas          = '$codigo_adabas',
						   tipo_servico           = '$tipo_servico',
						   qtd_linhas             = '$qtd_linhas',
						   descricao_do_erro      = '$motivo',
						   parecer                = '$parecer',
						   operador               = '$operador',
						   ofensor                = '$ofensor', 
						   analise                = '$analise',
						   analista_da_atividade  = '$nome1',
						   nome2                  = '$nome1',
						   data_analise           = '$data_da_analise_tramitacao',
						   data_analise_reversao  = '$data_da_analise_reversao',
						   data_tramite           = '$data_tramite',
						   tramite	              = '$status_analise',
						   tipo_erro              = '$tipo',
						   prioridade             = '$prioridade',
						   qtd_linhas_prioridade  = '$qtd_linhas_prioridade',
						   solicitado_por_prioridade  = '$solicitado_por_prioridade',
						   status_tp              = '$status_tp',
						   disc_status_tp         = '$disc_status_tp',
						   usuario                = '$login',
						   turno                  = '$turno',
						   fila 				  = '$fila'	
						   WHERE id_reversaoind   = $id
						   ";
		(!mysql_query($query,$conecta)); 




	//echo $query;
	
	echo"
	<script type=\"text/javascript\">
	alert('Cadastro alterado!');
	javascript: history.go(-2);
	</script>
 	";

?>
    
</div>
</body>
</html>