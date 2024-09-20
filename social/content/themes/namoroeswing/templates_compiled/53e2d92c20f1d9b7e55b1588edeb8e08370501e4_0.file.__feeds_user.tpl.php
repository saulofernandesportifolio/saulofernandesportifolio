<?php
/* Smarty version 4.5.3, created on 2024-09-13 16:18:30
  from '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e465d62e1eb7_77001062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53e2d92c20f1d9b7e55b1588edeb8e08370501e4' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_user.tpl',
      1 => 1726243916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 5,
    'file:__reaction_emojis.tpl' => 1,
  ),
),false)) {
function content_66e465d62e1eb7_77001062 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/social/vendor/smarty/smarty/libs/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
if ($_smarty_tpl->tpl_vars['_tpl']->value == "box") {?>
  <div class="col-md-6 col-lg-3">
    <div class="ui-box <?php if ($_smarty_tpl->tpl_vars['_darker']->value) {?>darker<?php }?>">
      <div class="img">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
">
          <img alt="" src="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_picture'];?>
" />
        </a>
      </div>
      <div class="mt10">
        <span class="js_user-popover" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
          <a class="h6" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {?>
              <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>

            <?php } else { ?>
              <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>

            <?php }?>
          </a>
        </span>
        <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_subscribed']) {?>
          <span class="pro-badge" data-bs-toggle="tooltip" title='<?php echo __("Pro User");?>
'>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pro_badge",'width'=>"20px",'height'=>"20px"), 0, false);
?>
          </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_verified'] && $_smarty_tpl->tpl_vars['_user']->value['package_name'] == "Plano 180") {?>
          <span class="verified-badge" data-bs-toggle="tooltip" title='<?php echo __("Verified User");?>
'>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), 0, true);
?>
          </span>
        <?php }?>
      </div>
      <div class="mt10">
        <!-- buttons -->
        <?php if ($_smarty_tpl->tpl_vars['_connection']->value == "request") {?>
          <button type="button" class="btn btn-sm btn-primary js_friend-accept" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Confirm");?>
</button>
          <button type="button" class="btn btn-sm btn-danger js_friend-decline" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Decline");?>
</button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "add") {?>
          <button type="button" class="btn btn-sm btn-success js_friend-add" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-user-plus mr5"></i><?php if ($_smarty_tpl->tpl_vars['_small']->value) {
echo __("Add");
} else {
echo __("Add Friend");
}?>
          </button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "cancel") {?>
          <button type="button" class="btn btn-sm btn-light js_friend-cancel" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-clock mr5"></i><?php echo __("Sent");?>

          </button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "remove") {?>
          <button type="button" class="btn btn-sm btn-light <?php if (!$_smarty_tpl->tpl_vars['_no_action']->value) {?>btn-delete<?php }?> js_friend-remove" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-check mr5"></i><?php echo __("Friends");?>

          </button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "follow") {?>
          <button type="button" class="btn btn-sm btn-info js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-rss mr5"></i><?php echo __("Follow");?>

          </button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "unfollow") {?>
          <button type="button" class="btn btn-sm btn-info js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-check mr5"></i><?php echo __("Following");?>

          </button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "recommend") {?>
          <button type="button" class="btn btn-sm js_recommend" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-thumbs-up mr5"></i><?php echo __("Recommend");?>

          </button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "disrecommend") {?>
          <button type="button" class="btn btn-sm js_disrecommend" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
             <i class="fa fa-thumbs-down mr5"></i><?php echo __("Disrecommend");?>

          </button>          

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "blocked") {?>
          <button type="button" class="btn btn-sm btn-danger js_unblock-user" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-trash mr5"></i><?php echo __("Unblock");?>

          </button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_invite") {?>
          <button type="button" class="btn btn-info btn-sm js_page-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-user-plus mr5"></i><?php echo __("Invite");?>

          </button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_manage") {?>
          <button type="button" class="btn btn-danger js_page-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-trash mr5"></i><?php echo __("Remove");?>

          </button>
          <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
            <button type="button" class="btn btn-danger js_page-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-trash mr5"></i><?php echo __("Remove Admin");?>

            </button>
          <?php } else { ?>
            <button type="button" class="btn btn-primary js_page-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-check mr5"></i><?php echo __("Make Admin");?>

            </button>
          <?php }?>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_invite") {?>
          <button type="button" class="btn btn-sm btn-info js_group-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-user-plus mr5"></i><?php echo __("Add");?>

          </button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_request") {?>
          <button type="button" class="btn btn-sm btn-primary js_group-request-accept" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Approve");?>
</button>
          <button type="button" class="btn btn-sm btn-danger js_group-request-decline" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Decline");?>
</button>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_manage") {?>
          <button type="button" class="btn btn-sm btn-danger js_group-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-trash mr5"></i><?php echo __("Remove");?>

          </button>
          <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
            <button type="button" class="btn btn-sm btn-danger js_group-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-trash mr5"></i><?php echo __("Remove Admin");?>

            </button>
          <?php } else { ?>
            <button type="button" class="btn btn-sm btn-primary js_group-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-check mr5"></i><?php echo __("Make Admin");?>

            </button>
          <?php }?>

        <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "event_invite") {?>
          <button type="button" class="btn btn-sm btn-info js_event-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <i class="fa fa-user-plus mr5"></i> <?php echo __("Invite");?>

          </button>

        <?php }?>
        <!-- buttons -->
      </div>
    </div>
  </div>
<?php } elseif ($_smarty_tpl->tpl_vars['_tpl']->value == "list") {?>
  <li class="feeds-item" <?php if ($_smarty_tpl->tpl_vars['_user']->value['id']) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['id'];?>
" <?php }?>>
    <div class="data-container <?php if ($_smarty_tpl->tpl_vars['_small']->value) {?>small<?php }?>">
      <a class="data-avatar" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
        <img src="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_picture'];?>
" alt="">
        <?php if ($_smarty_tpl->tpl_vars['_reaction']->value) {?>
          <div class="data-reaction">
            <div class="inline-emoji no_animation">
              <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['_reaction']->value), 0, false);
?>
            </div>
          </div>
        <?php }?>
      </a>
      <div class="data-content">
        <div class="float-end">
          <!-- buttons -->
          <?php if ($_smarty_tpl->tpl_vars['_connection']->value == "request") {?>
            <button type="button" class="btn btn-sm btn-primary js_friend-accept" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Confirm");?>
</button>
            <button type="button" class="btn btn-sm btn-danger js_friend-decline" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Decline");?>
</button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "add") {?>
            <button type="button" class="btn btn-sm btn-light rounded-pill js_friend-add" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"user_add",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?>
            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "cancel") {?>
            <button type="button" class="btn btn-sm btn-warning js_friend-cancel" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-clock mr5"></i><?php echo __("Sent");?>

            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "remove") {?>
            <button type="button" class="btn btn-sm btn-success <?php if (!$_smarty_tpl->tpl_vars['_no_action']->value) {?>btn-delete<?php }?> js_friend-remove" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-check mr5"></i><?php echo __("Friends");?>

            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "follow") {?>
            <button type="button" class="btn btn-sm js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-rss mr5"></i><?php echo __("Follow");?>

            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "unfollow") {?>
            <button type="button" class="btn btn-sm js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-check mr5"></i><?php echo __("Following");?>

            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "recommend") {?>
            <button type="button" class="btn btn-sm js_recommend" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-thumbs-up mr5"></i><?php echo __("Recommend");?>

            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "disrecommend") {?>
            <button type="button" class="btn btn-sm js_disrecommend" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-thumbs-down mr5"></i><?php echo __("Disrecommend");?>

            </button>  

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "blocked") {?>
            <button type="button" class="btn btn-sm btn-danger js_unblock-user" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-trash mr5"></i><?php echo __("Unblock");?>

            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_invite") {?>
            <button type="button" class="btn btn-sm btn-info js_page-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-user-plus mr5"></i><?php echo __("Invite");?>

            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_manage") {?>
            <button type="button" class="btn btn-danger js_page-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-trash mr5"></i><?php echo __("Remove");?>

            </button>
            <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
              <button type="button" class="btn btn-danger js_page-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-trash mr5"></i><?php echo __("Remove Admin");?>

              </button>
            <?php } else { ?>
              <button type="button" class="btn btn-primary js_page-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-check mr5"></i><?php echo __("Make Admin");?>

              </button>
            <?php }?>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_invite") {?>
            <button type="button" class="btn btn-sm btn-info js_group-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-user-plus mr5"></i><?php echo __("Add");?>

            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_request") {?>
            <button type="button" class="btn btn-sm btn-primary js_group-request-accept" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Approve");?>
</button>
            <button type="button" class="btn btn-sm btn-danger js_group-request-decline" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Decline");?>
</button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_manage") {?>
            <button type="button" class="btn btn-sm btn-danger js_group-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-trash mr5"></i><?php echo __("Remove");?>

            </button>
            <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
              <button type="button" class="btn btn-sm btn-danger js_group-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-trash mr5"></i><?php echo __("Remove Admin");?>

              </button>
            <?php } else { ?>
              <button type="button" class="btn btn-sm btn-primary js_group-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-check mr5"></i><?php echo __("Make Admin");?>

              </button>
            <?php }?>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "event_invite") {?>
            <button type="button" class="btn btn-sm btn-info js_event-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-user-plus mr5"></i> <?php echo __("Invite");?>

            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "connected_account_remove") {?>
            <button type="button" class="btn btn-sm btn-danger js_connected-account-remove" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
              <i class="fa fa-trash mr5"></i> <?php echo __("Remove");?>

            </button>

          <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "connected_account_revoke") {?>
            <button type="button" class="btn btn-sm btn-danger js_connected-account-revoke">
              <i class="fa fa-trash mr5"></i> <?php echo __("Revoke");?>

            </button>

          <?php }?>
          <!-- buttons -->
        </div>
        <div class="mt5">
          <span class="name js_user-popover" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
              <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {?>
                <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>

              <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>

              <?php }?>
            </a>
          </span>
          <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_subscribed']) {?>
            <span class="pro-badge" data-bs-toggle="tooltip" title='<?php echo __("Pro User");?>
'>
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pro_badge",'width'=>"20px",'height'=>"20px"), 0, true);
?>
            </span>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_verified'] && $_smarty_tpl->tpl_vars['_user']->value['package_name'] == "Plano 180") {?>
            <span class="verified-badge" data-bs-toggle="tooltip" title='<?php echo __("Verified User");?>
'>
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), 0, true);
?>
            </span>
          <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['_connection']->value != "me" && $_smarty_tpl->tpl_vars['_user']->value['mutual_friends_count'] > 0) {?>
          <div>
            <span class="text-underline" data-toggle="modal" data-url="users/mutual_friends.php?uid=<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_user']->value['mutual_friends_count'];?>
 <?php echo __("mutual friends");?>
</span>
          </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['_donation']->value) {?>
          <div>
            <span class="badge bg-success"><?php echo print_money(smarty_modifier_number_format($_smarty_tpl->tpl_vars['_donation']->value,2));?>
</span>
            <span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['_donation_time']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['_donation_time']->value;?>
</span>
          </div>
        <?php }?>
      </div>
    </div>
  </li>
<?php }
}
}
