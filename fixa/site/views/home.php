<p align="center">
	<?php
		//setup defaulT
		include("../fixa/bd.php");

		$cripto = new cripto();
		$id_usuario= $_GET['id'];
		$id_usuario = $cripto->decodificar($id_usuario);
	

		//get info of user
		$buscarPerfil=mysql_query("SELECT id_perfil, projeto FROM usuario WHERE id_usuario = $id_usuario");  

		if(mysql_affected_rows() > 0){
			while($linha=mysql_fetch_array($buscarPerfil))
			{ 
				$id_perfil = $linha['id_perfil'];
				$projeto   = $linha['projeto'];
			}
		}
	?>

	<?php if(($id_perfil == 3 || $id_perfil == 4) && $projeto != 'SC'){?>
		    	<?php require_once 'home_supervisor.php'; ?>
	<?php }else if($id_perfil == 5 || $id_perfil == 6 || $id_perfil == 7 || $id_perfil == 8 || $id_perfil == 9 || $id_perfil == 11){?>
	<div class="tela_principal_dasbboard">
			<div id="t_m_d">
				      	 <?php 
					     	$buscarItens=mysql_query("SELECT 
														IFNULL(count(id_solicitacao),0) AS quantidade,
														'Pré-Tramitação' AS fase,
														pre_tramitacao AS status 
													FROM 
														solicitacao_fases 
													WHERE 
														pre_tramitacao = 'Com operador' AND 
														id_usuario_resp = $id_usuario
													UNION
					     							SELECT 
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
														'Pós-Tramitação' AS fase,
														pos_tramitacao AS status  
													FROM 
														solicitacao_fases 
													WHERE 
														pos_tramitacao = 'Com operador' AND 
														id_usuario_resp = $id_usuario
													UNION
													SELECT 
														IFNULL(count(id_solicitacao),0) AS quantidade,
														'Intragov' AS fase,
														intragov AS status  
													FROM 
														solicitacao_fases 
													WHERE 
														intragov = 'Com operador' AND 
														id_usuario_resp = $id_usuario
													UNION
													SELECT 
														IFNULL(count(id_solicitacao),0) AS quantidade,
														'Gcom' AS fase,
														gcom AS status  
													FROM 
														solicitacao_fases 
													WHERE 
														gcom = 'Com operador' AND 
														id_usuario_resp = $id_usuario
							");

					     	if(mysql_affected_rows() > 0){
									while($linha=mysql_fetch_array($buscarItens)){                   
						        ?>          
						         
						        <p class="textoParagrafo">
						        	<?php if($id_perfil == 5 || $id_perfil == 11){?>
							        	<?php if ($linha['fase'] == 'Pré-Tramitação'){?>
								        	Número de solicitações de pré-tramitação a serem preenchidas: <?php echo $linha['quantidade']; ?>
								        	<form>
									        	<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" id="id_usuario_pre"></input>
									        	<input type="hidden" value="pre" id="solicitacao_pendentes_pre"></input>
									        	<input id="form_pre_itens_preencher_operador" type="button" value="Visualizar" class="sb2 bradius"/>
						        			<form/>
						        	<?php 
						        			}
						   				} 
						        	?>
						        </p>
						        <p class="textoParagrafo">
						        	<?php if($id_perfil == 6 || $id_perfil == 11){?>
							        	<?php if ($linha['fase'] ==  'Tramitação'){?>
								        	Número de solicitações de tramitação a serem preenchidas:<?php echo $linha['quantidade']; ?>
								        	<form>
									        	<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" id="id_usuario_tram"></input><br/>
									        	<input type="hidden" value="tra" id="solicitacao_pendentes_tram"></input>
									        	<input id="form_tram_itens_preencher_operador" type="button" value="Visualizar" class="sb2 bradius"/>
						        			<form/> 
						        	<?php 
						        			}
					        			}
						        	?>
						        </p>
						        <p class="textoParagrafo">
						        	<?php if($id_perfil == 7 || $id_perfil == 1){?>
							        	<?php if ($linha['fase'] ==  'Pós-Tramitação'){?>
								        	Número de solicitações de pós-tramitação a serem preenchidas: <?php echo $linha['quantidade']; ?>
								        	<form>
									        	<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" id="id_usuario_pos"></input>
									        	<input type="hidden" value="pos" id="solicitacao_pendentes_pos"></input>
									        	<input id="form_pos_itens_preencher_operador" type="button" value="Visualizar" class="sb2 bradius" />
						        			<form/> 
						        	<?php 
						        			}
					        			}
						        	?>
						        </p>
						         <p class="textoParagrafo">
						        	<?php if($id_perfil == 8 || $id_perfil == 1){?>
							        	<?php if ($linha['fase'] ==  'Gcom'){?>
								        	Número de solicitações de gcom a serem preenchidas: <?php echo $linha['quantidade']; ?>
								        	<form>
									        	<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" id="id_usuario_gcon"></input>
									        	<input type="hidden" value="gcon" id="solicitacao_pendentes_gcon"></input>
									        	<input id="form_gcon_itens_preencher_operador" type="button" value="Visualizar" class="sb2 bradius" />
						        			<form/> 
						        	<?php 
						        			}
					        			}
						        	?>
						        </p>
						        <p class="textoParagrafo">
						        	<?php if($id_perfil == 9 || $id_perfil == 1){?>
							        	<?php if ($linha['fase'] ==  'Intragov'){?>
								        	Número de solicitações de intragov a serem preenchidas: <?php echo $linha['quantidade']; ?>
								        	<form>
									        	<input type="hidden" value="<?php echo $cripto->codificar($id_usuario)?>" id="id_usuario_intragov"></input>
									        	<input type="hidden" value="intragov" id="solicitacao_pendentes_intragov"></input>
									        	<input id="form_intragov_itens_preencher_operador" type="button" value="Visualizar" class="sb2 bradius" />
						        			<form/> 
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