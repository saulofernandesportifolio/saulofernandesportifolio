
<?php 

//habilita controle de erros
error_reporting(0);
ini_set("display_errors", 0 );



/*
setcookie('filtro',$_COOKIE['filtro'],time() - 28800);
setcookie('filtro2',$_COOKIE['filtro2'],time() - 28800);
setcookie('filtro3',$_COOKIE['filtro3'],time() - 28800);*/

  $tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");


  $dt_dia = date("d/m/Y");
  $dt_mes = date("m/Y");
 // $dt_dia = "2016-02-01";
  //echo $dt_dia ;
  $dt_mes3 = date("Y-m-");

  $dt_filtro=date("Y-m-d");
 
  $ano=date("Y");
  $mesanterior=date("m")-1;
  $mesatual=date("m"); 
  
  if(strlen($mesanterior)==1){
    
    $mesanterior="0".$mesanterior;
  }else{
    
    $mesanterior=$mesanterior;
    
  }
  
    if(strlen($mesatual)==1){
    
    $mesatual="0".$mesatual;
  }else{
    
    $mesatual=$mesatual;
    
  }   
    
 $dt_diaanterior=$ano."-".$mesanterior."-".'01';
 $dt_diaatual=$ano."-".$mesatual."-".'01';



function arrumadatagrafico($string) {
    if($string == ''){
    $data=substr($string,8,3)."".substr($string,5,2)."".substr($string,0,4);   
        
    }else{
        
    $data=substr($string,8,3)."/".substr($string,5,2)."/".substr($string,0,4);   
    }

 return $data;
} 

function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."-".substr($string,3,2)."-".substr($string,0,2);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string,6,4)."-".substr($string,3,2)."-".substr($string,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}




function diferencadata($data_inicial,$data_final){
 //$diav2=substr($YSomarDias,0,2);
 //$mesv2=substr($YSomarDias,3,2);  
 //$anov2=substr($YSomarDias,6,4);

// Usa a função strtotime() e pega o timestamp das duas datas:
$time_inicial = strtotime($data_inicial);
$time_final = strtotime($data_final);
// Calcula a diferença de segundos entre as duas datas:
$diferenca = $time_final - $time_inicial; // 19522800 segundos
// Calcula a diferença de dias
$dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
// Exibe uma mensagem de resultado:
//echo "A diferença entre as datas ".$data_inicial." e ".$data_final." é de <strong>".$dias."</strong> dias";
// A diferença entre as datas 23/03/2009 e 04/11/2009 é de 225 dias

return $dias;

}




 if(empty($_POST['data_1']) && empty($_POST['data_2'])){
  /*
* Calculando datas no futuro com o PHP a partir de datas definidas
* /
*/
// Pega a data que está salva no banco de dados
$data = date("d-m-Y H:i:s");
$d = date("d")-1;

    

// Calcula uma data daqui 2 dias e 2 mêses
$timestamp = strtotime($data . "0 months -$d days");
// Exibe o resultado
 $data_1 =date('d/m/Y', $timestamp); // 
 $data_2=date('d/m/Y');
  }

 /*if(!empty($_POST['data_1']) && !empty($_POST['data_2'])){

    $data_1 = $_POST['data_1'];
    $data_2 = $_POST['data_2'];

 }*/



 ?>
 
<p align="center"><?php echo "<font size='9' color='#FFFFFF'><b>Visão Tramitando - TOP</b></font>"; ?>
 </p>

<hr />

</br></br></br>

<?php include("formvisao-dashboard-g3tela.php"); ?>



</body>
</html>