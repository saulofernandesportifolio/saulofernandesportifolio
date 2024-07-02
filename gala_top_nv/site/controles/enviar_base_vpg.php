<div class="divformcarrega">
    <script>
        <!--
        //Criado por: Saulo de assis       
        function Carregado(){
          Msg_Carregando.style.display='none';
          pagina.style.display='block';
        }
        -->
    </script>
</head>

    <div id="Msg_Carregando">
    <script>
        <!--
      //  document.write('<img src = "../img/carregando.gif"> Carregando...')
        -->
    </script>
    </div>
    <script>
        <!--
       // document.write('<div id="pagina" style="display: none;">')
        -->
    </script>
<?php
    $tempo = 0;

  set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");
  
  
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


function  arrumadatainicio($string3) {
    
            /*  echo '<br>';
               echo strlen($string3);
               
              echo '<br>';      
              */
              
         //      echo '<br>';
               $data1=substr($string3,0,2);
               $data1= str_replace("/","",$data1);
               
              //echo '<br>';  
              
              
            //   echo '<br>';
            //  echo "DIA CARACTER: ".strlen($data);
               
           //   echo '<br>';
              
              
              
             //  echo '<br>';
               $mes=substr($string3,2,2);
               $mes= str_replace("/","",$mes);
               
             // echo '<br>';  
              
           //   echo '<br>';
            //   echo "MES CARACTER: ". strlen($mes);
               
            //  echo '<br>';
              
              
              
              // echo '<br>';
               $ano=substr($string3,5,4);
               $ano= str_replace("/","",$ano);
               
             // echo '<br>';  
              
           //   echo '<br>';
         //      echo "ANO CARACTER: ". strlen($ano);
               
          //    echo '<br>';
              
              
                 if(strlen($ano) == 3 && strlen($data1) == 2 && strlen($mes) == 1){
                
                $ano=substr($string3,5,5);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
                $hora=substr($string3,10,10);
                $hora = str_replace("/","",$hora);  
                
                
               // echo '<br>';
               // echo "OK";
               // echo '<br>';
                
              }elseif(strlen($ano) == 4 && strlen($data1) == 2 && strlen($mes) == 1 ){
                
                $ano=substr($string3,5,4);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
                
                $hora=substr($string3,9,10);
                $hora = str_replace("/","",$hora);  
                
                //echo '<br>';
                //echo "OK 2";
               // echo '<br>';
                
              }elseif(strlen($ano) == 4 && strlen($data1) == 1 && strlen($mes) == 1 ){
                
                $ano=substr($string3,4,4);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
                
                $hora=substr($string3,9,10);
                $hora = str_replace("/","",$hora);  
                
               // echo '<br>';
               // echo "OK 3";
               // echo '<br>';
                
              }elseif(strlen($ano) == 4 && strlen($data1) == 1 && strlen($mes) == 2 ){
                
                $ano=substr($string3,5,4);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
                
                $hora=substr($string3,9,10);
                $hora = str_replace("/","",$hora);  
                
               // echo '<br>';
                //echo "OK 33";
               // echo '<br>';
                
              }else{
                
                $ano=substr($string3,4,4);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
              }
            
              
              
              
              
              if($data1 >=1 && $data1 <= 9 ){
                
                $dia="0".$data1;
                
               }else{
                
                $dia=$data1;
               }
          //     echo '<br>';
          //    echo "dia com o tratamento: ".$dia;
            //    echo '<br>';
                
                if($mes>=1 && $mes <= 9 ){
                
                $mes="0".$mes;
                
               }else{
                
                $mes=$mes;
               }
            //   echo '<br>';
            //  echo "mes com o tratamento: ".$mes;
             //   echo '<br>'; 
                
           
                
            //    echo '<br>';
             // echo "ano com o tratamento: ".$ano;
              //  echo '<br>';  
              
                                  
          if(empty($ano) && empty($mes) && empty($dia)  ){        
             $data='';
           }else{
              // echo '<br>';
            $data= $ano."-".$mes."-".$dia." ".$hora; 
             // echo  "<br>";
           }   


return $data;
}


function arrumadatavencimento($string3) {
 /*  echo '<br>';
               echo strlen($string3);
               
              echo '<br>';      
              */
              
         //      echo '<br>';
               $data1=substr($string3,0,2);
               $data1= str_replace("/","",$data1);
               
              //echo '<br>';  
              
              
            //   echo '<br>';
            //  echo "DIA CARACTER: ".strlen($data);
               
           //   echo '<br>';
              
              
              
             //  echo '<br>';
               $mes=substr($string3,2,2);
               $mes= str_replace("/","",$mes);
               
             // echo '<br>';  
              
           //   echo '<br>';
            //   echo "MES CARACTER: ". strlen($mes);
               
            //  echo '<br>';
              
              
              
              // echo '<br>';
               $ano=substr($string3,5,4);
               $ano= str_replace("/","",$ano);
               
             // echo '<br>';  
              
           //   echo '<br>';
         //      echo "ANO CARACTER: ". strlen($ano);
               
          //    echo '<br>';
              
              
                 if(strlen($ano) == 3 && strlen($data1) == 2 && strlen($mes) == 1){
                
                $ano=substr($string3,5,5);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
                $hora=substr($string3,10,10);
                $hora = str_replace("/","",$hora);  
                
                
               // echo '<br>';
               // echo "OK";
               // echo '<br>';
                
              }elseif(strlen($ano) == 4 && strlen($data1) == 2 && strlen($mes) == 1 ){
                
                $ano=substr($string3,5,4);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
                
                $hora=substr($string3,9,10);
                $hora = str_replace("/","",$hora);  
                
                //echo '<br>';
                //echo "OK 2";
               // echo '<br>';
                
              }elseif(strlen($ano) == 4 && strlen($data1) == 1 && strlen($mes) == 1 ){
                
                $ano=substr($string3,4,4);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
                
                $hora=substr($string3,9,10);
                $hora = str_replace("/","",$hora);  
                
               // echo '<br>';
               // echo "OK 3";
               // echo '<br>';
                
              }elseif(strlen($ano) == 4 && strlen($data1) == 1 && strlen($mes) == 2 ){
                
                $ano=substr($string3,5,4);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
                
                $hora=substr($string3,9,10);
                $hora = str_replace("/","",$hora);  
                
               // echo '<br>';
                //echo "OK 33";
               // echo '<br>';
                
              }else{
                
                $ano=substr($string3,4,4);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
              }
            
              
              
              
              
              if($data1 >=1 && $data1 <= 9 ){
                
                $dia="0".$data1;
                
               }else{
                
                $dia=$data1;
               }
          //     echo '<br>';
          //    echo "dia com o tratamento: ".$dia;
            //    echo '<br>';
                
                if($mes>=1 && $mes <= 9 ){
                
                $mes="0".$mes;
                
               }else{
                
                $mes=$mes;
               }
            //   echo '<br>';
            //  echo "mes com o tratamento: ".$mes;
             //   echo '<br>'; 
                
           
                
            //    echo '<br>';
             // echo "ano com o tratamento: ".$ano;
              //  echo '<br>';  
              
                                  
          if(empty($ano) && empty($mes) && empty($dia)  ){        
             $data='';
           }else{
              // echo '<br>';
            $data= $ano."-".$mes."-".$dia; 
             // echo  "<br>";
           }   


return $data;
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
 include("../gala/bd.php");
    $tempo = 0;
  set_time_limit($tempo);
  
ini_set ( 'mysql.connect_timeout' ,  '120' ); 
ini_set ( 'default_socket_timeout' ,  '120' );
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
                             'Incio planejado'                   =>'incio_planejado',
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
                 $legenda[$idx] == 'incio_planejado' OR
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
                
                
                $vlr=arrumaString($vlr);
                
                }
            
            
                     
            
              if($legenda[$idx] == 'incio_planejado')
              {
                
               $vlr=arrumadatainicio($vlr);
              
              } 
              
                if($legenda[$idx] == 'data_de_criacao_do_pedido')
              {
                
               $vlr=arrumadatainicio($vlr);
              
              }
              
                if($legenda[$idx] == 'data_da_ultima_atualizacao_do_pedido')
              {
                
               $vlr=arrumadatainicio($vlr);
              
              }
              
              
              if($legenda[$idx] == 'criado_em')
              {
                
               $vlr=arrumadatainicio($vlr);
              
              }
              
               if($legenda[$idx] == 'termino_efetivo')
              {
                
               $vlr=arrumadatainicio($vlr);
              
              } 
                      
              if($legenda[$idx] == 'vencimento' )
              {
                
              $vlr=arrumadatavencimento($vlr);
                
              } 
                              
              
                if($legenda[$idx] == 'revisao' )
              {
                
              $revisao=arrumadatavencimento($vlr);
                
              } 
              
                if($legenda[$idx] == 'cotacao_principal' )
              {
                
              $cotacao=arrumadatavencimento($vlr);
                
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
 
               
                  $sql_atualiza ="SELECT * FROM tbl_usuarios WHERE idtbl_usuario = '$idtbl_usuario'";
                  $acao_atualiza = mysql_query($sql_atualiza) or die (mysql_error());
                  while($linha_atualiza = mysql_fetch_assoc($acao_atualiza))
                       { 
	                    $nome2 = $linha_atualiza["nome"];
   	                  
	   
	                   }
                       
                                     
                       
                       
               $sql="INSERT IGNORE INTO tbl_cotacao_vpg ({$cb},
                                                         dt_inclusao_bd_cip,
                                                         dt_inclusao_bd_cip2,
                                                         carregado_por_cip
                                                         )VALUES({$dados},
                                                       	 '$data_inclusao_bd',
                                                         '$data_inclusao_bd',
                                                                    '$nome2')";   
            
                             $result = mysql_query($sql) or die(mysql_error());
       
       
               
         //  }   
       
       
       
     /* $sql_valida9 = "DELETE FROM tbl_cotacao_vpg 
                     WHERE tipo NOT IN ('Analise documentacao','Analise de input') ";
                    $acao_valida9 = mysql_query($sql_valida9) or die (mysql_error());*/ 
            
     } 
   

        $row++;
                 
   //  }
     //       }           

