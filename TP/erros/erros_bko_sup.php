<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../tp/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../tp/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
</head>
<body id="logar">
<?php
	if($_SESSION["erros_bko"] == 0 and $_SESSION["adm_erros"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
 
$id1 = $id;

//Pesquisa e retorna os campos declarado nas variáveis.
        include("../conexao.php");
		
		if($id1 = $id)
		{
                 $sql_pn = "select * from base_erros WHERE id ='$id1'";
		         $result = mysql_query($sql_pn,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
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
				 $comentario = $dado["comentario"];
				 $motivo_erros = $dado["motivo_erro"];
				 $linhas = $dado["linhas"];
				 $operador = $dado["operador"];
				 }
		}
		else 
		{
			echo "id diferente";
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
  
<div id="principal">

    <div id="menu">
   <?php include("../menu.php") ?>
    </div>
    
    <div id="caixa" style="height:610px;">
    
        <div id="conteudo">
        
            <p id="p_padrao">ERROS - Operador : <?php echo $_SESSION["nome"]; ?>.</p>
            
<form action="erros_update_cadastro.php" method="post">
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                        <td id="t_td">Status</td>
                        <td id="t_td">
                      	<?php echo "$status" ?>
                        </td>
                        <td id="t_td">Qtd_linhas</td>
                        <td id="t_td">
                      	<?php echo "$linhas" ?>
                        </td>
                        <td></td><td></td>
                	</tr>
                    
                    <tr>
                        <td id="t_td">Pedido</td>
                        <td id="t_td">
                      	<?php echo "$pedido" ?>
                        </td>
                        <td id="t_td">Tipo</td>
                        <td id="t_td">
                      	<?php echo "$tipo" ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">Cliente</td>
                        <td id="t_td">
                      	<?php echo "$cliente" ?>
                        </td>
                        <td id="t_td">CNPJ</td>
                        <td id="t_td">	<?php echo "$cnpj" ?></td>
                    </tr>
                    <tr>
                        <td id="t_td">Portabilidade</td>
                        <td id="t_td">
                      	<?php echo "$portabilidade" ?>
                        </td>
                        <td id="t_td">Alta</td>
                        <td id="t_td">
                      	<?php echo "$alta" ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">Troca</td>
                        <td id="t_td">
                      	<?php echo "$troca" ?>
                        </td>
                        <td id="t_td">Transferencia de Titularidade</td>
                        <td id="t_td">
                      	<?php echo "$transferencia_titularidade" ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">Status do Pedido</td>
                        <td id="t_td">
                      	<?php echo "$status_do_pedido" ?>
                        </td>
                        <td id="t_td">Revisão</td>
                        <td id="t_td">
                      	<?php echo "$revisao" ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">Regional</td>
                        <td id="t_td">
                      	<?php echo "$regional" ?>
                        </td>
                        <td id="t_td">Criado Em</td>
                        <td id="t_td">
                      	<?php echo "$criado_em" ?>
                        </td>
                    </tr>
                  <tr>
                        <td id="t_td">Ofensor</td>
                        <td id="t_td">
                        <?php
                        if($ofensor == ""){
                          echo "<span id='spryselect10'>
                          <label for='ofensor'></label>
                          <select name='ofensor' id='ofensor' class='combobox_padrao'>
                            <option value='0'>Selecione...</option>
                            <option value='Input'>Input</option>
                            <option value='BKO'>BKO</option>
                            <option value='Logística'>Logística</option>
                            <option value='Sistema'>Sistema</option>
                          </select><br>
                          <span class='selectInvalidMsg'>Selecione um item válido!</span></span>";
                          }else echo $ofensor
                          ?>
                        </td>
                        <td id="t_td">Adabas</td>
                        <td id="t_td"><span id="sprytextfield2">
                          <?php
						  if ($adabas == ""){ 
						  echo "<label for='adabas'></label>
                          <input type='text' name='adabas' id='adabas'/>
                          <span class='textfieldRequiredMsg'>Campo obrigatório.</span></span></td>";
						  }else echo $adabas
						  ?>
                    </tr>
                      <tr>
                        <td id="t_td" >Comentário</td>
                        <td colspan="3"	>
							<textarea name="comentario_antigo" readonly readonlycols="56" style="width:516"rows="3">
							<?php echo trim($comentario); ?>
				            </textarea>
                        </td>
                	</tr>
                    <tr>
                        <td id="t_td" >Novo Comentário</td>
                        <td colspan="3"><span id="sprytextfield1">
  						
 						<input type="text" style='width:516' name="comentario_novo" id="comentario_novo">
 					    <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>

                        </td>
                	</tr>
                <?php    
                echo'<tr>';
				//echo $tipo;
				if (trim($motivo_erros == "")){
					if (trim($tipo == "Erro de Serviço")){
                	echo'<td>Motivo do Erro:</td>
            		<td colspan="3"	>
               	  	<span id="spryselect2">
                    <select name="motivo" style="width:516" class="combobox_padrao_grande" id="motivo">
                    <option value="0">Selecione...</option>
					<option value="AÇÕES INCORRETAS DE SERVIÇOS<">AÇÕES INCORRETAS DE SERVIÇOS</option>
					<option value="CARGA INCOMPLETA DAS LINHAS NO VIVOCORP">CARGA INCOMPLETA DAS LINHAS NO VIVOCORP</option>
					<option value="CODIGO ADABAS INEXISTENTE EM ATLYS">CODIGO ADABAS INEXISTENTE EM ATLYS</option>
					<option value="CODIGO DO SIM CARD DIVERGENTE">CODIGO DO SIM CARD DIVERGENTE</option>
					<option value="PEDIDO APROVADO COM ENCARGOS INCOMPATIVEIS">PEDIDO APROVADO COM ENCARGOS INCOMPATIVEIS</option>
					<option value="QTDE DO PACOTE EXCEDE O LIMITE PERMITIDO EM ATLYS OU VIVOCORP">QTDE DO PACOTE EXCEDE O LIMITE PERMITIDO EM ATLYS OU VIVOCORP</option>
					<option value="SERVIÇOS CADASTRADOS INCORRETAMENTE">SERVIÇOS CADASTRADOS INCORRETAMENTE</option>
					<option value="TT NÃO EXECUTADA EM ATLYS">TT NÃO EXECUTADA EM ATLYS</option>
                    </select><br>
		            <span class="selectInvalidMsg">Campo obrigatório.</span></span>
                	</td>';
					}
					
					if ($tipo == "Linha"){
                	echo'<td>Motivo do Erro:</td>
            		<td colspan="3"	>
               	  	<span id="spryselect2">
                    <select name="motivo" style="width:516" class="combobox_padrao_grande" id="motivo">
                    <option value="0">Selecione...</option>
					<option value="AÇÕES INCORRETAS DE SERVIÇOS">AÇÕES INCORRETAS DE SERVIÇOS</option>
					<option value="CARGA INCOMPLETA DAS LINHAS NO VIVOCORP">CARGA INCOMPLETA DAS LINHAS NO VIVOCORP</option>
					<option value="CODIGO ADABAS INEXISTENTE EM ATLYS">CODIGO ADABAS INEXISTENTE EM ATLYS</option>
					<option value="CODIGO DO SIM CARD DIVERGENTE">CODIGO DO SIM CARD DIVERGENTE</option>
					<option value="NUMERO DE CSA DIVERGENTE">NUMERO DE CSA DIVERGENTE</option>
					<option value="PEDIDO APROVADO COM ENCARGOS INCOMPATIVEIS">PEDIDO APROVADO COM ENCARGOS INCOMPATIVEIS</option>
					<option value="PEDIDO APROVADO SEM SIM CARD">PEDIDO APROVADO SEM SIM CARD</option>
					<option value="QTDE DO PACOTE EXCEDE O LIMITE PERMITIDO EM ATLYS OU VIVOCORP">QTDE DO PACOTE EXCEDE O LIMITE PERMITIDO EM ATLYS OU VIVOCORP</option>
					<option value="SERVIÇOS CADASTRADOS INCORRETAMENTE">SERVIÇOS CADASTRADOS INCORRETAMENTE</option>
					<option value="SIM CARD ATRIBUIDO A OUTRA CONTA">SIM CARD ATRIBUIDO A OUTRA CONTA</option>
                    </select><br>
		            <span class="selectInvalidMsg">Campo obrigatório.</span></span>
                	</td>';
					}
					if ($tipo == "OV"){
                	echo'<td>Motivo do Erro:</td>
            		<td colspan="3"	>
               	  	<span id="spryselect2">
                    <select name="motivo" style="width:516" class="combobox_padrao_grande" id="motivo">
                    <option value="0">Selecione...</option>
					<option value="CADASTRADO MAIS DE UM EQUIPAMENTO PARA A MESMA LINHA">CADASTRADO MAIS DE UM EQUIPAMENTO PARA A MESMA LINHA</option>
					<option value="CADASTRO DO CLIENTE INCOMPLETO EM SAP">CADASTRO DO CLIENTE INCOMPLETO EM SAP</option>
					<option value="MATERIAL DA RESERVA ESTA DIVERGENTE DO PEDIDO">MATERIAL DA RESERVA ESTA DIVERGENTE DO PEDIDO</option>
					<option value="MATERIAL NÃO EXISTE NO DEPOSITO">MATERIAL NÃO EXISTE NO DEPOSITO</option>
					<option value="NÃO FOI CRIADA OV PARA TODOS EQUIPAMENTOS DO PEDIDO">NÃO FOI CRIADA OV PARA TODOS EQUIPAMENTOS DO PEDIDO</option>
					<option value="NÃO HÁ EQUIPAMENTO EM ESTOQUE">NÃO HÁ EQUIPAMENTO EM ESTOQUE</option>
					<option value="PEDIDO COM DIVERGÊNCIA NA FORMA DE PAGAMENTO">PEDIDO COM DIVERGÊNCIA NA FORMA DE PAGAMENTO</option>
					<option value="PREÇO DO MATERIAL INCOMPLETO EM SAP">PREÇO DO MATERIAL INCOMPLETO EM SAP</option>
					<option value="VALOR EQUIPAMENTO ESTA DIVERGENTE ENTRE PEDIDO E SAP">VALOR EQUIPAMENTO ESTA DIVERGENTE ENTRE PEDIDO E SAP</option>
                    </select><br>
		            <span class="selectInvalidMsg">Campo obrigatório.</span></span>
                	</td>';
					}
					if ($tipo == "Cliente Conta"){
                	echo'<td>Motivo do Erro:</td>
            		<td colspan="3"	>
               	  	<span id="spryselect2">
                    <select name="motivo" style="width:516" class="combobox_padrao_grande" id="motivo">
                    <option value="0">Selecione...</option>
					<option value="CARTEIRA INCOMPATIVEL COM O TIPO DE CONTA">CARTEIRA INCOMPATIVEL COM O TIPO DE CONTA</option>
					<option value="CLIENTE NÃO ATIVO">CLIENTE NÃO ATIVO</option>
					<option value="CNPJ POSSUI MAIS DE UM CLIENTE EM ATLYS">CNPJ POSSUI MAIS DE UM CLIENTE EM ATLYS</option>
					<option value="CONTA NÃO ATIVA">CONTA NÃO ATIVA</option>
					<option value="ENDEREÇO DIVERGENTE ENTRE VIVOCORP E SRE">ENDEREÇO DIVERGENTE ENTRE VIVOCORP E SRE</option>
					<option value="ENDEREÇO NÃO ESTA ENVIADO E ATUALIZADO NO CADASTRO DO CLIENTE">ENDEREÇO NÃO ESTA ENVIADO E ATUALIZADO NO CADASTRO DO CLIENTE</option>
                    </select><br>
		            <span class="selectInvalidMsg">Campo obrigatório.</span></span>
                	</td>';
					}
				}
				
				if($motivo_erros <> ""){
				echo '<td> Motivo do erro :</td>';
				echo '<td colspan="3">';
				echo $motivo_erros;
				echo '</td>';
				echo '<input type="hidden" id="motivo" name="motivo" value="';
				echo $motivo_erros;
				echo '">';
				}
				echo '</tr>';
				
               ?>
               			<tr>
                        <tr>
                        <td id="t_td">Operador ofensor</td>
                        <td id="t_td">
                      	<?php echo "$operador" ?>
                        </td>
                        </tr>
                        <td id="t_td">Status</td>
                        <td>
                            <select name="status_tp" class="combo_padrao" >
                            <option value="2">Pendente</option>
                            <option value="3">Corrigido</option>
                            <option value="4">Concluido Manualmente</option>
                            <option value="5">Cancelado Manualmente</option>
                            </select>
                    	</td>
                	</tr>
                    <tr>
                	<tr align="center" >
                    	<td></td>
                    	<td colspan="1">
                    	<input type="button" name="Submit2" value="Voltar" class="botao_padrao" onClick="window.location='pedidos_pendentes_sup.php'">
                 		</td>
                        <td>
                    		
                    	</td>
                        <td><?php $login = $_SESSION["login"]; $nome = $_SESSION["nome"];?></td>
                  </tr>
                  <td><input name="id1" style="visibility:hidden" type="text"  class="input" value="<?php echo "$id" ?>" maxlength="10"></td>
                </table>
              
</form>
        
        </div>
        
    </div>
    
</div>
            <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var spryselect10 = new Spry.Widget.ValidationSelect("spryselect10", {invalidValue:"0", isRequired:false, validateOn:["blur", "change"]});
            </script>
</body>
</html>