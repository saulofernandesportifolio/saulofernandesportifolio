<?php
//Autor: Lauro Pereira
//Grupo Empreza

if(!isset($cont))$cont = 0;

//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
if(!isset($limite) || $limite < 0){
	$limite = 0;
}

//Executa pesquisa de usuarios
include "bd.php";
if($_COOKIE['perfil'] == 'ADMINISTRADOR'){
	$sql_usuarios = "SELECT * FROM tbl_usuarios WHERE login <> '".$_COOKIE['login']."' ORDER BY login ASC;";
}else{
	$sql_usuarios = "SELECT * FROM tbl_usuarios WHERE login <> '".$_COOKIE['login']."' AND setor = '".$_COOKIE['setor']."' AND perfil = 'USUARIO'ORDER BY login ASC;";
}
$acao = mysql_query($sql_usuarios) or die(mysql_error());
//Armazena o total de usuarios
$num = mysql_num_rows($acao);
//EXIBE CABEÇALHO PADRÃO
echo "</br><H2>Usuários:</H2></br>";

//Executa o Array sequencial que salvará os dados na tabela				
	for($i=0;$i < (($limite*10)+10); $i++){
		$linha = mysql_fetch_assoc($acao);
	    $id_usuario	= $linha["id"];
		$nome		= $linha["nome"];
		$login		= $linha["login"];
		$senha		= $linha["senha"];
		$dt_nasc	= $linha["dt_nasc"];
		$setor		= $linha["setor"];
		$perfil		= $linha["perfil"];
		$email		= $linha["email"];
		
		//Controla se os dados que serão exibidos estão de acordo com o solicitado (de 10 em 10)	
		if($i >= ($limite * 10) && $i < $num){
			$cont = $cont + 1;
			?>
			<table style="margin-left:5px; width:95%" class="no_format"><tr>
            <td width="65%">
            <font style="font-size:12px;"><?php echo "$login - ".strtolower($perfil)." no setor de ".$setor;?></font>
            </td><td>
            <a href="solicitacao_login/troca_senha.php?id_usuario=<?php echo $id_usuario;?>">Resetar senha</a>
            <a style="padding-left:20px;" href="index.php?func=edit_user&&id_usuario=<?php echo $id_usuario;?>">editar</a>
            <a style="padding-left:20px;" href="index.php?func=exc_user&id_usuario=<?php echo $id_usuario;?>">excluir</a>
            </td></tr></table>
			<hr>
			<?php }
	}
?>
<center><a style="padding-left:25px;" href="index.php?func=add_user">Adicionar novo usuario</a></center>
<hr />
<?php
//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
//nem que seja incrementada quando não houver valores a serem exibidos.
	if(($limite*10) > $num || $limite < 0){
		echo "<script>history.back()</script>";
	exit;
	}
//Constrói o rodapé da tabela
		echo "<table class=\"no_format\"><tr>
			<td align=\"left\"><a href=\"index.php?func=adm_user&set=".$set."&limite=",($limite-1),"\">&nbsp;&nbsp;<< Exibir menos</a></td>";
		
		$pag = 0;
		$f = 0;
		for($j=0; $j < $num;$j++){
			$f = $f + 1;
			if($f == 11){$f = 1;}
			if($f == 1){$pag = $pag + 1;}
			if($j == 0){echo "<td>Paginas: ";}
			if($f == 1){
				if(($pag-1) == $limite){
					echo "<a href=\"index.php?func=adm_user&set=".$set."&limite=".($pag-1)."\">&nbsp;<u>",($pag),"</u>&nbsp;</a>";
				}else{
					echo "<a href=\"index.php?func=adm_user&set=".$set."&limite=".($pag-1)."\">&nbsp;",$pag,"&nbsp;</a>";
				}
			}
		}
		if($num == 0){echo "<td align=\"center\"><a href=\"index.php\"><u>Nenhum registro encontrado</u></a>";}
		else{
		echo "</td><td align=\"right\"><a href=\"index.php?func=adm_user&set=".$set."&limite=",($limite+1),"\">Exibir mais >></a></td>";}
		?>
	</tr></table>