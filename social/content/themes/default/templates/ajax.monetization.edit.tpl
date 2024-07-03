<div class="modal-header">
  <h6 class="modal-title">
    <i class="fas fa-coins mr5"></i>{__("Edit Monetization Plan")}
  </h6>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form class="js_ajax-forms" data-url="monetization/controller.php?do=update">
  <div class="modal-body">
    <!-- title -->
    <div class="form-group">
      <label class="form-label">{__("Title")}</label>
      <input name="title" type="text" class="form-control" value="{$monetization_plan['title']}">
    </div>
    <!-- title -->
    <!-- price -->
    <div class="form-group">
      <label class="form-label">{__("Price")} ({$system['system_currency']})</label>
      <input name="price" type="text" class="form-control" value="{$monetization_plan['price']}">
    </div>
    <!-- price -->
    <!-- paid every -->
    <div class="form-group">
      <label class="form-label">{__("Paid Every")}</label>
      <div class="row">
        <div class="col-sm-8">
          <input class="form-control" name="period_num" value="{$monetization_plan['period_num']}">
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="period">
            <option {if $monetization_plan['period'] == "day"}selected{/if} value="day">{__("Day")}</option>
            <option {if $monetization_plan['period'] == "week"}selected{/if} value="week">{__("Week")}</option>
            <option {if $monetization_plan['period'] == "month"}selected{/if} value="month">{__("Month")}</option>
            <option {if $monetization_plan['period'] == "year"}selected{/if} value="year">{__("Year")}</option>
          </select>
        </div>
      </div>
      <div class="form-text">
        {__("For example 15 days, 2 Months, 1 Year")}
      </div>
    </div>
    <!-- paid every -->
    <!-- description -->
    <div class="form-group">
      <label class="form-label">{__("Description")}</label>
      <textarea name="custom_description" rows="5" dir="auto" class="form-control">{$monetization_plan['custom_description']}</textarea>
    </div>
    <!-- description -->
    <!-- order -->
    <div class="form-group">
      <label class="form-label">{__("Order")}</label>
      <input name="plan_order" type="text" class="form-control" value="{$monetization_plan['plan_order']}">
    </div>
    <!-- order -->
    <!-- error -->
    <div class="alert alert-danger mt15 mb0 x-hidden"></div>
    <!-- error -->
  </div>
  <div class="modal-footer">
    <input type="hidden" name="plan_id" value="{$monetization_plan['plan_id']}">
    <button type="submit" class="btn btn-primary">{__("Publish")}</button>
  </div>
</form>