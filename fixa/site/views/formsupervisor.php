<div id="fieldset" class="bradius">
	<form action="principal.php?t=controles/sql_enviar_formusuarios.php"  method="POST">
		<input type="hidden" value="0" id="conterro" />
		<legend align="center">
			<h3 align="center">Cadastro supervisores</h3>
		</legend>
		<div class="divformservico">
			<label>*Nome:</label> 
			<p>
			   <input 
			   		type="text" 
			   		name="nome" 
			   		id="nome" 
			   		required 
			   		size="60" 
			   		class="txt bradius" 
			   		value=""
		   		/>
			</p>
			<label>*CPF:</label> 
			<p>
			   <input 
			   		type="text" 
			   		class="txt bradius" 
			   		onblur="validaCpf(this);" 
			   		name="cpf" 
			   		required 
			   		id="cpf"  
			   		size="30" 
			   		value=""/>
			</p>
			 <?php 

     			include("../fixa/bd.php");
              
    		?>
			<label>Projeto:</label>
			<p>
				<input type="text" id="projeto" class="sb2 bradius"/>
			</p>
			
			<label>Coordenador:</label>
			<p>
				<input type="text" id="coordenador" class="sb2 bradius"/>
			</p>
			<label>Regional:</label>
			<p>
				<input type="text" id="regional" class="sb2 bradius"/>
			</p>
			 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
			 <input type="reset" value="Limpar" class="sb2 bradius"/>
			 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onClick="history.back();"/>
		 </div>
	</form>
</div>

</body>
</html>

