<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:16
  from '/var/www/html/social/content/themes/namoroeswing/templates/index.landing.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e457402f56e2_57871412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f71ccbd60e1c0ba14e324061de97b95d72adf49' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/index.landing.tpl',
      1 => 1725499293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sign_form.tpl' => 1,
    'file:__svg_icons.tpl' => 3,
    'file:_footer.links.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_66e457402f56e2_57871412 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid landing-left">
  <div class="row landing-row">
      <div class="col-lg-6 landing-right">
      <div class="landing-intro">
        
        <!-- slider -->
        <div class="landing-slider d-none d-lg-block">
          
        </div>
        <!-- slider -->
        
      </div>
    </div>
    <div class="col-lg-6 landing-right">
      <div class="landing-form">
        <?php $_smarty_tpl->_subTemplateRender('file:_sign_form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('do'=>"in"), 0, false);
?>
        <!--<div class="text-center">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['play_store_badge_enabled']) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['play_store_link'];?>
" target="_blank">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"playstore_badge",'height'=>"68px"), 0, false);
?>
            </a>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['system']->value['appgallery_badge_enabled']) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['appgallery_store_link'];?>
" target="_blank">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"appgallery_badge",'height'=>"50px",'class'=>"mr10"), 0, true);
?>
            </a>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['system']->value['app_store_badge_enabled']) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['app_store_link'];?>
" target="_blank">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"appstore_badge",'height'=>"50px"), 0, true);
?>
            </a>
          <?php }?>
        </div>
      </div>
    </div>         
  </div>
</div>
<div id="exibir">
<?php $_smarty_tpl->_subTemplateRender('file:_footer.links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php echo '<script'; ?>
>
    function changeOcultar(ocultar) {
      const elem = document.getElementById("exibir");
      elem.style.display = "none";
    }
    function changeExibir(exibir) {
      const elem = document.getElementById("exibir");
      elem.style.display = "";
    }
<?php echo '</script'; ?>
><?php }
}
