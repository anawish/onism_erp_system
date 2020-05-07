<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\ProductManage;

class ProductManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = DB::table('zenrolle_produts')->count();

        $data = DB::table('zenrolle_produts')->join('zenrolle_product_categories','zenrolle_produts.category_id','=','zenrolle_product_categories.id')
            ->select('zenrolle_product_categories.category_name','zenrolle_produts.id','product_name','qty','product_code','retail_price','wholsale_price','image','receive_qty','sold')
            ->orderBy('id','DESC')->get();
            $closing_qty = 0;
            $order_qty = 0;
        foreach ($data as $key => $value) {
            $product_id = $value->id;
            $sold_qty = $value->sold;
            $order_qty = $value->qty + $value->receive_qty;
            $closing_qty = $order_qty - $sold_qty;
            $value->closing = $closing_qty;

        }
        return view('inventory.manage_product.manage_product',compact('data','count'));
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

        DB::table('zenrolle_produts')->where('id',$id)->delete();
         return redirect('/products')->with('message','Delete Product Successfully');
       
    }
}
