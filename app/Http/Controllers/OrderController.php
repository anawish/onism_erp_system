<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SaleOrders;
use App\OrderDetail;
use PDF;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_no = DB::table('zenrolle_saleorder')->select('order_no')
                            ->orderBy('order_no','desc')->pluck('order_no')->first(); 
        if(is_null($order_no))
            $order_no = '1001';
        else
            $order_no = $order_no+1;

        $customer = DB::table('zenrolle_customers')->get();
        $product = DB::table('zenrolle_produts')->get();
        return view('sale.Orders.order',compact('customer','order_no','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('zenrolle_saleorder')->join('zenrolle_customers','zenrolle_saleorder.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_saleorder.order_no','zenrolle_saleorder.order_date','zenrolle_saleorder.total','zenrolle_saleorder.id')
                    ->get();
       return view('sale.ManageOrder.index',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Saleorder = new SaleOrders();
        $Saleorder->company_id = $request->input('company_id');
        $Saleorder->csid = $request->input('client_id');
        $Saleorder->order_no = $request->input('order_no');
        $Saleorder->po_no = $request->input('po_no');
        $Saleorder->qty_kg = $request->input('qty_kg');
        $Saleorder->qty_each = $request->input('qty_each');
        $Saleorder->order_date = $request->input('order_date');
        $Saleorder->delivery_date = $request->input('delivery_date');
        $Saleorder->order_note = $request->input('order_note');
        $Saleorder->sub_total = $request->input('sub_total');
        $Saleorder->shipping = $request->input('shipping');
        $Saleorder->total = $request->input('totalamount');
        if($Saleorder->save()){
            $id = $Saleorder->id;
            $order_no = $Saleorder->order_no;
            $product_array = array();
            $ids = $request->input('product_id');
            $names = $request->input('product_name');
            $qtys = $request->input('qty');
            $pries = $request->input('price');
            $codes = $request->input('code');
            $units = $request->input('unit');
            $amounts = $request->input('amount');
            for($i = 0; $i<sizeof($ids); $i++){
                $item = new OrderDetail();
                if($names){
                    OrderDetail::create([
                        'pid' => $id,
                        'product_id' => $ids[$i],
                        'product_name' => $names[$i],
                        'qty' => $qtys[$i],
                        'price' => $pries[$i],
                        'code' => $codes[$i],
                        'unit' => $units[$i],
                        'amount' => $amounts[$i]
                    ]);
                }
            }
        }
        return redirect('orderinvoice/'.$id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data =DB::table('zenrolle_customers')->where('id',$id)->get();
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
        $data = SaleOrders::find($id);
        $SupplierDetail = DB::table('zenrolle_saleorder')->join('zenrolle_customers',
                        'zenrolle_saleorder.csid','=','zenrolle_customers.id')
                    ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_saleorder.order_no','zenrolle_saleorder.po_no','zenrolle_saleorder.order_date','zenrolle_saleorder.delivery_date','zenrolle_saleorder.id','zenrolle_saleorder.sub_total','zenrolle_saleorder.shipping','zenrolle_saleorder.total')
                    ->where('zenrolle_saleorder.id',$id)->get();
        $invoice  = OrderDetail::where('pid',$id)->get();
        $customer['invoice'] = $invoice;        
        $pdf = PDF::loadView('sale.Orders.print', compact('data','SupplierDetail','invoice'));
        return $pdf->stream('zenrolle.print');
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

    public function item($pname)
    {
        $data =DB::table('zenrolle_produts')->where('product_name','LIKE','%'.$pname.'%')->get();
        return json_encode($data);
    }
    public function itemdetail($id)
    {
        $data =DB::table('zenrolle_produts')->where('id',$id)->get();
        return json_encode($data);
    }

    public function orderinvoice($id)
    {
        $customer = array();
        $data = SaleOrders::find($id);
        $SupplierDetail = DB::table('zenrolle_saleorder')->join('zenrolle_customers','zenrolle_saleorder.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_saleorder.order_no','zenrolle_saleorder.order_date','zenrolle_saleorder.delivery_date','zenrolle_saleorder.id','zenrolle_saleorder.sub_total','zenrolle_saleorder.total','zenrolle_saleorder.po_no','zenrolle_saleorder.order_note')
                    ->where('zenrolle_saleorder.id',$id)->get();

        $invoice = OrderDetail::where('pid',$id)->get();
        $customer['invoice'] = $invoice;
         return view('sale.Orders.invocie',compact('invoice','data',
        'SupplierDetail'));
    }

    public function orderpreview($id)
    {
        $customer = array();
        $data = SaleOrders::find($id);
        $SupplierDetail = DB::table('zenrolle_saleorder')->join('zenrolle_customers','zenrolle_saleorder.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_customers.region','zenrolle_saleorder.order_no','zenrolle_saleorder.po_no','zenrolle_saleorder.order_date','zenrolle_saleorder.delivery_date','zenrolle_saleorder.id','zenrolle_saleorder.sub_total','zenrolle_saleorder.total')
                    ->where('zenrolle_saleorder.id',$id)->get();

        $invoice  = OrderDetail::where('pid',$id)->get();
        $customer['invoice'] = $invoice;     
        $data->due_balance = $data->grand_total - $data->payment;
        return view('sale.Orders.preview',compact('data','invoice','SupplierDetail'));
    }

    public function downloadpdf($id)
    {
        $customer = array();
        $data = SaleOrders::find($id);
        $SupplierDetail = DB::table('zenrolle_saleorder')->join('zenrolle_customers','zenrolle_saleorder.csid','=','zenrolle_customers.id')
                ->select('zenrolle_customers.name','zenrolle_customers.address','zenrolle_customers.city','zenrolle_customers.country','zenrolle_customers.phone','zenrolle_customers.email','zenrolle_saleorder.order_no','zenrolle_saleorder.po_no','zenrolle_saleorder.order_date','zenrolle_saleorder.delivery_date','zenrolle_saleorder.id','zenrolle_saleorder.sub_total','zenrolle_saleorder.shipping','zenrolle_saleorder.total')
                    ->where('zenrolle_saleorder.id',$id)->get();

        $invoice  = OrderDetail::where('pid',$id)->get();

        $customer['invoice'] = $invoice;        

        $downloadpdf = PDF::loadView('sale.ManageOrder.downloadpdf', compact('data','SupplierDetail','invoice'));
       return $downloadpdf->download('zenrolle.pdf');
    }

}
