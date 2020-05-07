<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Account;
use App\InvoiceHistory;
use App\paymentHistory;
class GeneralLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $account = DB::table('zenrolle_account')->get();
            foreach ($account as $key => $value) {
                $invoice = DB::table('invoice_history')->where('payment_method',$value->name)
                            ->get();
                    $closing_bla = 0;
                    foreach ($invoice as $keys => $values) {
                        $value->closing_bla = $values->payment + $closing_bla;

                    }

                $last_record = DB::table('invoice_history')->select('closing_balance')
                                ->where('payment_method',$value->name)
                                ->orderBy('id','desc')->first();
            }
            
        return view('Accounts.GeneralLedger.index',compact('account','sales','bank','cash'));
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
        $account = new Account();
        $account->gl_no = $request->input('gl_no');
        $account->name = $request->input('name');
        $account->description = $request->input('description');
        $account->account_type = $request->input('account_type');
        $account->closing_bla = $request->input('closing_bla');
        $account->save();
        return redirect('/generaledger')->with('success','Your accout has been submitted! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $ledger_detail = DB::table('zenrolle_payment_history')->where('gl_id',$id)->get();
            $closing_balance = 0;
            foreach ($ledger_detail as $key => $value) {
                 if($key == 0){
                        $closing_balance = $value->debit - $value->credit;
                    }
                    else{
                        $closing_balance = $closing_balance + $value->debit - $value->credit;
                    }
            }
            $value->closing_balance = $closing_balance;
        $accountDetail = DB::table('zenrolle_account')->where('id',$id)->get();

        return view('Accounts.GeneralLedger.show',compact('ledger_detail','accountDetail'));
        
        // if($id == "Vendor"){
        //     $PurchaseOrder = DB::table('zenrolle__pur_history')->where('payment','!=','NULL')->get();
        //     $closing_balance = 0;
        //     foreach ($PurchaseOrder as $key => $value) {
        //             $closing_balance = $closing_balance +$value->payment;
        //             $invoice = DB::table('zenrolle_purcahse')->select('invoice_no')->where('id',$value->po_id)->get();
        //             foreach ($invoice as $pkey => $pvalue) {
        //                     $po_no = $pvalue->invoice_no;
        //             }
        //             $value->po_no = $po_no;
        //             $value->closing_balance = $closing_balance;
        //     }
        //     $accountDetail = DB::table('zenrolle_account')->where('name',$id)->get();
        //     return view('Accounts.GeneralLedger.show',compact('PurchaseOrder','accountDetail','id','invoice'));
        // }
        // else if($id =="Localcustomer"){
        //     $invoice = DB::table('invoice_history')->get();
        //     $debit = 0;
        //     $credit = 0;
        //     $closing_bla = 0;
        //     foreach ($invoice as $key => $value) {
        //         if($key == 0){
        //             $closing_bla = $value->debit-$value->payment;
        //         }
        //         else{
        //             $closing_bla = $closing_bla+$value->debit - $value->payment;
        //         }
        //         $value->closing_bla = $closing_bla;
        //     }
        //     $accountDetail = DB::table('zenrolle_account')->where('name',$id)->get();
        //     return view('Accounts.GeneralLedger.show',compact('invoice','accountDetail','id'));
        // }
        // else if ($id == "Cash"){
        //         $invoice_history = DB::table('invoice_history')->where('payment_method',$id)->get();
        //         $po_credit = DB::table('zenrolle__pur_history')->where('payment','!=','NULL')
        //                                 ->where('payment_method',$id)->get();
        //                 foreach ($po_credit as $pkey => $pvalue) {
        //                         $credit_val = $pvalue->payment;
        //                         $credit_type = $pvalue->type;
        //                 }
        //         $closing_bla = 0;
        //         $TotalDebit = 0;
        //         $TotalCredit = 0;
        //         foreach ($invoice_history as $key => $value) {
        //             if($key == 0){
        //                 $closing_bla = $value->payment - $value->credit;
        //             }
        //             else{
        //                 $closing_bla = $closing_bla + $value->payment - $value->credit;
        //             }
        //             if($key == 0){
        //                 $TotalDebit = $value->payment;
        //             }
        //             else{
        //                 $TotalDebit = $value->payment+$TotalDebit;
        //                 $TotalCredit = $value->credit+$TotalCredit;
        //             }
        //             $value->TotalDebit = $TotalDebit;
        //             $value->TotalCredit = $TotalCredit;
        //             $value->closing_bla = $closing_bla;
        //             $value->credit_val = $credit_val;
        //             $value->credit_type = $credit_type;
        //             // $value->PurchaseOrder = $PurchaseOrder;
        //             $account = DB::table('zenrolle_account')->where('name',$value->payment_method)->get();
        //             foreach ($account as $acckey => $accvalue) {
        //                 $value->id = $accvalue->id;
        //                 $value->gl_no = $accvalue->gl_no;
        //             }
        //         }
                
        //         $accountDetail = DB::table('zenrolle_account')->where('name',$id)->get();
        //         return view('Accounts.GeneralLedger.show',compact('invoice_history','accountDetail','TotalCredit','TotalDebit','id','po_credit'));
        // }
        // else if ($id == "Bank"){
        //         $invoice_history = DB::table('invoice_history')->where('payment_method',$id)->get();
        //         $closing_bla = 0;
        //         $TotalDebit = 0;
        //         foreach ($invoice_history as $key => $value) {
        //            if($key == 0){
        //                 $closing_bla = $value->payment - $value->credit;
        //             }
        //             else{
        //                 $closing_bla = $closing_bla + $value->payment - $value->credit;
        //             }
        //             if($key == 0){
        //                 $TotalDebit = $value->payment;
        //             }
        //             else{
        //                 $TotalDebit = $value->payment+$TotalDebit;
        //             }
        //             $value->TotalDebit = $TotalDebit;
        //             $value->closing_bla = $closing_bla;
        //             $account = DB::table('zenrolle_account')->where('name',$value->payment_method)
        //                                     ->get();
        //         }
        //         $accountDetail = DB::table('zenrolle_account')->where('name',$id)->get();
        //         return view('Accounts.GeneralLedger.show',compact('invoice_history','accountDetail','TotalCredit','TotalDebit','id','po_credit'));
        // }
        // else{
           
        //         $invoice_history = DB::table('invoice_history')->where('payment_method',$id)
        //                                 ->get();
        //             $closing_bla = 0;
        //             $TotalCredit = 0;
        //             foreach ($invoice_history as $key => $value) {
        //                 if($key == 0){
        //                    $closing_bla = $value->debit;
        //                 }
        //                 else{

        //                  $closing_bla = $closing_bla+$value->debit;
        //                 }
        //                 if($key == 0){
        //                     $TotalCredit = $value->debit;
        //                 }
        //                 else{
        //                     $TotalCredit = $value->debit+$TotalCredit;
        //                 }
                    
        //                 $value->TotalCredit = $TotalCredit;
        //                 $value->closing_bla = $closing_bla;
        //                 $account = DB::table('zenrolle_account')->where('name',$id)->get();
        //                 foreach ($account as $acckey => $accvalue) {
        //                     $value->id = $accvalue->id;
        //                     $value->gl_no = $accvalue->gl_no;
        //                 }
        //             }
        //         $accountDetail = DB::table('zenrolle_account')->where('name',$id)->get();
        //         return view('Accounts.GeneralLedger.show',compact('invoice_history',
        //                         'accountDetail','TotalCredit','TotalDebit','id','po_credit'));
        // }

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accountDetail = DB::table('zenrolle_account')->where('id',$id)->get();
        return view('Accounts.GeneralLedger.edit',compact('accountDetail'));
       
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
        $updateAccount = Account::findOrFail($id);
        DB::table('zenrolle_account')->where('id',$id)->update([
            'gl_no' => $request['gl_no'],
            'name' => $request['name'],
            'description'=> $request['description'],
            'account_type' => $request['account_type'],
            'closing_bla' => $request['opening_bla']
        ]);
        $updateAccount->save();
        return redirect('/account/create')->with('status','Details updated succfully!');
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
    public function dateRange(Request $request)
    {
        if ($request->name != "Sales") {
            $data = DB::table('invoice_history')->where('payment_method',$request->name)
                        ->whereBetween('updated_date', array($request->From, $request->to))
                        ->get();
                   
            $closing_bla = 0;
            foreach ($data as $key => $value) {
                if($key == 0){
                    $closing_bla = $value->payment;
                }
                else{
                    $closing_bla = $closing_bla+$value->payment;
                }
                $value->closing_bla = $closing_bla;
                $account = DB::table('zenrolle_account')->where('name',$value->payment_method)->get();

                foreach ($account as $acckey => $accvalue) {
                    $value->id = $accvalue->id;
                    $value->gl_no = $accvalue->gl_no;
                }
            }
        }
        else{
            $data = DB::table('invoice_history')->where('debit','!=',$request->name)->whereBetween('updated_date', array($request->From, $request->to))
                        ->get();
                        dd($data);
            $closing_bla = 0;
            
            foreach ($data as $key => $value) {
                if($key == 0){
                   $closing_bla = $value->debit;
                }
                else{

                 $closing_bla = $closing_bla+$value->debit;
                }
                $value->closing_bla = $closing_bla;
                $account = DB::table('zenrolle_account')->where('name',$request->name)->get();
                foreach ($account as $acckey => $accvalue) {
                    $value->id = $accvalue->id;
                    $value->gl_no = $accvalue->gl_no;
                }
            }
        }
        return json_encode($data);
    }
}

