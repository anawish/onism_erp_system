@extends('layouts.app')
@section('style')
<style type="text/css">
	.profile_img{
		margin-top: 20px;
	    width: 250px;
	    align-self: center;
	}
	.mt-30{
		margin-top: 30px;
	}
	.btn-md{
		padding: 6px 7px;
	}
	.tag-pill{
		color: white;
	    width: 86px;
	    text-align: center;
	    border-radius: 5px;
	}
	.card-block{
		box-shadow: 2px 3px 3px rgb(142, 124, 124);
	}
	#name {
        background: transparent;
        border: none;
        border-bottom: 1px solid #000000;
        outline:none;
        box-shadow:none;
    }
    .view{
        margin-bottom: 130px;
    }
    ._btn{
        background-color: #967ADC;
        border-color: #967ADC;
        border: none;
        padding: 5px 30px;
    }
    ._btn1{
        border-color: #37BC9B;
        background-color: #37BC9B;
        border: none;
        padding: 5px 30px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-4">
					<div class="card card-block">
						@foreach($data as $datas)
						<h4 class="text-center mt-30">{{$datas->name}}</h4>
						@endforeach
					    <img class="card-img-top profile_img" src="{{asset('image/default-image.png')}}" alt="Card image">
					    <div class="card-body">
					    	<hr>	
					      	<div class="user-button">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <a href="#sendMail" data-toggle="modal" data-remote="false" class="btn btn-primary btn-sm" data-type="reminder">
                                        	<i class="fa fa-envelope"></i> 
                                        	Send Message                                       
                                       	</a>
                                    </div>
                                    <div class="col-md-6">
                                        @foreach($data as $datas)

                                        <a href="{{route('suppliers.edit',$datas->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i> 
                                        	Edit Profile                                   
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6>Balance Summary</h6>
                                    <hr>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span class="tag tag-pill bg-primary float-right">$ {{number_format($total_sum,2)}}</span>
                                            Purchase                                      
                                        </li>
                                        <li class="list-group-item">
                                            <span class="tag tag-default tag-pill bg-danger float-right">N 0.000</span>
                                            Payment                                       
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <h5>Client Group                                        
                                    <small>Default Group</small>
                                    </h5>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="offset-md-2 col-md-4">
                                    <a href="" class="btn btn-danger btn-sm">
                                    	<i class="icon-pencil"></i>
                                    	 Change Password                                   
                                    </a>
                                </div>
                                <div class="col-md-12"><br>
                                    <h5>Change Customer Picture</h5>
                                    <input id="fileupload" type="file" name="files[]">
                                </div>
                                <div id="progress" class="progress1">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>
                            </div>
					    </div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card card-block">
                        <h4 class="text-center" style="margin-top: 20px;">Supplier Details</h4>
                        @foreach($data as $datas)
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>Name</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->name}}             
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>Company</strong>
                            </div>
                            <div class="col-md-9">
                                zeehub                               
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong> Address</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->address}}                               
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>City</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->city}}                               
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>Region</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->region}}                               
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>Country</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->country}}                               
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>PostBox</strong>
                            </div>
                            <div class="col-md-9">
                            	{{$datas->postbox}}
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>Email</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->email}}                              
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong> Phone</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->phone}}                               
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3 view">
                            <div class="col-md-6 text-center">
                                <a href="{{url('/PODetail',$datas->id)}}" class="btn btn-primary btn-md _btn">
                                	<i class="fa fa-print"></i> 
                                	View Invoices
                            	</a>
                            </div>
                            <div class="col-md-6 text-center">
                                <a href="{{url('/supplier/transcation',$datas->id)}}" class="btn btn-success btn-md _btn1">
                                	<i class="fa fa-eye"></i>
                                   View AllTransactions                                   
                                </a>
                            </div>
                        </div>
                       
                        @endforeach
                	</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection