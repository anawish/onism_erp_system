
@extends('layouts.app')
@section('style')
<style type="text/css">
	h3{
		margin-top: 10px;
	}
	thead{
		background-color: #29bb9c;
	}
	table {
    counter-reset: rowNumber;
	}

	table .autonumber{
	    counter-increment: rowNumber;
	}

	table .autonumber td:first-child::before {
	    content: counter(rowNumber);
	}
</style>
@endsection('style')
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			@if(session()->has('success'))
			    <div class="alert alert-success">
			        {{ session()->get('success') }}
			    </div>
			@endif
			<h3>Good Receive Notes (GRN) Details</h3>
			<hr>
			<table id="MasterTable" class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Order No</th>
						<th>Date</th>
						<th>Warehouse</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $datas)
					<tr class="autonumber">
						<td></td>
						<td>{{$datas->invoice_no}}</td>
						<td>{{$datas->order_date}}</td>
						<td>{{$datas->warehouse_name}}</td>
						<td>
						@if($datas->status=='Pending')
							<button class="badge badge-pill badge-warning">{{$datas->status}}</button>
						@endif
						@if($datas->status=='Partial')
							<button class="badge badge-pill badge-primary">{{$datas->status}}</button>	
						@endif
						@if($datas->status=='Complete')
							<button class="badge badge-pill badge-success">{{$datas->status}}</button>
						@endif
						</td>
						<td>
						@if($datas->status == 'Complete')
							 <button type="button" class="btn btn-secondary btn-sm" disabled>
							 	<i class="fa fa-plus"></i> Add GRN</button>
							@else
							<a href="{{route('grn.show',$datas->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add GRN</a>
						@endif
							<a href="grnpdf/{{$datas->id}}" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> View</a>
							<a href="{{route('grn.edit',$datas->id)}}" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection