<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <meta name="description" content="jquery"/>
        <meta name="keywords" content="jquery" />
		<meta name="robots" content="all, index, follow" />
		<link  href="calendario/_style/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="calendario/_scripts/jquery.js"></script>
		<script type="text/javascript" src="calendario/_scripts/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="calendario/_scripts/exemplo-calendario.js"></script>
        <script type="text/javascript" src="fContestacoes.js"></script>
</head>
<body onload="pesquisa()" id="logar" background="../../tp/img/background.JPG">
<?php
//Testa se o perfil está correto.

	if($_SESSION["contestacoes"] == 0 && $_SESSION["contestacoes_sup"] == 0 && $_SESSION["contestacoes_atv"] == 0 && $_SESSION["contestacoes_atv_sup"] == 0){  
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
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
        <form action="valida_filtro_tipo.php" method="POST">  
        <div align="center">
            Tipo de contestação:<br />
            <select name='tipo'>
                <option name='tipo' value='pedido'>Pedido</option>
                <option name='tipo' value='atividade'>Atividade</option>
            </select>
            <br />
            <br />
        </div>
        <div align="center" class="regra2">
            <input type="submit" name="bt_enviar" value="Cadastrar contestacao" />
            <input type="button" name="Submit2" value="Voltar" onclick="window.location='../home.php'" />
        </div>
        </form>
      </div>
    </div>
</div>
</body>
</html>