<?php   
@session_start();
include '../conexao.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>TQ</title>
</head>
<body id="logar">
<div id="principal">
<?php

$turno_cadastro  = $_POST["turno_cadastro"];


	if (!empty($_POST["nome_usuario"]) <> ''){
	 $nome_usuario  = $_POST["nome_usuario"];
	}else  $nome_usuario  = '0';
	if (!empty($_POST["login_usuario"]) <> ''){
	 $login_usuario = $_POST["login_usuario"];
	}else   $login_usuario= '0';
	if (!empty($_POST["senha_usuario"]) <> ''){
	 $senha_usuario = $_POST["senha_usuario"];
	}else  $login_usuario = '0';
	if (!empty($_POST["sap_usuario"]) <> ''){
	 $sap_usuario  = $_POST["sap_usuario"];
	}else   $sap_usuario= '0';
	if (!empty($_POST["sap_base"]) <> ''){
	 $sap_base      = $_POST["sap_base"];
	}else   $sap_base= '0';
	if (!empty($_POST["sap_supervisor"]) <> ''){
	 $sap_supervisor= $_POST["sap_supervisor"];
	}else   $sap_supervisor= '0';
	if (!empty($_POST["pn_usuario"]) <> ''){
	 $pn_usuario    = $_POST["pn_usuario"];
	}else   $pn_usuario= '0';
	if (!empty($_POST["pn_base"]) <> ''){
	 $pn_base    	= $_POST["pn_base"];
	}else   $pn_base = '0';
	if (!empty($_POST["pn_supervisor"]) <> ''){
	 $pn_supervisor = $_POST["pn_supervisor"];
	}else  $pn_supervisor= '0';
	if (!empty($_POST["erros_usuario"]) <> ''){
	 $erros_usuario = $_POST["erros_usuario"];
	}else   $erros_usuario= '0';
	if (!empty($_POST["erros_base"]) <> ''){
	 $erros_base    = $_POST["erros_base"];
	}else   $erros_base= '0';
	if (!empty($_POST["erros_supervisor"]) <> ''){
	 $erros_supervisor = $_POST["erros_supervisor"];
	}else   $erros_supervisor= '0';
	if (!empty($_POST["prioriza_erros"]) <> ''){
	 $prioriza_erros    = $_POST["prioriza_erros"];
	}else   $prioriza_erros= '0';
	if (!empty($_POST["gestao_usuario"]) <> ''){
	 $gestao_usuario      = $_POST["gestao_usuario"];
	}else   $gestao_usuario = '0';	
	if (!empty($_POST["gestao_base"]) <> ''){
	 $gestao_base      = $_POST["gestao_base"];
	}else   $gestao_base = '0';	 
	if (!empty($_POST["gestao_supervisor"]) <> ''){
	 $gestao_supervisor= $_POST["gestao_supervisor"];
	}else   $gestao_supervisor= '0';
	if (!empty($_POST["diretoria_usuario"]) <> ''){
	 $diretoria_usuario= $_POST["diretoria_usuario"];;
	}else  $diretoria_usuario = '0';
	if (!empty($_POST["diretoria_base"]) <> ''){
	 $diretoria_base = $_POST["diretoria_base"];
	}else   $diretoria_base= '0';
	if (!empty($_POST["diretoria_supervisor"]) <> ''){
	 $diretoria_supervisor= $_POST["diretoria_supervisor"];
	}else   $diretoria_supervisor= '0';
	if (!empty($_POST["direto_usuario"]) <> ''){
	 $direto_usuario      = $_POST["direto_usuario"];
	}else   $direto_usuario  = '0';
	if (!empty($_POST["direto_base"]) <> ''){
	 $direto_base         = $_POST["direto_base"];
	}else  $direto_base  = '0';
	if (!empty($_POST["direto_supervisor"]) <> ''){
	 $direto_supervisor	  = $_POST["direto_supervisor"];
	}else  $direto_supervisor = '0';
	if (!empty($_POST["direto_prioriza"]) <> ''){
	 $direto_prioriza     = $_POST["direto_prioriza"];
	}else $direto_prioriza  = '0';
	if (!empty($_POST["indireto_usuario"]) <> ''){
	 $indireto_usuario    = $_POST["indireto_usuario"];
	}else  $indireto_usuario = '0';
	if (!empty($_POST["indireto_base"]) <> ''){
	 $indireto_base       = $_POST["indireto_base"];
	}else  $indireto_base= '0';
	if (!empty($_POST["indireto_prioriza"]) <> ''){
	 $indireto_prioriza   = $_POST["indireto_prioriza"];
	}else   $indireto_prioriza= '0';
	if (!empty($_POST["indireto_supervisor"]) <> ''){
	 $indireto_supervisor = $_POST["indireto_supervisor"];
	}else   $indireto_supervisor= '0';
	if (!empty($_POST["bi"]) <> ''){
	 $bi = $_POST["bi"];
	}else   $bi= '0';
	if (!empty($_POST["noticias"]) <> ''){
	 $noticias   = $_POST["noticias"];
	}else   $noticias= '0';
	if (!empty($_POST["controle_atividade"]) <> ''){
	 $controle_atividade = $_POST["controle_atividade"];
	}else   $controle_atividade= '0';
	if (!empty($_POST["vpe_vpg"]) <> ''){
	 $vpe_vpg = $_POST["vpe_vpg"];
	}else   $vpe_vpg= '0';
	
	if (!empty($_POST["treinamento"]) <> ''){
	 $treinamento = $_POST["treinamento"];
	}else   $treinamento= '0';
	if (!empty($_POST["treinamento_sup"]) <> ''){
	 $treinamento_sup = $_POST["treinamento_sup"];
	}else   $treinamento_sup= '0';
	
    if (!empty($_POST["cont"]) <> ''){
	 $cont = $_POST["cont"];
	}else   $cont= '0';
    if (!empty($_POST["cont_sup"]) <> ''){
	 $cont_sup = $_POST["cont_sup"];
	}else   $cont_sup= '0';
    
     if (!empty($_POST["cont_atv"]) <> ''){
	 $cont_atv = $_POST["cont_atv"];
	}else   $cont_atv= '0';
    if (!empty($_POST["cont_sup_atv"]) <> ''){
	 $cont_sup_atv = $_POST["cont_sup_atv"];
	}else   $cont_sup_atv= '0';
    
    
    
    if (!empty($_POST["tsa"]) <> ''){
	 $tsa = $_POST["tsa"];
	}else   $tsa= '0';
    
        if (!empty($_POST["cadastro_func"]) <> ''){
	 $tsa = $_POST["cadastro_func"];
	}else   $tsa= '0';
    
    
    
