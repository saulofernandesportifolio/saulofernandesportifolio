<p align="center">
	<?php
		$cripto = new cripto();
		$id_usuario= $_GET['id'];
		$id_usuario = $cripto->decodificar($id_usuario);

		//get info of user
		$buscarPerfil=mysql_query("SELECT * FROM usuario WHERE id_usuario = $id_usuario");  

		if(mysql_affected_rows() > 0)
		{
			while($linha=mysql_fetch_array($buscarPerfil))
			{ 
				$id_perfil = $linha['id_perfil'];
			}
		}

		
	?>
	<?php if($id_perfil == 3 || $id_perfil == 4){?>
		    	<?php require_once 'HomeSupervisor.php'; ?>
	<?php }else if($id_perfil == 6 || $id_perfil == 12){?>
	<div class="tela_principal_dasbboard">
			<div id="t_m_d">
				      	 <?php 
					     	$buscarItens=mysql_query("SELECT 
														IFNULL(count(id_solicitacao),0) AS quantidade,
														'Tramitação' AS fase,
														tramitacao AS status 
													FROM 
														solicitacao_fases 
													WHERE 
														tramitacao = 'Com operador' AND 
														id_usuario_resp = $id_usuario
													UNION
					     							SELECT 
														IFNULL(count(id_solicitacao),0) AS quantidade,
														'Aprovação' AS fase,
														aprovacao AS status  
													FROM 
														solicitacao_fases 
													WHERE 
														aprovacao = 'Com operador' AND 
														id_usuario_resp = $id_usuario
													UNION
													SELECT 
														IFNULL(count(id_solicitacao),0) AS quantidade,
														'tramitacao_ag_retorno' AS fase,
														tramitacao AS status  
													FROM 
														solicitacao_fases 
													WHERE 
														tramitacao = 'Aguardando retorno' AND 
														id_usuario_resp = $id_usuario
							");

					     	if(mysql_affected_rows() > 0)
					     	{
									while($linha=mysql_fetch_array($buscarItens))
									{                   
						        ?>          
						         
						        <p class="textoParagrafo">
						        	<?php if($id_perfil == 6)
						        	{?>
							        	<?php if ($linha['fase'] == 'Tramitação'){?>
							        		<div id="form_tramitacao_itens_preencher_operador" class="div_itens_pendentes" style="width: 18%;">
							        			<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" id="id_usuario_tramitacao"></input>
										        <input type="hidden" value="tramitacao" id="solicitacao_pendentes_tramitacao"></input>
												<p class="titulo_itens_pendentes" style="text-align: center;">Itens a preencher</p> 
												<p class="numero_solicitacoes_pendentes"><?php echo $linha['quantidade']; ?></p>
											</div>
										<?php }else if($linha['fase'] == 'tramitacao_ag_retorno'){?>
											<div id="form_tramitacao_itens_aguardo_operador" class="div_itens_pendentes" style="width: 18%;">
												<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" id="id_usuario_tramitacao"></input>
										        <input type="hidden" value="tramitacao" id="solicitacao_aguardo_tramitacao"></input>
												<p class="titulo_itens_pendentes" style="text-align: center;">Itens em aguardo</p> 
												<p class="numero_solicitacoes_pendentes"><?php echo $linha['quantidade']; ?></p>
											</div>										
						        	<?php 
						        			}
						        	?>
						        </p>
						        <p class="textoParagrafo">
						        	<?php }else if($id_perfil == 12){?>
							        	<?php if ($linha['fase'] ==  'Aprovação'){?>
							        		<div id="form_aprovacao_itens_preencher_operador" class="div_itens_pendentes" style="width: 18%;">
												<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" id="id_usuario_aprovacao"></input>
										        <input type="hidden" value="aprovacao" id="solicitacao_pendentes_aprovacao"></input>
												<p class="titulo_itens_pendentes" style="text-align: center;">Itens a preencher</p> 
												<p class="numero_solicitacoes_pendentes"><?php echo $linha['quantidade']; ?></p>
											</div>
						        	<?php 
						        			}
					        			}
						        	?>
						        </p>
					     <?php 
						          }
					       }
					     ?>
		           </tbody>
				</table>
			</div>
		</div>
	<?php }?>
</p>