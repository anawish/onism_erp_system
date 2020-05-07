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
	thead{
		background-color: #29bb9c;
	}
</style>
@endsection
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
						<th>GRN No</th>
						<th>Date</th>
						<th>PO</th>
						<th>Gate Pass</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($grn as $grns)
					<tr class="autonumber">
						<td></td>
						<td>{{$grns->grn_no}}</td>
						<td>{{$grns->doc_date}}</td>
						<td>{{$grns->po_no}}</td>
						<td>{{$grns->inward_gate}}</td>
						<td>
							<a href="{{url('download',$grns->id)}}" class="btn btn-info btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>
							<a href="{{route('grnprint.edit',$grns->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection