<?php
include('conexao.php');//conecta banco de dado
 @session_start();
 ?>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <body background="img/background.JPG">
 <?php
 //monta a consulta sql
 $query = "SELECT * FROM usuarios
		   WHERE login ='{$_POST['usuario']}' AND
		         senha =('{$_POST['senha']}')";
				
 //envia a consulta sql para MySQL
 $result= mysql_query($query,$conecta);
 
 //conta quantas linhas foram retornadas
 //qualquer coisa diferente de 1 nega o acesso
 if(mysql_num_rows($result) != 1){
   echo"
       <script type=\"text/javascript\">
        alert('Usuário ou senha inválidos!');
		 document.location.replace('index.php');
        </script>
 ";
  exit();
   }
   //pega o resultado da consulta sql e devolve como um array
   $dado= mysql_fetch_array($result);
   
   //cria a sessão de controle do sistema
   //session_name('SISTEMA');
   
   
   $_SESSION["valida"] = 1;
   $_SESSION["diretoria_input"] = $dado["diretoria_input"];
   $_SESSION["erros_bko"] = $dado["erros_bko"];
   $_SESSION["sap_bko"] = $dado["sap_bko"];
   $_SESSION["pn_bko"] = $dado["pn_bko"];
   $_SESSION["pesquisa"]= $dado["pesquisa"];
   $_SESSION["controle_atividades"] = $dado["controle_atividades"]; 
   $_SESSION["reversao_ind_bko"] = $dado["reversao_ind_bko"];
   $_SESSION["vpe_vpg"] = $dado["vpe_vpg"];
   $_SESSION["carrega_base_pn"] = $dado["carrega_base_pn"];
   $_SESSION["ADM_REVERSAO_IND"] = $dado["adm_reversao_ind"];
   $_SESSION["ADM_PN"] = $dado["adm_pn"];
   $_SESSION["carrega_base_sap"] = $dado["carrega_base_sap"];
   $_SESSION["bi"] = $dado["bi"];
   $_SESSION["adm_erros"] = $dado["adm_erros"];
   $_SESSION["carrega_base_erros"] = $dado["carrega_base_erros"];  
   $_SESSION["operador_direto"]= $dado["operador_direto"];
   $_SESSION["supervisor_direto"]= $dado["supervisor_direto"];
   $_SESSION["carrega_base_direto"]= $dado["carrega_base_direto"];
   $_SESSION["NOTICIAS"] = $dado["noticias"];
   $_SESSION["operador_gestao"]= $dado["operador_gestao"];   
   $_SESSION["supervisor_gestao"]= $dado["supervisor_gestao"];
   $_SESSION["carregar_base_gestao"]= $dado["carregar_base_gestao"];
   $_SESSION["SUP_SAP"] = $dado["sup_sap"];
   $_SESSION["SUP_PN"] = $dado["sup_pn"];
   $_SESSION["carrega_base_indireto"] = $dado["carrega_base_indireto"];
   $_SESSION["prioriza_direto"] = $dado["prioriza_direto"];
   $_SESSION["prioriza_indireto"] = $dado["prioriza_indireto"];
   $_SESSION["prioriza_erros"] = $dado["prioriza_erros"];
   $_SESSION["diretoria_sup"] = $dado["diretoria_sup"];
   $_SESSION["treinamento_sup"] = $dado["treinamento_sup"];
   $_SESSION["treinamento"] = $dado["treinamento"];
   
   $_SESSION["tsa"] = $dado["tsa"];
   $_SESSION["contestacoes"] = $dado["contestacoes"];
   $_SESSION["contestacoes_sup"] = $dado["contestacoes_sup"];
   $_SESSION["contestacoes_atv"] = $dado["contestacoes_atv"];
   $_SESSION["contestacoes_atv_sup"] = $dado["contestacoes_atv_sup"];
   
   $_SESSION["cadastro_func"] = $dado["cadastro_func"];
   
   $_SESSION["nome"]= $dado["nome"];
   $_SESSION["login"]= $dado["login"];
   $_SESSION["turno"]= $dado["turno"];
   
   //redireciona para a tela principal do sistema
   header("Location:home.php");   


?>
</body>