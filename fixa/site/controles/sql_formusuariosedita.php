<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("../fixa/site/funcoes/f_geral.php");


require_once '../fixa/site/classes/cripto.php';

$cripto = new cripto();

$id_usuario_logado = $_POST['idl'];
$id_usuario= $_GET['id'];
$id_usuario = $cripto->decodificar($id_usuario);


if(empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['perfil']) || empty($_POST['supervisor']) || empty($_POST['turno'])|| empty($_POST['projeto']))
{
  echo" <script> 
          alert('Por favor preencher todos os campos obrigatórios !');
          history.back();
        </script>
        "; 
        exit();   
}


//validaCpf
validaCpf($_POST['cpf'], $id_usuario);


//verifica se usuario atualizado é supervisor
$query_verifica_perfil = mysql_query("SELECT * FROM usuario WHERE id_usuario = '$id_usuario' and id_perfil = 3 ");

if(mysql_affected_rows() > 0){
    atualizaSupervisor($_POST['perfil'], $_POST['nome'], $_POST['cpf'], $id_usuario);
}

//cria novo supervisor
if(mysql_affected_rows() == 0 and $_POST['perfil'] == 3)
{
  criaNovoSupervisor($_POST['nome'], $_POST['cpf'] , $id_usuario);
}

if(isset($_POST['e2e'])){
  $e2e = "S";
}else{
  $e2e = "N";
};

//atualiza informaçoes
$sql_insere="UPDATE usuario
              SET 
                nome      = '{$_POST['nome']}'
                ,cpf       = '{$_POST['cpf']}'
                ,id_perfil = '{$_POST['perfil']}'
                ,id_turno  = '{$_POST['turno']}'
                ,id_supervisor  = '{$_POST['supervisor']}'
                ,projeto  = '{$_POST['projeto']}'
                ,e2e = '$e2e'
              WHERE id_usuario = $id_usuario";


 $acao_insere= mysql_query($sql_insere) or die (mysql_error());
   
        
echo" <script> 
      alert('Cadastro atualizado com sucesso!');
      document.location.href='principal.php?id=" . $id_usuario_logado . "&t=views/home.php'
      </script>
      ";                                        
    exit();  
    
?>