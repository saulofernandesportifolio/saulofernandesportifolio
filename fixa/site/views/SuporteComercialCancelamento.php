<script type="text/javascript" src="js/funcoesJs.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

<?php
//parametros
$id_usuario = $_GET['id']; 
$id_usuario = $cripto->decodificar($id_usuario);

?>

<div id="div_form_solicitacao" class="bradius wrapper" style="margin-left: 25%;" >
	<form 
		action="principal.php?t=controles/SuporteComercialCancelamentoController.php" method="POST">
		<fieldset id="fieldset_style">
			<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" name="id_usuario" id="id_usuario"></input>
			<input type="hidden" value="insereSolicitacaoSuporteComercialCancelamento" name="opcao" id="opcao"></input>
			<h2>Suporte Comercial Cancelamento</h2> 
			<table id="form_apoio">
				<tr>
					<td>
						<div class="div_forms">
							<label>Nº Protocolo</label>
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
							<label>Canal de entrada*</label>
							<select name="canal_entrada" id="canal_entrada" class="txt bradius" required>
								<option></option>
								<?php 
						         
						         	$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada IN (4,14,22)");

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
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Data recebimento solicitação</label>
							<input 
								type="text" 
								id="data_recebimento_solicitacao"  
								name="data_recebimento_solicitacao"
								required 
								class="campoData"
								onblur = "validaData(this)";
								placeholder = "dd/mm/aaaa"
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Tipo de Categoria*</label>
							<select name="categoria_produto" id="categoria_produto"	class="txt bradius"	required>
									<option></option>
									<option value="DADOS">DADOS</option>
									<option value="VOZ">VOZ</option>
									<option value="SOLUÇÃO TI">SOLUÇÃO TI</option>
									<option value="SOLUÇÃO DATA CENTER">SOLUÇÃO DATA CENTER</option>
					        	</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Produto*</label>
							<select name="produto" id="produto"	class="txt bradius"	required>
									<option></option>
									<?php 
										$produto=mysql_query("SELECT id_produto, UPPER(descricao) descricao FROM produto
											WHERE categoria_produto = 'scsiscom'
										    ORDER BY DESCRICAO");

										while($rowp=mysql_fetch_array($produto)){
						                     
						        	?>
						        	<option value="<?php echo $rowp['descricao']; ?>"><?php echo $rowp['descricao']; ?></option>
						        	<?php 
				          				}
				     				?>
					        	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Serviço*</label>
							<select name="servico" id="servico" class="txt bradius" required>
									<option>Selecione o serviço</option>
									<?php 
										
							         	$servicos=mysql_query("SELECT DISTINCT descricao FROM tipo_solicitacao 
											WHERE categoria_produto = 'scsiscom'
							         		ORDER BY descricao");

										while($rowserv=mysql_fetch_array($servicos)){							                     
						        	?>
						        		<option value="<?php echo $rowserv['descricao']; ?>"><?php echo $rowserv['descricao']; ?></option>
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
							<label>Complemento Serviço</label>
							<input 
								type="text" 
								id="complemento_servico"  
								name="complemento_servico"
								required
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Quantidade*</label>
							<input 
								type="text" 
								id="quantidade"  
								name="quantidade"
								onblur="validaQtdeAcessos(this)";
								required
							/>
						</div>
					</td>
				</tr>
				<tr>
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
				</tr>
				<tr>
					<td> 
						<div class="div_forms">
							<label>Gerente Vendas*</label>
							<select name="gerente_vendas" id="gerente_vendas" class="txt bradius" required>
									<option></option>
									<?php 
										
							         	$servicos=mysql_query("SELECT DISTINCT nome FROM gerente_vendas order by nome");

										while($rowserv=mysql_fetch_array($servicos)){							                     
						        	?>
						        		<option value="<?php echo $rowserv['nome']; ?>"><?php echo $rowserv['nome']; ?></option>
							   		<?php 
				          				}
				     				?>
							  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Gerente Negócio*</label>
							<select name="gerente_negocio" id="gerente_negocio" class="txt bradius" required>
									<option></option>
									<?php 
										
							         	$servicos=mysql_query("SELECT DISTINCT nome FROM gerente_negocios order by nome");

										while($rowserv=mysql_fetch_array($servicos)){							                     
						        	?>
						        		<option value="<?php echo $rowserv['nome']; ?>"><?php echo $rowserv['nome']; ?></option>
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
							<label>UF*</label>
							<select name="uf" id="uf" class="txt bradius" required>
									<option value="AC">AC</option>
									<option value="AL">AL</option>
									<option value="AM">AM</option>
									<option value="AP">AP</option>
									<option value="BA">BA</option>
									<option value="CE">CE</option>
									<option value="DF">DF</option>
									<option value="ES">ES</option>
									<option value="GO">GO</option>
									<option value="MA">MA</option>
									<option value="MG">MG</option>
									<option value="MT">MT</option>
									<option value="MS">MS</option>
									<option value="PA">PA</option>
									<option value="PB">PB</option>
									<option value="PE">PE</option>
									<option value="PI">PI</option>
									<option value="PR">PR</option>
									<option value="RJ">RJ</option>
									<option value="RN">RN</option>
									<option value="RO">RO</option>
									<option value="RR">RR</option>
									<option value="RS">RS</option>
									<option value="SC">SC</option>
									<option value="SE">SE</option>
									<option value="SP">SP</option>
									<option value="TO">TO</option>
							  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Observações</label>
							<input 
								type="text" 
								id="obs"  
								name="obs"
								class="txt bradius" 
							/> 
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Status*</label>
							<select name="status_solicitacao" id="status_solicitacao_suporte_comercial_siscom" class="txt bradius" required>
								<option></option>
								<?php 
									$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(19,20,21,22,23,24) ORDER BY descricao");
							        						         		
									while($rowss=mysql_fetch_array($statuss)){
					                     
					        	?>
						        	<option value="<?php echo $rowss['id_status_solicitacao']; ?>"><?php echo $rowss['descricao']; ?></option>
						        	<?php 
						        		}
						        	?>
		     				</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Motivo devolução</label>
							<input 
								type="text" 
								name="motivo_devolucao" 
								id="motivo_devolucao" 
							/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Descrição motivo devolução</label>
							<input 
								type="text" 
								name="descricao_motivo_devolucao" 
								id="descricao_motivo_devolucao" 
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

  
    