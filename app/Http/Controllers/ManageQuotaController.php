<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quote;
use App\Quote_items;
use PDF;

class ManageQuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::table('zenrolle_quote')->join('zenrolle_customers','zenrolle_quote.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_quote.invoice_no','zenrolle_quote.invoicedate','zenrolle_quote.total','zenrolle_quote.id','zenrolle_quote.status')
                    ->get();
        return view ('sale.ManageQuota.manageqouta',compact('data'));
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
        //
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
        
        Quote_items::where('pid',$id)->delete();
        Quote::where('id',$id)->delete();
        return redirect('/qoute')->with('message','Delete Quote Successfully');
    }



    public function pdf($id)
    {
        $customer = array();

        $data = Quote::find($id);

        $SupplierDetail = DB::table('zenrolle_quote')->join('zenrolle_customers','zenrolle_quote.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_quote.invoice_no','zenrolle_quote.refer_no','zenrolle_quote.invoicedate','zenrolle_quote.invoice_duedate','zenrolle_quote.id','zenrolle_quote.sub_total','zenrolle_quote.total','zenrolle_quote.total_discount','zenrolle_quote.status','zenrolle_quote.total_tax')
                    ->where('zenrolle_quote.id',$id)->get();

        $invoice  = Quote_items::where('pid',$id)->get();

        $customer['invoice'] = $invoice;        

        $pdf = PDF::loadView('sale.ManageQuota.quotepdf', compact('data','SupplierDetail','invoice'));
       return $pdf->download('zenroller.pdf');
    }

}
