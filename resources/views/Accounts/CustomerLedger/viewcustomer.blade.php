@extends('layouts.app')
@section('style')
<style type="text/css">
	.mt-25{
		margin-top: 25px;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9 mt-25">
			<h5>Customer Detail</h5>
			<hr>
			<h6>Filter by Customer No</h6>
			<div class="row" style="margin-bottom: 15px;">
				<div class="col-md-4">
					<label>From </label>
					<input type="text" name="From" id="From" class="form-control form-control-sm" placeholder="From Customer No # 10001"/>
				</div>
				<div class="col-md-4">
					<label>To</label>
					<input type="text" name="to" id="to" class="form-control form-control-sm" placeholder="To Customer No # 10001"/>
				</div>
				<div class="col-md-4">
					<input type="button" id="range" value="Run" class="btn btn-success btn-sm" style="margin-top: 32px;">
					<a href="{{url('account/viewcustomer')}}" name="range" id="refresh" value="Refresh" class="btn btn-info btn-sm" style="margin-top: 32px;" /> Refresh
					</a>
				</div>
			</div>
			<hr>
			<h6>Filter by Date</h6>
			<div class="row" style="margin-bottom: 15px;">
				<div class="col-md-4">
					<label>From Date </label>
					<input type="date" name="From_date" id="From_date" class="form-control form-control-sm"/>
				</div>
				<div class="col-md-4">
					<label>To Date</label>
					<input type="date" name="to_date" id="to_date" class="form-control form-control-sm" />
				</div>
				<div class="col-md-4">
					<input type="button" id="date_range" value="Run" class="btn btn-success btn-sm" style="margin-top: 32px;">
					<a href="{{url('account/viewcustomer')}}" name="range" id="refresh_id" value="Refresh" class="btn btn-info btn-sm" style="margin-top: 32px;" /> Refresh
					</a>
				</div>
			</div>
			<hr>
			<table id="MasterTable" class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Opeing Balance</th>
						<th>Debit</th>
						<th>Credit</th>
						<th>Closing Balance</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($customer as $customers)
					<tr>
						<td>{{$customers->cust_no}}</td>
						<td>{{$customers->name}}</td>
						<td>{{number_format($customers->balance,2)}}</td>
						<td>{{number_format($customers->TotalDebit,2)}}</td>
						<td>{{number_format($customers->TotalCredit,2)}} -</td>
						<td>{{number_format($customers->closing_balance,2)}}</td>
						<td>
							<a href="{{url('viewbalance',$customers->id)}}" class="btn btn-info btn-sm">View</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr></tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/Accounts/customer_ledger.js')}}"></script>
@endsection