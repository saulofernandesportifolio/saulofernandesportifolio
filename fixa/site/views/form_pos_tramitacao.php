
<?php

include("../fixa/bd.php");
  
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoPosTramitacao.php';

$cripto = new cripto();

$id_solicitacao = $_POST['id_solicitacao'];
$revisao 		= $_POST['revisao']; 
$id_usuario 	= $_POST['id_usuario']; 
$id_usuario 	= $cripto->decodificar($id_usuario);


$buscarsolicitacao=mysql_query("SELECT
									post.id_canal_entrada,
									post.id_produto,
									post.tipo_solicitacao,
									post.id_servicos,
									post.cnpj,
									post.razao_social,
									post.qtd_acessos,
									post.n_gestao_servicos,
									post.data_entrada_siscom,
									post.complemento_tipo_solicitacao,
									post.data_pedido_cancelamento_cliente
								FROM pos_tramitacao post
								 WHERE id_solicitacao  = '$id_solicitacao' AND revisao = $revisao");

while($linha=mysql_fetch_array($buscarsolicitacao)){ 
      $id_canal_entrada 				= $linha['id_canal_entrada'];
      $id_produto 						= $linha['id_produto'];      
      $tipo_solicitacao  		    	= $linha['tipo_solicitacao'];
      $id_servicos	 					= $linha['id_servicos'];
      $cnpj 							= $linha['cnpj'];
      $razao_social	 					= $linha['razao_social'];
      $qtd_acessos 						= $linha['qtd_acessos'];
      $n_gestao_servicos 				= $linha['n_gestao_servicos'];
      $data_entrada_id_solicitacao 		= $linha['data_entrada_siscom'];
      $complemento_tipo_solicitacao 	= $linha['complemento_tipo_solicitacao'];
      $data_pedido_cancelamento_cliente = $linha['data_pedido_cancelamento_cliente'];
}

$SolicitacaoPosTramitacao = new SolicitacaoPosTramitacao();

//verifica se ja existe versao para solicitacao
if($SolicitacaoPosTramitacao->verificaSituacaoSolicitacao($id_solicitacao, $revisao) == 1)
{
	//se sim busca informações da ultima versão registrada
	$SolicitacaoPosTramitacao = $SolicitacaoPosTramitacao->buscaUltimaSolicitacaoCompletaByIdRevisao($SolicitacaoPosTramitacao, $id_solicitacao, $revisao);
	$solicitacaoNova = 0;
}else{
	$SolicitacaoPosTramitacao = $SolicitacaoPosTramitacao->buscaUltimaSolicitacaoCompletaByIdRevisao($SolicitacaoPosTramitacao, $id_solicitacao, $revisao);
	$solicitacaoNova = 1;
};
?>

<div id="div_form_postramitacao" class="bradius wrapper" style="margin-left: 25%;" >
	<form 
		action="principal.php?t=controles/sql_form_postramitacao.php" 
		method="POST"	
	>
		<fieldset id="fieldset_style">
			<h2>Pós-Tramitação</h2> 
			<table id="form_postramitacao">
				<input type="hidden" value="<?php echo $revisao ?>" name="revisao" id="revisao"></input>
				<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" name="id_usuario" id="id_usuario"></input>
				<input type="hidden" value="<?php echo $id_solicitacao?>" name="id_solicitacao" id="id_solicitacao"></input>
				<input type="hidden" value="nft" name="acao" id="acao"></input>
				<tr>
					<td>
						<div class="div_forms">
							<label>Protocolo Solicitação*</label>
							<input 
								type="text" 
								id="id_solicitacao"  
								name="id_solicitacao"
								size= "50"
								placeholder=" Caso não haja, favor preencher como 0"
								pattern="\d+"
								required
								value = <?php echo $id_solicitacao?>
								disabled="true"
								class="campos_desabilitados"
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data Entrada</label>
							<input 
								type="text"
								id="data_entrada_id_solicitacao"
								name="data_entrada_id_solicitacao"
								class="campoData campos_desabilitados" 
								value="<?php echo $data_entrada_id_solicitacao?>"
								disabled="true"
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
								disabled="true" 
								>

								<?php 
						         
						         	$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada = $id_canal_entrada");

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
								disabled="true"
							>
								<?php 
									if(isset($id_produto)){
						         		$produto=mysql_query("SELECT * FROM produto WHERE id_produto = $id_produto");

							         }

									while($rowp=mysql_fetch_array($produto)){
					                     
					        	?>
					        	<option value="<?php echo $rowp['id_produto']; ?>">
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
							<label>Serviço</label>
							<select 
								name="tipo_solicitacao_pos" 
								id="tipo_solicitacao_pos" 
								class="txt2comboboxpadrao bradius campos_desabilitados"
								required
								disabled="true"
								>
					        	<option value="<?php echo $tipo_solicitacao?>"><?php echo $tipo_solicitacao ?></option>
						  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Complemento do Serviço</label>
							<select 
								name="c_tipo_solicitacao" 
								id="c_tipo_solicitacao" 
								class="txt2comboboxpadrao bradius campos_desabilitados"
								required
								disabled="true"
								>
					        	<option value="<?php echo $complemento_tipo_solicitacao?>"><?php echo $complemento_tipo_solicitacao ?></option>
						  	</select>
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
								required
								disabled="true"
								<?php if(isset($qtd_acessos)){ ?>
								value = "<?php echo $qtd_acessos?>"
								class="campos_desabilitados"
								<?php } ?>
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
								required
								<?php if(isset($cnpj)){ ?>
								value = <?php echo $cnpj?>
								class="campos_desabilitados"
								<?php } ?>
								disabled="true";
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
								<?php if(isset($razao_social)){ ?>
								value = "<?php echo $razao_social?>"
								class="campos_desabilitados"
								<?php } ?>
								disabled="true";
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
								disabled="true"
								<?php if(isset($n_gestao_servicos)){ ?>
								value = <?php echo $n_gestao_servicos?>
								class="campos_desabilitados"
								<?php } ?>
							/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Data Pedido Cancelamento Cliente</label>
							<input 
								type="text"
								id="data_pedido_cancelamento_cliente"
								name="data_pedido_cancelamento_cliente" 
								class="campos_desabilitados"
								disabled="true"
								<?php if(isset($data_pedido_cancelamento_cliente)){ ?>
								value = <?php echo $data_pedido_cancelamento_cliente?>
								<?php } ?>
							>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Oportunidade*</label>
							<input 
								type="text" 
								id="oportunidade"  
								class="txt bradius" 
								name="oportunidade"
								required="true"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPosTramitacao->oportunidade?>"
								<?php }?>	
							/> 
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Proposta*</label>
							<input 
								type="text" 
								id="proposta"  
								class="txt bradius" 
								name="proposta"
								required="true"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPosTramitacao->proposta?>"
								<?php }?>	
							/> 
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Contrato Mãe*</label>
							<input 
								type="text" 
								id="contrato_mae"  
								class="txt bradius" 
								name="contrato_mae"
								required="true"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPosTramitacao->contrato_mae?>"
								<?php }?>	
							/> 
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Data Recebimento Pós*</label>
							<input 
								type="text"
								id="data_recebimento_pos"
								name="data_recebimento_pos" 
								class="campoData"
								onblur = "validaData(this)";
								required="true"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPosTramitacao->data_recebimento_pos?>"
								<?php }?>	
							>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data assinatura contrato*</label>
							<input 
								type="text"
								id="data_assinatura_contrato"
								name="data_assinatura_contrato" 
								onblur = "validaData(this)";
								required
								class="campoData"
								<?php if($solicitacaoNova == 0){?>
								value = <?php echo $SolicitacaoPosTramitacao->data_assinatura_contrato?>
								<?php } ?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Quantidade de contratos analisados*</label>
							<input 
								type="text" 
								id="qtd_contrato_analisados"  
								name="qtd_contrato_analisados"
								onblur="validaIntFields(this)";
								maxlength="5" 
								required
								<?php if($solicitacaoNova == 0){?>
								value = <?php echo $SolicitacaoPosTramitacao->qtd_contrato_analisados?>
								<?php } ?>
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data Finalizado*</label>
							<input 
								type="text"
								id="data_finalizado"
								name="data_finalizado" 
								class="campoData"
								onblur = "validaData(this)";
								required="true"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPosTramitacao->data_finalizado?>"
								<?php }?>	
							>
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
								class="txt bradius" 
								name="obs"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPosTramitacao->obs?>"
								<?php }?>	
							/> 
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Status*</label>
							<select 
								name="status_solicitacao_postramitacao" 
								id="status_solicitacao_postramitacao" 
								class="txt2comboboxpadrao bradius"
								required
								>
								<?php 
						         	$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao = 15
						         							UNION SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(1,9)");
								   	
						         	

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
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Motivo devolução</label>
							<select 
								name="motivo_devolucao" 
								id="motivo_devolucao" 
								class="txt2comboboxpadrao bradius"
								disabled="true" 
								>
								<option value=""></option>
								<?php 

									$devolucao=mysql_query("SELECT * FROM motivo_devolucao WHERE id_motivo_devolucao IN(49,50,51,52,53,54,55,56,57,58) ORDER BY descricao");
							        
									while($rowmd=mysql_fetch_array($devolucao)){
					                     
					        	?>
					        	<option value="<?php echo $rowmd['descricao']; ?>">
						   			<?php echo $rowmd['descricao']; ?>
						   		</option>
						   		<?php 
			          				}
			     				?>
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

  
    