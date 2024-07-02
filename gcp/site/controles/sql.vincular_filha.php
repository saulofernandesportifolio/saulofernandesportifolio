<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Untitled Document</title>
</head>

<body>

<?php

$tempo = 0;

set_time_limit($tempo);



 $query_linhas= "SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
                a.ALTAS,
                a.PORTABILIDADE2,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,
                a.PRE_POS,
                a.MIGRACAO_TROCA,                 
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.segmento,
                a.VENCIMENTODIAS
                 FROM cip_nv.tbl_cotacao a 
                     INNER JOIN cip_nv.tbl_analise b
                     ON a.id_cotacao=b.id_cotacao
                          WHERE b.id_cotacao='$id_cotacao3' AND a.TIPO_COTACAO='Principal' GROUP BY a.id_cotacao  ";

       $consulta_servico = mysql_query($query_linhas,$conecta) or die (mysql_error());

       $num=mysql_num_rows( $consulta_servico);

while($linha_query1 = mysql_fetch_array($consulta_servico)){
       
        $id_cotacao2   = $linha_query1["id_cotacao"];
        $cotacao_principal  = $linha_query1["cotacao_principal"];
        $revisao              = $linha_query1["REVISAO_PRINCIPAL"];
        $ALTAS                = $linha_query1['ALTAS'];
        $PORTABILIDADE        = $linha_query1['PORTABILIDADE2'];
        $MIGRACAO             = $linha_query1['MIGRACAO'];
        $TROCAS               = $linha_query1['TROCAS'];
        $TT                   = $linha_query1['TT'];
        $BACKUP               = $linha_query1['BACKUP'];
        $M_2_M                = $linha_query1['M_2_M'];
        $FIXA                 = $linha_query1['FIXA'];
        $PRE_POS              = $linha_query1["PRE_POS"]; 
        $MIGRACAO_TROCA       = $linha_query1["MIGRACAO_TROCA"];
        $visao_lha            = $linha_query1["visao_ilha"];
        $dia                  = $linha_query1["dia"];
        $vencimento_ilha      = $linha_query1["vencimento_ilha"];
        $TEMPO                = $linha_query1["TEMPO"]; 
        $TIPO_PROCESSO        = $linha_query1["TIPO_PROCESSO"];
        $TIPO_DE_LINHA        = $linha_query1["TIPO_DE_LINHA"]; 
        $SLA_DIAS             = $linha_query1["SLA_DIAS"];
        $PRAZO_DIAS           = $linha_query1["PRAZO_DIAS"];
        $total_linhas_cip     = $linha_query1["total_linhas_cip"];
        $TIPO_COTACAO         = $linha_query1["TIPO_COTACAO"];
        //$segmento             = $linha_query1["segmento"];



       $query_principal="SELECT a.cotacao_principal,
                         SUBSTRING(a.criado_em,1,10) as criado_em,
                         c.dt_tratamento_analise as data_tratamento
         
                        FROM cip_nv.tbl_cotacao a 
                        INNER JOIN cip_nv.tbl_analise c 
                        ON a.id_cotacao=c.id_cotacao
                        WHERE a.n_da_cotacao = '$cotacao_principal' 
                        AND a.TIPO_COTACAO='Principal' 
                        GROUP BY a.revisao
                        UNION

                        SELECT a.cotacao_principal,
                         SUBSTRING(a.criado_em,1,10) as criado_em,
                         d.dt_tratamento_input as data_tratamento
         
                        FROM cip_nv.tbl_cotacao a 
                        INNER JOIN cip_nv.tbl_input d 
                        ON a.id_cotacao=d.id_cotacao
                        WHERE a.n_da_cotacao = '$cotacao_principal' 
                        AND a.TIPO_COTACAO='Principal' 
                        GROUP BY a.revisao
                        UNION

                        SELECT a.cotacao_principal,
                        SUBSTRING(a.criado_em,1,10) as criado_em,
                        e.dt_tratamento_auditoria as data_tratamento
        
                        FROM cip_nv.tbl_cotacao a 
                        INNER JOIN cip_nv.tbl_auditoria e
                        ON a.id_cotacao=e.id_cotacao
                        WHERE a.n_da_cotacao = '$cotacao_principal' 
                        AND a.TIPO_COTACAO='Principal' 
                        GROUP BY data_tratamento
                        UNION 

                        SELECT a.cotacao_principal,
                        SUBSTRING(a.criado_em,1,10) as criado_em,
                        f.dt_tratamento_correcao as data_tratamento
       
                        FROM cip_nv.tbl_cotacao a 
                        INNER JOIN cip_nv.tbl_correcao f
                        ON a.id_cotacao=f.id_cotacao
                        WHERE a.n_da_cotacao = '$cotacao_principal' 
                        AND a.TIPO_COTACAO='Principal' 
                        GROUP BY data_tratamento";
        $consulta_principal= mysql_query($query_principal,$conecta) or die (mysql_error());                                                       
 while($linha_princ = mysql_fetch_array($consulta_principal)){

        $cotacao_principalp    = $linha_princ["cotacao_principal"];
        $criado_emp            = $linha_princ["criado_em"];
        //echo '<br>';
        $data_tratamento      = $linha_princ["data_tratamento"];



         $query_complementar="SELECT a.cotacao_principal,
                                     a.n_da_cotacao,
                                     SUBSTRING(a.criado_em,1,10) as criado_em,
                                     a.TIPO_COTACAO,
                                     a.id_cotacao,
                                     a.substatus_da_cotacao
       
                             FROM cip_nv.tbl_cotacao a 
   
                              WHERE a.cotacao_principal = '$cotacao_principalp' 
                              AND TIPO_COTACAO='Complementar'  
                              GROUP BY criado_em ";
          $consulta_complementar= mysql_query($query_complementar,$conecta) or die (mysql_error());
          $numf= mysql_num_rows($consulta_complementar); 

   while($linha_comp = mysql_fetch_array($consulta_complementar)){
          $id_cotacaoc           = $linha_comp["id_cotacao"];
          $cotacao_principalc    = $linha_comp["cotacao_principal"];
          $criado_emc            = $linha_comp["criado_em"];
          $substatus_da_cotacao  = $linha_comp["substatus_da_cotacao"];
         //echo '<br>';

         if($criado_emc >= $criado_emp && $criado_emc <=$data_tratamento ){


                     
          $query2="UPDATE cip_nv.tbl_cotacao a SET 
                         a.ALTAS           ='{$linha_query1['ALTAS']}',
                         a.PORTABILIDADE2  ='{$linha_query1['PORTABILIDADE2']}',
                         a.MIGRACAO        ='{$linha_query1['MIGRACAO']}',
                         a.TROCAS          ='{$linha_query1['TROCAS']}',
                         a.TT              ='{$linha_query1['TT']}',
                         a.BACKUP          ='{$linha_query1['BACKUP']}',
                         a.M_2_M           ='{$linha_query1['M_2_M']}',
                         a.FIXA            ='{$linha_query1['FIXA']}',
                         a.PRE_POS         ='{$linha_query1['PRE_POS']}', 
                         a.MIGRACAO_TROCA  ='{$linha_query1['MIGRACAO_TROCA']}',
                         a.total_linhas_cip='{$linha_query1['total_linhas_cip']}',
                         a.visao_ilha      ='{$linha_query1['visao_ilha']}',
                         a.vencimento_ilha ='{$linha_query1['vencimento_ilha']}',
                         a.dia             ='{$linha_query1['dia']}',
                         a.TEMPO           ='{$linha_query1['TEMPO']}',
                         a.TIPO_PROCESSO   ='{$linha_query1['TIPO_PROCESSO']}',
                         a.TIPO_DE_LINHA   ='{$linha_query1['TIPO_DE_LINHA']}',
                         a.SLA_DIAS        ='{$linha_query1['SLA_DIAS']}',
                         a.PRAZO_DIAS      ='{$linha_query1['PRAZO_DIAS']}', 
                         a.VENCIMENTODIAS  ='{$linha_query1['VENCIMENTODIAS']}', 
                         a.segmento        ='{$linha_query1['segmento']}',
                         a.carteira        ='{$linha_query1['carteira']}',
                         a.TIPO_SERVICO    ='{$linha_query1['TIPO_SERVICO']}', 
                         a.id_complementar_da_principal='$id_cotacao2'
                         

                    WHERE a.TIPO_COTACAO='Complementar' AND a.id_cotacao='$id_cotacaoc'  ";

          $result3= mysql_query($query2,$conecta);
            if($numf > 0){ 

            /*  $selectinputA="SELECT * FROM cip_nv.tbl_input A 
                         INNER JOIN cip_nv.tbl_cotacao b 
                         ON b.id_cotacao='$id_cotacaoc' 
                         AND b.substatus_da_cotacao='Input' 
                         AND b.substatus_da_cotacao <> 'Analise de input' 
                         WHERE A.id_cotacao='$id_cotacao2' ";
              $consulta_selectinputA= mysql_query($selectinputA,$conecta) or die (mysql_error());
              $numfcA= mysql_num_rows($consulta_selectinputA); 
              while($linha_inputA = mysql_fetch_array($consulta_selectinputA)){

                 $sql_inserir ="INSERT INTO cip_nv.tbl_input(id_cotacao,
                                                       status_cip_input,
                                                       disc_status_cip_input,
                                                        setor)
                                                        VALUES('{$linha_inputA['id_cotacao']}',
                                                               '7',
                                                               'Distribuir',
                                                               'Input')";
                  $result = mysql_query($sql_inserir,$conecta) or die(mysql_error()); 

              }*/

                         
                 $selectinput="SELECT * FROM cip_nv.tbl_input A 
                               INNER JOIN cip_nv.tbl_cotacao b 
                               ON b.id_cotacao='$id_cotacaoc' 
                               AND b.substatus_da_cotacao='Analise de input'  
                              WHERE A.id_cotacao='$id_cotacao2' ";
                  $consulta_selectinput= mysql_query($selectinput,$conecta) or die (mysql_error());
                  $numfc= mysql_num_rows($consulta_selectinput); 
               
           

              while($linha_input = mysql_fetch_array($consulta_selectinput)){

                if($numfc == 0){
              
                   $sql_inserir ="INSERT INTO cip_nv.tbl_auditoria(id_cotacao,
                                                            status_cip_auditoria,
                                                            disc_status_cip_auditoria,
                                                            setor)
                                                            VALUES('{$linha_input['id_cotacao']}',
                                                                   '13',
                                                                   'Distribuir',
                                                                   'Auditoria')";
                   $result = mysql_query($sql_inserir,$conecta) or die(mysql_error()); 

                }  

              }
                /*$selectinput1="SELECT * FROM cip_nv.tbl_input A 
                                 INNER JOIN cip_nv.tbl_cotacao b 
                                 ON b.id_cotacao='$id_cotacaoc' 
                                 AND b.substatus_da_cotacao='Analise de input' 
                                 AND b.substatus_da_cotacao <> 'Input'
                                 WHERE A.id_cotacao='$id_cotacao2' ";
                  $consulta_selectinput1= mysql_query($selectinput1,$conecta) or die (mysql_error());
                  $numfc1= mysql_num_rows($consulta_selectinput1); 
              while($linha_input1 = mysql_fetch_array($consulta_selectinput1)){

                     $sql_inserir1 ="INSERT INTO cip_nv.tbl_input(id_cotacao,
                                               status_cip_input,
                                               disc_status_cip_input,
                                               obs_input,
                                               motivo_da_acao,
                                               disc_motivo_da_acao,
                                               idtbl_usuario_input,
                                               dt_distribuicao,
                                               dt_tratamento_input,
                                               hora_tratamento_input,
                                               setor)
                                                VALUES('{$linha_input1['id_cotacao']}',
                                                       '9',
                                                       'Enviar para Análise Input',
                                                       '{$linha_input1['obs_input']}',
                                                       '7',
                                                       'Input realizado',
                                                       '{$linha_input1['idtbl_usuario_input']}',
                                                       '{$linha_input1['dt_distribuicao']}',
                                                       '{$linha_input1['dt_tratamento_input']}',
                                                       '{$linha_input1['hora_tratamento_input']}',
                                                       'Input'
                                                       )";
                     $result1 = mysql_query($sql_inserir1,$conecta) or die(mysql_error()); 

               }*/

             
          
            }     


      }

    }

  }

}

  
?>

      
   </body>
</html>
