<?php
  date_default_timezone_set("Brazil/East");

$dataatual = date("H:i:s");
$data_hoje = date("Y/m/d");

if (!isset($_COOKIE['valida_log']) || ($_COOKIE['valida_log'] == "")) {
    echo "<br><font color='#999999' face='arial' size='2'>Favor fazer o login corretamente.</font>";
    echo "<hr><input type='button' name='voltar' value='<< Voltar' onclick =" .
        "window.location='index.php'" . ">";
    exit;
}
?>
<html>
<title>Controle de Ponto on-line</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<head>
<style type="text/css">
<!--
.Titulo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	text-align: center;
}

		#menubv {
		width: 15em;
		padding: 0;
		margin: 25;
		font-family: Verdana; 
		font-size: 11px;		
		}
	
		#menubv ul {
		list-style: none;
		margin: 0;
		padding: 0;
		}
	
		#menubv li {
		border-bottom: 1px solid #EBEBEB;
		margin: 0;
		}
	
		#menubv li a {
		display: block;
		padding: 5px 5px 5px 0.5em;
		font-weight:bold;
		border-left: 10px solid #F9F9F9;
		border-right: 10px solid #F9F9F9;
		background-color: #F9F9F9;
		color:#333333;
		text-decoration: none;
		}
	
		#menubv li a:hover {
		background-color:#EBEBEB;
		color:#333333;
		}
	
		/* Fix IE. Hide from IE Mac \*/
		* html ul#menubv  li { float: left; height: 1%; }
		* html ul#menubv  li a { height: 1%; }
		/* End */

	/*+++++++++++++++ RELATIVO AS CATEGORIAS +++++++++++++++++++++*/
	
	/**** LINKS DOS NOMES DAS CATEGORIAS ****/
	
	/* Link em estado natural*/
	

	a.link_menu:link{
	
	color:black;
	text-decoration: none;
	font-weight: normal;
	font-family: verdana;
	font-size: 11px;

	}
	
	/* Link depois de visitado*/
	a.link_menu:visited
	{
	color: black;
	text-decoration: none;
	font-weight: normal;
	font-family: verdana;
	font-size:11px;
	}
	
	/* Link ao passar o mouse*/
	a.link_menu:hover
	{
		display: block;
		padding: 1px 1px 1px ;
		text-decoration: none;
		background-color:#F9F9F9;
		color:#333333;
}	
	
	/**** FIM LINKS DOS NOMES DAS CATEGORIAS ****/
	
	/**** CELULAS DOS NOMES DAS CATEGORIAS ****/
	/*padding top right bottom left */
	
	.titulo_menu{	   
	    background-color:#F4F4F4;
	    background-image:url(none);
		width:150px;
		height:25px;
		border-left: 10px solid #F9F9F9;
		border-right: 10px solid #F9F9F9;
		border:1px solid #EBEBEB;
		padding: 5px 0px 0px 5px;
		

	}
	/**** FIM CELULAS DOS NOMES DAS CATEGORIAS ****/
	
	/*++++++++++++ FIM RELATIVO AS CATEGORIAS +++++++++++++++++++++*/		
	
	
	
	/*++++++++++++  RELATIVO AS SUB-CATEGORIAS +++++++++++++++++++++*/
	
	/**** LINKS DOS NOMES DAS SUB-CATEGORIAS ****/
	/* Link em estado natural*/
	
	a.link_smenu:link
	{
	color:black;
	text-decoration: none;
	font-weight: normal;
	font-family: verdana;
	font-size: 11px;
	}
	
	/* Link depois de visitado*/
	a.link_smenu:visited
	{
	color: black;
	text-decoration: none;
	font-weight: normal;
	font-family: verdana;
	font-size:11px
}	
	
	/* Link ao passar o mouse*/
	a.link_smenu:hover
	{
		display: block;
		padding: 1px 1px 1px ;
		text-decoration: none;
		background-color:#EBEBEB;
		color:#333333;
		}
	
	/**** LINKS DOS NOMES DAS SUB-CATEGORIAS ****/
		
	/**** CELULAS DOS NOMES DAS SUB-CATEGORIAS ****/
	/*padding top right bottom left */
	
	.itens_menu{
	    background-color:#F9F9F9;
	    background-image:url(none);
		width:200px;
		height:25px;
		border:1px solid #EBEBEB;
		padding: 5px 0px 0px 5px;
	}	
	
	/**** FIM CELULAS DOS NOMES DAS SUB-CATEGORIAS ****/
	
	/**** CELULAS DE REVEZAMENTO DOS NOMES DAS SUB-CATEGORIAS ****/
	.itens_menu_r{
	   background-color:#0099ff;
		background-image:url(none);
		width:150px;
		height:25px;
		border:1px solid red;
		padding: 5px 0px 0px 5px;		
	}	
	
	/**** FIM CELULAS DE REVEZAMENTO DOS NOMES DAS SUB-CATEGORIAS ****/
	
	/*++++++++++++ FIM RELATIVO AS SUB-CATEGORIAS +++++++++++++++++++++*/	

