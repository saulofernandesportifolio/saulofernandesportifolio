
<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=motivo]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_erros.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=motivo]").html(valor);
           $teste=$ln['motivo'];  
          }
                  )
         })
      })
</script>



<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro_vivocorp]").change(function(){
            $("select[name=id_filtro]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_erros2.php", 
                  {id_filtro_vivocorp:$(this).val()},
                  function(valor){
                     $("select[name=id_filtro]").html(valor);
           $teste=$ln['id_filtro'];  
          }
                  )
         })
      })
</script>

<script>
$(function(){

	$('.hidden').hide();
  
  $('select[name=submotivos]').html($('div.produtos-f0').html());
	

	$('select[name=portabilidade]').change(function(){ 
		var id = $('select[name=portabilidade]').val();

		$('select[name=submotivos]').empty();
		
		$('select[name=submotivos]').html($('div.produtos-f' + id).html());

	});
        
	
});
</script>


<script>
   function b(){
     
      var i = document.f.portabilidade.selectedIndex;
     // alert(document.f.portabilidade[i].text);
          
      if(i == '1'){
         $('#1').show();
       }else 
       if(i == '2'){
         $('#1').show();
       }else
       if(i == '5'){
         $('#1').show();  
       }else
        if(i == '6'){
         $('#1').show();  
       }else{
         $('.divs').hide();
       }
      
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

<?php



$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("Y/m/d"); 
 

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
  
  
  

  
 if($perfil!= 4 && $perfil != 16){
    
setcookie('salva',$_COOKIE['idtbl_usuario'],time() - 28800);
setcookie('idtbl_usuario',"");
    
echo "
       <script type=\"text/javascript\">
        alert('Usu\u00e1rio inv\u00e1lido!');
        document.location.replace('index.php');
	    </script>invisible
 ";
  exit(); 
    
    
    
} 

 $sql = "SELECT CASE WHEN MAX(a.id_pn_chave) IS NULL 
             THEN 0
             ELSE MAX(a.id_pn_chave)
            END +1 as protocolo FROM bd_erros_pn.tbl_chave_pn a 
            ORDER BY a.protocolo DESC limit 1;
            ";
$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);
$linha_prot = mysql_fetch_assoc($acao);

if(empty($linha_prot['protocolo'])){
    
   $protocolo=(int) $_GET['protocolo']; 
}

?> 
<br>
<div id="filtroservico bradius">
<p align="center" class="tituloformcontestacao bradius"><font size="5" style="text-align: center;">Cadastro chave PN</font></p>

<div class="divformservicocontestacao bradius">
<form name="f" action="principal.php?&t=controles/erros_valida_cadastro_chave_pn.php"  method="POST">
<input type="hidden" value="0" id="conterro" />
<input type="hidden" value="<?php echo $linha_prot['protocolo']; ?>" name="protocolo" id="protocolo" />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Pedido:&nbsp;
<input type="text" name="pedido" id="pedido" class="txtmedio bradius"  onblur="ValidaEntrada(this,'atividade_pedido');"></label>
<label style="padding-left: 5px;">Status do Pedido:&nbsp;
 <select name="status_pedido" id="status_pedido" class="txt2comboboxpadrao bradius" onblur="ValidaEntrada(this,'combo');">
                <option value="">Selecione...</option>
                <option value="Backoffice aprovado">Backoffice aprovado</option>
                <option value="Executado parcialmente">Executado parcialmente</option>
                <option value="Aguardando Autorização PORTIN">Aguardando Autorização PORTIN</option>
                <option value="Validando PORTIN">Validando PORTIN</option>
                <option value="Erro Portabilidade">Erro Portabilidade</option>                 
              </select></label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Data da janela:&nbsp;
<input type="text" name="data_janela" id="data_janela"  maxlength="10" class="txt2data bradius" onblur="ValidaEntrada(this,'date');" onkeypress="Formatadata(this,event);" /></label>
<label style="padding-left: 5px;">Segmento:&nbsp;
 <select name="segmento" id="segmento" class="txt2comboboxpadrao bradius" onblur="ValidaEntrada(this,'combo');">
                <option value="">Selecione...</option>
                         <option value="TOP">TOP</option>
                         <option value="VPE">VPE</option>                
              </select></label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Solicitante:&nbsp;
