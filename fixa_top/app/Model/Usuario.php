<?php

class Usuario 
{
    public $idusuario;
    public $nome;
    public $cpf;
    public $perfil;
    public $turno;
    public $supervisor;
    public $data_cadastro;
    public $status;

    function __construct($nome, $cpf, $perfil, $turno, $supervisor) 
    {
       $this->nome = $nome;
       $this->cpf = $cpf;
       $this->perfil = $perfil;
       $this->turno = $turno;
       $this->supervisor = $supervisor;
    }

    function addUsuario(Usuario $usuario, $id_usuario_criador)
    {
        $data_cadastro=date("Y-m-d");
        $usuario->data_cadastro = $data_cadastro;

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
                                          projeto
                                        )
                                       VALUES(
                                        '$usuario->nome',
                                        'empreza',
                                        '$usuario->cpf',
                                        '$usuario->perfil',
                                        '$usuario->supervisor',
                                        '$usuario->data_cadastro',                                                                                                 
                                        2,
                                        '$usuario->turno',
                                        '$id_usuario_criador',
                                        'Dados'
                                      )";
                      
          $acao_insere= mysql_query($sql_insere) or die (mysql_error());
    }

    function addSupervisor(Usuario $usuario)
    {
        $checkSupInfo = mysql_query("SELECT id_usuario FROM usuario WHERE cpf = '$usuario->cpf'");

        while($row_sup=mysql_fetch_array($checkSupInfo))
        { 
            $id_usuario_inserido = $row_sup['id_usuario'];
            $perfil   = $row_sup['id_perfil'];
        }

        if($perfil == 3)
        {
          $sql_insere_supervisor = "UPDATE Supervisor 
                                    SET nome = '$usuario->nome', cpf = '$usuario->cpf')
                                    where id_usuario = '$id_usuario_inserido'";
        }
        else
        {
            $sql_insere_supervisor = "INSERT INTO Supervisor(nome, cpf, id_usuario, projeto)
                                    VALUES('$usuario->nome', '$usuario->cpf', '$id_usuario_inserido', 'Dados')";
        }
      

        $acao_insere= mysql_query($sql_insere_supervisor) or die (mysql_error());                            
    }

    function validaCpf($cpf){
          $query_valida_cpf = mysql_query("SELECT * FROM usuario WHERE cpf = '$cpf'");
           
          if(mysql_affected_rows() > 0)
          {
              return true;
          } 
    }

    function buscaTodosUsuarios($id_usuario_logado, Sistema $sistema){
        $buscaSolicitacoesUsuariosBySupervisor = mysql_query("SELECT * FROM v_geral_usuario_info 
                                                        WHERE id_perfil in (3,4,6,12) 
                                                              AND id_supervisor in  (
                                                                SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario_logado
                                                                UNION  
                                                                SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario_logado AND id_perfil in(4) 
                                                              )UNION SELECT * FROM v_geral_usuario_info WHERE id_usuario = $id_usuario_logado   
                                                  ORDER BY perfil ");

        while($row_sup=mysql_fetch_array($buscaSolicitacoesUsuariosBySupervisor))
        {  
            $this->idusuario    = $row_sup['id_usuario'];
            $this->nome          = $row_sup['nome'];
            $this->cpf           = $row_sup['cpf'];
            $this->perfil        = $row_sup['perfil'];
            $this->projeto       = $row_sup['projeto'];
            $this->turno         = $row_sup['turno'];
            $this->supervisor    = $row_sup['supervisor'];
            $this->data_cadastro = $row_sup['data_cadastro'];
            $this->status        = $row_sup['id_status'];

            $sistema->addUsuario($this);
        }

        return $sistema;      
    }

    function getSuperior()
    {

          $sql  = mysql_query("SELECT 
                                id_supervisor, 
                                nome
                              FROM supervisor
                              WHERE id_supervisor not in (1,2)
                              ORDER BY nome");

        while($fetch  = mysql_fetch_array($sql))
        {
            $output[]  = array (
                $fetch[0], //id_supervisor, 
                $fetch[1]  //nome,
            );
        }

        return $output;
    }


    function validaCpf_($cpf_usuario, $idusuario){

        //busca cpf
        $checkInfo = mysql_query("SELECT cpf FROM usuario WHERE id_usuario = '$idusuario'");

        while($row_user=mysql_fetch_array($checkInfo)){ 
           $cpf  = $row_user['cpf'];
        }

        //verifica se usuario alterou cpf
        if($cpf_usuario != $cpf){

            //valida cpf novo
            $query_valida_cpf = mysql_query("SELECT cpf FROM usuario WHERE cpf = '$cpf_usuario'");

            if(mysql_affected_rows() > 0){
                return true;
            }
        }
    }

    function EditUsuario(Usuario $usuario, $idusuario)
    {
        //atualiza informaçoes
        $sql_insere="UPDATE usuario
                SET 
                  nome      = '{$usuario->nome}'
                  ,cpf       = '{$usuario->cpf}'
                  ,id_perfil = '{$usuario->perfil}'
                  ,id_turno  = '{$usuario->turno}'
                  ,id_supervisor  = '{$usuario->supervisor}'
                WHERE id_usuario = $idusuario";

          $acao_insere= mysql_query($sql_insere) or die (mysql_error());
     }         
}
?>