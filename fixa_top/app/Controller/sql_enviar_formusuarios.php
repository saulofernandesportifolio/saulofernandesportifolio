<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("../fixa_top/bd.php");

$tempo = 0;

set_time_limit($tempo);
date_default_timezone_set("Brazil/East");

$data_cadastro=date("Y-m-d");

require_once '../fixa_top/app/Model/cripto.php';

$cripto = new cripto();

$id_usuario= $_GET['id'];

$id_usuario = $cripto->decodificar($id_usuario);

if(empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['perfil']) || empty($_POST['supervisor']) || empty($_POST['turno']) || empty($_POST['projeto']))
{
  echo" <script> 
          alert('Por favor preencher todos os campos obrigatórios !');
          history.back();
        </script>
        "; 
        exit();   
}

//valida cpf
$query_valida_cpf = mysql_query("SELECT * FROM usuario WHERE cpf = '{$_POST['cpf']}'");


if(mysql_affected_rows() > 0){
  echo" <script> 
          alert('CPF já cadastrado na base de dados !');
          history.back();
        </script>
        "; 
      exit();   
}

if(isset($_POST['e2e'])){
  $e2e = "S";
}else{
  $e2e = "N";
};

  $sql_insere="INSERT INTO usuario(
                                  nome,
                                  senha,
                                  cpf,
                                  id_perfil,
                                  id_supervisor,
                                  data_cadastro,
                                  id_status,
                                  id_turno,
                                  id_criador,
                                  projeto,
                                  e2e
                                )
                               VALUES(
                                '{$_POST['nome']}',
                                'empreza',
                                '{$_POST['cpf']}',
                                '{$_POST['perfil']}',
                                '{$_POST['supervisor']}',
                                '$data_cadastro',                                                                                                      
                                2,
                                {$_POST['turno']},
                                $id_usuario,
                               '{$_POST['projeto']}',
                                '$e2e'
                              )";
                      
     $acao_insere= mysql_query($sql_insere) or die (mysql_error());


//insere id_usuario inserido na tabela supervisor
$checkSupInfo = mysql_query("SELECT id_usuario FROM usuario WHERE cpf = '{$_POST['cpf']}'");

while($row_sup=mysql_fetch_array($checkSupInfo)){ 
    $id_usuario_inserido = $row_sup['id_usuario'];
}


if($_POST['perfil'] == 3){
        $sql_insere_supervisor = "INSERT INTO Supervisor(nome, cpf, id_usuario, projeto)
                                    VALUES('{$_POST['nome']}','{$_POST['cpf']}', $id_usuario_inserido, '{$_POST['projeto']}')";

        $acao_insere= mysql_query($sql_insere_supervisor) or die (mysql_error());                            
}
 
$idusuario = $cripto->codificar($id_usuario);
        
echo" <script> 
      alert('Cadastro efetuado com sucesso!');
        document.location.href='principal.php?id=" . $cripto->codificar($id_usuario) . "&t=View/home.php'      
      </script>
      ";                                        
    exit();  
?>