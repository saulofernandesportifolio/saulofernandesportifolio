<head>
<script>
function redireciona() {
window.close();
opener.location.href="../../principal.php?&idcont=<?php echo $_GET['id_contestacao_cotacao']; ?>&t=forms/form_cotacoes_contestacao_att.php";
}
</script>
</head>
<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  
   $calcula_data = date("d/m/Y");

 include("../../bd.php");

include("../../funcoes.php");

 $login_operador;


if(empty($_POST['login_operadores_cont'])){ 

echo "<script>
      alert('Por favor selecionar turno e operador .'); 
      history.back(); 

      </script>\n";
  exit;

}


else
{

 $sql = "SELECT idtbl_usuario,nome FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '".$_COOKIE['idtbl_usuario']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_1");
 $id = $consulta['idtbl_usuario'];
 $nome1= $consulta['nome'];


    $sql_valida ="SELECT * FROM cip_nv.base_contestacoes_cotacao 
                             WHERE id_contestacao_cotacao = '{$_GET['id_contestacao_cotacao']}'  ";
                   
    $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
               $id_contestacao_cotacao=$linha_status_cip['id_contestacao_cotacao'];
 $tabela = array(
    'id_cotacao'=>  $linha_status_cip['id_cotacao'], 
    'id_contestacao_cotacao'=> $linha_status_cip['id_contestacao_cotacao'], 
    'ofensor'=> $_POST['ofensor'],
    'tipo2'=> $_POST['tipo2'],
    'tipo_apurado'=> $_POST['tipo_apurado'], 
    'analista_ofensor'=> $_POST['login_operadores_cont'],
    'perfil_ofensor'=>'NULL',
    'turno_ofensor'=>$_POST['turno'], 
    'usuario_att'=> $id, 
    'dt_atualizacao'=> date('Y-m-d H:i:s'),
    'contestacao'=> $_POST['contestacao'],
    'id_setor' => $linha_status_cip['id_setor'],
    'setor' => $linha_status_cip['setor'],
    'analista_contestacao' => $linha_status_cip['analista_contestacao'],
    'data_tratamento' => $linha_status_cip['data_tratamento'], 
    'hora_tratamento' => $linha_status_cip['hora_tratamento'],
    'data_do_recebimento' => $linha_status_cip['data_do_recebimento'],
    'hora_do_recebimento'=> $linha_status_cip['hora_do_recebimento'],
    'revisao'=> $linha_status_cip['revisao']

    );


    
$sql = "SELECT 
    CASE WHEN MAX(qtd_contestacoes) IS NULL 
         THEN 0
         ELSE MAX(qtd_contestacoes)
    END +1 as qtd_cont
      FROM cip_nv.base_contestacoes_cotacao  
      WHERE id_cotacao='".$tabela['id_cotacao']."' AND revisao='".$tabela['revisao']."'";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_2");
 $tabela['qtd_contestacoes'] = $consulta['qtd_cont'];

 $data_cadastro=$tabela['data_do_recebimento'];
 $hora_cadastro=substr($tabela['hora_do_recebimento'],0,5);

$data = $data_cadastro;
$data_exp_v1 = explode ('-',$data);
$dia = $data_exp_v1[0];
    switch (date('w',mktime(0,0,0,$data_exp_v1[1],$dia,$data_exp_v1[2]))) {
        case 6:
        $teste = 'sabado';
        break;
        default:
        $teste = 'ok';
        break;
    }
                 
$data_modificada_dma = explode('-', $data_cadastro);
$data_cadastro = $data_modificada_dma[0].'-'.$data_modificada_dma[1].'-'.$data_modificada_dma[2];
$teste1 = calcula_data_sla2($data_cadastro,$calcula_data);

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
$data_modificada_dma = explode('-', $data_cadastro);
$data_cadastro1 = $data_modificada_dma[2].'-'.$data_modificada_dma[1].'-'.$data_modificada_dma[0];
//echo '<BR> total um =' . $total;
if ($data_cadastro == $calcula_data){
  $total = diminui_hora($hora_cadastro,$hora_atual);
}

$sql = "INSERT INTO cip_nv.base_erros_cotacao_contestacao(
               id_cotacao, 
               id_contestacao_cotacao, 
               ofensor,
               analista_contestacao, 
               tipo2, 
               tipo_apurado, 
               analista_ofensor,
               perfil_ofensor,
               turno_ofensor, 
               usuario_att, 
               dt_atualizacao,
               contestacao,
               data_tratamento,
               hora_tratamento,
               id_setor,
               setor,
               tmt,
               qtd_contestacoes )
     VALUES( '".$tabela['id_cotacao']."','".
            $tabela['id_contestacao_cotacao']."','".
            $tabela['ofensor']."','".
            $tabela['analista_contestacao']."','".
            $tabela['tipo2']."','".            
            $tabela['tipo_apurado']."','".
            $tabela['analista_ofensor']."','".
            $tabela['perfil_ofensor']."','".
            $tabela['turno_ofensor']."','".
            $tabela['usuario_att']."','".
            $tabela['dt_atualizacao']."','".
            $tabela['contestacao']."','".
            $tabela['data_tratamento']."','".
            $tabela['hora_tratamento']."','".
            $tabela['id_setor']."','".
            $tabela['setor']."','".
            $total."','".
            $tabela['qtd_contestacoes']."')";

 $result1=mysql_query($sql,$conecta) or die(mysql_error().$sql." erro #SQL_3");


$sqlup = "UPDATE cip_nv.base_contestacoes_cotacao SET
               ofensor='{$tabela['ofensor']}',
               analista_contestacao ='{$tabela['analista_contestacao']}', 
               tipo2='{$tabela['tipo2']}', 
               tipo_apurado='{$tabela['tipo_apurado']}', 
               analista_ofensor='{$tabela['analista_ofensor']}',
               perfil_ofensor='{$tabela['perfil_ofensor']}',
               turno_ofensor='{$tabela['turno_ofensor']}', 
               usuario_att='{$tabela['usuario_att']}', 
               dt_atualizacao='{$tabela['dt_atualizacao']}',
               contestacao='{$tabela['contestacao']}',
               data_tratamento='{$tabela['data_tratamento']}',
               hora_tratamento='{$tabela['hora_tratamento']}',
               id_setor='{$tabela['id_setor']}',
               setor='{$tabela['setor']}',
               tmt='{$total}',
               qtd_contestacoes='{$tabela['qtd_contestacoes']}'
        WHERE  id_contestacao_cotacao='{$tabela['id_contestacao_cotacao']}' ";

$resultup = mysql_query($sqlup,$conecta) or die(mysql_error().$sqlup." erro #SQL_4");



} 
/*
echo "<script>alert('Erro cadastrado com sucesso !'); 
  alert('Se não tiver mais erros a cadastrar clicar em fechar!'); 
      document.location.replace('../forms/form_cotacoes_contestacao_tipo_de_erros2.php?id_contestacao_cotacao={$id_contestacao_cotacao}');
  
      </script>";
  exit();*/

echo "<script>alert('Erro cadastrado com sucesso !'); 
                        redireciona();
                 window.close();

               </script>\n";
  exit;



 mysql_free_result($consulta,$result1,$resultup,$acao_valida);
 mysql_close($conecta);


?>	


</body>
</html>
