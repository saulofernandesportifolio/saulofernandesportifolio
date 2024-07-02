<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  

 //include("../../bd.php");



//echo '<br>';

if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhuma cotacao complementar selecionada.'); window.history.go(-1); </script>\n";
	exit;
}

if (empty($_POST['cotacaovinculo']))
{
  echo "<script>alert('Nenhuma cotacao principal selecionada.'); window.history.go(-1); </script>\n";
  exit;
}

else
{
 foreach($_POST["ling"] as $id_cotacao)
{  




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
                         a.analise_principal='OK',
                         a.id_complementar_da_principal='{$_POST['cotacaovinculo']}' 

          WHERE a.TIPO_COTACAO='Complementar' AND a.id_cotacao='$id_cotacao'  ";

          $result3= mysql_query($query2,$conecta);


      $selectinput2="SELECT * FROM cip_nv.tbl_auditoria A 
                                 INNER JOIN cip_nv.tbl_cotacao b 
                                 ON A.id_cotacao=b.id_cotacao 
                                 WHERE b.id_complementar_da_principal='{$_POST['cotacaovinculo']}'  
                                 AND b.substatus_da_cotacao='Analise de input' AND b.id_cotacao='$id_cotacao'";
                  $consulta_selectinput2= mysql_query($selectinput2,$conecta) or die (mysql_error());
                  $numfcaud2= mysql_num_rows($consulta_selectinput2); 
                             
                
             
                       
       
      if($numfcaud2 == 0 ){

                 $selectinputf="SELECT b.id_cotacao,b.id_complementar_da_principal 
                                    FROM cip_nv.tbl_cotacao b 
                                    WHERE b.id_complementar_da_principal='{$_POST['cotacaovinculo']}' 
                                     AND b.id_cotacao='$id_cotacao' ";
                  $consulta_selectinputf= mysql_query($selectinputf,$conecta) or die (mysql_error());

                     $linhainputp22= mysql_fetch_assoc($consulta_selectinputf); 
                     $idfilha=$linhainputp22['id_cotacao'];  

   
                $sql_inserir ="INSERT INTO cip_nv.tbl_auditoria(id_cotacao,
                                                            status_cip_auditoria,
                                                            disc_status_cip_auditoria,
                                                            setor)
                                                            VALUES('$idfilha',
                                                                   '13',
                                                                   'Distribuir',
                                                                   'Auditoria')";
                   $result = mysql_query($sql_inserir,$conecta) or die(mysql_error());

      }   //echo '<br />';            


   }



   

  echo "<script>
         alert('Vinculadas com sucesso elas aparecerão automaticamente na fila distribuição analise de input.'); 
	                document.location.replace('principal.php?&t=forms/formconsulta_cotacoes_vinculo.php');
                  </script>\n";
	exit;

}

mysql_free_result($acao_valida,$result3,$result);
mysql_close($conecta);
mysql_next_result($conecta);


?>	


</body>
</html>