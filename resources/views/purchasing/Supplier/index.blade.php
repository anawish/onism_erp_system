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
						<h3>Client</h3>
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
			                <th>#</th>
			                <th style="width: 20%">Name</th>
			                <th style="width: 15%">Address</th>
			                <th style="width: 15%">Email</th>
			                <th style="width: 15%">Phone</th>
			                <th>Settings</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($data as $datas)
			        	<tr class="autonumber">
			        		<td></td>
			        		<td>{{$datas->name}}</td>
			        		<td>{{$datas->address}}</td>
			        		<td>{{$datas->email}}</td>
			        		<td>{{$datas->phone}}</td>
			        		<td>
			                	<a href="{{route('suppliers.show',$datas->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>

			                	<a href="{{route('suppliers.edit',$datas->id)}}">
			                		<button class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
			                	</a>
			                	<a href="delete/suppliers/{{$datas->id}}" class="btn btn-danger btn-sm delete-object" onclick="return confirm('Are you sure you want to remove this data?')"><i class="fa fa-trash"></i></a>
			                </td>
			        	</tr>
			        	@endforeach
			        </tbody>
			        <tfoot>
					    <tr>
			                <th>#</th>
			                <th>Name</th>
			                <th>Address</th>
			                <th>Email</th>
			                <th>Phone</th>
			                <th>Settings</th>
					    </tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@endsection