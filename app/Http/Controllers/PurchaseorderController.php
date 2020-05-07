<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\PurchaseOrder;
use App\NewInvoice;
use Carbon\Carbon;
use App\PurchaseItem;
use Redirect;
use App\pur_history;

class PurchaseorderController extends Controller
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
      
        $invoice_no = DB::table('zenrolle_purcahse')->select('invoice_no')
                            ->orderBy('invoice_no','desc')->pluck('invoice_no')->first(); 

        if(is_null($invoice_no))
                $invoice_no = '1001';
        else
            $invoice_no = $invoice_no+1;

        /*
            Get data from Warehouse
        */  
        $purchase_order = DB::table('purchase_numer')->select('value')
                                    ->orderBy('value','desc')->pluck('value')->first();

        $tax = DB::table('tax')->select('id','title')->get();

        $payment_term = DB::table('zenrolle_paymentterms')->select('id','title')->get();

        $data = DB::table('zenrolle_warehouse')->select('id','warehouse_name')->get();
        $product = DB::table('zenrolle_produts')->get();
        $supplier = DB::table('zenrolle_suppliers')->get();
        return view('purchasing.purchase_order.purchaseorder',compact('data','tax','purchase_order','invoice_no','payment_term','supplier','product'));


       
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
        $Customer_info = new PurchaseOrder();
        $Customer_info->supplier = $request->input('supplier');
        $Customer_info->company_id = $request->input('company_id');
        $Customer_info->emp_id = $request->input('emp_id');
        $Customer_info->invoice_no = $request->input('invoice_no');
        $Customer_info->reference_no = $request->input('reference_no');
        $Customer_info->order_date = $request->input('order_date');
        $Customer_info->due_date = $request->input('due_date');
        $Customer_info->warehouse = $request->input('warehouse');
        $Customer_info->tax = $request->input('tax');
        $Customer_info->discount = $request->input('discount');
        $Customer_info->invoice_note = $request->input('invoice_note');
        $Customer_info->subtotal = $request->input('subtotal');
        $Customer_info->total_tax = $request->input('total_tax');
        $Customer_info->total_discount = $request->input('total_discount');
        $Customer_info->shipping = $request->input('shipping');
        $Customer_info->pyterm = $request->input('pyterm');
        $Customer_info->total = $request->input('total');
        if($Customer_info->save()){

            $id = $Customer_info->id;
            $invoice_no = $Customer_info->invoice_no;
            $product_array = array();
            $ids = $request->input('product_id');
            $names = $request->input('product_name');
            $product_codes = $request->input('product_code');
            $quantities = $request->input('qty');
            $pries = $request->input('price');
            $product_taxes = $request->input('product_tax');
            $pro_taxes = $request->input('product_tax');
            $prodcut_discounts = $request->input('prodcut_discount');
            $ammounts = $request->input('ammount');
            for($i = 0; $i<sizeof($ids); $i++){
                $item = new PurchaseItem();
                if($names){
                    PurchaseItem::create([
                        'pid' => $id,
                        'invoice_no' => $invoice_no,
                        'product_id' => $ids[$i],
                        'product_name' => $names[$i],
                        'qty' => $quantities[$i],
                        'price' => $pries[$i],
                        'product_code' => $product_codes[$i],
                        'balance_qty' => $quantities[$i],
                        'tax' => $product_taxes[$i],
                        'total_tax' => $pro_taxes[$i],
                        'discount' => $prodcut_discounts[$i],
                        'ammount' => $ammounts[$i]
                    ]);
                }
            }
        }
        $transcation = DB::table('zenrolle_purcahse')->select('id','total','supplier')->orderBy('id','desc')->first();
        $po_id = $transcation->id;
        $debit = $transcation->total;
        $vendor_id = $transcation->supplier;
        $Payment_history = new pur_history();
        $Payment_history->po_id = $po_id;
        $Payment_history->debit = $debit;
        
            $last_record = DB::table('zenrolle__pur_history')->select('closing_balance')
                            ->where('po_id',$po_id)->orderBy('id','desc')->first();
                    $closing_balance = 0;
                if($last_record){
                    $closing_balance = $last_record->closing_balance + $debit;
                }
                else{
                    $closing_balance = $debit;
                }
            $Payment_history->closing_balance = $closing_balance;
            $Payment_history->vendor_id = $vendor_id;
            $Payment_history->save();
        return redirect('getinvoice/'.$id);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($query)
    {
        $data =DB::table('zenrolle_suppliers')->select('id','name','address','city','phone','email')->where('name','LIKE','%'.$query.'%')->get();
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

       $customer = array();
        $data = PurchaseOrder::find($id);

        $SupplierDetail = DB::table('zenrolle_purcahse')->join('zenrolle_suppliers','zenrolle_purcahse.supplier','=','zenrolle_suppliers.id')
                ->select('zenrolle_suppliers.name','zenrolle_suppliers.address','zenrolle_suppliers.city','zenrolle_suppliers.country','zenrolle_suppliers.phone','zenrolle_suppliers.email','zenrolle_purcahse.invoice_no','zenrolle_purcahse.reference_no','zenrolle_purcahse.order_date','zenrolle_purcahse.due_date','zenrolle_purcahse.id','zenrolle_purcahse.status','zenrolle_purcahse.invoice_note','zenrolle_purcahse.total_tax','zenrolle_purcahse.shipping','zenrolle_purcahse.total')
                    ->where('zenrolle_purcahse.id',$id)->get();

        $payment_term = DB::table('zenrolle_paymentterms')->select('id','title')->get();

        $invoice = PurchaseItem::where('pid',$id)->get();

        $customer['invoice'] = $invoice;

        $purchase_order = DB::table('purchase_numer')->select('value')
                                    ->orderBy('value','desc')->pluck('value')->first();

        return view('purchasing.purchase_order.edit',compact('invoice','data',
        'SupplierDetail','payment_term','purchase_order'));
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
    public function SupplierDetail($id)
    {
        $data =DB::table('zenrolle_suppliers')->select('id','name','address','city','phone','email')->where('id',$id)->get();

        return json_encode($data);
    }

    /**
     * Product Search the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productsearch($searchpro)
    {
       $data =DB::table('zenrolle_produts')->select('id','product_name','product_code','retail_price','wholsale_price','tax_rate','discount_rate','qty','alert_qty')->where('product_name','LIKE','%'.$searchpro.'%')->get();
        return json_encode($data);
    }

     /**
     * Product Details the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function ProductDeatail($id)
    {
        $data =DB::table('zenrolle_produts')->select('id','product_name','product_code','retail_price','tax_rate','discount_rate')->where('id',$id)->get();
        return json_encode($data);
    }

}
