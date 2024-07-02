<?php
include "bd.php";
$sql = "SELECT * FROM tbl_usuarios WHERE login = '".$_COOKIE["login"]."'";
$acao = mysql_query($sql) or die (mysql_error());
while($linha = mysql_fetch_array($acao))
{
    $idusuarios     = $linha["id"];
    $login          = $linha["login"];
    $senha          = $linha["senha"];
    $nome           = $linha["nome"];
    $perfil         = $linha["perfil"];
	$setor          = $linha["setor"];
	$email          = $linha["email"];
	$dt_nasc        = $linha["dt_nasc"];
}
?>
<table class="logado">
  <tr>
	<td colspan='7'>
    	<font>Usu&aacute;rio:&nbsp;<?php echo $login ;?></font>
    </td>
  	<td align="center">		
    	<div id="botao_func" class="left"><a href="index.php?func=add_event">Gerenciar eventos</a></div>
	</td>
    <td align="center">		
    	<div id="botao_func" class="center"><a href="index.php?func=edit_user&id_usuario=<?php echo $idusuarios;?>">Editar perfil</a></div>
	</td>
    <td align="center">    
        <div id="botao_func" class="center"> <a  href="index.php?func=add_feed">Adicionar Feed</a></div>
	</td>
    <?php if($perfil != "USUARIO"){ ?>
    <td align="right">
    	<div id="botao_func" class="right"><a  href="index.php?func=adm_user">Gerenciar usu&aacute;rios</a></div>
    </td>
	<?php }?>
	<td align="left" >
    	<form action="logout.php"><input type="submit" value="Logout"></form>
    </td>
  </tr>
</table>