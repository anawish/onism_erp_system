@extends('layouts.app')
@section('style')
<style type="text/css">
	.mt-20{
		margin-top: 20px;
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
		<div class="col-md-9 mt-20">
			<h5>Vendor Detail</h5>
			<hr>
			<div class="row" style="margin-bottom: 15px;">
				<div class="col-md-4">
					<label>From </label>
					<input type="text" name="From" id="From" class="form-control form-control-sm" placeholder="From vendor No # 10001"/>
				</div>
				<div class="col-md-4">
					<label>To</label>
					<input type="text" name="to" id="to" class="form-control form-control-sm" placeholder="To Vendor No # 10001"/>
				</div>
				<div class="col-md-4">
					<input type="button" id="range" value="Run" class="btn btn-success btn-sm" style="margin-top: 32px;">
					<a href="" name="range" id="refresh" value="Refresh" class="btn btn-info btn-sm" style="margin-top: 32px;" /> Refresh
					</a>
				</div>
			</div>
			<table id="MasterTable" class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Opening Balance</th>
						<th>Debit</th>
						<th>Credit</th>
						<th>Balance</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($vendor as $vendors)
					<tr>
						<td>{{$vendors->id}}</td>
						<td>{{$vendors->name}}</td>
						<td></td>
						<td>{{number_format($vendors->TotalDebit,2)}}</td>
						<td></td>
						<td>{{number_format($vendors->closing_balance,2)}}</td>
						<td><a href="{{route('vendorledger.show',$vendors->id)}}" class="btn btn-info btn-sm">View</a></td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection