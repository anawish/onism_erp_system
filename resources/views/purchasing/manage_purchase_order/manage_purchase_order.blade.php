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
</style>
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')

			<div class="col-md-9">
				<div class="row mt-10">
					<div class="col-md-12">
						<h4>Purchase Orders</h4>
						@if(session()->has('message'))
						    <div class="alert alert-success">
						        {{ session()->get('message') }}
						    </div>
						@endif
					</div>
				</div>
				<hr>
				
				<table id="MasterTable" class="table table-striped table-bordered">
			        <thead style="background-color: #29bb9c;">
			            <tr>
			                <th>No</th>
			                <th>Order #</th>
			                <th>Supplier</th>
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
			                <td>{{$datas->order_date}}</td>
			                <td>$ {{$datas->total}}</td>
			                <td>
			                	@if($datas->status == 'Paid')
			                	<button class="btn btn-success btn-sm rounded-circle" style="padding: 4px 15px">{{$datas->status}}</button></td>
			                	@endif
			                	@if($datas->status == 'Partial')
			                	<button class="btn btn-warning btn-sm rounded-circle" style="padding: 4px 10px">{{$datas->status}}</button></td>
			                	@endif
			                	@if($datas->status == 'Due')
			                	<button class="btn btn-danger btn-sm rounded-circle" style="padding: 4px 15px">{{$datas->status}}</button></td>
			                	@endif
			                <td>
			                	<a href="{{url('/getinvoice',$datas->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>

			                	<a href="purchasepdf/{{$datas->id}}">
			                		<button class="btn btn-primary btn-sm"><i class="fa fa-download"></i></button>
			                	</a>
<!-- 
			                	<a href="purchasedel/{{$datas->id}}">
			                		<button class="btn btn-danger btn-xs" >Delete</button>
			                	</a> -->
			                </td>
			            </tr>
			            @endforeach
			        </tfoot>
				</table>
			</div>
			
		</div>
	</div>
@endsection