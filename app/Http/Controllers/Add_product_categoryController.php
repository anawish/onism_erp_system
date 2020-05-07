<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Add_Product_Category;
use App\SubCategory;
use Validator;
use Illuminate\Support\Facades\Input;
class Add_product_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory.Add_category.add_pro_category');
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

        $category = new Add_Product_Category();
        $category->category_name = $request->input('category_name');
        $category->category_desc = $request->input('category_desc'); 
        $category->bussines_loc = $request->input('bussines_loc');
        $category->save();
        $subcategory = new SubCategory();
        $subcategory->category_id = $category->id;
        $subcategory->sub_category = $request->input('sub_category');
        $subcategory->save();
        return redirect('/productcategory')->withSuccess('Your Category has been Added');
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
        //
    }
}
