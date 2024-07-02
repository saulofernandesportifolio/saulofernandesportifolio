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
  
if($perfil != 13 ){
    
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
    <form action="principal.php?t=forms/form_fila_cotacao_chamado.php" method="POST">
        <h3 align="center" style="background: #337ab7"><font color="#FFFFFF">SELECIONE O FILTRO</font></h3><br />
        <div class="acomodar">
        <p>Filtrar:
          <select name="tratativach" id="tratativach">
          <option value="%" selected="selected">Selecione</option>
          <option value="1">Aguardando chamado</option>
          <option value="2">Chamado em tratativa</option>
         </select></p>
         <br/>
          <p>Setor origem:
          <select name="setor_origem" id="setor_origem">
          <option value="%" selected="selected">Selecione</option>
          <option value="Input">Input</option>
          <option value="Auditoria">Análise de input</option>
          <option value="Correcao">Correção input</option>
         </select></p>
         <br/>
          <p>Cotação:
         <input type="text" name="n_da_cotacao" id="n_da_cotacao"  class="txt bradius"/></p>
         <br/>
         <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="       OK       "  />
         <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.close();" />

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