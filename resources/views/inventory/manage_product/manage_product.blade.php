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
		font-weight: 600;
	}
	._border{
		box-shadow: 0px 2px 1px rgba(0, 0, 0, 0.05);border-radius: 0;
	}
	thead{
		background-color: #29bb9c;
	}
	.product_img{
		width: 60px;height: 40px;
	}
	.alert-success{
		display:none;
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
			            <h5 class="mt-20">Products 
			         		<a href="{{url('/product')}}" class="btn btn-primary btn-sm rounded">Add new</a>
			            </h5>
			           
			            @if(session()->has('message'))
						    <div class="alert alert-success">
						        {{ session()->get('message') }}
						    </div>
						@endif
						<div class="row">
			                <div class="col-xl-4 col-lg-6 col-xs-6">
			                    <div class="card border _border" style="">
			                        <div class="card-body">
			                            <div class="card-block">
			                                <div class="media">
			                                    <div class="media-body text-xs-left">
			                                        <h3 class="green"id="dash_0">{{$count}}</h3>
			                                        <span>In Stock</span>
			                                    </div>
			                                    <div class="media-right media-middle">
			                                        <i class="icon-rocket green font-large-2 float-xs-right"></i>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			                <div class="col-xl-4 col-lg-6 col-xs-6">
			                    <div class="card border _border">
			                        <div class="card-body">
			                            <div class="card-block">
			                                <div class="media">
			                                    <div class="media-body text-xs-left">
			                                        <h3 class="red"><span id="dash_1">0</span></h3>
			                                        <span>Stock out</span>
			                                    </div>
			                                    <div class="media-right media-middle">
			                                        <i class="icon-blocked red font-large-2 float-xs-right"></i>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			                <div class="col-xl-4 col-lg-6 col-xs-6">
			                    <div class="card border _border">
			                        <div class="card-body">
			                            <div class="card-block">
			                                <div class="media">
			                                    <div class="media-body text-xs-left">
			                                        <h3 class="cyan" id="dash_2">{{$count}}</h3>
			                                        <span>Total</span>
			                                    </div>
			                                    <div class="media-right media-middle">
			                                        <i class="icon-stats-bars22 cyan font-large-2 float-xs-right"></i>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
        			<hr>
					<table id="MasterTable" class="table table-striped table-bordered">
				        <thead>
				            <tr>
				                <th>No</th>
				                <th>Name</th>
				                <th>Opeing Stock</th>
				                <th>Order qty</th>
				                <th>Category</th>
				                <th>Issuance Stock</th>
				                <th>Closing Stock</th>
				                <th>Setting</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($data as $rows)
				        	<tr class="autonumber">
				        		<td></td>
				        		<td>
				        			<span class="avatar-lg align-baseline">
				                		<img class="product_img" src="{{URL::asset('public_path/image/'.$rows->image) }}">
				                	</span> {{$rows->product_name}}
				                </td>
				        		<td>{{$rows->qty}}</td>
				        		<td>{{number_format($rows->receive_qty,2)}}</td>
				        		<td>{{$rows->category_name}}</td>
				        		<td>{{number_format($rows->sold,2)}}</td>
				        		<!-- <td>{{number_format($rows->receive_qty,2)}}</td> -->
				        		<td>{{number_format($rows->closing,2)}}</td>
				        		<td><a href="{{route('product.edit',$rows->id)}}"
				        			class="btn btn-primary btn-sm">
				               		<i class="fa fa-edit"></i> Edit</a> 
				               	</td>
				        	</tr>
				        	@endforeach
				        </tbody>
					</table>
    			</div>
			</div>
		</div>
	</div>
@endsection