<?php 
//include("valida_usuario.php");
 @session_start();
?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/menu.css" rel="stylesheet" style="text/css">
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
/*$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];*/
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
<!-- SUP PN -------------------------->
<!-- OPERADOR DIRETO -------------->
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
echo	"'../../tp/direto/direto_filtro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Reversao Direto</td></tr>";
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
echo	"'../../tp/direto/direto_filtro_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Pedidos pendentes Direto $nome</td></tr>";
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
<!-- SUP DIRETO -------------->
<!--  INDIRETO OPERADOR ------------->
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
echo	"'../../tp/indireto/indireto_filtro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Reversao Indireto</td></tr>";
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
echo	"'../../tp/indireto/pedidos_realizados_operador.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    ">Indireto Produção $nome</td></tr>";
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
<!-- SUP INDIRETO ------------->
<!-- OPERADOR GESTÃO  ------------->
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
echo	"'../../tp/gestao/gestao_filtro.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>Pedidos Pendentes Gestão</td></tr>";
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
echo    ">Pedido pendente Gestão</td></tr>";
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
echo	"'../../tp/bi/inicio_bi.php'";
echo	'"';
echo	"id=";
echo	'"td_menu"';
echo    "><hr>BI</td></tr>";
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