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
			        <div id="notify" class="alert alert-success" style="display:none;">
			            <a href="#" class="close" data-dismiss="alert">×</a>
			            <div class="message"></div>
			        </div>
			        <div class="grid_3 grid_4 animated fadeInRight">
			            <h4 class="mt-20" style="font-weight: 600;">Product Detail </h4>
			        </div>
        			<hr>
        				@if(Session::has('success'))
						    <div class="alert alert-success">
						        {{Session::get('success')}}
						    </div>
						@endif
        			
					<table id="MasterTable" class="table table-striped table-bordered css-serial">
				        <thead style="background-color: #29bb9c;">
				            <tr>
				                <th>No</th>
				                <th>Name</th>
				                <th>Quantity</th>
				                <th>Code</th>
				                <th>Category</th>
				                <th>Price</th>
				                
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($data as $row)
				            <tr>
				                <td></td>
				                <td>{{$row->product_name}}</td>
				                <td>{{number_format($row->closing,2)}}</td>
				                <td>{{$row->product_code}}</td>
				                <td>{{$row->category_name}}</td>
				                <td>$ {{$row->retail_price}}</td>
				               	<!-- <td>
				               		<a href="{{route('productdetail.edit',$row->id)}}" onclick="return confirm('Are you sure you want to Delete?')" data-object-id="3" class="btn btn-danger btn-xs  delete-object"><span class="icon-bin"></span> Delete</a>
				               	</td> -->

				            </tr>
				            @endforeach
				        </tfoot>
					</table>
    			</div>
			</div>
		</div>
	</div>
@endsection