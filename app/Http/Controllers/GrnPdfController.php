<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\GRN;
use App\GRNDetail;
use App\Warehouse;
use App\PurchaseOrder;
use App\PurchaseItem;
use PDF;


class GrnPdfController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
        $grn = DB::table('zenrolle_grn')->orderBy('id','DESC')->get();
        $grnDetail = DB::table('zenrolle_grn_detail')->where('grn_id',$id)->get();
        return view('inventory.GRN.Manage.show',compact('grn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = GRN::find($id);
        $items = array();
        $product = GRNDetail::where('grn_id',$id)->get();
        $items['product'] = $product;
        $pdf = PDF::loadView('inventory.GRN.Manage.print', compact('data','product'));
        return $pdf->stream('zenrolle.pdf');
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
        dd($id);
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

    public function printdownload($id)
    {
        $data = GRN::find($id);
        $items = array();
        $product = GRNDetail::where('grn_id',$id)->get();
        $items['product'] = $product;
        $pdf = PDF::loadView('inventory.GRN.Manage.download', compact('data','product'));
        return $pdf->download('zenrolle.pdf');
    }
}
