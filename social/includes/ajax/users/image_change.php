<?php

/**
 * ajax -> users -> image change
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();

// user access
user_access(true);

// check demo account
if ($user->_data['user_demo']) {
  modal("ERROR", __("Demo Restriction"), __("You can't do this with demo account"));
}

// validate inputs
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
  _error(403);
}
if (!isset($_POST['handle']) || !in_array($_POST['handle'], ['user', 'page', 'group'])) {
  _error(403);
}
if (!isset($_POST['image'])) {
  _error(403);
}

try {

  switch ($_POST['handle']) {
    case 'user':
      /* check for profile pictures album */
      if (!$user->_data['user_album_pictures']) {
        /* create new profile pictures album */
        $db->query(sprintf("INSERT INTO posts_photos_albums (user_id, user_type, title, privacy) VALUES (%s, 'user', 'Profile Pictures', 'public')", secure($user->_data['user_id'], 'int'))) or _error('SQL_ERROR_THROWEN');
        $user->_data['user_album_pictures'] = $db->insert_id;
        /* update user profile picture album id */
        $db->query(sprintf("UPDATE users SET user_album_pictures = %s WHERE user_id = %s", secure($user->_data['user_album_pictures'], 'int'), secure($user->_data['user_id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      }
      /* insert updated profile picture post */
      $db->query(sprintf("INSERT INTO posts (user_id, user_type, post_type, time, privacy) VALUES (%s, 'user', 'profile_picture', %s, 'public')", secure($user->_data['user_id'], 'int'), secure($date))) or _error('SQL_ERROR_THROWEN');
      $post_id = $db->insert_id;
      /* insert new profile picture to album */
      $db->query(sprintf("INSERT INTO posts_photos (post_id, album_id, source) VALUES (%s, %s, %s)", secure($post_id, 'int'), secure($user->_data['user_album_pictures'], 'int'), secure($_POST['image']))) or _error('SQL_ERROR_THROWEN');
      $photo_id = $db->insert_id;
      /* delete old cropped picture from uploads folder */
      delete_uploads_file($user->_data['user_picture_raw']);
      /* update user profile picture */
      $db->query(sprintf("UPDATE users SET user_picture = %s, user_picture_id = %s WHERE user_id = %s", secure($_POST['image']), secure($photo_id, 'int'), secure($user->_data['user_id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      break;

    case 'page':
      /* check if page id is set */
      if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
        /* return error 403 */
        _error(403);
      }
      /* check the page */
      $get_page = $db->query(sprintf("SELECT * FROM pages WHERE page_id = %s", secure($_POST['id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      if ($get_page->num_rows == 0) {
        /* return error 403 */
        _error(403);
      }
      $page = $get_page->fetch_assoc();
      /* check if the user is the page admin */
      if (!$user->check_page_adminship($user->_data['user_id'], $page['page_id'])) {
        /* return error 403 */
        _error(403);
      }
      /* check for page pictures album */
      if (!$page['page_album_pictures']) {
        /* create new page pictures album */
        $db->query(sprintf("INSERT INTO posts_photos_albums (user_id, user_type, title, privacy) VALUES (%s, 'page', 'Profile Pictures', 'public')", secure($page['page_id'], 'int'))) or _error('SQL_ERROR_THROWEN');
        $page['page_album_pictures'] = $db->insert_id;
        /* update page profile picture album id */
        $db->query(sprintf("UPDATE pages SET page_album_pictures = %s WHERE page_id = %s", secure($page['page_album_pictures'], 'int'), secure($page['page_id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      }
      /* insert updated page picture post */
      $db->query(sprintf("INSERT INTO posts (user_id, user_type, post_type, time, privacy) VALUES (%s, 'page', 'page_picture', %s, 'public')", secure($page['page_id'], 'int'), secure($date))) or _error('SQL_ERROR_THROWEN');
      $post_id = $db->insert_id;
      /* insert new page picture to album */
      $db->query(sprintf("INSERT INTO posts_photos (post_id, album_id, source) VALUES (%s, %s, %s)", secure($post_id, 'int'), secure($page['page_album_pictures'], 'int'), secure($_POST['image']))) or _error('SQL_ERROR_THROWEN');
      $photo_id = $db->insert_id;
      /* delete old cropped picture from uploads folder */
      delete_uploads_file($page['page_picture']);
      /* update page picture */
      $db->query(sprintf("UPDATE pages SET page_picture = %s, page_picture_id = %s WHERE page_id = %s", secure($_POST['image']), secure($photo_id, 'int'), secure($page['page_id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      break;

    case 'group':
      /* check if group id is set */
      if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
        /* return error 403 */
        _error(403);
      }
      /* check the group */
      $get_group = $db->query(sprintf("SELECT * FROM `groups` WHERE group_id = %s", secure($_POST['id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      if ($get_group->num_rows == 0) {
        /* return error 403 */
        _error(403);
      }
      $group = $get_group->fetch_assoc();
      /* check if the user is the group admin */
      if (!$user->check_group_adminship($user->_data['user_id'], $group['group_id'])) {
        /* return error 403 */
        _error(403);
      }
      /* check for group pictures album */
      if (!$group['group_album_pictures']) {
        /* create new group pictures album */
        $db->query(sprintf("INSERT INTO posts_photos_albums (user_id, user_type, in_group, group_id, title, privacy) VALUES (%s, 'user', '1', %s, 'Profile Pictures', 'public')", secure($user->_data['user_id'], 'int'), secure($group['group_id'], 'int'))) or _error('SQL_ERROR_THROWEN');
        $group['group_album_pictures'] = $db->insert_id;
        /* update group profile picture album id */
        $db->query(sprintf("UPDATE `groups` SET group_album_pictures = %s WHERE group_id = %s", secure($group['group_album_pictures'], 'int'), secure($group['group_id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      }
      /* insert updated group picture post */
      $db->query(sprintf("INSERT INTO posts (user_id, user_type, post_type, in_group, group_id, time, privacy) VALUES (%s, 'user', 'group_picture', '1', %s, %s, 'custom')", secure($user->_data['user_id'], 'int'), secure($group['group_id'], 'int'), secure($date))) or _error('SQL_ERROR_THROWEN');
      $post_id = $db->insert_id;
      /* insert new group picture to album */
      $db->query(sprintf("INSERT INTO posts_photos (post_id, album_id, source) VALUES (%s, %s, %s)", secure($post_id, 'int'), secure($group['group_album_pictures'], 'int'), secure($_POST['image']))) or _error('SQL_ERROR_THROWEN');
      $photo_id = $db->insert_id;
      /* delete old cropped picture from uploads folder */
      delete_uploads_file($group['group_picture']);
      /* update group picture */
      $db->query(sprintf("UPDATE `groups` SET group_picture = %s, group_picture_id = %s WHERE group_id = %s", secure($_POST['image']), secure($photo_id, 'int'), secure($group['group_id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      break;

    default:
      _error(400);
      break;
  }

  // return & exit
  return_json();
} catch (Exception $e) {
  modal("ERROR", __("Error"), $e->getMessage());
}
