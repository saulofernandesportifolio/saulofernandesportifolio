<?php
/* Smarty version 4.5.3, created on 2024-09-13 16:03:14
  from '/var/www/html/social/content/themes/namoroeswing/templates/profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e462424df616_42899527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49c149167f2487ecd456935a429981a475f1d6de' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/profile.tpl',
      1 => 1726243377,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header_profile.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__svg_icons.tpl' => 61,
    'file:__feeds_visited.tpl' => 1,
    'file:__feeds_followerd.tpl' => 1,
    'file:__feeds_follower.tpl' => 1,
    'file:__feeds_recomedation.tpl' => 1,
    'file:_need_subscription.tpl' => 5,
    'file:_publisher.tpl' => 2,
    'file:_pinned_post.tpl' => 1,
    'file:_posts.tpl' => 1,
    'file:__feeds_photo.tpl' => 2,
    'file:__feeds_user.tpl' => 4,
    'file:__feeds_album.tpl' => 1,
    'file:_album.tpl' => 1,
    'file:__feeds_video.tpl' => 1,
    'file:__feeds_page.tpl' => 1,
    'file:_no_data.tpl' => 6,
    'file:__feeds_group.tpl' => 1,
    'file:__feeds_event.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_66e462424df616_42899527 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/social/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header_profile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> sg-offcanvas">
  <div class="row">

    <!-- side panel -->
    <div class="col-12 d-block d-md-none sg-offcanvas-sidebar mt20">
      <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
    <!-- side panel -->

    <!-- content panel -->
    <div class="col-12 sg-offcanvas-mainbar">
      <!-- profile-header -->
      <div class="profile-header">
        <!-- profile-cover -->
        <div class="profile-cover-wrapper">       
          <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_cover_id']) {?>
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['countPhotos'] > 1) {?>
              <!-- full-cover -->
              <img class="js_position-cover-full_a x-hidden" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full_a'];?>
">
              <!-- full-cover -->

              <!-- cropped-cover -->
             <!--<img class="js_position-cover-cropped_a <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_cover_lightbox']) {?>js_lightbox<?php }?>" data-init-position="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_position'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_id_a'];?>
" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full_a'];?>
" data-context="album" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_a'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
">-->
              <!-- cropped-cover -->
              
              <!-- full-cover -->
              <img class="js_position-cover-full_b x-hidden" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full_b'];?>
">
              <!-- full-cover -->

              <!-- cropped-cover -->
              <!--<img class="js_position-cover-cropped_b <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_cover_lightbox']) {?>js_lightbox<?php }?>" data-init-position="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_position'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_id_b'];?>
" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full_b'];?>
" data-context="album" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_b'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
">-->
              <!-- cropped-cover -->

              <div id="ladoalado">
                <!--<img src="https://unsplash.it/100/100"><img src="https://unsplash.it/101/100">-->
                <!-- cropped-cover -->
                <img class="js_position-cover-cropped_a <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_cover_lightbox']) {?>js_lightbox<?php }?>" data-init-position="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_position'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_id_a'];?>
" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full_a'];?>
" data-context="album" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_a'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
">
                <!-- cropped-cover -->

                <!-- cropped-cover -->
                <img class="js_position-cover-cropped_b <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_cover_lightbox']) {?>js_lightbox<?php }?>" data-init-position="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_position'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_id_b'];?>
" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full_b'];?>
" data-context="album" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_b'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
">
                <!-- cropped-cover -->
              </div> 


            <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['countPhotos'] == 1) {?>
              <!-- full-cover -->
              <img class="js_position-cover-full x-hidden" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full'];?>
">
              <!-- full-cover -->

              <!-- cropped-cover -->
              <img class="js_position-cover-cropped <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_cover_lightbox']) {?>js_lightbox<?php }?>" data-init-position="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_position'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_id'];?>
" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full'];?>
" data-context="album" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
">
              <!-- cropped-cover -->
            <?php }?>

          <?php }?>

          <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
            <!-- buttons -->
            <div class="profile-cover-buttons">
              <div class="profile-cover-change">
                <i class="fa fa-camera js_x-uploader" data-handle="cover-user"></i>
              </div>
             <!-- <div class="profile-cover-position <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_cover']) {?>x-hidden<?php }?>">
                <input class="js_position-picture-val" type="hidden" name="position-picture-val">
                <i class="fa fa-crop-alt js_init-position-picture" data-handle="user" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"></i>
              </div>-->
             <!--<div class="profile-cover-position-buttons">
                <i class="fa fa-check fa-fw js_save-position-picture"></i>
              </div>-->
              <div class="profile-cover-position-buttons">
                <i class="fa fa-check fa-fw js_cancel-position-picture"></i>
              </div>
              <!--<div class="profile-cover-position-buttons">
                <i class="fa fa-times fa-fw js_cancel-position-picture"></i>
              </div>-->
              <div class="profile-cover-delete <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_cover']) {?>x-hidden<?php }?>">
                <i class="fa fa-trash js_delete-cover" data-handle="cover-user" data-id=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_id_a'];?>
 data-countphotos="<?php echo $_smarty_tpl->tpl_vars['profile']->value['countPhotos'];?>
"></i>
              </div>
            </div>
            <!-- buttons -->

            <!-- loaders -->
            <!--<div class="profile-cover-change-loader">
              <div class="progress x-progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>-->
            <!--<div class="profile-cover-position-loader">
              <i class="fa fa-arrows-alt mr5"></i><?php echo __("Drag to reposition cover");?>

            </div>-->
            <!-- loaders -->
          <?php }?>
        </div>
        <!-- profile-cover -->

        <!-- profile-avatar -->
        <div class="profile-avatar-wrapper">
          <img <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_picture_id']) {?> <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_picture_lightbox']) {?>class="js_lightbox" <?php }?> data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture_id'];?>
" data-context="album" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture_full'];?>
" <?php } elseif (!$_smarty_tpl->tpl_vars['profile']->value['user_picture_default']) {?> class="js_lightbox-nodata" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
" <?php }?> src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
">

          <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
            <!-- buttons -->
            <div class="profile-avatar-change">
              <i class="fa fa-camera" data-bs-toggle="dropdown" data-display="static"></i>
              <div class="dropdown-menu action-dropdown-menu">
                <!-- upload -->
                <div class="dropdown-item pointer js_x-uploader" data-handle="picture-user">
                  <div class="action">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"camera",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, false);
?>
                    <?php echo __("Upload Photo");?>

                  </div>
                  <div class="action-desc"><?php echo __("Upload a new photo");?>
</div>
                </div>
                <!-- upload -->
                <!-- select -->
                <div class="dropdown-item pointer" data-toggle="modal" data-url="users/photos.php?type=user&id=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                  <div class="action">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                    <?php echo __("Select Photo");?>

                  </div>
                  <div class="action-desc"><?php echo __("Select a photo");?>
</div>
                </div>
                <!-- select -->
              </div>
            </div>
            <div class="profile-avatar-crop <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_picture_default'] || !$_smarty_tpl->tpl_vars['profile']->value['user_picture_id']) {?>x-hidden<?php }?>">
              <i class="fa fa-crop-alt js_init-crop-picture" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture_full'];?>
" data-handle="user" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"></i>
            </div>
            <div class="profile-avatar-delete <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_picture_default']) {?>x-hidden<?php }?>">
              <i class="fa fa-trash js_delete-picture" data-handle="picture-user"></i>
            </div>
            <!-- buttons -->
            <!-- loaders -->
            <div class="profile-avatar-change-loader">
              <div class="progress x-progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <!-- loaders -->
          <?php }?>
        </div>
        <!-- profile-avatar -->

        <!-- profile-name -->
        <div class="profile-name-wrapper">
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
</a>
          <div id="ladoaladoselos">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_subscribed']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="badge" data-bs-toggle="tooltip" title="<?php echo __($_smarty_tpl->tpl_vars['profile']->value['package_name']);?>
 <?php echo __('Member');?>
">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pro_badge",'width'=>"50px",'height'=>"50px"), 0, true);
?>
              </a>
            <?php }?>          
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_verified'] && $_smarty_tpl->tpl_vars['profile']->value['package_name'] == "Plano 180") {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="badge" data-bs-toggle="tooltip" title="<?php echo __("Verified User");?>
 <?php echo __('Member');?>
">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"50px",'height'=>"50px"), 0, true);
?>
              </a>&nbsp            
            <?php }?>
          </div>          
        </div>
        <!-- profile-name -->

        <!-- profile-buttons -->
        <div class="profile-buttons-wrapper">
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] != $_smarty_tpl->tpl_vars['profile']->value['user_id']) {?>
              <!-- add friend -->
              <?php if ($_smarty_tpl->tpl_vars['profile']->value['we_friends']) {?>
                <button type="button" class="btn btn-md rounded-pill btn-success btn-delete js_friend-remove" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                  <i class="fa fa-check mr5"></i><?php echo __("Friends");?>

                </button>
              <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['he_request']) {?>
                <button type="button" class="btn btn-md rounded-pill btn-primary js_friend-accept" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo __("Confirm");?>
</button>
                <button type="button" class="btn btn-md rounded-pill btn-danger js_friend-decline" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo __("Decline");?>
</button>
              <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['i_request']) {?>
                <button type="button" class="btn btn-md rounded-pill btn-light js_friend-cancel" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                  <i class="fa fa-clock mr5"></i><?php echo __("Sent");?>

                </button>
              <?php } elseif (!$_smarty_tpl->tpl_vars['profile']->value['friendship_declined']) {?>
                <button type="button" class="btn btn-md rounded-pill btn-success js_friend-add" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                  <i class="fa fa-user-plus mr5"></i><?php echo __("Add Friend");?>

                </button>
              <?php }?>
              <!-- add friend -->

              <!-- follow -->
              <?php if ($_smarty_tpl->tpl_vars['profile']->value['i_follow']) {?>
                <button type="button" class="btn btn-md rounded-pill btn-light js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                  <i class="fa fa-check mr5"></i><?php echo __("Following");?>

                </button>
              <?php } else { ?>
                <button type="button" class="btn btn-md rounded-pill btn-light js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
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
              <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
                 <button type="button" class="btn btn-icon rounded-pill btn-light mlr5" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-messages",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                 </button>
                <?php } else { ?>
                 <button type="button" class="btn btn-icon rounded-pill btn-light mlr5 js_chat-start" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
" data-link="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-messages",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                 </button>
              <?php }?>


              <!-- message -->

              <!-- poke & report & block -->
              <div class="d-inline-block dropdown">
                <button type="button" class="btn btn-icon rounded-pill btn-light" data-bs-toggle="dropdown" data-display="static">
                  <i class="fa fa-ellipsis-v fa-fw"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end action-dropdown-menu">
                  <!-- poke -->
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['pokes_enabled'] && !$_smarty_tpl->tpl_vars['profile']->value['i_poked']) {?>
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_poke'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_poke'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                      <div class="dropdown-item pointer js_poke" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
">
                        <div class="action">
                          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"poke",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                          <?php echo __("Poke");?>

                        </div>
                        <div class="action-desc"><?php echo __("Let them know you are here");?>
</div>
                      </div>
                    <?php }?>
                  <?php }?>
                  <!-- poke -->
                  <!-- report -->
                  <div class="dropdown-item pointer" data-toggle="modal" data-url="data/report.php?do=create&handle=user&id=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                    <div class="action">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"report",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                      <?php echo __("Report");?>

                    </div>
                    <div class="action-desc"><?php echo __("Report this to admins");?>
</div>
                  </div>
                  <!-- report -->
                  <!-- block -->
                  <div class="dropdown-item pointer js_block-user" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                    <div class="action">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"block",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                      <?php echo __("Block");?>

                    </div>
                    <div class="action-desc"><?php echo __("This user won't be able to reach you");?>
</div>
                  </div>
                  <!-- block -->
                  <!-- manage -->
                  <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/admincp/users/edit/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                      <?php echo __("Edit in Admin Panel");?>

                    </a>
                  <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->_is_moderator) {?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/modcp/users/edit/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                      <?php echo __("Edit in Moderator Panel");?>

                    </a>
                  <?php }?>
                  <!-- manage -->
                </div>
              </div>
              <!-- poke & report & block -->
            <?php } else { ?>
              <!-- edit -->
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile" class="btn btn-icon btn-rounded btn-light">
                <i class="fa fa-pencil-alt fa-fw"></i>
              </a>
              <!-- edit -->
            <?php }?>
          <?php }?>
        </div>
        <!-- profile-buttons -->
      </div>
      <!-- profile-header -->

      <!-- profile-resumo -->
      <div class="card">
        <div class="card-body">
            <div class="container-fluid">
              <div class="row justify-content-md-center resumo-size">
                  <div class="col-sm-3">
                    <div align="center"><?php echo $_smarty_tpl->tpl_vars['profile']->value['visited'];?>
</div>
                      <!-- Button trigger modal -->
                      <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropVisited" data-display="static"><div align="center">Visualizações <i class="fa fa-eye mr5"></i></div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="staticBackdropVisited" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelVisited" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-rightred">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabelVisited"></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">                                                    
                              <span class="title"><h5><?php echo __("visited");?>
</h5></span>  
                            <div class="dropdown-widget-body">
                              <div class="js_scroller">
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['visited']) {?>
                                  <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['visited'], 'visitedion');
$_smarty_tpl->tpl_vars['visitedion']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['visitedion']->value) {
$_smarty_tpl->tpl_vars['visitedion']->do_else = false;
?>
                                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_visited.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                  </ul>
                                <?php } else { ?>
                                  <p class="text-center text-muted mt10">
                                    <?php echo __("No visited");?>

                                  </p>
                                <?php }?>
                              </div>
                            </div>
                        </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary btn btn-block" data-bs-dismiss="modal"><?php echo __("Close");?>
</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal -->
                  </div>

                  <div class="col-sm-2">
                    <div align="center"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followerd'];?>
</div>
                      <!-- Button trigger modal -->
                      <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropFollowerd" data-display="static"><div align="center">Seguindo <i class="fa fa-eye mr5"></i></div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="staticBackdropFollowerd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelFollowerd" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-rightred">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabelFollowerd"></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">                                                    
                              <span class="title"><h5><?php echo __("followerd");?>
</h5></span>  
                            <div class="dropdown-widget-body">
                              <div class="js_scroller">
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['followerd']) {?>
                                  <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['followerd'], 'followerdion');
$_smarty_tpl->tpl_vars['followerdion']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['followerdion']->value) {
$_smarty_tpl->tpl_vars['followerdion']->do_else = false;
?>
                                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_followerd.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                  </ul>
                                <?php } else { ?>
                                  <p class="text-center text-muted mt10">
                                    <?php echo __("No followerd");?>

                                  </p>
                                <?php }?>
                              </div>
                            </div>
                        </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary btn btn-block" data-bs-dismiss="modal"><?php echo __("Close");?>
</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal -->
                  </div>

                  <div class="col-sm-3">
                    <div align="center"><?php echo $_smarty_tpl->tpl_vars['profile']->value['follower'];?>
</div>
                      <!-- Button trigger modal -->
                      <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropFollower" data-display="static"><div align="center">Seguidores <i class="fa fa-eye mr5"></i></div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="staticBackdropFollower" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelFollower" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-rightred">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabelFollower"></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">                                                    
                              <span class="title"><h5><?php echo __("followers");?>
</h5></span>  
                            <div class="dropdown-widget-body">
                              <div class="js_scroller">
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['followers']) {?>
                                  <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['followers'], 'followerion');
$_smarty_tpl->tpl_vars['followerion']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['followerion']->value) {
$_smarty_tpl->tpl_vars['followerion']->do_else = false;
?>
                                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_follower.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                  </ul>
                                <?php } else { ?>
                                  <p class="text-center text-muted mt10">
                                    <?php echo __("No followers");?>

                                  </p>
                                <?php }?>
                              </div>
                            </div>
                        </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary btn btn-block" data-bs-dismiss="modal"><?php echo __("Close");?>
</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal -->
                  </div>
                  
                  <div class="col-sm-3">
                    <div align="center"><?php echo $_smarty_tpl->tpl_vars['profile']->value['recommendation'];?>
</div>

                      <!-- Button trigger modal -->
                      <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-display="static"><div align="center">Recomendações <i class="fa fa-eye mr5"></i></div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-rightred">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel"></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">                                                    
                              <span class="title"><h5><?php echo __("Recommendations");?>
</h5></span>  
                            <div class="dropdown-widget-body">
                              <div class="js_scroller">
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['recommendations']) {?>
                                  <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['recommendations'], 'recommendation');
$_smarty_tpl->tpl_vars['recommendation']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['recommendation']->value) {
$_smarty_tpl->tpl_vars['recommendation']->do_else = false;
?>
                                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_recomedation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                  </ul>
                                <?php } else { ?>
                                  <p class="text-center text-muted mt10">
                                    <?php echo __("No Recommendations");?>

                                  </p>
                                <?php }?>
                              </div>
                            </div>
                        </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary btn btn-block" data-bs-dismiss="modal"><?php echo __("Close");?>
</button>
                            </div>
                          </div>
                        </div>
                      </div>   
                      <!-- Modal -->
                  </div>
              </div>
            </div>
        </div>
      </div>
      <!-- profile-resumo -->

      <!--<div class="card">
        <div class="card-body">
         <div class="container-fluid-md-center">
            <div class="row justify-content-md-center">
              <label align="center">Compartilhar por:
                <br>
                <div class="col-sm-2">
                  <a href=whatsapp://send?text=*%20Olha%20esse%20link%20e%20te%20diverte%20com%20as%20fantasias%20do%20mundo%20liberal!%20*%20<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/>WhatsApp <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"whatsapp",'width'=>"24px",'height'=>"24px"), 0, true);
?></a>
                </div>
                <div class="col-sm-2">
                  <a href=https://telegram.me/share/url?url=<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&text=*%20Olha%20esse%20link%20e%20te%20diverte%20com%20as%20fantasias%20do%20mundo%20liberal!%20*%20/>Telegram <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"telegram",'width'=>"24px",'height'=>"24px"), 0, true);
?></a>
                </div>
              </label>
            </div> 
          </div>    
        </div>
      </div>-->

      <!-- panel [about] -->
      <div class="card"> 
        <div class="card-body">
         <ul class="about-list">
           <!-- posts -->
           <li>
             <div class="about-list-item">
               <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsfeed",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
               <?php echo __($_smarty_tpl->tpl_vars['profile']->value['posts_count']);?>
 <?php echo __("Posts");?>

              </div>
            </li>
           <!-- posts -->

           <!-- photos -->
            <li>
             <div class="about-list-item">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __($_smarty_tpl->tpl_vars['profile']->value['photos_count']);?>
 <?php echo __("Photos");?>

              </div>
            </li>
           <!-- photos -->

           <!-- videos -->
            <li>
              <div class="about-list-item">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __($_smarty_tpl->tpl_vars['profile']->value['videos_count']);?>
 <?php echo __("Videos");?>

              </div>
            </li>
          <!-- videos -->

          <!-- info -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['work_info_enabled']) {?>
              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_work_title']) {?>
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_work'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_work'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                  <li>
                     <div class="about-list-item">
                        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"jobs",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                        <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_work_title'];?>

                       <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_work_place']) {?>
                          <?php echo __("at");?>

                          <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_work_url']) {?>
                             <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_work_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_work_place'];?>
</a>
                          <?php } else { ?>
                              <span><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_work_place'];?>
</span>
                          <?php }?>
                        <?php }?>
                      </div>
                  </li>
                <?php }?>
              <?php }?>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['location_info_enabled']) {?>
              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_current_city']) {?>
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                  <li>
                    <div class="about-list-item">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"home",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                      <?php $_smarty_tpl->_assignInScope('ciTyprofile', explode(' - ',$_smarty_tpl->tpl_vars['profile']->value['user_current_city']));?>
                      <?php echo __("Lives in");?>
 <span class="text-dark"><?php echo $_smarty_tpl->tpl_vars['ciTyprofile']->value[0];?>
 - <?php echo $_smarty_tpl->tpl_vars['ciTyprofile']->value[1];?>
</span>
                    </div>
                  </li>
                <?php }?>
              <?php }?>

                 <!-- <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_hometown']) {?>
                     <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                       <li>
                         <div class="about-list-item">
                            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                            <?php echo __("From");?>
 <span class="text-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_hometown'];?>
</span>
                          </div>
                        </li>
                      <?php }?>
                  <?php }?>-->
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['education_info_enabled']) {?>
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_edu_major']) {?>
                  <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_education'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_education'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                    <li>
                       <div class="about-list-item">
                         <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"education",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                         <?php echo __("Studied");?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_edu_major'];?>

                         <?php echo __("at");?>
 <span class="text-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_edu_school'];?>
</span>
                         <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_edu_class']) {?>
                           <div class="details">
                             <?php echo __("Class of");?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_edu_class'];?>

                           </div>
                         <?php }?>
                       </div>
                    </li>
                  <?php }?>
                <?php }?>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_gender'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_gender'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                  <li>
                    <div class="about-list-item">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"genders",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                      <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_gender'];?>

                    </div>
                  </li>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['relationship_info_enabled']) {?>
                 <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_relationship']) {?>
                   <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_relationship'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_relationship'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                      <li>
                         <div class="about-list-item">
                            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"relationship",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                            <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_relationship'] == "relationship") {?>
                              <?php echo __("In a relationship");?>

                            <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['user_relationship'] == "complicated") {?>
                              <?php echo __("It's complicated");?>

                            <?php } else { ?>
                              <?php echo __(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( $_smarty_tpl->tpl_vars['profile']->value['user_relationship'] )));?>

                            <?php }?>
                          </div>
                      </li>
                    <?php }?>
                 <?php }?>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_birthdate'] != null) {?>
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_birthdate'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_birthdate'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                  <li>
                     <div class="about-list-item">
                        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"birthday",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                        <!--<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['profile']->value['user_birthdate'],$_smarty_tpl->tpl_vars['system']->value['system_date_format']);?>
--> <span id="age1"></span> anos
                         <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_birthdate_companions']) {?> / <!--<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['profile']->value['user_birthdate_companions'],$_smarty_tpl->tpl_vars['system']->value['system_date_format']);?>
--><span id="age2"></span> anos<?php } else {
}?>
                      </div>
                      <input type="hidden" class="form-control" id="age_a" name="age_a" value="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_birthdate'];?>
">
                      <input type="hidden" class="form-control" id="age_b" name="age_b" value="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_birthdate_companions'];?>
">
                  </li>
                <?php }?>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['website_info_enabled']) {?>
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_website']) {?>
                   <li>
                     <div class="about-list-item">
                        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"website",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_website'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_website'];?>
</a>
                     </div>
                   </li>
                <?php }?>
              <?php }?>

              <li>
                 <div class="about-list-item">
                   <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                   <?php echo __("Followed by");?>

                   <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followers"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followers_count'];?>
 <?php echo __("people");?>
</a>
                  </div>
              </li>
              <li>
                <div class="about-list-item">
                  <a href=whatsapp://send?text=😈Olha%20esse%20link%20e%20te%20diverte%20com%20as%20fantasias%20do%20mundo%20liberal!😈%20<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"whatsapp",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>Compartilhar no WhatsApp</a>
                </div>
              </li>
              <li>
                <div class="about-list-item">
                  <a href=https://telegram.me/share/url?url=<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&text=😈Olha%20esse%20link%20e%20te%20diverte%20com%20as%20fantasias%20do%20mundo%20liberal!😈/><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"telegram",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>Compartilhar no Telegram</a>
                </div>
              </li>
               <li>
              <div class="about-list-item">
               <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"user_information",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                Membro Desde :
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['profile']->value['user_registered'],$_smarty_tpl->tpl_vars['system']->value['system_date_format']);?>

              </div>
              </li>

              <!-- info -->
              
              <li>
                  <?php if (!is_empty($_smarty_tpl->tpl_vars['profile']->value['user_preference'])) {?>
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"coracao",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                     &nbsp&nbsp&nbsp<?php echo __("Preference");?>
 : 
                        <div class="about-bio">
                          <div class="js_readmore overflow-hidden">
                            <?php echo nl2br((string) $_smarty_tpl->tpl_vars['profile']->value['user_preference'], (bool) 1);?>

                          </div>
                        </div>
                  <?php }?>
              </li>

              <li>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['biography_info_enabled']) {?>
                    <?php if (!is_empty($_smarty_tpl->tpl_vars['profile']->value['user_biography'])) {?>
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"info",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                      &nbsp&nbsp&nbsp<?php echo __("About");?>
 :
                        <div class="about-bio">
                          <div class="js_readmore overflow-hidden">
                            <?php echo nl2br((string) $_smarty_tpl->tpl_vars['profile']->value['user_biography'], (bool) 1);?>

                          </div>
                        </div>
                    <?php }?>
                  <?php }?>
              </li>
          </ul>
        </div>
      </div>
     <!-- panel [about] -->


      <!-- profile-tabs -->
      <div class="profile-tabs-wrapper d-flex justify-content-evenly">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active" <?php }?>>
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsfeed",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
          <span class="ml5 d-none d-xl-inline-block"><?php echo __("Timeline");?>
</span>
        </a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends" <?php if ($_smarty_tpl->tpl_vars['view']->value == "friends" || $_smarty_tpl->tpl_vars['view']->value == "followers" || $_smarty_tpl->tpl_vars['view']->value == "followings") {?>class="active" <?php }?>>
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
          <span class="ml5 d-none d-xl-inline-block"><?php echo __("Friends");?>
</span>
        </a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/photos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "photos" || $_smarty_tpl->tpl_vars['view']->value == "albums" || $_smarty_tpl->tpl_vars['view']->value == "album") {?>class="active" <?php }?>>
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
          <span class="ml5 d-none d-xl-inline-block"><?php echo __("Photos");?>
</span>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
           <a  href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
              <span class="ml5 d-none d-xl-inline-block"><?php echo __("Videos");?>
</span>
           </a>
        <?php } else { ?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/videos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "videos") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo __("Videos");?>
</span>
          </a>
        <?php }?>


        <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_enabled']) {?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/likes" <?php if ($_smarty_tpl->tpl_vars['view']->value == "likes") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pages",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo __("Likes");?>
</span>
          </a>
        <?php }?>

        <!--<?php if ($_smarty_tpl->tpl_vars['system']->value['groups_enabled']) {?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/groups" <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo __("Groups");?>
</span>
          </a>
        <?php }?>-->
        <?php if ($_smarty_tpl->tpl_vars['system']->value['events_enabled']) {?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/events" <?php if ($_smarty_tpl->tpl_vars['view']->value == "events") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo __("Events");?>
</span>
          </a>
        <?php }?>
      </div>
      <!-- profile-tabs -->

      <!-- profile-content -->
      <div class="row">
        <!-- monetization alert -->
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['system']->value['monetization_enabled'] && $_smarty_tpl->tpl_vars['profile']->value['user_monetization_enabled'] && ($_smarty_tpl->tpl_vars['user']->value->_data['user_group'] < 3 || $_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'])) {?>
          <div class="col-sm-12">
            <div class="alert alert-info">
              <div class="icon">
                <i class="fa fa-info-circle fa-2x"></i>
              </div>
              <div class="text pt5">
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] != $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
                  <?php echo __("This user enabled content monetization however you can see the content as you are admin/modertaor");?>
.
                <?php } else { ?>
                  <?php echo __("You enabled content monetization, only you and your subscribers can see your content");?>
.
                <?php }?>
              </div>
            </div>
          </div>
        <?php }?>
        <!-- monetization alert -->

        <!-- view content -->
        <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>

          <!-- left panel -->
          <div class="col-lg-8">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['needs_subscription']) {?>
              <?php $_smarty_tpl->_subTemplateRender('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'profile','node_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id'],'price'=>$_smarty_tpl->tpl_vars['profile']->value['user_monetization_min_price']), 0, false);
?>
            <?php } else { ?>
              <!-- publisher -->
              <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['profile']->value['user_id']) {?>
                  <?php $_smarty_tpl->_subTemplateRender('file:_publisher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"me",'_privacy'=>true), 0, false);
?>
                <?php } elseif ($_smarty_tpl->tpl_vars['system']->value['wall_posts_enabled'] && ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_wall'] == 'friends' && $_smarty_tpl->tpl_vars['profile']->value['we_friends'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_wall'] == 'public')) {?>
                  <?php $_smarty_tpl->_subTemplateRender('file:_publisher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"user",'_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id'],'_privacy'=>true), 0, true);
?>
                <?php }?>

              <?php }?>
              <!-- publisher -->

              <!-- pinned post -->
              <?php if ($_smarty_tpl->tpl_vars['pinned_post']->value) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:_pinned_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('post'=>$_smarty_tpl->tpl_vars['pinned_post']->value), 0, false);
?>
              <?php }?>
              <!-- pinned post -->

              <!-- posts -->
              <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_profile",'_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id']), 0, false);
?>
              <!-- posts -->
            <?php }?>
          </div>
          <!-- left panel -->

          <!-- right panel -->
          <div class="col-lg-4">
            <!-- panel [profile completion] -->
            <?php if ((isset($_smarty_tpl->tpl_vars['profile']->value['profile_completion'])) && $_smarty_tpl->tpl_vars['profile']->value['profile_completion'] < 100) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['profile']->value['profile_completion'];?>
%</span>
                  <strong><?php echo __("Profile Completion");?>
</strong>
                  <div class="progress mt5">
                    <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['profile']->value['profile_completion'];?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_smarty_tpl->tpl_vars['profile']->value['profile_completion'];?>
%"></div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="mb5">
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_picture_default']) {?>
                      <span class="text-link js_profile-image-trigger">
                        <i class="fas fa-plus-circle mr5"></i><?php echo __("Add your profile picture");?>

                        </a>
                      <?php } else { ?>
                        <i class="fas fa-check-circle green mr5"></i>
                        <span style="text-decoration: line-through;"><?php echo __("Add your profile picture");?>
</span>
                      <?php }?>
                  </div>
                  <div class="mb5">
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_cover_default']) {?>
                      <span class="text-link js_profile-cover-trigger">
                        <i class="fas fa-plus-circle mr5"></i><?php echo __("Add your profile cover");?>

                        </a>
                      <?php } else { ?>
                        <i class="fas fa-check-circle green mr5"></i>
                        <span style="text-decoration: line-through;"><?php echo __("Add your profile cover");?>
</span>
                      <?php }?>
                  </div>
                    <div class="mb5">
                      <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_preference']) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile">
                          <i class="fas fa-plus-circle mr5"></i><?php echo __("Add your preference");?>

                        </a>
                      <?php } else { ?>
                        <i class="fas fa-check-circle green mr5"></i>
                        <span style="text-decoration: line-through;"><?php echo __("Add your preference");?>
</span>
                      <?php }?>
                    </div>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['biography_info_enabled']) {?>
                    <div class="mb5">
                      <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_biography']) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile">
                          <i class="fas fa-plus-circle mr5"></i><?php echo __("Add your biography");?>

                        </a>
                      <?php } else { ?>
                        <i class="fas fa-check-circle green mr5"></i>
                        <span style="text-decoration: line-through;"><?php echo __("Add your biography");?>
</span>
                      <?php }?>
                    </div>
                  <?php }?>
                  <div class="mb5">
                    <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_birthdate']) {?>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile">
                        <i class="fas fa-plus-circle mr5"></i><?php echo __("Add your birthdate");?>

                      </a>
                    <?php } else { ?>
                      <i class="fas fa-check-circle green mr5"></i>
                      <span style="text-decoration: line-through;"><?php echo __("Add your birthdate");?>
</span>
                    <?php }?>
                  </div>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['relationship_info_enabled']) {?>
                    <div class="mb5">
                      <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_relationship']) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile">
                          <i class="fas fa-plus-circle mr5"></i><?php echo __("Add your relationship");?>

                        </a>
                      <?php } else { ?>
                        <i class="fas fa-check-circle green mr5"></i>
                        <span style="text-decoration: line-through;"><?php echo __("Add your relationship");?>
</span>
                      <?php }?>
                    </div>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['work_info_enabled']) {?>
                    <div class="mb5">
                      <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_work_title'] || !$_smarty_tpl->tpl_vars['profile']->value['user_work_place']) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/work">
                          <i class="fas fa-plus-circle mr5"></i><?php echo __("Add your work info");?>

                        </a>
                      <?php } else { ?>
                        <i class="fas fa-check-circle green mr5"></i>
                        <span style="text-decoration: line-through;"><?php echo __("Add your work info");?>
</span>
                      <?php }?>
                    </div>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['location_info_enabled']) {?>
                    <div class="mb5">
                      <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_current_city']) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/location">
                          <i class="fas fa-plus-circle mr5"></i><?php echo __("Add your location info");?>

                        </a>
                      <?php } else { ?>
                        <i class="fas fa-check-circle green mr5"></i>
                        <span style="text-decoration: line-through;"><?php echo __("Add your location info");?>
</span>
                      <?php }?>
                    </div>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['education_info_enabled']) {?>
                    <div class="mb5">
                      <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_edu_major'] || !$_smarty_tpl->tpl_vars['profile']->value['user_edu_school']) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/education">
                          <i class="fas fa-plus-circle mr5"></i><?php echo __("Add your education info");?>

                        </a>
                      <?php } else { ?>
                        <i class="fas fa-check-circle green mr5"></i>
                        <span style="text-decoration: line-through;"><?php echo __("Add your education info");?>
</span>
                      <?php }?>
                    </div>
                  <?php }?>
                </div>
              </div>
            <?php }?>
            <!-- panel [profile completion] -->

            <!-- gifts -->
            <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] != $_smarty_tpl->tpl_vars['profile']->value['user_id'] && $_smarty_tpl->tpl_vars['system']->value['gifts_enabled']) {?>
              <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_send_gifts'] && ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_gifts'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_gifts'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends']))) {?>
                <div class="d-grid">
                  <button type="button" class="btn bg-red rounded-pill mb20" data-toggle="modal" data-url="#gifts" data-options='{ "uid": <?php echo $_smarty_tpl->tpl_vars['profile']->value["user_id"];?>
 }'>
                    <i class="fas fa-gift fa-lg mr10"></i><?php echo __("Send a Gift");?>

                  </button>
                </div>
              <?php }?>
            <?php }?>
            <!-- gifts -->


            <!-- custom fields [basic] -->
            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['basic']) {?>
              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_basic'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_basic'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                <div class="card">
                  <div class="card-header bg-transparent">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"profile",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <strong><?php echo __("Basic Info");?>
</strong>
                  </div>
                  <div class="card-body">
                    <ul class="about-list">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_fields']->value['basic'], 'custom_field');
$_smarty_tpl->tpl_vars['custom_field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['custom_field']->value) {
$_smarty_tpl->tpl_vars['custom_field']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['value']) {?>
                          <li>
                            <strong><?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
</strong><br>
                            <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textbox" && $_smarty_tpl->tpl_vars['custom_field']->value['is_link']) {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
</a>
                            <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "multipleselectbox") {?>
                              <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value_string'];?>

                            <?php } else { ?>
                              <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>

                            <?php }?>
                          </li>
                        <?php }?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                  </div>
                </div>
              <?php }?>
            <?php }?>
            <!-- custom fields [basic] -->

            <!-- custom fields [work] -->
            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['work']) {?>
              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_work'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_work'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                <div class="card">
                  <div class="card-header bg-transparent">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"jobs",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <strong><?php echo __("Work Info");?>
</strong>
                  </div>
                  <div class="card-body">
                    <ul class="about-list">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_fields']->value['work'], 'custom_field');
$_smarty_tpl->tpl_vars['custom_field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['custom_field']->value) {
$_smarty_tpl->tpl_vars['custom_field']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['value']) {?>
                          <li>
                            <strong><?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
</strong><br>
                            <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textbox" && $_smarty_tpl->tpl_vars['custom_field']->value['is_link']) {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
</a>
                            <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "multipleselectbox") {?>
                              <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value_string'];?>

                            <?php } else { ?>
                              <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>

                            <?php }?>
                          </li>
                        <?php }?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                  </div>
                </div>
              <?php }?>
            <?php }?>
            <!-- custom fields [work] -->

            <!-- custom fields [location] -->
            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['location']) {?>
              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                <div class="card">
                  <div class="card-header bg-transparent">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <strong><?php echo __("Location Info");?>
</strong>
                  </div>
                  <div class="card-body">
                    <ul class="about-list">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_fields']->value['location'], 'custom_field');
$_smarty_tpl->tpl_vars['custom_field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['custom_field']->value) {
$_smarty_tpl->tpl_vars['custom_field']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['value']) {?>
                          <li>
                            <strong><?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
</strong><br>
                            <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textbox" && $_smarty_tpl->tpl_vars['custom_field']->value['is_link']) {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
</a>
                            <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "multipleselectbox") {?>
                              <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value_string'];?>

                            <?php } else { ?>
                              <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>

                            <?php }?>
                          </li>
                        <?php }?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                  </div>
                </div>
              <?php }?>
            <?php }?>
            <!-- custom fields [location] -->

            <!-- custom fields [education] -->
            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['education']) {?>
              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_education'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_education'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                <div class="card">
                  <div class="card-header bg-transparent">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"education",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <strong><?php echo __("Education Info");?>
</strong>
                  </div>
                  <div class="card-body">
                    <ul class="about-list">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_fields']->value['education'], 'custom_field');
$_smarty_tpl->tpl_vars['custom_field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['custom_field']->value) {
$_smarty_tpl->tpl_vars['custom_field']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['value']) {?>
                          <li>
                            <strong><?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
</strong><br>
                            <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textbox" && $_smarty_tpl->tpl_vars['custom_field']->value['is_link']) {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
</a>
                            <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "multipleselectbox") {?>
                              <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value_string'];?>

                            <?php } else { ?>
                              <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>

                            <?php }?>
                          </li>
                        <?php }?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                  </div>
                </div>
              <?php }?>
            <?php }?>
            <!-- custom fields [education] -->

            <!-- custom fields [other] -->
            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['other']) {?>
              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_other'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_other'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                <div class="card">
                  <div class="card-header bg-transparent">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"biography",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <strong><?php echo __("Other Info");?>
</strong>
                  </div>
                  <div class="card-body">
                    <ul class="about-list">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_fields']->value['other'], 'custom_field');
$_smarty_tpl->tpl_vars['custom_field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['custom_field']->value) {
$_smarty_tpl->tpl_vars['custom_field']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['value']) {?>
                          <li>
                            <strong><?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
</strong><br>
                            <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textbox" && $_smarty_tpl->tpl_vars['custom_field']->value['is_link']) {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
</a>
                            <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "multipleselectbox") {?>
                              <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value_string'];?>

                            <?php } else { ?>
                              <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>

                            <?php }?>
                          </li>
                        <?php }?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                  </div>
                </div>
              <?php }?>
            <?php }?>
            <!-- custom fields [other] -->

            <!-- social links -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['social_info_enabled']) {?>
              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_social_facebook'] || $_smarty_tpl->tpl_vars['profile']->value['user_social_twitter'] || $_smarty_tpl->tpl_vars['profile']->value['user_social_youtube'] || $_smarty_tpl->tpl_vars['profile']->value['user_social_instagram'] || $_smarty_tpl->tpl_vars['profile']->value['user_social_twitch'] || $_smarty_tpl->tpl_vars['profile']->value['user_social_linkedin'] || $_smarty_tpl->tpl_vars['profile']->value['user_social_vkontakte']) {?>
                <div class="card">
                  <div class="card-header bg-transparent">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"social_share",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <strong><?php echo __("Social Links");?>
</strong>
                  </div>
                  <div class="card-body text-center">
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_social_facebook']) {?>
                      <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_social_facebook'];?>
" class="btn btn-sm btn-rounded btn-social-icon btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_social_twitter']) {?>
                      <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_social_twitter'];?>
" class="btn btn-sm btn-rounded btn-social-icon btn-twitter">
                        <i class="fab fa-twitter"></i>
                      </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_social_youtube']) {?>
                      <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_social_youtube'];?>
" class="btn btn-sm btn-rounded btn-social-icon btn-pinterest">
                        <i class="fab fa-youtube"></i>
                      </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_social_instagram']) {?>
                      <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_social_instagram'];?>
" class="btn btn-sm btn-rounded btn-social-icon btn-instagram">
                        <i class="fab fa-instagram"></i>
                      </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_social_twitch']) {?>
                      <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_social_twitch'];?>
" class="btn btn-sm btn-rounded btn-social-icon btn-twitch">
                        <i class="fab fa-twitch"></i>
                      </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_social_linkedin']) {?>
                      <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_social_linkedin'];?>
" class="btn btn-sm btn-rounded btn-social-icon btn-linkedin">
                        <i class="fab fa-linkedin"></i>
                      </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_social_vkontakte']) {?>
                      <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_social_vkontakte'];?>
" class="btn btn-sm btn-rounded btn-social-icon btn-vk">
                        <i class="fab fa-vk"></i>
                      </a>
                    <?php }?>
                  </div>
                </div>
              <?php }?>
            <?php }?>
            <!-- social links -->

            <!-- photos -->
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['photos']) {?>
              <div class="card panel-photos">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <strong><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/photos"><?php echo __("Photos");?>
</a></strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['photos'], 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_context'=>"photos",'_small'=>true), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </div>
                </div>
              </div>
            <?php }?>
            <!-- photos -->

            <!-- friends -->
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['friends_count'] > 0) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <strong><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends"><?php echo __("Friends");?>
</a></strong>
                  <span class="badge rounded-pill bg-light text-primary ml5"><?php echo $_smarty_tpl->tpl_vars['profile']->value['friends_count'];?>
</span>
                  <?php if ($_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] && $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] > 0) {?>
                    <small>
                      (<span class="text-underline" data-toggle="modal" data-url="users/mutual_friends.php?uid=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'];?>
 <?php echo __("mutual friends");?>
</span>)
                    </small>
                  <?php }?>
                </div>
                <div class="card-body ptb10 plr10">
                  <div class="row no-gutters">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['friends'], '_friend');
$_smarty_tpl->tpl_vars['_friend']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_friend']->value) {
$_smarty_tpl->tpl_vars['_friend']->do_else = false;
?>
                      <div class="col-3 col-lg-4">
                        <div class="circled-user-box">
                          <a class="user-box" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_name'];?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_picture'];?>
" />
                            <div class="name">
                              <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['_friend']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['_friend']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_lastname'];
}?>
                            </div>
                          </a>
                        </div>
                      </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </div>
                </div>
              </div>
            <?php }?>
            <!-- friends -->

            <!-- subscribers -->
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['subscribers_count'] > 0) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <strong><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/subscribers"><?php echo __("Subscribers");?>
</a></strong>
                  <span class="badge rounded-pill bg-light text-primary ml5"><?php echo $_smarty_tpl->tpl_vars['profile']->value['subscribers_count'];?>
</span>
                </div>
                <div class="card-body ptb10 plr10">
                  <div class="row no-gutters">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['subscribers'], '_subscriber');
$_smarty_tpl->tpl_vars['_subscriber']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_subscriber']->value) {
$_smarty_tpl->tpl_vars['_subscriber']->do_else = false;
?>
                      <div class="col-3 col-lg-4">
                        <div class="circled-user-box">
                          <a class="user-box" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_subscriber']->value['user_name'];?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['_subscriber']->value['user_picture'];?>
" />
                            <div class="name">
                              <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['_subscriber']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['_subscriber']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_subscriber']->value['user_lastname'];
}?>
                            </div>
                          </a>
                        </div>
                      </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </div>
                </div>
              </div>
            <?php }?>
            <!-- subscribers -->

            <!-- pages -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_enabled'] && count($_smarty_tpl->tpl_vars['profile']->value['pages']) > 0) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pages",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <strong><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/likes"><?php echo __("Likes");?>
</a></strong>
                </div>
                <div class="card-body ptb10 plr10">
                  <div class="row no-gutters">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['pages'], '_page');
$_smarty_tpl->tpl_vars['_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
$_smarty_tpl->tpl_vars['_page']->do_else = false;
?>
                      <div class="col-3 col-lg-4">
                        <div class="circled-user-box">
                          <a class="user-box" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_name'];?>
">
                            <img alt="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_picture'];?>
" />
                            <div class="name" title="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_title'];?>
">
                              <?php echo $_smarty_tpl->tpl_vars['_page']->value['page_title'];?>

                            </div>
                          </a>
                        </div>
                      </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </div>
                </div>
              </div>
            <?php }?>
            <!-- pages -->

            <!-- groups -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['groups_enabled'] && count($_smarty_tpl->tpl_vars['profile']->value['groups']) > 0) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <strong><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/groups"><?php echo __("Groups");?>
</a></strong>
                </div>
                <div class="card-body ptb10 plr10">
                  <div class="row no-gutters">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['groups'], '_group');
$_smarty_tpl->tpl_vars['_group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_group']->value) {
$_smarty_tpl->tpl_vars['_group']->do_else = false;
?>
                      <div class="col-3 col-lg-4">
                        <div class="circled-user-box">
                          <a class="user-box" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_name'];?>
">
                            <img alt="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_picture'];?>
" />
                            <div class="name" title="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
">
                              <?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>

                            </div>
                          </a>
                        </div>
                      </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </div>
                </div>
              </div>
            <?php }?>
            <!-- groups -->

            <!-- events -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['events_enabled'] && count($_smarty_tpl->tpl_vars['profile']->value['events']) > 0) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <strong><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/events"><?php echo __("Events");?>
</a></strong>
                </div>
                <div class="card-body ptb10 plr10">
                  <div class="row no-gutters">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['events'], '_event');
$_smarty_tpl->tpl_vars['_event']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_event']->value) {
$_smarty_tpl->tpl_vars['_event']->do_else = false;
?>
                      <div class="col-3 col-lg-4">
                        <div class="circled-user-box">
                          <a class="user-box" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];?>
">
                            <img alt="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_picture'];?>
" />
                            <div style="" class="name" title="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
">
                              <?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>

                            </div>
                          </a>
                        </div>
                      </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </div>
                </div>
              </div>
            <?php }?>
            <!-- events -->
          </div>
          <!-- right panel -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "friends") {?>
          <!-- friends -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Friends");?>

                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class=" active" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends">
                      <?php echo __("Friends");?>

                      <span class="badge rounded-pill bg-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['friends_count'];?>
</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followers"><?php echo __("Followers");?>
</a>
                  </li>
                  <li class="nav-item">
                    <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followings"><?php echo __("Followings");?>
</a>
                  </li>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['monetization_enabled'] && $_smarty_tpl->tpl_vars['profile']->value['user_monetization_enabled']) {?>
                    <li class="nav-item">
                      <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/subscribers"><?php echo __("Subscribers");?>
</a>
                    </li>
                  <?php }?>
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body pb0">
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['friends_count'] > 0) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['friends'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"],'_darker'=>true), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                  <?php if (count($_smarty_tpl->tpl_vars['profile']->value['friends']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="friends" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                      <span><?php echo __("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <p class="text-center text-muted mt10">
                    <?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
 <?php echo __("doesn't have friends");?>

                  </p>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- friends -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "followers") {?>
          <!-- followers -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Followers");?>

                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends"><?php echo __("Friends");?>
</a>
                  </li>
                  <li class="nav-item">
                    <a class=" active" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followers">
                      <?php echo __("Followers");?>

                      <span class="badge rounded-pill bg-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followers_count'];?>
</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followings"><?php echo __("Followings");?>
</a>
                  </li>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['monetization_enabled'] && $_smarty_tpl->tpl_vars['profile']->value['user_monetization_enabled']) {?>
                    <li class="nav-item">
                      <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/subscribers"><?php echo __("Subscribers");?>
</a>
                    </li>
                  <?php }?>
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body pb0">
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['followers_count'] > 0) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['followers'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"],'_darker'=>true), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>

                  <?php if (count($_smarty_tpl->tpl_vars['profile']->value['followers']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="followers" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                      <span><?php echo __("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <p class="text-center text-muted mt10">
                    <?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
 <?php echo __("doesn't have followers");?>

                  </p>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- followers -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "followings") {?>
          <!-- followings -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Followings");?>

                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends"><?php echo __("Friends");?>
</a>
                  </li>
                  <li class="nav-item">
                    <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followers"><?php echo __("Followers");?>
</a>
                  </li>
                  <li class="nav-item">
                    <a class=" active" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followings">
                      <?php echo __("Followings");?>

                      <span class="badge rounded-pill bg-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followings_count'];?>
</span>
                    </a>
                  </li>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['monetization_enabled'] && $_smarty_tpl->tpl_vars['profile']->value['user_monetization_enabled']) {?>
                    <li class="nav-item">
                      <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/subscribers"><?php echo __("Subscribers");?>
</a>
                    </li>
                  <?php }?>
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body pb0">
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['followings_count'] > 0) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['followings'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"],'_darker'=>true), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>

                  <?php if (count($_smarty_tpl->tpl_vars['profile']->value['followings']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="followings" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                      <span><?php echo __("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <p class="text-center text-muted mt10">
                    <?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
 <?php echo __("doesn't have followings");?>

                  </p>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- followings -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "subscribers") {?>
          <!-- subscribers -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Subscribers");?>

                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends"><?php echo __("Friends");?>
</a>
                  </li>
                  <li class="nav-item">
                    <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followers"><?php echo __("Followers");?>
</a>
                  </li>
                  <li class="nav-item">
                    <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followings"><?php echo __("Followings");?>
</a>
                  </li>
                  <li class="nav-item">
                    <a class=" active" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/subscribers">
                      <?php echo __("Subscribers");?>

                      <span class="badge rounded-pill bg-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['subscribers_count'];?>
</span>
                    </a>
                  </li>
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body pb0">
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['subscribers_count'] > 0) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['subscribers'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"],'_darker'=>true), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                  <?php if (count($_smarty_tpl->tpl_vars['profile']->value['subscribers']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="subscribers" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-type="user">
                      <span><?php echo __("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <p class="text-center text-muted mt10">
                    <?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
 <?php echo __("doesn't have subscribers");?>

                  </p>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- subscribers -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "photos") {?>
          <!-- photos -->
          <div class="col-12">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['needs_subscription']) {?>
              <?php $_smarty_tpl->_subTemplateRender('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'profile','node_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id'],'price'=>$_smarty_tpl->tpl_vars['profile']->value['user_monetization_min_price']), 0, true);
?>
            <?php } else { ?>
              <div class="card panel-photos">
                <div class="card-header with-icon with-nav">
                  <!-- panel title -->
                  <div class="mb20">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <?php echo __("Photos");?>

                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class=" active" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/photos"><?php echo __("Photos");?>
</a>
                    </li>
                    <!--<li class="nav-item">
                      <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/albums"><?php echo __("Albums");?>
</a>
                    </li>-->
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->tpl_vars['profile']->value['photos']) {?>
                    <ul class="row no-gutters">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['photos'], 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_context'=>"photos"), 0, true);
?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt20 js_see-more" data-get="photos" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-type='user'>
                      <span><?php echo __("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
 <?php echo __("doesn't have photos");?>

                    </p>
                  <?php }?>
                </div>
              </div>
            <?php }?>
          </div>
          <!-- photos -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "albums") {?>
          <!-- albums -->
          <div class="col-12">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['needs_subscription']) {?>
              <?php $_smarty_tpl->_subTemplateRender('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'profile','node_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id'],'price'=>$_smarty_tpl->tpl_vars['profile']->value['user_monetization_min_price']), 0, true);
?>
            <?php } else { ?>
              <div class="card">
                <div class="card-header with-icon with-nav">
                  <!-- panel title -->
                  <div class="mb20">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <?php echo __("Photos");?>

                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/photos"><?php echo __("Photos");?>
</a>
                    </li>
                    <li class="nav-item">
                      <a class=" active" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/albums"><?php echo __("Albums");?>
</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->tpl_vars['profile']->value['albums']) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['albums'], 'album');
$_smarty_tpl->tpl_vars['album']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['album']->value) {
$_smarty_tpl->tpl_vars['album']->do_else = false;
?>
                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_album.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                    <?php if (count($_smarty_tpl->tpl_vars['profile']->value['albums']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="albums" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-type='user'>
                        <span><?php echo __("See More");?>
</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    <?php }?>
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
 <?php echo __("doesn't have albums");?>

                    </p>
                  <?php }?>
                </div>
              </div>
            <?php }?>
          </div>
          <!-- albums -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "album") {?>
          <!-- albums -->
          <div class="col-12">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['needs_subscription']) {?>
              <?php $_smarty_tpl->_subTemplateRender('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'profile','node_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id'],'price'=>$_smarty_tpl->tpl_vars['profile']->value['user_monetization_min_price']), 0, true);
?>
            <?php } else { ?>
              <div class="card panel-photos">
                <div class="card-header with-icon with-nav">
                  <!-- back to albums -->
                  <div class="float-end">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/albums" class="btn btn-md btn-light">
                      <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Back to Albums");?>

                    </a>
                  </div>
                  <!-- back to albums -->

                  <!-- panel title -->
                  <div class="mb20">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <?php echo __("Photos");?>

                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/photos"><?php echo __("Photos");?>
</a>
                    </li>
                    <li class="nav-item">
                      <a class=" active" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/albums"><?php echo __("Albums");?>
</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php $_smarty_tpl->_subTemplateRender('file:_album.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
              </div>
            <?php }?>
          </div>
          <!-- albums -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "videos") {?>
          <!-- videos -->
          <div class="col-12">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['needs_subscription']) {?>
              <?php $_smarty_tpl->_subTemplateRender('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'profile','node_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id'],'price'=>$_smarty_tpl->tpl_vars['profile']->value['user_monetization_min_price']), 0, true);
?>
            <?php } else { ?>
              <div class="card panel-videos">
                <div class="card-header with-icon">
                  <!-- panel title -->
                  <div class="mb20">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <?php echo __("Videos");?>

                  </div>
                  <!-- panel title -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->tpl_vars['profile']->value['videos']) {?>
                    <ul class="row no-gutters">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['videos'], 'video');
$_smarty_tpl->tpl_vars['video']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->do_else = false;
?>
                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_video.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="videos" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-type='user'>
                      <span><?php echo __("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
 <?php echo __("doesn't have videos");?>

                    </p>
                  <?php }?>
                </div>
              </div>
            <?php }?>
          </div>
          <!-- videos -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "likes") {?>
          <!-- likes -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon">
                <!-- panel title -->
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pages",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Likes");?>

                <!-- panel title -->
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_pages'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_pages'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                  <?php if (count($_smarty_tpl->tpl_vars['profile']->value['pages']) > 0) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['pages'], '_page');
$_smarty_tpl->tpl_vars['_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
$_smarty_tpl->tpl_vars['_page']->do_else = false;
?>
                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_darker'=>true), 0, true);
?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>

                    <?php if (count($_smarty_tpl->tpl_vars['profile']->value['pages']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="profile_pages" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                        <span><?php echo __("See More");?>
</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    <?php }?>
                  <?php } else { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                  <?php }?>
                <?php } else { ?>
                  <?php $_smarty_tpl->_subTemplateRender('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- likes -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>
          <!-- groups -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon">
                <!-- panel title -->
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Groups");?>

                <!-- panel title -->
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_groups'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_groups'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                  <?php if (count($_smarty_tpl->tpl_vars['profile']->value['groups']) > 0) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['groups'], '_group');
$_smarty_tpl->tpl_vars['_group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_group']->value) {
$_smarty_tpl->tpl_vars['_group']->do_else = false;
?>
                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_darker'=>true), 0, true);
?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>

                    <?php if (count($_smarty_tpl->tpl_vars['profile']->value['groups']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="profile_groups" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                        <span><?php echo __("See More");?>
</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    <?php }?>
                  <?php } else { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                  <?php }?>
                <?php } else { ?>
                  <?php $_smarty_tpl->_subTemplateRender('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- groups -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "events") {?>
          <!-- events -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon">
                <!-- panel title -->
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Events");?>

                <!-- panel title -->
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_events'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_events'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                  <?php if (count($_smarty_tpl->tpl_vars['profile']->value['events']) > 0) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['events'], '_event');
$_smarty_tpl->tpl_vars['_event']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_event']->value) {
$_smarty_tpl->tpl_vars['_event']->do_else = false;
?>
                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_darker'=>true), 0, true);
?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>

                    <?php if (count($_smarty_tpl->tpl_vars['profile']->value['events']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="profile_events" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                        <span><?php echo __("See More");?>
</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    <?php }?>
                  <?php } else { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                  <?php }?>
                <?php } else { ?>
                  <?php $_smarty_tpl->_subTemplateRender('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- events -->

        <?php }?>
        <!-- view content -->
      </div>
      <!-- profile-content -->
    </div>
    <!-- content panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ($_smarty_tpl->tpl_vars['gift']->value) {?>
  <?php echo '<script'; ?>
>
    $(function() {
      modal('#gift');
    });
  <?php echo '</script'; ?>
>
<?php }
echo '<script'; ?>
>
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
});
<?php echo '</script'; ?>
><?php }
}
