
<?php 
setcookie('filtro',$_COOKIE['filtro'],time() - 28800);
setcookie('filtro2',$_COOKIE['filtro2'],time() - 28800);
setcookie('filtro3',$_COOKIE['filtro3'],time() - 28800);
setcookie('cnpj',$_COOKIE['cnpj'],time() - 28800);

?>

<div class="divformcarrega">
<?php


$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 4 && $perfil != 18 && $perfil != 21){
    
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
    <div style="margin-left: 30px;"><input type="button" class="sb3 bradius" name="novo" id="novo" value="Novo" onclick="window.location='principal.php?&t=forms/form_cadastro_carteira.php'" /></div>
    <br />  
    <form action="principal.php?t=forms/form_atualizar_carteira2.php" method="POST">
        <h3 align="center" style="background: #337ab7"><font color="#FFFFFF">Aualizar Carteira</font></h3>
        <div class="acomodar">
        <p>CNPJ:</p>
         <p>
         <input type="text" name="cnpj" id="cnpj"  class="txt bradius"/>
        </p>
      <br/>
            
            <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="Pesquisar"  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&t=forms/formhome_operacao.php'" />

            </form>
        <!--principal-->
        </div>

        <br />
               
    </div>
</div>


<?php

 mysql_free_result($acao_operador);
 mysql_close($conecta);

?>



</body>
</html>