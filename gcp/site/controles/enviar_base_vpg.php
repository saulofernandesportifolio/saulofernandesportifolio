
 <script type="text/javascript">
function showCarga()
               {
            document.getElementById('carga').style.display="block";
                }
        function hideCarga()
        {
            document.getElementById('carga').style.display="none";
        } 
   
   </script>

<div class="divformcarrega">
<div class="loading" id="carga">
<img class="imgloading" src="site/forms/img/carregando.gif">
</div>
<body onload="showCarga();">
<?php
    $tempo = 0;

  set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");


function tiraaspasimples($valor){
  $result = addslashes($valor);
  $virgula = "\'";
  $result2 = str_replace($virgula, ".", $result);
  return $result2;

  //echo $result;

}


  
function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"´]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}


function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,7,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."/".substr($string,7,2)."/".substr($string,0,2);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,6,4)."".substr($string2,7,2)."".substr($string2,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,6,4)."/".substr($string2,7,2)."/".substr($string2,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}


function corrigedatas($date){


  $dia=substr($date,0,2) ;
  $mes=substr($date,3,2);
  $ano=substr($date,6,4);

  /*data correta estiver correta */
  if(strlen($date) == 18)
  {
     
      $dia=substr($date,0,2);
      $mes=substr($date,2,2);
      $ano=substr($date,5,4);
      $hora=substr($date,10,9);
  } 
  /*data correta estiver correta */
  if(strlen($date) == 19)
  {
      $hora=substr($date,10,9);
  } 

  /*se a data não estivber correta*/ 
   if(strlen($date) == 17)
    {
        $dia=substr($date,0,2);
        $mes=substr($date,2,2);
        $ano=substr($date,4,4);
        $hora=substr($date,9,9);
    }

     /*realiza o tratamento do dia e mes*/
       if(substr($dia,1,1) == "/")
        {
          $dia='0'.substr($dia,0,1);
        }

 
        if(substr($mes,1,1) == "/" )
        {
          $mes='0'.substr($mes,0,1);
        }

        if(substr($mes,0,1) == "/" )
        {
          $mes='0'.substr($mes,1,1);
        }
        

   $date=$ano."-".$mes."-".$dia." ".$hora;

///echo '<br>';



 return $date;

}



  $data_inclusao_bd = date("Y/m/d H:i:s");
  $data_inclusao_bd2 = date("Y/m/d");
  $data_inclusao_bd2_mes = date("Y/m/d H:i:s");

 $data2 = date("d-m-Y"); 
 $h=date("H");
 $m=date("i");
 $s=date("s");

$data=$data2." ".$h."h-".$m."m-".$s."s";

$Y= date("Y");
$m=date("m");
$i='0';

for($i=0;$i< 3;$i++)

$m2=$m-$i;

if(strlen($m2) == 1)
{
$zero='0';
$m2= $zero.$m2;
}
else
{
    $m2;
}

$data3=$Y."-".$m2."-"."01";



//inicia conexão com o banco de dados
 include("../bd.php");
    $tempo = 0;
  set_time_limit($tempo);
  
ini_set ( 'mysql.connect_timeout' ,  '4000' ); 
ini_set ( 'default_socket_timeout' ,  '4000' );
ini_set('memory_limit', '-1'); 

//Pegar o nome temporário do arquivo a ser importado
$nome_temporario=$_FILES["file"]["tmp_name"]; 

$row = 0;
$handle = fopen ("$nome_temporario","r");
$valores = array();
while (($data = fgetcsv($handle,4096, ";")) !== FALSE) {
    if($row == 0){
        $cabecalhos = array();
        foreach($data as $idx=>$vlr){
           array_push($cabecalhos,$vlr);
           $cabecalhos[$idx]=preg_replace('/[^A-Za-z0-9\-\s]/', '',$vlr);
           //echo '<br>';
        }
        }else{        
          for($cont = 0;$cont < count($data);$cont++){
              $valores[$cabecalhos[$cont]]= $data[$cont]; 
             }
                        
           $legenda =array('Nmero da atividade'                =>'numero_da_atividade',
                             'Novo'                              =>'novo',
                             'Incio planejado'                   =>'inicio_planejado',
                             'Comentrios'                        =>'comentarios',
                             'Tipo'                              =>'tipo',
                             'Cliente'                           =>'cliente',
                             'Nmero do pedido'                   =>'numero_do_pedido',
                             'Status do pedido'                  =>'status_do_pedido',
                             'Sub-Status do pedido'              =>'sub_status_do_pedido',
                             'Reviso'                            =>'revisao',
                             'Data de criao do pedido'           =>'data_de_criacao_do_pedido',
                             'Data da ltima atualizao do pedido' =>'data_da_ultima_atualizacao_do_pedido',
                             'N da cotao'                        =>'n_da_cotacao',
                             'Status da cotao'                   =>'status_da_cotacao',
                             'Substatus da cotao'                =>'substatus_da_cotacao',
                             'Ao'                                =>'acao',
                             'Motivo da ao'                      =>'motivo_da_acao',
                             'Sub Motivo'                        =>'sub_motivo',
                             'Organizao SS'                      =>'organizacao_SS',
                             'Tipo de SS'                        =>'tipo_de_SS',
                             'Subtipo da SS'                     =>'subtipo_da_SS',
                             'N da SS'                           =>'n_da_SS',
                             'Status da SS'                      =>'status_da_SS',
                             'Substatus da SS'                   =>'substatus_da_SS',
                             'Vencimento'                        =>'vencimento',
                             'Prioridade'                        =>'prioridade',
                             'Status'                            =>'status',
                             'Cotao'                             =>'cotacao',
                             'Faturvel'                          =>'faturavel',
                             'Sobrenome'                         =>'sobrenome',
                             'Nome'                              =>'nome',
                             'Oportunidade'                      =>'oportunidade',
                             'Funcionrios'                       =>'funcionarios',
                             'Alarme'                            =>'alarme',
                             'Criado em'                         =>'criado_em',
                             'Criado por'                        =>'criado_por',
                             'Trmino efetivo'                    =>'termino_efetivo',
                             'Regional Atribuda'                 =>'regional_atribuida',
                             'Alta'                              =>'alta',
                             'Loja'                              =>'loja',
                             'Portabilidade'                     =>'portabilidade',
                             'Troca'                             =>'troca',
                             'Transferncia de titularidade'      =>'transferencia_de_titularidade',
                             'Itens especiais'                   =>'itens_especiais',
                             'Responsvel'                        =>'responsavel',
                             'Resultado Anlise Crdito'           =>'resultado_analise_credito',
                             'Descrio'                           =>'descricao',
                             'Nome do responsvel'                =>'nome_do_responsavel',
                             'Sobrenome do responsvel'           =>'sobrenome_do_responsavel',
                             'CPFCNPJ'                           =>'cpf_cnpj',
                             'Parecer Serasa'                    =>'parecer_serasa',
                             'Parecer Interno'                   =>'parecer_interno',
                             'Endereo de entrega'                =>'endereco_de_entrega',
                             'UF'                                =>'uf',
                             'Nome do Gestor'                    =>'nome_do_gestor',
                             'Adabas do GN'                      =>'adabas_do_gn', 
                             'Renegociao Massiva'                =>'renegociacao_massiva',
                             'Anlise na cotao'                   =>'analise_na_cotacao',
                             'Posio Solicitante da SS'           =>'posicao_solicitante_da_SS',
                             'Nvel alada'                        =>'nivel_alcada',
                             'Cotao Pai'                         =>'cotacao_pai',
                             'Cotao Principal'                   =>'cotacao_principal',
                             'OS Legado'                         =>'os_legado'
                           );

   
   
   
   foreach($valores as $idx => $vlr){
            
   $idx." - ";
              }
   
   
   
           /* for($i=0;$i< $idx;$i++){
                
             echo $legenda[$idx].'<br>'; 
   
              }
   
              /* for($cont2 = 0;$cont2 < count($legenda);$con++){
               $cont2; 
                             
                }
                              
               if($cont < $cont2){
                          
                 
                die("<script>alert('Base faltando colunas redefinir padroes no vivocorp tentar novamente!')
                             history.back();</script>");
                
                }*/
         
            
$cb='';
$dados='';
$naocarregar='';
     foreach($valores as $idx => $vlr){
            
              if($legenda[$idx] == 'numero_da_atividade' OR
                 $legenda[$idx] == 'novo' OR
                 $legenda[$idx] == 'inicio_planejado' OR
                 $legenda[$idx] == 'comentarios' OR
                 $legenda[$idx] == 'tipo' OR
                 $legenda[$idx] == 'cliente' OR
                 $legenda[$idx] == 'numero_do_pedido' OR
                 $legenda[$idx] == 'status_do_pedido' OR
                 $legenda[$idx] == 'sub_status_do_pedido' OR
                 $legenda[$idx] == 'revisao' OR
                 $legenda[$idx] == 'data_de_criacao_do_pedido' OR 
                 $legenda[$idx] == 'data_da_ultima_atualizacao_do_pedido' OR
                 $legenda[$idx] == 'n_da_cotacao' OR  
                 $legenda[$idx] == 'status_da_cotacao' OR 
                 $legenda[$idx] == 'substatus_da_cotacao' OR 
                 $legenda[$idx] == 'acao' OR
                 $legenda[$idx] == 'motivo_da_acao' OR
                 $legenda[$idx] == 'sub_motivo' OR 
                 $legenda[$idx] == 'organizacao_SS' OR
                 $legenda[$idx] == 'tipo_de_SS' OR 
                 $legenda[$idx] == 'subtipo_da_SS' OR 
                 $legenda[$idx] == 'n_da_SS' OR 
                 $legenda[$idx] == 'status_da_SS' OR
                 $legenda[$idx] == 'substatus_da_SS' OR 
                 $legenda[$idx] == 'vencimento' OR
                 $legenda[$idx] == 'prioridade' OR 
                 $legenda[$idx] == 'status' OR 
                 $legenda[$idx] == 'cotacao' OR 
                 $legenda[$idx] == 'faturavel' OR
                 $legenda[$idx] == 'sobrenome' OR 
                 $legenda[$idx] == 'nome' OR
                 $legenda[$idx] == 'oportunidade' OR
                 $legenda[$idx] == 'funcionarios' OR 
                 $legenda[$idx] == 'alarme' OR 
                 $legenda[$idx] == 'criado_em' OR 
                 $legenda[$idx] == 'criado_por' OR
                 $legenda[$idx] == 'termino_efetivo' OR 
                 $legenda[$idx] == 'regional_atribuida' OR 
                 $legenda[$idx] == 'alta' OR 
                 $legenda[$idx] == 'loja' OR 
                 $legenda[$idx] == 'portabilidade' OR 
                 $legenda[$idx] == 'troca' OR 
                 $legenda[$idx] == 'transferencia_de_titularidade' OR 
                 $legenda[$idx] == 'itens_especiais' OR 
                 $legenda[$idx] == 'responsavel' OR 
                 $legenda[$idx] == 'resultado_analise_credito' OR 
                 $legenda[$idx] == 'descricao' OR 
                 $legenda[$idx] == 'nome_do_responsavel' OR 
                 $legenda[$idx] == 'sobrenome_do_responsavel' OR 
                 $legenda[$idx] == 'cpf_cnpj' OR 
                 $legenda[$idx] == 'parecer_serasa' OR 
                 $legenda[$idx] == 'parecer_interno' OR 
                 $legenda[$idx] == 'endereco_de_entrega' OR 
                 $legenda[$idx] == 'uf' OR 
                 $legenda[$idx] == 'nome_do_gestor' OR 
                 $legenda[$idx] == 'adabas_do_gn' OR  
                 $legenda[$idx] == 'renegociacao_massiva' OR 
                 $legenda[$idx] == 'analise_na_cotacao' OR 
                 $legenda[$idx] == 'posicao_solicitante_da_SS' OR 
                 $legenda[$idx] == 'nivel_alcada' OR 
                 $legenda[$idx] == 'cotacao_pai' OR 
                 $legenda[$idx] == 'cotacao_principal' OR 
                 $legenda[$idx] == 'os_legado'            
               )
               {             
          
          
           
               
          
          
          
          
            $cb.=$legenda[$idx].",";
              
               if($legenda[$idx] == 'tipo' 
               OR $legenda[$idx] == 'cliente' 
               OR $legenda[$idx] == 'descricao' 
               OR $legenda[$idx] == 'alcada_manual'  
               OR $legenda[$idx] == 'alcada_automatica' 
               OR $legenda[$idx] == 'comentarios' 
               OR $legenda[$idx] == 'nome_do_responsavel' 
               OR $legenda[$idx] == 'sobrenome_do_responsavel'
               OR $legenda[$idx] == 'parecer_serasa'
               OR $legenda[$idx] == 'parecer_interno'
               OR $legenda[$idx] == 'endereco_de_entrega' 
               OR $legenda[$idx] == 'nome_do_gestor' 
               OR $legenda[$idx] == 'status_da_cotacao' 
               OR $legenda[$idx] == 'substatus_da_cotacao' 
               OR $legenda[$idx] == 'acao' 
               OR $legenda[$idx] == 'motivo_da_acao' 
               OR $legenda[$idx] == 'status'
               OR $legenda[$idx] == 'nivel_alcada' ){
                
                $vlr=tiraaspasimples($vlr);
                //$vlr=$vlr);
                
                }
            
            
                     
            
              if($legenda[$idx] == 'inicio_planejado')
              {
                
               $vlr=corrigedatas($vlr);
              
              } 
              
                if($legenda[$idx] == 'data_de_criacao_do_pedido')
              {
                
               $vlr=corrigedatas($vlr);
              
              }
              
                if($legenda[$idx] == 'data_da_ultima_atualizacao_do_pedido')
              {
                
               $vlr=corrigedatas($vlr);
              
              }
              
              
              if($legenda[$idx] == 'criado_em')
              {
                
               $vlr=corrigedatas($vlr);
              
              }
              
               if($legenda[$idx] == 'termino_efetivo')
              {
                
               $vlr=corrigedatas($vlr);
              
              } 
                      
              if($legenda[$idx] == 'vencimento' )
              {
                
              $vlr=corrigedatas($vlr);
                
              } 
                              
              
                if($legenda[$idx] == 'revisao' )
              {
                
              $revisao=$vlr;
                
              } 
              
                if($legenda[$idx] == 'cotacao_principal' )
              {
                
              $cotacao=$vlr;
                
              } 
              
              
                
              $dados.= "'$vlr'".",";
               
              
                                     
              }
        }
        // echo ")VALUES(";
        
        
      $cb= substr($cb, 0, strlen($cb) - 1); 
      $dados=substr($dados, 0, strlen($dados) - 1);
      
 
      
      
      /*if(strlen($cb) < strlen($cbpadrao)){
        die("<script>alert('Cabecalho faltando campos');
                     history.back();</script>");
      }*/
           /*  $sql ="SELECT DISTINCT count(b.id_atv_cotacao) as total 
                     FROM tbl_ativ_cotacoes_vpe a INNER JOIN tbl_ativ_cotacoes_vpe b
                     ON a.id_atv_cotacao=b.id_atv_cotacao
                     INNER JOIN tbl_ativ_cotacoes_vpe c
                     ON b.cotacao_principal='$cotacao' 
                     GROUP BY a.cotacao_principal ";
              $result = mysql_query($sql) or die(mysql_error());       
              $count = mysql_fetch_array($result);
              echo $total=$count['total'];*/
 
 
 
            // if($total == 0){  
 
               
                  $sql_atualiza ="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '{$_COOKIE['idtbl_usuario']}' ";
                  $acao_atualiza = mysql_query($sql_atualiza,$conecta) or die(mysql_error()); 
                  while($linha_atualiza = mysql_fetch_assoc($acao_atualiza))
                       { 
	                     $nome2 = $linha_atualiza["nome"];
   	                  
	   
	                     }
                       
                                     
                       
                       
                $sql="INSERT IGNORE INTO cip_nv.tbl_cotacao_vpg ({$cb},
                                                         dt_inclusao_bd_cip,
                                                         dt_inclusao_bd_cip2,
                                                         carregado_por_cip
                                                         )VALUES({$dados},
                                                       	 '$data_inclusao_bd',
                                                         '$data_inclusao_bd',
                                                         '$nome2')";   
            
                $result = mysql_query($sql,$conecta) or die(mysql_error()); 
       
       
               
         //  }   
       
       
       
            
     } 
   

        $row++;
                 
   //  }
     //       }           

