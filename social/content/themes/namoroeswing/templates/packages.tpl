{include file='_head.tpl'}
{include file='_header.tpl'}


{if $view == "packages"}

  <!-- page header -->
  <div class="page-header">
    <!--<img class="floating-img d-none d-md-block" src="{$system['system_url']}/content/themes/{$system['theme']}/images/headers/undraw_upgrade_06a0.svg">-->
    <div class="circle-2"></div>
    <div class="circle-3"></div>
    <div class="inner">
      <h2>{__("Pro Packages")}</h2>
      <p class="text-xlg">{__("Choose the Plan That's Right for You")}</p>
    </div>
  </div>
  <!-- page header -->

  <!-- page content -->
  <div class="{if $system['fluid_design']}container-fluid{else}container{/if} sg-offcanvas" style="margin-top: -25px;">
    <div class="row">

      <!-- side panel -->
      <div class="col-12 d-block d-sm-none sg-offcanvas-sidebar mt20">
        {include file='_sidebar.tpl'}
      </div>
      <!-- side panel -->

      <!-- content panel -->
      <div class="col-12 sg-offcanvas-mainbar">
        <div class="card">
          <div class="card-body page-content">
            <div class="row justify-content-md-center">
              {foreach $packages as $package}
                <!-- package -->
                <div class="col-md-6 col-lg-4 col-xl-{if $packages_count >= 4}3{elseif $packages_count == 3}4{elseif $packages_count <= 2}6{/if} text-center">
                  <div class="card card-pricing shadow-sm">
                    <div class="card-header bg-transparent text-start pb0">
                      <h3 style="color: {$package['color']}">
                        {__($package['name'])}
                        <div class="float-end">
                          <img class="icon" src="{$package['icon']}" style="max-width: 42px;">
                        </div>
                      </h3>
                    </div>
                    <div class="card-body text-start">
                      <h2 class="price">
                        {if $package['price'] == 0}
                          {__("Free")}
                        {else}
                          {print_money($package['price'])}
                        {/if}
                      </h2>
                      <div>
                        {if $package['period'] == "life"}
                          {__("Life Time")}
                        {else}
                          {__("for")}
                          {if $package['period_num'] != '1'}{$package['period_num']}{/if} {__($package['period']|ucfirst)}
                        {/if}
                      </div>
                    </div>
                    <ul class="list-group list-group-flush text-start">
                      <li class="list-group-item">
                        {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}{__("Featured member")}
                      </li>

                      {if $system['packages_ads_free_enabled']}
                        <li class="list-group-item">
                          {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}{__("No Ads")}
                        </li>
                      {/if}

                      {if $package['verification_badge_enabled']}
                      <li class="list-group-item">
                          {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                        {__("Verified badge")}
                      </li>
                      {/if}

                      {if $package['boost_posts_enabled']}                      
                      <li class="list-group-item">
                          {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}{__("Boost up to")} {$package['boost_posts']} {__("Posts")}
                      </li>
                      {/if}

                      {if $package['boost_pages_enabled']}                      
                      <li class="list-group-item">
                          {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}{__("Boost up to")} {$package['boost_pages']} {__("Pages")}
                      </li>
                      {/if}

                      <!-- Permissions -->
                      <li class="list-group-item">
                        <strong class="text-link" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false">
                          {include file='__svg_icons.tpl' icon="permissions" class="mr10" width="24px" height="24px"}
                          {__("All Permissions")}
                        </strong>
                      </li>
                      <div class="packages-permissions collapse multi-collapse">
                        {if $package['pages_permission']}                      
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Create Pages")}
                        </li>
                        {/if}

                        {if $package['groups_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Create Groups")}
                        </li>
                        {/if}

                        {if $package['events_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Create Events")}
                        </li>
                        {/if}

                        {if $package['blogs_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Write Articles")}
                        </li>
                        {/if}

                        {if $package['market_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Sell Products")}
                        </li>
                        {/if}

                        {if $package['forums_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Add Forums Threads/Replies")}
                        </li>
                        {/if}

                        {if $package['movies_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Watch Movies")}
                        </li>
                        {/if}

                        {if $package['games_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Play Games")}
                        </li>
                        {/if}

                        {if $package['gifts_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Send Gifts")}
                        </li>
                        {/if}
 
                         {if $package['blogs_permission_read']}
                         <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Read Articles")} {if $package['blogs_permission_read']}<small>({if $package['allowed_blogs_categories'] == '0'}{__("All")}{else}{$package['allowed_blogs_categories']}{/if} {__("Categories")})</small>{/if}
                        </li>
                        {/if}
  
                        {if $package['videos_permission_read']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Watch Videos")} {if $package['videos_permission_read']}<small>({if $package['allowed_videos_categories'] == '0'}{__("All")}{else}{$package['allowed_videos_categories']}{/if} {__("Categories")})</small>{/if}
                        </li>
                        {/if}

                        {if $package['stories_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Add Stories")}
                        </li>
                        {/if}

                        {if $package['colored_posts_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Add Colored Posts")}
                        </li>
                        {/if}

                        {if $package['activity_posts_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Add Feelings/Activity Posts")}
                        </li>
                        {/if}

                        {if $package['polls_posts_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Add Polls Posts")}
                        </li>
                        {/if}

                        {if $package['geolocation_posts_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Add Geolocation Posts")}
                        </li>
                        {/if}

                        {if $package['gif_posts_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Add GIF Posts")}
                        </li>
                        {/if}

                        {if $package['anonymous_posts_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Add Anonymous Posts")}
                        </li>
                        {/if}

                        {if $package['invitation_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Generate Invitation Codes")}
                        </li>
                        {/if}

                        {if $package['audio_call_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Make Audio Calls")}
                        </li>
                        {/if}


                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                            {__("Make Video Calls")}
                        </li>

                        {if $package['live_permission']}
                        <li class="list-group-item">

                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Go Live")}
                        </li>
                        {/if}

                        {if $package['videos_upload_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Upload Videos")}
                        </li>
                        {/if}

                        {if $package['audios_upload_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Upload Audios")}
                        </li>
                        {/if}

                        {if $package['files_upload_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Upload Files")}
                        </li>
                        {/if}

                        {if $package['ads_permission']}
                        <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Create Ads")}
                        </li>
                        {/if}
 
                        {if $package['fundings_permission']}
                         <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Raise Fundings")}
                        </li>
                        {/if}
 
                        {if $package['monetization_permission']}
                         <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Monetize Content")}
                        </li>
                        {/if}
 
                        {if $package['tips_permission']}
                         <li class="list-group-item">
                            {include file='__svg_icons.tpl' icon="checked" class="mr10" width="24px" height="24px"}
                          {__("Receive Tips")}
                        </li>
                        {/if}
 
                      </div>
                      <!-- Permissions -->

                      {if $package['custom_description']}
                        <li class="list-group-item">
                          {__($package['custom_description'])|nl2br}
                        </li>
                      {/if}
                    </ul>
                    <div class="card-footer bg-transparent">
                      <div class="d-grid">
                        {if $user->_logged_in}
                          {if $package['price'] == 0}
                            <button class="btn rounded-pill btn-primary js_try-package" data-id='{$package["package_id"]}'>
                              {__("Try Now")}
                            </button>
                          {else}
                            <button class="btn rounded-pill btn-danger" data-toggle="modal" data-url="#payment" data-options='{ "handle": "packages", "id": {$package["package_id"]}, "price": "{$package["price"]}", "name": "{$package["name"]}", "img": "{$package["icon"]}" }'>
                              {if !$user->_data['user_subscribed']}
                                {__("Buy Now")}
                              {else}
                                {__("Upgrade Now")}
                              {/if}
                            </button>
                          {/if}
                        {else}
                          <a class="btn rounded-pill btn-danger" href="{$system['system_url']}/signin">
                            {__("Buy Now")}
                          </a>
                        {/if}
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /package -->
              {/foreach}
            </div>
          </div>
        </div>
      </div>
      <!-- content panel -->

    </div>
  </div>
  <!-- page content -->

{elseif $view == "upgraded"}

  <!-- page content -->
  <div class="{if $system['fluid_design']}container-fluid{else}container{/if} mt20 sg-offcanvas">
    <div class="row">

      <!-- side panel -->
      <div class="col-12 d-block d-sm-none sg-offcanvas-sidebar">
        {include file='_sidebar.tpl'}
      </div>
      <!-- side panel -->

      <!-- content panel -->
      <div class="col-12 sg-offcanvas-mainbar">
        <div class="card text-center">
          <div class="card-body">
            <div class="mb20">
              {include file='__svg_icons.tpl' icon="education" class="main-icon" width="90px" height="90px"}
            </div>
            <h2>{__("Congratulations")}!</h2>
            <p class="text-xlg mt10">{__("You are now")} <span class="badge bg-danger">{__($user->_data['package_name'])}</span> {__("member")}</p>
            {if $user->_data['can_pick_categories']}
              <p class="text-lg">
                {__("Your package allows you to pick categories that you are interested in")}
              </p>
              <p class="text-lg">
                {if $user->_data['allowed_videos_categories'] > 0}
                  <span class="badge bg-secondary plr20 ptb15 rounded-pill">{$user->_data['allowed_videos_categories']} {__("Videos Categories")}</span>
                {/if}
                {if $user->_data['allowed_blogs_categories'] > 0}
                  <span class="badge bg-secondary plr20 ptb15 rounded-pill">{$user->_data['allowed_blogs_categories']} {__("Blogs Categories")}</span>
                {/if}
              </p>
              <a class="btn btn-primary rounded-pill" href="{$system['system_url']}/settings/membership">{__("Pick Categories")}</a>
            {else}
              <a class="btn btn-primary rounded-pill" href="{$system['system_url']}">{__("Start Now")}</a>
            {/if}
          </div>
        </div>
      </div>
      <!-- content panel -->

    </div>
  </div>
  <!-- page content -->

{/if}

{include file='_footer.tpl'}