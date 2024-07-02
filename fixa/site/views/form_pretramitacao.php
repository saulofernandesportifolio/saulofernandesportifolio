<?php
include("../fixa/bd.php");
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoPreTramitacao.php';
require_once '../fixa/site/classes/Produto.php';
?>

<?php
$cripto = new cripto();
//parametros
$id_usuario = $_POST['id_usuario']; 
$id_usuario = $cripto->decodificar($id_usuario);
$id_solicitacao = $_POST['id_solicitacao'];
$revisao = $_POST['revisao'];

?>

<?php
//cria objeto
$SolicitacaoPreTramitacaoSiscom = new SolicitacaoPreTramitacao();

$SolicitacaoPreTramitacaoSiscom->data_receb = $SolicitacaoPreTramitacaoSiscom->buscaDataRecebimentoSolicitacao($id_solicitacao, $id_usuario, $revisao);

//verifica que tipo de solicitacao é (venda/servicos)

$buscarSolicitacaoSiscomServico=mysql_query("SELECT * FROM siscom_servico WHERE nro_solicitacao = '$id_solicitacao' AND revisao = $revisao");
if(mysql_affected_rows() > 0)
{
	$fonte = "siscom_servico";	
	$SolicitacaoPreTramitacaoSiscom = $SolicitacaoPreTramitacaoSiscom->buscaDadosSiscomServico($SolicitacaoPreTramitacaoSiscom, $id_solicitacao, $revisao);
}

$buscarSolicitacaoSiscomVendas=mysql_query("SELECT * FROM siscom_vendas WHERE pacote = '$id_solicitacao' AND revisao = $revisao");

if(mysql_affected_rows() > 0)
{
	$fonte = "siscom_vendas";	
	$SolicitacaoPreTramitacaoSiscom = $SolicitacaoPreTramitacaoSiscom->buscaDadosSiscomVendas($SolicitacaoPreTramitacaoSiscom, $id_solicitacao, $revisao);

	//cria objeto Produto
	$Produto = new Produto();
	$Produto = $Produto->buscaProdutoByDescricao($Produto, $SolicitacaoPreTramitacaoSiscom->produto);

	$SolicitacaoPreTramitacaoSiscom->cat_prod = $Produto->categoria_produto;
}

$SolicitacaoPreTramitacaoSiscom->id_solicitacao = $id_solicitacao;
?>

<script type="text/javascript">
	$(document).ready(function() {
		$( "#div_form_pretramitacao" ).css({"display": ""});
	});
</script>


