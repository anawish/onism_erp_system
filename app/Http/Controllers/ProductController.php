<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Product;
use App\SubCategory;
use App\Add_Product_Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('zenrolle_product_categories')->
                select('id','category_name')->get();
        $warehouse = DB::table('zenrolle_warehouse')->select('id','warehouse_name')->get();
          return view('inventory.Product.create',compact('warehouse','data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product;
        $product->company_id = $request->input('company_id');
        $product->category_id = $request->input('category_id');
        $product->sub_category = $request->input('sub_category');
        $product->product_name = $request->input('product_name');
        $product->warehouse = $request->input('warehouse');
        $product->product_code = $request->input('product_code');
        $product->retail_price = $request->input('retail_price');
        $product->wholsale_price = $request->input('wholsale_price');
        $product->tax_rate = $request->input('tax_rate');
        $product->discount_rate = $request->input('discount_rate');
        $product->qty = $request->input('qty');
        $product->alert_qty = $request->input('alert_qty');
        $product->unit = $request->input('unit');
        $product->barcode = $request->input('barcode');
        $product->product_desc = $request->input('product_desc');
        $product->emp_bonus = $request->input('emp_bonus');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('public_path/image',$filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect('/products')->withsuccess('success','Add Product Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('zenrolle_product_sub_category')->where('category_id',$id)->select('sub_category','id')->get();
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
        $data = DB::table('zenrolle_product_categories')->select('id','category_name')->get();
        $sub_category = DB::table('zenrolle_product_sub_category')->select('id','sub_category')->get();
        $warehouse = DB::table('zenrolle_warehouse')->select('id','warehouse_name')->get();
        $edit_pro = DB::table('zenrolle_produts')->where('id',$id)->get();
        return view('inventory.Product.edit',compact('edit_pro','data','warehouse','sub_category'));
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
        
        $UpdateProduct = Product::findOrFail($id);
     
        DB::table('zenrolle_produts')->where('id',$id)->update([
            'category_id'=>$request['category_id'],
            'sub_category'=>$request['sub_category'],
            'warehouse'=>$request['warehouse'],
            'product_name'=>$request['product_name'],
            'product_code'=>$request['product_code'],
            'retail_price'=>$request['retail_price'],
            'wholsale_price'=>$request['wholsale_price'],
            'tax_rate'=>$request['tax_rate'],
            'discount_rate'=>$request['discount_rate'],
            'qty'=>$request['qty'],
            'alert_qty'=>$request['alert_qty'],
            'barcode'=>$request['barcode'],
            'unit'=>$request>['unit'],
            'product_desc'=>$request['product_desc'],
            'emp_bonus'=>$request['emp_bonus'],
            // if($request->hasfile('image'))
            // {
            //     $file = $request->file('image');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time(). '.' .$extension;
            //     $file->move('public_path/image',$filename);
            //     $UpdateProduct->image = $filename;
            // }
        ]);
        $UpdateProduct->save();
        return redirect('/products')->with('success','Your Product are updated');

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
}
