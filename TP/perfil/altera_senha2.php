<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>

<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">

<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<div id="principal">

            <div id="menu">
           <?php include("../../tp/menu.php") ?>
            </div>
    
    <div id="caixa">
    
      <div id="conteudo">
<?php      
 $login                   = $_SESSION["login"];
 $senha1                  = $_POST["senha1"];
 $senha2             	 = $_POST["senha2"];
include '../conexao.php';
		$query="UPDATE usuarios SET
						   senha          = '$senha1'
						   WHERE login   = '$login'
						   ";
		(!mysql_query($query,$conecta)); 
	echo"
	<script type=\"text/javascript\">
	alert('Senha alterada!');
	javascript: history.go(-1);
	</script>
 	";
?>

   		 </div>
      
        
  </div>
     
</div>

</body>
</html>