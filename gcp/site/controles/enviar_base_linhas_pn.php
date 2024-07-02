
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
<img class="imgloading" src="../gala_vpev2/site/forms/img/carregando.gif">
</div>
<body onload="showCarga();">
<?php
    $tempo = 0;

  set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");


     /*      
   $sqldel="DELETE FROM  cip_nv.carteira ";   
            
   $resultdel = mysql_query($sqldel,$conecta) or die(mysql_error()); 
   
     $sqldel2="DELETE FROM  cip_nv.carteira2 ";   
            
   $resultdel2 = mysql_query($sqldel2,$conecta) or die(mysql_error());          
*/

function arrumaStringAspassimples($string22){

return preg_replace( '/[`^\\~\'"´]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string22)); 

}


function arrumaString($string) {

$str=$string;
// assume $str esteja em UTF-8
$map = array(
    'á' => 'a',
    'à' => 'a',
    'ã' => 'a',
    'â' => 'a',
    'é' => 'e',
    'ê' => 'e',
    'í' => 'i',
    'ó' => 'o',
    'ô' => 'o',
    'õ' => 'o',
    'ú' => 'u',
    'ü' => 'u',
    'ç' => 'c',
    'Á' => 'A',
    'À' => 'A',
    'Ã' => 'A',
    'Â' => 'A',
    'É' => 'E',
    'Ê' => 'E',
    'Í' => 'I',
    'Ó' => 'O',
    'Ô' => 'O',
    'Õ' => 'O',
    'Ú' => 'U',
    'Ü' => 'U',
    'Ç' => 'C',
    '/' => '/',
    '\\' => '/',
    '^' => ' ',
    '~' => ' ',
    '\''=> ' ',
    '\"'=> ' ',
    '\´'=> ' '
);
 


return strtr($str, $map); // funciona corretamente;

}




function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."/".substr($string,3,2)."/".substr($string,0,2);   
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
  if(strlen($date) == 9)
  {
      //echo '<br>';
       $dia=substr($date,0,2);
       $mes=substr($date,2,2);
       $ano=substr($date,5,4);
     // $hora=substr($date,10,9);
      //echo '<br>';
  } 
  /*data correta estiver correta */
  if(strlen($date) == 10)
  {
      $hora=substr($date,10,9);
  } 

  /*se a data não estivber correta*/ 
   if(strlen($date) == 8)
    {
        $dia=substr($date,0,2);
        $mes=substr($date,2,2);
        $ano=substr($date,4,4);
        //$hora=substr($date,9,9);
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
        

   echo $date=$ano."-".$mes."-".$dia;

echo '<br>';



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
 include("../../bd.php");
    $tempo = 0;
  set_time_limit($tempo);
  
ini_set ( 'mysql.connect_timeout' ,  '120' ); 
ini_set ( 'default_socket_timeout' ,  '120' );
ini_set('memory_limit', '-1'); 

 $sql2="DELETE FROM bd_erros_pn.carga_linhas_pn_filtro ";
 $result2 = mysql_query($sql2,$conecta2) or die(mysql_error());





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
                    
             
             
/*protocolo
linha_pn
data_janela
usuario
data_cadastro*/

             
             
            
                         $legenda =array('linha'  => 'linha_pn',
                                         'janela'  => 'data_janela'
                                    
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
            
              if($legenda[$idx] == 'linha_pn' OR
                 $legenda[$idx] == 'data_janela' 
                       
               )
               {             
          
          
           
               
          
          
          
          
           $cb.=$legenda[$idx].",";
              
                if( $legenda[$idx] == 'data_janela' ){
              
                 $vlr=corrigedatas($vlr);
           
                }
          
                if(empty($vlr)){
                    
                    
                }
            
                    $dados.= "'$vlr'".",";
               
                  
                                     
              }
        }

        
        
      $cb= substr($cb, 0, strlen($cb) - 1); 
      $dados=substr($dados, 0, strlen($dados) - 1);
      
 
      
      
    
               
                  $sql_atualiza ="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '{$_COOKIE['idtbl_usuario']}'";
                  $acao_atualiza = mysql_query($sql_atualiza,$conecta) or die(mysql_error()); 
                  while($linha_atualiza = mysql_fetch_assoc($acao_atualiza))
                       { 
	                     $nome2 = $linha_atualiza["nome"];
   	                  
	   
	                     }
                       
         
      
             
                $sql="INSERT IGNORE INTO bd_erros_pn.carga_linhas_pn_filtro ({$cb},
                                                         data_cadastro,
                                                         usuario,
                                                         protocolo
                                                         )VALUES({$dados},
                                                       	 '$data_inclusao_bd',
                                                         '$nome2',
                                                         '{$_POST['protocolo']}')";   
            
                $result = mysql_query($sql,$conecta2) or die(mysql_error());
       
       
             
                  
       
            
     } 
   

        $row++;
                 
   //  }
     //       }           

// fim - Atualiza o tipo das atividades na tabela tratamento 

    
        
}fclose ($handle);


$sql22="SELECT * FROM  bd_erros_pn.tbl_linha_chave_pn a 
    INNER JOIN bd_erros_pn.carga_linhas_pn_filtro b 
    ON a.protocolo=b.protocolo 
    AND a.linha_pn=b.linha_pn 
    AND a.data_janela=b.data_janela";
$result22 = mysql_query($sql22,$conecta2) or die(mysql_error());      
    while($linha_pnf = mysql_fetch_assoc($result22))
      {    

        $sql2="DELETE FROM bd_erros_pn.carga_linhas_pn_filtro 
              WHERE protocolo='{$linha_pnf['protocolo']}' 
                     AND linha_pn= '{$linha_pnf['linha_pn']}' 
                     AND data_janela= '{$linha_pnf['data_janela']}'  
              ";
        $result2 = mysql_query($sql2,$conecta2) or die(mysql_error()); 
      }

       $sql32="CALL bd_erros_pn.carrega_base_linhas_pn()";
        $result32 = mysql_query($sql32,$conecta2) or die(mysql_error());                    
/*
  echo "<div class='divmsg bradius' style='background:#E7E4D1;'>";                                                 
  echo "<font color='#000000' face='arial' size='2'>Base LINHA PN VPE atualizada com sucesso!.<br>";
    
      echo "<div/>";    */
      
  $perfil=$_POST['perfil'];     

 $protocolo=$_POST['protocolo'];     
      
      echo"
		<script type=\"text/javascript\">
		alert('Base LINHA PN VPE atualizada com sucesso!');
                document.location.replace('../forms/form_cadastro_linhas_pn.php?perfil=$perfil&protocolo=$protocolo');
		</script>
 		";

exit();
      
				
 //mysql_free_result($acao_atualiza,$result,$result2,$result3);
// mysql_close($conecta);			


    
?>	

<script language="javascript" type="text/javascript">
hideCarga();
</script>
<p>
    <input type="button" name="Submit2" value="Voltar" onclick="window.location='../forms/form_cadastro_linhas_pn.php?perfil=<?php echo $perfil ?>&protocolo=<?php echo $protocolo ?>'" />

</div>    
</body>
</html>