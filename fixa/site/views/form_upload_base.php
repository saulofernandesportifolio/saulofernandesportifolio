
<?php
//setup default
require_once '../fixa/site/classes/cripto.php';

$cripto = new cripto();

$id_usuario= $_GET['id'];

$id_usuario = $cripto->decodificar($id_usuario);

$sql_serv = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";

$acao_serv=mysql_query($sql_serv,$conecta);

$linha = mysql_fetch_array($acao_serv);

?>
<div class="bradius wrapper">
	<form 
		action="principal.php?&id=<?php echo $cripto->codificar($id_usuario)?>&t=controles/sql_formuploadbase.php" 
		method="POST"	
		enctype="multipart/form-data"
		onsubmit="showLoader()"
	>
		<fieldset>
			<h2>Importar base de dados</h2>
			<br/>
			<div> 
				<select name="base" id="base" class="txt2comboboxpadraoOld bradius" required>
					<option value="" disabled selected hidden>Escolha a base</option>
			   		<option value="1">Gestao Servicos</option>
			   		<option value="2">Siscom Vendas</option>
			   		<option value="3">Siscom Servicos</option>
			   		<?php if($id_usuario == 1 || $id_usuario == 2){?>
			   		<option value="4">Carteira Clientes Ativos</option>
			   		<option value="5">Base Pré-Tramitação</option>
			   		<option value="6">Base Tramitação</option>
			   		<option value="7">Base Pós-Tramitação</option>
			   		<option value="8">Base Intragov</option>
			   		<option value="9">Base Gcon</option>
			   		<?php }?>
			  	</select>
			</div>
			<div>
				<input 
					type="file" 
					id="file"  
					class="txt bradius" 
					name="file"
					size= "50"
					placeholder = "Arquivo"
					required 
				/>
			</div>
			<div>
				<p>Orientações de envio:</p>
				<p>1. Utilize os templates disponibilizados abaixo.</p>
				<p>2. O arquivo deve ter somente uma planilha.</p>
				<p>3. Não apague o cabeçalho.</p>
				<p>3. Não mude a ordem das colunas.</p>
				<a href="../fixa/site/arq/siscom_servico_template.xlsx" download>Template Siscom Serviço</a>
				<br/>
				<a href="../fixa/site/arq/siscom_vendas_template.xlsx" download>Template Siscom Vendas</a>
				<br/>
				<br/>
			</div>
			<div>
				 <input 
				 	name="submit" 
				 	id="submitData" 
				 	type="submit" 
				 	value="Importar" 
				 	class="sb2 bradius" 
			 	/>
			 	<input 
			 		name="cancelar" 
			 		type="button" 
			 		value="Cancelar" 
			 		class="sb2 bradius" 
			 		onClick="history.back();"
		 		/>
		 		<br/>
		 		<img id="loader" src="../fixa/images/loading.gif"/>
			</div>
	 	</fieldset>
	</form>
</div>

</body>
</html>

  
    