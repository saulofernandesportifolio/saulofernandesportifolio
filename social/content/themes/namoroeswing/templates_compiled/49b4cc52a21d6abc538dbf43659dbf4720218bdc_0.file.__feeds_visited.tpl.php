<?php
/* Smarty version 4.5.3, created on 2024-09-13 16:18:30
  from '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_visited.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e465d64613a9_94128356',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49b4cc52a21d6abc538dbf43659dbf4720218bdc' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_visited.tpl',
      1 => 1726243948,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 2,
    'file:__reaction_emojis.tpl' => 1,
  ),
),false)) {
function content_66e465d64613a9_94128356 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="feeds-item-recomend <?php if (!$_smarty_tpl->tpl_vars['visitedion']->value['seen']) {?>unread<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['visitedion']->value['user_id'];?>
">
  <a class="data-container" href="<?php echo $_smarty_tpl->tpl_vars['visitedion']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['visitedion']->value['action'] == "mass_recomedation") {?>target="_blank" <?php }?>>
    <div class="data-avatar">
      <img src="<?php echo $_smarty_tpl->tpl_vars['visitedion']->value['user_picture'];?>
" alt="">
    </div>
    <div class="data-content">
      <div>
        <span class="name"><?php echo $_smarty_tpl->tpl_vars['visitedion']->value['name'];?>
</span>
        <?php if ($_smarty_tpl->tpl_vars['visitedion']->value['user_subscribed'] || $_smarty_tpl->tpl_vars['visitedion']->value['user_package']) {?>
          <span class="pro-badge" data-bs-toggle="tooltip" title='<?php echo __("Pro User");?>
'>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pro_badge",'width'=>"20px",'height'=>"20px"), 0, false);
?>
          </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['visitedion']->value['user_verified'] && $_smarty_tpl->tpl_vars['visitedion']->value['package_name'] == "Plano 180") {?>
          <span class="verified-badge" data-bs-toggle="tooltip" title='<?php echo __("Verified User");?>
'>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), 0, true);
?>
          </span>
        <?php }?>
      </div>
      <div>
        <?php if ($_smarty_tpl->tpl_vars['visitedion']->value['reaction']) {?>
          <div class="reaction-btn float-start mr5">
            <div class="reaction-btn-icon">
              <div class="inline-emoji no_animation">
                <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['visitedion']->value['reaction']), 0, false);
?>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <i class="<?php echo $_smarty_tpl->tpl_vars['visitedion']->value['icon'];?>
 mr5"></i>
        <?php }?>
        <?php echo $_smarty_tpl->tpl_vars['visitedion']->value['message'];?>

      </div>
      <div class="time js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['visitedion']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['visitedion']->value['time'];?>
</div>
    </div>
  </a>
</li><?php }
}
