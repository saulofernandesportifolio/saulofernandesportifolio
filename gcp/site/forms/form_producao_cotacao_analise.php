
<?php

$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("Y-m-d"); 
 
 /*
* Calculando datas no futuro com o PHP a partir de datas definidas
* /
*/
// Pega a data que está salva no banco de dados
$data = date("Y-m-d H:i:s");

// Calcula uma data daqui 2 dias e 2 mêses
$timestamp = strtotime($data . "-4 months 0 days");
// Exibe o resultado
 $data_1 =date('Y-m-d', $timestamp); // 
 $data_2=date('Y-m-d'); 


$usuario_op="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '{$_COOKIE['idtbl_usuario']}' ";
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
                b.status_cip_analise,
                b.disc_status_cip_analise,
                b.dt_tratamento_analise,
                b.hora_tratamento_analise
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_analise b 
                ON a.id_cotacao=b.id_cotacao 
                WHERE a.carteira LIKE '$canal%' and 
                      b.status_cip_analise NOT IN (4,3) and
                      b.idtbl_usuario_analise ='{$_COOKIE['idtbl_usuario']}' and 
                      b.dt_tratamento_analise = '$data_dia'
         AND SUBSTRING(a.criado_em,1,10) BETWEEN '$data_1' and '$data_2' 
         ORDER BY a.cotacao_principal ASC  ";
$acao_op = mysql_query($sql_cota,$conecta) or die (mysql_error());

$linha_op = mysql_fetch_assoc($acao_op);

	$id_cotacao			    = $linha_op["id_cotacao"];
	$cotacao_principal	= $linha_op["n_da_cotacao"];
  $regional			      = $linha_op["regional_atribuida"];
	$uf 	     		      = $linha_op["uf"];
	$criado_em      		= $linha_op["criado_em"];
 	$tipo					      = $linha_op["carteira"];
	$cliente				    = $linha_op["cliente"];
	$status_vivocorp		= $linha_op["status"];
  //$sub_status_vivocorp	= $linha_op["substatus"];
	$TIPO_SERVICO		    = $linha_op["TIPO_SERVICO"];
	$status_cip         = $linha_op["status_cip_analise"];
  $disc_status_cip    = $linha_op["disc_status_cip_analise"];

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


$sql_cota = "SELECT a.id_cotacao,
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
                b.status_cip_analise,
                b.disc_status_cip_analise,
                b.dt_tratamento_analise,
                b.hora_tratamento_analise
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_analise b 
                ON a.id_cotacao=b.id_cotacao 
                WHERE a.carteira LIKE '$canal%' and 
                      b.status_cip_analise NOT IN (4,3) and
                      b.idtbl_usuario_analise ='{$_COOKIE['idtbl_usuario']}' and 
                      b.dt_tratamento_analise = '$data_dia' 
         AND SUBSTRING(a.criado_em,1,10) BETWEEN '$data_1' and '$data_2' 
         ORDER BY a.cotacao_principal ASC  ";
$acao_op = mysql_query($sql_cota,$conecta) or die (mysql_error());

while($linha_op = mysql_fetch_assoc($acao_op))
{
	$id_cotacao			           = $linha_op["id_cotacao"];
	$cotacao_principal	       = $linha_op["n_da_cotacao"];
	$disc_status_cip_analise   = $linha_op["disc_status_cip_analise"];

?>

<tbody>
  <tr>
  <td class="trcabecalho2 bradius">
  <?php echo "$cotacao_principal"?></td>
  <td class="trcabecalho2 bradius">
  <?php echo "$disc_status_cip_analise"?></td>
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


 <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&t=forms/form_fila_cotacao_analise.php'"/>
 </div>
 </div>
</body>
</html>
