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
 $data_dia= date("Y/m/d"); 
 
 
   function arrumadata($string) {
    if($string == ''){
    $data= substr($string,8,2)."".substr($string,5,2)."".substr($string,0,4);   
        
    }else{
        
    $data= substr($string,8,2)."/".substr($string,5,2)."/".substr($string,0,4);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}
 
 
 
 $sql_verifca = "SELECT a.id_cotacao,
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
                b.motivo_da_acao,
                b.disc_motivo_da_acao,
                a.TIPO_SERVICO,
                a.ALTAS,
                a.PORTABILIDADE2,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,
                a.PRE_POS,
                a.MIGRACAO_TROCA,
                a.total_linhas_cip,
                b.id_input,
                b.status_cip_input,
                b.disc_status_cip_input,
                b.status_correcao,
                b.idtbl_usuario_input,
                b.obs_input
                FROM tbl_cotacao a INNER JOIN tbl_input b 
                ON a.id_cotacao='$id_cotacao' 
                WHERE a.carteira LIKE '$canal%' and 
                      (b.status_cip_input = 8 OR b.status_correcao= 24) and
                      b.idtbl_usuario_input='{$_COOKIE['idtbl_usuario']}' and
                      b.id_cotacao='$id_cotacao'
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,20000 ";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao_verifica))
{
	$id_input		    = $linha_atv["id_input"];
    $id_cotacao		= $linha_atv["id_cotacao"];

  //contagem sla
   include("site/controles/sql.sla.php");
    
	$cotacao_principal	   = $linha_atv["cotacao_principal"];
  $n_da_cotacao    	     = $linha_atv["n_da_cotacao"];
  $regional			         = $linha_atv["regional_atribuida"];
	$uf 	                 = $linha_atv["uf"];
	$criado_em      		   = $linha_atv["criado_em"];
 	$tipo					         = $linha_atv["carteira"];
 	$revisao				       = $linha_atv["revisao"];
 	$vencimento				     = $linha_atv["vencimento"];
  $criado_por            = $linha_atv["criado_por"];
	$cliente				       = $linha_atv["cliente"];
  $responsavel           = $linha_atv["responsavel"];
  $cpf_cnpj              = $linha_atv["cpf_cnpj"];
	$status_vivocorp		   = $linha_atv["status_da_cotacao"];
  $sub_status_vivocorp	 = utf8_decode($linha_atv["substatus_da_cotacao"]);
  $status              	 = $linha_atv["status"];
  $comentarios           = $linha_atv["comentarios"];
  $descricao           	 = $linha_atv["descricao"];
	$TIPO_SERVICO		       = $linha_atv["TIPO_SERVICO"];
  $ALTAS                 = $linha_atv["ALTAS"];
  $PORTABILIDADE         = $linha_atv["PORTABILIDADE2"];
  $MIGRACAO              = $linha_atv["MIGRACAO"];
  $TROCAS                = $linha_atv["TROCAS"];
  $TT                    = $linha_atv["TT"];
  $BACKUP                = $linha_atv["BACKUP"];
  $M_2_M                 = $linha_atv["M_2_M"];
  $FIXA                  = $linha_atv["FIXA"];
  $PRE_POS               = $linha_atv["PRE_POS"]; 
  $MIGRACAO_TROCA        = $linha_atv["MIGRACAO_TROCA"];   
  $total_linhas_cip      = $linha_atv["total_linhas_cip"];
  $status_cip            = $linha_atv["status_cip_input"];
  $disc_status_cip       = $linha_atv["disc_status_cip_input"];
  $obs_input             = $linha_atv["obs_input"];
  $status_correcao       = $linha_atv["status_correcao"];
  $motivodaacao          = $linha_atv["motivo_da_acao"];
  $disc_motivo_da_acao   = $linha_atv["disc_motivo_da_acao"];
  $usuario               = $linha_atv["idtbl_usuario_input"];

  $criado_em=arrumadatahora($criado_em);
  $vencimento=arrumadata($vencimento);



?>


<br>
<div id="filtroservico bradius">



<p align="center"  class="tituloform bradius"><font size="5" style="text-align: center;">Input</font></p>


<div class="divformservico bradius">
<?php if($status_correcao == 24 ){ ?>
<form action="principal.php?&id_input=<?php echo $id_input; ?>&t=controles/sql_enviar_form_input_correcao.php"  method="POST">
<?php }else{ ?>
<form action="principal.php?&id_input=<?php echo $id_input; ?>&t=controles/sql_enviar_form_input.php"  method="POST">
<?php }?>
<input type="hidden" value="0" id="conterro" />



<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Principal:&nbsp;<?php echo $cotacao_principal; ?></label>
<?php if($cotacao_principal != $n_da_cotacao){ ?>
<label style="padding-left: 5px;">Complementar:&nbsp;<?php echo $n_da_cotacao; ?></label>
<?php } ?>
<label style="padding-left: 5px;">Regional:&nbsp;<?php echo  $regional; ?></label>
<label style="padding-left: 5px;">Criado em:&nbsp;<?php echo  $criado_em; ?></label></p>
<br />
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Carteira:&nbsp;<?php echo  $tipo; ?></label>
<label style="padding-left: 20px;">Revisão:&nbsp;<?php echo  $revisao; ?></label>
<label style="padding-left: 20px;">Criado por :&nbsp;<?php echo  $criado_por; ?></label>
<label style="padding-left: 20px;">Status :&nbsp;<?php echo  $status; ?></label></p>
<br />
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cliente:&nbsp;<?php echo  $cliente; ?></label></p>
<br />
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 20px;">Responsavel:&nbsp;<?php echo $responsavel; ?></label>
<label style="padding-left: 5px;">CNPJ/CPF:&nbsp;<?php echo  $cpf_cnpj; ?></label>
</p>
<br />
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Status:&nbsp;<?php echo $status_vivocorp; ?></label>
<label style="padding-left: 20px;">Sub-status:&nbsp;<?php echo utf8_encode($sub_status_vivocorp); ?></label>
</p>

<br />
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Descrição:&nbsp;<?php if(empty($descricao)){ echo $descricao="Sem descrição";}else{ echo $descricao; } ?></label>
</p>
<br />
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Comentários:&nbsp;<?php if(empty($comentarios)){ echo $comentarios="Sem comentários";}else{ echo $comentarios; } ?></label>
</p>
<br />

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">ALTAS:&nbsp;<?php echo $ALTAS; ?></label>
<label style="padding-left: 15px;">PORTABILIDADE:&nbsp;<?php echo $PORTABILIDADE; ?></label>
<label style="padding-left: 15px;">MIGRACAO:&nbsp;<?php echo $MIGRACAO; ?></label>
<label style="padding-left: 15px;">TROCAS:&nbsp;<?php echo $TROCAS; ?></label>
<label style="padding-left: 15px;">TT:&nbsp;<?php echo $TT; ?></label>
<label style="padding-left: 15px;">BACKUP:&nbsp;<?php echo $BACKUP; ?></label>
<label style="padding-left: 15px;">M2M:&nbsp;<?php echo $M_2_M; ?></label>
<label style="padding-left: 15px;">FIXA:&nbsp;<?php echo $FIXA; ?></label>
<label style="padding-left: 15px;">PRE POS:&nbsp;<?php echo  $PRE_POS; ?></label>
<label style="padding-left: 15px;">MIGRACAO TROCA:&nbsp;<?php echo $MIGRACAO_TROCA; ?></label>
<br /><br />
<label style="padding-left: 6px;">TOTAL LINHAS:&nbsp;<?php echo  $total_linhas_cip; ?></label></p>
<br />
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ação:&nbsp;
<?php if(!empty($status_cip) && empty($status_correcao)){ ?>
<select name="substatus" id="substatus" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
      <?php } 
      if(!empty($status_cip) && $status_correcao == 24){ ?>
   <select name="substatus" id="substatus" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius" disabled="disabled" >
   <option value="<?php echo $status_cip ?>"><?php echo $disc_status_cip ?></option>
   <?php } ?>
   
   <?php
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM tbl_substatus WHERE setor='input' ORDER BY id_status";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id_status']}\">
               {$dado['substatus']}</option>";
   }
 ?> </select></label></p>

<br />


<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Motivo da ação:&nbsp;
<?php if(!empty($status_cip) &&   empty($status_correcao)){ ?>
<select name="motivodaacao" id="motivodaacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
   <?php } 
   if(!empty($status_cip) && $status_correcao == 24){ ?>
   <select name="motivodaacao" id="motivodaacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius"  disabled="disabled">
  <option value="<?php echo $motivodaacao ?>"><?php echo $disc_motivo_da_acao ?></option>
   <?php } 
  
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM tbl_motivos_da_acao where setor='input' ORDER BY id";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
            {$dado['motivo_da_acao']}</option>";
   }
 ?> </select></label></p>

