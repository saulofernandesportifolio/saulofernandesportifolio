<?php   
@session_start();

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

	if($_SESSION["bi"] == 0 ){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../../tp/logout.php');
			</script>
 		";
	}

if(strlen($_POST["cpf"]) < 11){
    
 echo "<script type=\"text/javascript\">
	alert('Necessario cadastrar o cpf!');
	window.location.assign('../../tp/bi/cadastro_funcionario.php');
	</script>
 	";
    
}
include '../conexao.php';
$query2="select* from funcionarios_emp where cpf = '{$_POST["cpf"]}' ";
$result=mysql_query($query2,$conecta); 
$valida2=mysql_num_rows($result);

if($valida2 > 0 ){
    
 echo "<script type=\"text/javascript\">
	alert('Cpf já cadastrado!');
	window.location.assign('../../tp/bi/cadastro_funcionario.php');
	</script>
 	";
 
    
}
else{


$turno_cadastro  = $_POST["turno_cadastro"];

include '../conexao.php';
	if (!empty($_POST["nome_usuario"]) <> ''){
	 $nome_usuario  = $_POST["nome_usuario"];
	 $nome_usuario = strtoupper($nome_usuario);
     $cpf= $_POST["cpf"];
	}else 	echo"
	<script type=\"text/javascript\">
	alert('Cadastre um Nome!');
	window.location.assign('../../tp/bi/cadastro_funcionario.php');
	</script>
 	";

		$query1="INSERT INTO funcionarios_emp(
				   nome,
				   turno,
				   tipo,
                   cpf
				    ) 
				   VALUES (
				   '$nome_usuario',
				   '$turno_cadastro',
				   'OPERAÇÃO',
                   '$cpf'
				    )";
                    
                                        
(!mysql_query($query1,$conecta)); 
      
        
 		$query3="INSERT INTO cont_operador(
				   item,
				   turno
				    ) 
				   VALUES (
				   '$nome_usuario',
				   '$turno_cadastro'
				    )";
             
                                        
(!mysql_query($query3,$conecta)); 
          
        
 		$query4="INSERT INTO cont_operador_input(
				   item,
				   turno
				    ) 
				   VALUES (
				   '$nome_usuario',
				   '$turno_cadastro'
				    )";
             
                                        
(!mysql_query($query4,$conecta)); 
        
   

	echo"
	<script type=\"text/javascript\">
	alert('Cadastro efetuado com sucesso !');
	window.location.assign('../../tp/bi/cadastro_funcionario.php');
	</script>
 	";
} 
	
?>
</div>
</body>
</html>