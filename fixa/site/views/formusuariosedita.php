
<?php

require_once '../fixa/site/classes/cripto.php';

$cripto = new cripto();

$id_usuario_logado = $_GET['idl'];

$id_usuario= $_GET['id'];

$id_usuario = $cripto->decodificar($id_usuario);

$sql_serv = "SELECT * FROM v_geral_usuario_info WHERE id_perfil not in(1,2,10) AND id_usuario = $id_usuario";

$acao_serv=mysql_query($sql_serv,$conecta);

while($user_data = mysql_fetch_array($acao_serv)){
	$nome      		= $user_data['nome'];
	$cpf       		= $user_data['cpf'];
	$perfil    		= $user_data['perfil'];
	$id_perfil 		= $user_data['id_perfil'];
	$id_turno  		= $user_data['id_turno'];
	$turno     		= $user_data['turno'];
	$id_supervisor 	= $user_data['id_supervisor'];
	$supervisor 	= $user_data['supervisor'];
	$projeto 		= $user_data['projeto'];
};

if($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 10){

echo" <script> 
	      alert('Ocorreu um erro!');
	      document.location.replace('../fixa/index.php');
      </script>
      ";                                        
    exit();
}



?>
<div class="bradius wrapper">
	<form action="principal.php?&id=<?php echo $cripto->codificar($id_usuario) ?>&t=controles/sql_formusuariosedita.php"  method="POST">
		<input type="hidden" value="0" id="conterro" />
			<fieldset>
				<input type="hidden" name="idl" value="<?php echo $id_usuario_logado?>"></input>
					<h2>Editar Usuário</h2>
					<br/>
					<div class="div_forms">
					   <input 
					   		type="text" 
					   		name="nome" 
					   		id="nome" 
					   		required 
					   		size="60" 
					   		placeholder="Nome"
					   		value="<?php echo $nome ?>"
				   		/>
					</div>
					<div class="div_forms">
					   <input 
					   		type="text" 
					   		name="cpf" 
					   		required 
					   		id="cpf"  
					   		size="60"
					   		placeholder="CPF"
					   		value="<?php echo $cpf ?>"
				   		/>
					</div>
					 <?php 

		     			include("../fixa/bd.php");
		              
		    		?>
		    		<br/>
					<div class="div_forms">
						<label>Escolha o perfil:</label>
						<select name="perfil" id="perfil" class="txt2comboboxpadrao bradius" required>
							<option selected="selected" value="<?php echo $id_perfil?>"><?php echo $perfil ?></option>
							<?php 
								if($projeto != 'SC')
								{
									$buscarperfil=mysql_query(
							            "SELECT distinct 
											id_perfil, 
											nome
											FROM perfil 
											WHERE id_perfil BETWEEN 3 AND 11
											AND NOME != 'Coordenador'
											"
						            );
					            }
					            else if($projeto == 'SC')
					            {
					            	 $buscarperfil=mysql_query(
							            "SELECT distinct 
											id_perfil, 
											nome
											FROM perfil 
											WHERE id_perfil IN(3,4,12,13,14,15,16,17,18,19)
											"
						            );
					            }  

								while($linha=mysql_fetch_array($buscarperfil)){ 
								?>  
							   		<option value="<?php echo $linha['id_perfil']; ?>">
							   			<?php echo $linha['nome']; ?>
						   			</option>
					   			<?php 
					          		}
					     		?>
					  	</select>
					</div>
					<br/>
					<div class="div_forms">
						<label>Escolha o turno:</label>
						<select name="turno" id="turno" class="txt2comboboxpadrao bradius" required>
							<option selected="selected" value="<?php echo $id_turno?>"><?php echo $turno ?></option>
							<?php
								$buscarturno=mysql_query(
						            "SELECT distinct 
						                id_turno, 
						                turno
						            FROM turno "
					            );
					            while($linha=mysql_fetch_array($buscarturno)){ 
		            		?>
					   			<option value="<?php echo $linha['id_turno']; ?>">
					   				<?php echo $linha['turno']; ?>
					   			</option>
					 		<?php 
				          		}
				     		?>
					  	</select>
					</div>
					<br/>
					<div class="div_forms">
						<label>Escolha o supervisor:</label>
						<select name="supervisor" id="supervisor" class="txt2comboboxpadrao bradius" required>
							<option selected="selected" value="<?php echo $id_supervisor?>"><?php echo $supervisor ?></option>
							<?php
								$buscarsupervisor=mysql_query(
						            "SELECT distinct 
						                id_supervisor, 
						                nome
						            FROM supervisor 
						            WHERE projeto = '$projeto'
						            "
					            );
					
					            while($linha=mysql_fetch_array($buscarsupervisor)){ 
		            		?>
					   		<option value="<?php echo $linha['id_supervisor']; ?>">
					   			<?php echo $linha['nome']; ?>
					   		</option>
					   		<?php 
				          		}
				     		?>
					  	</select>
					</div>
					<br/>
					<div class="div_forms">
						<label>Escolha a area:</label>
						<?php if($projeto != 'SC'){?>
						<select name="projeto" id="projeto" class="txt2comboboxpadrao bradius" required>
							<option selected="selected" value="<?php echo $projeto?>"><?php echo $projeto ?></option>
							<option value="Voz">Voz</option>
							<option value="Dados">Dados</option>
							<option value="VozDados">Voz\Dados</option>
							<option value="Intragov">Intragov</option>
							<option value="Gcom">Gcon</option>
					  	</select>
					  	<?php }else if($projeto == 'SC'){?>
				  		<select name="projeto" id="projeto" class="txt2comboboxpadrao bradius" required>
							<option value="SC">Suporte Comercial</option>
				  		</select>
					  	<?php } ?>
					</div>
					<br/>
					<div class="div_forms">
						<label>E2E:</label>
						<input type="checkbox" id="e2e" name="e2e" style="height: 15px;"></input>
					</div>
					<br/>
					 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
					 <input type="reset" value="Limpar" class="sb2 bradius"/>
					 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onClick="history.back();"/>
		 	</fieldset>   
	</form>
</div>
