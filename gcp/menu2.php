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

<ul class="menuTemplate1 decor1_1" license="mylicense">
   <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 16 || $perfil == 19 || $perfil == 17 || $perfil == 18 || $perfil == 21){ ?>
    <li><a href="#Horizontal-Menus" class="arrow">Carga</a>
        <div class="drop decor1_2" style="width: 380px;">
            <div class='left'>
                <b>Bases</b>
                <div>
                   <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 || $perfil != 16 && $perfil != 19 && $perfil != 17){ ?>
                    <a href="principal.php?t=forms/formatualizar_base_vpg.php">Cotaçao</a><br />
                    <?php } ?>
                    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 16 || $perfil != 19 && $perfil != 17 || $perfil == 18 || $perfil == 21){ ?> 
                    <a href="principal.php?t=forms/formatualizar_base_pn.php">PN</a><br /> 
                    <?php } ?>
                   <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 19 || $perfil != 17 || $perfil == 18 || $perfil == 21){ ?>
                    <a href="principal.php?t=forms/formatualizar_base_errospedidos.php">Erros</a><br />
                   <?php } ?> 
                   <?php if($perfil == 1 || $perfil == 4 || $perfil == 17 || $perfil != 19 && $perfil != 16 || $perfil == 18 || $perfil == 21){ ?> 
                    <a href="principal.php?t=forms/formatualizar_base_errospedidos_top_tt.php">Erros TT</a><br />
                   <?php } ?>
                   <?php if( $perfil == 4 ){ ?>  
                    <a href="principal.php?t=forms/formatualizar_base_carteira.php">Carteiras</a>
                   <?php } ?> 
                </div>
            </div>
              <div class='left'>
                <b>Atualizar</b>
                <div>
                   <?php if( $perfil == 4 || $perfil == 1 || $perfil == 18 || $perfil == 21){ ?> 
                    <a href="principal.php?t=forms/form_atualizar_carteira.php">Carteira</a><br />
                    <?php } ?>
                    <?php if( $perfil == 4 || $perfil == 1 || $perfil == 19 || $perfil == 18 || $perfil == 21){ ?>   
                    <a href="principal.php?t=forms/form_atualizar_carteira_erros.php">Carteira - Erros</a><br /> 
                    <?php } ?>                   
                </div>
            </div>
            <div class='left' style="text-align:right; width:100px;">
            <img src="css/imagem/backoffice.png" style="width:128px; height:130px;" /><br />
                
            </div>
            <div style='clear: both;'></div>
        </div>
    </li>
     <?php } ?>

     <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 ){ ?>
     <li class="separator"></li>
      <li><a href="#Horizontal-Menus" class="arrow">Iniciar Tratativas</a>
        <div class="drop decor1_2" style="width: 380px;">
            <div class='left'>
                <b>Serviços</b>
                <div>
               
                    <a href="principal.php?t=forms/formdistribuicao_atualiza_servico.php">Quantificar</a><br />
              
                </div>
            </div>
            <div class='left'>
                <b>Distribuição</b>
                <div>
        
                    <a href="principal.php?t=forms/formfiltro_distribuicao_analise.php">Análise</a><br />
               

                    <a href="principal.php?t=forms/formfiltro_distribuicao_input.php">Input</a><br />
              

                    <a href="principal.php?t=forms/formfiltro_distribuicao_auditoria.php">Anélise de Input</a><br />
                

                    <a href="principal.php?t=forms/formfiltro_distribuicao_correcao.php">Correção Input</a><br />
                              

                </div>
            </div>
            
            <div class='left' style="text-align:right; width:100px;">
            <img src="css/imagem/backoffice.png" style="width:128px; height:130px;" /><br />
                
            </div>
            <div style='clear: both;'></div>
        </div>
    </li>   
      <?php } ?>

   <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 ){ ?>
     
    <li class="separator"></li>
      <li><a href="#Horizontal-Menus" class="arrow">Retornos Tratativas</a>
        <div class="drop decor1_2" style="width: 390px;">
            <div class='left'>
                <b>Redistribuição</b>
                <div>

                    <a href="principal.php?t=forms/formfiltro_redistribuicao_analise.php">Análise</a><br />
           
                    <a href="principal.php?t=forms/formfiltro_redistribuicao_input.php">Input</a><br />
                 

                    <a href="principal.php?t=forms/formfiltro_redistribuicao_auditoria.php">Anélise de Input</a><br />

                    <a href="principal.php?t=forms/formfiltro_redistribuicao_correcao.php">Correção Input</a><br />
                            

                </div>
            </div>

            <div class='left'>
                <b>Retornar para distribuição</b>
                <div>
   
                    <a href="principal.php?t=forms/formfiltro_retorno_analise.php">Análise</a><br />


                    <a href="principal.php?t=forms/formfiltro_retorno_input.php">Input</a><br />
         

                    <a href="principal.php?t=forms/formfiltro_retorno_auditoria.php">Anélise de Input</a><br />
  
                    <a href="principal.php?t=forms/formfiltro_retorno_correcao.php">Correção Input</a><br />
                  

                </div>
            </div>
            
            <div class='left' style="text-align:right; width:100px;">
            <img src="css/imagem/backoffice.png" style="width:128px; height:130px;" /><br />
                
            </div>
            <div style='clear: both;'></div>
        </div>
    </li>
    <?php } ?>

    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23){ ?>
 
     <li class="separator"></li>
      <li><a href="#Horizontal-Menus" class="arrow">Consultas</a>
        <div class="drop decor1_2" style="width: 380px;">
            <div class='left'>
                <b>Controle</b>
                <div>
               
                    <a href="principal.php?&t=forms/formhome_operacao.php">Operação</a><br />
              
                </div>
            </div>
            <div class='left'>
                <b>Visão</b>
                <div>
        
                    <a href="principal.php?&t=forms/formvisao2.php">Tramitando</a><br />
               

                    <a href="principal.php?&t=forms/formvisao.php">Fechamento Acumulado</a><br />
              

                    <a href="javascript:abrirtela('site/forms/formvisao_tela.php');">Tela</a><br />
                

                    <a href="principal.php?&t=forms/formfiltro_producao.php">Produção</a><br />
                              

                </div>
            </div>
            
            <div class='left' style="text-align:right; width:100px;">
            <img src="css/imagem/backoffice.png" style="width:128px; height:130px;" /><br />
                
            </div>
            <div style='clear: both;'></div>
        </div>
    </li>

    <?php } ?>

    <li class="separator"></li>
     <li><a href="#" class="arrow">Sair</a>
        <div class="drop decor1_2 dropToLeft" style="width: 200px;">
            <div class='left'>
                <b>Efetuar</b>
                <div>
                    <a href="logout.php">Logout</a><br />
                </div>

            </div>
             <img src="css/imagem/backoffice.png" style="float:right; width:100px;
                height:130px;margin:0px 0px 0px 0px;" />
        </div>
    </li>
</ul>


  <script src='menu/js/jquery.js'></script>

  <script src="menu/js/index.js"></script>