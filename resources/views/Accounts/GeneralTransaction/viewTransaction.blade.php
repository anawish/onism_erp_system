@extends('layouts.app')
@section('style')
<style type="text/css">
	table{
		counter-reset: rowNumber;
	}
	table .autonumber{
		counter-increment: rowNumber;
	}
	table .autonumber td:first-child::before {

		content: counter(rowNumber);
	}
	h2{
		margin-top: 20px;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<h2>Transactions Details</h2>
				</div>
			</div>
			<hr>
			<table id="MasterTable" class="table table-bordered">
				<thead>
					<tr>
						<th>Sr#</th>
						<th>Type</th>
						<th>Doc No.</th>
						<th>Date</th>
						<th>Total Debit</th>
						<th>Total Credit</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($Trans_Detail as $Trans_Details)
					<tr class="autonumber">
						<td></td>
						<td>{{$Trans_Details->transaction_type}}</td>
						<td>{{$Trans_Details->doc_no}}</td>
						<td>{{$Trans_Details->doc_date}}</td>
						<td>{{$Trans_Details->total_debit}}</td>
						<td>{{$Trans_Details->total_credit}}</td>
						<td>
							<a href="{{url('/showtransaction',$Trans_Details->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
			                <a href="{{url('/downloadPdf',$Trans_Details->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-download"></i></a>
			            </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection