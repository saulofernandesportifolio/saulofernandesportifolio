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
  
if($perfil != 16 ){
    
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
    <form action="principal.php?t=forms/form_fila_cotacao_chave_pn.php" method="POST">
        <h3 align="center" style="background: #337ab7"><font color="#FFFFFF">SELECIONE O FILTRO CHAVE PN</font></h3><br />
        <div class="acomodar">
         <p>Cotação/Pedido:
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