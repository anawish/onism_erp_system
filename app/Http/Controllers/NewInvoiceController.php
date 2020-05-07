<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Warehouse;
use App\NewInvoice;
use App\Customer;
use App\InvoiceItem;
use App\Product;
use App\InvoiceHistory;
use App\paymentHistory;
class NewInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*
           Get Invoice no  
        */
        $invoice_no = DB::table('zenrolle_invoicess')->select('invoice_no')
                            ->orderBy('invoice_no','desc')->pluck('invoice_no')->first();
        if(is_null($invoice_no))
            $invoice_no = '1001';
        else
            $invoice_no = $invoice_no+1;

        $sale_inovice = DB::table('zenrolle_abbrevition')->select('value')->
                            orderBy('value','desc')->pluck('value')->first();

        $warehouse = DB::table('zenrolle_warehouse')->select('id','warehouse_name','warehouse_desc','bussines_loc')->get();

        $sale_no = DB::table('zenrolle_invoicess')->select('sale_no')
                            ->orderBy('sale_no','desc')->pluck('sale_no')->first();

        if(is_null($sale_no))
            $sale_no = '5500001';
        else
            $sale_no = $sale_no + 1;
        $account = DB::table('zenrolle_account')->where('name','=','Sales')->get();
        $terms = DB::table('zenrolle_terms')->select('id','title','terms')->get();
        $customer = DB::table('zenrolle_customers')->get();
        $product = DB::table('zenrolle_produts')->get();
        return view('sale.SaleInvoices.newinvoice',compact('warehouse','sale_inovice','terms','invoice_no','customer','product','sale_no','account'));
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
        $customer = new NewInvoice();
        
        $customer->company_id = $request->input('company_id');

        $customer->empid = $request->input('empid');

        $customer->invoice_no = $request->input('invoice_no');

        $customer->sale_no = $request->input('sale_no');

        $customer->invoicedate = $request->input('invoicedate');

        $customer->invoice_duedate = $request->input('invoice_duedate');

        $customer->refer_no = $request->input('refer_no');

        $customer->csid = $request->input('customer_id');
        $customer->group_id = $request->input('group_id');
        $customer->warehouse_id = $request->input('warehouse_id');

        $customer->tax = $request->input('tax');

        $customer->total_discount = $request->input('total_discount');

        $customer->total_tax = $request->input('total_tax');

        $customer->shipping = $request->input('shipping');

        $customer->sub_total = $request->input('sub_total');

        $customer->grand_total = $request->input('grand_total');

        $customer->invoice_note = $request->input('invoice_note');

        $customer->terms = $request->input('terms');
        $customer->gl_id = $request->input('gl_id');

        if($customer->save()){

            $id = $customer->id;
            $type = $customer->type;
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
                $item = new InvoiceItem();
                if($names){
                    InvoiceItem::create([
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
            $invocie_detail = DB::table('zenrolle_invoicess')->orderBy('id','desc')->first();
            $gl_id = $invocie_detail->gl_id;
            $type = $invocie_detail->type;
            $doc_no = $invocie_detail->invoice_no;
            $credit_amount = $invocie_detail->grand_total;
            $updated_date = $invocie_detail->invoicedate;
            $doc_des = $invocie_detail->invoice_note;
            
            $paymentHistory = new paymentHistory();
            $paymentHistory->gl_id = $gl_id;
            $paymentHistory->credit = $credit_amount;
            $paymentHistory->updated_date =  $updated_date;
            $paymentHistory->doc_no =  $doc_no;
            $paymentHistory->type = $type;
            $paymentHistory->doc_description = $doc_des;
            $paymentHistory->save();
            $localcustomer = new paymentHistory();
            $localcustomer->gl_id = 4;
            $localcustomer->debit = $credit_amount;
            $localcustomer->updated_date =  $updated_date;
            $localcustomer->doc_no =  $doc_no;
            $localcustomer->type = $type;
            $localcustomer->doc_description = $doc_des;
            $localcustomer->save();
            $check_qty = DB::table('zenrolle_invoicess')->join('zenrolle_invoice_items','zenrolle_invoicess.id','=','zenrolle_invoice_items.pid')->select('zenrolle_invoice_items.product_id','zenrolle_invoice_items.qty','zenrolle_invoicess.id')->where('zenrolle_invoicess.id',$id)->get();
           
            $transcation = DB::table('zenrolle_invoicess')->select('id','invoice_no','grand_total','csid','invoicedate','sale_no','invoice_note')->orderBy('id','desc')->first();

                $invoice_no = $transcation->invoice_no;
                $id = $transcation->id;
                $grand_total = $transcation->grand_total;
                $csid = $transcation->csid;
                $date = $transcation->invoicedate;
                $sale_no = $transcation->sale_no;
                $invoice_note = $transcation->invoice_note;
                $InvoiceHistory = new InvoiceHistory();
                $InvoiceHistory->invoice_id = $id;
                $InvoiceHistory->client_id = $csid;
                $InvoiceHistory->debit = $grand_total;
                $InvoiceHistory->updated_date = $date;
                $InvoiceHistory->invoice_no = $invoice_no;
                $InvoiceHistory->sale_no = $sale_no;
                $InvoiceHistory->payment_note = $invoice_note;
                    $last_record = DB::table('invoice_history')
                        ->select('closing_balance')
                        ->where('client_id',$transcation->csid)
                        ->orderBy('id','desc')->first();
                            $closing_bal = 0;
            if ($last_record) {
                $closing_bal = $last_record->closing_balance + $grand_total;
            }else{
                $closing_bal = $grand_total;
            }
                $InvoiceHistory->closing_balance = $closing_bal;
                $InvoiceHistory->save();
            foreach ($check_qty as $key => $value) {
                $product_qty = DB::table('zenrolle_produts')->where('id',$value->product_id)
                                ->get();
                foreach ($product_qty as $keys => $values) {
                    $total_qty = $values->sold + $value->qty;
                    $update_qty = Product::where('id', "=", $value->product_id)
                                    ->update([
                                        'sold' => $total_qty,
                        ]);
                }
            }
        }
        return redirect('createinvoice/'.$id);
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
    public function customerdetail($id)
    {
        $data =DB::table('zenrolle_customers')->select('id','name','address','city','phone','email')->where('id',$id)->get();

        return json_encode($data);
    }

   /**
     * Search Product the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product($product)
    {
       $data =DB::table('zenrolle_produts')->select('id','product_name','product_code','retail_price','wholsale_price','tax_rate','discount_rate','qty','alert_qty')->where('product_name','LIKE','%'.$product.'%')->get();
        return json_encode($data);
    }


    /**
     * Search Product Detail the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productDetail($id)
    {
        $data =DB::table('zenrolle_produts')->select('id','product_name','product_code','retail_price','tax_rate','discount_rate','receive_qty')->where('id',$id)->get();
        return json_encode($data);
    }
    // Shipping Detail 
    public function shippingDetail($id)
    {
        $data =DB::table('zenrolle_customers')->where('id',$id)->get();
         return json_encode($data);
    }

}
