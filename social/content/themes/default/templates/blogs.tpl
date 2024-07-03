{include file='_head.tpl'}
{include file='_header.tpl'}

{if $view == ""}
  <!-- page header -->
  <div class="page-header">
    <img class="floating-img d-none d-md-block" src="{$system['system_url']}/content/themes/{$system['theme']}/images/headers/undraw_content_creator_xeju.svg">
    <div class="circle-2"></div>
    <div class="circle-3"></div>
    <div class="{if $system['fluid_design']}container-fluid{else}container{/if}">
      <h2>{__("Blogs")}</h2>
      <p class="text-xlg">{__($system['system_description_blogs'])}</p>
      <div class="row mt20">
        <div class="col-sm-9 col-lg-6 mx-sm-auto">
          <form class="js_search-form" data-filter="articles">
            <div class="input-group">
              <input type="text" class="form-control" name="query" placeholder='{__("Search for articles")}'>
              <button type="submit" class="btn btn-light">{__("Search")}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- page header -->
{/if}


<!-- page content -->
<div class="{if $system['fluid_design']}container-fluid{else}container{/if} mt20 sg-offcanvas">
  <div class="row">

    {if $view == ""}

      <!-- side panel -->
      <div class="col-12 d-block d-md-none sg-offcanvas-sidebar">
        {include file='_sidebar.tpl'}
      </div>
      <!-- side panel -->

      <!-- content panel -->
      <div class="col-12 sg-offcanvas-mainbar">
        <div class="blogs-wrapper">
          {if $articles}
            <ul class="row">
              <!-- articles -->
              {foreach $articles as $article}
                {include file='__feeds_article.tpl' _tpl="featured" _iteration=$article@iteration}
              {/foreach}
              <!-- articles -->
            </ul>

            <!-- see-more -->
            <div class="alert alert-post see-more js_see-more" data-get="articles">
              <span>{__("More Articles")}</span>
              <div class="loader loader_small x-hidden"></div>
            </div>
            <!-- see-more -->
          {else}
            {include file='_no_data.tpl'}
          {/if}
        </div>
      </div>
      <!-- content panel -->

    {elseif $view == "category"}

      <!-- side panel -->
      <div class="col-12 d-block d-md-none sg-offcanvas-sidebar">
        {include file='_sidebar.tpl'}
      </div>
      <!-- side panel -->

      <!-- content panel -->
      <div class="col-12 sg-offcanvas-mainbar">
        <div class="row">
          <!-- left panel -->
          <div class="col-md-8 mb20">
            {if $articles}
              <ul>
                {foreach $articles as $article}
                  {include file='__feeds_article.tpl'}
                {/foreach}
              </ul>

              <!-- see-more -->
              <div class="alert alert-post see-more js_see-more" data-get="category_articles" data-id="{$category['category_id']}">
                <span>{__("More Articles")}</span>
                <div class="loader loader_small x-hidden"></div>
              </div>
              <!-- see-more -->
            {else}
              {include file='_no_data.tpl'}
            {/if}
          </div>
          <!-- left panel -->

          <!-- right panel -->
          <div class="col-md-4">
            <!-- add new article -->
            {if $user->_logged_in && $user->_data['can_write_articles']}
              <div class="mb10 d-none d-sm-block">
                <div class="d-grid">
                  <a href="{$system['system_url']}/blogs/new" class="btn btn-success">
                    <i class="fa fa-edit mr5"></i>{__("Write New Article")}
                  </a>
                </div>
              </div>
            {/if}
            <!-- add new article -->

            {include file='_ads.tpl'}
            {include file='_widget.tpl'}

            {if $category['category_description']}
              <!-- category description -->
              <div class="articles-widget-header">
                <div class="articles-widget-title">{__("Description")}</div>
              </div>
              <div class="mb15">
                {__($category['category_description'])}
              </div>
              <!-- category description -->
            {/if}

            {if $blogs_categories}
              <!-- blogs categories -->
              <div class="articles-widget-header">
                <div class="articles-widget-title">{__("Sub-Categories")}</div>
              </div>
              <ul class="article-categories clearfix">
                {foreach $blogs_categories as $category}
                  <li>
                    <a class="article-category" href="{$system['system_url']}/blogs/category/{$category['category_id']}/{$category['category_url']}">
                      {__($category['category_name'])}
                    </a>
                  </li>
                {/foreach}
              </ul>
              <!-- blogs categories -->
            {/if}

            <!-- read more -->
            <div class="articles-widget-header">
              <div class="articles-widget-title">{__("Read More")}</div>
            </div>

            {foreach $latest_articles as $article}
              {include file='__feeds_article.tpl' _small=true}
            {/foreach}
            <!-- read more -->
          </div>
          <!-- right panel -->
        </div>
      </div>
      <!-- content panel -->

    {elseif $view == "article"}

      <!-- side panel -->
      <div class="col-12 d-block d-md-none sg-offcanvas-sidebar">
        {include file='_sidebar.tpl'}
      </div>
      <!-- side panel -->

      <!-- content panel -->
      <div class="col-12 sg-offcanvas-mainbar">
        <div class="row">
          <!-- left panel -->
          <div class="col-md-8 mb20">
            {if $article['needs_subscription']}
              <div class="article-wrapper">
                <div class="ptb20 plr20">
                  {include file='_need_subscription.tpl'}
                </div>
              </div>
            {elseif $article['needs_pro_package']}
              <div class="article-wrapper">
                <div class="ptb20 plr20">
                  {include file='_need_pro_package.tpl' _manage = true}
                </div>
              </div>
            {else}
              <div class="article mb20" data-id="{$article['post_id']}">
                <div class="article-wrapper {if $user->_logged_in}pb10{/if}">
                  {if $article['manage_post']}
                    <div class="text-end">
                      <a type="button" class="btn btn-sm btn-light" href="{$system['system_url']}/blogs/edit/{$article['post_id']}">
                        {__("Edit")}
                      </a>
                    </div>
                  {/if}

                  <!-- article category -->
                  <div class="mb10">
                    <a class="article-category" href="{$system['system_url']}/blogs/category/{$article['article']['category_id']}/{$article['article']['category_url']}">
                      {__($article['article']['category_name'])}
                    </a>
                  </div>
                  <!-- article category -->

                  <!-- article title -->
                  <h3>{$article['article']['title']}</h3>
                  <!-- article title -->

                  <!-- article meta -->
                  <div class="row">
                    <div class="col-md-6 mb20">
                      <div class="post-avatar">
                        <a class="post-avatar-picture" href="{$article['post_author_url']}" style="background-image:url({$article['post_author_picture']});">
                        </a>
                      </div>
                      <div class="post-meta">
                        <div>
                          <!-- post author name -->
                          <span class="js_user-popover" data-type="{$article['user_type']}" data-uid="{$article['user_id']}">
                            <a href="{$article['post_author_url']}">{$article['post_author_name']}</a>
                          </span>
                          {if $article['post_author_verified']}
                            <span class="verified-badge" data-bs-toggle="tooltip" title='{if $article['user_type'] == "user"}{__("Verified User")}{else}{__("Verified Page")}{/if}'>
                              {include file='__svg_icons.tpl' icon="verified_badge" width="20px" height="20px"}
                            </span>
                          {/if}
                          {if $article['user_subscribed']}
                            <span class="pro-badge" data-bs-toggle="tooltip" title='{__("Pro User")}'>
                              {include file='__svg_icons.tpl' icon="pro_badge" width="20px" height="20px"}
                            </span>
                          {/if}
                          <!-- post author name -->
                        </div>
                        <div class="post-time">
                          {__("Posted")} <span class="js_moment" data-time="{$article['time']}">{$article['time']}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 text-end mb20">
                      <a class="article-meta-counter unselectable" href="#article-comments">
                        <i class="fa fa-comments fa-fw"></i> {$article['comments']}
                      </a>
                      <div class="article-meta-counter unselectable">
                        <i class="fa fa-eye fa-fw"></i> {$article['article']['views']}
                      </div>
                    </div>
                  </div>
                  <!-- article meta -->

                  <!-- social share -->
                  <div class="mb20">
                    <a href="http://www.facebook.com/sharer.php?u={$system['system_url']}/blogs/{$article['post_id']}/{$article['article']['title_url']}" class="btn btn-sm btn-rounded btn-social-icon btn-facebook" target="_blank">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={$system['system_url']}/blogs/{$article['post_id']}/{$article['article']['title_url']}" class="btn btn-sm btn-rounded btn-social-icon btn-rounded btn-twitter" target="_blank">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://vk.com/share.php?url={$system['system_url']}/blogs/{$article['post_id']}/{$article['article']['title_url']}" class="btn btn-sm btn-rounded btn-social-icon btn-vk" target="_blank">
                      <i class="fab fa-vk"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={$system['system_url']}/blogs/{$article['post_id']}/{$article['article']['title_url']}" class="btn btn-sm btn-rounded btn-social-icon btn-linkedin" target="_blank">
                      <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={$system['system_url']}/blogs/{$article['post_id']}/{$article['article']['title_url']}" class="btn btn-sm btn-rounded btn-social-icon btn-whatsapp d-none d-sm-inline-block" target="_blank">
                      <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://reddit.com/submit?url={$system['system_url']}/blogs/{$article['post_id']}/{$article['article']['title_url']}" class="btn btn-sm btn-rounded btn-social-icon btn-reddit" target="_blank">
                      <i class="fab fa-reddit"></i>
                    </a>
                    <a href="https://pinterest.com/pin/create/button/?url={$system['system_url']}/blogs/{$article['post_id']}/{$article['article']['title_url']}" class="btn btn-sm btn-rounded btn-social-icon btn-pinterest" target="_blank">
                      <i class="fab fa-pinterest"></i>
                    </a>
                  </div>
                  <!-- social share -->

                  <!-- article cover -->
                  {if $article['article']['cover']}
                    <div class="mb20">
                      <img class="img-fluid" src="{$article['article']['parsed_cover']}">
                    </div>
                  {/if}
                  <!-- article cover -->

                  <!-- article text -->
                  <div class="article-text text-with-list" dir="auto">
                    {$article['article']['parsed_text']}
                  </div>
                  <!-- article text -->

                  <!-- article tags -->
                  {if $article['article']['parsed_tags']}
                    <div class="article-tags">
                      <ul>
                        {foreach $article['article']['parsed_tags'] as $tag}
                          <li>
                            <a href="{$system['system_url']}/search/hashtag/{$tag}">{__($tag)}</a>
                          </li>
                        {/foreach}
                      </ul>
                    </div>
                  {/if}
                  <!-- article tags -->

                  <!-- post stats -->
                  <div class="post-stats clearfix">
                    <!-- reactions stats -->
                    {if $article['reactions_total_count'] > 0}
                      <div class="float-start mr10" data-toggle="modal" data-url="posts/who_reacts.php?post_id={$article['post_id']}">
                        <div class="reactions-stats">
                          {foreach $article['reactions'] as $reaction_type => $reaction_count}
                            {if $reaction_count > 0}
                              <div class="reactions-stats-item">
                                <div class="inline-emoji no_animation">
                                  {include file='__reaction_emojis.tpl' _reaction=$reaction_type}
                                </div>
                              </div>
                            {/if}
                          {/foreach}
                          <!-- reactions count -->
                          <span>
                            {$article['reactions_total_count']}
                          </span>
                          <!-- reactions count -->
                        </div>
                      </div>
                    {/if}
                    <!-- reactions stats -->
                  </div>
                  <!-- post stats -->

                  <!-- post actions -->
                  {if $user->_logged_in}
                    <div class="post-actions">
                      <!-- reactions -->
                      <div class="action-btn unselectable reactions-wrapper {if $article['i_react']}js_unreact-post{/if}" data-reaction="{$article['i_reaction']}">
                        <!-- reaction-btn -->
                        <div class="reaction-btn">
                          {if !$article['i_react']}
                            <div class="reaction-btn-icon">
                              <i class="far fa-smile fa-fw action-icon"></i>
                            </div>
                            <span class="reaction-btn-name d-none d-xl-inline-block">{__("React")}</span>
                          {else}
                            <div class="reaction-btn-icon">
                              <div class="inline-emoji no_animation">
                                {include file='__reaction_emojis.tpl' _reaction=$article['i_reaction']}
                              </div>
                            </div>
                            <span class="reaction-btn-name" style="{$reactions[$article['i_reaction']]['color']}">{__($reactions[$article['i_reaction']]['title'])}</span>
                          {/if}
                        </div>
                        <!-- reaction-btn -->

                        <!-- reactions-container -->
                        <div class="reactions-container">
                          {foreach $reactions as $reaction}
                            <div class="reactions_item reaction reaction-{$reaction@iteration} js_react-post" data-reaction="{$reaction['reaction']}" data-reaction-color="{$reaction['color']}" data-title="{__($reaction['title'])}">
                              {include file='__reaction_emojis.tpl' _reaction=$reaction['reaction']}
                            </div>
                          {/foreach}
                        </div>
                        <!-- reactions-container -->
                      </div>
                      <!-- reactions -->

                      <!-- comment -->
                      <div class="action-btn js_comment {if $article['comments_disabled']}x-hidden{/if}">
                        {include file='__svg_icons.tpl' icon="comment" class="main-icon mr5" width="24px" height="24px"}
                        <span class="d-none d-xl-inline-block">{__("Comment")}</span>
                      </div>
                      <!-- comment -->

                      <!-- share -->
                      {if $article['privacy'] == "public"}
                        <div class="action-btn" data-toggle="modal" data-url="posts/share.php?do=create&post_id={$article['post_id']}">
                          {include file='__svg_icons.tpl' icon="share" class="main-icon mr5" width="24px" height="24px"}
                          <span class="d-none d-xl-inline-block">{__("Share")}</span>
                        </div>
                      {/if}
                      <!-- share -->
                    </div>
                  {/if}
                  <!-- post actions -->
                </div>

                <!-- post footer -->
                <div class="post-footer" id="article-comments">
                  {if $user->_logged_in}
                    <!-- comments -->
                    {include file='__feeds_post.comments.tpl' post=$article}
                    <!-- comments -->
                  {else}
                    <div class="ptb10">
                      <a href="{$system['system_url']}/signin">{__("Please log in to like, share and comment!")}</a>
                    </div>
                  {/if}
                </div>
                <!-- post footer -->
              </div>
            {/if}
            {include file='_ads.tpl' ads=$ads_footer}
          </div>
          <!-- left panel -->

          <!-- right panel -->
          <div class="col-md-4">
            <!-- add new article -->
            {if $user->_logged_in && $user->_data['can_write_articles']}
              <div class="mb10 d-none d-sm-block">
                <div class="d-grid">
                  <a href="{$system['system_url']}/blogs/new" class="btn btn-success">
                    <i class="fa fa-edit mr5"></i>{__("Write New Article")}
                  </a>
                </div>
              </div>
            {/if}
            <!-- add new article -->

            <!-- search -->
            <div class="articles-widget-header">
              <div class="articles-widget-title">{__("Search")}</div>
            </div>
            <div class="mb10">
              <form class="js_search-form" data-filter="articles">
                <div class="input-group">
                  <input type="text" class="form-control" name="query" placeholder='{__("Search for articles")}'>
                  <button type="submit" class="btn btn-secondary">{__("Search")}</button>
                </div>
              </form>
            </div>
            <!-- search -->

            {include file='_ads.tpl'}
            {include file='_widget.tpl'}

            <!-- blogs categories -->
            <div class="articles-widget-header">
              <div class="articles-widget-title">{__("Categories")}</div>
            </div>
            <ul class="article-categories clearfix">
              {foreach $blogs_categories as $category}
                <li>
                  <a class="article-category" href="{$system['system_url']}/blogs/category/{$category['category_id']}/{$category['category_url']}">
                    {__($category['category_name'])}
                  </a>
                </li>
              {/foreach}
            </ul>
            <!-- blogs categories -->

            <!-- read more -->
            <div class="articles-widget-header">
              <div class="articles-widget-title">{__("Read More")}</div>
            </div>

            {foreach $latest_articles as $article}
              {include file='__feeds_article.tpl' _small=true}
            {/foreach}
            <!-- read more -->
          </div>
          <!-- right panel -->
        </div>
      </div>
      <!-- content panel -->

    {elseif $view == "edit"}

      <!-- side panel -->
      <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar js_sticky-sidebar">
        {include file='_sidebar.tpl'}
      </div>
      <!-- side panel -->

      <!-- content panel -->
      <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">
        <!-- content -->
        <div class="card">
          <div class="card-header with-icon">
            {include file='__svg_icons.tpl' icon="articles" class="main-icon mr5" width="24px" height="24px"}
            {__("Edit Article")}
            <div class="float-end">
              <a href="{$system['system_url']}/blogs/{$article['post_id']}/{$article['article']['title_url']}" class="btn btn-md btn-light">
                <i class="fa fa-arrow-circle-left mr5"></i>{__("Go Back")}
              </a>
            </div>
          </div>
          <div class="js_ajax-forms-html " data-url="posts/article.php?do=edit&id={$article['post_id']}">
            <div class="card-body">
              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Title")}
                </label>
                <div class="col-md-10">
                  <input class="form-control" name="title" value="{$article['article']['title']}">
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Content")}
                </label>
                <div class="col-md-10">
                  <textarea name="text" class="form-control js_wysiwyg">{$article['article']['text']}</textarea>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Cover")}
                </label>
                <div class="col-md-10">
                  {if $article['article']['cover'] == ''}
                    <div class="x-image">
                      <button type="button" class="btn-close x-hidden js_x-image-remover" title='{__("Remove")}'>

                      </button>
                      <div class="x-image-loader">
                        <div class="progress x-progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                      <input type="hidden" class="js_x-image-input" name="cover" value="">
                    </div>
                  {else}
                    <div class="x-image" style="background-image: url('{$system['system_uploads']}/{$article['article']['cover']}')">
                      <button type="button" class="btn-close js_x-image-remover" title='{__("Remove")}'>

                      </button>
                      <div class="x-image-loader">
                        <div class="progress x-progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                      <input type="hidden" class="js_x-image-input" name="cover" value="{$article['article']['cover']}">
                    </div>
                  {/if}
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Category")}
                </label>
                <div class="col-md-10">
                  <select class="form-control" name="category">
                    <option>{__("Select Category")}</option>
                    {foreach $blogs_categories as $category}
                      {include file='__categories.recursive_options.tpl' data_category=$article['article']['category_id']}
                    {/foreach}
                  </select>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Tags")}
                </label>
                <div class="col-md-10">
                  <input class="form-control" name="tags" value="{$article['article']['tags']}">
                </div>
              </div>

              <!-- error -->
              <div class="alert alert-danger mt15 mb0 x-hidden"></div>
              <!-- error -->
            </div>
            <div class="card-footer text-end">
              <button type="button" class="btn btn-danger js_delete-article" data-id="{$article['post_id']}">
                <i class="fa fa-trash mr5"></i>{__("Delete Article")}
              </button>
              <button type="submit" class="btn btn-primary">{__("Publish")}</button>
            </div>
          </div>
        </div>
        <!-- content -->
      </div>
      <!-- content panel -->

    {elseif $view == "new"}

      <!-- side panel -->
      <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar js_sticky-sidebar">
        {include file='_sidebar.tpl'}
      </div>
      <!-- side panel -->

      <!-- content panel -->
      <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">
        <!-- content -->
        <div class="card">
          <div class="card-header with-icon">
            {include file='__svg_icons.tpl' icon="articles" class="main-icon mr5" width="24px" height="24px"}
            {__("Write New Article")}
          </div>
          <div class="js_ajax-forms-html" data-url="posts/article.php?do=create">
            <div class="card-body">
              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Publish To")}
                </label>
                <div class="col-md-10">
                  <!-- publish to options -->
                  <div>
                    <!-- Timeline -->
                    <input class="x-hidden input-label" type="radio" name="publish_to" id="publish_to_timeline" value="timeline" {if $share_to == "timeline"}checked="checked" {/if} />
                    <label class="button-label" for="publish_to_timeline">
                      <div class="icon">
                        {include file='__svg_icons.tpl' icon="newsfeed" class="main-icon" width="20px" height="20px"}
                      </div>
                      <div class="title">{__("Timeline")}</div>
                    </label>
                    <!-- Timeline -->
                    <!-- Page -->
                    {if $system['pages_enabled'] && $pages}
                      <input class="x-hidden input-label" type="radio" name="publish_to" id="publish_to_page" value="page" {if $share_to == "page"}checked="checked" {/if} />
                      <label class="button-label" for="publish_to_page">
                        <div class="icon">
                          {include file='__svg_icons.tpl' icon="pages" class="main-icon" width="20px" height="20px"}
                        </div>
                        <div class="title">{__("Page")}</div>
                      </label>
                    {/if}
                    <!-- Page -->
                    <!-- Group -->
                    {if $system['groups_enabled'] && $groups}
                      <input class="x-hidden input-label" type="radio" name="publish_to" id="publish_to_group" value="group" {if $share_to == "group"}checked="checked" {/if} />
                      <label class="button-label" for="publish_to_group">
                        <div class="icon">
                          {include file='__svg_icons.tpl' icon="groups" class="main-icon" width="20px" height="20px"}
                        </div>
                        <div class="title">{__("Group")}</div>
                      </label>
                    {/if}
                    <!-- Group -->
                    <!-- Event -->
                    {if $system['events_enabled'] && $events}
                      <input class="x-hidden input-label" type="radio" name="publish_to" id="publish_to_event" value="event" {if $share_to == "event"}checked="checked" {/if} />
                      <label class="button-label" for="publish_to_event">
                        <div class="icon">
                          {include file='__svg_icons.tpl' icon="events" class="main-icon" width="20px" height="20px"}
                        </div>
                        <div class="title">{__("Event")}</div>
                      </label>
                    {/if}
                    <!-- Event -->
                  </div>
                  <!-- publish to options -->
                </div>
              </div>

              <div id="js_publish-to-page" {if $share_to != "page"}class="x-hidden" {/if}>
                <div class="row">
                  <label class="col-md-2 form-label">
                    {__("Select Page")}
                  </label>
                  <div class="col-md-10">
                    <select name="page_id" class="form-control">
                      {foreach $pages as $page}
                        <option value="{$page['page_id']}" {if $share_to_page_id == $page['page_id']}selected{/if}>{$page['page_title']}</option>
                      {/foreach}
                    </select>
                  </div>
                </div>
              </div>

              <div id="js_publish-to-group" {if $share_to != "group"}class="x-hidden" {/if}>
                <div class="row">
                  <label class="col-md-2 form-label">
                    {__("Select Group")}
                  </label>
                  <div class="col-md-10">
                    <select name="group_id" class="form-control">
                      {foreach $groups as $group}
                        <option value="{$group['group_id']}" {if $share_to_group_id == $group['group_id']}selected{/if}>{$group['group_title']}</option>
                      {/foreach}
                    </select>
                  </div>
                </div>
              </div>

              <div id="js_publish-to-event" {if $share_to != "event"}class="x-hidden" {/if}>
                <div class="row">
                  <label class="col-md-2 form-label">
                    {__("Select Event")}
                  </label>
                  <div class="col-md-10">
                    <select name="event_id" class="form-control">
                      {foreach $events as $event}
                        <option value="{$event['event_id']}" {if $share_to_event_id == $event['event_id']}selected{/if}>{$event['event_title']}</option>
                      {/foreach}
                    </select>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Title")}
                </label>
                <div class="col-md-10">
                  <input class="form-control" name="title">
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Content")}
                </label>
                <div class="col-md-10">
                  <textarea name="text" class="form-control js_wysiwyg"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Cover")}
                </label>
                <div class="col-md-10">
                  <div class="x-image">
                    <button type="button" class="btn-close x-hidden js_x-image-remover" title='{__("Remove")}'>

                    </button>
                    <div class="x-image-loader">
                      <div class="progress x-progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                    <input type="hidden" class="js_x-image-input" name="cover">
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Category")}
                </label>
                <div class="col-md-10">
                  <select class="form-control" name="category">
                    <option>{__("Select Category")}</option>
                    {foreach $blogs_categories as $category}
                      {include file='__categories.recursive_options.tpl'}
                    {/foreach}
                  </select>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  {__("Tags")}
                </label>
                <div class="col-md-10">
                  <input class="form-control" name="tags">
                </div>
              </div>

              <!-- error -->
              <div class="alert alert-danger mt15 mb0 x-hidden"></div>
              <!-- error -->
            </div>
            <div class="card-footer text-end">
              <button type="submit" class="btn btn-primary">{__("Publish")}</button>
            </div>
          </div>
        </div>
        <!-- content -->
      </div>
      <!-- content panel -->

    {/if}
  </div>
</div>
<!-- page content -->

{include file='_footer.tpl'}

<script>
  /* share post */
  $('input[type=radio][name=publish_to]').on('change', function() {
    switch ($(this).val()) {
      case 'timeline':
        $('#js_publish-to-page').hide();
        $('#js_publish-to-group').hide();
        $('#js_publish-to-event').hide();
        break;
      case 'page':
        $('#js_publish-to-page').fadeIn();
        $('#js_publish-to-group').hide();
        $('#js_publish-to-event').hide();
        break;
      case 'group':
        $('#js_publish-to-page').hide();
        $('#js_publish-to-group').fadeIn();
        $('#js_publish-to-event').hide();
        break;
      case 'event':
        $('#js_publish-to-page').hide();
        $('#js_publish-to-group').hide();
        $('#js_publish-to-event').fadeIn();
        break;
    }
  });
</script>