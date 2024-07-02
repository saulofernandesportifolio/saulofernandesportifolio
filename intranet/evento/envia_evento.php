<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
date_default_timezone_set("Brazil/East");
include "../bd.php";
include "../data.php";
if($action == "edicao" || $action == "criacao" || $action == "exclusao"){
	if($action == "exclusao"){
	//CRIA SQL DE EXCLUSÃO
		$sql_evento = "DELETE FROM `intranet`.`calendario` WHERE `id`= '".$id_evento."';";
		$error = FALSE;
	}
	else{
	//Verificação de erros
		$error=false;
		$erro="";
		//Verifica se o usuario está logado
		if (!isset($_COOKIE['login']))
			{
				echo "<script type=\"text/javascript\">
				alert('Por favor, informe seu login e senha para acessar o sistema');
				history.back();
				</script>";
				exit;
			}
		//Valida tipo válido
		if($tipo == "" || !isset($tipo)){
			$erro=$erro."O tipo de evento deve ser informado!\\n";
			$error=true;
		}
		//valida data vazia
		if($dt_evento == ""){
			$erro=$erro."Favor inserir uma data. \\n";
			$error=true;
		}
		else{
			//valida data válido
			if(is_date($dt_evento) == "erro" ){
				$erro=$erro."Favor inserir uma data válida!\\n".$dt_evento;
				$error=true;
			}elseif(is_date($dt_evento) == "brasileiro" ){
				//formata data
				$data_formatada = substr($dt_evento,6,4)."-".substr($dt_evento,3,2)."-".substr($dt_evento,0,2);
			}elseif(is_date($dt_evento) == "americano" ){
				$data_formatada = $dt_evento;
			}
		}
		//Valida descrição do evento
		if($descricao == "" || !isset($descricao)){
			$erro=$erro."Favor digitar a descrição do evento!\\n";
			$error=true;
		}
		
	//CRIA SQL DE CRIAÇÃO OU EDIÇÃO
		
		if($action == "criacao"){
			$sql_evento = "INSERT INTO `intranet`.`calendario` (`id`, `data`, `evento`, `us_evento`, `tipo`)
					VALUES ('', '".$data_formatada."', '".$descricao."','".$_COOKIE["login"]."', '".$tipo."');";
		}
		elseif($action == "edicao"){
			$sql_evento = "UPDATE `intranet`.`calendario` SET data = '".$data_formatada."', `evento` = '".$descricao."', `tipo` = '".$tipo."'
					WHERE `id` = '".$id_evento."';";
		}
	}
	
}
if($error==false){
	//EXECUTA COMANDO SQL
	mysql_query($sql_evento) or die(mysql_error());
	echo "<script>
		 document.location.replace('../index.php?func=my_event');</script>";
	exit;
}else{
	echo "<script>
		 alert('$erro'); 
		 document.location.replace('../index.php?func=add_event');
		 </script>";
	exit;
}
?>