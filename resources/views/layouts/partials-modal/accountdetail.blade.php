<!-- Modal -->
<style type="text/css">
  ._table {
    counter-reset: rowNumber;
  }

  table .Rownumber{
      counter-increment: rowNumber;
  }

  table .Rownumber td:first-child::before {
      content: counter(rowNumber);
  }
  ._modal-dialog{
    margin-left: 180px;
  }
  ._modal-content{
    width: 970px; 
  }
</style>
<div class="modal fade" id="accountsearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog _modal-dialog" role="document">
    <div class="modal-content _modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table  id="MasterTable" class="table _table account_detail">
          <thead>
            <tr>
              <th>#</th>
              <th>GL No.</th>
              <th>Name</th>
              <th>Description</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody >
            @foreach($account_detail as $account_details)
            <tr class="Rownumber">
              <td></td>
              <td><input type="hidden" id="gl_id" value="{{$account_details->id}}">{{$account_details->gl_no}}</td>
              <td>{{$account_details->name}}</td>
              <td>{{$account_details->description}}</td>
              <td>{{$account_details->lastUpdated}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
