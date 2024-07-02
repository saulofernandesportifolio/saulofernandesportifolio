<?php
include("../fixa/bd.php");
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoPreTramitacao.php';
?>

<?php
$cripto = new cripto();
?>

<?php
//parametros
$id_usuario = $_GET['id']; 
$id_usuario = $cripto->decodificar($id_usuario);
$idSolicitacao = $_GET['ids'];
$revisao = $_GET['r'];

$SolicitacaoPreTramitacaoDone = new $SolicitacaoPreTramitacao();
$SolicitacaoPreTramitacaoDone->buscaObjetoByIdsolicitacao($SolicitacaoPreTramitacaoDone, $solicitacao, $revisao); 

?>

<script type="text/javascript">
	$(document).ready(function() {
		$("#cancelar").on('click', function(){
			window.location.href = "principal.php?&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/v_area_operador.php";
	    });
	});
</script>


<div id="div_form_pretramitacao" class="bradius wrapper">
	<form 
		action="principal.php?&acao=nfm&id=<?php echo $cripto->codificar($id_usuario) ?>&t=controles/sql_form_pretramitacao.php" 
		method="POST"	
	>
		<fieldset id="fieldset_style">
			<h2>Pré-Tramitação</h2> 
			<table id="form_pretramitacao">
				<tr>
					<td>
						<div class="div_forms">
							<label>SISCOM*</label>
							<input 
								type="text" 
								id="siscom"  
								name="siscom"
								size= "50"
								required
							/>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Categoria de produto*</label>
							<select name="cat_prod" id="cat_prod" class="txt2comboboxpadrao bradius" required>
					   			<option value="Voz">Voz</option>
					   			<option value="Dados">Dados</option>
					  		</select>
						</div>
					</td>	
					
				</tr>
				<tr>
					<td>
						<div class="div_forms">
							<label>Devolução</label><br/>
							<label class="radio-inline">
							  	<input 
							  		style="width: 24px;" 
							  		type="radio" 
							  		name="devolucao" 
							  		id="devolucao_n" 
							  		value="Nao"
							  		checked="true" 
						  		> Não
							</label>
							<label class="radio-inline">
							  	<input 
							  		style="width: 24px;" 
							  		type="radio" 
							  		name="devolucao" 
							  		id="devolucao_s" 
							  		value="Sim"
						  		> Sim
							</label>
						</div>
					</td>
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

								$canal_entrada=mysql_query("SELECT * FROM canal_entrada WHERE id_canal_entrada IN(4,5,1,15,7,13)");
							    
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
								size="50"
								type="text"
								id="data_receb"
								name="data_receb"
								required
								class="campoData"
								onblur = "validaData(this)";
							>
						</div>
					</td>
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
								   	$produto=mysql_query("SELECT * FROM produto");
						
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
							<label>Tipo Solicitação/Categoria*</label>
							<select 
								name="tipo_solicitacao" 
								id="tipo_solicitacao" 
								class="txt2comboboxpadrao bradius"
								required
								>
								<?php 

									$solicitacao=mysql_query("SELECT * FROM tipo_solicitacao");
							        
									while($rowsc=mysql_fetch_array($solicitacao)){
					                     
					        	?>
					        	<option value="<?php echo $rowsc['id_tipo_solicitacao_categ']; ?>">
						   			<?php echo $rowsc['descricao']; ?>
						   		</option>
						   		<?php 
			          				}
			     				?>
						  	</select>
						</div>
					</td>
					<td>
						<div class="div_forms">
							<label>Serviços*</label>
							<select 
								name="servicos" 
								id="servicos" 
								class="txt2comboboxpadrao bradius"
								required
								>
								<?php 
									$servico=mysql_query("SELECT * FROM servicos");
							        
									while($rowso=mysql_fetch_array($servico)){
					                     
					        	?>
					        	<option value="<?php echo $rowso['id_servicos']; ?>">
						   			<?php echo $rowso['descricao']; ?>
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
							<label>CNPJ*</label>
							<input 
								type="text" 
								id="cnpj"  
								name="cnpj"
								required
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
								required
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
								pattern="\d+"
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
								pattern="\d+"
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
					   			<option value="COMERCIAL">COMERCIAL</option>
					   			<option value="MKT">MKT</option>
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
								class="txt2comboboxpadrao bradius"
								disabled="true">
								<option value=""></option>
								<?php 

									$devolucao=mysql_query("SELECT * FROM motivo_devolucao");
							        
									while($rowmd=mysql_fetch_array($devolucao)){
					                     
					        	?>
					        	<option value="<?php echo $rowmd['id_motivo_devolucao']; ?>">
						   			<?php echo $rowmd['descricao']; ?>
						   		</option>
						   		<?php 
			          				}
			     				?>
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
								<option value=""></option>
								<?php 

									$devolucao=mysql_query("SELECT * FROM motivo_devolucao WHERE fase = 'pretramitacao_voz'");
							        
									while($rowmd=mysql_fetch_array($devolucao)){
					                     
					        	?>
					        	<option value="<?php echo $rowmd['descricao_detalhes']; ?>">
						   			<?php echo $rowmd['descricao_detalhes']; ?>
						   		</option>
						   		<?php 
			          				}
			     				?>
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
				<tr id="rcd4" class="campos_devolucao">
					<td>
						<div class="div_forms">
							<label>Chamado/Remedy</label>
							<input 
								type="text"
								id="chamado_remedy"
								name="chamado_remedy" 
								disabled="true"
							>
						</div>
					</td>	
				</tr>
			</table>
			<br/>
			<input name="bt_enviar_form" id="bt_enviar_form" type="submit" value="Salvar" class="sb2 bradius" />
	 		<input type="reset" value="Limpar" class="sb2 bradius"/>
	 		<input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" id="cancelar"/>
	 	</fieldset>
	</form>
</div>

  
    