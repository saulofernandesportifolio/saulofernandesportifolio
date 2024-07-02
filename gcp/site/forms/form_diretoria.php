<script language="JavaScript">
function abrir(URL) {
 
  var width = 800;
  var height = 500;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>

<script>
 /*filtro operador form auditoria por setor*/
$(document).ready(function(){
         $("select[name=login_operadores_dir]").change(function(){
            $("select[name=turno]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_operadoresdiretoria.php", 
                  {login_operadores_dir:$(this).val()},
                  function(valor){
                     $("select[name=turno]").html(valor);
           $teste=$ln['turno'];  
          })
         })
        
        }) 
 
      $(document).ready(function(){
         $("select[name=tipo_erro]").change(function(){
            $("select[name=motivo]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_reversao_ind.php", 
                  {tipo_erro:$(this).val()},
                  function(valor){
                     $("select[name=motivo]").html(valor);
           $teste=$ln['motivo'];  
          }
              )
         })
      })

</script>

<script type="text/javascript" src="js/funcoesJs.js"></script>


 <script language="JavaScript">   
  function c(){
     
      var i = document.f.houveerro.selectedIndex;
      //var erroi = document.f.houveerro[i].text;
      //alert(erroi);
      
      //alert(document.f.houveerro[i].text);
          
      if(i == 2){
         $('#2').show();
       }else{
       $('.divs2').hide();
       }
      
    }

</script> 


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
  
    
if($perfil!= 1 && $perfil != 15 ){
    
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



/*
if(empty($_POST['n_da_cotacao']) ){ 
    
echo "
       <script type=\"text/javascript\">
        alert('É nescessário digitar uma cotação ou pedido !');
        history.back();
      </script>
 ";
  exit();     
    
}*/



$id_cota=$_GET['id_cota'];




$situacao="Com Cotações";

$query="UPDATE cip_nv.tbl_usuarios SET situacao2 = '$situacao' WHERE idtbl_usuario ='{$_COOKIE['idtbl_usuario']}'";
$acao_query = mysql_query($query,$conecta) or die (mysql_error());


$select_contes="SELECT * FROM cip_nv.base_diretoria 
                     WHERE cotacao_atividade='$cotacao_principal' ";
$consulta_contes = mysql_query($select_contes) or die (mysql_error());

 $linha_cont = mysql_fetch_assoc($consulta_contes);
 $numveri=mysql_num_rows($consulta_contes);
 $id_diretoria=$linha_cont['id'];

if($numveri > 0){

echo "<script>alert('Registro encontrado !'); 
    document.location.replace('principal.php?id={$id_diretoria}&t=forms/form_diretoria_tt.php');
  
      </script>";
  exit();

}


//$id_cotacao=(int) $_GET['id_cotacao'];


 $sql_verifca = "SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
                a.criado_em,
                a.carteira,
                a.segmento,
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
                a.total_linhas_cip
                FROM cip_nv.tbl_cotacao a
                WHERE  a.id_cotacao='$id_cota'
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,1 ";
$acao_verifica = mysql_query($sql_verifca,$conecta) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao_verifica))
{
 
    
   //$id_auditoria         = $linha_atv["id_auditoria"];
   $id_cotacao           = $linha_atv["id_cotacao"];
    //contagem sla
   //include("site/controles/sql.sla.php");

   $cotacao_principal    = $linha_atv["cotacao_principal"];
   $n_da_cotacao         = $linha_atv["n_da_cotacao"];
   $regional             = $linha_atv["regional_atribuida"];
   $uf                   = $linha_atv["uf"];
   $criado_em            = $linha_atv["criado_em"];
   $tipo                 = $linha_atv["carteira"];
   $segmento             = $linha_atv["segmento"];
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



$criado_em=arrumadatahora($criado_em);
$vencimento=arrumadata($vencimento);

}


