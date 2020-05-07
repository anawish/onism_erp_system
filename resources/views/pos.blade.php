@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-8">
						<div class="input-group mt-10">
					        <div class="input-group-prepend rounded-pill mx-h">
					          	<span class="input-group-text"><a href="" class="btn btn-primary px-20  rounded-pill"data-toggle="modal" data-target="#exampleModal">  + Add</a></span>
					        </div>
					        <input type="text" class="form-control" placeholder="Enter Customer Name">
					    </div>

					    <!-- Add Customer  Model-->
					    @include('layouts/partials-modal.add-poscustomer')
					    <!-- End add customer -->

						<table class="table mt-20">
							<thead class="bg-primary">
							    <tr>
								    <th scope="col">Product Name</th>
								    <th scope="col">Qty</th>
								    <th scope="col">Rate</th>
								    <th scope="col">Rate</th>
								    <th scope="col">Tax</th>
								    <th scope="col">Discount</th>
								    <th scope="col">Amount</th>
								    <th scope="col">Action</th>
							    </tr>
							</thead>
						  	<tbody>
							    <tr class="pname">
							       <td scope="row">
							      	 	<input type="text" name="pname" class="form-control" placeholder="milk pack-001">
							       </td>
							      	<td>
							      	 	<input type="text" name="qty" class="form-control qty" placeholder="3">
							        </td>
							      	<td> 
							      		<input type="text" readonly class="form-control-plaintext rate" placeholder="2"></td>
							      	<td>
								      	<select class="form-control">
								      		<option value="Retail">Retail</option>
								      		<option value="wholesale">Wholesale</option>
								      	</select>
							      	</td>
							      	<td>
							      		<input type="text" name="tax" class="form-control qty">
							      	</td>
							     	<td>
							     		<input type="text" name="discount" class="form-control dsicount" placeholder="00.0">
							     	</td>
							        <td>
							       		<input type="text" name="discount" class="form-control amount" placeholder="200">
							        </td>
							        <td>
							       		<button class="btn btn-danger">Remove</button>
							        </td>
							    </tr>
						  	</tbody>
						</table>
					</div>
					<div class="col-md-4 mt-10 _mt-10">
						<div class="row">
							<div class="col-md-6 form-group mt-10">
								<label>Warehouse</label>
								<select class="form-control rounded-pill">
									<option value="">Warehouse</option>
								</select>
							</div>
							<div class="col-md-6 mt-10">
								<label>Category</label>
								<select class="form-control rounded-pill">
									<option>All</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<label>Product Name Or Code</label>
								<input type="text" name="name" class="form-control rounded-pill" placeholder="Enter product name or code">
							</div>
						</div>
						<div class="row mt-20">
							<div class="col-md-3">
								<div class="card  _card-rounded">
	                                <a class="select_pos_item btn btn-outline-light-blue round" data-wholesale="8.00" data-name="Tea Pack" data-price=" 10.00" data-tax="0.00" data-discount="0.00" data-pcode="5001" data-pid="3" data-stock="789.00" data-unit="">
	                                    <img class="rounded " src="{{asset('image/milk-pack.jpg')}}">
	                                    <div class="text-xs-center text">
	                                        <small class="p_titel">Tea Pack</small>
	                                    </div>
                                	</a>
                                </div>
							</div>
							<div class="col-xl-3">
								<div class="card  _card-rounded">
	                                <a class="select_pos_item btn btn-outline-light-blue round" data-wholesale="8.00" data-name="Tea Pack" data-price=" 10.00" data-tax="0.00" data-discount="0.00" data-pcode="5001" data-pid="3" data-stock="789.00" data-unit="">
	                                    <img class="rounded" src="{{asset('image/pack.jpg')}}">
	                                    <div class="text-xs-center text">
	                                        <small class="p_titel">Tea Pack</small>
	                                    </div>
                                	</a>
                                </div>
							</div>
							<div class="col-xl-3">
								<div class="card  _card-rounded">
	                                <a class="select_pos_item btn btn-outline-light-blue round" data-wholesale="8.00" data-name="Tea Pack" data-price=" 10.00" data-tax="0.00" data-discount="0.00" data-pcode="5001" data-pid="3" data-stock="789.00" data-unit="">
	                                    <img class="rounded" src="{{asset('image/tea.jpg')}}">
	                                    <div class="text-xs-center text">
	                                        <small class="p_titel">Tea Pack</small>
	                                    </div>
                                	</a>
                                </div>
							</div>
							<div class="col-xl-3">
								<div class="card _card-rounded">
	                                <a class="select_pos_item btn btn-outline-light-blue round" data-wholesale="8.00" data-name="Tea Pack" data-price=" 10.00" data-tax="0.00" data-discount="0.00" data-pcode="5001" data-pid="3" data-stock="789.00" data-unit="">
	                                    <img class="rounded" src="{{asset('image/tea.jpg')}}">
	                                    <div class="text-xs-center text">
	                                        <small class="p_titel">Tea Pack</small>
	                                    </div>
                                	</a>
                                </div>
							</div>
						</div>
						<hr>
						<div class="row mt-20">
							<div class="col-md-3">
								<div class="card _card-rounded">
	                                <a class="select_pos_item btn btn-outline-light-blue round" data-wholesale="8.00" data-name="Tea Pack" data-price=" 10.00" data-tax="0.00" data-discount="0.00" data-pcode="5001" data-pid="3" data-stock="789.00" data-unit="">
	                                    <img class="rounded" src="{{asset('image/milk-pack.jpg')}}">
	                                    <div class="text-xs-center text">
	                                        <small class="p_titel">Tea Pack</small>
	                                    </div>
                                	</a>
                                </div>
							</div>
							<div class="col-xl-3">
								<div class="card _card-rounded">
	                                <a class="select_pos_item btn btn-outline-light-blue round" data-wholesale="8.00" data-name="Tea Pack" data-price=" 10.00" data-tax="0.00" data-discount="0.00" data-pcode="5001" data-pid="3" data-stock="789.00" data-unit="">
	                                    <img class="rounded" src="{{asset('image/pack.jpg')}}">
	                                    <div class="text-xs-center text">
	                                        <small class="p_titel">Tea Pack</small>
	                                    </div>
                                	</a>
                                </div>
							</div>
							<div class="col-xl-3">
								<div class="card _card-rounded">
	                                <a class="select_pos_item btn btn-outline-light-blue round" data-wholesale="8.00" data-name="Tea Pack" data-price=" 10.00" data-tax="0.00" data-discount="0.00" data-pcode="5001" data-pid="3" data-stock="789.00" data-unit="">
	                                    <img class="rounded" src="{{asset('image/tea.jpg')}}">
	                                    <div class="text-xs-center text">
	                                        <small class="p_titel">Tea Pack</small>
	                                    </div>
                                	</a>
                                </div>
							</div>
							<div class="col-xl-3">
								<div class="card _card-rounded">
	                                <a class="select_pos_item btn btn-outline-light-blue round" data-wholesale="8.00" data-name="Tea Pack" data-price=" 10.00" data-tax="0.00" data-discount="0.00" data-pcode="5001" data-pid="3" data-stock="789.00" data-unit="">
	                                    <img class="rounded" src="{{asset('image/tea.jpg')}}">
	                                    <div class="text-xs-center text">
	                                        <small class="p_titel">Tea Pack</small>
	                                    </div>
                                	</a>
                                </div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row" >
					<div class="col-md-8">
						<hr>
						<div class="row">
							<div class="col-md-12">
							 	<div class="form-group row sub_total">
							 		<div class="col-sm-8"></div>
		                            <span class="col-sm-2 font-weight-bold">Sub Total</span>
		                            <div class="col-sm-2">
		                                <input type="text" readonly  placeholder="10.00" class="form-control-plaintext" name="sub_total">
		                           </div>
		                        </div>
                        	</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							 	<div class="form-group row sub_total">
							 		<div class="col-sm-8"></div>
		                            <span class="col-sm-2 font-weight-bold">Total Tax</span>
		                            <div class="col-sm-2">
		                                <input type="text" readonly  placeholder="10.00" class="form-control-plaintext" name="total_tax">
		                           </div>
		                        </div>
                        	</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							 	<div class="form-group row sub_total">
							 		<div class="col-sm-8"></div>
		                            <span class="col-sm-2 font-weight-bold">Total Discount</span>
		                            <div class="col-sm-2">
		                                <input type="text"readonly placeholder="10.00" class="form-control-plaintext" name="total_discount">
		                           </div>
		                        </div>
                        	</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							 	<div class="form-group row sub_total">
							 		<div class="col-sm-8"></div>
		                            <span class="col-sm-2 font-weight-bold">Shipping</span>
		                            <div class="col-sm-2">
		                                <input type="text" placeholder="0" class="form-control-plaintext" name="shipping">
		                           </div>
		                        </div>
                        	</div>	
						</div>
						<div class="row">
							<div class="col-md-12">
							 	<div class="form-group row sub_total">
							 		<div class="col-sm-8"></div>
		                            <span class="col-sm-2 font-weight-bold">Grand Total</span>
		                            <div class="col-sm-2">
		                                <input type="text" disabled="" placeholder="200.00" class="form-control-plaintext" name="grand_total">
		                           </div>
		                        </div>
                        	</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<hr>
						<div class="col-md-12">
							<div class="form-group text-center ">
								<button type="button" class="btn btn-danger font-weight-bold on_hold">Cancel</button>
								<button type="button" class="btn btn-info font-weight-bold on_hold">On Hold</button>
								<button type="button" class="btn btn-success font-weight-bold on_hold"  data-toggle="modal" data-target="#payment">Payment</button>
								<button type="button" class="btn btn-secondary font-weight-bold on_hold">Card</button>
							</div>
						</div>
						<!-- payment model -->
						@include('layouts.partials-modal.pos-paymentmodal')
						<!-- end payment model -->
					</div>
				</div>
			</div>
		</div>
	</div>
	

@endsection