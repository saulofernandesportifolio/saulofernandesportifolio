<script language="JavaScript">
function abrir(URL) {
 
  var width = 500;
  var height = 200;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>



<script language="JavaScript">
function abrircadap(URL) {
 
  var width = screen.width;
  var height = screen.height;


 
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

 $id_cotacao    = (int) $_GET['id_cotacao'];
 $id_chamado    = (int) $_GET['id_chamado'];
 $setor_origem = (string) $_GET['setor_origem'];
 
 if($setor_origem == 'Análise de input'){

  $setor_origem='Auditoria';
}

$data_distribuicao=date("Y-m-d H:i:s");
 

$situacao="Com Cotações";

$query="UPDATE cip_nv.tbl_usuarios a, cip_nv.tbl_chamado b
SET a.situacao2 = '$situacao',
    b.idtbl_usuario_chamado='{$_COOKIE['idtbl_usuario']}',
    b.status_cip_chamado = 31,
    b.dt_distribuicao= '$data_distribuicao' 
WHERE b.id_cotacao='$id_cotacao' AND b.id_chamado='$id_chamado' AND b.status_cip_chamado NOT IN (32) AND b.setor_origem='$setor_origem' ";
	   
 //envia a consulta sql para o mysql
(!mysql_query($query,$conecta));


$query_del="DELETE FROM
cip_nv.tbl_chamado 
WHERE tbl_chamado.id_cotacao='$id_cotacao' 
AND tbl_chamado.setor_origem='$setor_origem'
AND (tbl_chamado.status_cip_chamado=31 OR tbl_chamado.status_cip_chamado=33) 
AND tbl_chamado.id_chamado <> '$id_chamado' ";

 //envia a consulta sql para o mysql
$acao_operador = mysql_query($query_del,$conecta) or die (mysql_error());



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
  
    
if($perfil!= 1 && $perfil != 13 ){
    
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



$id_swap=(int) $_GET['id_cotacao'];

$id_chamado=(int) $_GET['id_chamado'];

    $sqlp="SELECT a.cotacaopedido,
                             a.data_da_solicitacao,
                             a.hora_da_solicitacao, 
                             a.regional,
                             a.status,
                             a.data_da_tratativa_do_swap,
                             a.gerente_de_contas,
                             a.total_de_linhas,
                             a.total_de_linhas_swap,
                             a.de_aparelho_inicial,
                             a.de_qtd,
                             a.para_aparelho_final,
                             a.para_qtd,
                             a.uf,
                             a.carteira,
                             a.adabas, 
                             a.hora_da_tratativa_swap, 
                             a.login_operadores_swap,
                             b.nome,
                             b.turno,
                             a.solicitante, 
                             a.remetente,
                             d.nome_gc,
                             a.swap,
                             a.sp2,
                             e.item AS desc_sp2,
                             a.emailsolicitacao,
                             a.retornoemail,
                             a.operador_swap,
                             a.tmt,
                             a.statuscip,
                             a.revisao_swap
          FROM cip_nv.tbl_swap a 
          LEFT JOIN cip_nv.tbl_usuarios b ON b.idtbl_usuario=a.login_operadores_swap 
          LEFT JOIN cip_nv.tbl_usuarios c ON c.turno=a.turno 
          LEFT JOIN cip_nv.remetente_swap d ON d.id=a.remetente 
          LEFT JOIN cip_nv.cont_sub_motivos_swap e ON e.id=a.sp2  
          WHERE a.id_swap='$id_swap' "; 

  
    
 $result = mysql_query($sqlp,$conecta) or die (mysql_error());
 while($dado= mysql_fetch_array($result)){

     

     
     $discri_swap=$dado['desc_sp2'];
     $idsp2=$dado['sp2'];
     $idswap=$dado['swap'];
     $statuscip1=$dado['statuscip'];
     
     if($dado['turno'] == 1){
         $turnob='Diurno';
     }
     
     if($dado['turno'] == 2){
         $turnob='Intermediário'; 
     }
     if($dado['turno'] == 3){
      $turnob='Noturno';   
     }   
     
     if($dado['solicitante'] == 1){
         $solicitante='GN GUARDIÃO';
     } 
     
     if($dado['solicitante'] == 2){
         $solicitante='GERENTE';
     }     
     if($dado['solicitante'] == 3){
         $solicitante='PRIORIDADE';
     }      

     if($dado['swap'] == 1){
         $swap2='Indevido';
     }
     
     if($dado['swap'] == 2){
         $swap2='Devido'; 
     } 
     
      if($dado['statuscip'] == 1){
         $statuscip='Tratando';
     }
     
     if($dado['statuscip'] == 2){
        $statuscip='Tratado'; 
     }
     
     if($dado['statuscip'] == 3){
       $statuscip='Reprovado'; 
     }
    
     if($dado['statuscip'] == 4){
       $statuscip='Chamado TI'; 
     }
     
     
   $retornoemail= $dado['retornoemail'];
     
   $emailsolicitacao= $dado['emailsolicitacao'];  
     
?>
<br/>

<div id="filtroservico bradius">

<p align="center" class="tituloform bradius">
<font size="4" style="text-align: center;">Swap</font></p>
<div class="divformservico bradius">
<form action="principal.php?&t=controles/swap_valida_cadastro_tt_chamado.php"  method="POST">
<input type="hidden" value="0" id="conterro" />
<input type="hidden" value="<?php echo $id_swap  ?>" id="id_swap" name="id_swap" />
<input type="hidden" value="<?php echo $dado['revisao_swap'];?>" id="revisao_swap" name="revisao_swap" />
<input type="hidden" value="<?php echo $retornoemail  ?>" id="retornoemail" name="retornoemail" />
<input type="hidden" value="<?php echo $emailsolicitacao  ?>" id="emailsolicitacao" name="emailsolicitacao" />
<input type="hidden" value="<?php echo $id_chamado  ?>" id="id_chamado" name="id_chamado" />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">COTAÇÃO/PEDIDO:&nbsp;
<?php echo $dado['cotacaopedido'];  ?></label>
<label style="padding-left: 20px;">Regional:&nbsp;
<?php echo $dado['regional'];  ?>
</label>
</p><br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Carteira:&nbsp;
<select onblur="ValidaEntrada(this,'combo')" id="carteira" name="carteira" class="txt2comboboxpequeno bradius">
<option value='<?php echo $dado['carteira'];  ?>'><?php echo $dado['carteira'];  ?></option>
<option value="GOV">GOV</option>
<option value="TOP">TOP</option>
<option value="VIP">VIP</option>
<option value="ESTRATEGICO">ESTRATEGICO</option>
<option value="MASSIVO">MASSIVO</option>
<option value="VPK">VPK</option>  
</select>
</label>
<label style="padding-left: 20px;">Adabas:&nbsp;
<?php echo $dado['adabas'];  ?>  
</label>
<label style="padding-left: 20px;">Status :&nbsp;
 <select onblur="ValidaEntrada(this,'combo')" id="status" name="status" class="txt2comboboxmedio bradius" disabled="true">
                            <option value='<?php echo $dado['status'];  ?>'><?php echo $dado['status'];  ?> </option>
                                  <option value="Pré-viabilidade concluida">Pré-viabilidade concluida</option>
                                  <option value="Aberta">Aberta</option>
                                  <option value="Pendente">Pendente</option>
                              </select>    
</label></p>
<br />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Total de linhas:&nbsp;
  <input type="text" name="tllinhas" id="tllinhas" class="txt2data  bradius" value="<?php echo $dado['total_de_linhas'];  ?>"/></label>    
<label style="padding-left: 5px;">Total de linhas de swap:&nbsp;
<input type="text" name="tlswap" id="tlswap" class="txt2data  bradius" value="<?php echo $dado['total_de_linhas_swap'];  ?>" /></label>

</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data da solicitação:&nbsp;
<?php echo arrumadata($dado['data_da_solicitacao']);  ?></label>
<label style="padding-left: 5px;">Hora da solicitação:&nbsp;
<?php echo $dado['hora_da_solicitacao'];  ?></label>
<label style="padding-left: 5px;">TMT:&nbsp;
<?php echo substr($dado['tmt'],0,5);  ?> </label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data da tratativa do swap:&nbsp;
<?php echo arrumadata($dado['data_da_tratativa_do_swap']);  ?></label>
<label style="padding-left: 5px;">Hora da tratativa do swap:&nbsp;
<?php echo substr($dado['hora_da_tratativa_swap'],0,5);  ?></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label>Aparelho inicial(DE):&nbsp;</label>
<br /><br />

<label>Aparelho:&nbsp;<?php echo $dado['de_aparelho_inicial'];  ?></label>&nbsp;&nbsp;
<label>Qtd:&nbsp;<?php echo $dado['de_qtd'];?></label>

</p>


<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">

<label>Aparelho final(PARA):&nbsp;</label>
<br /><br />
<label>Aparelho:&nbsp;<?php echo $dado['para_aparelho_final'];  ?></label>&nbsp;&nbsp;
<label>Qtd:&nbsp;<?php echo $dado['para_qtd'];?></label>
</p>

<br/>

  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Operador input:&nbsp;
    <select class="txt2comboboxpadrao bradius"  name="login_operadores_swap" id="login_operadores_cont" onblur="ValidaEntrada(this,'combo');" disabled="true">
    <option value="<?php echo $dado['login_operadores_swap'];  ?>" selected="selected"><?php echo $dado['nome'];  ?></option>
    <option value="5">Não houve</option> 
     <?php
                     $sql = "SELECT * FROM cip_nv.tbl_usuarios WHERE status=1 and perfil NOT IN (4,1,13,14,19,16,17,20) ORDER BY nome ASC ";
                     $qr = mysql_query($sql,$conecta) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){

                     echo '<option value="'.$ln['idtbl_usuario'].'">'.$ln['nome'].'</option>';
                     }
                     ?>


    </select>
 
     Turno:
      <select name="turno" id="turno"  class="txt2comboboxpequeno bradius" onblur="ValidaEntrada(this,'combo');" disabled="true">
                  <option value="<?php echo $dado['turno'];  ?>" selected="selected"><?php echo $turnob;  ?></option>
                  <option value="<?php echo $turno; ?>" ><?php echo $turno; ?></option>
                     

      </select></label></p>

<br />


<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Solicitante:&nbsp;
         <select name="solicitante" id="solicitante" class="txt2comboboxpequeno bradius" disabled="true">
         <option value="<?PHP echo $dado['solicitante']; ?>"><?php echo $solicitante; ?></option>
         <option value="1">GN GUARDIÃO</option>
         <option value="2">GERENTE</option>
         <option value="3">PRIORIDADE</option>
         </select></label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Nome do solicitante:&nbsp;
    
 <select name="remetente" style="width:525" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius" disabled="true">
 <option value="<?php echo $dado['remetente']?>"><?php echo $dado['nome_gc']; ?></option>     
 <?php
   
 
        
          //seleciona a base de dados para uso
       
          $query= "SELECT * FROM cip_nv.remetente_swap ORDER BY nome_gc";
          $result = mysql_query($query,$conecta) or die (mysql_error());
          echo " <option value='0'>Selecione...</option>";
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
<select name="swap" style="width:525" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpequeno bradius" disabled="true"> 
<option value="<?php echo $idswap; ?>"><?php echo $swap2 ?></option>   
 <?php
 
 


         //seleciona a base de dados para uso
       
          $query= "SELECT * FROM cip_nv.cont_swap  ORDER BY item ";
          $result = mysql_query($query,$conecta) or die (mysql_error());
          //echo " <option value='0'>Selecione...</option>";
          while($dado= mysql_fetch_array($result)){
        echo "<option value=\"{$dado['id']}\">{$dado['item']}</option>";
            }
            
         
            ?>
</select>
    </label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Sub motivo swap:&nbsp;
<select name="sp2" id="sp2" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxgrande bradius" disabled="true">
<option value="<?php echo $idsp2;  ?>"><?php echo $discri_swap; ?></option> 
 </select></label></p>
</br> 

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius" >
  <label>Historico e-mail solicidação:<br />&nbsp;
  <textarea rows="5" onblur="ValidaEntrada(this, 'textarea')" name="emailsolicitacao" readonly="" class="txt2textarea bradius" disabled="true"><?php echo $emailsolicitacao ?></textarea>
                   
</p>
<br/>


<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius" >
  <label>Historico retorno e-mail:<br />&nbsp;
  <textarea rows="5" onblur="ValidaEntrada(this, 'textarea')" name="retornoemail" readonly="" class="txt2textarea bradius" disabled="true"><?php echo $retornoemail ?></textarea>
                   
</p>
<br/>


<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label>Status cip:&nbsp;
   <select name="statuscip" id="statuscip" class="txt2comboboxpequeno bradius" disabled="disabled">
   <option value="<?php echo $statuscip1 ?>"><?php echo $statuscip; ?></option>
   </select>  



</p>
<br />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ação:&nbsp;
<select name="substatus" id="substatus" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
   
   <?php
    //conecta no SGBD MySQL
      
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.tbl_substatus WHERE setor='chamado' ORDER BY id_status";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id_status']}\">
               {$dado['substatus']}</option>";
   }
 ?> </select></label></p>

<br />


<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Motivo da ação:&nbsp;
<select name="motivodaacao" id="motivodaacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>

   <?php 
  
    //conecta no SGBD MySQL

      
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.tbl_motivos_da_acao where setor='chamado' ORDER BY id";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
            {$dado['motivo_da_acao']}</option>";
   }
 ?> </select></label></p>

<br />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
    
 <label style="padding-left: 5px;">Observação:<br />&nbsp;<textarea  name="obs_chamado" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" ><?php echo $obs_chamado; ?></textarea></label>   
 
</p>

<br/>



 <?php } ?>
 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/form_fila_cotacao_chamado.php'"/>
 </form>

</div>

</div>

</body>
</html>

