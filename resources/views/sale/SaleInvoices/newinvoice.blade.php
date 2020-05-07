@extends('layouts.app')
@section('style')
<style type="text/css">
	.clear{
	 clear:both;
	 margin-top: 20px;
	}
	.input-group-text{
		height: 31px;
	}
	.px-5{
		padding: 4px;
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
		/*background-color: #ededed;*/
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
	#invocie_overview{
		background-color: #29bb9c;
    	border-color: #29bb9c;
    	color: white;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<form method="post" action="{{action('NewInvoiceController@store')}}">
				 {{ csrf_field() }}
				<div class="row _newqouta">
					<?php if(Session::has('success')):?>
					     @if(session()->has('message'))
						    <div class="alert alert-success">
						        {{ session()->get('message') }}
						    </div>
						@endif
					<?php endif; ?>
					<div class="col-md-4 mt-10">
						<input type="hidden" name="empid" value="1">
						<input type="hidden" name="company_id" value="1">
						<span class="font-weight-bold text-dark mr-20 bill_to">Bill To</span>
						<a href="{{url('/customer')}}" class="btn btn-primary rounded-pill form-control-sm px-5">Add Client
						</a>
						<div class="form-group mt-20">
							<label class="client_search">Search Client</label>
							<div class="input-group">
								<input type="text" class="form-control form-control-sm" id="search_client" placeholder="Enter Customer Name">
								<div class="input-group-prepend _prepend">
						          	<div class="input-group-text">
						          		<i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal" data-target="#mymodal" id="SearchClient"></i>
						          	</div>
					        	</div>
							</div>
				        </div>
							<!-----/Search Customer--->
						<div class="modal fade align-center" id="mymodal" tabindex="-1"
								 role="dialog">
							<div class="modal-dialog" id="dialog" role="document" style="margin-left: 180px;">
							    <div class="modal-content" style="width: 970px">
							      	<div class="modal-header" id="header">
							      		<div class="row">
							      			<div class="col-sm-6">
							      				<h6 class="modal-title">Customer Detail</h6>
							      			</div>
							      			<div class="col-sm-3">
							      				<a href="{{url('account/viewcustomer')}}" class="btn btn-secondary btn-sm">Account</a>
							      			</div>
							      			<div class="col-sm-3">
							      				<button class="btn btn-info btn-sm">Projects</button>
							      			</div>
							      		</div>
							       	 	
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>

							      	</div>
								    <div class="modal-body">
								        <table id="MasterTable" cellspacing="0" class="table ClientDetail display" style="width: 100%;">
								        	<thead>
								        		<tr>
								        			<th>#</th>
								        			<th>Name</th>
								        			<th>Address</th>
								        			<th>City</th>
								        			<th>Country</th>
								        			<th>Email</th>
								        			<th>Phone</th>
								        			<th>Balance</th>
								        			
								        		</tr>
								        	</thead>
								        	<tbody>
								        		@foreach($customer as $customers)
								        		<tr id="supplierDetail">
								        			<td>{{$customers->cust_no}}</td>
								        			<td>
								        				<input type="hidden" name="customer_id" id="customer_id" value="{{$customers->id}}">
								        				{{$customers->name}}
								        			</td>
								        			<td>{{$customers->address}}</td>
								        			<td>{{$customers->city}}</td>
								        			<td>{{$customers->country}}</td>
								        			<td>{{$customers->email}}</td>
								        			<td>{{$customers->phone}}</td>
								        			<td>$ {{number_format($customers->balance,2)}}</td>
								        			<td class="d-none">{{$customers->gid}}</td>
								        		</tr>
								        		@endforeach
								        	</tbody>
								        </table>
								    </div>
							    </div>
							</div>
						</div>
							<!----- Search Customer-->
						<div id="searchResult">
							<ul></ul>
						</div>
						<div class="form-group">
							<label class="client_search">Client Details</label>
    						<hr>
    							<div id="customerInfo">
    							</div>
    						<hr>
						</div>
						<div class="form-group">
							<label class="client_search">Wearhouse</label>
							<select class="form-control form-control-sm" name="warehouse_id">
								@foreach($warehouse as $warehouses)
									<option value="{{$warehouses->id}}">{{$warehouses->warehouse_name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4 mt-10">
						<div class="row">
							<span class="text-dark font-weight-bold ft-size">Invoice Properties</span>
						</div>
						<div class="form-group mt-29">
							<label class="client_search">Invoice Number</label>
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1">{{$sale_inovice}}</span>
								</div>

								<input type="text" class="form-control form-control-sm bd_r" name="invoice_no" value="{{$invoice_no}}" readonly id="invoice_no">
								<input type="hidden" name="sale_no" value="{{$sale_no}}">
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Invoice Date</label>
							<div class="input-group" id="date_picker">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
								</div>
								<input type="text" class="form-control form-control-sm bd_r" name="invoicedate" id="invoice_date" required="">
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox mt-29">
					      		<input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
					      		<label class="custom-control-label" for="customCheck"> (Shipment All details if checked)</label>
					    	</div>
					    	<div class="form-group">
						    	<div id="client_inforight"></div>
						    	<hr>
					    	</div>
						</div>
					</div>
					<div class="col-md-4 mt-10">
						<div class="form-group mt-57">
							<label  class="client_search">Reference</label>
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
								</div>
								<input type="text" class="form-control form-control-sm bd_r" name="refer_no" id="refer_no" placeholder="Reference #">
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Due Date</label>
							<div class="input-group" id="due_date">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
								</div>
								<input type="text" class="form-control form-control-sm bd_r" name="invoice_duedate" required id="dueDate">
							</div>
						</div>
					</div>
					<label class="client_search ml-17">Invoice Note</label>
					<textarea class="form-control form-control-sm mr" rows="2" name="invoice_note" id="invoice_note"></textarea>
					
				</div>
				<div class="row">
					<table id="myTable" class="table order-list">
					    <thead class="theader">
					        <tr>
					          	<th width="20%" style="font-size: 14px">Item Name</th>
								<th width="5%" style="font-size: 14px">Quantity</th>
								<th width="10%" style="font-size: 14px">Rate</th>
								<th width="15%" style="font-size: 14px">Price Type</th>
								<th width="7%" style="font-size: 14px">Tax(%)</th>
								<th width="10%" style="font-size: 14px">Tax</th>
								<th width="7%" style="font-size: 14px">Discount</th>
								<th width="10%" style="font-size: 14px">Amount</th>
								<th width="5%" style="font-size: 14px">Action</th>
					        </tr>
					    </thead>
					    <tbody id="item_detail" style="background-color: #f3f3f3;">
					        <tr>
					            <td> 
					            	<div class="input-group">
					            		<input type="text" name="product_name[]" id="product_name" class="form-control form-control-sm product_name" required="" onkeypress="SearchProduct(this)">
					                	<input type="hidden" name="product_id[]" id="product_id" class="form-control product_id">
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
					                <input type="text" required name="qty[]" id="qty" class="form-control form-control-sm qty" onchange="qty_calculate(this)">
					            </td>
					            <td class="d-none">
					            	<input type="hidden" name="receive_qty" id="receive_qty" class="receive_qty">
					            </td>
					            <td>
					              <input type="text" name="price[]" id="price" class="form-control form-control-sm price" readonly  onchange="qty_calculate(this)">
					            </td>
					            <td>
					                <select class="form-control form-control-sm price_type" name="price_type[]" id="price_type" onchange="qty_calculate(this)">
					                	<option value="Retail">Retail</option>
					                	<option value="Wholesale">Wholesale</option>
					                </select>
					            </td>
					            <td>
					                <input type="text" name="tax_rate[]" id="tax_rate" class="form-control form-control-sm tax_rate" onchange="qty_calculate(this)" value="0">
					            </td>
					            <td>
					               <input type="text" name="product_tax[]" readonly id="product_tax" class="form-control form-control-sm product_tax">
					            </td>
					            <td>
					               <input type="text" name="discount_rate[]" id="discount_rate" class="form-control form-control-sm discount_rate" onchange="qty_calculate(this)" value="0">
					            </td>
					            <td>
					              <input type="text" readonly name="totalAmount[]" id="totalAmount" required class="form-control-plaintext form-control-sm totalAmount">
					            </td>
					            <td class="col-sm-2">
					            	<!-- <a class="deleteRow"></a> -->
					            	<input type="button" class="delete_row btn btn-sm btn-danger" value="X">
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
					        	<td colspan="4"></td>
					        	<td colspan="2">
					        		<strong class="invoice_det">Sub Total</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="sub_total" readonly id="sub_total" required="" class="form-control sub_total">
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4"></td>
					        	<td colspan="2">
					        		<strong class="invoice_det">Total Tax</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="total_tax" id="total_tax" class="form-control total_tax" readonly>
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4"></td>
					        	<td colspan="2">
					        		<strong class="invoice_det">Total Discount</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="total_discount" id="total_discount"class="form-control total_discount" readonly>
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4"></td>
					        	<td colspan="2">
					        		<strong class="invoice_det">Shipping</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="shipping" id="shipping" class="form-control shipping">
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4"></td>
					        	<td colspan="2">
					        		<strong class="invoice_det">Grand Total ($)</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="grand_total" id="grand_total" readonly class="form-control grand_total" required>
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4"></td>
					        	<td colspan="2">
					        		<input type="submit" class="btn btn-success sub-btn btn-lg" value=" Generate Invoice" id="submit-data" data-loading-text="Creating...">
					        	</td>
					        	<td colspan="4">
					        		<input type="button" class="btn btn-success sub-btn btn-lg" value=" Invoice Overview" id="invocie_overview" data-toggle="modal" data-target="#invocie_overviews">
					        	</td>
					        </tr>
    					</tfoot>
					</table>
				</div>
				@foreach($account as $accounts)
				<input type="hidden" name="gl_id" value="{{$accounts->id}}">
				@endforeach
			</form>
		</div>
	</div>
</div>
@include('layouts.partials-modal.invocieoverview')
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('/js/SaleInovice/invoice.js') }}"></script>
<script type="text/javascript" src="{{asset('js/SaleInovice/reload.js')}}"></script>
@endsection