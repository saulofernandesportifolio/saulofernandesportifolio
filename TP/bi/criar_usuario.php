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

	if($_SESSION["bi"] == 0){  
    	
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
    include("../menu.php") ?>
    </div>
   
    <div id="caixa" style="height:460px;">
       <div id="conteudo">   
            
            <form action="valida_cadastro_usuario.php" method="post">
                <table id="table_conteudo"  align="center" border="0">
                <tr><td colspan="2"><h3>Cadastro de usuário</h3></td></tr>
               		<tr >
                      <td id="t_td">Nome</td>
                      <td id="t_td" colspan="3"><span id="sprytextfield1">
                      <label for="nome_usuario"></label>
                      <input type="text" name="nome_usuario" id="nome_usuario" class="combobox_padrao_grande"></BR>
                      <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>
                      </td>
                    </tr>
                   <tr>
                    <td id="t_td">Login</td>
                    <td id="t_td" colspan="3"><span id="sprytextfield2">
                     <label for="login_usuario"></label>
                     <input type="text" name="login_usuario" id="login_usuario"class="combobox_padrao_grande"></BR><span class="textfieldRequiredMsg">Campo obrigatório.</span></span>
                   </td>
                   </tr>
                 <tr>
                  <td id="t_td">Senha</td>
                  <td id="t_td" colspan="3"><span id="sprytextfield3">
                    <label for="senha_usuario"></label>
                    <input type="text" name="senha_usuario" id="senha_usuario"class="combobox_padrao_grande"></BR>
                    <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>
                  </td>
                  </tr>
                                   <tr>
                  <td id="t_td">Turno</td>
                  <td id="t_td" colspan="3"><select name='turno_cadastro' class='combobox_padrao' >
                            <option value='0'>Selecione...</option>
                            <option value='dia'>Dia</option>
                            <option value='intermediario'>Intermediário</option>
                            <option value='noite'>Noite</option>
                            </select>
                  </td>
                  </tr>
                </table>
  
                    <table id="table_conteudo"  align="center" border="0">
               
                  <tr><td id="t_td" colspan="8"><hr><strong><br/>SAP</strong></td></tr>
                  <tr >
               
               <td id="t_td">Sap Usuário</td>
               <td id="t_td"><input name="sap_usuario" type="checkbox" value="1"></td> 
              
              <td id="t_td">Sap Carrega Base</td>
              <td id="t_td"><input name="sap_base" type="checkbox" value="1"></td>
              <td id="t_td">Sap Supervisor</td>
              <td id="t_td"><input name="sap_supervisor" type="checkbox" value="1"></td>
                 </tr>
                
                    <tr><td id="t_td" colspan="8"><hr><strong><br />PN</strong></td></tr>
                  <tr>
              <td id="t_td">PN Usuário</td> 
              <td id="t_td"><input name="pn_usuario" type="checkbox" value="1"></td>
              <td id="t_td">PN Carrega Base</td>
              <td id="t_td"><input name="pn_base" type="checkbox" value="1"></td>
              <td id="t_td">PN Supervisor</td>
              <td id="t_td"><input name="pn_supervisor" type="checkbox" value="1"></td>
                  </tr>
                   <tr><td id="t_td" colspan="8"><hr><strong><br />Erros</strong></td></tr>
                  <tr>
              <td id="t_td">Erros Usuário</td> 
              <td id="t_td"><input name="erros_usuario" type="checkbox" value="1"></td>
              <td id="t_td">Erros Carrega Base</td>
              <td id="t_td"><input name="erros_base" type="checkbox" value="1"></td>
              <td id="t_td">Erros Supervisor</td>
              <td id="t_td"><input name="erros_supervisor" type="checkbox" value="1"></td>
              <td id="t_td">Erros Prioriza</td>
              <td id="t_td"><input name="prioriza_erros" type="checkbox" value="1"></td>
               </tr>                  
                  <tr>
                  <td id="t_td" colspan="8"><hr><strong><br />Gestão</strong></td></tr>
                  <tr>
              <td id="t_td">Gestão Usuário</td> 
              <td id="t_td"><input name="gestao_usuario" type="checkbox" value="1"></td>
              <td id="t_td">Gestão Carrega Base</td>
              <td id="t_td"><input name="gestao_base" type="checkbox" value="1"></td>
              <td id="t_td">Gestão Supervisor</td>
              <td id="t_td"><input name="gestao_supervisor" type="checkbox" value="1"></td>
                  </tr>
                  <tr>
                  <td id="t_td" colspan="8"><hr><strong><br />Misto</strong></td></tr>
                  <tr>
              <td id="t_td">Noticias</td> 
              <td id="t_td"><input name="noticias" type="checkbox" value="1"></td>
              <td id="t_td">Controle de Atividades</td>
              <td id="t_td"><input name="controle_atividade" type="checkbox" value="1"></td>
              <td id="t_td">Carregar base VPE/VPG</td>
              <td id="t_td"><input name="vpe_vpg" type="checkbox" value="1"></td>
                  </tr>
                   <tr><td id="t_td" colspan="8"><hr><strong><br />Diretoria</strong></td></tr>
                  
                  <tr>
              <td id="t_td">Diretoria Usuário</td> 
              <td id="t_td"><input name="diretoria_usuario" type="checkbox" value="1"></td>
              <td id="t_td">Diretoria Supervisor</td>
              <td id="t_td"><input name="diretoria_supervisor" type="checkbox" value="1"></td>
                  </tr>
                  <tr>
                   <tr><td id="t_td" colspan="8"><hr><strong><br />Treinamento</strong></td></tr>
                  <tr>
              <td id="t_td">Treinamento</td> 
              <td id="t_td"><input name="treinamento" type="checkbox" value="1"></td>
             <td id="t_td">Treinamento Supervisor</td>
              <td id="t_td"><input name="treinamento_sup" type="checkbox" value="1"></td>
                  </tr>
                  <tr>
                  
                  <td id="t_td" colspan="8"><hr><strong><br />BI </strong>
                  </td></tr>
                  <tr>
              <td id="t_td">Business Intelligence</td> 
              <td id="t_td" colspan="3"><input name="bi" type="checkbox" value="1"></td>
                  </tr>
                                
               </table>
                       
               <table id="table_conteudo"  align="center" border="0">
               <tr><td id="t_td" colspan="8"><hr><strong><br />Reversão Direto</strong></td></tr>
              <tr>
              <td id="t_td">Direto Usuário</td> 
              <td id="t_td"><input name="direto_usuario"type="checkbox"value="1"></td>
              <td id="t_td">Direto Carrega Base</td>
              <td id="t_td"><input name="direto_base" type="checkbox" value="1"></td>
              <td id="t_td">Direto Prioriza</td>
              <td id="t_td"><input name="direto_prioriza" type="checkbox" value="1"></td>
              <td id="t_td">Direto Supervisor</td>
              <td id="t_td"><input name="direto_supervisor" type="checkbox" value="1"></td>
                  </tr>
                  <tr><td id="t_td" colspan="8"><hr><strong><br />Reversão Indireto</strong></td></tr>
                  <tr>
              <td id="t_td">Indireto Usuário</td> 
              <td id="t_td"><input name="indireto_usuario"type="checkbox"value="1"></td>
              <td id="t_td">Indireto Carrega Base</td>
              <td id="t_td"><input name="indireto_base" type="checkbox" value="1"></td>
              <td id="t_td">Indireto Prioriza</td>
              <td id="t_td"><input name="indireto_prioriza" type="checkbox" value="1"></td>
              <td id="t_td">Indireto Supervisor</td>
              <td id="t_td"><input name="indireto_supervisor" type="checkbox" value="1"></td>
                  </tr>
              <tr><td id="t_td" colspan="8"><hr><strong><br />Controle de TSA</strong></td></tr>
              <td id="t_td">Tsa</td>
			  <td id="t_td"><input name="tsa" type="checkbox" value="1" ></td>
			  </td>
			  </tr>     
              
              <tr>
              <td id="t_td" colspan="8"><hr><strong><br />Contestações Suporte Corporativo Nacional</strong></td></tr>
              <td id="t_td">Contestações operador</td>
			  <td id="t_td"><input name="cont" type="checkbox" value="1" /></td>
			  </td>
			  <td id="t_td">Contestações supervisor</td>
			  <td id="t_td"><input name="cont_sup" type="checkbox" value="1" /></td>
		      </td>
			   </td>
                  </tr>  
              
               <tr>
              <td id="t_td" colspan="8"><hr><strong><br />Contestações Célula de Input</strong></td></tr>
              <td id="t_td">Contestações operador</td>
			  <td id="t_td"><input name="cont_atv" type="checkbox" value="1" /></td>
			  </td>
			  <td id="t_td">Contestações supervisor</td>
			  <td id="t_td"><input name="cont_sup_atv" type="checkbox" value="1" /></td>
		      </td>
			   </td>
                  </tr>  
                  
                  
                  <tr>
              <td id="t_td" colspan="8"><hr><strong><br />Cadastro Funcionários</strong></td></tr>
              <td id="t_td">Contestações operador</td>
			  <td id="t_td"><input name="cadastro_func" type="checkbox" value="1" /></td>
			  </td>
			  </tr>          
             
              </table>
              
              <table id="table_conteudo"  align="center" border="0">
              <tr>
              <td id="t_td"><hr><br/><input name="Enviar" type="submit" value="enviar" class="botao_padrao"/><br/></td>
              <td id="t_td"><hr><br/><input name="Limpar" type="reset" value="limpar" class="botao_padrao"/><br /></td>
              <td id="t_td"><hr><br/> <input type="button" name="Submit2" value="Voltar" class="botao_padrao" onClick="javascript: history.go(-1);"><br /></td>
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