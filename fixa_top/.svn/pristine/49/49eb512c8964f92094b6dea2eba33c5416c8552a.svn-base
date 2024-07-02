<?php

$protocolo       = $_POST['protocolo_chamado'];
$usuario_chamado = $_POST['usuario_chamado'];
$revisao         = $_POST['revisao'];
$situacao        = $_POST['situacao'];
$nro_chamado     = $_POST['nro_chamado'];

?>


<div id="wrapper">
    <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
        <caption>Histórico</caption>
        <thead>
          <tr>
            <th><span>Solicitação</span></th>
            <th><span>Data</span></th>
            <th><span>Usuário</span></th>  
            <th><span>Status</span></th>  
            <th><span>Nº Chamado</span></th>
            <th><span>Sistemas</span></th>
            <th><span>Motivo Devolução</span></th>
            <th><span>Descrição motivo</span></th>
            <th><span>Obs</span></th>
            <th><span>Parecer TI</span></th>
            <th><span>Data Retorno TI</span></th>
          </tr>
        </thead>
        <tbody>
        <?php
           $buscaChamadoExistente = mysql_query("SELECT 
                                                  c.id_solicitacao,                      
                                                  c.nro_chamado,                         
                                                  c.sistema,                             
                                                  c.motivo_devolucao,                    
                                                  c.descricao_motivo_devolucao,          
                                                  s.descricao AS status,                              
                                                  date_format(c.reg_data,'%d/%m/%Y %H:%i:%s') AS reg_data,                             
                                                  c.reg_usuario,                         
                                                  c.revisao,                             
                                                  c.obs,                                 
                                                  c.parecer_ti,                          
                                                  c.data_retorno_ti,
                                                  u.nome  
                                              FROM chamados c
                                                INNER JOIN status_solicitacao s ON c.status = s.id_status_solicitacao
                                                INNER JOIN usuario u ON c.reg_usuario = u.id_usuario 
                                                      WHERE c.id_solicitacao = '$protocolo' 
                                                        AND c.revisao = $revisao
                                                        AND c.nro_chamado = '$nro_chamado'
                                                ");

            if(mysql_affected_rows() > 0)
            {
                   while($rowsChamado=mysql_fetch_array($buscaChamadoExistente))
                   { 
                    ?>
                    <tr>
                        <td><?php echo $rowsChamado['id_solicitacao']?></td>
                        <td><?php echo $rowsChamado['reg_data']?></td>
                        <td><?php echo $rowsChamado['nome']?></td> 
                        <td><?php echo $rowsChamado['status']?></td>  
                        <td><?php echo $rowsChamado['nro_chamado']?></td>
                        <td><?php echo $rowsChamado['sistema']?></td>
                        <td><?php echo $rowsChamado['motivo_devolucao']?></td>
                        <td><?php echo $rowsChamado['descricao_motivo_devolucao']?></td>
                        <td><?php echo $rowsChamado['obs']?></td>
                        <td><?php echo $rowsChamado['parecer_ti']?></td>
                        <td><?php echo $rowsChamado['data_retorno_ti']?></td>
                    </tr>
                <?php
               }
            } 
            ?>
        </tbody>
    </table>
    <br/>
     <table id="keywords" class="sortable" cellspacing="0" cellpadding="0" style="width: 44%;">
        <caption>Interações</caption>
        <thead>
          <tr>
            <th><span>Data</span></th>
            <th><span>Usuário</span></th>
            <th><span>Comentário</span></th>  
          </tr>
        </thead>
        <tbody id="rowChamadoHistoricoInteracoes">
            <?php
           $buscaChamadoExistente = mysql_query("SELECT                         
                                                  date_format(cc.reg_data,'%d/%m/%Y') AS reg_data,                            
                                                  u.nome,                         
                                                  cc.comentario
                                              FROM chamado_comentarios cc
                                                    INNER JOIN usuario u ON cc.reg_usuario = u.id_usuario
                                                      WHERE cc.solicitacao = '$protocolo' 
                                                        AND cc.revisao = $revisao
                                                        AND cc.chamado = '$nro_chamado'
                                                ");

            if(mysql_affected_rows() > 0)
            {
               while($rowsChamado=mysql_fetch_array($buscaChamadoExistente))
               { 
                ?>
                    <tr>
                        <td><?php echo $rowsChamado['reg_data']?></td>
                        <td><?php echo $rowsChamado['nome']?></td>
                        <td><?php echo $rowsChamado['comentario']?></td>  
                    </tr>
                <?php
               }
            } 
            ?>
        </tbody>
    </table>
   </div> 