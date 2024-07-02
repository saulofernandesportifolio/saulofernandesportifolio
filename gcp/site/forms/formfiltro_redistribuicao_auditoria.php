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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $perfil != 18 && $perfil != 21){
    
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


<script type="text/javascript">
    function PreventMultipleSubmit4(){
      document.getElementById("entrar3").disabled=true;
      document.getElementById("entrar3").style.backgroundColor = "#000";
    }


function showLoader3() {
    $('#loader3').css('visibility', 'visible');
    return true;
};


  </script>


<div id="resolucao">
	<div id="filtro" class="form bradius">
    <form action="principal.php?t=forms/formredistribuicao_cotacao_auditoria.php" method="POST" 
    onsubmit="PreventMultipleSubmit4();showLoader3();">
        <h3 align="center" style="background: #337ab7"><font color="#FFFFFF">SELECIONE O FILTRO <?php echo utf8_encode('ANÁLISE DE INPUT'); ?></font></h3><br />
        <div class="acomodar3">
          <p>Sub-Status:
          <select name="substatusvivocorp" id="substatusvivocorp" class="txt2comboboxmenor bradius">
          <option value="%" selected="selected">Selecione</option>
          <option value="A"><?php echo utf8_encode('Análise documentação');?></option>
          <option value="B">Input</option>
          <option value="C"><?php echo utf8_encode('Análise de input');?></option>
          <option value="D">Aguardando Estoque</option>
          <option value="E"><?php echo utf8_encode('Correção input');?></option>
          </select></p>
          <br />
        <p>Status GALA:
          <select name="statusauditoria" id="statusauditoria" class="txt2comboboxmenor bradius">
          <option value="%" selected="selected">Selecione</option>
          <option value="14">Distribu&iacute;do</option>
          <option value="15">Aprovado analise input</option>
          <option value="16">Reprovado analise input</option>
          <option value="17">Pendente chamado</option>
          <option value="19">Aguardando estoque</option>
          <option value="18">Corre&ccedil;&atilde;o de Input</option>
          </select></p>
       <br />

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

        <p>Cota&ccedil;&atilde;o Principal ou Complementar:</p><br />
         <p>
         <input type="text" name="n_da_cotacao" id="n_da_cotacao"  class="txt bradius"/>
        </p>   
      <br/>
      &nbsp;&nbsp;&nbsp;&nbsp; 
      <input type="submit" class="sb2 bradius" name="entrar3" id="entrar3" value="       OK       "  />
        <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php'" />

            </form>
        <!--principal-->
        </div>
  <?php

  mysql_free_result($acao_operador);
  mysql_close($conecta);  

  ?>
     
               
    </div>
</div>
<div align="center" class="barraloaderimg">

 <img id="loader3" rc="site/forms/img/load.gif" width="300" height="50"  />

</div>



</body>
</html>
