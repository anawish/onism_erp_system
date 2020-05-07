@extends('layouts.app')
@section('style')
<style type="text/css">
	.tp_btn{
		width: 60%;
		background-color: #03bb85; 
		border: none; 
		font-weight: 700; 
		color: #000000
	}
	.tp_line{
		border: 1px solid #adadac;	
	}
	.border_top{
		border: 1px solid #03bb85;
		margin-top: 15px;
		border-radius: 4px;
	}
	.label{
		font-weight: 500
	}
	.input_type{
		margin-top: 7px;
	}
	.right_input{
		margin-top: 7px;
		margin-left: -10px;
	}
	.background_color{
		background-color: #03bb85;
	}
	table {
    counter-reset: rowNumber;
	}

	table .autonumber{
	    counter-increment: rowNumber;
	}

	table .autonumber td:first-child::before {
	    content: counter(rowNumber);
	}
</style>
@endsection
@section('content')

<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<h3 class="text-center">Good Receipt Note</h3>
			<hr class="tp_line">
			<form method="post" action="{{action('GRNController@store')}}">
				 @csrf
			<div class="row">
				<div class="col">
					<button type="button" class="btn btn-default rounded-pill tp_btn">Hold</button>
				</div>
				<div class="col">
					<a href="">
						<button type="submit" class="btn btn-default rounded-pill tp_btn">Post</button>
					</a>
				</div>
				<div class="col">
                   <a href="{{url()->previous()}}"class="btn btn-default rounded-pill tp_btn">Reverse</a>
				</div>
				<div class="col">
					<a href="{{url('printgrn',$data->id)}}" class="btn btn-default rounded-pill tp_btn">Print</a>
				</div>
			</div>
			<div class="border_top">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
						    <label class="col-md-4 col-form-label text-center label">DOC.Date</label>
						    <div class="col-md-8">
						      <input type ="date" id="todays-date" name="doc_date" value="{{$data['order_date']}}" class="form-control-sm form-control input_type">
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-md-4 col-form-label text-center label">Posting Date</label>
						    <div class="col-md-8">
						      <input type="date" name="posting_date" id="posting_date" value="" class="form-control-sm form-control input_type">
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-md-4 col-form-label text-center label">Select Warehouse</label>
						    <div class="col-md-8">
						     <select class="form-control form-control-sm input_type" name="warehouse">
						     	@foreach($purchaseDetail as $purchaseDetails)
						 		<option value="{{$purchaseDetails->id}}">{{$purchaseDetails->warehouse_name}}</option>
						 		@endforeach
						     </select>
						    </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
						    <label class="col-md-4 col-form-label text-center label">Inward Gate Pass</label>
						    <div class="col-md-8">
						      <input type="text" name="inward_gate" class="form-control-sm form-control right_input">
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-md-4 col-form-label text-center label">P.O #</label>
						    <div class="col-md-8">
						      <input type="text" name="po_no" class="form-control-sm form-control right_input" value="{{$data['invoice_no']}}" readonly>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-md-4 col-form-label text-center label">GRN #</label>
						    <div class="col-md-8">
						      <input type="text" name="grn_no" class="form-control-sm form-control right_input" value="{{$grn_no}}" readonly>
						    </div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label text-center label">Delivery Note</label>
					<div class="col-md-10">
					    <textarea class="form-control form-control-sm right_input" rows="2" name="delivery_note">{{$data['invoice_note']}}</textarea>
					</div>
				</div>
			</div>
			<h3 class="text-center" style="margin-top: 10px;">Product Entery</h3>
			<table class="table table-bordered">
			    <thead class="theader">
			        <tr>
			        	<th style="width: 5%">#</th>
			          	<th style="width: 20%;">Product</th>
			          	<th style="width: 10%">Code</th>
						<th style="width: 15%">Order Qty</th>
						<th style="width: 15%">Receive Qty</th>
						<th style="width: 10%">Unit</th>
						<th style="width: 20%">Comments</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($purchaseItem as $purchaseItems)
			    	<tr class="autonumber">
			    		<td></td>
			    		<td class="d-none">
			    			<input type="hidden" name="product_id[]" class="form-control" value="{{$purchaseItems->product_id}}">
			    		</td>
			    		<td>
			    			<input type="text" name="product_name[]" class="form-control" 
			    			value="{{$purchaseItems->product_name}}" readonly="">
			    		</td>
			    		<td>
			    			<input type="text" name="product_code[]" value="{{$purchaseItems->product_code}}" class="form-control">
			    		</td>
			    		<td>
			    			<input type="text" name="order_qty[]"value="{{$purchaseItems->balance_qty}}" class="form-control">
			    		</td>
			    		<td>
			    			<input type="text" name="receive_qty[]" class="form-control">
			    		</td>
			    		<td>
			    			<input type="text" name="unit[]" class="form-control">
			    		</td>
			    		<td>
			    			<input type="text" name="comments[]" class="form-control">
			    		</td>
			    		<!-- <td>
			    			<input type="text" name="naration[]" class="form-control">
			    		</td>
			    		<td>
			    			<a href="{{$purchaseItems->id}}" id="deleterow" class="btn btn-danger">Delete Row</a>
			    		</td> -->
			    	</tr>
			    	@endforeach
			    </tbody>
			</table>
		</form>
		</div>
	</div>
</div>

@section('script')
<script>
function myFunction() {
  window.print();
}
</script>
<script type="text/javascript" src="{{asset('/js/inventory/grn.js')}}"></script>
@endsection

@endsection