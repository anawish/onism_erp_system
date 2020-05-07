@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<div class="row mt-10">
					<div class="col-md-3">
						<a href="{{url('/create')}}" style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body _card_body">
					                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
					                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color">Add New Item</h3>
					                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
					                    	<img src="{{asset('image/sale-icon/1.png')}}">
					                    </i>
					                </div> 
				                </div>
	             			</div>
	             		</a>
					</div>
					<div class="col-md-3">
						<a href="{{url('/products')}}"style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body _card_body">
					                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
					                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color" style="margin-left: -10px;">Manage <br>Products</h3>
					                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
					                    	<img src="{{asset('image/sale-icon/1.png')}}">
					                    </i>
					                </div> 
				                </div>
	             			</div>
	             		</a>
					</div>
					<div class="col-md-3">
						<a href="{{url('/productcategory')}}" style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body _card_body">
					                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
					                    <h4 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color">Product <br>Categories</h4>
					                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
					                    	<img src="{{asset('image/sale-icon/2.png')}}">
					                    </i>
					                </div> 
				                </div>
	             			</div>
	             		</a>
					</div>
					<div class="col-md-3">
						<a href="{{url('/warehouse')}}" style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body _card_body">
					                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
					                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color">WareHouse</h3>
					                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
					                    	<img src="{{asset('image/sale-icon/3.png')}}">
					                    </i>
					                </div> 
				                </div>
	             			</div>
	             		</a>
					</div>
				</div>
				<div class="row mt-20">
					<div class="col-md-3">
						<a href="{{url('/purchaseorder')}}" style="text-decoration: none;">
							<div class="card _card">
			                <div class="card-body _card_body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
				                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color" >Purchase Orders</h3>
				                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
				                    	<img src="{{asset('image/sale-icon/4.png')}}">
				                    </i>
				                </div> 
			                </div>
             			</div>
						</a>
					</div>
					<div class="col-md-3">
						<a href="{{url('/managepurchase')}}" style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body _card_body">
					                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
					                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color" >Manage Purchase Orders</h3>
					                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25" style="margin-left: 140px; margin-top: -18px;">
					                    	<img src="{{asset('image/sale-icon/4.png')}}">
					                    </i>
					                </div> 
				                </div>
             				</div>
						</a>
					</div>
					<div class="col-md-3">
						<a href="{{url('/stockreturn')}}" style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body _card_body">
					                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
					                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color">Stock Return</h3>
					                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25" style="margin-left: 140px; margin-top: -18px;">
					                    	<img src="{{asset('image/sale-icon/4.png')}}">
					                    </i>
					                </div> 
				                </div>
             				</div>
						</a>
					</div>
					<div class="col-md-3">
						<a href="{{url('/viewstock')}}" style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body _card_body">
					                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
					                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color">View Return <br>Stock</h3>
					                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-20">
					                    	<img src="{{asset('image/sale-icon/4.png')}}">
					                    </i>
					                </div> 
				                </div>
             				</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection