
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
  
    
if($perfil!= 6){
    
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
                b.id_correcao,
                b.idtbl_usuario_correcao,
                b.status_cip_correcao,
                b.disc_status_cip_correcao,
                b.obs_correcao
                FROM tbl_cotacao a INNER JOIN tbl_correcao b 
                ON a.id_cotacao='$id_cotacao' 
                WHERE a.carteira LIKE '$canal%' and 
                      b.status_cip_correcao = 21 and
                      b.idtbl_usuario_correcao='{$_COOKIE['idtbl_usuario']}' and 
                      b.id_cotacao='$id_cotacao'
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,20000 ";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao_verifica))
{
	 $id_correcao         = $linha_atv["id_correcao"];
   $id_cotacao           = $linha_atv["id_cotacao"];
   //contagem sla
   include("site/controles/sql.sla.php");

   $cotacao_principal    = $linha_atv["cotacao_principal"];
   $n_da_cotacao         = $linha_atv["n_da_cotacao"];
   $regional             = $linha_atv["regional_atribuida"];
   $uf                   = $linha_atv["uf"];
   $criado_em            = $linha_atv["criado_em"];
   $tipo                 = $linha_atv["carteira"];
   $revisao              = $linha_atv["revisao"];
   $vencimento           = $linha_atv["vencimento"];
   $criado_por           = $linha_atv["criado_por"];
   $cliente              = $linha_atv["cliente"];
   $responsavel          = $linha_atv["responsavel"];
   $cpf_cnpj             = $linha_atv["cpf_cnpj"];
   $status_vivocorp      = $linha_atv["status_da_cotacao"];
   $sub_status_vivocorp  = $linha_atv["substatus_da_cotacao"];
   $status               = $linha_atv["status"];
   $comentarios          = $linha_atv["comentarios"];
   $descricao            = $linha_atv["descricao"];
   $TIPO_SERVICO         = $linha_atv["TIPO_SERVICO"];
   $ALTAS                = $linha_atv["ALTAS"];
   $PORTABILIDADE        = $linha_atv["PORTABILIDADE2"];
   $MIGRACAO             = $linha_atv["MIGRACAO"];
   $TROCAS               = $linha_atv["TROCAS"];
   $TT                   = $linha_atv["TT"];
   $BACKUP               = $linha_atv["BACKUP"];
   $M_2_M                = $linha_atv["M_2_M"];
   $FIXA                 = $linha_atv["FIXA"];
   $PRE_POS              = $linha_atv["PRE_POS"]; 
   $MIGRACAO_TROCA       = $linha_atv["MIGRACAO_TROCA"]; 
   $total_linhas_cip     = $linha_atv["total_linhas_cip"];
   $status_cip           = $linha_atv["status_cip_correcao"];
   $disc_status_cip      = $linha_atv["disc_status_cip_correcao"];
   $motivodaacao         = $linha_atv["motivo_da_acao"];
   $disc_motivo_da_acao  = $linha_atv["disc_motivo_da_acao"];
   $usuario              = $linha_atv["idtbl_usuario_correcao"];
   $obs_auditoria        = $linha_atv["obs_correcao"];


   $criado_em=arrumadatahora($criado_em);
   $vencimento=arrumadata($vencimento);


 $sql ="SELECT DISTINCT count(a.id_cotacao) as total 
                     FROM tbl_cotacao a
                     INNER JOIN tbl_correcao c
                     ON c.id_cotacao='$id_cotacao'
       WHERE a.status_da_cotacao IN ('Enviado ilha de input') 
             and a.substatus_da_cotacao IN ('Correção input')                           
       GROUP BY a.cotacao_principal ";                    
                     
                     
              $result = mysql_query($sql) or die(mysql_error());       
              $count = mysql_fetch_array($result);
              $total=$count['total'];



?>
<br/>

<div id="filtroservico bradius">

<p align="center"  class="tituloform bradius"><font size="5" style="text-align: center;"><?php echo utf8_encode('Correção') ?></font></p>


<div class="divformservico bradius">
<form action="principal.php?&id_correcao=<?php echo $id_correcao; ?>&t=controles/sql_enviar_form_correcao.php"  method="POST">
<input type="hidden" value="0" id="conterro" />



<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<?php if($cotacao_principal == $n_da_cotacao){ ?>
<label style="padding-left: 2px;">Principal:&nbsp;<?php echo $cotacao_principal; ?></label>
<?php }else ?>
<?php if($cotacao_principal != $n_da_cotacao){ ?>
<label style="padding-left: 2px;">Principal:&nbsp;<?php echo $cotacao_principal; ?></label>

<label style="padding-left: 2px;">Complementar:&nbsp;<?php echo $n_da_cotacao; ?></label>
<?php } ?>
<label style="padding-left: 2px;">Regional:&nbsp;<?php echo  $regional; ?></label>
<label style="padding-left: 2px;">Criado em:&nbsp;<?php echo  $criado_em; ?></label></p>
<br />
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Carteira:&nbsp;<?php echo  $tipo; ?></label>
<label style="padding-left: 20px;"><?php echo utf8_encode('Revisão') ?>:&nbsp;<?php echo  $revisao; ?></label>
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
<label style="padding-left: 20px;">Sub-status:&nbsp;<?php echo  $sub_status_vivocorp; ?></label>
</p>

<br />
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;"><?php echo utf8_encode('Descrição') ?>:&nbsp;<?php if(empty($descricao)){ echo $descricao=utf8_encode("Sem descrição");}else{ echo $descricao; } ?></label>
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
<label style="padding-left: 5px;"><?php echo utf8_encode('Ação')?>:&nbsp;
<select name="substatus" id="substatus" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
   <?php
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM tbl_substatus WHERE setor='correcao' ORDER BY id_status";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id_status']}\">
               {$dado['substatus']}</option>";
   }
 ?> </select></label></p>

<br />

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;"><?php echo utf8_encode('Motivo da ação') ?>:&nbsp;

<select name="motivodaacao" id="motivodaacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
   <?php
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM tbl_motivos_da_acao WHERE setor='correcao' ORDER BY id";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
            {$dado['motivo_da_acao']}</option>";
   }
 ?> </select></label></p>

