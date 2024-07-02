<?php   
@session_start();
include '../funcoes.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>

<script type="text/javascript" src="../../tp/jquery.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=motivo]").html('<option value="0">Carregando...</option>');
            $.post("../../tp/diretoria/processa_reversao_ind.php", 
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

	if($_SESSION["diretoria_input"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../../tp/logout.php');
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
	    <div id="caixa" style="height:460px;">
            <div id="conteudo">        
            <p id="p_padrao">Diretoria - Operador : <?php echo $_SESSION["nome"]; ?>.</p>

            <form name="formulario" action="diretoria_valida_cadastro.php" method="post">
                
              <table id="table_conteudo"  align="center" border="0">
               		
                    <tr>
                        <td id="t_td" >Pedido/Atividade</td>
                        <td id="t_td" ><span id="sprytextfield1">
                        <input type="text" name="pedido" id="pedido"class='textbox_padrao'>
                        <span class="textfieldRequiredMsg">Campo obrigatório.</span></td>
                        
                        <td id="t_td" >Data Cadastro</td>
                      <td id="t_td" ><span id="sprytextfield5">
                      <input name='data_cadastro' type='text' onKeyUp='Formatadata(this,event)'class='textbox_padrao' maxlength="10"><br><span class="textfieldRequiredMsg">Campo obrigatório.</span></td>
                    </tr>
                    
                    <tr>
                        <td id="t_td" >Hora Cadastro</td>
                      <td id="t_td" ><span id="sprytextfield6">
                      <input name='hora_cadastro' maxlength="5" onKeyUp='Formatahora(this,event)' class='textbox_padrao'><br><span class="textfieldRequiredMsg">Campo obrigatório.</span></td>
                      
                      
                      <td id="t_td" >Ofensor</td>
                        <td id="t_td" ><span id="spryselect1">
                          <select name="ofensor" id="ofensor" class="textbox_padrao">
                            <option value="ND">Selecione...</option>
                            <option value="GN GUARDIÃO">GN GUARDIÃO</option>
                            <option value="ILHA DE INPUT">ILHA DE INPUT</option>
                          </select><br>
                      <span class="selectInvalidMsg">Campo obrigatório.</span></td>
                    </tr>
                    
                    <tr>
                        <td id="t_td" >Comentário:</td>
                        <td colspan="3"	id="t_td">
                          <span id="sprytextarea1">
                          
                          <textarea name="comentario" id="comentario" cols="63" rows="3"></textarea>
                      <span class="textareaRequiredMsg">Campo obrigatório.</span></td>
                	</tr> 
                    <tr>
                        <td id="t_td" >Operador</td>
						<td colspan="3">
                    
                    <?php
              		
					echo "<select name='operador' style='width:525'>";
                    
					//seleciona a base de dados para uso
					include "../../tp/conexao.php";
					$query= "SELECT * FROM funcionarios_input where filtro IS NULL ORDER BY nome";
                    $result = mysql_query($query) or die (mysql_error());
                    echo " <option value='0'>Selecione...</option>";
					while($dado= mysql_fetch_array($result)){
                    echo "
					<option value=\"{$dado['nome']}\">
                    {$dado['nome']}</option>";
                    }
					?>
                    </td>
                	</tr>
                    <tr>
                        <td id="t_td" >Tipo do erro</td>
						<td colspan="3"><span id="spryselect3">
                        <?php 

                        echo "<select name='id_filtro' style='width:525' id='id_filtro'>
                        <option value='0'>Selecione...</option>";
                       
                       include '../../tp/conexao.php';
                       $sql = "SELECT * FROM tipos_erros_diretoria order by motivo";
                       $qr = mysql_query($sql) or die(mysql_error());
                       while($ln = mysql_fetch_assoc($qr)){
                       echo '<option value="'.$ln['id_filtro'].'">'.$ln['motivo'].'</option>';
                       }
					   echo "</select>";
					  
     	              ?><br><span class="selectInvalidMsg">Selecione um operador válido.</span>
                    	</td>
                        </td>
                	</tr>
                    
                    <tr>
                        <td id="t_td" >Descrição erro</td>
						<td colspan="3">
						<span id="spryselect4">
						<?php
                            echo "<select name='motivo'   style='width:525' id='motivo' >
                            <option value='0' >Selecione...</option>
                            </select>";
							
						?><br><span class="selectInvalidMsg">Selecione um operador válido.</span>
                    	</td>
                        </td>
                	</tr>
                    
                    <tr>
                        <td id="t_td" >Remetente</td>
						<td id="t_td" colspan="3"><span id="sprytextfield2">
						
						                     <?php
              		
					echo "<select name='remetente' style='width:525'>";
                    
					//seleciona a base de dados para uso
					include "../../tp/conexao.php";
					$query= "SELECT * FROM remetente_diretoria ORDER BY nome";
                    $result = mysql_query($query) or die (mysql_error());
                    echo " <option value='0'>Selecione...</option>";
					while($dado= mysql_fetch_array($result)){
                    echo "
					<option value=\"{$dado['nome']}\">
                    {$dado['nome']}</option>";
                    }
					?>
					    <span class="textfieldRequiredMsg"><br>Campo obrigatório.</span></span>
                    </td>
                    </tr>
                    <tr> 
                     <td id="t_td" >Diretoria</td>
						<td id="t_td" ><span id="spryselect5">
						  <label for="diretoria"></label>
                          <select name="diretoria" id="diretoria" class="combobox_padrao">
                            <option value="0">Selecione...</option>
                            <option value="Diretoria 1">Diretoria 1</option>
                            <option value="Diretoria 2">Diretoria 2</option>
                            <option value="Diretoria 3">Diretoria 3</option>
                            <option value="Soluções">Soluções</option>
                          </select>
                          <span class="selectInvalidMsg"><br>Campo obrigatório.</span></span></td>
                	</tr>
                   <tr>
                   <td><br></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   
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
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {isRequired:false, invalidValue:"ND"});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {isRequired:false, invalidValue:"0"});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {isRequired:false, invalidValue:"0"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {invalidValue:"0", isRequired:false});
</script>
</body>
</html>