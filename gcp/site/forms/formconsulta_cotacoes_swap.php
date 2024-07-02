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
  
if($perfil != 1 && $perfil != 20){
    
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
    <form action="principal.php?t=forms/formconsulta_cotacoes_swap2.php" method="POST">
        <h3 align="center" style="background: #337ab7"><font color="#FFFFFF">Pesquisar Cota&ccedil;&eth;es</font></h3><br />
        <div class="acomodar">
        <p>Cotação/pedido:</p><br />
         <p>
         <input type="text" name="n_da_cotacao" id="n_da_cotacao"  class="txt bradius"/>
        </p>
      <br/>
        <p>Status Cip:</p><br />
        <p>
        <select name="statuscip" id="statuscip" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxmedio bradius" >
        <option value="">Selecione...</option>
        <option value="%">Todos</option>
        <option value="1">Em Tratativa</option> 
        <option value="2">Concluido</option>
        <option value="3">Reprovado</option>
        <option value="4">Chamado TI</option>
        <option value="5">Retorno chamado</option>        

        </select></p>
      <br/>
         
            <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="Pesquisar"  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php'" />

            </form>
        <!--principal-->
        </div>

        
               
    </div>
</div>


<?php

 mysql_free_result($acao_operador);
 mysql_close($conecta);

?>



</body>
</html>