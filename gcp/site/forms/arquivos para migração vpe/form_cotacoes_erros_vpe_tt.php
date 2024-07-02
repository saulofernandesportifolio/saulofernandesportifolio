<script>

<!-- Função para Habilitar campos ocultos -->

function HabCampos() 
{
	  if (document.getElementById('1').checked) 
	  {
		document.getElementById('campos2').style.display = "none";
		document.getElementById('campos').style.display = "";
		document.getElementById('selectfield').focus();
	  }
	   else 
	  {
		
		document.getElementById('campos').style.display = "none";
	  }
	  
	   if (document.getElementById('2').checked) 
	  {
		//document.getElementById('campos').style.display = "none";
		document.getElementById('campos2').style.display = "";
		document.getElementById('selectfield').focus();
	  }
	   else 
	  { 
		
		document.getElementById('campos2').style.display = "none";
		
	  }
	
 
	
}


<!-- Marcara para Datas -->

function Formatadata(Campo, teclapres)
			{
				var tecla = teclapres.keyCode;
				var vr = new String(Campo.value);
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				tam = vr.length + 1;
				if (tecla != 8 && tecla != 8)
				{
					if (tam > 0 && tam < 2)
						Campo.value = vr.substr(0, 2) ;
					if (tam > 2 && tam < 4)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
					if (tam > 4 && tam < 7)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
				}
			}

<!-- Função valida campos vazios -->

