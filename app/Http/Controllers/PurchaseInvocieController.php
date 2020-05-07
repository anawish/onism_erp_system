<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\PurchaseOrder;
use App\PurchaseItem;
use App\pur_history;
use PDF;

class PurchaseInvocieController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getinvoice($id) 

    {
        $customer = array();
        $data = PurchaseOrder::find($id);
        $SupplierDetail = DB::table('zenrolle_purcahse')->join('zenrolle_suppliers','zenrolle_purcahse.supplier','=','zenrolle_suppliers.id')
                ->select('zenrolle_suppliers.id','zenrolle_suppliers.name','zenrolle_suppliers.address','zenrolle_suppliers.city','zenrolle_suppliers.country','zenrolle_suppliers.phone','zenrolle_suppliers.email','zenrolle_purcahse.invoice_no','zenrolle_purcahse.reference_no','zenrolle_purcahse.order_date','zenrolle_purcahse.due_date','zenrolle_purcahse.payment_made','zenrolle_purcahse.invoice_note')
                    ->where('zenrolle_purcahse.id',$id)->get();
        $invoice = PurchaseItem::where('pid',$id)->get();
       
        $customer['invoice'] = $invoice;
        $payment_method = DB::table('zenrolle_paymentmethod')->select('id','payment_type')
                        ->get();
        $data->due_balance = $data->total - $data->payment_made;
        return view('purchasing.purchase_order.create',compact('invoice','data',
        'SupplierDetail','payment_method')); 
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
     
        $customer = array();

        $data = PurchaseOrder::find($id);

        $SupplierDetail = DB::table('zenrolle_purcahse')->join('zenrolle_suppliers','zenrolle_purcahse.supplier','=','zenrolle_suppliers.id')
                ->select('zenrolle_suppliers.name','zenrolle_suppliers.address','zenrolle_suppliers.city','zenrolle_suppliers.country','zenrolle_suppliers.phone','zenrolle_suppliers.email','zenrolle_purcahse.invoice_no','zenrolle_purcahse.reference_no','zenrolle_purcahse.order_date','zenrolle_purcahse.due_date','zenrolle_purcahse.id','zenrolle_purcahse.subtotal','zenrolle_purcahse.total','zenrolle_purcahse.total_discount','zenrolle_purcahse.status','zenrolle_purcahse.total_tax','zenrolle_purcahse.shipping')
                    ->where('zenrolle_purcahse.id',$id)->get();

        $invoice  = PurchaseItem::where('pid',$id)->get();

        $customer['invoice'] = $invoice;        
        $data->due_balance = $data->total - $data->payment_made;
       
        $pdf = PDF::loadView('purchasing.purchase_order.pdf', compact('data','SupplierDetail','invoice'));
       return $pdf->stream('zenroller.pdf');   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = array();
        $data = PurchaseOrder::find($id);
        $SupplierDetail = DB::table('zenrolle_purcahse')->join('zenrolle_suppliers','zenrolle_purcahse.supplier','=','zenrolle_suppliers.id')
                ->select('zenrolle_suppliers.name','zenrolle_suppliers.address','zenrolle_suppliers.city','zenrolle_suppliers.country','zenrolle_suppliers.phone','zenrolle_suppliers.email','zenrolle_suppliers.region','zenrolle_purcahse.invoice_no','zenrolle_purcahse.reference_no','zenrolle_purcahse.order_date','zenrolle_purcahse.due_date','zenrolle_purcahse.id','zenrolle_purcahse.subtotal','zenrolle_purcahse.total','zenrolle_purcahse.total_discount','zenrolle_purcahse.status','zenrolle_purcahse.total_tax','zenrolle_purcahse.shipping')
                    ->where('zenrolle_purcahse.id',$id)->get();
        $invoice  = PurchaseItem::where('pid',$id)->get();
        $customer['invoice'] = $invoice;        
        
        $data->due_balance = $data->total - $data->payment_made;
        return view('purchasing.purchase_order.preview',compact('data','SupplierDetail','invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
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

    public function changestatus(Request $request)
    {
        echo "hyyyyhy";
        exit();

        $UpdateStatus = PurchaseOrder::find($id);
        DB::table('zenrolle_purcahse')->where('id',$id)->update(
            ['status' => $request['status'] ]);
        $UpdateStatus->save();  
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function makepayment(Request $request)
    {
        $updatePayment = new PurchaseOrder();
        $updatePayment->payment_made = $request->input('payment_made');
        $updatePayment->payment_method = $request->input('payment_method');
        $updatePayment->account = $request->input('account');
        $updatePayment->id = $request->input('id');
        $payment_made = DB::table('zenrolle_purcahse')->where('id',$updatePayment->id)
                            ->pluck('payment_made')->first();
        $total_amount = DB::table('zenrolle_purcahse')->where('id',$updatePayment->id)
                            ->pluck('total')->first();
        $Total_currrent = $payment_made + $updatePayment->payment_made;
        $status = '';
        if($Total_currrent < $total_amount){
            $status = 'Partial';
        }
        else{
            $status = 'Paid';
        }
        PurchaseOrder::where('id','=',$updatePayment->id)->update([
                            'payment_made' => $updatePayment->payment_made+$payment_made,
                            'payment_method' => $updatePayment->payment_method,
                            'account' => $updatePayment->account,
                            'status'  => $status
                    ]);
        $Payment_history = new pur_history();
        $Payment_history->po_id = $request->input('id');
        $Payment_history->payment = $request->input('payment_made');
        $Payment_history->payment_note = $request->input('payment_note');
        $Payment_history->payment_method = $request->input('payment_method');
        $Payment_history->updated_date = $request->input('updated_date');
        $Payment_history->vendor_id = $request->input('vendor_id');
        $last_record = DB::table('zenrolle__pur_history')->select('closing_balance')
                            ->where('po_id',$request->input('id'))->orderBy('id','desc')->first();
                    $closing_bala = 0 ;
                if($last_record){
                   $closing_bala = $last_record->closing_balance - $request->input('payment_made');
                }
                else{
                    $closing_bala = 0;
                }
        $Payment_history->closing_balance = $closing_bala;
        $Payment_history->save();
        $return_response = DB::table('zenrolle_purcahse')->where('id',$updatePayment->id)
                                ->get();
        return json_encode($return_response);      
    }

}
