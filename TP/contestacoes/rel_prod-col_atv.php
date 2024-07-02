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
    if($_SESSION["contestacoes_atv_sup"] == 0){    	
        echo"
            <script type=\"text/javascript\">
            alert('Você não tem permissão para acessar esta página!');
            document.location.replace('../logout.php');
            </script>
        ";
    }

include("../../tp/conexao.php");

$tempo = 0;
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");


$mes_atual=date("Y-m");

$ano=date("Y");
$mes=date("m");
if(strlen($mes) == 1){
    
  $mes2="0".$mes;
}else{
    
  $mes2=$mes;  
}

$dt_filtro = $ano."-".$mes2."-";


$sql_user="SELECT * FROM usuarios WHERE login = '$login'";
$acao_op=mysql_query($sql_user,$conecta);
while($dado= mysql_fetch_array($acao_op)){					    
    $login = $dado["login"];
    $user= $dado["id"];
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
            <center><font><strong>Resumo de Produção por operador mês: <?php echo $mes_atual ?></strong></font></center>
            <?php
            
        
             mysql_query("SET lc_time_names = 'pt_BR';");
            $sql ='call pivotwizard("u.nome", "date_format(bc.data_tratamento,\'%d/%M\')", "1", "base_contestacoes_atividades bc, usuarios u","bc.analista_contestacao=u.id and bc.data_tratamento like \'%'."$dt_filtro".'%\' ");';
            criaPivotTable($sql, "Operador");
            
               

            ?>
        </div> 
    </div>
</div>
</body>
</html>