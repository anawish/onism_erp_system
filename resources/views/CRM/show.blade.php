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
	img{
		width: 70px;
	}
	.search_group{
		font-weight: 800;
	}
</style>
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<div class="row mt-10">
					<div class="col-md-6">
						<h3>Client</h3>
						@if (session('status'))
					        <div class="alert alert-success">
					        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
					        </div>
					    @endif
					</div>
					<div class="col-md-6">
						<div class="row" style="margin-top: 7px;">
							<div class="col-sm-4">
								<label class="search_group">Search By Group</label>
							</div>
							<div class="col-sm-6">
								<select class="custom-select custom-select-sm" id="cust_grp" name="cust_grp">
									<option value="">Select Group</option>
									@foreach($cust_group as $cust_groups)
									<option value="{{$cust_groups->id}}">{{$cust_groups->title}}</option>
									@endforeach
								</select>
							</div>
							<a href="{{url('/client')}}" class="btn btn-info btn-sm">Reload</a>
						</div>
					</div>
				</div>
				<hr>
				<table id="MasterTable" class="table table-striped table-bordered">
			        <thead class="sale_invoice">
			            <tr>
			                <th>#</th>
			                <th style="width: 20%">Name</th>
			                <th style="width: 15%">Address</th>
			                <th style="width: 15%">Email</th>
			                <th style="width: 15%">Phone</th>
			                <th>Settings</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($data as $datas)
			            <tr>
			                <td><input type="hidden" name="cust_id" id="cust_id" value="{{$datas->id}}">
			                	{{$datas->cust_no}}</td>
			                <td>
			                	<img src="{{URL::asset('image/'.$datas->picture)}}"> 
			                	<span style="color: #29bb9c;">{{$datas->name}}</span>
			                </td>
			                <td>{{$datas->address}}</td>
			                <td>{{$datas->email}}</td>
			                <td>{{$datas->phone}}</td>
			                <td>
			                	<a href="{{route('client.show',$datas->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>

			                	<a href="{{route('client.edit',$datas->id)}}">
			                		<button class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
			                	</a>
			                </td>
			            </tr>
			            @endforeach
			        </tbody>
			        <tfoot>
					    <tr>
			                <th>#</th>
			                <th>Name</th>
			                <th>Address</th>
			                <th>Email</th>
			                <th>Phone</th>
			                <th>Settings</th>
					    </tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/CRM/manageclient.js')}}"></script>
@endsection