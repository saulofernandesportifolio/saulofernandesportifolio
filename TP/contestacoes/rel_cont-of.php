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
<script type="text/javascript">
function popUpDetalhes(object){
    $.post( "rel_cont-of2.php",{"id":object.id}, function(texto) {
        if(object.name === "off"){
            $("#td"+object.id).append(texto);
            object.name = "on";
        }else if(object.name === "on"){
            $("#td"+object.id+" table").remove();
            object.name = "off";
        }else
            alert("nome inesperado");
});
}
</script>
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
            <center><font><strong>Resumo de contestações por operador ofensor</strong></font></center>
            <?php
                mysql_query("SET lc_time_names = 'pt_BR';");
                //$sql = 'call pivotwizard("cme.item", "CONCAT(SUBSTRING_INDEX(co.item,\' \',1), \'<br />\', SUBSTRING_INDEX(co.item,\' \',-1))", "1", "base_contestacoes bc, cont_operador co, cont_motivos_erro cme", "bc.usuario_tratamento=co.id AND cme.id = bc.motivo");';
                //criaPivotTable($sql, "Ofensores");
                
                $sql = "SELECT max(co.id) as id, co.item as Usuario, count(id_contestacao) as Quantidade 
                        FROM base_contestacoes bc
                        INNER JOIN cont_operador co ON bc.usuario_tratamento = co.id
                        GROUP BY usuario_tratamento
                        ORDER BY Quantidade DESC";
                $consulta = mysql_query($sql);
                
                echo "<table style='width:700px' id='table_conteudo' border='1'>";
                echo "<tr>";
                echo "<th style='font-weight=600;width:630px;' align='center'>Usuarios</th>";
                echo "<th style='font-weight=600;width:70px;' align='center'>Quantidade</th>";
                $total = 0;
                while($dados = mysql_fetch_assoc($consulta)){
                    $total += $dados["Quantidade"];
                    echo "<tr>";
                    echo "<td onclick='popUpDetalhes(this)' id='td".$dados["id"]."' align='center'>";
                    echo utf8_encode($dados["Usuario"]);
                    echo "</td>";
                    echo "<td style='background-color: white;' align='center'>";
                    echo "<a name='off' id='".$dados["id"]."' onclick='popUpDetalhes(this)'>";
                    echo "<u>".$dados["Quantidade"]."</u>";
                    echo "</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td id='td%' name='teste' align='center'>";
                echo mysql_num_rows($consulta)." operadores</td>";
                echo "<td align='center'>";
                echo $total;
                echo "</td>";
                echo "</table>";
                unset($total);
            ?>
        </div> 
    </div>
</div>
</body>
</html>