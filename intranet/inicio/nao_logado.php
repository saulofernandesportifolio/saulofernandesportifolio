<form action="valida_usuarios.php" method="post">
	  <strong>
        Fa&ccedil;a login para ver informa&ccedil;&otilde;es restritas &agrave; sua &aacute;rea.
      </strong>&nbsp;
	  Login:
	  <input style="background-color:#F7F4DB;" name="usuario" type="text" id="usuario" size="20" maxlength="30" />
      <span id="msgError">
	  <?php if(isset($log_error) && $log_error != ""){ echo "(".$log_error.")";}?>
	  </span>
	  Senha:
	  <input style="background-color:#F7F4DB;" name="senha" type="password" id="senha" size="20" maxlength="30" />
	  <span id="msgError">
	  <?php if(isset($sen_error) && $sen_error != ""){ echo "(".$sen_error.")";}?>
	  </span>
       <input type="submit" name="button" id="button" value="Login" /> 
       <a href="index.php?func=reset">Esqueceu sua senha?</a>
</form>