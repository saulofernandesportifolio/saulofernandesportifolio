<body onload="iniciaPaginacao();">
<?php
require_once '../fixa_top/app/Model/cripto.php';

$cripto = new cripto();

$id_usuario_logado = $_GET['id'];

$id_usuario_logado = $cripto->decodificar($id_usuario_logado);

?>

<p>
  <input 
      name="novousuario" 
      type="button" 
      value="Novo Usuário" 
      class="sb2 bradius" 
      onClick="window.location='principal.php?id=<?php echo $cripto->codificar($id_usuario_logado)?>&t=View/formusuarios.php'"
  />
</p>
<?php
$buscaSolicitacoesUsuariosBySupervisor = mysql_query("SELECT * FROM v_geral_usuario_info 
                                                        WHERE id_perfil not in(1,2,10) 
                                                              AND id_supervisor in  (
                                                                SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario_logado
                                                                UNION  
                                                                SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario_logado AND id_perfil in(4) 
                                                              )UNION SELECT * FROM v_geral_usuario_info WHERE id_usuario = $id_usuario_logado   
                                                  ORDER BY perfil ");

    if(mysql_affected_rows() > 0)
    {?>
     <div id="wrapper" class="table_usuarios">    
      <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
         <thead>
              <tr>
                <th><span style="margin-left: -20px;">Nome</span></th>
                <th><span style="margin-left: -20px;">CPF</span></th>
                <th style="width: 3%;"><span style="margin-left: -20px;">Perfil</span></th>
                <th><span style="margin-left: -20px;">Area</span></th>
                <th><span style="margin-left: -20px;">Turno</span></th>
                <th><span style="margin-left: -20px;">Supervisor</span></th>
                <th><span style="margin-left: -20px;">Data Cadastro</span></th>
                <th><span style="margin-left: -20px;">E2E</span></th>
                <th style="width: 5%;"><span style="margin-left: -20px;">Operação</span></th>
              </tr>
          </thead>
          <tbody> 
    <?php  
    while($rowsSolicitacaoUsuario=mysql_fetch_array($buscaSolicitacoesUsuariosBySupervisor)){
      $id_usuario = $rowsSolicitacaoUsuario['id_usuario'];
      ?>

       <tr>
          <td><?php echo $rowsSolicitacaoUsuario['nome'];?></td>
          <td><?php echo $rowsSolicitacaoUsuario['cpf'];?></td>
          <td><?php echo $rowsSolicitacaoUsuario['perfil'];?></td> 
          <td><?php echo $rowsSolicitacaoUsuario['projeto'];?></td> 
          <td><?php echo $rowsSolicitacaoUsuario['turno'];?></td> 
          <td><?php echo $rowsSolicitacaoUsuario['supervisor'];?></td> 
          <td><?php echo $data_tratamento2 =substr($rowsSolicitacaoUsuario['data_cadastro'],8,2).substr($rowsSolicitacaoUsuario['data_cadastro'],4,4).substr($rowsSolicitacaoUsuario['data_cadastro'],0,4); ?></td> 
          <td><?php echo $rowsSolicitacaoUsuario['e2e']; ?></td> 
          <td><a id="td" href="principal.php?&idl=<?php echo $cripto->codificar($id_usuario_logado)?>&id=<?php echo $cripto->codificar($id_usuario)?>&t=View/formusuariosedita.php">
                <?php echo "Editar"; ?>
              </a>&nbsp;
              <a id="td" href="principal.php?&idl=<?php echo $cripto->codificar($id_usuario_logado)?>&id=<?php echo $cripto->codificar($id_usuario) ?>&t=controles/sql_formusuariosreset.php">
                <?php echo "Resetar"; ?>
              </a>&nbsp;
              <!-- check status-->
              <?php if ($rowsSolicitacaoUsuario['id_status'] == 2) {?>
                  <a id="td" href="principal.php?&idl=<?php echo $cripto->codificar($id_usuario_logado)?>&id=<?php echo $cripto->codificar($id_usuario) ?>&t=controles/sql_formusuariosdesativar.php"><?php echo "Desativar"; ?></a>&nbsp; 
              <?php } else {?>
                  <a id="td" href="principal.php?&idl=<?php echo $cripto->codificar($id_usuario_logado)?>&id=<?php echo $cripto->codificar($id_usuario) ?>&t=controles/sql_formusuariosativar.php"><?php echo "Ativar"; ?></a>
              <?php } ?>

              <?php if ($id_usuario_logado == 1){ ?>
                <a id="td" href="principal.php?&idl=<?php echo $cripto->codificar($id_usuario_logado)?>&id=<?php echo $cripto->codificar($id_usuario) ?>&t=controles/sql_deletar_usuario.php"><?php echo "Deletar"; ?></a>
              <?php } ?>
            </td>  
       </tr>
    <?php } ?>
      </tbody>
    </table>
  <?php } ?>
  </div>
</body>
