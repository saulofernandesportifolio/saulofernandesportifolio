<?php 
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/Usuario.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/bd.php");

$id_usuario_logado = isset($_POST['id_usuario_logado']) ? $_POST['id_usuario_logado'] : ''; 
$nome              = isset($_POST['nome']) ? $_POST['nome'] : ''; 
$cpf               = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$perfil            = isset($_POST['perfil']) ? $_POST['perfil'] : ''; 
$supervisor        = isset($_POST['supervisor']) ? $_POST['supervisor'] : '';
$turno             = isset($_POST['turno']) ? $_POST['turno'] : '';
$id_usuario        = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';    

if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereNovoUsuario': 
        { 
          echo insertNewUser($cripto, $nome, $cpf, $perfil, $supervisor, $turno, $id_usuario_logado); 
          break; 
        }
        case 'buscaSuperior': 
        { 
          echo getSuperior(); 
          break; 
        }
        case 'editarNovoUsuario': 
        { 
         
          echo editNewUser($cripto, $nome, $cpf, $perfil, $supervisor, $turno, $id_usuario_logado, $id_usuario); 
          break; 
        }
    } 
} 



function insertNewUser(cripto $cripto, $nome, $cpf, $perfil, $supervisor, $turno, $id_usuario_logado)
{
        $id_usuario_logado = $cripto->decodificar($id_usuario_logado);
   
        if(empty($nome) || empty($cpf) || empty($perfil) || empty($supervisor) || ($supervisor == 'Selecione o supervisor') || empty($turno))
        {
          echo" <script> 
                  alert('Por favor preencher todos os campos obrigatórios !');
                  history.back();
                </script>
                "; 
                exit();   
        }

        //cria objeto usuario
        $usuario = new Usuario($nome, $cpf, $perfil, $turno, $supervisor);

        //valida cpf
        if($usuario->validaCpf_($cpf, $id_usuario)==1)
        {
          echo" <script> 
                  alert('CPF já cadastrado na base de dados !');
                  history.back();
                </script>
                "; 
              exit();   
        }

        $usuario->addUsuario($usuario, $id_usuario_logado);

        if($perfil == 3)
        {
        	$usuario->addSupervisor($usuario);
        }

        echo" <script> 
              alert('Cadastro efetuado com sucesso!');
                document.location.href='principal.php?id=" . $cripto->codificar($id_usuario_logado) . "&t=View/home.php'      
              </script>
              ";                                        
            exit();  
        
}

function getSuperior()
{
    //cria objeto usuario
    $usuario = new Usuario('', '', '', '', '');

    echo json_encode($usuario->getSuperior());
}


function editNewUser($cripto, $nome, $cpf, $perfil, $supervisor, $turno, $id_usuario_logado, $id_usuario)
{
    $id_usuario_logado = $cripto->decodificar($id_usuario_logado);
    $id_usuario = $cripto->decodificar($id_usuario);
   
    if(empty($nome) || empty($cpf) || empty($perfil) || empty($supervisor) || ($supervisor == 'Selecione o supervisor') || empty($turno))
    {
      echo" <script> 
              alert('Por favor preencher todos os campos obrigatórios !');
              history.back();
            </script>
            "; 
            exit();   
    }

    //cria objeto usuario
    $usuario = new Usuario($nome, $cpf, $perfil, $turno, $supervisor);

    if($usuario->validaCpf_($usuario->cpf, $id_usuario)==1)
    {
         echo" <script> 
                alert('CPF já cadastrado na base de dados !');
                history.back();
              </script>
              "; 
            exit();   
    }


     $usuario->EditUsuario($usuario, $id_usuario);

      if($perfil == 3)
      {
        $usuario->addSupervisor($usuario);
      }

      echo" <script> 
            alert('Atualização efetuada com sucesso!');
              document.location.href='principal.php?id=" . $cripto->codificar($id_usuario_logado) . "&t=View/home.php'      
            </script>
            ";                                        
          exit();  


} 
?>
