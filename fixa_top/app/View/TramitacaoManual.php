<script type="text/javascript" src="js/Solicitacao.js"></script>
<script type="text/javascript" src="js/Tramitacao.js"></script>

<?php
require_once '../fixa_top/app/Model/TramitacaoManual.php';
?>


<?php
//parametros
$id_usuario = $_POST['id_usuario']; 
$id_usuario = $cripto->decodificar($id_usuario);
$id_solicitacao = $_POST['id_solicitacao'];
$revisao = $_POST['revisao'];
?>

<?php
$SolicitacaoTramitacao = new TramitacaoManual($id_usuario, $id_solicitacao, '', '', '', '', '', '', '', '', '', '', '', '', '', $revisao, '', '', '', '');

$data_receb = $SolicitacaoTramitacao->buscaDataRecebimentoSolicitacao($id_solicitacao, $id_usuario, $revisao);


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
		action="principal.php?t=Controller/TramitacaoManualController.php" method="POST">
		<fieldset id="fieldset_style">
			<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" name="id_usuario" id="id_usuario"></input>
			<input type="hidden" value="insereSolicitacaoTramitacaoManual" name="opcao" id="opcao"></input>
			<input type="hidden" value="<?php echo $id_solicitacao?>" name="id_solicitacao" id="id_solicitacao"></input>
			<input type="hidden" value="<?php echo $revisao?>" name="revisao" id="revisao"></input>
			<h2>Tramitação</h2> 
			<table id="form_tramitacao">
				<tr>
					<td>
						<div class="div_forms">
							<label>Solicitação</label>
							<input 
								type="text" 
								id="id_solicitacao"  
								name="id_solicitacao"
								size= "50"
								disabled
								value="<?php echo $id_solicitacao?>" 
								class="campos_desabilitados"
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Data recebimento solicitação</label>
							<input 
								type="text" 
								id="data_recebimento_solicitacao"  
								name="data_recebimento_solicitacao"
								disabled
								value="<?php echo $data_receb?>" 
								class="campos_desabilitados"
							/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Canal de entrada*</label>
							<select name="canal_entrada" id="canal_entrada" class="txt2comboboxpadrao bradius" required>
								<option></option>
								<?php 
						         
						         	$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada IN (4,5)");

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
							<?php if($solicitacaoNova == 0){?>
								<select name="produto" id="produto"	class="txt2comboboxpadrao bradius"	required>
									<?php 										
							         	$produto=mysql_query("SELECT '$SolicitacaoTramitacao->produto' AS descricao
							         							UNION 
							         							SELECT UPPER(descricao) descricao FROM produto ORDER BY DESCRICAO");

										while($rowp=mysql_fetch_array($produto)){
						                     
						        	?>
						        	<option value="<?php echo $rowp['descricao']; ?>"><?php echo $rowp['descricao']; ?></option>
							   		<?php }	?>
						   		</select>
					   		<?php }else{?>
					   			<select name="produto" id="produto"	class="txt2comboboxpadrao bradius"	required>
									<option></option>
									<?php 
										$produto=mysql_query("SELECT id_produto, UPPER(descricao) descricao FROM produto ORDER BY DESCRICAO");

										while($rowp=mysql_fetch_array($produto)){
						                     
						        	?>
						        	<option value="<?php echo $rowp['descricao']; ?>"><?php echo $rowp['descricao']; ?></option>
					        	</select>
				   			<?php }
				   			}?>
						  	
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Serviço*</label>
							<?php if($solicitacaoNova == 0){?>
								<select name="servico" id="servico" class="txt2comboboxpadrao bradius" required>
								<?php 
										
							         	$servicos=mysql_query("SELECT '$SolicitacaoTramitacao->servico' AS descricao
							         							UNION SELECT UPPER(descricao) as descricao FROM servicos order by descricao");

										while($rowserv=mysql_fetch_array($servicos)){							                     
						        	?>
						        		<option value="<?php echo $rowserv['descricao']; ?>"><?php echo $rowserv['descricao']; ?></option>
							   		<?php }	?>
				     				</select>
							<?php }else{?>	
								<select name="servico" id="servico" class="txt2comboboxpadrao bradius" required>
									<option>Selecione o serviço</option>
									<?php 
										
							         	$servicos=mysql_query("SELECT descricao FROM servicos order by descricao");

										while($rowserv=mysql_fetch_array($servicos)){							                     
						        	?>
						        		<option value="<?php echo $rowserv['descricao']; ?>"><?php echo $rowserv['descricao']; ?></option>
							   		<?php 
				          				}
				     				?>
							  	</select>
						  	<?php }?>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Complemento Serviço</label>
							<?php if($solicitacaoNova == 0){?>
							<select id="complemento_servico" name="complemento_servico"	required class="txt2comboboxpadrao">
								<option value="<?php echo $SolicitacaoTramitacao->complementoServico?>"><?php echo $SolicitacaoTramitacao->complementoServico?></option>
							</select>
							<?php }else{?>
							<select id="complemento_servico" name="complemento_servico"	required class="txt2comboboxpadrao"></select>
							<?php }?>
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
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoTramitacao->escritorio_gn?>"	
								<?php }?> 
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
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoTramitacao->quantidadeAcessos?>"	
								<?php }?>
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
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoTramitacao->oportunidade?>"	
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
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoTramitacao->proposta?>"	
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
								class="txt2comboboxpadrao bradius" 
								name="obs"
							/> 
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
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoTramitacao->cnpj?>"	
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
								size= "100"
								required
								<?php if($solicitacaoNova == 0){?>
								value="<?php echo $SolicitacaoTramitacao->razaoSocial?>"	
								<?php }?>
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Status*</label>
							<?php if($solicitacaoNova == 0){?>
							<select name="status_solicitacao" id="status_solicitacao" class="txt2comboboxpadrao bradius" required>
								<?php 
									$status = $SolicitacaoTramitacao->status;
									$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN('$status')
															UNION SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(25,12,26,27,28,29) ORDER BY descricao");
							        						         		
									while($rowss=mysql_fetch_array($statuss)){
					                     
					        	?>
					        	<option value="<?php echo $rowss['id_status_solicitacao']; ?>"><?php echo $rowss['descricao']; ?></option>
						   		<?php 
			          				}
			     				?>
		     				</select>
							<?php }else{?>
							<select name="status_solicitacao" id="status_solicitacao" class="txt2comboboxpadrao bradius" required>
								<option></option>
								<?php 
									$statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(25,12,26,27,28,29) ORDER BY descricao");
							        						         		
									while($rowss=mysql_fetch_array($statuss)){
					                     
					        	?>
					        	<option value="<?php echo $rowss['id_status_solicitacao']; ?>"><?php echo $rowss['descricao']; ?></option>
						   		<?php 
			          				}
			     				?>
		     				</select>
		     				<?php }?>
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

  
    