<script type="text/javascript" src="js/Usuario.js"></script>

<?php
$id_usuario= $_POST['id_usuario_logado'];
?>

<div class="bradius wrapper">
	<form action="principal.php?&t=Controller/UsuariosController.php"  method="POST">
		<input type="hidden" name="id_usuario_logado" value="<?php echo $id_usuario ?>">
		<input type="hidden" name="opcao" value="insereNovoUsuario">
		<input type="hidden" value="0" id="conterro" />
			<fieldset>
					<h2>Novo Usuário</h2>
					<br/>
					<div class="div_forms">
					   <input 
					   		type="text" 
					   		name="nome" 
					   		id="nome" 
					   		required 
					   		size="60" 
					   		placeholder="Nome"
				   		/>
					</div>
					<div class="div_forms">
					   <input 
					   		type="text" 
					   		name="cpf" 
					   		required 
					   		id="cpf"  
					   		size="30" 
					   		value=""
					   		placeholder="CPF"
				   		/>
					</div>
					 <?php 

		     			include("../fixa_top/bd.php");
		              
		    		?>
		    		<br/>
					<div class="div_forms">
						<label>Escolha o perfil:</label>
						<select name="perfil" id="perfil" class="txt2comboboxpadrao bradius" required>
							<?php 
								$buscarperfil=mysql_query(
						            "SELECT distinct 
						                id_perfil, 
						                nome
						            FROM perfil 
						            WHERE id_perfil in(3,4,6,12,13)"
					            );  

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
							<option value="2">Luis Carlos Silva</option>
					  	</select>
					</div>
					<br/>
					 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
					 <input type="reset" value="Limpar" class="sb2 bradius"/>
					 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onClick="history.back();"/>
		 	</fieldset>   
	</form>
</div>

