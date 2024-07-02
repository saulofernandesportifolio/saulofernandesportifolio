﻿<?php
include("../fixa/bd.php");
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoGcom.php';
?>

<?php
$cripto = new cripto();
//parametros
$id_usuario     = $_POST['id_usuario']; 
$id_usuario     = $cripto->decodificar($id_usuario);
$id_solicitacao = $_POST['id_solicitacao'];
$revisao        = $_POST['revisao'];
?>
<?php
//cria objeto
$SolicitacaoGcomOperador = new SolicitacaoGcom();
$data_recebimento = $SolicitacaoGcomOperador->buscaDataRecebimentoSolicitacao($id_solicitacao,$id_usuario,$revisao);

//verifica se ja existe versao para solicitacao
if($SolicitacaoGcomOperador->verificaSituacaoSolicitacao($id_solicitacao, $revisao) == 1)
{
	//se sim busca informações da ultima versão registrada
	$SolicitacaoGcomOperador = $SolicitacaoGcomOperador->buscaUltimaSolicitacaoCompletaByIdRevisao($SolicitacaoGcomOperador, $id_solicitacao, $revisao);
	$solicitacaoNova = 0;
}else{
	$SolicitacaoGcomOperador = $SolicitacaoGcomOperador->buscaUltimaSolicitacaoCompletaByIdRevisao($SolicitacaoGcomOperador, $id_solicitacao, $revisao);
	$solicitacaoNova = 1;
};
?>

<div id="div_form_gcom" class="bradius wrapper" style="margin-left: 25%;">
	<form 
		action="principal.php?t=controles/sql_form_gcom.php" 
		method="POST"	
	>
		<fieldset id="fieldset_style">
			<h2>GCON</h2> 
			<table id="form_gcom">
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
							<label>Data de Recebimento do Documento*</label>
							<input 
								type="text"
								id="data_recebimento_doc"
								name="data_recebimento_doc"
								class="campos_desabilitados gcon" 
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
							<label>Tipo de Entrada*</label>
							<select 
								name="tipo_entrada" 
								id="tipo_entrada" 
								class="txt2comboboxpadrao bradius"
								required
								>

								<?php 
						         if($solicitacaoNova == 1){
						         	$tipo_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada IN (19,4,20,21) ORDER BY descricao");
						         }else{
						         	$tipo_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada = '$SolicitacaoGcomOperador->tipo_entrada' UNION 
						         								SELECT * FROM canal_entrada WHERE id_canal_entrada IN (19,4,20,21)");
						         }

						         while($rowce=mysql_fetch_array($tipo_entrada)){
					                     
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
							<label>Contrato Mãe*</label>
							<select 
								name="contrato_mae" 
								id="contrato_mae" 
								class="txt2comboboxpadrao bradius"
								required
								>

								<?php 
						          if($solicitacaoNova == 1){
						         	$contrato_mae=mysql_query("SELECT id_contrato_mae, UPPER(descricao) AS descricao FROM contrato_mae ORDER BY descricao");
						         }else{
						         	$contrato_mae=mysql_query("SELECT id_contrato_mae, UPPER(descricao) AS descricao FROM contrato_mae WHERE id_contrato_mae = '$SolicitacaoGcomOperador->id_contrato_mae' UNION 
						         								SELECT id_contrato_mae, UPPER(descricao) AS descricao FROM contrato_mae ORDER BY descricao");
						         }

						         while($rowcm=mysql_fetch_array($contrato_mae)){
					                     
					        	?>
					        	<option value="<?php echo $rowcm['id_contrato_mae']; ?>">
						   			<?php echo $rowcm['descricao']; ?>
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
							<label>Data de Assinatura Documento*</label>
							<input 
								type="text"
								id="data_assinatura_doc"
								name="data_assinatura_doc"
								class="campoData gcon" 
								onblur = "validaData(this)";
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->data_assinatura_doc?>"
								<?php }?>
							>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Número do Documento*</label>
							<input 
								type="text"
								id="n_documento"
								name="n_documento"
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->numero_documento?>"
								<?php }?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Sistema de Validação*</label>
							<select 
								name="sistema_validacao" 
								id="sistema_validacao" 
								class="txt2comboboxpadrao bradius"
								required
							>
								<?php 
									if($solicitacaoNova == 1){
						         		$produto=mysql_query("SELECT * FROM sistema_validacao ORDER BY descricao");
						         	}else{
						         		$produto=mysql_query("SELECT * FROM sistema_validacao WHERE id_sistema_validacao = $SolicitacaoGcomOperador->id_sistema_validacao
						         								UNION SELECT * FROM sistema_validacao ORDER BY descricao");
						         	}	
									while($rowp=mysql_fetch_array($produto)){
					                     
					        	?>
					        	<option value="<?php echo $rowp['id_sistema_validacao']; ?>">
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
							<label>Nº Vantive*</label>
							<input 
								type="text" 
								id="n_vantive"  
								name="n_vantive"
								size= "50"
								required
								placeholder="Caso não haja, favor preencher como 0"
								onblur="validaIntFields(this)";
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->n_vantive?>"
								<?php }?>
							/>
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
								class="txt2comboboxpadrao bradius"
								required
							>
								<?php 
									if($solicitacaoNova == 1){
						         	$produto=mysql_query("SELECT * FROM produto WHERE id_produto IN(1,2,39,40,24,9,15,38,6,28,27,41,42,7,
						         		43,44,17,46,26,47,48,49,50,51,52,4,53,25,54,55,56,57,58,13,59,60,58,61,45,102,104,108,107) ORDER BY descricao");
						         	}else{
						         		$produto=mysql_query("SELECT * FROM produto WHERE id_produto = $SolicitacaoGcomOperador->id_produto
						         								UNION SELECT * FROM produto WHERE id_produto IN(1,2,39,40,24,9,15,38,6,28,27,41,42,7,
						         		43,44,17,46,26,47,48,49,50,51,52,4,53,25,54,55,56,57,58,13,59,60,58,61,45,102,104,108,107)");
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
							<label>Data de Tratativa*</label>
							<input 
								type="text"
								id="data_tratativa"
								name="data_tratativa"
								class="campoData gcon" 
								onblur = "validaData(this)";
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->data_tratativa?>"
								<?php }?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Nome do Solicitante*</label>
							<input 
								type="text" 
								id="nome_solicitante"  
								name="nome_solicitante"
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->nome_solicitante?>"
								<?php }?>
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
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->n_gestao_servicos?>"
								class="campos_desabilitados"
								<?php }?>
							/>
						</div>
					</td>	
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Numero do WCD*</label>
							<input 
								type="text" 
								id="numero_wcd"  
								name="numero_wcd"
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->numero_wcd?>"
								<?php }?>
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
								size= "50"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->cnpj?>"
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
								size= "50"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->razao_social?>"
								<?php }?>
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Plano Solicitado*</label>
							<input 
								type="text" 
								id="plano_solicitado"  
								name="plano_solicitado"
								size= "50"
								required
								placeholder="Caso não haja o número, favor preencher com 0"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->plano_solicitado?>"
								<?php }?> 
							/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Qtde de Acesso*</label>
							<input 
								onblur="validaQtdeAcessos(this)"; 
								type="text" 
								id="qtde_acesso"  
								name="qtde_acesso"
								size= "50"
								required
								placeholder="Caso não haja o número, favor preencher com 0"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->qtde_acesso?>"
								<?php }?> 
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data assinatura contrato*</label>
							<input 
								type="text"
								id="data_assinatura_contrato"
								name="data_assinatura_contrato" 
								class="campoData"
								required
								onblur = "validaData(this)";
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->data_assinatura_contrato?>"
								<?php }?>
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
								value="<?php echo $SolicitacaoGcomOperador->qtd_contrato_analisados?>"
								<?php }?>
							/>
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
						         	$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao = 15
															UNION SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(12,1,2,3,4,5,10,13)");
						        	
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
				<tr>
					<td>
						<div class="div_forms">
							<label id="data_encerramento_label">Data de encerramento*</label>
							<input 
								type="text"
								id="data_encerramento"
								name="data_encerramento" 
								class="campoData gcon" 
								onblur = "validaData(this)";
								size= "50"
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoGcomOperador->data_encerramento?>"
								<?php }?>  
							>
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
			</table>
			<br/>
			<input name="bt_enviar_form" id="bt_enviar_form" type="submit" value="Salvar" class="sb2 bradius" />
	 		<input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" id="cancelar" onclick="history.back();" />
	 	</fieldset>
	</form>
</div>

  
    