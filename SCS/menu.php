<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
	<link rel="StyleSheet" href="empreza.css" type="text/css" />
	<script type="text/javascript" src="menu/dtree.js"></script>
	<script language="JavaScript" type="text/JavaScript">
<!--
	function MM_reloadPage(init) {  //reloads the window if Nav4 resized
	  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
	    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
	  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
	}
	MM_reloadPage(true);
//-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<img id="top_img" class="menu" src="img/logo_empreza_2.jpg" width="285px"	height="180px" >
<?php
include "bd.php";
$sql = "SELECT * FROM tbl_usuarios WHERE id = $ide";
$acao = mysql_query($sql) or die (mysql_error());
while($linha = mysql_fetch_array($acao))
{
    $idusuario      = $linha["id"];
    $login          = $linha["login"];
    $senha          = $linha["senha"];
    $nome           = $linha["nome"];
    $perfil         = $linha["perfil"];
	$area           = $linha["area"];
	if (!isset($m)){
		$m = 0;
		}
	if (!isset($n_chamado)){
		$n_chamado = 0;
		}
}
if (!isset($login))
{
    echo "<script type=\"text/javascript\">
        alert('Por favor, informe seu login e senha para acessar o sistema');
        history.back();
		</script>";
    	exit;
}
else
{
?>
<div id="top" class="menu">
	<?php
	  date_default_timezone_set("Brazil/East");
	  $data_login = date("H:i:s");
	?>
    	<p class="top" align="left">Usuário: <?php echo "$nome";?></p><p class="top" align="right"><?php include "data/data2.php";?></p>
</div>
<div id="rigth" class="menu">
<?php
	switch ($perfil){
		case 1:
			switch ($m){
				case 1:
				include "bd.php";
				$sql_verifca = "SELECT * FROM chamados";
				$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());

				$acao_pedidos = mysql_query($sql_verifca) or die (mysql_error());
				$num = mysql_num_rows($acao_pedidos);
				
				echo '<form name="form1" method="post" action="menu.php?ide=',$idusuario,'">
						<H2>M&oacute;dulo de inser&ccedil;&atilde;o de chamado</H2>
						<table id="table" class="menu">
						  <tr bordercolor="#FFFFFF"> 
							<td colspan="3">
							</td>
						  </tr>
						  <tr> 
							<td align="center" colspan="3"> 
								<hr/>
								<p class="top"><strong>INSERIR CHAMADO </strong></p> 
							</td>
						  </tr>
						  <tr>
							<td width="5%">
							  Nome:
							</td>
							<td width="60%">',
							  $nome
						   ,'</td>
							<td>
							  Chamado nº ',($num + 1),'
							</td>
						  </tr>
						  <tr>
							<td>
							  Login:
							</td>
							<td>',
							  $login
						  ,'</td>
						  </tr>
						  <tr>
						  	<td colspan="2">
								</br>
								<strong>Tipo de solicitação:</br></strong>
								<input value="RELATORIO" id="tipo" name="tipo" type="radio" />Relat&oacute;rio
								<input value="SISTEMA" id="tipo" name="tipo" type="radio" /> Sistema
								<input value="PROJETO" id="tipo" name="tipo" type="radio" />Projeto
							</td>
						  </tr>
						  <tr bordercolor="#FFFFFF"> 
						  	<td colspan="3">
								<div align="center" class="regra2">
									<hr noshade="noshade" />
									<input type="hidden" name="n_chamado" id="n_chamado" value="',($num+1),'" />
									<input type="submit" name="Submit" value="Avan&ccedil;ar" />
								 <input type="button" name="Submit2" value="Cancelar" onclick="window.location="menu.php?ide=',$idusuario,'""/>
								</div>
							</td>
						  </tr>
						</table>
					</form>';
				break;
				 
				case 2:
				include "bd.php";
				$sql_verifca = "SELECT * FROM chamados WHERE status = 'TRAMITANDO' or status = 'DEVOLVIDO' ORDER BY status ASC";
				$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());

				$acao_pedidos = mysql_query($sql_verifca) or die (mysql_error());
				$num = mysql_num_rows($acao_pedidos);
				
				echo '<p><font color="#a0873c" size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>M&oacute;dulo de consulta - Chamados tramitando</strong></font></p>

<p align="left"><font color="#464646" size="2" face="Arial, Helvetica, sans-serif">Existe um total de <?php echo "<font color="#464646" face="arial" size="2"><strong> ',$num,' atividades</strong> na vis&atilde;o. </font><font color="#464646" size="2" face="Arial, Helvetica, sans-serif">Clique 
  em &quot;<strong>Abrir</strong>&quot; para trabalhar :</font></p>
<table width="100%" border="0">
  <tr bgcolor="#AAAAAA" class="style5">
    <td width="171"><div align="center" class="style6"><span class="style5">Nº do chamado</span></div></td>
    <td width="306"><div align="center" class="style6"><span class="style5">Usuario de input</span></div></td>
    <td width="528"><div align="center" class="style6">&Aacute;rea de Imput</div></td>
    <td width="261"><div align="center" class="style6"><strong>Tipo de solicita&ccedil;&atilde;o</strong></div></td>
    <td width="272"><div align="center" class="style6"><span class="style5">Data de Input</span></div></td>
    <td width="118"><div align="center" class="style6">ABRIR</div></td>
  </tr>';	
				while($linha_atv = mysql_fetch_assoc($acao_pedidos))
				{
				$idatividade			=	$linha_atv["id"];
				$dt_inclusao			=	$linha_atv["dt_inclusao"];
				$dt_prev				=	$linha_atv["dt_prev"];
				$tipo					=	$linha_atv["tipo"];
				$login					=	$linha_atv["login"];
				$area_destino			=	$linha_atv["area_destino"];
				$area_origem			=	$linha_atv["area_origem"];
				$status					=	$linha_atv["status"];
				$dt_conclusao			=	$linha_atv["dt_conclusao"];
				$descricao				=	$linha_atv["descricao"];
				$titulo					=	$linha_atv["titulo"];
				
			echo '<tr bgcolor="#DDDEDD" >
    			<td width="171" align="center">',$idatividade,'</div></td>
			    <td width="306" align="center">',$login,'</td>
			    <td width="528" align="center">',$area_origem,'</td>
			    <td width="261" align="center">',$tipo,'</td>
			    <td width="272" align="center">',$dt_inclusao,'</td>
			    <td width="118"></td>
			  </tr>';
				}
		echo "</table>";
		break;
		
		case 3:
				include "bd.php";
				$sql_verifca = "SELECT * FROM chamados WHERE status = 'AGUARDANDO APROVACAO' ORDER BY id ASC";
				$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());

				$acao_pedidos = mysql_query($sql_verifca) or die (mysql_error());
				$num = mysql_num_rows($acao_pedidos);
				
				echo '<p><font color="#a0873c" size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>M&oacute;dulo de consulta - Chamados aguardando aprova&ccedil;&atilde;o</strong></font></p>

