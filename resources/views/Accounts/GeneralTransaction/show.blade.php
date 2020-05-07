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
									<a href="{{route('generaltransaction.show',$data->id)}}" class="btn btn-success btn-sm payment_paid">
										<i class="fa fa-print" aria-hidden="true"></i> Print Voucher</a>
	                            </div>                        
	                        </div>
	                    </div>
	                    <!-- Invoice Company Details -->
	                    <div class="row mt-2">
	                        <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
	                        	<p></p>
	                           <img src="{{asset('logo/zlogo.png')}}" class="img-responsive">
								<p class="_ml-2">Abc Company</p>
								<p class="_ml-2">412 Example South Street,Lahore</p>
	                        </div>
	                        <div class="col-md-6 col-sm-12 text-xs-center text-md-right">
	                            <h2 class="invoice"> VOUCHER </h2>
	                            <p class="_pb-1"><span style="font-size: 18px;font-weight: 600;color: #1f1c1c">Voucher No #</span> {{$data->transaction_type}}-{{$data->doc_no}}</p>
	                        </div>
	                    </div>
	                    <!--/ Invoice Company Details -->

	                    <!-- Invoice Customer Details -->
	                    <div class="row pt-2">
	                        <div class="col-md-2"></div>
	                        <div class="col-md-8 text-xs-center text-md-left" style="margin-top: 50px;">
	                        	<div class="row">
	                        		<div class="col-md-3">
	                        			<label style="font-weight: 700">DOC. Date</label>
	                        		</div>
	                        		<div class="col-md-3">
	                        			<span class="text-muted">{{$data->doc_date}}</span> 
	                        		</div>
	                        		<div class="col-md-3">
	                        			<label style="font-weight: 700">Posting Date</label>
	                        		</div>
	                        		<div class="col-md-3">
	                        			<span class="text-muted">{{$data->posting_date}}</span> 
	                        		</div>
	                        	</div>
	                        </div>
	                    </div>
	                    
	                    <!--/ Invoice Customer Details -->

	                    <!-- Invoice Items Details -->
	                    <div class="pt-2">
	                        <div class="row">
	                            <div class="table-responsive col-sm-12">
	                                <table class="table table-striped">
	                                    <thead>
	                                        <tr>
		                                        <th>#</th>
		                                        <th>Gl No#</th>
		                                        <th>Name</th>
		                                        <th>Description</th>
		                                        <th>Debit</th>
		                                        <th>Credit</th>
	                                    	</tr>
	                                    </thead>
	                                    <tbody>
	                                    	@foreach($Trans_Detail as $Trans_Details)
		                                    <tr class="autonumber">
		                                    	<td></td>
		                                    	<td>{{$Trans_Details->gl_no}}</td>
		                            			<td>{{$Trans_Details->name}}</td>
		                             			<td>{{$Trans_Details->description}}</td>
		                            			<td>{{$Trans_Details->debit}}</td>
		                            			<td>{{$Trans_Details->credit}}</td>
		                        			</tr>
		                        			@endforeach
	                                    </tbody>
	                                    <tfoot>
	                                    	<tr>
	                                    		<td></td>
	                                    		<td></td>
	                                    		<td></td>
	                                    		<td><label style="font-family: sans-serif;font-weight: 700">Net Total</label></td>
	                                    		<td>{{number_format($data->total_debit,2)}}</td>
	                                    		<td>{{number_format($data->total_credit,2)}}</td>
	                                    	</tr>
	                                    </tfoot>
	                                </table>
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