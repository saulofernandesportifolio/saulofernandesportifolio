<ul class="menubar bradius">
<?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Upload");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formatualizar_base_vpg.php" rel="modal"><?php echo utf8_encode("Base Cota��o");?></a></li>
      <li class="menu-separator"></li>
          <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
 
 <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("In�cio");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuicao_atualiza_servico.php"><?php echo utf8_encode("Atualizar Servi�os");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuir_cotacao_analise.php"><?php echo utf8_encode("Distribui��o An�lise");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuir_cotacao_input.php"><?php echo utf8_encode("Distribui��o Input");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuir_cotacao_auditoria.php"><?php echo utf8_encode("Distribui��o An�lise de input");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formdistribuir_cotacao_correcao.php"><?php echo utf8_encode("Distribui��o Corre��o");?></a></li>
    
     </ul>
  </li>
  <?php } ?>
 
 
   
  <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Redistribui��o");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_analise.php"><?php echo utf8_encode("Redistribui��o an�lise");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_input.php"><?php echo utf8_encode("Redistribui��o input");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_auditoria.php"><?php echo utf8_encode("Redistribui��o An�lise de input");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_correcao.php"><?php echo utf8_encode("Redistribui��o corre��o");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_chamado.php"><?php echo utf8_encode("Redistribui��o chamado");?></a></li>
    

    </ul>
  </li>
  <?php } ?>
  
   <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Retornar");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_analise.php"><?php echo utf8_encode("Retornar distribui��o an�lise");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_input.php"><?php echo utf8_encode("Retornar distribui��o input");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_auditoria.php"><?php echo utf8_encode("Retornar distribui��o An�lise de input");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_correcao.php"><?php echo utf8_encode("Retornar distribui��o corre��o");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_chamado.php"><?php echo utf8_encode("Retornar distribui��o chamado");?></a></li>
    </ul>
  </li>
  <?php } ?> 
  
  
  
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Consultas");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php"><?php echo utf8_encode("Controle Opera��o");?></a></li>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?&t=forms/formvisao.php"><?php echo utf8_encode("Vis�o Geral");?></a></li>
   </ul>
  </li>
  <?php } ?>
  
      <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Exporta��o");?></a>
    <ul class="menu">
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio_auditoria.php"><?php echo utf8_encode("Gerar relat�rios An�lise de input erros");?></a></li>
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/relatorio.php"><?php echo utf8_encode("Gerar relat�rios cota��o com filtro");?></a></li>
    <?php } ?>     
      
      </ul>
  </li>
  <?php } ?> 
  
  
     <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
