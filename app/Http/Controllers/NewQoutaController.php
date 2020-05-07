<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
use App\Warehouse;

class NewQoutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice_no = DB::table('zenrolle_quote')->select('invoice_no')
                            ->orderBy('invoice_no','desc')->pluck('invoice_no')->first(); 
        if(is_null($invoice_no))
            $invoice_no = '1001';
        else
            $invoice_no = $invoice_no+1;

         $quote = DB::table('quote_nunber')->select('value')->
                            orderBy('value','desc')->pluck('value')->first();

        $warehouse = DB::table('zenrolle_warehouse')->select('id','warehouse_name','warehouse_desc','bussines_loc')->get();

        $terms = DB::table('zenrolle_terms')->select('id','title','terms')->get();
        $customer = DB::table('zenrolle_customers')->get();
        $product = DB::table('zenrolle_produts')->get();
        return view('Sale.NewQuota.createquota',compact('warehouse','terms','invoice_no','quote','customer','product'));
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
        $cust_route = DB::table('zenrolle_cust_route')->select('id','title')->get();
        
       return view('sale.NewQuota.customerdeatil',compact('cust_group','cust_route','company_id'));
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
        return redirect('/createqouta')->withsuccess('message','Your Customer has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($query)
    {
        $data =DB::table('zenrolle_customers')->select('id','name','address','city','phone','email')->where('name','LIKE','%'.$query.'%')->get();
        return json_encode($data);
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



     /**
     * Search Customer Detail the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customerinfo($id)
    {
        $data =DB::table('zenrolle_customers')->select('id','name','address','city','phone','email')->where('id',$id)->get();

        return json_encode($data);
    }
}
