<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PurchaseOrder;
use App\PurchaseItem;
use PDF;


class ManagepurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('zenrolle_purcahse')->join('zenrolle_suppliers','zenrolle_purcahse.supplier','=',
                                        'zenrolle_suppliers.id')
                        ->select('zenrolle_suppliers.name','zenrolle_suppliers.address','zenrolle_suppliers.city','zenrolle_suppliers.country','zenrolle_suppliers.phone','zenrolle_suppliers.email','zenrolle_purcahse.invoice_no','zenrolle_purcahse.order_date','zenrolle_purcahse.total','zenrolle_purcahse.id','zenrolle_purcahse.status')->get();
        return view('purchasing.manage_purchase_order.manage_purchase_order',compact('data'));
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
        PurchaseItem::where('pid',$id)->delete();
        PurchaseOrder::where('id',$id)->delete();
        return redirect('/managepurchase')->with('message','Delete Purchase Order Successfully');

    }
    public function pdf($id)
    {
        $customer = array();

        $data = PurchaseOrder::find($id);

        $SupplierDetail = DB::table('zenrolle_purcahse')->join('zenrolle_suppliers','zenrolle_purcahse.supplier','=','zenrolle_suppliers.id')
                ->select('zenrolle_suppliers.name','zenrolle_suppliers.address','zenrolle_suppliers.city','zenrolle_suppliers.country','zenrolle_suppliers.phone','zenrolle_suppliers.email','zenrolle_purcahse.invoice_no','zenrolle_purcahse.reference_no','zenrolle_purcahse.order_date','zenrolle_purcahse.due_date','zenrolle_purcahse.id','zenrolle_purcahse.subtotal','zenrolle_purcahse.total','zenrolle_purcahse.total_discount','zenrolle_purcahse.status','zenrolle_purcahse.total_tax','zenrolle_purcahse.shipping')
                    ->where('zenrolle_purcahse.id',$id)->get();

        $invoice  = PurchaseItem::where('pid',$id)->get();

        $customer['invoice'] = $invoice;        

        $pdf = PDF::loadView('purchasing.manage_purchase_order.purchasepdf', compact('data','SupplierDetail','invoice'));
       return $pdf->download('zenroller.pdf');
    }
}
