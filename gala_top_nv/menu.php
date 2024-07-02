<ul class="menubar bradius">
<?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Upload");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formatualizar_base_vpg.php" rel="modal"><?php echo utf8_encode("Base Cotação");?></a></li>
      <li class="menu-separator"></li>
          <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
 
 <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Início");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuicao_atualiza_servico.php"><?php echo utf8_encode("Atualizar Serviços");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuir_cotacao_analise.php"><?php echo utf8_encode("Distribuição Análise");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuir_cotacao_input.php"><?php echo utf8_encode("Distribuição Input");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuir_cotacao_auditoria.php"><?php echo utf8_encode("Distribuição Análise de input");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuir_cotacao_correcao.php"><?php echo utf8_encode("Distribuição Correção");?></a></li>
    
     </ul>
  </li>
  <?php } ?>
 
 
   
  <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Redistribuição");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_analise.php"><?php echo utf8_encode("Redistribuição análise");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_input.php"><?php echo utf8_encode("Redistribuição input");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_auditoria.php"><?php echo utf8_encode("Redistribuição Análise de input");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_correcao.php"><?php echo utf8_encode("Redistribuição correção");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_chamado.php"><?php echo utf8_encode("Redistribuição chamado");?></a></li>
    

    </ul>
  </li>
  <?php } ?>
  
   <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Retornar");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_analise.php"><?php echo utf8_encode("Retornar distribuição análise");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_input.php"><?php echo utf8_encode("Retornar distribuição input");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_auditoria.php"><?php echo utf8_encode("Retornar distribuição Análise de input");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_correcao.php"><?php echo utf8_encode("Retornar distribuição correção");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_chamado.php"><?php echo utf8_encode("Retornar distribuição chamado");?></a></li>
    </ul>
  </li>
  <?php } ?> 
  
  
  
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Consultas");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php"><?php echo utf8_encode("Controle Operação");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?&t=forms/formvisao.php"><?php echo utf8_encode("Visão Geral");?></a></li>
   </ul>
  </li>
  <?php } ?>
  
      <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Exportação");?></a>
    <ul class="menu">
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio_auditoria.php"><?php echo utf8_encode("Gerar relatórios Análise de input erros");?></a></li>
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio.php"><?php echo utf8_encode("Gerar relatórios cotação com filtro");?></a></li>
    <?php } ?>     
      
      </ul>
  </li>
  <?php } ?> 
  
  
     <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Cadastro");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcadastro_usuarios.php"><?php echo utf8_encode("Usuários");?></a></li>
     </ul>
  </li>
  <?php } ?>  
 
  
  <?php if($perfil == 2){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_analise.php"><?php echo utf8_encode("Cotações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href=""><?php echo utf8_encode("Ligações");?></a></li>
        <?php if($perfil == 3 || $perfil == 5 || $perfil == 6){ ?>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcarga_cotacoes_filhas.php"><?php echo utf8_encode("Cotações Filhas");?></a></li>
       <?php } ?>
      <li class="menu-separator"></li>
      <li class="menu-item "><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
  
  <?php if($perfil == 12 ){ ?>
    <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_analise.php"><?php echo utf8_encode("Cotações Análise");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_auditoria.php"><?php echo utf8_encode("Cotações Análise de input");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href=""><?php echo utf8_encode("Ligações");?></a></li>
        <?php if($perfil == 12){ ?>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcarga_cotacoes_filhas_filtro1.php"><?php echo utf8_encode("Cotações Filhas");?></a></li>
       <?php } ?>
      <li class="menu-separator"></li>
      <li class="menu-item "><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
   <?php } ?>
   
       <?php if($perfil == 12){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produção");?></a>
    <ul class="menu">
     
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_analise.php"><?php echo utf8_encode("Cotações Análise");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_correcoes_analise.php"><?php echo utf8_encode("Correções efetuadas");?></a></li>
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_auditoria.php"><?php echo utf8_encode("Cotações Análise de input");?></a></li>
     </ul>  
     
  </li>
    <?php } ?>
   
   
    <?php if($perfil == 2){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_analise.php"><?php echo utf8_encode("Cotações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_correcoes_analise.php"><?php echo utf8_encode("Correções efetuadas");?></a></li>
     </ul>  
     
  </li>
    <?php } ?>
    
    
    
    
   <?php if($perfil == 3){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_input.php"><?php echo utf8_encode("Cotações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="javascript:void(0)"><?php echo utf8_encode("Ligações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcarga_cotacoes_filhas_filtro.php"><?php echo utf8_encode("Cotações Filhas");?></a></li>
      <li class="menu-separator"></li>
      <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
   
   
   
    <?php if($perfil == 3){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_input.php"><?php echo utf8_encode("Cotações");?></a></li>
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_correcoes_input.php"><?php echo utf8_encode("Correções efetuadas");?></a></li>
    
     </ul>
  </li>
    <?php } ?>  
    
     
      <?php if($perfil == 5){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Operação");?></a>
    <ul class="menu">
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_auditoria.php"><?php echo utf8_encode("Cotações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="javascript:void(0)"><?php echo utf8_encode("Ligações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcarga_cotacoes_filhas_filtro1.php"><?php echo utf8_encode("Cotações Filhas");?></a></li>
      <li class="menu-separator"></li>
      <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
   
   
   
   <?php if($perfil == 5){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produção");?></a>
    <ul class="menu">
    
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_auditoria.php"><?php echo utf8_encode("Cotações");?></a></li>
  
     </ul>
  </li>
    <?php } ?>   
    
    
  
  
    
    
    
    
    
      <?php if($perfil == 6 ){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_correcao.php"><?php echo utf8_encode("Cotações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="javascript:void(0)"><?php echo utf8_encode("Ligações");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcarga_cotacoes_filhas_filtro2.php"><?php echo utf8_encode("Cotações Filhas");?></a></li>
          <li class="menu-separator"></li>
      <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
   
  <?php if($perfil == 6){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_correcao.php"><?php echo utf8_encode("Cotações");?></a></li>
     </ul>
  </li>
    <?php } ?>  
    
    
   <?php if($perfil == 13){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Operação");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_chamado.php"><?php echo utf8_encode("Cotações");?></a></li>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_chamado.php"><?php echo utf8_encode("Redistribuição chamado");?></a></li>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_chamado.php"><?php echo utf8_encode("Retornar distribuição chamado");?></a></li>
      <li class="menu-separator"></li>
      <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
   
   
   
    <?php if($perfil == 13){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produção");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_chamado.php"><?php echo utf8_encode("Cotações");?></a></li>
        
     </ul>
  </li>
    <?php } ?>     
    
    
    
    
 <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Usuários");?></a>
    <ul class="menu">
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_edita_usuario.php"><?php echo utf8_encode("Editar Usuario");?></a></li>
      <?php } ?>
    
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formalterar_senha.php"><?php echo utf8_encode("Alterar Senha");?></a></li>
   
     <?php  if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_reset_usuario.php"><?php echo utf8_encode("Reset senha usuário");?></a></li>
     <?php } if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_ativar_usuario.php"><?php echo utf8_encode("Ativar usuário");?></a></li>
     <?php } if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_desativar_usuario.php"><?php echo utf8_encode("Desativar usuário");?></a></li>
      <?php } ?>  
    </ul>
  </li>   
     
      
    
      <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Pesquisa");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formconsulta_cotacoes_setor.php"><?php echo utf8_encode("Cotações");?></a></li>
     </ul>
  </li>
    <?php } ?>   
    
  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)">Ajuda</a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="javascript:void(0)">Manual Gala</a></li>
    </ul>
  </li>
</ul>

<!--<div class="bubble">
  <div class="bubble-tail"></div>
  <div class="bubble-content">
  Click no menu para escolher as <?php //echo utf8_encode("opções");?>.
  </div>
 
</div>!-->

  <script src='menu/js/jquery.js'></script>

  <script src="menu/js/index.js"></script>
  
</div>
</body>  
</html>
  