if($_GET['tpcadastro'] == 3){
 $sql = "SELECT CASE WHEN MAX(a.protocolo) IS NULL 
             THEN 0
             ELSE MAX(a.protocolo)
            END +1 as protocolo FROM cip_nv.base_diretoria a 
            ORDER BY a.protocolo DESC limit 1;
            ";
$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);
$linha_prot = mysql_fetch_assoc($acao);
}




?>


<br/>

<div id="filtroservico bradius">

<p align="center" class="tituloform bradius">
<font size="4" style="text-align: center;">Diretoria - Ponto Focal</font></p>
<div class="divformservico bradius">

<!-- <form name="f" action="#" method="post">
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius"><label>
Houve erro na cotação?&nbsp; 
<select name="houveerro" id="houveerro" class="txt2comboboxpequeno bradius" onchange="c()">
<option value=''>Selecione...</option>  
<option value="1">Não</option>
<option value="2">Sim</option>
</select></label>  
</p>  
</form>-->
<br>
<form action="principal.php?&t=controles/diretoria_valida_cadastro.php"  method="POST">
<input type="hidden" name="tpcadastro2" value="<?php echo $_GET['tpcadastro']; ?>" />    
<input type="hidden" name="protocolo" value="<?php echo $linha_prot['protocolo']; ?>" />
<input type="hidden" name="id_cotacao" value="<?php echo $id_cotacao; ?>" />

<?php if($_GET['tpcadastro'] != 3){ ?>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cotação:&nbsp;<?php echo $cotacao_principal; ?> 
<input type="hidden" id="cotacaop" name="cotacaop" value="<?php echo $cotacao_principal; ?>">      
</label>

</p>
<br/>
<?php }  ?>
<?php if($_GET['tpcadastro'] == 3){ ?>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Protocolo:&nbsp;
<?php echo $linha_prot['protocolo']; ?> 
<input type="hidden" id="protocolo" name="protocolo" value="<?php echo $linha_prot['protocolo']; ?>">  
</label>
</p>
<br/>
<?php }  ?>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px; ">Regional:&nbsp;
<?php echo $regional ?>
<input type="hidden" name="regional" value="<?php echo $regional; ?>">   
</label>
<label style="padding-left: 5px;">UF:&nbsp;
<?php echo $uf ?>
<input type="hidden" name="uf" value="<?php echo $uf; ?>">  
</label>
<label style="padding-left: 5px;">Criado em:&nbsp;
<?php echo $criado_em; ?>
<input type="hidden" name="criado_em" value="<?php echo $criado_em; ?>">    
</label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Segmento:&nbsp;
<?php echo  $segmento; ?>
<input type="hidden" name="segmento" value="<?php echo $segmento; ?>">  
</label>
<label style="padding-left: 5px;">Revisão:&nbsp;<?php echo  $revisao; ?>
<input type="hidden" name="revisao" value="<?php echo $revisao; ?>">    
</label>
<label style="padding-left: 5px;">Criado por :&nbsp;<?php echo  $criado_por; ?>
<input type="hidden" name="criado_por" value="<?php echo $criado_por; ?>">    
</label>
<label style="padding-left: 5px;">Responsavel:&nbsp;
<?php echo $responsavel; ?>
<input type="hidden" name="responsavel" value="<?php echo $responsavel; ?>">
</label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cliente:&nbsp;
<?php echo  $cliente; ?>
<input type="hidden" name="cliente" value="<?php echo  $cliente; ?>">  
</label>
<label style="padding-left: 5px;">CNPJ/CPF:&nbsp;
<?php echo  $cpf_cnpj; ?>
<input type="hidden" name="cpf_cnpj" value="<?php echo  $cpf_cnpj; ?>"> 
</label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 3px;">ALTAS:&nbsp;
<?php echo $ALTAS; ?>
 <input type="hidden" name="altas" value="<?php echo $ALTAS; ?>"> 
