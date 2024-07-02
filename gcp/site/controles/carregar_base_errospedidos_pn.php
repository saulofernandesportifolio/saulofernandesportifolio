
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
  
  
function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"´]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}


function tiraaspasimples($valor){
  $result = addslashes($valor);
  $virgula = "\'";
  $result2 = str_replace($virgula, ".", $result);
  return $result2;

  //echo $result;

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
               if(strlen($data1) == 2){
               $mes=substr($string3,3,2);
               $mes= str_replace("/","",$mes);
                
               }else{
               $mes=substr($string3,2,2);
               $mes= str_replace("/","",$mes);  

               }
              
           //   echo '<br>';
            //   echo "MES CARACTER: ". strlen($mes);
               
            //  echo '<br>';
              
             // echo '<br>';
               if(strlen($data1) == 2){
               $ano=substr($string3,5,5);
               $ano= str_replace("/","",$ano);
               
              }else{

               $ano=substr($string3,5,4);
               $ano= str_replace("/","",$ano);
               
             // echo '<br>';  
              } 
              
           //   echo '<br>';
         //      echo "ANO CARACTER: ". strlen($ano);
               
          //    echo '<br>';
              
              
                if(strlen($ano) == 3 && strlen($data1) == 2 && strlen($mes) == 2){
                
                $ano=substr($string3,5,5);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
                $hora=substr($string3,10,10);
                $hora = str_replace("/","",$hora);  
                
                
               // echo '<br>';
               // echo "OK";
               // echo '<br>';
                
              }elseif(strlen($ano) == 3 && strlen($data1) == 2 && strlen($mes) == 1){
                
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
                  
                }elseif(strlen($ano) == 3 && strlen($data1) == 1 && strlen($mes) == 2 ){
                  
                 $ano=substr($string3,5,5);
                 $ano= str_replace("/","",$ano);
                  $ano =$ano;
                  
                  $hora=substr($string3,9,10);
                  $hora = str_replace("/","",$hora);  
                  
                 // echo '<br>';
                  //echo "OK 33";
                 // echo '<br>';
                  
                }elseif(strlen($ano) == 4 && strlen($data1) == 2 && strlen($mes) == 2 ){
                
                $ano=substr($string3,5,5);
                $ano= str_replace("/","",$ano);
                $ano =$ano;
                
                $hora=substr($string3,10,10);
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
 include("../bd.php");
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
                        
          
             $legenda =array('Nmero do Pedido'         =>'nu_do_pedido',
                             'Cliente'                 =>'cliente',
                             'Nome fantasia'           =>'nome_fantasia',
                             'CPFCNPJ'                 =>'cpf_cnpj',
                             'Gestor da conta'         =>'gestor_da_conta',
                             'Status'                  =>'status',
                             'Tipo de cliente'         =>'tipo_de_cliente',
                             'Carteira'                =>'carteira',
                             'Reviso'                  =>'revisao',
                             'Tipo'                    =>'tipo',
                             'Criado em'               =>'criado_em',
                             'Rep vendas'              =>'resp_vendas',
                             'Prioridade'              =>'prioridade',
                             'Aprovado'                =>'aprovado',
                             'Aprovado por'            =>'aprovado_por',
                             'Criado por'              =>'criado_por',
                             'Vencimento'              =>'vencimento',
                             'N da cotao'              =>'nu_da_cotacao',
                             'Data do Pedido'          =>'data_do_pedido',
                             'Organizao'               =>'organizacao',
                             'UF'                      =>'uf',
                             'Protocolo de atendimento'=>'protocolo_de_atendimento',
                             'Alada'                   =>'alcada',
                             'Portabilidade'           =>'portabilidade',
                             'Troca'                   =>'troca',
                             'Alta'                    =>'alta',
                             'Loja'                    =>'loja',
                             'Itens especiais'         =>'itens_especiais',
                             'Condio de pagamento'     =>'condicao_de_pagamento',
                             'Cdigo Adabas'            =>'codigo_adabas',
                             'Simulao'                 =>'simulacao',
                             'Nmero ID SFA'            =>'numero_id_sfa',
                             'Data da ltima atualizao' =>'data_da_ultima_atualizacao'
                           );
   
   
   
   foreach($valores as $idx => $vlr){
            
   $idx." - ";
              }
   

            
$cb='';
$dados='';
$naocarregar='';
     foreach($valores as $idx => $vlr){

            
              if($legenda[$idx] == 'nu_do_pedido' OR
                 $legenda[$idx] == 'cliente' OR 
                 $legenda[$idx] == 'nome_fantasia' OR 
                 $legenda[$idx] == 'cpf_cnpj' OR 
                 $legenda[$idx] == 'gestor_da_conta' OR 
                 $legenda[$idx] == 'status' OR 
                 $legenda[$idx] == 'tipo_de_cliente' OR 
                 $legenda[$idx] == 'carteira' OR 
                 $legenda[$idx] == 'revisao' OR 
                 $legenda[$idx] == 'tipo' OR 
                 $legenda[$idx] == 'criado_em' OR 
                 $legenda[$idx] == 'resp_vendas' OR 
                 $legenda[$idx] == 'prioridade' OR 
                 $legenda[$idx] == 'aprovado' OR 
                 $legenda[$idx] == 'aprovado_por' OR 
                 $legenda[$idx] == 'criado_por' OR 
                 $legenda[$idx] == 'vencimento' OR 
                 $legenda[$idx] == 'nu_da_cotacao' OR 
                 $legenda[$idx] == 'data_do_pedido' OR 
                 $legenda[$idx] == 'organizacao' OR 
                 $legenda[$idx] == 'uf' OR 
                 $legenda[$idx] == 'protocolo_de_atendimento' OR 
                 $legenda[$idx] == 'alcada' OR 
                 $legenda[$idx] == 'portabilidade' OR 
                 $legenda[$idx] == 'troca' OR 
                 $legenda[$idx] == 'alta' OR 
                 $legenda[$idx] == 'loja' OR 
                 $legenda[$idx] == 'itens_especiais' OR 
                 $legenda[$idx] == 'condicao_de_pagamento' OR 
                 $legenda[$idx] == 'codigo_adabas' OR 
                 $legenda[$idx] == 'simulacao' OR 
                 $legenda[$idx] == 'numero_id_sfa' OR 
                 $legenda[$idx] == 'data_da_ultima_atualizacao')                
               
               {             
          
    
               $cb.=$legenda[$idx].",";
              
               if($legenda[$idx] == 'cliente' 
               OR $legenda[$idx] == 'alcada' 
               OR $legenda[$idx] == 'nome_do_gestor'
               OR $legenda[$idx] == 'condicao_de_pagamento' 
               OR $legenda[$idx] == 'nome_fantasia' 
               OR $legenda[$idx] == 'gestor_da_conta' 
               ){
                
                //$vlr = arrumaString($vlr);
                $vlr=tiraaspasimples($vlr);
                

                }           
            
                     
            
              if($legenda[$idx] == 'criado_em' 
                  OR $legenda[$idx] == 'data_do_pedido' 
                  OR $legenda[$idx] == 'data_da_ultima_atualizacao' 
                 )
              {
                
               $vlr=arrumadatainicio($vlr);
              
              } 
              
              if($legenda[$idx] == 'vencimento' )
              {
                
               $vlr=arrumadatavencimento($vlr);
              
              } 

                              
              $dados.= "'$vlr'".",";
               
            
                                                
              }


               




        }
      
        
        
      $cb= substr($cb, 0, strlen($cb) - 1); 
      $dados=substr($dados, 0, strlen($dados) - 1);
      
            



      
                    
                  $sql_atualiza ="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '{$_COOKIE['idtbl_usuario']}' ";
                  $acao_atualiza = mysql_query($sql_atualiza,$conecta2) or die (mysql_error());
                  while($linha_atualiza = mysql_fetch_assoc($acao_atualiza))
                       { 
	                     
                       
                         $nome2 = $linha_atualiza["nome"];
   	                 
	                }
                       
           
             $data_base= date('Y-m-d');
             $hora_base= date('H:s:i');
             $hora_atual = date ('H:i');
             $data_atual = date ('Y-m-d');
                       
           $sql="INSERT IGNORE INTO bd_erros_pn.base_pedidos_erros_pn({$cb},
                                                        data_base,
                                                        hora_base,
                                                        operador_base
                                                         )VALUES({$dados},
                                                      	 '$data_base',
                                                         '$hora_base',
                                                         '$nome2')";   
            
            $result = mysql_query($sql,$conecta2) or die(mysql_error());           
       

                
     } 
   

        $row++;
                 
