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
		}
		._heading{
			margin-left: 30px;margin-top: 15px;
		}
		._payment{
			width: 600px;
		}
		.pink{
			color: pink;
		}
		.light-gray{
			background-color: #dcdbdb;
		}
		.img-responsive{
			width: 200px;height: 100px;
			margin-left: 20px;
		}
		._ml-2{
			font-size: 18px;font-family: sans-serif;
			margin-left: 20px;
		}
		.invoice{
			margin-right: 35px;	
		}
		._pb-1{
			margin-right: 35px;
		}
		.px-1{
			margin-left: 30px;
		}
		#paymade{
			color: red;
		}
		#paydue{
			color: black !important;
		}
	</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="content-body">
	            <section class="card" style="border: none;">
	                <div id="invoice-template" class="card-block">
	                    <div class="row wrapper white-bg page-heading">
	                        <div class="col-lg-12 _heading">
	                            <div class="title-action">
	                            	@if($data['status'] !='Paid')
									<a href="{{$data['id']}}" class="btn btn-warning btn-sm payment_paid">
										<i class="fa fa-pencil-square" aria-hidden="true"></i> Edit Invoice</a>
									@endif
									@if($data['status']!= 'Paid')
	                                <a href="{{$data['id']}}" data-toggle="modal" id="mpayment" data-target="#part_payment" class="btn btn-success btn-sm payment_paid">
	                                	<i class="fa fa-money" aria-hidden="true"></i> Make Payment</a>
	                                @endif	
	                                <!-----Payment Model---->
	                                <div class="modal fade" id="part_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										    <div class="modal-content _payment">
										      	<div class="modal-header">
										        	<h5 class="modal-title" id="exampleModalLabel">Payment Confirmation</h5>
										        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          	<span aria-hidden="true">&times;</span>
										        	</button>
										      	</div>
											    <div class="modal-body">
											        <div class="row">
													    <div class="input-group col-sm-6">
													        <div class="input-group-prepend">
													        	<input type="hidden" name="id" id="id" value="{{$data['id']}}">
													          <div class="input-group-text input-group-text-sm">$</div>
													        </div>
													        <input type="text" class="form-control" id="payment" name="payment" value="{{$data['due_balance']}}">
													    </div>
													    <div class="input-group col-sm-6">
													        <div class="input-group-prepend" id="pdate">
													          <div class="input-group-text input-group-text-sm"><i class="fa fa-calendar" aria-hidden="true"></i>
													          </div>
													        </div>
													        <input type="text" class="form-control" id="updated_date" name="updated_date">
													    </div>
													</div>
													<div class="row">
														<div class="col-sm-12">
															<label>Payment Method</label>
    														<select class="form-control form-control-sm" id="pmethod" name="pmethod">
    														@foreach($paymet_method as $payments)
    															<option value="{{$payments->id}}">{{$payments->name}}</option>
    														@endforeach
    														</select>
    														<div id="type">
    															<input type="hidden" name="type" class="type_val" value="CR">
    														</div>
														</div>
													</div>
												<!-- 	<div class="row">
														<div class="col-sm-12">
															<label>Account</label>
    														<select class="form-control form-control-sm" required id="account_type" name="account_type">
    															<option></option>
    														@foreach($account as $accounts)
    															<option value="{{$accounts->id}}">{{$accounts->gl_no}} {{$accounts->name}}</option>
    														@endforeach
    														</select>
														</div>
													</div> -->
													<div class="row">
														<div class="col-sm-12">
															<label>Note</label>
    														<input type="text" name="invoice_no" class="form-control-sm form-control" readonly id="invoice_no" 
    														value=" {{$data['invoice_no']}}">
														</div>
													</div>
													<div class="row">
														<div class="col-sm-12">
															<label>Payment Note</label>
    														<input type="text" name="payment_note" class="form-control-sm form-control" id="payment_note">
														</div>
													</div>
											    </div>
										      	<div class="modal-footer">
										        	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
										        	<button class="btn btn-info btn-sm" id="make_payment">Make Payment</button>
										      	</div>
										    </div>
										</div>
									</div>
	                                <!-----Ending Model ---->
	                                
	                                <div class="btn-group">
	                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o" aria-hidden="true"></i>     
	                                    	Send                                   
	                           		 	</button>
	                                    <div class="dropdown-menu">
	                                    	<a href="#sendEmail" data-toggle="modal" data-remote="false" class="dropdown-item sendbill" data-type="purchase">Purchase Request</a>
	                                    </div>
	                                </div>
	                               
	                                <div class="btn-group">
	                                    <a href="{{route('printinvoice.show',$data['id'])}}" class="btn btn-success btn-sm btn-min-width"><i class="fa fa-print" aria-hidden="true"></i> Print Order</a>
	                                </div>
	                                
	                                <a href="{{route('printinvoice.edit',$data['id'])}}" class="btn btn-primary btn-sm"><i class="fa fa-firefox"></i> Preview </a>

	                              	<a href="" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#shipping_add"><i class="fa fa-home"></i> Add Shipping </a>
	                              	 @include('layouts.partials-modal.invocie_shipping')

	                                @if($data['status']!=0)
	                                <a href="" data-toggle="modal" data-target="#Change_status" class="btn btn-info btn-sm payment_paid" title="Change Status"><i class="fa fa-exchange" aria-hidden="true"></i> Change Status</a>
	                                @endif

	                                <!-----Change Status Model---->

	                                <div class="modal fade" id="Change_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										    <div class="modal-content _payment">
										      	<div class="modal-header">
										        	<h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
										        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          	<span aria-hidden="true">&times;</span>
										        	</button>
										      	</div>
											    <div class="modal-body">
													<div class="row">
														<div class="col-sm-12">
															<label>Payment Method</label>
    														<select class="form-control form-control-sm">
    														@foreach($paymet_method as $paymet_methods)
    															<option value="{{$paymet_methods->id}}">{{$paymet_methods->value}}</option>
    														@endforeach
    														</select>
														</div>
													</div>
											    </div>
										      	<div class="modal-footer">
										        	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
										        	<button type="button" class="btn btn-info btn-sm">Chnage Status</button>
										      	</div>
										    </div>
										</div>
									</div>
	                                <!-----End Model-------------->
	                            </div>                        
	                        </div>
	                    </div>
	                    <!-- Invoice Company Details -->
	                    <div id="invoice-company-details" class="row mt-2">
	                        <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
	                        	<p></p>
	                           <img src="{{asset('logo/zlogo.png')}}" class="img-responsive">
								<p class="_ml-2">Abc Company</p>
	                        </div>
	                        <div class="col-md-6 col-sm-12 text-xs-center text-md-right">
	                        	@foreach ($SupplierDetail as $details)
	                            <h2 class="invoice">INOVICE</h2>
	                            <p class="_pb-1"> Invoice No # SI-{{ $details->invoice_no }}</p>
	                            <p class="_pb-1">Reference: {{ $details->refer_no }}</p>
	                            @endforeach
	                            <ul class="px-0 list-unstyled _pb-1">
	                                <li>Gross Amount</li>
	                                <li class="lead text-bold-800">$ {{number_format($data['grand_total'],2)}}</li>
	                            </ul>
	                        </div>
	                    </div>
	                    <!--/ Invoice Company Details -->

	                    <!-- Invoice Customer Details -->
	                    <div id="invoice-customer-details" class="row pt-2">
	                        <div class="col-md-4 text-xs-center text-md-left">
	                           	<p class="text-muted px-1">Bill From</p>
		                        <input type="hidden" name="client_id" value="{{$data->csid}}" id="client_id">
	                        	@foreach ($SupplierDetail as $details)
	                            <ul class="px-1 list-unstyled">
	                                <li class="text-bold-800">
	                                	<a href="">
	                                		<strong class="invoice_a"> {{ $details->name }}</strong>
	                                	</a>
	                                </li>
	                                <li>{{ $details->address }}</li>
	                                <li>{{ $details->city }},{{ $details->country }}</li>
	                                <li>Phone: {{ $details->phone }}</li>
	                                <li>Email: {{ $details->email }} </li>
	                            </ul>
	                            @endforeach
	                        </div>
	                      
	                        <div class="col-md-4">
	                        	<p class="text-muted px-1">Shipping Details</p>
	                            <div class="col-md-4text-xs-center text-md-left">
		                        	<input type="hidden" name="client_id" value="{{$data->csid}}" id="client_id">
		                        	@foreach ($SupplierDetail as $details)
		                            <ul class="px-1 list-unstyled">
		                                <li class="text-bold-800">
		                                	<a href="">
		                                		<strong class="invoice_a"> {{ $details->name_s }}</strong>
		                                	</a>
		                                </li>
		                                <li>{{ $details->address_s }}</li>
		                                <li>{{ $details->city_s }},{{ $details->country_s }}</li>
		                                <li>Phone: {{ $details->phone_s }}</li>
		                                <li>Email: {{ $details->email_s }} </li>
		                            </ul>
		                            @endforeach
	                        	</div>
	                        </div>
	                        <div class="col-md-4 text-xs-center text-md-left" style="margin-top: 50px;">
	                        	@foreach($SupplierDetail as $details)
	                            <p><span class="text-muted">Order Date :</span>  {{$details->invoicedate}} </p> 
	                            <p><span class="text-muted">Due Date :</span> {{$details->invoice_duedate}} </p> @endforeach
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
		                                        <th>#</th>
		                                        <th>Product</th>
		                                        <th class="text-xs-left">Rate</th>
		                                        <th class="text-xs-left">Qty</th>
		                                        <th class="text-xs-left">Tax</th>
		                                        <th class="text-xs-left"> Discount</th>
		                                        <th class="text-xs-left">Amount</th>
	                                    	</tr>
	                                    </thead>
	                                    <tbody>
	                                @foreach($invoice as $invoices)
	                                    <tr class="autonumber">
	                                    	<td></td>
	                                    	<td>{{$invoices['product_name']}}</td>
	                            			<td>{{number_format($invoices['price'],2)}}</td>
	                             			<td> {{$invoices['qty']}}</td>
	                            			<td>$ {{$invoices['tax']}}</td>
	                            			<td>$ {{$invoices['discount']}}</td>
	                            			<td>$ {{number_format($invoices['total_amount'],2)}}</td>
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
	                                           <u><strong id="pstatus">{{$data['status']}}</strong></u>
	                                        </p>
	                                        <p class="lead">Payment Method:<u><strong id="pmethod_type">{{$data['pmethod']}}</strong></u>
	                                        </p>
	                                        
	                                        <p class="lead mt-1"><br>Note:{{$data['invoice_note']}}</p>
	                                        <code></code>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-md-5 col-sm-12">
	                                <div class="table-responsive">
	                                    <table class="table">
	                                        <tbody>
		                                        <tr>
		                                            <td>Sub Total</td>
		                                            <td class="text-xs-right"> 
		                                            	$ {{number_format($data['sub_total'],2)}}
		                                            </td>
		                                        </tr>
		                                        <tr>
		                                            <td>TAX</td>
		                                            <td class="text-xs-right">$ {{number_format($data['total_tax'],2)}}</td>
		                                        </tr>
		                                        <tr>
		                                            <td> Shipping</td>
		                                            <td class="text-xs-right">$ {{$data['shipping']}}</td>
		                                        </tr>
		                                        <tr class="light-gray">
		                                            <td class="font-weight-bold">
		                                            Total Amount</td>
		                                            <td class="font-weight-bold text-xs-right"> ${{number_format($data['grand_total'],2)}}</td>
		                                        </tr>
		                                        <tr>
		                                           <td class="font-weight-normal">Payment Made</td>
					                                <td>
					                                     <span id="paymade"> (-) {{$data['payment']}}</span>
					                                </td>
		                                        </tr>
		                                        <tr class="light-gray">
		                                            <td class="font-weight-bold">Balance Due</td>
		                                            <td class=" text-xs-right">  
		                                            	<span id="paydue" class="font-weight-bold">$ {{$data['due_balance']}}</span>
		                                            </td>
		                                        </tr>
	                                        </tbody>
	                                    </table>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    </div>
	                </div>
	            </section>
    		</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/SaleInovice/invoice.js')}}"></script>
@endsection