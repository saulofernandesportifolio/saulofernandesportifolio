<link rel="StyleSheet" href="../../css/padrao.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>

<script src="../../js/jquery.tablesorter.min.js"></script>
<script src="../../js/jquery.tablesorter.pager.js"></script>


<div class="divformcarrega">
<?php
include("../../bd.php");

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
  
if($perfil != 1 && $perfil != 4 && $perfil != 15){
    
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
    <form action="principal.php?t=forms/form_valida_diretoria_visao.php" method="POST" 
    onsubmit="PreventMultipleSubmit12();showLoader11();">
        <h3 align="center" style="background: #337ab7"><font color="#FFFFFF">SELECIONE O FILTRO PENDÊNCIAS</font></h3><br />
        <div class="acomodar">
      <br /> 
      <p>Tipo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="tipofiltro" id="tipofiltro" class="txt2comboboxpequeno bradius">
          <option value="" selected="selected">Selecione</option>
          <option value="1">Atividade</option>
          <option value="2">Cotação</option>
          <!--<option value="3">Documentação</option>-->
          </select></p>
    <br/>
    
            <input type="submit" class="sb2 bradius" name="entrar11" id="entrar11" value="       OK       "  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php'" />

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
  
 <img id="loader11" src="site/forms/img/load.gif" width="300" height="50" />

</div>



</body>
</html>