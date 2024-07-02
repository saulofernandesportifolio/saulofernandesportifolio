<?php 

 if($perfil!= 17){
    
setcookie('salva',$_COOKIE['idtbl_usuario'],time() - 28800);
setcookie('idtbl_usuario',"");
    
echo "
       <script type=\"text/javascript\">
        alert('Usu\u00e1rio inv\u00e1lido!');
        document.location.replace('index.php');
	    </script>
 ";
  exit(); 
    
    
    
}



echo $_POST["operador"];



if(empty($_POST["operador"]) || $_POST["operador"] == 'Aguardando Operador'){
    
    
echo "
       <script type=\"text/javascript\">
        alert('Selecionar o operador!');
        history.back();
	    </script>
 ";
  exit(); 
    
    
    
}

if(empty($_POST["ofensor"])){
    
    
echo "
       <script type=\"text/javascript\">
        alert('Selecionar o ofensor!');
        history.back();
	    </script>
 ";
  exit(); 
    
    
    
}


if(empty($_POST["adabas"])){
    
    
echo "
       <script type=\"text/javascript\">
        alert('Selecionar o adabas!');
        history.back();
	    </script>
 ";
  exit(); 
    
    
    
}


if(empty($_POST["status_tp"])){
    
    
echo "
       <script type=\"text/javascript\">
        alert('Selecionar o Status!');
        history.back();
	    </script>
 ";
  exit(); 
    
    
    
}

function arrumadatahora($string2) {

    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,6);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,6);
        
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
  
  $data3=date("d/m/Y H:i");

  $dt_dia = date("Y-m-d");

 $sql = "SELECT idtbl_usuario,nome,turno,cpf FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '".$_COOKIE['idtbl_usuario']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_1");
 $id_user = $consulta['idtbl_usuario'];
 $login= $consulta['cpf'];
 $nome2=$consulta['nome'];

 if($consulta['turno'] == 1)
                    { 
                        $turno="Diurno";
                    }
                    elseif($consulta['turno'] == 2)
                        { 
                        $turno=utf8_encode("Intermediário");
                        } 
                    elseif($consulta['turno'] == 3)
                        { 
                        $turno="Noturno";
                        }


$ofensor=$_POST["ofensor"];
$id=$_POST["id1"];
$adabas=$_POST["adabas"];
//$motivo=$_POST["motivo"];
$status_tp=$_POST["status_tp"];
$comentario_antigo=trim($_POST["comentario_antigo"]);
//$comentario_novo=$_POST["comentario_novo"];
$data_cadastro_comentario = date('d/m/Y');
$operador =  $_POST["operador"];

if($operador == 'SISTEMICO' || $operador == 'Sistemico'){

	$crit='sim';
}else{

	$crit='nao';
}
				 


$pula = "\n";
$comentario = trim($comentario_antigo.$pula.$data_cadastro_comentario." : ".$comentario_novo." "."-"." ".$nome2);

$data_cadastro = date("Y-m-d");


$sql_update1 = "UPDATE bd_erros_pn.base_erros_top_tt 
                   SET  nome2 = '$nome2'									
		WHERE  id ='$id'";
 $update1 = mysql_query($sql_update1,$conecta2) or die (mysql_error());