// fim - Atualiza o tipo das atividades na tabela tratamento 

    
        
}fclose ($handle);


 $sql_valida = "SELECT  a.id_cotacao,
                         a.numero_da_atividade,
                         a.revisao,
                         b.numero_da_atividade,
                         b.revisao 
                 FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_cotacao_vpg b
                 ON a.numero_da_atividade = b.numero_da_atividade ";
                   
                  $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     while($linha_update9 = mysql_fetch_assoc($acao_valida)){
                     $linha_cota9   = $linha_update9["numero_da_atividade"];
                     $linha_revisa9     = $linha_update9["revisao"];
                     $linha_id9    =  $linha_update9["id_cotacao"];
                     
                     $sql_valida9 = "DELETE FROM cip_nv.tbl_cotacao_vpg 
                     WHERE numero_da_atividade ='$linha_cota9' and revisao='$linha_revisa9'";
                    $acao_valida9 = mysql_query($sql_valida9,$conecta) or die (mysql_error()); 
                    
                             
                    
                  }  
                //exit();
               
                 }


$sql_validapetro = "SELECT a.cpf_cnpj,b.raiz,a.numero_da_atividade,a.revisao FROM cip_nv.tbl_cotacao_vpg a INNER JOIN cip_nv.raizes b
                 ON SUBSTRING(a.cpf_cnpj,1,8) = b.raiz ";
                   
