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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $perfil != 18 && $perfil != 21 && $perfil != 22 && $perfil != 23){
    
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
    <form action="../forms/formdetalhes_visao_cotacao_pendentes_tl.php" method="POST">
        <h3 align="center" style="background: #337ab7"><font color="#FFFFFF">SELECIONE O FILTRO</font></h3><br />
        <div class="acomodar">
        <p>Filtrar:
          <select name="filtros" id="setor">
          <option value="0" selected="selected">Selecione</option>
          <option value="Fora do Prazo">Fora do Prazo</option>
          <option value="Dentro do Prazo">Dentro do Prazo</option>
          <option value="1.Vence Hoje">Vence Hoje</option>
          <option value="2.Vence D+1">Vence D+1</option>
          <option value="3.Vence D+2">Vence D+2</option>
          <option value="4.Vence D>2">Vence D>2</option>
          </select></p>
      <br/>
            <input type="hidden" name="data_1" value="<?php echo $_GET['data_1'] ?>"/>
            <input type="hidden" name="data_2" value="<?php echo $_GET['data_2'] ?>"/>
            <input type="hidden" name="filtrar" value="<?php echo $_GET['filtrar'] ?>"/>
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