// fim - Atualiza o tipo das atividades na tabela tratamento 

    
        
}fclose ($handle);
                 
 /* $sql_valida = "SELECT  a.id_cotacao,
                         a.numero_da_atividade,
                         a.revisao,
                         b.numero_da_atividade,
                         b.revisao 
                 FROM tbl_cotacao a INNER JOIN tbl_cotacao_vpg b
                 ON a.numero_da_atividade = b.numero_da_atividade
                 INNER JOIN tbl_cotacao_vpg c
                 ON a.revisao = c.revisao  ";*/

  $sql_valida = "SELECT  a.id_cotacao,
                         a.numero_da_atividade,
                         a.revisao,
                         b.numero_da_atividade,
                         b.revisao 
                 FROM tbl_cotacao a INNER JOIN tbl_cotacao_vpg b
                 ON a.numero_da_atividade = b.numero_da_atividade ";
                   
                  $acao_valida = mysql_query($sql_valida) or die (mysql_error());

                  $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     while($linha_update9 = mysql_fetch_assoc($acao_valida)){
			               $linha_cota9		=	$linha_update9["numero_da_atividade"];
                     $linha_revisa9     =	$linha_update9["revisao"];
                     $linha_id9    =	$linha_update9["id_cotacao"];
                     
                     $sql_valida9 = "DELETE FROM tbl_cotacao_vpg 
                     WHERE numero_da_atividade ='$linha_cota9' and revisao='$linha_revisa9'";
                    $acao_valida9 = mysql_query($sql_valida9) or die (mysql_error()); 
                    
                             
                    
                  }  
                //exit();
               
                 }
                 
   /*              
   $sql_validafilha = "SELECT  a.id_cotacao,
                         a.numero_da_atividade,
                         a.revisao,
                         b.numero_da_atividade,
                         b.revisao 
                 FROM tbl_filhas a INNER JOIN tbl_cotacao_vpg b
                 ON a.numero_da_atividade = b.numero_da_atividade
                 INNER JOIN tbl_cotacao_vpg c
                 ON a.revisao = c.revisao";
                   
                  $acao_valida = mysql_query($sql_validafilha) or die (mysql_error());

                  $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     while($linha_update9 = mysql_fetch_assoc($acao_valida)){
			         $linha_cota9		=	$linha_update9["numero_da_atividade"];
                     $linha_revisa9     =	$linha_update9["revisao"];
                     $linha_id9    =	$linha_update9["id_cotacao"];
                     
                     $sql_valida9 = "DELETE FROM tbl_cotacao_vpg 
                     WHERE numero_da_atividade ='$linha_cota9' and revisao='$linha_revisa9'";
                    $acao_valida9 = mysql_query($sql_valida9) or die (mysql_error()); 
                    
                             
                    
                  } 
                //exit();
               
                 } */               
       
   
 $update_regional_co ="UPDATE tbl_cotacao_vpg 
                   SET tbl_cotacao_vpg.regional_atribuida='CO'
                   WHERE tbl_cotacao_vpg.uf IN ('AC','DF','GO','MS','MT','RO','TO','CO/N')";
$acao_update_regional_co = mysql_query($update_regional_co) or die (mysql_error());      

$update_regional_leste ="UPDATE tbl_cotacao_vpg 
                   SET tbl_cotacao_vpg.regional_atribuida='LESTE'
                   WHERE tbl_cotacao_vpg.uf IN ('BA','ES','RJ','SE')";
$acao_update_regional_leste = mysql_query($update_regional_leste) or die (mysql_error()); 

$update_regional_mg ="UPDATE tbl_cotacao_vpg 
                   SET tbl_cotacao_vpg.regional_atribuida='MG'
                   WHERE tbl_cotacao_vpg.uf IN ('MG')";
$acao_update_regional_mg = mysql_query($update_regional_mg) or die (mysql_error());

$update_regional_ne ="UPDATE tbl_cotacao_vpg 
                   SET tbl_cotacao_vpg.regional_atribuida='NE'
                   WHERE tbl_cotacao_vpg.uf IN ('AL','CE','PB','PE','PI','RN')";
