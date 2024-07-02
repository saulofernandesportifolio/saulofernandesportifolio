<?php   
@session_start();
include '../conexao.php';
include '../funcoes.php';

if($_SESSION["tsa"] == 0){  
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
$datahora_atual =       date('Y-m-d H:m:s');
$usuario =              $_SESSION["login"];
$nome1 =                $_SESSION["nome"];
$turno =                $_SESSION["turno"];

//Inseri nova TSA como pendente
if($_POST['tp_acao'] == 'insert'){	
    $dt_cadastro =          $datahora_atual;

    $n_monitoria=	        $_POST["n_monitoria"];
	$acao=			        $_POST["acao"];
    $dt_auditoria=	        transforme_data_hora_amd($_POST["dt_auditoria"]);
	$pedido= 		        $_POST["pedido"];
	$q_revisoes= 	        $_POST["q_revisoes"];
	$i_qualidade=	        $_POST["i_qualidade"];
    $operacao=		        $_POST["operacao"];
    $parecer=		        $_POST["parecer"]= preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $_POST["parecer"]) );
    $erro=			        $_POST["erro"];
    $desc_erro=		        $_POST["desc_erro"];
    $us_cadastro =          $usuario;
    //Verifica se TSA envolve oferta
    if(isset($_POST["desc_oferta"])){
        $desc_oferta=	    $_POST["desc_oferta"];}
    else{
        $desc_oferta=       "n/a";}
    $analise_bko=	        $_POST["analise_bko"];    
    $manifestacao=	        $_POST["manifestacao"]= preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $_POST["manifestacao"]) );
    $ofensor=		        $_POST["ofensor"];
    $correcao=		        $_POST["correcao"];
    //Verifica se correção foi necessária
    if(strstr($correcao,'Sim')){
        $acao_correcao=	    "";
        $area_correcao= 	$_POST['area_correcao'];
        $status_correcao=   "";
        $subStatus=         'pendente';
        $us_correcao =      '';
        $dt_correcao =      '';
	}else{
        $acao_correcao=	    "n/a";
        $area_correcao= 	$_POST['area_correcao'];
        $status_correcao=   "n/a";
        $subStatus=         'concluido';
        $us_correcao =      $usuario;
        $dt_correcao =      $datahora_atual;
       
	}

    //Valida Campos vazios
    if($n_monitoria == '' || $acao == '' || $pedido == '' || $q_revisoes == '' || 
       $i_qualidade == '' || $operacao == '' || $parecer == '' || $erro == '' || 
       $desc_erro == '' || $desc_oferta == '' || $analise_bko == '' || $dt_auditoria == '' || 
       $manifestacao == '' || $ofensor == '' || $correcao == '' ){  
    	
    	echo"
    		<script type=\"text/javascript\">
    		alert('Favor preencher todos os dados da TSA!');
    		document.location.replace('tsa_cadastro.php');
    		</script>
    	";
    }
    else{
    $query="INSERT INTO base_tsa(
                        `n_monitoria`,
                        `acao`,
                        `data_hora_auditoria`,
                        `pedido`,
                        `qtde de revisões`,
                        `indice qualidade`,
                        `operacao`,
                        `parecer auditoria`,
                        `erro`,
                        `descricao do erro`,
                        `data_cadastro`,
                        `us_cadastro`,
                        `data_correcao`,
                        `us_correcao`,
                        `ofertas`,
                        `analise bko`,
                        `turno`,
                        `manifestacao bko`,
                        `operador ofensor`,
                        `necessario correcao`,
                        `area de correcao`,
                        `acao de correcao`,
                        `status da correcao`,
                        `sub-status da correcao`
    				    ) 
    				   VALUES				   
    				   ('$n_monitoria',
                       '$acao',
                       '$dt_auditoria',
    				   '$pedido',
    				   '$q_revisoes',
    				   '$i_qualidade',
    				   '$operacao',
    				   '$parecer',
    				   '$erro',
    				   '$desc_erro',
    				   '$dt_cadastro',
                       '$us_cadastro',
                       '$dt_correcao',
                       '$us_correcao',
    				   '$desc_oferta',
    				   '$analise_bko',
                       '$turno_cadastro',
    				   '$manifestacao',
    				   '$ofensor',
    				   '$correcao',
    				   '$area_correcao',
    				   '$acao_correcao',
    				   '$status_correcao',
                       '$subStatus'	   
    				   )";
    }
}elseif($_POST['tp_acao'] == 'update'){
    $acao_correcao =    RemoveAcentos($_POST["acao_correcao"]);
    $status_correcao =  RemoveAcentos($_POST["input_status_correcao"]);
    $area_correcao =    $_POST["area_correcao"];
    
    //Valida Campos vazios
    if($acao_correcao  == '' || $status_correcao  == '' || $area_correcao  == ''){  
    	
    	echo"
    		<script type=\"text/javascript\">
    		alert('Favor preencher todos os dados solicitados!');
    		document.location.replace('tsa_cadastro.php');
    		</script>
    	";
    }
    
    $query="UPDATE base_tsa SET `area de correcao`       = '$area_correcao',
                                `acao de correcao`       = '$acao_correcao',
                                `status da correcao`     = '$status_correcao',
                                `us_correcao`            = '$usuario',
                                `data_correcao`          = '$datahora_atual',
                                `sub-status da correcao` = 'concluido' 
                            WHERE n_monitoria = '".$_POST['n_monitoria']."'";    
}
if(mysql_query($query,$conecta)){
        echo "<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('../../tp/tsa/tsa_cadastro.php');
		</script>
 		";
}else{
    die(mysql_error());
}	
?>