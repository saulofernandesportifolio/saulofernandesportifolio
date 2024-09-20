<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:27
  from '/var/www/html/social/content/themes/namoroeswing/templates/__reaction_emojis.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4574b22bc24_30211544',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0beddc6af04897abf2516ba5808bd6daca83ae8b' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/__reaction_emojis.tpl',
      1 => 1725499295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66e4574b22bc24_30211544 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- reaction -->
<div class="emoji">
  <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['reactions']->value[$_smarty_tpl->tpl_vars['_reaction']->value]['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['reactions']->value[$_smarty_tpl->tpl_vars['_reaction']->value]['title'];?>
" />
</div>
<!-- reaction --><?php }
}
