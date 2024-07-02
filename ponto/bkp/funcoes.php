<?php

function salva_horario_entrada($usuario)
{
    include "abreconexao.php";

    $hora = date('H:i');

    $sql = "INSERT INTO controle_horarios (entrada) 
          VALUES (" . $hora . ") 
          WHERE nome='" . $usuario;
}

function salva_horario_saida($usuario)
{
    include "abreconexao.php";

    $hora = date('H:i');

    $sql = "INSERT INTO controle_horarios (saida) 
          VALUES (" . $hora . ") 
          WHERE nome='" . $usuario;
}

function salva_intervalo_entrada($usuario)
{
    include "abreconexao.php";

    $hora = date('H:i');

    $sql = "INSERT INTO controle_intervalos(entrada) 
          VALUES (" . $hora . ") 
          WHERE nome='" . $usuario;
}

function salva_intervalo_saida($usuario)
{
    include "abreconexao.php";

    $hora = date('H:i');

    $sql = "INSERT INTO controle_intervalos (saida) 
          VALUES (" . $hora . ") 
          WHERE nome='" . $usuario;
}

?>