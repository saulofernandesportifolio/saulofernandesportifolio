<?php   

include 'funcoes.php';


function arrumaString($string) {

 return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
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
    $data= substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."/".substr($string,3,2)."/".substr($string,0,2);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,6,4)."/".substr($string2,3,2)."/".substr($string2,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}



function arrumadatateste($string3) {
    if($string3 == ''){
    $data2=substr($string3,0,4)."".substr($string3,5,2)."".substr($string3,8,2);   
        
    }else{
        
    $data2=substr($string3,0,4)."/".substr($string3,5,2)."/".substr($string3,8,2);   
    }

 return $data2;
}


function arrumadata1($string4) {
    if($string4 == ''){
    $data2=substr($string4,8,2)."".substr($string4,5,2)."".substr($string4,0,4);   
        
    }else{
        
    $data2= substr($string4,8,2)."/".substr($string4,5,2)."/".substr($string4,0,4);   
    }

 return $data2;
}





Function entre($data1, $data2="",$tipo=""){
if($data2==""){
$data2 = date("d/m/Y H:i");
}
if($tipo==""){
$tipo = "h";
}
for($i=1;$i<=2;$i++){
${"dia".$i} = substr(${"data".$i},0,2);
${"mes".$i} = substr(${"data".$i},3,2);
${"ano".$i} = substr(${"data".$i},6,4);
${"horas".$i} = substr(${"data".$i},11,2);
${"minutos".$i} = substr(${"data".$i},14,2);
}
$segundos = mktime($horas2,$minutos2,0,$mes2,$dia2,$ano2)-mktime($horas1,$minutos1,0,$mes1,$dia1,$ano1);
switch($tipo){
case "m":
$difere = $segundos/60;
break;
case "H":
$difere = $segundos/3600;
break;
case "h":
$difere = round($segundos/3600);
break;
case "D":
$difere = $segundos/86400;
break;
case "d":
$difere = round($segundos/86400);
break;
}
return $difere;
}
 



	$tempo = 0;

  set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  


$calcula_data = date("Y-m-d");

$data2=date('d/m/Y H:i:s');

$data3=date('d/m/Y H:i');

$dt_dia = date("Y-m-d");

$hora_dia=date("H:i:s"); 



$dt_expira1=date("Y-m-d");

//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = $_POST['data_solicitacao'];

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";
//$hora="$partes_da_data[1]";

$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;
 $criadoem = $data;

//valida se a dada contrato é maior que a data da cotação
$dt_atual   = $criadoem; // data atual
$timestamp_dt_atual   = strtotime($dt_atual); // converte para timestamp Unix
 
$dt_expira    = $dt_expira1; // data de expiração do anúncio
$timestamp_dt_expira  = strtotime($dt_expira); // converte para timestamp Unix
 
// data atual é maior que a data de expiração
if ($timestamp_dt_atual > $timestamp_dt_expira){ // true

echo" <script> 
      alert('A data deve ser menor ou igual a data de hoje');
      history.back();
      </script>
      "; 
      exit(); 
   } 
  



$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
    
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
        }
  
if(empty($_POST['cotacaopedido'])
   || empty($_POST['data_solicitacao']) 
  || empty($_POST['hora_solicitacao']) 
  || empty($_POST['regional']) 
  || empty($_POST['status']) 
  || empty($_POST['solicitante']) 
  || empty($_POST['remetente']) 
  || empty($_POST['tllinhas']) 
  || empty($_POST['tlswap']) 
  || empty($_POST['ap_inicial']) 
  || empty($_POST['ap_final']) 
  || empty($_POST['carteira']) 
  || empty($_POST['adabas']) 
  || empty($_POST['login_operadores_swap']) 
  || empty($_POST['turno']) 
  || empty($_POST['remetente']) 
  || empty($_POST['swap']) 
  || empty($_POST['sp2']) 
  || empty($_POST['emailsolicitacao']) 
  || empty($_POST['retornoemail']) 
  || empty($_POST['statuscip']) 
  || empty($_POST['de_qtd']) 
  || empty($_POST['para_qtd'])){



 echo"
    <script type=\"text/javascript\">
    alert('Verificar se todos os campos estão preenchidos corretamente !');
    history.go(-1);
    </script>
    ";

exit();

}



