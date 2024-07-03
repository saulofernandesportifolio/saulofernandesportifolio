{include file='_head.tpl'}
{include file='_header.tpl'}

<div class="container-fluid landing-left">
  <div class="row landing-row">
      <div class="col-lg-6 landing-right">
      <div class="landing-intro">
        
        <!-- slider -->
        <div class="landing-slider d-none d-lg-block">
          
        </div>
        <!-- slider -->
        
      </div>
    </div>
    <div class="col-lg-6 landing-right">
      <div class="landing-form">
        {include file='_sign_form.tpl' do="in"}
        <!--<div class="text-center">
          {if $system['play_store_badge_enabled']}
            <a href="{$system['play_store_link']}" target="_blank">
              {include file='__svg_icons.tpl' icon="playstore_badge" height="68px"}
            </a>
          {/if}
          {if $system['appgallery_badge_enabled']}
            <a href="{$system['appgallery_store_link']}" target="_blank">
              {include file='__svg_icons.tpl' icon="appgallery_badge" height="50px" class="mr10"}
            </a>
          {/if}
          {if $system['app_store_badge_enabled']}
            <a href="{$system['app_store_link']}" target="_blank">
              {include file='__svg_icons.tpl' icon="appstore_badge" height="50px"}
            </a>
          {/if}
        </div>
      </div>
    </div>         
  </div>
</div>
<div id="exibir">
{include file='_footer.links.tpl'}
{include file='_footer.tpl'}
</div>
<script>
    function changeOcultar(ocultar) {
      const elem = document.getElementById("exibir");
      elem.style.display = "none";
    }
    function changeExibir(exibir) {
      const elem = document.getElementById("exibir");
      elem.style.display = "";
    }
</script>