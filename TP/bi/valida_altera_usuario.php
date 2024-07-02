<?php   
@session_start();
include '../conexao.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>TQ</title>
</head>
<body id="logar">
<?php


$sap_usuario    = '';
 $login_usuario  = $_POST["login_usuario"];

	$sql_pn = "select * from usuarios WHERE login ='$login_usuario'";
		         $result = mysql_query($sql_pn,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
				 $turno          	= $dado["turno"];	 
				 $nome           	= $dado["nome"];
                 $login           	= $dado["login"];
				 $senha           	= $dado["senha"];	 	 
		     	 $sap_usuario    	= $dado["sap_bko"];
		     	 $contestacoes   	= $dado["contestacoes"];
		     	 $contestacoes_sup   = $dado["contestacoes_sup"];
                 $contestacoes_atv   	= $dado["contestacoes_atv"];
		     	 $contestacoes_sup_atv   = $dado["contestacoes_atv_sup"];
                 $tsa            = $dado["tsa"];
				 $sap_base       = $dado["carrega_base_sap"];
				 $sap_supervisor = $dado["sup_sap"];
				 $pn_usuario     = $dado["pn_bko"];
				 $pn_base        = $dado["carrega_base_pn"];
				 $pn_supervisor  = $dado["sup_pn"];
				 $erros_usuario  = $dado["erros_bko"];
				 $erros_base  = $dado["carrega_base_erros"];
				 $erros_supervisor  = $dado["adm_erros"];
				 $prioriza_erros = $dado["prioriza_erros"];
				 $gestao_usuario    = $dado["operador_gestao"];
				 $gestao_base       = $dado["carregar_base_gestao"];
				 $gestao_supervisor = $dado["supervisor_gestao"];
				 $noticias          = $dado["noticias"];
				 $controle_atividade= $dado["controle_atividades"];
				 $vpe_vpg           = $dado["vpe_vpg"];
				 $diretoria_usuario = $dado["diretoria_input"];
				 $diretoria_supervisor = $dado["diretoria_sup"];
				 $bi                = $dado["bi"];
				 $direto_usuario       = $dado["operador_direto"];
				 $direto_base          = $dado["carrega_base_direto"];
				 $direto_prioriza      = $dado["prioriza_direto"];
				 $direto_supervisor    = $dado["supervisor_direto"];
				 $indireto_usuario       = $dado["reversao_ind_bko"];
				 $indireto_base          = $dado["carrega_base_indireto"];
				 $indireto_prioriza      = $dado["prioriza_indireto"];
				 $indireto_supervisor    = $dado["adm_reversao_ind"];
				 
				 $treinamento        = $dado["treinamento"];
				 $treinamento_sup    = $dado["treinamento_sup"];
                 $cadastro_func      = $dado["cadastro_func"];
				 }
				
if($sap_usuario == ''){
	echo"
	<script type=\"text/javascript\">
	alert('Login inválido!');
	javascript: history.go(-1);
	</script>
 	";
}else
?>
<div id="principal">
    <div id="menu">
