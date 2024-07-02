<?php
include("../fixa/bd.php");
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoPreTramitacao.php';
?>

<?php
$cripto = new cripto();
//parametros
$id_usuario = $_POST['id_usuario']; 
$id_usuario = $cripto->decodificar($id_usuario);
$id_solicitacao = $_POST['id_solicitacao'];
$revisao = $_POST['revisao'];
$fonte = 'entrada_manual';
?>

<?php
//cria objeto
$SolicitacaoPreTramitacaoManual = new SolicitacaoPreTramitacao();

$data_receb = $SolicitacaoPreTramitacaoManual->buscaDataRecebimentoSolicitacao($id_solicitacao, $id_usuario, $revisao);
$SolicitacaoPreTramitacaoManual->id_solicitacao = $id_solicitacao;
$SolicitacaoPreTramitacaoManual->revisao = $revisao;

//pega projeto do operador logado
$sqlProjetoUsuario = mysql_query("SELECT projeto FROM usuario WHERE id_usuario = $id_usuario");

while($rowP=mysql_fetch_array($sqlProjetoUsuario))
{
	$projeto = $rowP['projeto'];
}


//verifica se ja existe versao para solicitacao
if($SolicitacaoPreTramitacaoManual->verificaSituacaoSolicitacao($id_solicitacao, $revisao) == 1)
{
	//se sim busca informações da ultima versão registrada
	$SolicitacaoPreTramitacaoManual = $SolicitacaoPreTramitacaoManual->buscaUltimaSolicitacaoCompletaByIdRevisao($SolicitacaoPreTramitacaoManual, $id_solicitacao, $revisao);
	$solicitacaoNova = 0;
}else{
	$SolicitacaoPreTramitacaoManual = $SolicitacaoPreTramitacaoManual->buscaUltimaSolicitacaoCompletaByIdRevisao($SolicitacaoPreTramitacaoManual, $id_solicitacao, $revisao);
	$solicitacaoNova = 1;
};


