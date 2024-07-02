<br /><br />
<p align="center"><b><font color="#337ab7" size="5" face="Gotham Light">Relátorios erros</font></b></p>
<br />
<div id="filtro3" class="form bradius">
<div class="divformdistribuicaoservico">
 <div style="padding-left: 350px;">   
   <table>
    <tr>  
     <?php if($perfil == 1 || $perfil == 4 || $perfil == 19){ ?>   
    <th>    
    |&nbsp;<a href="principal.php?t=forms/relatorio_erros.php"><?php echo ("Gerar erros");?></a>
    </th>
    <th>
    |&nbsp;<a href="principal.php?t=forms/relatorio_erros_historico.php"><?php echo ("Gerar erros histórico");?></a>  
    </th>
    <?php }?>
     <?php if($perfil == 1 || $perfil == 4  || $perfil == 17){ ?>
    <th>
    |&nbsp;<a  href="principal.php?t=forms/relatorio_erros_vpe_tt.php"><?php echo ("Gerar relatórios erros tt");?></a>  
    </th>
     <th>
    |&nbsp;<a  href="principal.php?t=forms/relatorio_erros_historico_vpe_tt.php"><?php echo ("Gerar relatórios erros histórico tt");?></a>&nbsp;|  
    </th>
    <?php } ?> 

    </tr>
   
 </table>
     
     
    </div>   
 </div>
</div>
