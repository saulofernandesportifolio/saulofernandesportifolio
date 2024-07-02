<script type="text/javascript" src="js/Solicitacao.js"></script>
<script type="text/javascript" src="js/Tramitacao.js"></script>
<?php
require_once '../fixa_top/app/Model/Tramitacao.php';
?>

<?php

//parametros
$id_usuario = $_POST['id_usuario']; 
$id_usuario = $cripto->decodificar($id_usuario);
$id_solicitacao = $_POST['id_solicitacao'];
$revisao = $_POST['revisao'];

?>

<?php
//cria objeto
$SolicitacaoTramitacaoSiscom = new Tramitacao($id_usuario, $id_solicitacao, '', '', '', '', '', '', '', '', '', '', '', '', '', '','','','');

$SolicitacaoTramitacaoSiscom->dataRecebimento = $SolicitacaoTramitacaoSiscom->buscaDataRecebimentoSolicitacao($id_solicitacao, $id_usuario, $revisao);

//verifica que tipo de solicitacao é (venda/servicos)
$buscarSolicitacaoSiscomServico=mysql_query("SELECT * FROM siscom_servicos WHERE siscom = '$id_solicitacao' AND revisao = $revisao");
if(mysql_affected_rows() > 0)
{
	$fonte = "siscom_servico";	
	$SolicitacaoTramitacaoSiscom = $SolicitacaoTramitacaoSiscom->buscaDadosSiscomServico($SolicitacaoTramitacaoSiscom, $id_solicitacao, $revisao);
}

$buscarSolicitacaoSiscomVendas=mysql_query("SELECT * FROM siscom_vendas WHERE siscom = '$id_solicitacao' AND revisao = $revisao");

if(mysql_affected_rows() > 0)
{
	$fonte = "siscom_vendas";	
	$SolicitacaoTramitacaoSiscom = $SolicitacaoTramitacaoSiscom->buscaDadosSiscomVendas($SolicitacaoTramitacaoSiscom, $id_solicitacao, $revisao);
}

$SolicitacaoTramitacaoSiscom->id_solicitacao = $id_solicitacao;
$SolicitacaoTramitacaoSiscom->revisao = $revisao;


?>

<div id="div_form_tramitacao" class="bradius wrapper" style="margin-left: 25%;" >
	<form 
		action="principal.php?t=Controller/TramitacaoController.php" method="POST">
		<fieldset id="fieldset_style">
			<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" name="id_usuario" id="id_usuario"></input>
			<input type="hidden" value="<?php echo $revisao?>" name="revisao" id="revisao"></input>
			<input type="hidden" value="<?php echo $id_solicitacao?>" name="id_solicitacao" id="id_solicitacao"></input>
			<input type="hidden" value="<?php echo $fonte ?>" name="fonte" id="fonte">
			<input type="hidden" value="insereSolicitacaoTramitacao" name="opcao" id="opcao"></input>
			<h2>Tramitação</h2> 
			<table id="form_tramitacao">
				<tr>
					<td>
						<div class="div_forms">
							<label>Siscom</label>
							<input 
								type="text" 
								id="siscom"  
								name="siscom"
								size= "50"
								required
								value="<?php echo $id_solicitacao?>" 
								class="campos_desabilitados"
								disabled
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data/Hora Siscom(Início SLA)</label>
							<input 
								type="text"
								id="data_entrada_siscom"
								name="data_entrada_siscom"
								<?php if($SolicitacaoTramitacaoSiscom->dataEntradaSiscom == ""){?>
								required
								class="campoDataHora"
								onblur = "validaData(this)";
								placeholder = "dd/mm/aaaa hh:mm:ss"	
								<?php }else{?>	
								value="<?php echo $SolicitacaoTramitacaoSiscom->dataEntradaSiscom?>" 
								class="campos_desabilitados"
								disabled
								<?php }?>
								/>
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
								<option value="14">Siscom</option>
						  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Produto*</label>
							<select name="produto" id="produto"	disabled class="txt2comboboxpadrao campos_desabilitados">
								<option value="<?php echo $SolicitacaoTramitacaoSiscom->produto?>"><?php echo $SolicitacaoTramitacaoSiscom->produto?></option>
						  	</select>
						  	<input type="hidden" name="produto" id="produto" value="<?php echo $SolicitacaoTramitacaoSiscom->produto?>">
						</div>
					</td>
				</tr>
				<tr>
					
					<td>
						<div class="div_forms">
							<label>Serviço*</label>
							<?php 
							if($fonte == "siscom_servico")
							{

							?>
								<select name="servico" disabled	class="txt2comboboxpadrao campos_desabilitados">
									<?php 
										$servicos=mysql_query("SELECT descricao FROM servicos WHERE complemento = '$SolicitacaoTramitacaoSiscom->complemento_servico'");
										while($rowserv=mysql_fetch_array($servicos))
										{
											$SolicitacaoTramitacaoSiscom->servico = $rowserv['descricao'];
						        	?>
							        	<option value="<?php echo $rowserv['descricao']; ?>">
									   			<?php echo $rowserv['descricao']; ?>
								   		</option>
							   		<?php 
							   			}
						   			?>
								</select>
								<input type="hidden" id="servico" name="servico" value="<?php echo $SolicitacaoTramitacaoSiscom->servico?>"/> 	
							<?php 
							}
							else if($fonte == "siscom_vendas")
							{
								?> 
								<select name="servico" id="servico" class="txt2comboboxpadrao bradius" required>
									<option></option>
									<?php 
										$servicos=mysql_query("SELECT DISTINCT descricao FROM servicos WHERE descricao IN ('ADESÃO','RENOVAÇÃO','MIGRAÇÃO') order by descricao");

										while($rowserv=mysql_fetch_array($servicos))
										{
						                     
						        	?>
							        	<option value="<?php echo $rowserv['descricao']; ?>">
								   			<?php echo $rowserv['descricao']; ?>
								   		</option>
					   		<?php 
			          					}
          					}
		     				?>
						  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Complemento Serviço</label>
							<?php 
							if($fonte == "siscom_servico")
							{
								?>
							<select id="complemento_servico" name="complemento_servico"	disabled class="txt2comboboxpadrao campos_desabilitados">
								<option value="<?php echo $SolicitacaoTramitacaoSiscom->complemento_servico ?>">
						   			<?php echo $SolicitacaoTramitacaoSiscom->complemento_servico; ?>
						   		</option>
							</select>
							<input type="hidden" id="complemento_servico" name="complemento_servico" value="<?php echo $SolicitacaoTramitacaoSiscom->complemento_servico?>"/>
							<?php 
							}
							else if($fonte == "siscom_vendas")
							{
								?>
							<select id="complemento_servico" name="complemento_servico"	required class="txt2comboboxpadrao"></select>
							<?php 
								}
							?>
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
								disabled
								class="campos_desabilitados"
								value="<?php echo $SolicitacaoTramitacaoSiscom->cnpj?>" 
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
								disabled
								class="campos_desabilitados"
								value="<?php echo $SolicitacaoTramitacaoSiscom->razaoSocial?>" 
							/>
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
								class="campos_desabilitados" 
								value="<?php echo $SolicitacaoTramitacaoSiscom->escritorio_gn?>" 
								disabled
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
								class="txt2comboboxpadrao" 
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
								class="txt2comboboxpadrao bradius" 
								name="obs"
							/> 
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
								<option value="0"></option>
								<?php 
						         	
						         	if($fonte == "siscom_servico")
						         	{
										$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(12,25,26,27,28,29,23) ORDER BY descricao");
							        }
							        else
							        {
							        	$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(12,25,26,27,29,23) ORDER BY descricao");
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

  
    