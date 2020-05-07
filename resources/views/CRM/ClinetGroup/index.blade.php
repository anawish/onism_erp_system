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
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="row mt-10">
				<div class="col-md-12">
					<h4 class="title">Client Group <a href="{{url('/clientgroup/create')}}" class="btn btn-success btn-sm">Add new</a></h4>
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
		                <th>Total Clients</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($data as $datas)
		        	<tr class="autonumber">
		        		<td></td>
		        		<td>{{$datas->title}}</td>
		        		<td>{{$datas->Totalclient}}</td>
		        		<td>
		        			<a href="{{route('clientgroup.show',$datas->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>
			                <a href="{{route('clientgroup.edit',$datas->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit
			                </a>
			               <!--  <a href="groupdel/{{$datas->id}}" class="btn btn-danger btn-sm delete-object" onclick="return confirm('Are you sure you want to remove this data?')"><i class="fa fa-trash"></i>
			                </a> -->
		        		</td>
		        	</tr>
		        	@endforeach
		        </tbody>
		        <tfoot>
				    <tr>
		                <th>No</th>
		                <th>Name</th>
		                <th>Total Clients</th>
		                <th>Action</th>
				    </tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection