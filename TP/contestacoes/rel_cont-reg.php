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
            <center><font><strong>Resumo de contestações por regional</strong></font></center>
            <?php
                $sql = 'call pivotwizard("c.item", "cur.regional", "1", "base_contestacoes bc, cont_contestacao c, cont_uf_regional cur", "bc.contestacao=c.id AND bc.regional=cur.item");';
                criaPivotTable($sql, "Contestacoes");
            ?>
        </div> 
    </div>
</div>
</body>
</html>