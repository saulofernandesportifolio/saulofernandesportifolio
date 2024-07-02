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
	if($_SESSION["reversao_ind_bko"] == 0){  
    	
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
		         $sql_reverind = "select * from ilha_reversao_indireto_bko where id_reversaoind=$id Order by criado_em DESC";
		         $result = mysql_query($sql_reverind,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $id                        = $dado["id_reversaoind"];
				 $regional                  = $dado["regional"];
				 $criado_em                 = $dado["criado_em"];
				 $codigo_adabas             = $dado["codigo_adabas"];
				 $pedido                    = $dado["pedido"];
				 $cliente                   = $dado["cliente"];				 
				 $revisao                   = $dado["revisao"];
				 $comentarios               = $dado["comentarios"];
				 $data_analise              = $dado["data_analise"];
				 $parecer                   = $dado["parecer"];
				// $criado_por                = $dado["criado_por"];
				 $analista_da_atividade     = $dado["analista_da_atividade"];
				 $operador                  = $dado["operador"];
				 $data_da_analise_reversao  = $dado["data_analise_reversao"];
				 $data_da_analise_tramitacao = $dado["data_analise"];
				 $tipo_servico               = $dado["tipo_servico"];
				 $qtd_linhas                 = $dado["qtd_linhas"];
				 $tipo_erro                  = $dado["tipo_erro"];
				 $ofensor                    = $dado["ofensor"];
				 $adabas                     = $dado["codigo_adabas"];
				 $analise                    = $dado["analise"];
				 $descricao_do_erro          = $dado["descricao_do_erro"];
				 $prioridade                 = $dado["prioridade"];		
				 $qtd_linhas_prioridade      = $dado["qtd_linhas_prioridade"];	
				 $solicitado_por_prioridade  = $dado["solicitado_por_prioridade"];		      	
				 //$chamado                   = $dado["chamado"];
				 //$tratamento                = $dado["tratamento"];
				 }
				 }
	
if ($data_da_analise_tramitacao <> 0){				 
//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$data_da_analise_tramitacao";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("-",$data);
$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
//$datacompleta = $data;

$data_da_analise_tramitacao = $data;
}
else
{
$data_da_analise_tramitacao = " ";

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				 
if ($data_da_analise_reversao <> 0){   
$data_americano2 = "$data_da_analise_reversao";
$partes_da_data2 = explode(" ",$data_americano2);
$data2="$partes_da_data2[0]";
$datatransf2= explode("-",$data2);
$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
$data_da_analise_reversao = $data2;
}
else
{
$data_da_analise_reversao = "";
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				 
$data1 = $data_da_analise_tramitacao;
$datacad1=$data1;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$data2 = $data_da_analise_reversao;
$datacad2=$data2;
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sla = $datacad1 - $datacad2;

//echo "Esta é a data analise $datacad1";
//echo "<br>";
//echo "Esta é a data criado em $datacad2";
//echo "<br>";
//echo $sla;
//echo "<br>";

if ($criado_em <> 0){   
$data_americano2 = "$criado_em";
$partes_da_data2 = explode(" ",$data_americano2);
$data2="$partes_da_data2[0]";
$datatransf2= explode("-",$data2);
$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
$criado_em = $data2;
}
else
{
$criado_em = "";
}



if ($sla >=3){
	$tempo_sla= "<font color='#FF0000'><b>$sla</b></font>";
}
else{
	$tempo_sla = $sla;
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
            <p id="p_padrao">REVERSÃO INDIRETO - Operador : <?php echo $_SESSION["nome"]; ?>.</p>

            <form action="rever_ind_valida.php" method="post">
                
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
                    <td id="t_td">Comentários:</td>
                    <td id="t_td" colspan="3"><textarea name="comentarios" cols="56" rows="10" readonly id="comentarios"><?php echo $comentarios?></textarea></td>
                    </tr>
                    <tr>
                    	<td id="t_td">Tipo Serviço:</td>	
                    	<td><span id='spryselect1'>
                    		<?php 
							if($tipo_servico == ""){
                            echo "
							<select name='tipo_servico'>
                            <option value='0'>Selecione</option>
                            <option value='ALTA'>ALTA</option>
                            <option value='TA'>TA</option>
                            <option value='PN'>PN</option>
                            <option value='MP'>MP</option>
                            <option value='TT'>TT</option>
                            <option value='PP'>PP</option>
                            <option value='SERVIÇOS'>SERVIÇOS</option>
                            </select>";
							}else echo "<input name='tipo_servico' readonly='readonly' type='text' value='$tipo_servico' class='textbox_padrao' maxlength='20'>";
							
							?>
							<br>
							<span class='selectInvalidMsg'>Selecione o tipo de serviço.</span></span>
                    		</td>
                         <td id="t_td">QTD Linhas:</td>	
                    	<td id="t_td"><span id="sprytextfield2">
                    		<?php
							if ($qtd_linhas == ""){
                            echo "<input name='qtd_linhas' type='text'  class='textbox_padrao' maxlength='20'>";
							}else echo "<input name='qtd_linhas' type='text'readonly='readonly' value='$qtd_linhas' class='textbox_padrao' maxlength='20'>"
                            ?>
                            <span class="textfieldMaxCharsMsg">Preencher a qtd linhas.</span></span>
                    	</td>
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
					   }else echo "<input name='id_filtro' type='text' readonly='readonly' value='$tipo_erro' class='combobox_padrao_grande'  id='id_filtro'>"
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
							}else echo "<input name='motivo' type='text'readonly='readonly' value='$descricao_do_erro' class='combobox_padrao_grande'   id='motivo'>"
							?>
                            <span class="selectInvalidMsg">Selecione um tipo válido.</span></span>
                    	</td>
                	</tr> 
                    <tr>
                    <td id="t_td">Parecer:</td>
                    <td id="t_td" colspan="3"><textarea name="parecer_antigo" cols="56" rows="3" readonly id="parecer_antigo"> <?php echo $parecer?></textarea></td>
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
                          if ($data_da_analise_tramitacao == "" or $data_da_analise_tramitacao == 0000-00-00){
							echo "<input name='data_da_analise_tramitacao' type='text' size='10' maxlength='10'class='textbox_padrao'onKeyUp='Formatadata(this,event)'>";
							}else echo "<input name='data_da_analise_tramitacao' type='text'readonly='readonly' value='$data_da_analise_tramitacao' class='textbox_padrao' maxlength='20'>"
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
                            echo"<option value='parceiro'>Parceiro</option>";
                            echo"<option value='Concluido pela tramitacao'>Concluído pela tramitação</option>";
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
                    <td id="t_td">Data da Analise reversão:</td>
                    <td> <span id="sprytextfield3">
                    	
						<?php
						if($data_da_analise_reversao =="" or $data_da_analise_reversao == 0000-00-00){							
						echo "<input name='data_da_analise_reversao' type='text' size='10' maxlength='10'class='textbox_padrao' onKeyUp='Formatadata(this,event)'>";
						}else echo "<input name='data_da_analise_reversao' type='text' size='10' maxlength='10'class='textbox_padrao' value='$data_da_analise_reversao'readonly='readonly' onKeyUp='Formatadata(this,event)'>";
						?>
                        <span class="textfieldMaxCharsMsg">Preencher a data.</span></span>
               	    </td>

						 <td id="t_td">Prioridade:</td>
                         <td >
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
					</tr>
                    <tr>
                        <td id="t_td">QTD linhas (prioridade):</td>
                        <td>
                    <?php
					if($qtd_linhas_prioridade == "" and $valida_prioridade=="ok"){
                     echo "<input name='qtd_linhas_prioridade' type='text'class='textbox_padrao'>";
					}else echo "<input name='qtd_linhas_prioridade' type='text'class='textbox_padrao' value='$qtd_linhas_prioridade' readonly='readonly' >"
					?>
                        </td>
						 <td id="t_td">Solicitado por (prioridade):</td>
                         <td >
                    <?php
					if($solicitado_por_prioridade == "" and $valida_prioridade=="ok"){
                     echo "<input name='solicitado_por_prioridade' type='text'class='textbox_padrao'>";
					}else echo "<input name='solicitado_por_prioridade' type='text'class='textbox_padrao' value='$solicitado_por_prioridade' readonly='readonly'>"
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
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"0", isRequired:false});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"0", isRequired:false});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {invalidValue:"Selecione", isRequired:false});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {invalidValue:"0", isRequired:false});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {invalidValue:"0", isRequired:false});
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6", {invalidValue:"0", isRequired:false});
var spryselect8 = new Spry.Widget.ValidationSelect("spryselect8", {invalidValue:"0", isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3","none",{minChars:5,validateOn:["blur", "onchange"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none",{minChars:5,validateOn:["blur", "onchange"]});

</script>
</body>
</html>