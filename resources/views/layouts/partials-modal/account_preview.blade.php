<style type="text/css">
</style>
<div class="modal fade" id="account_preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Transaction Type</label>
              <input type="text" name="trans_type" id="trans" class="form-control form-control-sm">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Doc Date</label>
              <input type="text" name="doc_date" id="doc_date" class="form-control form-control-sm">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Posting Date</label>
              <input type="text" name="posting_date" id="posting_date" class="form-control form-control-sm">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Net Balance</label>
              <input type="text" name="net_balance" id="net_balances" class="form-control form-control-sm">
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label>Narration</label>
               <textarea class="form-control-sm form-control" rows="1" id="Narration"></textarea>
            </div>
          </div>
        </div>
        <table id="view_table" class="table">
          <thead>
            <tr>
              <th>GL NO#</th>
              <th>Name</th>
              <th>Description</th>
              <th>Debit</th>
              <th>Credit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td id="no">1</td>
              <td id="name">2</td>
              <td id="des">3</td>
              <td id="gl_debit">5</td>
              <td id="gl_credit">5</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td style="font-weight: 700" >Net Total</td>
              <td id="total_debits"></td>
              <td id="total_credits"></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>