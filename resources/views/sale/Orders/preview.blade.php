<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="icon" href="{{asset('logo/zlogo.png')}}" type="image/gif">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
	<style type="text/css">
	.mt-20{
		margin-top:20 
	}
	._from{
		margin-left: 45px;
	}
	.mr-25{
		margin-right: 25px;
	}
	._font-w-600{
		font-weight: 600;
	}
	.ml-35{
		margin-left: 35px;
	}
	.ml-20{
		margin-left: 20px;
	}
	table {
    	counter-reset: tableCount;     
	}
	.counterCell:before {              
    	content: counter(tableCount); 
    	counter-increment: tableCount; 
	}
	.print_btn{
		margin-right: 26px;
	    margin-top: 20px;
	    padding: 5px 34px;
	}
	._back_btn{
		margin-top: 10px;
	    margin-left: 25px;
	    padding: 5px 36px;
	}
	#paymade{
		color: black;
	}
	#paydue{
		color: black;
	}
</style>
</head>
<body style="background-color: #f7f3f3!important;">
	<div class="container mt-20" style="width: 75%;">
	<div class="card border-0">
		<div class="row">
			<div class="col-md-6">
				<a href="{{url()->previous()}}" class="btn btn-primary btn-sm _back_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> GO Back</a>
			</div>
			<div class="col-md-6">
				<a href="{{route('order.edit',$data['id'])}}" class="btn btn-info btn-sm float-right print_btn">
					<i class="fa fa-print" aria-hidden="true"></i>  Print Sale Order</a>
			</div>
		</div>
		<hr>
		<!-- Invoice Company Details -->
		<div class="row">
			<div class="col-md-6">
				<img src="{{asset('logo/zlogo.png')}}">
				<br>
				<span class="_from">From</span>
				<ul class="px-0 list-unstyled _from">
                    <li class="font-weight-bold">ABC Company</li>
                    <li>412 Example South Street,</li>
                    <li>Los Angeles,</li>
                    <li>FL,USA -  123</li>
                    <li>Phone : 410-987-89-60</li>
                    <li>Email : support@ascendar.com</li>
                </ul>
			</div>
			<div class="col-md-6 float-right">
				<h2 class="float-right mr-25">Sale Order </h2>
				<br><br>
				<p class="float-right mr-25"> SO NO # {{$data['order_no']}}</p>
				<br><br>
				<p class="float-right mr-25">PO NO: # {{$data['po_no']}}</p>
				<br><br>
				<ul class="px-0 list-unstyled float-right">
                    <li class="mr-25 font-weight-bold">Gross Amount</li>
                    <li class="mr-25 _font-w-600">$ {{number_format($data['total'],2)}}</li>
                </ul>
			</div>
		</div>
		<!--/ Invoice Company Details -->

		<!-- Invoice Customer Details -->
		<div id="invoice-customer-details ">
            <div class="row pt-2">
                <div class="col-md-4 col-sm-12 text-xs-center text-md-left">
                    <p class="text-muted ml-35"> Bill To</p>
                    <ul class="px-0 list-unstyled">
                    	@foreach($SupplierDetail as $SupplierDetails)
                        <li class="text-bold-800">
                        	<strong class="invoice_a ml-35">{{$SupplierDetails->name}}</strong>
                        </li>
                        <li class="ml-35">{{$SupplierDetails->address}}</li>
                        <li class="ml-35">{{$SupplierDetails->city}}, {{$SupplierDetails->country}}</li>
                        <li class="ml-35">{{$SupplierDetails->country}}, {{$SupplierDetails->region}}</li>
                        <li class="ml-35">Phone : {{$SupplierDetails->phone}}</li>
                        <li class="ml-35">Email : {{$SupplierDetails->email}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-5 col-sm-12 text-xs-center text-md-left"></div>
                <div class="col-md-3 col-sm-12 text-xs-center text-md-left">
                    <p><span class="text-muted">Order Date :</span> {{$data['order_date']}}</p> 
                    <p><span class="text-muted">Delivery Date :</span> {{$data['delivery_date']}}</p>  
                </div>
            </div>
        </div>
		<!-- /Invoice Customer Details -->

		<!-- Invoice Items Details -->
		<div id="invoice-items-details" class="pt-2">
            <div class="row">
                <div class="table-responsive col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
	                            <th>#</th>
	                            <th>Product</th>
	                            <th class="text-xs-left">Qty</th>
	                            <th class="text-xs-left">Rate</th>
	                            <th class="text-xs-left">Code</th>
	                            <td>Unit</td>
	                            <th class="text-xs-left">Amount</th>
                        	</tr>
                        </thead>
                        <tbody>
                        	@foreach($invoice as $invoices)
	                        <tr>
								<th class="counterCell"></th>
				                <td>{{$invoices->product_name}}</td>
				                <td>{{$invoices->qty}}</td>
				                <td>{{$invoices->price}}</td>
				                 <td>{{$invoices->code}}</td>
				                 <td>{{$invoices->unit}}</td>
				                <td>{{$invoices->amount}}</td>
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
                            <p class="lead mt-1 ml-20"><br>
                             Sale Oder Note: {{$data['order_note']}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <p class="lead">Summary</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
	                            <tr>
	                                <td>Sub Total</td>
	                                <td class="text-xs-right"> $ {{number_format($data['sub_total'],2)}}</td>
	                            </tr>
	                            <tr>
	                                <td> Shipping</td>
	                                <td class="text-xs-right">$ {{number_format($data['shipping'],2)}}</td>
	                            </tr>
	                            <tr style="background-color: lightgray">
	                                <td class="text-bold-800"><strong> Total</strong></td>
	                                <td class="text-bold-800 text-xs-right">
	                                	<strong>
	                                		$  {{number_format($data['total'],2)}}
	                                	</strong>
	                                </td>
	                            </tr>
                            </tbody>
                        </table>
                    </div>
                   <!--  <div class="text-xs-left text-bold-800">
                        <p>Positive balance is receivable, negative balance is payable.</p>
                    </div>
                    <div class="text-xs-center">
                        <p>Authorized person</p>
                        <img src="http://erp.onismpro.com/userfiles/employee_sign/sign.png" alt="signature" class="height-100">
                        <h6>(BusinessOwner)</h6>
                        <p class="text-muted"></p>                                
                    </div> -->
                </div>
            </div>
        </div>
		<!-- /Invoice Items Details -->

	</div>
</div>
</body>
</html>