$acao_update_regional_ne = mysql_query($update_regional_ne) or die (mysql_error());


$update_regional_norte ="UPDATE tbl_cotacao_vpg 
                   SET tbl_cotacao_vpg.regional_atribuida='NORTE' 
                   WHERE tbl_cotacao_vpg.uf IN ('AM','AP','MA','PA','PA - STR','PA - ATM','RR')";
$acao_update_regional_norte = mysql_query($update_regional_norte) or die (mysql_error());

$update_regional_sp ="UPDATE tbl_cotacao_vpg 
                   SET tbl_cotacao_vpg.regional_atribuida='SP' 
                   WHERE tbl_cotacao_vpg.uf IN ('SP')";
$acao_update_regional_sp = mysql_query($update_regional_sp) or die (mysql_error());

$update_regional_sul ="UPDATE tbl_cotacao_vpg 
                   SET tbl_cotacao_vpg.regional_atribuida='SUL' 
                   WHERE tbl_cotacao_vpg.uf IN ('PR','RS','SC')";
$acao_update_regional_sul= mysql_query($update_regional_sul) or die (mysql_error());

$update_regional_todas ="UPDATE tbl_cotacao_vpg 
                   SET tbl_cotacao_vpg.regional_atribuida='Todas as Regionais' 
                   WHERE tbl_cotacao_vpg.uf IN ('Todas as UF')";
$acao_update_regional_todas= mysql_query($update_regional_todas) or die (mysql_error());


//tratamento carteira

$update_cnpj ="SELECT *  FROM tbl_cotacao_vpg 
              ORDER BY tbl_cotacao_vpg.id_cotacao DESC LIMIT 0,10000";
$result_cnpj  = mysql_query($update_cnpj ) or die (mysql_error());

 while($linha_cnpj= mysql_fetch_assoc($result_cnpj)){
       $id_cotacao=$linha_cnpj["id_cotacao"];
	   $cnpjraiz = $linha_cnpj["cpf_cnpj"];

     
    $raiz = substr($cnpjraiz, 0, 8); 
    //echo '<br>';
     //echo $raiz;

    $sql_valida = "UPDATE tbl_cotacao_vpg SET 
                                      raiz = '$raiz'
                                      WHERE id_cotacao = '$id_cotacao'";
    $acao_valida = mysql_query($sql_valida) or die (mysql_error());

}
       $update_raiz ="SELECT a.raiz,
                            b.id_cotacao,
                            b.raiz 
                     FROM carteira_vpe a,tbl_cotacao_vpg b
                     WHERE a.raiz=b.raiz  ";
       $result_raiz  = mysql_query($update_raiz) or die (mysql_error());
       while($linha_raiz= mysql_fetch_assoc($result_raiz)){
	   $idcota = $linha_raiz["id_cotacao"];
     
       $sql_atualiza2 ="DELETE FROM tbl_cotacao_vpg 
                          WHERE id_cotacao= '$idcota' ";
       $acao_atualiza2 = mysql_query($sql_atualiza2) or die (mysql_error()); 
       }  
    /*
       $update_raiz ="SELECT a.Cliente,
                             a.Carteira,
                            b.id_cotacao,
                            b.cliente
                     FROM carteira_top a INNER JOIN tbl_cotacao_vpg b
                     ON a.Cliente=b.cliente ";
       $result_raiz  = mysql_query($update_raiz) or die (mysql_error());
       while($linha_raiz= mysql_fetch_assoc($result_raiz)){
	   $carteira = $linha_raiz["Carteira"];
       $id_cotacao= $linha_raiz["id_cotacao"];*/
    /* if(empty($carteira) || $carteira == '' ){
        $carteira='VPG - TOP';
     }else{
        
       $carteira=$carteira; 
     } */ 
  /* $sql_valida = "UPDATE tbl_cotacao_vpg SET 
                                      carteira = '$carteira'
                                      WHERE id_cotacao = '$id_cotacao'";
    $acao_valida = mysql_query($sql_valida) or die (mysql_error()); */  

      $sql_valida = "UPDATE tbl_cotacao_vpg SET 
                                      carteira = 'VPG - TOP - GOV'
                                      WHERE   cliente LIKE 'Pref%'
                                      OR cliente LIKE 'Munici%'
                                      OR cliente LIKE 'MUNIC%'
                                      OR cliente LIKE 'PREF%' and carteira IS NULL ";
    $acao_valida = mysql_query($sql_valida) or die (mysql_error());    
     
     $sql_valida = "UPDATE tbl_cotacao_vpg SET 
                                      carteira = 'VPG - TOP'
                                      WHERE  carteira IS NULL";
    $acao_valida = mysql_query($sql_valida) or die (mysql_error()); 
     
//}
 
    $sql_atualiza ="SELECT * FROM tbl_cotacao_vpg 
                    WHERE n_da_cotacao=cotacao_principal ";
    $acao_atualiza = mysql_query($sql_atualiza) or die (mysql_error());
    while($linha_atualiza = mysql_fetch_assoc($acao_atualiza)){
    
        $id_cotacao                           = $linha_atualiza["id_cotacao"];
        $numero_da_atividade                  = $linha_atualiza["numero_da_atividade"]; 
        $novo                                 = $linha_atualiza["novo"];
        $incio_planejado                      = $linha_atualiza["incio_planejado"];
        $comentarios                          = $linha_atualiza["comentarios"];
        $tipo                                 = $linha_atualiza["tipo"];
        $cliente                              = $linha_atualiza["cliente"];
        $numero_do_pedido                     = $linha_atualiza["numero_do_pedido"];
        $status_do_pedido                     = $linha_atualiza["status_do_pedido"];
        $sub_status_do_pedido                 = $linha_atualiza["sub_status_do_pedido"]; 
        $revisao                              = $linha_atualiza["revisao"]; 
        $data_de_criacao_do_pedido            = $linha_atualiza["data_de_criacao_do_pedido"];
        $data_da_ultima_atualizacao_do_pedido = $linha_atualiza["data_da_ultima_atualizacao_do_pedido"];
        $n_da_cotacao                         = $linha_atualiza["n_da_cotacao"]; 
        $status_da_cotacao                    = $linha_atualiza["status_da_cotacao"];
        $substatus_da_cotacao                 = $linha_atualiza["substatus_da_cotacao"];
        $acao                                 = $linha_atualiza["acao"];
        $motivo_da_acao                       = $linha_atualiza["motivo_da_acao"];
        $sub_motivo                           = $linha_atualiza["sub_motivo"];
        $organizacao_SS                       = $linha_atualiza["organizacao_SS"];
        $tipo_de_SS                           = $linha_atualiza["tipo_de_SS"];
        $subtipo_da_SS                        = $linha_atualiza["subtipo_da_SS"];
        $n_da_SS                              = $linha_atualiza["n_da_SS"];
        $status_da_SS                         = $linha_atualiza["status_da_SS"];   
        $substatus_da_SS                      = $linha_atualiza["substatus_da_SS"];
        $vencimento                           = $linha_atualiza["vencimento"];
        $prioridade                           = $linha_atualiza["prioridade"];
        $status                               = $linha_atualiza["status"];
        $cotacao                              = $linha_atualiza["cotacao"];
        $faturavel                            = $linha_atualiza["faturavel"];
        $sobrenome                            = $linha_atualiza["sobrenome"];
        $nome                                 = $linha_atualiza["nome"];
        $oportunidade                         = $linha_atualiza["oportunidade"];
        $funcionarios                         = $linha_atualiza["funcionarios"];
        $alarme                               = $linha_atualiza["alarme"];
        $criado_em                            = $linha_atualiza["criado_em"];
        $criado_por                           = $linha_atualiza["criado_por"];
        $termino_efetivo                      = $linha_atualiza["termino_efetivo"];
        $regional_atribuida                   = $linha_atualiza["regional_atribuida"];
        $alta                                 = $linha_atualiza["alta"];
        $loja                                 = $linha_atualiza["loja"];
        $portabilidade                        = $linha_atualiza["portabilidade"];
        $troca                                = $linha_atualiza["troca"];
        $transferencia_de_titularidade        = $linha_atualiza["transferencia_de_titularidade"];
        $itens_especiais                      = $linha_atualiza["itens_especiais"];
        $responsavel                          = $linha_atualiza["responsavel"];
        $resultado_analise_credito            = $linha_atualiza["resultado_analise_credito"];
        $descricao                            = $linha_atualiza["descricao"];
        $nome_do_responsavel                  = $linha_atualiza["nome_do_responsavel"];
        $sobrenome_do_responsavel             = $linha_atualiza["sobrenome_do_responsavel"];
        $cpf_cnpj                             = $linha_atualiza["cpf_cnpj"];
        $raiz                                 = $linha_atualiza["raiz"];
        $parecer_serasa                       = $linha_atualiza["parecer_serasa"];
        $parecer_interno                      = $linha_atualiza["parecer_interno"];
        $endereco_de_entrega                  = $linha_atualiza["endereco_de_entrega"];
        $uf                                   = $linha_atualiza["uf"];
        $nome_do_gestor                       = $linha_atualiza["nome_do_gestor"];
        $adabas_do_gn                         = $linha_atualiza["adabas_do_gn"];
        $renegociacao_massiva                 = $linha_atualiza["renegociacao_massiva"];
        $analise_na_cotacao                   = $linha_atualiza["analise_na_cotacao"];
        $posicao_solicitante_da_SS            = $linha_atualiza["posicao_solicitante_da_SS"];
        $nivel_alcada                         = $linha_atualiza["nivel_alcada"];
        $cotacao_pai                          = $linha_atualiza["cotacao_pai"];
        $cotacao_principal                    = $linha_atualiza["cotacao_principal"];
        $os_legado                            = $linha_atualiza["os_legado"];
        $dt_inclusao_bd_cip                   = $linha_atualiza["dt_inclusao_bd_cip"];
        $dt_inclusao_bd_cip2                  = $linha_atualiza["dt_inclusao_bd_cip2"];
        $ALTAS                                = $linha_atualiza["ALTAS"];
        $PORTABILIDADE2                        = $linha_atualiza["PORTABILIDADE2"];
        $MIGRACAO                             = $linha_atualiza["MIGRACAO"];
        $TROCAS                               = $linha_atualiza["TROCAS"];
        $TT                                   = $linha_atualiza["TT"];
        $BACKUP                               = $linha_atualiza["BACKUP"];
        $PRE_POS                              = $linha_atualiza["PRE_POS"];
        $MIGRACAO_TROCA                       = $linha_atualiza["MIGRACAO_TROCA"];
        $M_2_M                                = $linha_atualiza["M_2_M"];
        $FIXA                                 = $linha_atualiza["FIXA"];
        $TIPO_SERVICO                         = $linha_atualiza["TIPO_SERVICO"];
        $total_linhas_cip                     = $linha_atualiza["total_linhas_cip"];
        $carregado_por_cip                    = $linha_atualiza["carregado_por_cip"];
       	$carteira                             = $linha_atualiza["carteira"]; 
		
		    $cotacao_principal33                    = $linha_atualiza["cotacao_principal"];
		    $revisao33                              = $linha_atualiza["revisao"]; 
					 
        //Monta SQL para INSERT
        
        
        
      if($status == "Pendente" 
        and $tipo == "Analise documentacao" 
        and $status_da_cotacao == "Enviado ilha de input" 
        and $substatus_da_cotacao == "Analise documentacao" ){
        
        
        
     $sql_inserir ="INSERT INTO tbl_cotacao(numero_da_atividade, 
                                               novo,
                                               incio_planejado,
                                               comentarios,
                                               tipo,
                                               cliente,
                                               numero_do_pedido,
                                               status_do_pedido,
                                               sub_status_do_pedido, 
                                               revisao, 
                                               data_de_criacao_do_pedido,
                                               data_da_ultima_atualizacao_do_pedido,
                                               n_da_cotacao, 
                                               status_da_cotacao,
                                               substatus_da_cotacao,
                                               acao,
                                               motivo_da_acao,
                                               sub_motivo,
                                               organizacao_SS,
                                               tipo_de_SS,
                                               subtipo_da_SS,
                                               n_da_SS,
                                               status_da_SS,   
                                               substatus_da_SS,
                                               vencimento,
                                               prioridade,
                                               status,
                                               cotacao,
                                               faturavel,
                                               sobrenome,
                                               nome,
                                               oportunidade,
                                               funcionarios,
                                               alarme,
                                               criado_em,
                                               criado_por,
                                               termino_efetivo,
                                               regional_atribuida,
                                               alta,
                                               loja,
                                               portabilidade,
                                               troca,
                                               transferencia_de_titularidade,
                                               itens_especiais,
                                               responsavel,
                                               resultado_analise_credito,
                                               descricao,
                                               nome_do_responsavel,
                                               sobrenome_do_responsavel,
                                               cpf_cnpj,
                                               raiz,
                                               parecer_serasa,
                                               parecer_interno,
                                               endereco_de_entrega,
                                               uf,
                                               nome_do_gestor,
                                               adabas_do_gn,
                                               renegociacao_massiva,
                                               analise_na_cotacao,
                                               posicao_solicitante_da_SS,
                                               nivel_alcada,
                                               cotacao_pai,
                                               cotacao_principal,
                                               os_legado, 
                                               dt_inclusao_bd_cip,
                                               dt_inclusao_bd_cip2,
                                               ALTAS,
                                               PORTABILIDADE2,
                                               MIGRACAO,
                                               TROCAS,
                                               TT,
                                               BACKUP,
                                               PRE_POS,
                                               MIGRACAO_TROCA,
                                               M_2_M,
                                               FIXA,
                                               TIPO_SERVICO,
                                               total_linhas_cip,
                                               carregado_por_cip,
                                               carteira,
											                         TIPO_COTACAO)
                                                   VALUES('$numero_da_atividade', 
                                                          '$novo',
                                                          '$incio_planejado',
                                                          '$comentarios',
                                                          '$tipo',
                                                          '$cliente',
                                                          '$numero_do_pedido',
                                                          '$status_do_pedido',
                                                          '$sub_status_do_pedido', 
                                                          '$revisao', 
                                                          '$data_de_criacao_do_pedido',
                                                          '$data_da_ultima_atualizacao_do_pedido',
                                                          '$n_da_cotacao', 
                                                          '$status_da_cotacao',
                                                          '$substatus_da_cotacao',
                                                          '$acao',
                                                          '$motivo_da_acao',
                                                          '$sub_motivo',
                                                          '$organizacao_SS',
                                                          '$tipo_de_SS',
                                                          '$subtipo_da_SS',
                                                          '$n_da_SS',
                                                          '$status_da_SS',   
                                                          '$substatus_da_SS',
                                                          '$vencimento',
                                                          '$prioridade',
                                                          '$status',
                                                          '$cotacao',
                                                          '$faturavel',
                                                          '$sobrenome',
                                                          '$nome',
                                                          '$oportunidade',
                                                          '$funcionarios',
                                                          '$alarme',
                                                          '$criado_em',
                                                          '$criado_por',
                                                          '$termino_efetivo',
                                                          '$regional_atribuida',
                                                          '$alta',
                                                          '$loja',
                                                          '$portabilidade',
                                                          '$troca',
                                                          '$transferencia_de_titularidade',
                                                          '$itens_especiais',
                                                          '$responsavel',                  
                                                          '$resultado_analise_credito',
                                                          '$descricao',
                                                          '$nome_do_responsavel',
                                                          '$sobrenome_do_responsavel',
                                                          '$cpf_cnpj',
                                                          '$raiz',
                                                          '$parecer_serasa',
                                                          '$parecer_interno',
                                                          '$endereco_de_entrega',
                                                          '$uf',
                                                          '$nome_do_gestor',
                                                          '$adabas_do_gn',
                                                          '$renegociacao_massiva',
                                                          '$analise_na_cotacao',
                                                          '$posicao_solicitante_da_SS',
                                                          '$nivel_alcada', 
                                                          '$cotacao_pai',
                                                          '$cotacao_principal',
                                                          '$os_legado',                     
                                                          '$dt_inclusao_bd_cip',
                                                          '$dt_inclusao_bd_cip2',
                                                          '$ALTAS',
                                                          '$PORTABILIDADE2',
                                                          '$MIGRACAO',
                                                          '$TROCAS',
                                                          '$TT',
                                                          '$BACKUP',
                                                          '$PRE_POS',
                                                          '$MIGRACAO_TROCA',
                                                          '$M_2_M',
                                                          '$FIXA',
                                                          '$TIPO_SERVICO',
                                                          '$total_linhas_cip',
                                                          '$carregado_por_cip',
                                                          '$carteira',
														                              'Principal')";
                                                          
             $result = mysql_query($sql_inserir) or die(mysql_error()); 
             
     
            
             
         
        
             //Monta SQL para INSERT
    
            $sql_atualiza2 ="SELECT * FROM tbl_cotacao WHERE TIPO_COTACAO='Principal' GROUP BY id_cotacao ";
            $acao_atualiza2 = mysql_query($sql_atualiza2) or die (mysql_error());
            while($linha_atualiza2 = mysql_fetch_assoc($acao_atualiza2))
            { 
            $id_cotacao2                   = $linha_atualiza2['id_cotacao'];
            $substatus                     = $linha_atualiza2['substatus_da_cotacao'];
            $acao                          = $linha_atualiza2['acao'];
            }
 
            $sql_inserir2 ="INSERT INTO tbl_analise(id_cotacao,
                                               status_cip_analise,
                                               disc_status_cip_analise,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '2',
                                                       'Quantificar',
                                                       'Analise'
                                                       )";
            $result2 = mysql_query($sql_inserir2) or die(mysql_error());



           /* $query_linha="UPDATE tbl_cotacao a SET a.tipo ='Ilha de input',a.substatus_da_cotacao='Input'                               
                                   WHERE a.id_cotacao  = '$id_cotacao2' ";

            $consulta_servico2 = mysql_query($query_linha) or die (mysql_error());*/
            
       
       } 
          
           

    }   
       
             
      
          
      
            $sql_atualiza3 ="SELECT  b.id_cotacao as ds_idcotacao ,
                                     b.cotacao_principal,
                                     b.revisao,
                                     b.status_da_cotacao,
                                     b.substatus_da_cotacao,
                                     b.acao,
                                     a.cotacao_principal,
                                     a.revisao,
                                     a.status_da_cotacao,
                                     a.substatus_da_cotacao,
                                     a.acao                           
                             FROM tbl_cotacao_vpg a INNER JOIN tbl_cotacao b 
                             ON a.cotacao_principal=b.cotacao_principal 
                             
                             WHERE a.status_da_cotacao='Reprovado ilha de input'
                             and a.substatus_da_cotacao='Input' 
                             and a.acao='Reprovado input'
                             and b.status_da_cotacao='Enviado ilha de input' 
                             and b.substatus_da_cotacao='Análise documentação'
                             and b.acao = '' OR b.acao IS NULL  
                             and b.id_cotacao_retorno IS NULL 
                             GROUP BY b.cotacao_principal,b.id_cotacao DESC LIMIT 1";
            $acao_atualiza3 = mysql_query($sql_atualiza3) or die (mysql_error());
            $linha_valida3 = mysql_num_rows( $acao_atualiza3);
            //echo '<br>';
       
            while($linha_atualiza3 = mysql_fetch_assoc($acao_atualiza3))
             {
        
             $id_cotacao3                = $linha_atualiza3['ds_idcotacao'];
             $substatus                  = $linha_atualiza3['substatus_da_cotacao'];
             $acao                       = $linha_atualiza3['acao'];
             //echo '<br>';
           
           
             $filtro="SELECT COUNT(id_cotacao) as total                                 
                             FROM tbl_input  
                             where id_cotacao='$id_cotacao3'
                             GROUP BY id_cotacao DESC";
           $consulta_count=mysql_query($filtro) or die(mysql_error());
           $count = mysql_fetch_array($consulta_count);
           $total=$count['total'];
            
            if($total == 0){
         
          if( $substatus == "Analise documentacao"){
            
            $sql_inserir3 ="INSERT INTO tbl_input(id_cotacao,
                                                status_cip_input,
                                               disc_status_cip_input,
                                               setor)
                                                VALUES('$id_cotacao3',
                                                       '7',
                                                       'Distribuir',
                                                       'Input'
                                                       )";
             $result3 = mysql_query($sql_inserir3) or die(mysql_error()); 
           
           
             $sql_deletar3 ="DELETE FROM tbl_analise WHERE id_cotacao='$id_cotacao3'";
             $result3 = mysql_query($sql_deletar3) or die(mysql_error()); 
             
              $filtro="SELECT * FROM tbl_cotacao a INNER JOIN tbl_input b
                      ON a.id_cotacao=b.id_cotacao
                      WHERE a.status_da_cotacao='Reprovado ilha de input' and a.substatus_da_cotacao='Input' 
					  and a.acao='Reprovado input'  
                      GROUP BY a.id_cotacao DESC";
             $consulta_count=mysql_query($filtro) or die(mysql_error());
             $linha_cota = mysql_fetch_array($consulta_count);
             $id_cotacao = $linha_cota['id_cotacao'];
      
             $sql_deletar3 ="UPDATE tbl_cotacao SET tipo='Ilha de Input',retorno='Reprovado',id_cotacao_retorno='$id_cotacao'
                             WHERE id_cotacao='$id_cotacao3'";
             $result3 = mysql_query($sql_deletar3) or die(mysql_error()); 
             
             
             
              $filtro="SELECT * FROM tbl_cotacao a
                      WHERE a.status='Reprovado ilha de input' and a.acao='Reprovado input' 
                      GROUP BY a.id_cotacao ASC";
             $consulta_count=mysql_query($filtro) or die(mysql_error());
             $linha_cota = mysql_fetch_array($consulta_count);
             $id_cotacao = $linha_cota['id_cotacao'];
             
             $sql_deletar3 ="UPDATE tbl_cotacao SET tipo='Ilha de Input',retorno='Reprovado',id_cotacao_retorno='$id_cotacao3'
                             WHERE id_cotacao='$id_cotacao'";
             $result3 = mysql_query($sql_deletar3) or die(mysql_error());
             
          }
       }


    }
    
    
