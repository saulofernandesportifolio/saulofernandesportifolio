
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
  
    
if($perfil!= 16){
    
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



$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("Y-m-d"); 
 
  


$usuario_op="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '{$_COOKIE['idtbl_usuario']}' ";
$acao_op=mysql_query($usuario_op,$conecta);
$linha_op = mysql_fetch_assoc($acao_op); 
{
$login	=	$linha_op["cpf"];
$nome   =	$linha_op["nome"];
}

$sql_cota = "SELECT * FROM bd_erros_pn.tbl_chave_pn a 
                 WHERE a.fila IN (2,3) and
                      a.usuario ='$nome' and 
                      a.data_tratativa = '$data_dia'              
         ORDER BY a.pedido ASC LIMIT 0,20000 ";
$acao_op = mysql_query($sql_cota,$conecta2) or die (mysql_error());

$linha_op = mysql_fetch_assoc($acao_op);

	$id		 = $linha_op["id"];
	$pedido	         = $linha_op["pedido"];
        $regional        = $linha_op["regional"];
	$criado_em       = $linha_op["criado_em"];
 	$tipo		 = $linha_op["segmento"];
	$cliente	 = $linha_op["cliente"];
 	$status_cip      = $linha_op["status_cip_tp"];
        $disc_status_cip = $linha_op["disc_status_cip_tp"];


$num = mysql_num_rows($acao_op);

?>
<br/><br/><br/><br/><br/>
<div id="filtroservico bradius">
<div class="divformservico bradius">

<table width="100%">
<thead>
<tr>
<th colspan="8" class="trcabecalho2 bradius">Produ&ccedil;&atilde;o Erros</th>
</tr>
<tr>
 <th class="trcabecalho2 bradius">Usuario: <?php echo "$nome"?></th>
 <th class="trcabecalho2 bradius">Total: <?php echo "$num"?></th>
</tr>
 
<tr>
    <th class="trcabecalho2 bradius">Pedidos:</th>
	<th class="trcabecalho2 bradius">Status:</th>
  </tr>
   </thead> 

<?php


$sql_cota = "SELECT * FROM bd_erros_pn.tbl_chave_pn a 
                WHERE a.fila IN (2,3) and 
                      a.usuario ='$nome' and 
                      a.data_tratativa = '$data_dia'              
         ORDER BY a.pedido ASC LIMIT 0,20000 ";
$acao_op = mysql_query($sql_cota,$conecta2) or die (mysql_error());

while($linha_op = mysql_fetch_assoc($acao_op))
{
	$id		        = $linha_op["id"];
	$pedido	          = $linha_op["pedido"];
	$disc_status_cip  = $linha_op["disc_status_fila"];

?>

<tbody>
  <tr>
  <td class="trcabecalho2 bradius">
  <?php echo "$pedido"?></td>
  <td class="trcabecalho2 bradius">
  <?php echo "$disc_status_cip"?></td>
</tr>

</tbody>
 <?php
  }
  ?>
</table>
 
  <br/>

<?php

 mysql_free_result($acao_op);
 mysql_close($conecta,$conecta2);

 ?>

 <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&t=forms/form_fila_cotacao_erros_pn.php'"/>
 </div>
 </div>
</body>
</html>
