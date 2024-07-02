<?php 
class Supervisor extends Usuario{




		function atualizaSupervisor($perfil_post, $nome_post, $cpf_post,  $idusuario)
		{

			//busca informacoes supervisor
			$buscaInfoSup = mysql_query("SELECT id_supervisor FROM supervisor WHERE id_usuario = '$idusuario'");

			while($row_data=mysql_fetch_array($buscaInfoSup))
			{ 
				$id_supervisor  = $row_data['id_supervisor'];
			}

			//atualiza informações caso usuario deixe de ser supervisor
			if($perfil_post != 3){

			//usuario que respodiam a supervisor removido ficam o status de supervisor não informado
			$sql_atualiza_dados = "UPDATE usuario SET id_supervisor = 1  WHERE id_supervisor = $id_supervisor";

			$executa_query= mysql_query($sql_atualiza_dados) or die (mysql_error());

			//deleta supervisor da tabela de supervisores
			$sql_atualiza_dados_sup = "DELETE FROM supervisor WHERE id_supervisor = $id_supervisor";
			$executa_query_sup= mysql_query($sql_atualiza_dados_sup) or die (mysql_error());
			}else{

			$sql_atualiza_supervisor = "UPDATE Supervisor
			                       SET 
			                          nome = '$nome_post' 
			                          ,cpf  = '$cpf_post'
			                      WHERE id_usuario = $idusuario";  

			$acao_insere_sup= mysql_query($sql_atualiza_supervisor) or die (mysql_error());
			}                         
		}

  function criaNovoSupervisor($nome_post, $cpf_post, $idusuario){

      $sql_insere_supervisor = ("INSERT INTO Supervisor(nome, cpf, id_usuario)
                                VALUES('$nome_post', '$cpf_post', $idusuario)");

       $executa_query_sup= mysql_query($sql_insere_supervisor) or die (mysql_error());
  }


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
}	

?>