<p align="left"><font color="#464646" size="2" face="Arial, Helvetica, sans-serif">Existe um total de <?php echo "<font color="#464646" face="arial" size="2"><strong> ',$num,' atividades</strong> aguardando aprova&ccedil;&atilde;o. </font><font color="#464646" size="2" face="Arial, Helvetica, sans-serif">Clique 
  em &quot;<strong>Abrir</strong>&quot; para trabalhar :</font></p>
<table width="100%" border="0">
  <tr bgcolor="#AAAAAA" class="style5">
    <td width="171"><div align="center" class="style6"><span class="style5">Nº do chamado</span></div></td>
    <td width="306"><div align="center" class="style6"><span class="style5">Usuario de input</span></div></td>
    <td width="528"><div align="center" class="style6">&Aacute;rea de Imput</div></td>
    <td width="261"><div align="center" class="style6"><strong>Tipo de solicita&ccedil;&atilde;o</strong></div></td>
    <td width="272"><div align="center" class="style6"><span class="style5">Data de Input</span></div></td>
    <td width="118"><div align="center" class="style6">ABRIR</div></td>
  </tr>';	
				while($linha_atv = mysql_fetch_assoc($acao_pedidos))
				{
				$idatividade			=	$linha_atv["id"];
				$dt_inclusao			=	$linha_atv["dt_inclusao"];
				$dt_prev				=	$linha_atv["dt_prev"];
				$tipo					=	$linha_atv["tipo"];
				$login					=	$linha_atv["login"];
				$area_destino			=	$linha_atv["area_destino"];
				$area_origem			=	$linha_atv["area_origem"];
				$status					=	$linha_atv["status"];
				$dt_conclusao			=	$linha_atv["dt_conclusao"];
				$descricao				=	$linha_atv["descricao"];
				$titulo					=	$linha_atv["titulo"];
				
			echo '<tr bgcolor="#DDDEDD" >
    			<td width="171" align="center">',$idatividade,'</div></td>
			    <td width="306" align="center">',$login,'</td>
			    <td width="528" align="center">',$area_origem,'</td>
			    <td width="261" align="center">',$tipo,'</td>
			    <td width="272" align="center">',$dt_inclusao,'</td>
			    <td width="118"></td>
			  </tr>';
				}
		echo "</table>";
		break;
		
		case 4:
				include "bd.php";
				$sql_verifca = "SELECT * FROM chamados WHERE status = 'CONCLUIDO' ORDER BY status ASC";
				$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());

				$acao_pedidos = mysql_query($sql_verifca) or die (mysql_error());
				$num = mysql_num_rows($acao_pedidos);
				
				echo '<p><font color="#a0873c" size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>M&oacute;dulo de consulta - Chamados conclu&iacute;dos</strong></font></p>

