<body onload="iniciaPaginacao();">

     <div id="wrapper" class="table_usuarios">    
      <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
         <thead>
              <tr>
                <th><span>Siscom/Solicitação</span></th>
                <th><span>Dt Entrada Siscom</span></th>
                <th><span>Dt Importação</span></th>
                <th><span>Dt Distribuição T</span></th>
                <th><span>Dt Finalização T</span></th>
                <th><span>Dias Tratativa T</span></th>
                <th><span>SLA T</span></th>
                <th><span>Data Início A</span></th>
                <th><span>Data Distrib. A</span></th>
                <th><span>Data Finaliz. A</span></th>
                <th><span>Dias Tratativa A</span></th>
                <th><span>SLA A</span></th>
                <th><span>Usuário T</span></th>
                <th><span>Canal Entrada</span></th>
                <th><span>Produto</span></th>
                <th><span>Serviço</span></th>
                <th><span>Complemento Serviço</span></th>
                <th><span>Qtde Acessos</span></th>
                <th><span>CNPJ</span></th>
                <th><span>Razão Social</span></th>
                <th><span>Obs T</span></th>
                <th><span>Oportunidade</span></th>
                <th><span>Proposta</span></th>
                <th><span>Motivo Devolução T</span></th>
                <th><span>Descrição Motivo Devolução T</span></th>
                <th><span>Data Devolução T</span></th>
                <th><span>Status T</span></th>
                <th><span>Usuário A</span></th>
                <th><span>Obs A</span></th>
                <th><span>Status A</span></th>
                <th><span>Motivo Devolução A</span></th>
                <th><span>Descrição Motivo Devolução A</span></th>
                <th><span>Data Devolução A</span></th>
                <th><span>Revisão</span></th>
                <th><span>Origem</span></th>
              </tr>
          </thead>
          <tbody>
          <?php
            $relatorio_consolidado=mysql_query("CALL SP_CONSOLIDADO_REPORT('06')");

             while($rc=mysql_fetch_array($relatorio_consolidado)){         
          ?>
         <tr>
            <td><?php echo $rc['siscom']; ?></td>
            <td><?php echo $rc['data_entrada_siscom']; ?></td>
            <td><?php echo $rc['data_importacao']; ?></td>
            <td><?php echo $rc['data_distribuicao']; ?></td> 
            <td><?php echo $rc['data_finalizacao_tramitacao']; ?></td> 
            <td><?php echo $rc['numero_dias_tratativa_tramitacao']; ?></td> 
            <td><?php echo $rc['sla_tramitacao']; ?></td> 
            <td><?php echo $rc['data_inicio_aprovacao']; ?></td>
            <td><?php echo $rc['data_distribuicao_aprovacao']; ?></td> 
            <td><?php echo $rc['data_finalizacao_aprovacao']; ?></td> 
            <td><?php echo $rc['numero_dias_tratativa_aprovacao']; ?></td> 
            <td><?php echo $rc['sla_aprovacao']; ?></td> 
            <td><?php echo $rc['usuario_tramitacao']; ?></td>
            <td><?php echo $rc['canal_entrada']; ?></td>  
            <td><?php echo $rc['produto']; ?></td>  
            <td><?php echo $rc['servico']; ?></td>  
            <td><?php echo $rc['complemento_servico']; ?></td>  
            <td><?php echo $rc['quantidade_acessos']; ?></td>
            <td><?php echo $rc['cnpj']; ?></td>  
            <td><?php echo $rc['razao_social']; ?></td>  
            <td><?php echo $rc['obs_tramitacao']; ?></td>
            <td><?php echo $rc['oportunidade']; ?></td>
            <td><?php echo $rc['proposta']; ?></td>   
            <td><?php echo $rc['escritorio_gn']; ?></td>   
            <td><?php echo $rc['motivo_devolucao_tramitacao']; ?></td>
            <td><?php echo $rc['descricao_motivo_devolucao_tramitacao']; ?></td>
            <td><?php echo $rc['data_devolucao_tramitacao']; ?></td>
            <td><?php echo $rc['status_tramitacao']; ?></td>  
            <td><?php echo $rc['usuario_aprovacao']; ?></td>  
            <td><?php echo $rc['obs_aprovacao']; ?></td>  
            <td><?php echo $rc['status_aprovacao']; ?></td>  
            <td><?php echo $rc['motivo_devolucao_aprovacao']; ?></td>
            <td><?php echo $rc['complemento_motivo_devolucao_aprovacao']; ?></td>  
            <td><?php echo $rc['revisao']; ?></td>  
            <td><?php echo $rc['origem']; ?></td>               
         </tr>
         <?php } ?>
       </tbody>
    </table>
  </div>
</body>
