<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Add_Product_Category;
use App\Warehouse;
use App\SubCategory;

class ProductDetailController extends Controller
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
     
        $data = DB::table('zenrolle_produts')->join('zenrolle_product_categories','zenrolle_produts.category_id','=','zenrolle_product_categories.id')->select('zenrolle_produts.qty','zenrolle_produts.product_code','zenrolle_produts.product_name','zenrolle_produts.id','zenrolle_produts.retail_price','zenrolle_product_categories.category_name','zenrolle_produts.receive_qty','zenrolle_produts.sold')->where('zenrolle_produts.category_id',$id)->get();
            $closing_qty = 0;
            $order_qty = 0;
        foreach ($data as $key => $value) {
            $product_id = $value->id;
            $sold_qty = $value->sold;
            $order_qty = $value->qty + $value->receive_qty;
            $closing_qty = $order_qty - $sold_qty;
            $value->closing = $closing_qty;

        }
        return view('inventory.product_category.product_detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        DB::table('zenrolle_produts')->where('id',$id)->delete();
        return redirect('/productcategory')->with('message','Delete Category Successfully');
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
        dd($id);
    }
}