</label>
<label style="padding-left: 8px;">PORTABILIDADE:&nbsp;
<?php echo $PORTABILIDADE; ?>
 <input type="hidden" name="portabilidade" value="<?php echo $PORTABILIDADE; ?>">  
</label>
<label style="padding-left: 8px;">MIGRACAO:&nbsp;
<?php echo $MIGRACAO; ?>
 <input type="hidden" name="migracao" value="<?php echo $MIGRACAO; ?>">  
</label>
<label style="padding-left: 8px;">TROCAS:&nbsp;
<?php echo $TROCAS; ?>
 <input type="hidden" name="trocas" value="<?php echo $TROCAS; ?>">   
</label>
<label style="padding-left: 8px;">TT:&nbsp;
<?php echo $TT; ?>
<input type="hidden" name="tt" value="<?php echo $TT; ?>">  
</label>
<label style="padding-left: 8px;">BACKUP:&nbsp;
<?php echo $BACKUP; ?>
<input type="hidden" name="backup" value="<?php echo $BACKUP; ?>">  
</label>
<label style="padding-left: 8px;">M2M:&nbsp;
<?php echo $M_2_M; ?>
<input type="hidden" name="m2m" value="<?php echo $M_2_M; ?>">  
</label>
<label style="padding-left: 8px;">FIXA:&nbsp;
<?php echo $FIXA; ?>
<input type="hidden" name="fixa" value="<?php echo $FIXA; ?>">   
</label>
<label style="padding-left: 8px;">PRE POS:&nbsp;
<?php echo $PRE_POS; ?>
<input type="hidden" name="pre_pos" value="<?php echo $PRE_POS; ?>">   
</label>
<br /><br />
<label style="padding-left: 4px;">MIGRACAO TROCA:&nbsp;
<?php echo $MIGRACAO_TROCA; ?>
<input type="hidden" name="migracao_troca" value="<?php echo $MIGRACAO_TROCA; ?>">  
</label>
<br /><br />
<label style="padding-left: 5px;">TOTAL LINHAS:&nbsp;
<?php echo $total_linhas_cip; ?>
<input type="hidden" name="total_linhas" value="<?php echo $total_linhas_cip; ?>">  
</label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">TIPO SERVIÇOS:&nbsp;
<?php echo $TIPO_SERVICO; ?>
<input type="hidden" name="tipo_servicos" value="<?php echo $TIPO_SERVICO; ?>">  
</label>
</p>
<br />
<div style="background:#E8E8E8" class="bradius">
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data de recebimento:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="Formatadata(this,event);" id="data_de_recebimento" name="data_de_recebimento" maxlength="10" class="txt2data bradius" value="<?php echo date("d/m/Y"); ?>"/></label>
<label style="padding-left: 5px;">Hora de recebimento:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="HoraMinuto(event,this);" id="hora_de_recebimento" name="hora_de_recebimento" maxlength="5" class="txt2data bradius" value="<?php echo date("H:i"); ?>" /></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ação:&nbsp;
 <select onblur="ValidaEntrada(this,'combo')" id="acao" name="acao" class="txt2comboboxpequeno bradius">   
  <option value=''>Selecione...</option>
   <option value="Acompanhar">Acompanhar</option>
   <option value="Prioridade">Prioridade</option>
   <option value="Desmembramento">Desmembramento</option>
 </select>
 </label>
 <label style="padding-left: 5px;">Solicitante Vivo/Atento:&nbsp;
<select name="solicitanteva" style='width:525' id="solicitanteva" onblur="ValidaEntrada(this,'combo');"  class="txt2comboboxpadrao bradius">
  <option value='0'>Selecione...</option>
   <?php
        //seleciona a base de dados para uso
       
          $query= "SELECT * FROM cip_nv.remetente_diretoria_soli_vivo_accenture ORDER BY nome ASC";
                    $result = mysql_query($query,$conecta) or die (mysql_error());
                    echo " <option value='0'>Selecione...</option>";
          while($dado= mysql_fetch_array($result)){
                    echo "
          <option value=\"{$dado['id']}\">
                    {$dado['nome']}</option>";
                    }
          ?>

    </select></label>    
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Setor da cotação (Substatus da cotação):&nbsp;
 <select onblur="ValidaEntrada(this,'combo')" id="status_da_cotacao" name="status_da_cotacao" class="txt2comboboxmedio bradius">  
 <?php if(empty($sub_status_vivocorp)){ ?> 
  <option value=''>Selecione...</option>
  <?php } ?>
  <option value="<?php echo $sub_status_vivocorp ?>"><?php echo $sub_status_vivocorp ?></option>
   <option value="Analise documentacao">Análise documentação</option>
   <option value="Ilha de Input">Ilha de Input</option>
   <option value="Analise de input">Análise de input</option>
   <option value="Correcao Input">Correção Input</option>
 </select>
 </label>
</p>
<br>
<?php
$sqlop="SELECT a.cotacao_principal, 
a.revisao,
b.setor, 
c.nome as usuario_ciop
FROM cip_nv.tbl_cotacao a 
LEFT JOIN cip_nv.tbl_analise b 
ON b.id_cotacao=a.id_cotacao
LEFT JOIN cip_nv.tbl_usuarios c 
ON b.idtbl_usuario_analise=c.idtbl_usuario
WHERE a.cotacao_principal='$cotacao_principal' 
AND (b.status_cip_analise=3 OR b.status_cip_analise=4) and a.revisao='$revisao' 
UNION
SELECT a.cotacao_principal, 
a.revisao,
b.setor, 
c.nome as usuario_ciop
FROM cip_nv.tbl_cotacao a 
LEFT JOIN cip_nv.tbl_input b 
ON b.id_cotacao=a.id_cotacao
LEFT JOIN cip_nv.tbl_usuarios c 
ON b.idtbl_usuario_input=c.idtbl_usuario
WHERE a.cotacao_principal='$cotacao_principal' 
AND (b.status_cip_input=7 OR b.status_cip_input=8) and a.revisao='$revisao'  
UNION
SELECT a.cotacao_principal, 
a.revisao,
b.setor, 
c.nome as usuario_ciop
FROM cip_nv.tbl_cotacao a 
LEFT JOIN cip_nv.tbl_auditoria b 
ON b.id_cotacao=a.id_cotacao
LEFT JOIN cip_nv.tbl_usuarios c 
ON b.idtbl_usuario_auditoria=c.idtbl_usuario
WHERE a.cotacao_principal='$cotacao_principal' 
AND (b.status_cip_auditoria=13 OR b.status_cip_auditoria=14) and a.revisao='$revisao'  
UNION
SELECT a.cotacao_principal, 
a.revisao,
b.setor, 
c.nome as usuario_ciop
FROM cip_nv.tbl_cotacao a 
LEFT JOIN cip_nv.tbl_correcao b 
ON b.id_cotacao=a.id_cotacao
LEFT JOIN cip_nv.tbl_usuarios c 
ON b.idtbl_usuario_correcao=c.idtbl_usuario
WHERE a.cotacao_principal='$cotacao_principal' 
AND (b.status_cip_correcao=20 OR b.status_cip_correcao=21) and a.revisao='$revisao' 
";
$opr = mysql_query($sqlop,$conecta) or die(mysql_error());

$linharop=mysql_fetch_array($op);

?>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Operador com a cotação:&nbsp;
<?php if(empty($linharep['usuario_ci'])){ 
         echo $linharep['usuario_ci']='Sem operador na fila para Distribuir'; 
       }elseif(!empty($linharep['usuario_ci'])){
           
           echo $linharep['usuario_ci'];
       } ?>  
<input type="hidden" name="usuario_ciop" value="<?php echo $linharep['usuario_ciop'] ?>"/>
</label>
</p>

