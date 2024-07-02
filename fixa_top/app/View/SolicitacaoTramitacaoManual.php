<script type="text/javascript" src="js/Tramitacao.js"></script>

<?php
//parametros
$id_usuario = $_GET['id']; 
?>
<body>
	<div class="div_forms" id="form_solicitacao_manual">
		<label class="textoParagrafo">Nova solicitação?</label><br/>
		<label class="radio-inline textoParagrafo">
		  	<input 
		  		style="width: 24px;" 
		  		type="radio" 
		  		name="nova_solicitacao" 
		  		id="nova_solicitacao" 
		  		value="Sim"
		  		checked="true" 
	  		> Sim
		</label>
		<label class="radio-inline textoParagrafo">
		  	<input 
		  		style="width: 24px;" 
		  		type="radio" 
		  		name="nova_solicitacao" 
		  		id="nova_solicitacao" 
		  		value="Nao"
	  		> Não
		</label>
		<button onclick="gerarProtocoloSolicitacao('tramitacao')" style="color: white; width: 5%; margin-top: 0%; background-color: #7b682e" type="button" id="avancar_solicitacao_manual">Avançar</button>
	</div>
	<div id="solicitacao_manual_nova" style="display: none"> 
	    <label class="textoParagrafo">Protocolo da solicitação*:</label>
	        <input 
	        	class="campos_desabilitados" 
	        	type="text" 
	        	id="n_solicitacao_manual" 
	        	disabled="true"
	        	style="width: 10%;  text-align: center" 
	        	>
	        	</input>
	    <label class="textoParagrafo">Data recebimento/retorno da solicitação*:</label>
			<input 
				type="text"
				id="data_recebimento_solicitacao"
				name="data_recebimento_solicitacao" 
				class="campoDataHora inputsTextTabelas"
				placeholder = "dd/mm/aaaa hh:mm:ss"
				onblur = "validaData(this)";
				style="width: 11%;"
				required
			>
			<input name="bt_enviar" onclick="enviarSolicitacao(this, '<?php echo $id_usuario?>', 'solicitacao_manual', 'tramitacao');" id="bto_enviar" type="button" value="Salvar" class="sb2 bradius" />
	</div>
	<div id="solicitacao_manual_existente" style="display: none;">
		  <label class="textoParagrafo">Informe o Protocolo da Solicitação:</label>
        	<input class="inputsTextTabelas" type="text" id="n_solicitacao_existente"></input>
       		 <a href="#" class="estiloLupa" id="consultaSolicitacaoExistente"><i class="fa fa-search"></a></i>
	</div>
</body>