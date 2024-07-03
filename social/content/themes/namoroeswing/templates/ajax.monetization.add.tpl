<div class="modal-header">
  <h6 class="modal-title">
    <i class="fas fa-coins mr5"></i>{__("New Monetization Plan")}
  </h6>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form class="js_ajax-forms" data-url="monetization/controller.php?do=insert">
  <div class="modal-body">
    <!-- title -->
    <div class="form-group">
      <label class="form-label">{__("Title")}</label>
      <input name="title" type="text" class="form-control">
    </div>
    <!-- title -->
    <!-- price -->
    <div class="form-group">
      <label class="form-label">{__("Price")} ({$system['system_currency']})</label>
      <input name="price" type="text" class="form-control">
    </div>
    <!-- price -->
    <!-- paid every -->
    <div class="form-group">
      <label class="form-label">{__("Paid Every")}</label>
      <div class="row">
        <div class="col-sm-8">
          <input class="form-control" name="period_num">
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="period">
            <option value="day">{__("Day")}</option>
            <option value="week">{__("Week")}</option>
            <option value="month">{__("Month")}</option>
            <option value="year">{__("Year")}</option>
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
      <textarea name="custom_description" rows="5" dir="auto" class="form-control"></textarea>
    </div>
    <!-- description -->
    <!-- order -->
    <div class="form-group">
      <label class="form-label">{__("Order")}</label>
      <input name="plan_order" type="text" class="form-control">
    </div>
    <!-- order -->
    <!-- error -->
    <div class="alert alert-danger mt15 mb0 x-hidden"></div>
    <!-- error -->
  </div>
  <div class="modal-footer">
    <input type="hidden" name="node_id" value="{$node_id}">
    <input type="hidden" name="node_type" value="{$node_type}">
    <button type="submit" class="btn btn-primary">{__("Publish")}</button>
  </div>
</form>