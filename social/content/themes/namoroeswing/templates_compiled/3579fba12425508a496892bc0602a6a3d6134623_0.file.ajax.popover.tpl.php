<?php
/* Smarty version 4.5.3, created on 2024-09-13 16:44:39
  from '/var/www/html/social/content/themes/namoroeswing/templates/ajax.popover.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e46bf7eb8649_70830847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3579fba12425508a496892bc0602a6a3d6134623' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/ajax.popover.tpl',
      1 => 1726201480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 6,
  ),
),false)) {
function content_66e46bf7eb8649_70830847 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['type']->value == "user") {?>
  <!-- user popover -->
  <div class="user-popover-content">
    <div class="user-card">
      <div class="user-card-cover" <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_cover']) {?>style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover'];?>
');" <?php }?>>
      </div>
      <div class="user-card-avatar">
        <img src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
" alt="">
      </div>
      <div class="user-card-info">
        <a class="name" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {?>
            <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>

          <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>

          <?php }?>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_verified'] && $_smarty_tpl->tpl_vars['profile']->value['package_name'] == "Plano 180") {?>
          <span class="verified-badge" data-bs-toggle="tooltip" title='<?php echo __("Verified User");?>
'>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), 0, false);
?>
          </span>
        <?php }?>
        <div class="info">
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followers"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followers_count'];?>
 <?php echo __("followers");?>
</a>
        </div>
      </div>
    </div>
    <div class="user-card-meta">
      <!-- mutual friends -->
      <?php if ($_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] && $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] > 0) {?>
        <div class="mb10">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"16px",'height'=>"16px"), 0, true);
?>
          <span class="text-underline" data-toggle="modal" data-url="users/mutual_friends.php?uid=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'];?>
 <?php echo __("mutual friends");?>
</span>
        </div>
      <?php }?>
      <!-- mutual friends -->
      <!-- work -->
      <?php if ($_smarty_tpl->tpl_vars['system']->value['work_info_enabled']) {?>
        <?php if (!is_empty($_smarty_tpl->tpl_vars['profile']->value['user_work_title'])) {?>
          <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_work'] == "public" || $_smarty_tpl->tpl_vars['profile']->value['we_friends']) {?>
            <div class="mb10">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"jobs",'class'=>"main-icon mr10",'width'=>"16px",'height'=>"16px"), 0, true);
?>
              <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_work_title'];?>
 <?php echo __("at");?>
 <span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_work_place'];?>
</span>
            </div>
          <?php }?>
        <?php }?>
      <?php }?>
      <!-- work -->
      <!-- hometown -->
      <?php if ($_smarty_tpl->tpl_vars['system']->value['location_info_enabled']) {?>
        <?php if (!is_empty($_smarty_tpl->tpl_vars['profile']->value['user_hometown'])) {?>
          <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "public" || $_smarty_tpl->tpl_vars['profile']->value['we_friends']) {?>
            <div class="mb10">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"home",'class'=>"main-icon mr10",'width'=>"16px",'height'=>"16px"), 0, true);
?>
              <?php echo __("From");?>
 <span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_hometown'];?>
</span>
            </div>
          <?php }?>
        <?php }?>
      <?php }?>
      <!-- hometown -->
    </div>
    <div class="popover-footer">
      <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] != $_smarty_tpl->tpl_vars['profile']->value['user_id']) {?>
        <!-- add friend -->
        <?php if ($_smarty_tpl->tpl_vars['profile']->value['we_friends']) {?>
          <button type="button" class="btn btn-sm btn-success btn-delete rounded-pill js_friend-remove" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
            <i class="fa fa-check mr5"></i><?php echo __("Friends");?>

          </button>
        <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['he_request']) {?>
          <button type="button" class="btn btn-sm btn-primary rounded-pill js_friend-accept" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo __("Confirm");?>
</button>
          <button type="button" class="btn btn-sm btn-danger rounded-pill js_friend-decline" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo __("Decline");?>
</button>
        <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['i_request']) {?>
          <button type="button" class="btn btn-sm btn-warning rounded-pill js_friend-cancel" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
            <i class="fa fa-user-plus mr5"></i><?php echo __("Sent");?>

          </button>
        <?php } else { ?>
          <button type="button" class="btn btn-sm btn-success rounded-pill js_friend-add" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
            <i class="fa fa-user-plus mr5"></i><?php echo __("Add Friend");?>

          </button>
        <?php }?>
        <!-- add friend -->

        <!-- follow -->
        <?php if ($_smarty_tpl->tpl_vars['profile']->value['i_follow']) {?>
          <button type="button" class="btn btn-sm btn-light rounded-pill js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
            <i class="fa fa-check mr5"></i><?php echo __("Following");?>

          </button>
        <?php } else { ?>
          <button type="button" class="btn btn-sm btn-light rounded-pill js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
            <i class="fa fa-rss mr5"></i><?php echo __("Follow");?>

          </button>
        <?php }?>
        <!-- follow -->


        <!-- recommend-->
        <?php if ($_smarty_tpl->tpl_vars['profile']->value['i_recommend'] || $_smarty_tpl->tpl_vars['this']->value->_data['recommends_ids']) {?>
           <button type="button" class="btn btn-md rounded-pill btn-light js_disrecommend" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
              <i class="fa fa-thumbs-down mr5"></i><?php echo __("Disrecommend");?>

           </button>
        <?php } else { ?>
           <button type="button" class="btn btn-md rounded-pill btn-light js_recommend" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
              <i class="fa fa-thumbs-up mr5"></i><?php echo __("Recommend");?>

            </button>
        <?php }?>
        <!-- recommend --> 

        
        <!-- message -->
        <button type="button" class="btn btn-icon rounded-pill btn-light js_chat-start" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-name="<?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];
}?>" data-link="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-messages",'class'=>"main-icon",'width'=>"16px",'height'=>"16px"), 0, true);
?>
        </button>
        <!-- message -->
      <?php } else { ?>
        <!-- edit -->
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile" class="btn btn-sm btn-light rounded-pill">
          <?php echo __("Update");?>

        </a>
        <!-- edit -->
      <?php }?>
    </div>
  </div>
  <!-- user popover -->
<?php } else { ?>
  <!-- page popover -->
  <div class="user-popover-content">
    <div class="user-card">
      <div class="user-card-cover" <?php if ($_smarty_tpl->tpl_vars['profile']->value['page_cover']) {?>style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_cover'];?>
');" <?php }?>></div>
      <div class="user-card-avatar">
        <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_title'];?>
">
      </div>
      <div class="user-card-info">
        <a class="name" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['page_title'];?>
</a>
        <?php if ($_smarty_tpl->tpl_vars['profile']->value['page_verified'] && $_smarty_tpl->tpl_vars['profile']->value['package_name'] == "Plano 180") {?>
          <span class="verified-badge" data-bs-toggle="tooltip" title='<?php echo __("Verified Page");?>
'>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), 0, true);
?>
          </span>
        <?php }?>
        <div class="info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['page_likes'];?>
 <?php echo __("Likes");?>
</div>
      </div>
    </div>
    <div class="popover-footer">
      <!-- like -->
      <?php if ($_smarty_tpl->tpl_vars['profile']->value['i_like']) {?>
        <button type="button" class="btn btn-sm btn-primary js_unlike-page" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_id'];?>
">
          <i class="fa fa-heart mr5"></i><?php echo __("Unlike");?>

        </button>
      <?php } else { ?>
        <button type="button" class="btn btn-primary js_like-page" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_id'];?>
">
          <i class="fa fa-heart mr5"></i><?php echo __("Like");?>

        </button>
      <?php }?>
      <!-- like -->
    </div>
  </div>
  <!-- page popover -->
<?php }
}
}