<div id="div_form_pretramitacao" class="bradius wrapper">
	<form 
		action="principal.php?t=controles/sql_form_pretramitacao.php" 
		method="POST"	
	>
		<fieldset id="fieldset_style">
			<h2>Pré-Tramitação</h2>
			<input type="hidden" value="<?php echo $revisao?>" name="revisao" id="revisao"></input>
			<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" name="id_usuario" id="id_usuario"></input>
			<input type="hidden" value="<?php echo $id_solicitacao?>" name="id_solicitacao" id="id_solicitacao"></input> 
			<input type="hidden" value="<?php echo $fonte?>" name="fonte" id="fonte"></input>
			<input type="hidden" value="nf" name="acao" id="acao"></input> 
			<table id="form_pretramitacao">
				<tr>
					<td>
						<div class="div_forms">
							<label>Status SISCOM</label>
									<input 
										type="text" 
										id="status_siscom"  
										name="status_siscom"
										size= "50"
										value = "<?php echo $SolicitacaoPreTramitacaoSiscom->status_id_solicitacao;?>"
										disabled="true"
										class="campos_desabilitados"
									/>
						</div>
					</td>
					<td>
						<div class="div_forms">
						<?php if($fonte == "siscom_servico"){?>		
							<label>SISCOM*</label>
							<input 
								type="text" 
								id="id_solicitacao"  
								name="id_solicitacao"
								size= "50"
								value = "<?php echo $SolicitacaoPreTramitacaoSiscom->id_solicitacao;?>"
								disabled="true"
								class="campos_desabilitados"
							/>
						<?php } else if($fonte == "siscom_vendas"){?>
							<label>Nº Pacote SISCOM*</label>
							<input 
								type="text" 
								id="n_pact_siscom"  
								name="n_pact_siscom"
								size= "50"
								value = "<?php echo $SolicitacaoPreTramitacaoSiscom->id_solicitacao;?>"
								disabled="true"
								class="campos_desabilitados"
							/>
						<?php }?>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Categoria de produto*</label>
							<?php if($fonte == "siscom_servico"){?>
							<select name="cat_prod" id="cat_prod" class="txt2comboboxpadrao bradius">
					   			<option value="Voz">Voz</option>
					   			<option value="Dados">Dados</option>
					  		</select>
				  			<?php } else if($fonte == "siscom_vendas"){?>
				   			<select name="cat_prod" id="cat_prod" class="txt2comboboxpadrao bradius campos_desabilitados" disabled="true">
					   			<option value="<?php echo $SolicitacaoPreTramitacaoSiscom->cat_prod?>"><?php echo $SolicitacaoPreTramitacaoSiscom->cat_prod?></option>
					  		</select>
				   			<?php }?>
						</div>
					</td>	
					<td>
						<div class="div_forms">
							<label>Canal de entrada*</label>
							<select 
								name="canal_entrada" 
								id="canal_entrada" 
								class="txt2comboboxpadrao bradius campos_desabilitados"
								disabled="true"
								>

								<?php 

								$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE descricao = 'SISCOM'");
							    
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
							<label>Data Receb. Solicitação*</label>
							<input 
								disabled="true"
								size="50"
								type="text"
								id="data_receb"
								name="data_receb"
								value= "<?php echo $SolicitacaoPreTramitacaoSiscom->data_receb; ?>"
								class="campos_desabilitados"
							>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Produto*</label>
							<select 
								<?php if($fonte == "siscom_vendas"){?>
								class="txt2comboboxpadrao bradius campos_desabilitados"
								disabled="true"
								name="produto" 
								id="produto" 
								<?php }else if($fonte == "siscom_servico"){?>
								name="produto_servico" 
								id="produto_servico" 
								class="txt2comboboxpadrao bradius"
								required
								<?php }?>
							>
								<?php 
									if($fonte == "siscom_vendas"){
										$produto=mysql_query("SELECT * FROM produto WHERE categoria_produto LIKE '%$SolicitacaoPreTramitacaoSiscom->cat_prod%'");
										while($rowp=mysql_fetch_array($produto)){
					                     
					        	?>
							        	<option value="<?php echo $rowp['id_produto']; ?>">
								   			<?php echo $rowp['descricao']; ?>
								   		</option>
						   		<?php
						   				} 
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
								name="tipo_solicitacao" 
								id="tipo_solicitacao" 
								class="txt2comboboxpadrao bradius"
								required>
						  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Complemento Serviço*</label>
							<select 
								name="complemento_tipo_solicitacao" 
								id="complemento_tipo_solicitacao" 
								class="txt2comboboxpadrao bradius"
								required>
						  	</select>
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
								disabled="true"
								class="campos_desabilitados"
								value="<?php echo $SolicitacaoPreTramitacaoSiscom->razao_social;?>" 
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>CNPJ*</label>
							<input 
								type="text" 
								id="cnpj"  
								name="cnpj"
								disabled="true"
								class="campos_desabilitados"
								value="<?php echo $SolicitacaoPreTramitacaoSiscom->cnpj?>"
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
								onblur="validaIntFields(this)";
								maxlength="5" 
								required
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Número gestão de serviços*</label>
							<input 
								type="text" 
								id="n_gs"  
								name="n_gs"
								placeholder="Caso não haja, favor preencher como 0"
								onblur="validaIntFields(this)";
								required
							/>
						</div>
					</td>		
				</tr>
				<tr>	
					<td>
						<div class="div_forms">
							<label>Data abertura gestão*</label>
							<input 
								type="text"
								id="data_abertura_gestao"
								name="data_abertura_gestao" 
								class="campoData"
								onblur = "validaData(this)";
								required
							>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Devolução*</label>
							<select 
								name="devolucao" 
								id="devolucao"	
								class="txt2comboboxpadrao bradius"
								required
								>
						   		<option></option>
						   		<option value="Sim">Sim</option>
						   		<option value="Nao">Não</option>
						  	</select>
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
								class="txt2comboboxpadrao bradius"
								required
								>
								<?php 
						         	
						         	$statuss=mysql_query(
				         					"SELECT * FROM status_solicitacao 
											WHERE id_status_solicitacao = 8 
											UNION 
											SELECT * FROM status_solicitacao 
											WHERE id_status_solicitacao IN
											(1,2,3,4,5,6,7)
											");
						          	

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
							<label id="obs_label">Observações</label>
							<input 
								type="text" 
								id="obs"  
								class="txt bradius" 
								name="obs"
							/> 
						</div>
					</td>	
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Aprovado*</label>
							<select 
								name="aprovacao" 
								id="aprovacao"	
								class="txt2comboboxpadrao bradius"
								required
								>
						   		<option value="Sim">Sim</option>
						   		<option value="Não">Não</option>
						  	</select>
						</div>	
					</td>
					<td id="rcd1" class="campos_devolucao">
						<div class="div_forms">
							<label>Área devolução</label>
							<select name="area_devolucao" id="area_devolucao" class="txt2comboboxpadrao bradius" disabled="true">
								<option value=""></option>
					   			<option value="Comercial">COMERCIAL</option>
					   			<option value="Marketing">MKT</option>
					   			<option value="AG. TELEFONICA">AG. TELEFONICA</option>
					  		</select>
				  		</div>
					</td>
				</tr>
				<tr id="rcd2" class="campos_devolucao">
					<td>
						<div class="div_forms">
							<label>Motivo devolução</label>
							<select 
								name="motivo_devolucao" 
								id="motivo_devolucao" 
								class="txt2comboboxpadrao bradius"
								disabled="true">
					  		</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Descrição motivo devolução</label>
							<select 
								name="descricao_motivo_devolucao" 
								id="descricao_motivo_devolucao" 
								class="txt2comboboxpadrao bradius"
								disabled="true">
					  		</select>
						</div>
					</td>
				</tr>
				<tr id="rcd3" class="campos_devolucao">
					<td>
						<div class="div_forms">
							<label>Data de devolução</label>
							<input 
								type="text"
								id="data_devolucao"
								name="data_devolucao" 
								disabled="true"
								class="campoData" 
								onblur = "validaData(this)";
							>
						</div>
					</td>			
				</tr>
				<tr id="div_data_pedido_cancelamento_cliente" style="display: none">
					<td>
						<div class="div_forms">
							<label>Data do pedido de cancelamento do cliente*</label>
							<input 
								type="text"
								id="data_pedido_cancelamento_cliente"
								name="data_pedido_cancelamento_cliente" 
								class="campoData"
								onblur = "validaData(this)";
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPreTramitacaoSiscom->data_pedido_cancelamento_cliente?>"
								<?php }?>
							>
						</div>
					</td>
				</tr>
			</table>
			<br/>
			<input name="bt_enviar_form" id="bt_enviar_form" type="submit" value="Salvar" class="sb2 bradius" />
	 		<input type="reset" value="Limpar" class="sb2 bradius"/>
	 		<input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" id="cancelar" onclick="history.back();" />
	 	</fieldset>
	</form>
</div>

  
    