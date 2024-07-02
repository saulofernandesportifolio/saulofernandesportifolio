<script type="text/javascript" src="js/Solicitacao.js"></script>
<script type="text/javascript" src="js/Apoio.js"></script>

<?php
//parametros
$id_usuario = $_GET['id']; 
$id_usuario = $cripto->decodificar($id_usuario);

?>

<div id="div_form_solicitacao" class="bradius wrapper" style="margin-left: 25%;" >
	<form 
		action="principal.php?t=Controller/ApoioManualController.php" method="POST">
		<fieldset id="fieldset_style">
			<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" name="id_usuario" id="id_usuario"></input>
			<input type="hidden" value="insereSolicitacaoApoioManual" name="opcao" id="opcao"></input>
			<h2>Apoio</h2> 
			<table id="form_apoio">
				<tr>
					<td>
						<div class="div_forms">
							<label>Solicitação</label>
							<input 
								type="text" 
								id="id_solicitacao"  
								name="id_solicitacao"
								size= "50"
								required 
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data recebimento solicitação</label>
							<input 
								type="text" 
								id="data_recebimento_solicitacao"  
								name="data_recebimento_solicitacao"
								required 
								class="campoDataHora"
								onblur = "validaData(this)";
								placeholder = "dd/mm/aaaa hh:mm:ss"
							/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Canal de entrada*</label>
							<select name="canal_entrada" id="canal_entrada" class="txt2comboboxpadrao bradius" required>
								<option></option>
								<?php 
						         
						         	$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada IN (22,23,3,4,24,25)");

						         while($rowce=mysql_fetch_array($canal_entrada)){
					                     
					        	?>
					        	<option value="<?php echo $rowce['id_canal_entrada']; ?>">
						   			<?php echo $rowce['descricao']; ?>
						   		</option>
						   		<?php 
			          				}
			     				?>
						  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Produto*</label>
							<select name="produto" id="produto"	class="txt2comboboxpadrao bradius"	required>
									<option></option>
									<?php 
										$produto=mysql_query("SELECT id_produto, UPPER(descricao) descricao FROM produto ORDER BY DESCRICAO");

										while($rowp=mysql_fetch_array($produto)){
						                     
						        	?>
						        	<option value="<?php echo $rowp['descricao']; ?>"><?php echo $rowp['descricao']; ?></option>
						        	<?php 
				          				}
				     				?>
					        	</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Serviço*</label>
							<select name="servico" id="servico" class="txt2comboboxpadrao bradius" required>
									<option>Selecione o serviço</option>
									<?php 
										
							         	$servicos=mysql_query("SELECT DISTINCT descricao FROM servicos order by descricao");

										while($rowserv=mysql_fetch_array($servicos)){							                     
						        	?>
						        		<option value="<?php echo $rowserv['descricao']; ?>"><?php echo $rowserv['descricao']; ?></option>
							   		<?php 
				          				}
				     				?>
							  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Complemento Serviço</label>
							<select id="complemento_servico" name="complemento_servico"	required class="txt2comboboxpadrao"></select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Escritório do GN</label>
							<input 
								type="text"
								id="escritorio_gn"
								name="escritorio_gn" 
								required
							>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Quantidade de acessos*</label>
							<input 
								type="text" 
								id="qtd_acessos"  
								name="qtd_acessos"
								onblur="validaQtdeAcessos(this)";
								required
							/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Observações</label>
							<input 
								type="text" 
								id="obs"  
								class="txt2comboboxpadrao bradius" 
								name="obs"
							/> 
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>CNPJ/CPF*</label>
							<input 
								type="text" 
								id="cnpj_cpf"  
								name="cnpj_cpf"
								required
							/>
						</div>
					</td>	
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Razão Social*</label>
							<input 
								type="text" 
								id="razao_social"  
								name="razao_social"
								size= "100"
								required
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Status*</label>
							<select name="status_solicitacao" id="status_solicitacao_apoio_manual" class="txt2comboboxpadrao bradius" required>
								<option></option>
								<?php 
									$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(30,31,32,15) ORDER BY descricao");
							        						         		
									while($rowss=mysql_fetch_array($statuss)){
					                     
					        	?>
						        	<option value="<?php echo $rowss['id_status_solicitacao']; ?>"><?php echo $rowss['descricao']; ?></option>
						        	<?php 
						        		}
						        	?>
		     				</select>
	     						
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Motivo devolução</label>
							<input 
								type="text" 
								name="motivo_devolucao" 
								id="motivo_devolucao" 
								class="txt2comboboxpadrao bradius"
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Descrição motivo devolução</label>
							<input 
								type="text" 
								name="descricao_motivo_devolucao" 
								id="descricao_motivo_devolucao" 
								class="txt2comboboxpadrao bradius"
							/>
						</div>
					</td>
				</tr>
			</table>
			<br/>
			<input name="bt_enviar_form" id="bt_enviar_form" type="submit" value="Salvar" class="sb2 bradius" />
	 		<input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" id="cancelar" onclick="history.back();" />
	 	</fieldset>
	</form>
</div>

  
    