<br />

<?php


$sql_filha="SELECT a.id_cotacao,
             a.n_da_cotacao,
             a.revisao,
             a.regional_atribuida,
             a.uf,
             a.criado_em,
             c.disc_status_cip_correcao as disc_status_cip,
             c.disc_motivo_da_acao as disc_motivo_da_acao,
             c.idtbl_usuario_correcao as idtbl_usuario,
             f.nome
FROM tbl_cotacao a
left JOIN tbl_correcao c
ON  c.id_cotacao=a.id_cotacao
left JOIN tbl_usuarios f
ON  f.idtbl_usuario='$usuario'
WHERE
 a.cotacao_principal='$cotacao_principal' 
and a.status_da_cotacao IN ('Enviado ilha de input')
and a.substatus_da_cotacao IN ('Correção input')
and a.TIPO_COTACAO='Complementar' and a.n_da_cotacao <> '$n_da_cotacao' 
 
ORDER BY a.n_da_cotacao";


$acao_filha = mysql_query($sql_filha) or die (mysql_error());    
    

while($linha_atv = mysql_fetch_assoc($acao_filha)){
   
   $id_cotacao_filha   = $linha_atv["id_cotacao"];
   $n_da_cotacao       = $linha_atv["n_da_cotacao"];  
   $regional_atribuida = $linha_atv["regional_atribuida"]; 
   $uf_filhas          = $linha_atv["uf"];
   $criado_em_filha    = $linha_atv["criado_em"]; 
   $revisao_filha      = $linha_atv["revisao"];
   $statusfilha        = $linha_atv["disc_status_cip"];
   $substatusfilha     = $linha_atv["disc_motivo_da_acao"];
   $nome               = $linha_atv["nome"];
   
  $criado_em_filha=arrumadatahora($criado_em_filha);
 
 ?> 
<?php if(!empty($n_da_cotacao)){?> 
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;"><?php echo utf8_encode('Cotação Filha') ?>:&nbsp;<?php echo $n_da_cotacao; ?></label>
<label style="padding-left: 3px;"><?php echo utf8_encode('Revisão') ?>:&nbsp;<?php echo $revisao_filha; ?></label>
<label style="padding-left: 6px;">Regional:&nbsp;<?php echo  $regional_atribuida; ?></label>
<label style="padding-left: 6px;">UF:&nbsp;<?php echo  $uf_filhas; ?></label>
<label style="padding-left: 6px;">Criado em:&nbsp;<?php echo  $criado_em_filha; ?></label>
<br /><br />
<label style="padding-left: 5px;"><?php echo utf8_encode('Ação') ?>:&nbsp;
<?php echo $statusfilha ?>

<label style="padding-left: 5px;"><?php echo utf8_encode('Motivo da ação') ?>:&nbsp;
<?php echo $substatusfilha ?>

<label style="padding-left: 5px;">Operador:&nbsp;
<?php echo $nome ?></p><br/>
<?php }} ?>


