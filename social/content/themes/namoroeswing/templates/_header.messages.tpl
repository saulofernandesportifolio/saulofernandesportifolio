<li class="dropdown js_live-messages">

    <a href="#" data-bs-toggle="dropdown" data-display="static">
    {include file='__svg_icons.tpl' icon="header-messages" class="header-icon" width="24px" height="24px"}
    <span class="counter red shadow-sm rounded-pill {if $user->_data['user_live_messages_counter'] == 0}x-hidden{/if}">
      {$user->_data['user_live_messages_counter']}
    </span>
  <div class="dropdown-menu dropdown-menu-end dropdown-widget">
    <div class="dropdown-widget-header">
      <span class="title">{__("Messages")}</span>
      {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
        <a class="float-end text-link" href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">{__("Send a New Message")}</a>
        {else}
         <a class="float-end text-link js_chat-new" href="{$system['system_url']}/messages/new">{__("Send a New Message")}</a>
      {/if}
    </div>
    <div class="dropdown-widget-body">
      <div class="js_scroller">
        {if $user->_data['conversations']}
          <ul>
            {foreach $user->_data['conversations'] as $conversation}
              {include file='__feeds_conversation.tpl'}
            {/foreach}
          </ul>
        {else}
          <p class="text-center text-muted mt10">
            {__("No messages")}
          </p>
        {/if}
      </div>
    </div>
      {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
        <a class="dropdown-widget-footer" href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">{__("See All")}</a>
        {else}
         <a class="dropdown-widget-footer" href="{$system['system_url']}/messages">{__("See All")}</a>
      {/if}
  </div>
</li>