<?php
class Sistema 
{
    public $usuarios;
 
    public function Sistema()
    {
        $usuarios = array();
    }

    //Adiciona usuarios a sistema
    public function addUsuario($novoUsuario)
    {
        $this->usuarios[] = $novoUsuario;
    }


     //Mostra todos os contatos com foreach
    public function mostraContatos1()
    {
        foreach($this->usuarios as $obj){
            echo "Nome: {$obj->nome}<br/>
                  Telefone: {$obj->cpf}<br/>
                  Email: {$obj->perfil}<br/>
                  -----------------<br/>";
        }
    }

    function buscaTodosUsuarios($id_usuario_logado)
    {
        $buscaSolicitacoesUsuariosBySupervisor = mysql_query("SELECT * FROM v_geral_usuario_info 
                                                        WHERE id_perfil in (6,12,13) 
                                                              UNION SELECT * FROM v_geral_usuario_info WHERE id_usuario = $id_usuario_logado   
                                                  ORDER BY perfil ");

        while($row_sup=mysql_fetch_array($buscaSolicitacoesUsuariosBySupervisor))
        {  
            $usuario = new Usuario('','','','','');
            $usuario->idusuario     = $row_sup['id_usuario'];
            $usuario->nome          = $row_sup['nome'];
            $usuario->cpf           = $row_sup['cpf'];
            $usuario->perfil        = $row_sup['perfil'];
            $usuario->projeto       = $row_sup['projeto'];
            $usuario->turno         = $row_sup['turno'];
            $usuario->supervisor    = $row_sup['supervisor'];
            $usuario->data_cadastro = $row_sup['data_cadastro'];
            $usuario->status        = $row_sup['id_status'];

            $this->addUsuario($usuario);
        }

        return $this->usuarios;      
    }
}
?>