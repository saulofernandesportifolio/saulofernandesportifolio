<?php
/* Smarty version 4.5.3, created on 2024-09-15 20:05:34
  from '/var/www/html/social/content/themes/namoroeswing/templates/ajax.load_more.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e73e0e821412_32665139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03979607086f9e53f21bd83aa4c9d503b46355a4' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/ajax.load_more.tpl',
      1 => 1725499303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_ads.tpl' => 1,
    'file:_ads_campaigns.tpl' => 1,
    'file:__feeds_post.tpl' => 3,
    'file:__feeds_article.tpl' => 2,
    'file:__feeds_funding.tpl' => 1,
    'file:__feeds_comment.tpl' => 2,
    'file:__feeds_photo.tpl' => 1,
    'file:__feeds_profile_photo.tpl' => 1,
    'file:__feeds_album.tpl' => 1,
    'file:__feeds_video.tpl' => 1,
    'file:__feeds_user.tpl' => 8,
    'file:__feeds_page.tpl' => 3,
    'file:__feeds_group.tpl' => 2,
    'file:__feeds_event.tpl' => 2,
    'file:__feeds_game.tpl' => 1,
    'file:__feeds_notification.tpl' => 1,
    'file:__feeds_conversation.tpl' => 1,
    'file:__feeds_message.tpl' => 1,
    'file:__feeds_candidate.tpl' => 1,
  ),
),false)) {
function content_66e73e0e821412_32665139 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['get']->value == 'newsfeed' || $_smarty_tpl->tpl_vars['get']->value == 'posts_profile' || $_smarty_tpl->tpl_vars['get']->value == 'posts_page' || $_smarty_tpl->tpl_vars['get']->value == 'posts_group' || $_smarty_tpl->tpl_vars['get']->value == 'posts_group_pending' || $_smarty_tpl->tpl_vars['get']->value == 'posts_group_pending_all' || $_smarty_tpl->tpl_vars['get']->value == 'posts_event' || $_smarty_tpl->tpl_vars['get']->value == 'posts_event_pending' || $_smarty_tpl->tpl_vars['get']->value == 'posts_event_pending_all' || $_smarty_tpl->tpl_vars['get']->value == 'saved' || $_smarty_tpl->tpl_vars['get']->value == 'memories' || $_smarty_tpl->tpl_vars['get']->value == 'boosted' || $_smarty_tpl->tpl_vars['get']->value == 'popular' || $_smarty_tpl->tpl_vars['get']->value == 'discover') {?>
  <?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php $_smarty_tpl->_subTemplateRender('file:_ads_campaigns.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>$_smarty_tpl->tpl_vars['get']->value), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'shares') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_snippet'=>true), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'articles') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_article.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"featured"), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'category_articles') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_article.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'fundings') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'funding');
$_smarty_tpl->tpl_vars['funding']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['funding']->value) {
$_smarty_tpl->tpl_vars['funding']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_funding.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'post_comments' || $_smarty_tpl->tpl_vars['get']->value == 'post_comments_top' || $_smarty_tpl->tpl_vars['get']->value == 'post_comments_all' || $_smarty_tpl->tpl_vars['get']->value == 'photo_comments' || $_smarty_tpl->tpl_vars['get']->value == 'photo_comments_top' || $_smarty_tpl->tpl_vars['get']->value == 'photo_comments_all') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'comment');
$_smarty_tpl->tpl_vars['comment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_comment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_comment'=>$_smarty_tpl->tpl_vars['comment']->value), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'comment_replies') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'comment');
$_smarty_tpl->tpl_vars['comment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_comment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_comment'=>$_smarty_tpl->tpl_vars['comment']->value,'_is_reply'=>true), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'photos') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_context'=>$_smarty_tpl->tpl_vars['context']->value), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'profile_photos') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_profile_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'albums') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'album');
$_smarty_tpl->tpl_vars['album']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['album']->value) {
$_smarty_tpl->tpl_vars['album']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_album.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'videos') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'video');
$_smarty_tpl->tpl_vars['video']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_video.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'post_reactions' || $_smarty_tpl->tpl_vars['get']->value == 'photo_reactions' || $_smarty_tpl->tpl_vars['get']->value == 'comment_reactions' || $_smarty_tpl->tpl_vars['get']->value == 'donors' || $_smarty_tpl->tpl_vars['get']->value == 'voters' || $_smarty_tpl->tpl_vars['get']->value == 'blocks' || $_smarty_tpl->tpl_vars['get']->value == 'affiliates' || $_smarty_tpl->tpl_vars['get']->value == 'group_requests') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"],'_reaction'=>$_smarty_tpl->tpl_vars['_user']->value["reaction"],'_donation'=>$_smarty_tpl->tpl_vars['_user']->value['donation_amount'],'_donation_time'=>$_smarty_tpl->tpl_vars['_user']->value['donation_time']), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'friend_requests') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"request"), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'friend_requests_sent') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"cancel"), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'mutual_friends') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"remove"), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'new_people') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"add"), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'friends' || $_smarty_tpl->tpl_vars['get']->value == 'followers' || $_smarty_tpl->tpl_vars['get']->value == 'followings' || $_smarty_tpl->tpl_vars['get']->value == 'subscribers' || $_smarty_tpl->tpl_vars['get']->value == 'page_invites' || $_smarty_tpl->tpl_vars['get']->value == 'group_members' || $_smarty_tpl->tpl_vars['get']->value == 'group_invites' || $_smarty_tpl->tpl_vars['get']->value == 'event_going' || $_smarty_tpl->tpl_vars['get']->value == 'event_interested' || $_smarty_tpl->tpl_vars['get']->value == 'event_invited' || $_smarty_tpl->tpl_vars['get']->value == 'event_invites') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"]), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'page_members' || $_smarty_tpl->tpl_vars['get']->value == 'page_admins' || $_smarty_tpl->tpl_vars['get']->value == 'group_members_manage' || $_smarty_tpl->tpl_vars['get']->value == 'group_admins') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"]), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'pages' || $_smarty_tpl->tpl_vars['get']->value == 'suggested_pages' || $_smarty_tpl->tpl_vars['get']->value == 'category_pages' || $_smarty_tpl->tpl_vars['get']->value == 'liked_pages' || $_smarty_tpl->tpl_vars['get']->value == 'profile_pages') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_page');
$_smarty_tpl->tpl_vars['_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
$_smarty_tpl->tpl_vars['_page']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box'), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'boosted_pages') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_page');
$_smarty_tpl->tpl_vars['_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
$_smarty_tpl->tpl_vars['_page']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'list'), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'groups' || $_smarty_tpl->tpl_vars['get']->value == 'suggested_groups' || $_smarty_tpl->tpl_vars['get']->value == 'category_groups' || $_smarty_tpl->tpl_vars['get']->value == 'joined_groups' || $_smarty_tpl->tpl_vars['get']->value == 'profile_groups') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_group');
$_smarty_tpl->tpl_vars['_group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_group']->value) {
$_smarty_tpl->tpl_vars['_group']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box'), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'events' || $_smarty_tpl->tpl_vars['get']->value == 'suggested_events' || $_smarty_tpl->tpl_vars['get']->value == 'category_events' || $_smarty_tpl->tpl_vars['get']->value == 'going_events' || $_smarty_tpl->tpl_vars['get']->value == 'interested_events' || $_smarty_tpl->tpl_vars['get']->value == 'invited_events' || $_smarty_tpl->tpl_vars['get']->value == 'profile_events') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_event');
$_smarty_tpl->tpl_vars['_event']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_event']->value) {
$_smarty_tpl->tpl_vars['_event']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box'), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'games' || $_smarty_tpl->tpl_vars['get']->value == 'genre_games' || $_smarty_tpl->tpl_vars['get']->value == 'played_games') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_game');
$_smarty_tpl->tpl_vars['_game']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_game']->value) {
$_smarty_tpl->tpl_vars['_game']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_game.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box'), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'notifications') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'notification');
$_smarty_tpl->tpl_vars['notification']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['notification']->value) {
$_smarty_tpl->tpl_vars['notification']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_notification.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'conversations') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'conversation');
$_smarty_tpl->tpl_vars['conversation']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['conversation']->value) {
$_smarty_tpl->tpl_vars['conversation']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_conversation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'messages') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'message');
$_smarty_tpl->tpl_vars['message']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_message.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'job_candidates') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'candidate');
$_smarty_tpl->tpl_vars['candidate']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['candidate']->value) {
$_smarty_tpl->tpl_vars['candidate']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_candidate.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'search_posts' || $_smarty_tpl->tpl_vars['get']->value == 'search_articles') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'search_users') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value['connection']), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'search_pages') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_page');
$_smarty_tpl->tpl_vars['_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
$_smarty_tpl->tpl_vars['_page']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list"), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'search_groups') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_group');
$_smarty_tpl->tpl_vars['_group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_group']->value) {
$_smarty_tpl->tpl_vars['_group']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list"), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->tpl_vars['get']->value == 'search_events') {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, '_event');
$_smarty_tpl->tpl_vars['_event']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_event']->value) {
$_smarty_tpl->tpl_vars['_event']->do_else = false;
?>
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list"), 0, true);
?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php }
}
}
