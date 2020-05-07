@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		@include ('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="row mt-10">
				<div class="col-md-12">
					<h4>Sale Order <a href="{{url('/order')}}"><button type="button" class="btn btn-primary rounded-pill">Add New Order</button> </a>
					</h4>
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
		                <th>Qoute</th>
		                <th>Customer</th>
		                <th>Date</th>
		                <th>Total</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($data as $datas)
		            <tr>
		                <td>{{$datas->id}}</td>
		                <td>{{$datas->order_no}}</td>
		                <td>{{$datas->name}}</td>
		                <td>{{$datas->order_date}}</td>
		                <td>{{number_format($datas->total,2)}}</td>
		                <td>
		                	<a href="{{url('orderinvoice',$datas->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
		                	<a href="{{url('downloadpdf',$datas->id)}}">
		                		<button class="btn btn-info btn-sm">
		                			<i class="fa fa-download" aria-hidden="true"></i>
		                		</button>
		                	</a>
		                </td>
		            </tr>
		            @endforeach
		        </tfoot>
			</table>
		</div>
	</div>
</div>
@endsection