<br/>
<?php 

$revisa=$revisao-1;

$sqlrepr="SELECT a.cotacao_principal, 
b.disc_status_cip_analise as disc_status_ci, 
a.revisao,
b.setor, 
b.disc_status_cip_analise as tipo_erro_ci, 
c.nome as usuario_ci,
b.motivo_da_reprovacao as motivo_da_reprovacao,
b.obs_motivo_reprovacao as obs_motivo_reprovacao,
b.obs_analise as obs
FROM cip_nv.tbl_cotacao a 
LEFT JOIN cip_nv.tbl_analise b 
ON b.id_cotacao=a.id_cotacao
LEFT JOIN cip_nv.tbl_usuarios c 
ON b.idtbl_usuario_analise=c.idtbl_usuario
WHERE a.cotacao_principal='$cotacao_principal' AND (b.status_cip_analise=5) and a.revisao='$revisa' 
UNION
SELECT a.cotacao_principal, 
b.disc_status_cip_input as disc_status_ci, 
a.revisao,
b.setor, 
b.disc_status_cip_input as tipo_erro_ci, 
c.nome as usuario_ci,
b.motivo_da_reprovacao as motivo_da_reprovacao,
b.obs_motivo_reprovacao as obs_motivo_reprovacao,
b.obs_input as obs
FROM cip_nv.tbl_cotacao a 
LEFT JOIN cip_nv.tbl_input b 
ON b.id_cotacao=a.id_cotacao
LEFT JOIN cip_nv.tbl_usuarios c 
ON b.idtbl_usuario_input=c.idtbl_usuario
WHERE a.cotacao_principal='$cotacao_principal' AND (b.status_cip_input=10) and a.revisao='$revisa'  
UNION
SELECT a.cotacao_principal, 
b.disc_status_cip_auditoria as disc_status_ci, 
a.revisao,
b.setor, 
b.disc_status_cip_auditoria as tipo_erro_ci, 
c.nome as usuario_ci,
b.motivo_da_reprovacao as motivo_da_reprovacao,
b.obs_motivo_reprovacao as obs_motivo_reprovacao,
b.obs_auditoria as obs
FROM cip_nv.tbl_cotacao a 
LEFT JOIN cip_nv.tbl_auditoria b 
ON b.id_cotacao=a.id_cotacao
LEFT JOIN cip_nv.tbl_usuarios c 
ON b.idtbl_usuario_auditoria=c.idtbl_usuario
WHERE a.cotacao_principal='$cotacao_principal' AND (b.status_cip_auditoria=16) and a.revisao='$revisa'  
UNION
SELECT a.cotacao_principal, 
b.disc_status_cip_correcao as disc_status_ci, 
a.revisao,
b.setor, 
b.disc_status_cip_correcao as tipo_erro_ci, 
c.nome as usuario_ci,
b.motivo_da_reprovacao as motivo_da_reprovacao,
b.obs_motivo_reprovacao as obs_motivo_reprovacao,
b.obs_correcao as obs
FROM cip_nv.tbl_cotacao a 
LEFT JOIN cip_nv.tbl_correcao b 
ON b.id_cotacao=a.id_cotacao
LEFT JOIN cip_nv.tbl_usuarios c 
ON b.idtbl_usuario_correcao=c.idtbl_usuario
WHERE a.cotacao_principal='$cotacao_principal' AND (b.status_cip_correcao=29) and a.revisao='$revisa' 
";
$re = mysql_query($sqlrepr,$conecta) or die(mysql_error());

$linharep=mysql_fetch_array($re);

//echo '<br>';
$renum=mysql_num_rows($re);
///echo '<br>';
if($renum <= 0){

   $disabilitar='display:none';

}elseif($renum > 0){

   $desabilitar='display: ';
}
?>