<br />


<?php if($status_correcao == 24 ){ ?>
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Status correção:&nbsp;

   <select name="statuscorrecao" id="statuscorrecao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
   <option value="26">Corrigido</option>
   <option value="24">Correção em andamento</option>
    
  </select></label></p>
<br />
  <?php } ?>


<?php


    
$sql_filha="SELECT a.id_cotacao,
             a.n_da_cotacao,
             a.revisao,
             a.regional_atribuida,
             a.uf,
             a.criado_em,
             c.disc_status_cip_input,
             c.disc_motivo_da_acao,
             d.nome
FROM tbl_cotacao a
left JOIN tbl_input c
ON  c.id_cotacao=a.id_cotacao
left JOIN tbl_usuarios d
ON  d.idtbl_usuario='$usuario'
WHERE
 a.cotacao_principal='$cotacao_principal' 
and a.status_da_cotacao IN ('Enviado ilha de input')
and a.substatus_da_cotacao IN ('Análise de input','Analise Input','Input')
and a.TIPO_COTACAO='Complementar' and a.n_da_cotacao <> '$n_da_cotacao' 
 
ORDER BY a.n_da_cotacao";


$acao_filha = mysql_query($sql_filha) or die (mysql_error());    
 

while($linha_atv = mysql_fetch_assoc($acao_filha)){
   
   $id_cotacao_filha   = $linha_atv["id_cotacao"];
   $n_da_cotacao	   = $linha_atv["n_da_cotacao"];  
   $regional_atribuida = $linha_atv["regional_atribuida"]; 
   $uf_filhas          = $linha_atv["uf"];
   $criado_em_filha    = $linha_atv["criado_em"]; 
   $revisao_filha      = $linha_atv["revisao"];
   $statusfilha        = $linha_atv["disc_status_cip_input"];
   $substatusfilha     = $linha_atv["disc_motivo_da_acao"];
   $nome               = $linha_atv["nome"];

   $criado_em_filha=arrumadatahora($criado_em_filha);
 ?> 
<?php if(!empty($n_da_cotacao)){?> 
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cotação Filha:&nbsp;<?php echo $n_da_cotacao; ?></label>
<label style="padding-left: 3px;">Revisão:&nbsp;<?php echo $revisao_filha; ?></label>
<label style="padding-left: 6px;">Regional:&nbsp;<?php echo  $regional_atribuida; ?></label>
<label style="padding-left: 6px;">UF:&nbsp;<?php echo  $uf_filhas; ?></label>
<label style="padding-left: 6px;">Criado em:&nbsp;<?php echo  $criado_em_filha; ?></label>
<br /><br />
<label style="padding-left: 5px;">Ação:&nbsp;
<?php echo $statusfilha ?>

<label style="padding-left: 5px;">Motivo da ação:&nbsp;
<?php 
if($statusfilha == "Distribuir"){
   
   $substatusfilha= "Distribuir";
}else{
  $substatusfilha=$substatusfilha;
}

echo $substatusfilha ?>

<label style="padding-left: 5px;">Operador:&nbsp;
<?php 
if($statusfilha == "Distribuir"){
   
   $nome= "Aguardando";
}else{
  $nome=$nome;
}


echo $nome ?>


</p>

<br /> 
 
 
  <?php } ?> 
<?php } ?>  

