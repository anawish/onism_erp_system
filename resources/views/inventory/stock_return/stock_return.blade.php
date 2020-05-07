@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<div class="row _newqouta">
					<div class="col-md-4 mt-10">
						@if(session()->has('message'))
						    <div class="alert alert-success">
						        {{ session()->get('message') }}
						    </div>
						@endif
						<span class="font-weight-bold text-dark mr-20 bill_to">Bill To</span>
						<a href="{{url('/addsupplier')}}" class="btn btn-primary rounded-pill px-5"> Add Supplier</a>
						
						<div class="form-group mt-20">
							<label class="client_search">Search Supplier</label>
							<input type="text" name="search_client" class="form-control rounded-pill" placeholder="Enter Customer Name">
						</div>
						<div class="form-group">
							<label class="client_search">Supplier Details</label>
    						<hr>
    						<hr>
						</div>
						<div class="form-group">
							<label class="client_search">Wearhouse</label>
							<select class="form-control rounded-pill">
								<option>All</option>
								<option>Main Wearhouse</option>
							</select>
						</div>
					</div>
					<div class="col-md-4 mt-10">
						<div class="row mt-25">
							<span class="text-dark font-weight-bold ft-size"></span>
						</div>
						<div class="form-group mt-29">
							<label class="client_search">Invoice Number</label>
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1">@</span>
								</div>
								<input type="text" class="form-control bd_r" name="invoice_no" placeholder="Invoice No#">
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Order Date</label>
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1">@</span>
								</div>
								<input type="date" class="form-control  bd_r" name="invoice_no" placeholder="Invoice No#">
							</div>
						</div>	
						<div class="form-group">
							<label class="client_search">Tax</label>
							<select class="form-control rounded-pill">
								<option></option>
								<option>On</option>
								<option>Inclusive</option>
								<option>Off</option>
								<option>CGST+SGST</option>
								<option>IGST</option>
							</select>
						</div>
					</div>
					<div class="col-md-4 mt-10">
						<div class="form-group mt-57">
							<label  class="client_search">Reference</label>
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1">@</span>
								</div>
								<input type="text" class="form-control bd_r" name="invoice_date" placeholder="Reference #">
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Order Due Date</label>
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1">@</span>
								</div>
								<input type="date" class="form-control bd_r" name="due_date" placeholder="Invoice No#">
							</div>
						</div>
						<div class="form-group">
							<label class="client_search">Discount</label>
							<select class="form-control rounded-pill">
								<option>% Discount After TAX</option>
								<option>Flat Discount After TAX</option>
								<option>% Discount Before TAX</option>
								<option>Flat Discount Before TAX</option>
							</select>
						</div>	
					</div>
					<label class="client_search ml-17">Invoice Note</label>
					<textarea class="form-control rounded-pill mr" rows="2"></textarea>
				</div>
				<div class="row">
					<table class="table">
						<thead class="theader">
						    <tr>
						      <th scope="col">Item Name</th>
						      <th scope="col">Quantity</th>
						      <th scope="col">Rate</th>
						      <th scope="col">Price Type</th>
						      <th scope="col">Tax(%)</th>
						      <th scope="col">Tax</th>
						      <th scope="col">Discount</th>
						      <th scope="col">Amount ($)</th>
						      <th scope="col">Action</th>
						    </tr>
						</thead>
						<tbody class="tbody">
						    <tr>
						      	<td scope="row">
						      		<input type="text" name="item_name" class="form-control" placeholder="Product Name or Code">
						      	</td>
						      	<td>
						      		<input type="text" name="item_name"class="form-control w-50">
						      	</td>
						      	<td>
						      		<input type="text" name="item_name" class="form-control w-50">
						      	</td>
						      	<td>
							      	<select class="form-control w-120">
								      	<option>Retail</option>
								      	<option>Wholesale</option>
							      	</select>
						  		</td>
						  		<td>
						  			<input type="text" class="form-control" name="product_tax w-50">
						  		</td>
						  		<td>
						  			<input type="text" disabled="0" class="form-control w-50" name="tax">
						  		</td>
						  		<td>
						  			<input type="text" class="form-control w-75" name="product_discount" placeholder="0.00">
						  		</td>
						  		<td>
						  			<input type="text" disabled="0" class="form-control w-75" name="product_discount" placeholder=" $ 0.00">
						  		</td>
						  		<td>
						  			<button type="button" class="btn btn-danger">Remove</button>
						  		</td>
						    </tr>
						    <tr>
						    	<td colspan="9">
						    		<textarea id="dpid-0" class="form-control" name="product_description" placeholder="Enter Product description (Optional)" autocomplete="off"></textarea><br>
						    	</td>
						    </tr>
						    <tr class="last-item-row sub_c">
                                <td class="add-row">
                                    <button type="button" class="btn btn-success" id="addproduct">
                                      + Add Row </button>
                                </td>
                            </tr>
                            <tr class="sub_c">
                                <td colspan="6" align="right">
                                	<input type="hidden" value="0" id="subttlform" name="subtotal">
                                	<strong> Sub Total</strong>
                                </td>
                                <td align="left" colspan="2">
                                	<span class="currenty lightMode">$</span>
                                    <span id="sub_total" class="lightMode">0</span>
                                </td>
                            </tr>
                            <tr class="sub_c">
                                <td colspan="6" align="right">
                                	<input type="hidden" value="0" id="subttlform" name="subtotal">
                                	<strong> Total Tax</strong>
                                </td>
                                <td align="left" colspan="2">
                                	<span class="currenty lightMode">$</span>
                                    <span id="taxr" class="lightMode">0</span>
                                </td>
                            </tr>
                            <tr class="sub_c">
                                <td colspan="6" align="right">                                
                                	<p class="font-weight-bold mt-25 shipping"> Shipping</p>
                                </td>
                                <td align="left" colspan="2">
                                	<input type="text" class="form-control mt-25" placeholder="value" name="shipping">
                                </td>
                            </tr>
                            <tr class="sub_c">
                                <td colspan="6" align="right">
                                	<p class="font-weight-bold mt-20 shipping">
                                	   Grand Total   (<span class="currenty lightMode">$</span>)
                                	</p>
                                </td>
                                <td align="left" colspan="2">
                                	<input type="text" name="total" disabled="" class="form-control mt-20" id="invoiceyoghtml">
                                </td>
                            </tr>
                            <tr class="sub_c">
                                <td colspan="2"> 
                                	Payment Terms 
                                	<select name="pterms" class="selectpicker form-control">
                                		<option value="1">Payment On Receipt</option>
                                    </select>
                                </td>
                                <td colspan="2">
                                    <div>
                                        <label>Update Stock</label>
                                        <div class="input-group">
                                            <label class="display-inline-block custom-control custom-radio ml-1 check_box">
                                                <input type="radio" checked="checked" name="radio">
  												<span class="checkmark"></span>
  												<span class="custom-control-description">yes</span>
                                               
                                            </label>
                                            <label class="display-inline-block custom-control custom-radio check_box">
                                                <input type="radio" checked="checked" name="radio">
  												<span class="checkmark"></span>
                                                <span class="custom-control-description">No</span>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td align="right" colspan="4">
                                	<input type="submit" class="btn btn-success sub-btn btn-lg mt-20" value=" Generate Order " id="submit-data">
                                </td>
                            </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection