<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script type="text/javascript" src="../../tp/jquery.js"></script>

<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=motivo]").html('<option value="0">Carregando...</option>');
            $.post("../../tp/erros/processa_erros.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=motivo]").html(valor);
					 $teste=$ln['motivo'];	
				  }
                  )
         })
      })
</script>

</head>
<body id="logar">

<?php
	if($_SESSION["erros_bko"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
?>
  
<div id="principal">

    <div id="menu">
   <?php 
   //require_once("menu.php");
   include("../../tp/menu.php") ?>
    </div>
    
    <div id="caixa">
    
        <div id="conteudo">        
            <p id="p_padrao">Erros - Operador : <?php echo $_SESSION["nome"]; ?>.</p>

            <form action="erros_valida_cadastro.php" method="post">
			<table border="0" >
            <tr>
            	<td >
                Tipo de erro:
                </td>
            	<td >
                	<span id="spryselect1">
        			<label for="tipos"></label>
        			<select name="id_filtro" id="id_filtro" class="combobox_padrao">
          			<option value="0" selected="selected">Selecione...</option>
					<?php
                     include '../conexao.php';
                     $sql = "SELECT * FROM tipos_erros";
                     $qr = mysql_query($sql) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id_filtro'].'">'.$ln['tipo'].'</option>';
                     }
                     ?>
                     </select>
                    <span class="selectInvalidMsg">Campo obrigatório.</span></span>
                <br>
                </td>
                
            </tr>
			<tr>
           	  <td>Pedido:</td>
                <td><span id="sprytextfield2">
                  <label for="cliente"></label>
                  <input type="text" name="pedido" id="pedido" class="textbox_padrao">
                <span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
              <td>Adabas:</td>
                <td><span id="sprytextfield1">
                  <label for="operador"></label>
                  <input type="text" name="adabas" id="adabas"class="textbox_padrao">
                <span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
            </tr>
            
			<tr>
           	  <td>Criado em:</td>
                <td><span id="sprytextfield2">
                  <label for="cliente"></label>
              <span class="textfieldRequiredMsg">Campo obrigatório.</span><span id="sprytextfield3">
              <label for="criado_em"></label>
              <input type="text" name="criado_em" id="criado_em"class="textbox_padrao">
              <span class="textfieldRequiredMsg">Campo obrigatório.</span></span></span></td>
              <td>Revisão:</td>
                <td><span id="sprytextfield1">
                  <label for="operador"></label>
                <span class="textfieldRequiredMsg">Campo obrigatório.</span><span id="sprytextfield4">
                <label for="revisao"></label>
                <input type="text" name="revisao" id="revisao"class="textbox_padrao">
                <span class="textfieldRequiredMsg">Campo obrigatório.</span></span></span></td>
            </tr>
            
            <tr>
           	  <td>Cliente:</td>
                <td><span id="sprytextfield2">
                  <label for="cliente"></label>
              <span class="textfieldRequiredMsg">Campo obrigatório.</span><span id="sprytextfield5">
              <label for="cliente"></label>
              <input type="text" name="cliente" id="cliente"class="textbox_padrao">
              <span class="textfieldRequiredMsg">Campo obrigatório.</span></span></span></td>
              <td>Qtd linhas:</td>
                <td>
                  <label for="linhas"></label>
                  <input type="text" name="linhas" id="linhas" class="textbox_padrao">
                </td>
            </tr>
                 
            <tr>
           	  <td>Portabilidade:</td>
              <td><span id="sprytextfield2">
              <label for="cliente"></label>
              <span class="textfieldRequiredMsg">Campo obrigatório.</span><span id="spryselect3">
              <label for="portabilidade"></label>
              <select name="portabilidade" id="portabilidade" class="combobox_padrao">
                <option value="0">Selecione...</option>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
              </select>
              <span class="selectInvalidMsg">Campo obrigatório.</span><span class="selectRequiredMsg">Campo obrigatório.</span></span></span></td>
              <td>Status do Pedido:</td>
                <td><span id="sprytextfield1">
                  <label for="operador"></label>
                  <span id="spryselect4">
                  <label for="status_do_pedido"></label>
                  <select name="status_do_pedido" id="status_do_pedido" class="combobox_padrao">
                    <option value="0">Selecione...</option>
                    <option value="Backoffice aprovado">Backoffice aprovado</option>
                    <option value="Executado parcialmente">Executado parcialmente</option>
                    <option value="Logistica concluída">Logistica concluída</option>
                    <option value="Erro Criação Cliente Atlys">Erro Criação Cliente Atlys</option>
                    <option value="Erro Criação Conta Atlys">Erro Criação Conta Atlys</option>
                    <option value="Cancelado manualmente">Cancelado manualmente</option>
                    <option value="Concluído Manualmente">Concluído Manualmente</option>
                    <option value="Crédito Aprovado">Crédito Aprovado</option>
                  </select>
                <span class="selectInvalidMsg">Campo obrigatório.</span><span class="selectRequiredMsg">Campo obrigatório.</span></span>              <span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
            </tr>
            
            <tr>
           	  <td>Regional:</td>
              <td><span id="sprytextfield2">
              <label for="cliente"></label>
              <span class="textfieldRequiredMsg">Campo obrigatório.</span><span id="spryselect3">
              <label for="portabilidade"></label>
              <span class="selectRequiredMsg">Campo obrigatório.</span><span id="spryselect5">
              <label for="regional"></label>
              <select name="regional" id="regional" class="combobox_padrao">
                <option value="0">Selecione...</option>
                <option value="Sul">Sul</option>
                <option value="Norte">Norte</option>
                <option value="Leste">Leste</option>
                <option value="Nordeste">Nordeste</option>
                <option value="co">CO</option>
                <option value="MG">MG</option>
                <option value="SP">SP</option>
              </select>
              <span class="selectInvalidMsg">Campo obrigatório.</span><span class="selectRequiredMsg">Campo obrigatório.</span></span></span></span></td>
              <td>Tipo de serviço:</td>
              <td><span id="sprytextfield1">
                  <label for="operador"></label>
              <span id="spryselect4">
              <label for="status_do_pedido"></label>
              <span class="selectRequiredMsg">Campo obrigatório.</span></span><span class="textfieldRequiredMsg">Campo obrigatório.</span><span id="spryselect6">
              <label for="tipo_de_servico"></label>
              <select name="tipo_de_servico" id="tipo_de_servico" class="combobox_padrao">
                <option value="0" selected>Selecione...</option>
                <option value="Alta">Alta</option>
                <option value="Troca">Troca</option>
                <option value="Transferência de titularidade">Transferência de titularidade</option>
              </select>
              <span class="selectInvalidMsg">Campo obrigatório.</span><span class="selectRequiredMsg">Campo obrigatório.</span></span></span></td>
            </tr>
            
              <tr>
           	  <td>Ofensor:</td>
              <td><span id="sprytextfield2">
              <label for="cliente"></label>
              <span class="textfieldRequiredMsg">Campo obrigatório.</span><span id="spryselect3">
              <label for="portabilidade"></label>
              <span class="selectRequiredMsg">Campo obrigatório.</span><span id="spryselect5">
              <label for="regional"></label>
              <span id="spryselect7">
              <label for="ofensor"></label>
              <select name="ofensor" id="ofensor" class="combobox_padrao">
                <option value="0">Selecione...</option>
                <option value="Input">Input</option>
                <option value="BKO">BKO</option>
                <option value="Sistem">Sistema</option>
                <option value="Logística">Logística</option>
              </select>
              <span class="selectInvalidMsg">Campo obrigatório.</span><span class="selectRequiredMsg">Campo obrigatório.</span></span><span class="selectRequiredMsg">Campo obrigatório.</span></span></span></span></td>
              
              <td>CNPJ</td>
              <td><span id="sprytextfield8">
                <label for="cnpj"></label>
                <input type="text" name="cnpj" id="cnpj"class="textbox_padrao">
                <span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
            </tr>
            <tr>
            <td>Operador:</td>
                <td colspan="3"><select name="operador" id="operador" class="combobox_padrao_grande">
                    <option value="0">Selecione...</option>
                    
            <?php

           include "../conexao.php";

          //seleciona a base de dados para uso
         $query= "SELECT * FROM funcionarios_emp ORDER BY nome";
         $result = mysql_query($query) or die (mysql_error());
         while($dado= mysql_fetch_array($result)){
	     $func=$dado["nome"];
         echo "<option value=\"$func\">
               $func</option>";
         }
        ?> 
        </select>
        </td>
          </tr>             
            <tr>
                <td>Motivo do Erro:</td>
            	<td colspan="3"	>
               	  <span id="spryselect2">
                    <select name="motivo" class="combobox_padrao_grande" id="motivo">
                      <option value="0">Selecione...</option>
                    </select><br>
		            <span class="selectInvalidMsg">Campo obrigatório.</span></span>
                </td>
          	
            </tr>
            
            <tr>
           	  <td>Comentário:</td>
                <td colspan="3"><span id="sprytextfield7">
               <span id="sprytextfield7">
              <input type="text" name="comentario" id="comentario"class="combobox_padrao_grande"><br>
              <span class="textfieldRequiredMsg">Campo obrigatório.</span></span></span></td>
            </tr>
            

            
            <tr>
            <td></td>
            <td><input type="submit" name="enviar" id="enviar" value="Enviar"class="botao_padrao"></td>
            <td><input type="reset" name="Reset" id="button" value="Limpar" class="botao_padrao"/></td>
            <td></td>
            </tr>
            </table>    
            </form>
        
        </div>
        
    </div>
    
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {validateOn:["change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["change"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {validateOn:["change"]});

var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"0", isRequired:false, validateOn:["change"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"0", isRequired:false, validateOn:["change"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["change"], invalidValue:"0"});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["change"], invalidValue:"0"});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {validateOn:["change"], invalidValue:"0"});
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6", {validateOn:["change"], invalidValue:"0"});
var spryselect7 = new Spry.Widget.ValidationSelect("spryselect7", {validateOn:["change"], invalidValue:"0"});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {validateOn:["blur"]});
</script>
</body>
</html>