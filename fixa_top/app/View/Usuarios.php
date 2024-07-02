<body onload="iniciaPaginacao();">
<?php
$id_usuario_logado = $_GET['id'];
?>
<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/Usuario.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/Sistema.php");
?>
<p>
  <form action="principal.php?&t=View/AddUsuario.php" method="POST">
    <input 
        name="novousuario" 
        type="submit" 
        value="Novo Usuário" 
        class="sb2 bradius"
    />
    <input type="hidden" name="id_usuario_logado" value="<?php echo $id_usuario_logado;?>">
  </form>
</p>

<?php
$obj = new Sistema();
$obj->buscaTodosUsuarios($cripto->decodificar($id_usuario_logado));
?>
     <div id="wrapper" class="table_usuarios">    
      <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
         <thead>
              <tr>
                <th><span style="margin-left: -20px;">Nome</span></th>
                <th><span style="margin-left: -20px;">CPF</span></th>
                <th><span style="margin-left: -20px;">Perfil</span></th>
                <th><span style="margin-left: -20px;">Area</span></th>
                <th><span style="margin-left: -20px;">Turno</span></th>
                <th><span style="margin-left: -20px;">Supervisor</span></th>
                <th><span style="margin-left: -20px;">Data Cadastro</span></th>
                <th style="width: 5%;"><span style="margin-left: -20px;">Operação</span></th>
              </tr>
          </thead>
          <tbody>
          <?php foreach($obj->usuarios as $obj){?> 
         <tr>
            <td><?php echo $obj->nome ?></td>
            <td><?php echo $obj->cpf ?></td>
            <td><?php echo $obj->perfil?></td> 
            <td><?php echo $obj->projeto?></td> 
            <td><?php echo $obj->turno?></td> 
            <td><?php echo $obj->supervisor ?></td> 
            <td><?php echo $obj->data_cadastro ?></td> 
            <td><a id="td" href="principal.php?&idl=<?php echo $id_usuario_logado?>&id=<?php echo $cripto->codificar($obj->idusuario)?>&t=View/EditUsuario.php">
                  <?php echo "Editar"; ?>
                </a>&nbsp;
                <a id="td" href="principal.php?&idl=<?php echo $id_usuario_logado?>&id=<?php echo $cripto->codificar($obj->idusuario) ?>&t=Controller/sql_formusuariosreset.php">
                  <?php echo "Resetar"; ?>
                </a>&nbsp;
                <!-- check status-->
                <?php if ($obj->status == 2) {?>
                    <a id="td" href="principal.php?&idl=<?php echo $id_usuario_logado?>&id=<?php echo $cripto->codificar($obj->idusuario) ?>&t=Controller/sql_formusuariosdesativar.php"><?php echo "Desativar"; ?></a>&nbsp; 
                <?php } else {?>
                    <a id="td" href="principal.php?&idl=<?php echo $id_usuario_logado?>&id=<?php echo $cripto->codificar($obj->idusuario) ?>&t=Controller/sql_formusuariosativar.php"><?php echo "Ativar"; ?></a>
                <?php } ?>

                <?php if ($id_usuario_logado == 1){ ?>
                  <a id="td" href="principal.php?&idl=<?php echo $id_usuario_logado?>&id=<?php echo $cripto->codificar($obj->idusuario) ?>&t=Controller/sql_deletar_usuario.php"><?php echo "Deletar"; ?></a>
                <?php } ?>
              </td>  
         </tr>
         <?php } ?>
       </tbody>
    </table>
  </div>
</body>
