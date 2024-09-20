<?php
/* Smarty version 4.5.3, created on 2024-09-13 16:03:14
  from '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_photo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e462428742c8_35577987',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1405c71290c83113a327dd8b2f9b5be450cecac9' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_photo.tpl',
      1 => 1725499308,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66e462428742c8_35577987 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="<?php if ($_smarty_tpl->tpl_vars['_small']->value) {?>col-4<?php } else { ?>col-6 col-md-4 col-lg-2<?php }?> <?php if ($_smarty_tpl->tpl_vars['photo']->value['blur']) {?>x-blured<?php }?>">
  <a class="pg_photo <?php if (!$_smarty_tpl->tpl_vars['_small']->value) {?>large<?php }?> js_lightbox" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['photo']->value['photo_id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['photo']->value['photo_id'];?>
" data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value['source'];?>
" data-context="<?php echo $_smarty_tpl->tpl_vars['_context']->value;?>
" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value['source'];?>
);">
    <?php if (!$_smarty_tpl->tpl_vars['_small']->value && ($_smarty_tpl->tpl_vars['_manage']->value || $_smarty_tpl->tpl_vars['photo']->value['manage'])) {?>
      <div class="pg_photo-btn">
        <button type="button" class="btn-close js_delete-photo" data-id="<?php echo $_smarty_tpl->tpl_vars['photo']->value['photo_id'];?>
" data-bs-toggle="tooltip" title='<?php echo __("Delete");?>
'>

        </button>
      </div>
    <?php }?>
  </a>
</div><?php }
}