-->
</style>

	<script language="javascript">
	   c=0
		du="";
	   function escondediv(dv,n){		
		    
		   for(i=1;i<=n;i++){			
			   if(i==dv ){
				   if(du!=dv){
				      document.getElementById('mdiv'+i).style.display="inline"
					   du=dv
					}else{
					   du=""
					   document.getElementById('mdiv'+i).style.display="none"
					}
			   }else{
				     document.getElementById('mdiv'+i).style.display="none"				  					
			   }				
				
			}		
		}
		
	function reveza(qq){
	  document.getElementById(qq).className="itens_menu_r"
	}
	function volta(qq){
	  document.getElementById(qq).className="itens_menu"
	}
	</script>
	<!-- ||||||||||||| FIM FUNÇÕES JAVASCRIPT (NÃO EDITE) |||||||||||||||| -->	


</head>
<body>

  <p></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<?php

include "abreconexao.php";

echo $usuario=$_COOKIE["id"];

$sql_nome = "SELECT nome, perfil, acesso FROM usuarios WHERE id = '$usuario'";

$acao_nome = mysql_query($sql_nome) or die (mysql_error());

while($linha_nome=mysql_fetch_assoc($acao_nome))
	{
			$nome 		= $linha_nome["nome"];
			$perfil		= $linha_nome["perfil"];
			$acesso		= $linha_nome["acesso"];
	}
	

if($acesso == 1)
{
			echo "<script>alert('E necessaria a alteração de senha no primeiro acesso!.'); 
            document.location.replace('frame.php?t=alterar_senha3.php'); </script>\n";
			exit;
}

else{


if ($perfil == 1)
{

?>

<p><?php echo "<font size='1' face='verdana' color='#999999'>Ol&aacute;, $nome.</font>" ?> 
<p>&nbsp; 
<div align="left"> <a href="conteudo.php" target="conteudo"> </a><font color="#666666" size="1" face="Arial, Helvetica, sans-serif"><strong><u><font color="#FFFFFF"></font><font color="#000000">MENU</font></u></strong></font></div>
<ul id="menubv">
  <li> <a href="frame.php?t=reg_hora.php"  title="Registrar Ponto">Registrar Ponto</a> 
  </li>
  <li> <a href="frame.php?t=consulta_horas.php" title="Consultar Horas">Consulta Ponto</a> </li>
   <li> <a href="frame.php?&usuario=<?php echo "$usuario"?>&t=alterar_senha.php" title="Alterar Senha">Alterar Senha</a> </li>
   <li> <a href="frame.php?&usuario=<?php echo "$usuario"?>&t=logout.php"  title="Logout">Logout</a> </li>
</ul>
</div>
<?php
}

if ($perfil == 2 || $perfil == 3)
{
?>

<script>
//Coloque aqui o número de itens de menu
n_divs='3'
</script>


<p><?php echo "<font size='1' face='verdana' color='#999999'>Ol&aacute;, $nome.</font>" ?> 
<p>&nbsp; 
<div align="left"> 
  <p><a href="conteudo.php" target="conteudo"> </a><font color="#666666" size="1" face="Arial, Helvetica, sans-serif"><strong><u><font color="#FFFFFF"></font><font color="#000000">MENU</font></u></strong></font></p>
</div>
<div class="titulo_menu"  ><a href="javascript:void(escondediv('1',n_divs))" class="link_menu" >Ponto</a></div>
<div id="mdiv1"  style="display:none">
   <table border="0">
	   <tr><td class="itens_menu"><a href="consulta_ponto.php?&usuario=<?php echo "$usuario"?>" class="link_smenu" target="conteudo">Consultar Pontos</a></td></tr>
  	   <tr><td class="itens_menu"><a href="controle_faltas.php?&usuario=<?php echo "$usuario"?>" class="link_smenu" target="conteudo">Controle de Faltas</a></td></tr>
	   <tr><td class="itens_menu"><a href="registrar_horar.php?&usuario=<?php echo "$usuario"?>" class="link_smenu" target="conteudo">Registrar Horarios</a></td></tr>
	   <tr><td class="itens_menu"><a href="registrar_horar_atrasos.php?&usuario=<?php echo "$usuario"?>" class="link_smenu" target="conteudo">Registrar Horarios - Atrasos</a></td></tr>
	</table>
</div>

<div class="titulo_menu"><a href="javascript:void(escondediv('2',n_divs))" class="link_menu">Banco de Horas</a></div>
<div id="mdiv2"  style="display:none">
   <table border="0">
	   <tr><td class="itens_menu"><a href="consulta_banco_horas.php?&usuario=<?php echo "$usuario"?>" class="link_smenu" target="conteudo">Consultar Banco de Horas</a></td></tr>
	</table>
</div>

<div class="titulo_menu"><a href="javascript:void(escondediv('3',n_divs))" class="link_menu">Administra&ccedil;&atilde;o</a></div>
<div id="mdiv3"  style="display:none">
   <table border="0">
   		<tr><td class="itens_menu"><a href="alterar_senha.php?&usuario=<?php echo "$usuario"?>" class="link_smenu" target="conteudo">Alterar Senha</a></td></tr>
	   <tr><td class="itens_menu"><a href="criar_usuario.php?&usuario=<?php echo "$usuario"?>" class="link_smenu" target="conteudo">Criar Usuario</a></td></tr>
		<tr><td class="itens_menu"><a href="editar_usuario.php?&usuario=<?php echo "$usuario"?>" class="link_smenu" target="conteudo">Editar Usuario</a></td></tr>
		<tr><td class="itens_menu"><a href="reset_senha.php?&usuario=<?php echo "$usuario"?>" class="link_smenu" target="conteudo">Reset de Senhas</a></td></tr>
	</table>
</div>


<?php
}}
?>
</body>
</html>