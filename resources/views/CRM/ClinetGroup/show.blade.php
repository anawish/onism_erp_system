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
	.btn-success{
		background-color: #967adc !important;
		border: none;
	}
	img{
		width: 70px;
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
					<h4 class="title">Client Group- Default Group</h4>
					@if (session('status'))
				        <div class="alert alert-success">
				        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
				        </div>
				    @endif
				</div>
			</div>
			<hr>
			<table id="MasterTable" class="table table-striped table-bordered">
		        <thead class="sale_invoice">
		            <tr>
		                <th>No</th>
		                <th>Name</th>
		                <th>Address</th>
		                <th>Email</th>
		                <th>Phone</th>
		                <th>Settings</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($data as $datas)
		        	<tr class="autonumber">
		        		<td></td>
		        		<td>
		        			<img src="{{asset('image/default-image.png')}}"> 
			                <span style="color: #29bb9c;">{{$datas->name}}</span>
		        		</td>
		        		<td>{{$datas->address}}</td>
		        		<td>{{$datas->email}}</td>
		        		<td>{{$datas->phone}}</td>
		        		<td>
		        			
			                <a href="{{route('client.edit',$datas->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit
			                </a>
			                <a href="clientdel/{{$datas->id}}" class="btn btn-danger btn-sm delete-object" onclick="return confirm('Are you sure you want to remove this data?')"><i class="fa fa-trash"></i>
			                </a>
		        		</td>
		        	</tr>
		        	@endforeach
		        </tbody>
		        <tfoot>
				    <tr>
		                <th>No</th>
		                <th>Name</th>
		                <th>Address</th>
		                <th>Email</th>
		                <th>Phone</th>
		                <th>Action</th>
				    </tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection