@extends('layouts.app')
@section('style')
<style type="text/css">
	.trs_detail{
        margin-left: 20px;
        margin-top: 10px;
    }
    .address{
        margin-left: 20px;margin-top: 25px;
    }
    .client_add{
        float: left;margin-top: 30px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="card card-block">
                <div id="notify" class="alert alert-success" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    <div class="message"></div>
                </div>
                <div class="card card-block">
                    <div class="well col-xs-12">
                        <h5 class="trs_detail">Transaction Details </h5>
                        <div class="row">
                            <div class="text-center">
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="" class="btn btn-info btn-xs" title="Print">
                                <i class="fa fa-print" aria-hidden="true"></i></a> &nbsp;
                                <a href="#sendEmail" data-toggle="modal" data-remote="false" class="sendbill btn btn-info btn-xs" data-type="received">
                                <i class="fa fa-commenting-o" aria-hidden="true"></i>  Send Email</a> &nbsp;
                                <a href="#sendSMS" data-toggle="modal" data-remote="false" class="sendsms btn btn-info btn-xs" data-type="received">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>  Send SMS</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <hr>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <address class="address" style="">
                                    <strong>ABC Company</strong>
                                    <br>412 Example South Street,
                                    <br> Los Angeles, FL
                                    <br>USA -  123
                                    <br>Phone: 410-987-89-60
                                    <br>Email: support@zenrolle.com
                                </address>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                 @foreach($client as $clients)
                                <address class="client_add" style="">
                                    <strong>{{$clients->name}}</strong>
                                    <br>{{$clients->address}} , 
                                    <br>{{$clients->city}} ,{{$clients->country}}<br> 
                                    Phone: {{$clients->phone}}<br>   
                                    Email: {{$clients->email}}                       
                                </address>
                                  @endforeach
                            </div>
                          
                            <hr>
                        </div>
                        <hr>
                        <div class="row">
                            @foreach($data as $datas)
                            <div class="col-md-6">
                                
                                <p style="margin-left: 22px;">Amount  : $  {{number_format($datas->grand_total,2)}}</p>
                                <p style="margin-left: 22px;">Balance : $ {{number_format($totalbal,2)}} </p>
                                <p style="margin-left: 22px;">Type : Income</p>
                                <p style="margin-left: 22px;">Note : Payment for invoice #{{$datas->invoice_no}}</p>
                               
                            </div>
                            <div class="col-md-6">
                                <p>Date : {{$datas->updated_at}}</p>
                                <p>ID   : TRN#{{$datas->id}}</p>
                                <p>Category : Sales</p>
                            </div>
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection