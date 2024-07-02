<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
date_default_timezone_set("Brazil/East");
include "../bd.php";
include "../data.php";

if(isset($id_usuario)){
//Recebe Variaveis do GET
$usuario = mysql_fetch_assoc(mysql_query("SELECT * FROM tbl_usuarios WHERE id = '".$id_usuario."';"));
	$data_certa	= $usuario['dt_nasc'];
	$email		= $usuario['email'];
}else{
//Recebe Variaveis do POST
	$dt_nasc	= $_POST['dt_nasc'];
	$email		= $_POST['email'];
}
//Verificação de erros
	$error=false;
	$erro="";

	//Valida e-mail do usuario
	if($email == "" || !isset($email)){
		$erro=$erro."Favor digitar o e-mail do usuário!\\n";
		$error=true;
	}
		elseif(!strstr($email,"@") || (!substr($email,-1,4) == ".com" && !substr($email,-1,7) == ".com.br")){
			$erro=$erro."Favor digitar um e-mail válido!\\n";
			$error=true;
		}
	if(!isset($data_certa)){
		//valida data vazia
		if($dt_nasc == ""){
			$erro=$erro."Favor inserir a data de nascimento. \\n";
			$error=true;
		}
		else{
			//valida data válido
			if(is_date($dt_nasc) == false ){
				$erro=$erro."Favor inserir uma data de nascimento válida.\\n";
				$error=true;
			}
			else{
				//formata data
				$data_formatada = substr($dt_nasc,6,4)."-".substr($dt_nasc,3,2)."-".substr($dt_nasc,0,2);
			}
		}
	}
	else{$data_formatada = $data_certa;}
	//CRIA SQL DE CRIAÇÃO OU EDIÇÃO		
	$sql_usuario = "UPDATE `intranet`.`tbl_usuarios` SET `senha` = 'empreza' WHERE dt_nasc = '".$data_formatada."' AND email = '".$email."';";
	$acao = mysql_query($sql_usuario);
	$num = mysql_affected_rows();
	
	$senha_usuario = "SELECT senha FROM tbl_usuarios WHERE dt_nasc = '".$data_formatada."' AND email = '".$email."';";
	$senha = mysql_fetch_assoc(mysql_query($senha_usuario));
	if( $num < 1 && $senha['senha'] != 'empreza'){
		$erro=$erro."Nenhum usuário encontrado com estes dados \\n";
		$error=true;
	}
	
	if($error==false){
		//EXECUTA COMANDO SQL
			mysql_query($sql_usuario) or die(mysql_error());
			echo "<script>
			 alert('Senha alterada com sucesso. A nova senha é \"empreza\".')
			 document.location.replace('../index.php?func=\"\"');</script>";
			exit;
	}
	else{
		echo "<script>
		 alert('$erro'); 
		 document.location.replace('../index.php?func=reset');
		 </script>";
		exit;
	}
?>