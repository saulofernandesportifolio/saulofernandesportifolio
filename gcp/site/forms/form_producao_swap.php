
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
  
    
if($perfil != 20){
    
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
 
  

$usuario_op="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '$idtbl_usuario'";
$acao_op=mysql_query($usuario_op,$conecta);
$linha_op = mysql_fetch_assoc($acao_op); 
{
$login	=	$linha_op["idtbl_usuario"];
$nome   =	$linha_op["nome"];
}

$sql_cota = "SELECT * FROM cip_nv.tbl_swap a 
                WHERE a.operador_swap ='$login' 
                   and a.data_tratamento_swap_cip = '$data_dia'             
         ORDER BY a.cotacaopedido ASC LIMIT 0,5000 ";
$acao_op = mysql_query($sql_cota,$conecta) or die (mysql_error());

$linha_op = mysql_fetch_assoc($acao_op);

	$id_cotacao		= $linha_op["id_swap"];
	$cotacao_principal	= $linha_op["cotacaopedido"];
	$status_vivocorp	= $linha_op["statuscip"];


$num = mysql_num_rows($acao_op);
$statuscip
?>
<br/><br/><br/><br/><br/>
<div id="filtroservico bradius">
<div class="divformservico bradius">

<table width="100%">
<thead>
<tr>
<th colspan="8" class="trcabecalho2 bradius">Produ&ccedil;&atilde;o Swap</th>
</tr>
<tr>
 <th colspan="3" class="trcabecalho2 bradius">Usuario: <?php echo "$nome"?></th>
 <th class="trcabecalho2 bradius">Total: <?php echo "$num"?></th>
</tr>
 
<tr>
    <th class="trcabecalho2 bradius">Cota&ccedil;&otilde;es/Pedido:</th>
   <th class="trcabecalho2 bradius">Revisão:</th> 
	<th class="trcabecalho2 bradius">Status:</th>
  <th class="trcabecalho2 bradius">Status CIP:</th>
  </tr>
   </thead> 

<?php


$sql_cota = "SELECT * FROM cip_nv.tbl_swap a 
                WHERE a.operador_swap ='$login' 
                   and a.data_tratamento_swap_cip = '$data_dia'       
         ORDER BY a.cotacaopedido ASC LIMIT 0,5000 ";
$acao_op = mysql_query($sql_cota,$conecta) or die (mysql_error());

while($linha_op = mysql_fetch_assoc($acao_op))
{
	
    
       if($linha_op["statuscip"] == 1){
         $linha_op["statuscip"]='Tratando';
     }
     
     if($linha_op["statuscip"] == 2){
        $linha_op["statuscip"]='Tratado'; 
     }

     if($linha_op["statuscip"] == 3){
        $linha_op["statuscip"]='Reprovado'; 
     }


?>

<tbody>
  <tr>
  <td class="trcabecalho2 bradius">
  <?php echo $linha_op["cotacaopedido"]; ?></td>
    <td class="trcabecalho2 bradius">
  <?php echo $linha_op["revisao_swap"]; ?></td>
  <td class="trcabecalho2 bradius">
  <?php echo $linha_op["status"]; ?></td>
   <td class="trcabecalho2 bradius">
  <?php echo $linha_op["statuscip"]; ?></td>
</tr>

</tbody>
 <?php
  }
  ?>
</table>
 
  <br/>

<?php

 mysql_free_result($acao_op);
 mysql_close($conecta);

 ?>
  
 <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php'"/>
 </div>
 </div>
</body>
</html>
