<?php

/**
 * ajax -> core -> activation email resend
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();

// check user logged in
if (!$user->_logged_in) {
  modal('LOGIN');
}

try {

  // activation email resend
  $user->get_upgrade_options();

  // return
  //modal("SUCCESS", __("Another email has been sent"), __("Please click on the link in that email message to complete the verification process"));

  modal('UPGRADEPOST');

} catch (Exception $e) {
 
  modal("ERROR", __("Error"), $e->getMessage());
}
