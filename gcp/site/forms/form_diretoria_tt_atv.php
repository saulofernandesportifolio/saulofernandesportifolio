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



$id= (int) $_GET['id'];


$situacao="Com Cotações";

$query="UPDATE cip_nv.tbl_usuarios SET situacao2 = '$situacao' WHERE idtbl_usuario ='{$_COOKIE['idtbl_usuario']}'";
$acao_query = mysql_query($query,$conecta) or die (mysql_error());

 $sql_verifca = "SELECT  a.cotacao_atividade,
                             a.regional,
                             a.uf,
                             a.criado_em,
                             a.segmento,
                             a.revisao,
                             a.criado_por,
                             a.responsavel,
                             a.cliente,
                             a.cpf_cnpj,
                             a.HP,
                             a.TA,
                             a.TT,
                             a.MT,
                             a.PN,
                             a.PP,
                             a.PTT,
                             a.MP,
                             a.TA_E_MP,
                             a.BACKUP,
                             a.total_linhas,
                             a.data_de_recebimento,
                             a.hora_de_recebimento,
                             a.acao,
                             a.solicitante_vivo_accenture,
                             a.status_da_cotacao,
                             a.ofensor,
                             a.erro,
                             a.motivo_erro,
                             a.observacao,
                             a.nome_ofensor_ilha,
                             a.remetente,
                             a.tmt,
                             a.operador_diretoria,
                             a.turno,
                             a.data_tratamento,
                             a.hora_tratamento,
                             a.statusdiretoria,
                             a.disc_statusdiretoria,
                             a.data_de_finalizacao_da_tratativa,
                             a.hora_de_finalizacao_da_tratativa
 FROM cip_nv.base_diretoria_atv a
                LEFT JOIN cip_nv.tipos_erros_diretoria b 
                ON b.id=a.erro 
                LEFT JOIN cip_nv.descricao_erro_diretoria c 
                ON c.id=a.motivo_erro 
                LEFT JOIN cip_nv.tbl_usuarios d 
                ON d.idtbl_usuario=a.nome_ofensor_ilha
                LEFT JOIN cip_nv.tbl_turno e 
                ON e.id_filtro=d.turno
                WHERE  a.id='$id' 
         ORDER BY a.criado_em ASC LIMIT 0,1 ";
