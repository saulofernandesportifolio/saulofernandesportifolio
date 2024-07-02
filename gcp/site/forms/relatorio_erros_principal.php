<br /><br />
<p align="center"><b><font color="#FFFFFF" size="5" face="Gotham Light">Relátorios erros</font></b></p>
<br />
<div id="filtro3" class="form bradius">
<div class="divformdistribuicaoservico">
 <div style="padding-left: 100px;">   
   <table>
    <tr>  
     <?php if($perfil == 1 || $perfil == 4 || $perfil == 19 || $perfil == 18 ||$perfil == 21 || $perfil == 22 || $perfil == 23){ ?>   
    <th>    
    |&nbsp;<a href="principal.php?t=forms/relatorio_erros.php"><?php echo ("Gerar erros");?></a>
    </th>
    <th>
    |&nbsp;<a href="principal.php?t=forms/relatorio_erros_historico.php"><?php echo ("Gerar erros histórico");?></a>  
    </th>
    <th>
    |&nbsp;<a  href="principal.php?t=forms/relatorio_erros_linhas.php"><?php echo ("Gerar erros linhas");?></a>  
    </th>
     <th>
    |&nbsp;<a  href="principal.php?t=forms/relatorio_erros_linhas_historico.php"><?php echo ("Gerar erros linhas histórico");?></a>&nbsp;|  
    </th>
    <?php }?>
     <?php if($perfil == 1 || $perfil == 4  || $perfil == 17 || $perfil == 18 || $perfil == 21 || $perfil == 22 || $perfil == 23){ ?>
    <th>
    |&nbsp;<a  href="principal.php?t=forms/relatorio_erros_top_tt.php"><?php echo ("Gerar erros tt");?></a>  
    </th>
     <th>
    |&nbsp;<a  href="principal.php?t=forms/relatorio_erros_historico_top_tt.php"><?php echo ("Gerar erros histórico tt");?></a>&nbsp;|  
    </th>
    <th>
    &nbsp;<a  href="principal.php?t=forms/relatorio_erros_linhas_top_tt.php"><?php echo ("Gerar erros linhas tt");?></a>  
    </th>
     <th>
    |&nbsp;<a  href="principal.php?t=forms/relatorio_erros_linhas_historico_top_tt.php"><?php echo ("Gerar erros linhas histórico tt");?></a>&nbsp;|  
    </th>
    <?php } ?> 

    </tr>
   
 </table>
     
     
    </div>   
 </div>
</div>
