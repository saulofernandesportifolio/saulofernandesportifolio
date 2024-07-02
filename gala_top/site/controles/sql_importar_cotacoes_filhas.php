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

 return preg_replace( '/[`^\\~\'"]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
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

    $tempo = 0;
  set_time_limit($tempo);
  
ini_set ( 'mysql.connect_timeout' ,  '60' ); 
ini_set ( 'default_socket_timeout' ,  '60' );
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
    }
}else{        
          for($cont = 0;$cont < count($data);$cont++){
              $valores[$cabecalhos[$cont]]= $data[$cont]; 
             }
                        
          
           $legenda =array('N da cotao'                         =>'n_da_cotacao',
                           'Cotao Pai'                          =>'cotacao_pai',
                           'Cotao Principal'                    =>'cotacao_principal',
                           'Reviso'                             =>'revisao',
                           'Nome'                               =>'nome',
                           'Status'                             =>'status',
                           'Substatus'                          =>'substatus',
                           'Criado em'                          =>'criado_em',
                           'Criado por'                         =>'criado_por',
                           'Data de vencimento'                 =>'data_de_vencimento',
                           'Tipo de input'                      =>'tipo_de_input',
                           'Motivo de input'                    =>'motivo_de_input',
                           'N do pedido'                        =>'nu_pedido'                          
                           );
   
   
   
   foreach($valores as $idx => $vlr){
            
   $idx." - ";
              }
         
            
$cb='';
$dados='';
$naocarregar='';
     foreach($valores as $idx => $vlr){
            
              if($legenda[$idx] == 'n_da_cotacao'
               OR $legenda[$idx] == 'cotacao_pai'
               OR $legenda[$idx] == 'cotacao_principal'
               OR $legenda[$idx] == 'revisao'
               OR $legenda[$idx] == 'nome'
               OR $legenda[$idx] == 'status'
               OR $legenda[$idx] == 'substatus'
               OR $legenda[$idx] == 'criado_em'
               OR $legenda[$idx] == 'criado_por'
               OR $legenda[$idx] == 'data_de_vencimento'
               OR $legenda[$idx] == 'tipo_de_input' 
               OR $legenda[$idx] == 'motivo_de_input' 
               )
               {             
          
          
           
               
          
          
          
          
             $cb.=$legenda[$idx].",";
              
                    
            
                     
            
              if($legenda[$idx] == 'criado_em')
              {
                
               $vlr=arrumadatainicio($vlr);
              
              } 
            
                if($legenda[$idx] == 'data_de_vencimento' )
              {
                
              $vlr=arrumadatavencimento($vlr);
                
              } 
              
                if($legenda[$idx] == 'motivo_de_input' )
              {
                
              $vlr=arrumaString($vlr);
                
              } 
              
             if($legenda[$idx] == 'n_da_cotacao'){
                
               $n_cotacao=$vlr; 
                
                
              }
              
                
              $dados.= "'$vlr'".",";
               
              
              
                            
             
               
              }
        }
        // echo ")VALUES(";
        
        
      $cb= substr($cb, 0, strlen($cb) - 1); 
      $dados=substr($dados, 0, strlen($dados) - 1);
      
 
                                   
                  
                         
                     
              $sql ="SELECT DISTINCT count(b.id_cotacao) as total 
                     FROM tbl_cotacao a INNER JOIN tbl_cotacao_filha b
                     ON a.id_cotacao=b.id_cotacao
                     INNER JOIN tbl_cotacao_filha c
                     ON b.n_da_cotacao='$n_cotacao' 
                     GROUP BY a.cotacao_principal,a.n_da_cotacao ";
              $result = mysql_query($sql) or die(mysql_error());       
              $count = mysql_fetch_array($result);
              $total=$count['total'];
                        
            
            
             if($total == 0 ){    
                  $sql_atualiza ="SELECT * FROM tbl_usuarios WHERE idtbl_usuario = '$idtbl_usuario'";
                  $acao_atualiza = mysql_query($sql_atualiza) or die (mysql_error());
                  while($linha_atualiza = mysql_fetch_assoc($acao_atualiza))
                       { 
	                    $nome2 = $linha_atualiza["nome"];
   	                  
	   
	                   }
           $sql="INSERT IGNORE INTO tbl_cotacao_filha({$cb},
                                                                  id_cotacao,
                                                             dt_carga_bd_cip,
                                                         	 carregado_por_cip
                                                               )VALUES({$dados},
                                                                  '$id_cotacao',
                                                       	    '$data_inclusao_bd',
                                                                       '$nome2')";   
            
                             $result = mysql_query($sql) or die(mysql_error());
       
             
                 
           } 
   }

        $row++;
               
  
// fim - Atualiza o tipo das atividades na tabela tratamento       
        
}fclose ($handle);


 $sql1="SELECT id_cotacao  FROM tbl_cotacao_filha GROUP BY cotacao_principal";   
            
       $result1 = mysql_query($sql1) or die(mysql_error());
        $num1=mysql_num_rows($result1); 
  
      $sql2="SELECT a.id_cotacao  FROM tbl_analise a INNER JOIN tbl_cotacao_filha b 
            ON a.id_cotacao=b.id_cotacao 
            WHERE a.idtbl_usuario_analise ='$idtbl_usuario'  AND dt_carga_bd_cip LIKE '%$data_inclusao_bd2_mes%'
            ";   
            
       $result2 = mysql_query($sql2) or die(mysql_error());
       $num2=mysql_num_rows($result2); 

       $sql3="SELECT * FROM tbl_input a INNER JOIN tbl_cotacao_filha b 
            ON a.id_cotacao=b.id_cotacao
            WHERE a.idtbl_usuario_input ='$idtbl_usuario'  AND dt_carga_bd_cip LIKE '%$data_inclusao_bd2_mes%' 
            ";   
            
       $result3 = mysql_query($sql3) or die(mysql_error());
      echo $num3=mysql_num_rows($result3);


$totalcarregadas=$row;
$totalatualizadas=$num1;  
$totalatualizadas3=$num3;

 
 echo "<div class='divmsg bradius' style='background:#E7E4D1;'>";                                                 
echo "<font color='#000000' face='arial' size='2'>Cotações filhas  VPG atualizada com sucesso!.<br>";
   if($totalatualizadas3 == 0 ){
            
       echo"<br>Cotações filhas ja constam no cip.</font><br><br>";
	 }else{
	   
       if($totalatualizadas3 != 0){
        echo"<br><font color='#000000' face='arial' size='2'>Foram carregados {$totalatualizadas3} cotações filhas no Gala - VPG no Input.</font><br><br>";
        }        
   
       }
      echo "<div/>";  
   
?>
<br /><br /><br /><br />	 
<p>
    <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php'" />
     <script>
        <!--
    //    document.write('</div>')
        -->
    </script>
    
</div>    
</body>
</html>