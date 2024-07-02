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
	if($_SESSION["operador_direto"] == 0){  
    echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../logout.php');
		</script>
 		";
	}
setcookie ("atualizada", "atualizar");
?>
<div id="principal">
<?php
	$analista_atividade             = $_SESSION["nome"];
    $login                          = $_SESSION["login"];
	$id_filtro             			= $_POST["id_filtro"];
	$motivo                			= $_POST["motivo"];
	$parecer_antigo        			= $_POST["parecer_antigo"];
	$parecer_novo        			= $_POST["parecer_novo"];
	$codigo_adabas         			= $_POST["codigo_adabas"];
	$operador              			= $_POST["operador"];
	$ofensor               			= $_POST["ofensor"];
	$imputado_por_primeira 			= $_POST["imputado_por_primeira"];
	$imputado_por_ultima   			= $_POST["imputado_por_ultima"];
	$analise               			= $_POST["analise"];
	//$analista_atividade 			= $_POST["analista_da_atividade"];
	$data_analise        		    = $_POST["data_da_analise"];
	$data_analise_tramitacao		= $_POST["data_analise_tramitacao"];
	$status_analise               	= $_POST["status_analise"];
	$id                    			= $_POST["id"];
    $prioridade                    	= $_POST["prioridade"];
	$qtd_linhas_prioridade         	= $_POST["qtd_linhas_prioridade"];
	$solicitado_por_prioridade		= $_POST["solicitado_por_prioridade"];
	$ofensor_reincidente   			= $_POST["ofensor_reincidente"];
	$parecer_prioridade    			= $_POST["parecer_prioridade"];

/*
varifica se foi elesecionado prioridade
*/

if($parecer_novo =="")
{
	
}else
{
  $beta2=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","-"
   );
   
   
   $alfa2=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`","–"
   );
	 
    $parecer_novo=str_replace($alfa2,$beta2,$parecer_novo);
	$parecer_novo=strtoupper($parecer_novo);
	  }




if ($ofensor == 'ILHA INPUT' or $ofensor == 'GC'){
	$Status_solicitacao = 'Procedente';	
	}else $Status_solicitacao = 'Improcedente';	


if ($prioridade == ''){
					echo"
			<script type=\"text/javascript\">
			alert('Informe o campo prioridade!');
			javascript: history.go(-1);
			</script>
			";
		}else $seguranca = "ok";
	



if ($prioridade == 'sim'){
		if ($qtd_linhas_prioridade=="" or $solicitado_por_prioridade == "" or $ofensor_reincidente == "" or $parecer_prioridade==""){
			echo"
			<script type=\"text/javascript\">
			alert('Informar os campos de prioridade!');
			javascript: history.go(-1);
			</script>
			";
			$pri = "nao";
		}else $seguranca = "ok" and $pri ="";
	}
if ($prioridade == 'nao'){
		if ($qtd_linhas_prioridade!="" or $solicitado_por_prioridade != "" or $ofensor_reincidente != ""){
			echo"
			<script type=\"text/javascript\">
			alert('Não preencher os campos de prioridade');
			javascript: history.go(-1);
			
			</script>
			";
		}else $seguranca = "ok" and $pri ="";
	}
//$login = $_SESSION["login"];
$nome1 = $_SESSION["nome"];
$turno = $_SESSION["turno"];
$data_cadastro_comentario = date('d/m/Y');		
$pula = "\n";
$parecer = $parecer_antigo.$pula.$data_cadastro_comentario." : ".$parecer_novo." "."-"." ".$nome1;
/////////////////////////////////////////////////////////////////
$partes_da_data = explode(" ",$data_analise);
$data="$partes_da_data[0]";
$datatransf = explode("/",$data);
$data_reversao = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
$data_analise = $data_reversao;
/////////////////////////////////////////////////////////////////

$partes_da_data = explode(" ",$data_analise_tramitacao);
$data="$partes_da_data[0]";
$datatransf = explode("/",$data);
$data_reversao = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
$data_analise_tramitacao = $data_reversao;

$data_tramite = date("Y-m-d");
$tipo = null;

if($status_analise == "Tratando"){
	$fila = "2";
	$status_tp = "2";
	$disc_status_tp = "Tratando";
	}else $fila ="3" and $status_tp = "3" and $disc_status_tp='Tratado';

if ($pri=="nao"){
	
	$prioridade = "";
	$parecer_prioridade = "";
	}

if($id_filtro == 1 or $id_filtro == 2 or $id_filtro == 3 or $id_filtro == 4 or $id_filtro == 5 or $id_filtro == 6 or $id_filtro == 7 or $id_filtro == 8 or $id_filtro == 9 or $id_filtro == 10 or $id_filtro == 11 or $id_filtro == 12 or $id_filtro == 13){	
	//criar array para a data
	$sql_reverind = "select tipo from filtro_reversao_indireto_bko where id_filtro=$id_filtro";
		         $result = mysql_query($sql_reverind,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $tipo                        = $dado["tipo"];
				 }
				 	}else $tipo = $id_filtro;
					
					
if ($seguranca == 'ok'){
		$query="UPDATE ilha_reversao_direto_bko SET
						   codigo_adabas          = '$codigo_adabas',
						   descricao_erro         = '$motivo',
						   parecer                = '$parecer',
						   operador_analista      = '$operador',
						   ofensor                = '$ofensor',
						   imputado_por_primeira  = '$imputado_por_primeira',
						   imputado_por_ultima	  = '$imputado_por_ultima', 
						   analise                = '$analise',
						   analista_da_atividade  = '$analista_atividade',
						   data_analise           = '$data_analise',
						   data_analise_tramitacao= '$data_analise_tramitacao',
						   data_tramite           = '$data_tramite',
						   tramite	              = '$status_analise',
						   status_solicitacao     = '$Status_solicitacao',
						   tipo_erro              = '$tipo',
						   prioridade             = '$prioridade',
						   qtd_linhas_prioridade  = '$qtd_linhas_prioridade',
						   prioridade_solicitada_por   = '$solicitado_por_prioridade',
						   ofensor_reincidente    = '$ofensor_reincidente',
						   parecer_reincidente    = '$parecer_prioridade',
						   status_tp              = '$status_tp',
						   usuario                = '$login',
						   disc_status_tp         = '$disc_status_tp',
						   turno                  = '$turno',
						   fila 				  = '$fila'	
						   WHERE id_reversaoind = $id
						   ";
		(!mysql_query($query,$conecta)); 
        //echo $query;
		//echo '<br><br>'.$data_analise_tramitacao;
}
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