<div style="padding: 3px 3px 3px 3px; <?php echo $disabilitar ?>">
<?php if(!empty($linharep['setor'])){ ?>  
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Motivo reprovação:&nbsp;
<?php echo $linharep['obs_motivo_reprovacao'] ?>  
<input type="hidden" name="mtrepro" value="<?php echo $linharep['obs_motivo_reprovacao'] ?>"/>
</label>
</p>
<br/>
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Nome do operador:&nbsp;
      <?php echo $linharep['usuario_ci'] ?>
      <input type="hidden" name="usuario_ci" value="<?php echo $linharep['usuario_ci'] ?>"/>
     </label>
     <label style="padding-left: 5px;">Status:&nbsp;
      <?php echo $linharep['disc_status_ci'] ?>
      <input type="hidden" name="disc_status_ci" value="<?php echo $linharep['disc_status_ci'] ?>"/>
     </label> 
  </p> 
    
    <?php if($sub_status_vivocorp == 'Correção input'){ ?>
    <br>
     <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
    <label style="padding-left: 5px;" >obs correção analise de input:&nbsp;
      <br>
  <?php
  $sqlcomentario="SELECT             
  b.obs_auditoria as obs_corre
  FROM cip_nv.tbl_cotacao a 
  LEFT JOIN cip_nv.tbl_auditoria b 
  ON b.id_cotacao=a.id_cotacao
  LEFT JOIN cip_nv.tbl_usuarios c 
  ON b.idtbl_usuario_auditoria=c.idtbl_usuario
  WHERE a.cotacao_principal='$cotacao_principal' 
  AND (b.status_cip_auditoria=18) AND a.revisao='$revisao' AND a.id_cotacao='$id_cotacao' ";
   $reco = mysql_query($sqlcomentario,$conecta) or die(mysql_error());

    $linharep2=mysql_fetch_array($reco);
    echo $linharep2['obs_corre'];

   ?>
     <input type="hidden" name="obs_corre" value="<?php echo $linharep2['obs_corre'] ?>"/>
     </label>
     </p> 
    <?php } ?>

 
 
<?php } ?>
</div>     
<br />

  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Observação:&nbsp;

  <textarea name="observacao" id="observacao" cols="63" rows="3" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius"></textarea>

</label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Solicitado comercial:&nbsp;
<select name="remetente" style="width:525' onblur='ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius" />

      <?php
                  
                    
          //seleciona a base de dados para uso
       
          $query= "SELECT * FROM cip_nv.remetente_diretoria ORDER BY nome ASC";
                    $result = mysql_query($query,$conecta) or die (mysql_error());
                    echo " <option value='0'>Selecione...</option>";
          while($dado= mysql_fetch_array($result)){
                    echo "
          <option value=\"{$dado['id']}\">
                    {$dado['nome']}</option>";
                    }
          ?>
     </select></label></p>

<br />

<!-----
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data de finalização da tratativa:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="Formatadata(this,event);" id="data_de_finalizacao_da_tratativa" name="data_de_finalizacao_da_tratativa" maxlength="10" class="txt2data bradius" /></label>
<label style="padding-left: 5px;">Hora de finalização da tratativa:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="HoraMinuto(event,this);" id="hora_de_finalizacao_da_tratativa" name="hora_de_finalizacao_da_tratativa" maxlength="5" class="txt2data bradius"/></label>
</p>-->
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label>Status diretoria:&nbsp;
      <select name="statusdiretoria" id="statusdiretoria" class="txt2comboboxpequeno bradius">
      <option value="0">Selecione...</option>
      <option value="1">Tratando</option>
      <option value="2">Tratado</option>
      </select>                
</p>
</div>
<br />



<?php 



 mysql_free_result($acao_operador,$acao_query,$acao_verifica,$qr,$result);
 mysql_close($conecta);


?>

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/formconsulta_cotacoes_diretoria.php'"/>


 
</form>

</div>

</div>


</body>
</html>

