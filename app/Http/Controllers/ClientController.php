<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
use App\InvoiceItem;
use App\NewInvoice;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cust_group = DB::table('zenrolle_cust_group')->get();
        $data = DB::table('zenrolle_customers')->orderBy('id','DESC')->get();
        return view('CRM.show',compact('data','cust_group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_id = DB::table('companies')->select('company_id','company_name')->get();
        $cust_group = DB::table('zenrolle_cust_group')->select('id','title')->get();
        return view('CRM.create',compact('company_id','cust_group'));
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
        return redirect('/client')->withsuccess('message','Your Customer has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('zenrolle_customers')->where('id',$id)->get();
        $balance = 0;
        foreach ($data as $balancekey => $balancevalue) {
            $balance=$balancevalue->balance;
        }
        $client_group = DB::table('zenrolle_cust_group')->join('zenrolle_customers','zenrolle_cust_group.id','=','zenrolle_customers.gid')->select('zenrolle_cust_group.title','zenrolle_cust_group.id')->where('zenrolle_customers.id',$id)->get();
        $invoicesDetail = DB::table('zenrolle_invoicess')->where('csid',$id)->get();
        $grand_total = 0;
        $payment = 0;
        foreach ($invoicesDetail as $key => $value) {
            $value->csid;
            $grand_total = $value->grand_total + $grand_total;
            $payment = $value->payment + $payment;
        }
        $total = 0;
        $income = $payment + $balance;
        $total = $grand_total - $payment;
        $totalbal = $grand_total - $income;
        return view('CRM.view',compact('data','client_group','invoicesDetail','total','payment','grand_total','totalbal','income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_id = DB::table('companies')->select('company_id','company_name')->get();
        $cust_group = DB::table('zenrolle_cust_group')->select('id','title')->get();
        $cust_route = DB::table('zenrolle_cust_route')->select('id','title')->get();
        $data = DB::table('zenrolle_customers')->where('id',$id)->get();
        return view('CRM.edit',compact('data','company_id','cust_group','cust_route'));
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
        $updateClient = Customer::findOrFail($id);
        DB::table('zenrolle_customers')->where('id',$id)->update([
            'company_id'  => $request['company_id'],
            'name'        => $request['name'],
            'phone'       => $request['phone'],
            'address'     => $request['address'],
            'email'       => $request['email'],
            'city'        => $request['city'],
            'region'      => $request['region'],
            'country'     => $request['country'],
            'postbox'     => $request['postbox'],
            'company'     => $request['company'],
            'country'     => $request['country'],
            'gid'         => $request['customergroup'],
            'route_id'    => $request['customerroute'],
            'name_s'      => $request['name_s'],
            'phone_s'     => $request['phone_s'],
            'email_s'     => $request['email_s'],
            'address_s'   => $request['address_s'],
            'city_s'      => $request['city_s'],
            'region_s'    => $request['region_s'],
            'country_s'   => $request['country_s'],
            'postbox_s'   => $request['postbox_s']
        ]);

        $updateClient->save();
        return redirect('/client')->with('status','Details updated succfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('zenrolle_customers')->where('id', $id)->delete();
        return redirect('/client')->with('status','Customer details deleted Successfully!');
    }

    /**
     * Balance the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function balance($id)
    {
        $data = DB::table('zenrolle_customers')->where('id',$id)->get();
        return view('CRM.balance',compact('data'));
    }

    /**
     * Balance the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoicesDetail($id)
    {
       $data = DB::table('zenrolle_invoicess')->where('csid',$id)->get();
       $client = DB::table('zenrolle_customers')->where('id',$id)->pluck('name')->first();
       $clientDetail = DB::table('zenrolle_customers')->where('id',$id)->get();
       return view('CRM.invoices',compact('data','client','clientDetail'));
    }

    /**
     * Delete Invoice the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        InvoiceItem::where('pid',$id)->delete(); 
        NewInvoice::where('id',$id)->delete();
        return redirect('/clientinvoice'.$id)->with('status','The entry has been deleted Successfully!');
    }

    /**
     * Client Transcations the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function transcation($id)
    {

        $credit = DB::table('invoice_history')->where('client_id',$id)->get();

        foreach ($credit as $key => $value) {
            $closing_balance = 0;
            $data = DB::table('zenrolle_invoicess')->where('csid',$value->client_id)->get();
              foreach ($data as $keys => $values) {
              $total_debit = 0;
                $total_debit = $total_debit + $values->grand_total;
                // $closing_balance = $values->grand_total - $value->payment;
                $value->total_debit= $total_debit;
            }
            //$value->closing_balance = $closing_balance;
          
        }
        $clientDetail = DB::table('zenrolle_customers')->where('id',$id)->get();
        $client = DB::table('zenrolle_customers')->where('id',$id)->pluck('name')->first();
        return view('CRM.transcation',compact('data','clientDetail','client'));
    }

    /**
     * Transcations Detail the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function transcationDetail($id)
    {
        $data = DB::table('zenrolle_invoicess')->where('id',$id)->get();
        $grand_total = 0;
        $payment = 0;
        foreach ($data as $clientkey => $clientvalue) {
            $client_id = $clientvalue->csid;
            $grand_total = $clientvalue->grand_total+$grand_total;
            $payment = $clientvalue->payment + $payment;
            $customer = DB::table('zenrolle_customers')->where('id',$client_id)->get();
            $balance = 0;
            foreach ($customer as $customerkey => $customervalue) {
                    $balance = $customervalue->balance;
            }
        }
        $client = DB::table('zenrolle_invoicess')->join('zenrolle_customers','zenrolle_invoicess.csid','=','zenrolle_customers.id')->where('zenrolle_invoicess.id',$id)->get();
        $total = 0;
        $income = $payment + $balance;
        $total = $grand_total - $payment;
        $totalbal = $grand_total - $payment - $balance; 
        return view('CRM.viewTranscation',compact('client','totalbal','data'));
    }
    //Upload Images
    public function uploadimg(Request $request)
    {
        dd($request->hasfile('file'));
        $uploadimg = new Customer();

        if($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('/image',$filename);
            $uploadimg->picture = $filename;
            dd($filename);
        }
    }
    //Search Client Group
    public function SearchClient(Request $request)
    {
       $data = DB::table('zenrolle_customers')->where('gid',$request->cust_grp)->get();
       return json_encode($data);
    }

}
