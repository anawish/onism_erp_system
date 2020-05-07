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
		.img-responsive{
			width: 200px;
			height: 100px;
		}
		.ml-2{
			font-size: 18px;font-family: sans-serif;	
		}
		._quote{
			margin-right: 20px;
		}
		._bills{
			margin-left: 30px;
		}
		.Amount{
			background-color: #bdb8b8;	
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
	                        <div class="col-lg-12" style="margin-left: 30px;margin-top: 15px;">
	                            <div class="title-action">
									<a href="edit?id=24" class="btn btn-warning btn-sm payment_paid">
									<i class="fa fa-pencil-square" aria-hidden="true"></i>	Edit Quote</a>
	                                <div class="btn-group">
	                                    <button type="button" class="btn btn-primary btn-sm">
	                                    	<i class="fa fa-envelope" aria-hidden="true"></i>
	                                    	Send                                   
	                           		 	</button>
	                                </div>
	                                <div class="btn-group">
	                                    <a href="{{route('quoteinvoice.edit',$data['id'])}}" class="btn btn-success btn-sm">
	                                    	<i class="fa fa-print" aria-hidden="true"></i> Print Quote
	                                    </a>
	                                </div>
	                                <a href="{{url('preview/quote',$data['id'])}}" class="btn btn-info btn-sm"><i class="fa fa-firefox" aria-hidden="true"></i> Public Preview </a>
	                                <a href="{{url('newinvoice')}}" class="btn btn-secondary btn-sm"> <i class="fa fa-exchange" aria-hidden="true"></i>  Go Invoice</a>
	                            </div>                        
	                        </div>
	                    </div>

	                    <!-- Invoice Company Details -->

	                    <div id="invoice-company-details" class="row mt-2">
	                        <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
	                        	<p></p>
	                           <img src="{{asset('logo/zlogo.png')}}" class="img-responsive">
								<p class="ml-2">Abc Company</p>
	                        </div>
	                        <div class="col-md-6 col-sm-12 text-xs-center text-md-right">
	                        	@foreach ($SupplierDetail as $details)
	                            <h2 class="_quote">Quote</h2>
	                            <p class="pb-1 _quote"> QI # {{ $details->invoice_no }}</p>
	                            <p class="pb-1 _quote">Reference: {{ $details->refer_no }}</p>
	                            @endforeach
	                            <ul class="px-0 list-unstyled _quote">
	                                <li>Gross Amount</li>
	                                <li class="lead text-bold-800">$ {{number_format($data['total'],2)}}</li>
	                            </ul>
	                        </div>
	                    </div>
	                    <!--/ Invoice Company Details -->

	                    <!-- Invoice Customer Details -->
	                    <div id="invoice-customer-details" class="row pt-2">
	                        <div class="col-sm-12 text-xs-center text-md-left">
	                            <p class="text-muted _bills">Bill From</p>
	                        </div>
	                        <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
	                        	@foreach ($SupplierDetail as $details)
	                            <ul class="px-0 list-unstyled _bills">
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
	                        <div class="offset-md-3 col-md-3 col-sm-12 text-xs-center text-md-left">
	                        	@foreach($SupplierDetail as $details)
	                            <p><span class="text-muted">Order Date :</span>  {{$details->invoicedate}} </p> 
	                            <p><span class="text-muted">Due Date :</span> {{$details->invoice_duedate}} </p> @endforeach
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
	                            			<td>$ {{$invoices['price']}}</td>
	                             			<td>  {{$invoices['qty']}}</td>
	                            			<td>$ {{$invoices['tax']}}</td>
	                            			<td>$ {{$invoices['discount']}}</td>
	                            			<td>$ {{number_format($invoices['total_amount'],2)}}</td>
	                        			</tr>
	                        			@endforeach
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-7 col-sm-12 text-xs-center text-md-left">
	                                <div class="row">
	                                    <div class="col-md-8">
	                                        <p class="lead mt-1"><br> Quote Note: {{$data['invoice_note']}}</p>
	                                        <p class="lead mt-1"><br> Quote Proposal: {{$data['proposal']}}</p>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-md-5 col-sm-12">
	                                <p class="lead">Total Dues</p>
	                                <div class="table-responsive">
	                                    <table class="table">
	                                        <tbody>
		                                        <tr>
		                                            <td>Sub Total</td>
		                                            <td class="text-xs-right"> $ {{number_format($data['sub_total'],2)}} </td>
		                                        </tr>
		                                        <tr>
		                                            <td>TAX</td>
		                                            <td class="text-xs-right">$ 
		                                            {{number_format($data['total_tax'],2)}}</td>
		                                        </tr>
		                                        <tr>
		                                            <td> Total Discount</td>
		                                            <td class="text-xs-right">$ {{number_format($data['total_discount'],2)}}</td>
		                                        </tr>
		                                        <tr>
		                                            <td> Shipping</td>
		                                            <td class="text-xs-right">$ {{number_format($data['shipping'],2)}}</td>
		                                        </tr>
		                                        <tr class="Amount" style="">
		                                            <td class="font-weight-bold">
		                                            	Total Amount
		                                            </td>
		                                            <td class="font-weight-bold text-xs-right"> $ {{number_format($data['total'],2)}}</td>
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