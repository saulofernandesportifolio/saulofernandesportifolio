<li class="feeds-item-recomend {if !$recommendation['seen']}unread{/if}" data-id="{$recommendation['user_id']}">
  <a class="data-container" href="{$recommendation['url']}" {if $recommendation['action'] == "mass_recomedation"}target="_blank" {/if}>
    <div class="data-avatar">
      <img src="{$recommendation['user_picture']}" alt="">
    </div>
    <div class="data-content">
      <div>
        <span class="name">{$recommendation['name']}</span>
        {if $recommendation['user_subscribed'] || $recommendation['user_package']}
          <span class="pro-badge" data-bs-toggle="tooltip" title='{__("Pro User")}'>
            {include file='__svg_icons.tpl' icon="pro_badge" width="20px" height="20px"}
          </span>
        {/if}
        {if $recommendation['user_verified'] && $recommendation['package_name'] == "Plano 180"}
          <span class="verified-badge" data-bs-toggle="tooltip" title='{__("Verified User")}'>
            {include file='__svg_icons.tpl' icon="verified_badge" width="20px" height="20px"}
          </span>
        {/if}
      </div>
      <div>
        {if $recommendation['reaction']}
          <div class="reaction-btn float-start mr5">
            <div class="reaction-btn-icon">
              <div class="inline-emoji no_animation">
                {include file='__reaction_emojis.tpl' _reaction=$recommendation['reaction']}
              </div>
            </div>
          </div>
        {else}
          <i class="{$recommendation['icon']} mr5"></i>
        {/if}
        {$recommendation['message']}
      </div>
      <div class="time js_moment" data-time="{$recommendation['time']}">{$recommendation['time']}</div>
    </div>
  </a>
</li>