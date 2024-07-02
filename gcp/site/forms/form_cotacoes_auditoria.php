<script language="JavaScript">
function abrir(URL) {
 
  var width = 800;
  var height = 500;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>


<script language="JavaScript">
function abrir2(URL) {
 
  var width = 800;
  var height = 500;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>



<?php

$id_cotacao= (int) $_GET['id_cotacao'];
$id_auditoria = (int) $_GET['id_auditoria'];


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
  
    
if($perfil!= 5 && $perfil != 12 ){
    
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
                a.cliente_tipo,
                a.oferta_smart_vivo,
                a.TIPO_COTACAO,
                a.renegociacao,
                b.id_auditoria,
                b.status_cip_auditoria,
                b.disc_status_cip_auditoria,
                b.idtbl_usuario_auditoria,
                b.obs_auditoria
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_auditoria b 
                ON a.id_cotacao='$id_cotacao' 
                WHERE a.carteira LIKE '$canal%' and 
                      b.status_cip_auditoria = 14 and
                      b.idtbl_usuario_auditoria='{$_COOKIE['idtbl_usuario']}' and 
                      b.id_auditoria='$id_auditoria'
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,1 ";
$acao_verifica = mysql_query($sql_verifca,$conecta) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao_verifica))
{
   $id_auditoria         = $linha_atv["id_auditoria"];
   $id_cotacao           = $linha_atv["id_cotacao"];
    //contagem sla
   //include("site/controles/sql.sla.php");

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
   $status_cip           = $linha_atv["status_cip_auditoria"];
   $disc_status_cip      = $linha_atv["disc_status_cip_auditoria"];
   $motivodaacao         = $linha_atv["motivo_da_acao"];
   $disc_motivo_da_acao  = $linha_atv["disc_motivo_da_acao"];
   $usuario              = $linha_atv["idtbl_usuario_auditoria"];
   $obs_auditoria        = $linha_atv["obs_auditoria"];
   $valida_complementar  = $linha_atv["TIPO_COTACAO"];
   $renegociacao         = $linha_atv["renegociacao"];

$criado_em=arrumadatahora($criado_em);
$vencimento=arrumadata($vencimento);

 $sql ="SELECT DISTINCT count(b.id_cotacao) as total 
                     FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_auditoria b
                     ON b.id_cotacao='$id_cotacao' 
                     
       WHERE a.status_da_cotacao IN ('Enviado ilha de input') 
             and a.substatus_da_cotacao IN ('Analise de input')                           
       GROUP BY a.cotacao_principal ";                    
                     
                     
              $result = mysql_query($sql,$conecta) or die(mysql_error());       
              $count = mysql_fetch_array($result);
              $total=$count['total'];

?>
<br>
<p align="center"  class="tituloform bradius"><font size="5" style="text-align: center;">Análise de input</font></p>

<div id="filtroservico bradius">
<div class="divformservico bradius">
<form action="principal.php?&id_auditoria=<?php echo $id_auditoria; ?>&t=controles/sql_enviar_form_auditoria.php"  method="POST">
<input type="hidden" value="0" id="conterro" />
<input type="hidden" name="MIGRACAO" value="<?php echo $MIGRACAO ?>" />
<input type="hidden" name="MIGRACAO_TROCA" value="<?php echo $MIGRACAO_TROCA ?>" />


<input type="hidden" name="valida_complementar" value="<?php echo $valida_complementar; ?>"/>

<input type="hidden" name="cotacao_principalf" value="<?php echo $id_cotacao; ?>"/>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Principal:&nbsp;<?php echo $cotacao_principal; ?></a></label>
<?php if($cotacao_principal <> $n_da_cotacao){ ?>
<label style="padding-left: 5px;">Complementar:&nbsp;<?php echo $n_da_cotacao; ?></a></label>
<?php } ?>
<label style="padding-left: 20px;">Regional:&nbsp;<?php echo  $regional; ?></label>
<label style="padding-left: 20px;">UF:&nbsp;<?php echo  $uf; ?></label>
<label style="padding-left: 20px;">Criado em:&nbsp;<?php echo  $criado_em; ?></label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Carteira:&nbsp;<?php echo  $tipo; ?></label>
<label style="padding-left: 20px;">Revisão:&nbsp;<?php echo  $revisao; ?></label>
<label style="padding-left: 20px;">Criado por :&nbsp;<?php echo  $criado_por; ?></label>
<label style="padding-left: 20px;">Status :&nbsp;<?php echo  $status; ?></label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cliente:&nbsp;<?php echo  $cliente; ?></label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 20px;">Responsavel:&nbsp;<?php echo $responsavel; ?></label>
<label style="padding-left: 5px;">CNPJ/CPF:&nbsp;<?php echo  $cpf_cnpj; ?></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Status:&nbsp;<?php echo $status_vivocorp; ?></label>
<label style="padding-left: 20px;">Sub-status:&nbsp;<?php echo  $sub_status_vivocorp; ?></label>
</p>

<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Descrição:&nbsp;<?php if(empty($descricao)){ echo $descricao="Sem descrição";}else{ echo $descricao; } ?></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Comentários:&nbsp;<?php if(empty($comentarios)){ echo $comentarios="Sem comentários";}else{ echo $comentarios; } ?></label>
</p>
<br />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
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

<?php if(!empty($linha_atv['oferta_smart_vivo'])){  ?>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">OFERTA SMART VIVO CORPORATE:&nbsp;<?php echo $linha_atv['oferta_smart_vivo']; ?></label>
</p>
<br />
<?php }?>


<?php if(!empty($linha_atv['MIGRACAO']) || !empty($linha_atv['MIGRACAO_TROCA'])){  ?>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Encaminhado para renegociação?&nbsp;
    <select name="renegociacao" id="renegociacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpequenino bradius">
        <option value="<?php echo $renegociacao ?>"><?php echo $renegociacao ?></option>
        <option value="Sim">Sim</option>
        <option value="Nao">Nao</option>    
    </select></label>
</p>
<br />
<?php }?>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ação:&nbsp;
<select name="substatus" id="substatus" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius" onchange="javascript:abrir('site/forms/form_cotacoes_auditoria_tipo_de_erros.php?id_auditoria=<?php echo $id_auditoria ?>');">
   <option value="">Selecione....</option>
   <?php
    //conecta no SGBD MySQL

      
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.tbl_substatus WHERE setor='auditoria' ORDER BY id_status";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id_status']}\">
               {$dado['substatus']}</option>";
   }
 ?> </select></label>
 <label style="padding-left: 5px;">Atenção:&nbsp;
<input name="cadastrarerros" type="button" value="Para cadastrar mais erros clik aqui" onclick="javascript:abrir('site/forms/form_cotacoes_auditoria_tipo_de_erros.php?id_auditoria=<?php echo $id_auditoria ?>');" >

</label></p>
<br />
<?php if($cotacao_principal <> $n_da_cotacao){  ?>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
 <label style="padding-left: 5px;">Cadatrar Operador input:&nbsp;
<input name="cadastrarerros" type="button" value="Cadastrar operador input clik aqui" onclick="javascript:abrir2('site/forms/form_cotacoes_auditoria_registroinputfilhas.php?id_auditoria=<?php echo $id_auditoria ?>');" >


</label></p>

<br />
<?php } ?>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Motivo da ação:&nbsp;

<select name="motivodaacao" id="motivodaacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
   <?php
    //conecta no SGBD MySQL

      
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.tbl_motivos_da_acao where setor='auditoria' ORDER BY id";
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
             c.disc_status_cip_auditoria,
             c.disc_motivo_da_acao,
             d.nome
FROM cip_nv.tbl_cotacao a
left JOIN cip_nv.tbl_auditoria c
ON  c.id_cotacao=a.id_cotacao
left JOIN cip_nv.tbl_usuarios d
ON  d.idtbl_usuario=c.idtbl_usuario_auditoria 
WHERE
 a.cotacao_principal='$cotacao_principal' 
and a.status_da_cotacao IN ('Enviado ilha de input')
and a.substatus_da_cotacao IN ('Análise de input','Analise de input')
and a.TIPO_COTACAO='Complementar' 
 
ORDER BY a.n_da_cotacao";

//and a.substatus_da_cotacao IN ('Análise de input','Analise Input','Input','Correção input')

$acao_filha = mysql_query($sql_filha,$conecta) or die (mysql_error());    
 

while($linha_atv = mysql_fetch_assoc($acao_filha)){
   
   $id_cotacao_filha   = $linha_atv["id_cotacao"];
   $n_da_cotacao	   = $linha_atv["n_da_cotacao"];  
   $regional_atribuida = $linha_atv["regional_atribuida"]; 
   $uf_filhas          = $linha_atv["uf"];
   $criado_em_filha    = $linha_atv["criado_em"]; 
   $revisao_filha      = $linha_atv["revisao"];
   $statusfilha        = $linha_atv["disc_status_cip_auditoria"];
   $substatusfilha     = $linha_atv["disc_motivo_da_acao"];
   $nome               = $linha_atv["nome"];

   $criado_em_filha=arrumadatahora($criado_em_filha);
 ?> 
<?php if(!empty($n_da_cotacao) && $n_da_cotacao <> $n_da_cotacao){?> 
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cotação Filha:&nbsp;<?php echo $n_da_cotacao; ?></label>
<label style="padding-left: 3px;">Revisão:&nbsp;<?php echo $revisao_filha; ?></label>
<label style="padding-left: 6px;">Regional:&nbsp;<?php echo  $regional_atribuida; ?></label>
<label style="padding-left: 6px;">UF:&nbsp;<?php echo  $uf_filhas; ?></label>
<label style="padding-left: 6px;">Criado em:&nbsp;<?php echo  $criado_em_filha; ?></label>
<br /><br />
<label style="padding-left: 5px;">Ação:&nbsp;
<?php echo $statusfilha ?>

<label style="padding-left: 5px;">Motivo da ação:&nbsp;
<?php echo $substatusfilha ?>

<label style="padding-left: 5px;">Operador:&nbsp;
<?php 
if(empty($nome)){

echo "" ;

}else{ echo $nome;  }?>


</p>

<br /> 
 
 
  <?php } ?> 
<?php } ?>  

<br /> 

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
   
 <label style="padding-left: 5px;">Observação:<br />&nbsp;<textarea  name="obs_auditoria" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" ><?php echo $obs_auditoria; ?></textarea></label>   

</p>
<br/>

<?php 
 $sql_verifca2 = "SELECT a.id_cotacao,
                 b.obs_analise
                 
                FROM cip_nv.tbl_cotacao a 
                INNER JOIN cip_nv.tbl_analise b 
                ON b.id_cotacao='$id_cotacao' and  b.id_cotacao=a.id_cotacao 
              
               GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,1 ";
$acao_verifica2 = mysql_query($sql_verifca2,$conecta) or die (mysql_error());

while($linha_atv2 = mysql_fetch_assoc($acao_verifica2))
{


?>

<?php if(!empty($linha_atv2['obs_analise'])){  ?>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Observação da análise:<br />&nbsp;<textarea  name="obs_analise" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" disabled="true"><?php echo $linha_atv2['obs_analise']; ?></textarea></label>
</p>

<?php } ?>
<?php } ?>
<br />


<?php 
 $sql_verifca2 = "SELECT a.id_cotacao,
                c.obs_input
                FROM cip_nv.tbl_cotacao a 
                INNER JOIN cip_nv.tbl_input c 
                ON c.id_cotacao='$id_cotacao' and  c.id_cotacao=a.id_cotacao 
                
              
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,1 

          ";
$acao_verifica2 = mysql_query($sql_verifca2,$conecta) or die (mysql_error());

while($linha_atv2 = mysql_fetch_assoc($acao_verifica2))
{


?>

<?php if(!empty($linha_atv2['obs_input'])){  ?>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Observação do input:<br />&nbsp;<textarea  name="obs_input" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" disabled="true"><?php echo $linha_atv2['obs_input']; ?></textarea></label>
</p>
<?php } ?>

<?php } ?>

<?php } ?>


<br/>


 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/form_fila_cotacao_auditoria.php'"/>
 
</form>

</div>

</div>


<?php 

if(!empty($acao_operador) || !empty($acao_verifica) || !empty($result) || !empty($acao_verifica2) || !empty($acao_filha)){

mysql_free_result($acao_operador,$acao_verifica,$result,$acao_verifica2,$acao_filha);

}
mysql_close($conecta);
mysql_next_result($conecta);

 ?>


</body>
</html>

