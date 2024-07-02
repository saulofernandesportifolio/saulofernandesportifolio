
<?php

include("../fixa/bd.php");
  
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoTramitacao.php';

$cripto = new cripto();

$id_solicitacao = $_POST['id_solicitacao'];
$revisao 		= $_POST['revisao']; 

$buscarsolicitacao=mysql_query("SELECT * FROM tramitacao WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao");

while($linha=mysql_fetch_array($buscarsolicitacao)){ 
      $cat_produto 							= $linha['cat_produto'];
      $id_canal_entrada 					= $linha['id_canal_entrada'];
      $id_produto 							= $linha['id_produto'];
      $tipo_solicitacao 					= $linha['tipo_solicitacao'];
      $id_servicos	 						= $linha['id_servicos'];
      $cnpj 								= $linha['cnpj'];
      $razao_social	 						= $linha['razao_social'];
      $qtd_acessos 							= $linha['qtd_acessos'];
      $n_gestao_servicos 					= $linha['n_gestao_servicos'];
      $data_abertura_gestao 				= $linha['data_abertura_gestao'];
      $data_entrada_siscom					= $linha['data_entrada_siscom'];
      $complemento_tipo_solicitacao 		= $linha['complemento_tipo_solicitacao'];
      $data_pedido_cancelamento_cliente 	= $linha['data_pedido_cancelamento_cliente'];
}

$id_usuario = $_POST['id_usuario']; 
$id_usuario = $cripto->decodificar($id_usuario);

$SolicitacaoTramitacao = new SolicitacaoTramitacao();

//verifica se ja existe versao para solicitacao
if($SolicitacaoTramitacao->verificaSituacaoSolicitacao($id_solicitacao, $revisao) == 1)
{
	//se sim busca informações da ultima versão registrada
	$SolicitacaoTramitacao = $SolicitacaoTramitacao->buscaUltimaSolicitacaoCompletaByIdRevisao($SolicitacaoTramitacao, $id_solicitacao, $revisao);
	$solicitacaoNova = 0;
}else{
	$SolicitacaoTramitacao = $SolicitacaoTramitacao->buscaUltimaSolicitacaoCompletaByIdRevisao($SolicitacaoTramitacao, $id_solicitacao, $revisao);
	$solicitacaoNova = 1;
};

?>

<div id="div_form_tramitacao" class="bradius wrapper" style="margin-left: 25%;" >
	<form 
		action="principal.php?t=controles/sql_form_tramitacao.php" method="POST">
		<fieldset id="fieldset_style">
			<input type="hidden" value="<?php echo $revisao ?>" name="revisao" id="revisao"></input>
			<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" name="id_usuario" id="id_usuario"></input>
			<input type="hidden" value="<?php echo $id_solicitacao?>" name="id_solicitacao" id="id_solicitacao"></input>
			<input type="hidden" value="nft" name="acao" id="acao"></input>
			<h2>Tramitação</h2> 
			<table id="form_tramitacao">
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
							<label>Data Entrada Siscom</label>
							<input 
								type="text"
								id="data_entrada_siscom"
								name="data_entrada_siscom"
								class="campos_desabilitados" 
								value="<?php echo $data_entrada_siscom?>";
								disabled="true" 
								onblur = "validaData(this)";
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
							<label>Categoria*</label>
							<select name="cat_prod" id="cat_prod" class="txt2comboboxpadrao bradius campos_desabilitados" required disabled="true">
						   			<option value="<?php echo $cat_produto?>"><?php echo $cat_produto?></option>
					  		</select>
						</div>
					</td>
				</tr>
				<tr>
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
					<td>
						<div class="div_forms">
							<label>Serviço*</label>
							<select 
								name="tipo_solicitacao" 
								class="txt2comboboxpadrao bradius campos_desabilitados"
								required
								disabled="true"
								>
					        	<option value="<?php echo $tipo_solicitacao ?>">
						   			<?php echo $tipo_solicitacao ?>
						   		</option>
						  	</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Tipo Serviço*</label>
							<select 
								name="tipo_solicitacao" 
								class="txt2comboboxpadrao bradius campos_desabilitados"
								required
								disabled="true"
								>
					        	<option value="<?php echo $complemento_tipo_solicitacao ?>">
						   			<?php echo $complemento_tipo_solicitacao ?>
						   		</option>
						  	</select>
						</div>
					</td>
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
								<?php } ?>
								class="campos_desabilitados"
							/>
						</div>
					</td>		
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>CNPJ*</label>
							<input 
								type="text" 
								id="cnpj"  
								name="cnpj"
								required
								<?php if(isset($cnpj)){ ?>
								value = "<?php echo $cnpj?>"
								<?php } ?>
								disabled="true";
								class="campos_desabilitados"
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
								<?php if(isset($razao_social)){ ?>
								value = "<?php echo $razao_social?>"
								<?php } ?>
								disabled="true";
								class="campos_desabilitados"
							/>
						</div>
					</td>
				</tr>
				<tr>
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
								<?php } ?>
								class="campos_desabilitados"
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data abertura gestão*</label>
							<input 
								type="text"
								id="data_abertura_gestao"
								name="data_abertura_gestao" 
								class="campoData campos_desabilitados"
								onblur = "validaData(this)";
								disabled="true"
								<?php if(isset($data_abertura_gestao)){ ?>
								value = <?php echo $data_abertura_gestao?>
								<?php } ?>
							>
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
								class="campoData campos_desabilitados"
								onblur = "validaData(this)";
								disabled="true"
								<?php if(isset($data_pedido_cancelamento_cliente)){ ?>
								value = <?php echo $data_pedido_cancelamento_cliente?>
								<?php } ?>
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
							<label id="data_encerramento_label">Data de Encerramento*</label>
							<input 
								type="text"
								id="data_encerramento"
								name="data_encerramento" 
								class="campoData" 
								onblur = "validaData(this)";
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoTramitacao->data_encerramento?>"
								<?php }?>		
							>
						</div>
					</td>		
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
						         	
									if($cat_produto == "Voz"){
									      	$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao = 15
																UNION SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(10,1,2,3,11,4,5,13)");
							        }else{
							        	 	$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao = 12
							        	 							UNION SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(10,1,2,3,11,4,5,13,15)");
										
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
								value="<?php echo $SolicitacaoTramitacao->obs?>"
								<?php }?>
							/> 
						</div>
					</td>	
					<td>
						<div class="div_forms">
							<label>Nº Oportunidade e Proposta*</label>
							<input 
								type="text" 
								id="n_oport_proposta"  
								class="txt bradius" 
								name="n_oport_proposta"
								required 
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoTramitacao->n_oportunidade_propostas?>"
								<?php }?>
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
								<?php if(isset($data_devolucao)){ ?>
								value = <?php echo $data_devolucao?>
								<?php } ?>
								class="campos_desabilitados"
							>
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

  
    