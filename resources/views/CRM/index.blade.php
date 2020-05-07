@extends('layouts.app')
@section('style')
<style type="text/css">
	
</style>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="row mt-10">
				<div class="col-md-3">
					<a href="{{url('/client/create')}}" style="text-decoration: none;">
						<div class="card _card">
			                <div class="card-body _card_body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
				                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color">New Client</h3>
				                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
				                    	<img src="{{asset('image/sale-icon/1.png')}}">
				                    </i>
				                </div> 
			                </div>
             			</div>
             		</a>
				</div>
				<div class="col-md-3">
					<a href="{{url('/client')}}" style="text-decoration: none;">
						<div class="card _card">
			                <div class="card-body _card_body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
				                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color">Manage Clients</h3>
				                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
				                    	<img src="{{asset('image/sale-icon/1.png')}}">
				                    </i>
				                </div> 
			                </div>
             			</div>
             		</a>
				</div>
				<div class="col-md-3">
					<a href="{{url('/clientgroup')}}" style="text-decoration: none;">
						<div class="card _card">
			                <div class="card-body _card_body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
				                    <h4 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color" style="margin-left: -7px;">Manage Groups</h4>
				                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
				                    	<img src="{{asset('image/sale-icon/2.png')}}">
				                    </i>
				                </div> 
			                </div>
             			</div>
             		</a>
				</div>
				<!-- <div class="col-md-3">
					<a href="{{url('/suppliers/create')}}" style="text-decoration: none;">
						<div class="card _card">
			                <div class="card-body _card_body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
				                    <h4 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color" style="margin-left: -7px;">Create Supplier</h4>
				                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
				                    	<img src="{{asset('image/sale-icon/2.png')}}">
				                    </i>
				                </div> 
			                </div>
             			</div>
             		</a>
				</div> -->
			</div>
			<!-- <div class="row mt-10">
				<div class="col-md-3">
					<a href="{{url('/suppliers')}}" style="text-decoration: none;">
						<div class="card _card">
			                <div class="card-body _card_body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
				                    <h4 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color" style="margin-left: -18px;">Manage Supplier</h4>
				                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
				                    	<img src="{{asset('image/sale-icon/1.png')}}">
				                    </i>
				                </div> 
			                </div>
             			</div>
             		</a>
				</div>
			</div> -->
		</div>
	</div>
</div>
@endsection