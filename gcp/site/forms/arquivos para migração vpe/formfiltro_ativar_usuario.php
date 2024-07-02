<div class="divformcarrega">
<?php

setcookie('filtro',$_COOKIE['filtro'],time() - 28800);
setcookie('filtro2',$_COOKIE['filtro2'],time() - 28800);
setcookie('filtro3',$_COOKIE['filtro3'],time() - 28800);

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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7){
    
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


;
?>

<div id="resolucao">
	<div id="filtro" class="form bradius">
    <form action="principal.php?t=forms/formativar_usuarios.php" method="POST">
        <h3 align="center" style="background: #735D25"><font color="#FFFFFF">SELECIONE O FILTRO ATIVAR</font></h3><br />
        <div class="acomodar">
        <p>Selecione o supervisor:
        <select name="sup" id="sup">
        <option value="%">todos</option>
       <?php
        //conecta no SGBD MySQL
 
			
        //seleciona a base de dados para uso
        $query= "SELECT * FROM cip_nv.tbl_supervisor WHERE projeto NOT IN('saiu','GERENTE','B.I') AND tipo_supervisor IN ('VPG/TOP','VPG')  ORDER BY nome";
        $result= mysql_query($query,$conecta);
        while($dado= mysql_fetch_array($result)){
            echo "<option value=\"{$dado['id']}\">
               {$dado['nome']}</option>";
         }
        ?>
     </select></p>
      <br/>
       <p>Setor:
      <select name="setor" id="setor">
      <option value="%" >todos</option>
      <option value="1" >Supervisor</option>
      <option value="2" >An&aacute;lise</option>
      <option value="3">Input</option>
      <option value="5">Análise de input</option>
      <option value="6">Corre&ccedil;&atilde;o</option>
      <option value="12">Operador - CO </option>
      <option value="13">Chamado</option> 
      <option value="14">Contesta&ccedil;&atilde;o</option>
      <option value="15">Diretoria</option>
      <option value="16">Portabilidade</option>
      <option value="17">Erros-TT</option>
      <option value="18">Analista-lider</option>
      <option value="19">Erros</option>
      <option value="20">Swap</option>
     </select></p>
      <br />
            <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="       OK       "  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php'" />

            </form>
        <!--principal-->
        </div>

       <?php

  mysql_free_result($acao_operador,$result);
  mysql_close($conecta);  

  ?>
               
    </div>
</div>






</body>
</html>