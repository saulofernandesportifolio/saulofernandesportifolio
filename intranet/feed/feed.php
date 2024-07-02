<form id="add_feed" enctype="multipart/form-data" method="post" action="feed/envia_feed.php?action=criacao">
      <br />
      <h2>Inserir Feed</h2>
      <p>T&iacute;tulo: <input size="97" max="50" maxlength="50" id="titulo" name="titulo" style="background-color:#F7F4DB;" type="text"></p>
      <br />
      <p>&Aacute;rea de destino:<br />
		<table class="no_format"><tr>
      	<td><input id="tipo" name="tipo" type="radio" value="RH" />Recursos Humanos</td>
        <td><input id="tipo" name="tipo" type="radio" value="PR" />Procedimentos</td>
        <td><input id="tipo" name="tipo" type="radio" value="NT" />Not&iacute;cias</td>
        <td><input id="tipo" name="tipo" type="radio" value="LD" />Lideran&ccedil;a</td>
        <td><input checked="checked" id="tipo" name="tipo" type="radio" value="todos" />Todas</td>
        </tr>
        </table>
      </p>
      <br />
      <p>Palavras-chave:<br />
      	<!-- Para os procedimentos --> 
		<table class="no_format"><tr>
      		<td><input type="checkbox" id="adwords1" name="adwords1" value="Altas" />Altas</td>
	        <td><input type="checkbox" id="adwords2" name="adwords2" value="TA" />Trocas</td>
	        <td><input type="checkbox" id="adwords3" name="adwords3" value="MP" />Migração de Plano</td>
            <td><input type="checkbox" id="adwords4" name="adwords4" value="procedimentos" />Procedimentos</td>
	        <td><input type="checkbox" id="adwords5" name="adwords5" value="aparelhos" />Aparelhos</td>
        </tr>
        <tr>
        	<td><input type="checkbox" id="adwords6" name="adwords6" value="input" />Input</td>
	        <td><input type="checkbox" id="adwords7" name="adwords7" value="portabilidade" />Portabilidade</td>
            <td><input type="checkbox" id="adwords8" name="adwords8" value="treinamento" />Treinamento</td>
	        <td><input type="checkbox" id="adwords9" name="adwords9" value="servico" />Servi&ccedil;os</td>
	        <td><input type="checkbox" id="adwords10" name="adwords10" value="promocoes" />Promo&ccedil;&otilde;es</td>
       </tr>
       <tr>
      		<td><input type="checkbox" id="adwords11" name="adwords11" value="RH" />Recursos Humanos</td>
	        <td><input type="checkbox" id="adwords12" name="adwords12" value="pagamento" />Pagamento</td>
	        <td><input type="checkbox" id="adwords13" name="adwords13" value="lideranca" />Lideran&ccedil;a</td>
            <td><input type="checkbox" id="adwords14" name="adwords14" value="erro" />Erros sistemicos</td>
	        <td><input type="checkbox" id="adwords15" name="adwords15" value="fechamento" />Fechamento</td>
        </tr>
      </table>
      </p>
      <br />
      <p>Anexar arquivo</p><table class="no_format"><tr><td><td colspan="3"><input type="file" name="arquivo" /></td></tr>
      </table>
      <p>Conte&uacute;do: </p>
      <center><textarea style="background-color:#F7F4DB; width:85%; height:100px;" id="conteudo" name="conteudo"></textarea></center>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Inserir imagem: <input type="file" name="imagem" />
      <table class="no_format"><tr>
      	<td align="left" width="30%"><input type="button" name="voltar" value="Voltar" onclick="history.back(-1)"/></td>
      	<td align="center"><input type="reset" value="Limpar os campos" /></td>
        <td align="right"><input type="submit" value="Inserir feed" /></td>
      </tr></table>
</form>