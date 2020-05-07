<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
use App\CustomerGroup;
use App\CustomerRoute;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $customer_no = DB::table('zenrolle_customers')->select('cust_no')
                            ->orderBy('cust_no','desc')->pluck('cust_no')->first();
        if(is_null($customer_no))
            $customer_no = '10001';
        else
            $customer_no = $customer_no+1;

        $company_id = DB::table('companies')->select('company_id','company_name')->get();
        $cust_group = DB::table('zenrolle_cust_group')->select('id','title')->get();
        $cust_route = DB::table('zenrolle_cust_route')->select('id','title')->get();
        return view('sale.SaleInvoices.customer',compact('cust_group','cust_route','company_id','customer_no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ClientInfo = new Customer();
        $ClientInfo->company_id = $request->input('company_id');
        $ClientInfo->name = $request->input('name');
        $ClientInfo->phone = $request->input('phone');
        $ClientInfo->cust_no = $request->input('cust_no');
        $ClientInfo->email = $request->input('email');
        $ClientInfo->address = $request->input('address');
        $ClientInfo->city = $request->input('city');
        $ClientInfo->region = $request->input('region');
        $ClientInfo->country = $request->input('country');
        $ClientInfo->postbox = $request->input('postbox');
        $ClientInfo->taxid = $request->input('taxid');
        $ClientInfo->gid = $request->input('customergroup');
        $ClientInfo->route_id = $request->input('customerroute');
        $ClientInfo->name_s = $request->input('name_s');
        $ClientInfo->phone_s = $request->input('phone_s');
        $ClientInfo->email_s = $request->input('email_s');
        $ClientInfo->address_s = $request->input('address_s');
        $ClientInfo->city_s = $request->input('city_s');
        $ClientInfo->region_s = $request->input('region_s');
        $ClientInfo->country_s  = $request->input('country_s');
        $ClientInfo->postbox_s = $request->input('postbox_s');
        $ClientInfo->save();
        return redirect('/newinvoice')->withsuccess('message','Your Customer has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
