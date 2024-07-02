<?php if(strpos($_SERVER['HTTP_USER_AGENT'], "MSIE")){$nav = "IE";}else{ $nav = "outro";} ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
	if($nav =="outro"){
		$_POST['dt_nasc'] = substr($_POST['dt_nasc'],8,2)."/".substr($_POST['dt_nasc'],5,2)."/".substr($_POST['dt_nasc'],0,4);
	}	

date_default_timezone_set("Brazil/East");
include "../bd.php";
include "../data.php";

if($action == "edicao" || $action == "criacao" || $action == "exclusao"){
	if($action == "exclusao"){
	//CRIA SQL DE EXCLUSÃO
		$id_usuario		= $_POST['id_usuario'];
		$sql_usuario	= "DELETE FROM `intranet`.`tbl_usuarios` WHERE `id`= '".$id_usuario."';";
		
		$login = mysql_fetch_assoc(mysql_query("SELECT login FROM tbl_usuarios WHERE id = '".$id_usuario."';"));
		$nome = mysql_fetch_assoc(mysql_query("SELECT nome FROM tbl_usuarios WHERE id = '".$id_usuario."';"));
		$nome = $nome['nome'];
		$sql_del_aniver = "DELETE FROM `intranet`.`calendario` WHERE evento = 'Aniversário de ".
					strtolower(ltrim(trim(substr($nome,0,strpos($nome," "))." ".
					substr($nome,(strpos(strrev($nome)," ")*(-1))))))."';";				
					mysql_query($sql_del_aniver);
	}
	else{
		$nome		= $_POST['nome'];
		$dt_nasc	= $_POST['dt_nasc'];
		//Caso seja coordenador, só insere usuários do seu setor.
		if($_COOKIE['perfil'] == 'COORDENADOR')
			{$_POST['setor'] = $_COOKIE['setor'];}
		$setor		= $_POST['setor'];
		//Caso seja coordenador, só insere novos usuários.
		if($_COOKIE['perfil'] == 'COORDENADOR' && $self == 'n')
			{$_POST['perfil'] = 'USUARIO';}
		$perfil		= $_POST['perfil'];
		$email		= $_POST['email'];
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
		//Valida nome do usuario
		if($nome == "" || !isset($nome)){
			$erro=$erro."Favor digitar o nome do usuário!\\n";
			$error=true;
		}
			elseif(!strstr($nome," ")){
				$erro=$erro."Favor digitar o nome completo do usuário!\\n";
				$error=true;
			}
		
		//Valida e-mail do usuario
		if($email == "" || !isset($email)){
			$erro=$erro."Favor digitar o e-mail do usuário!\\n";
			$error=true;
		}
			elseif(!strstr($email,"@") || (!substr($email,-1,4) == ".com" && !substr($email,-1,7) == ".com.br")){
				$erro=$erro."Favor digitar um e-mail válido!\\n";
				$error=true;
			}
		//Valida setor válido
		if($setor == "" || !isset($setor)){
			$erro=$erro."O setor de usuário deve ser informado!\\n";
			$error=true;
		}
		
		//Valida perfil válido
		if($_COOKIE['perfil'] == 'COORDENADOR'){$perfil = 'USUARIO';}
		if($perfil == "" || !isset($perfil)){
			$erro=$erro."O perfil de usuário deve ser informado!\\n";
			$error=true;
		}
		//valida data vazia
		if($dt_nasc == ""){
			$erro=$erro."Favor inserir a data de nascimento. \\n";
			$error=true;
		}
		else{
			//valida data válido
			if(is_date($dt_nasc) == false ){
				$erro=$erro."Favor inserir uma data de nascimento válida. ".gettype($dt_evento)."\\n";
				$error=true;
			}else{
			//formata data
			$data_formatada = substr($dt_nasc,6,4)."-".substr($dt_nasc,3,2)."-".substr($dt_nasc,0,2);
			$aniversario = date("Y")."-".substr($dt_nasc,3,2)."-".substr($dt_nasc,0,2);
			}
		}
	
	//CRIA SQL DE CRIAÇÃO OU EDIÇÃO
		if($error==false){
			if($action == "criacao"){
				$sql_usuario = "INSERT INTO `intranet`.`tbl_usuarios` (`id`, `nome`, `login`, `senha`, `dt_nasc`, `setor`, `perfil`, `email`)
				VALUES ('', '".ltrim(trim($nome))."', '".strtolower(ltrim(trim(substr($nome,0,strpos($nome," ")).".".
				substr($nome,(strpos(strrev($nome)," ")*(-1))))))."','empreza', '".$data_formatada."', '".$setor."', '".$perfil."', '".$email."');";
				//adiciona aniversario nos eventos por 5 anos
				for($i=0; $i < 5 ; $i++){
					$ano_temp = date("Y")+$i;
					
					$sql_aniversario = "INSERT INTO `intranet`.`calendario` (`id`, `data`, `evento`, `us_evento`, `tipo`)
					VALUES ('', '".str_replace(date("Y"),$ano_temp,$aniversario)."',
					'Aniversário de ".
					strtolower(ltrim(trim(substr($nome,0,strpos($nome," "))." ".
					substr($nome,(strpos(strrev($nome)," ")*(-1))))))."', '', 'aniversario');";
					mysql_query($sql_aniversario);
				}
			}
			elseif($action == "edicao"){
			$sql_usuario = "UPDATE `intranet`.`tbl_usuarios` SET nome = '".$nome."', dt_nasc = '".$data_formatada."', setor = '".$setor."', perfil = '".$perfil."', email = '".$email."' WHERE id = '".$id_usuario."';";
			
			//Altera aniversario nos eventos
				for($i=0; $i < 5 ; $i++){
					$ano_temp = date("Y")+$i;
					
					$sql_aniversario = "UPDATE `intranet`.`calendario` SET data = 
					'".str_replace(date("Y"),$ano_temp,$aniversario)."'
					WHERE evento = 'Aniversário de ".
					strtolower(ltrim(trim(substr($nome,0,strpos($nome," "))." ".
					substr($nome,(strpos(strrev($nome)," ")*(-1))))))."'
					AND data LIKE '%".$ano_temp."%';";
					mysql_query($sql_aniversario) or die(mysql_error());
				}
			}
		}
	}
	if($error==false){
	//EXECUTA COMANDO SQL
	mysql_query($sql_usuario) or die(mysql_error());
	echo "<script>
		 document.location.replace('../index.php?func=adm_user');</script>";
	exit;
	}
	else{
		echo "<script>
			 alert('$erro'); 
			 document.location.replace('../index.php?func=add_user');
			 </script>";
		exit;
	}
}
?>