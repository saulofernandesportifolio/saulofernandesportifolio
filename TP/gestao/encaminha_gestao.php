<?php   
@session_start(); 
if($_SESSION["operador_gestao"] == 0){
	echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../logout.php');
		</script>
	";
}
if(!empty($_POST["id_pedido"])){
    $gestao = $_POST['id_pedido'];    
    $pedido = "";
    $count = count($gestao);
    foreach($gestao as $idx => $vlr){
        $pedido .= " id_gestao = '$vlr'";
        $pedido .= ($count > 1)?" or":"";
        $count--;
    }
}else{
    echo"
		<script type=\"text/javascript\">
		alert('Nao foram selecionados pedidos');
		history.go(-2);
		</script>
	";
}
$login = $_POST["operador"];

include "../conexao.php";
$sql="SELECT * FROM tp.usuarios WHERE login = '$login';";

$consulta = mysql_query($sql);
$dado=mysql_fetch_assoc($consulta);

$nome = $dado["nome"];
$turno = $dado["turno"];
$sql_consulta="UPDATE base_gestao 
               SET  fila = 2,
                    status_tp= 1, 
                    usuario ='$login', 
                    nome2 = '$nome', 
                    tramite = 'Tratando',
                    turno='$turno', 
                    disc_status_tp = 'Aberto'
               WHERE $pedido;";

$tempo = 0;
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
$data_dia= date("y/m/d"); 
//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario
$sql_verifca = "$sql_consulta";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());
if(mysql_affected_rows() > 0){
    $n = (mysql_affected_rows() > 1)?'s':'';
    echo "<script type=\"text/javascript\">
        alert('Pedido$n encaminhado$n com sucesso!');
        history.go(-2);
        </script>";
    exit;
}else{
    echo "<script type=\"text/javascript\">
        alert('Nenhum pedido foi encontrado!');
        history.back();
        </script>";
}
?>