<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VendorLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = DB::table('zenrolle_suppliers')->get();
            $opening_bla = 0;
            $closing_bla = 0;
            $opening_bla = 0;
        foreach ($vendor as $key => $value) {
                $vendor_det = DB::table('zenrolle__pur_history')->where('vendor_id',$value->id)->get();
                $TotalDebit = 0;
                $TotalCredit = 0;
                $closing_balance = 0;
                foreach ($vendor_det as $key => $values) {
                        $TotalDebit = $values->payment + $TotalDebit ;
                        $TotalCredit = $values->payment + $TotalCredit;
                        $closing_balance = $closing_balance+$values->payment;
                }
                $value->TotalDebit = $TotalDebit;
                $value->TotalCredit = $TotalCredit;
                $value->closing_balance = $closing_balance;
        }
        
        return view('Accounts.VendorLedger.index',compact('vendor'));
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
        $po_order = DB::table('zenrolle__pur_history')->where('vendor_id',$id)->Where('payment','!=','NULL')->get();
        $vendor = DB::table('zenrolle_suppliers')->where('id',$id)->get();
        $TotalDebit = 0;
        $Closing_bla = 0;
        $opening_bla = 0;
        $closing_balance = 0;
        foreach ($po_order as $key => $value) {
            $TotalDebit = $value->payment + $TotalDebit;
            $Closing_bla = $Closing_bla + $value->payment;
            $closing_balance = $closing_balance+$value->payment;
            $value->closing_balance = $closing_balance;
            $invoice_no = DB::table('zenrolle_purcahse')->select('invoice_no')->where('id',$value->po_id)
                                ->get();
                        foreach ($invoice_no as $pkey => $pvalue) {
                            $po_no = $pvalue->invoice_no;
                        }
                        $value->po_no = $po_no;
        }
        // $cust_no = DB::table('zenrolle_suppliers')->where('id',$id)->pluck('cust_no')->first();
        return view('Accounts.VendorLedger.show',compact('po_order','TotalDebit','TotalCredit','Closing_bla','vendor','balance')); 
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