<li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Cadastro");?></a>
    <ul class="menu">
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcadastro_usuarios.php"><?php echo utf8_encode("Usu�rios");?></a></li>
     </ul>
  </li>
  <?php } ?>  
 
  
  <?php if($perfil == 2){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Opera��o");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_analise.php"><?php echo utf8_encode("Cota��es");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href=""><?php echo utf8_encode("Liga��es");?></a></li>
        <?php if($perfil == 3 || $perfil == 5 || $perfil == 6){ ?>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcarga_cotacoes_filhas.php"><?php echo utf8_encode("Cota��es Filhas");?></a></li>
       <?php } ?>
      <li class="menu-separator"></li>
      <li class="menu-item "><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
  
  <?php if($perfil == 12 ){ ?>
    <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Opera��o");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_analise.php"><?php echo utf8_encode("Cota��es An�lise");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_auditoria.php"><?php echo utf8_encode("Cota��es An�lise de input");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href=""><?php echo utf8_encode("Liga��es");?></a></li>
        <?php if($perfil == 12){ ?>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcarga_cotacoes_filhas_filtro1.php"><?php echo utf8_encode("Cota��es Filhas");?></a></li>
       <?php } ?>
      <li class="menu-separator"></li>
      <li class="menu-item "><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
   <?php } ?>
   
       <?php if($perfil == 12){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produ��o");?></a>
    <ul class="menu">
     
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_analise.php"><?php echo utf8_encode("Cota��es An�lise");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_correcoes_analise.php"><?php echo utf8_encode("Corre��es efetuadas");?></a></li>
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_auditoria.php"><?php echo utf8_encode("Cota��es An�lise de input");?></a></li>
     </ul>  
     
  </li>
    <?php } ?>
   
   
    <?php if($perfil == 2){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produ��o");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_analise.php"><?php echo utf8_encode("Cota��es");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_correcoes_analise.php"><?php echo utf8_encode("Corre��es efetuadas");?></a></li>
     </ul>  
     
  </li>
    <?php } ?>
    
    
    
    
   <?php if($perfil == 3){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Opera��o");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_input.php"><?php echo utf8_encode("Cota��es");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="javascript:void(0)"><?php echo utf8_encode("Liga��es");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcarga_cotacoes_filhas_filtro.php"><?php echo utf8_encode("Cota��es Filhas");?></a></li>
      <li class="menu-separator"></li>
      <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
   
   
   
    <?php if($perfil == 3){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produ��o");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_input.php"><?php echo utf8_encode("Cota��es");?></a></li>
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_correcoes_input.php"><?php echo utf8_encode("Corre��es efetuadas");?></a></li>
    
     </ul>
  </li>
    <?php } ?>  
    
     
      <?php if($perfil == 5){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Opera��o");?></a>
    <ul class="menu">
     <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_auditoria.php"><?php echo utf8_encode("Cota��es");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="javascript:void(0)"><?php echo utf8_encode("Liga��es");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcarga_cotacoes_filhas_filtro1.php"><?php echo utf8_encode("Cota��es Filhas");?></a></li>
      <li class="menu-separator"></li>
      <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
   
   
   
   <?php if($perfil == 5){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produ��o");?></a>
    <ul class="menu">
    
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_auditoria.php"><?php echo utf8_encode("Cota��es");?></a></li>
  
     </ul>
  </li>
    <?php } ?>   
    
    
  
  
    
    
    
    
    
      <?php if($perfil == 6 ){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Opera��o");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_correcao.php"><?php echo utf8_encode("Cota��es");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="javascript:void(0)"><?php echo utf8_encode("Liga��es");?></a></li>
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formcarga_cotacoes_filhas_filtro2.php"><?php echo utf8_encode("Cota��es Filhas");?></a></li>
          <li class="menu-separator"></li>
      <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
   
  <?php if($perfil == 6){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produ��o");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_correcao.php"><?php echo utf8_encode("Cota��es");?></a></li>
     </ul>
  </li>
    <?php } ?>  
    
    
   <?php if($perfil == 13){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Opera��o");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_fila_cotacao_chamado.php"><?php echo utf8_encode("Cota��es");?></a></li>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_redistribuicao_chamado.php"><?php echo utf8_encode("Redistribui��o chamado");?></a></li>
       <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_retorno_chamado.php"><?php echo utf8_encode("Retornar distribui��o chamado");?></a></li>
      <li class="menu-separator"></li>
      <li class="menu-item"><a class="menu-item-target" href="logout.php">Logout</a></li>
    </ul>
  </li>
  <?php } ?>
   
   
   
    <?php if($perfil == 13){ ?>  
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Produ��o");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/form_producao_cotacao_chamado.php"><?php echo utf8_encode("Cota��es");?></a></li>
        
     </ul>
  </li>
    <?php } ?>     
    
    
    
    
 <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Usu�rios");?></a>
    <ul class="menu">
    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_edita_usuario.php"><?php echo utf8_encode("Editar Usuario");?></a></li>
      <?php } ?>
    
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formalterar_senha.php"><?php echo utf8_encode("Alterar Senha");?></a></li>
   
     <?php  if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_reset_usuario.php"><?php echo utf8_encode("Reset senha usu�rio");?></a></li>
     <?php } if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_ativar_usuario.php"><?php echo utf8_encode("Ativar usu�rio");?></a></li>
     <?php } if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
    <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formfiltro_desativar_usuario.php"><?php echo utf8_encode("Desativar usu�rio");?></a></li>
      <?php } ?>  
    </ul>
  </li>   
     
      
    
      <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 ){ ?>
  <li class="menubar-item">
    <a class="menubar-item-target" href="javascript:void(0)"><?php echo utf8_encode("Pesquisa");?></a>
    <ul class="menu">
      <li class="menu-item"><a class="menu-item-target" href="principal.php?t=forms/formconsulta_cotacoes_setor.php"><?php echo utf8_encode("Cota��es");?></a></li>
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
  Click no menu para escolher as <?php //echo utf8_encode("op��es");?>.
  </div>
 
</div>!-->

  <script src='menu/js/jquery.js'></script>

  <script src="menu/js/index.js"></script>
  
</div>
</body>  
</html>
  