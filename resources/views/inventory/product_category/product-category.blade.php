
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
	.mt-20{
		font-weight: 700;
		font-family: sans-serif;
	}
</style>
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<div class="card card-block border-0">
			        <div id="notify" class="alert alert-success" style="display:none;">
			            <a href="#" class="close" data-dismiss="alert">×</a>
			            <div class="message"></div>
			        </div>
			        <div class="grid_3 grid_4 animated fadeInRight">
			            <h6 class="mt-20">Product Category 
			         		<a href="{{url('/addprocategory')}}" class="btn btn-primary btn-sm rounded">Add New Category</a>
			            </h6>
			        </div>
        			<hr>
        				@if(Session::has('success'))
						    <div class="alert alert-success">
						        {{Session::get('success')}}
						    </div>
						@endif
        			
					<table id="MasterTable" class="table table-striped table-bordered">
				        <thead style="background-color: #29bb9c;">
				            <tr>
				                <th>No</th>
				                <th>Name</th>
				                <th>Total Product</th>
				                <th>Available Stock</th>
				                <th>Action</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($data as $row)
				            <tr class="autonumber">
				                <td></td>
				                <td>{{$row->category_name}}</td>
				                <td>{{$row->Products}}</td>
				                <td>{{number_format($row->avaliable,2)}}</td>
				               	<td>
				               		<a href="{{route('productcategory.edit',$row->id)}}" class="btn btn-primary btn-xs">
				               			<span class="icon-pencil"></span> Edit</a> 
				               		<a href="{{route('productdetail.show',$row->id)}}" class="btn btn-warning btn-xs">
				               			<span class="icon-pencil"></span> View</a> 
				               		<!--   <a href="delete/{{$row->id}}" onclick="return confirm('Are you sure you want to Delete?')" data-object-id="3" class="btn btn-danger btn-xs  delete-object"><span class="icon-bin"></span> Delete</a> -->
				               	</td>

				            </tr>
				            @endforeach
				           
				        </tfoot>
					</table>
    			</div>
			</div>
		</div>
	</div>
@endsection