<?php
/* Smarty version 4.5.3, created on 2024-09-13 20:20:40
  from '/var/www/html/social/content/themes/namoroeswing/templates/settings.account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e49e98b78dd2_93775116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8b7468e8e0008f8893f71232491905724314222' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/settings.account.tpl',
      1 => 1725499301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
  ),
),false)) {
function content_66e49e98b78dd2_93775116 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card-header with-icon">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"settings",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, false);
?>
  <?php echo __("Account Settings");?>

</div>
<form class="js_ajax-forms" data-url="users/settings.php?edit=account">
  <div class="card-body">
    <div class="heading-small mb20">
      <?php echo __("Email Address");?>

    </div>
    <div class="pl-md-4">
      <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_email_verified']) {?>
        <div class="alert alert-danger">
          <div class="icon">
            <i class="fa fa-exclamation-circle fa-2x"></i>
          </div>
          <div class="text">
            <strong><?php echo __("Email Verification Required");?>
</strong><br>
            <?php echo __("Check your email inbox");?>
 <?php echo __("to complete the verification process");?>

            <button class="btn btn-sm btn-success ml10" data-toggle="modal" data-url="core/activation_email_resend.php"><?php echo __("Resend Verification Email");?>
</button>
          </div>
        </div>
      <?php }?>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Email Address");?>

        </label>
        <div class="col-md-9">
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_email'];?>
">
          </div>
        </div>
      </div>
    </div>

    <?php if (($_smarty_tpl->tpl_vars['system']->value['activation_enabled'] && $_smarty_tpl->tpl_vars['system']->value['activation_type'] == "sms") || ($_smarty_tpl->tpl_vars['system']->value['two_factor_enabled'] && $_smarty_tpl->tpl_vars['system']->value['two_factor_type'] == "sms")) {?>
      <div class="divider"></div>

      <div class="heading-small mb20">
        <?php echo __("Phone Number");?>

      </div>
      <div class="pl-md-4">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_phone'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_phone_verified']) {?>
          <div class="alert alert-danger">
            <div class="icon">
              <i class="fa fa-exclamation-circle fa-2x"></i>
            </div>
            <div class="text">
              <strong><?php echo __("Phone Verification Required");?>
</strong><br>
              <?php echo __("Check your phone SMS");?>
 <?php echo __("to complete phone verification process");?>

              <button class="btn btn-sm btn-success ml10" data-toggle="modal" data-url="#activation-phone"><?php echo __("Enter Code");?>
</button>
            </div>
          </div>
        <?php }?>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Phone Number");?>

          </label>
          <div class="col-md-9">
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
              <input type="text" class="form-control" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <div class="form-text">
              <?php echo __("Phone number (e.g: +1234567890)");?>

            </div>
          </div>
        </div>
      </div>
    <?php }?>

    <div class="divider"></div>

    <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_verified']) {?>
      <div class="alert alert-warning">
        <div class="icon">
          <i class="fa fa-exclamation-triangle fa-2x"></i>
        </div>
        <div class="text">
          <strong><?php echo __("Attention");?>
</strong><br>
          <?php echo __("Your account is already verified if you changed your username you will lose the verification badge");?>

        </div>
      </div>
    <?php }?>

    <div class="heading-small mb20">
      <?php echo __("Username");?>

    </div>
    <div class="pl-md-4">
      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Username");?>

        </label>
        <div class="col-md-9">
          <div class="input-group">
            <span class="input-group-text d-none d-sm-block"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/</span>
            <input type="text" class="form-control" name="username" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
">
          </div>
          <div class="form-text">
            <?php echo __("Can only contain alphanumeric characters (A–Z, 0–9) and periods ('.')");?>

          </div>
        </div>
      </div>
    </div>

    <!-- Secuirty Check -->
    <div class="js_hidden-section x-hidden">
      <div class="divider"></div>
      <div class="heading-small mb20">
        <?php echo __("Secuirty Check");?>

      </div>
      <div class="pl-md-4">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Current Password");?>

          </label>
          <div class="col-md-9">
            <input type="password" class="form-control" name="password">
            <div class="form-text">
              <?php echo __("You need to enter your current password for security check");?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Secuirty Check -->

    <!-- success -->
    <div class="alert alert-success mt15 mb0 x-hidden"></div>
    <!-- success -->

    <!-- error -->
    <div class="alert alert-danger mt15 mb0 x-hidden"></div>
    <!-- error -->
  </div>
  <div class="card-footer text-end">
    <button type="submit" class="btn btn-primary"><?php echo __("Save Changes");?>
</button>
  </div>
</form><?php }
}
