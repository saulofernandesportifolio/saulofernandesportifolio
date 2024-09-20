<li class="feeds-item-recomend {if !$followerdion['seen']}unread{/if}" data-id="{$followerdion['user_id']}">
  <a class="data-container" href="{$followerdion['url']}" {if $followerdion['action'] == "mass_recomedation"}target="_blank" {/if}>
    <div class="data-avatar">
      <img src="{$followerdion['user_picture']}" alt="">
    </div>
    <div class="data-content">
      <div>
        <span class="name">{$followerdion['name']}</span>
        {if $followerdion['user_subscribed'] || $followerdion['user_package']}
          <span class="pro-badge" data-bs-toggle="tooltip" title='{__("Pro User")}'>
            {include file='__svg_icons.tpl' icon="pro_badge" width="20px" height="20px"}
          </span>
        {/if}
        {if $followerdion['user_verified'] && $followerdion['package_name'] == "Plano 180"}
          <span class="verified-badge" data-bs-toggle="tooltip" title='{__("Verified User")}'>
            {include file='__svg_icons.tpl' icon="verified_badge" width="20px" height="20px"}
          </span>
        {/if}
      </div>
      <div>
        {if $followerdion['reaction']}
          <div class="reaction-btn float-start mr5">
            <div class="reaction-btn-icon">
              <div class="inline-emoji no_animation">
                {include file='__reaction_emojis.tpl' _reaction=$followerdion['reaction']}
              </div>
            </div>
          </div>
        {else}
          <i class="{$followerdion['icon']} mr5"></i>
        {/if}
        {$followerdion['message']}
      </div>
      <div class="time js_moment" data-time="{$followerdion['time']}">{$followerdion['time']}</div>
    </div>
  </a>
</li>