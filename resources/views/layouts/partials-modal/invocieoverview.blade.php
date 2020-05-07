<div class="modal fade" id="invocie_overviews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 3px;">
    <div class="modal-content" style="widows: 650px;">
      <div class="modal-header" style="height: 50px;">
        <h5 class="modal-title" id="exampleModalLabel">Invoice Overview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row" style="font-size: 14px;">
            <div class="col-md-12">
              <!-- Invoice Customer Details -->
              <div id="invoice-customer-details">
                <div class="row" style="margin-top: -10px;">
                  <div class="col-md-6 text-xs-center text-md-left">
                    <p class="text-muted ml-35" style="font-weight: 600;"> Bill To</p>
                    <ul class="px-0 list-unstyled">
                      <li class="text-bold-800">
                        <strong class="invoice_a ml-35" id="cus_name"></strong>
                      </li>
                      <li class="ml-35" id="cus_city" style="margin-top: -15px; font-size: 13px"></li>
                      <li class="ml-35" id="cus_address" style="margin-top: -4px;font-size: 13px"></li>
                      <li class="ml-35" id="cus_country"  style="margin-top: -4px;font-size: 13px"></li>
                      <li class="ml-35" id="cus_phone"  style="margin-top: -4px;font-size: 13px">Phone : </li>
                      <li class="ml-35" id="cus_email"  style="margin-top: -4px;font-size: 13px">Email : </li>
                    </ul>
                  </div>
                  <div class="col-md-6 text-xs-center text-md-left">
                    <label style="font-weight: 500;">INVOICE</label>
                    <p style="margin-top: -10px;font-size: 13px">Invoice NO # SI-<span class="text-muted" id="inv_no"></span></p>
                    <p style="margin-top: -20px;font-size: 13px">Reference NO # <span class="text-muted" id="ref_no"></span></p>
                    <p style="margin-top: -20px;font-size: 13px">Ivoice Date : <span class="text-muted" id="inv_date"></span> </p> 
                    <p style="margin-top: -20px;font-size: 13px">Due Date :<span class="text-muted" id="inv_duedate"></span> </p>  
                  </div>
                </div>
              </div>
              <!-- /Invoice Customer Details -->
            </div>
          </div>
          <!-----Customer Shipping Detail --->
          <div class="row" style="font-size: 14px; margin-top: -12px;">
            <div class="col-md-6">
              <label style="font-weight: 500;"> Shipping Detail</label>
              <ul class="px-0 list-unstyled">
                <li class="text-bold-800">
                  <strong class="invoice_a ml-35" id="ship_name"></strong>
                </li>
                <li class="ml-35" id="ship_city" style="margin-top: -4px; font-size: 13px"></li>
                <li class="ml-35" id="ship_address"style="margin-top: -4px; font-size: 13px"></li>
                <li class="ml-35" id="ship_country" style="margin-top: -4px; font-size: 13px"></li>
                <li class="ml-35" id="ship_phone" style="margin-top: -4px; font-size: 13px">Phone : </li>
                <li class="ml-35" id="ship_email" style="margin-top: -4px; font-size: 13px">Email : </li>
              </ul>
            </div>
            <div class="col-md-6">
              <label style="font-weight: bold;">Total Amount</label>
              <div class="form-group row">
                <label class="col-sm-2" style="margin-top: 12px;font-size: 17px;">Total</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext form-control-sm" id="total" style="margin-top: 10px;margin-left: 22px;">
                  </div>
              </div>
            </div>
          </div>
          <!-----/Customer Shipping Detail --->
          <div class="row" style="font-size: 14px;">
            <div class="col-md-12" style="margin-top: -15px;font-weight: 600">
              <div class="form-group" style="margin-top: -2px;">
                <label style="font-weight: 600">Invoice Note</label>
                <textarea class="form-control form-control-sm mr" rows="1" id="inv_note" style="margin-left: -2px; margin-top: -5px;"></textarea>
              </div>
            </div>
          </div>
          <table class="table table-bordered" style="font-size: 14px;margin-top: -6px;">
            <thead style="font-size: 11px;">
              <tr>
                <th>Product</th>
                <th>QTY</th>
                <th>Rate</th>
                <th>Tax%</th>
                <th>Tax</th>
                <th>Discount</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr style="font-size: 14px;">
                <td id="pro_name"></td>
                <td id="pro_qty"></td>
                <td id="pro_rate"></td>
                <td id="pro_tax"></td>
                <td id="pro_taxs"></td>
                <td id="pro_dis"></td>
                <td id="pro_amount"></td>
              </tr>
            </tbody>
          </table>
          <div class="row" style="font-size: 14px;">
            <div class="col-md-4"></div>
            <div class="col-md-10" style="margin-top: -10px;">
              <div class="form-group row">
                <label class="col-sm-4" style="font-size: 13px;">Sub Total</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" id="sub_tot"style="font-size: 10px;">
                </div>
              </div>
              <div class="form-group row" style="margin-top: -12px">
                <label class="col-sm-4" style="font-size: 13px;">Total Tax</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" id="total_ta" style="font-size: 10px;">
                </div>
              </div>
              <div class="form-group row" style="margin-top: -12px">
                <label class="col-sm-4" style="font-size: 13px;">Total Discount</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" id="total_dis" style="font-size: 10px;">
                </div>
              </div>
              <div class="form-group row" style="margin-top: -12px">
                <label class="col-sm-4" style="font-size: 13px;">Shipping</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" id="total_ship" style="font-size: 10px;">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" style="font-size: 14px;height: 50px;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 14px;">Close</button>
          </div>
        </div>
    </div>
  </div>
</div>