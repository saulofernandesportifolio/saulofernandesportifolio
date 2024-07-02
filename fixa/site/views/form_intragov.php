<?php
include("../fixa/bd.php");
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoIntragov.php';
require_once '../fixa/site/classes/Produto.php';
?>

<?php
$cripto = new cripto();
//parametros
$id_solicitacao = $_POST['id_solicitacao'];
$revisao 		= $_POST['revisao']; 
$id_usuario 	= $_POST['id_usuario']; 
$id_usuario 	= $cripto->decodificar($id_usuario);

?>
<?php
//pega projeto do operador logado
$sqlProjetoUsuario = mysql_query("SELECT projeto FROM usuario WHERE id_usuario = $id_usuario");

while($rowP=mysql_fetch_array($sqlProjetoUsuario))
{
	$projeto = $rowP['projeto'];
}

//cria objeto
$SolicitacaoIntragovOperador = new SolicitacaoIntragov();
$data_recebimento = $SolicitacaoIntragovOperador->buscaDataRecebimentoSolicitacao($id_solicitacao,$id_usuario,$revisao);


//verifica se ja existe versao para solicitacao
if($SolicitacaoIntragovOperador->verificaSituacaoSolicitacao($id_solicitacao, $revisao) == 1)
{
	//se sim busca informações da ultima versão registrada
	$SolicitacaoIntragovOperador = $SolicitacaoIntragovOperador->buscaUltimaSolicitacaoCompletaByIdRevisao($SolicitacaoIntragovOperador, $id_solicitacao, $revisao);
	$solicitacaoNova = 0;
}else{
	$SolicitacaoIntragovOperador = $SolicitacaoIntragovOperador->buscaUltimaSolicitacaoCompletaByIdRevisao($SolicitacaoIntragovOperador, $id_solicitacao, $revisao);
	$solicitacaoNova = 1;
};

