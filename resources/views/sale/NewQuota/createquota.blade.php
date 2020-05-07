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
	#basic-addon1{
		height: 31px;
	}
	tr.highlighted td {
    background: lightgray;
	}
</style>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<form method="post" action="{{action('QuoteInvoiceController@store')}}">
				{{ csrf_field() }}
				<div class="row _newqouta">
					<div class="col-md-4 mt-10">
						<span class="font-weight-bold text-dark mr-20 bill_to">Bill To</span>
						<a href="{{url('/customer')}}" class="btn btn-primary rounded-pill px-5">Add New</a>
						<div class="form-group mt-20">
							<input type="hidden" name="empid" value="1">
							<input type="hidden" name="company_id" value="1">
							<label class="client_search">Search Client</label>
							<div class="input-group">
								<input type="text" name="search_client" class="form-control form-control-sm" placeholder="Enter Customer Name" id="search_client">
								<div class="input-group-prepend _prepend">
							        <div class="input-group-text">
							          	<i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal" data-target="#mymodal" id="SearchClient"></i>
							        </div>
						       </div>
							</div>
						</div>
						<div id="searchResult">
							<ul></ul>
						</div>
						<div class="modal fade align-center" id="mymodal" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document" style="margin-left: 180px;">
							    <div class="modal-content" style="width: 970px">
							      	<div class="modal-header">
							       	 	<h6 class="modal-title"> Customer Detail</h6>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
								    <div class="modal-body">
								        <table  id="MasterTable" class="table ClientDetail">
								        	<thead style="background-color: #29bb9c;">
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
								        		<tr class="autonumber" id="quote_detail">
								        			<td></td>
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
								        		</tr>
								        		@endforeach
								        	</tbody>
								        </table>
								    </div>
							    </div>
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Client Details</label>
    						<hr>
    							<div id="customerInfo"></div>
    						<hr>
						</div>
						<div class="form-group">
							<label class="client_search">Warehouse</label>
							<select class="form-control form-control-sm" name="warehouse_id">
								@foreach($warehouse as $warehouses)
									<option value="{{$warehouses->id}}">{{$warehouses->warehouse_name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4 mt-10">
						<div class="row">
							<span class="text-dark font-weight-bold"style="font-size: 18px;">Quote Properties</span>
						</div>
						<div class="form-group mt-29">
							<label class="client_search">Quote Number</label>
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1">{{$quote}}</span>
								</div>
						
								<input type="text" class="form-control form-control-sm bd_r" name="invoice_no" value="{{$invoice_no}}" readonly="">
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Quote Date</label>
							<div class="input-group" id="date_picker">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
								</div>
								<input type="text" class="form-control form-control-sm bd_r" name="invoicedate" required id="invoice_date">
							</div>
						</div>	
					</div>
					<div class="col-md-4 mt-10">
						<div class="form-group mt-57">
							<label  class="client_search">Reference</label>
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="fa fa-bookmark" aria-hidden="true"></i>
								    </span>
								</div>
								<input type="text" class="form-control form-control-sm bd_r" name="refer_no" placeholder="Reference #">
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Vallidity Date</label>
							<div class="input-group" id="due_date">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
								</div>
								<input type="text" class="form-control form-control-sm bd_r" name="invoice_duedate" required
								id="dueDate">
							</div>
						</div>
					</div>
					<label class="client_search ml-17">Qouta Note</label>
					<textarea class="form-control form-control-sm" rows="2" name="invoice_note"></textarea>
					<label class="client_search ml-17">Proposal Message</label>
					<textarea class="form-control form-control-sm" rows="2" name="proposal"></textarea>
				</div>
				<div class="row">
					<table id="myTable" class=" table order-list">
					    <thead class="theader">
					        <tr>
					          	<th width="20%">Item Name</th>
								<th width="5%">Quantity</th>
								<th width="10%">Rate</th>
								<th width="15%">Price Type</th>
								<th width="10%">Tax(%)</th>
								<th width="10%">Tax</th>
								<th width="10%">Discount</th>
								<th width="10%">Amount</th>
								<th width="10%">Action</th>
					        </tr>
					    </thead>
					    <tbody id="item_detail">
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
					            <td >
					                <input type="text" required="" name="qty[]" id="qty" class="form-control form-control-sm qty" onchange="qty_calculate(this)">
					            </td>
					            <td >
					              <input type="text" required="" name="price[]" id="price" class="form-control form-control-sm price">
					            </td>
					            <td >
					                <select class="form-control form-control-sm price_type" name="price_type[]" id="price_type">
					                	<option value="Retail">Retail</option>
					                	<option value="Wholesale">Wholesale</option>
					                </select>
					            </td>
					            <td >
					                <input type="text" name="tax_rate[]" id="tax_rate" class="form-control form-control-sm tax_rate"onchange="qty_calculate(this)" value="0">
					            </td>
					            <td >
					               <input type="text" name="product_tax[]" readonly id="product_tax" class="form-control form-control-sm product_tax">
					            </td>
					            <td >
					               <input type="text" name="discount_rate[]" id="discount_rate" class="form-control form-control-sm discount_rate" onchange="qty_calculate(this)" value="0">
					            </td>
					            <td >
					              <input type="text" required="" readonly name="totalAmount[]" id="totalAmount" class="form-control form-control-sm totalAmount">
					            </td>
					            <td class="col-sm-2">
					            	<input type="button" class="delete_row form-control-sm btn btn-md btn-danger" value="X">
					            	<!-- <a class="deleteRow"></a> -->
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
					        		<input type="text" name="sub_total" readonly id="sub_total" class="form-control sub_total">
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
					        	<td colspan="4">
					        		<label>Sales Person</label>
					        		<select class="form-control" name="sale_person" style="width: 60%">
					        			<option>Bussiness Owner</option>
					        		</select>
					        	</td>
					        	<td colspan="2">
					        		<strong class="invoice_det">Shipping</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="shipping" id="shipping" class="form-control shipping">
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4">
					        		<label style="font-size: 14px;">Payment Currency for your client based on <br> live market</label>
					        		<select class="form-control" name="currency_type" style="width: 60%">
					        			<option>Bussiness Owner</option>
					        		</select>
					        	</td>
					        	<td colspan="2">
					        		<strong class="invoice_det">Grand Total ($)</strong>
					        	</td>
					        	<td colspan="4">
					        		<input type="text" name="grand_total"  id="grand_total" readonly class="form-control grand_total" required="">
					        	</td>
					        </tr>
					        <tr>
					        	<td colspan="4">
					        		<label>Payment Terms</label>
					        		<select class="form-control" name="terms" style="width: 60%">
					        			@foreach($terms as $term)
					        			<option value="{{$term->id}}">{{$term->title}}</option>
					        			@endforeach
					        		</select>
					        	</td>
					        	<td colspan="2"></td>
					        	<td colspan="4">
					        		<input type="submit" class="btn btn-success sub-btn btn-lg" value=" Generate Quote " id="submit-data" data-loading-text="Creating..." style="margin-top: 20px;">
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
<script type="text/javascript" src="{{ asset('/js/SaleInovice/quote.js') }}"></script>
@endsection