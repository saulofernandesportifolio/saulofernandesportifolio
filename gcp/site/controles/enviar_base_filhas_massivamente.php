
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


<!--<div class="divformcarrega">
<div class="loading" id="carga">
<img class="imgloading" src="site/forms/img/carregando.gif">
</div>-->
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



function corrigedatasvenc($date){


$date;
$dt=explode("/",$date);
$dia=$dt[0];
     $mes=$dt[1];
     $ano=$dt[2];
//echo '<br>';

     /*realiza o tratamento do dia e mes*/
       if(strlen($dia) == 1)
        {
          $dia='0'.$dia;
        }

        if(strlen($mes) == 1 )
        {
          $mes='0'.$mes;
        }

  
   $date=$ano."-".$mes."-".$dia;

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
                        
           $legenda =array('Nome da cotao'        => 'nome_da_cotacao',     
                              'N da cotao'           => 'n_da_cotacao',
                              'Cotao Pai'            => 'cotacao_pai',
                              'Cotao Principal'      => 'cotacao_principal',
                              'Tipo'                 => 'tipo',
                              'Reviso'               => 'revisao',
                              'Vencimento'           => 'vencimento',
                              'Rep vendas'           => 'resp_vendas',
                              'Cdigo Adabas'         => 'codigo_adabas',
                              'Cliente'              => 'cliente',
                              'CPFCNPJ'              => 'cpf_cnpj',
                              'UF'                   => 'uf',
                              'Carteira'             => 'carteira',
                              'Organizao'            => 'organizacao',
                              'Nome do gestor'       => 'nome_do_gestor',
                              'Sobrenome do gestor'  => 'sobrenome_do_gestor',
                              'Oportunidade'         => 'oportunidade',
                              'Status'               => 'status',
                              'Substatus'            => 'substatus',
                              'Cond Pgto'            => 'cond_pgto',
                              'Nmero ID SFA'         => 'numero_id_sfa',
                              'Descrio'              => 'descricao',
                              'Criado em'            => 'criado_em',
                              'Criado por'           => 'criado_por',
                              'Alada Manual'         => 'alcada_manual',
                              'Alada Automtica'      => 'alcada_automatica',
                              'Prioridade'           => 'prioridade',
                              'Negociao'             => 'negociacao',
                              'Simulao'              => 'simulacao',
                              'Aprovador'            => 'aprovador',
                              'N solicitao em massa' => 'n_solitacao_em_massa',
                              'Fast Chip'            => 'fast_chip',
                              'Sistema Origem'       => 'sistema_origem', 
                              'Mensagem de Erro SFA' => 'mensagem_de_erro_sfa'
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
            
              if($legenda[$idx] == 'nome_da_cotacao' OR 
                 $legenda[$idx] == 'n_da_cotacao' OR 
                 $legenda[$idx] == 'cotacao_pai' OR 
                 $legenda[$idx] == 'cotacao_principal' OR 
                 $legenda[$idx] == 'tipo' OR 
                 $legenda[$idx] == 'revisao' OR 
                 $legenda[$idx] == 'vencimento' OR 
                 $legenda[$idx] == 'resp_vendas' OR 
                 $legenda[$idx] == 'codigo_adabas' OR 
                 $legenda[$idx] == 'cliente' OR 
                 $legenda[$idx] == 'cpf_cnpj' OR 
                 $legenda[$idx] == 'uf' OR 
                 $legenda[$idx] == 'carteira' OR 
                 $legenda[$idx] == 'organizacao' OR 
                 $legenda[$idx] == 'nome_do_gestor' OR 
                 $legenda[$idx] == 'sobrenome_do_gestor' OR 
                 $legenda[$idx] == 'oportunidade' OR 
                 $legenda[$idx] == 'status' OR 
                 $legenda[$idx] == 'substatus' OR 
                 $legenda[$idx] == 'cond_pgto' OR 
                 $legenda[$idx] == 'numero_id_sfa' OR 
                 $legenda[$idx] == 'descricao' OR 
                 $legenda[$idx] == 'criado_em' OR 
                 $legenda[$idx] == 'criado_por' OR 
                 $legenda[$idx] == 'alcada_manual' OR 
                 $legenda[$idx] == 'alcada_automatica' OR 
                 $legenda[$idx] == 'prioridade' OR 
                 $legenda[$idx] == 'negociacao' OR 
                 $legenda[$idx] == 'simulacao' OR 
                 $legenda[$idx] == 'aprovador' OR 
                 $legenda[$idx] == 'n_solitacao_em_massa' OR 
                 $legenda[$idx] == 'fast_chip' OR 
                 $legenda[$idx] == 'sistema_origem' OR 
                 $legenda[$idx] == 'mensagem_de_erro_sfa'           
               )
               {             
          
          
           
               
          
          
          
          
            $cb.=$legenda[$idx].",";
              
               if($legenda[$idx] == 'cliente' 
                  OR $legenda[$idx] == 'descricao' 
                  OR $legenda[$idx] == 'sobrenome_do_gestor'
                  OR $legenda[$idx] == 'nome_do_gestor' 
                ){
                
                $vlr=tiraaspasimples($vlr);
                //$vlr=$vlr);
                
                }
            
            
                     
                         
              
              if($legenda[$idx] == 'criado_em')
              {
                
               $vlr=corrigedatas($vlr);
              
              }
              
                                
              if($legenda[$idx] == 'vencimento' )
              {
                
              $vlr=corrigedatasvenc($vlr);
                
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
      
    

/*
       echo $sql_validaidpri = "SELECT a.cotacao_atividade,
                                       a.id 
                                    FROM cip_nv.base_diretoria a 
                                    WHERE a.cotacao_atividade = '$cotacao'";
                   
                $acao_validaidpri = mysql_query($sql_validaidpri,$conecta) or die (mysql_error());
                $linha_validaidpri = mysql_fetch_array($acao_validaidpri);
                  
               $id_pri=$linha_validaidpri['id'];
      
      
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
 

                       //echo '<br>';
                       //echo '<br>';
         
                       $sqlid="SELECT a.id FROM cip_nv.base_diretoria a 
                                WHERE a.cotacao_atividade='$cotacao' ";  
                       $acao_id = mysql_query($sqlid,$conecta) or die (mysql_error());
                       $linha_id = mysql_fetch_array($acao_id);   

                       $id_pri=$linha_id['id'];  


              $sql="INSERT IGNORE INTO cip_nv.temp_cotacao_diretoria_comp({$cb},
                                                         dt_carga_bd_cip,
                                                         carregado_por_cip,
                                                         id_dire
                                                         )VALUES({$dados},
                                                       	 '$data_inclusao_bd',
                                                         '$nome2',
                                                         '$id_pri')";   
            
              $result = mysql_query($sql,$conecta) or die(mysql_error()); 
       
       
               
         //  }   
       
       
       
            
     } 
   

        $row++;
                 
   //  }
     //       }           

// fim - Atualiza o tipo das atividades na tabela tratamento 

    
        
}fclose ($handle);

/*

$sql_validarev = "SELECT  a.n_da_cotacao,
                       a.revisao,
                       a.status,
                       a.substatus 
                 FROM cip_nv.temp_cotacao_diretoria_comp a 
                 INNER JOIN cip_nv.base_diretoria_complementar b
                 ON a.n_da_cotacao = b.n_da_cotacao 
                 WHERE a.n_da_cotacao = b.n_da_cotacao 
                 AND (a.status <> b.status OR a.substatus <> b.substatus ) ";
                   
                  $acao_validarev = mysql_query($sql_validarev,$conecta) or die (mysql_error());

                 $linha_validarev = mysql_num_rows($acao_validarev);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_validarev > 0)
                  {
                    
                     while($linha_update99 = mysql_fetch_assoc($acao_validarev)){
                     $linha_cota99         = $linha_update99["n_da_cotacao"];
                     $linha_revisa99       = $linha_update99["revisao"];
                     $linha_id99           = $linha_update99["status"];
                     $linha_id999          = $linha_update99["substatus"];

                     
                     $sql_valida99 = "UPDATE cip_nv.base_diretoria_complementar 
                       SET revisao = '$linha_revisa99',
                           status =  '$linha_id99',
                           subststus ='$linha_id999'
                     WHERE n_da_cotacao ='$linha_cota99'";
                    $acao_valida9 = mysql_query($sql_valida9,$conecta) or die (mysql_error()); 
                    
                             
                    
                  }  
                //exit();
               
                 }



$sql_valida = "SELECT  a.n_da_cotacao,
                       a.revisao,
                       a.status,
                       a.substatus 
                 FROM cip_nv.temp_cotacao_diretoria_comp a 
                 INNER JOIN cip_nv.base_diretoria_complementar b
                 ON a.n_da_cotacao = b.n_da_cotacao 
                 WHERE a.n_da_cotacao = b.n_da_cotacao 
              
                  ";
                   
                  $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     while($linha_update9 = mysql_fetch_assoc($acao_valida)){
                     $linha_cota9   = $linha_update9["n_da_cotacao"];
                     $linha_revisa9     = $linha_update9["revisao"];
                   
                     
                     $sql_valida9 = "DELETE FROM cip_nv.temp_cotacao_diretoria_comp
                     WHERE n_da_cotacao ='$linha_cota9'";
                    $acao_valida9 = mysql_query($sql_valida9,$conecta) or die (mysql_error()); 
                    
                             
                    
                  }  
                //exit();
               
                 }

*/
 
                 
 $sqltb="CALL cip_nv.carga_filhas_tabela("."'{$id_pri}'".")";
 $resulttb = mysql_query($sqltb,$conecta);	



       /* echo $sqlup="UPDATE cip_nv.base_diretoria_complementar a ,(SELECT * FROM cip_nv.base_diretoria WHERE id='$id_pri')b
                     SET a.total_linhas = b.total_linhas,  
                         a.altas        = b.altas,
                         a.portabilidade= b.portabilidade,
                         a.migracao     = b.migracao,
                         a.trocas       = b.trocas,
                         a.tt           = b.tt,
                         a.`backup`       = b.`backup`,
                         a.m2m          = b.m2m,
                         a.fixa         = b.fixa,
                         a.pre_pos      = b.pre_pos,
                         a.migracao_troca=b.migracao_troca
                    WHERE a.id_dire=b.id and a.n_da_cotacao=b.cotacao_atividade ";
         $resultup = mysql_query($sqlup,$conecta);   
       */

 
echo "<br><br><br>";

  echo "<div class='divmsg bradius' style='background:#D4D4D4;'>";                                                 
  echo "<font color='#000000' face='arial' size='2'>Base VPG atualizada com sucesso!.<br>";
   echo "<div/>";    





				
// mysql_free_result($acao_atualiza,$result,$result2,$result3);
 mysql_close($conecta);			
				
				
   
?>	

<!--<script language="javascript" type="text/javascript">
hideCarga();
</script>-->
<p>
    <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?t=forms/formatualizar_filhas_massivamente.php'" />

</div>    
</body>
</html>