<input type="text" name="solicitante" id="solicitante" class="txt bradius"  onblur="ValidaEntrada(this,'text');"></label>
<label style="padding-left: 5px;">Qtd linhas:&nbsp;
<input type="text" name="qtd_linhas" id="qtd_linhas" class="txt2num bradius"  onblur="ValidaEntrada(this,'int');"></label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Motivo da tratativa:&nbsp;
 <select name="portabilidade" id="portabilidade" class="txt2comboboxpadrao bradius" 
         onblur="ValidaEntrada(this,'combo');" onchange="b()">
                <option value="" selected="selected">Selecione...</option>
                <option value="1">Agendamento</option>
                <option value="2">Reagendamento</option>
                <option value="3">Cancelamento</option> 
                <option value="4">Substituição de Linha</option>
                <option value="5">Agendamento Parcial do Pedido</option>
                <option value="6">Agendamento Total do Pedido</option>
                <option value="7">Portabilidade Negada</option>
              </select>
</label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Sub motivo da tratativa:&nbsp;
	<select name='submotivos' id='submotivos' class="txt2comboboxpadrao bradius" 
         onblur="ValidaEntrada(this,'combo');" >
         
	     </select>
</label>
 
    <label id="1" class="divs" style="padding-left: 20px; display:none">
     Data da janela:&nbsp;    
     <input type="text" name="data_jan1" id="data_jan1" maxlength="10" 
     class="txt2data bradius" onblur="ValidaEntrada(this,'date');" 
     onkeypress="Formatadata(this,event);" /> 
   </label>   
    
</p>
<br/>

       <div class="hidden produtos-f0">
       <option value="">Selecione...</option>     
	</div>
       
       <div class="hidden produtos-f1">
       <option value="">Selecione...</option>     
       <option value="Antencipação">Antencipação</option>
       <option value="Prorrogação">Prorrogação</option>
 
	</div>
       

	<div class="hidden produtos-f2">
       <option value="">Selecione...</option>     
       <option value="Prorrogação">Prorrogação</option>
       <option value="Antencipação">Antencipação</option>
	</div>

     

       <div class="hidden produtos-f3">
       <option value="Sem submotivo para este item">Sem submotivo para este item</option>
       </div>

       <div class="hidden produtos-f4">
       <option value="Sem submotivo para este item">Sem submotivo para este item</option>
       </div>

       <div class="hidden produtos-f5">
       <option value="Sem submotivo para este item">Sem submotivo para este item</option>
       </div>


       <div class="hidden produtos-f6">
       <option value="Sem submotivo para este item">Sem submotivo para este item</option>
       </div>
     

	<div class="hidden produtos-f7">
           <option value="">Selecione...</option>    
	 <option value="Incidente">Incidente</option>
         <option value="Cancelamento">Cancelamento</option>

	</div>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label><input name="cadastrarlinhapn" type="button" value="Cadastro de linhas clik aqui" onclick="javascript:abrircadap('site/forms/form_cadastro_linhas_pn.php?perfil=<?php echo $perfil; ?>&protocolo=<?php echo $linha_prot['protocolo']; ?>');" ></label>
</p><br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">E-mail solicitante:&nbsp;<br> 
<textarea type="text" name="emailsolicitante" id="emailsolicitante" class="txt2textarea bradius" onblur="ValidaEntrada(this,'textarea');"></textarea>
</label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">E-mail de retorno:&nbsp;<br> 
<textarea type="text" name="emailretorno" id="emailretorno" class="txt2textarea bradius" onblur="ValidaEntrada(this,'textarea');"></textarea>
</label>
</p>
<br/>



<?php 

mysql_free_result($acao_operador,$qr,$result);
mysql_close($conecta,$conecta2);



?>

 

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/form_fila_cotacao_chave_pn.php'"/>
 
</form>

</div>

</div>

</body>
</html>

