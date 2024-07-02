
<?php 

setcookie('filtro',$_COOKIE['filtro'],time() - 28800);
setcookie('filtro2',$_COOKIE['filtro2'],time() - 28800);
setcookie('filtro3',$_COOKIE['filtro3'],time() - 28800);

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

/*
$sqlvenc="SELECT 
a.id_cotacao,
a.TIPO_PROCESSO,
a.dia,
a.TEMPO,
a.SLA_DIAS,
a.VENCIMENTODIAS,
a.visao_ilha,
a.vencimento_ilha
FROM cip_nv.tbl_cotacao a ";
$consulta_venc= mysql_query($sqlvenc,$conecta) or die (mysql_error());

while($tipovenc = mysql_fetch_array($consulta_venc)){ 

$diasUteis  = $tipovenc['SLA_DIAS'];
$QtdDia     = $tipovenc['dia'];
$id_cotacao = $tipovenc['id_cotacao'];


$diasUteis  = $tipovenc['SLA_DIAS'];

$QtdDia     = $tipovenc['dia']; 

$filtrovc   = $QtdDia-$diasUteis;


$id_cotacao = $tipovenc['id_cotacao'];


  
$vencimento_ilha=substr($tipovenc['visao_ilha'],0,10);


$venci=substr($tipovenc['vencimento_ilha'],0,10);


               $diavc1=substr($venci,8,2);
               $mesvc1=substr($venci,5,2);  
               $anovc1=substr($venci,0,4);

 $venci1=$diavc1."/".$mesvc1."/".$anovc1;


$data1=$venci1;
$data2=date("d/m/Y");

$data1=explode("/",$data1);
$data2=explode("/",$data2);

$d1=strtotime("$data1[2]-$data1[1]-$data1[0]");
$d2=strtotime("$data2[2]-$data2[1]-$data2[0]");

$data_final=($d2-$d1)/86400;

if($data_final < 0){

  $data_final= $data_final * -1;
}

$data_final;


if($$data_final == 0 ){

  //echo "igual";
  $Vence = "1.Vence Hoje";

}
if($data_final == 1 ){

  //echo "nao é igual";

 $Vence="2.Vence D+1";
}

if($data_final  == 2){

  //echo "nao é igual";

  $Vence="3.Vence D+2";
}

if($data_final > 2 ){

  //echo "nao é igual";

  $Vence="4.Vence D>2";
}



$query_linhav="UPDATE cip_nv.tbl_cotacao a 
              SET a.VENCIMENTODIAS ='".$Vence."'                                
              WHERE a.id_cotacao  = '".$id_cotacao."' ";

                                //a.setor          ='analise'
$consulta_servico2v = mysql_query($query_linhav,$conecta) or die (mysql_error());

}*/


$sqlvenc="SELECT 
a.id_cotacao,
a.TIPO_PROCESSO,
a.dia,
a.TEMPO,
a.SLA_DIAS,
a.VENCIMENTODIAS,
a.visao_ilha,
a.vencimento_ilha
FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_chamado b ON b.id_cotacao=a.id_cotacao AND ( b.status_cip_chamado= 30 OR b.status_cip_chamado= 31 OR b.status_cip_chamado= 33 )";
$consulta_venc= mysql_query($sqlvenc,$conecta) or die (mysql_error());

while($tipovenc = mysql_fetch_array($consulta_venc)){ 

$diasUteis  = $tipovenc['SLA_DIAS'];
$QtdDia     = $tipovenc['dia'];
$id_cotacao = $tipovenc['id_cotacao'];
$PRAZO_DIAS  = $tipovenc['PRAZO_DIAS'];

$diasUteis  = $tipovenc['SLA_DIAS'];

$QtdDia     = $tipovenc['dia']; 

$filtrovc   = $QtdDia-$diasUteis;


$id_cotacao = $tipovenc['id_cotacao'];


  
$vencimento_ilha=substr($tipovenc['visao_ilha'],0,10);


$venci=substr($tipovenc['vencimento_ilha'],0,10);


               $diavc1=substr($venci,8,2);
               $mesvc1=substr($venci,5,2);  
               $anovc1=substr($venci,0,4);

 $venci1=$diavc1."/".$mesvc1."/".$anovc1;


$data1=$venci1;
$data2=date("d/m/Y");

$data1=explode("/",$data1);
$data2=explode("/",$data2);

$d1=strtotime("$data1[2]-$data1[1]-$data1[0]");
$d2=strtotime("$data2[2]-$data2[1]-$data2[0]");

$data_final=($d2-$d1)/86400;

if($data_final < 0){

  $data_final= $data_final * -1;
}

$data_final;


if($data_final == 0 ){

  //echo "igual";
  $Vence = "1.Vence Hoje";

}
if($data_final == 1 ){

  //echo "nao é igual";

 $Vence="2.Vence D+1";
}

if($data_final  == 2){

  //echo "nao é igual";

  $Vence="3.Vence D+2";
}

if($data_final > 2 ){

  //echo "nao é igual";

  $Vence="4.Vence D>2";
}

if($PRAZO_DIAS == 'Fora do Prazo'){
   
   $Vence="Backlog";

} 

$query_linhav="UPDATE cip_nv.tbl_cotacao a 
              SET a.VENCIMENTODIAS ='".$Vence."'                                
              WHERE a.id_cotacao  = '".$id_cotacao."' ";

                                //a.setor          ='analise'
$consulta_servico2v = mysql_query($query_linhav,$conecta) or die (mysql_error());

}




