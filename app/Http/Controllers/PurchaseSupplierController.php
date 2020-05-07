<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PurchaseSupplier;

class PurchaseSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('purchasing.add_supplier.add_supplier');
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
        $supplier = new PurchaseSupplier();
        $supplier->name = $request->input('name');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->email = $request->input('email');
        $supplier->city = $request->input('city');
        $supplier->country = $request->input('country');
        $supplier->region = $request->input('region');
        $supplier->postbox = $request->input('postbox');
        $supplier->taxid = $request->input('taxid');
        $supplier->save();
        return redirect('/purchaseorder')->with('message','Your Supplier has been Added');
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
