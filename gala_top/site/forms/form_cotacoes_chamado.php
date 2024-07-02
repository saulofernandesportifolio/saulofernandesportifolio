<?php
$data_distribuicao= date("Y/m/d H:i:s");

$situacao="Com Cotações";

$query="UPDATE tbl_usuarios a, tbl_chamado b 
SET a.situacao2 = '$situacao',
    b.idtbl_usuario_chamado='{$_COOKIE['idtbl_usuario']}',
    b.status_cip_chamado = 31,
    b.dt_distribuicao= '$data_distribuicao' 
WHERE b.id_cotacao='$id_cotacao' and  a.idtbl_usuario ='{$_COOKIE['idtbl_usuario']}'";
	   
 //envia a consulta sql para o mysql
(!mysql_query($query,$conecta));

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
  
    
if($perfil!= 13){
    
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
                b.id_chamado,
                b.status_cip_chamado,
                b.disc_status_cip_chamado,
                b.setor_origem, 
                b.idtbl_usuario_chamado,
                b.obs_chamado
                FROM tbl_cotacao a INNER JOIN tbl_chamado b 
                ON a.id_cotacao='$id_cotacao' 
                                  
         GROUP BY a.cotacao_principal  ASC LIMIT 0,1";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao_verifica))
{
	$id_chamado		    = $linha_atv["id_chamado"];
    $id_cotacao		= $linha_atv["id_cotacao"];

  //contagem sla
  // include("site/controles/sql.sla.php");
    
	$cotacao_principal	   = $linha_atv["cotacao_principal"];
  $n_da_cotacao    	   = $linha_atv["n_da_cotacao"];
  $regional			   = $linha_atv["regional_atribuida"];
	$uf 	               = $linha_atv["uf"];
	$criado_em      	   = $linha_atv["criado_em"];
 	$tipo				   = $linha_atv["carteira"];
 	$revisao			   = $linha_atv["revisao"];
 	$vencimento			   = $linha_atv["vencimento"];
  $criado_por            = $linha_atv["criado_por"];
	$cliente			   = $linha_atv["cliente"];
  $responsavel           = $linha_atv["responsavel"];
  $cpf_cnpj              = $linha_atv["cpf_cnpj"];
	$status_vivocorp	   = $linha_atv["status_da_cotacao"];
  $sub_status_vivocorp   = utf8_decode($linha_atv["substatus_da_cotacao"]);
  $status                = $linha_atv["status"];
  $comentarios           = $linha_atv["comentarios"];
  $descricao             = $linha_atv["descricao"];
	$TIPO_SERVICO		   = $linha_atv["TIPO_SERVICO"];
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
  $status_cip            = $linha_atv["status_cip_chamado"];
  $disc_status_cip       = $linha_atv["disc_status_cip_chamado"];
  $obs_chamado             = $linha_atv["obs_chamado"];
  $motivodaacao          = $linha_atv["motivo_da_acao"];
  $disc_motivo_da_acao   = $linha_atv["disc_motivo_da_acao"];
  $usuario               = $linha_atv["idtbl_usuario_chamado"];
  $setor_origem         = $linha_atv["setor_origem"];
     
    $criado_em=arrumadatahora($criado_em);
    $vencimento=arrumadata($vencimento);



?>


<br>
<div id="filtroservico bradius">



<p align="center"  class="tituloform bradius"><font size="5" style="text-align: center;">Chamado</font></p>


<div class="divformservico bradius">

<form action="principal.php?&id_chamado=<?php echo $id_chamado; ?>&t=controles/sql_enviar_form_chamado.php"  method="POST">

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
<label style="padding-left: 5px;"><?php echo utf8_encode('Descrição') ?>:&nbsp;<?php if(empty($descricao)){ echo $descricao="Sem descrição";}else{ echo $descricao; } ?></label>
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
<?php if(!empty($status_cip)){ ?>
<select name="substatus" id="substatus" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
      <?php } 
      else{ ?>
   <select name="substatus" id="substatus" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius" disabled="disabled" >
   <option value="<?php echo $status_cip ?>"><?php echo $disc_status_cip ?></option>
   <?php } ?>
   
   <?php
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM tbl_substatus WHERE setor='chamado' ORDER BY id_status";
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
   else{ ?>
   <select name="motivodaacao" id="motivodaacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius"  disabled="disabled">
  <option value="<?php echo $motivodaacao ?>"><?php echo $disc_motivo_da_acao ?></option>
   <?php } 
  
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM tbl_motivos_da_acao where setor='chamado' ORDER BY id";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
            {$dado['motivo_da_acao']}</option>";
   }
 ?> </select></label></p>

<br />


 

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
    
 <label style="padding-left: 5px;">Observação:<br />&nbsp;<textarea  name="obs_chamado" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" ><?php echo $obs_chamado; ?></textarea></label>   
 
</p>


<?php 
 $sql_verifca2 = "SELECT a.id_cotacao,
                 b.obs_analise
                FROM tbl_cotacao a 
                INNER JOIN tbl_analise b 
                ON b.id_cotacao='$id_cotacao' 
                        
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,1 ";
$acao_verifica2 = mysql_query($sql_verifca2) or die (mysql_error());

$linha_atv2 = mysql_fetch_assoc($acao_verifica2);



?>

<?php if(!empty($linha_atv2['obs_analise'])){  ?>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Observação análise:<br />&nbsp;<textarea  name="obs_analise" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" disabled="true"><?php echo $linha_atv2['obs_analise']; ?></textarea></label>
</p>
<?php } ?>

<?php 
 $sql_verifca2 = "SELECT a.id_cotacao,
                 b.obs_input
                FROM tbl_cotacao a 
                INNER JOIN tbl_input b 
                ON b.id_cotacao='$id_cotacao' 
                        
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,1 ";
$acao_verifica2 = mysql_query($sql_verifca2) or die (mysql_error());

$linha_atv2 = mysql_fetch_assoc($acao_verifica2);



?>

<?php if(!empty($linha_atv2['obs_input'])){  ?>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Observação input:<br />&nbsp;<textarea  name="obs_input" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" disabled="true"><?php echo $linha_atv2['obs_input']; ?></textarea></label>
</p>
<?php } ?>


<?php 
 $sql_verifca2 = "SELECT a.id_cotacao,
                 b.obs_auditoria
                FROM tbl_cotacao a 
                INNER JOIN tbl_auditoria b 
                ON b.id_cotacao='$id_cotacao' 
                        
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,1";
$acao_verifica2 = mysql_query($sql_verifca2) or die (mysql_error());

$linha_atv2 = mysql_fetch_assoc($acao_verifica2);



?>

<?php if(!empty($linha_atv2['obs_auditoria'])){  ?>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Observação auditoria:<br />&nbsp;<textarea  name="obs_auditoria" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" disabled="true"><?php echo $linha_atv2['obs_auditoria']; ?></textarea></label>
</p>
<?php } ?>






<?php 
 $sql_verifca2 = "SELECT a.id_cotacao,
                        d.obs_correcao
                  FROM tbl_cotacao a 
                  INNER JOIN tbl_correcao d 
                  ON d.id_cotacao='$id_cotacao'
              
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,1 ";
$acao_verifica2 = mysql_query($sql_verifca2) or die (mysql_error());

$linha_atv2 = mysql_fetch_assoc($acao_verifica2);



?>

<?php if(!empty($linha_atv2['obs_correcao']) && $status_correcao == 24){  ?>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Obs da correção:<br />&nbsp;<textarea  name="obs_correcao" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" disabled="true"><?php echo $linha_atv2['obs_correcao']; ?></textarea></label>
</p>
<?php } ?>

<?php } ?>
<br/>

  <input type="hidden" name="setor_origem" value="<?php echo $setor_origem ?>" />

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/form_fila_cotacao_chamado.php'"/>
 
</form>

</div>

</div>

</body>
</html>