<?php if($status_correcao == 24 ){ ?>
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">

<label style="padding-left: 5px;">Observação correção:<br />&nbsp;<textarea  name="obs_correcao_op" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" ></textarea></label>
</p>

<br />
  <?php } ?>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<?php if($status_cip == 8 &&   empty($status_correcao) ){ ?>
<label style="padding-left: 5px;">Observação:<br />&nbsp;<textarea  name="obs_input" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" ><?php echo $obs_input; ?></textarea></label>
  <?php } 
   else{?> 
    
 <label style="padding-left: 5px;">Observação:<br />&nbsp;<textarea  name="obs_input" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius"  readonly="readonly"><?php echo $obs_input; ?></textarea></label>   
<?php } ?> 
</p>


<?php 
 $sql_verifca2 = "SELECT a.id_cotacao,
                 b.obs_analise
                FROM tbl_cotacao a 
                INNER JOIN tbl_analise b 
                ON b.id_cotacao='$id_cotacao' 
                        
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,20000 ";
$acao_verifica2 = mysql_query($sql_verifca2) or die (mysql_error());

while($linha_atv2 = mysql_fetch_assoc($acao_verifica2))
{


?>

<?php if(!empty($linha_atv2['obs_analise'])){  ?>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Observação análise:<br />&nbsp;<textarea  name="obs_analise" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" disabled="true"><?php echo $linha_atv2['obs_analise']; ?></textarea></label>
</p>
<?php } ?>
<?php 
 $sql_verifca2 = "SELECT a.id_cotacao,
                        d.obs_correcao
                  FROM tbl_cotacao a 
                  INNER JOIN tbl_correcao d 
                  ON d.id_cotacao='$id_cotacao'
              
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,20000 ";
$acao_verifica2 = mysql_query($sql_verifca2) or die (mysql_error());

while($linha_atv2 = mysql_fetch_assoc($acao_verifica2))
{


?>

<?php } ?>

<?php if(!empty($linha_atv2['obs_correcao']) && $status_correcao == 24){  ?>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Obs da correção:<br />&nbsp;<textarea  name="obs_correcao" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" disabled="true"><?php echo $linha_atv2['obs_correcao']; ?></textarea></label>
</p>
<?php } ?>

<?php } ?>
<?php } ?>
<br/>


 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/form_fila_cotacao_input.php'"/>
 
</form>

</div>

</div>

</body>
</html>

