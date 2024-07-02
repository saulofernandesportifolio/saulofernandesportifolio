<?php
include "bd.php";

$sql = "SELECT * FROM feed WHERE id = '".$id_feed."';";
$acao = mysql_query($sql) or die (mysql_error());
while($linha = mysql_fetch_array($acao))
{
    $titulo         = $linha["titulo"];
    $us_post        = $linha["us_post"];
    $dt_post        = $linha["dt_post"];
	$dt_edicao		= $linha["dt_edicao"];
    $tipo           = $linha["tipo"];
	$conteudo       = $linha["conteudo"];
	$adwords        = $linha["adwords"];
	$arquivo        = $linha["arquivos"];
    $imagem         = $linha["imagem"];
}
?>
<br /><h2><?php echo $titulo;?></h2>
<p style="font:13px; font-weight:600;">Área relacionada: <?php switch ($tipo) {	
                                            case "PR": echo "Procedimenros";break;
											case "RH": echo "Recursos Humanos";break;
											case "LD": echo "Liderança";break;
                                            case "NT": echo "Notícias";break;
											case "todos": echo "Todas";break;
											}?>

<br />
<p><?php echo nl2br($conteudo);?></p>
<br />
<?php if(isset($imagem) && $imagem != "_N/A"){ ?>
    <center><a target="new"  href="imagens/<?php echo $imagem; ?>">
    <img width="100%" src="imagens/<?php echo $imagem; ?>" align="middle" /></a>
    </center>
    <?php } ?>
<?php if(isset($arquivo) && $arquivo != "_N/A"){ ?>
	<p>Arquivo anexado: <a target="new" href="arquivos/<?php echo $arquivo;?>"><?php echo htmlentities(substr($arquivo,strpos($arquivo,"_")+1));?></a></p>
<?php }else { ?>
	<p style="font-size:13px"><strong>nenhum arquivo anexado.</strong></p>
<?php }?>
<br />
<p style="text-align:right; font-size:13px" >Post de <strong><?php echo $us_post; ?></strong>, em <strong><?php echo substr($dt_post,8,2)."/".substr($dt_post,5,2)."/".substr($dt_post,0,4);?> às <?php echo substr($dt_post,10,6); ?></strong></p>
<?php if(!empty($dt_edicao)){ ?>
<p style="text-align:right; font-size:12px; color:#CC0000" >Editado em <strong><?php echo substr($dt_edicao,8,2)."/".substr($dt_edicao,5,2)."/".substr($dt_edicao,0,4);?> às <?php echo substr($dt_edicao,10,6); ?></strong></p>
<?php }?>
<br /><br />
<a href="index.php">Voltar</a>
<?php if(isset($_COOKIE['login']) && $us_post == $_COOKIE['login']){ ?>
<a style="padding-left: 40%;margin-right: 35%;" href="index.php?func=edit_feed&id_feed=<?php echo $id_feed; ?>">Editar</a>
<a href="index.php?func=exc_feed&id_feed=<?php echo $id_feed; ?>" >Excluir</a>
<?php }?>
