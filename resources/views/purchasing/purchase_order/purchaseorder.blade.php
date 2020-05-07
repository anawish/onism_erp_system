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
	#basic_refer{
		height: 31px;
	}
	._prepend{
		height: 31px;
	}
	.center {
    	margin: auto;
	    width: 60%;
	    padding: 20px;
	    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	._table {
    counter-reset: rowNumber;
	}

	table .autonumber{
	    counter-increment: rowNumber;
	}

	table .autonumber td:first-child::before {
	    content: counter(rowNumber);
	}
	tr.highlighted td {
    background: lightgray;
	}
	._country{
		font-size:15px;
		font-family:sans-serif;
		color:#2f2d2d !important;
	}
	.modal-dialog{
		margin-left: 180px;
	}
	.modal-content{
		width: 970px;	
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
					<a href="{{url('/supplier')}}" class="btn btn-primary btn-sm rounded-pill px-5">Add Supplier</a>
				</div>
				<div class="col-md-4">
					<input type="hidden" name="company_id" value="1">
					<input type="hidden" name="emp_id" value="1">
					<div class="form-group mt-20">
						<label class="client_search">Search Supplier</label>
						<div class="input-group">
							<input type="text" name="search_supplier" class="form-control form-control-sm search_client" id="search_supplier" placeholder="Enter Supplier Name">
							<div class="input-group-prepend _prepend">
					          	<div class="input-group-text">
					          		<i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal" data-target="#mymodal" id="SearchSupplier"></i>
					          	</div>
					        </div>
						</div>
						<!-----Search Supplier--->
						<div class="modal fade align-center" id="mymodal" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document" style="margin-left: 180px;">
							    <div class="modal-content" style="width: 970px">
							      	<div class="modal-header">
							       	 	<h6 class="modal-title"> Supplier Detail</h6>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
								    <div class="modal-body">
								        <table  id="MasterTable" class="table supplierDetail">
								        	<thead style="background-color: #29bb9c;">
								        		<tr>
								        			<th>#</th>
								        			<th>Name</th>
								        			<th>Address</th>
								        			<th>City</th>
								        			<th>Country</th>
								        			<th>Email</th>
								        			<th>Phone</th>
								        		</tr>
								        	</thead>
								        	<tbody>
								        		@foreach($supplier as $suppliers)
								        		<tr class="autonumber" id="supplierDetail">
								        			<td></td>
								        			<td>
								        				<input type="hidden" name="supplier" id="supplier" value="{{$suppliers->id}}">
								        				{{$suppliers->name}}
								        			</td>
								        			<td>{{$suppliers->address}}</td>
								        			<td>{{$suppliers->city}}</td>
								        			<td>{{$suppliers->country}}</td>
								        			<td>{{$suppliers->email}}</td>
								        			<td>{{$suppliers->phone}}</td>
								        		</tr>
								        		@endforeach
								        		
								        	</tbody>
								        </table>
								    </div>
							    </div>
							</div>
						</div>
						<!-----/ Search Supplier-->
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
						<select class="form-control form-control-sm" name="warehouse">
							@foreach($data as $rows)
		                        <option value="{{$rows->id}}">{{$rows->warehouse_name}}</option>
		                    @endforeach
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row mt-25">
						<span class="text-dark font-weight-bold ft-size"></span>
					</div>
					<div class="form-group">
						<label class="client_search">PO Number</label>
						<div class="input-group">
							<div class="input-group-prepend">
							    <span class="input-group-text" id="basic_refer">{{$purchase_order}}</span>
							</div>
							<input type="text" class="form-control form-control-sm bd_r" id="invoice_no" name="invoice_no" value="{{$invoice_no}}" readonly="">
						</div>
					</div>
					<div class="form-group">
						<label class="client_search">Order Date</label>
						<div class="input-group" id="date_picker">
							<div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
							</div>
							<input type="text" class="form-control form-control-sm" name="order_date" id="order_date" required>
						</div>

					</div>	
					<div class="form-group">
						<label class="client_search">Tax</label>
						<select class="form-control form-control-sm" name="tax">
							<option></option>
							@foreach($tax as $taxes)
								<option value="{{$taxes->id}}">{{$taxes->title}}</option>
							@endforeach								
						</select>
					</div>
				</div>
				<div class="col-md-4" style="margin-top: 23px;">
					<div class="form-group">
						<label  class="client_search">Reference</label>
						<div class="input-group">
							<div class="input-group-prepend">
							    <span class="input-group-text" id="basic_refer"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
							</div>
							<input type="text" class="form-control form-control-sm bd_r" name="reference_no" placeholder="Reference #">
						</div>
					</div>
					<div class="form-group">
						<label class="client_search">Order Due Date</label>
						<div class="input-group" id="due_date">
							<div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
							</div>
							<input type="text" class="form-control form-control-sm" name="due_date" id="delivery_date"required >
						</div>
					</div>
					<div class="form-group">
						<label class="client_search">Discount</label>
						<select class="form-control form-control-sm" name="discount">
							<option value="% Discount After TAX">% Discount After TAX</option>
							<option value="% Discount After TAX">Flat Discount After TAX</option>
							<option value="% Discount Before TAX">% Discount Before TAX</option>
							<option value="Flat Discount Before TAX">Flat Discount Before TAX</option>
						</select>
					</div>	
				</div>
				<label class="client_search ml-17">Purchase Order Note</label>
				<textarea class="form-control form-control-sm mr" rows="2" name="invoice_note"></textarea>
			</div>
			<div class="row">
				<table id="myTable" class="table order-list">
				    <thead class="theader">
				        <tr>
				          	<th width="25%" style="font-size: 14px;">Item Name</th>
							<th width="10%;" style="font-size: 14px;">Quantity</th>
							<th width="15%;" style="font-size: 14px;">Rate</th>
							<th width="15%" style="font-size: 14px;">Tax(%)</th>
							<th width="10%" style="font-size: 14px;">Tax</th>
							<th width="20%" style="font-size: 14px;">Amount ($)</th>
							<th>Action</th>
				        </tr>
				    </thead>
				    <tbody style="background-color: #ededed;" id="item_detail">
				        <tr>
				            <td> 
				            	<div class="input-group">
				                	<input type="text" name="product_name[]" id="product_name" class="form-control form-control-sm product_name"required onkeypress="ProductSearch(this)">
						        	<input type="hidden" name="product_id[]" id="product_id" class="form-control product_id">
				            		<input type="hidden" name="product_code[]" id="product_code" class="product_code form-control-sm">
				            		<div class="input-group-prepend">
				            			<div class="input-group-text" style="height: 31px;">
				            				<i class="fa fa-search-plus searchbtn" data-toggle="modal" data-target="#searchitem" onclick="searchbtn(this)"></i>
				            			</div>
				            		</div>
				            	</div>
				            	@include('layouts.partials-modal.searchproduct')
						        <ul class="product_det"></ul>
				            </td>
				            <td>
				                <input type="text" name="qty[]" id="qty" class="form-control form-control-sm qty" required>
				            </td>
				            <td>
				              <input type="text" name="price[]" readonly id="price" class="form-control form-control-sm price">
				            </td>
				            <td>
				                <input type="text" name="tax_rate[]" id="product_tax" class="form-control form-control-sm product_tax">
				            </td>
				            <td>
				               <input type="text" name="product_tax[]" class="form-control form-control-sm pro_tax" readonly>
				            </td>
				            <td style="display: none;">
				               <input type="text" name="prodcut_discount" id="prodcut_discount" class="form-control form-control-sm prodcut_discount">
				            </td>
				            <td>
				               <input type="text" name="ammount[]" readonly="" id="ammount" class="form-control form-control-sm ammount">
				            </td>
				            <td>
				            	<a class="deleteRow"></a>
				            </td>
				        </tr>
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
				        		<input type="text" name="subtotal" id="subtotal" class="form-control subtotal"  readonly style="border: navajowhite;">
				        	</td>
				        </tr>
				        <tr>
				        	<td colspan="4">
				        		<strong class="invoice_det">Total Tax</strong>
				        	</td>
				        	<td colspan="4">
				        		<input type="text" name="total_tax" id="total_tax" class="form-control total_tax" readonly>
				        	</td>
				        </tr>
				        <tr style="display: none;">
				        	<td colspan="6">
				        		<strong class="invoice_det">Total Discount</strong>
				        	</td>
				        	<td colspan="2">
				        		<input type="text" name="total_discount" id="total_discount"class="form-control total_discount" readonly>
				        	</td>
				        </tr>
				        <tr>
				        	<td colspan="4">
				        		<strong class="invoice_det">Shipping</strong>
				        	</td>
				        	<td colspan="4">
				        		<input type="text" name="shipping" id="shipping" class="form-control shipping" value="">
				        	</td>
				        </tr>
				        <tr>
				        	<td colspan="4">
				        		<strong class="invoice_det">Grand Total ($)</strong>
				        	</td>
				        	<td colspan="4">
				        		<input type="text" name="total" id="total" class="form-control total"  readonly>
				        	</td>
				        </tr>
				        <tr>
				        	<td colspan="4">
				        		<label>Payment Terms</label>
				        		<select class="form-control" name="pyterm" style="width: 60%">
				        			@foreach($payment_term as $terms)
				        			<option value="{{$terms->id}}">{{$terms->title}}</option>
				        			@endforeach
				        		</select>
				        	</td>
				        	<td colspan="2"></td>
				        	<td colspan="4">
				        		<input type="submit" class="btn btn-success sub-btn btn-lg" value=" Generate PO " id="submit-data" data-loading-text="Creating..." style="margin-top: 20px;">

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