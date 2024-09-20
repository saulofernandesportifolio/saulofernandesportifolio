<?php
/* Smarty version 4.5.3, created on 2024-09-13 16:18:30
  from '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_followerd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e465d648e449_78081782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b091f3e01ff8fd9d0f12a041e7d53fef38b19cf2' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_followerd.tpl',
      1 => 1726243595,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 2,
    'file:__reaction_emojis.tpl' => 1,
  ),
),false)) {
function content_66e465d648e449_78081782 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="feeds-item-recomend <?php if (!$_smarty_tpl->tpl_vars['followerdion']->value['seen']) {?>unread<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['followerdion']->value['user_id'];?>
">
  <a class="data-container" href="<?php echo $_smarty_tpl->tpl_vars['followerdion']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['followerdion']->value['action'] == "mass_recomedation") {?>target="_blank" <?php }?>>
    <div class="data-avatar">
      <img src="<?php echo $_smarty_tpl->tpl_vars['followerdion']->value['user_picture'];?>
" alt="">
    </div>
    <div class="data-content">
      <div>
        <span class="name"><?php echo $_smarty_tpl->tpl_vars['followerdion']->value['name'];?>
</span>
        <?php if ($_smarty_tpl->tpl_vars['followerdion']->value['user_subscribed'] || $_smarty_tpl->tpl_vars['followerdion']->value['user_package']) {?>
          <span class="pro-badge" data-bs-toggle="tooltip" title='<?php echo __("Pro User");?>
'>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pro_badge",'width'=>"20px",'height'=>"20px"), 0, false);
?>
          </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['followerdion']->value['user_verified'] && $_smarty_tpl->tpl_vars['followerdion']->value['package_name'] == "Plano 180") {?>
          <span class="verified-badge" data-bs-toggle="tooltip" title='<?php echo __("Verified User");?>
'>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), 0, true);
?>
          </span>
        <?php }?>
      </div>
      <div>
        <?php if ($_smarty_tpl->tpl_vars['followerdion']->value['reaction']) {?>
          <div class="reaction-btn float-start mr5">
            <div class="reaction-btn-icon">
              <div class="inline-emoji no_animation">
                <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['followerdion']->value['reaction']), 0, false);
?>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <i class="<?php echo $_smarty_tpl->tpl_vars['followerdion']->value['icon'];?>
 mr5"></i>
        <?php }?>
        <?php echo $_smarty_tpl->tpl_vars['followerdion']->value['message'];?>

      </div>
      <div class="time js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['followerdion']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['followerdion']->value['time'];?>
</div>
    </div>
  </a>
</li><?php }
}
