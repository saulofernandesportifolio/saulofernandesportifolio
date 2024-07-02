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
  
if($perfil != 1 && $perfil != 14){
    
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
	
    <form action="principal.php?t=forms/formconsulta_cotacoes_contestacao2.php" method="POST">
        <h3 align="center" style="background: #337ab7"><font color="#FFFFFF">Pesquisar Cota&ccedil;&eth;es</font></h3><br />
        <div class="acomodar">
        <p>Principal ou Complementar:</p><br />
         <p>
         <input type="text" name="n_da_cotacao" id="n_da_cotacao"  class="txt bradius"/>
        </p>
       <br />
        <p>Contestacao Status Cip:</p><br />
        <p>
        <select name="contestacao_status_cip" id="contestacao_status_cip" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxmedio bradius" >
        <option value="">Selecione...</option>
        <option value="%">Todos</option>
        <option value="1">Pendente de correção</option> 
        <option value="4">Pendente qualidade</option> 
        <option value="2">Tratando</option>
        <option value="3">Tratado</option>
        </select></p>
      <br/>
         
            <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="Pesquisar"  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php'" />

            </form>
        <!--principal-->
          <br/><br/>
          <form action="principal.php?t=forms/formconsulta_cotacoes_contestacao_manual.php" method="POST">
	      <input type="submit" class="sb3 bradius" name="Cadastrar manualmente" id="entrar" value="Cadastrar manualmente"  />
	      </form>
     

        </div>

      
               
    </div>


</div>


<?php

 mysql_free_result($acao_operador);
 mysql_close($conecta);

?>



</body>
</html>