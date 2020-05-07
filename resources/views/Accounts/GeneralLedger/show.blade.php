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
	.mt-15{
		margin-top: 15px;
	}
	.ledger_name{
		margin-top: 7px; font-weight: bold;
	}
	.ledger_name input{
		font-weight: bold;
	}
	label{
		font-weight: 700;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9 mt-15">
			<div class="row">
				<div class="col-md-6">
					<h6 style="font-weight: bold;">Ledger Detail</h6>
				</div>
			</div>
			<hr>
			@foreach($accountDetail as $invoice_histories)
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-5">
							<label class="ledger_name">Ledger Name</label>
						</div>
						<div class="col-md-7">
							<input type="text" readonly class="form-control-plaintext " value="{{$invoice_histories->name}}" id="name">
							<input type="hidden" readonly class="form-control-plaintext " value="{{$invoice_histories->type}}" id="type">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-5">
							<label class="ledger_name">Description</label>
						</div>
						<div class="col-md-7">
							<input type="text" readonly class="form-control-plaintext" value="{{$invoice_histories->description}}">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-4">
							<label class="ledger_name">GL No</label>
						</div>
						<div class="col-md-6">
							<input type="text" readonly class="form-control-plaintext"value="{{$invoice_histories->gl_no}}">
						</div>
					</div>
				</div>
			</div>
			@endforeach
			<hr>
			<div class="row" style="margin-bottom: 15px;">
				<div class="col-md-4">
					<label>From Date</label>
					<input type="date" name="From" id="From" class="form-control form-control-sm" placeholder="From Date"/>
				</div>
				<div class="col-md-4">
					<label>To Date</label>
					<input type="date" name="to" id="to" class="form-control form-control-sm" placeholder="To Date"/>
				</div>
				<div class="col-md-4">

					<input type="button" name="range" id="range" value="Run" class="btn btn-success btn-sm" style="margin-top: 32px;"/>
					
					@foreach($accountDetail as $invoice_histories)
					<a href="{{route('generaledger.show',$invoice_histories->name)}}"  id="refresh" class="btn btn-info btn-sm" style="margin-top: 32px;"/> Refresh
					</a>
					@endforeach
					
				</div>
			</div>
			<table id="MasterTable" class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Date</th>
						<th>Invoice No</th>
						<th>Description</th>
						<th>Type</th>
						<th>Debit</th>
						<th>Credit</th>
						<th>Balance</th>
					</tr>
				</thead>
				<tbody>
					@foreach($ledger_detail as $ledger_details)
					<tr class="autonumber">
						<td></td>
						<td>{{$ledger_details->updated_date}}</td>
						<td>{{$ledger_details->doc_no}}</td>
						<td>{{$ledger_details->doc_description}}</td>
						<td>{{$ledger_details->type}}</td>
						@if($ledger_details->type == 'SI')
						<td></td>
						<td>{{$ledger_details->credit}}</td>
						<td></td>
						@else
						<td>{{$ledger_details->debit}}</td>
						<td>{{$ledger_details->credit}}</td>
						<td></td>
						@endif
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/Accounts/showgeneraledger.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
@endsection