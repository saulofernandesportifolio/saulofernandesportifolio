
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
  
    
if($perfil!= 15){
    
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

$sql_cota = "SELECT *FROM cip_nv.base_diretoria b 
             WHERE  b.operador_diretoria ='$nome' 
                 and b.data_tratamento= '$data_dia' and b.cotacao_atividade <> 'sem'                 
         ORDER BY b.cotacao_atividade ASC LIMIT 0,5000 ";
$acao_op = mysql_query($sql_cota,$conecta) or die (mysql_error());

$linha_op = mysql_fetch_assoc($acao_op);

	$id_cotacao	   = $linha_op["id"];
	$cotacao_principal = $linha_op["cotacao_atividade"];
	$status_vivocorp   = $linha_op["disc_statusdiretoria"];


$num = mysql_num_rows($acao_op);

?>
<br/><br/><br/><br/><br/>
<div id="filtroservico bradius">
<div class="divformservico bradius">

<table width="100%">
<thead>
<tr>
<th colspan="8" class="trcabecalho2 bradius">Produ&ccedil;&atilde;o Diretoria - Cotações</th>
</tr>
<tr>
 <th colspan="2" class="trcabecalho2 bradius">Usuario: <?php echo "$nome"?></th>
 <th class="trcabecalho2 bradius">Total: <?php echo "$num"?></th>
</tr>
 
<tr>
    <th class="trcabecalho2 bradius">Cota&ccedil;&otilde;es:</th>
	<th class="trcabecalho2 bradius">Status:</th>
  <th class="trcabecalho2 bradius">Ação:</th>
  </tr>
   </thead> 

<?php


$sql_cota = "SELECT * FROM cip_nv.base_diretoria b 
         
                WHERE b.operador_diretoria ='$nome' 
                   and b.data_tratamento= '$data_dia' and b.cotacao_atividade <> 'sem'           
         ORDER BY b.cotacao_atividade ASC LIMIT 0,5000 ";
$acao_op = mysql_query($sql_cota,$conecta) or die (mysql_error());

while($linha_op = mysql_fetch_assoc($acao_op))
{
	
?>

<tbody>
  <tr>
  <td class="trcabecalho2 bradius">
  <?php echo $linha_op["cotacao_atividade"]; ?></td>
  <td class="trcabecalho2 bradius">
  <?php echo $linha_op["disc_statusdiretoria"]; ?></td>
   <td class="trcabecalho2 bradius">
  <?php echo $linha_op["acao"]; ?></td>
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