<?php 
    include("../menu.php") ?>
    </div>
   
    <div id="caixa" style="height:460px;">
       <div id="conteudo">   
            
            <form action="valida_altera_usuario1.php" method="post">
                <table id="table_conteudo"  align="center" border="0">
                <tr><td colspan="2"><h3>Cadastro de usuário</h3></td></tr>
               		<tr >
                      <td id="t_td">Nome</td>
                      <td id="t_td" colspan="3">
                      <label for="nome_usuario"></label>
                      <input type="text" name="nome_usuario" readonly='readonly' id="nome_usuario" value="<?php echo $nome ?>" class="combobox_padrao_grande"></BR>
                      
                      </td>
                    </tr>
                   <tr>
                    <td id="t_td">Login</td>
                    <td id="t_td" colspan="3">
                     <label for="login_usuario"></label>
                     <input type="text" name="login_usuario"readonly='readonly'value="<?php echo $login ?>" id="login_usuario"class="combobox_padrao_grande"></BR>                    
                   </td>
                   </tr>
                 <tr>
                  <td id="t_td">Senha</td>
                  <td id="t_td" colspan="3">
                    <label for="senha_usuario"></label>
                    <input type="password" name="senha_usuario"readonly='readonly'value="<?php echo $senha ?>" id="senha_usuario"class="combobox_padrao_grande"></BR>
                   
                  </td>
                  </tr>
                  <tr>
                  <td id="t_td">Turno</td><?php if ($turno == 'dia'){
                  echo "<td id='t_td' colspan='3'><select name='turno_cadastro' class='combobox_padrao' >
                            <option value='dia'>Dia</option>
                             <option value='intermediario'>Intermediário</option>
                            <option value='noite'>Noite</option>
                            </select>";
				  }else
				    echo "<td id='t_td' colspan='3'><select name='turno_cadastro' class='combobox_padrao' >
                            <option value='noite'>Noite</option>
                            <option value='intermediario'>Intermediário</option>
							<option value='dia'>Dia</option>
                            </select>";
				  ?>
                  </td>
                  </tr>
                </table>
  
                    <table id="table_conteudo"  align="center" border="0">
                    <tr><td id="t_td" colspan="8"><hr><strong><br />SAP</strong></td></tr>
                  <tr >
              <td id="t_td">Sap Usuário</td>
              <?php 
			  if ($sap_usuario == '1'){
			  echo  "<td id='t_td'><input name='sap_usuario' type='checkbox' value='1' checked></td>";
				  }if($sap_usuario == '0'){
			  echo  "<td id='t_td'><input name='sap_usuario' type='checkbox' value='1'></td>";
				  }
			  ?>
              <td id="t_td">Sap Carrega Base</td><?php 
			  if ($sap_base == '1'){
			  echo  "<td id='t_td'><input name='sap_base' type='checkbox' value='1' checked></td>";
				  }if($sap_base == '0'){
			  echo  "<td id='t_td'><input name='sap_base' type='checkbox' value='1'></td>";
				  }
			  ?>
              <td id="t_td">Sap Supervisor</td><?php 
			  if ($sap_supervisor == '1'){
			  echo  "<td id='t_td'><input name='sap_supervisor' type='checkbox' value='1' checked></td>";
				  }if ($sap_supervisor == '0'){
			  echo  "<td id='t_td'><input name='sap_supervisor' type='checkbox' value='1'></td>";
				  }
			  ?>
                  </tr>
                    <tr><td id="t_td" colspan="8"><hr><strong><br />PN</strong></td></tr>
                  <tr>
              <td id="t_td">PN Usuário</td><?php 
			  if ($pn_usuario == '1'){
			  echo  "<td id='t_td'><input name='pn_usuario' type='checkbox' value='1' checked></td>";
				  }if ($pn_usuario == '0'){
			  echo  "<td id='t_td'><input name='pn_usuario' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">PN Carrega Base</td><?php 
			  if ($pn_base == '1'){
			  echo  "<td id='t_td'><input name='pn_base' type='checkbox' value='1' checked></td>";
				  }if ($pn_base == '0'){
			  echo  "<td id='t_td'><input name='pn_base' type='checkbox' value='1'></td>";
				  }
			
			  ?></td>
              <td id="t_td">PN Supervisor</td><?php 
			  if ($pn_supervisor == '1'){
			  echo  "<td id='t_td'><input name='pn_supervisor' type='checkbox' value='1' checked></td>";
				  }if ($pn_supervisor == '0'){
			  echo  "<td id='t_td'><input name='pn_supervisor' type='checkbox' value='1'></td>";
				  }
			  ?></td>
                  </tr>
                   <tr><td id="t_td" colspan="8"><hr><strong><br />Erros</strong></td></tr>
                  <tr>
              <td id="t_td">Erros Usuário</td> 
              <?php 
			  if ($erros_usuario == '1'){
			  echo  "<td id='t_td'><input name='erros_usuario' type='checkbox' value='1' checked></td>";
				  }if ($erros_usuario == '0'){
			  echo  "<td id='t_td'><input name='erros_usuario' type='checkbox' value='1'></td>";
				  }
			  ?>
              <td id="t_td">Erros Carrega Base</td><?php 
			  if ($erros_base == '1'){
			  echo  "<td id='t_td'><input name='erros_base' type='checkbox' value='1' checked></td>";
				  }if ($erros_base == '0'){
			  echo  "<td id='t_td'><input name='erros_base' type='checkbox' value='1'></td>";
				  }
			  ?>
              <td id="t_td">Erros Supervisor</td><?php 
			  if ($erros_supervisor == '1'){
			  echo  "<td id='t_td'><input name='erros_supervisor' type='checkbox' value='1' checked></td>";
				  }if ($erros_supervisor == '0'){
			  echo  "<td id='t_td'><input name='erros_supervisor' type='checkbox' value='1'></td>";
				  }
			  ?>
               <td id="t_td">Erros Prioriza</td><?php 
			  if ($prioriza_erros == '1'){
			  echo  "<td id='t_td'><input name='prioriza_erros' type='checkbox' value='1' checked></td>";
				  }if($prioriza_erros == '0'){
			 echo  "<td id='t_td'><input name='prioriza_erros' type='checkbox' value='1'></td>";
				  }
				  
			  ?>
                  </tr>                  
                  <tr>
                  <td id="t_td" colspan="8"><hr><strong><br />Gestão</strong></td></tr>
                  <tr>
              <td id="t_td">Gestão Usuário</td><?php 
			  if ($gestao_usuario == '1'){
			  echo  "<td id='t_td'><input name='gestao_usuario' type='checkbox' value='1' checked></td>";
				  }if ($gestao_usuario == '0'){
			  echo  "<td id='t_td'><input name='gestao_usuario' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Gestão Carrega Base</td><?php 
			  if ($gestao_base == '1'){
			  echo  "<td id='t_td'><input name='gestao_base' type='checkbox' value='1' checked></td>";
				  } if ($gestao_base == '0'){
			  echo  "<td id='t_td'><input name='gestao_base' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Gestão Supervisor</td><?php 
			  if ($gestao_supervisor == '1'){
			  echo  "<td id='t_td'><input name='gestao_supervisor' type='checkbox' value='1' checked></td>";
				  } if ($gestao_supervisor == '0'){
			  echo  "<td id='t_td'><input name='gestao_supervisor' type='checkbox' value='1'></td>";
				  }
			  ?></td>
                  </tr>
                  <tr>
                  <td id="t_td" colspan="8"><hr><strong><br />Misto</strong></td></tr>
                  <tr>
              <td id="t_td">Noticias</td><?php 
			  if ($noticias == '1'){
			  echo  "<td id='t_td'><input name='noticias' type='checkbox' value='1' checked></td>";
				  }if ($noticias == '0'){
			  echo  "<td id='t_td'><input name='noticias' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Controle de Atividades</td><?php 
			  if ($controle_atividade == '1'){
			  echo  "<td id='t_td'><input name='controle_atividade' type='checkbox' value='1' checked></td>";
				  } if ($controle_atividade == '0'){
			  echo  "<td id='t_td'><input name='controle_atividade' type='checkbox' value='1'></td>";
				  }			  ?></td>
              <td id="t_td">Carregar base VPE/VPG</td><?php 
			  if ($vpe_vpg == '1'){
			  echo  "<td id='t_td'><input name='vpe_vpg' type='checkbox' value='1' checked></td>";
				  }if ($vpe_vpg == '0'){
			  echo  "<td id='t_td'><input name='vpe_vpg' type='checkbox' value='1'></td>";
				  }
			  ?></td>
                  </tr>
                   <tr><td id="t_td" colspan="8"><hr><strong><br />Diretoria</strong></td></tr>
                  
                  <tr>
              <td id="t_td">Diretoria Usuário</td><?php 
			  if ($diretoria_usuario == '1'){
			  echo  "<td id='t_td'><input name='diretoria_usuario' type='checkbox' value='1' checked></td>";
				  } if ($diretoria_usuario == '0'){
			  echo  "<td id='t_td'><input name='diretoria_usuario' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Diretoria Supervisor</td><?php 
			  if ($diretoria_supervisor == '1'){
			  echo  "<td id='t_td'><input name='diretoria_supervisor' type='checkbox' value='1' checked></td>";
				  } if ($diretoria_supervisor == '0'){
			  echo  "<td id='t_td'><input name='diretoria_supervisor' type='checkbox' value='1'></td>";
				  }
			  ?></td>
                  </tr>
                  
                   <tr><td id="t_td" colspan="8"><hr><strong><br />Treinamento</strong></td></tr>
                  
                  <tr>
              <td id="t_td">Treinamento</td><?php 
			  if ($treinamento == '1'){
			  echo  "<td id='t_td'><input name='treinamento' type='checkbox' value='1' checked></td>";
				  }if ($treinamento == '0'){
			  echo  "<td id='t_td'><input name='treinamento' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Treinamento Supervisor</td><?php 
			  if ($treinamento_sup == '1'){
			  echo  "<td id='t_td'><input name='treinamento_sup' type='checkbox' value='1' checked></td>";
				  }  if ($treinamento_sup == '0'){
			  echo  "<td id='t_td'><input name='treinamento_sup' type='checkbox' value='1'></td>";
				  }
			  ?></td>
                  </tr>
                  
                  
                  
                  <tr>
                  <td id="t_td" colspan="8"><hr><strong><br />BI</strong>
                  </td></tr>
                  <tr>
              <td id="t_td">Business Intelligence</td><?php 
			  if ($bi == '1'){
			  echo  "<td id='t_td'><input name='bi' type='checkbox' value='1' checked></td>";
				  } if ($bi == '0'){
			  echo  "<td id='t_td'><input name='bi' type='checkbox' value='1'></td>";
				  }
			  ?></td>
                  </tr>
                                
               </table>
                       
               <table id="table_conteudo"  align="center" border="0">
               <tr><td id="t_td" colspan="8"><hr><strong><br />Reversão Direto</strong></td></tr>
              <tr>
              <td id="t_td">Direto Usuário</td><?php 
			  if ($direto_usuario == '1'){
			  echo  "<td id='t_td'><input name='direto_usuario' type='checkbox' value='1' checked></td>";
				  } if ($direto_usuario == '0'){
			  echo  "<td id='t_td'><input name='direto_usuario' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Direto Carrega Base</td><?php 
			  if ($direto_base == '1'){
			  echo  "<td id='t_td'><input name='direto_base' type='checkbox' value='1' checked></td>";
				  } if ($direto_base == '0'){
			  echo  "<td id='t_td'><input name='direto_base' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Direto Prioriza</td><?php 
			  if ($direto_prioriza == '1'){
			  echo  "<td id='t_td'><input name='direto_prioriza' type='checkbox' value='1' checked></td>";
				  } if ($direto_prioriza == '0'){
			  echo  "<td id='t_td'><input name='direto_prioriza' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Direto Supervisor</td><?php 
			  if ($direto_supervisor == '1'){
			  echo  "<td id='t_td'><input name='direto_supervisor' type='checkbox' value='1' checked></td>";
				  }if ($direto_supervisor == '0'){
			  echo  "<td id='t_td'><input name='direto_supervisor' type='checkbox' value='1'></td>";
				  }
			  ?></td>
                  </tr>
                  <tr><td id="t_td" colspan="8"><hr><strong><br />Reversão Indireto</strong></td></tr>
                  <tr>
              <td id="t_td">Indireto Usuário</td><?php 
			  if ($indireto_usuario == '1'){
			  echo  "<td id='t_td'><input name='indireto_usuario' type='checkbox' value='1' checked></td>";
				  }if ($indireto_usuario == '0'){
			  echo  "<td id='t_td'><input name='indireto_usuario' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Indireto Carrega Base</td><?php 
			  if ($indireto_base == '1'){
			  echo  "<td id='t_td'><input name='indireto_base' type='checkbox' value='1' checked></td>";
				  } if ($indireto_base == '0'){
			  echo  "<td id='t_td'><input name='indireto_base' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Indireto Prioriza</td><?php 
			  if ($indireto_prioriza == '1'){
			  echo  "<td id='t_td'><input name='indireto_prioriza' type='checkbox' value='1' checked></td>";
				  }if ($indireto_prioriza == '0'){
			  echo  "<td id='t_td'><input name='indireto_prioriza' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              <td id="t_td">Indireto Supervisor</td><?php 
			  if ($indireto_supervisor == '1'){
			  echo  "<td id='t_td'><input name='indireto_supervisor' type='checkbox' value='1' checked></td>";
				  } if ($indireto_supervisor == '0'){
			  echo  "<td id='t_td'><input name='indireto_supervisor' type='checkbox' value='1'></td>";
				  }
			  ?></td>
              </tr>
                  <tr><td id="t_td" colspan="8"><hr><strong><br />Controle de TSA</strong></td></tr>
                  <tr>
              <td id="t_td">TSA</td><?php 
			  if ($tsa == '1'){
			  echo  "<td id='t_td'><input name='tsa' type='checkbox' value='1' checked></td>";
				  }if ($tsa == '0' || $tsa == ''){
			  echo  "<td id='t_td'><input name='tsa' type='checkbox' value='1'></td>";
				  }
			  ?></td>
                  </tr>
                  <tr>
                  <td id="t_td" colspan="8"><hr><strong><br />Contestações Suporte Corporativo Nacional</strong></td></tr>
                  <tr>
              <td id="t_td">Contestações operador</td><?php 
			  if ($contestacoes == '1'){
			  echo  "<td id='t_td'><input name='cont' type='checkbox' value='1' checked></td>";
				  }if ($contestacoes == '0' || $contestacoes == ''){
			  echo  "<td id='t_td'><input name='cont' type='checkbox' value='1'></td>";
				  }
			  ?></td>
			  <td id="t_td">Contestações supervisor</td><?php 
			  if ($contestacoes_sup == '1'){
			  echo  "<td id='t_td'><input name='cont_sup' type='checkbox' value='1' checked></td>";
				  }if ($contestacoes_sup == '0' || $contestacoes_sup == ''){
			  echo  "<td id='t_td'><input name='cont_sup' type='checkbox' value='1'></td>";
				  }
			  ?></td>
                  </tr>
                  
              <tr>
                  <td id="t_td" colspan="8"><hr><strong><br />Contestações Célula de Input</strong></td></tr>
                  <tr>
              <td id="t_td">Contestações operador</td><?php 
			  if ($contestacoes_atv == '1'){
			  echo  "<td id='t_td'><input name='cont_atv' type='checkbox' value='1' checked></td>";
				  }if ($contestacoes_atv == '0' || $contestacoes_atv == ''){
			  echo  "<td id='t_td'><input name='cont_atv' type='checkbox' value='1'></td>";
				  }
			  ?></td>
			  <td id="t_td">Contestações supervisor</td><?php 
			  if ($contestacoes_sup_atv == '1'){
			  echo  "<td id='t_td'><input name='cont_sup_atv' type='checkbox' value='1' checked></td>";
				  }if ($contestacoes_sup_atv == '0' || $contestacoes_sup_atv == ''){
			  echo  "<td id='t_td'><input name='cont_sup_atv' type='checkbox' value='1'></td>";
				  }
			  ?></td>
                  </tr>
                
             
                <tr>
                  <td id="t_td" colspan="8"><hr><strong><br />Cadastro Funcionários</strong></td></tr>
                  <tr>
              <td id="t_td">Contestações operador</td><?php 
			  if ($cadastro_func == '1'){
			  echo  "<td id='t_td'><input name='cadastro_func' type='checkbox' value='1' checked></td>";
				  }if ($cadastro_func == '0' || $cadastro_func == ''){
			  echo  "<td id='t_td'><input name='cadastro_func' type='checkbox' value='1'></td>";
				  }
			  ?></td>
			  
                  </tr>   
                
                
                  
              </table>
              
              <table id="table_conteudo"  align="center" border="0">
              <tr>
              <td id="t_td"><br/><br/></td>
              <td id="t_td"><hr><input name="Enviar" type="submit" value="enviar" class="botao_padrao"/><br /></td>
              <td id="t_td"><hr><input type="button" name="Submit2" value="Voltar" class="botao_padrao" onclick="javascript: history.go(-1);"><br /></td>
              </tr>
              
              </table>
                    
</form>
        
        </div>
    </div>
</div>
<?php $_SESSION["bi"] = "1";	?>
</body>
</html>