// fim - Atualiza o tipo das atividades na tabela tratamento 
  
        
}fclose ($handle);

   $sql_valida = "SELECT DISTINCT a.id_pedido,
                         a.nu_do_pedido,
                         a.revisao,
                         b.nu_do_pedido,
                         b.revisao 
                  FROM bd_erros_pn.base_pedidos_erros_pn a INNER JOIN bd_erros_pn.base_pedidos_erros_historico_pn b
                  ON a.nu_do_pedido = b.nu_do_pedido and a.revisao = b.revisao ";
                   
                  $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

                  $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     while($linha_update9 = mysql_fetch_assoc($acao_valida)){
                     $linha_cota9    = $linha_update9["nu_do_pedido"];
                     $linha_revisa9  = $linha_update9["revisao"];
                     $linha_id9      = $linha_update9["id_pedido"];
                     
                     $sql_valida9 = "DELETE FROM bd_erros_pn.base_pedidos_erros_pn   
                                     WHERE nu_do_pedido = '$linha_cota9' and revisao = '$linha_revisa9' ";
                     $acao_valida9 = mysql_query($sql_valida9,$conecta2) or die (mysql_error()); 
                    
                             
                    
            } 
                

         }


$sql_validamass="CALL bd_erros_pn.carrega_base_pedidos_erros_historico_pn()";
  $resultmass = mysql_query($sql_validamass,$conecta2) or die(mysql_error());


/*
  echo "<div class='divmsg bradius' style='background:#E7E4D1;'>";   

  echo "<br><font color='#000000' face='arial' size='2'>Carregada com sucesso.</font><br><br>"; 

  echo "<div>"; */
  
  
echo"
<script>
document.location.replace('principal.php?t=forms/formatualizar_base_erros_pn.php');
</script>
 	";
  
  

 mysql_free_result($acao_atualiza,$acao_valida,$acao_valida9,$result);
 mysql_close($conecta2);

  ?>

<script language="javascript" type="text/javascript">
hideCarga();
</script>
<p>
    <input type="button" name="Submit2" value="Voltar" 
    onclick="window.location='principal.php?t=forms/formatualizar_base_errospedidos_pn.php'" />
</p>
</div>    
</body>
</html>