/*$sql_atualiza ="SELECT * FROM tbl_cotacao_vpg 
                WHERE n_da_cotacao <> cotacao_principal 
                and tipo = 'Analise de input' 
                and acao in ('Aprovado análise',
                             'Correção input',
                             'Reprovado análise',
                             'Reprovado',
                             'Aprovado') GROUP BY n_da_cotacao ";*/
                             
   $sql_atualiza ="SELECT * FROM tbl_cotacao_vpg 
                WHERE n_da_cotacao <> cotacao_principal 
                and tipo IN ('Analise de input','Ilha de input','Correcao input')
                and status_da_cotacao IN ('Enviado ilha de input') 
                and substatus_da_cotacao IN ('Input','Analise de input','Correcao input')
                and status IN ('Pendente','Concluida','Concluido') GROUP BY n_da_cotacao ";                             
    $acao_atualiza = mysql_query($sql_atualiza) or die (mysql_error());
    while($linha_atualiza = mysql_fetch_assoc($acao_atualiza)){
    
        $id_cotacao                           = $linha_atualiza["id_cotacao"];
        $numero_da_atividade                  = $linha_atualiza["numero_da_atividade"]; 
        $novo                                 = $linha_atualiza["novo"];
        $incio_planejado                      = $linha_atualiza["incio_planejado"];
        $comentarios                          = $linha_atualiza["comentarios"];
        $tipo                                 = $linha_atualiza["tipo"];
        $cliente                              = $linha_atualiza["cliente"];
        $numero_do_pedido                     = $linha_atualiza["numero_do_pedido"];
        $status_do_pedido                     = $linha_atualiza["status_do_pedido"];
        $sub_status_do_pedido                 = $linha_atualiza["sub_status_do_pedido"]; 
        $revisao                              = $linha_atualiza["revisao"]; 
        $data_de_criacao_do_pedido            = $linha_atualiza["data_de_criacao_do_pedido"];
        $data_da_ultima_atualizacao_do_pedido = $linha_atualiza["data_da_ultima_atualizacao_do_pedido"];
        $n_da_cotacao                         = $linha_atualiza["n_da_cotacao"]; 
        $status_da_cotacao                    = $linha_atualiza["status_da_cotacao"];
        $substatus_da_cotacao                 = $linha_atualiza["substatus_da_cotacao"];
        $acao                                 = $linha_atualiza["acao"];
        $motivo_da_acao                       = $linha_atualiza["motivo_da_acao"];
        $sub_motivo                           = $linha_atualiza["sub_motivo"];
        $organizacao_SS                       = $linha_atualiza["organizacao_SS"];
        $tipo_de_SS                           = $linha_atualiza["tipo_de_SS"];
        $subtipo_da_SS                        = $linha_atualiza["subtipo_da_SS"];
        $n_da_SS                              = $linha_atualiza["n_da_SS"];
        $status_da_SS                         = $linha_atualiza["status_da_SS"];   
        $substatus_da_SS                      = $linha_atualiza["substatus_da_SS"];
        $vencimento                           = $linha_atualiza["vencimento"];
        $prioridade                           = $linha_atualiza["prioridade"];
        $status                               = $linha_atualiza["status"];
        $cotacao                              = $linha_atualiza["cotacao"];
        $faturavel                            = $linha_atualiza["faturavel"];
        $sobrenome                            = $linha_atualiza["sobrenome"];
        $nome                                 = $linha_atualiza["nome"];
        $oportunidade                         = $linha_atualiza["oportunidade"];
        $funcionarios                         = $linha_atualiza["funcionarios"];
        $alarme                               = $linha_atualiza["alarme"];
        $criado_em                            = $linha_atualiza["criado_em"];
        $criado_por                           = $linha_atualiza["criado_por"];
        $termino_efetivo                      = $linha_atualiza["termino_efetivo"];
        $regional_atribuida                   = $linha_atualiza["regional_atribuida"];
        $alta                                 = $linha_atualiza["alta"];
        $loja                                 = $linha_atualiza["loja"];
        $portabilidade                        = $linha_atualiza["portabilidade"];
        $troca                                = $linha_atualiza["troca"];
        $transferencia_de_titularidade        = $linha_atualiza["transferencia_de_titularidade"];
        $itens_especiais                      = $linha_atualiza["itens_especiais"];
        $responsavel                          = $linha_atualiza["responsavel"];
        $resultado_analise_credito            = $linha_atualiza["resultado_analise_credito"];
        $descricao                            = $linha_atualiza["descricao"];
        $nome_do_responsavel                  = $linha_atualiza["nome_do_responsavel"];
        $sobrenome_do_responsavel             = $linha_atualiza["sobrenome_do_responsavel"];
        $cpf_cnpj                             = $linha_atualiza["cpf_cnpj"];
        $raiz                                 = $linha_atualiza["raiz"];
        $parecer_serasa                       = $linha_atualiza["parecer_serasa"];
        $parecer_interno                      = $linha_atualiza["parecer_interno"];
        $endereco_de_entrega                  = $linha_atualiza["endereco_de_entrega"];
        $uf                                   = $linha_atualiza["uf"];
        $nome_do_gestor                       = $linha_atualiza["nome_do_gestor"];
        $adabas_do_gn                         = $linha_atualiza["adabas_do_gn"];
        $renegociacao_massiva                 = $linha_atualiza["renegociacao_massiva"];
        $analise_na_cotacao                   = $linha_atualiza["analise_na_cotacao"];
        $posicao_solicitante_da_SS            = $linha_atualiza["posicao_solicitante_da_SS"];
        $nivel_alcada                         = $linha_atualiza["nivel_alcada"];
        $cotacao_pai                          = $linha_atualiza["cotacao_pai"];
        $cotacao_principal                    = $linha_atualiza["cotacao_principal"];
        $os_legado                            = $linha_atualiza["os_legado"];
        $dt_inclusao_bd_cip                   = $linha_atualiza["dt_inclusao_bd_cip"];
        $dt_inclusao_bd_cip2                  = $linha_atualiza["dt_inclusao_bd_cip2"];
        $ALTAS                                = $linha_atualiza["ALTAS"];
        $PORTABILIDADE2                        = $linha_atualiza["PORTABILIDADE2"];
        $MIGRACAO                             = $linha_atualiza["MIGRACAO"];
        $TROCAS                               = $linha_atualiza["TROCAS"];
        $TT                                   = $linha_atualiza["TT"];
        $BACKUP                               = $linha_atualiza["BACKUP"];
        $PRE_POS                              = $linha_atualiza["PRE_POS"];
        $MIGRACAO_TROCA                       = $linha_atualiza["MIGRACAO_TROCA"];
        $M_2_M                                = $linha_atualiza["M_2_M"];
        $FIXA                                 = $linha_atualiza["FIXA"];
        $TIPO_SERVICO                         = $linha_atualiza["TIPO_SERVICO"];
        $total_linhas_cip                     = $linha_atualiza["total_linhas_cip"];
        $carregado_por_cip                    = $linha_atualiza["carregado_por_cip"];
       	$carteira                             = $linha_atualiza["carteira"]; 			 
        //Monta SQL para INSERT
        
        
        
        
        
        
    $sql_inserir2 ="INSERT INTO tbl_cotacao (numero_da_atividade, 
                                               novo,
                                               incio_planejado,
                                               comentarios,
                                               tipo,
                                               cliente,
                                               numero_do_pedido,
                                               status_do_pedido,
                                               sub_status_do_pedido, 
                                               revisao, 
                                               data_de_criacao_do_pedido,
                                               data_da_ultima_atualizacao_do_pedido,
                                               n_da_cotacao, 
                                               status_da_cotacao,
                                               substatus_da_cotacao,
                                               acao,
                                               motivo_da_acao,
                                               sub_motivo,
                                               organizacao_SS,
                                               tipo_de_SS,
                                               subtipo_da_SS,
                                               n_da_SS,
                                               status_da_SS,   
                                               substatus_da_SS,
                                               vencimento,
                                               prioridade,
                                               status,
                                               cotacao,
                                               faturavel,
                                               sobrenome,
                                               nome,
                                               oportunidade,
                                               funcionarios,
                                               alarme,
                                               criado_em,
                                               criado_por,
                                               termino_efetivo,
                                               regional_atribuida,
                                               alta,
                                               loja,
                                               portabilidade,
                                               troca,
                                               transferencia_de_titularidade,
                                               itens_especiais,
                                               responsavel,
                                               resultado_analise_credito,
                                               descricao,
                                               nome_do_responsavel,
                                               sobrenome_do_responsavel,
                                               cpf_cnpj,
                                               raiz,
                                               parecer_serasa,
                                               parecer_interno,
                                               endereco_de_entrega,
                                               uf,
                                               nome_do_gestor,
                                               adabas_do_gn,
                                               renegociacao_massiva,
                                               analise_na_cotacao,
                                               posicao_solicitante_da_SS,
                                               nivel_alcada,
                                               cotacao_pai,
                                               cotacao_principal,
                                               os_legado, 
                                               dt_inclusao_bd_cip,
                                               dt_inclusao_bd_cip2,
                                               ALTAS,
                                               PORTABILIDADE2,
                                               MIGRACAO,
                                               TROCAS,
                                               TT,
                                               BACKUP,
                                               PRE_POS,
                                               MIGRACAO_TROCA,
                                               M_2_M,
                                               FIXA,
                                               TIPO_SERVICO,
                                               total_linhas_cip,
                                               carregado_por_cip,
                                               carteira,
											                         TIPO_COTACAO)
                                                   VALUES('$numero_da_atividade', 
                                                          '$novo',
                                                          '$incio_planejado',
                                                          '$comentarios',
                                                          '$tipo',
                                                          '$cliente',
                                                          '$numero_do_pedido',
                                                          '$status_do_pedido',
                                                          '$sub_status_do_pedido', 
                                                          '$revisao', 
                                                          '$data_de_criacao_do_pedido',
                                                          '$data_da_ultima_atualizacao_do_pedido',
                                                          '$n_da_cotacao', 
                                                          '$status_da_cotacao',
                                                          '$substatus_da_cotacao',
                                                          '$acao',
                                                          '$motivo_da_acao',
                                                          '$sub_motivo',
                                                          '$organizacao_SS',
                                                          '$tipo_de_SS',
                                                          '$subtipo_da_SS',
                                                          '$n_da_SS',
                                                          '$status_da_SS',   
                                                          '$substatus_da_SS',
                                                          '$vencimento',
                                                          '$prioridade',
                                                          '$status',
                                                          '$cotacao',
                                                          '$faturavel',
                                                          '$sobrenome',
                                                          '$nome',
                                                          '$oportunidade',
                                                          '$funcionarios',
                                                          '$alarme',
                                                          '$criado_em',
                                                          '$criado_por',
                                                          '$termino_efetivo',
                                                          '$regional_atribuida',
                                                          '$alta',
                                                          '$loja',
                                                          '$portabilidade',
                                                          '$troca',
                                                          '$transferencia_de_titularidade',
                                                          '$itens_especiais',
                                                          '$responsavel',                  
                                                          '$resultado_analise_credito',
                                                          '$descricao',
                                                          '$nome_do_responsavel',
                                                          '$sobrenome_do_responsavel',
                                                          '$cpf_cnpj',
                                                          '$raiz',
                                                          '$parecer_serasa',
                                                          '$parecer_interno',
                                                          '$endereco_de_entrega',
                                                          '$uf',
                                                          '$nome_do_gestor',
                                                          '$adabas_do_gn',
                                                          '$renegociacao_massiva',
                                                          '$analise_na_cotacao',
                                                          '$posicao_solicitante_da_SS',
                                                          '$nivel_alcada', 
                                                          '$cotacao_pai',
                                                          '$cotacao_principal',
                                                          '$os_legado',                     
                                                          '$dt_inclusao_bd_cip',
                                                          '$dt_inclusao_bd_cip2',
                                                          '$ALTAS',
                                                          '$PORTABILIDADE2',
                                                          '$MIGRACAO',
                                                          '$TROCAS',
                                                          '$TT',
                                                          '$BACKUP',
                                                          '$PRE_POS',
                                                          '$MIGRACAO_TROCA',
                                                          '$M_2_M',
                                                          '$FIXA',
                                                          '$TIPO_SERVICO',
                                                          '$total_linhas_cip',
                                                          '$carregado_por_cip',
                                                          '$carteira',
														                              'Complementar')";
                                                          
              
	 $result2 = mysql_query($sql_inserir2) or die(mysql_error());


