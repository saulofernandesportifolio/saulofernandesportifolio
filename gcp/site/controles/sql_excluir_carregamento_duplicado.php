<?php

/**
 * @author Saulo de Assis
 * @copyright 2015
 */



    $query= "SELECT * FROM cip_nv.tbl_usuarios WHERE perfil = 1 and idtbl_usuario = '$idtbl_usuario '";
    $acao_atv=mysql_query($query,$conecta);
    
    while($linha_user = mysql_fetch_assoc($acao_atv))
    {
    $login	=	$linha_user["usuario"];
    $nome   =	$linha_user["nome"];
    $canal =  $linha_user["tramite"]; 
    //$situacao = $linha_op["situacao"];
    $usuario="$login";
    //$regional2 = $linha_user["regional"];	
    }	

    $sql_atualiza2 ="SELECT * FROM cip_nv.tbl_cotacao a 
                    INNER JOIN cip_nv.tbl_analise b
                    ON a.id_cotacao=b.id_cotacao
                     WHERE b.status_cip_analise = 2 ";
    $acao_atualiza2 = mysql_query($sql_atualiza2,$conecta) or die (mysql_error());
    while($linha_atualiza2 = mysql_fetch_assoc($acao_atualiza2))
    { 
        $id_cotacao2 = $linha_atualiza2['id_cotacao'];
   
    
    $sql = "DELETE FROM cip_nv.tbl_analise
    WHERE id_cotacao='$id_cotacao2'
    and status_cip_analise = 2";
    
    $acao = mysql_query($sql,$conecta) or die (mysql_error());
    
	  $sql = "DELETE FROM cip_nv.tbl_cotacao 
    WHERE id_cotacao='$id_cotacao2'";
    
    $acao = mysql_query($sql,$conecta) or die (mysql_error());

      }
 

     echo "<script type=\"text/javascript\">
          alert('Base Excluida!');
          </script>
          <script type=\"text/javascript\">
          alert('Favor carregar novamente!');
          document.location.replace('principal.php?t=forms/formdistribuicao_atualiza_servico.php');
               
		   </script>
       ";
    

mysql_free_result($acao_atv,$acao_atualiza2,$acao);
mysql_close($conecta);
mysql_next_result($conecta);
    


?>
