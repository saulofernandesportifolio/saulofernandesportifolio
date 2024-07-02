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

<div class="navbar">
   <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 16 || $perfil == 19 || $perfil == 17 || $perfil == 18 || $perfil == 21){ ?>
 <div class="dropdown">
    <button class="dropbtn">Carga
      <i class="fa fa-caret-down"></i>
    </button>
        <div class="dropdown-content">
           <div class="header">
          
            </div>
              <div class="row">
                <div class="column">
                    <h2>Bases</h2>
                   <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 18 || $perfil == 21 || $perfil != 16 && $perfil != 19 && $perfil != 17){ ?>
                    <a href="principal.php?t=forms/formatualizar_base_vpg.php">Cotaçao</a>
                    <?php } ?>
                    <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 16 || $perfil != 19 && $perfil != 17 || $perfil == 18 || $perfil == 21){ ?> 
                    <a href="principal.php?t=forms/formatualizar_base_pn.php">PN</a>
                    <?php } ?>
                   <?php if($perfil == 1 || $perfil == 4 || $perfil == 7 || $perfil == 19 || $perfil != 17 || $perfil == 18 || $perfil == 21){ ?>
                    <a href="principal.php?t=forms/formatualizar_base_errospedidos.php">Erros</a>
                   <?php } ?> 
                   <?php if($perfil == 1 || $perfil == 4 || $perfil == 17 || $perfil != 19 && $perfil != 16 || $perfil == 18 || $perfil == 21){ ?> 
                    <a href="principal.php?t=forms/formatualizar_base_errospedidos_top_tt.php">Erros TT</a>
                   <?php } ?>
                   <?php if( $perfil == 4 ){ ?>  
                    <a href="principal.php?t=forms/formatualizar_base_carteira.php">Carteiras</a>
                   <?php } ?> 
                </div>
                <div class="column">
                  <h2>Atualizar</h2> 
                    <?php if( $perfil == 4 || $perfil == 1 || $perfil == 18 || $perfil == 21){ ?> 
                    <a href="principal.php?t=forms/form_atualizar_carteira.php">Carteira</a>
                    <?php } ?>
                    <?php if( $perfil == 4 || $perfil == 1 || $perfil == 19 || $perfil == 18 || $perfil == 21){ ?>   
                    <a href="principal.php?t=forms/form_atualizar_carteira_erros.php">Carteira - Erros</a> 
                    <?php } ?>                   
                </div>
               <div class="column">
                  <div class='left' style="text-align:right; width:100px;">
                   <img src="css/imagem/backoffice.png" style="width:128px; height:130px;" />
                  </div>
               </div>
          </div>
       </div>

     <div class="dropdown">
    <button class="dropbtn">Carga
      <i class="fa fa-caret-down"></i>
    </button>
        <div class="dropdown-content">
           <div class="header">
          
            </div>
              <div class="row">
                <div class="column">




            <div class="column">
                  <div class='left' style="text-align:right; width:100px;">
                   <img src="css/imagem/backoffice.png" style="width:128px; height:130px;" />
                  </div>
               </div>
          </div>
       </div>           
      

  </div> 
</div>
     <?php } ?>


