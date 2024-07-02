<?php 
 @session_start();
?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/menu.css" rel="stylesheet" style="text/css" />
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<body>
<?php
$nome = $_SESSION["nome"];
	if($_SESSION["valida"] <> 1){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
 function criaPivotTable($sql, $nomeRelatorio)
 {
    $p=0;
    $total_geral=array();
    $contLinha=1;
    $contCol=1;
    $consulta = mysql_query($sql) or die(mysql_error());
    echo "<table id='table_conteudo' border='1'>";
    while($campos = mysql_fetch_assoc($consulta)){
        if($contLinha == 1){
            echo "<tr>";
            foreach(array_keys($campos) as $idx => $vlr){
                if($contCol == 1){
                    echo "<td style='font-weight=600;' align='center'>".$nomeRelatorio."</td>";
                    $contCol++;
                }else{
                    $vlr = str_replace("_", " ", $vlr);
                    $cabec = "<td style='font-weight=600;' align='center'>";
                    $cabec .= $vlr;
                    $cabec .= "</td>";
                    echo $cabec;
                }                
            }
            echo "<td style='font-weight=600;' align='center'>Total</td></tr>";
            $contLinha = 0;                                                
        }
        echo "<tr>";
        $total =0;
        foreach(array_values($campos) as $idx => $vlr){
            if($contLinha == 0){
                echo "<td align='center'>";
                $contLinha++;
            }else{
                if(!isset($total_geral[$p])){
                    $total_geral[$p] = 0;
                }
                $total_geral[$p]+= $vlr;
                $total += $vlr;
                echo "<td style='background-color: white;' align='center'>";
                $p++;  
            }
            echo $vlr."</td>";
        }
        $contLinha = 0;
        echo "<td style='background-color: white;' align='center'>$total</td></tr>";
        if(!isset($total_geral[$p]))
        {
            $total_geral[$p] = 0;
        }
        $total_geral[$p]+= $total;
        $p=0;
    }
    echo "<tr><td align='center' style='font-weight=600;'>Total</td>";
    foreach($total_geral as $vlr){
        echo "<td align='center' style='font-weight=600;'>$vlr</td>";
    }
    echo "</tr>";
    echo "</table>";
    unset($consulta);
    unset($sql);
}
?>
<img src="../../tp/img/logo.jpg" />
<br /><br />
<table id="table_menu" >

<?php
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/home.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">";
echo "Home";
echo "</td></tr>";
?>
<!-- OPERADOR CONTESTACOES --------------------------->
<?php

if($_SESSION["contestacoes"] == 1 || $_SESSION["contestacoes_sup"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'#'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr />Módulo - Tamitação </td></tr>";
}

if($_SESSION["contestacoes"] == 1 || $_SESSION["contestacoes_sup"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/pesquisa_contestacoes.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr />Pesquisar Contestação</td></tr>";

}
?>

<?php

if($_SESSION["contestacoes"] == 1 && $_SESSION["contestacoes_sup"] != 1 ){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_prod-col_op.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Produção Operador</td></tr>";
}

?>


<!-- SUPERVISOR CONTESTACOES --------------------------->
<?php
if($_SESSION["contestacoes_sup"] == 1){
echo    "<tr><td id='td_menu'><hr /><u>Relatórios</u></td></tr>";    
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_cont-reg.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Contestação por regional</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_cont-erro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Motivos de erro</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_erro-reg.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Motivos de erro por regional</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_prod-col.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Produção por colaborador</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_cont-of.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Contestação por usuário ofensor</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/cadastro_submotivos.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Cadastrar sub motivos</td></tr>";



echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/filtro_contestacao_exporta.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exportar base</td></tr>";

}
?>

<!-- OPERADOR CONTESTACOES INPUT--------------------------->
<?php

if($_SESSION["contestacoes_atv"] == 1 || $_SESSION["contestacoes_atv_sup"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'#'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr />Módulo - Input </td></tr>";

}

if($_SESSION["contestacoes_atv"] == 1 || $_SESSION["contestacoes_atv_sup"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/pesquisa_contestacoes_atv.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr />Pesquisar Contestação</td></tr>";

}
?>

<?php

if($_SESSION["contestacoes_atv"] == 1 && $_SESSION["contestacoes_atv_sup"] != 1 ){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_prod-col_op_atv.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Produção Operador</td></tr>";
}

?>

<!-- SUPERVISOR CONTESTACOES INPUT --------------------------->
<?php
if($_SESSION["contestacoes_atv_sup"] == 1){
echo    "<tr><td id='td_menu'><hr /><u>Relatórios</u></td></tr>";    
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_cont-reg_atv.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Contestação por regional</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_cont-erro_atv.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Motivos de erro</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_erro-reg_atv.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Motivos de erro por regional</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_prod-col_atv.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Produção por colaborador</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/rel_cont-of_atv.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Contestação por usuário ofensor</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/cadastro_ofensor_submotivos_input.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Cadastrar sub motivos</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/filtro_contestacao_exporta_atv.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exportar base</td></tr>";

}
?>

<?php
if($_SESSION["contestacoes_atv"] == 1 && $_SESSION["contestacoes_atv_sup"] != 1 ){
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/contestacoes/filtro_contestacao_exporta_atv.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exportar base</td></tr>";

}
?>







<!-- OPERADOR TSA --------------------------->
<?php
if($_SESSION["tsa"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/tsa/tsa_cadastro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr />TSA Cadastro</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/tsa/pesquisa_tsa.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Pesquisar TSA</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/tsa/tsa_pendente.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">TSA Pendente</td></tr>";

echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/bi/filtro_tsa.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr />Exporta base TSA</td></tr>";
}
?>

<!-- OPERADOR SAP --------------------------->
<?php
if($_SESSION["sap_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/sap/sap_filtro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>SAP Pendente</td></tr>";
}
?>

<?php
if($_SESSION["sap_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/sap/sap_cadastro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">SAP Cadastro</td></tr>";
}
?>

<?php
if($_SESSION["sap_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/sap/sap_filtro_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">SAP Pendente $nome</td></tr>";
}
?>
<!-- OPERADOR SAP --------------------------->
<!-- PESQUISA PRODUÇÃO OPERADOR ------------->
<?php
if($_SESSION["sap_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/sap/pedidos_pendentes_realizados_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Pesquisa Produção SAP - $nome</td></tr>";
}
?>
<!-- PESQUISA PRODUÇÃO OPERADOR ------------->
<!-- BASE SAP --------------------------->
<?php
if($_SESSION["carrega_base_sap"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/sap/adm_sap.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Carregar Base SAP</td></tr>";
}
?> 

<!-- BASE SAP --------------------------->

<!-- SUP SAP --------------------------->

<?php
if($_SESSION["SUP_SAP"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/sap/sap_filtro_sup.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pendente Supervisão</td></tr>";
}
?>

<?php
if($_SESSION["SUP_SAP"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/sap/sap_sup_visao_dia.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão Sap Dia</td></tr>";
}
?>

<?php
if($_SESSION["SUP_SAP"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/sap/sap_sup_visao_mes.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão Sap Mês</td></tr>";
}
?>

<?php
if($_SESSION["SUP_SAP"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/sap/filtro_retornar_para_visao_sap.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Retornar Pedidos SAP<tr></td></tr>";
}
?>

<?php
if($_SESSION["SUP_SAP"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/sap/filtro_sap_exporta.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exporta Base SAP<tr></td></tr>";
}
?>
<!-- SUP SAP --------------------------->

<!--  OPERADOR ERROS  ------------>
<?php
if($_SESSION["erros_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/erros_filtro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Erros BKO</td></tr>";
}
?>

<?php
if($_SESSION["erros_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/erros_cad_bko.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Tramite manual BKO</td></tr>";
}
?>

<?php
if($_SESSION["erros_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/pendente_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Erros Pendentes ";
echo    $nome;
echo    "</td></tr>";
}
?>

<?php
if($_SESSION["erros_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/pedidos_realizados_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Pesquisa Produção Erros - $nome</td></tr>";
}
?>
<!--  OPERADOR ERROS  ------------>
<!--  CARREGA BASE ERROS  ------------>
<?php
if($_SESSION["carrega_base_erros"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/adm_erros.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Carregar Base Erros</td></tr>";
}
?>
<!--  CARREGA BASE ERROS  ------------>
<!--  SUP ERROS  ------------>
<?php
if($_SESSION["adm_erros"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/pendente_sup.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pendentes Supervisão Erros</td></tr>";
}
?>

<?php
if($_SESSION["adm_erros"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/erros_sup_visao_dia.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão Erros dia</td></tr>";
}
?>

<?php
if($_SESSION["adm_erros"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/erros_sup_visao_mes.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão Erros mês</td></tr>";
}
?>

<?php
if($_SESSION["adm_erros"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/filtro_retornar_para_visao_erros.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Retornar pedidos Erros</td></tr>";
}
?>

<?php
if($_SESSION["adm_erros"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/filtro_erros_exporta.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exportar Base Erros</td></tr>";
}
?>

<?php
if( $_SESSION["prioriza_erros"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/erros_filtro_prioriza.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Prioriza Erros</td></tr>";
}
?>


<!-- SUP ERROS  ---------------->
<!-- OPERADOR PN ----------------->
<?php
if($_SESSION["pn_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/pn/pn_filtro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Portabilidade</td></tr>";
}
?>

<?php
if($_SESSION["pn_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/pn/pn_filtro_aguardando_janela.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Filtro Aguardando janela</td></tr>";
}
?>


<?php
if($_SESSION["pn_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/pn/pn_filtro_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">PN Pendentes $nome</td></tr>";
}
?>
<!-- OPERADOR PN ----------------->
<!-- CARREGA BASE PN ----------------->
<?php
if($_SESSION["carrega_base_pn"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/pn/adm_pn.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Carregar Base PN</td></tr>";
}
?>
<!-- CARREGA BASE PN ----------------->
<!-- SUP PN -------------------------->
<?php
if($_SESSION["SUP_PN"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/pn/pn_filtro_sup.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pedidos Pendentes</td></tr>";
}
?>

<?php
if($_SESSION["SUP_PN"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/pn/pn_sup_visao_dia.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão Pn Dia</td></tr>";
}
?>

<?php
if($_SESSION["SUP_PN"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/pn/pn_sup_visao_mes.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão Pn Mês</td></tr>";
}
?>

<?php
if($_SESSION["SUP_PN"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/pn/filtro_retornar_para_visao_pn.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Retornar Pedidos PN</td></tr>";
}
?>

<?php
if($_SESSION["SUP_PN"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/pn/filtro_pn_exporta.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exportar Base PN</td></tr>";
}
?>

<!-- SUP PN -------------------------->
<!-- OPERADOR DIRETO -------------->

<?php
/*
if($_SESSION["operador_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/direto_filtro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Reversao Direto</td></tr>";
}
*/
?>

<?php
if($_SESSION["operador_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/direto_filtro_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pedidos pendentes Direto $nome</td></tr>";
}
?>

<?php
if($_SESSION["operador_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/pedidos_realizados_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Pesquisa Produção Direto - $nome</td></tr>";
}
?>
<!-- OPERADOR DIRETO -------------->
<!-- PRIORIZA PEDIDO -------------->
<?php
if($_SESSION["prioriza_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/direto_fila_prioriza.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Priorizar pedidos - Direto</td></tr>";
}
?>
<!-- PRIORIZA PEDIDO -------------->
<!-- CARREGA BASE DIRETO -------------->
<?php
if($_SESSION["carrega_base_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/adm_reversao_direto.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Carregar Base Direto</td></tr>";
}
?>
<!-- CARREGA BASE DIRETO -------------->
<!-- SUP DIRETO -------------->
<?php
if($_SESSION["supervisor_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/cadastro_manual_direto.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Cadastro Manual Direto</td></tr>";
}
?>
<?php
if($_SESSION["supervisor_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/direto_filtro_supervisor.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pendente Supervisão Direto</td></tr>";
}
?>
<?php
if($_SESSION["supervisor_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/direto_sup_visao_dia.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão dia Direto</td></tr>";
}
?>
<?php
if($_SESSION["supervisor_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/direto_sup_visao_mes.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão mês Direto</td></tr>";
}
?>

<?php
if($_SESSION["supervisor_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/filtro_retornar_para_visao_direto.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Retornar pedidos Direto</td></tr>";
}
?>

<?php
if($_SESSION["supervisor_direto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/direto/filtro_direto_exporta.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exportar Base Direto</td></tr>";
}
?>

<!-- SUP DIRETO -------------->
<!--  INDIRETO OPERADOR ------------->
<?php
/*
if($_SESSION["reversao_ind_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/indireto_filtro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Reversao Indireto</td></tr>";
}
*/
?>
<?php
if($_SESSION["reversao_ind_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/pedidos_realizados_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Indireto Produção $nome</td></tr>";
}
?>
<?php
if($_SESSION["reversao_ind_bko"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/indireto_filtro_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Indireto Pendente $nome</td></tr>";

}
?>
<!--  INDIRETO OPERADOR ------------->
<!-- PRIORIZA PEDIDO -------------->
<?php
if($_SESSION["prioriza_indireto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/indireto_fila_prioriza.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Priorizar pedidos - Indireto</td></tr>";
}
?>
<!-- PRIORIZA PEDIDO -------------->
<!--  CARREGA BASE INDIRETO ------------->
<?php
if($_SESSION["carrega_base_indireto"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/adm_reversao_ind.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Carregar Base IND</td></tr>";
}
?>
<!--  CARREGA BASE INDIRETO ------------->
<!--  SUP INDIRETO ------------->

<?php
if($_SESSION["ADM_REVERSAO_IND"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/cadastro_manual_indireto.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Cadastro Manual Indireto</td></tr>";
}
?>
<?php
if($_SESSION["ADM_REVERSAO_IND"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/indireto_filtro_supervisor.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pedidos pendentes</td></tr>";
}
?>

<?php
if($_SESSION["ADM_REVERSAO_IND"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/indireto_sup_visao_dia.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão dia Indireto</td></tr>";
}
?>

<?php
if($_SESSION["ADM_REVERSAO_IND"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/indireto_sup_visao_mes.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão Mês Indireto</td></tr>";
}
?>

<?php
if($_SESSION["ADM_REVERSAO_IND"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/filtro_retornar_para_visao_indireto.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Retornar pedidos IND</td></tr>";
}
?>

<?php
if($_SESSION["ADM_REVERSAO_IND"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/indireto/filtro_indireto_exporta.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exportar Base IND</td></tr>";
}
?>
<!-- SUP INDIRETO ------------->
<!-- OPERADOR GESTÃO  ------------->
<?php
/*if($_SESSION["operador_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/gestao_filtro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pedidos Pendentes Gestão</td></tr>";
}*/
?>
<?php
if($_SESSION["operador_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/gestao_cadastro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Cadastro manual Gestão</td></tr>";
}
?>
<?php
if($_SESSION["operador_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/pendente_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Pedidos pendentes $nome</td></tr>";
}
?>
<?php
if($_SESSION["operador_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/pedidos_pendentes_realizados_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Pedidos realizados $nome</td></tr>";
}
?>

<?php
if($_SESSION["operador_gestao"]  == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/filtro_gestao_exporta_op.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exportar Base Gestão</td></tr>";
}
?>

<!-- OPERADOR GESTÃO  ---------------->
<!-- CARREGA BASE GESTÃO ------------->
<?php
if($_SESSION["carregar_base_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/adm_gestao.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Carregar Base Gestão</td></tr>";
}
?>
<?php
if($_SESSION["carregar_base_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/adm_gestao_gc.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Carregar Base GC Gestão</td></tr>";
}
?>
<!-- CARREGA BASE GESTÃO ------------->
<!-- SUPERVISÃO GESTÃO   ------------->
<?php
if($_SESSION["supervisor_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/pendente_sup.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pedido pendente Gestão</td></tr>";
}
?>
<?php
if($_SESSION["supervisor_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/pesquisa_gestao.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pesquisar/Distribuir Pedidos Gestão</td></tr>";
}
?>
<?php
if($_SESSION["supervisor_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/gestao_sup_visao_dia.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão Dia Gestão</td></tr>";
}
?>
<?php
if($_SESSION["supervisor_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/gestao_sup_visao_mes.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão Mês Gestão</td></tr>";
}
?>
<?php
if($_SESSION["supervisor_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/filtro_retornar_para_visao_gestao.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Retornar pedidos Gestão</td></tr>";
}
?>

<?php
if($_SESSION["supervisor_gestao"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/gestao/filtro_gestao_exporta.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exportar Base Gestão</td></tr>";
}
?>

<!-- SUPERVISÃO GESTÃO   ------------->
<!-- OPERADOR CONTROLE ATIVIDADES ------------->
<?php
if($_SESSION["controle_atividades"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/erros_controle_cadastro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Erros pendentes</td></tr>";
}
?>
<?php
if($_SESSION["controle_atividades"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/erros/pedidos_pendentes_realizados_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Atividade Concluida - $nome</td></tr>";
}
?>
<!-- OPERADOR CONTROLE ATIVIDADES ------------->
<!-- CARREGA BASE VPE_VPG ------------->
<?php
if($_SESSION["vpe_vpg"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/vpe/adm_vpe.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Carregar Base VPE</td></tr>";
}
?>
<!-- CARREGA BASE VPE_VPG ------------->

<!-- OPERADOR DIRETORIA ------------->
<?php
if($_SESSION["diretoria_input"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/diretoria/diretoria.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pedidos Diretoria</td></tr>";
}
?>
<?php
if($_SESSION["diretoria_input"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/diretoria/pedidos_realizados_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pedidos Realizados $nome</td></tr>";
}
?>
<!-- OPERADOR DIRETORIA ------------->
<!-- SUPERVISOR DIRETORIA ------------->
<?php
if($_SESSION["diretoria_sup"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/diretoria/diretoria_sup_visao_dia.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Visão Dia Diretoria</td></tr>";
}
?>
<?php
if($_SESSION["diretoria_sup"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/diretoria/diretoria_sup_visao_mes.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Visão Mês Diretoria</td></tr>";
}
?>

<?php
if($_SESSION["diretoria_sup"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/diretoria/filtro_diretoria_exporta.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Exportar Base Diretoria</td></tr>";
}
?>

<!-- SUPERVISOR DIRETORIA ------------->
<!-- OPERADOR TREINAMENTO ------------->
<?php
if($_SESSION["treinamento"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/treinamento/treinamento_plano_acao.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Treinamento Plano de Ação</td></tr>";
}
?>
<?php
if($_SESSION["treinamento"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/treinamento/treinamento_controle_questionamentos.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Treinamento Controle de Questionamentos</td></tr>";
}
?>
<?php
if($_SESSION["treinamento"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/treinamento/pedido_treinamento_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Controle de Questionamento Pendente</td></tr>";
}
?>
<!-- OPERADOR TREINAMENTO ------------->
<!-- SUPERVISOR TREINAMENTO ------------->

<?php
if($_SESSION["treinamento_sup"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/treinamento/treinamento_sup_visao_mes.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Visão Mês Treinamento</td></tr>";
}
?>
<!-- SUPERVISOR TREINAMENTO ------------->
<!-- EXPORTAR TREINAMENTO ------------->

<?php
if($_SESSION["treinamento_sup"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/treinamento/filtro_treinamento.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Exportar Treinamento</td></tr>";
}
?>
<!-- EXPORTAR TREINAMENTO ------------->

<!-- OPERADOR BI ------------->
<?php
if($_SESSION["bi"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';

echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/bi/relatorios.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>BI - Extração de Bases</td></tr>";
}
?>

<?php
if($_SESSION["bi"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';

echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/bi/criar_usuario.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>BI - Criar Usuário</td></tr>";
}
?>
<?php
if($_SESSION["bi"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';

echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/bi/alterar_usuario.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>BI - Alterar Usuário</td></tr>";
}
?>
<?php
if($_SESSION["bi"] == 1 ){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';

echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/bi/cadastro_funcionario.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>BI - Cadastro Funcionário</td></tr>";
}
?>
<?php
if($_SESSION["cadastro_func"] == 1 ){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';

echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/cadastro_funcionario.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>BI - Cadastro Funcionário</td></tr>";
}
?>
<!-- OPERADOR BI ------------->

<!-- NOTICIAS ------------->
<?php
if($_SESSION["NOTICIAS"] == 1){ 
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/noticias/noticias.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Noticias</td></tr>";
}
?>
<!-- NOTICIAS ------------->
<!-- PERFIL ------------->
<?php
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/perfil/perfil.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">";
echo    "<hr>";
echo    "Perfil</td></tr>";
//session_destroy();
?>
<!-- PERFIL ------------->


<!-- SAIR ------------->
<?php
echo	"<tr style=";
echo	'"cursor:default"';
echo	"onMouseOver=";
echo	'"javascript:this.style.backgroundColor=';
echo	"'#C0B085'";
echo	'"'; 
echo	"onMouseOut=";
echo	'"javascript:this.style.backgroundColor=';
echo	"''";
echo	'"';
echo	"><td onclick=";
echo	'"location.href=';
echo	"'../../tp/logout.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">";
echo    "<hr>";
echo    "Logout</td></tr>";
//session_destroy();
?>
<!-- SAIR ------------->
</table>
</body></html>