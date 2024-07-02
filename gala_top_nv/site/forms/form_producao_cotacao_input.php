
<?php

$sql_operador="SELECT * FROM tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
    
if($perfil!= 3){
    
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
 
  


$usuario_op="SELECT * FROM tbl_usuarios WHERE idtbl_usuario = '$idtbl_usuario'";
$acao_op=mysql_query($usuario_op,$conecta);
$linha_op = mysql_fetch_assoc($acao_op); 
{
$login	=	$linha_op["usuario"];
$nome   =	$linha_op["nome"];
}

$sql_cota = "SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
                a.n_da_cotacao,
                a.criado_em,
                a.carteira,
                a.revisao,
                a.vencimento,
                a.comentarios,
                a.criado_por,
                a.cliente,
                a.responsavel,
                a.cpf_cnpj,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
                a.descricao,
                a.TIPO_SERVICO,
                b.status_cip_input,
                b.disc_status_cip_input,
                b.dt_tratamento_input,
                b.hora_tratamento_input
                FROM tbl_cotacao a INNER JOIN tbl_input b 
                ON a.id_cotacao=b.id_cotacao 
                WHERE a.carteira LIKE '$canal%' and 
                      b.status_cip_input NOT IN (7,8) and
                      b.idtbl_usuario_input ='{$_COOKIE['idtbl_usuario']}' and 
                      b.dt_tratamento_input = '$data_dia'              
         ORDER BY a.cotacao_principal ASC LIMIT 0,20000 ";
$acao_op = mysql_query($sql_cota) or die (mysql_error());

$linha_op = mysql_fetch_assoc($acao_op);

	$id_cotacao			= $linha_op["id_cotacao"];
	$cotacao_principal	= $linha_op["n_da_cotacao"];
  $regional			= $linha_op["regional_atribuida"];
	$uf 	     		= $linha_op["uf"];
	$criado_em      		= $linha_op["criado_em"];
 	$tipo					= $linha_op["carteira"];
	$cliente				= $linha_op["cliente"];
	$status_vivocorp		= $linha_op["status"];
  //$sub_status_vivocorp	= $linha_op["substatus"];
	$TIPO_SERVICO		    = $linha_op["TIPO_SERVICO"];
	$status_cip              = $linha_op["status_cip_input"];
  $disc_status_cip         = $linha_op["disc_status_cip_input"];


$num = mysql_num_rows($acao_op);

?>
<br/><br/><br/><br/><br/>
<div id="filtroservico bradius">
<div class="divformservico bradius">

<table width="100%">
<thead>
<tr>
<th colspan="8" class="trcabecalho2 bradius">Produ&ccedil;&atilde;o Cota&ccedil;&otilde;es</th>
</tr>
<tr>
 <th class="trcabecalho2 bradius">Usuario: <?php echo "$nome"?></th>
 <th class="trcabecalho2 bradius">Total: <?php echo "$num"?></th>
</tr>
 
<tr>
    <th class="trcabecalho2 bradius">Cota&ccedil;&otilde;es:</th>
	<th class="trcabecalho2 bradius">Status:</th>
  </tr>
   </thead> 

<?php


$sql_cota = "SELECT  a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
                a.criado_em,
                a.carteira,
                a.revisao,
                a.vencimento,
                a.comentarios,
                a.criado_por,
                a.cliente,
                a.responsavel,
                a.cpf_cnpj,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
                a.descricao,
                a.TIPO_SERVICO,
                b.status_cip_input,
                b.disc_status_cip_input,
                b.dt_tratamento_input,
                b.hora_tratamento_input
                FROM tbl_cotacao a INNER JOIN tbl_input b 
                ON a.id_cotacao=b.id_cotacao 
                WHERE a.carteira LIKE '$canal%' and 
                      b.status_cip_input NOT IN (7,8) and
                      b.idtbl_usuario_input ='{$_COOKIE['idtbl_usuario']}' and 
                      b.dt_tratamento_input = '$data_dia'              
         ORDER BY a.cotacao_principal ASC LIMIT 0,20000 ";
$acao_op = mysql_query($sql_cota) or die (mysql_error());

while($linha_op = mysql_fetch_assoc($acao_op))
{
	$id_cotacao			= $linha_op["id_cotacao"];
	$cotacao_principal	= $linha_op["n_da_cotacao"];
	$disc_status_cip_input   = $linha_op["disc_status_cip_input"];

?>

<tbody>
  <tr>
  <td class="trcabecalho2 bradius">
  <?php echo "$cotacao_principal"?></td>
  <td class="trcabecalho2 bradius">
  <?php echo "$disc_status_cip_input"?></td>
</tr>

</tbody>
 <?php
  }
  ?>
</table>
 
  <br/>
 <input type="button" name="Submit2" value="Voltar" onclick="window.location='../gala/principal.php?&t=forms/form_fila_cotacao_input.php'"/>
 </div>
 </div>
</body>
</html>
