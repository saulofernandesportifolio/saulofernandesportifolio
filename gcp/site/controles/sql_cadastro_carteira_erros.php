
<?php



$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $dt_tratamento_input= date("Y/m/d"); 
 $hora_tratamento_input=date("H:i:s");

  function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}



 $idtbl_usuario=$_COOKIE['idtbl_usuario'];


if(empty($_POST['cnpj']) && empty($_POST['carteira'])){
    
echo" <script> 
      alert('Por favor preencher o formulario com todos os dados !');
      history.back();
      </script>
      "; 
      exit();   
    
}


$sql_adabas="SELECT count(cpf_cnpj) as total FROM bd_erros_pn.carteira WHERE cpf_cnpj='{$_POST['cnpj']}' ";
$acao_adabas = mysql_query($sql_adabas,$conecta2) or die (mysql_error());
$count = mysql_fetch_array($acao_adabas);
$num=$count['total'];		

if($num == 0 ){


   $sql_inserir3 ="INSERT INTO bd_erros_pn.carteira(cliente,
                                                       carteira,
                                                       tipo_de_cliente,
                                                       CNPJ_CPF_do_grupo_economico,
                                                       cpf_cnpj )
                                                VALUES('{$_POST['cliente']}',
                                                       '{$_POST['tipo2']}', 
                                                       'P. Jurídica',
                                                       '{$_POST['cnpj']}', 
                                                       '{$_POST['cnpj']}')";
    $result3 = mysql_query($sql_inserir3,$conecta2) or die(mysql_error());

 
 
        
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_atualizar_carteira_erros.php');
      </script>
      ";                                        
    exit();
    
    }else{
    echo" <script> 
      alert('Cadastro existente!');
      document.location.replace('principal.php?&t=forms/form_atualizar_carteira_erros.php');
      </script>
      ";                                        
    exit();    
        
    }

 mysql_free_result($result3,$acao_adabas);
 mysql_close($conecta2);

    
?>
