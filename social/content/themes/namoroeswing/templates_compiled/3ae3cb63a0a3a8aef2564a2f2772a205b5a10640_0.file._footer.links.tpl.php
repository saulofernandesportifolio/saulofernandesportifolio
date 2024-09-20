<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:16
  from '/var/www/html/social/content/themes/namoroeswing/templates/_footer.links.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e45740509424_05180535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ae3cb63a0a3a8aef2564a2f2772a205b5a10640' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/_footer.links.tpl',
      1 => 1725499294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66e45740509424_05180535 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- footer links -->
<div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?>">
  <div class="row footer <?php if ($_smarty_tpl->tpl_vars['page']->value == 'index' && !$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>border-top-0<?php }?>">
    <div class="col-sm-6 dropdown">
      <span class="mr5">&copy; <?php echo date('Y');?>
 <?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
</span>
      <!-- language -->
      <a href="#" class="language-dropdown" data-bs-toggle="dropdown">
        <img width="16" height="16" class="mr10" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['language']['flag'];?>
">
        <span><?php echo $_smarty_tpl->tpl_vars['system']->value['language']['title'];?>
</span>
      </a>
      <div class="dropdown-menu">
        <div class="js_scroller">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['system']->value['languages'], 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
            <a class="dropdown-item" href="?lang=<?php echo $_smarty_tpl->tpl_vars['language']->value['code'];?>
">
              <img width="16" height="16" class="mr10" src="<?php echo $_smarty_tpl->tpl_vars['language']->value['flag'];?>
"><?php echo $_smarty_tpl->tpl_vars['language']->value['title'];?>

            </a>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
      </div>
      <!-- language -->
    </div>

    <div class="col-sm-6 links">
      <?php if ($_smarty_tpl->tpl_vars['static_pages']->value) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['static_pages']->value, 'static_page');
$_smarty_tpl->tpl_vars['static_page']->index = -1;
$_smarty_tpl->tpl_vars['static_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['static_page']->value) {
$_smarty_tpl->tpl_vars['static_page']->do_else = false;
$_smarty_tpl->tpl_vars['static_page']->index++;
$_smarty_tpl->tpl_vars['static_page']->first = !$_smarty_tpl->tpl_vars['static_page']->index;
$__foreach_static_page_10_saved = $_smarty_tpl->tpl_vars['static_page'];
?>
          <a <?php if (!$_smarty_tpl->tpl_vars['static_page']->first) {?>class="pl10" <?php }?> href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/static/<?php echo $_smarty_tpl->tpl_vars['static_page']->value['page_url'];?>
">
            <?php echo __($_smarty_tpl->tpl_vars['static_page']->value['page_title']);?>

          </a>
        <?php
$_smarty_tpl->tpl_vars['static_page'] = $__foreach_static_page_10_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['system']->value['contact_enabled']) {?>
        <a class="pl10" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/contacts">
          <?php echo __("Contact Us");?>

        </a>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['system']->value['directory_enabled']) {?>
        <a class="pl10" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/directory">
          <?php echo __("Directory");?>

        </a>
      <?php }?>
    </div>
  </div>
</div>
<!-- footer links --><?php }
}
