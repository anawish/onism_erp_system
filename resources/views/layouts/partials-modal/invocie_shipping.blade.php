<div class="modal fade" id="shipping_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 590px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shipping Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
           <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control form-control-sm" id="ship_name" name="ship_name" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control form-control-sm" id="ship_email" name="ship_email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control form-control-sm" id="ship_address" name="ship_address" placeholder="Address">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="add_shipping" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>