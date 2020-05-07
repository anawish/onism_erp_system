
<style type="text/css">
  .modal-content{
    width: 650px;
    margin-left: -40px;
  }
  .required:after {
    content:" *";
    color: red;
  }
  label{
    color: #797171;
  }
  #errmsg{
    color: red;
  }

</style>
<div class="modal fade" id="create_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
        <div class="row">
          
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{action('AccountController@store')}}">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="required">GL NO</label>
                <input type="text" class="form-control form-control-sm" id="gl_no" placeholder="Enter GL No" maxlength="7" minlength="7" name="gl_no">
                <span id="errmsg"></span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="required">Account Name</label>
                <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter Account Name">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control form-control-sm" placeholder="Enter Description">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="required">Account Type</label>
                <select class="form-control form-control-sm" name="account_type" id="account_type">
                  <option>Select Account</option>
                  <option value="1">Balance Sheet</option>
                  <option value="2">Profit & Loss </option>
                </select>
              </div>
            </div>
            <div class="col-md-12" id="closing_bln">
              <div class="form-group">
                <label>Closing Balance</label>
                <input type="text" name="closing_bla" class="form-control form-control-sm" placeholder="Closing Balance">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create Account</button>
        </div>
      </form>
    </div>
  </div>
</div>