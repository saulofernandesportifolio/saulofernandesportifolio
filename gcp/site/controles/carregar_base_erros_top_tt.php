
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
<img class="imgloading" src="../site/forms/img/carregando.gif">
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
                        
          
             $legenda =array('Nmero do pedido'              =>'pedido',
                             'Comentrios'                   =>'comentario_vivocorp',
                             'Tipo'                         =>'tipo',
                             'Portabilidade'                =>'portabilidade',
                             'Cliente'                      =>'cliente',
                             'Status'                       =>'status',
                             'Status do pedido'             =>'status_do_pedido',
                             'Reviso'                       =>'revisao',
                             'Regional Atribuda'            =>'regional',
                             'Criado em'                    =>'criado_em',
                             'Alta'                         =>'alta',
                             'Troca'                        =>'troca',
                             'Transferncia de titularidade' =>'transferencia_titularidade',
                             'CPFCNPJ'                      =>'cnpj',
                             'Criado por'                   =>'criado_por',
                             'Tipo'                         =>'tipo_vivocorp',
                             'Nome do Gestor'               =>'nome_do_gestor',
                             'Organizao SS'                 =>'organizacao',
                             'Descrio'                      =>'descricao'
                           );
   
   
   
   foreach($valores as $idx => $vlr){
            
   $idx." - ";
              }
   

            
$cb='';
$dados='';
$naocarregar='';
     foreach($valores as $idx => $vlr){

            
              if($legenda[$idx] == 'pedido' OR 
                 $legenda[$idx] == 'comentario_vivocorp' OR 
                 $legenda[$idx] == 'tipo' OR 
                 $legenda[$idx] == 'portabilidade' OR 
                 $legenda[$idx] == 'cliente' OR             
                 $legenda[$idx] == 'status' OR          
                 $legenda[$idx] == 'status_do_pedido' OR   
                 $legenda[$idx] == 'revisao' OR  
                 $legenda[$idx] == 'regional' OR  
                 $legenda[$idx] == 'criado_em' OR      
                 $legenda[$idx] == 'alta' OR             
                 $legenda[$idx] == 'troca' OR              
                 $legenda[$idx] == 'transferencia_titularidade' OR             
                 $legenda[$idx] == 'cnpj' OR             
                 $legenda[$idx] == 'criado_por' OR 
                 $legenda[$idx] == 'tipo_vivocorp' OR 
                 $legenda[$idx] == 'nome_do_gestor' OR 
                 $legenda[$idx] == 'organizacao' OR 
                 $legenda[$idx] == 'descricao')                
               
               {             
          
    
               $cb.=$legenda[$idx].",";
              
               if($legenda[$idx] == 'cliente' 
               OR $legenda[$idx] == 'comentario_vivocorp' 
               OR $legenda[$idx] == 'nome_do_gestor' 
               OR $legenda[$idx] == 'descricao' 
               ){
                
                
                //$vlr=arrumaString($vlr);
                $vlr=tiraaspasimples($vlr);

                }           
            
                     
            
              if($legenda[$idx] == 'criado_em')
              {
                
               $vlr=corrigedatas($vlr);
              
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
                       
             $sql="INSERT IGNORE INTO bd_erros_pn.base_erros_filtro_top_tt({$cb},
                                                        usuario,
                                                        fila,
                                                        nome2,
                                                        tramite,
                                                        data_tramite,
                                                        turno,
                                                        status_tp,
                                                        disc_status_tp,
                                                        operador,
                                                        cadastro_manual,
                                                        data_base,
                                                        hora_base,
                                                        operador_base
                                                         )VALUES({$dados},
                                                         'Aguardando Operador',
                                                         '1',
                                                         'Aguardando Operador',
                                                         'Aguardando',
                                                         '$data_atual',
                                                         'ND',
                                                         '1',
                                                         'Aberto',
                                                         'Aguardando Operador',
                                                         'Não',
                                                       	 '$data_base',
                                                         '$hora_base',
                                                         '$nome2')";   
            
             $result = mysql_query($sql,$conecta2) or die(mysql_error());             
       

       
       
            
     } 
   

        $row++;
                 
// fim - Atualiza o tipo das atividades na tabela tratamento 
  
        
}fclose ($handle);


   /*$sql_valida = "SELECT DISTINCT a.id,
                         a.pedido,
                         a.revisao,
                         a.tipo,
                         b.pedido,
                         b.revisao,
                         b.tipo 
                  FROM bd_erros_pn.base_erros_vpe a INNER JOIN bd_erros_pn.base_erros_filtrovpe b
                  ON a.pedido = b.pedido and a.revisao = b.revisao and a.tipo = b.tipo and a.tipo_vivocorp=b.tipo_vivocorp ";
                   
                  $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

                  $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     while($linha_update9 = mysql_fetch_assoc($acao_valida)){
                     $linha_cota9    = $linha_update9["pedido"];
                     $linha_revisa9  = $linha_update9["revisao"];
                     $linha_id9      = $linha_update9["id"];
                     
                     $sql_valida9 = "DELETE FROM bd_erros_pn.base_erros_filtrovpe 
                                     WHERE pedido = '$linha_cota9' and revisao = '$linha_revisa9' ";
                     $acao_valida9 = mysql_query($sql_valida9,$conecta2) or die (mysql_error()); 
                    
                             
                    
                  }  
                

                }*/



 /*$sql_valida ="CALL bd_erros_pn.excluir_duplicada_vpe()"; 
 $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());*/

 

/*
$sql_validapetro = "SELECT DISTINCT a.cnpj,a.pedido,a.revisao FROM bd_erros_pn.base_erros_filtrovpe a INNER JOIN cip_nv.raizes b
                 ON SUBSTRING(a.cnpj,1,8) = b.raiz ";
                   
$acao_validapetro = mysql_query($sql_validapetro,$conecta) or die (mysql_error());

$num_testepetro = mysql_num_rows($acao_validapetro);


        if( $num_testepetro > 0){

               while($linha_updatepetro = mysql_fetch_array($acao_validapetro)){
                     $linha_cota9petro   = $linha_updatepetro["pedido"];
                     //$linha_revisa9petro = $linha_updatepetro["revisao"];  


                  $sql_valida9petro = "DELETE FROM bd_erros_pn.base_erros_filtrovpe
                     WHERE pedido = '$linha_cota9petro' ";
                    $acao_valida9petro = mysql_query($sql_valida9petro,$conecta) or die (mysql_error()); 
                    
                             
                    
                  }  
         }

*/






$sql1="CALL bd_erros_pn.exclui_top_tt()";
$result = mysql_query($sql1,$conecta2) or die(mysql_error());

	





	//mysql_close($conecta);
  echo "<div class='divmsg bradius' style='background:#D4D4D4;'>";   

  echo "<br><font color='#000000' face='arial' size='2'>Carregada com sucesso.</font><br><br>"; 

  echo "<div>"; 

 mysql_free_result($acao_atualiza,$acao_valida,$acao_valida9,$result);
 mysql_close($conecta2);

  ?>

<script language="javascript" type="text/javascript">
hideCarga();
</script>
<p>
    <input type="button" name="Submit2" value="Voltar" 
    onclick="window.location='principal.php?t=forms/formatualizar_base_errospedidos_top_tt.php'" />
</p>
</div>    
</body>
</html>