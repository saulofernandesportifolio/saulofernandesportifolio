<script type="text/javascript" src="js/Usuario.js"></script>

<?php

require_once '../fixa_top/app/Model/cripto.php';

$cripto = new cripto();

$id_usuario_logado = $_GET['idl'];
$id_usuario= $_GET['id'];

$id_usuario_logado = $cripto->decodificar($id_usuario_logado);
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
	      document.location.replace('../fixa_top/index.php');
      </script>
      ";                                        
    exit();
}



?>
<div class="bradius wrapper">
	<form action="principal.php?&t=Controller/UsuariosController.php"  method="POST">
		<input type="hidden" value="0" id="conterro" />
		<input type="hidden" name="id_usuario_logado" value="<?php echo $cripto->codificar($id_usuario_logado) ?>">
		<input type="hidden" name="id_usuario" value="<?php echo  $cripto->codificar($id_usuario) ?>">
		<input type="hidden" name="opcao" value="editarNovoUsuario">
			<fieldset>
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

		     			include("../fixa_top/bd.php");
		              
		    		?>
		    		<br/>
					<div class="div_forms">
						<label>Escolha o perfil:</label>
						<select name="perfil" id="perfil" class="txt2comboboxpadrao bradius" required>
							<option selected="selected" value="<?php echo $id_perfil?>"><?php echo $perfil ?></option>
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
					  	</select>
					</div>
					<br/>
					 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
					 <input type="reset" value="Limpar" class="sb2 bradius"/>
					 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onClick="history.back();"/>
		 	</fieldset>   
	</form>
</div>
