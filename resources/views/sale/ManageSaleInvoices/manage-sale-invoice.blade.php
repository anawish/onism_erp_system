@extends('layouts.app')
@section('style')
<style type="text/css">
	table {
    counter-reset: rowNumber;
	}

	table .autonumber{
	    counter-increment: rowNumber;
	}

	table .autonumber td:first-child::before {
	    content: counter(rowNumber);
	}
	thead{
		background-color: #29bb9c;
	}
	.rounded-circle{
		padding: 4px 15px;
	}
	.alert_bell{
		color: #e0332e;
    	font-size: 20px;
	}
</style>
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			
			<div class="col-md-9">
				<div class="row mt-10">
					<div class="col-md-12">
						<h3>Invoices <a href="{{url('/newinvoice')}}"><button type="button" class="btn btn-primary rounded-pill">Add New</button> </a>
						</h3>
						@if(session()->has('message'))
						    <div class="alert alert-success">
						        {{ session()->get('message') }}
						    </div>
						@endif
					</div>
				</div>
				<hr>
				
				<table id="MasterTable" class="table table-striped table-bordered">
			        <thead class="sale_invoice">
			            <tr>
			                <th>No</th>
			                <th>Invoice No</th>
			                <th>Customer</th>
			                <th>Date</th>
			                <th>Amount</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($data as $datas)
			            <tr class="autonumber">
			                <td></td>
			                <td>{{$datas->invoice_no}}</td>
			                <td>{{$datas->name}}</td>
			                <td>{{$datas->invoicedate}}</td>
			                <td>$ {{$datas->grand_total}}</td>
			                <td>
			                	@if($datas->status == 'Paid')
			                	<button class="btn btn-success btn-sm rounded-circle">{{$datas->status}}</button></td>
			                	@endif
			                	@if($datas->status == 'Partial')
			                	<button class="btn btn btn-warning btn-sm rounded-circle" style="padding: 4px 10px !important">{{$datas->status}}</button></td>
			                	@endif
			                	@if($datas->status == 'Due')
			                	<button class="btn btn-info btn-sm rounded-circle">{{$datas->status}}</button></td>
			                	@endif

			                <td>
			                	<a href="{{url('/createinvoice',$datas->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> View</a>

			                	<a href="pdf/{{$datas->id}}" title="Download" class="btn btn-info btn-sm">
			                		<i class="fa fa-download"></i>
			                	</a>
			                	@if($date == $datas->invoice_duedate && $datas->status !='Paid' || $datas->status == 'Due')
			                		<i class="fa fa-bell alert_bell"></i>
			                	@endif
			                </td>
			            </tr>
			            @endforeach
			           
			        </tbody>
			        <tfoot>
					    <tr>
					      <th>No</th>
			                <th>#</th>
			                <th>Customer</th>
			                <th>Date</th>
			                <th>Amount</th>
			                <th>Status</th>
			                <th>Action</th>
					    </tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

@endsection