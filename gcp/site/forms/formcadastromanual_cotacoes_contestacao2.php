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
         $("select[name=login_operadores_cont]").change(function(){
            $("select[name=turno]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_operadorescont.php", 
                  {login_operadores_cont:$(this).val()},
                  function(valor){
                     $("select[name=turno]").html(valor);
           $teste=$ln['turno'];  
          })
         })
        
        }) 
 
     $(document).ready(function(){
         $("select[name=ofensor]").change(function(){
            $("select[name=tipo2]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_motivos_erroscont.php", 
                  {ofensor:$(this).val()},
                  function(valor){
                     $("select[name=tipo2]").html(valor);
           $teste=$ln['tipo2'];  
          }
                  )
         })
      })


     $(document).ready(function(){
         $("select[name=tipo2]").change(function(){
            $("select[name=tipo_apurado]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_sub_motivos_erroscont.php", 
                  {tipo2:$(this).val()},
                  function(valor){
                     $("select[name=tipo_apurado]").html(valor);
           $teste=$ln['tipo_apurado'];  
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
  
    
if($perfil!= 1 && $perfil != 14 ){
    
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


$situacao="Com Cotações";

$query="UPDATE cip_nv.tbl_usuarios SET situacao2 = '$situacao' WHERE idtbl_usuario ='{$_COOKIE['idtbl_usuario']}'";
$acao_query = mysql_query($query,$conecta) or die (mysql_error());



 $id_contestacao_cotacao= (int) $_GET['id_contestacao_cotacao'];
 $setor= (string) $_GET['setor'];
 
if($setor == 'Análise de input'){

  $setor='Auditoria';
}
 
 $select_contes="SELECT id_contestacao_cotacao,setor   
                     FROM cip_nv.base_contestacoes_cotacao_manual 
                     WHERE id_contestacao_cotacao='$id_contestacao_cotacao' AND setor='$setor' ";
$consulta_contes = mysql_query($select_contes,$conecta) or die (mysql_error());

 $linha_cont = mysql_fetch_assoc($consulta_contes);
 $numveri=mysql_num_rows($consulta_contes);
 $id_contestacao_cotacao=$linha_cont['id_contestacao_cotacao'];

if($numveri > 0){

echo "<script>alert('contestacao encontrada !'); 
    document.location.replace('principal.php?&idcont={$id_contestacao_cotacao}&t=forms/formcadastromanual_cotacoes_contestacao_att.php');
  
      </script>";
  exit();

}


/*


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
                FROM tbl_cotacao a
                WHERE  a.id_cotacao='$id_cotacao'
         GROUP BY a.cotacao_principal,a.criado_em ASC LIMIT 0,20000 ";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());

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
*/

?>
<br/>
<div id="filtroservico bradius">

<p align="center"  class="tituloformcontestacao bradius"><font size="4" style="text-align: center;">Contestasção manual</font></p>

<div class="divformservicocontestacao bradius">
<form action="principal.php?&t=controles/valida_cadastromanual_contestacao.php"  method="POST">
<input type="hidden" value="0" id="conterro" />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cotação/atividades/pedidos:&nbsp;<input  id="cotacao_atividade_pedido" name="cotacao_atividade_pedido" maxlength="40" class="txtmedio bradius" onblur="ValidaEntrada(this,'atividade_pedido');"/></label>
<label style="padding-left: 5px;">Regional:&nbsp;<select onblur="ValidaEntrada(this,'combo');" id="regional" name="regional" class="txt2comboboxpequeno bradius">
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
                            </select></label>
<label style="padding-left: 5px;">Criado em:&nbsp;<input  onblur="ValidaEntrada(this,'datetime');" onkeypress="DataHora(event,this);" id="criado_em" name="criado_em" maxlength="19" class="txt2datahora bradius"/></label>                            
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">

<label style="padding-left: 5px;">Segmento:&nbsp;<select onblur="ValidaEntrada(this,'combo')" id="segmento" name="segmento" class="txt2comboboxpequeno bradius">
                            <option value=''>Selecione</option>
              <option value="GOV">GOV</option>
                                  <option value="TOP">TOP</option>
                                  <option value="VIP">VIP</option>
                                  <option value="ESTRATEGICO">ESTRATEGICO</option>
                                  <option value="MASSIVO">MASSIVO</option>
                                  <option value="VPK">VPK</option>   
                           
                            </select></label>
<label style="padding-left: 5px;">Revisão:&nbsp;<input  onblur="ValidaEntrada(this,'int');"  id="revisao" name="revisao" maxlength="10" class="txtpequenino bradius"/></label>
<label style="padding-left: 5px;">Criado por :&nbsp;<input  onblur="ValidaEntrada(this,'login');"  id="criado_por" name="criado_por" maxlength="10" class="txt2medio bradius"/></label>
<label style="padding-left: 5px;">Responsavel:&nbsp;<input  onblur="ValidaEntrada(this,'login');"  id="responsavel" name="responsavel" maxlength="10" class="txt2medio bradius"/></label>
<label style="padding-left: 5px;">Status :&nbsp;<select onblur="ValidaEntrada(this,'combo')" id="status" name="status" class="txt2comboboxpequenino bradius">
                            <option value=''>Selecione</option>
                                  <option value="Concluido">Concluido</option>
                                  <option value="Pendente">Pendente</option>
                                                          
                            </select></label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cliente:&nbsp;<input  onblur="ValidaEntrada(this,'text');"  id="cliente" name="cliente" maxlength="60" class="txtgrande bradius"/></label>
<label style="padding-left: 5px;">CNPJ/CPF:&nbsp;<input  onblur="ValidaEntrada(this,'cpf');" id="cnpj_cpf" name="cnpj_cpf" maxlength="14" class="txtmedio bradius"/></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">ALTAS:&nbsp;<input   id="altas" name="altas" maxlength="10" class="txtpequeno bradius"/></label>
<label style="padding-left: 5px;">PORTABILIDADE:&nbsp;<input   id="portabilidade" name="portabilidade" maxlength="10" class="txtpequeno bradius"/></label>
<label style="padding-left: 5px;">MIGRACAO:&nbsp;<input   id="migracao" name="migracao" maxlength="10" class="txtpequeno bradius"/></label>
<label style="padding-left: 5px;">TROCAS:&nbsp;<input   id="trocas" name="trocas" maxlength="10" class="txtpequeno bradius"/></label>
<label style="padding-left: 5px;">TT:&nbsp;<input  id="tt" name="tt" maxlength="10" class="txtpequeno bradius"/></label>
<label style="padding-left: 5px;">BACKUP:&nbsp;<input   id="backup" name="backup" maxlength="10" class="txtpequeno bradius"/></label>
<label style="padding-left: 5px;">M2M:&nbsp;<input  id="m2m" name="m2m" maxlength="10" class="txtpequeno bradius"/></label>
<label style="padding-left: 5px;">FIXA:&nbsp;<input   id="fixa" name="fixa" maxlength="10" class="txtpequeno bradius"/></label>
<label style="padding-left: 5px;">PRE POS:&nbsp;<input   id="pre_pos" name="pre_pos" maxlength="10" class="txtpequeno bradius"/></label>
<label style="padding-left: 5px;">MIGRACAO TROCA:&nbsp;<input   id="migracao_troca" name="migracao_troca" maxlength="10" class="txtpequeno bradius"/></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data recebimento:&nbsp;
<input   onkeypress="Formatadata(this,event);" id="data_do_recebimento" name="data_do_recebimento" maxlength="10" class="txt2data bradius"/></label>
<label style="padding-left: 5px;">Hora recebimento:&nbsp;
<input   onkeypress="HoraMinuto(event,this);" id="hora_do_recebimento" name="hora_do_recebimento" maxlength="5" class="txt2data bradius" /> </label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Remetente:&nbsp;
  <select name="remetente" class="txt2comboboxpadrao bradius">
<?php
          

  $query= "SELECT * FROM cip_nv.remetente_diretoria ORDER BY nome";
                    $result = mysql_query($query,$conecta) or die (mysql_error());
                    echo " <option value='0'>Selecione...</option>";
          while($dado= mysql_fetch_array($result)){
                    echo "
          <option value=\"{$dado['nome']}\">
                    {$dado['nome']}</option>";
                    } 
?></select></label>
<label style="padding-left: 5px;">Cod.adabas:&nbsp;
<input  onblur="ValidaEntrada(this,'login')" id="cd_adabas" name="adabas" class="txt2comboboxpequeno bradius" /></label>
</p>
<br />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ofensor:&nbsp;
<select name="ofensor" id="ofensor" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
   <?php


      
  //seleciona a base de dados para uso
  $query= "SELECT * FROM cip_nv.cont_ofensor_input  ORDER BY item";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
               {$dado['item']}</option>";
   }
 ?> </select></label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Tipo2:&nbsp;
<select name="tipo2" id="tipo2" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxgrande bradius">
   <option value="">Selecione....</option>

   
 </select></label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Tipo apurado:&nbsp;
<select name="tipo_apurado" id="tipo_apurado" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxgrande bradius">
   <option value="">Selecione....</option>
 
  </select></label>
</p>
<br />
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Operador da Reprovação:&nbsp;
    <select class="txt2comboboxpadrao bradius"  name="login_operadores_cont" id="login_operadores_cont" onblur="ValidaEntrada(this,'combo');">
    <option value="" selected="selected">Selecione</option>
    <option value="5">Não houve</option> 
     <?php
                     $sql = "SELECT * FROM cip_nv.tbl_usuarios WHERE status=1 and perfil NOT IN(4) ORDER BY nome ASC ";
                     $qr = mysql_query($sql,$conecta) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){

                     echo '<option value="'.$ln['idtbl_usuario'].'">'.$ln['nome'].'</option>';
                     }
                     ?>


    </select>
 
     Turno:
      <select name="turno" id="turno"  class="txt2comboboxpequeno bradius" onblur="ValidaEntrada(this,'combo');">
                  <option value="" selected="selected">Selecione...</option>
                  <option value="<?php echo $turno; ?>" ><?php echo $turno; ?></option>
                     

      </select></label></font></p>

<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Contestacao:&nbsp;
<select name="contestacao" id="contestacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpequeno bradius">
   <option value="">Selecione....</option>
   <?php
    //conecta no SGBD MySQL

      
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.cont_contestacao  ORDER BY item";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
               {$dado['item']}</option>";
   }
 ?> </select></label> 


<label style="padding-left: 5px;">Setor:&nbsp;<select onblur="ValidaEntrada(this,'combo');" id="setor" name="setor" class="txt2comboboxpequeno bradius">
                            <option value="">Selecione</option>
                                  <option value="Analise">Analise</option>
                                  <option value="Input">Input</option>
                                  <option value="Auditoria">Auditoria</option>
                                  <option value="Correcao">Correcao</option>
                                  <option value="Chamado">Chamado</option>
                                                   
                            </select></label>

 </p>

</br> 

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label>Item contestado pela FDV:<br />&nbsp;
  <textarea rows="5" onblur="ValidaEntrada(this, 'textarea')" name="item_fdv" class="txt2textareacontestacao bradius"></textarea>
                   
</p>
<br />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
   
 <label style="padding-left: 5px;">Retorno do e-mail:<br />&nbsp;<textarea  name="email" onblur="ValidaEntrada(this,'textarea');" class="txt2textareacontestacao bradius" ></textarea></label>   
</p>
<br />


<br/>


 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/formconsulta_cotacoes_contestacao.php'"/>

 <input name="historico" type="button" value="Historico" class="sb2 bradius" onclick="javascript:abrir('site/forms/historico_contestacoes.php?id_contestacao_cotacao=<?php echo "$idcont" ?>');"/>
 
</form>

</div>

</div>

</body>
</html>