?>

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
			<input type="hidden" value="<?php echo $solicitacaoNova?>" name="solicitacaoNova" id="solicitacaoNova"></input>
			<input type="hidden" value="nfm" name="acao" id="acao"></input> 
			<table id="form_pretramitacao">
				<tr>
					<td>
						<div class="div_forms">
							<label>Protocolo Solicitação*</label>
							<input 
								type="text" 
								id="id_solicitacao"  
								name="id_solicitacao"
								size= "50"
								disabled="true"
								value="<?php echo $id_solicitacao;?>"
								class="campos_desabilitados" 
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Categoria de produto*</label>
							<select name="cat_prod" id="cat_prod" class="txt2comboboxpadrao bradius" required>
								<?php if($solicitacaoNova == 0){?>
									<option value="<?php echo $SolicitacaoPreTramitacaoManual->cat_prod?>"><?php echo $SolicitacaoPreTramitacaoManual->cat_prod?></option>
									<?php if($projeto == "VozDados"){?>
									<option value="Voz">Voz</option>
						   			<option value="Dados">Dados</option>
									<?php }else{?>
						   			<option value="<?php echo $projeto?>"><?php echo $projeto?></option>
						   			<?php }?>
								<?php }else{?>
									<?php if($projeto == "VozDados"){?>
									<option value="Voz">Voz</option>
						   			<option value="Dados">Dados</option>
									<?php }else{?>
						   			<option value="<?php echo $projeto?>"><?php echo $projeto?></option>
						   			<?php }?>
						   		<?php } ?>
					  		</select>
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
									$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada IN(4,5,1,15,7,13)");
							    }else{
						         	$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada = '$SolicitacaoPreTramitacaoManual->canal_entrada' UNION
						         								SELECT * FROM canal_entrada WHERE id_canal_entrada IN(4,5,1,15,7,13)
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
							<label>Data Receb. Solicitação*</label>
							<input 
								size="50"
								type="text"
								id="data_receb"
								name="data_receb"
								required
								class="campos_desabilitados"
								disabled="true"
								value="<?php echo $data_receb?>" 	
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Produto*</label>
							<?php if($solicitacaoNova == 0){?>
							<select 
								name="produto_manual" 
								class="txt2comboboxpadrao bradius"
								required
							>
							<?php $produto=mysql_query("SELECT descricao FROM produto WHERE id_produto = '$SolicitacaoPreTramitacaoManual->produto' 
						        						UNION SELECT descricao FROM produto");	
						        		 				while($rowp=mysql_fetch_array($produto)){ ?>
					                     				<option value="<?php echo $rowp['descricao']; ?>">
						   									<?php echo $rowp['descricao']; ?>
						   								</option>
														<?php }?>
							<?php }else{?>
							<select 
								name="produto_manual" 
								id="produto_manual" 
								class="txt2comboboxpadrao bradius"
								required
							>
							<?php }?>
							</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Serviços*</label>
							<?php if($solicitacaoNova == 0){?>
							<select 
								name="tipo_solicitacao" 
								class="txt2comboboxpadrao bradius"
								required
							>
							<option value="<?php echo $SolicitacaoPreTramitacaoManual->tipo_solicitacao?>"><?php echo $SolicitacaoPreTramitacaoManual->tipo_solicitacao?></option>
							<?php $servico=mysql_query("SELECT DISTINCT descricao FROM tipo_solicitacao");	
	        		 				while($rowp=mysql_fetch_array($servico)){ ?>
                     				<option value="<?php echo $rowp['descricao']; ?>">
	   									<?php echo $rowp['descricao']; ?>
	   								</option>
									<?php }?>	
						  	</select>
						  	<?php }else{?>
						  	<select 
								name="tipo_solicitacao" 
								id="tipo_solicitacao" 
								class="txt2comboboxpadrao bradius"
								required>
						  	</select>
						  	<?php }?>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Complemento Serviço*</label>
							<?php if($solicitacaoNova == 0){?>
							<select 
								name="complemento_tipo_solicitacao" 
								class="txt2comboboxpadrao bradius"
								>	
									<option value="<?php echo $SolicitacaoPreTramitacaoManual->complemento_tipo_solicitacao?>"><?php echo $SolicitacaoPreTramitacaoManual->complemento_tipo_solicitacao?></option>
									<?php $cservico=mysql_query("SELECT DISTINCT completo FROM tipo_solicitacao");	
	        		 				while($rowp=mysql_fetch_array($cservico)){ ?>
                     				<option value="<?php echo $rowp['completo']; ?>">
	   									<?php echo $rowp['completo']; ?>
	   								</option>
									<?php }?>
						  	</select>
						  	<?php }else{?>
						  		<select 
									name="complemento_tipo_solicitacao" 
									id="complemento_tipo_solicitacao" 
									class="txt2comboboxpadrao bradius"
									>
								</select>
						  	<?php }?>
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
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPreTramitacaoManual->cnpj?>"
								<?php }?>
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
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPreTramitacaoManual->razao_social?>"
								<?php }?> 
							/>
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
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPreTramitacaoManual->qtd_acessos?>"
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
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPreTramitacaoManual->n_gs?>"
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
								id="data_abertura_gestao"
								name="data_abertura_gestao" 
								class="campoData"
								onblur = "validaData(this)";
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPreTramitacaoManual->data_abertura_gestao?>"
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
								<?php 
						         	 $statuss=mysql_query(
					         					"SELECT * FROM status_solicitacao WHERE id_status_solicitacao = 8 UNION 
					         					SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(1,2,3,4,5,6,7)");
						         	

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
							<label id="obs_label">Observações</label>
							<input 
								type="text" 
								id="obs"  
								class="txt bradius" 
								name="obs"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoPreTramitacaoManual->obs?>"
								<?php }?>
							/> 
						</div>
					</td>
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
				</tr>
				<tr id="rcd1" class="campos_devolucao">
					<td>
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
				</tr>
				<tr id="rcd2" class="campos_devolucao">
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
								value="<?php echo $SolicitacaoPreTramitacaoManual->data_pedido_cancelamento_cliente?>"
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

  
    