<br /> 
<?php if($cotacao_principal == $n_da_cotacao){ ?>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<?php 
$sql="SELECT a.obs_analise,
             a.id_cotacao
      FROM tbl_analise a 
      INNER JOIN tbl_correcao b
      ON b.id_cotacao=a.id_cotacao    
         ";
 $result= mysql_query($sql,$conecta);
   
?>
<label style="padding-left: 5px;"><?php echo utf8_encode('Observação da analise') ?>:<br />&nbsp;<textarea  name="obs_analise" onblur="ValidaEntrada(this,'textarea');"  readonly=""  class="txt2textarea bradius" >
  <?php 
  while($dado= mysql_fetch_array($result)){
      
    echo $obs_analise=$dado['obs_analise'];
  } 

 ?>
</textarea></label>
</p>
<?php } ?> 

<br /> 

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<?php 
$sql="SELECT a.obs_input,
             a.id_cotacao
      FROM tbl_input a 
      INNER JOIN tbl_correcao b
      ON b.id_cotacao=a.id_cotacao    
         ";
 $result= mysql_query($sql,$conecta);
   
?>
<label style="padding-left: 5px;"><?php echo utf8_encode('Observação do input') ?>:<br />&nbsp;<textarea  name="obs_input" onblur="ValidaEntrada(this,'textarea');"  readonly=""  class="txt2textarea bradius" >
  <?php 
  while($dado= mysql_fetch_array($result)){
      
    echo $obs_input=$dado['obs_input'];
  } 

 ?>
</textarea></label>
</p>
<br /> 

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<?php 
$sql="SELECT a.obs_auditoria,
             a.id_cotacao
      FROM tbl_auditoria a 
      INNER JOIN tbl_correcao b
      ON b.id_cotacao=a.id_cotacao    
         ";
 $result= mysql_query($sql,$conecta);
   
?>
<label style="padding-left: 5px;"><?php echo utf8_encode('Observação da auditoria') ?>:<br />&nbsp;<textarea  name="obs_auditoria" onblur="ValidaEntrada(this,'textarea');"  readonly=""  class="txt2textarea bradius" >
  <?php 
  while($dado= mysql_fetch_array($result)){
      
    echo $obs_auditoria=$dado['obs_auditoria'];
  } 

} ?>
</textarea></label>
</p>



<br /> 

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;"><?php echo utf8_encode('Obs correção')?>:<br />&nbsp;<textarea  name="obs_correcao" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" ></textarea></label>
</p>



<br/>


 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/form_fila_cotacao_auditoria.php'"/>
 
</form>

</div>

</div>

</body>
</html>

