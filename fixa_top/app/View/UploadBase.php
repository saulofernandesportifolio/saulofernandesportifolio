<div class="bradius wrapper">
	<form 
		action="principal.php?t=Controller/UploadBaseController.php" 
		method="POST"	
		enctype="multipart/form-data"
		onsubmit="showLoader()"
	>
		<input type="hidden" name="id_usuario" value="<?php echo $cripto->codificar($id_usuario)?>">
		<input type="hidden" name="opcao" value="importarBase">
		<fieldset>
			<h2>Importar base de dados</h2>
			<br/>
			<div> 
				<select name="base" id="base" class="txt2comboboxpadraoOld bradius" required>
					<option value="" disabled selected hidden>Escolha a base</option>
			   		<option value="1">Siscom Vendas</option>
			   		<option value="2">Siscom Serviços</option>
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
				<p style="font-size: initial;">Orientações de envio:</p>
				<p>1. Utilize os templates disponibilizados abaixo.</p>
				<p>2. O arquivo deve ter somente uma planilha.</p>
				<p>3. Não apague o cabeçalho.</p>
				<p>4. Não mude a ordem das colunas.</p>
				<p>5. Não é necessário filtrar qualquer dado na planilha do Excel, o sistema está programado para importar somente os dados de acordo com os filtros abaixo:</p>
				<br/>
				<p><b>Base Serviços</b></p>
				<br/>
				<p>Evento:</p>
				<p>Alteração de Roteador, Mudança de Endereço, Mudança de Endereço de Faturamento, Redução de Velocidade, Redução de Velocidade VCS, Alteração de Canais lógicos, Alteração de Porta VPN, Alteração de Perfil Porta VPN</p>
				<p>Serviço:</p>
				<p>VPN IP, Rede IP, Metrolan, Família X.25, Frame Relay/Interlan</p>
				<p>Escritório GN:</p>
				<p>GBC, GBM, GSC, GSI, GTB, GTP, GTR, GTL</p>
				<br/>
				<p><b>Base Vendas</b></p>
				<br/>
				<p>Status:</p>
				<p>Pedido Gerado, Liberado para Tramitação, Pedido Corrigido Pela Área Comercial, Aguardando Aprovação Vantive Prisma (Base Aprovação)</p>
				<!--<p>Produto:</p>
				<p>IP Light, Metrolan, Projeto Especial Data Center, Rede IP GPOM, Rede IP, Rede IP Combo, Rede IP Altas Velocidades, Renovação de IP Altas Velocidades, Renovação de IP Altas Velocidades Com UP, Renovação de VPN Altas Velocidades Com UP, Renovação IP Internet, Renovação IP Internet com UP, Renovação IP Internet com UP Combo, Renovação VPN, Renovação VPN com UP, Renovação VPN com UP Combo, Renovação X.25, Soluciona TI Rede IP, Soluciona TI Sem Acesso, Soluciona TI VPN, Upgrade de Metrolan, Vivo ANTIDDOS Básico, Vivo ANTIDDOS Custom, Vivo ON THE SPOT, VPN Altas Velocidades, VPN</p>-->
				<p>Escritório GN:</p>
				<p>GBC, GBM, GSC, GSI, GTB, GTP, GTR, GTL</p>
				<br/>
				<br/>
				<p style="font-size: large;font-weight: bold; color:red">*IMPORTANTE</p>
				<br>
				<p style="font-size: small;font-weight: bold; color:black">*Siscom Vendas necessário informar data do Siscom obrigatóriamente</p>
				<br/>
				<p style="font-weight: bold;">INSERIDO NOS TEMPLATES(SERVIÇOS E VENDAS) campo data de atualização Siscom, SEMPRE que esta coluna estiver preenchida o sistema irá considera-lá, se não estiver preenchida será considerada as colunas B(data) e C(hora) da base de Serviços e não irá entrar no sistema nos casos de siscom vendas</p>
				<br/>
				<p style="font-weight: bold;">Data de Atualização do Siscom deve ser informada no formato dd/mm/aaaa hh:mm:ss e tipo Texto</p>
				<br/>
				<p style="font-weight: bold;">Se a data de atualização for ANTERIOR a última data do Siscom registrada na base, a solicitação não será importada</p>
				<br/>
				<a href="../fixa_top/app/arq/template_siscom_servicos.xlsx" download>Template Siscom Serviço</a>
				<br/>
				<a href="../fixa_top/app/arq/template_siscom_vendas.xlsx" download>Template Siscom Vendas</a>
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
		 		<img id="loader" src="../fixa_top/images/loading.gif"/>
			</div>
	 	</fieldset>
	</form>
</div>

</body>
</html>

  
    