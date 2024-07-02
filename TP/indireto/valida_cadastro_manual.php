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
	if($_SESSION["ADM_REVERSAO_IND"] == 0){  
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

	$pedido             			= $_POST["pedido"];
	$revisao                		= $_POST["revisao"];
	$regional            			= $_POST["regional"];
	$criado_em           			= $_POST["criado_em"];
	$cliente             			= $_POST["cliente"];
	$comentario            			= $_POST["comentario"];
	//$ilha               			= $_POST["ilha"];
//$login = $_SESSION["login"];
$nome_cadastro = $_SESSION["nome"];
$hora_atual = date ('H:i');
$data_atual = date ('Y-d-m');
$data_t = date("Y-m-d");
$partes_da_data = explode(" ",$criado_em);
$data="$partes_da_data[0]";
$datatransf = explode("/",$data);
$data_reversao = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
$criado_em = $data_reversao;
$tipo ='';



	 $sql_valida = "SELECT * FROM ilha_reversao_indireto_bko WHERE pedido ='$pedido' and revisao = '$revisao'";
                $acao_valida = mysql_query($sql_valida) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);
 $linha_valida . "<br>";			
				 $teste = "$linha_valida";	
                //echo $teste;
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0){
                    echo"
	               	<script type=\"text/javascript\">
		              alert('Já existe pedido cadastrado com essa revisão!');
		              window.history.go(-1);
                    </script>
 		             ";
	               }
                else
				{
				    if($operador == '0'){
				        $fila = 1;
				        $usuario = 'Aguardando Operador';
                        $nome = 'Aguardando Operador';				      
                        $turno = 'ND';                                              
                        }                                                
                    else{
                        $nome_prio = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$operador."'"));
                        $nome = $nome_prio['nome'];
                        $turno = $nome_prio['turno'];                        
                        $fila = 2;
                        $usuario = $operador;
                        }
 $query="INSERT INTO ilha_reversao_indireto_bko(					   regional,	
				  													   criado_em,
																	   pedido,
																	   cliente,
																	   revisao,
																	   comentarios,
																	  
																	   status_tp,
																	   fila,
																	   hora_base,
																	   data_base,
																	   operador_base,
																	   disc_status_tp,
																	   tramite,
																	   usuario,
																	   nome2,
																	   data_tramite,
																	   turno,
																	   cadastro_manual
															          )
                                                               VALUES ('$regional',
															           '$criado_em',
															   		   '$pedido',
																	   '$cliente',
																	   '$revisao',
																	   '$comentario',
 																  	
																	   1,
																	   '$fila',
																	   '$hora_atual',
																	   '$data_atual',
																	   '$nome_cadastro',
																	   'Aberta',
																	   'Aguardando',
																	   '$usuario',
																	   '$nome',
																	   '$data_t',
																	   '$turno',
                                                                       'Sim'
																	   )";					   
				
(!mysql_query($query,$conecta)); 			   

        //echo $query;
		//echo '<br><br>'.$data_analise_tramitacao;
}
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