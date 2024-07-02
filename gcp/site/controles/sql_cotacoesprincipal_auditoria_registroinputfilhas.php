<?php


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2= substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,6,4)."-".substr($string2,3,2)."-".substr($string2,0,2)." ".substr($string2,10,9);
        
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



$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  

 include("../../bd.php");


 $login_operador;


if(empty($_POST['login_operador_aud']) || empty($_POST['criadoem']) || empty($_POST['terminoefetivo']) ){ 

echo "<script>
      alert('Por favor selecionar turno e operador .'); 
      history.back(); 

      </script>\n";
  exit;

}


else
{

$criado_em=corrigedatas($_POST['criadoem']);


$termino=corrigedatas($_POST['terminoefetivo']);


$data_tratamento= substr($termino,0,10);

$hora_tratamento= substr($termino,11,10);



$id_auditoria = (int) $_GET['id_auditoria'];


   $sql_valida = "SELECT id_cotacao,id_auditoria    
                             FROM cip_nv.tbl_auditoria
                             WHERE id_auditoria = '$id_auditoria' ";
                   
              $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $id_auditoria = $linha_status_cip['id_auditoria'];
              $id_cotacao = $linha_status_cip['id_cotacao'];



   $sql_valida1 = "SELECT id_cotacao  
                             FROM cip_nv.tbl_input
                             WHERE id_cotacao = '$id_cotacao' ";
                   
   $acao_valida1 = mysql_query($sql_valida1,$conecta) or die (mysql_error()); 
   $totalteste=mysql_num_rows($acao_valida1);

   if($totalteste == 0){       
    //Monta SQL para INSERT
      $sql_inserir ="INSERT INTO cip_nv.tbl_input(id_cotacao,
                                                       status_cip_input,
                                                       disc_status_cip_input,
                                                       obs_input,
                                                       motivo_da_acao,
                                                       disc_motivo_da_acao,
                                                       idtbl_usuario_input,
                                                       dt_distribuicao,
                                                       dt_tratamento_input,
                                                       hora_tratamento_input,
                                                       setor
                                                        )
                                                VALUES('$id_cotacao',
                                                       '9',
                                                       'Enviar para Análise Input',
                                                       '{$_POST['obs_input']}',
                                                       '7',
                                                       'Input realizado',
                                                       '{$_POST['login_operador_aud']}',
                                                       '$criado_em',
                                                       '$data_tratamento',
                                                       '$hora_tratamento',
                                                       'Input'
                                                       )";
        $result = mysql_query($sql_inserir,$conecta) or die(mysql_error());


    
   }     
    
}	

/*echo "<script>alert('Erro cadastrado com sucesso !'); 
	alert('Se não tiver mais erros a cadastrar clicar em fechar!'); 
	    document.location.replace('../forms/form_cotacoes_auditoria_tipo_de_erros.php?id_auditoria={$id_auditoria}');
	
      </script>\n";
	exit;*/

echo "<script>alert('cadastrado com sucesso !'); 
          window.close();

</script>\n";

exit;


 mysql_free_result($consulta,$result,$acao_valida);
 mysql_close($conecta);


?>	


</body>
</html>
