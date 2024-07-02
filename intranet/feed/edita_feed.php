<?php
include "bd.php";

$sql = "SELECT * FROM feed WHERE id = '".$id_feed."';";
$acao = mysql_query($sql) or die (mysql_error());
while($linha = mysql_fetch_array($acao))
{
    $id_feed		= $linha["id"];
    $titulo         = $linha["titulo"];
    $us_post        = $linha["us_post"];
    $dt_post        = $linha["dt_post"];
    $tipo           = $linha["tipo"];
	$conteudo       = $linha["conteudo"];
	$adwords        = $linha["adwords"];
	$arquivo        = $linha["arquivos"];
}
?>

<form id="edita_feed" enctype="multipart/form-data" method="post" action="feed/envia_feed.php?action=edicao">
<input type="hidden" name="id_feed" value="<?php echo $id_feed ?>" />
      </br>
      <H2>Inserir Feed</H2>
      <p>T&iacute;tulo: <input value="<?php echo $titulo; ?>" size="97" max="50" maxlength="50" id="titulo" name="titulo" style="background-color:#F7F4DB;" type="text"></p>
      </br>
      <p>&Aacute;rea de destino:</br>
		<table class="no_format"><tr>
      	<td><input <?php if($tipo == "RH"){echo 'checked="checked"';}?> id="tipo" name="tipo" type="radio" value="RH">Recursos Humanos</td>
        <td><input <?php if($tipo == "PR"){echo 'checked="checked"';}?> id="tipo" name="tipo" type="radio" value="PR">Procedimentos</td>
        <td><input <?php if($tipo == "LD"){echo 'checked="checked"';}?> id="tipo" name="tipo" type="radio" value="LD">Lideran&ccedil;a</td>
        <td><input <?php if($tipo == "todos"){echo 'checked="checked"';}?> id="tipo" name="tipo" type="radio" value="todos">Todas</td>
        </tr>
        </table>
      </p>
      </br>
      <p>Palavras-chave:</br>
      	<!-- Para os procedimentos --> 
		<table class="no_format"><tr>
      		<td><input <?php if(strstr($tipo,"Altas")){echo 'checked="checked"';}?> type="checkbox" id="adwords1" name="adwords1" value="Altas" />Altas</td>
	        <td><input <?php if(strstr($tipo,"TA")){echo 'checked="checked"';}?> type="checkbox" id="adwords2" name="adwords2" value="TA" />Trocas</td>
	        <td><input <?php if(strstr($tipo,"MP")){echo 'checked="checked"';}?> type="checkbox" id="adwords3" name="adwords3" value="MP" />Migração de Plano</td>
            <td><input <?php if(strstr($tipo,"procedimentos")){echo 'checked="checked"';}?> type="checkbox" id="adwords4" name="adwords4" value="procedimentos" />Procedimentos</td>
	        <td><input <?php if(strstr($tipo,"aparelhos")){echo 'checked="checked"';}?> type="checkbox" id="adwords5" name="adwords5" value="aparelhos" />Aparelhos</td>
        </tr>
        <tr>
        	<td><input <?php if(strstr($tipo,"input")){echo 'checked="checked"';}?> type="checkbox" id="adwords6" name="adwords6" value="input" />Input</td>
	        <td><input <?php if(strstr($tipo,"portabilidade")){echo 'checked="checked"';}?> type="checkbox" id="adwords7" name="adwords7" value="portabilidade" />Portabilidade</td>
            <td><input <?php if(strstr($tipo,"treinamento")){echo 'checked="checked"';}?> type="checkbox" id="adwords8" name="adwords8" value="treinamento" />Treinamento</td>
	        <td><input <?php if(strstr($tipo,"servico")){echo 'checked="checked"';}?> type="checkbox" id="adwords9" name="adwords9" value="servico" />Servi&ccedil;o</td>
	        <td><input <?php if(strstr($tipo,"promocoes")){echo 'checked="checked"';}?> type="checkbox" id="adwords10" name="adwords10" value="promocoes" />Promo&ccedil;&otilde;es</td>
       </tr>
       <tr>
      		<td><input <?php if(strstr($tipo,"RH")){echo 'checked="checked"';}?> type="checkbox" id="adwords11" name="adwords11" value="RH" />Recursos Humanos</td>
	        <td><input <?php if(strstr($tipo,"pagamento")){echo 'checked="checked"';}?> type="checkbox" id="adwords12" name="adwords12" value="pagamento" />Pagamento</td>
	        <td><input <?php if(strstr($tipo,"lideranca")){echo 'checked="checked"';}?> type="checkbox" id="adwords13" name="adwords13" value="lideranca" />Lideran&ccedil;a</td>
            <td><input <?php if(strstr($tipo,"erro")){echo 'checked="checked"';}?> type="checkbox" id="adwords14" name="adwords14" value="erro" />Erros sistemicos</td>
	        <td><input <?php if(strstr($tipo,"fechamento")){echo 'checked="checked"';}?> type="checkbox" id="adwords15" name="adwords15" value="fechamento" />Fechamento</td>
        </tr>
      </table>
      </p>
      </br>
		<?php if(isset($arquivo) && $arquivo != "_N/A"){ ?>
			<p style="font-size:13px">Arquivo anexado: <a style="font-size:13px" target="new" href="arquivos/<?php echo $arquivo;?>">
		<?php echo htmlentities(substr($arquivo,strpos($arquivo,"_")+1));?></a></p>
        <p>Substituir arquivo: <input type="file" name="arquivo" /></p>
        <?php }else { ?>
			<p style="font-size:13px"><strong>nenhum arquivo anexado.</strong></p>
            <p>Anexar arquivo: <input type="file" name="arquivo" /></p>
		<?php }?>
      		
      <p>Conte&uacute;do: </p>
      <center><textarea style="background-color:#F7F4DB; width:85%; height:100px;" id="conteudo" name="conteudo"><?php echo $conteudo; ?></textarea></center>
      </br>
      <table class="no_format"><tr>
      	<td align="left" width="30%"><input type="button" name="voltar" value="Voltar" onclick="history.back(-1)"/></td>
      	<td align="center"><input type="reset" value="Desfazer alterações"></td>
        <td align="right"><input type="submit" value="Alterar feed"></td>
      </tr></table>
</form>