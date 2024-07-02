
<?php 



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


function corrigedatashhmmss($date){


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




function corrigedatas($date){


  $dia=substr($date,0,2) ;
  $mes=substr($date,3,2);
  $ano=substr($date,6,4);

  /*data correta estiver correta */
  if(strlen($date) == 9)
  {
     
      $dia=substr($date,0,2);
      $mes=substr($date,2,2);
      $ano=substr($date,5,4);

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
        

   $date=$ano."-".$mes."-".$dia;

///echo '<br>';



 return $date;

}





$tempo = 0;

set_time_limit($tempo);
date_default_timezone_set("Brazil/East");

  //$data_inclusao_bd = date("Y/m/d H:i:s");
 $dt_dia = date("Y-m-d");

//inicia conexão com o banco de dados
include "../bd.php";

 ini_set('memory_limit', '-1'); 


//Recebe o nome do arquivo enviado
$nome_temporario=$_FILES["file"]["tmp_name"]; 
$nome_arquivo = $nome_temporario;
//Abre o arquivo CSV


$abraArq = fopen("$nome_arquivo", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq)
{
    echo ("<p>Arquivo n&atilde;o encontrado</p>");
}

else
{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    while ($linha = fgetcsv ($abraArq, 4096, ";"))
    {
        if($headerLine)
        {
            $headerLine = false;
        }
        else
        {


                $linha[6]=tiraaspasimples($linha[6]);
         
                $linha[2]=corrigedatas($linha[2]);
                $linha[18]=corrigedatas($linha[18]);

         
               if(!empty($linha[17])){   

                  
                 $linha[17]=corrigedatas($linha[17]);


                }
         
                if (!empty($linha[7])){   

                 $linha[7]=corrigedatashhmmss($linha[7]);

                }
                        


                  $sql_atualiza ="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '{$_COOKIE['idtbl_usuario']}' ";
                  $acao_atualiza = mysql_query($sql_atualiza,$conecta) or die(mysql_error()); 
                  while($linha_atualiza = mysql_fetch_assoc($acao_atualiza))
                       { 
	                     $nome_carga = $linha_atualiza["nome"];
   	                  
	   
	                     }


                 $sql="INSERT IGNORE INTO bd_erros_pn.tamp_cargapn(
                                regional,
                                fornecedor,
                                data_inicial, 
                                numero_pedido,
                                revisao,
                                status_pedido,
                                nome_cliente,
                                ultima_atualizacao_status,
                                codigo_adabas,
                                cpf_cnpj_cliente,
                                cpf_cnpj_cliente_raiz,
                                canal,
                                data_janela,
                                aprovacao_pedido,
                                pn, 
                                status_tp,
                                fila,
                                disc_status_tp,
                                nome2,
                                tramite,
                                turno,
                                data_tramite2, 
                                data_carga,
                                carregado_por)VALUES('$linha[0]',
                                                           '$linha[1]',
                                                           '$linha[2]',
                                                           '$linha[3]',
                                                           '$linha[4]', 
                                                           '$linha[5]', 
                                                           '$linha[6]',
                                                           '$linha[7]', 
                                                           '$linha[8]', 
                                                           '$linha[9]',  
                                                           '$linha[10]',
                                                           '$linha[11]',
                                                           '$linha[17]',
                                                           '$linha[18]',
                                                           '$linha[27]',
                                                           '1',
                                                           '1',
                                                           'Aguardando Operador',
                                                           'Aguardando Operador',
                                                           'Aguardando',
                                                           'ND',
                                                           '$dt_dia',
                                                           '$dt_dia',
                                                           '$nome_carga'    
                                                            )"; 
                    
                 $result = mysql_query($sql,$conecta2) or die(mysql_error());
        }
    }
 
}
 

$sql_at="CALL bd_erros_pn.carrega_base_pn2()";

$result = mysql_query($sql_at,$conecta2) or die(mysql_error()); 

 mysql_free_result($acao_valida2,$acao_valida,$result);
 mysql_close($conecta2);
 
             
echo "<br><br><br>";
echo "<div class='divmsg bradius' style='background:#D4D4D4; align:center;'>"; 
echo "<br><font color='#000000' face='arial' size='2'>Base atualizada com sucesso!</font>";
echo "<div/>";  			
echo "<br><br><br>";


?>
<p><input type="button" name="Submit2" value="Voltar" onClick="window.location='principal.php?t=forms/formatualizar_base_pn2.php'">	


</body>
</html>