$cotacaopedido=$_POST['cotacaopedido']; 
$data_da_solicitacao=arrumadata($_POST['data_solicitacao']);
$hora_da_solicitacao=$_POST['hora_solicitacao'];
$uf=$_POST['regional'];
$status=$_POST['status'];
$data_da_tratativa_do_swap='0000-00-00';
$solicitante=$_POST['solicitante'];
$gerente_de_contas=$_POST['remetente'];
$total_de_linhas=$_POST['tllinhas'];
$total_de_linhas_swap=$_POST['tlswap'];$dado['statuscip'];
$de_aparelho_inicial=$_POST['ap_inicial'];
$para_aparelho_final=$_POST['ap_final'];
$uf=$_POST['regional'];
$carteira=$_POST['carteira'];
$adabas=$_POST['adabas'];
$hora_tratativa_swap='00:00:00'; 
$login_operadores_swap=$_POST['login_operadores_swap'];
$turno=$_POST['turno'];
$remetente=$_POST['remetente'];
$swap=$_POST['swap'];
$sp2=$_POST['sp2'];
$emailsolicitacao= $data_cadastro_retorno=date("d/m/Y H:i:s")." : ".trim(tiraaspasimples($_POST['emailsolicitacao']))." "."-"." ".$nome;
$retornoemail=$data_cadastro_retorno=date("d/m/Y H:i:s")." : ".trim(tiraaspasimples($_POST['retornoemail']))." "."-"." ".$nome;
$statuscip=$_POST['statuscip'];
$de_qtd=$_POST['de_qtd'];
$para_qtd=$_POST['para_qtd'];


if($statuscip != 3 || $statuscip != 2){

 $sql = "SELECT 
        CASE WHEN MAX(revisao_swap) IS NULL 
             THEN 0
             ELSE MAX(revisao_swap)
        END +1 as revisao_swap2
        FROM cip_nv.tbl_swap   
        WHERE cotacaopedido='$cotacaopedido' AND (statuscip = 3 OR statuscip = 2) ";
 $consulta = mysql_fetch_assoc(mysql_query($sql)) or die(mysql_error().$sql." erro #SQL_2");
 $revisao_swap2=  $consulta['revisao_swap2'];

}else{

  $revisao_swap2=1;
}



 if($uf == 'GO' 
   || $uf == 'MT'
   || $uf == 'MS'
   || $uf == 'DF'){
             
   $regional='CO';
        
 }
 if($uf == 'PR' 
   || $uf == 'RS'
   || $uf == 'SC'){
             
   $regional='SUL';
             
 }
 if($uf == 'AL' 
   || $uf == 'BA'
   || $uf == 'CE' 
   || $uf == 'MA' 
   || $uf == 'PB' 
   || $uf == 'PE' 
   || $uf == 'PI' 
   || $uf == 'RN' 
   || $uf == 'SE' 
   || $uf == 'TO'){
             
   $regional='NE';
             
 }         
 if($uf == 'AC' 
   || $uf == 'AP'
   || $uf == 'AM' 
   || $uf == 'PA' 
   || $uf == 'RO' 
   || $uf == 'RR' ){
             
   $regional='NORTE';
             
 }       
  if($uf == 'MG'){
             
   $regional='MG';
             
 }          
  if($uf == 'ES' 
   || $uf == 'RJ'){
             
   $regional='LESTE';
             
 }                     
   if($uf == 'SP'){
             
   $regional='SP';
             
 }                        
                            







$contagem = strlen($_POST['data_solicitacao']);


if ($contagem <> 10)
{
echo "<script>alert('Data inválida.'); javascript: history.go(-1); </script>\n";
}

                  
                       
/* $data_cadastro=$_POST['data_solicitacao'];
 $hora_cadastro=$_POST['hora_solicitacao'];

$data = $data_cadastro;
$data_exp_v1 = explode ('/',$data);
$dia = $data_exp_v1[0];
    switch (date('w',mktime(0,0,0,$data_exp_v1[1],$dia,$data_exp_v1[2]))) {
        case 6:
        $teste = 'sabado';
        break;
        default:
        $teste = 'ok';
        break;
    }
                 
$data_modificada_dma = explode('/', $data_cadastro);
$data_cadastro = $data_modificada_dma[0].'/'.$data_modificada_dma[1].'/'.$data_modificada_dma[2];
$teste1 = calcula_data_sla($data_cadastro,$calcula_data);

if($teste == 'sabado'){
  $hora1 = diminui_hora($hora_cadastro ,'12:00');
  }else $hora1 = diminui_hora($hora_cadastro ,'18:00');
//echo '<BR> hora um =' . $hora1;
$hora_atual = date ('H:i');
$hora2 = diminui_hora('09:00',$hora_atual);
//echo $hora2 . '<br>';
if($hora2 < '00:01'){
  $teste = explode (':' , $hora2);
  $teste2 = $teste[1] * -1;
    $hora2 = '00:' . $teste2;
  }
//echo '<BR> hora um =' . $hora1;
$total_um = soma_hora($hora1,$hora2);
//echo '<BR> total um =' . $total_um;
$total = soma_hora($total_um,$teste1);
$data_modificada_dma = explode('/', $data_cadastro);
$data_cadastro1 = $data_modificada_dma[2].'-'.$data_modificada_dma[1].'-'.$data_modificada_dma[0];
//echo '<BR> total um =' . $total;
if ($data_cadastro == $calcula_data){
  $total = diminui_hora($hora_cadastro,$hora_atual);
}*/


