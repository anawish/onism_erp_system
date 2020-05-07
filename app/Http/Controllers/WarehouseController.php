<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Warehouse;
use App\Product;
use App\Add_Product_Category;
use App\CreateItem;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                           
        $data = DB::table('zenrolle_warehouse')->select('warehouse_name', 
        'zenrolle_warehouse.id',DB::raw('SUM(IF(warehouse IS NULL, 0, 1)) AS Products'))
        ->leftJoin('zenrolle_produts','zenrolle_warehouse.id','=','zenrolle_produts.warehouse')->groupBy('zenrolle_warehouse.id','zenrolle_warehouse.warehouse_name')->get();
       
        foreach ($data as $key => $value) {
            $Warehouse = $value->id;
            $products = DB::table('zenrolle_produts')->select('zenrolle_produts.receive_qty','zenrolle_produts.retail_price','zenrolle_produts.qty','zenrolle_produts.sold')->where('warehouse', $Warehouse)->get();

            $total_item = 0;
            foreach ($products as $keys => $values) {
                $qty = $values->qty + $values->receive_qty;
                $closing_qty = $qty - $values->sold;
                $total_item = $closing_qty+$total_item;
            }
            $value->total_receiveqty = $total_item;

            $productDetail = DB::table('zenrolle_produts')->join('zenrolle_product_categories','zenrolle_produts.category_id','=','zenrolle_product_categories.id')->select('zenrolle_produts.id','zenrolle_produts.product_name','zenrolle_produts.product_code','zenrolle_produts.retail_price','zenrolle_produts.qty','zenrolle_produts.receive_qty','zenrolle_product_categories.category_name')->where('zenrolle_produts.warehouse',$value->id)->get();
            $item_sum = 0;
            $total_item = 0;
            foreach ($productDetail as $itemkey => $itemvalue) {
                $total_item = $itemvalue->receive_qty * $itemvalue->retail_price;
                $item_sum = $total_item+$item_sum;
            }
            $value->stock_worth = $item_sum;
          
        }
        return view('inventory.warehouse.warehouse',compact('data'));

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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $productDetail = DB::table('zenrolle_produts')->join('zenrolle_product_categories','zenrolle_produts.category_id','=','zenrolle_product_categories.id')->select('zenrolle_produts.id','zenrolle_produts.product_name','zenrolle_produts.product_code','zenrolle_produts.retail_price','zenrolle_produts.qty','zenrolle_produts.receive_qty','zenrolle_produts.sold','zenrolle_product_categories.category_name')->where('zenrolle_produts.warehouse',$id)->get();
        $qty = 0;
        foreach ($productDetail as $key => $value) {
            $product_id = $value->id;
            $qty = $value->qty + $value->receive_qty;
            $closing_qty = $qty - $value->sold;
            $value->closing_stock = $closing_qty;
        }
        // dd($productDetail);
         return view('inventory.warehouse.detail',compact('productDetail'));

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data= DB::table('zenrolle_warehouse')->where('id',$id)->get();
        return view('inventory.warehouse.warehouse_edit',compact('data'));
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
        $warehouse= Warehouse::findOrFail($id);
      
        DB::table('zenrolle_warehouse')->where('id',$id)->update(['warehouse_name'=>$request['warehouse_name'],
            'warehouse_desc'=>$request['warehouse_desc'],
            'bussines_loc'=>$request['bussines_loc']
        ]);
        $warehouse->save();

        return redirect('/warehouse')->with('success','Your Warehouse are updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        DB::table('zenrolle_warehouse')->where('id',$id)->delete();
        return redirect('/warehouse')->with('message','Your Warehouse Delete Successfully');
    }
}
