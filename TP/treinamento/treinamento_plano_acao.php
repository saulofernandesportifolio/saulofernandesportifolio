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

	if($_SESSION["treinamento"] == 0){  
    	
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
            <p id="p_padrao">Treinamento - Operador : <?php echo $_SESSION["nome"]; ?>.</p>

              <form name="formulario" action="treinamento_valida_cadastro_plano_acao.php" method="post">
                
              <table id="table_conteudo"  align="center" border="0">
               		
                    <tr>
                        <td id="t_td">Ilha/BKO</td>
                        <td id="t_td"><span id="spryselect1">
                          <label for="ilha_bko"></label>
                          <select name="ilha_bko" id="ilha_bko"class="combobox_padrao">
                            <option value="0">Selecione...</option>
                            <option value="ILHA">ILHA</option>
                            <option value="BKO">BKO</option>
                          </select>
                          <span class="selectInvalidMsg"><br>Campo obrigatório.</span></span></td>
                      <td id="t_td">Parecer/assimilação</td>
                          <td id="t_td"><span id="spryselect2">
                            <label for="parecer"></label>
                            <select name="parecer" id="parecer"class="combobox_padrao">
                              <option value="0">Selecione...</option>
                              <option value="5">5</option>
                              <option value="4">4</option>
                              <option value="3">3</option>
                              <option value="2">2</option>
                              <option value="1">1</option>
                            </select>
                            <span class="selectInvalidMsg"><br>Campo obrigatório.</span></span></td>
				</tr>
                   <td id="t_td">Comentário</td>
                   <td id="t_td" colspan="3"><span id="sprytextarea1">
                     <label for="comentario"></label>
                     <textarea name="comentario" id="comentario" cols="60" rows="5"></textarea>
                   <span class="textareaRequiredMsg"><br>Campo obrigatório.</span></span></td>
                   </tr> 
                   </tr>
                   <td id="t_td">Operador</td>
                   <td id="t_td" colspan="3"><span id="spryselect3">
                     <label for="operador"></label>
                     <?php
                     echo "<select name='operador' style='width:499'>";
                    
					//seleciona a base de dados para uso
					include "../../tp/conexao.php";
					$query= "SELECT funcionarios_emp.nome FROM funcionarios_emp union  
SELECT funcionarios_input.nome FROM funcionarios_input 
order by nome";
                    $result = mysql_query($query) or die (mysql_error());
                    echo " <option value='0'>Selecione...</option>";
					while($dado= mysql_fetch_array($result)){
                    echo "
					<option value=\"{$dado['nome']}\">
                    {$dado['nome']}</option>";
                    }
					?>
					 
                     <span class="selectInvalidMsg"><br>Campo obrigatório.</span></span></td>
                   </tr> 
                   <tr>
                   <td id="t_td">Reincidente</td>
                   <td id="t_td"><span id="spryselect4">
                     <select name="reincidente" id="reincidente" class="combobox_padrao">
                       <option value="0">Selecione...</option>
                       <option value="SIM">SIM</option>
                       <option value="NÃO">NÃO</option>
                     </select>
                     <span class="selectInvalidMsg"><br>Campo obrigatório.</span></span></td>
                     <td id="t_td">Atividade</td>
                     <td id="t_td"><span id="spryselect5">
                       <label for="atividade"></label>
                       <select name="atividade" id="atividade"class="combobox_padrao">
                         <option value="0">Selecione...</option>
                         <option value="REORIENTAÇÃO">REORIENTAÇÃO</option>
                         <option value="PEDIDO TESTES">PEDIDO TESTES</option>
                         <option value="CHAVE">CHAVE</option>
                         <option value="SWAP">SWAP</option>
                       </select>
                       <span class="selectInvalidMsg"><br>Campo obrigatório.</span></span></td>
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
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"], invalidValue:"0", isRequired:false});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"0", isRequired:false});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {invalidValue:"0", isRequired:false});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {isRequired:false, invalidValue:"0"});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {isRequired:false, invalidValue:"0"});
</script>
</body>
</html>