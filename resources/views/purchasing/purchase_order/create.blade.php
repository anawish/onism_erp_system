@extends('layouts.app')
@section('style')
	<style type="text/css">
		table{
			counter-reset: rowNumber;
		}
		table .autonumber{
			counter-increment: rowNumber;
		}
		table .autonumber td:first-child::before {

			content: counter(rowNumber);
		}
		.content-body{
			box-shadow: 0px 3px 4px 1px;
		    margin-top: 13px;
		    border-radius: 10px;
		}
		.lead{
			margin-left: 20px;
		}
		.terms{
			margin-left: 20px;
		}
		.company_logo{
			width: 200px;
		    height: 80px;
		    margin-left: 22px;
		}
		.company_name{
			font-size: 18px;
			font-family: sans-serif;
			margin-left: 35px;
			margin-top: 10px;
		}
		.sup_det{
			margin-right: 35px;
			margin-left: 30px;
		}
		#invoice_no{
			margin-top: 20px;
		}
		._title{
			margin-left: 30px;
			margin-top: 15px;
		}
		._content{
			width: 600px;	
		}
		.px-0{
			margin-left: 30px;
		}
		.background-color{
			background-color: #e6e6e6;
		}
		._right{
			color: red;
		}
	</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="content-body">
				<input type="hidden" name="invoice_id" value="{{$data['id']}}" id="invoice_id">
	            <section class="card" style="border: none;">
	                <div id="invoice-template" class="card-block">
	                    <div class="row wrapper white-bg page-heading">
	                        <div class="col-lg-12 _title">
	                            <div class="title-action">
	                            	@if($data['status'] !='Paid')
									<a href="{{$data['id']}}" class="btn btn-warning btn-sm payment_paid" id="edit_order">
									<i class="fa fa-edit"></i> Edit Order</a>
									@endif

									@if($data['status'] !='Paid')
									<a href="{{$data['id']}}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#payment_model">
									<i class="fa fa-money"></i> Make Payment</a>
									@endif

									<!----- Payment Model----->
									<div class="modal fade" id="payment_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content _content">
									      	<div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Debit Payment Confirmation</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
									      	</div>
										    <div class="modal-body">
										    	<input type="hidden" name="id" id="id" value="{{$data['id']}}">
									        	<div class="row">
									        		<div class="col-sm-6">
													    <div class="input-group mb-2">
														    <div class="input-group-prepend">
														        <div class="input-group-text">
														        	<i class="fa fa-money"></i>
														        </div>
														    </div>
													        <input type="text" class="form-control" id="payment_made" name="payment_made" value="{{ $data['due_balance']}}">
													    </div>
									        		</div>
									        		<div class="col-sm-6">
														    
													    <div class="input-group mb-2">
														    <div class="input-group-prepend" id="pdate">
														        <div class="input-group-text">
														          	<i class="fa fa-calendar" aria-hidden="true"></i>
														        </div>
														    </div>
													       	<input type="text" id="updated_date" name="updated_date" class="form-control">
													    </div>
									        		</div>
									        	</div>
                                  				<div class="form-group">
			    									<label>Payment Method</label>
			    									<select class="form-control form-control-sm" id="payment_method" name="payment_method">
			    	 								@foreach($payment_method as $payments)
			       									<option value="{{$payments->payment_type}}">{{$payments->payment_type}}</option>
			      									@endforeach
			  										</select>
			  									</div>
												<div class="form-group">
			    									<label>Payment Note</label>
			    									<input type="text" name="payment_note" class="form-control form-control-sm" id="payment_note">
			  									</div>
												<input type="text" class="form-control form-control-sm" name="invoice_no" readonly id="invoice_no" value="{{$data['invoice_no']}}">
												@foreach($invoice as $invoices)
												<input type="hidden" name="po_id" id="po_id" value="{{$invoices->id}}">
												@endforeach
												@foreach($SupplierDetail as $SupplierDetails)
												<input type="hidden" name="vendor_id" id="vendor_id" value="{{$SupplierDetails->id}}">
												@endforeach
										    </div>
									      	<div class="modal-footer">
									        	<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
									        	<button type="button" class="btn btn-primary btn-sm" id="doPayment">Do Payment</button>
									      	</div>
									    </div>
									  </div>
									</div>
									<!-----End Model --------->
	                                <div class="btn-group">
	                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-envelope"></i> 
	                                    	Send                                   
	                           		 	</button>
	                                    <div class="dropdown-menu">
	                                    	<a href="" data-toggle="modal" data-remote="false" class="dropdown-item sendbill" data-type="purchase">Purchase Request</a>
	                                    </div>
	                                </div>

	                                <div class="btn-group">
	                                    <a href="{{route('purchaseinvoice.show',$data['id'])}}" class="btn btn-success btn-sm"><i class="fa fa-print"></i>  Print Order</a>
	                                </div>

	                                <a href="{{route('purchaseinvoice.edit',$data['id'])}}" class="btn btn-secondary btn-sm"><i class="fa fa-firefox"></i> Public Preview </a>
	                                @if($data['status'] !='Paid')
	                               	<a href="{{$data['id']}}" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" title="Change Status"><i class="fa fa-exchange"></i> Change Status</a>
	                               	@endif
	                               	@if($data['status'] !='Paid')
	                                <a href="{{$data['id']}}" class="btn btn-danger btn-sm payment_paid hidden" id="cancel-bill"><i class="fa fa-minus"></i> Cancel </a>
	                               @endif
	                            </div>                        
	                        </div>
	                    </div>


						<!--- Model--->

						<div class="modal fade" id="exampleModal" tabindex="-1" 
							role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  	<div class="modal-dialog hide_model" role="document">
							    <div class="modal-content">
							      	<div class="modal-header">
							       		<h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							     	</div>
								    <div class="modal-body">
								    	<div class="form-group">
									      <label for="inputState">Choose</label>

									      <select class="form-control" name="status" id="status">
									        <option value="due">Due</option>
									        <option value="paid">Paid</option>
									        <option value="partial">Partial</option>
									      </select>
									    </div>
								    </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button class="btn btn-primary" data-dismiss="modal" id="change_status">Save changes</button>
							      </div>
							    </div>
						  	</div>
						</div>		                    

	                    <!-- Invoice Company Details -->
	                  

	                    <div id="invoice-company-details" class="row mt-2">
	                        <div class="col-md-6 col-sm-12 text-xs-center">
	                           <img src="{{asset('logo/zlogo.png')}}" 
	                           		class="img-responsive company_logo">
								<p class="company_name">Abc Company</p>
	                        </div>
	                        <div class="col-md-6 col-sm-12 text-xs-center text-md-right">
	                        	@foreach ($SupplierDetail as $details)
	                            <h2 class="sup_det">Purchase Order</h2>
	                            <p class="sup_det"> PO # {{$details->invoice_no}}</p>
	                            <p class="sup_det">Reference: 
	                            	{{ $details->reference_no }}
	                            </p>
	                            @endforeach
	                            <ul class="sup_det list-unstyled">
	                                <li>Gross Amount</li>
	                                <li class="lead text-bold-800">$ {{number_format($data['total'],2)}}</li>
	                            </ul>
	                        </div>
	                    </div>
	                    <!--/ Invoice Company Details -->

	                    <!-- Invoice Customer Details -->
	                    <div id="invoice-customer-details" class="row pt-2">
	                        <div class="col-sm-12 text-xs-center text-md-left">
	                            <p class="text-muted sup_det">Bill From</p>
	                        </div>
	                        <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
	                        	@foreach ($SupplierDetail as $details)
	                            <ul class="px-0 list-unstyled" style="">
	                                <li class="text-bold-800">
	                                	<a href="">
	                                		<strong>{{ ucfirst($details->name)}}</strong>
	                                	</a>
	                                </li>
	                                <li>{{ucfirst($details->address)}}</li>
	                                <li>{{ucfirst($details->city)}},{{ ucfirst($details->country)}}</li>
	                                <li>Phone: {{ $details->phone }}</li>
	                                <li>Email: {{ $details->email }} </li>
	                            </ul>
	                            @endforeach
	                        </div>
	                        <div class="offset-md-3 col-md-3 col-sm-12 text-xs-center text-md-left">
	                        	@foreach($SupplierDetail as $details)
	                            <p><span class="text-muted">Order Date :</span>  {{$details->order_date}} </p> 
	                            <p><span class="text-muted">Due Date :</span> {{$details->due_date}} </p> @endforeach
	                            <p><span class="text-muted">Terms :</span> Payment On Receipt</p>
	                        </div>
	                    </div>
	                    
	                    <!--/ Invoice Customer Details -->

	                    <!-- Invoice Items Details -->
	                    <div id="invoice-items-details" class="pt-2">
	                        <div class="row">
	                            <div class="table-responsive col-sm-12">
	                                <table class="table table-striped">
	                                    <thead>
	                                        <tr>
		                                        <th>Sr#</th>
		                                        <th>Product</th>
		                                        <th>Rate</th>
		                                        <th>Qty</th>
		                                        <th>Tax</th>
		                                        <th>Amount</th>
	                                    	</tr>
	                                    </thead>
	                                    <tbody>
	                                	@foreach($invoice as $invoices)
	                                    <tr class="autonumber">
	                                    	<td></td>
	                                    	<td>{{$invoices['product_name']}}</td>
	                            			<td>{{$invoices['price']}}</td>
	                             			<td>{{$invoices['qty']}}</td>
	                            			<td>$ {{$invoices['tax']}}</td>
	                            			<td>
	                            				${{number_format($invoices['ammount'],2)}}
	                            			</td>
	                        			</tr>
	                        			@endforeach
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
	                        <p></p>
	                        <div class="row">
	                            <div class="col-md-7 col-sm-12 text-xs-center text-md-left">
	                                <div class="row">
	                                    <div class="col-md-8">
	                                    	<p class="lead">Payment Status:
	                                            <u><strong id="payment_status">{{$data['status']}} </strong></u>
	                                        </p>
	                                       	@foreach ($SupplierDetail as $details)
	                                        <p class="lead" >Payment Method: 
	                                        	<u><strong id="payment_type">
	                                        		{{$data['payment_method']}}
	                                        	</strong></u>
	                                        </p>
	                                        @endforeach
	                                        <p class="lead mt-1"><br>Note: {{$data['invoice_note']}}</p>
	                                        <code></code>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-md-5 col-sm-12">
	                                <p class="lead">Total Due</p>
	                                <div class="table-responsive">
	                                    <table class="table">
	                                        <tbody>
		                                        <tr>
		                                            <td>Sub Total</td>
		                                            <td> 
		                                            	$ {{number_format($data['subtotal'],2)}} 
		                                            </td>
		                                        </tr>
		                                        <tr>
		                                            <td>TAX</td>
		                                            <td>$ {{$data['total_tax']}}</td>
		                                        </tr>
		                                        <tr>
		                                            <td>Shipping</td>
		                                            <td>$ {{$data['shipping']}}</td>
		                                        </tr>
		                                        <tr class="background-color">
		                                            <td class="font-weight-bold">Total Amount</td>
		                                            <td class="font-weight-bold"> $
		                                             {{number_format($data['total'],2)}}</td>
		                                        </tr>
		                                        <tr>
		                                            <td class="text-bold-800">Payment Made</td>
		                                            <td id="paymade" class="_right">$ (-) {{$data['payment_made']}} </td>
		                                        </tr>
		                                        <tr class="background-color">
		                                            <td class="font-weight-bold">Balance Due</td>
		                                            <td class="font-weight-bold"> 
		                                            	${{number_format($data['due_balance'])}}
		                                            </td>
		                                        </tr>
	                                        </tbody>
	                                    </table>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

	                    <!-- Invoice Footer -->
	                    <div id="invoice-footer">
	                    	<p class="lead">Debit Transactions:</p>
	                        <table class="table table-striped">
	                            <thead>
		                            <tr>
		                                <th>Date</th>
		                                <th>Method</th>
		                                <th>Debit</th>
		                                <th>Credit</th>
		                                <th>Note</th>
		                            </tr>
	                            </thead>
	                            <tbody id="activity">
	                            </tbody>
	                        </table>
	                        <div class="row">
	                            <div class="col-md-10 terms">
	                                <h6>Terms &amp; Condition</h6>
	                                <p> <strong>Payment On Receipt</strong><br>1. 10% discount if payment received within ten days otherwise payment 30 days after invoice date</p>
	                            </div>
	                        </div>
	                    </div>
	                    <!--/ Invoice Footer -->

	                    </div>
	                </div>
	            </section>
    		</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="{{ asset('/js/purchase/purchase.js') }}"></script>
@endsection