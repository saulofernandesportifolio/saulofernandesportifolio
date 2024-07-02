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
    $.post( "rel_cont-of2_atv.php",{"id":object.id}, function(texto) {
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
    if($_SESSION["contestacoes_atv_sup"] == 0){    	
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
                
                $sql = "SELECT max(co.id) as id, co.item as Usuario, count(id_contestacao_atv) as Quantidade
                        FROM base_contestacoes_atividades bc 
                        INNER JOIN cont_operador_input co ON bc.analista = co.id 
                        INNER JOIN cont_tp_ofensor_input cd  ON bc.ofensor = cd.id
                        WHERE cd.id in(2)
                        GROUP BY analista
                        ORDER BY Quantidade DESC";
                $consulta = mysql_query($sql);
                
                
                echo "<table style='width:700px' id='table_conteudo' border='1'>";
                echo "<tr>";
                echo "<th style='font-weight=600;width:630px;' align='center'>Usuarios</th>";
                echo "<th style='font-weight=600;width:70px;' align='center'>BKO</th>";
             
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
                 echo '</br>';
          
                $sql1 = "SELECT max(co.id) as id, co.item as Usuario, count(id_contestacao_atv) as Quantidade2
                        FROM base_contestacoes_atividades bc 
                        INNER JOIN cont_operador_input co ON bc.analista = co.id 
                        INNER JOIN cont_tp_ofensor_input cd  ON bc.ofensor = cd.id
                        WHERE cd.id in(3)
                        GROUP BY analista
                        ORDER BY Quantidade2 DESC";
                $consulta1 = mysql_query($sql1);
               
        
                echo "<table style='width:700px' id='table_conteudo' border='1'>";
                echo "<tr>";
                echo "<th style='font-weight=600;width:630px;' align='center'>Usuarios</th>";
                echo "<th style='font-weight=600;width:70px;' align='center'>CELULA INPUT</th>"; 
                
                      $total1 = 0;
                while($dados = mysql_fetch_assoc($consulta1)){
                    $total1 += $dados["Quantidade2"];
                    echo "<tr>";
                    echo "<td onclick='popUpDetalhes(this)' id='td".$dados["id"]."' align='center'>";
                    echo utf8_encode($dados["Usuario"]);
                    echo "</td>";
                    echo "<td style='background-color: white;' align='center'>";
                    echo "<a name='off' id='".$dados["id"]."' onclick='popUpDetalhes(this)'>";
                    echo "<u>".$dados["Quantidade2"]."</u>";
                    echo "</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                
                
                echo "<td id='td%' name='teste' align='center'>";
                echo mysql_num_rows($consulta1)." operadores</td>";
                echo "<td align='center'>";
                echo $total1;
                echo "</td>";
               echo "</table>";
                unset($total1);
                
                echo '</br>';
                $sql2 = "SELECT max(co.id) as id, co.item as Usuario, count(id_contestacao_atv) as Quantidade3
                        FROM base_contestacoes_atividades bc 
                        INNER JOIN cont_operador_input co ON bc.analista = co.id 
                        INNER JOIN cont_tp_ofensor_input cd  ON bc.ofensor = cd.id
                        WHERE cd.id in(4)
                        GROUP BY analista
                        ORDER BY Quantidade3 DESC";
                $consulta2 = mysql_query($sql2);
      
                echo "<table style='width:700px' id='table_conteudo' border='1'>";
                echo "<tr>";
                echo "<th style='font-weight=600;width:630px;' align='center'>Usuarios</th>";
                echo "<th style='font-weight=600;width:70px;' align='center'>GN GUARDIÃO</th>"; 
                
                      $total2 = 0;
                while($dados = mysql_fetch_assoc($consulta2)){
                    $total2 += $dados["Quantidade3"];
                    echo "<tr>";
                    echo "<td onclick='popUpDetalhes(this)' id='td".$dados["id"]."' align='center'>";
                    echo utf8_encode($dados["Usuario"]);
                    echo "</td>";
                    echo "<td style='background-color: white;' align='center'>";
                    echo "<a name='off' id='".$dados["id"]."' onclick='popUpDetalhes(this)'>";
                    echo "<u>".$dados["Quantidade3"]."</u>";
                    echo "</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                
                
                echo "<td id='td%' name='teste' align='center'>";
                echo mysql_num_rows($consulta2)." operadores</td>";
                echo "<td align='center'>";
                echo $total2;
                echo "</td>";
                 echo "</table>";
                unset($total2);   
                
            ?>
        </div> 
    </div>
</div>
</body>
</html>