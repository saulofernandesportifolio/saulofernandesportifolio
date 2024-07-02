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

<script type="text/javascript">
    function PreventMultipleSubmit15(){
      document.getElementById("entrar14").disabled=true;
      document.getElementById("entrar14").style.backgroundColor = "#000";
    }


function showLoader14() {
    $('#loader14').css('visibility', 'visible');
    return true;
};


  </script>

<div id="resolucao">
	<div id="filtro" class="form bradius">
    <form action="principal.php?t=forms/formdistribuir_cotacao_correcao.php" method="POST" 
    onsubmit="PreventMultipleSubmit15();showLoader14();">
        <h3 align="center" style="background: #337ab7"><font color="#FFFFFF">SELECIONE O FILTRO CORREÇÃO</font></h3><br />
        <div class="acomodar">
  	  <br /> 
		  <p>Carteira:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="carteira" id="carteira" class="txt2comboboxpequeno bradius">
          <option value="%">Todos</option> 
          <option value="GOV">GOV</option>
          <option value="TOP">TOP</option>
          <option value="VIP">VIP</option>
          <option value="TOPVIP">TOP-VIP</option>
          </select></p>
		<br/>
	  
            <input type="submit" class="sb2 bradius" name="entrar14" id="entrar14" value="       OK       "  />
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

 <img id="loader14" src="site/forms/img/load.gif" width="300" height="50"/>

</div>





</body>
</html>