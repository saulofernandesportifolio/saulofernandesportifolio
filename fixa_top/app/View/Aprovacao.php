<script type="text/javascript" src="js/Solicitacao.js"></script>
<?php
require_once '../fixa_top/app/Model/Aprovacao.php';
?>
<?php
$id_solicitacao = $_POST['id_solicitacao'];
$revisao 		= $_POST['revisao']; 

$id_usuario = $_POST['id_usuario']; 
$id_usuario = $cripto->decodificar($id_usuario);

$SolicitacaoAprovacao = new Aprovacao($id_usuario, $revisao, $id_solicitacao, '', '', '', '', '', '', '');

$SolicitacaoAprovacao = $SolicitacaoAprovacao->buscarsolicitacao($SolicitacaoAprovacao, $id_solicitacao, $revisao);

$fonte = $SolicitacaoAprovacao->verificaSiscom($id_solicitacao); 

?>
<div id="div_form_aprovacao" class="bradius wrapper" style="margin-left: 25%;" >
	<form 
		action="principal.php?t=Controller/AprovacaoController.php" method="POST">
		<fieldset id="fieldset_style">
			<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" name="id_usuario" id="id_usuario"></input>
			<input type="hidden" value="<?php echo $revisao?>" name="revisao" id="revisao"></input>
			<input type="hidden" value="<?php echo $id_solicitacao?>" name="siscom" id="siscom"></input>
			<input type="hidden" value="insereSolicitacaoAprovacao" name="opcao" id="opcao"></input>
			<input type="hidden" value="<?php echo $SolicitacaoAprovacao->data_recebimento_aprovacao?>" name="data_recebimento_aprovacao" id="data_recebimento_aprovacao"></input>
			<h2>Aprovação</h2> 
			<table id="form_tramitacao">
				<tr>
					<td>
						<div class="div_forms">
							<label>Solicitação</label>
							<input 
								type="text" 
								id="siscom"  
								name="siscom"
								required
								value="<?php echo $SolicitacaoAprovacao->siscom?>"
								class="campos_desabilitados"
								disabled
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data Entrada Siscom</label>
							<input 
								type="text"
								id="data_entrada_siscom"
								name="data_entrada_siscom" 
								value="<?php echo $SolicitacaoAprovacao->data_entrada_siscom?>"
								class="campos_desabilitados"
								disabled
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Canal de entrada*</label>
							<select 
								name="canal_entrada" 
								id="canal_entrada" 
								class="txt2comboboxpadrao bradius campos_desabilitados"
								required
								disabled 
								>
								<?php 
						         	$id_canal_entrada = $SolicitacaoAprovacao->canal_entrada;
						         	$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada IN ($id_canal_entrada)");

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
							<select 
								name="produto" 
								id="produto" 
								class="txt2comboboxpadrao bradius campos_desabilitados"
								required
								disabled 
							>
								<?php 
									$produto = $SolicitacaoAprovacao->produto;
						         	$produto=mysql_query("SELECT id_produto, UPPER(descricao) descricao FROM produto WHERE descricao = '$produto'");

									while($rowp=mysql_fetch_array($produto)){
					                     
					        	?>
					        	<option value="<?php echo $rowp['descricao']; ?>">
						   			<?php echo $rowp['descricao']; ?>
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
							<label>Serviço*</label>
							<select 
								name="servico" 
								class="txt2comboboxpadrao bradius campos_desabilitados"
								required
								disabled 
								>
								<option value="<?php echo $SolicitacaoAprovacao->servico ?>">
						   			<?php echo $SolicitacaoAprovacao->servico ?>
						   		</option>
						  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Complemento Serviço</label>
							<input 
								type="text" 
								id="complemento_servico"  
								name="complemento_servico"
								value="<?php echo $SolicitacaoAprovacao->complemento_servico?>" 
								class="campos_desabilitados"
								disabled	
							/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Quantidade de acessos*</label>
							<input 
								type="text" 
								id="qtd_acessos"  
								name="qtd_acessos"
								value="<?php echo $SolicitacaoAprovacao->qtd_acessos?>" 
								class="campos_desabilitados"
								disabled	
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data Recebimento Aprovação</label>
							<input 
								type="text" 
								id="data_recebimento_aprovacao"  
								name="data_recebimento_aprovacao"
								disabled
								value="<?php echo $SolicitacaoAprovacao->data_recebimento_aprovacao ?>" 
								class="campos_desabilitados" 
							/>
							<input type="hidden" name="data_recebimento_aprovacao" id="data_recebimento_aprovacao" value="<?php echo $SolicitacaoAprovacao->data_recebimento_aprovacao ?>" > 
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
								value="<?php echo $SolicitacaoAprovacao->cnpj?>" 
								class="campos_desabilitados"
								disabled	
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
								value="<?php echo $SolicitacaoAprovacao->razao_social?>" 
								class="campos_desabilitados"
								disabled	
							/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Oportunidade</label>
							<input 
								type="text"
								id="oportunidade"
								name="oportunidade" 
								required
								value="<?php echo $SolicitacaoAprovacao->oportunidade?>"
								<?php if($SolicitacaoAprovacao->oportunidade != ""){ ?>
								disabled
								class="campos_desabilitados" 
								<?php }?>
							>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Proposta</label>
							<input 
								type="text"
								id="proposta"
								name="proposta" 
								required
								value="<?php echo $SolicitacaoAprovacao->proposta?>"
								<?php if($SolicitacaoAprovacao->proposta != ""){ ?>
								disabled
								class="campos_desabilitados" 
								<?php }?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Status*</label>
							<select 
								name="status_solicitacao" 
								id="status_solicitacao" 
								required
								class="txt2comboboxpadrao"
								>
								<option></option>
								<?php 
						         	if($fonte == "siscom_servicos")
						         	{
						         		$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(23,9,29,28) ORDER BY descricao");
						         	}
						         	else
						         	{
										$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(23,9,29)  ORDER BY descricao");
									}
							        
							         		
									while($rowss=mysql_fetch_array($statuss)){
					                     
					        	?>
					        	<option value="<?php echo $rowss['id_status_solicitacao']; ?>">
						   			<?php echo $rowss['descricao']; ?>
						   		</option>
						   		<?php 
			          				}
			     				?>
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
							/> 
						</div>
					</td>		
				</tr>
				<tr id="rcd1" class="campos_devolucao">
					<td>
						<div class="div_forms">
							<label>Motivo devolução</label>
							<select 
								name="motivo_devolucao" 
								id="motivo_devolucao" 
								class="txt2comboboxpadrao bradius">
					  		</select>
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
								disabled="true">
					  		</select>
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

  
    