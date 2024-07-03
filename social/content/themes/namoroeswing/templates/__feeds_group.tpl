{if $_tpl == "box"}
  <li class="col-md-6 col-lg-3">
    <div class="ui-box {if $_darker}darker{/if}">
      <div class="img">
          {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
            <a href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <img alt="{$_group['group_title']}" src="{$_group['group_picture']}" />
            </a>         
          {else}        
            <a href="{$system['system_url']}/groups/{$_group['group_name']}{if $_search}?ref=qs{/if}">
              <img alt="{$_group['group_title']}" src="{$_group['group_picture']}" />
            </a>
          {/if}
      </div>
      <div class="mt10">
          {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
            <a class="h6" href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">{$_group['group_title']}</a>
            <div>{$_group['group_members']} {__("Members")}</div>          
          {else}
            <a class="h6" href="{$system['system_url']}/groups/{$_group['group_name']}{if $_search}?ref=qs{/if}">{$_group['group_title']}</a>
            <div>{$_group['group_members']} {__("Members")}</div>
          {/if}
      </div>
      <div class="mt10">
        {if $_group['i_joined'] == "approved"}
          <button type="button" class="btn btn-sm btn-success {if !$_no_action}btn-delete{/if} js_leave-group" data-id="{$_group['group_id']}" data-privacy="{$_group['group_privacy']}">
            <i class="fa fa-check mr5"></i>{__("Joined")}
          </button>
        {elseif $_group['i_joined'] == "pending"}
          <button type="button" class="btn btn-sm btn-warning js_leave-group" data-id="{$_group['group_id']}" data-privacy="{$_group['group_privacy']}">
            <i class="fa fa-clock mr5"></i>{__("Pending")}
          </button>
        {else}
          {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
          <button type="button" class="btn btn-sm btn-success" href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
            <i class="fa fa-user-plus mr5"></i>{__("Join")}
          </button>
            {else}
            <button type="button" class="btn btn-sm btn-success js_join-group" data-id="{$_group['group_id']}" data-privacy="{if $user->_data['user_id'] == $_group['group_admin']}public{else}{$_group['group_privacy']}{/if}">
              <i class="fa fa-user-plus mr5"></i>{__("Join")}
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
          <img src="{$_group['group_picture']}" alt="{$_group['group_title']}">
        </a>
      {else}
        <a class="data-avatar" href="{$system['system_url']}/groups/{$_group['group_name']}{if $_search}?ref=qs{/if}">
          <img src="{$_group['group_picture']}" alt="{$_group['group_title']}">
        </a>
      {/if}
      <div class="data-content">
        <div class="float-end">
          {if $_group['i_joined'] == "approved"}
            <button type="button" class="btn btn-sm btn-success {if !$_no_action}btn-delete{/if} js_leave-group" data-id="{$_group['group_id']}" data-privacy="{$_group['group_privacy']}">
              <i class="fa fa-check mr5"></i>{__("Joined")}
            </button>
          {elseif $_group['i_joined'] == "pending"}
            <button type="button" class="btn btn-sm btn-warning js_leave-group" data-id="{$_group['group_id']}" data-privacy="{$_group['group_privacy']}">
              <i class="fa fa-clock mr5"></i>{__("Pending")}
            </button>
          {else}
            {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
              <button type="button" class="btn btn-sm btn-light rounded-pill" href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
                {include file='__svg_icons.tpl' icon="linked_accounts" class="main-icon" width="20px" height="20px"}
              </button>          
            {else}
              <button type="button" class="btn btn-sm btn-light rounded-pill js_join-group" data-id="{$_group['group_id']}" data-privacy="{if $user->_data['user_id'] == $_group['group_admin']}public{else}{$_group['group_privacy']}{/if}">
                {include file='__svg_icons.tpl' icon="linked_accounts" class="main-icon" width="20px" height="20px"}
              </button>
            {/if}  
          {/if}
        </div>
        <div>
          <span class="name">
            {if $system['packages_enabled'] && !$user->_data['user_subscribed'] || $user->_data['user_package'] == 5 && $user->_data['user_subscribed']}
              <a href="{$system['system_url']}/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">{$_group['group_title']}</a>     
            {else}
              <a href="{$system['system_url']}/groups/{$_group['group_name']}{if $_search}?ref=qs{/if}">{$_group['group_title']}</a>
            {/if}
          </span>
          <div>{$_group['group_members']} {__("Members")}</div>
        </div>
      </div>
    </div>
  </li>
{/if}