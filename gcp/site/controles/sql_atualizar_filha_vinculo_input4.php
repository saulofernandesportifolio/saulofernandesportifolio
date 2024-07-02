<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  

 //include("../../bd.php");


 $login_operador;

echo '<br>';

if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhuma cotacao complementar selecionada.'); window.history.go(-1); </script>\n";
	exit;
}elseif (empty($_POST['cotacaovinculo']))
{
  echo "<script>alert('Nenhuma cotacao principal selecionada.'); window.history.go(-1); </script>\n";
  exit;
}

  
foreach($_POST["ling"] as $id_cotacao22)
 {  

  /*
  echo '<br>';echo '<br>';echo '<br>';
  echo $id_cotacao22;
  echo '<br>';*/

                   $selectinput="SELECT * FROM cip_nv.tbl_input A 
                               INNER JOIN cip_nv.tbl_cotacao b 
                               ON b.id_cotacao=a.id_cotacao 
                               AND b.substatus_da_cotacao='Analise de input' AND b.substatus_da_cotacao <> 'Input'
                               WHERE a.id_cotacao='{$_POST['cotacaovinculo']}'

                                 ";
                  $consulta_selectinput= mysql_query($selectinput,$conecta) or die (mysql_error());
                  $numfc= mysql_num_rows($consulta_selectinput); 

             if($numfc > 0){
 
       
                   $linha_input = mysql_fetch_array($consulta_selectinput);
              
                   $sql_inserir ="INSERT INTO cip_nv.tbl_auditoria(id_cotacao,
                                                            status_cip_auditoria,
                                                            disc_status_cip_auditoria,
                                                            setor)
                                                            VALUES('$id_cotacao22',
                                                                   '13',
                                                                   'Distribuir',
                                                                   'Auditoria')";
                   $result = mysql_query($sql_inserir,$conecta) or die(mysql_error()); 

                 

                  $selectinput1="SELECT * FROM cip_nv.tbl_input A 
                                 INNER JOIN cip_nv.tbl_cotacao b 
                                 ON b.id_cotacao='{$linha_input['id_cotacao']}' 
                                 AND b.substatus_da_cotacao='Analise de input' 
                                 AND b.substatus_da_cotacao <> 'Input'
                                  ";
                  $consulta_selectinput1= mysql_query($selectinput1,$conecta) or die (mysql_error());
                  $numfc1= mysql_num_rows($consulta_selectinput1); 
                  $linha_input1 = mysql_fetch_array($consulta_selectinput1);

                     $sql_inserir1 ="UPDATE cip_nv.tbl_input 
                                     SET status_cip_input=9,
                                         disc_status_cip_input='Enviar para Análise Input',
                                         obs_input='{$linha_input1['obs_input']}',
                                         motivo_da_acao=7,
                                         disc_motivo_da_acao='Input realizado',
                                         idtbl_usuario_input='{$linha_input1['idtbl_usuario_input']}',
                                         dt_distribuicao='{$linha_input1['dt_distribuicao']}',
                                         dt_tratamento_input='{$linha_input1['dt_tratamento_input']}',
                                         hora_tratamento_input='{$linha_input1['hora_tratamento_input']}',
                                         setor='Input' 
                                      WHERE id_cotacao= '{$linha_input['id_cotacao']}' ";
                     $result1 = mysql_query($sql_inserir1,$conecta) or die(mysql_error());
            
              
             }


             $sql_valida = "SELECT * FROM cip_nv.tbl_cotacao
                             WHERE id_cotacao = '{$_POST['cotacaovinculo']}' ";
                   
              $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());   
              $linhap= mysql_fetch_array($acao_valida);
    

              $query2="UPDATE cip_nv.tbl_cotacao a SET 
                         a.ALTAS          ='{$linhap['ALTAS']}',
                         a.PORTABILIDADE2 ='{$linhap['PORTABILIDADE2']}',
                         a.MIGRACAO       ='{$linhap['MIGRACAO']}',
                         a.TROCAS         ='{$linhap['TROCAS']}',
                         a.TT             ='{$linhap['TT']}',
                         a.BACKUP         ='{$linhap['BACKUP']}',
                         a.M_2_M          ='{$linhap['M_2_M']}',
                         a.FIXA           ='{$linhap['FIXA']}',
                         a.PRE_POS        ='{$linhap['PRE_POS']}', 
                         a.MIGRACAO_TROCA ='{$linhap['MIGRACAO_TROCA']}',
                         a.total_linhas_cip ='{$linhap['total_linhas_cip']}',
                         a.visao_ilha      ='{$linhap['visao_ilha']}',
                         a.vencimento_ilha ='{$linhap['vencimento_ilha']}',
                         a.dia             ='{$linhap['dia']}',
                         a.TEMPO           ='{$linhap['TEMPO']}',
                         a.TIPO_PROCESSO   ='{$linhap['TIPO_PROCESSO']}',
                         a.TIPO_DE_LINHA   ='{$linhap['TIPO_DE_LINHA']}',
                         a.SLA_DIAS        ='{$linhap['SLA_DIAS']}',
                         a.PRAZO_DIAS      ='{$linhap['PRAZO_DIAS']}', 
                         a.VENCIMENTODIAS  ='{$linhap['VENCIMENTODIAS']}', 
                         a.segmento        ='{$linhap['segmento']}',
                         a.carteira        ='{$linhap['carteira']}',
                         a.TIPO_SERVICO    ='{$linhap['TIPO_SERVICO']}', 
                         a.id_complementar_da_principal='{$_POST['cotacaovinculo']}',
                         a.analise_principal='OK'  

              WHERE a.TIPO_COTACAO='Complementar' AND a.id_cotacao='$id_cotacao22' ";
              $result3 = mysql_query($query2,$conecta) or die(mysql_error());
           
}

 

 /*  echo "<script>
         alert('Vinculadas com sucesso !'); 
           document.location.replace('principal.php?&t=forms/formconsulta_cotacoes_vinculo2.php');
         </script>";
  //exit();*/
 

   echo "<script>
            alert('Vinculadas com sucesso !'); 
             document.location.replace('principal.php?&t=forms/formatualizar_filhas_vinculo_input2.php');
         </script>";
   exit();

   

 mysql_free_result($acao_valida,$result3);
 mysql_close($conecta);  

?>	


</body>
</html>
