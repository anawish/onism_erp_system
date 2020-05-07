@extends('layouts.app')
@section('style')
<style type="text/css">
	.css-serial {
  counter-reset: serial-number;
}

.css-serial td:first-child:before {
  counter-increment: serial-number;
  content: counter(serial-number);
}
</style>
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<div class="card card-block border-0">
			        <div class="grid_3 grid_4 animated fadeInRight">
			            <h6 class="mt-20" style="font-weight: 600;">Warehouses 
			         		<a href="{{url('/createwarehouse')}}" class="btn btn-primary btn-sm rounded">Add New Warehouse</a>
			            </h6>
			        </div>
			       
        			<hr>
        			@if(session()->has('message'))
					    <div class="alert alert-success">
					        {{ session()->get('message') }}
					    </div>
					@endif
        			
					<table id="MasterTable" class="table table-striped table-bordered css-serial">
				        <thead style="background-color: #29bb9c;">

				            <tr>
				                <th>No</th>
				                <th>Name</th>
				                <th>Total Product</th>
				                <th>Stock Quantity</th>
				              <!--   <th>Worth(Sale Stock)</th> -->
				                <th>Action</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($data as $row)
				            <tr>
				                <td></td>
				                <td>{{$row->warehouse_name}}</td>
				                <td>{{$row->Products}}</td>
				               	<td>{{number_format($row->total_receiveqty,2)}}</td>
				               <!--  <td>$ {{number_format($row->stock_worth,2)}}</td> -->
				               	<td>
				               		<a href="{{ route('warehouse.edit',$row->id) }}"class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit</a> 
				               		<a href="{{ route('warehouse.show',$row->id) }}"class="btn btn-warning btn-sm"> <i class="fa fa-eye"></i> View</a> 
				               		<!-- <a href="del/{{$row->id}}" onclick="return confirm('Are you sure you want to Delete?')" data-object-id="3" class="btn btn-danger btn-xs  delete-object"> Delete
				               		</a> -->
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

@section('script')

@endsection