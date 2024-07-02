<?php
//Consulta que separa de 10 em 10 conteúdos exibidos por página
//Autor: Lauro Pereira
//Grupo Empreza

if(!isset($cont))$cont = 0;
if(!isset($limite))$limite = 0;

//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
if(!isset($limite) || $limite < 0){
	$limite = 0;
}

//Executa pesquisa de pedidos tramitando
include "../bd.php";
$sql_usuarios = mysql_query("SELECT * FROM tbl_usuarios WHERE nome <> \"-\" ORDER BY nome;");

//Armazena o total de pedidos tramitando
$num = mysql_num_rows($sql_usuarios);
?>

<!--  Forma o cabeçalho da tabela  -->
<h2>M&oacute;dulo de consulta - Usu&aacute;rios cadastrados</h2>
<table border="1" class="default">
  <tr>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="10%">ID</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="40%">Nome</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="10%">Login</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%" >&Aacute;rea</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="5%">Perfil</td>
	<td style="background-color:#AAAAAA; font-weight:bold;" align="center" colspan="3">Opera&ccedil;&otilde;es</td>
  </tr>
<?php
//Executa o Array sequencial que salvará os dados na tabela				
	for($i=0;$i < (($limite*10)+10); $i++){
				
				$linha_atv 				= mysql_fetch_assoc($sql_usuarios);
				$id						=	$linha_atv["id"];
				$nome					=	$linha_atv["nome"];
				$area					=	$linha_atv["area"];
				if($linha_atv["perfil"] == 1)
						{$perfil		=	"Coordenador";}
					else{$perfil		=	"Usuario";}
				$login					=	$linha_atv["login"];
				$senha					=	$linha_atv["senha"];

//Controla se os dados que serão exibidos estão de acordo com o solicitado (de 10 em 10)	
		if($i >= ($limite * 10) && $i < mysql_num_rows($sql_usuarios) && $nome != "-"){
			$cont = $cont + 1;
			echo '<tr>
    			<td align="center" width="2%">',$id,'</td>
				<td align="center" width="45%">',$nome,'</td>
				<td align="center" width="10%">',$login,'</td>
				<td align="center" width="15%" >',$area,'</td>
				<td align="center" width="4%">',$perfil,'</td>
				<td align="center" width="7%" ><a style="color:#0033FF" 
					href="menu_1.php?m=7&ide='.$ide.'&id='.$id.'">editar</a>
				</td>
				<td align="center" width="10%" ><a style="color:#0033FF" 
					href="reseta_senha.php?ide='.$ide.'&id='.$id.'">resetar&nbsp;senha</a>
				</td>
				<td align="center" width="7%" ><a style="color:#0033FF" 
					href="deleta_usuario.php?ide='.$ide.'&id='.$id.'">Excluir</a>
				</td>
			  </tr>';		
		}
	}
//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
//nem que seja incrementada quando não houver valores a serem exibidos.
	if(($limite*10) > $num || $limite < 0){
		echo "<script>history.back()</script>";
	exit;
	}

//Constrói o rodapé da tabela
		echo "<tr>
				<td>
					<a href=\"menu_1.php?m=6&ide=$ide&limite=".($limite-1)."\"> << Exibir &nbsp;&nbsp;&nbsp;&nbsp;menos</a>
				</td>
				<td colspan=\"6\"><font><center>Exibindo do <strong>".(($limite*10)+1)."</strong> até o <strong>".(($limite*10)+$cont)."</strong> de um total de <strong>"
				.mysql_num_rows(mysql_query("SELECT * FROM tbl_usuarios WHERE nome <> \"-\";"))." usu&aacute;rios cadastrados.</center></font></td>
				<td>
					<a href=\"menu_1.php?m=6&ide=$ide&limite=".($limite+1)."\">Exibir mais>></a>
				</td>
			  </tr>
		";
?>
</div>