//Monta SQL para INSERT
    
            $sql_atualiza2 ="SELECT * FROM tbl_cotacao WHERE TIPO_COTACAO='Complementar' GROUP BY id_cotacao ";
            $acao_atualiza2 = mysql_query($sql_atualiza2) or die (mysql_error());
            while($linha_atualiza2 = mysql_fetch_assoc($acao_atualiza2))
            { 
            $id_cotacao2                   = $linha_atualiza2['id_cotacao'];
            $substatus                     = $linha_atualiza2['substatus_da_cotacao'];
            $acao                          = $linha_atualiza2['acao'];
            }
 
            $sql_inserir2 ="INSERT INTO tbl_input(id_cotacao,
                                               status_cip_input,
                                               disc_status_cip_input,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '7',
                                                       'Distribuir',
                                                       'Input'
                                                       )";
            $result2 = mysql_query($sql_inserir2) or die(mysql_error());
            




		 
     }
	 
	
	 
     $sqlcota="SELECT a.cotacao_principal,
               a.tipo,
               a.status_da_cotacao,
               a.substatus_da_cotacao,
               a.status,
               a.revisao,
               a.n_da_cotacao,
               a.TIPO_COTACAO FROM tbl_cotacao a 
	           WHERE a.tipo IN ('Analise documentacao')
                and a.status_da_cotacao IN ('Enviado ilha de input') 
                and a.substatus_da_cotacao IN ('Analise documentacao')
                and a.status IN ('Pendente') and a.TIPO_COTACAO='Principal' 
              GROUP BY a.n_da_cotacao,a.revisao DESC";
				
				$result = mysql_query($sqlcota) or die(mysql_error());
				while($linha_revisao = mysql_fetch_assoc($result)){
				$revisaob=$linha_revisao["revisao"];
				$cotacao_principalb=$linha_revisao["cotacao_principal"];
				
			  $sqlup="UPDATE tbl_cotacao b 
              SET b.REVISAO_PRINCIPAL='$revisaob' 
                WHERE b.cotacao_principal ='$cotacao_principalb' 
				and b.REVISAO_PRINCIPAL IS NULL ";
				$result3= mysql_query($sqlup,$conecta);
				
				}  
  
  $sql1="SELECT id_cotacao  FROM tbl_cotacao_vpg ORDER BY cotacao_principal";   
            
       $result1 = mysql_query($sql1) or die(mysql_error());
        $num1=mysql_num_rows($result1); 
  
      $sql2="SELECT a.id_cotacao  FROM tbl_analise a INNER JOIN tbl_cotacao b 
            ON a.id_cotacao=b.id_cotacao 
            WHERE a.status_cip_analise = 2 AND dt_inclusao_bd_cip = '$data_inclusao_bd2_mes'
            GROUP BY a.id_cotacao";   
            
       $result2 = mysql_query($sql2) or die(mysql_error());
       $num2=mysql_num_rows($result2); 

       $sql3="SELECT * FROM tbl_input a INNER JOIN tbl_cotacao b 
            ON a.id_cotacao=b.id_cotacao
            WHERE a.status_cip_input = 7 AND dt_inclusao_bd_cip = '$data_inclusao_bd2_mes' 
            GROUP BY a.id_cotacao";   
            
       $result3 = mysql_query($sql3) or die(mysql_error());
       $num3=mysql_num_rows($result3);



