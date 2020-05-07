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
<div class="modal fade" id="searchitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog _modal-dialog" role="document">
    <div class="modal-content _modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table  id="SearchProductTable" class="table _table table-striped productsDetail dataTable display"  style="margin-left: 0px; width: 100px;" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Product</th>
              <th>Price</th>
              <th>Code</th>
              <th>Unit</th>
              <th>Tax</th>
              <th>Discount</th>
            </tr>
          </thead>
          <tbody >
            @foreach($product as $products)
            <tr class="Rownumber">
              <td></td>
              <td><input type="hidden" id="product_id" value="{{$products->id}}">{{$products->product_name}}</td>
              <td>{{$products->retail_price}}</td>
              <td>{{$products->product_code}}</td>
              <td>{{$products->unit}}</td>
              <td>{{$products->tax_rate}}</td>
              <td>{{$products->discount_rate}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
