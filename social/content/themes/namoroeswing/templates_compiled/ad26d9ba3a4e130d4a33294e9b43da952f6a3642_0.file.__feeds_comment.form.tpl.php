<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:27
  from '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_comment.form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4574b2651e6_14828483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad26d9ba3a4e130d4a33294e9b43da952f6a3642' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_comment.form.tpl',
      1 => 1725499294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 2,
  ),
),false)) {
function content_66e4574b2651e6_14828483 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="comment js_comment-form <?php if ($_smarty_tpl->tpl_vars['post']->value['comments_disabled']) {?>x-hidden<?php }?>" data-handle="<?php echo $_smarty_tpl->tpl_vars['_handle']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['_id']->value;?>
">
  <div class="comment-avatar">
    <a class="comment-avatar-picture" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_picture'];?>
);">
    </a>
  </div>
  <div class="comment-data">
    <div class="x-form comment-form">
      <textarea dir="auto" class="js_autosize js_mention js_post-comment" rows="1" placeholder='<?php echo __("Write a comment");?>
'></textarea>
      <ul class="x-form-tools clearfix">
        <li class="x-form-tools-post js_post-comment">
          <i class="far fa-paper-plane fa-lg fa-fw"></i>
        </li>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['comments_photos_enabled']) {?>
          <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
            <li class="x-form-tools-attach" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="comment"></i>
            </li>
          <?php } else { ?>
            <li class="x-form-tools-attach">
              <i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="comment"></i>
            </li>
          <?php }?>  
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_comments_enabled']) {?>
          <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
            <li class="x-form-tools-voice" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <i class="fas fa-microphone fa-lg fa-fw"></i>
            </li>
          <?php } else { ?>
            <li class="x-form-tools-voice js_comment-voice-notes-toggle">
              <i class="fas fa-microphone fa-lg fa-fw"></i>
            </li>
          <?php }?>           
        <?php }?>
        <li class="x-form-tools-emoji js_emoji-menu-toggle">
          <i class="far fa-smile-wink fa-lg fa-fw"></i>
        </li>
      </ul>
    </div>
    <div class="comment-voice-notes">
      <div class="voice-recording-wrapper" data-handle="comment">
        <!-- processing message -->
        <div class="x-hidden js_voice-processing-message">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"upload",'class'=>"main-icon mr5",'width'=>"16px",'height'=>"16px"), 0, false);
?>
          <?php echo __("Processing");?>
<span class="loading-dots"></span>
        </div>
        <!-- processing message -->

        <!-- success message -->
        <div class="x-hidden js_voice-success-message">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"main-icon mr5",'width'=>"16px",'height'=>"16px"), 0, true);
?>
          <?php echo __("Voice note recorded successfully");?>

          <div class="float-end">
            <button type="button" class="btn-close js_voice-remove">

            </button>
          </div>
        </div>
        <!-- success message -->

        <!-- start recording -->
        <div class="btn-voice-start js_voice-start">
          <i class="fas fa-microphone mr5"></i><?php echo __("Record");?>

        </div>
        <!-- start recording -->

        <!-- stop recording -->
        <div class="btn-voice-stop js_voice-stop" style="display: none">
          <i class="far fa-stop-circle mr5"></i><?php echo __("Recording");?>
 <span class="js_voice-timer">00:00</span>
        </div>
        <!-- stop recording -->
      </div>
    </div>
    <div class="comment-attachments attachments clearfix x-hidden">
      <ul>
        <li class="loading">
          <div class="progress x-progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="pb10 text-center js_comment-disabled-msg <?php if (!$_smarty_tpl->tpl_vars['post']->value['comments_disabled']) {?>x-hidden<?php }?>">
  <?php echo __("Commenting has been turned off for this post");?>
.
</div><?php }
}
