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

 <script language="JavaScript"> 

function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';
    }

</script> 


<script language="JavaScript">
function abrircomple(URL) {
 
  var width = 'auto';
  var height ='auto';
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>


<script language="JavaScript">
function abrircomplementar(URL) {
 
  var width = 710;
  var height = 730;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
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




$id= (int) $_GET['id'];


$situacao="Com Cotações";

$query="UPDATE cip_nv.tbl_usuarios SET situacao2 = '$situacao' WHERE idtbl_usuario ='{$_COOKIE['idtbl_usuario']}'";
$acao_query = mysql_query($query,$conecta) or die (mysql_error());


$sql_verifca = "SELECT a.cotacao_atividade,
                       a.protocolo,
                       a.regional,
                       a.uf,
                       a.criado_em,
                       a.segmento,
                       a.revisao,
                       a.criado_por, 
                       a.responsavel,
                       a.cliente,
                       a.cpf_cnpj,
                       a.altas,
                       a.portabilidade,
                       a.migracao,
                       a.trocas,
                       a.tt,
                       a.backup,
                       a.m2m,
                       a.fixa,
                       a.pre_pos,
                       a.migracao_troca,
                       a.total_linhas,
                       a.tipo_servicos,
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
                       a.hora_de_finalizacao_da_tratativa,
                       a.revisar,
                       a.obs_auditoria,
                       a.disc_status_cip,
                       a.id 
 FROM cip_nv.base_diretoria a
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
   $status_da_cotacao    = $linha_atv["status_da_cotacao"];
   $status               = $linha_atv["status"];
   $ALTAS                = $linha_atv["altas"];
   $PORTABILIDADE        = $linha_atv["portabilidade"];
   $MIGRACAO             = $linha_atv["migracao"];
   $TROCAS               = $linha_atv["trocas"];
   $TT                   = $linha_atv["tt"];
   $BACKUP               = $linha_atv["backup"];
   $M_2_M                = $linha_atv["m2m"];
   $FIXA                 = $linha_atv["fixa"];
   $PRE_POS              = $linha_atv["pre_pos"]; 
   $MIGRACAO_TROCA       = $linha_atv["migracao_troca"]; 
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
   $disc_status_cip      = $linha_atv["disc_status_cip"];
   $obs_auditoria      = $linha_atv["obs_auditoria"];
   $usuario_ciop       = $linha_atv["operador_cota"];
   $idpri              = $linha_atv["id"];
   $tipo_servicos      = $linha_atv["tipo_servicos"];







   
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

if($ofensor == 'ND'){

  $herro=1;
  $derro='Não';
}elseif($ofensor <> 'ND'){
  $herro=2;
   $derro='Sim';
}

 $herro;
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
<?php if(empty($ofensor)){ ?>  
<option value=''>Selecione...</option>  
<?php }else{ ?>
<option value='<?php echo $herro ?>'><?php echo $derro ?></option> 
<?php } ?>
<option value="1">Não</option>
<option value="2">Sim</option>
</select></label>  
</p>  
</form>
<br>-->

<form action="principal.php?&t=controles/diretoria_valida_cadastro_tt.php"  method="POST">
<input type="hidden" name="observacao" id="observacao" value="<?php echo $observacao ?>"/>
<input type="hidden" name="id_diretoria" id="id_diretoria" value="<?php echo $id; ?>"/>
<input type="hidden" name="cotacaop" id="cotacaop" value="<?php echo $cotacao_principal; ?>"/>
<?php if( $cotacao_principal <> 'sem' ){ ?>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cotacao:&nbsp;<?php echo $cotacao_principal; ?> 
<input type="hidden" id="cotacaop" name="cotacaop" value="<?php echo $cotacao_principal; ?>">     
</label>
 <label style="padding-left: 5px;"><input name="complementar" type="button" value="visualizar complementares clik aqui" onclick="javascript:abrircomple('site/forms/formvisualizarcomplementares_diretoria.php?cotacaopri=<?php echo $cotacao_principal ?>&idpri=<?php echo $idpri ?>');" class="sb3 bradius">
</label>
 <label style="padding-left: 5px;"><input name="cargacomplementar" type="button" value="Carregar complementares clik aqui" onclick="javascript:abrircomplementar('site/forms/formatualizar_filhas.php?cotacaopri=<?php echo $cotacao_principal ?>&idpri=<?php echo $idpri ?>');" class="sb3 bradius" >
</label>

</p>
<br/>
<?php }  ?>
<?php if($cotacao_principal == 'sem' ){ ?>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Protocolo:&nbsp;
<?php echo $protocolo; ?>
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
<?php echo $tipo_servicos; ?>
<input type="hidden" name="tipo_servicos" value="<?php echo $tipo_servicos; ?>">  
</label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Substatus da cotação:&nbsp;
 <?php echo $status_da_cotacao ?> 
 <input type="hidden" id="status_da_cotacao" name="status_da_cotacao" value="<?php echo $status_da_cotacao ?>"  />
 </label>
</p>
<br>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Operador com a cotação:&nbsp;
 <?php if(empty($usuario_ciop)){ 
          echo $usuario_ciop ='Sem operador cadastrado';
        }elseif(!empty($usuario_ciop)){ 
               echo $usuario_ciop;
             
             }
          ?> 
 <input type="hidden" id="usuario_ciop" name="usuario_ciop" value="<?php echo $usuario_ciop ?>"  />
 </label>
</p>
<br />
<div style="background:#E8E8E8" class="bradius">
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data de recebimento:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="Formatadata(this,event);" id="data_de_recebimento" name="data_de_recebimento" maxlength="10" class="txt2data bradius" value="<?php echo $data_de_recebimento ?>"/></label>
<label style="padding-left: 5px;">Hora de recebimento:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="HoraMinuto(event,this);" id="hora_de_recebimento" name="hora_de_recebimento" maxlength="5" class="txt2data bradius" value="<?php echo $hora_de_recebimento ?>"/></label>
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


<?php 

///echo '<br>';
if(empty($motivo_erro)){

   $disabilitar='display:none';

}elseif(!empty($motivo_erro)){

   $desabilitar='display: ';
}
?>


<div style="padding: 3px 3px 3px 3px; <?php echo $disabilitar ?>">
<?php if(!empty($motivo_erro) && $motivo_erro <> 'Não Houve'){ ?>  
<br>

<button type="button" onclick="Mudarestado('minhaDiv')" class="sb5 bradius">+/- Exibir informação de reprovação</button>
<div id="minhaDiv" style="display: none;">

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Motivo reprovação:&nbsp;
<?php echo $motivo_erro  ?>  
<input type="hidden" name="mtrepro" value="<?php echo $motivo_erro  ?>"/>
</label>
</p>
<br/>
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Nome do operador:&nbsp;
      <?php echo $id_of_ilha; ?>
      <input type="hidden" name="usuario_ci" value="<?php echo $id_of_ilha ?>"/>
     </label>
     <label style="padding-left: 5px;">Status:&nbsp;
      <?php echo $disc_status_cip; ?>
      <input type="hidden" name="disc_status_ci" value="<?php echo $disc_status_cip ?>"/>
     </label> 
  </p> 
    
    <?php if( $status_vivocorp  == 'Correção input'){ ?>
    <br>
     <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
    <label style="padding-left: 5px;" >obs correção analise de input:&nbsp;
      <br>
  <?php   echo $obs_auditoria;  ?>
     <input type="hidden" name="obs_corre" value="<?php echo $obs_auditoria ?>"/>
     </label>
     </p> 
    <?php } ?>

 </div>
 
<?php } ?>
</div> 
   
<br />
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label style="padding-left: 5px;">Historico de comentarios ponto focal:&nbsp;

  <textarea name="observacao" id="observacao"  onblur="ValidaEntrada(this,'textarea');" 
        class="txt2textarea bradius" readonly="" lang="100%"><?php echo $observacao;  ?>      
  </textarea>

  </label>
</p>
<br />
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label style="padding-left: 5px;">Novo comentário:&nbsp;
  <input name="observacao2" id="observacao2"  onblur="" class="txtextragrande2 bradius"> 
               
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

</div>
<br />




<?php 
}
 mysql_free_result($acao_operador,$acao_query,$acao_verifica,$qr,$result);
 mysql_close($conecta);


?>

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/formconsulta_cotacoes_diretoria2pendente.php'"/>

 
</form>

</div>

</div>

</body>
</html>



