

<script language="JavaScript">
function abrirmanual(URL) {
 
  var width = 'auto';
  var height = 'auto';
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>


<script language="JavaScript">
function abrirtela(URL) {
 
  var width = 'auto';
  var height = 'auto';
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>




<ul class="menubar bradius">
<?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 16 || $perfil == 19 || $perfil == 17 || $perfil == 18 || $perfil == 21){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Upload");?></a>
    <ul class="menu">
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 || $perfil != 16 && $perfil != 19 && $perfil != 17){ ?>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formatualizar_base_vpg.php" rel="modal"><?php echo ("Base Cotaçao");?></a></li>
     <?php } ?>
      <?php if( $perfil == 4 ){ ?>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formatualizar_base_pn.php" rel="modal"><?php echo ("Base PN SIEBELRG");?></a></li>
        <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formatualizar_base_pn2.php" rel="modal"><?php echo ("Base Controle Tramites de PN VPG");?></a></li>

    <?php } ?>

         <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 19 || $perfil != 17 || $perfil == 18 || $perfil == 21){ ?> 
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formatualizar_base_errospedidos.php" rel="modal"><?php echo ("Base Erros");?></a></li>
    <?php } ?>


       <?php if($perfil == 1 || $perfil == 4 || $perfil == 17 || $perfil != 19 && $perfil != 16 || $perfil == 18 || $perfil == 21){ ?> 
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formatualizar_base_errospedidos_top_tt.php" rel="modal"><?php echo ("Base Erros TT");?></a></li>
    <?php } ?>

      <?php if( $perfil == 4 ){ ?> 
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formatualizar_base_carteira.php" rel="modal"><?php echo ("Base Carteiras - VPG");?></a></li>
    <?php } ?>


          <?php if( $perfil == 4 || $perfil == 1 || $perfil == 18 || $perfil == 21){ ?> 
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_atualizar_carteira.php" rel="modal"><?php echo ("Atualizar Carteira - VPG");?></a></li>
    <?php } ?>

        <?php if( $perfil == 4 || $perfil == 1 || $perfil == 19 || $perfil == 18 || $perfil == 21){ ?> 
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_atualizar_carteira_erros.php" rel="modal"><?php echo ("Atualizar Carteira - VPG ERROS");?></a></li>
    <?php } ?>

    </ul>
  </li>
  <?php } ?>
 
 <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Início");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuicao_atualiza_servico.php"><?php echo ("Atualizar Serviços");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_distribuicao_analise.php"><?php echo ("Distribuição Análise");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_distribuicao_input.php"><?php echo ("Distribuição Input");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_distribuicao_auditoria.php"><?php echo ("Distribuição Análise de input");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_distribuicao_correcao.php"><?php echo ("Distribuição Correção");?></a></li>
    
     </ul>
  </li>
  <?php } ?>
 
 
   
  <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Redistribuição");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_analise.php"><?php echo ("Redistribuição análise");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_input.php"><?php echo ("Redistribuição input");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_auditoria.php"><?php echo ("Redistribuição Análise de input");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_correcao.php"><?php echo ("Redistribuição correção");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_chamado.php"><?php echo ("Redistribuição chamado");?></a></li>

    </ul>
  </li>
  <?php } ?>
  
   <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 19 || $perfil == 18 || $perfil == 21 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Retornar");?></a>
    <ul class="menu">
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil != 19 || $perfil == 18 || $perfil == 21 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_analise.php"><?php echo ("Retornar distribuição análise");?></a></li>
    <?php } ?> 
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil != 19 || $perfil == 18 || $perfil == 21 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_input.php"><?php echo ("Retornar distribuição input");?></a></li>
    <?php } ?> 
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil != 19 || $perfil == 18 || $perfil == 21 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_auditoria.php"><?php echo ("Retornar distribuição Análise de input");?></a></li>
    <?php } ?> 
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil != 19 || $perfil == 18 || $perfil == 21 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_correcao.php"><?php echo ("Retornar distribuição Correção");?></a></li>
    <?php } ?> 
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil != 19 || $perfil == 18 || $perfil == 21 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_chamado.php"><?php echo ("Retornar distribuição chamado");?></a></li>
    <?php } ?> 
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 19 || $perfil == 18 || $perfil == 21 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_erros.php"><?php echo ("Retornar distribuição erros");?></a></li>
       <?php } ?>

    </ul>
  </li>
  <?php } ?> 
  
  
  
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Consultas");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?&t=forms/formhome_operacao.php"><?php echo ("Controle Operação");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?&t=forms/formvisao2.php"><?php echo ("Visão Tramitando");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?&t=forms/formvisao.php"><?php echo ("Visão Fechamento Acumulado");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="javascript:abrirtela('site/forms/formvisao_tela.php');" >Visão Tela</a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?&t=forms/formfiltro_producao.php"><?php echo ("Produção");?></a></li>

   </ul>
  </li>
  <?php } ?>
  


 <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 16 || $perfil == 17 || $perfil == 19 || $perfil == 18 || $perfil == 21  || $perfil == 15 || $idtbl_usuario == 518 || $idtbl_usuario == 428 || $idtbl_usuario == 432 || $perfil == 22 || $perfil == 23){ ?>
   <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Exportação");?></a>
    <ul class="menu">
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23){ ?>    
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio_tramitacao_principal.php"><?php echo ("Relatórios Tramitação");?></a></li>   
     
    <?php } ?>  

     <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $idtbl_usuario == 518 || $idtbl_usuario == 428 || $idtbl_usuario == 432 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23){ ?>

     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio_contestacao_principal.php"><?php echo ("Relatórios Contestação");?></a></li>
   
    <?php } ?>  


     <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 16 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23){ ?>
    
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio_portabilidade_principal.php"><?php echo ("Relatórios Portabilidade");?></a></li>

    <?php } ?>    
      
    
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 19 || $perfil == 17 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23){ ?>
    
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio_erros_principal.php"><?php echo ("Relatórios Erros");?></a></li>
    
    <?php } ?> 

       <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 20 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio_swap_principal.php"><?php echo ("Relatórios Swap");?></a></li>
  
    <?php } ?> 


       <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 15 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio_diretoria_principal.php"><?php echo ("Relatórios Diretoria");?></a></li>
  
    <?php } ?> 



    <?php if($perfil == 4 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio_bi.php"><?php echo ("Gerar relatórios bi-TXT");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio_bi_usuarios.php"><?php echo ("Gerar relatórios bi-usuarios");?></a></li>
    <?php } ?>
     </ul>
  </li>
  <?php } ?> 




  
  
     <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 21 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Cadastro");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcadastro_usuarios.php"><?php echo ("Usuários");?></a></li>
    <?php if( $perfil == 21 || $perfil == 4 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcadastro_usuarios_sup.php"><?php echo ("Usuários Supervisores");?></a></li>
    <?php } ?>
    <?php if( $perfil == 4 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcadastro_usuarios_coord.php"><?php echo ("Usuários Coordenadores");?></a></li>
      <?php } ?>  
     </ul>
  </li>
  <?php } ?>  
 
  
  <?php if($perfil == 2){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/sql.sla_analise.php"><?php echo ("Cotações");?></a></li>
  
     
    </ul>
  </li>
  <?php } ?>
  
  <?php if($perfil == 12 ){ ?>
    <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/sql.sla_analise.php"><?php echo ("Cotações Análise");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_auditoria.php"><?php echo ("Cotações Análise de input");?></a></li>
    

    </ul>
  </li>
   <?php } ?>
   
       <?php if($perfil == 12){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
     
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_analise.php"><?php echo ("Cotações Análise");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_correcoes_analise.php"><?php echo ("Correções efetuadas");?></a></li>
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_auditoria.php"><?php echo ("Cotações Análise de input");?></a></li>
     </ul>  
     
  </li>
    <?php } ?>
   
   
    <?php if($perfil == 2){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_analise.php"><?php echo ("Cotações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_correcoes_analise.php"><?php echo ("Correções efetuadas");?></a></li>
     </ul>  
     
  </li>
    <?php } ?>
    
    
    
    
   <?php if($perfil == 3){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/sql.sla_input.php"><?php echo ("Cotações");?></a></li>

    </ul>
  </li>
  <?php } ?>
   
   
   
    <?php if($perfil == 3){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_input.php"><?php echo ("Cotações");?></a></li>
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_correcoes_input.php"><?php echo ("Correções efetuadas");?></a></li>
    
     </ul>
  </li>
    <?php } ?>  
    
     
      <?php if($perfil == 5){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/sql.sla_auditoria.php"><?php echo ("Cotações");?></a></li>
     

    </ul>
  </li>
  <?php } ?>
   
   
   
   <?php if($perfil == 5){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
    
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_auditoria.php"><?php echo ("Cotações");?></a></li>
  
     </ul>
  </li>
    <?php } ?>   
    
    
    
      <?php if($perfil == 6 ){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/sql.sla_correcao.php"><?php echo ("Cotações");?></a></li>
       

    </ul>
  </li>
  <?php } ?>
   
  <?php if($perfil == 6){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_correcao.php"><?php echo ("Cotações");?></a></li>
     </ul>
  </li>
    <?php } ?>  
    
    
   <?php if($perfil == 13){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/sql.sla_chamado.php"><?php echo ("Cotações");?></a></li>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_chamado.php"><?php echo ("Redistribuição chamado");?></a></li>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_chamado.php"><?php echo ("Retornar distribuição chamado");?></a></li>

        <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_chamado.php"><?php echo ("Filtrar Cotações");?></a></li>
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_solucionar_chamadogeral.php"><?php echo ("Cotações com chamado geral");?></a></li>
              <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_top_tt_chamado.php"><?php echo ("Cotações com chamado TT");?></a></li> 

    </ul>
  </li>
  <?php } ?>
   
   
   
    <?php if($perfil == 13){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_chamado.php"><?php echo ("Cotações");?></a></li>
        
     </ul>
  </li>
    <?php } ?>     
    
    
       <?php if($perfil == 14){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formconsulta_cotacoes_contestacao.php"><?php echo ("Cotações");?></a></li>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formconsulta_cotacoes_contestacao_manual.php"><?php echo ("Cotações_manual");?></a></li>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_cadastro_remetente.php"><?php echo ("Cadastro remetente");?></a></li>

    </ul>
  </li>
  <?php } ?>
   
   
   
    <?php if($perfil == 14){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_contestacao.php"><?php echo ("Cotações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_contestacaomanual.php"><?php echo ("Cotações manual");?></a></li>

        
     </ul>
  </li>
    <?php } ?> 

   <?php if($perfil == 15){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formconsulta_cotacoes_diretoria.php"><?php echo ("Tratativa diretoria");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_diretoria_pendente.php"><?php echo ("Pendentes diretoria");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_cadastro_remetente_ponto_focal.php"><?php echo ("Cadastro Solicitantes Comercial");?></a>
      </li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_cadastro_remetente_ponto_focal2.php"><?php echo ("Cadastro Solicitantes Vivo/Atento");?></a>
      </li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formatualizar_filhas_massivamente.php"><?php echo ("Carga filha massivamente");?></a>
      </li>      
      

    </ul>
  </li>
  <?php } ?>
   
      
  <?php if($perfil == 15){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_diretoria.php"><?php echo ("Cotações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_atividades_diretoria.php"><?php echo ("Atividades");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_documentacao_diretoria.php"><?php echo ("Documentações");?></a></li>
        
     </ul>
  </li>
    <?php } ?> 


   <?php if($perfil == 16){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_pn_pos_analise.php"><?php echo ("Fila controle de tramite - PN");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_erros_pn.php"><?php echo ("Fila Erros - PN");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_chave_pn.php"><?php echo ("Fila Chave - PN");?></a></li> 
       </ul>
  </li>
  <?php } ?>
   
      
  <?php if($perfil == 16){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_pn.php"><?php echo ("Pedidos controle tramite PN");?></a></li>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_erros_pn.php"><?php echo ("Pedidos Erros PN");?></a></li>  
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_chave_pn.php"><?php echo ("Pedidos chave PN");?></a></li>
        
     </ul>
  </li>
    <?php } ?> 




     <?php if($perfil == 17){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_erros_top_tt.php"><?php echo ("Fila erros - TT");?></a></li>
   
      </ul>
  </li>
  <?php } ?>
   
      
  <?php if($perfil == 17){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_erros_top_tt.php"><?php echo ("Pedidos");?></a></li>
           
     </ul>
  </li>
    <?php } ?> 



   <?php if($perfil == 19){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_erros.php"><?php echo ("Fila erros");?></a></li>
      </ul>
  </li>
  <?php } ?>
   
      
  <?php if($perfil == 19){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_erros.php"><?php echo ("Pedidos");?></a></li>
        
     </ul>
  </li>
    <?php } ?> 


   <?php if($perfil == 20){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_swap.php"><?php echo ("Cadastrar swap");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formconsulta_cotacoes_swap.php"><?php echo ("Pesquisa swap");?></a></li>
        <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_cadastro_remetente_swap1.php"><?php echo ("Cadastrar remetente");?></a></li>

    </ul>
  </li>
  <?php } ?>
   
      
  <?php if($perfil == 20){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Produção");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_swap.php"><?php echo ("Pedidos");?></a></li>
      </ul>
  </li>
    <?php } ?> 


    
 <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Usuários");?></a>
    <ul class="menu">
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_edita_usuario.php"><?php echo ("Editar Usuário");?></a></li>
      <?php } ?>
    
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formalterar_senha.php"><?php echo ("Alterar Senha");?></a></li>
   
     <?php  if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_reset_usuario.php"><?php echo ("Reset senha usuário");?></a></li>
     <?php } if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_ativar_usuario.php"><?php echo ("Ativar usuário");?></a></li>
     <?php } if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_desativar_usuario.php"><?php echo ("Desativar usuário");?></a></li>
      <?php } ?>  
    </ul>
  </li>   
     
      
    
      <?php if($perfil == 1 || $perfil == 4 || $perfil == 7  || $perfil == 15 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23 ){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Pesquisa");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formconsulta_cotacoes_setor.php"><?php echo ("Cotações");?></a></li>
      <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23 ){ ?>
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formconsulta_cotacoes_vinculo.php"><?php echo ("Inserir complementares que não vincularam ao carregar a base");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formconsulta_cotacoes_vinculo2.php"><?php echo ("Cotações complementares para atualizar vinculo corretamente");?></a></li>
      <?php } ?>  

     </ul>
  </li>
    <?php } ?>   


       <?php if($perfil == 4 ){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo ("Gerar");?></a>
    <ul class="menu">
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/backup/backup.php"><?php echo ("Gerar backup");?></a></li>
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/backup/bd_gerado.php"><?php echo ("Consulta backup gerados");?></a></li>
  
     </ul>
  </li>
    <?php } ?>    
    
  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)">Ajuda</a>
    <ul class="menu">
    <?php if($perfil == 4 || $perfil == 1 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23  ){ ?>
      <li class="menu-item"><a class="menu-item-target" href="javascript:abrirmanual('site/forms/manual_cip/CIP_VPE_SUP.htm');" >Manual Gala Supervisor</a></li>
      <?php } ?> 
      <?php if($perfil == 4 || $perfil == 2 || $perfil == 1 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23 ){ ?>
      <li class="menu-item"><a class="menu-item-target" href="javascript:abrirmanual('site/forms/manual_cip/CIP_VPE_ANALISE.htm');" >Manual Gala Operador Análise</a></li>
      <?php } ?> 
      <?php if($perfil == 4 || $perfil == 3 || $perfil == 1 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23 ){ ?>
      <li class="menu-item"><a class="menu-item-target" href="javascript:abrirmanual('site/forms/manual_cip/CIP_VPE_INPUT.htm');" >Manual Gala Operador Input</a></li>
      <?php } ?>
      <?php if($perfil == 4 || $perfil == 5 || $perfil == 1 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23 ){ ?> 
      <li class="menu-item"><a class="menu-item-target" href="javascript:abrirmanual('site/forms/manual_cip/CIP_VPE_ANALISE_DE_INPUT.htm');" >Manual Gala Operador Análise de input</a></li>
      <?php } ?> 
         <?php if($perfil == 4 || $perfil == 6 || $perfil == 1 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23 ){ ?> 
      <li class="menu-item"><a class="menu-item-target" href="javascript:abrirmanual('site/forms/manual_cip/CIP_VPE_CORRECAO.htm');" >Manual Gala Operador Correção</a></li>
      <?php } ?>
         <?php if($perfil == 4 || $perfil == 14 || $perfil == 1 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23 ){ ?>
     <li class="menu-item"><a class="menu-item-target" href="javascript:abrirmanual('site/forms/manual_cip/CIP_VPE_SUP.htm');" >Manual Gala Operador Contestação</a></li>
     <?php } ?> 
        <?php if($perfil == 4 || $perfil == 19 || $perfil == 1 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23 ){ ?>
     <li class="menu-item"><a class="menu-item-target" href="javascript:abrirmanual('site/forms/manual_cip/CIP_VPE_SUP.htm');" >Manual Gala Operador Erros</a></li>
     <?php } ?>  
        <?php if($perfil == 4 || $perfil == 16 || $perfil == 1 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23 ){ ?>
     <li class="menu-item"><a class="menu-item-target" href="javascript:abrirmanual('site/forms/manual_cip/CIP_VPE_SUP.htm');" >Manual Gala Operador PN</a></li>
     <?php } ?> 
    </ul>
  </li>


    <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)">Sair</a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>  

    </ul>
  </li>


</ul>


 


<!--<div class="bubble">
  <div class="bubble-tail"></div>
  <div class="bubble-content">
  Click no menu para escolher as <?php //echo utf8_encode("op��es");?>.
  </div>
 
</div>!-->

  <script src='menu/js/jquery.js'></script>

  <script src="menu/js/index.js"></script>
  
</div>
</body>  
</html>
  