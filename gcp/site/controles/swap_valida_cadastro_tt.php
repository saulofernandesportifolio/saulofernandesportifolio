<meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
<?php
/**
 * @author saulo de assis
 * @copyright 2016
 */

 date_default_timezone_set('Brazil/East');
 
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
      $dt_dia = date("Y-m-d");
  $hora_dia=date("H:i:s"); 
    if($string2 == ''){
    $data2=  substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,6,4)."/".substr($string2,3,2)."/".substr($string2,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}


function arrumadata1($string3) {
    if($string3 == ''){
    $data2=substr($string3,8,2)."".substr($string3,5,2)."".substr($string3,0,4);   
        
    }else{
        
    $data2= substr($string3,8,2)."/".substr($string3,5,2)."/".substr($string3,0,4);   
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





$calcula_data = date("Y-m-d");

$data2=date('d/m/Y H:i:s');

$data3=date('d/m/Y H:i');

$dt_dia = date("Y-m-d");

$hora_dia=date("H:i:s"); 



 if(empty($_POST['statuscip'])){

  echo"
      <script type=\"text/javascript\">
      alert('faltou definir o status cip atual');
      history.go(-1);
      </script>
      ";

 }




 $sql = "SELECT idtbl_usuario,nome FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '".$_COOKIE['idtbl_usuario']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_1");
 $id = $consulta['idtbl_usuario'];
 $nome1= $consulta['nome'];
 
 $sql1 = "SELECT * FROM cip_nv.tbl_swap   
        WHERE id_swap='".$_POST['id_swap']."' AND revisao_swap='".$_POST['revisao_swap']."'";
 $consulta1 = mysql_fetch_assoc(mysql_query($sql1)) or die(mysql_error().$sql1." erro #SQL_2A");
 
$cotacaopedido=$consulta1['cotacaopedido']; 
$data_da_solicitacao=$consulta1['data_da_solicitacao'];
$hora_da_solicitacao=$consulta1['hora_da_solicitacao'];
$regional=$consulta1['regional'];
$uf=$consulta1['uf'];
$status=$_POST['status'];
$data_da_tratativa_do_swap='0000-00-00';
$solicitante=$_POST['solicitante'];
$gerente_de_contas=$_POST['remetente'];
$total_de_linhas=$_POST['tllinhas'];
$total_de_linhas_swap=$_POST['tlswap'];
$de_aparelho_inicial=$consulta1['de_aparelho_inicial'];
$de_qtd =$consulta1['de_qtd'];
$para_aparelho_final=$consulta1['para_aparelho_final'];
$para_qtd =$consulta1['para_qtd'];
$carteira=$_POST['carteira'];
$adabas=$consulta1['adabas'];
$hora_tratativa_swap='00:00:00';  
$login_operadores_swap=$_POST['login_operadores_swap'];
$turno=$_POST['turno'];
$remetente=$_POST['remetente'];
$swap=$_POST['swap'];
$sp2=$_POST['sp2'];
$statuscip=$_POST['statuscip'];
$revisao_swap=$consulta1['revisao_swap'];
$pula = "\n";
$emailsolicitacao = $_POST['emailsolicitacao'].$pula.$data_cadastro_obs=date("d/m/Y H:i:s")." : ".$_POST['emailsolicitacao2']." "."-"." ".$nome;


$pula = "\n";
$retornoemail = $_POST['retornoemail'].$pula.$data_cadastro_obs=date("d/m/Y H:i:s")." : ".$_POST['retornoemail2']." "."-"." ".$nome;
 



 $data1=arrumadata1($data_da_solicitacao)." ".$hora_da_solicitacao;

 

$diasemana_numero = date('w', strtotime($calcula_data));

if($diasemana_numero >= 1 && $diasemana_numero <= 5){

//echo '<br>';

  if($statuscip == 2 || $statuscip == 3){
    
    $data3=date("d/m/Y")." ".date("H:i"); 


  }

  

$h=entre($data1,$data3,"H");

$h=floor($h);


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


/*echo "este e o calculo ".*/$total2=$h.":".$m2;

//echo '<br>';

}else{

$total2=$consulta1['tmt']; 
}





 $sqlupdate = "UPDATE cip_nv.tbl_swap 
         SET 
          carteira              ='$carteira',
          status                ='$status',
          total_de_linhas       ='$total_de_linhas',
          total_de_linhas_swap  ='$total_de_linhas_swap',
          de_aparelho_inicial   ='$de_aparelho_inicial',
          de_qtd                ='$de_qtd',
          para_aparelho_final   ='$para_aparelho_final',
          para_qtd              ='$para_qtd',
          login_operadores_swap ='$login_operadores_swap',
          turno                 ='$turno',
          solicitante           ='$solicitante',
          remetente             ='$remetente',
          swap                  ='$swap',
          sp2                   ='$sp2',
          emailsolicitacao      ='$emailsolicitacao',
          retornoemail          ='$retornoemail',
          operador_swap         = '$id',
          data_tratamento_swap_cip ='$dt_dia',
          hora_tratamento_swap_cip ='$hora_dia',
          statuscip                ='$statuscip'
        
        WHERE id_swap='".$_POST['id_swap']."' ";


 $resultupdate=mysql_query($sqlupdate,$conecta) or die(mysql_error().$sqlupdate." erro #SQL_2up");




  $query="INSERT INTO cip_nv.tbl_swap_historico (cotacaopedido,
                             data_da_solicitacao,
                             hora_da_solicitacao, 
                             regional,
                             status,
                             data_da_tratativa_do_swap,
                             gerente_de_contas,
                             total_de_linhas,
                             total_de_linhas_swap,
                             de_aparelho_inicial,
                             de_qtd,
                             para_aparelho_final,
                             para_qtd,
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
                             hora_tratamento_swap_cip)VALUES(
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
                                  '$de_qtd',
                                  '$para_aparelho_final',
                                  '$para_qtd',
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
                                  '$id',   
				  '$total2',
                                  '$statuscip',
                                  '$revisao_swap',
                                  '$dt_dia',
                                  '$hora_dia')";


 $result=mysql_query($query,$conecta) or die(mysql_error().$sql." erro #SQL_3");





if($_POST['statuscip'] == 4){

   $sqlch="SELECT * FROM cip_nv.tbl_chamado 
        WHERE id_cotacao='{$_POST['id_swap']}' 
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
                                                VALUES('{$_POST['id_swap']}',
                                                       '30',
                                                       'Aguardando chamado',
                                                       'Swap',
                                                       'chamado'
                                                       )";
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
    }



}










if(mysql_affected_rows() === 1){

    die("<script>
                alert('Contestacao atualizada com sucesso para a cotacao ".$cotacaopedido."');
                document.location.replace('principal.php?&t=forms/formconsulta_cotacoes_swap.php');
         </script>");
 }else{
    die("<script>
                alert('Não foi possivel inserir contestação, favor verificar os dados inseridos.');
                history.back();
         </script>");
 }

mysql_free_result($consulta,$result);
mysql_close($conecta);
mysql_next_result($conecta); 


?>