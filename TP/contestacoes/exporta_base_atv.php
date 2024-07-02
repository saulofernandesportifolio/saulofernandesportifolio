<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<link href="../../tp/css/padrao.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="fContestacoes.js"></script>

</head>
<body id="logar">
<?php
if($_SESSION["contestacoes_atv"] == 0 ){    	
  	
        echo"
            <script type=\"text/javascript\">
            alert('Você não tem permissão para acessar esta página!');
            document.location.replace('../logout.php');
            </script>
        ";
    }
$tempo = 0;
  set_time_limit($tempo);
  
ini_set ( 'mysql.connect_timeout' ,  '10000' ); 
ini_set ( 'default_socket_timeout' ,  '10000' );
ini_set('memory_limit', '-1');  
  
  
  
include("../../tp/conexao.php");

$data_1 = ($data_1<> '')?(substr($data_1,6,4)."/".  substr($data_1,3,2)."/".substr($data_1,0,2)):date("Y/m/d");
$data_2= ($data_2 <> '')?(substr($data_2,6,4)."/".substr($data_2,3,2)."/".substr($data_2,0,2)):date("Y/m/d");

$tipodata=$_POST['tipodata'];
$regional=$_POST['regional'];

if(empty($tipodata)){
  echo"
            <script type=\"text/javascript\">
            alert('Selecione o tipo de data!');
            history.back();
            </script>
        ";   
    
}
if(empty($data_1) and empty($data_2) ){
  echo"
            <script type=\"text/javascript\">
            alert('Selecione o data inicial e data final!');
            history.back();
            </script>
        ";   
  }

$sql_user="SELECT * FROM usuarios WHERE login = '$login'";
$acao_op=mysql_query($sql_user,$conecta);
while($dado= mysql_fetch_array($acao_op)){					    
    $login = $dado["login"];
}
?>
<div id="principal">
    <div id="menu">
   <?php 
    include("../menu.php") ?>
    </div>
    <div id="caixa" style="height:460px;">
        <div id="conteudo">
            <p id="p_padrao">Contestações - <?php echo $_SESSION["nome"]; ?>.</p>
            <center><font><strong>Exportaçõo da base geral</strong></font></center>
<?php

   //Incluir a classe excelwriter
   include("excelwriter.inc.php");


   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
   $nomeArq = "relatorio/Base_Contestacoes_Input -".rand(0,999999).".xls";
    $excel=new ExcelWriter($nomeArq);

    if($excel==false){
        echo $excel->error;
   }
    //Escreve o nome dos campos de uma tabela
    
       $myArr=array('REGIONAL',
                  'UF', 
                  'DATA DO RECEBIMENTO',
                  'REMETENTE',
                  'ATIVIDADE',
                  'TIPO',
                  'PEDIDO',
                  'QTD LINHAS',
                  'CRIADO EM',
                  'REVISÃO',
                  'ADABAS',
                  'CNPJ',
                  'CLIENTE',
                  'INICIO DA TRATATIVA',
                  'ANALISTA',
                  'LOGIN',
                  'OFENSOR',
                  'DATA RETORNO',
                  'TMT',
                  'TIPO2',
                  'TIPO APURADO',
                  'OBSERVAÇÕES',
                  'ANALISTA CONTESTAÇÃO',
                  'ANALISTA CONTESTAÇÃO ATUALIZOU',
                  'DATA ATUALIZAÇÃO', 
                  'TURNO CONTESTAÇÃO',
                  'TURNO ANALISTA',
                  'COTAÇÃO',
                  'DATA DE TRATAMENTO',
                  'HORA TRATAMENTO');
    $excel->writeLine($myArr);
   //Seleciona os campos de uma tabela
	include "../conexao.php";

 $consulta="SELECT DISTINCT bc.id_contestacao_atv,
                        bc.n_atividade,
                        bc.regional,
                            CASE 
                        WHEN regional = 'RS' OR regional = 'SC' OR regional = 'PR'
                        THEN 'SUL' 
                        WHEN regional = 'GO' OR regional = 'MT' OR regional = 'MS' OR regional = 'DF'
                        THEN 'CO'
                        WHEN regional = 'AL' OR regional = 'BA' OR regional = 'CE' OR regional = 'MA'
                          OR regional = 'PB' OR regional = 'PE' OR regional = 'PI' OR regional = 'RN'
                          OR regional = 'SE' OR regional = 'TO'
                        THEN 'NE'
                        WHEN regional = 'AC' OR regional = 'AP' OR regional = 'AM' OR regional = 'PA'
                          OR regional = 'RO' OR regional = 'RR'
                        THEN 'NO'
                        WHEN regional = 'ES' OR regional = 'RJ'
                        THEN 'LESTE'
                        WHEN regional = 'MG'
                        THEN 'MG'
                    ELSE 'SP'
                    END as regional2,
                            DATE_FORMAT(bc.data_do_recebimento, '%d/%m/%Y') as data_do_recebimento, 
                            bc.hora_do_recebimento,
                            bc.remetente,
                            at.item as ds_tipo,
                            bc.n_pedido,
                            bc.cotacao,
                            bc.qtd_linhas,
                            DATE_FORMAT(bc.criado_em, '%d/%m/%Y') as criado_em, 
                            bc.revisao,
                            bc.adabas,
                            bc.cnpj,
                            bc.cliente,
                            DATE_FORMAT(bc.inicio_da_tratativa,'%d/%m/%Y') as inicio_da_tratativa,
                            u.nome as ds_analista_contestacao,
                            b.login as ds_login,
                            co.item as ds_ofensor,
                            DATE_FORMAT(bc.data_retorno, '%d/%m/%Y %H:%i:%s') as dt_retorno,
                            bc.tmt,
                            ab.item as ds_tipo2,
                            ac.item as ds_tipo_apurado,
                            bc.observacoes_colaborador,
                            bc.retorno_do_email,
                            bc.tipo_contestado_FDV,
                            ad.item as ds_analista,
                            ad.turno as ds_turno2,
                            bc.qtd_contestacoes,
                            CASE WHEN bc.usuario_att IS NULL THEN ' ' WHEN bc.usuario_att THEN c.nome END as ds_usuario_att,
                            DATE_FORMAT(bc.dt_atualizacao,'%d/%m/%Y %H:%i:%s') as dt_atualizacao,
                            DATE_FORMAT(bc.dt_retorno2,'%d/%m/%Y') as dt_retorno2,
                            u.turno as ds_turno,
                            DATE_FORMAT(bc.data_tratamento, '%d/%m/%Y') as data_tratamento,
                            bc.hora_tratamento
            FROM base_contestacoes_atividades bc,
             cont_tp_ofensor_input co,
             usuarios u, 
             usuarios b, 
             cont_tipo_atividade at,
             cont_motivos_erro_input ab,
             cont_sub_motivos_erro_input ac,
             cont_operador_input ad,
             usuarios c
            WHERE
            co.id=bc.ofensor
and u.id=bc.analista_contestacao
and b.id=bc.login
and at.id=bc.tipo
and ab.id=bc.tipo2
and ac.id=bc.tipo_apurado
and ad.id=bc.analista
and (c.id=bc.usuario_att OR bc.usuario_att IS NULL OR bc.usuario_att ='')
and (bc.$tipodata BETWEEN '$data_1' AND '$data_2' AND bc.$regional)";   

   
   
   $resultado = mysql_query($consulta);
   $num = mysql_num_rows($resultado);
   $num;

if($num == 0){
   
    echo"
            <script type=\"text/javascript\">
            alert('Nao foi encontrado dados com este criterio!');
            history.back();
            </script>
        "; 
    
   }
   
   if($resultado==true){
      while($linha = mysql_fetch_array($resultado)){
      $myArr=array(utf8_encode($linha['regional2']),
                    $linha ['regional'], 
                    $linha['data_do_recebimento'],
                    $linha['remetente'],
                    $linha['n_atividade'],
                    $linha['ds_tipo'],
                    $linha['n_pedido'],
                    $linha['qtd_linhas'],
                    $linha['criado_em'],
                    $linha['revisao'],
                    $linha['adabas'],
                    $linha['cnpj'],
                    $linha['cliente'],
                    $linha['inicio_da_tratativa'],
                    $linha['ds_analista'],                    
                    $linha['ds_login'],
                    $linha['ds_ofensor'],
                    $linha['dt_retorno'],
                    $linha['tmt'],
                    $linha['ds_tipo2'],
                    $linha['ds_tipo_apurado'],
                    $linha['observacoes_colaborador'],
                    $linha['ds_analista_contestacao'],
                    $linha['ds_usuario_att'],
                    $linha['dt_atualizacao'],
                    $linha['ds_turno'],
                    $linha['ds_turno2'],
                    $linha['cotacao'],
                    $linha['data_tratamento'],
                    $linha['hora_tratamento']
                      
	 );
         $excel->writeLine($myArr);
     }
   }
    $excel->close();
    echo "<hr><font size='2' color='#666666'>Relatório gerado com sucesso.<a href=\"".$nomeArq."\">Abrir</a></font><hr>";
	?>
    </div> 
    </div>
</div>
</body>
</html>