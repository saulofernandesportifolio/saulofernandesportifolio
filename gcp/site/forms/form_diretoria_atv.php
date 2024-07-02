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

  function corrigedatas($date){


  $dia=substr($date,0,2) ;
  $mes=substr($date,3,2);
  $ano=substr($date,6,4);

  /*data correta estiver correta */
  if(strlen($date) == 18)
  {
     
      $dia=substr($date,0,2);
      $mes=substr($date,2,2);
      $ano=substr($date,5,4);
      $hora=substr($date,10,9);
  } 
  /*data correta estiver correta */
  if(strlen($date) == 19)
  {
      $hora=substr($date,10,9);
  } 

  /*se a data não estivber correta*/ 
   if(strlen($date) == 17)
    {
        $dia=substr($date,0,2);
        $mes=substr($date,2,2);
        $ano=substr($date,4,4);
        $hora=substr($date,9,9);
    }

     /*realiza o tratamento do dia e mes*/
       if(substr($dia,1,1) == "/")
        {
          $dia='0'.substr($dia,0,1);
        }

 
        if(substr($mes,1,1) == "/" )
        {
          $mes='0'.substr($mes,0,1);
        }

        if(substr($mes,0,1) == "/" )
        {
          $mes='0'.substr($mes,1,1);
        }
        
if(!empty($date)){
   $date=$dia."/".$mes."/".$ano." ".$hora;
}
///echo '<br>';



 return $date;

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


$cotacao_principal=$_POST['n_da_cotacao'];


$situacao="Com Cotações";

$query="UPDATE cip_nv.tbl_usuarios SET situacao2 = '$situacao' WHERE idtbl_usuario ='{$_COOKIE['idtbl_usuario']}'";
$acao_query = mysql_query($query,$conecta) or die (mysql_error());


 $select_contes="SELECT * FROM cip_nv.base_diretoria 
                     WHERE cotacao_atividade='{$_POST['n_da_cotacao']}' ";
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

/*
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

echo "este é o ".$_GET['id_atv'];*/


$servidor = "10.119.243.217";//Geralmente é localhost mesmo
$nome_usuario = "root";//Nome do usuário do mysql
$senha_usuario = "atento"; //Senha do usuário do mysql
$nome_do_banco = "input_piloto"; //Nome do banco de dados
$conecta2serv02 = mysql_connect("$servidor", "$nome_usuario", "$senha_usuario", TRUE) or die (mysql_error());
$banco2 = mysql_select_db("$nome_do_banco",$conecta2serv02) or die (mysql_error());

 $select_contes2="SELECT a.id,
                a.nu_atividade,
                a.regional_atribuida,
                a.criado_em,
                CASE 
                WHEN a.tipo ='Ilha de Input VPG' 
                THEN 'VPG'
                WHEN a.tipo ='Ilha de Input VPG TT'
                THEN 'VPG'
                WHEN a.tipo= 'Input GOV VPG'
                THEN 'GOV'
                ELSE 'VPG' 
                END AS tipo,
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
                a.BAKUP,
                a.total_linhas_ci,
                a.setor FROM input_piloto.tbl_atividades a WHERE a.id='{$_GET['id_atv']}' ";
 $consulta_contes2 = mysql_query($select_contes2,$conecta2serv02) or die (mysql_error());
 $linha_cont2 = mysql_fetch_assoc($consulta_contes2);

  $cotacao_principal=$linha_cont2['nu_atividade'];
  $regional=$linha_cont2['regional_atribuida'];
  $uf=$linha_cont2['uf'];
  $criado_em= corrigedatas($linha_cont2['criado_em']);
  $segmento=$linha_cont2['tipo'];
  $revisao=$linha_cont2['revisao'];
  $criado_por=$linha_cont2['criado_por'];
  $responsavel=$linha_cont2['responsavel'];
  $cliente=$linha_cont2['cliente'];
  $cpf_cnpj=$linha_cont2['cpf_cnpj'];
  $cliente= $linha_cont2['cliente'];
   
  $hp=$linha_cont2['HP'];
  $ta=$linha_cont2['TA']; 
  $tt=$linha_cont2['TT'];
  $mt=$linha_cont2['MT'];
  $pn=$linha_cont2["PN"];
  $pp=$linha_cont2['PP'];
  $ptt=$linha_cont2['PTT'];
  $mp =$linha_cont2['MP'];
  $ta_e_mp=$linha_cont2['TA_E_MP'];
  $backup=$linha_cont2['BACKUP']; 
  $total_linhas=$linha_cont2['total_linhas_ci'];
  $setor=$linha_cont2['setor'];

   if($setor == 'BKO'){
     
      $setor='Tramitação';
   }
   if($setor == 'INPUT'){

      $setor='Input';
   }
   if($setor == 'REVER'){

     $setor='Reversão';
   }

   if(empty($hp) || $hp == 0){
      $hp='0';
   }
   if(empty($ta) || $ta == 0){
      $ta='0';
   }
   if(empty($tt) || $tt == 0){
      $tt='0';
   }
   if(empty($mt) || $mt == 0){
      $mt='0';
   }
   if(empty($pn) || $pn == 0){
      $pn='0';
   }
   if(empty($pp) || $pp == 0){
      $pp='0';
   }
   if(empty($ptt) || $ptt == 0){
      $ptt='0';
   }
   if(empty($mp) || $mp == 0){
      $mp='0';
   }
   if(empty($ta_e_mp) || $ta_e_mp == 0){
      $ta_e_mp='0';
   }
   if(empty($backup) || $backup == 0){
      $backup='0';
   }
   if(empty($total_linhas) || $total_linhas == 0){
      $total_linhas='0';
   }



?>
<br/>

<div id="filtroservico bradius">

<p align="center" class="tituloform bradius">
<font size="4" style="text-align: center;">Diretoria - Ponto Focal Atividade</font></p>
<div class="divformservico bradius">
<!--<form name="f" action="#" method="post">
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

<form action="principal.php?&t=controles/diretoria_valida_cadastro_atv.php"  method="POST">
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Atividade:&nbsp;<?php echo $cotacao_principal; ?> 
<input type="hidden" id="cotacaop" name="cotacaop" value="<?php echo $cotacao_principal; ?>">      
</label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px; ">Regional:&nbsp;
<?php echo $regional ?>
<input type="hidden" name="regional" value="<?php echo $regional; ?>">  
</label>
<label style="padding-left: 5px;">UF:&nbsp;
<select onblur="ValidaEntrada(this,'combo')" id="uf" name="uf" class="txt2comboboxpequeno bradius">
                            <option value=''>Selecione</option>
                                <optgroup title="SP" label="SP">
                                <option value="SP">SP</option>
                                </optgroup>
                                <optgroup title="CO" label="CO">
                                 <option value="GO">GO</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="DF">DF</option>
                                </optgroup>
                                <optgroup title="SUL" label="SUL">
                                  <option value="PR">PR</option>
                                  <option value="RS">RS</option>
                                  <option value="SC">SC</option>
                                </optgroup>
                                <optgroup title="NE" label="NE">
                                  <option value="AL">AL</option>
                                  <option value="BA">BA</option>
                                  <option value="CE">CE</option>
                                  <option value="MA">MA</option>
                                  <option value="PB">PB</option>
                                  <option value="PE">PE</option>
                                  <option value="PI">PI</option>
                                  <option value="RN">RN</option>
                                  <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </optgroup>
                                <optgroup title="NORTE" label="NORTE">
                                  <option value="AC">AC</option>
                                  <option value="AP">AP</option>
                                  <option value="AM">AM</option>
                                  <option value="PA">PA</option>
                                  <option value="RO">RO</option>
                                  <option value="RR">RR</option>  
                                </optgroup>
                                <optgroup title="MG" label="MG">
                                    <option value="MG">MG</option>
                                </optgroup>
                                <optgroup title="LESTE" label="LESTE">
                                  <option value="ES">ES</option>
                                  <option value="RJ">RJ</option>
                                </optgroup>
                                  <optgroup title="Todas as Regionais" label="Todas as Regionais">
                                  <option value="Todas as UF">Todas as UF</option>
                                  </optgroup>
                            </select>


</label>
<label style="padding-left: 5px;">Criado em:&nbsp;
  <?php echo $criado_em; ?>
    <input  id="criado_em" name="criado_em" class="txt2comboboxpequeno  bradius" value="<?php echo $criado_em; ?>" type="hidden"/></label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Segmento:&nbsp;
<?php echo  $segmento; ?>
<input  id="segmento" name="segmento" class="txt2comboboxpequeno  bradius" value="<?php echo $segmento; ?>" type="hidden"/>
</label>
<label style="padding-left: 5px;">Criado por :&nbsp;
<?php echo  $criado_por; ?>  
<input type="hidden" name="criado_por" id="criado_por" value="<?php echo $criado_por; ?>"/></label>
<label style="padding-left: 5px;">Responsavel:&nbsp;
<?php echo $responsavel; ?>  
<input id="responsavel" name="responsavel" type="hidden" value="<?php echo $responsavel; ?>"/></label>
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
<?php echo $hp; ?>  
<input  type="hidden" id="HP" name="HP" class="txtpequeno bradius" value="<?php echo $hp; ?>"/></label>
<label style="padding-left: 5px;">TA:&nbsp;
<?php echo $ta; ?>  
<input  type="hidden" id="TA" name="TA" class="txtpequeno bradius" value="<?php echo $ta; ?>"/></label>
<label style="padding-left: 5px;">TT:&nbsp;
<?php echo $tt; ?>  
<input type="hidden" id="TT" name="TT" class="txtpequeno bradius" value="<?php echo $tt; ?>"/></label>
<label style="padding-left: 5px;">MT:&nbsp;
<?php echo $mt; ?>  
<input type="hidden" id="MT" name="MT" class="txtpequeno bradius" value="<?php echo $mt; ?>"/></label>
<label style="padding-left: 5px;">PN:&nbsp;
<?php echo $pn; ?>  
<input type="hidden" id="PN" name="PN" class="txtpequeno bradius" value="<?php echo $pn; ?>"/></label>
<label style="padding-left: 5px;">PP:&nbsp;
<?php echo $pp; ?>  
<input type="hidden" id="PP" name="PP" class="txtpequeno bradius" value="<?php echo $pp; ?>"/></label>
<label style="padding-left: 5px;">PTT:&nbsp;
<?php echo $ptt; ?>  
<input type="hidden" id="PTT" name="PTT" class="txtpequeno bradius" value="<?php echo $ptt; ?>"/></label>
<label style="padding-left: 5px;">MP:&nbsp;
<?php echo $mp; ?>  
<input type="hidden" id="MP" name="MP" class="txtpequeno bradius" value="<?php echo $mp; ?>"/></label>
<label style="padding-left: 5px;">TA_E_MP:&nbsp;
<?php echo $ta_e_mp; ?>  
<input type="hidden" id="TA_E_MP" name="TA_E_MP" class="txtpequeno bradius" value="<?php echo $ta_e_mp; ?>"/></label>
<label style="padding-left: 5px;">BACKUP:&nbsp;
<?php echo $backup; ?>  
<input type="hidden" id="BACKUP" name="BACKUP" class="txtpequeno bradius" value="<?php echo $backup; ?>"/></label>
<label style="padding-left: 6px;">TOTAL LINHAS:&nbsp;
<?php echo $total_linhas; ?>  
<input type="hidden" id="total_linhas" name="total_linhas" class="txtpequeno bradius" value="<?php echo $total_linhas; ?>"/></label>
</p>

<br />

<div style="background:#E8E8E8" class="bradius">
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data de recebimento:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="Formatadata(this,event);" id="data_de_recebimento" name="data_de_recebimento" maxlength="10" class="txt2data bradius" value="<?php echo date("d/m/Y"); ?>" /></label>
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
 <?php if(empty($setor)){ ?> 
  <option value=''>Selecione...</option>
  <?php } ?>
  <option value="<?php echo $setor ?>"><?php echo $setor ?></option>
   <option value="Tramitação">Tramitação</option>
   <option value="Input">Input</option>
   <option value="Reversão">Reversão</option>
 </select>
 </label>
</p>
<br/>

<?php 
$sqlrepr="SELECT a.nu_atividade, 
a.disc_status_ci_bko as disc_status_ci, 
a.setor, 
a.tipo_erro_ci_bko as tipo_erro_ci, 
a.usuario_ci_bko as usuario_ci 
FROM input_piloto.tbl_atividades a 
WHERE a.nu_atividade='$cotacao_principal' 
AND (a.status_ci_bko=22) 
UNION 
SELECT a.nu_atividade, 
a.disc_status_ci_input as disc_status_ci, 
a.setor, a.tipo_erro_ci_input as tipo_erro_ci, 
a.usuario_ci_input as usuario_ci 
FROM input_piloto.tbl_atividades a 
WHERE a.nu_atividade='$cotacao_principal' 
AND ( a.status_ci_input=6 ) 
UNION 
SELECT a.nu_atividade, 
a.disc_status_ci, 
a.setor, 
a.tipo_erro_ci, 
a.usuario_ci 
FROM input_piloto.tbl_atividades a 
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
      <input type="hidden" name="usuario_ci" value="<?php echo $linharep['usuario_ci'] ?>"/>
     </label>
      <label style="padding-left: 5px;">Status Reversão:&nbsp;
      <?php echo $linharep['disc_status_ci'] ?>
      <input type="hidden" name="disc_status_ci" value="<?php echo $linharep['disc_status_ci'] ?>"/>
     </label> 

   </font>

 </p>
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

<!---
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data de finalização da tratativa:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="Formatadata(this,event);" id="data_de_finalizacao_da_tratativa" name="data_de_finalizacao_da_tratativa" maxlength="10" class="txt2data bradius"/></label>
<label style="padding-left: 5px;">Hora de finalização da tratativa:&nbsp;
<input  onblur="valida(this,'text');" onkeypress="HoraMinuto(event,this);" id="hora_de_finalizacao_da_tratativa" name="hora_de_finalizacao_da_tratativa" maxlength="5" class="txt2data bradius" /></label>
</p>
<br />-->

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label>Status diretoria:&nbsp;
      <select name="statusdiretoria" id="statusdiretoria" class="txt2comboboxpequeno bradius">
      <option value="0">Selecione...</option>
      <option value="1">Tratando</option>
      <option value="2">Tratado</option>
      </select>                
</p>
<br />

</div>


<?php 



 mysql_free_result($acao_operador,$acao_query,$acao_verifica,$qr,$result);
 mysql_close($conecta);


?>

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php'"/>

 
</form>

</div>

</div>

</body>
</html>
