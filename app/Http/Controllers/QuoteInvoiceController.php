<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quote;
use App\Quote_items;
use PDF;
class QuoteInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sale.NewQuota.preview');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Quote = new Quote();
        
        $Quote->company_id = $request->input('company_id');

        $Quote->empid = $request->input('empid');

        $Quote->invoice_no = $request->input('invoice_no');

        $Quote->invoicedate = $request->input('invoicedate');

        $Quote->invoice_duedate = $request->input('invoice_duedate');

        $Quote->refer_no = $request->input('refer_no');

        $Quote->csid = $request->input('customer_id');

        $Quote->warehouse_id = $request->input('warehouse_id');

        $Quote->tax = $request->input('tax');

        $Quote->discount = $request->input('discount');

        $Quote->total_tax = $request->input('total_tax');

        $Quote->total_discount = $request->input('total_discount');

        $Quote->shipping = $request->input('shipping');

        $Quote->sub_total = $request->input('sub_total');

        $Quote->total = $request->input('grand_total');

        $Quote->invoice_note = $request->input('invoice_note');

        $Quote->proposal = $request->input('proposal');

        $Quote->terms = $request->input('terms');
       
        if($Quote->save()){

            $id = $Quote->id;
            $product_array = array();
            $ids = $request->input('product_id');
            $names = $request->input('product_name');
            $quantities = $request->input('qty');
            $pries = $request->input('price');
            $price_types = $request->input('price_type');
            $taxes = $request->input('tax_rate');
            $product_taxes = $request->input('product_tax');
            $discount_rates = $request->input('discount_rate');
            $prodcut_discounts = $request->input('prodcut_discount');
            $totalAmount = $request->input('totalAmount');
            for($i = 0; $i<sizeof($ids); $i++){
                $item = new Quote_items();
                if($names){
                    Quote_items::create([
                        'pid' => $id,
                        'product_id' => $ids[$i],
                        'product_name' => $names[$i],
                        'qty' => $quantities[$i],
                        'price' => $pries[$i],
                        'price_type' => $price_types[$i],
                        'tax' => $product_taxes[$i],
                        'total_tax' => $product_taxes[$i],
                        'discount' => $discount_rates [$i],
                        'total_amount' => $totalAmount[$i]
                    ]);
                }
            }
        }
        return redirect('quoteinvoice/'.$id);

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
        $data = Quote::find($id);
        $SupplierDetail = DB::table('zenrolle_quote')->join('zenrolle_customers','zenrolle_quote.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_quote.invoice_no','zenrolle_quote.refer_no','zenrolle_quote.invoicedate','zenrolle_quote.invoice_duedate','zenrolle_quote.id','zenrolle_quote.sub_total','zenrolle_quote.total')
                    ->where('zenrolle_quote.id',$id)->get();

        $invoice = Quote_items::where('pid',$id)->get();
    
        $customer['invoice'] = $invoice;
        return view('sale.NewQuota.invoice',compact('invoice','data',
        'SupplierDetail'));
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
        $data = Quote::find($id);
        $SupplierDetail = DB::table('zenrolle_quote')->join('zenrolle_customers','zenrolle_quote.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_quote.invoice_no','zenrolle_quote.refer_no','zenrolle_quote.invoicedate','zenrolle_quote.invoice_duedate','zenrolle_quote.id','zenrolle_quote.sub_total','zenrolle_quote.total','zenrolle_quote.total_discount','zenrolle_quote.status','zenrolle_quote.total_tax')
                    ->where('zenrolle_quote.id',$id)->get();

        $invoice  = Quote_items::where('pid',$id)->get();

        $customer['invoice'] = $invoice;        

        $pdf = PDF::loadView('sale.NewQuota.pdf', compact('data','SupplierDetail','invoice'));
       return $pdf->stream('zenroller.pdf');
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
    public function previewquote($id)
    {
        $customer = array();
        $data = Quote::find($id);
        $SupplierDetail = DB::table('zenrolle_quote')->join('zenrolle_customers','zenrolle_quote.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_customers.region','zenrolle_quote.invoice_no','zenrolle_quote.refer_no','zenrolle_quote.invoicedate','zenrolle_quote.invoice_duedate','zenrolle_quote.id','zenrolle_quote.sub_total','zenrolle_quote.total','zenrolle_quote.total_discount','zenrolle_quote.status','zenrolle_quote.total_tax')
                    ->where('zenrolle_quote.id',$id)->get();

        $invoice  = Quote_items::where('pid',$id)->get();
        $customer['invoice'] = $invoice;     
        $data->due_balance = $data->grand_total - $data->payment;
        return view('sale.NewQuota.preview',compact('data','invoice','SupplierDetail'));
    }
}