function enviardados()
{

	if (document.dados.data_assinaturacontrato.value=="")
	{
			alert( "Preencha o campo de data" );
			document.dados.data_assinaturacontrato.focus();
			return false;
	}

	return true;
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
  
  
  

  
 if($perfil!= 4 && $perfil != 17){
    
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

      $sql_erros = "SELECT * FROM  bd_erros_pn.base_erros_top_tt WHERE id ='$id'";
      $result = mysql_query($sql_erros,$conecta2);
      while($dado= mysql_fetch_array($result))
             {
         $id     = $dado['id'];     
         $pedido = $dado["pedido"];
         $tipo= $dado["tipo"];
         $cnpj= $dado["cnpj"];
         $status = $dado["status"];
         $cliente = $dado["cliente"];
         $portabilidade = $dado["portabilidade"];
         $alta = $dado["alta"];
         $troca = $dado["troca"];
         $revisao = $dado["revisao"];
         $regional = $dado["regional"];
         $data_cadastro = $dado["criado_em"];
         $status_do_pedido = $dado["status_do_pedido"];
         $transferencia_titularidade = $dado["transferencia_titularidade"];
         $ofensor = $dado["ofensor"];
         $adabas = $dado["adabas"];
         $comentario_vivocorp = $dado["comentario_vivocorp"];
         $comentario = $dado["comentario"];
         $motivo_erros = $dado["motivo_erro"];
         $linhas = $dado["linhas"];
         $responsavel= $dado["responsavel"];
         $criado_por= $dado["criado_por"];
         $operador = $dado["operador"];       
         $tipo_vivocorp = $dado["tipo_vivocorp"];
         $nome_do_gestor = $dado["nome_do_gestor"];

if($tipo == 'Erro de Serviço'){

  $tipo='Serviços';
}
if($tipo == 'Cliente Conta'){

  $tipo='Cliente';
}

        
    
  if($portabilidade =='N'){
    $portabilidade = 'Não';
  }else $portabilidade = 'Sim';
  if($alta =='N'){
    $alta = 'Não';
  }else $alta = 'Sim';
  
  if($troca =='N'){
    $troca = 'Não';
  }else if ($troca == 'Y'){
    $troca = 'Sim';
  }
  if($transferencia_titularidade =='N'){
    $transferencia_titularidade = 'Não';
  }else $transferencia_titularidade = 'Sim';
  
  $data_cadastro = explode('-', $data_cadastro);
  $criado_em = $data_cadastro[2].'/'.$data_cadastro[1].'/'.$data_cadastro[0]; 

?>
<br>
<div id="filtroservico bradius">
<p align="center" class="tituloform bradius"><font size="5" style="text-align: center;">Erros</font></p>

<div class="divformservico bradius">
<form action="principal.php?&t=controles/erros_update_cadastro_top_tt.php"  method="POST">
<input type="hidden" value="0" id="conterro" />



<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Pedido:&nbsp;<?php echo $pedido; ?></label>
<label style="padding-left: 20px;">Tipo:&nbsp;<?php echo $tipo; ?></label>
<label style="padding-left: 15px;">Tipo Vivocorp:&nbsp;<?php echo $tipo_vivocorp; ?></label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Status:&nbsp;<?php echo $status; ?></label>
<label style="padding-left: 20px;">Qtd_linhas:&nbsp;<?php if($linhas == 0){ $linhas = ''; }else{ $linhas = $linhas; echo "$linhas";} ?></label>
<label style="padding-left: 20px;">Criado por :&nbsp;<?php echo  $criado_por; ?></label>
<label style="padding-left: 20px;">Nome do Gestor:&nbsp;<?php echo  substr($nome_do_gestor,0,10); ?></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cliente:&nbsp;<?php echo  $cliente; ?></label>
<label style="padding-left: 20px;">CNPJ:&nbsp;<?php echo  $cnpj; ?></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Portabilidade:&nbsp;<?php echo $portabilidade; ?></label>
<label style="padding-left: 20px;">Alta:&nbsp;<?php echo $alta; ?></label>
<label style="padding-left: 20px;">Troca:&nbsp;<?php echo $troca; ?></label>
<label style="padding-left: 20px;">Transferencia de Titularidade:&nbsp;<?php echo $transferencia_titularidade; ?></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Status do Pedido:&nbsp;<?php echo $status_do_pedido; ?></label>
<label style="padding-left: 20px;">Revisão:&nbsp;<?php echo $revisao; ?></label>
<label style="padding-left: 20px;">Regional:&nbsp;<?php echo $regional; ?></label>
<label style="padding-left: 20px;">Criado Em:&nbsp;<?php echo $criado_em; ?></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ofensor:&nbsp;
               <?php if(empty($ofensor) || empty($operador) || $operador == 'Aguardando Operador'){ 

                        $ativar=" ";
                      }else{
                        $ativar="disabled='true'";
                      }
               

               echo "<select name='ofensor' id='ofensor' class='txt2comboboxpequenino bradius' $ativar >";

               ?>
               <?php if(!empty($ofensor)){ ?>
                <option value="<?php echo $ofensor ?>"><?php echo "$ofensor" ?></option>
                 <?php }elseif(empty($ofensor)){ ?>
                <option value="0">Selecione...</option>
               <?php } ?>
                <option value="Input">Input</option>
                <option value="BKO">BKO</option>
                <option value="Sistema">Sistema</option>
                <option value="Logística">Logística</option>
                <option value="Consultoria">Consultoria</option>
              </select>
                         </label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Adabas:&nbsp;<?php  if (strlen($adabas) < 4 ){ 
              echo "<input type='text' name='adabas' id='adabas' class='txtpequeno2 bradius'/>";
              }else echo "<input name='adabas' type='text' readonly='readonly' value='$adabas'  maxlength='20' id='id_filtro' class='txtpequeno2 bradius'>"
              ?></label>
</p>
<br />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Comentário_vivocorp:&nbsp;<textarea name="comentario_antigo" class="txt2textarea bradius" disabled="true">  <?php echo trim($comentario_vivocorp); ?> </textarea></label>
</p>
<br/>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Historico comentários operador:&nbsp;<textarea name="comentario_antigo" class="txt2textarea bradius" disabled="true">  <?php echo trim($comentario); ?> </textarea></label>
</p>

<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">
Novo comentário:&nbsp;<input type="text" style='width:516' name="comentario_novo" id="comentario_novo" class="txtextragrande bradius"></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Motivo do Erro:&nbsp;
 <?php if(empty($motivo_erros)){ ?>
<select name="motivo" id="motivo" onblur="validaEntrada(this,'combo');" class="txt2comboboxgrande bradius">
 
   <option value="">Selecione....</option>
   <?php
      
  //seleciona a base de dados para uso
  $query= "SELECT * FROM bd_erros_pn.filtro_erros WHERE descricao='$tipo' ORDER BY tipo";
   $result= mysql_query($query,$conecta2);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['motivo']}\">
               {$dado['motivo']}</option>";
   }
 ?> </select>
<?php }elseif(!empty($motivo_erros)){ ?> 

      <select class="txt2comboboxpadrao bradius"  name="motivo" id="motivo" disabled="true">
      <option value="<?php echo $motivo_erros ?>"><?php echo $motivo_erros ?> </option>
      </select>

<?php } ?>

 </label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Operador ofensor:&nbsp;


<select name="operador" id="operador" class="txt2comboboxpadrao bradius" <?php echo "$ativar"; ?> >
<?php if(!empty($operador) || $operador != 'Aguardando Operador'){ ?>
   <option value="<?php echo $operador ?>"><?php echo $operador; ?> </option>
   <?php } ?>

                    <option value="ND">Selecione...</option>   
                    <option value="Sistemico">SISTEMICO</option>                 
            <?php

          //seleciona a base de dados para uso
         $query= "SELECT * FROM cip_nv.tbl_usuarios ORDER BY nome";
         $result = mysql_query($query,$conecta) or die (mysql_error());
         while($dado= mysql_fetch_array($result)){
       $func=$dado["nome"];
         echo "<option value=\"$func\">
               $func</option>";
         }
        ?> 
     
        </select>

</label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Status&nbsp;
                           <select name="status_tp" class="txt2comboboxpequenino bradius" >
                           <option value="">Selecione...</option>
                            <option value="2">Em Tratativa</option>
                            <option value="3">Concluido</option>
                            <option value="4">Chamado TI</option>
                            <option value="5">Aguardando Comercial</option>
                            <option value="6">Aguadando CR</option>
                            </select></label>
</p>                            

<?php } ?>

<br/>

<input name="id1" type="hidden"  class="input" value="<?php echo "$id" ?>">

<?php if($operador != 'Aguardando Operador'){ ?>
<input name="operador" type="hidden"  class="input" value="<?php echo "$operador" ?>">
<?php } ?>

<?php if(!empty($ofensor)){ ?>
<input name="ofensor" type="hidden"  class="input" value="<?php echo "$ofensor" ?>">
<?php } ?>


<?php if(!empty($motivo_erros)){ ?>
<input name="motivo" type="hidden"  class="input" value="<?php echo "$motivo_erros" ?>">
<?php } ?>




<?php 

mysql_free_result($result,$acao_operador);
mysql_close($conecta,$conecta2);

?>

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/form_fila_cotacao_erros_top_tt.php'"/>
 
</form>

</div>

</div>

</body>
</html>

