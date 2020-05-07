<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Add_Product_Category;
use App\SubCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $data = DB::table('zenrolle_product_categories')->select('category_name', 
                    'zenrolle_product_categories.id',DB::raw('SUM(IF(category_id IS NULL, 0, 1)) AS Products'))
                ->leftJoin('zenrolle_produts','zenrolle_product_categories.id','=','zenrolle_produts.category_id')
                ->groupBy('zenrolle_product_categories.id','zenrolle_product_categories.category_name')
                    ->get();
        foreach ($data as $key => $value) {
            $value->id;
            $products = DB::table('zenrolle_produts')->where('category_id',$value->id)->get();
            $total_item = 0;
            foreach ($products as $keys => $values) {
                $qty = $values->qty + $values->receive_qty;
                $closing_qty = $qty - $values->sold;
                $total_item = $closing_qty+$total_item;
               
            }
            $value->avaliable = $total_item;
        }
    
            return view('inventory.product_category.product-category',compact('data'));
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
    
        $edit_product = DB::table('zenrolle_product_categories')->select('zenrolle_product_categories.id','zenrolle_product_categories.category_name','zenrolle_product_categories.bussines_loc','zenrolle_product_categories.category_desc')->where('id',$id)->get();
        return view('inventory.product_category.edit',compact('edit_product'));
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
        
        $updatecat = Add_Product_Category::findOrFail($id);
        DB::table('zenrolle_product_categories')->where('id',$id)->update(['category_name'=>$request['category_name'],
            'category_desc'=>$request['category_desc'],
            'bussines_loc'=>$request['bussines_loc']
        ]);
        $updatecat->save();
        return redirect('/productcategory')->with('success','Your Category are updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::where('category_id',$id)->delete();
        Add_Product_Category::where('id',$id)->delete();
        return redirect('/productcategory')->with('message','Delete Category Successfully');
    }
}
