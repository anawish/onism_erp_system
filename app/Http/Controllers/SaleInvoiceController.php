<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Warehouse;
use App\NewInvoice;
use App\Customer;
use App\InvoiceItem;
use App\InvoiceHistory;
use App\paymentHistory;
use PDF;
class SaleInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function createinvoice($id)
    {
        $paymet_method = DB::table('zenrolle_account')->join('zenrolle_paymentmethod','zenrolle_account.name','=','zenrolle_paymentmethod.payment_type')->select('zenrolle_account.id','zenrolle_account.name','zenrolle_account.gl_no','zenrolle_paymentmethod.value')->get(); 
        
        $customer = array();
        $data = NewInvoice::find($id);
        $SupplierDetail = DB::table('zenrolle_invoicess')->join('zenrolle_customers','zenrolle_invoicess.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.id','zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_customers.name_s','zenrolle_customers.phone_s','zenrolle_customers.email_s','zenrolle_customers.address_s','zenrolle_customers.city_s','zenrolle_customers.country_s','zenrolle_invoicess.invoice_no','zenrolle_invoicess.refer_no','zenrolle_invoicess.invoicedate','zenrolle_invoicess.invoice_duedate','zenrolle_invoicess.id','zenrolle_invoicess.sub_total','zenrolle_invoicess.grand_total','zenrolle_invoicess.payment','zenrolle_invoicess.pmethod','zenrolle_invoicess.invoice_note')
                    ->where('zenrolle_invoicess.id',$id)->get();
        $invoice = InvoiceItem::where('pid',$id)->get();
        $customer['invoice'] = $invoice;
        $account = DB::table('zenrolle_account')->get();
        $data->due_balance = $data->grand_total-$data->payment;
        //$paymet_method = DB::table('zenrolle_paymentmethod')->get();
       return view('sale.SaleInvoices.createinvoice',compact('invoice','data',
        'SupplierDetail','paymet_method','account')); 
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('SaleInvoice');
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
        $data = NewInvoice::find($id);
        $SupplierDetail = DB::table('zenrolle_invoicess')->join('zenrolle_customers','zenrolle_invoicess.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_invoicess.invoice_no','zenrolle_invoicess.refer_no','zenrolle_invoicess.invoicedate','zenrolle_invoicess.invoice_duedate','zenrolle_invoicess.id','zenrolle_invoicess.sub_total','zenrolle_invoicess.grand_total','zenrolle_invoicess.total_discount','zenrolle_invoicess.status','zenrolle_invoicess.total_tax')
                    ->where('zenrolle_invoicess.id',$id)->get();

        $invoice  = InvoiceItem::where('pid',$id)->get();

        $customer['invoice'] = $invoice;     

        $data->due_balance = $data->grand_total - $data->payment;
  
        $pdf = PDF::loadView('sale.SaleInvoices.pdf', compact('data','SupplierDetail','invoice','paymet_method'));
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
        $data = NewInvoice::find($id);
        $SupplierDetail = DB::table('zenrolle_invoicess')->join('zenrolle_customers','zenrolle_invoicess.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_customers.region','zenrolle_invoicess.invoice_no','zenrolle_invoicess.refer_no','zenrolle_invoicess.invoicedate','zenrolle_invoicess.invoice_duedate','zenrolle_invoicess.id','zenrolle_invoicess.sub_total','zenrolle_invoicess.grand_total','zenrolle_invoicess.total_discount','zenrolle_invoicess.status','zenrolle_invoicess.total_tax')
                    ->where('zenrolle_invoicess.id',$id)->get();

        $invoice  = InvoiceItem::where('pid',$id)->get();
        $customer['invoice'] = $invoice;     
        $data->due_balance = $data->grand_total - $data->payment;
        return view('sale.SaleInvoices.preview',compact('data','invoice','SupplierDetail'));
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

    public function Updatecourierstatus(Request $request)
    {   
        $updatePayment = new NewInvoice();
        $updatePayment->id = $request->input('id');
        $updatePayment->payment = $request->input('payment');
        $updatePayment->pmethod = $request->input('pmethod');
        $updatePayment->account_type = $request->input('account_type');
        $updatePayment->update = $request->input('updated_date');
        $update_payment = DB::table('zenrolle_invoicess')->where('id',$updatePayment->id)
                            ->pluck('payment')->first();
        $total_amount = DB::table('zenrolle_invoicess')->where('id',$updatePayment->id)
                            ->pluck('grand_total')->first();
        $Total_currrent = $update_payment + $updatePayment->payment;
        $status = '';
        if($Total_currrent < $total_amount){
            $status = 'Partial';
        }
        else{
            $status = 'Paid';
        }
        NewInvoice::where('id', "=", $updatePayment->id)->update([
                'payment' => $updatePayment->payment+$update_payment,
                'pmethod' => $updatePayment->pmethod,
                'status'  => $status,
                'account_type'=> $updatePayment->account_type
            ]);
        $InvoiceHistory = new InvoiceHistory();
        $InvoiceHistory->invoice_id = $request->input('id');
        $InvoiceHistory->payment = $request->input('payment');
        $InvoiceHistory->payment_method = $request->input('pmethod');
        $InvoiceHistory->client_id = $request->input('client_id');
        $InvoiceHistory->account_type = $request->input('account_type');
        $InvoiceHistory->updated_date = $request->input('updated_date');
        $InvoiceHistory->invoice_no = $request->input('invoice_no');
        $InvoiceHistory->payment_note = $request->input('payment_note');
        $InvoiceHistory->type = $request->input('type');
        $last_record = DB::table('invoice_history')
                        ->select('closing_balance')
                        ->where('client_id',$request->input('client_id'))
                        ->orderBy('id','desc')->first();
                            $closing_bal = 0;

            if ($last_record) {
                $closing_bal = $last_record->closing_balance - $request->input('payment');
            }else{
                $closing_bal = 0;
            }
            $InvoiceHistory->closing_balance = $closing_bal;

        $InvoiceHistory->save();
        $paymentHistory = new paymentHistory();
        $paymentHistory->gl_id =  $request->input('pmethod');
        $paymentHistory->updated_date = $request->input('updated_date');
        $paymentHistory->debit= $request->input('payment');
        $paymentHistory->doc_no = $request->input('invoice_no');
        $paymentHistory->type =  $request->input('type');
        $paymentHistory->doc_description = $request->input('payment_note');
        $paymentHistory->save();
        $return_data = DB::table('zenrolle_invoicess')->where('id',$updatePayment->id)->get();
        return json_encode($return_data);
    }

    //Shipping Address
    public function shippingAddress(Request $request)
    {
        $Customer = new Customer();
        $Customer->id = $request->input('client_id');
        $Customer->name_s = $request->input('ship_name');
        $Customer->email_s = $request->input('ship_email');
        $Customer->address_s = $request->input('ship_address');
        Customer::where('id', "=", $Customer->id)->update([
                'name_s' =>  $Customer->name_s,
                'email_s' =>  $Customer->email_s,
                'address_s' =>$Customer->address_s,
            ]);
         return json_encode($Customer);
    }
}
