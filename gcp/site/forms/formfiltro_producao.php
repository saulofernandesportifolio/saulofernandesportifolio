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
  
if($perfil != 1 && $perfil != 4 && $perfil != 18 && $perfil != 21 && $perfil != 22 && $perfil != 23){
    
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
    <form action="principal.php?t=forms/formproducao.php" method="POST">
        <h3 align="center" style="background: #337ab7"><font color="#FFFFFF">SELECIONE O FILTRO</font></h3><br />
        <div class="acomodar">
  
		    <p>
            <strong>Data Inicial:</strong> 
            <input name="data_1" type="text" id="data_1" size="15" maxlength="10"  class="txt2data bradius"
            onkeyup="Formatadata(this,event);" 
            onclick="displayCalendar(document.getElementById('data_1'),'dd/mm/yyyy',this,true);"/>
        </p>
        <br />
        <p>
            <strong>Data Final:</strong> &nbsp;
            <input name="data_2" type="text" id="data_2" size="15" maxlength="10"  class="txt2data bradius" 
            onkeyup="Formatadata(this,event);" 
            onclick="displayCalendar(document.getElementById('data_2'),'dd/mm/yyyy',this,true);"/>
        </p>    
		  <br /> 
		  <p>Setor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="setor" id="setor" class="txt2comboboxpequeno bradius">
          <option value="0" selected="selected">Selecione</option>
          <option value="1">An&aacute;lise</option>
          <option value="2">Input</option>
          <option value="3">Auditoria</option>
          <option value="4">Corre&ccedil;&atilde;o</option>
          <option value="5">Chamado</option>
          <option value="6">Contesta&ccedil;&atilde;o</option>
          <option value="7">Diretoria</option>
          <option value="16">Portabilidade</option>
          <option value="19">Erros</option> 
          <option value="20">Swap</option> 
           <option value="17">Erros-TT</option>      
          </select></p>
		<br/>
	    <p>Turno:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="turno" id="turno" class="txt2comboboxpequeno bradius">
          <option value="0" selected="selected">Selecione</option>
		  <option value=%>Todos</option>
          <option value="1">Diurno</option>
          <option value="2">Intermediáriorio</option>
          <option value="3">Notruno</option>
          </select></p>
	   <br/>
            <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="       OK       "  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&t=forms/formhome_operacao.php'" />

            </form>
        <!--principal-->
        </div>

  <?php

  mysql_free_result($acao_operador);
  mysql_close($conecta);  

  ?>
               
    </div>
</div>






</body>
</html>