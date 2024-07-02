<?php

include "abreconexao.php";


//DECLARA VARIAVEIS

$hora = date('H:i');
$data = date('Y/m/d');
$data_hora = date("Y/m/d H:i:s");
$usuario = $_POST['usuario'];
$val = $_POST['acao'];

//VALIDA SE USUARIO JA ESTÁ NA PLANILHA

$sql = "SELECT * ";
$sql .="FROM registro_ponto ";
$sql .="WHERE (usuario = '$usuario') ";
$sql .="ORDER BY data_entrada DESC";
$sql .="LIMIT 1";

$res = mysql_query($sql) or die(mysql_error());

while ($linha = mysql_fetch_assoc($res)) {
    $id = $linha["id"];
    $nome = $linha["nome"];
    $usuario = $linha["usuario"];
    $data_entrada = $linha["data_entrada"];

    if ($data_entrada == $data)
        $vreg = true;
    else
        $vreg = false;
}

//VALIDAÇÃO DE SOLICITAÇÃO

if($vreg===false)

    //IMPORTA NOME DE USUARIO
    $sql = "SELECT nome ";
    $sql .="FROM usuarios ";
    $sql .="WHERE (login = '$usuario') ";
    $sql .="LIMIT 1";

    $res = mysql_query($sql) or die(mysql_error());

    $nome=($res);

    if($val=='entrada')
        $sql = "SELECT usuario, nome ";
        $sql .="FROM registro_ponto ";
        $sql .="WHERE (usuario = '$usuario') ";
        $sql .="GROUP BY usuario";
    
        $res = mysql_query($sql) or die(mysql_error());
        
        while ($linha = mysql_fetch_assoc($res)) {
            $id = $linha["id"];
            $nome = $linha["nome"];
            $usuario = $linha["usuario"];
            $data_entrada = $linha["data_entrada"];
        
            mysql_query("INSERT INTO registro_ponto (usuario, nome, data_entrada) 
                         VALUES ($usuario, $nome, $data_entrada)");
        }

//SALVA HORARIO
    if ($val == 'entrada') 
	{
        $sql = "UPDATE registro_ponto (usuario, data_entrada, hora_entrada, classificacao) 
                SET ('" . $usuario . "', #" . $data . "#, #" . $hora . "#, 'expediente')";
    }
    if ($val == 'inicio_int') {
        $sql = "UPDATE registro_ponto (usuario, data_entrada, hora_entrada, classificacao) 
                SET ('" . $usuario . "', #" . $data . "#, #" . $hora . "#, 'intervalo_manha')";
                SET ('" . $usuario . "', #" . $data . "#, #" . $hora . "#, 'intervalo_tarde')";
    } 
    elseif ($val == 'fim_int') {
        $sql = "UPDATE registro_ponto (usuario, data_entrada, hora_entrada, classificacao) 
                SET ('" . $usuario . "', #" . $data . "#, #" . $hora . "#, 'intervalo_tarde')";
    } 
    elseif ($val == 'saida') {
        $sql = "UPDATE registro_ponto (usuario, data_entrada, hora_entrada, classificacao) 
                SET ('" . $usuario . "', #" . $data . "#, #" . $hora . "#, 'expediente')";
    }
    echo "<script>alert('Bom dia!\nSeu horario foi registrado com sucesso.'); window.top.close('frame.php','Toolbar'); </script>\n";
    exit;
?>