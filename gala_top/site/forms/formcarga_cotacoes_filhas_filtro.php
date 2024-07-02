<div class="divformcarrega">
<?php



$sql_operador="SELECT * FROM tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
    
if($perfil!= 3 && $perfil != 4 && $perfil != 1){
    
setcookie('salva',$_COOKIE['idtbl_usuario'],time() - 28800);
setcookie('idtbl_usuario',"");
    
echo "
       <script type=\"text/javascript\">
        alert('Usu\u00e1rio inv\u00e1lido!');
        document.location.replace('index.php');
	    </script>
 ";
  exit(); 
    
    
    
} 


?>

<div id="resolucao">
	<div id="filtro" class="form bradius">
    <form action="principal.php?t=forms/formcarga_cotacoes_filhas.php" method="POST">
        <h3 align="center" style="background: #735D25"><font color="#FFFFFF">Cota&ccedil;&eth;es Filhas</font></h3><br />
        <div class="acomodar">
        <p>Digite a Cota&ccedil;&atilde;o Principal:</p><br />
         <p>
         <input type="text" name="cotacao_principal" id="cotacao_principal"  class="txt bradius"/>
        </p>
      <br/>
         
            <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="Cadastrar"  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php'" />

            </form>
        <!--principal-->
        </div>

        
               
    </div>
</div>






</body>
</html>