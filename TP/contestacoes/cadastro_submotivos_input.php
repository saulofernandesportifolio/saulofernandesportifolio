<?php   
@session_start(); 

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>TQ</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">



<?php


//Testa se o perfil está correto.

$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];

 

 if($_SESSION["contestacoes_atv_sup"] == 0){    	
        echo"
            <script type=\"text/javascript\">
            alert('Você não tem permissão para acessar esta página!');
            document.location.replace('../logout.php');
            </script>
        ";
    }


if($_POST['ofensor'] == 0){
    
      echo"
            <script type=\"text/javascript\">
            alert('Selecione o ofensor!');
            document.location.replace('../../tp/contestacoes/cadastro_ofensor_submotivos_input.php');
            </script>
        ";  
    
    
}


?>

<div id="principal">
    <div id="menu">
<?php 
    include("../../tp/menu.php") ?>
    </div>
   
    <div id="caixa" style="height:460px;">
       <div id="conteudo">   
            
            <form action="valida_cadastro_submotivo_input.php" method="post">
              <table id="table_conteudo"  align="center" border="0">
                <tr><td colspan="2"><h3>Cadastro Submotivo</h3></td></tr>
                
                   <tr>
                  <td id="t_td">Selecione o motivo:</td>
                  
                  <?php if($_POST['ofensor'] == 2 ){ ?>
                  <td id="t_td" colspan="3"><select name='motivo' class='combobox_grandre' >
                            <option value='0'>Selecione...</option>
                            <option value='1'>Divergência termo SMP/formulário complementar</option>
                            <option value='2'>Divergência termo de TT/formulário complementar</option>
                            <option value='3'>Divergência termo de PN</option>
                            <option value='4'>Divergência Contrato Gestão</option>
                            <option value='5'>Documento ilegivel/não anexado/expirado/corrompido</option>
                            <option value='6'>Cadastro do Cliente</option>
                            <option value='7'>PPVC/ATLYS/NGIN/Conta de serviço</option>
                            <option value='8'>Validação de poderes</option>
                            <option value='12'>Divergência no status/comentários</option>
                            <option value='13'>Divergência Formulário de pedidos/Contrato Guarda chuva</option>
                            </select>
                  </td>
                  <?php } ?>
                  
                  <?php if($_POST['ofensor'] == 3 ){ ?>
                  <td id="t_td" colspan="3"><select name='motivo' class='combobox_grandre' >
                            <option value='0'>Selecione...</option>
                            <option value='1'>Divergência termo SMP/formulário complementar</option>
                            <option value='2'>Divergência termo de TT/formulário complementar</option>
                            <option value='3'>Divergência termo de PN</option>
                            <option value='4'>Divergência Contrato Gestão</option>
                            <option value='5'>Documento ilegivel/não anexado/expirado/corrompido</option>
                            <option value='6'>Cadastro do Cliente</option>
                            <option value='7'>PPVC/ATLYS/NGIN/Conta de serviço</option>
                            <option value='8'>Validação de poderes</option>
                            <option value='10'>Personalização</option>
                            <option value='12'>Divergência no status/comentários</option>
                            <option value='13'>Divergência Formulário de pedidos/Contrato Guarda chuva</option>
                            </select>
                  </td>
                  <?php } ?>                  
                         
                  <?php if($_POST['ofensor'] == 4 ){ ?>
                  <td id="t_td" colspan="3"><select name='motivo' class='combobox_grandre' >
                            <option value='0'>Selecione...</option>
                            <option value='1'>Divergência termo SMP/formulário complementar</option>
                            <option value='2'>Divergência termo de TT/formulário complementar</option>
                            <option value='3'>Divergência termo de PN</option>
                            <option value='4'>Divergência Contrato Gestão</option>
                            <option value='5'>Documento ilegivel/não anexado/expirado/corrompido</option>
                            <option value='6'>Cadastro do Cliente</option>
                            <option value='7'>PPVC/ATLYS/NGIN/Conta de serviço</option>
                            <option value='8'>Validação de poderes</option>
                            <option value='12'>Divergência no status/comentários</option>
                            <option value='13'>Divergência Formulário de pedidos/Contrato Guarda chuva</option>
                             </select>
                  </td>
                  <?php } ?>
                
                
                     <?php if($_POST['ofensor'] == 19 ){ ?>
                  <td id="t_td" colspan="3"><select name='motivo' class='combobox_grandre' >
                            <option value='0'>Selecione...</option>
                            <option value='9'>Solicitação GC/GUARDIÃO</option>
                            </select>
                  </td>
                  <?php } ?>
                
                  
                 </tr>
                
                
               		<tr >
                      <td id="t_td">Sub motivo:</td>
                      <td id="t_td" colspan="3"><span id="sprytextfield1">
                      <label for="submotivo"></label>
                      <input type="text" name="submotivo" id="submotivo" class="combobox_padrao_grande"/><br/>
                      <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>
                      </td>
                    </tr>
                    
                
                </table>
                 <table id="table_conteudo"  align="center" border="0">
              <tr>
              <td id="t_td"><hr/><br/><input name="Enviar" type="submit" value="enviar" class="botao_padrao"/><br/></td>
              <td id="t_td"><hr/><br/><input name="Limpar" type="reset" value="limpar" class="botao_padrao"/><br /></td>
              <td id="t_td"><hr/><br/> <input type="button" name="Submit2" value="Voltar" class="botao_padrao"  onclick="javascript: history.go(-1);"><br /></td>
              </tr>
              
              </table>
                    
</form>
        
        </div>
    </div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>
</body>
</html>