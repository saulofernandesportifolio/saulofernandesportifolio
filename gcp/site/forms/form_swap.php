<script language="JavaScript">
function abrir(URL) {
 
  var width = 500;
  var height = 200;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>

<script>
 /*filtro operador form auditoria por setor*/
 
$(document).ready(function(){
         $("select[name=login_operadores_swap]").change(function(){
            $("select[name=turno]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_operadores_swap.php", 
                  {login_operadores_swap:$(this).val()},
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
      
     $(document).ready(function(){
         $("select[name=swap]").change(function(){
            $("select[name=sp2]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_motivos_swap.php", 
                  {swap:$(this).val()},
                  function(valor){
                     $("select[name=sp2]").html(valor);
           $teste=$ln['sp2'];  
          }
                  )
         })
      })  
      

      $(document).ready(function(){
         $("select[name=swap]").change(function(){
            $("select[name=statuscip]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_status_swap.php", 
                  {swap:$(this).val()},
                  function(valor){
                     $("select[name=statuscip]").html(valor);
           $teste=$ln['statuscip'];  
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
  
    
if($perfil!= 1 && $perfil != 20 ){
    
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

?>
<br/>

<div id="filtroservico bradius">

<p align="center" class="tituloform bradius">
<font size="4" style="text-align: center;">Swap</font></p>
<div class="divformservico bradius">
<form action="principal.php?&t=controles/swap_valida_cadastro.php"  method="POST">
<input type="hidden" value="0" id="conterro" />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">COTAÇÃO/PEDIDO:&nbsp;
<input onblur="ValidaEntrada(this,'atividade_pedido')" type="text" name="cotacaopedido" id="cotacaopedido" class="txtmedio bradius"/></label>
<label style="padding-left: 20px;">Regional:&nbsp;
<select onblur="ValidaEntrada(this,'combo')" id="regional" name="regional" class="txt2comboboxpequeno bradius">
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
</p><br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Carteira:&nbsp;
    <select onblur="ValidaEntrada(this,'combo')" id="carteira" name="carteira" class="txt2comboboxpequeno bradius">
                            <option value=''>Selecione</option>
                            <option value="GOV">GOV</option>
                            <option value="TOP">TOP</option>
                            <option value="VIP">VIP</option>
                            <option value="ESTRATEGICO">ESTRATEGICO</option>
                            <option value="MASSIVO">MASSIVO</option>
                           <option value="VPK">VPK</option>  
                            </select></label>
<label style="padding-left: 20px;">Adabas:&nbsp;
<input onblur="ValidaEntrada(this,'adabas')" type="text" name="adabas" id="abadas" class="txtpequeno2 bradius"/></label>
<label style="padding-left: 20px;">Status :&nbsp;
    <select onblur="ValidaEntrada(this,'combo')" id="status" name="status" class="txt2comboboxmedio bradius">
                            <option value=''>Selecione</option>
                                  <option value="Pré-viabilidade concluida">Pré-viabilidade concluida</option>
                                  <option value="Aberta">Aberta</option>
                                  <option value="Pendente">Pendente</option>
                              </select></label></p>
<br />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Total de linhas:&nbsp;
    <input onblur="ValidaEntrada(this,'int')" type="text" name="tllinhas" id="tllinhas" class="txt2data  bradius" /></label>    
<label style="padding-left: 5px;">Total de linhas de swap:&nbsp;
    <input onblur="ValidaEntrada(this,'int')" type="text" name="tlswap" id="tlswap" class="txt2data  bradius" /></label>

</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data da solicitação:&nbsp;
<input  onblur="ValidaEntrada(this,'date');" onkeypress="Formatadata(this,event);" id="data_solicitacao" name="data_solicitacao" maxlength="10" class="txt2data bradius"/></label>
<label style="padding-left: 5px;">Hora da solicitação:&nbsp;
<input onblur="ValidaEntrada(this,'hora');" onkeypress="HoraMinuto(event,this);" id="hora_solicitacao" name="hora_solicitacao" maxlength="5" class="txt2data bradius" /> </label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Aparelho inicial(DE):&nbsp;
<input  onblur="ValidaEntrada(this,'textarea');" id="ap_inicial" name="ap_inicial" class="txtgrande bradius"/>
</label> 
<label style="padding-left: 5px;">Qtd:&nbsp;
<input  onblur="ValidaEntrada(this,'int');" id="de_qtd" name="de_qtd" class="txtpequeno bradius"/>
</label>    
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Aparelho final(PARA):&nbsp;
<input  onblur="ValidaEntrada(this,'textarea');" id="ap_final" name="ap_final" class="txtgrande bradius"/>
</label>  
<label style="padding-left: 5px;">Qtd:&nbsp;
<input  onblur="ValidaEntrada(this,'int');" id="para_qtd" name="para_qtd" class="txtpequeno  bradius"/>
</label>  
</p>
<br/>

  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Operador input:&nbsp;
    <select class="txt2comboboxpadrao bradius"  name="login_operadores_swap" id="login_operadores_cont" onblur="ValidaEntrada(this,'combo');">
    <option value="" selected="selected">Selecione</option>
    <option value="5">Não houve</option> 
     <?php
                     $sql = "SELECT * FROM cip_nv.tbl_usuarios WHERE perfil NOT IN (4,1,13,14,19,16,17,20) ORDER BY nome ASC ";
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
<label style="padding-left: 5px;">Solicitante:&nbsp;
         <select onblur="ValidaEntrada(this,'combo')" name="solicitante" id="solicitante" class="txt2comboboxpequeno bradius">
         <option value="">Selecione...</option>
         <option value="1">GN GUARDIÃO</option>
         <option value="2">GERENTE</option>
         <option value="3">PRIORIDADE</option>
         </select></label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Nome do solicitante:&nbsp;
<select  name="remetente" id="remetente" style="width:525" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
         <option value=''>Selecione...</option>

 <?php
                  
                              
          //seleciona a base de dados para uso
       
          $query= "SELECT * FROM cip_nv.remetente_swap ORDER BY nome_gc";
          $result = mysql_query($query,$conecta) or die (mysql_error());
   
          while($dado= mysql_fetch_array($result)){
                    echo "
          <option value=\"{$dado['id']}\">{$dado['nome_gc']}</option>";
            
          
          }
          ?>
     </select>
</label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Swap:&nbsp;
 <select name="swap" id="swap" style="width:525" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpequeno bradius" /> 
 <option value=''>Selecione...</option>  
 <?php
 

          //seleciona a base de dados para uso
       
          $query= "SELECT * FROM cip_nv.cont_swap ORDER BY item ";
          $result = mysql_query($query,$conecta) or die (mysql_error());
          
          while($dado= mysql_fetch_array($result)){
                    echo "
          <option value=\"{$dado['id']}\">{$dado['item']}</option>";
            }
            
         
            ?>
</select>
    </label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Sub motivo swap:&nbsp;
<select name="sp2" id="sp2" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxgrande bradius">
   <option value="">Selecione....</option>

   
 </select></label></p>
<br />
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">E-mail de solicitação:&nbsp;

  <textarea name="emailsolicitacao" id="emailsolicitacao" cols="63" rows="3" class="txt2textarea bradius" onblur="ValidaEntrada(this,'textarea');" ></textarea>

</label>
</p>
<br />
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Retorno do e-mail:&nbsp;

  <textarea name="retornoemail" id="retornoemail" cols="63" rows="3"  class="txt2textarea bradius" onblur="ValidaEntrada(this,'textarea');" ></textarea>

</label>
</p>
<br />


<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label>Status cip:&nbsp;
      <select name="statuscip" id="statuscip" class="txt2comboboxpequeno bradius" onblur="ValidaEntrada(this,'combo');">
      <option value="">Selecione...</option>


      </select>                
</p>
<br />


 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php'"/>
 
</form>

</div>

</div>

</body>
</html>

