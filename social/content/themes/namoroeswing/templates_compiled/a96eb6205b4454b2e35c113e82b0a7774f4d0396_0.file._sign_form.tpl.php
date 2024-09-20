<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:16
  from '/var/www/html/social/content/themes/namoroeswing/templates/_sign_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e45740488639_64340752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a96eb6205b4454b2e35c113e82b0a7774f4d0396' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/_sign_form.tpl',
      1 => 1725499306,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__custom_fields.tpl' => 1,
  ),
),false)) {
function content_66e45740488639_64340752 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card card-register">
  <!-- signin -->
  <div class="js_panel <?php if ($_smarty_tpl->tpl_vars['do']->value == 'up') {?>x-hidden<?php }?>">
    <div class="card-header">
      <!--<h4 class="card-title"><?php echo __("Login");?>
</h4>-->
       <?php if ($_smarty_tpl->tpl_vars['system']->value['system_logo']) {?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
">
            <img class="card-login-logo" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo'];?>
" alt="<?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
" title="<?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
">
          </a>
       <?php }?>
    </div>
    <div class="card-body">
      <?php if ((isset($_smarty_tpl->tpl_vars['highlight']->value))) {?><div class="alert alert-warning"><?php echo $_smarty_tpl->tpl_vars['highlight']->value;?>
</div><?php }?>
      <form class="js_ajax-forms" data-url="core/signin.php" method="POST">
        <!-- username or email -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-text"><i class="far fa-user fa-fw"></i></span>
            <input type="text" class="form-control" placeholder='<?php echo __("Email");?>
 <?php echo __("or");?>
 <?php echo __("Username");?>
' name="username_email" required>
          </div>
        </div>
        <!-- username or email -->
        <!-- password -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-key fa-fw"></i></span>
            <input type="password" class="form-control" placeholder='<?php echo __("Password");?>
' name="password" required>
          </div>
        </div>
        <!-- password -->
        <!-- remember me -->
        <div class="form-check mb10">
          <input type="checkbox" class="form-check-input" name="remember" id="remember">
          <label class="form-check-label" for="remember"><?php echo __("Remember me");?>
</label>
        </div>
        <!-- remember me -->
        <!-- submit -->
        <div class="form-group d-grid">
          <button type="submit" class="btn btn-lg btn-danger bg-gradient-danger"><?php echo __("Login");?>
</button>
        </div>
        <a class="mt20 text-center" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/reset"><?php echo __("Forgotten password?");?>
</a>
        <!-- submit -->
        <!-- error -->
        <div class="alert alert-danger mt15 mb0 x-hidden"></div>
        <!-- error -->
      </form>
      <?php if ($_smarty_tpl->tpl_vars['system']->value['social_login_enabled']) {?>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['google_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['wordpress_login_enabled']) {?>
          <div class="hr-heading mt5 mb10">
            <div class="hr-heading-text">
              <?php echo __("or");?>
 <?php echo __("login with");?>

            </div>
          </div>
          <div class="text-center">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/facebook" class="btn btn-sm btn-rounded btn-social-icon btn-facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['google_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/google" class="btn btn-sm btn-rounded btn-social-icon btn-google">
                <i class="fab fa-google"></i>
              </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/twitter" class="btn btn-sm btn-rounded btn-social-icon btn-twitter">
                <i class="fab fa-twitter"></i>
              </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/linkedin" class="btn btn-sm btn-rounded btn-social-icon btn-linkedin">
                <i class="fab fa-linkedin"></i>
              </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/vkontakte" class="btn btn-sm btn-rounded btn-social-icon btn-vk">
                <i class="fab fa-vk"></i>
              </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['wordpress_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/wordpress" class="btn btn-sm btn-rounded btn-social-icon btn-wordpress">
                <i class="fab fa-wordpress"></i>
              </a>
            <?php }?>
          </div>
        <?php }?>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['system']->value['registration_enabled']) {?>
        <div class="mt20 text-center">teste
          <?php echo __("Not registered?");?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signup" class="js_toggle-panel text-link" onblur="changeOcultar('ocultar');"><?php echo __("Create an account");?>
</a>
        </div>
      <?php }?>
    </div>
  </div>
  <!-- signin -->

  <!-- signup -->
  <div class="js_panel <?php if ($_smarty_tpl->tpl_vars['do']->value != 'up') {?>x-hidden<?php }?>">
    <div class="card-header">
      <!--<h4 class="card-title"><?php echo __("Register");?>
</h4>-->
       <?php if ($_smarty_tpl->tpl_vars['system']->value['system_logo']) {?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
">
            <img class="card-login-logo" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo'];?>
" alt="<?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
" title="<?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
">
          </a>
       <?php }?>      
    </div>
    <div class="card-body">
      <form class="js_ajax-forms" data-url="core/signup.php" method="POST">
        <?php if ($_smarty_tpl->tpl_vars['system']->value['invitation_enabled']) {?>
          <!-- invitation code -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-handshake fa-fw"></i></span>
              <input name="invitation_code" type="text" class="form-control" placeholder='<?php echo __("Invitation Code");?>
' value="<?php echo $_smarty_tpl->tpl_vars['invitation_code']->value;?>
" required>
            </div>
          </div>
          <!-- invitation code -->
        <?php }?>
        <!-- first name -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user fa-fw"></i></span>
            <input name="first_name" type="text" class="form-control" placeholder='<?php echo __("First name");?>
' required>
          </div>
        </div>
        <!-- first name -->
        <!-- last name -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user fa-fw"></i></span>
            <input name="last_name" type="text" class="form-control" placeholder='<?php echo __("Last name");?>
' required>
          </div>
        </div>
        <!-- last name -->
        <!-- username -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-globe fa-fw"></i></span>
            <input name="username" type="text" class="form-control" placeholder='<?php echo __("Username");?>
' required>
          </div>
        </div>
        <!-- username -->
        <!-- email -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope fa-fw"></i></span>
            <input name="email" type="email" class="form-control" placeholder='<?php echo __("Email");?>
' required>
          </div>
        </div>
        <!-- email -->
        <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_enabled'] && $_smarty_tpl->tpl_vars['system']->value['activation_type'] == "sms") {?>
          <!-- phone -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-phone fa-fw"></i></span>
              <input name="phone" type="text" class="form-control" placeholder='<?php echo __("Phone number (e.g: +1234567890)");?>
' required>
            </div>
          </div>
          <!-- phone -->
        <?php }?>
        <!-- password -->
        <div class="form-group">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-key fa-fw"></i></span>
              <input name="password" type="password" class="form-control" placeholder='<?php echo __("Password");?>
' required>
            </div>
          </div>
        </div>
        <!-- password -->
        <!-- custom fields -->
        <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value) {?>
         <!-- <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value,'_registration'=>true), 0, false);
?>-->
        <?php }?>
        <!-- custom fields -->
        <div class="js_hidden-section x-hidden">
          <!-- genders -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-venus-mars fa-fw"></i></span>
              <select name="gender" id="gender" class="form-control" required>
                <option value="none"><?php echo __("Select Sex");?>
:</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['genders']->value, 'gender');
$_smarty_tpl->tpl_vars['gender']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gender']->value) {
$_smarty_tpl->tpl_vars['gender']->do_else = false;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['gender']->value['gender_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['gender']->value['gender_name'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>
            </div>
          </div>
          <!-- genders -->
          <?php if ($_smarty_tpl->tpl_vars['system']->value['age_restriction']) {?>
            <!-- birthdate -->
            <div class="form-group">
              <label class="form-label"><?php echo __("Birthdate");?>
</label>
              <div class="row">
                <div class="col">
                  <select class="form-control" name="birth_month">
                    <option value="none"><?php echo __("Month");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '1') {?>selected<?php }?> value="1"><?php echo __("Jan");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '2') {?>selected<?php }?> value="2"><?php echo __("Feb");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '3') {?>selected<?php }?> value="3"><?php echo __("Mar");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '4') {?>selected<?php }?> value="4"><?php echo __("Apr");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '5') {?>selected<?php }?> value="5"><?php echo __("May");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '6') {?>selected<?php }?> value="6"><?php echo __("Jun");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '7') {?>selected<?php }?> value="7"><?php echo __("Jul");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '8') {?>selected<?php }?> value="8"><?php echo __("Aug");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '9') {?>selected<?php }?> value="9"><?php echo __("Sep");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '10') {?>selected<?php }?> value="10"><?php echo __("Oct");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '11') {?>selected<?php }?> value="11"><?php echo __("Nov");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '12') {?>selected<?php }?> value="12"><?php echo __("Dec");?>
</option>
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name="birth_day">
                    <option value="none"><?php echo __("Day");?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                      <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['day'] == $_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                    <?php }
}
?>
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name="birth_year">
                    <option value="none"><?php echo __("Year");?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2017+1 - (1905) : 1905-(2017)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1905, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                      <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['year'] == $_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                    <?php }
}
?>
                  </select>
                </div>
              </div>
            </div>
            <!-- birthdate -->
           <?php }?>
           <?php if ($_smarty_tpl->tpl_vars['system']->value['age_restriction_companions']) {?>
            <!-- birthdate -->
            <div class="form-group" id="birth_companions">
              <label class="form-label"><?php echo __("Birthdate Companions");?>
</label>
              <div class="row">
                <div class="col">
                  <select class="form-control" name="birth_month_companions" id="month_companions">
                    <option value="none"><?php echo __("Month");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '1') {?>selected<?php }?> value="1"><?php echo __("Jan");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '2') {?>selected<?php }?> value="2"><?php echo __("Feb");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '3') {?>selected<?php }?> value="3"><?php echo __("Mar");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '4') {?>selected<?php }?> value="4"><?php echo __("Apr");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '5') {?>selected<?php }?> value="5"><?php echo __("May");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '6') {?>selected<?php }?> value="6"><?php echo __("Jun");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '7') {?>selected<?php }?> value="7"><?php echo __("Jul");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '8') {?>selected<?php }?> value="8"><?php echo __("Aug");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '9') {?>selected<?php }?> value="9"><?php echo __("Sep");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '10') {?>selected<?php }?> value="10"><?php echo __("Oct");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '11') {?>selected<?php }?> value="11"><?php echo __("Nov");?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['month'] == '12') {?>selected<?php }?> value="12"><?php echo __("Dec");?>
</option>
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name="birth_day_companions" id="day_companions">
                    <option value="none"><?php echo __("Day");?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                      <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['day'] == $_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                    <?php }
}
?>
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name="birth_year_companions" id="year_companions">
                    <option value="none"><?php echo __("Year");?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2017+1 - (1905) : 1905-(2017)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1905, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                      <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_companions_parsed']['year'] == $_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                    <?php }
}
?>
                  </select>
                </div>
              </div>
            </div>
            <!-- birthdate -->
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['system']->value['reCAPTCHA_enabled']) {?>
            <div class="form-group">
              <!-- reCAPTCHA -->
              <?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js' async defer><?php echo '</script'; ?>
>
              <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['system']->value['reCAPTCHA_site_key'];?>
"></div>
              <style type="text/css">
                     iframe{
                        width:370px;
                        height:98px;
                      }
              </style>
              <!-- reCAPTCHA -->
            </div>
          <?php }?>
                    <input type="text" name="field1" style="display:none !important" tabindex="-1" autocomplete="off">
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['newsletter_consent']) {?>
            <!-- newsletter consent -->
            <div class="form-check mb10">
              <input type="checkbox" class="form-check-input" name="newsletter_agree" id="newsletter_agree">
              <label class="form-check-label" for="newsletter_agree">
                <?php echo __("I expressly agree to receive the newsletter");?>

              </label>
            </div>
            <!-- newsletter consent -->
          <?php }?>
          <!-- privacy & terms consent -->
          <div class="form-check mb10">
            <input type="checkbox" class="form-check-input" name="privacy_agree" id="privacy_agree">
            <label class="form-check-label" for="privacy_agree">
              <?php echo __("By creating your account, you agree to our");?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/static/terms" target="_blank"><?php echo __("Terms");?>
</a> & <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/static/privacy" target="_blank"><?php echo __("Privacy Policy");?>
</a>
            </label>
          </div>
          <!-- privacy & terms consent -->
        </div>
        <!-- submit -->
        <div class="form-group d-grid">
          <button type="submit" class="btn btn-lg btn-danger bg-gradient-danger"><?php echo __("Sign Up");?>
</button>
        </div>
        <!-- submit -->
        <!-- error -->
        <div class="alert alert-danger mt15 mb0 x-hidden"></div>
        <!-- error -->
      </form>
      <?php if ($_smarty_tpl->tpl_vars['system']->value['social_login_enabled']) {?>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['google_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['wordpress_login_enabled']) {?>
          <div class="hr-heading mt5 mb10">
            <div class="hr-heading-text">
              <?php echo __("or");?>
 <?php echo __("register with");?>

            </div>
          </div>
          <div class="text-center">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/facebook" class="btn btn-sm btn-rounded btn-social-icon btn-facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['google_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/google" class="btn btn-sm btn-rounded btn-social-icon btn-google">
                <i class="fab fa-google"></i>
              </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/twitter" class="btn btn-sm btn-rounded btn-social-icon btn-twitter">
                <i class="fab fa-twitter"></i>
              </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/linkedin" class="btn btn-sm btn-rounded btn-social-icon btn-linkedin">
                <i class="fab fa-linkedin"></i>
              </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/vkontakte" class="btn btn-sm btn-rounded btn-social-icon btn-vk">
                <i class="fab fa-vk"></i>
              </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['wordpress_login_enabled']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/wordpress" class="btn btn-sm btn-rounded btn-social-icon btn-wordpress">
                <i class="fab fa-wordpress"></i>
              </a>
            <?php }?>
          </div>
        <?php }?>
      <?php }?>
      <div class="mt20 text-center">
        <?php echo __("Have an account?");?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signin" class="js_toggle-panel text-link" onblur="changeExibir('exibir')"><?php echo __("Login Now");?>
</a>
      </div>
    </div>
  </div>
  <!-- signup -->
</div><?php }
}
