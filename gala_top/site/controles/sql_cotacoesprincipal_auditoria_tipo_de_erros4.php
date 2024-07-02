<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  

 include("../../bd.php");


 $login_operador;


if(empty($_POST['login_operadores_aud']) || empty($_POST['id_filtro3'])){ 

echo "<script>
      alert('Por favor selecionar turno e operador .'); 
      history.back(); 

      </script>\n";
  exit;

}


else
{



   $sql_valida = "SELECT id_cotacao,id_auditoria    
                             FROM tbl_auditoria
                             WHERE id_auditoria = '$id_auditoria' ";
                   
              $acao_valida = mysql_query($sql_valida) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $id_auditoria = $linha_status_cip['id_auditoria'];
              $id_cotacao = $linha_status_cip['id_cotacao'];
          
  //Monta SQL para INSERT
        $sql_inserir ="INSERT INTO tbl_erros_cotacao(id_cotacao,
                                                     id_auditoria,
                                                     ofensor,
                                                     colaborador,
                                                     tipo_erro,
                                                     acao_auditoria,
                                                     descricao_erro)
                                                VALUES('$id_cotacao',
                                                       '$id_auditoria',
                                                       '{$_POST['ofensor']}',
                                                       '{$_POST['login_operadores_aud']}',
                                                       '{$_POST['id_filtro2']}',
                                                       '{$_POST['acao']}',
                                                       '{$_POST['descricao_erro']}'
                                                       )";
        $result = mysql_query($sql_inserir) or die(mysql_error()); 
    
}	

echo "<script>alert('Erro cadastrado com sucesso !'); 
	    document.location.replace('../forms/form_cotacoes_auditoria_tipo_de_erros.php?id_auditoria={$id_auditoria}');
      </script>\n";
	exit;



?>	


</body>
</html>