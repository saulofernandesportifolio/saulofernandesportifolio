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

              <form name="formulario" action="treinamento_valida_cadastro_controle_questionamentos.php" method="post">
                
              <table id="table_conteudo"  align="center" border="0">
               		
                  <tr>
                  <td id="t_td">Comentário</td>
                   <td id="t_td" colspan="3"><span id="sprytextarea1">
                     <label for="comentario"></label>
                     <textarea name="comentario" id="comentario" cols="56" rows="5"></textarea>
                   <span class="textareaRequiredMsg"><br>Campo obrigatório.</span></span></td>
                 </tr> 
                   <tr>
                   <td id="t_td">Destinatario</td>
                   <td id="t_td" colspan="3"><span id="sprytextfield1">
                     <label for="destinatario"></label>
                     <input type="text" name="destinatario" id="destinatario" class="combobox_padrao_grande">
                     <span class="textfieldRequiredMsg"><br>Campo obrigatório.</span></span></td>
                   </tr> 
                   <tr>
                   <td id="t_td">Status</td>
                   <td id="t_td"><span id="spryselect4">
                     <select name="status" id="status" class="combobox_padrao">
                       <option value="0">Selecione...</option>
                       <option value="Pendente">Pendente</option>
                       <option value="Concluido">Concluido</option>
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
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {isRequired:false, invalidValue:"0"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
</script>
</body>
</html>