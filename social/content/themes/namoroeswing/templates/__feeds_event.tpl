{if $_tpl == "box"}
  <li class="col-md-6 col-lg-3">
    <div class="ui-box {if $_darker}darker{/if}">
      <div class="img">
          {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
            <a href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <img alt="{$_event['event_title']}" src="{$_event['event_picture']}" />
            </a>          
          {else}
            <a href="{$system['system_url']}/events/{$_event['event_id']}{if $_search}?ref=qs{/if}">
              <img alt="{$_event['event_title']}" src="{$_event['event_picture']}" />
            </a>
          {/if}
      </div>
      <div class="mt10">
        {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
          <a class="h6" href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">{$_event['event_title']}</a>
          <div>{$_event['event_interested']} {__("Interested")}</div>
        {else}
          <a class="h6" href="{$system['system_url']}/events/{$_event['event_id']}{if $_search}?ref=qs{/if}">{$_event['event_title']}</a>
          <div>{$_event['event_interested']} {__("Interested")}</div>
        {/if}
      </div>
      <div class="mt10">
        {if $_event['i_joined']['is_interested']}
          {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
            <button type="button" class="btn btn-sm btn-light" href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <i class="fa fa-check mr5"></i>{__("Interested")}
            </button>
          {else}
            <button type="button" class="btn btn-sm btn-light js_uninterest-event" data-id="{$_event['event_id']}">
              <i class="fa fa-check mr5"></i>{__("Interested")}
            </button>
          {/if}
        {else}
          {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
            <button type="button" class="btn btn-sm btn-primary" href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <i class="fa fa-star mr5"></i>{__("Interested")}
            </button> 
          {else}
            <button type="button" class="btn btn-sm btn-primary js_interest-event" data-id="{$_event['event_id']}">
              <i class="fa fa-star mr5"></i>{__("Interested")}
            </button>
          {/if}
        {/if}
      </div>
    </div>
  </li>
{elseif $_tpl == "list"}
  <li class="feeds-item">
    <div class="data-container {if $_small}small{/if}">
      {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
        <a class="data-avatar" href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
          <img src="{$_event['event_picture']}" alt="{$_event['event_title']}">
        </a>
      {else}
        <a class="data-avatar" href="{$system['system_url']}/events/{$_event['event_id']}{if $_search}?ref=qs{/if}">
          <img src="{$_event['event_picture']}" alt="{$_event['event_title']}">
        </a>
      {/if}      
      <div class="data-content">
        <div class="float-end">
          {if $_event['i_joined']['is_interested']}
            <button type="button" class="btn btn-sm btn-light js_uninterest-event" data-id="{$_event['event_id']}">
              <i class="fa fa-check mr5"></i>{__("Interested")}
            </button>
          {else}
           {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
              <button type="button" class="btn btn-sm btn-light rounded-pill" href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
                {include file='__svg_icons.tpl' icon="star" class="main-icon" width="20px" height="20px"}
              </button>
           {else}
              <button type="button" class="btn btn-sm btn-light rounded-pill js_interest-event" data-id="{$_event['event_id']}">
                {include file='__svg_icons.tpl' icon="star" class="main-icon" width="20px" height="20px"}
              </button>
            {/if} 
          {/if}
        </div>
        <div>
          <span class="name">
           {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
            <a href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">{$_event['event_title']}</a>
           {else}
            <a href="{$system['system_url']}/events/{$_event['event_id']}{if $_search}?ref=qs{/if}">{$_event['event_title']}</a>
           {/if} 
          </span>
          <div>{$_event['event_interested']} {__("Interested")}</div>
        </div>
      </div>
    </div>
  </li>
{/if}