//echo '<br>';

$data1=arrumadata1($data_da_solicitacao)." ".$hora_da_solicitacao;


$diasemana_numero = date('w', strtotime($calcula_data));


if($diasemana_numero >= 1 && $diasemana_numero <= 5){

//echo '<br>';

$h2=entre($data1,$data3,"H");

$h=floor($h2);


/*echo "hora final ".*/$hfinal=substr($data3,11,16);

//echo '<br>';

/*echo "hora inicial ".*/$hinicial=substr($data1,11,16);

//echo '<br>';

 $hfinal=substr($data3,10,3);

//echo '<br>';

 $hinicial=substr($data1,10,3);

//echo '<br>';

 $mfinal=substr($data3,14,3);

//echo '<br>';

 $minicial=substr($data1,14,2);

//echo '<br>';


/*if(substr($data1,10,3) > substr($data3,10,3)){

//echo " ok ";

 $h =($hinicial - $hfinal);

}elseif(substr($data3,10,3) > substr($data1,10,3)){

  //echo " ok 2";

  $h=($hfinal - $hinicial);
}*/

/*if(substr($data1,14,3) > substr($data3,14,3)){

//echo " ok ";

  $m =($minicial - $mfinal);

}elseif(substr($data3,14,3) > substr($data1,14,3)){

  //echo " ok 2";

   $m=($mfinal - $minicial);
}*/

$m=($mfinal - $minicial);

//echo '<br>';

if($h >= 0 && $h <= 9){
  $h='0'.$h;
}
if($m >= 0 && $m <= 9){
  $m='0'.$m;
}


 $m2=substr($data3,14,16);


 if($h == '3600'){

  $h='00';

 }

/*echo "este e o calculo ".*/$total=$h.":".$m2;

//echo '<br>';

}


 $query="INSERT INTO cip_nv.tbl_swap (cotacaopedido,
                             data_da_solicitacao,
                             hora_da_solicitacao, 
                             regional,
                             status,
                             data_da_tratativa_do_swap,
                             gerente_de_contas,
                             total_de_linhas,
                             total_de_linhas_swap,
                             de_aparelho_inicial,
                             para_aparelho_final,
                             uf,
                             carteira,
                             adabas, 
                             hora_da_tratativa_swap, 
                             login_operadores_swap,
                             turno,
                             solicitante,     
                             remetente,
                             swap,
                             sp2,
                             emailsolicitacao,
                             retornoemail,
                             operador_swap,
                             TMT,
                             statuscip,
                             revisao_swap,
                             data_tratamento_swap_cip,
                             hora_tratamento_swap_cip,
                             de_qtd,
                             para_qtd)VALUES(
				  '$cotacaopedido',
                                  '$data_da_solicitacao',
                                  '$hora_da_solicitacao', 
                                  '$regional',
                                  '$status',
                                  '$data_da_tratativa_do_swap',
                                  '$gerente_de_contas',
                                  '$total_de_linhas',
                                  '$total_de_linhas_swap',
                                  '$de_aparelho_inicial',
                                  '$para_aparelho_final',
                                  '$uf',
                                  '$carteira',
                                  '$adabas', 
                                  '$hora_tratativa_swap', 
                                  '$login_operadores_swap',
                                  '$turno',
                                  '$solicitante',
                                  '$remetente',
                                  '$swap',
                                  '$sp2',
                                  '$emailsolicitacao',
                                  '$retornoemail',
                                  '$idtbl_usuario',   
				  '$total',
                                  '$statuscip', 
                                  '$revisao_swap2',
                                  '$dt_dia',
                                  '$hora_dia',
                                  '$de_qtd',
                                  '$para_qtd')";


