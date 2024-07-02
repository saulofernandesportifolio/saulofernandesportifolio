
<?php
//setup default
require_once '../fixa/site/classes/cripto.php';
include("../fixa/bd.php");

$cripto = new cripto();

$id_usuario= $_GET['id'];

$id_usuario = $cripto->decodificar($id_usuario);

//get info of user
$buscarPerfil=mysql_query(
    "SELECT  
        id_perfil
    FROM usuario 
   where
    id_usuario = $id_usuario"
);  

while($linha=mysql_fetch_array($buscarPerfil)){ 
		$id_perfil = $linha['id_perfil'];
}
?>

<script type="text/javascript">
 
$(document).ready(function() {
	 
     $("#solicitacao_redistribuicao").on('click', function() {
     	 window.location.href = $('#solicitacao_redistribuicao').attr('href');
    });

     $("#solicitacao_tramitacao_itens_op").on('click', function() {
     	 window.location.href = $('#solicitacao_tramitacao_itens_op').attr('href');
    });

    $("#qtd_itens_pret").click(function(event) {
		$("#t_m_d").load('../fixa/principal.php?t=views/v_tabela_itens_pre_tramitacao.php #t_i_pre');
	});

	$("#qtd_itens_pt").click(function(event) {
		$("#t_m_d").load('../fixa/principal.php?t=views/v_tabela_itens_edicao.php #t_i_p');
	});

	$("#qtd_itens_t").click(function(event) {
		$("#t_m_d").load('../fixa/principal.php?t=views/v_itens_tramitacao_op.php #t_i_t');
	});

	$("#qtd_itens_post").click(function(event) {
		$("#t_m_d").load('../fixa/principal.php?t=views/v_itens_postramitacao_op.php #t_i_pos');
	});

	$("#qtd_itens_gcom").click(function(event) {
		$("#t_m_d").load('../fixa/principal.php?t=views/v_itens_gcom_op.php #t_i_gcom');
	});

	$("#qtd_itens_intragov").click(function(event) {
		$("#t_m_d").load('../fixa/principal.php?t=views/v_itens_intragov_op.php #t_i_intragov');
	});
});

</script>
<div class="tela_principal_dasbboard">
	<div id="menu_vertical_f">
		<ul class="menu_vertical">
    		<?php if($id_perfil == 9 || $id_perfil == 1){?>
    		<li class="menu_vertical">
      			<i class="fa fa-bars icones_style"></i>
    			<a href="principal.php?&tipo=intragov&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/v_pre_solicitacao_manual.php" id="form_intragov">Formulário Intragov</a>
   			 </li>
    		<?php }?>
    		<?php if($id_perfil == 8 || $id_perfil == 1){?>
    		<li class="menu_vertical">
      			<i class="fa fa-bars icones_style"></i>
    			<a href="principal.php?&tipo=gcom&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/v_pre_solicitacao_manual.php" id="form_gcom">Formulário GCOM</a>
   			 </li>
    		<?php }?>
    		<?php if($id_perfil == 5 || $id_perfil == 1){?>
    		<li class="menu_vertical">
      			<i class="fa fa-bars icones_style"></i>
    			<a href="principal.php?&tipo=pre&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/v_pre_solicitacao_manual.php" id="form_pre_tramitacao_manual">Formulário Pré-Tramitação</a>
   			 </li>
    		<?php }?>
		</ul>
	</div>
	<div id="t_m_d">
		      	 <?php 
     
			      include("../fixa/bd.php");
			       
			     	$buscarItens=mysql_query("SELECT 
												count(id_solicitacao) AS quantidade,
												'Pré-Tramitação' AS fase,
												pre_tramitacao AS status 
											FROM 
												solicitacao_fases 
											WHERE 
												pre_tramitacao = 'Com operador' AND 
												id_usuario_resp = $id_usuario
											UNION
			     							SELECT 
												count(id_solicitacao) AS quantidade,
												'Tramitação' AS fase,
												tramitacao AS status  
											FROM 
												solicitacao_fases 
											WHERE 
												tramitacao = 'Com operador' AND 
												id_usuario_resp = $id_usuario
											UNION
											SELECT 
												count(id_solicitacao) AS quantidade,
												'Pós-Tramitação' AS fase,
												pos_tramitacao AS status  
											FROM 
												solicitacao_fases 
											WHERE 
												pos_tramitacao = 'Com operador' AND 
												id_usuario_resp = $id_usuario
											UNION
											SELECT 
												count(id_solicitacao) AS quantidade,
												'Intragov' AS fase,
												intragov AS status  
											FROM 
												solicitacao_fases 
											WHERE 
												intragov = 'Com operador' AND 
												id_usuario_resp = $id_usuario
											UNION
											SELECT 
												count(id_solicitacao) AS quantidade,
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
				        	<?php if($id_perfil == 5 || $id_perfil == 1){?>
					        	<?php if ($linha['fase'] == 'Pré-Tramitação' && $linha['status'] == 'Com operador'){?>
						        	Número de solicitações de pré-tramitação a serem preenchidas: 
						        	<?php if($linha['quantidade'] >  0){ ?>
						        	<a id="qtd_itens_pret" href="#"> 
						        		<?php echo $linha['quantidade']; ?>  
						        	</a>
				        	<?php 
				        			}
				   				}
				        	} 
				        	?>
				        </p>
				        <p class="textoParagrafo">
				        	<?php if($id_perfil == 6 || $id_perfil == 1){?>
					        	<?php if ($linha['fase'] ==  'Tramitação'){?>
						        	Número de solicitações de tramitação a serem preenchidas: 
						        	<?php if($linha['quantidade'] >  0){ ?>
						        	<a id="qtd_itens_t" href="#"> 
						        		<?php echo $linha['quantidade']; ?>  
						        	</a>
				        	<?php 
				        			}
			        			}
				        	} 
				        	?>
				        </p>
				        <p class="textoParagrafo">
				        	<?php if($id_perfil == 7 || $id_perfil == 1){?>
					        	<?php if ($linha['fase'] ==  'Pós-Tramitação'){?>
						        	Número de solicitações de pós-tramitação a serem preenchidas: 
						        	<?php if($linha['quantidade'] >  0){ ?>
						        	<a id="qtd_itens_post" href="#"> 
						        		<?php echo $linha['quantidade']; ?>  
						        	</a>
				        	<?php 
				        			}
			        			}
				        	} 
				        	?>
				        </p>
				         <p class="textoParagrafo">
				        	<?php if($id_perfil == 8 || $id_perfil == 1){?>
					        	<?php if ($linha['fase'] ==  'Gcom'){?>
						        	Número de solicitações de gcom a serem preenchidas: 
						        	<?php if($linha['quantidade'] >  0){ ?>
						        	<a id="qtd_itens_gcom" href="#"> 
						        		<?php echo $linha['quantidade']; ?>  
						        	</a>
				        	<?php 
				        			}
			        			}
				        	} 
				        	?>
				        </p>
				        <p class="textoParagrafo">
				        	<?php if($id_perfil == 9 || $id_perfil == 1){?>
					        	<?php if ($linha['fase'] ==  'Intragov'){?>
						        	Número de solicitações de intragov a serem preenchidas: 
						        	<?php if($linha['quantidade'] >  0){ ?>
						        	<a id="qtd_itens_intragov" href="#"> 
						        		<?php echo $linha['quantidade']; ?>  
						        	</a>
				        	<?php 
				        			}
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