$sql="SELECT * FROM bd_erros_pn.base_erros_top_tt WHERE id='{$_POST['id1']}'";
        
		         $result = mysql_query($sql,$conecta2);
				 while ($dado= mysql_fetch_array($result))
		         {
				 $pedido = $dado["pedido"];
				 $tipo = $dado["tipo"];
				 $portabilidade = $dado["portabilidade"];
				 $cliente = $dado["cliente"];
				 $status_do_pedido = $dado["status_do_pedido"];
				 $revisao = $dado["revisao"];
				 $regional = $dado["regional"];
				 $criado_em = $dado["criado_em"];
				 $alta = $dado["alta"];
				 $troca = $dado["troca"];
				 $transferencia_titularidade = $dado["transferencia_titularidade"];
				 $data_correcao = $dado["data_correcao"];
				 $id_tabelao = $dado["id_tabelao"];
				 $fila = $dado["fila"];
				 $status = $dado["status"];
				 $nome2 = $dado["nome2"];
				 $tramite = $dado["tramite"];
				 $data_tramite = $dado["data_tramite"];
				 $turno = $dado["turno"];
                                 $tmt=$dado['tmt']; 
				 $id= $dado['id'];
				// $primeiro_operador = $dado["primeiro_operador"];
				 }
                                 
       $data_a= substr(arrumadatahora($criado_em),0,10);
   //echo '<br>';

   $hora_a= substr($criado_em,10,6);

   $data1=$data_a.$hora_a;

   //echo $data1='19/10/2017 19:50';
   //echo '<br>';
   //echo $data3;

   // echo '<br>';

   $diasemana_numero = date('w', strtotime($calcula_data));

  if($diasemana_numero >= 1 && $diasemana_numero <= 5){


      if($status_tp == 2 || $status_tp == 3){
    
       $data3=date("d/m/Y")." ".date("H:i"); 
       
       
      }

      //echo '<br>';

      $h=entre($data1,$data3,"h");
      //echo " horas arredondadas.<br>";
      $m=entre($data1,$data3,"m");
      //echo " minutos <br>";
      //echo '<br>';

      if($h >= 0 && $h <= 9){
         $h='0'.$h;
       }
      if($m >= 0 && $m <= 9){
         $m='0'.$m;
       }


       //$m2=substr($data3,14,16);


      /*echo "este e o calculo ".*/$total2=$h.":".$m;

       //echo '<br>';

    }else{

      $total2=$tmt; 
    }                               
                                 
                                 
                                 
                                 
