<div class="modal-header">
  <h6 class="modal-title">
    <i class="fas fa-coins mr5"></i>{__("Monetization Plans")}
  </h6>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
  <div class="payment-plans">
    {foreach $monetization_plans as $plan}
      <div class="payment-plan">
        <div class="text-xxlg">{__($plan['title'])}</div>
        <div class="text-xlg">{print_money($plan['price'])} / {if $plan['period_num'] != '1'}{$plan['period_num']}{/if} {__($plan['period']|ucfirst)}</div>
        {if {$plan['custom_description']}}
          <div>{$plan['custom_description']}</div>
        {/if}
        <div class="dgrid mt10">
          <button class="btn btn-info rounded rounded-pill mt20" data-toggle="modal" data-url="#payment" data-options='{ "handle": "subscribe", "subscribe": "true", "id": {$plan['plan_id']}, "price": {$plan['price']} }'>
            <i class="fa fa-money-check-alt mr5"></i>{__("Subscribe")} ({print_money($plan['price']|number_format:2)})
          </button>
        </div>
      </div>
    {/foreach}
  </div>
</div>