$acao_validapetro = mysql_query($sql_validapetro,$conecta) or die (mysql_error());

      while($linha_updatepetro = mysql_fetch_array($acao_validapetro)){
                     $linha_cota9petro   = $linha_updatepetro["numero_da_atividade"];
                     //$linha_revisa9petro = $linha_updatepetro["revisao"];  


                  $sql_valida9petro = "DELETE FROM cip_nv.tbl_cotacao_vpg 
                     WHERE numero_da_atividade = '$linha_cota9petro' ";
                    $acao_valida9petro = mysql_query($sql_valida9petro,$conecta) or die (mysql_error()); 
                    
                             
                    
                  }  

  
                 
 $sqldel="CALL cip_nv.carrega_base()";
 $result = mysql_query($sqldel,$conecta);		 



       $sql1="SELECT id_cotacao  FROM cip_nv.tbl_cotacao_vpg ORDER BY cotacao_principal";   
            
       $result1 = mysql_query($sql1,$conecta) or die(mysql_error()); 
       $num1=mysql_num_rows($result1); 
  
       $sql2="SELECT a.id_cotacao  FROM cip_nv.tbl_analise a INNER JOIN cip_nv.tbl_cotacao b 
            ON a.id_cotacao=b.id_cotacao 
            WHERE a.status_cip_analise = 2 AND dt_inclusao_bd_cip = '$data_inclusao_bd2_mes'
            GROUP BY a.id_cotacao";   
            
       $result2 = mysql_query($sql2,$conecta) or die(mysql_error()); 
       $num2=mysql_num_rows($result2); 

       $sql3="SELECT * FROM cip_nv.tbl_input a INNER JOIN cip_nv.tbl_cotacao b 
            ON a.id_cotacao=b.id_cotacao
            WHERE a.status_cip_input = 7 AND dt_inclusao_bd_cip = '$data_inclusao_bd2_mes' 
            GROUP BY a.id_cotacao";   
            
       $result3 = mysql_query($sql3,$conecta) or die(mysql_error()); 
       $num3=mysql_num_rows($result3);



   /*echo 'carga:'.*/ $totalcarregadas=$row-1; //echo '<br>';
   /*echo 'carregadas:'.*/ $totalatualizadas=$num1; //echo '<br>'; 
   /*echo 'carregadas na analise:'.*/$totalatualizadas2=$num2; //echo '<br>';
   /*echo 'carregadas input :'.*/$totalatualizadas3=$num3; //echo '<br>';
 
