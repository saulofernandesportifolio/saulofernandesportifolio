<script type="text/javascript" src="js/funcoesJs.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

<?php
//parametros
$id_usuario = $_GET['id']; 
$id_usuario = $cripto->decodificar($id_usuario);

?>

<div id="div_form_solicitacao" class="bradius wrapper" style="margin-left: 25%;" >
	<form 
		action="principal.php?t=controles/SuporteComercialPendenciaController.php" method="POST">
		<fieldset id="fieldset_style">
			<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" name="id_usuario" id="id_usuario"></input>
			<input type="hidden" value="insereSolicitacaoSuporteComercialPendencia" name="opcao" id="opcao"></input>
			<h2>Suporte Comercial Pendência</h2> 
			<table id="form_apoio">
				<tr>
					<td>
						<div class="div_forms">
							<label>Nº PROTOCOLO</label>
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
							<label>Gerente Senior*</label>
							<select name="gerente_senior" id="gerente_senior" class="txt bradius" required>
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
				</tr>
				<tr>
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
					<td>
						<div class="div_forms">
							<label>Diretor*</label>
							<select name="diretor" id="diretor" class="txt bradius" required>
									<option></option>
									<option value="SERGIO">SERGIO</option>
									<option value="VANESSA">VANESSA</option>
									<option value="FAUSTO">FAUSTO</option>
						  	</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Data da Base*</label>
							<input 
								type="text" 
								id="data_base"  
								name="data_base"
								required
								class="campoData"
								placeholder = "dd/mm/aaaa" 
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Prazo contratual*</label>
							<input 
								type="text" 
								id="prazo_contratual"  
								name="prazo_contratual"
								required
							/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Valor Pendência*</label>
							<input 
								type="text" 
								id="valor_pendencia"  
								name="valor_pendencia"
								required
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>FUP de envio</label>
							<input 
								type="text" 
								id="fup_envio"  
								name="fup_envio"
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
								name="obs"
								class="txt bradius" 
							/> 
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Status*</label>
							<select name="status_solicitacao" id="status_solicitacao_suporte_comercial_siscom" class="txt bradius" required>
								<option></option>
								<?php 
									$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(25,26,27,28,29,30,31) ORDER BY descricao");
							        						         		
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
							<label>Devido</label>
							<select name="devido" id="devido" class="txt bradius" required>
									<option></option>
									<option value="SIM">SIM</option>
									<option value="NÃO">NÃO</option>
						  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Motivo devolução</label>
							<select name="motivo_devolucao" id="motivo_devolucao" class="txt bradius">
									<option></option>
									<option value="ERRO SISTÊMICO">ERRO SISTÊMICO</option>
									<option value="ERRO TRAMITAÇÃO">ERRO TRAMITAÇÃO</option>
									<option value="ERRO COMERCIAL">ERRO COMERCIAL</option>
									<option value="ERRO ÁREA TÉCNICA">ERRO ÁREA TÉCNICA</option>
									<option value="WCD">WCD</option>
						  	</select>
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
								class="txt bradius" 
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

  
    