/*echo 'carga:'.*/ $totalcarregadas=$row-1; //echo '<br>';
/*echo 'carregadas:'.*/ $totalatualizadas=$num1; //echo '<br>'; 
/*echo 'carregadas na analise:'.*/$totalatualizadas2=$num2; //echo '<br>';
/*echo 'carregadas input :'.*/$totalatualizadas3=$num3; //echo '<br>';
 
  echo "<div class='divmsg bradius' style='background:#E7E4D1;'>";                                                 
echo "<font color='#000000' face='arial' size='2'>Base VPG atualizada com sucesso!.<br>";
    if($totalatualizadas != 1 ){
     echo" ";
     }else{
      echo utf8_encode(" <br>Base com total de {$totalcarregadas} cotações no vivocorp.<br>");
      }
	    if($totalatualizadas2 == 0 && $totalatualizadas3 == 0 && $totalatualizadas == 0){
            
       echo utf8_encode("<br>Cotações nao foram carregadas no cip.</font><br><br>");
	   }
        if($totalatualizadas2 == 0 && $totalatualizadas3 == 0 ){
            
       echo utf8_encode("<br>Cotações ja constam no cip.</font><br><br>");
	 }else{
	   
       if($totalatualizadas2 != 0){
       echo utf8_encode("<br><font color='#000000' face='arial' size='2'>Foram carregados {$totalatualizadas2} cotações no Gala - VPG na Análise.</font><br>");
       }
       if($totalatualizadas3 != 0){
        echo utf8_encode("<br><font color='#000000' face='arial' size='2'>Foram carregados {$totalatualizadas3} cotações no Gala - VPG no Input.</font><br><br>");
        }        
   
       }
      echo "<div/>";      
      
 $sql_valida1 = "UPDATE tbl_cotacao SET 
                                      carteira = 'VPG - TOP'
                                      WHERE  carteira = '' ";
    $acao_valida1 = mysql_query($sql_valida1) or die (mysql_error());   
                 
