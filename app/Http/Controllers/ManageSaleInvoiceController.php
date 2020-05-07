<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\InvoiceItem;
use App\NewInvoice;
use PDF;
use Carbon\Carbon;
class ManageSaleInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $date=date('Y-m-d');
        
        $data = DB::table('zenrolle_invoicess')->join('zenrolle_customers','zenrolle_invoicess.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_invoicess.invoice_no','zenrolle_invoicess.invoicedate','zenrolle_invoicess.grand_total','zenrolle_invoicess.id','zenrolle_invoicess.status','zenrolle_invoicess.payment','zenrolle_invoicess.invoicedate','zenrolle_invoicess.invoice_duedate')
                    ->get();
        return view('sale.ManageSaleInvoices.manage-sale-invoice',compact('data','date'));
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
        
       InvoiceItem::where('pid',$id)->delete(); 
       NewInvoice::where('id',$id)->delete();
        return redirect('/managesaleinvoice')->with('message','Delete Invoice Successfully');
    }


    public function pdf($id){

        $customer = array();
        $data = NewInvoice::find($id);
        $SupplierDetail = DB::table('zenrolle_invoicess')->join('zenrolle_customers','zenrolle_invoicess.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_invoicess.invoice_no','zenrolle_invoicess.refer_no','zenrolle_invoicess.invoicedate','zenrolle_invoicess.invoice_duedate','zenrolle_invoicess.id','zenrolle_invoicess.sub_total','zenrolle_invoicess.grand_total','zenrolle_invoicess.total_discount','zenrolle_invoicess.status','zenrolle_invoicess.total_tax')
                    ->where('zenrolle_invoicess.id',$id)->get();

        $invoice  = InvoiceItem::where('pid',$id)->get();

        $customer['invoice'] = $invoice;        

        $pdf = PDF::loadView('sale.ManageSaleInvoices.pdf', compact('data','SupplierDetail','invoice'));
       return $pdf->download('zenroller.pdf');
    }
    
}
