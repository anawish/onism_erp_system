@extends('layouts.app')
@section('style')
<style type="text/css">
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
	._order_no{
		height: 31px;
	}
	#myTable{
		margin-top: 15px;
	}
	.modal-dialog{
		margin-left: 180px;
	}
	.modal-content{
		width: 970px;	
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
	.total_order{
		margin-left: 115px;
	}
	.shipping_cost{
		margin-left: 160px;
	}
	.invoice_det{
		margin-left: 200px;
	}
	.mt-15{
		margin-top: 25px;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9 card">
			<a href="{{url('/customer')}}" class="btn btn-primary btn-sm rounded-pill" style="width: 120px;margin-top: 10px;">Add Client</a>
			<form method="post" action="{{action('OrderController@store')}}">
				{{ csrf_field() }}
				<!----- Oder Detail----->
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group mt-20">
							<label class="client_search">Search Client</label>
							<div class="input-group">
								<input type="hidden" name="empid" value="1">
								<input type="hidden" name="company_id" value="1">
								<input type="text" class="form-control form-control-sm" id="search_client" placeholder="Enter Customer Name">
								<div class="input-group-prepend _prepend">
						          	<div class="input-group-text">
						          		<i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal" data-target="#mymodal" id="SearchClient"></i>
						          	</div>
					        	</div>
							</div>
						</div>
						<!----- Search Supplier ---->
						<div class="modal fade align-center" id="mymodal" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
							    <div class="modal-content">
							      	<div class="modal-header">
							       	 	<h6 class="modal-title"> Customer Detail</h6>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
								    <div class="modal-body">
								        <table  id="MasterTable" class="table ClientDetail _table">
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
								        	<tbody class="autonumber">
								        		@foreach($customer as $customers)
								        		<tr class="autonumber" id="supplierDetail">
								        			<td></td>
								        			<td>
								        				<input type="hidden" id="supplier_id" value="{{$customers->id}}">
								        				{{$customers->name}}
								        			</td>
								        			<td>{{$customers->address}}</td>
								        			<td>{{$customers->city}}</td>
								        			<td>{{$customers->country}}</td>
								        			<td>{{$customers->email}}</td>
								        			<td>{{$customers->phone}}</td>
								        		</tr>
								        		@endforeach
								        	</tbody>
								        </table>
								    </div>
							    </div>
							</div>
						</div>
						<!------/Search Supplier ---->

						<!------ Supplier Detail----->
						<div class="form-group">
							<label class="client_search">Client Details</label>
    						<hr>
    							<div id="customerInfo" required=""></div>
    						<hr>
						</div>
						<!--------/Supplier Detail ----->
					
						<div class="form-group mt-20">
							<label class="client_search">P.O No</label>
							<div class="input-group">
								<input type="text" class="form-control form-control-sm" name="po_no">
							</div>
						</div>
					</div>

					<div class="col-sm-4 mt-20">
						<div class="form-group">
							<label class="client_search">Sale Oder No</label>
							<div class="input-group">
								<input type="text" class="form-control form-control-sm" name="order_no" value="{{$order_no}}" readonly>
								<div class="input-group-prepend">
								    <span class="input-group-text _order_no">
								    	<i class="fa fa-bookmark" aria-hidden="true"></i>
								    </span>
								</div>
							</div>
						</div>
						<div class="form-group mt-25">
							<label class="client_search">Total Qty KG</label>
							<div class="input-group">
								<input type="text" class="form-control form-control-sm" name="qty_kg">
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Total Qty Each</label>
							<div class="input-group">
								<input type="text" class="form-control form-control-sm" name="qty_each">
							</div>
						</div>
					</div>

					<div class="col-sm-4 mt-20">
						<div class="custom-control custom-checkbox mt-29">
					      	<input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
					      	<label class="custom-control-label" for="customCheck"> (Shipment All details if checked)</label>
					    </div>
					    <div class="form-group">
					    	<div id="client_inforight"></div>
					    	<hr>
					    </div>
					   	<div class="form-group">
							<label class="client_search">Order Date</label>
							<div class="input-group" id="date_picker">
								<input type="text" class="form-control form-control-sm" name="order_date" id="order_date" required>
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Delivery Date</label>
							<div class="input-group" id="due_date">
								<input type="text" class="form-control form-control-sm" name="delivery_date" id="delivery_date" required>
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="order-note">
							<label>Order Note</label>
							<textarea class="form-control form-control-sm" rows="2" name="order_note"></textarea>
						</div>
					</div>
				</div>
				<!------/Oder Detail ---->

				<!----- Product Detail --->
				<table id="myTable" class="table order-list">
					<thead style="background-color: #25b294;">
						<tr>
							<th>Product</th>
							<th>QTY</th>
							<th>Price</th>
							<th>Code</th>
							<th>Unit</th>
							<th>Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="item_detail" class="item_detail">
						<tr>
							<td>
								<div class="input-group">
									<input type="text" name="product_name[]" id="product_name" class="form-control form-control-sm product_name" required
									onkeypress="SearchProduct(this)">
					            	<input type="hidden" name="product_id[]" id="product_id" class="form-control form-control-sm product_id">
					            	<div class="input-group-prepend">
							           <div class="input-group-text">
							           		<i class="fa fa-search-plus searchbtn" onclick="searchbtn(this)" data-toggle="modal" data-target="#searchitem"></i>
							           	</div>
							        </div>
					            </div>
					          	@include('layouts.partials-modal.searchproduct')
					            <ul class="product_det"></ul>
							</td>
							<td>
								<input type="text" name="qty[]" id="qty" class="form-control-sm form-control" onchange="qty_calculate(this)" required>
							</td>
							<td>
								<input type="text" name="price[]" class="form-control-sm form-control" id="price" readonly onchange="qty_calculate(this)" required>
							</td>
							<td class="d-none">
					           	<input type="hidden" name="receive_qty" id="receive_qty" class="receive_qty">
					        </td>
							<td>
								<input type="text" name="code[]" id="code" class="form-control-sm form-control" readonly>
							</td>
							<td>
								<input type="text" name="unit[]" id="unit" class="form-control-sm form-control" readonly>
							</td>
							<td>
								<input type="text" name="amount[]" id="amount" class="form-control-sm form-control form-control-plaintext" readonly="">
							</td>
							<td><a class="deleteRow"></a>
						</tr>
					</tbody>
					<tfoot>
						<tr>
				            <td>
				                <input type="button" class="btn btn-success" id="addrow" value=" + Add Row"/>
				            </td>
					    </tr>
					    <tr>
					    	<td colspan="2"></td>
					        <td colspan="2">
					        	<strong class="invoice_det">Sub Total</strong>
					        </td>
					        <td colspan="4">
					        	<input type="text" name="sub_total" readonly id="sub_total" required="" class="form-control">
					       	</td>
					    </tr>
					    <tr>
					    	<td colspan="2"></td>
					        <td colspan="2">
					        	<strong class="shipping_cost">Shipping Cost</strong>
					        </td>
					        <td colspan="4">
					        	<input type="text" name="shipping" id="shipping" class="form-control">
					       	</td>
					    </tr>
					    <tr>
					    	<td colspan="2"></td>
					        <td colspan="2">
					        	<strong class="total_order">Total Order Amount</strong>
					        </td>
					        <td colspan="4">
					        	<input type="text" name="totalamount" id="totalamount" required readonly class="form-control totalamount">
					       	</td>
					    </tr>
					    <tr>
					    	<td colspan="2"></td>
					        <td colspan="2"></td>
					        <td colspan="4">
					        	<input type="submit" class="btn btn-success btn-lg text-center" value="Generate Oder">
					       	</td>
					    </tr>
					</tfoot>
				</table>
				<!------/Product Detail --->
			</form>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('/js/SaleInovice/saleorder.js') }}"></script>
@endsection

