<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  
  $dt_tratamento_chamado=date("Y-m-d");
  $hora_tratamento_chamado=date("H:i:s");

  $login_operador;



if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhuma atividade selecionada.'); window.history.go(-1); </script>\n";
	exit();
}

foreach($_POST["ling"] as $id_chamado)
{


   echo  $sql_update1 = "UPDATE cip_nv.tbl_chamado 
                   SET
                    status_cip_chamado =32,
                    disc_status_cip_chamado='Chamado solucionado',
                    obs_chamado='{$_POST['obs_chamadogeral']}',
                    motivo_da_acao=25,
                    disc_motivo_da_acao='Chamado solucionado',
                    dt_tratamento_chamado='$dt_tratamento_chamado',
                    hora_tratamento_chamado='$hora_tratamento_chamado'
            
	WHERE id_chamado = '$id_chamado'";
	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error()); 
  
   $select="SELECT * FROM cip_nv.tbl_chamado WHERE id_chamado='$id_chamado'"; 
   $acao_select = mysql_query($select,$conecta) or die (mysql_error());
   $linha_select = mysql_fetch_assoc($acao_select);
   
   $linha_select['setor_origem'];
   
   
if( $linha_select['setor_origem'] == 'Analise'){

       $sqlch="SELECT * FROM cip_nv.tbl_chamado 
        WHERE id_chamado = '$id_chamado' 
        AND setor_origem='Analise' 
        AND (status_cip_chamado=30 OR status_cip_chamado=33 OR status_cip_chamado=31 )  ";
        $resultch = mysql_query($sqlch,$conecta) or die(mysql_error());
        $numch= mysql_num_rows($resultch);

   if($numch == 0){
       
       
      $sql_inserir3 ="INSERT INTO cip_nv.tbl_analise(id_cotacao,
                                                status_cip_analise,
                                               disc_status_cip_analise,
                                               setor)
                                                VALUES('{$linha_select['id_cotacao']}',
                                                       '3',
                                                       'Retorno chamado',
                                                       'Analise'
                                                       )";
      $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
    }
              
       
}
   
   
if( $linha_select['setor_origem'] == 'Input'){
  
        $sqlch="SELECT * FROM cip_nv.tbl_chamado 
        WHERE id_chamado = '$id_chamado' 
        AND setor_origem='Input' 
        AND (status_cip_chamado=30 OR status_cip_chamado=33 OR status_cip_chamado=31 )  ";
        $resultch = mysql_query($sqlch,$conecta) or die(mysql_error());
        $numch= mysql_num_rows($resultch);

      if($numch == 0){
       
         $sql_inserir3 ="INSERT INTO cip_nv.tbl_input(id_cotacao,
                                                status_cip_input,
                                               disc_status_cip_input,
                                               setor)
                                                VALUES('{$linha_select['id_cotacao']}',
                                                       '7',
                                                       'Retorno chamado',
                                                       'Input'
                                                       )";
         $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
        }
           
       
}
  
   if( $linha_select['setor_origem'] == 'Auditoria'){
       
  
        $sqlch="SELECT * FROM cip_nv.tbl_chamado 
        WHERE id_chamado = '$id_chamado' 
        AND setor_origem='Input' 
        AND (status_cip_chamado=30 OR status_cip_chamado=33 OR status_cip_chamado=31 )  ";
        $resultch = mysql_query($sqlch,$conecta) or die(mysql_error());
        $numch= mysql_num_rows($resultch);

      if($numch == 0){       
       
         $sql_inserir3 ="INSERT INTO cip_nv.tbl_auditoria(id_cotacao,
                                                status_cip_auditoria,
                                               disc_status_cip_auditoria,
                                               setor)
                                                VALUES('{$linha_select['id_cotacao']}',
                                                       '13',
                                                       'Retorno chamado',
                                                       'Auditoria'
                                                       )";
         $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
      }
       
   } 
   
   if( $linha_select['setor_origem'] == 'Correcao'){
       
  
        $sqlch="SELECT * FROM cip_nv.tbl_chamado 
        WHERE id_chamado = '$id_chamado' 
        AND setor_origem='Correcao' 
        AND (status_cip_chamado=30 OR status_cip_chamado=33 OR status_cip_chamado=31 )  ";
        $resultch = mysql_query($sqlch,$conecta) or die(mysql_error());
        $numch= mysql_num_rows($resultch);

      if($numch == 0){        
       
       
          $sql_inserir3 ="INSERT INTO cip_nv.tbl_correcao(id_cotacao,
                                                status_cip_correcao,
                                               disc_status_cip_correcao,
                                               setor)
                                                VALUES('{$linha_select['id_cotacao']}',
                                                       '20',
                                                       'Retorno chamado',
                                                       'Correcao'
                                                       )";
           $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
      }
          
       
       
   }
   
  if( $linha_select['setor_origem'] == 'Swap'){
          
        $sqlch="SELECT * FROM cip_nv.tbl_chamado 
        WHERE id_chamado = '$id_chamado' 
        AND setor_origem='Correcao' 
        AND (status_cip_chamado=30 OR status_cip_chamado=33 OR status_cip_chamado=31 )  ";
        $resultch = mysql_query($sqlch,$conecta) or die(mysql_error());
        $numch= mysql_num_rows($resultch);

      if($numch == 0){
          
          
         $sql1 = "SELECT * FROM cip_nv.tbl_swap   
                 WHERE id_swap='{$linha_select['id_cotacao']}' ";
         $consulta1 = mysql_fetch_assoc(mysql_query($sql1)) or die(mysql_error().$sql1." erro #SQL_2A");
 
         $cotacaopedido=$consulta1['cotacaopedido']; 
         $data_da_solicitacao=$consulta1['data_da_solicitacao'];
         $hora_da_solicitacao=$consulta1['hora_da_solicitacao'];
         $regional=$consulta1['regional'];
         $uf=$consulta1['uf'];
         $status=$consulta1['status'];
         $data_da_tratativa_do_swap=$consulta1['data_tratativa_swap'];
         $solicitante=$consulta1['solicitante'];
         $gerente_de_contas=$consulta1['remetente'];
         $total_de_linhas=$consulta1['tllinhas'];
         $total_de_linhas_swap=$consulta1['tlswap'];
         $de_aparelho_inicial=$consulta1['de_aparelho_inicial'];
         $de_qtd =$consulta1['de_qtd'];
         $para_aparelho_final=$consulta1['para_aparelho_final'];
         $para_qtd =$consulta1['para_qtd'];
         $carteira=$consulta1['carteira'];
         $adabas=$consulta1['adabas'];
         $hora_tratativa_swap=$consulta1['hora_tratativa_swap']; 
         $login_operadores_swap=$consulta1['login_operadores_swap'];
         $turno=$consulta1['turno'];
         $remetente=$consulta1['remetente'];
         $swap=$consulta1['swap'];
         $sp2=$consulta1['sp2'];
         $statuscip=5;
         $revisao_swap=$consulta1['revisao_swap'];
         $emailsolicitacao=$consulta1['emailsolicitacao'];
         $retornoemail=$consulta1['retornoemail'];
 
         //atualiza status do swap
         $sql_update="UPDATE cip_nv.tbl_swap a 
                      SET a.statuscip=5,
                          a.operador_swap='$login_operadores_swap'
                 
                      WHERE a.id_swap='{$linha_select['id_cotacao']}' ";
         $acao_update= mysql_query($sql_update,$conecta) or die (mysql_error());




          $query="INSERT INTO cip_nv.tbl_swap_historico (cotacaopedido,
                             data_da_solicitacao,
                             hora_da_solicitacao, 
                             regional,
                             status,
                             data_da_tratativa_do_swap,
                             gerente_de_contas,
                             total_de_linhas,
                             total_de_linhas_swap,
                             de_aparelho_inicial,
                             de_qtd,
                             para_aparelho_final,
                             para_qtd,
                             uf,
                             carteira,
                             adabas, 
                             hora_da_tratativa_swap, 
                             login_operadores_swap,
                             turno,
                             solicitante,     
                             remetente,
                             swap,
                             sp2,
                             emailsolicitacao,
                             retornoemail,
                             operador_swap,
                             TMT,
                             statuscip,
                             revisao_swap,
                             data_tratamento_swap_cip,
                             hora_tratamento_swap_cip)VALUES(
				  '$cotacaopedido',
                                  '$data_da_solicitacao',
                                  '$hora_da_solicitacao', 
                                  '$regional',
                                  '$status',
                                  '$data_da_tratativa_do_swap',
                                  '$gerente_de_contas',
                                  '$total_de_linhas',
                                  '$total_de_linhas_swap',
                                  '$de_aparelho_inicial',
                                  '$de_qtd',
                                  '$para_aparelho_final',
                                  '$para_qtd',
                                  '$uf',
                                  '$carteira',
                                  '$adabas', 
                                  '$hora_tratativa_swap', 
                                  '$login_operadores_swap',
                                  '$turno',
                                  '$solicitante',
                                  '$remetente',
                                  '$swap',
                                  '$sp2',
                                  '$emailsolicitacao',
                                  '$retornoemail',
                                  '{$_POST['login_operador_chamado']}',   
				  '$total2',
                                  '$statuscip',
                                  '$revisao_swap',
                                  '$dt_dia',
                                  '$hora_dia')";


          $result=mysql_query($query,$conecta) or die(mysql_error().$sql." erro #SQL_3");
       
        }
    }





     $sql_user = "SELECT idtbl_usuario,nome FROM cip_nv.tbl_usuarios 
					WHERE idtbl_usuario = '{$_POST['login_operador_chamado']}' ";
 	
      $acao_user = mysql_query($sql_user,$conecta) or die (mysql_error());

       while($linha_user= mysql_fetch_array($acao_user)){
 
             $user_distribuicao=$linha_user['nome'];   
    
        }	

      echo "<script>alert('Cotacoes com status Chamado solucionado !'); 
                    document.location.replace('principal.php?t=forms/formfiltro_solucionar_chamadogeral.php');
            </script>\n";
	exit();
  

}


mysql_free_result($acao_user,$acao_update1,$acao_operador);
mysql_close($conecta);
mysql_next_result($conecta);

?>	


</body>
</html>