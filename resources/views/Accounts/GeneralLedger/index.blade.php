@extends('layouts.app')
@section('style')
<style>
	.mt-15{
		margin-top: 15px;
	}
	.create_acc {
		color : white;
	}
	.account_detail{
		margin-top: 25px;
    	margin-left: 14px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9 mt-15">
			<h4>General Ledger Details</h4>
			<hr>
			<div class="account_detail">
				<table id="MasterTable" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Account</th>
							<th>Description</th>
							<th>Balance</th>
							<th>Settings</th>
						</tr>
					</thead>
					<tbody>
						@foreach($account as $accounts)
						<tr>
							<td>{{$accounts->gl_no}}</td>
							<td>{{$accounts->name}}</td>
							<td>{{$accounts->description}}</td>
							<td></td>
							<td>
								<a href="{{route('generaledger.show',$accounts->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> View</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div> 
	</div>
</div>
@include('layouts.partials-modal.generaledger')
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/Accounts/generaledger.js')}}"></script>
@endsection
