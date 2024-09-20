<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:27
  from '/var/www/html/social/content/themes/namoroeswing/templates/_posts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4574b010625_09035166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b7c8daa505b984585566ebd7a90bbbb731bcb16' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/_posts.tpl',
      1 => 1725499301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 16,
    'file:__feeds_post.tpl' => 1,
    'file:_no_data.tpl' => 1,
  ),
),false)) {
function content_66e4574b010625_09035166 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- posts-filter -->
<div class="posts-filter">
  <span><?php if ($_smarty_tpl->tpl_vars['_title']->value) {
echo $_smarty_tpl->tpl_vars['_title']->value;
} else {
echo __("Recent Updates");
}?></span>
  <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && !$_smarty_tpl->tpl_vars['_filter']->value) {?>
    <div class="float-end">
      <div class="btn-group btn-group-sm js_posts-filter" data-value="all" title='<?php echo __("All");?>
'>
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-display="static">
          <i class="btn-group-icon fa fa-bars fa-fw"></i> <span class="btn-group-text"><?php echo __("All");?>
</span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <div class="js_scroller">
            <div class="dropdown-item pointer" data-title='<?php echo __("All");?>
' data-value="all">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsfeed",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, false);
?>
              <?php echo __("All");?>

            </div>
            <div class="dropdown-item pointer" data-title='<?php echo __("Text");?>
' data-value="">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"comments",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
              <?php echo __("Text");?>

            </div>
            <div class="dropdown-item pointer" data-title='<?php echo __("Links");?>
' data-value="link">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"links",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
              <?php echo __("Links");?>
</div>
            <div class="dropdown-item pointer" data-title='<?php echo __("Media");?>
' data-value="media">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"media",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
              <?php echo __("Media");?>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['live_enabled'] && $_smarty_tpl->tpl_vars['_get']->value != "posts_page" && $_smarty_tpl->tpl_vars['_get']->value != "posts_group" && $_smarty_tpl->tpl_vars['_get']->value != "posts_event") {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Live");?>
' data-value="live">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"live",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Live");?>

              </div>
            <?php }?>
            <div class="dropdown-item pointer" data-title='<?php echo __("Photos");?>
' data-value="photos">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
              <?php echo __("Photos");?>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['geolocation_enabled']) {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Maps");?>
' data-value="map">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Maps");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['blogs_enabled'] && $_smarty_tpl->tpl_vars['_get']->value != "posts_page" && $_smarty_tpl->tpl_vars['_get']->value != "posts_group" && $_smarty_tpl->tpl_vars['_get']->value != "posts_event") {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Articles");?>
' data-value="article">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"articles",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Articles");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['market_enabled'] && $_smarty_tpl->tpl_vars['_get']->value != "posts_page" && $_smarty_tpl->tpl_vars['_get']->value != "posts_group" && $_smarty_tpl->tpl_vars['_get']->value != "posts_event") {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Products");?>
' data-value="product">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"products",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Products");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['funding_enabled'] && $_smarty_tpl->tpl_vars['_get']->value != "posts_page" && $_smarty_tpl->tpl_vars['_get']->value != "posts_group" && $_smarty_tpl->tpl_vars['_get']->value != "posts_event") {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Funding");?>
' data-value="funding">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"funding",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Funding");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['offers_enabled'] && $_smarty_tpl->tpl_vars['_get']->value != "posts_group" && $_smarty_tpl->tpl_vars['_get']->value != "posts_event") {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Offers");?>
' data-value="offer">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"offers",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Offers");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['jobs_enabled'] && $_smarty_tpl->tpl_vars['_get']->value != "posts_group" && $_smarty_tpl->tpl_vars['_get']->value != "posts_event") {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Jobs");?>
' data-value="job">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"jobs",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Jobs");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['polls_enabled']) {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Polls");?>
' data-value="poll">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"polls",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Polls");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['videos_enabled']) {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Videos");?>
' data-value="video">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Videos");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['audio_enabled']) {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Audios");?>
' data-value="audio">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"audios",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Audios");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['file_enabled']) {?>
              <div class="dropdown-item pointer" data-title='<?php echo __("Files");?>
' data-value="file">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"files",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Files");?>

              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  <?php } elseif ($_smarty_tpl->tpl_vars['_filter']->value == "article") {?>
    <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_write_articles']) {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/new" class="btn btn-sm btn-primary">
          <?php echo __("Add New Article");?>

        </a>
      </div>
    <?php }?>
  <?php } elseif ($_smarty_tpl->tpl_vars['_filter']->value == "product") {?>
    <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_sell_products']) {?>
      <div class="float-end">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-url="posts/product.php?do=create">
          <?php echo __("Add New Product");?>

        </button>
      </div>
    <?php }?>
  <?php } elseif ($_smarty_tpl->tpl_vars['_filter']->value == "funding") {?>
    <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_raise_funding']) {?>
      <div class="float-end">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-url="posts/funding.php?do=create">
          <?php echo __("Add Funding Request");?>

        </button>
      </div>
    <?php }?>
  <?php }?>

  <!-- newsfeed location filter -->
  <?php if ($_smarty_tpl->tpl_vars['system']->value['newsfeed_location_filter_enabled'] && in_array($_smarty_tpl->tpl_vars['page']->value,array('index','group','event')) && $_smarty_tpl->tpl_vars['view']->value != "boosted_posts" && (!$_smarty_tpl->tpl_vars['_filter']->value || $_smarty_tpl->tpl_vars['view']->value == "watch")) {?>
    <div class="float-end mr10">
      <a href="#" data-bs-toggle="dropdown" class="countries-filter">
        <i class="fa fa-globe fa-fw"></i>
        <?php if ($_smarty_tpl->tpl_vars['selected_country']->value) {?>
          <span><?php echo $_smarty_tpl->tpl_vars['selected_country']->value['country_name'];?>
</span>
        <?php } else { ?>
          <span><?php echo __("All Countries");?>
</span>
        <?php }?>
      </a>
      <div class="dropdown-menu dropdown-menu-end countries-dropdown">
        <div class="js_scroller">
          <a class="dropdown-item" href="?country=all">
            <?php echo __("All Countries");?>

          </a>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
            <a class="dropdown-item" href="?country=<?php echo $_smarty_tpl->tpl_vars['country']->value['country_name_native'];?>
">
              <?php echo $_smarty_tpl->tpl_vars['country']->value['country_name'];?>

            </a>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
      </div>
    </div>
  <?php }?>
  <!-- newsfeed location filter -->
</div>
<!-- posts-filter -->

<!-- posts-loader -->
<div class="post x-hidden js_posts_loader">
  <div class="post-body with-loader">
    <div class="panel-effect">
      <div class="fake-effect fe-0"></div>
      <div class="fake-effect fe-1"></div>
      <div class="fake-effect fe-2"></div>
      <div class="fake-effect fe-3"></div>
      <div class="fake-effect fe-4"></div>
      <div class="fake-effect fe-5"></div>
      <div class="fake-effect fe-6"></div>
      <div class="fake-effect fe-7"></div>
      <div class="fake-effect fe-8"></div>
      <div class="fake-effect fe-9"></div>
      <div class="fake-effect fe-10"></div>
      <div class="fake-effect fe-11"></div>
    </div>
  </div>
</div>
<!-- posts-loader -->

<!-- posts staging -->
<button class="btn btn-primary rounded-pill posts-staging-btn js_view-staging-posts">
  <?php echo __("View");?>
 <span>0</span> <?php echo __("New Posts");?>

</button>

<div class="js_posts_stream_staging" style="display: none;"></div>
<!-- posts staging -->

<!-- posts stream -->
<div class="js_posts_stream" data-get="<?php echo $_smarty_tpl->tpl_vars['_get']->value;?>
" data-filter="<?php if ($_smarty_tpl->tpl_vars['_filter']->value) {
echo $_smarty_tpl->tpl_vars['_filter']->value;
} else { ?>all<?php }?>" data-country="<?php if ($_smarty_tpl->tpl_vars['selected_country']->value) {
echo $_smarty_tpl->tpl_vars['selected_country']->value['country_id'];
} else { ?>all<?php }?>" <?php if ($_smarty_tpl->tpl_vars['_id']->value) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_id']->value;?>
" <?php }?>>
  <?php if ($_smarty_tpl->tpl_vars['posts']->value) {?>
    <ul>
      <!-- posts -->
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>$_smarty_tpl->tpl_vars['_get']->value), 0, true);
?>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <!-- posts -->
    </ul>

    <!-- see-more -->
    <div class="alert alert-post see-more mb20 js_see-more js_see-more-infinite" data-get="<?php echo $_smarty_tpl->tpl_vars['_get']->value;?>
" data-filter="<?php if ($_smarty_tpl->tpl_vars['_filter']->value) {
echo $_smarty_tpl->tpl_vars['_filter']->value;
} else { ?>all<?php }?>" data-country="<?php if ($_smarty_tpl->tpl_vars['selected_country']->value) {
echo $_smarty_tpl->tpl_vars['selected_country']->value['country_id'];
} else { ?>all<?php }?>" <?php if ($_smarty_tpl->tpl_vars['_id']->value) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_id']->value;?>
" <?php }?>>
      <span><?php echo __("More Stories");?>
</span>
      <div class="loader loader_small x-hidden"></div>
    </div>
    <!-- see-more -->
  <?php } else { ?>
    <div class="js_posts_stream" data-get="<?php echo $_smarty_tpl->tpl_vars['_get']->value;?>
" data-filter="<?php if ($_smarty_tpl->tpl_vars['_filter']->value) {
echo $_smarty_tpl->tpl_vars['_filter']->value;
} else { ?>all<?php }?>" data-country="<?php if ($_smarty_tpl->tpl_vars['selected_country']->value) {
echo $_smarty_tpl->tpl_vars['selected_country']->value['country_id'];
} else { ?>all<?php }?>" <?php if ($_smarty_tpl->tpl_vars['_id']->value) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_id']->value;?>
" <?php }?>>
      <ul>
        <?php $_smarty_tpl->_subTemplateRender('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </ul>
    </div>
  <?php }?>
</div>
<!-- posts stream --><?php }
}