$seguranca = '';
$sql_reverind = "select nome from usuarios where login='$login_usuario' or nome='$nome_usuario'";
		         $result = mysql_query($sql_reverind,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         	echo"
					<script type=\"text/javascript\">
					alert('Nome/Usuário já tulizado!');
					javascript: history.go(-1);
					</script>
					";
					exit;
					$seguranca ='fu';
				 }
		$query1="INSERT INTO usuarios(
                   login,
				   nome,
				   senha,
				   perfil,
				   turno,
				   data,
				   sap_bko,
				   carrega_base_sap,
				   sup_sap,
				   pn_bko,
				   carrega_base_pn,
				   sup_pn,
				   erros_bko,
				   carrega_base_erros,
				   adm_erros,
				   prioriza_erros,
				   operador_gestao,
				   carregar_base_gestao,
				   supervisor_gestao,
				   diretoria_input,
				   diretoria_sup,
				   operador_direto,
				   carrega_base_direto,
				   supervisor_direto,
				   prioriza_direto,
				   reversao_ind_bko,
				   carrega_base_indireto,
				   prioriza_indireto,
				   adm_reversao_ind,
				   bi,
				   pesquisa,
				   vpe_vpg,
				   noticias,
				   controle_atividades,
				   treinamento,
				   treinamento_sup,
                   tsa,
                   contestacoes,
                   contestacoes_sup,	
                   contestacoes_atv,
                   contestacoes_atv_sup,
                   cadastro_func			   
				    ) 
				   VALUES (
				   '$login_usuario',
				   '$nome_usuario',
				   '$senha_usuario',
				   '2',
				   '$turno_cadastro',
				   '0000-00-00',
				   '$sap_usuario',
					'$sap_base',     
					'$sap_supervisor',
					'$pn_usuario',   
					'$pn_base',    	
					'$pn_supervisor', 
					'$erros_usuario', 
					'$erros_base',  
					'$erros_supervisor',
					'$prioriza_erros',
					'$gestao_usuario', 
					'$gestao_base',     
					'$gestao_supervisor',
					'$diretoria_usuario',
					'$diretoria_supervisor',
					'$direto_usuario',     
					'$direto_base',       
					'$direto_supervisor',	 
					'$direto_prioriza',   
					'$indireto_usuario',   
					'$indireto_base',      
					'$indireto_prioriza',  
					'$indireto_supervisor',
					'$bi',
					'1',
					'$vpe_vpg',
					'$noticias',
					'$controle_atividade',
					'$treinamento',
					'$treinamento_sup',
                    '$tsa',
                    '$cont',
                    '$cont_sup',
                    '$cont_atv',
                    '$cont_sup_atv',
                    '$cadastro_func'
				   )";
(!mysql_query($query1,$conecta)); 
        $query1;
		//echo '<br><br>'.$data_analise_tramitacao;
$_SESSION["bi"] = "1";		
		
	echo"
	<script type=\"text/javascript\">
	alert('Cadastro realizado!');
	javascript: history.go(-1);
	</script>
 	";
	
?>
</div>
</body>
</html>