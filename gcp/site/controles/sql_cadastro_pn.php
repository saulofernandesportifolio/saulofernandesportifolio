<head>
<script>
function redireciona() {
window.close();
opener.location.href="../../principal.php?t=forms/form_fila_cotacao_pn_pos_analise.php";
}
</script>
</head>
<?php

 include("../../bd.php");

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_tratamento = date("Y-m-d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  
/*echo $_POST['id_pn'];

echo '<br>';

echo $_POST['status_cip'];

echo '<br>';*/

if(empty($_POST['status_cip'])){

echo" <script> 
      alert('informar o status_cip !');
       redireciona();
       window.close();
      </script>
      ";                                        
    exit();


}



if($_POST['status_cip'] == 1 ){

  $disc_status_tp='Tratativa';
  $tramite='Tratando';

}
if($_POST['status_cip'] == 2 ){

  $disc_status_tp='Tratado';
  $tramite='Tratado';

}

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_POST['id_user']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
    
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             = $linha_operador["perfil"];
        $nome               = $linha_operador["nome"];
        $logado             = $linha_operador["logado"];
        $canal              = $linha_operador["tramite"];
        $cpf              = $linha_operador["cpf"];
        $turno              = $linha_operador["turno"];
    }

                   if($turno == 1)
                    { 
                        $turno="Diurno";
                    }
                    elseif($turno == 2)
                        { 
                        $turno=utf8_encode("Intermediário");
                        } 
                    elseif($turno == 3)
                        { 
                        $turno="Noturno";
                        }



$sql_update="UPDATE bd_erros_pn.controle_pn 
SET status_tp       = '{$_POST['status_cip']}',
    disc_status_tp  = '$disc_status_tp',
    fila            = '{$_POST['status_cip']}',
    login           = '$cpf',
    nome2           = '$nome', 
    tramite         = '$tramite',
    turno           = '$turno',
    chamado         = '{$_POST['chamado']}', 
    erro            = '{$_POST['erro']}',
    data_tratamento = '$dt_tratamento' 

WHERE id_pn='{$_POST['id_pn']}' ";
$acao_update= mysql_query($sql_update,$conecta2) or die (mysql_error());



$sql_insert="CALL bd_erros_pn.historico_portabilidade("."'{$_POST['id_pn']}'".")";
$acao_insert = mysql_query($sql_insert,$conecta2) or die (mysql_error());

/*Seleciona o id da tabela serviço para update protocolo*/     
       
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
       redireciona();
       window.close();
      </script>
      ";                                        
    exit();


 mysql_free_result($acao_operador,$acao_insert,$acao_update);
 mysql_close($conecta,$conecta2);
 mysql_next_result($conecta,$conecta2);

?>	


</body>
</html>