$result=mysql_query($query,$conecta) or die(mysql_error().$sql." erro #SQL_1");




 $queryhist="INSERT INTO cip_nv.tbl_swap_historico (cotacaopedido,
                             data_da_solicitacao,
                             hora_da_solicitacao, 
                             regional,
                             status,
                             data_da_tratativa_do_swap,
                             gerente_de_contas,
                             total_de_linhas,
                             total_de_linhas_swap,
                             de_aparelho_inicial,
                             para_aparelho_final,
                             uf,
                             carteira,
                             adabas, 
                             hora_da_tratativa_swap, 
                             login_operadores_swap,
                             turno,
                             solicitante,     
                             remetente,
                             swap,
                             sp2,
                             emailsolicitacao,
                             retornoemail,
                             operador_swap,
                             TMT,
                             statuscip,
                             revisao_swap,
                             data_tratamento_swap_cip,
                             hora_tratamento_swap_cip,
                             de_qtd,
                             para_qtd)VALUES(
          '$cotacaopedido',
                                  '$data_da_solicitacao',
                                  '$hora_da_solicitacao', 
                                  '$regional',
                                  '$status',
                                  '$data_da_tratativa_do_swap',
                                  '$gerente_de_contas',
                                  '$total_de_linhas',
                                  '$total_de_linhas_swap',
                                  '$de_aparelho_inicial',
                                  '$para_aparelho_final',
                                  '$uf',
                                  '$carteira',
                                  '$adabas', 
                                  '$hora_tratativa_swap', 
                                  '$login_operadores_swap',
                                  '$turno',
                                  '$solicitante',
                                  '$remetente',
                                  '$swap',
                                  '$sp2',
                                  '$emailsolicitacao',
                                  '$retornoemail',
                                  '$idtbl_usuario',   
          '$total',
                                  '$statuscip', 
                                  '$revisao_swap2',
                                  '$dt_dia',
                                  '$hora_dia',
                                  '$de_qtd',
                                  '$para_qtd')";


$resulthist=mysql_query($queryhist,$conecta) or die(mysql_error().$sql." erro #SQL_3");







 $sqlp="SELECT * FROM cip_nv.tbl_swap WHERE cotacaopedido='$cotacaopedido' ORDER BY id_swap DESC LIMIT 1 ";
 $result = mysql_query($sqlp,$conecta) or die (mysql_error());
 
 $dado= mysql_fetch_array($result);

  $idswap=$dado['id_swap'];
          
    


$queryapini="INSERT INTO cip_nv.tbl_swap_aparelho(
                                      id_swap,
                                      aparelho,
                                      qtd,
                                      tipo,
                                      revisao_ap 

            ) 
           VALUES(
           '$idswap', 
           '$de_aparelho_inicial',  
           '$de_qtd',
           'inicial',
           '1'           
           )";
(!mysql_query($queryapini,$conecta)); 




$queryapfim="INSERT INTO cip_nv.tbl_swap_aparelho(
                                      id_swap,
                                      aparelho,
                                      qtd,
                                      tipo,
                                      revisao_ap 

            ) 
           VALUES(
           '$idswap', 
           '$para_aparelho_final',  
           '$para_qtd',
           'final',
           '1'           
           )";
(!mysql_query($queryapfim,$conecta)); 


if($_POST['statuscip'] == 4){

   $sqlch="SELECT * FROM cip_nv.tbl_chamado 
        WHERE id_cotacao='$idswap' 
        AND setor_origem='Swap' 
        AND (status_cip_chamado=30 OR status_cip_chamado=33 OR status_cip_chamado=31 )  ";
    $resultch = mysql_query($sqlch,$conecta) or die(mysql_error());
    $numch= mysql_num_rows($resultch);

    if($numch == 0){


         $sql_inserir3 ="INSERT INTO cip_nv.tbl_chamado(id_cotacao,
                                                status_cip_chamado,
                                               disc_status_cip_chamado,
                                               setor_origem,
                                               setor)
                                                VALUES('$idswap',
                                                       '30',
                                                       'Aguardando chamado',
                                                       'Swap',
                                                       'chamado'
                                                       )";
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
    }



}






	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('principal.php?&id_swap={$idswap}&t=forms/form_swaptt.php');
		</script>
 		";

 mysql_free_result($acao_operador);
 mysql_close($conecta);	
?>    