?>
<div id="div_form_intragov" class="bradius wrapper">
	<form 
		action="principal.php?t=controles/sql_form_intragov.php" 
		method="POST" 	
	>
		<fieldset id="fieldset_style">
			<h2>Intragov</h2> 
			<table id="form_intragov">
				<input type="hidden" value="<?php echo $revisao ?>" name="revisao" id="revisao"></input>
				<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" name="id_usuario" id="id_usuario"></input>
				<input type="hidden" value="<?php echo $id_solicitacao?>" name="id_solicitacao" id="id_solicitacao"></input>
				<input type="hidden" value="<?php echo $solicitacaoNova?>" name="solicitacaoNova" id="solicitacaoNova"></input>
				<tr>
					<td>
						<div class="div_forms">
							<label>Protocolo da solicitação*</label>
							<input 
								type="text"
								id="protocolo_solicitacao"
								name="protocolo_solicitacao"
								class="campos_desabilitados" 
								required
								value= "<?php echo $id_solicitacao;?>"
								disabled="true"
							>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data da solicitação*</label>
							<input 
								type="text"
								id="data_solicitacao"
								name="data_solicitacao"
								class="campos_desabilitados" 
								onblur = "validaData(this)";
								required
								value= "<?php echo $data_recebimento;?>"
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
								class="txt2comboboxpadrao bradius"
								required
								>

								<?php 
						         if($solicitacaoNova == 1){
						         	$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada IN (9,4,3,10,18)");
						         }else{
						         	$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada = '$SolicitacaoIntragovOperador->id_canal_entrada' UNION
						         								SELECT * FROM canal_entrada WHERE id_canal_entrada IN (9,4,3,10,18)
						         								");
						         }

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
							<label>Produto Intragov*</label>
							<select 
								name="produtoIntragov" 
								id="produtoIntragov" 
								class="txt2comboboxpadrao bradius"
								required
							>
							<?php if($solicitacaoNova == 1){ ?>
								<option></option>
							<?php }?>	
							<?php 
						         if($solicitacaoNova == 1){
						         	$produto=mysql_query("SELECT id_produto,descricao FROM produto WHERE categoria_produto LIKE '%$projeto%'");
						         }else{
						         	$produto=mysql_query("SELECT id_produto,descricao FROM produto WHERE id_produto = '$SolicitacaoIntragovOperador->id_produto_intragov' 
						        		UNION SELECT id_produto,descricao FROM produto WHERE categoria_produto LIKE '%$projeto%'");	
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
							<label>Serviço Intragov*</label>
							<select name="servicoIntragov" id="servicoIntragov"	class="txt2comboboxpadrao bradius" required>
								<?php if($solicitacaoNova == 0){?>
								<option value="<?php echo $SolicitacaoIntragovOperador->servico_intragov?>"><?php echo $SolicitacaoIntragovOperador->servico_intragov?></option>
								<?php }else{?>
								<option></option>
								<?php }?>
							</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Complemento Serviço*</label>
							<select name="complementoServicoIntragov" id="complementoServicoIntragov" class="txt2comboboxpadrao bradius" required>
								<?php if($solicitacaoNova == 0){?>
								<option value="<?php echo $SolicitacaoIntragovOperador->complemento_servico?>"><?php echo $SolicitacaoIntragovOperador->complemento_servico?></option>
								<?php }else{?>
								<option></option>
								<?php }?>
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
								onblur="validaQtdeAcessos(this)"; 
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoIntragovOperador->qtd_acessos?>"
								<?php }?>
							/>
						</div>
					</td>	
					<td>
						<div class="div_forms">
							<label>Motivo Cancelamento</label>
							<i class="fa fa-exclamation" title="Quando escolher o item Cancelamento no campo 'Serviço' preencher este campo"></i>
							<input 
								type="text" 
								id="motivo_cancelamento"  
								name="motivo_cancelamento"
								size= "50"
								disabled="true"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoIntragovOperador->motivo_cancelamento?>"
								<?php }?> 
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
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoIntragovOperador->cnpj?>"
								<?php }?> 
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
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoIntragovOperador->razao_social?>"
								<?php }?> 
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
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoIntragovOperador->n_gestao_servicos?>"
								class="campos_desabilitados" 
								<?php }?> 
							/>
						</div>
					</td>	
					<td>
						<div class="div_forms">
							<label>Data abertura gestão*</label>
							<input 
								type="text"
								id="data_abert_gestao"
								name="data_abert_gestao" 
								class="campoData"
								onblur = "validaData(this)";
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoIntragovOperador->data_abertura_gestao?>"
								<?php }?> 
							>
						</div>
					</td>
				</tr>
				<tr>
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
					<td>
						<div class="div_forms">
							<label>Status*</label>
							<select 
								name="status_solicitacao" 
								id="status_solicitacao" 
								class="txt2comboboxpadrao bradius"
								required
								>
								<option></option>
								<?php 
						         	if($solicitacaoNova == 1){
						         		$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao = 15
															UNION SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(1,2,3,4,5,8)");
						        	}else{
						         		$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao = '$SolicitacaoIntragovOperador->status'
															UNION SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(15,1,2,3,4,5,8)");
						         	
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
							<label id="data_encerramento_label">Data de encerramento*</label>
							<input 
								type="text"
								id="data_encerramento"
								name="data_encerramento" 
								class="campoData" 
								onblur = "validaData(this)";
								size= "50"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoIntragovOperador->data_encerramento?>"
								<?php }?>  
							>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Observações</label>
							<input 
								type="text" 
								id="obs"  
								class="txt bradius" 
								name="obs"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoIntragovOperador->obs?>"
								<?php }?> 
							/> 
						</div>
					</td>		
				</tr>
				<tr id="rcd1" class="campos_devolucao">
					<td>
						<div class="div_forms">
							<label>Área Solicitante*</label>
							<select 
								type="text" 
								id="area_devolucao"  
								class="txt2comboboxpadrao bradius" 
								name="area_devolucao"
								disabled="true"
							>
								<option></option>
								<option value="POSICIONAMENTO">POSICIONAMENTO</option>
								<option value="Comercial">COMERCIAL</option>
								<option value="MKT">MKT</option>
								<option value="Sistemas">SISTEMAS</option>
								<option value="AG. TELEFONICA">AG. TELEFÔNICA</option>
							</select> 
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Motivo devolução</label>
							<select 
								name="motivo_devolucao" 
								id="motivo_devolucao" 
								class="txt2comboboxpadrao bradius"
								disabled="true" 
								>
					  		</select>
						</div>
					</td>
				</tr>		
				<tr id="rcd2" class="campos_devolucao">
					<td>
						<div class="div_forms">
							<label>Descrição motivo devolução</label>
							<select 
								name="descricao_motivo_devolucao" 
								id="descricao_motivo_devolucao" 
								class="txt2comboboxpadrao bradius"
								>
					  		</select>
						</div>
					</td>
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
								size= "50"
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
								value="<?php echo $SolicitacaoIntragovOperador->data_pedido_cancelamento_cliente?>"
								<?php }?>
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

  
    