//Faz consulta em todas as atividades da tabela tbl_atividades
    $update_atv = "SELECT * FROM tbl_cotacao
                   WHERE (total_linhas_cip <> 0 OR total_linhas_cip <> '') 
                   GROUP BY id_cotacao ASC LIMIT 20000 ";
    $acao_update1 = mysql_query($update_atv) or die (mysql_error());
    $linha_update = mysql_fetch_array($acao_update1);
    
    //Tráz dados da tabela para dentro das variaveis
    $n_da_cotacao    =$linha_update['n_da_cotacao'];
    $ALTAS           =$linha_update['ALTAS'];
	  $PORTABILIDADE   =$linha_update['PORTABILIDADE2'];
	  $MIGRACAO        =$linha_update['MIGRACAO'];
	  $TROCAS          =$linha_update['TROCAS'];
	  $TT              =$linha_update['TT'];
	  $BACKUP          =$linha_update['BACKUP'];
    $PRE_POS         =$linha_update["PRE_POS"];
    $MIGRACAO_TROCA  = $linha_update['MIGRACAO_TROCA'];
    $M_2_M           = $linha_update['M_2_M'];
    $FIXA            = $linha_update['FIXA'];
	  $TIPO_SERVICO    =$linha_update['TIPO_SERVICO'];
    $total_linhas_cip=$linha_update['total_linhas_cip'];	
  

						 
                $query="UPDATE tbl_cotacao a SET 
                              	a.ALTAS          ='$ALTAS',
								                a.PORTABILIDADE2 ='$PORTABILIDADE',
								                a.MIGRACAO       ='$MIGRACAO',
						                    a.TROCAS         ='$TROCAS',
						                    a.TT             ='$TT',
						                    a.BACKUP         ='$BACKUP',
                                a.PRE_POS        ='$PRE_POS',
                                a.MIGRACAO_TROCA = '$MIGRACAO_TROCA',
                                a.M_2_M          = '$M_2_M', 
                                a.FIXA           = '$FIXA',
						                    a.TIPO_SERVICO   ='$TIPO_SERVICO',
                                a.total_linhas_cip ='$total_linhas_cip '								
                                WHERE n_da_cotacao  = '$n_da_cotacao' and (total_linhas_cip = 0 OR total_linhas_cip = '')";
                         
                $acao_update2 = mysql_query($query) or die (mysql_error());
   
?>	 
<p>
    <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?t=forms/formatualizar_base_vpg.php'" />
     <script>
        <!--
    //    document.write('</div>')
        -->
    </script>
    
</div>    
</body>
</html>