<p align="left"><font color="#464646" size="2" face="Arial, Helvetica, sans-serif">Existe um total de <?php echo "<font color="#464646" face="arial" size="2"><strong> ',$num,' atividades</strong> j&aacute; conclu&iacute;das. </font><font color="#464646" size="2" face="Arial, Helvetica, sans-serif">Clique 
  em &quot;<strong>Abrir</strong>&quot; para trabalhar :</font></p>
<table width="100%" border="0">
  <tr bgcolor="#AAAAAA" class="style5">
    <td width="171"><div align="center" class="style6"><span class="style5">Nº do chamado</span></div></td>
    <td width="306"><div align="center" class="style6"><span class="style5">Usuario de input</span></div></td>
    <td width="528"><div align="center" class="style6">&Aacute;rea de Imput</div></td>
    <td width="261"><div align="center" class="style6"><strong>Tipo de solicita&ccedil;&atilde;o</strong></div></td>
    <td width="272"><div align="center" class="style6"><span class="style5">Data de Input</span></div></td>
    <td width="118"><div align="center" class="style6">ABRIR</div></td>
  </tr>';	
				while($linha_atv = mysql_fetch_assoc($acao_pedidos))
				{
				$idatividade			=	$linha_atv["id"];
				$dt_inclusao			=	$linha_atv["dt_inclusao"];
				$dt_prev				=	$linha_atv["dt_prev"];
				$tipo					=	$linha_atv["tipo"];
				$login					=	$linha_atv["login"];
				$area_destino			=	$linha_atv["area_destino"];
				$area_origem			=	$linha_atv["area_origem"];
				$status					=	$linha_atv["status"];
				$dt_conclusao			=	$linha_atv["dt_conclusao"];
				$descricao				=	$linha_atv["descricao"];
				$titulo					=	$linha_atv["titulo"];
				
			echo '<tr bgcolor="#DDDEDD" >
    			<td width="171" align="center">',$idatividade,'</div></td>
			    <td width="306" align="center">',$login,'</td>
			    <td width="528" align="center">',$area_origem,'</td>
			    <td width="261" align="center">',$tipo,'</td>
			    <td width="272" align="center">',$dt_inclusao,'</td>
			    <td width="118"></td>
			  </tr>';
				}
		echo "</table>";
		break;
			}
	}
?>
</div>
<?php
}
?>
</body>
</html>