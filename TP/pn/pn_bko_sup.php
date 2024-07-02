<?php   
@session_start();

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<script src="../../tp/SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../../tp/SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../tp/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../tp/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
//Testa se o perfil está correto.

	if($_SESSION["pn_bko"] == 0 and $_SESSION["SUP_PN"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../../tp/logout.php');
			</script>
 		";
	}
	

?>
 
<?php 

//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
		
		         $sql_pn = "select * from controle_pn_bko WHERE id_pn ='$id' Order by data_inicial DESC";
		         $result = mysql_query($sql_pn,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $id                        = $dado["id_pn"];
				 $regional                  = $dado["regional"];
				 $data_inicial              = $dado["data_inicial"];
				 $numero_pedido             = $dado["numero_pedido"];
				 $revisao                   = $dado["revisao"];
				 $status_pedido             = $dado["status_pedido"];
				 $nome_cliente              = $dado["nome_cliente"];
				 $ultima_atualizacao_status = $dado["ultima_atualizacao_status"];
				 $codigo_adabas             = $dado["codigo_adabas"];
				 $cpf_cnpj_cliente          = $dado["cpf_cnpj_cliente"];
                 $canal                     = $dado["canal"];
				 $pn                        = $dado["pn"];
				 $data_janela               = $dado["data_janela"];
				 $aprovacao_pedido          = $dado["aprovacao_pedido"];
	             $ordem_manual              = $dado["ordem_manual"];
	             $pistolagem_leitura        = $dado["pistolagem_leitura"];
	             $data_tramite              = $dado["data_tramite"];
	             $status_atlys              = $dado["status_atlys"];
	             $status_spn                = $dado["status_spn"];
	             $chamado                   = $dado["chamado"];
				 $erro                      = $dado["erro"];
	             $obs_erro                  = $dado["obs_erro"];
	             $plano_acao                = $dado["plano_acao"];
	             $tratamento                = $dado["tratamento"];
				 
				 }
			
			
//////////////////////////////////////////////////////////////////////////////////////////////////////

//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$data_inicial";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("-",$data);
$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
//$datacompleta = $data;

$data_inicial2 = $data;
//$linha['visao_ilha']=$visao_ilha2;

/////////////////////////////////////////////////////////////////////////////////////////////////////

//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$data_tramite";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("-",$data);
$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
//$datacompleta = $data;

$data_tramite = $data;
//$linha['visao_ilha']=$visao_ilha2;

////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////

//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$pistolagem_leitura";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("-",$data);
$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
//$datacompleta = $data;

$pistolagem_leitura = $data;
//$linha['visao_ilha']=$visao_ilha2;

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$aprovacao_pedido";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("-",$data);
$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
//$datacompleta = $data;

$aprovacao_pedido = $data;
//$linha['visao_ilha']=$visao_ilha2;

////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////

//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$data_janela";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("-",$data);
$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
//$datacompleta = $data;

$data_janela = $data;
//$linha['visao_ilha']=$visao_ilha2;

////////////////////////////////////////////////////////////////////////////////////////////////////
 ?>

<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
   
    </div>
    
    <div id="caixa" >
    
        <div id="conteudo" >
        
            <p id="p_padrao">Portabilidade - Operador: <?php echo $_SESSION["nome"]?></p>
            
            <form action="pedidos_pn_bko_sup.php?id=<?php echo "$id"?>" method="post">
                <table id="table_conteudo"  align="center" border="0">
                   
                   <tr><td></td></tr>
                   <tr>
                   <td id="t_td" class="negrito">Regional:</td>
                   <td id="t_td"><?php echo "$regional" ?></td>
                   <td id="t_td" class="negrito">Data Inicial:</td>
                   <td id="t_td"><?php echo "$data_inicial2" ?></td>
                   </tr>
                       
                   <tr>
                   <td id="t_td" class="negrito">Pedido:</td>
                   <td id="t_td"><?php echo "$numero_pedido" ?></td>
                   <td id="t_td" class="negrito">Revisão:</td>
                   <td id="t_td"><?php echo "$revisao" ?></td>
                   </tr>
                   
                   <tr>
                   <td id="t_td" class="negrito">Status Pedido:</td>
                   <td id="t_td"><?php echo "$status_pedido" ?></td>
                   <td id="t_td" class="negrito">Cliente:</td>
                   <td id="t_td"><?php echo "$nome_cliente" ?></td>
                   </tr>
                  
                   <tr>
                   <td id="t_td" class="negrito">Ultima Atualização Status:</td>
                   <td id="t_td"><?php echo "$ultima_atualizacao_status" ?></td>
                   <td id="t_td" class="negrito">Codigo Adabas:</td>
                   <td id="t_td"><?php echo "$codigo_adabas" ?></td>
                   </tr>
                  
                   <tr>
                   <td id="t_td" class="negrito">CNPJ:</td>
                   <td id="t_td"><?php echo "$cpf_cnpj_cliente" ?></td>
                   <td id="t_td" class="negrito">Canal:</td>
                   <td id="t_td"><?php echo "$canal" ?></td>
                   </tr>
                   
                   <tr>
                   <td id="t_td" class="negrito">QTD Linhas:</td>
				   <td id="t_td"><?php echo "$pn" ?></td>
                   <td id="t_td" class="negrito">Data Janela:</td>
                   <td id="t_td"><span id="sprytextfield3" class="textbox_padrao">
                   <input name="data_janela" type="text" size="25" maxlength="10"class="textbox_padrao" value="<?php
							 if ($data_janela == "00/00/0000"){
								 echo $data_janela = '';
								  }else{
								echo $data_janela = $data_janela;
								
							      }?>" onKeyUp="Formatadata(this,event)">
                   <span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldMinCharsMsg">Iformar data válida.</span><span class="textfieldMaxCharsMsg">Excedeu o limite Informar uma data válida.</span></span>
                  </td>
                   </tr>
                   
                   <tr>
                       <td id="t_td" class="negrito">Aprovação Pedido:</td>
                        <td><span id="sprytextfield1" class="textbox_padrao">
                        <input name="aprovacao_pedido" type="text" size="25" maxlength="10"class="textbox_padrao" value="<?php
							 if ($aprovacao_pedido == "00/00/0000"){
								 echo $aprovacao_pedido = '';
								  }else{
								echo $aprovacao_pedido = $aprovacao_pedido;
								
							      }?>" onKeyUp="Formatadata(this,event)">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldMinCharsMsg">Iformar data válida.</span><span class="textfieldMaxCharsMsg">Excedeu o limite Informar uma data válida.</span></span>
                   	 </td>
                        <td id="t_td" class="negrito">Ordem Manual:</td>
                        <td><span id="sprytextfield2" class="textbox_padrao">
                    		<input name="ordem_manual" type="text" size="25" maxlength="20" class="textbox_padrao" value="<?php echo $ordem_manual ?>"> <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>
                    	</td>
                	</tr>
                	<tr>
                       <td id="t_td" class="negrito">Pistolagem/Leitura:</td>
                        <td><span id="sprytextfield4" class="textbox_padrao">
                    		<input name="pistolagem_leitura" type="text" size="25" maxlength="10" class="textbox_padrao" value="<?php
							 if ($pistolagem_leitura == "00/00/0000"){
								 echo $pistolagem_leitura = '';
								  }else{
								echo $pistolagem_leitura = $pistolagem_leitura;
								
							      }?>" onKeyUp="Formatadata(this,event)">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldMinCharsMsg">Iformar data válida.</span><span class="textfieldMaxCharsMsg">Excedeu o limite Informar uma data válida.</span></span></span>
                    	</td>
                        <td id="t_td" class="negrito">Data Tramite:</td>
                    <td><span id="sprytextfield5" class="textbox_padrao">
                    		<input name="data_tramite" type="text" size="25" maxlength="10" class="textbox_padrao" value="<?php
							 if ($data_tramite == "00/00/0000"){
								 echo $data_tramite = '';
								  }else{
								echo $data_tramite = $data_tramite;
								
							      }?>" onKeyUp="Formatadata(this,event)">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldMinCharsMsg">Iformar data válida.</span><span class="textfieldMaxCharsMsg">Excedeu o limite Informar uma data válida.</span></span>
                   	  </td>
                	</tr>
                    
                    
                      <tr>
                       <td id="t_td" class="negrito">Status Atlys:</td>
                        <td><span id="spryselect4" class="textbox_padrao">
                        <?php      if( $status_atlys <> "Ativação Futura" and  $status_atlys <> "Ativo" and  $status_atlys <> "Não Consta" ){
						             $status_atlys = "Selecione";
					                     }
										
									 ?>	 		 
                        <select name="status_atlys" class="combobox_padrao">
                            <option  value="<?php echo $status_atlys ?>"><?php echo $status_atlys ?></option>
                            <option  value="Ativação Futura">Ativação Futura</option>
                            <option  value="Ativo">Ativo</option>
                            <option  value="Não Consta">Não Consta</option>
                            </select>
                            <span class="selectRequiredMsg">Campo obrigatório.</span></span>
                    	</td>
                        <td id="t_td" class="negrito">Chamado</td>
                        <td><span id="sprytextfield9" class="textbox_padrao">
                    		<input name="chamado" type="text" size="25" maxlength="10"class="textbox_padrao" value="<?php echo $chamado ?>">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>
                    	</td>
                     
                	</tr>                                      
                
                    <tr>
                       <td id="t_td" class="negrito">Status Spn:</td>
                        <td colspan="3"><span id="spryselect3" class="textbox_padrao">
                        <?php      if( $status_spn <> "Aguardando janela" and  $status_spn <> "Aguardando habilitação" and  $status_spn <> "Aguard.hab.autorização" and  $status_spn <> "Portin negado" and  $status_spn <> "Cancelado" and  $status_spn <> "Concluído"){
						             $status_spn = "Selecione";
					                     }
										
									 ?>	 		 
                            <select name="status_spn" class="combobox_padrao_grande" >
                            <option  value="<?php echo $status_spn ?>"><?php echo $status_spn ?></option>
                            <option  value="Aguardando janela">Aguardando janela</option>
                            <option  value="Aguardando habilitação">Aguardando habilitação</option>
                            <option  value="Aguard.hab.com autorização">Aguard.hab.autorização</option>
                            <option  value="Portin negado">Portin negado</option>
                            <option  value="Cancelado">Cancelado</option>
                            <option  value="Concluído">Concluído</option>
                            </select>
                    		 <span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldMinCharsMsg">Iformar data válida.</span><span class="textfieldMaxCharsMsg">Excedeu o limite Informar uma data válida.</span></span>
                    	</td>
                        
                	</tr>
                   
                    <td id="t_td"  class="negrito">Erro</td>
                       <td colspan="3">
                       <span id="spryselect1" class="input"> 
                    <?php 
					if( $erro <> "Erro solicitação de portin" and $erro <> "Erro de pré ativação" and $erro <> "Negativa de portin" and $erro <> "Linha portada não funciona" and $erro <> "Antecipação de janela" and $erro <> "Prorrogação de janela" and $erro <> "Conclusão de status em Vivo Corp" and $erro <> "Confirmação data de janela"  and $erro <> "Cancelamento de portin" and $erro <> "Estorno de portin" and $erro <> "Erro criação ordem de venda" ){
						     $erro = "Selecione";
					                     }
										 
										 ?>
                    <select name="erro" class="combobox_padrao_grande" >
                     <option  value="<?php echo $erro ?>"><?php echo $erro ?></option>
						          
       				<?php //seleciona a base de dados para uso
					include "../../tp/conexao.php";
					
					$query= "SELECT * FROM pn_erros ORDER BY tipo";
                    $result = mysql_query($query) or die (mysql_error());
                    while($dado= mysql_fetch_array($result)){
                    echo "<option value=\"{$dado['motivo']}\">
                    {$dado['motivo']}</option>";
                    }
				
					?>
                    						
					
					
    			    </select>
                    <span class="selectRequiredMsg">Campo obrigatório.</span></span>
                  	</td>
                    </tr>
                    <tr>	
                        <td id="t_td" class="negrito">Motivo erro:</td>
                        <td colspan="3"> 
                        <span id="sprytextfield10" >
                        <input name="lancarerro" type="text" size="25" maxlength="1000000000000000000000000" class="combobox_padrao_grande"></span></td> 
                    <tr>	
                        <td id="t_td" class="negrito" >Histórico erro:</td>
                        <td colspan="3"> 
                        <span id="sprytextarea1" >
                      <textarea  name="obs_erro" readonly  cols="59" rows="5" ><?php echo $obs_erro ?></textarea></span></td>
                        
                	</tr>
                    <tr>	
                        <td id="t_td" class="negrito">Plano Ação:</td>
                        <td colspan="3"> 
                        <span id="sprytextfield11" >
                        <input name="lancarplano_acao" type="text" size="25" maxlength="1000000000000000000000000" class="combobox_padrao_grande"></span></td> 
                    <tr>
                   <tr>	
                        <td id="t_td" class="negrito">Historico plano ação:</td>
                        <td colspan="3">
                        <span id="sprytextarea2">
              <textarea name="plano_acao"  cols="59" rows="5" readonly class="combo_padrao_bancopn"><?php echo $plano_acao ?></textarea></span>
                     </td>
                   </tr>
                    
                <tr>
                                              
                  </tr>
               	  
                     <tr>
                      <td id="t_td" class="negrito">Tratamento:</td>
                      <td><span id="spryselect2" class="textbox_padrao">
                      <?php      if( $tratamento <> "Corrigido" and  $tratamento <> "Em tratamento" ){
						             $tratamento = "Selecione";
					                     }
										
									 ?>	 		 
                            <select name="tratamento" class="combobox_padrao">
                            <option  value="<?php echo $tratamento ?>"><?php echo $tratamento ?></option>
                            <option  value="Em tratamento">Em tratamento</option>
                            <option  value="Corrigido">Corrigido</option>
                            </select>
                             <span class="selectRequiredMsg">Campo obrigatório.</span></span>
                    	</td>
                        </tr>
                        <tr>
                        <td></td>
                        </tr>
                        <tr>
                        <td></td>
                      <td colspan="3">
                      <input type="button" name="Submit2" value="Voltar" class="botao_padrao" onClick="window.location='pedidos_pn_bko_sup.php'"></td>
                      <td><?php $login = $_SESSION["login"]; $nome = $_SESSION["nome"];?></td>
                  </tr> 
                
                </table>
            </form>
        
        </div>
        
    </div>
    
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none",{minChars:10, maxChars:10, validateOn:["blur", "click"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue: "Selecione",minChars:1,validateOn:["blur", "click"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue: "Selecione",minChars:1,validateOn:["blur", "click"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {invalidValue: "Selecione",minChars:1,validateOn:["blur", "click"]});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {invalidValue: "Selecione",minChars:1,validateOn:["blur", "click"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none",{minChars:0,validateOn:["blur", "click"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none",{minChars:10, maxChars:10, validateOn:["blur", "click"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none",{minChars:10, maxChars:10, validateOn:["blur", "click"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none",{minChars:10, maxChars:10, validateOn:["blur", "click"]});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none",{minChars:0,validateOn:["blur", "click"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none",{minChars:0,validateOn:["blur", "click"]});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "none",{minChars:0,validateOn:["blur", "click"]});
var sprytextarea11 = new Spry.Widget.ValidationTextarea("sprytextarea1", {minChars:0,validateOn:["blur", "click"]});
var sprytextarea12 = new Spry.Widget.ValidationTextarea("sprytextarea2", {minChars:0,validateOn:["blur", "click"]});
</script>
</body>
</html>