$query_linhav="UPDATE cip_nv.tbl_cotacao 
               SET VENCIMENTODIAS='Backlog' 
               WHERE PRAZO_DIAS='Fora do prazo' ";
$consulta_servico2v = mysql_query($query_linhav,$conecta) or die (mysql_error());


?>


<script language="JavaScript">
/*  if (screen.width == 800 || screen.height == 600)
    window.location.replace("principal.php?&t=forms/formvisao2.php")

  else if (screen.width == 640 || screen.height == 480)
    window.location.replace("principal.php?&t=forms/formvisao2.php")

  else if (screen.width == 1024 || screen.height == 768)
    window.location.replace("principal.php?&t=forms/formvisao2.php")

  else
    window.location.replace("principal.php?&t=forms/formvisao2.php")*/
</script>

<style>
  body {
    zoom: nivel;
    -moz-transform: scale(nivel);
  }
</style>




<script type="text/javascript" src="site/forms/graficos/3d-column-interactive/js/jquery-1.11.3.min.js"></script>

<script src="site/forms/graficos/3d-column-interactive/js/highcharts.js"></script>
<script src="site/forms/graficos/3d-column-interactive/js/highcharts-3d.js"></script>
<script src="site/forms/graficos/3d-column-interactive/js/modules/exporting.js"></script>



<form name="myform" method="post" action="principal.php?&t=forms/formvisao2.php">
<input name="data_1" type="hidden"  value="<?php echo $_POST['data_1']; ?>" />
<input name="data_2" type="hidden"  value="<?php echo  $_POST['data_2']; ?>" />
<br />
<?php



 if(empty($_POST['data_1']) && empty($_POST['data_2'])){
  /*
* Calculando datas no futuro com o PHP a partir de datas definidas
* /
*/
// Pega a data que está salva no banco de dados
$data = date("d-m-Y H:i:s");
$d = date("d")-1;

    

// Calcula uma data daqui 2 dias e 2 mêses
$timestamp = strtotime($data . "-4 months -$d days");
// Exibe o resultado
 $data_1 =date('d/m/Y', $timestamp); // 
 $data_2=date('d/m/Y');
  }

 if(!empty($_POST['data_1']) && !empty($_POST['data_2'])){

    $data_1 = $_POST['data_1'];
    $data_2 = $_POST['data_2'];

 }



 ?>
 <br>
        <p><font color="#ffffff" size="2" face="Gotham Light">Data Inicial:</font>  
            <input name="data_1" type="text" id="data_1" size="15" maxlength="10"  class="txt2data bradius"
            onkeyup="Formatadata(this,event);ValidaEntrada(this,'date');"
            onclick="displayCalendar(document.getElementById('data_1'),'dd/mm/yyyy',this,true);"  value="<?php echo $data_1; ?>" />
     
      
      
            <font color="#ffffff" size="2" face="Gotham Light">Data Final:&nbsp;</font> 
            <input name="data_2" type="text" id="data_2" size="15" maxlength="10"  class="txt2data bradius" 
            onkeyup="Formatadata(this,event);ValidaEntrada(this,'date');" 
            onclick="displayCalendar(document.getElementById('data_2'),'dd/mm/yyyy',this,true);"  value="<?php echo $data_2; ?>"/>
           <input name="bt_enviar" id="bt_enviar" type="submit" value="Filtrar" class="sb2 bradius" />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;
          <?php echo "<font color='#FFFFFF' size='3'>Visão Tramitando - Pendente</font>"; ?>
        </p>

<hr />
<div id="teste">
 
<div align="center"></div>
<div align="left" style="margin-left:6px;">
<table border="1" width="auto">
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><?php include("formvisao-dashboard-g2.php"); ?></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>
<table border="1" width="auto">
<tr>
<td><?php include("formvisao-dashboard-g3.php"); ?></td>
<td><?php include("formvisao-dashboard-g4.php"); ?></td>
<td><?php include("formvisao-dashboard-g5.php"); ?></td>
</tr>
</table>
<table border="1" width="auto">
<tr>
<td><?php include("formvisao-dashboard-g3b.php"); ?></td>
<td><?php include("formvisao-dashboard-g4b.php"); ?></td>
<td><?php include("formvisao-dashboard-g5b.php"); ?></td>
</tr>
</table>


</div>
</div>

</form>
</div>

</div>
</div>
</body>
</html>