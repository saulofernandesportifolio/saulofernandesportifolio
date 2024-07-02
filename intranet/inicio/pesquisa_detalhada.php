<?php setcookie('sql_pesquisa','');?>
<form method="post" action="index.php?func=pesq">
      <br />
      <h2>Pesquisa detalhada:</h2>
     <p>Assunto: <input size="50" max="50" maxlength="50" id="assunto" name="assunto" style="background-color:#F7F4DB;" type="text"></p>
      <br />
       <p>&Aacute;rea:<br />
		<table class="no_format"><tr>
      	<td><input id="tipo" name="tipo" type="radio" value="RH" />Recursos Humanos</td>
        <td><input id="tipo" name="tipo" type="radio" value="PR" />Procedimentos</td>
        <td><input id="tipo" name="tipo" type="radio" value="LD" />Lideran&ccedil;a</td>
        <td><input checked="checked" id="tipo" name="tipo" type="radio" value="*" />Todas</td>
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
      <table class="no_format"><tr>
      	<td align="left" style="padding-left:20px;">
        	<input type="button" name="voltar" value="Voltar" onclick="history.back(-1)"/></td>
      	<td align="center" style="padding-left:60px;">
        	<input type="reset" value="Limpar os campos" /></td>
        <td align="right">
        	<input type="submit" value="Pesquisar" /></td>
      </tr></table>
      <input type="hidden" name="pesquisa" value="detalhada" />
</form>