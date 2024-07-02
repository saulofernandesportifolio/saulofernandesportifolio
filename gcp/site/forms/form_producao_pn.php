
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

$sql_cota = "SELECT a.id_pn,
                    a.regional,
                    a.fornecedor,
                    a.data_inicial,
                    a.numero_pedido,
                    a.revisao,
                    a.status_pedido, 
                    a.nome_cliente, 
                    a.ultima_atualizacao_status, 
                    a.codigo_adabas, 
                    a.cpf_cnpj_cliente, 
                    a.cpf_cnpj_cliente_raiz,
                    a.canal, 
                    a.nro_ordem, 
                    a.ordem_manual, 
                    a.pistolagem_leitura,
                    a.data_tramite,
                    a.tmo,
                    a.data_janela,
                    a.aprovacao_pedido,
                    a.chamado, 
                    a.erro, 
                    a.plano_acao, 
                    a.status_atlys, 
                    a.status_spn,
                    a.falando,
                    a.tratamento, 
                    a.obs_erro, 
                    a.pn, 
                    a.status_tp,
                    a.disc_status_tp,
                    a.fila,
                    a.login,
                    a.nome2,
                    a.tramite,
                    a.turno,
                    a.data_tramite2
                FROM bd_erros_pn.controle_pn a 
                 WHERE a.status_tp IN (1,2) and
                      a.login ='$login' and 
                      SUBSTRING(a.data_tratamento,1,10) = '$data_dia'              
         ORDER BY a.numero_pedido ASC LIMIT 0,20000 ";
$acao_op = mysql_query($sql_cota,$conecta2) or die (mysql_error());

$linha_op = mysql_fetch_assoc($acao_op);

	$id_pn			     = $linha_op["id_pn"];
	$pedido	         = $linha_op["pedido"];
  $regional			   = $linha_op["regional"];
	$criado_em       = $linha_op["criado_em"];
 	$tipo					   = $linha_op["segmento"];
	$cliente				 = $linha_op["cliente"];
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
<th colspan="8" class="trcabecalho2 bradius">Produ&ccedil;&atilde;o Portabilidade</th>
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


$sql_cota = "SELECT a.id_pn,
                    a.regional,
                    a.fornecedor,
                    a.data_inicial,
                    a.numero_pedido,
                    a.revisao,
                    a.status_pedido, 
                    a.nome_cliente, 
                    a.ultima_atualizacao_status, 
                    a.codigo_adabas, 
                    a.cpf_cnpj_cliente, 
                    a.cpf_cnpj_cliente_raiz,
                    a.canal, 
                    a.nro_ordem, 
                    a.ordem_manual, 
                    a.pistolagem_leitura,
                    a.data_tramite,
                    a.tmo,
                    a.data_janela,
                    a.aprovacao_pedido,
                    a.chamado, 
                    a.erro, 
                    a.plano_acao, 
                    a.status_atlys, 
                    a.status_spn,
                    a.falando,
                    a.tratamento, 
                    a.obs_erro, 
                    a.pn, 
                    a.status_tp,
                    a.disc_status_tp,
                    a.fila,
                    a.login,
                    a.nome2,
                    a.tramite,
                    a.turno,
                    a.data_tramite2 
                FROM bd_erros_pn.controle_pn a 
                WHERE a.status_tp IN (1,2) and
                      a.login ='$login' and 
                      SUBSTRING(a.data_tratamento,1,10) = '$data_dia'              
         ORDER BY a.numero_pedido ASC LIMIT 0,20000 ";
$acao_op = mysql_query($sql_cota,$conecta2) or die (mysql_error());

while($linha_op = mysql_fetch_assoc($acao_op))
{
	$id_pn		        = $linha_op["id_pn"];
	$pedido	          = $linha_op["numero_pedido"];
	$disc_status_cip  = $linha_op["disc_status_tp"];

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
  
 <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&t=forms/form_fila_cotacao_pn_pos_analise.php'"/>
 </div>
 </div>
</body>
</html>
