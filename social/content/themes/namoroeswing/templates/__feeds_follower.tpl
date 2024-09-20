<li class="feeds-item-recomend {if !$followerion['seen']}unread{/if}" data-id="{$followerion['user_id']}">
  <a class="data-container" href="{$followerion['url']}" {if $followerion['action'] == "mass_recomedation"}target="_blank" {/if}>
    <div class="data-avatar">
      <img src="{$followerion['user_picture']}" alt="">
    </div>
    <div class="data-content">
      <div>
        <span class="name">{$followerion['name']}</span>
        {if $followerion['user_subscribed'] || $followerion['user_package']}
          <span class="pro-badge" data-bs-toggle="tooltip" title='{__("Pro User")}'>
            {include file='__svg_icons.tpl' icon="pro_badge" width="20px" height="20px"}
          </span>
        {/if}
        {if $followerion['user_verified'] && $followerion['package_name'] == "Plano 180"}
          <span class="verified-badge" data-bs-toggle="tooltip" title='{__("Verified User")}'>
            {include file='__svg_icons.tpl' icon="verified_badge" width="20px" height="20px"}
          </span>
        {/if}
      </div>
      <div>
        {if $followerion['reaction']}
          <div class="reaction-btn float-start mr5">
            <div class="reaction-btn-icon">
              <div class="inline-emoji no_animation">
                {include file='__reaction_emojis.tpl' _reaction=$followerion['reaction']}
              </div>
            </div>
          </div>
        {else}
          <i class="{$followerion['icon']} mr5"></i>
        {/if}
        {$followerion['message']}
      </div>
      <div class="time js_moment" data-time="{$followerion['time']}">{$followerion['time']}</div>
    </div>
  </a>
</li>