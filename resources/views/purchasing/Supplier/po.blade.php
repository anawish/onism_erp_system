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
	.title{
		font-weight: 700px;
		font-family: serif;
	}
	.card_title{
		margin-left: 27px;
		font-weight: bold;
		font-family: serif;
	}
	strong{
		font-family: serif;
		font-size: 18px;
	}
	span{
		color: #9c9ea0;
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
					<h4 class="title">Orders</h4>
					@if (session('status'))
				        <div class="alert alert-success">
				        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
				        </div>
				    @endif
				</div>
			</div>
			<hr>
			<div class="card card-block">
                <h4 class="card_title">Customer</h4>
                <hr>
                @foreach($clientDetail as $details)
                <div class="row m-t-lg">
                    <div class="col-md-2 text-center">
                        <strong>Name</strong>
                    </div>
                    <div class="col-md-10">
                        <span>{{ucfirst($details->name)}}</span>                    
                    </div>
                </div>
                <div class="row m-t-lg ">
                    <div class="col-md-2 text-center">
                        <strong>Email</strong>
                    </div>
                    <div class="col-md-10">
                        <span>{{$details->email}}</span>                  
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
			<table id="MasterTable" class="table table-striped table-bordered">
		        <thead class="sale_invoice">
		            <tr>
		                <th>No</th>
		                <th>Order#</th>
		                <th>Supplier</th>
		                <th>Date</th>
		                <th>Total</th>
		                <th>Status</th>
		                <th>Settings</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($data as $datas)
		            <tr class="autonumber">
		                <td></td>
		                <td>{{$datas->invoice_no}}</td>
		                <td>{{$client}}</td>
		                <td>{{$datas->order_date}}</td>
		                <td>$ {{number_format($datas->total,2)}}</td>
		                <td>{{$datas->status}}</td>
		                <td>
		                	<a href="{{url('/getinvoice',$datas->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>
		                	<a href="{{url('/supplier/pdf',$datas->id)}}" class="btn btn-secondary btn-sm">
		                		<i class="fa fa-download" aria-hidden="true"></i>
		                	</a>
		                	
		                	<a href="{{url('/invociedelete',$datas->id)}}" class="btn btn-danger btn-sm delete-object" onclick="return confirm('Are you sure you want to remove this data?')"><i class="fa fa-trash"></i></a>
		                </td>
		            </tr>
		            @endforeach
		           
		        </tbody>
		        <tfoot>
				    <tr>
		                <th>No</th>
		                <th>Order#</th>
		                <th>Supplier</th>
		                <th>Date</th>
		                <th>Total</th>
		                <th>Status</th>
		                <th>Settings</th>
				    </tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection