<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="../../tp/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<title>E-GTQ - Gestão  Tramite Qualidade</title>


<script type="text/javascript" src="../../tp/jquery.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=motivo]").html('<option value="0">Carregando...</option>');
            $.post("../../tp/indireto/processa_reversao_ind.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=motivo]").html(valor);
					 $teste=$ln['motivo'];	
				  }
                  )
         })
      })
</script>
<script>
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

	if (document.dados.data_1.value=="")
	{
			alert( "Preencha o campo de data" );
			document.dados.data_1.focus();
			return false;
	}

	return true;
}

</script>

</head>
<body id="logar">

<?php
	if($_SESSION["operador_direto"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../../tp/logout.php');
			</script>
 		";
	}
?>
  <?php 

//Pesquisa e retorna os campos declarado nas variáveis. WHERE id_reversaoind ='$id'
        include("../../tp/conexao.php");
		$id1 = $id;

//Pesquisa e retorna os campos declarado nas variáveis.
        include("../conexao.php");
		
		if($id1 = $id)
		{
		         $sql_reverind = "select * from ilha_reversao_direto_bko where id_reversaoind=$id Order by criado_em DESC";
		         $result = mysql_query($sql_reverind,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $id                        = $dado["id_reversaoind"];
				 $regional                  = $dado["regional"];
     			 $codigo_adabas             = $dado["codigo_adabas"];
				 $pedido                    = $dado["pedido"];
				 $cliente                   = $dado["cliente"];				 
				 $revisao                   = $dado["revisao"];
				 $comentarios               = $dado["comentario"];
				 //$cnpj                      = $dado["cnpj"];
 				 $parecer                   = $dado["parecer"];
				 $analista_da_atividade     = $dado["analista_da_atividade"];
				 $operador                  = $dado["operador_analista"];
				 //$portabilidade              = $dado["portabilidade"];
				 //$qtd_linhas                 = $dado["qtd_linhas"];
				 $tipo_erro                  = $dado["tipo_erro"];
				 $ofensor                    = $dado["ofensor"];
				 $imputado_por_primeira      = $dado["imputado_por_primeira"];
				 $imputado_por_ultima        = $dado["imputado_por_ultima"];
				 $adabas                     = $dado["codigo_adabas"];
				 $analise                    = $dado["analise"];
				 $descricao_do_erro          = $dado["descricao_erro"];		      	
				 //$chamado                   = $dado["chamado"];
				 //$tratamento                = $dado["tratamento"];
				 $criado_em                 = $dado["criado_em"];				 
 				 $data_da_analise           = $dado["data_analise"];
				 $data_analise_tramitacao   = $dado["data_analise_tramitacao"];
				 
				 $prioridade                = $dado["prioridade"];
				 $qtd_linhas_prioridade     = $dado["qtd_linhas_prioridade"];
                 $solicitado_por_prioridade = $dado["prioridade_solicitada_por"];
				 $ofensor_reincidente       = $dado["ofensor_reincidente"];
				 $parecer_prioridade        = $dado["parecer_reincidente"];
				 }
				 }

			
$data_cadastro = explode('-', $criado_em);
$criado_em = $data_cadastro[2].'/'.$data_cadastro[1].'/'.$data_cadastro[0];	

if($data_analise_tramitacao <> ''){
	$data_cadastro = explode('-', $data_analise_tramitacao);
$data_analise_tramitacao = $data_cadastro[2].'/'.$data_cadastro[1].'/'.$data_cadastro[0];	
	}
	
if($data_da_analise !=''){
	$data_cadastro = explode('-', $data_da_analise);
$data_da_analise = $data_cadastro[2].'/'.$data_cadastro[1].'/'.$data_cadastro[0];	
	}

 ?>

<div id="principal">

    <div id="menu">
   <?php 

   //require_once("menu.php");
   include("../../tp/menu.php") ?>
    </div>
    
    <div id="caixa" style="height:460px;">
    
        <div id="conteudo">        
            <p id="p_padrao">REVERSÃO DIRETO - Operador : <?php echo $_SESSION["nome"]; ?>.</p>

            <form name="formulario" action="rever_direto_valida.php" method="post">
                
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                    <td id="t_td" >Pedido:</td>
                    <td id="t_td" ><?php echo $pedido?></td>
                    <td id="t_td" >Regional:</td>
                    <td id="t_td" ><?php echo $regional?></td>
                    </tr>
                    <tr>
                    <td id="t_td" >Criado em:</td>
                    <td id="t_td" ><?php echo $criado_em?></td>
                     <td id="t_td" >Revisão:</td>
                    <td id="t_td" ><?php echo  $revisao ?></td>
                    </tr>
                    <tr>
                    <td id="t_td">Cliente:</td>
                    <td id="t_td" colspan="3"><?php echo $cliente?></td>
                    </tr>
                    <tr>
                 
                    <td id="t_td" >Inputado primeiro por:</td>
                    <td id="t_td" >
					<?php 
					if ($imputado_por_primeira ==''){
					   echo"<span id='spryselect9'>
					   		<select name='imputado_por_primeira' class='combobox_padrao' >
					        <option value='0'>Selecione...</option>
                            <option value='GC'>GC</option>
                            <option value='input'>input</option>
					   <br><span class='selectInvalidMsg'>Selecione um status válido.</span></span>
							"; 
						}else echo "<input name='imputado_por_primeira'id='imputado_por_primeira' type='text'readonly='readonly' value='$imputado_por_primeira' class='textbox_padrao'>";
					
					?></td>
                  
                    <td id="t_td" >Inputado por ultimo por:</td>
                    <td id="t_td" >					<?php 
					if ($imputado_por_ultima ==''){
							echo"<span id='spryselect10'>
					   		<select name='imputado_por_ultima' class='combobox_padrao' >
					        <option value='0'>Selecione...</option>
                            <option value='GC'>GC</option>
                            <option value='input'>input</option>
					   <br><span class='selectInvalidMsg'>Selecione um status válido.</span></span>
							";
						}else echo "<input name='imputado_por_ultima'id='imputado_por_ultima' type='text'readonly='readonly' value='$imputado_por_ultima' class='textbox_padrao'>";
					
					?></td>

                    </tr>
                    <tr>
                    <td id="t_td">Comentários:</td>
                    <td id="t_td" colspan="3"><textarea name="comentarios" cols="56" rows="10" readonly id="comentarios"><?php echo $comentarios?></textarea></td>
                    </tr>
                    
                    <tr>
                        <td id="t_td">Tipo Erro:</td>
                        <td colspan="3">
                        <span id="spryselect2">                  
                        <?php 
						if($tipo_erro == ""){
                        echo "<select name='id_filtro' class='combobox_padrao_grande' id='id_filtro'>
                        <option value='0'>Selecione...</option>";
                       
                       include '../../tp/conexao.php';
                       $sql = "SELECT * FROM filtro_reversao_indireto_bko";
                       $qr = mysql_query($sql) or die(mysql_error());
                       while($ln = mysql_fetch_assoc($qr)){
                       echo '<option value="'.$ln['id_filtro'].'">'.$ln['tipo'].'</option>';
                       }
					   echo "</select>";
					   }else echo "<input name='id_filtro' type='text' readonly='readonly' value='$tipo_erro' class='combobox_padrao_grande' maxlength='20' id='id_filtro'>"
     	              ?>
                      
                     <span class="selectInvalidMsg">Selecione um tipo válido.</span></span>
                     </td>
                     <td></td>
                	 </tr>
                     	<tr>
                        <td id="t_td">Descrição do Erro:</td>
                        <td id="t_td" colspan="3"	>
                            <span id="spryselect6">  
                            <?php
							if ($descricao_do_erro =="" ){
                            echo "<select name='motivo'  class='combobox_padrao_grande' id='motivo' >
                            <option value='0' >Selecione...</option>
                            </select>";
							}else echo "<input name='motivo' type='text'readonly='readonly' value='$descricao_do_erro' class='combobox_padrao_grande' maxlength='20'  id='motivo'>"
							?>
                            <span class="selectInvalidMsg">Selecione um tipo válido.</span></span>
                    	</td>
                	</tr> 
                    <tr>
                    <td id="t_td">Parecer:</td>
                    <td id="t_td" colspan="3"><textarea name="parecer_antigo" cols="56" rows="3" readonly id="parecer_antigo"><?php echo $parecer ?></textarea></td>
                    </tr>
                    <tr>
                        <td id="t_td" >Novo Parecer:</td>
                        <td colspan="3"	id="t_td">
                              <textarea name="parecer_novo" id="parecer_novo" cols="56" rows="3"></textarea>
                        </td>
                	</tr> 
                    <tr>
                    <td id="t_td" >Adabas:</td>
                    <td id="t_td" >
                    <span id="sprytextfield1">
                    <?php
					if($adabas == ""){
                    echo"<input name='codigo_adabas' type='text'  class='textbox_padrao' maxlength='20'>";
					}else echo "<input name='codigo_adabas' type='text'readonly='readonly' value='$adabas' class='textbox_padrao' maxlength='20'>"
					?>
                    <span class="textfieldMaxCharsMsg">Preencher o adabás.</span></span>
                    </td>
                	    <td id="t_td">Data da Analise tramitação:</td>
                        <td><span id="sprytextfield4">
                    		<?php
                            if ($data_analise_tramitacao == ""){
							echo "<input name='data_analise_tramitacao' type='text' size='10' maxlength='10'class='textbox_padrao'onKeyUp='Formatadata(this,event)'>";
							}else echo "<input name='data_analise_tramitacao' type='text'readonly='readonly' value='$data_analise_tramitacao' class='textbox_padrao' maxlength='20'>"
                            ?>
                           <span class="textfieldMaxCharsMsg">Preencher a data.</span></span>
                    	</td>
                    </tr> 
	                 <tr>
                        <td id="t_td" >Operador</td>
						<td colspan="3"><span id="spryselect3">
                    
                    <?php
                    if  ($operador == ""){ 
					$operador = 'Selecione';                 		
					echo "<select name='operador' class='combobox_padrao_grande'>";
                    echo "<option  value=$operador>$operador</option>";
					//seleciona a base de dados para uso
					include "../../tp/conexao.php";
					$query= "SELECT * FROM funcionarios_emp ORDER BY nome";
                    $result = mysql_query($query) or die (mysql_error());
                    while($dado= mysql_fetch_array($result)){
                    echo "<option value=\"{$dado['nome']}\">
                    {$dado['nome']}</option>";
                    }
					echo "</select>";                   
					}else echo "<input name='operador' type='text'readonly='readonly' value='$operador' class='combobox_padrao_grande' maxlength='20'>"
					
					?>
                        <span class="selectInvalidMsg">Selecione um operador válido.</span></span>
                    	</td>
                        </td>
                	</tr>
                	<tr>
                        <td id="t_td">Ofensor:</td>
						<td><span id="spryselect4">
                            <?php
                            if ($ofensor == ""){
							echo"<select name='ofensor' class='combobox_padrao'>";
                            echo"<option value='0'>Selecione...</option>";
                            echo"<option value='BKO'>BKO</option>";
							echo"<option value='GC'>GC</option>";
							echo"<option value='ILHA INPUT'>ILHA INPUT</option>";
                            echo"<option value='ILHA INPUT/ GC'>ILHA INPUT / GC</option>";
							echo"<option value='ERRO SISTÊMICO'>ERRO SISTÊMICO</option>";
                            echo"<option value='CONCLUIDO PELA TRAMITACAO'>CONCLUIDO PELA TRAMITAÇÃO</option>";
                            echo"</select>";
							}else echo "<input name='ofensor' type='text'readonly='readonly' value='$ofensor' class='textbox_padrao' maxlength='20'>"
							?>
                            <span class="selectInvalidMsg">Selecione um ofensor válido.</span></span>
                    	</td>
                        <td id="t_td">Análise:</td>
                         <td colspan="3"><span id="spryselect5">
                    		<?php
							
							if ($analise == ""){
							echo"<select name='analise' class='combobox_padrao'>";
                            echo"<option value='0'>Selecione...</option>";
                            echo"<option value='Completa'>Completa</option>";
                            echo"<option value='Parcial'>Parcial</option>";
                            echo"</select>";
							}else echo "<input name='analise' type='text'readonly='readonly' value='$analise' class='textbox_padrao' maxlength='20'>"
                            ?>
                             <br><span class="selectInvalidMsg">Selecione uma analise válida.</span></span>
                    	 </td>
                       	</tr>
	               
               		
                    <tr>
                        <td id="t_td">Data da Analise_reversão:</td>
                        <td> <span id="sprytextfield3">
                    	<?php
						
                        if($data_da_analise =='' or $data_da_analise == '0000-00-00'){							
						echo "<input name='data_da_analise' type='text' size='10' maxlength='10'class='textbox_padrao' onKeyUp='Formatadata(this,event)'>";
						}else echo "<input name='data_da_analise' type='text' size='10' maxlength='10'class='textbox_padrao' value='$data_da_analise' readonly='readonly' onKeyUp='Formatadata(this,event)'>";
						?>
                        <span class="textfieldMaxCharsMsg">Preencher a data.</span></span>
               	    </td>
                    <td>Prioridade</td>
                    <td>
                    <?php
					$valida_prioridade ="";
                    if($prioridade == ""){
                    echo
                    "Não<input type='radio' name='prioridade' id='prioridade' value='nao' >
                    Sim<input type='radio' name='prioridade' id='prioridade' value='sim' >";
					$valida_prioridade ="ok";
                     }else echo "<input name='prioridade' type='text'class='textbox_padrao' value='$prioridade' readonly='readonly' >"
					 ?>
  					</td>
                    </tr>
                    
                    <tr>
                    <td >QTD Linhas</td>
                    <td>
                    <?php
					if($qtd_linhas_prioridade == "" and $valida_prioridade=="ok"){
                     echo "<input name='qtd_linhas_prioridade' type='text'class='textbox_padrao'>";
					}else echo "<input name='qtd_linhas_prioridade' type='text'class='textbox_padrao' value='$qtd_linhas_prioridade' readonly='readonly' >"
					?>
                    </td>
                    <td>Solicitado por</td>
                    <td>
                    <?php
					//echo $solicitado_por_prioridade;
					if($solicitado_por_prioridade == "" and $valida_prioridade=="ok"){
                     echo "<input name='solicitado_por_prioridade' type='text'class='textbox_padrao'>";
					}else echo "<input name='solicitado_por_prioridade' type='text'class='textbox_padrao' value='$solicitado_por_prioridade' readonly='readonly'>"
					?>
                    </td>
                    </tr>
   					
                    <tr>
                    <td >Ofensor reincidente</td>
                    <td>
                    <?php
					if($ofensor_reincidente == "" and $valida_prioridade=="ok"){
                        echo "<select name='ofensor_reincidente' class='combobox_padrao' >
                            <option value=''>Selecione...</option>
                            <option value='GC'>GC</option>
                            <option value='input'>input</option>
							<option value='BKO'>BKO</option>
                            </select>";
					}else echo "<input name='ofensor_reincidente' type='text'class='textbox_padrao' value='$ofensor_reincidente' readonly='readonly'>"		
							?>
					</td>
                    <td></td>
                    <td></td>
                    </tr>

					<tr>
                        <td id="t_td" >Parecer Prioridade:</td>
                        <td colspan="3"	id="t_td">
                        <?php
						if($prioridade == "nao"){
							$parecer_prioridade = "";
							}
                        if($parecer_prioridade == "" and $valida_prioridade=="ok"){
                        echo 
					"<textarea name='parecer_prioridade' id='parecer_prioridade' cols='56' rows='3'></textarea>";
						}else echo "<textarea name='parecer_prioridade' cols='56' rows='3' readonly id='parecer_prioridade'> $parecer_prioridade</textarea>";
						
						?>	  
                        </td>
                	</tr> 
   
                    <tr>                    
						 <td id="t_td">Status da analise:</td>
                         <td colspan="3"><span id="spryselect8">
                    	    <select name="status_analise" class="combobox_padrao" >
                            <option value="0">Selecione...</option>
                            <option value="Tratando">Pendente</option>
                            <option value="Tratado">Concluída</option>
                            </select>
                            <br><span class="selectInvalidMsg">Selecione um status válido.</span></span>
                    	 </td>
                	</tr>
                    
                    <tr>
                       <input name="id" style="visibility:hidden" type="text"  class="input" value="<?php echo "$id" ?>" maxlength="10">
                     </tr>
                    <tr>
                                        
                        <td id="t_td"></td>
                        <td>

                    	</td>
                     
                	</tr>
                
					<tr align="center" >
                    	<td></td>
                    	<td colspan="1">
                    		<input name="enviar" type="submit" value="Enviar" class="botao_padrao" >
                 		</td>
                        <td>
                    		<input name="limpar" type="reset" value="Limpar" class="botao_padrao">
                    	</td>
                        <td>
                        <input type="button" name="Submit2" value="Voltar" class="botao_padrao" onClick="javascript: history.go(-1);">
                        </td>
                	</tr>
                	</table>
                    
            </form>
        
        </div>
        
    </div>
    
</div>
<script type="text/javascript">

var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"0", isRequired:false});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {invalidValue:"Selecione", isRequired:false});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {invalidValue:"0", isRequired:false});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {invalidValue:"0", isRequired:false});
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6", {invalidValue:"0", isRequired:false});

var spryselect8 = new Spry.Widget.ValidationSelect("spryselect8", {invalidValue:"0", isRequired:false});
var spryselect9 = new Spry.Widget.ValidationSelect("spryselect9", {invalidValue:"0", isRequired:false});
var spryselect10 = new Spry.Widget.ValidationSelect("spryselect10", {invalidValue:"0", isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3","none",{minChars:5,validateOn:["blur", "onchange"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none",{minChars:5,validateOn:["blur", "onchange"]});

</script>
</body>
</html>