echo "<br><br><br>";

  echo "<div class='divmsg bradius' style='background:#D4D4D4;'>";                                                 
  echo "<font color='#000000' face='arial' size='2'>Base VPG atualizada com sucesso!.<br>";
    if($totalatualizadas != 1 ){
     echo" ";
     }else{
      echo " <br>Base com total de {$totalcarregadas} cotações no vivocorp.<br>";
      }
      if($totalatualizadas2 == 0 && $totalatualizadas3 == 0 && $totalatualizadas == 0){
            
       echo "<br>Cotações nao foram carregadas no cip.</font><br><br>";
       }
        if($totalatualizadas2 == 0 && $totalatualizadas3 == 0 && $numvpe == 0 ){
            
       echo "<br>Cotações ja constam no cip.</font><br><br>";
       }
       if($numvpe != 0 ){
            
       echo "<br>Existem $numvpe Cotações que nao foram carregadas por serem VPE.</font><br><br>";

   }else{
     
       if($totalatualizadas2 != 0){
       echo "<br><font color='#000000' face='arial' size='2'>Foram carregados {$totalatualizadas2} cotações no Gala - VPG na Análise.</font><br>";
       }
       if($totalatualizadas3 != 0){
        echo "<br><font color='#000000' face='arial' size='2'>Foram carregados {$totalatualizadas3} cotações no Gala - VPG no Input.</font><br><br>";
        }        
   
       }
      echo "<div/>";    





				
// mysql_free_result($acao_atualiza,$result,$result2,$result3);
 mysql_close($conecta);			
				
				
   
?>	

<script language="javascript" type="text/javascript">
hideCarga();
</script>
<p>
    <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?t=forms/formatualizar_base_vpg.php'" />

</div>    
</body>
</html>