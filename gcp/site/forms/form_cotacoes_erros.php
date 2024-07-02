
<script>
function Mudarestado(el){
  var display = document.getElementById(el).style.display;
   
    if(display == "none")
      
    document.getElementById(el).style.display = 'block';
    else
     
    document.getElementById(el).style.display = 'none';
   
}
</script>

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

 <script language="JavaScript">   
     function b(){
     
      var i = document.f.status_tp.selectedIndex;
     // alert(document.f.portabilidade[i].text);
          
      if(i =='3'){
         $('#b').show();
               
       }else{
       $('.divsb').hide();
      
        }
      
    }


</script> 

<script language="javascript">
    function autoResize()
    {
        objTextArea = document.getElementById('txtTextArea');
        while (objTextArea.scrollHeight > objTextArea.offsetHeight)
        {
            objTextArea.rows += 1;
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
  
  
  

  
 if($perfil!= 4 && $perfil != 19){
    
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

       $sql_erros = "SELECT  a.id,     
                            a.pedido,
                            a.tipo,
                            a.cnpj,
                            a.status,
                            a.cliente,
                            a.portabilidade,
                            a.alta,
                            a.troca,
                            a.revisao,
                            a.regional,
                            a.criado_em,
                            a.status_do_pedido,
                            a.transferencia_titularidade,
                            a.ofensor,
                            a.adabas,
                            a.comentario_vivocorp,
                            a.comentario,
                            a.motivo_erro,
                            a.linhas,
                            a.criado_por,
                            a.operador,       
                            a.tipo_vivocorp,
                            a.segmento,
                            a.status_tp,
                            a.disc_status_tp,
                            a.n_chamado
                            FROM bd_erros_pn.base_erros a 
                    WHERE a.id ='$id'  ";
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
        // $motivo_erros = $dado["motivo_erro"];
         $linhas = $dado["linhas"];
         $responsavel= $dado["responsavel"];
         $criado_por= $dado["criado_por"];
         $operador = $dado["operador"];       
         $tipo_vivocorp = $dado["tipo_vivocorp"];
         $segmento      = $dado['segmento'];
         $status_tp = $dado['status_tp'];
         $disc_status_tp = $dado['disc_status_tp'];
         $n_chamado=$dado['n_chamado'];
                 
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
  
  
                 $criado_em = arrumadatahora($data_cadastro); 
  
  


?>
<br>
<div id="filtroservico_erros bradius">
<p align="center" class="tituloformerros bradius"><font size="5" style="text-align: center;">Erros</font></p>

<div class="divformservico_erros bradius">
<form name="f" action="principal.php?&t=controles/erros_update_cadastro.php"  method="POST">
<input type="hidden" value="0" id="conterro" />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Pedido:&nbsp;<?php echo $pedido; ?></label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Status:&nbsp;<?php echo $status; ?></label>
<label style="padding-left: 20px;">Qtd_linhas:&nbsp;<?php if($linhas == 0){ $linhas = ''; }else{ $linhas = $linhas; echo "$linhas";} ?></label>
<label style="padding-left: 20px;">Criado por :&nbsp;<?php echo  $criado_por; ?></label>
<label style="padding-left: 20px;">Segmento :&nbsp;<?php echo  $segmento; ?></label>

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
<label style="padding-left: 10px;">Revisão:&nbsp;<?php echo $revisao; ?></label>
<label style="padding-left: 10px;">Regional:&nbsp;<?php echo $regional; ?></label>
<label style="padding-left: 10px;">Criado Em:&nbsp;<?php echo $criado_em; ?></label>
</p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ofensor:&nbsp;
               <?php if(empty($ofensor) || empty($operador) || $operador == 'Aguardando Operador'){ 

                        $ativar=" ";
                      }else{
                        //$ativar="disabled='true'";
                        $ativar=" ";
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
                <option value="Operacional">Operacional</option>
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
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
    <label style="padding-left: 5px;">Historico solução efetuada:&nbsp;<textarea name="comentario_antigo" class="txt2textarea_erros bradius" readonly=""  ><?php echo trim($comentario); ?></textarea></label>
<input type="hidden" name="comentario_antigo" value="<?php echo trim($comentario); ?>" >
</p>
<br>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Operador ofensor:&nbsp;

<select name="operador" id="operador" class="txt2comboboxpadrao bradius"  >
<?php if(!empty($operador) || $operador != 'Aguardando Operador'){ ?>
   <option value="<?php echo $operador ?>"><?php echo $operador; ?> </option>
   <?php } ?>

                    <option value="ND">Selecione...</option>   
                    <option value="Sistemico">SISTEMICO</option>  
                    <option value="Consultor">CONSULTOR</option>
                   <option value="Operacional">OPERACIONAL</option>             
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



<!---- <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/form_fila_cotacao_erros.php'"/>
 
</form>!---->

</div>



<div class="divformservico_erros2 bradius">

<?php   

        $sql_validaerros="SELECT count(pedido) as soma FROM bd_erros_pn.base_erros_linhas_resumo 
        WHERE pedido='$pedido' AND revisao='$revisao' AND filtro='$tipo_vivocorp'  LIMIT 1";
        $result22 = mysql_query($sql_validaerros,$conecta2);
        $soma=mysql_fetch_array($result22);
        $num2=$soma['soma'];
        
        $saida = array();
        $tipo = array();
        $totalL = array();
        $motivos = array();
        if($num2 <= 0){
        $sql_erroslinhas = "CALL bd_erros_pn.LINHAS_ERROS_TOP('$pedido','$revisao','$tipo_vivocorp');";
        $result2 = mysql_query($sql_erroslinhas,$conecta2);
        $num=mysql_num_rows($result2);

        }elseif($num2 > 0 ){
        
         $sql_erroslinhas = "CALL bd_erros_pn.LINHAS_ERROS_TOP2('$pedido','$revisao','$tipo_vivocorp');";
        $result2 = mysql_query($sql_erroslinhas,$conecta2);
        $num=mysql_num_rows($result2);
        }  

        
          
               while($dado2= mysql_fetch_array($result2)){
                     $descricao= $dado2['linha'];
                     $tipo_vivocorp=$dado2['tipoerro'];
                     $total_linhas=$dado2['total_linhas']; 
                     $filtro = $dado2['filtro']; 
                     $filtro_erro = $dado2['motivo_erro'];  
                     $filtro_status=$dado2['status_erro'];
                     $filtro_disc_status=$dado2['disc_status_erro'];
                     
if(empty($descricao)){  
    
    if($filtro == 'Erro de cancelamento de numero'){
            $tp=1;
           }elseif($filtro == 'Erro ativação de serviços'){
            $tp=2;
           }elseif($filtro == 'Erro Ativação Linha Atlys'){
            $tp=3;
           }elseif($filtro == 'Erro Criação Cliente Atlys'){
            $tp=4;
            }elseif($filtro == 'Erro Criação Conta Atlys'){
            $tp=5;
            }elseif($filtro == 'Erro na troca de serviços'){
            $tp=6;
            }elseif($filtro == 'Pendente de prosseguir'){
            $tp=7; 
            }elseif($filtro == 'Erro validação linha PF/Pré'){
            $tp=8;
            }elseif($filtro == 'Erro Geração OV'){
            $tp=9;
            }elseif($filtro == 'Falha Geral de Comunicação'){
            $tp=10;
            } 
    
$tipo[$tp] = $tipo_vivocorp;
$total[$tp] = $total_linhas;
$motivos[$tp]=$filtro_erro;
$status_erro[$tp]=$filtro_status;
$disc_status_erro[$tp]=$filtro_disc_status;
   }elseif($filtro <> $tipo_vivocorp){
          

            if($filtro == 'Erro Geração OV' OR $filtro == 'Falha Geral de Comunicação'){
                  
                $desc=$descricao;
             
                
            }if($filtro <> 'Erro Geração OV' AND $filtro <> 'Falha Geral de Comunicação'){
                 
                 $desc =substr($descricao,0,12);
                  
                 
            }  
                 
            $saida[$tp].=$desc.'<br>';
        }    

          
}

      if(!empty($num > 0)){
        echo "<p><h3 align='center'>Resumo Linhas</h3></p>";
    
      }
foreach($saida as $i=>$v) {
    
       
    echo "<div style='background:#337ab7;' class='bradius'>";
    echo "<b><font color='#FFFFFF'>$tipo[$i]".'  com o total de '."$total[$i]"."</font></b>";
    echo "</div>";
    
    echo "<p bgcolor='#337ab7'>";
    echo "<button type='button' class='sb4 bradius' onclick='Mudarestado($i)'>+/-</button>";
    echo "</p>";


    echo "<div id='$i' style='background:#dad8d8; display:none' class='bradius'>";
    echo "<p style='padding-left:10px; padding-top:5px;'>$v</p>";
    echo "</br>";
    
    echo "<p style='border: #FFFFFF solid; padding: 3px 3px 3px 3px;' class='bradius'>";
    echo "<label style='padding-left: 5px;'>Motivo&nbsp;";
    echo "<select name='motivo[$tipo[$i].$i]' id='motivo' onblur='validaEntrada(this,'combo');' "
    . "class='txt2comboboxgrande bradius'>";
          if(empty($filtro_erro)){      
    echo "<option value=''>Selecione..</option>";
           }elseif(!empty($filtro_erro)){
    echo "<option value='$motivos[$i]'>$motivos[$i]</option>";
          }
    echo "



       <optgroup title='ERRO ATIVAÇÃO DE SERVIÇOS' label='ERRO ATIVAÇÃO DE SERVIÇOS'>
       <option value='ADABÁS EXPIRADO'>ADABÁS EXPIRADO</option>
       <option value='AÇÃO DOS ENCARGOS DIVERGENTES'>AÇÃO DOS ENCARGOS DIVERGENTES</option>
       <option value='CONTA INCOMPATÍVEL'>CONTA INCOMPATÍVEL</option>
       <option value='FALHA AO EXCLUIR SERVIÇO'>FALHA AO EXCLUIR SERVIÇO</option>
       <option value='FALHA DE COMUNICAÇÃO ENTRE VIVOCORP E ATLYS'>FALHA DE COMUNICAÇÃO ENTRE VIVOCORP E ATLYS</option>
       <option value='FALHA DE COMUNICAÇÃO/SERVIÇOS JÁ ATIVOS EM ATLYS'>FALHA DE COMUNICAÇÃO/SERVIÇOS JÁ ATIVOS EM ATLYS</option>
       <option value='FALHA SISTÊMICA'>FALHA SISTÊMICA</option>
       <option value='FALHA SISTÊMICA NA NEGOCIAÇÃO'>FALHA SISTÊMICA NA NEGOCIAÇÃO</option>
       <option value='NOMENCLATURA DO ENCARGO DIVERGENTE'>NOMENCLATURA DO ENCARGO DIVERGENTE</option>
       <option value='SERVIÇO CADASTRADO INCORRETAMENTE'>SERVIÇO CADASTRADO INCORRETAMENTE</option>
       </optgroup>

      <optgroup title='ERRO ATIVAÇÃO LINHA ATLYS' label='ERRO ATIVAÇÃO LINHA ATLYS'>
      <option value='ADABŚ DIVERGENTE'>ADABŚ DIVERGENTE</option>
      <option value='ADABÁS EXPIRADO'>ADABÁS EXPIRADO</option>
      <option value='AÇÃO DOS ENCARGOS DIVERGENTES'>AÇÃO DOS ENCARGOS DIVERGENTES</option>
      <option value='CADASTRO APARELHO DIVERGENTE'>CADASTRO APARELHO DIVERGENTE</option>
      <option value='CÓDIGO CSA INCORRETO'>CÓDIGO CSA INCORRETO</option>
      <option value='CONTA INCOMPATÍVEL'>CONTA INCOMPATÍVEL</option>
      <option value='ERRO NO ENDEREÇO'>ERRO NO ENDEREÇO</option>
      <option value='FALHA DE COMUNICAÇÃO/SERVIÇOS JÁ ATIVOS EM ATLYS'>FALHA DE COMUNICAÇÃO/SERVIÇOS JÁ ATIVOS EM ATLYS</option>
      <option value='FALHA NO PROCESSAMENTO DO ICCID/IMEI'>FALHA NO PROCESSAMENTO DO ICCID/IMEI</option>
      <option value='FALHA SISTÊMICA'>FALHA SISTÊMICA</option>
      <option value='FALHA SISTÊMICA NA NEGOCIAÇÃO'>FALHA SISTÊMICA NA NEGOCIAÇÃO</option>
      <option value='FALHA SISTÊMICA NO NÚMERO DE ACESSO'>FALHA SISTÊMICA NO NÚMERO DE ACESSO</option>
      <option value='NOMENCLATURA DO ENCARGO DIVERGENTE'>NOMENCLATURA DO ENCARGO DIVERGENTE</option>
      </optgroup>
      
      <optgroup title='ERRO GERAÇÃO OV' label='ERRO GERAÇÃO OV'>
      <option value='CORREÇÃO DE VALORES'>CORREÇÃO DE VALORES</option>
      <option value='ERRO NO ENDEREÇO'>ERRO NO ENDEREÇO</option>
      <option value='FALHA SISTÊMICA'>FALHA SISTÊMICA</option>
      <option value='FALTA DE ESTOQUE'>FALTA DE ESTOQUE</option>
      <option value='MATERIAL NÃO EXISTE NO DEPÓSITO/EXPANSÃO DE MATERIAL'>MATERIAL NÃO EXISTE NO DEPÓSITO/EXPANSÃO DE MATERIAL</option>
      <option value='ORÇAMENTO EXCEDIDO'>ORÇAMENTO EXCEDIDO</option>
      <option value='VALOR NEGOCIADO DIVERGENTE'>VALOR NEGOCIADO DIVERGENTE</option>
      <option value='REPROCESSAMENTO' >REPROCESSAMENTO</option>
      </optgroup>
      
      <optgroup title='ERRO NA TROCA DE SERVIÇÕS' label='ERRO NA TROCA DE SERVIÇÕS'>    
      <option value='FALHA DE COMUNICAÇÃO VIVOCORP E SAP'>FALHA DE COMUNICAÇÃO VIVOCORP E SAP</option>
      <option value='FALHA DE COMUNICAÇÃO/SERVIÇOS JÁ ATIVOS EM ATLYS'>FALHA DE COMUNICAÇÃO/SERVIÇOS JÁ ATIVOS EM ATLYS</option>
      </optgroup>
      
      <optgroup title='PENDENTE DE PROSSEGUIR' label='PENDENTE DE PROSSEGUIR'>
      <option value='FALHA SISTÊMICA'>FALHA SISTÊMICA</option>
      <option value='REPROCESSAMENTO' >REPROCESSAMENTO</option>
      </optgroup>

      <optgroup title='FALHA GERAL COMUNICAÇÃO' label='FALHA GERAL COMUNICAÇÃO'>
      <option value='FALHA SISTÊMICA'>FALHA SISTÊMICA</option>
      <option value='REPROCESSAMENTO' >REPROCESSAMENTO</option>
      </optgroup>


         </select>";
    echo "</label>";
    echo "</p>";
    echo "<br>";
    
    
    
    echo "<p style='border: #FFFFFF solid; padding: 3px 3px 3px 3px;' class='bradius'>";
    echo "<label style='padding-left: 5px;'>Solução efetuada:&nbsp;<br>";
    echo "<textarea  type='text' style='width:548px;' name='comentario_novo[$tipo[$i].$i]' id='comentario_novo' class='txt2textarea_erros2 bradius' ></textarea></label>";
    echo "</p>";
    echo "<br>";
    echo "<p style='border: #FFFFFF solid; padding: 3px 3px 3px 3px;' class='bradius'>";
    echo "<label style='padding-left: 5px;'>Status erro&nbsp;";
    echo "<select name='status_erro[$tipo[$i].$i]' class='txt2comboboxmedio bradius'>";
          if(empty($filtro_status)){      
    echo "<option value=''>Selecione..</option>";
           }elseif(!empty($filtro_status)){
                 echo "<option value='$status_erro[$i]'>$disc_status_erro[$i]</option>";
                 } 
                 echo "<option value='2'>Em Tratativa</option>";
                 echo "<option value='3'>Concluido</option>";
                 echo "<option value='4'>Chamado TI</option>";
                 echo "<option value='5'>Aguardando Comercial</option>";
                 echo "</select>";
                 echo "</label>"; 
     echo "</p>";
    
    
    
    echo "</div>";

    echo '<br>';

   
    
 } ?>


<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Status Geral&nbsp;
                           <select name="status_tp" class="txt2comboboxmedio bradius" onchange="b()">
                          <?php if(empty($status_tp)){ ?>     
                           <option value="">Selecione..</option>
                          <?php }elseif(!empty($status_tp)){ ?>
                           <option value="<?php echo $status_tp; ?>"><?php echo $disc_status_tp ?></option>
                          <?php } ?> 
                            <option value="2">Em Tratativa</option>
                            <option value="3">Concluido</option>
                            <option value="4">Chamado TI</option>
                            <option value="5">Aguardando Comercial</option>
                            </select></label>
</p> 
<br>

<div id="b" class="divsb" style="display:none"> 
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Número do chamado&nbsp;
<input type="text" name="n_chamado" id="n_chamado" class="txtmedio bradius" value="<?php echo $n_chamado ?>"/>
</label>
</p> 
</div>
<br>

<?php 
   if($num2 <= 0){
     echo "<meta http-equiv=\"refresh\" content=\"0;url=principal.php?&id=$id&t=forms/form_cotacoes_erros.php\">";
   } 
?>

 <?php } ?> 

<input name="id1" type="hidden"  class="input" value="<?php echo "$id" ?>">

<?php if($operador != 'Aguardando Operador'){ ?>
<input name="operador" type="hidden"  class="input" value="<?php echo "$operador" ?>">
<?php } ?>

<?php if(!empty($ofensor)){ ?>
<input name="ofensor" type="hidden"  class="input" value="<?php echo "$ofensor" ?>">
<?php } ?>

<?php// if(!empty($motivo_erros)){ ?>
<!-----<input name="motivo" type="hidden"  class="input" value="<?php //echo "$motivo_erros" ?>">!----->
<?php //} ?>





 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/form_fila_cotacao_erros.php'"/>
 
</form>   

    
</div>

<?php 

mysql_free_result($result,$acao_operador);
mysql_close($conecta,$conecta2);

?>
</div>
</body>
</html>

