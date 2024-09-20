<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:16
  from '/var/www/html/social/content/themes/namoroeswing/templates/_head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e457403152a0_09136181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b20637a99446adb0513a142595246ea579d1e8b' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/_head.tpl',
      1 => 1725499308,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.css.tpl' => 1,
  ),
),false)) {
function content_66e457403152a0_09136181 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/social/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<!doctype html>

<html data-lang="<?php echo $_smarty_tpl->tpl_vars['system']->value['language']['code'];?>
" <?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == "RTL") {?> dir="RTL" <?php }?>>

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Sngine">
    <meta name="version" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_version'];?>
">

    <!-- Title -->
    <title><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_title']->value,70);?>
</title>
    <!-- Title -->

    <!-- Meta -->
    <meta name="description" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_description']->value,300);?>
">
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_keywords'];?>
">
    <!-- Meta -->

    <!-- OG-Meta -->
    <meta property="og:title" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_title']->value,70);?>
" />
    <meta property="og:description" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_description']->value,300);?>
" />
    <meta property="og:site_name" content="<?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
" />
    <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['page_image']->value;?>
" />
    <!-- OG-Meta -->

    <!-- Twitter-Meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_title']->value,70);?>
" />
    <meta name="twitter:description" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_description']->value,300);?>
" />
    <meta name="twitter:image" content="<?php echo $_smarty_tpl->tpl_vars['page_image']->value;?>
" />
    <!-- Twitter-Meta -->

    <!-- Favicon -->
    <?php if ($_smarty_tpl->tpl_vars['system']->value['system_favicon_default']) {?>
      <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/favicon.png" />
    <?php } elseif ($_smarty_tpl->tpl_vars['system']->value['system_favicon']) {?>
      <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_favicon'];?>
" />
    <?php }?>
    <!-- Favicon -->

    <!-- Fonts [Poppins|Font-Awesome] -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fonts [Poppins|Font-Awesome] -->

    <!-- CSS -->
    <?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == "LTR") {?>
      <link href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/namoroeswing/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css" rel="stylesheet">
      <!--<link href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/namoroeswing/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
      <link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/css/style.min.css">
      <link href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/namoroeswing/select2@4.1.0-rc.0/dist/css/select2.css" rel="stylesheet" />
    <?php } else { ?>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
      <link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/css/style.rtl.min.css">
      <link href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/namoroeswing/select2@4.1.0-rc.0/dist/css/select2.css" rel="stylesheet" />
    <?php }?>
    <!-- CSS -->

    <!-- CSS Customized -->
    <?php $_smarty_tpl->_subTemplateRender('file:_head.css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- CSS Customized -->

    <!-- Header Custom JavaScript -->
    <?php if ($_smarty_tpl->tpl_vars['system']->value['custome_js_header']) {?>
      <?php echo '<script'; ?>
>
        <?php echo html_entity_decode($_smarty_tpl->tpl_vars['system']->value['custome_js_header'],ENT_QUOTES);?>

      <?php echo '</script'; ?>
>
    <?php }?>
    <!-- Header Custom JavaScript -->

</head><?php }
}
