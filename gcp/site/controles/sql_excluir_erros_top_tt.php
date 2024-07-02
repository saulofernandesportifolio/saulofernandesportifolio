<?php

/**
 * @author Saulo de Assis
 * @copyright 2015
 */
   
   $id= (int) $_GET['id'];


    $query= "SELECT * FROM cip_nv.tbl_usuarios WHERE perfil = 1 and idtbl_usuario = '{$_COOKIE['idtbl_usuario']}'";
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

    $sql = "DELETE FROM bd_erros_pn.base_erros_top_tt 
    WHERE id=' $id' ";
     $acao_del = mysql_query($sql,$conecta2) or die (mysql_error());
    
 
 

     echo "<script type=\"text/javascript\">
          alert('Excluida da base !');
          document.location.replace('principal.php?t=forms/form_fila_cotacao_erros_top_tt.php');
               
		   </script>
       ";
    


mysql_free_result($acao_atualiza2,$acao,$acao_atv);
mysql_close($conecta,$conect2);
mysql_next_result($conecta,$conecta2);
    
?>
