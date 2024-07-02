<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

<title>SCS - BI</title>
	<link rel="StyleSheet" href="../empreza.css" type="text/css" />
	<script type="text/javascript" src="../menu/dtree.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- Código para abertura de POP UP -->
<script language="JavaScript">
function abrir(URL) {
 
  var width = 150;
  var height = 250;
 
  var left = 99;
  var top = 99;
 
  window.open(URL,'janela','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=30%,height=20%');
  document.location.replace('menu_1.php?ide={$ide}&n_chamado={$n_chamado}');
 
}
</script>

<!-- Função para alterar os campos na inserção de Chamado  -->
<script>

function HabCampos() 
{
	  if (document.getElementById('relatorio').checked) 
	  {
		document.getElementById('campo_sistema').style.display = "none";
		document.getElementById('campo_projeto').style.display = "none";
		document.getElementById('campo_seguranca').style.display = "none";
		document.getElementById('campo_relatorio').style.display = "";
		document.getElementById('selectfield').focus();
	  }
	   else 
	  {
		
		document.getElementById('campo_relatorio').style.display = "none";
	  }
	  if (document.getElementById('sistema').checked) 
	  {
		document.getElementById('campo_sistema').style.display = "";
		document.getElementById('campo_projeto').style.display = "none";
		document.getElementById('campo_relatorio').style.display = "none";
		document.getElementById('campo_seguranca').style.display = "none";
		document.getElementById('selectfield').focus();
	  }
	   else 
	  {
		
		document.getElementById('campo_sistema').style.display = "none";
	  }
	  if (document.getElementById('projeto').checked) 
	  {
		document.getElementById('campo_sistema').style.display = "none";
		document.getElementById('campo_projeto').style.display = "";
		document.getElementById('campo_relatorio').style.display = "none";
		document.getElementById('campo_seguranca').style.display = "none";
		document.getElementById('selectfield').focus();
	  }
	   else 
	  {
		
		document.getElementById('campo_projeto').style.display = "none";
	  }
	  if (document.getElementById('seguranca').checked) 
	  {
		document.getElementById('campo_sistema').style.display = "none";
		document.getElementById('campo_projeto').style.display = "none";
		document.getElementById('campo_relatorio').style.display = "none";
		document.getElementById('campo_seguranca').style.display = "";
		document.getElementById('selectfield').focus();
	  }
	   else 
	  {
		
		document.getElementById('campo_seguranca').style.display = "none";
	  }
}
</script>
</head>

<body>
<a href="menu_1.php?ide=<?php echo $ide ?>"><img style="border:" id="top_img" class="menu" src="../img/logo_empreza_3.jpg"></a>
 <?php
 include "../bd.php";
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
 }
 if (!isset($m)){
		$m = 0;
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
 if($perfil == 3){ ?>   
<div id="top" class="menu">
	<?php
	  date_default_timezone_set("Brazil/East");
	  $data_login = date("H:i:s");
	?>
    	<p class="top" align="left">Usuário: <?php echo "$nome";?></p>
        <p class="top" align="right"><?php include "../data/data2.php";?></p>
</div>
<!-- INICIO DA DIV DA ESQUERDA - MENU -->
<div id="left" class="menu">
 <div id="left" class="dtree">
    <script type="text/javascript">
		<!--
		d = new dTree('d');
		d.add(0,-1,'SCS - M&oacute;dulo Coordenador');
		  d.add(1,0,'Chamados');
		    d.add(2,1,'Inclus&atilde;o de Chamado',
			'menu_1.php?ide=<?php echo "$idusuario"?>&m=1','','_self');
			d.add(3,1,'Aguardando Tratamento',
			'menu_1.php?ide=<?php echo "$idusuario"?>&m=2','','_self');
		    d.add(4,1,'Chamados conclu&iacute;dos',
			'menu_1.php?ide=<?php echo "$idusuario"?>&m=3','','_self');
		  d.add(5,0,'Meu Perfil');
            d.add(6,5,'Alterar Senha',
			'menu_1.php?ide=<?php echo "$idusuario"?>&m=5','','_self');
            d.add(7,5,'Logout',
			'menu_1.php?ide=<?php echo "$idusuario"?>&m=6','','_self');
		d.draw();
		//-->
	</script>
</div>
</div>
<?php }?>
<div id="rigth" class="menu">
 <?php
if($perfil == 3){
			switch ($m){
				case 1:				
					include "inserir_chamado.php";
					break;
					
				case 2:								
					include "pesquisa_tramitando.php";
					break;
		
				case 3:
					include "pesquisa_concluido.php";
					break;
					
					//valor reservado para abertura do chamado
					case 4:
						include "abrir_chamado.php";
						break;
						
				case 5:
					include "altera_senha.php";
					break;
				
				case 6:
					include "logout.php";
					break;
			}
	}
}
?>
</body>
</html>