$acao_verifica = mysql_query($sql_verifca,$conecta) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao_verifica))
{  
   
   
   $cotacao_principal    = $linha_atv["cotacao_atividade"];
   $regional             = $linha_atv["regional"];
   $uf                   = $linha_atv["uf"];
   $criado_em            = $linha_atv["criado_em"];
   $segmento             = $linha_atv["segmento"];
   $revisao              = $linha_atv["revisao"];
   $criado_por           = $linha_atv["criado_por"];
   $cliente              = $linha_atv["cliente"];
   $responsavel          = $linha_atv["responsavel"];
   $cpf_cnpj             = $linha_atv["cpf_cnpj"];
   $status_vivocorp      = $linha_atv["status_da_cotacao"];
   $status               = $linha_atv["status"];
   $HP                   = $linha_atv["HP"];
   $TA                   = $linha_atv["TA"];
   $TT                   = $linha_atv["TT"];
   $MT                   = $linha_atv["MT"];
   $PN                   = $linha_atv["PN"];
   $PP                   = $linha_atv["PP"];
   $PTT                  = $linha_atv["PTT"];
   $MP                   = $linha_atv["MP"];
   $TA_E_MP              = $linha_atv["TA_E_MP"];
   $BACKUP               = $linha_atv["BACKUP"]; 
   $total_linhas_cip     = $linha_atv["total_linhas"];
   $acao                 = $linha_atv["acao"]; 
   $solicitante_vivo_accenture = $linha_atv['solicitante_vivo_accenture'];
   $status_da_cotacao          = $linha_atv['status_da_cotacao'];
   $ofensor                    = $linha_atv['ofensor'];
   $erro                       = $linha_atv['erro'];
   $motivo_erro                = $linha_atv['motivo_erro'];
   $ds_erro                    = $linha_atv['tipo_erros'];
   $ds_motivo_erro             = $linha_atv['motivo'];
   $observacao                 = $linha_atv['observacao'];
   $protocolo                  = $linha_atv["protocolo"];
   $nome_ofensor               = $linha_atv["nome"];  
   $id_of_ilha                 = $linha_atv["nome_ofensor_ilha"];
   $ds_turno                   = $linha_atv["turno"];
   $ds_id_turno                = $linha_atv["id_filtro"]; 
   $solicitantegc              = $linha_atv["remetente"];
   $data_de_recebimento        = $linha_atv["data_de_recebimento"];
   $hora_de_recebimento        = $linha_atv["hora_de_recebimento"];
   $statusdiretoria            = $linha_atv["statusdiretoria"];
   $disc_statusdiretoria       = $linha_atv["disc_statusdiretoria"];
   $setor                      = $linha_atv["setor"];


   
$criado_em=arrumadatahora($criado_em);

$data_de_recebimento=arrumadata($data_de_recebimento);



$sql_verifica_dire="SELECT nome FROM cip_nv.remetente_diretoria_soli_vivo_accenture 
                  WHERE id='$solicitante_vivo_accenture' ";
$acao_verifica_dire = mysql_query($sql_verifica_dire,$conecta) or die (mysql_error());
$linha_n = mysql_fetch_array($acao_verifica_dire);


$sql_verifica_gc="SELECT nome FROM cip_nv.remetente_diretoria 
                  WHERE id='$solicitantegc' ";
$acao_verifica_gc = mysql_query($sql_verifica_gc,$conecta) or die (mysql_error());
$linha_n2 = mysql_fetch_array($acao_verifica_gc);

?>
<br/>

<div id="filtroservico bradius">

<p align="center" class="tituloform bradius">
<font size="4" style="text-align: center;">Diretoria - Ponto Focal Atividade</font></p>
<div class="divformservico bradius">
<form action="principal.php?&t=controles/diretoria_valida_cadastro_tt_atv.php"  method="POST">
<input type="hidden" name="observacao" id="observacao" value="<?php echo $observacao ?>"/>
<input type="hidden" name="id_diretoria" id="id_diretoria" value="<?php echo $id; ?>"/>
<input type="hidden" name="cotacaop" id="cotacaop" value="<?php echo $cotacao_principal; ?>"/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Atividade:&nbsp;
<?php echo $cotacao_principal; ?>
<input type="hidden" id="cotacaop" name="cotacaop" value="<?php echo $cotacao_principal; ?>">       
</label>
</p>
<br/>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Regional:&nbsp;
<?php echo $regional  ?>
<input type="hidden" name="regional" value="<?php echo $regional; ?>"> 
</label>
<label style="padding-left: 5px;">UF:&nbsp;
<?php echo $uf; ?>
<input type="hidden" name="uf" id="uf" value="<?php echo $uf ?>" />
</label>
    
<label style="padding-left: 5px;">Criado em:&nbsp;
<?php echo $criado_em; ?>
<input type="hidden" name="criado_em" id="criado_em" value="<?php echo $criado_em; ?>" />
</label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Segmento:&nbsp;
<?php echo  $segmento; ?>
<input type="hidden" name="segmento" id="segmento" value="<?php echo $segmento; ?>" />
</label>
<label style="padding-left: 5px;">Criado por :&nbsp;
<?php echo  $criado_por; ?>
<input id="criado_por" name="criado_por" type="hidden" value="<?php echo $criado_por; ?>"/>
</label>
<label style="padding-left: 5px;">Responsavel:&nbsp;
<?php echo $responsavel; ?> 
<input id="responsavel" name="responsavel" type="hidden" value="<?php echo $responsavel; ?>"/>
</label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cliente:&nbsp;
<?php echo  $cliente; ?>   
<input id="cliente" name="cliente" type="hidden" value="<?php echo  $cliente; ?>"/>   
</label>
<label style="padding-left: 5px;">CNPJ/CPF:&nbsp;
<?php echo  $cpf_cnpj; ?>  
<input id="cpf_cnpj" name="cpf_cnpj" type="hidden" value="<?php echo  $cpf_cnpj; ?>"/>
</label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">HP:&nbsp;
<?php echo $HP; ?>  
<input id="HP" name="HP" type="hidden" value="<?php echo $HP; ?>"/>
</label>
<label style="padding-left: 8px;">TA:&nbsp;
<?php echo $TA; ?>
<input id="TA" name="TA" type="hidden" value="<?php echo $TA; ?>"/>
</label>
<label style="padding-left: 8px;">TT:&nbsp;
<?php echo $TT; ?>
<input id="TT" name="TT" type="hidden" value="<?php echo $TT; ?>"/>
</label>
<label style="padding-left: 8px;">MT:&nbsp;
<?php echo $MT; ?>
<input id="MT" name="MT" type="hidden" value="<?php echo $MT; ?>"/>
</label>
<label style="padding-left: 8px;">TT:&nbsp;
<?php echo $TT; ?> 
<input id="tt" name="tt" type="hidden" value="<?php echo $TT; ?>"/>
</label>
<label style="padding-left: 8px;">PN:&nbsp;
<?php echo $PN; ?>  
<input id="PN" name="PN" type="hidden" value="<?php echo $PN; ?>"/>
</label>
<label style="padding-left: 8px;">PP:&nbsp;
<?php echo $PP; ?>  
<input id="PP" name="PP" type="hidden" value="<?php echo $PP; ?>"/>
</label>
<label style="padding-left: 8px;">PTT:&nbsp;
<?php echo $PTT; ?>
<input id="PTT" name="PTT" type="hidden" value="<?php echo $PTT; ?>"/>
</label>
<label style="padding-left: 8px;">MP:&nbsp;
<?php echo $MP; ?>
<input id="MP" name="MP" type="hidden" value="<?php echo $MP; ?>"/>
</label>
<label style="padding-left: 8px;">TA_E_MP:&nbsp;
<?php echo $TA_E_MP; ?>
<input id="TA_E_MP" name="TA_E_MP" type="hidden" value="<?php echo $TA_E_MP; ?>"/>
</label>
<label style="padding-left: 8px;">BACKUP:&nbsp;
<?php echo $BACKUP; ?>
<input id="BACKUP" name="BACKUP" type="hidden" value="<?php echo $BACKUP; ?>"/>
</label>
<br /><br />
<label style="padding-left: 6px;">TOTAL LINHAS:&nbsp;
<?php echo $total_linhas_cip; ?>  
<input id="total_linhas" name="total_linhas" type="hidden" value="<?php echo $total_linhas_cip; ?>"/>
</label>

</p>

<br />


<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data de recebimento:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="Formatadata(this,event);" id="data_de_recebimento" name="data_de_recebimento" maxlength="10" class="txt2data bradius" value="<?php echo $data_de_recebimento ?>"/></label>
<label style="padding-left: 5px;">Hora de recebimento:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="HoraMinuto(event,this);" id="hora_de_recebimento" name="hora_de_recebimento" maxlength="5" class="txt2data bradius" value="<?php echo $hora_de_recebimento  ?>"/></label>
<label style="padding-left: 5px;">TMT:&nbsp;
<?php echo substr($linha_atv['tmt'],0,5);  ?> </label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ação:&nbsp;
 <select onblur="ValidaEntrada(this,'combo')" id="acao" name="acao" class="txt2comboboxpequeno bradius">   
  <option value='<?php echo $acao ?>'><?php echo $acao ?></option>
   <option value="Acompanhar">Acompanhar</option>
   <option value="Prioridade">Prioridade</option>
   <option value="Desmembramento">Desmembramento</option>
 </select>
 </label>
 <label style="padding-left: 5px;">Solicitante Vivo/Atento:&nbsp;
<select name="solicitanteva" style='width:525' id="solicitanteva" onblur="ValidaEntrada(this,'combo');"  class="txt2comboboxpadrao bradius">
  <option value='<?php echo $solicitante_vivo_accenture  ?>'><?php echo $linha_n['nome'] ?></option>
   <?php
        //seleciona a base de dados para uso
       
          $query= "SELECT * FROM cip_nv.remetente_diretoria_soli_vivo_accenture ORDER BY nome";
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
  <option value='<?php echo $status_da_cotacao ?>'><?php echo $status_da_cotacao ?></option>
   <option value="Analise documentacao">Análise documentação</option>
   <option value="Ilha de Input">Ilha de Input</option>
   <option value="Analise de input">Análise de input</option>
   <option value="Correcao Input">Correção Input</option>
 </select>
 </label>
</p>
<br/>

<?php 
 $sqlrepr="SELECT b.cotacao_atividade, 
a.disc_status_ci_bko as disc_status_ci, 
a.setor, 
a.tipo_erro_ci_bko as tipo_erro_ci, 
a.usuario_ci_bko as usuario_ci
FROM input_piloto.tbl_atividades a
INNER JOIN cip_nv.base_diretoria_atv b
ON b.cotacao_atividade = a.nu_atividade 
WHERE a.nu_atividade='$cotacao_principal' 
AND (a.status_ci_bko=22) 
UNION
SELECT b.cotacao_atividade, 
a.disc_status_ci_input as disc_status_ci, 
a.setor, 
a.tipo_erro_ci_input as tipo_erro_ci, 
a.usuario_ci_input as usuario_ci
FROM input_piloto.tbl_atividades a
INNER JOIN cip_nv.base_diretoria_atv b
ON b.cotacao_atividade = a.nu_atividade 
WHERE a.nu_atividade='$cotacao_principal' 
AND (
 a.status_ci_input=6 
 ) 
UNION
SELECT b.cotacao_atividade, 
a.disc_status_ci, 
a.setor, 
a.tipo_erro_ci, 
a.usuario_ci 
FROM input_piloto.tbl_atividades a
INNER JOIN cip_nv.base_diretoria_atv b
ON b.cotacao_atividade = a.nu_atividade 
WHERE a.nu_atividade='$cotacao_principal' 
AND (a.status_ci=34 ) 

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
<?php if($linharep['setor'] == 'BKO'){ ?>  
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Motivo reprovação:&nbsp;
<?php echo $linharep['tipo_erro_ci'] ?>  
<input type="hidden" name="mtreprobko" value="<?php echo $linharep['tipo_erro_ci'] ?>"/>
</label>
</p>
<br/>
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Nome do operador bko:&nbsp;
      <?php echo $linharep['usuario_ci'] ?>
      <input type="hidden" name="usuario_ci_bko" value="<?php echo $linharep['usuario_ci'] ?>"/>
     </label>
        <label style="padding-left: 5px;">Status bko:&nbsp;
      <?php echo $linharep['disc_status_ci'] ?>
      <input type="hidden" name="disc_status_ci_bko" value="<?php echo $linharep['disc_status_ci'] ?>"/>
     </label> 
   </font>
 </p>
<?php }else ?> 
<?php if($linharep['setor'] == 'INPUT'){ ?>
<br>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Motivo reprovação:&nbsp;
<?php echo $linharep['tipo_erro_ci'] ?>  
<input type="hidden" name="mtreproinput" value="<?php echo $linharep['tipo_erro_ci'] ?>"/>
</label>
</p>
<br/>
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Nome do operador input:&nbsp;
      <?php echo $linharep['usuario_ci'] ?>
      <input type="hidden" name="usuario_ci_input" value="<?php echo $linharep['usuario_ci'] ?>"/>
     </label>
      <label style="padding-left: 5px;">Status input:&nbsp;
      <?php echo $linharep['disc_status_ci'] ?>
      <input type="hidden" name="disc_status_ci_input" value="<?php echo $linharep['disc_status_ci'] ?>"/>
     </label>
   </font>

 </p>
<?php }else ?>
<?php if($linharep['setor'] == 'REVER'){ ?>
<br>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Motivo reprovação:&nbsp;
<?php echo $linharep['tipo_erro_ci'] ?>  
<input type="hidden" name="mtreprorever" value="<?php echo $linharep['tipo_erro_ci'] ?>"/>
</label>
</p>
<br/>
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Nome do operador Reversão:&nbsp;
      <?php echo $linharep['usuario_ci'] ?>
      <input type="hidden" name="usuario_ci_rever" value="<?php echo $linharep['usuario_ci'] ?>"/>
     </label>
      <label style="padding-left: 5px;">Status Reversão:&nbsp;
      <?php echo $linharep['disc_status_ci'] ?>
      <input type="hidden" name="disc_status_cirever" value="<?php echo $linharep['disc_status_ci'] ?>"/>
     </label> 

   </font>

 </p>
<?php } ?>

</div>       

<br />
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label style="padding-left: 5px;">Historico:&nbsp;

  <textarea name="observacao" id="observacao"  onblur="ValidaEntrada(this,'textarea');" 
            class="txt2textarea bradius" readonly="true" lang="100%">
      <?php echo $observacao;  ?>      
  </textarea>

  </label>
</p>
<br />
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label style="padding-left: 5px;">Observação:&nbsp;

  <textarea name="observacao2" id="observacao2"  onblur="ValidaEntrada(this,'textarea');" 
            class="txt2textarea bradius" lang="100%" value="">
                
  </textarea>

  </label>
</p>

<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Solicitado comercial:&nbsp;
<select name="remetente" style="width:525' onblur='ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius" />
       <option value='<?php echo $solicitantegc ?>'><?php echo $linha_n2['nome'] ?> </option>
      <?php
                  
                    
          //seleciona a base de dados para uso
       
          $query= "SELECT * FROM cip_nv.remetente_diretoria ORDER BY nome";
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


<!--<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data de finalização da tratativa:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="Formatadata(this,event);" id="data_de_finalizacao_da_tratativa" name="data_de_finalizacao_da_tratativa" maxlength="10" class="txt2data bradius"/></label>
<label style="padding-left: 5px;">Hora de finalização da tratativa:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="HoraMinuto(event,this);" id="hora_de_finalizacao_da_tratativa" name="hora_de_finalizacao_da_tratativa" maxlength="5" class="txt2data bradius" /></label>
</p>
<br />-->

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label>Status diretoria:&nbsp;
      <select name="statusdiretoria" id="statusdiretoria" class="txt2comboboxpequeno bradius">
          <option value="<?php echo $statusdiretoria ?>"><?php echo $disc_statusdiretoria ?></option>
      <option value="1">Tratando</option>
      <option value="2">Tratado</option>
      </select>                
</p>
<br />




<?php 
}
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



