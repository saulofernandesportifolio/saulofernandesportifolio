<li class="feeds-item-recomend {if !$visitedion['seen']}unread{/if}" data-id="{$visitedion['user_id']}">
  <a class="data-container" href="{$visitedion['url']}" {if $visitedion['action'] == "mass_recomedation"}target="_blank" {/if}>
    <div class="data-avatar">
      <img src="{$visitedion['user_picture']}" alt="">
    </div>
    <div class="data-content">
      <div>
        <span class="name">{$visitedion['name']}</span>
        {if $visitedion['user_subscribed'] || $visitedion['user_package']}
          <span class="pro-badge" data-bs-toggle="tooltip" title='{__("Pro User")}'>
            {include file='__svg_icons.tpl' icon="pro_badge" width="20px" height="20px"}
          </span>
        {/if}
        {if $visitedion['user_verified'] && $visitedion['package_name'] == "Plano 180"}
          <span class="verified-badge" data-bs-toggle="tooltip" title='{__("Verified User")}'>
            {include file='__svg_icons.tpl' icon="verified_badge" width="20px" height="20px"}
          </span>
        {/if}
      </div>
      <div>
        {if $visitedion['reaction']}
          <div class="reaction-btn float-start mr5">
            <div class="reaction-btn-icon">
              <div class="inline-emoji no_animation">
                {include file='__reaction_emojis.tpl' _reaction=$visitedion['reaction']}
              </div>
            </div>
          </div>
        {else}
          <i class="{$visitedion['icon']} mr5"></i>
        {/if}
        {$visitedion['message']}
      </div>
      <div class="time js_moment" data-time="{$visitedion['time']}">{$visitedion['time']}</div>
    </div>
  </a>
</li>