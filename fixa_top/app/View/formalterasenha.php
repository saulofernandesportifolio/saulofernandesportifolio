﻿
<?php
require_once '../fixa_top/app/Model/cripto.php';

$cripto = new cripto();

$id_usuario= $_GET['id'];

$id_usuario = $cripto->decodificar($id_usuario);

$sql_serv = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";

$acao_serv=mysql_query($sql_serv,$conecta);

$linha = mysql_fetch_array($acao_serv);

?>
<div class="bradius wrapper">
	<form action="principal.php?&id=<?php echo $cripto->codificar($id_usuario) ?>&t=Controller/sql_formalterarsenha.php"  method="POST">
		<input type="hidden" value="0" id="conterro" />
		<fieldset>
			<h2>Alterar Senha Usuário</h2>
			<br/>
			<div class="div_forms">
				<label>Usuário:</label> 
					<input 
						type="text" 
						name="nome" 
						disabled="true" 
						onkeyup="ValidaEntrada(this,'tetx');" 
						id="nome"  
						size="60" 
						class="txt bradius" 
						value="<?php echo $linha['nome']; ?>"
					/>
			</div>
			<div class="div_forms">
				<label>Nova Senha:</label> 
				<input type="password" name="senha" onkeyup="ValidaEntrada(this,'tetx');" id="senha"  size="60" class="txt bradius" value=""/>
			</div>
			<br/>
			 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
			 <input type="reset" value="Limpar" class="sb2 bradius"/>
			 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onClick="history.back();"/>
			 </div>
		</fieldset>
	</form>
</div>

</body>
</html>

