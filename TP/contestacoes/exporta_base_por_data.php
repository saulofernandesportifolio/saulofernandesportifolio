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
    if($_SESSION["contestacoes_sup"] == 0){    	
        echo"
            <script type=\"text/javascript\">
            alert('Você não tem permissão para acessar esta página!');
            document.location.replace('../logout.php');
            </script>
        ";
    }

include("../../tp/conexao.php");
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
   $nomeArq = "relatorio/Base_Contestacoes-".rand(0,999999).".xls";
    $excel=new ExcelWriter($nomeArq);

    if($excel==false){
        echo $excel->error;
   }
    //Escreve o nome dos campos de uma tabela
     $myArr=array('id_contestacao',
                  'n_pedido',
                  'revisao',
                  'dt_entrada',
                  'uf',
                  'regional',
                  'cd_adabas',
                  'ds_contestacao',
                  'ds_tp_ofensor',
                  'ds_usuario_tratamento',
                  'dt_retorno',
                  'ds_motivo',
                  'ds_sub_motivo',
                  'ds_oferta',
                  'ds_analista_atv',
                  'ds_tp_pedido',
                  'reanalize_completa',
                  'parecer',
                  'texto');
    $excel->writeLine($myArr);
   //Seleciona os campos de uma tabela
	include "../conexao.php";

	$consulta = "SELECT bc.id_contestacao, 
                            bc.n_pedido, 
                            bc.revisao, 
                            DATE_FORMAT(bc.dt_entrada, '%d/%m/%Y') as dt_entrada, 
                            bc.regional as uf,
                            CASE 
                                WHEN bc.regional = 'RS' OR bc.regional = 'SC' OR bc.regional = 'PR'
                                THEN 'Sul' 
                                WHEN bc.regional = 'GO' OR bc.regional = 'MT' OR bc.regional = 'MS' OR bc.regional = 'DF'
                                THEN 'CO'
                                WHEN bc.regional = 'AL' OR bc.regional = 'BA' OR bc.regional = 'CE' OR bc.regional = 'MA'
                                  OR bc.regional = 'PB' OR bc.regional = 'PE' OR bc.regional = 'PI' OR bc.regional = 'RN'
                                  OR bc.regional = 'SE' OR bc.regional = 'TO'
                                THEN 'Nordeste'
                                WHEN bc.regional = 'AC' OR bc.regional = 'AP' OR bc.regional = 'AM' OR bc.regional = 'PA'
                                  OR bc.regional = 'RO' OR bc.regional = 'RR'
                                THEN 'Norte'
                                WHEN bc.regional = 'ES' OR bc.regional = 'RJ'
                                THEN 'Leste'
                                WHEN bc.regional = 'MG'
                                THEN 'MG'
                                ELSE 'SP'
                            END as regional,
                            bc.cd_adabas, 
                            cc.item as ds_contestacao, 
                            cto.item as ds_tp_ofensor, 
                            cop.item as ds_usuario_tratamento, 
                            bc.dt_retorno, 
                            cme.item as ds_motivo,
                            csme.item as ds_sub_motivo,
                            CASE WHEN cof.item IS NULL THEN 'Sem oferta' END as ds_oferta, 
                            u.nome as ds_analista_atv, 
                            ctp.item as ds_tp_pedido,
                            bc.reanalize_completa, 
                            bc.parecer, 
                            bc.texto
                    FROM base_contestacoes bc LEFT JOIN cont_ofertas cof ON cof.id  = bc.oferta, 
                         cont_qtd_contestacoes cqc,
                         cont_contestacao cc,
                         cont_tp_ofensor cto,
                         cont_operador cop,
                         cont_motivos_erro cme,
                         cont_sub_motivos_erro csme,
                         cont_tipo_pedido ctp,
                         usuarios u
                    WHERE cqc.id  = bc.qtd_contestacoes
                      AND cc.id   = bc.contestacao 
                      AND cto.id  = bc.tp_ofensor
                      AND cop.id  = bc.usuario_tratamento
                      AND cme.id  = bc.motivo
                      AND csme.id = bc.sub_motivo
                      AND u.id    = bc.analista_atv
                      AND ctp.id  = bc.tp_pedido";
   
   $resultado = mysql_query($consulta);
   
   if($resultado==true){
      while($linha = mysql_fetch_array($resultado)){
      $myArr=array( $linha['id_contestacao'],
                    $linha['n_pedido'],
                    $linha['revisao'],
                    $linha['dt_entrada'],
                    $linha['uf'],
                    utf8_encode($linha['regional']),
                    $linha['cd_adabas'],
                    $linha['ds_contestacao'],
                    $linha['ds_tp_ofensor'],
                    $linha['ds_usuario_tratamento'],
                    $linha['dt_retorno'],
                    $linha['ds_motivo'],
                    $linha['ds_sub_motivo'],
                    $linha['ds_oferta'],
                    $linha['ds_analista_atv'],
                    $linha['ds_tp_pedido'],
                    $linha['reanalize_completa'],
                    utf8_encode($linha['parecer']),
                    utf8_encode($linha['texto'])
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