<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  

 include("../../bd.php");


 $login_operador;


if(empty($_POST['login_operadores']) || empty($_POST['id_filtro'])){ 

echo "<script>
      alert('Por favor selecionar turno e operador .'); 
      history.back(); 

      </script>\n";
  exit;

}


else
{


$sql_valida = "SELECT a.id_auditoria_filha,
                      a.id_cotacao,
                      b.id_cotacao,
                      c.n_da_cotacao,
                      d.id_auditoria,
                      a.id_cotacao_filha     
                             FROM cip_nv.tbl_auditoria_filha a
                             INNER JOIN cip_nv.tbl_cotacao b 
                             ON b.id_cotacao=a.id_cotacao
                             INNER JOIN cip_nv.tbl_filhas c 
                             ON c.id_cotacao=a.id_cotacao_filha
                             INNER JOIN cip_nv.tbl_auditoria d 
                             ON d.id_cotacao=a.id_cotacao
                             WHERE a.id_auditoria_filha = '$id_auditoria_filha' ";
                   
              $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $id_auditoria_filha = $linha_status_cip['id_cotacao_filha'];
              $id_auditoria = $linha_status_cip['id_auditoria'];
              $id_cotacao = $linha_status_cip['id_cotacao'];
              $n_da_cotacao = $linha_status_cip['n_da_cotacao'];

  //Monta SQL para INSERT
        $sql_inserir ="INSERT INTO cip_nv.tbl_erros_cotacao(id_cotacao,
                                                     id_cotacao_filha,
                                                     id_auditoria,
                                                     ofensor,
                                                     colaborador,
                                                     tipo_erro,
                                                     acao_auditoria,
                                                     descricao_erro)
                                                VALUES('$id_cotacao',
                                                       '$id_auditoria_filha', 
                                                       '$id_auditoria',
                                                       '{$_POST['ofensor']}',
                                                       '{$_POST['login_operadores']}',
                                                       '{$_POST['id_filtro2']}',
                                                       '{$_POST['acao']}',
                                                       '{$_POST['descricao_erro']}'
                                                       )";
        $result = mysql_query($sql_inserir,$conecta) or die(mysql_error()); 
    
}	

echo "<script>alert('Erro cadastrado com sucesso !'); 
	    document.location.replace('../forms/form_cotacoes_auditoria_tipo_de_erros.php?id_auditoria={$id_auditoria}');
      </script>\n";
	exit;


 mysql_free_result($consulta,$result,$acao_valida);
 mysql_close($conecta);

	
?>	


</body>
</html>