if(!empty($_POST["comentario_novo"])){                                   
                                 
                              
                                 
                                 
				 
 foreach ($_POST["comentario_novo"] as $i=>$comentario_novo) {

      if(empty($comentario_novo)){
       $comentario_novo='Não foi adicionado comentário';
      
       }
      
       $i= substr($i, 0, strlen($i) - 3);

       $pula = "\n";
       $comentario= trim($pula.$data_cadastro_comentario." : ".$i." -> ".$comentario_novo." "."-"." ".$nome2);
    
       $teste.=$comentario.'\n';
    
    
     foreach($_POST['motivo'] as $i=>$mt){
    
         $mt;
         //echo '<br>'; 
         $i= substr($i, 0, strlen($i) - 3);
         //echo '<br>'; 
   
         //update das linhas                        
         $sql_updatelinhas="UPDATE bd_erros_pn.base_erros_linhas_resumo_top_tt 
                      SET motivo_erro='$mt'                              
                     WHERE pedido='$pedido' AND filtro='$i' AND revisao='$revisao' ";
         $updatelinhas = mysql_query($sql_updatelinhas,$conecta2) or die (mysql_error());
        }
     
     /*
     foreach($_POST['motivo2'] as $i=>$mt2){
    
         $mt2;
         //echo '<br>'; 
         $i= substr($i, 0, strlen($i) - 3);
         //echo '<br>'; 
   
         //update das linhas                        
         $sql_updatelinhas="UPDATE bd_erros_pn.base_erros_linhas_resumo_top_tt  
                      SET motivo_erro2='$mt2'                              
                     WHERE pedido='$pedido' AND filtro='$i' AND revisao='$revisao' ";
         $updatelinhas = mysql_query($sql_updatelinhas,$conecta2) or die (mysql_error());
        } */
        
        
        
     
     
      foreach($_POST['status_erro'] as $i=>$merro){

          $merro;
      
          if($merro == 2){ 
             $disc_status_erro="Em Tratativa";
           }   
           if($merro == 3){
             $disc_status_erro="Concluido";
            }
           if($merro == 4){
             $disc_status_erro="Chamado TI";
            }
           if($merro == 5){ 
              $disc_status_erro="Aguardando Comercial";
            }    
          //echo '<br>'; 
          $i= substr($i, 0, strlen($i) - 3);
          //echo '<br>'; 
       
          //update das linhas                        
          $sql_updatelinhas="UPDATE bd_erros_pn.base_erros_linhas_resumo_top_tt  
                      SET status_erro= '$merro',
                          disc_status_erro='$disc_status_erro'
                     WHERE pedido='$pedido' AND filtro='$i' AND revisao='$revisao' ";
           $updatelinhas = mysql_query($sql_updatelinhas,$conecta2) or die (mysql_error());
       
        }   

      $data_tramite= date("Y-m-d");

      if ($status_tp == 2){
	$disc_status_tp = "Em Tratamento";
	$fila = 2;
	$tramite = "Em Tratamento";
	$data_correcao = date("Y-m-d");
      }
      if ($status_tp == 3){
	$disc_status_tp = "Concluido";
	$fila = 3;
	$tramite = "Concluido";
	$data_correcao = date("Y-m-d");
	$status='Concluido';
       }
      if ($status_tp == 4){
	$disc_status_tp = "Chamado TI";
	$fila = 4;
	$tramite = "Chamado TI";
	$data_correcao = date("Y-m-d");
      }
      if ($status_tp == 5){
	$disc_status_tp = "Aguardando Comercial";
	$fila = 5;
	$tramite = "Aguardando Comercial";
	$data_correcao = date("Y-m-d");
      }

      if ($status_tp == 6){
	$disc_status_tp = "Aguadando CR";
	$fila = 6;
	$tramite = "Aguadando CR";
	$data_correcao = date("Y-m-d");
      }



      if($crit == 'nao'){

          if($operador != 'Consultor'){

 

           $sql2 = "SELECT idtbl_usuario,nome,turno,cpf "
             . "FROM cip_nv.tbl_usuarios "
             . "WHERE nome = '$operador' ";
           $consulta2 = mysql_fetch_assoc(mysql_query($sql2,$conecta)) or die(mysql_error().$sql2." erro #SQL_2");
             $id_user2 = $consulta2['idtbl_usuario'];

           if($consulta2['turno'] == 1) 
                    { 
                        $turnoop="Diurno";
                    }
                    elseif($consulta2['turno'] == 2)
                        { 
                        $turnoop=utf8_encode("Intermediário");
                        } 
                    elseif($consulta2['turno'] == 3)
                        { 
                        $turnoop="Noturno";
                        }
                    }else{
    	              $turnoop="ND";
                    }


        }elseif($crit == 'sim'){

	   $turnoop=$turno;
	   $operador='SISTEMICO';

          }

        $data_tratamento=date('Y-m_d');
        $hora_tratamento=date('H:i:s');


       //$motivo=$_POST['motivo'];
       //$motivo2=$_POST['motivo2'];
       $ofensor=$_POST['ofensor'];

       $pula = "\n";
       $comentarioteste =trim($comentario_antigo.$pula.$teste);
       $sql_update = "UPDATE bd_erros_pn.base_erros_top_tt SET
				    pedido = '$pedido',
					comentario = '$comentarioteste',
					tipo = '$tipo',
					motivo_erro = '$motivo',
			
					portabilidade = '$portabilidade',
					cliente = '$cliente',
					status = '$status',
					status_do_pedido = '$status_do_pedido',
					revisao = '$revisao',
					regional = '$regional',
					criado_em = '$criado_em',
					alta = '$alta',
					troca = '$troca',
					transferencia_titularidade = '$transferencia_titularidade',
					data_correcao = '$data_correcao',
					ofensor = '$ofensor',
					adabas = '$adabas',										
					usuario = '$login',
			     	        fila = '$fila',
					nome2 = '$nome2',
					tramite = '$tramite',
					data_tramite = '$data_tramite',
					turno = '$turno',
					status_tp = '$status_tp',
					disc_status_tp = '$disc_status_tp',
					operador = '$operador',
					turno_ofensor='$turnoop',
					data_tratamento='$data_tratamento',
					hora_tratamento='$hora_tratamento',
                                        tmt='$total2'    
					WHERE  id ='$id'";
	
      $update = mysql_query($sql_update,$conecta2) or die (mysql_error());


   
      //update das linhas                        
      $sql_updatelinhas="UPDATE bd_erros_pn.base_erros_linhas_resumo_top_tt  
                      SET obs_erro= '$comentarioteste',
                          operador= '$nome2',
                          turno= '$turno'                              
                     WHERE pedido='$pedido' AND filtro='$i' AND revisao='$revisao' ";
      $updatelinhas = mysql_query($sql_updatelinhas,$conecta2) or die (mysql_error());
    
   } 

 
  
        $select_r="SELECT DISTINCT * FROM bd_erros_pn.base_erros_linhas_resumo_top_tt 
                  WHERE pedido='$pedido' AND revisao='$revisao' 
                 GROUP BY filtro, linha,tipoerro,motivo_erro,id DESC ";
        $update_r = mysql_query($select_r,$conecta2) or die (mysql_error());
    
        while ($dado_r= mysql_fetch_array($update_r)){
               $id_r=$dado_r['id'];
    
          $sql_insert_r = "CALL bd_erros_pn.carrega_base_erros_linhas_resumo_historico_top_tt("."'{$id_r}'".")";
	
          $insert_r = mysql_query($sql_insert_r,$conecta2) or die (mysql_error());
        }
        
 }else{
     
     $i=$_POST["comentario_novo"]='Não foi adicionado comentário';
    
     $i=$_POST['motivo']='Não foi adicionado motivo cadastrado';
    
     
     $pula = "\n";
     $comentario= trim($pula.$data_cadastro_comentario." : ".$i." -> ".$comentario_novo." "."-"." ".$nome2);
    
     $teste.=$comentario.'\n';
     
        if($status_tp == 2){
	   $disc_status_tp = "Em Tratamento";
	   $fila = 2;
	   $tramite = "Em Tratamento";
	   $data_correcao = date("Y-m-d");
        }
        if($status_tp == 3){
	   $disc_status_tp = "Concluido";
	   $fila = 3;
	   $tramite = "Concluido";
	   $data_correcao = date("Y-m-d");
	   $status='Concluido';
        }
        if($status_tp == 4){
	   $disc_status_tp = "Chamado TI";
	   $fila = 4;
	   $tramite = "Chamado TI";
	   $data_correcao = date("Y-m-d");
        }
        if($status_tp == 5){
	   $disc_status_tp = "Aguardando Comercial";
	   $fila = 5;
	   $tramite = "Aguardando Comercial";
	   $data_correcao = date("Y-m-d");
        }
    
       
        
        $data_tratamento=date('Y-m_d');
        $hora_tratamento=date('H:i:s');

         
         
        $pula = "\n";
        $comentarioteste =trim($comentario_antigo.$pula.$teste);
        
        $sql_update = "UPDATE bd_erros_pn.base_erros_top_tt SET
	                                pedido = '$pedido',
					comentario = '$comentarioteste',
					tipo = '$tipo',
					motivo_erro = '$motivo',
					portabilidade = '$portabilidade',
					cliente = '$cliente',
					status = '$status',
					status_do_pedido = '$status_do_pedido',
					revisao = '$revisao',
					regional = '$regional',
					criado_em = '$criado_em',
					alta = '$alta',
					troca = '$troca',
					transferencia_titularidade = '$transferencia_titularidade',
					data_correcao = '$data_correcao',
					ofensor = '$ofensor',
					adabas = '$adabas',										
					usuario = '$login',
			     	        fila = '$fila',
					nome2 = '$nome2',
					tramite = '$tramite',
					data_tramite = '$data_tramite',
					turno = '$turno',
					status_tp = '$status_tp',
					disc_status_tp = '$disc_status_tp',
					operador = '$operador',
					turno_ofensor='$turnoop',
					data_tratamento='$data_tratamento',
					hora_tratamento='$hora_tratamento',
                                        tmt='$total2'    
					WHERE  id ='$id'";
	
        $update = mysql_query($sql_update,$conecta2) or die (mysql_error());
     
     
     
 }
    $sql_insert = "CALL bd_erros_pn.carrega_base_erros_historico_top_tt("."'{$id}'".")";
	
    $insert = mysql_query($sql_insert,$conecta2) or die (mysql_error());



    if($status_tp == 4){
    
      $sqlch="SELECT * FROM bd_erros_pn.base_erros_top_tt_chamado 
        WHERE id='$id' 
        AND (status_tp=30 OR status_tp=33 OR status_tp=31 )  ";
        $resultch = mysql_query($sqlch,$conecta) or die(mysql_error());
      $numch= mysql_num_rows($resultch);

      if($numch == 0){


        $sql_inserir3 ="INSERT INTO bd_erros_pn.base_erros_top_tt_chamado(id,
                                                comentario,
                                                fila,
                                                status_tp,
                                               disc_status_tp
                                               )
                                                VALUES('$id',
                                                      '$comentario',
                                                       '31',   
                                                       '31',
                                                       'Aguardando chamado'                                                     
                                                       )";
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
      } 
    
    
    }





	 echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('principal.php?t=forms/form_fila_cotacao_erros_top_tt.php');
		</script>
 		";


     mysql_free_result($insert,$update);
     mysql_close($conecta,$conecta2);		

?>
    
