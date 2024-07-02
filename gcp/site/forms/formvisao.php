
<?php

  $tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");


  $dt_dia = date("d/m/Y");
  $dt_mes = date("m/Y");
 // $dt_dia = "2016-02-01";
  //echo $dt_dia ;
  $dt_mes3 = date("Y-m-");

 
 
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


?>
<script type="text/javascript" src="site/forms/graficos/3d-column-interactive/js/jquery-1.11.3.min.js"></script>

<script src="site/forms/graficos/3d-column-interactive/js/highcharts.js"></script>
<script src="site/forms/graficos/3d-column-interactive/js/highcharts-3d.js"></script>
<script src="site/forms/graficos/3d-column-interactive/js/modules/exporting.js"></script>



<form name="myform" method="post" action="principal.php?&t=forms/formvisao.php">
<input name="data_1" type="hidden"  value="<?php echo $_POST['data_1']; ?>" />
<input name="data_2" type="hidden"  value="<?php echo  $_POST['data_2']; ?>" />
<br />
<?php
 if(empty($data_1) && empty($data_2) ){
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

 if(!empty($_POST['data_1']) && !empty($_POST['data_2'])){

    $data_1 = $_POST['data_1'];
    $data_2 = $_POST['data_2'];

 }


  
 ?>
 <br><br>
        <p><font color="#ffffff" size="2" face="Gotham Light">Data Inicial:&nbsp</font> 
            <input name="data_1" type="text" id="data_1" size="15" maxlength="10"  class="txt2data bradius"
            onkeyup="Formatadata(this,event);ValidaEntrada(this,'date');"
            onclick="displayCalendar(document.getElementById('data_1'),'dd/mm/yyyy',this,true);"  value="<?php echo $data_1; ?>" />
     
      
      
            <font color="#ffffff" size="2" face="Gotham Light">Data Final:&nbsp;</font>
            <input name="data_2" type="text" id="data_2" size="15" maxlength="10"  class="txt2data bradius" 
            onkeyup="Formatadata(this,event);ValidaEntrada(this,'date');" 
            onclick="displayCalendar(document.getElementById('data_2'),'dd/mm/yyyy',this,true);"  value="<?php echo $data_2; ?>"/>
           <input name="bt_enviar" id="bt_enviar" type="submit" value="Filtrar" class="sb2 bradius" />
        </p>

<hr />

<div align="center"><?php echo "Visão Geral"; ?></div><br />
<div align="left" style="margin-left:30px;">
<table border="1" width="auto">

<tr>
<td><?php include("formvisao-dashboard-g1.php"); ?></td>
</tr>


</table>
</div>
</div>

</form>
</div>

</div>

</body>
</html>