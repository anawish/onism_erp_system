
@extends('layouts.app')

@section('style')
<style type="text/css">
	.clear{
	 clear:both;
	 margin-top: 20px;
	}

	#searchResult ul{
	 list-style: none;
	 padding: 0px;
	 width: 250px;
	 position: absolute;
	 margin: 0;
	}

	#searchResult ul li{
	 background: lavender;
	 padding: 4px;
	 margin-bottom: 1px;
	}

	#searchResult ul li:nth-child(even){
	 background: cadetblue;
	 color: white;
	}

	#searchResult ul li:hover{
	 cursor: pointer;
	}
	
	.invoice_det {
		float:right;font-family:sans-serif; margin-top: 10px;
	}
	tbody{
		background-color: #ededed;
	}
	.product_det{
	 list-style: none;
	 padding: 0px;
	 width: 250px;
	 position: absolute;
	 margin: 0;
	}

	.product_det li{
	 background: lavender;
	 padding: 4px;
	 margin-bottom: 1px;
	}

	.product_det li:nth-child(even){
	 background: cadetblue;
	 color: white;
	}

	.product_det li:hover{
	 cursor: pointer;
	}
</style>
@endsection


@section('content')
	
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<form action="{{action('PurchaseorderController@store')}}" method="POST">
					 @csrf
				<div class="row _newqouta">
					@if(session()->has('message'))
					    <div class="alert alert-success">
					        {{ session()->get('message') }}
					    </div>
					@endif
					<div class="col-md-12 mt-10">
						<span class="font-weight-bold text-dark mr-20 bill_to">Bill From</span>
						<a href="{{url('/supplier')}}" class="btn btn-primary rounded-pill px-5">Add Supplier</a>
					</div>
					<div class="col-md-4">
						<input type="hidden" name="company_id" value="1">
						<input type="hidden" name="emp_id" value="1">
						<div class="form-group mt-20">
							<label class="client_search">Search Supplier</label>
							<input type="text" name="search_supplier" class="form-control rounded-pill search_client" id="search_supplier" placeholder="Enter Customer Name">
								<div id="searchResult">
									<ul></ul>
								</div>
						</div>
						<div class="form-group" id="supplier_detail">
							<label class="client_search">Supplier Details</label>
    							<hr>
	    							<div id="supplier_info">
	    							</div>
    							<hr>
						</div>
					
						<div class="form-group mt-25">
							<label class="client_search">Wearhouse</label>
							<select class="form-control rounded-pill" name="warehouse">
							
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row mt-25">
							<span class="text-dark font-weight-bold ft-size"></span>
						</div>
						<div class="form-group">
							<label class="client_search">Invoice Number</label>
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1">{{$purchase_order}}</span>
								</div>
								<input type="text" class="form-control bd_r" id="invoice_no" name="invoice_no" value="{{$data['invoice_no']}}">
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Order Date</label>
							<div class="input-group">
								<div class="input-group date" id="datePicker">
								 	<input type="date" class="form-control" name="order_date" value="{{$data['order_date']}}">
								 	<span class="input-group-addon">
									 	<i class="glyphicon glyphicon-calendar"></i>
								 	</span>
								</div>
							</div>
						</div>	
						<div class="form-group">
							<label class="client_search">Tax</label>
							<select class="form-control rounded-pill" name="tax">
															
							</select>
						</div>
					</div>
					<div class="col-md-4" style="margin-top: 23px;">
						<div class="form-group">
							<label  class="client_search">Reference</label>
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1">@</span>
								</div>
								<input type="text" class="form-control bd_r" name="reference_no" placeholder="Reference #" value="{{$data['reference_no']}}">
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Order Due Date</label>
							<div class="input-group">
								<div class="input-group date" id="datePicker1">
								 	<input type="date" class="form-control" name="due_date" value="{{$data['due_date']}}">
								 	<span class="input-group-addon">
									 	<i class="glyphicon glyphicon-calendar"></i>
								 	</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Discount</label>
							<select class="form-control rounded-pill">
								<option value="% Discount After TAX">% Discount After TAX</option>
								<option value="% Discount After TAX">Flat Discount After TAX</option>
								<option value="% Discount Before TAX">% Discount Before TAX</option>
								<option value="Flat Discount Before TAX">Flat Discount Before TAX</option>
							</select>
						</div>	
					</div>
					<label class="client_search ml-17">Invoice Note</label>
					<textarea class="form-control rounded-pill mr" rows="2" name="invoice_note" value ="{{$data['invoice_note']}}"></textarea>
				</div>
				<div class="row">
					<table id="myTable" class=" table order-list">
					    <thead class="theader">
					        <tr>
					          	<th width="30%">Item Name</th>
								<th width="10%">Quantity</th>
								<th width="15%">Rate</th>
								<th width="10%">Tax(%)</th>
								<th width="10%">Tax</th>
								<th width="20%">Amount ($)</th>
								<th width="5%">Action</th>
					        </tr>
					    </thead>
					    <tbody style="background-color: #ededed;">
					    	@foreach($invoice as $invoices)
					        <tr>
					            <td> 
					                <input type="text" name="product_name[]" id="product_name" class="form-control input-sm product_name" onkeypress="ProductSearch(this)" value="{{$invoices->product_name}}">
							        <input type="hidden" name="product_id[]" id="product_id" class="form-control product_id" value="{{$invoices->product_id}}">
							        <ul class="product_det"></ul>
					            </td>
					            <td >
					                <input type="text" name="qty[]" id="qty" class="form-control input-sm qty" value="{{$invoices->qty}}">
					            </td>
					            <td >
					              <input type="text" name="price[]" id="price" class="form-control input-sm price" value="{{$invoices->price}}">
					            </td>
					            <td >
					                <input type="text" name="product_tax[]" id="product_tax" class="form-control input-sm product_tax" value="{{$invoices->tax}}">
					            </td>
					            <td >
					               <input type="text" name="pro_tax[]" id="pro_tax" class="form-control input-sm pro_tax" readonly value="{{$invoices->total_tax}}">
					            </td>
					            <td style="display: none;">
					               <input type="text" name="prodcut_discount[]" id="prodcut_discount" class="form-control input-sm prodcut_discount">
					            </td>
					            <td >
					              <input type="text" name="ammount[]"  readonly id="ammount" class="form-control input-sm ammount" value="{{ $invoices->ammount }}">
					            </td>
					            <td>
					            	<a class="deleteRow"></a>
					            </td>
					        </tr>
					        @endforeach
					    </tbody>
    					<tfoot>
					        <tr>
					            <td>
					                <input type="button" class="btn btn-success" id="addrow" value=" + Add Row"/>
					            </td>
					        </tr>
					        <tr>
					        	<td colspan="4">
					        		<strong class="invoice_det">Sub Total</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="subtotal" id="subtotal" class="form-control subtotal" readonly value="{{$data['subtotal']}}">
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4">
					        		<strong class="invoice_det">Total Tax</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="total_tax" id="total_tax" class="form-control total_tax" readonly value="{{$data['total_tax']}}">
					        	</td>
					        </tr>
					        <tr style="display: none;">
					        	<td colspan="4">
					        		<strong class="invoice_det">Total Discount</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="total_discount" id="total_discount"class="form-control total_discount" >
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4">
					        		<strong class="invoice_det">Shipping</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="shipping" id="shipping" class="form-control shipping" value="{{$data['shipping']}}">
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4">
					        		<strong class="invoice_det">Grand Total ($)</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="total" id="total" class="form-control total"  readonly value="{{$data['total']}}">
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4">
					        		<label>Payment Terms</label>
					        		<select class="form-control" name="terms" style="width: 60%">
					        			@foreach($payment_term as $payterms)
					        			<option value="{{ $payterms->id }}" {{ $payterms->id == $data->pyterm ? 'selected' : '' }}>{{$payterms->title}}</option>
					        			@endforeach
					        		</select>
					        	</td>
					        	<td colspan="6">
					        		<input type="submit" class="btn btn-success sub-btn btn-lg" value="Update PO" id="submit-data" data-loading-text="Creating..." style="width: 100%;font-size: 20px;margin-top:25px;">
					        	</td>
					        </tr>
    					</tfoot>
					</table>
				</div>
			</form>
			</div>

		</div>
	</div>
@endsection
@section('script')
<script src="{{ asset('/js/purchase/purchase.js') }}"></script>
@endsection