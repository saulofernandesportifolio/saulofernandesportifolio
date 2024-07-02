<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
date_default_timezone_set("Brazil/East");
include "../bd.php";
include "../funcoes.php";

//Cria o numero do post
$num = mysql_fetch_assoc(mysql_query("SELECT id+1 as num FROM feed ORDER BY id DESC limit 1;"));
$num = (int)$num['num'];

//Deleta post
if($action == "exclusao")
{
	$sql_feed = "DELETE FROM `intranet`.`feed` WHERE id = '".$id_feed."';";
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

	//VALIDA ARQUIVO
	$destino = "\\\\servempreza02\www\intranet\arquivos\\";

	//Recebe informações sobre o arquivo anexado
    $anexo = $_FILES['arquivo'];
	if(!empty($anexo['name']))
    {		
            $error = $anexo['error'];		
    	
    	switch ($error){
    		case 0:
                $error= false;
    			break;
    		case 1:
                $error=true;
    			$erro = 'O tamanho do arquivo Ã© maior que o definido nas configuraÃ§Ãµes do PHP!';
    			break;
    		case 2:
                $error=true;
    			$erro = 'O tamanho do arquivo Ã© maior do que o permitido!';
    			break;
    		case 3:
                $error=true;
    			$erro = 'O upload nÃ£o foi concluÃ­do!';
    			break;
    	}
    	if($error == false){
            $arquivo_name	   = $num."_".tratar_arquivo_upload($anexo['name']);
    		if(!is_uploaded_file($anexo['tmp_name'])){
    			$erro = 'Erro ao processar arquivo!';
                $error = true;
    		}
            $destino .= $arquivo_name;
            // Faz o upload do arquivo para seu respectivo caminho
            move_uploaded_file($anexo["tmp_name"], $destino);
            
        	}
	}
    else{$arquivo_name = "_N/A";}
    
    unset($anexo);
    
    //VALIDA IMAGEM
	$destino = "\\\\servempreza02\www\intranet\imagens\\";
    
	//Recebe informações sobre o arquivo anexado
	$anexo = $_FILES['imagem'];
    if(!empty($anexo['name']))
    {	
            $error = $anexo['error'];		
    	
    	switch ($error){
    		case 0:
    			break;
    		case 1:
                $error=true;
    			$erro = 'O tamanho da imagem Ã© maior que o definido nas configuraÃ§Ãµes do PHP!';
    			break;
    		case 2:
                $error=true;
    			$erro = 'O tamanho da imagem Ã© maior do que o permitido!';
    			break;
    		case 3:
                $error=true;
    			$erro = 'O upload da imagem nÃ£o foi concluÃ­do!';
    			break;
    	}
        //Valida tipo de arquivo
        if(!preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $anexo["name"])){
     	   $erro = $anexo["tmp_name"]."Isso não é uma imagem.";
           $error = true;
         }
        
        $tamanho = 40000000;
        
        if($anexo["size"] > $tamanho) { $erro = "A imagem tem ".$anexo["size"].", e deve ter no máximo ".$tamanho." bytes"; $error = true;}

    	if($error == false){
            $image_name	   = $num."_".tratar_arquivo_upload($anexo['name']);
    		if(!is_uploaded_file($anexo['tmp_name'])){
    			$erro = 'Erro ao processar a imagem!';
                $error = true;
    		}
            $destino .= $image_name;
            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($anexo["tmp_name"], $destino);
        	}
        }
    else{$image_name = "_N/A";}
    
    //Valida título válido
	if($titulo == "" || !isset($titulo)){
	$erro=$erro."Favor digitar um titulo válido para a notícia!\\n";
	$error=true;
    }

	//Valida comprimento do titulo
	if(strlen($titulo) > 50){
	$erro=$erro."Favor digitar um titulo com até 50 caractéres!\\n";
	$error=true;
	}

	//valida tipo válido
	if($tipo == "" || !isset($tipo) || empty($tipo)){
	$erro=$erro."Favor inserir uma área para que a noticia seja destinada!\\n";
	$error=true;
	}

	//valida conteudo válido
	if($conteudo == "" || !isset($conteudo) || empty($conteudo)){
	$erro=$erro."Favor inserir um conteúdo válido para a noticia. \\n";
	$error=true;
	}


	//Concatena AdWords
	for($i=1; $i <= 15 ; $i++){
		$variavel = "adwords".$i;
		if( isset($$variavel) && $$variavel <> ""){
			if(!isset($concatena_adwords)){$concatena_adwords = $$variavel;}
		else{$concatena_adwords = $concatena_adwords.", ".$$variavel;}
		}
	}
	if(!isset($concatena_adwords)){$concatena_adwords = "";}

	if($error==false){
		//Cria feed
		if($action == "criacao")
		{
		  $sql_feed = "INSERT INTO `intranet`.`feed` (`id`, `titulo`, `us_post`, `dt_post`, `tipo`, `conteudo`, `adwords`,`arquivos`, `imagem`)
           VALUES ('', '".$titulo."', '".$_COOKIE['login']."','".date("Y-m-d G:i")."', '".$tipo."', '".$conteudo."',
           '".$concatena_adwords."','".$arquivo_name."','".$image_name."');";
		}
		elseif($action == "edicao")
		{
		  $sql_feed = "UPDATE `intranet`.`feed` SET `titulo` = '".$titulo."', `dt_edicao` = '".date("Y-m-d G:i")."',
           `tipo` = '".$tipo."', `conteudo` = '".$conteudo."', `adwords` = '".$concatena_adwords."',`arquivos` = '".
           tratar_arquivo_upload($arquivo_name)."',`imagem` = '".tratar_arquivo_upload($image_name)."' WHERE id = '".$id_feed."';";
		}
	}
	else{
		echo "<script>
		     alert('$erro'); 
			 document.location.replace('../index.php?func=add_feed');
			 </script>";
	    exit;
	}
}
mysql_query($sql_feed) or die(mysql_error());
echo "<script>
	  document.location.replace('../index.php');</script>";
	  exit;
?>