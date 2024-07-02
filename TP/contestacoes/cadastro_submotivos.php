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

 

 if($_SESSION["contestacoes_sup"] == 0){    	
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
    include("../../tp/menu.php") ?>
    </div>
   
    <div id="caixa" style="height:460px;">
       <div id="conteudo">   
            
            <form action="valida_cadastro_submotivo.php" method="post">
              <table id="table_conteudo"  align="center" border="0">
                <tr><td colspan="2"><h3>Cadastro Submotivo</h3></td></tr>
                
                   <tr>
                  <td id="t_td">Selecione o motivo:</td>
                  <td id="t_td" colspan="3"><select name='motivo' class='combobox_grandre' >
                            <option value='0'>Selecione...</option>
                            <option value='1'>Divergencia_entre_NGIN_Atlys_e_VIVOCORP</option>
                            <option value='2'>Divergencia_entre_procedimento_e_VIVOCORP</option>
                            <option value='3'>Divergencia_entre_receita_federal_e_VIVOCORP</option>
                            <option value='4'>Divergencia_entre_sintegra_e_VIVOCORP</option>
                            <option value='5'>Divergencia_entre_tela_do_Intergrall_e_VIVOCORP</option>
                            <option value='6'>Divergencia_entre_termo_SMP_e_Book_de_ofertas</option>
                            <option value='7'>Divergencia_entre_termo_SMP_e_Simulador_de_Ofertas</option>
                            <option value='8'>Divergencia_entre_termo_SMP_e_VIVOCORP</option>
                            <option value='9'>Documentacao_incorreta_divergente_nao_anexada_ilegivel</option>
                            <option value='10'>Erro_no_cadastro_do_pedido</option>
                            <option value='11'>Mailling_dados_incorretos_ou_nao_preenchidos</option>
                            <option value='12'>Simulador_de_Ofertas_dados_incorretos_ou_nao_preenchidos</option>
                            <option value='13'>Tabela_de_aparelhos</option>
                            <option value='14'>Tela_do_Intergrall_dados_incorretos_ou_nao_preenchidos</option>
                            <option value='15'>Termo_SMP_dados_incorretos_ou_nao_preenchidos</option>
                            </select>
                  </td>
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
              <td id="t_td"><hr/><br/> <input type="button" name="Submit2" value="Voltar" class="botao_padrao" onClick="javascript: history.go(-1);"><br /></td>
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