<?php
/**
 * @author Lauro Pereira
 * @copyright 2013
 */
 include "../bd.php";
 
$tipos = array("PR"=>"Procedimentos","NT"=>"Notícias","RH"=>"Recursos Humanos","LD"=>"Liderança");
$array = array_keys($tipos);
$t = $_POST['type'];

$feed = mysql_query("SELECT * FROM intranet.feed WHERE tipo = '".$t."' ORDER BY dt_post DESC LIMIT 1") or die (mysql_error());
//Inicia as variaveis com os conteúdos do feed
		$linha = mysql_fetch_assoc($feed);
	    $id_feed     = $linha["id"];
	    $titulo      = $linha["titulo"];
	    $us_post     = $linha["us_post"];
	    $dt_post     = $linha["dt_post"];
	    $tipo        = $tipos[$linha["tipo"]];
		$conteudo    = $linha["conteudo"];
		$adwords     = $linha["adwords"];
?>
    <div id="destaque">
    <h2><a href="index.php?func=feed&id_feed=<?php echo $id_feed;?>"><?php echo substr($titulo,0,51);?></a></h2>
	<p><?php echo substr($conteudo,0,strrpos(substr($conteudo,0,125)," "));?>...</p>
    </div>
    <div id="leiamais" align="right">
        <br />
        <a href="index.php?func=feed&id_feed=<?php echo $id_feed;?>">leia mais...</a>
        <br />
        <br />
    </div>