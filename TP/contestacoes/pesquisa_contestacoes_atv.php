<?php   
@session_start(); 
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" type="text/css"/>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <meta name="description" content="jquery"/>
        <meta name="keywords" content="jquery" />
		<meta name="robots" content="all, index, follow" />
	    <script type="text/javascript" src="fContestacoes.js"></script>
        
</head>
<body onload="pesquisa_atv();" id="logar" background="../../tp/img/background.JPG">
<?php
//Testa se o perfil está correto.

	if($_SESSION["contestacoes_atv"] == 0 && $_SESSION["contestacoes_atv_sup"] == 0){  
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../menu.php');
			</script>
 		";
	}
$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];

?>
<div id="principal">
    <div id="menu">
        <?php include("../../tp/menu.php") ?>
    </div>
    <div id="caixa">
      <div id="conteudo">   
        <p id="p_padrao">Contestações - <?php echo $nome; ?>.</p><br />
        <form action="cadastro_contestacao_atv.php" method="POST">  
        <div align="center">
 
  <label>
  Pesquisar:
  <input onkeyup="valida(this,'atividade_pedido');pesquisa_atv();" id="n_pesquisa"  name="n_pesquisa"  size="15" maxlength="15" />
  </label>
  <br/>
         
            
        </div>
        <p><strong>Cotaçoes Principal ou Cotações Filhas contestados:</strong></p>
        <div id="Resultado"></div>
        <div align="center" class="regra2">
            <input type="submit" name="bt_enviar" disabled="1" value="Cadastrar contestacao" />
            <input type="button" name="Submit2" value="Voltar" onclick="window.location='../home.php'" />
        </div>
        </form>
      </div>
    </div>
</div>
</body>
</html>