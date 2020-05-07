<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Warehouse;
use App\PurchaseOrder;
use App\PurchaseItem;
use App\Product;
use PDF;
use App\GRN;
use App\GRNDetail;

class GRNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('zenrolle_purcahse')->join('zenrolle_warehouse',
                        'zenrolle_purcahse.warehouse','=','zenrolle_warehouse.id')
                        ->select('zenrolle_purcahse.id','zenrolle_purcahse.invoice_no','zenrolle_warehouse.warehouse_name','zenrolle_purcahse.order_date')
                        ->orderBy('id','DESC')->get();
        foreach ($data as $key => $value) {
            
           $status= DB::table('purchase_items')->join('zenrolle_purcahse','purchase_items.pid','=','zenrolle_purcahse.id')->select('purchase_items.qty','purchase_items.balance_qty')->where('pid','=',$value->id)->get();
           $sum_qty = 0;
           $sum_blnce_qty = 0;

          foreach ($status as $keys => $values) {
            $sum_qty = $values->qty+$sum_qty;
            $sum_blnce_qty = $values->balance_qty+$sum_blnce_qty;

          }
            if ($sum_qty ==  $sum_blnce_qty) {

                $data[$key]->status = 'Pending';
            }
            if ($sum_qty > $sum_blnce_qty) {

                $data[$key]->status='Partial';
            } 
            if($sum_blnce_qty == 0){

               $data[$key]->status='Complete';
            }
        }
        return view('inventory.GRN.index',compact('data'));
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
       
        $GRN_info = new GRN();
        $GRN_info->doc_date = $request->input('doc_date');
        $GRN_info->posting_date = $request->input('posting_date');
        $GRN_info->warehouse = $request->input('warehouse');
        $GRN_info->inward_gate =$request->input('inward_gate');
        $GRN_info->po_no  = $request->input('po_no');
        $GRN_info->grn_no = $request->input('grn_no');
        $GRN_info->delivery_note = $request->input('delivery_note');
        if($GRN_info->save())
            {
                $id = $GRN_info->id; 
                $grn_no = $GRN_info->grn_no;
                $product_array = array();
                $ids = $request->input('product_id');
                $names = $request->input('product_name');
                $product_codes = $request->input('product_code');
                $order_qtys = $request->input('order_qty');
                $receive_qtys = $request->input('receive_qty');
                $units = $request->input('unit');
                $comments = $request->input('comments');
                for($i = 0; $i<sizeof($ids); $i++)
                {
                    $items = new GRNDetail();
                    if($names)
                    {
                        GRNDetail::create([
                            'grn_id' => $id,
                            'grn_no' => $grn_no,
                            'product_id' => $ids[$i],
                            'product_name' => $names[$i],
                            'product_code' => $product_codes[$i],
                            'order_qty'    => $order_qtys[$i],
                            'receive_qty'  => $receive_qtys[$i],
                            'unit'         => $units[$i],
                            'comments'     => $comments[$i]
                        ]);
                    }
                }
                $blance_qty = DB::table('zenrolle_grn')
                                ->join('zenrolle_grn_detail','zenrolle_grn.id',
                                        '=','zenrolle_grn_detail.grn_id')
                                ->select('zenrolle_grn.grn_no','zenrolle_grn_detail.product_id','zenrolle_grn_detail.receive_qty','zenrolle_grn.po_no','zenrolle_grn_detail.order_qty')
                                ->where('zenrolle_grn.id',$id)->get();
                   
                foreach($blance_qty as $items)
                {
                  $blnce_qty = $items->order_qty - $items->receive_qty;
                    PurchaseItem::where('product_id',"=", $items->product_id)->update([
                        'balance_qty' => $blnce_qty,
                    ]);
                }
                $receive_qty = DB::table('zenrolle_grn')
                                ->join('zenrolle_grn_detail','zenrolle_grn.id',
                                        '=','zenrolle_grn_detail.grn_id')
                                ->select('zenrolle_grn.grn_no','zenrolle_grn_detail.product_id','zenrolle_grn_detail.receive_qty','zenrolle_grn.po_no')
                                ->where('zenrolle_grn.id',$id)->get();
                foreach ($receive_qty as $key => $value) {

                  $product_qty = DB::table('zenrolle_produts')->where('id',$value->product_id)->get();

                  foreach ($product_qty as $keys => $values) {
                      $total_qty=$values->receive_qty+$value->receive_qty;
                      $update_qty=Product::where('id', "=", $value->product_id)->
                        update([
                          'receive_qty' => $total_qty,
                        ]);
                  } 
                }
                // dd($update_qty);
                // if($update_qty ){
                //   var_dump($update_qty);
                // }
                // else{
                //   echo "";
                // }
            }
            return redirect('grnprint/'.$id)->with('success','Your GRN are successfuly update');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
           Get GRN No  
        */
        $grn_no = DB::table('zenrolle_grn')->select('grn_no') ->orderBy('grn_no','desc')
                            ->pluck('grn_no')->first(); 
            if(is_null($grn_no))
                    $grn_no = '3001';
            else
                $grn_no = $grn_no+1;
        /*
            Get PO Detail
        */
        $array = array();
        $data = PurchaseOrder::find($id);
        $purchaseDetail = DB::table('zenrolle_purcahse')->join('zenrolle_warehouse','zenrolle_purcahse.warehouse','=','zenrolle_warehouse.id')->select('zenrolle_warehouse.id','zenrolle_warehouse.warehouse_name')->where('zenrolle_purcahse.id',$id)->get();
        $purchaseItem = PurchaseItem::where('pid',$id)->where('balance_qty','!=',0)->get();
        $array['purchaseItem'] = $purchaseItem;
        return view('inventory.GRN.create',compact('purchaseItem','data','purchaseDetail','grn_no'));

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
                ->select('zenrolle_suppliers.name','zenrolle_suppliers.address','zenrolle_suppliers.city','zenrolle_suppliers.country','zenrolle_suppliers.phone','zenrolle_suppliers.email','zenrolle_purcahse.invoice_no','zenrolle_purcahse.reference_no','zenrolle_purcahse.order_date','zenrolle_purcahse.due_date','zenrolle_purcahse.id','zenrolle_purcahse.subtotal','zenrolle_purcahse.total','zenrolle_purcahse.total_discount','zenrolle_purcahse.status','zenrolle_purcahse.total_tax','zenrolle_purcahse.shipping')
                    ->where('zenrolle_purcahse.id',$id)->get();

        $product  = PurchaseItem::where('pid',$id)->get();

        $customer['product'] = $product;       

        $pdf = PDF::loadView('inventory.GRN.print',compact('data','SupplierDetail','product'));
        return $pdf->stream('GRN.pdf');
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


    public function pdf($id)
    {

      $customer = array();

        $data = PurchaseOrder::find($id);

        $SupplierDetail = DB::table('zenrolle_purcahse')->join('zenrolle_suppliers','zenrolle_purcahse.supplier','=','zenrolle_suppliers.id')
                ->select('zenrolle_suppliers.name','zenrolle_suppliers.address','zenrolle_suppliers.city','zenrolle_suppliers.country','zenrolle_suppliers.phone','zenrolle_suppliers.email','zenrolle_purcahse.invoice_no','zenrolle_purcahse.reference_no','zenrolle_purcahse.order_date','zenrolle_purcahse.due_date','zenrolle_purcahse.id','zenrolle_purcahse.subtotal','zenrolle_purcahse.total','zenrolle_purcahse.total_discount','zenrolle_purcahse.status','zenrolle_purcahse.total_tax','zenrolle_purcahse.shipping')
                    ->where('zenrolle_purcahse.id',$id)->get();

        $product  = PurchaseItem::where('pid',$id)->get();

        $customer['product'] = $product;

        $pdf = PDF::loadView('inventory.GRN.pdf', compact('data','SupplierDetail','product'));
       return $pdf->download('GRN.pdf');
    }

    public function print($id)
    {
        $customer = array();
        $grn_no = DB::table('zenrolle_grn')->select('grn_no') ->orderBy('grn_no','desc')
                            ->pluck('grn_no')->first(); 
            if(is_null($grn_no))
                    $grn_no = '3001';
            else
                $grn_no = $grn_no+1;

        $data = DB::table('zenrolle_purcahse')->where('id',$id)->get();

        $detail = DB::table('zenrolle_warehouse')->join('zenrolle_purcahse','zenrolle_warehouse.id','=','zenrolle_purcahse.warehouse')->where('zenrolle_purcahse.id',$id)->get();
        $product = PurchaseItem::where('pid',$id)->get();
        $customer['product'] = $product;
        $pdf = PDF::loadView('inventory.GRN.printinvoice', compact('data','grn_no','detail',
                'product'));
       return $pdf->stream('GRN.pdf');
    }
  
}
