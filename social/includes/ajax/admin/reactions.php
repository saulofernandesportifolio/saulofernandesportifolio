<?php

/**
 * ajax -> admin -> reactions
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();

// check admin|moderator permission
if (!$user->_is_admin) {
  modal("MESSAGE", __("System Message"), __("You don't have the right permission to access this"));
}

// check demo account
if ($user->_data['user_demo']) {
  modal("ERROR", __("Demo Restriction"), __("You can't do this with demo account"));
}

// handle reactions
try {

  switch ($_GET['do']) {
    case 'edit':
      /* valid inputs */
      if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        _error(400);
      }
      if (is_empty($_POST['title'])) {
        throw new Exception(__("You must enter reaction title"));
      }
      if (is_empty($_POST['color'])) {
        throw new Exception(__("You must enter reaction color"));
      }
      if (is_empty($_POST['image'])) {
        throw new Exception(__("You must upload reaction image"));
      }
      /* update */
      $db->query(sprintf("UPDATE system_reactions SET title = %s, color = %s, image = %s, reaction_order = %s WHERE reaction_id = %s", secure($_POST['title']), secure($_POST['color']), secure($_POST['image']), secure($_POST['reaction_order']), secure($_GET['id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      /* return */
      return_json(array('success' => true, 'message' => __("Reaction info have been updated")));
      break;

    default:
      _error(400);
      break;
  }
} catch (Exception $e) {
  return_json(array('error' => true, 'message' => $e->getMessage()));
}
