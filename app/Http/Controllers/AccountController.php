<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Account;
use App\InvoiceHistory;
use Carbon\Carbon;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Accounts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Trial_bla = DB::table('zenrolle_account')->orderBy('gl_no','asc')->get();
        $closing_bal_debit= 0;
        $closing_bal_credit = 0; 
        $total_credit = 0;
        $total_debit = 0;
        $total_closing=0;
        $sum_local = 0; 
        foreach ($Trial_bla as $key => $value) {
                $invoice_hist = DB::table('invoice_history')->where('type',$value->type)
                                  ->get();
                  $Debit_val = 0;
                  $Credit_val = 0;
                  $Bank_val = 0;
                  $cash_credit = 0;
                foreach ($invoice_hist as $keys => $values) {
                    if($values->type == "SI"){
                        $Credit_val = $values->debit +  $Credit_val;
                    }
                    if($values->type == "CR"){
                        $Debit_val = $values->payment + $Debit_val;
                        $cash_credit = $values->credit +$cash_credit;
                    }

                    if($values->type == "BP"){
                        $Bank_val = $values->payment + $Bank_val;
                    }
                    $sum_local =  $values->payment+$sum_local;
                    $total_credit = $values->debit+$total_credit;
                }
                if($value->type == "SI"){
                    if($value->name == "Localcustomer"){
                        $closing_bal_credit = $Credit_val - $sum_local;
                        $total_debit = $Credit_val+$total_debit;
                        $total_credit = $Credit_val+$total_credit;
                    }else{
                        $closing_bal_credit = $closing_bal_credit - $Credit_val;
                    } 
                }elseif($value->type == "CR"){
                    if($value->name == "Localcustomer"){
                          $closing_bal_credit = $Credit_val -$sum_local;
                          $total_debit = $Credit_val+$total_debit;
                          $total_credit = $Credit_val+$total_credit;

                    }else{
                          $closing_bal_credit = $closing_bal_credit + $Debit_val;
                    } 
                }
               elseif($value->type == "BP"){
                    if($value->name == "Localcustomer"){
                            $closing_bal_credit = $Credit_val - $sum_local;
                            $total_debit = $Credit_val+$total_debit;
                            $total_credit = $Credit_val+$total_credit;

                    }else{
                      $closing_bal_credit = $closing_bal_credit + $Bank_val;
                    }

                }
                $po_order = DB::table('zenrolle__pur_history')->where('payment_method','=','Cash')->get();
                $po_payment = 0;
                $po_debit = 0;
                foreach ($po_order as $pkey => $pvalue) {
                    $po_payment=$pvalue->payment+$po_payment;
                    $po_debit = $pvalue->debit+$po_debit;
                }
                $po_bank = DB::table('zenrolle__pur_history')->where('payment_method','=','Bank')->get();
                $bank_payment = 0;
                $bank_debit = 0;
                foreach ($po_bank as $pkey => $pvalue) {
                    $bank_payment=$pvalue->payment+$bank_payment;
                    $bank_debit = $pvalue->debit+$bank_debit;
                }
                $value->po_payment = $po_payment +$cash_credit; 
                $value->po_debit = $po_debit;
                $value->Debit_val = $Debit_val;
                $value->Credit_val = $Credit_val;
                $value->Bank_val = $Bank_val;
                $value->Total_balace = $Debit_val;
                $value->closing_balance = $closing_bal_credit -$po_payment;
                $value->closing_balances = $closing_bal_credit;
                $value->closing_balancess = $po_payment;
                $value->bank_payment=$bank_payment;
                $total_debit = $total_debit + $Debit_val + $Bank_val +$po_payment;
               
                // $total_credit = $total_credit+ $sum_local;
                $total_credit = $Credit_val+$sum_local;
                $total_closing = ($closing_bal_credit) + $total_closing;
                $value->LocalCredit = $sum_local;
                $closing_bal_credit=0;
        }

        
        return view('Accounts.TrialBalance.create',compact('Trial_bla','total_debit','total_credit','total_closing','sum_local'));
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
        return redirect('/account/create')->with('success','Your accout has been submitted! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $customer  = DB::table('zenrolle_customers')->get();
        $opening_bla = 0;
        $closing_balance = 0;
        $closing_bla = 0;
        $opening_bla = 0;
        foreach ($customer as $key => $value) {
            $opening_bla = $value->balance+$opening_bla;
            $invoice = DB::table('invoice_history')->where('client_id',$value->id)->get();
            $last_record = DB::table('invoice_history')
                              ->select('closing_balance')->where('client_id',$value->id)
                              ->orderBy('id','desc')->first();
            $TotalDebit = 0;
            $TotalCredit = 0;
            $closing_balance = 0;
            foreach ($invoice as $invoicekey => $invoicevalue) {
                $TotalDebit = $invoicevalue->debit + $TotalDebit ;
                $TotalCredit = $invoicevalue->payment + $TotalCredit;

            }
            $value->TotalDebit = $TotalDebit;
            $value->TotalCredit = $TotalCredit;
            // $value->closing_balance = $TotalDebit - $TotalCredit;
              if($last_record){
                $value->closing_balance = $last_record->closing_balance +$opening_bla;
              }
              else{
                $value->closing_balance = $value->balance;
              } 
        }
        
        return view('Accounts.CustomerLedger.viewcustomer',compact('customer'));
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

    public function viewbalance($id)
    {
        $invoice = DB::table('invoice_history')->where('invoice_history.client_id',$id)->get();
        $customer = DB::table('zenrolle_customers')->where('id',$id)->get();
        $TotalDebit = 0;
        $TotalCredit = 0;
        $Closing_bla = 0;
        $balance = 0;
        $opening_bla = 0;
        foreach ($invoice as $key => $value) {
           $TotalDebit = $value->debit + $TotalDebit;
           $TotalCredit = $value->payment + $TotalCredit;
           $Closing_bla = $TotalDebit - $TotalCredit;
           foreach ($customer as $keys => $values) {
              if($Closing_bla == 0)
              {
                   $balance= $values->balance+$balance;
              }
              else{
                   $balance= $values->balance + $Closing_bla;
              }
           }
        }
        $cust_no = DB::table('zenrolle_customers')->where('id',$id)->pluck('cust_no')->first();
        return view('Accounts.CustomerLedger.viewbalance',compact('invoice','TotalDebit','TotalCredit','Closing_bla','customer','cust_no','balance'));  
    }

    public function daterange(Request $request)
    {
        $data = DB::table('invoice_history')->where('client_id',$request->customer_id)
                        ->whereBetween('updated_date', array($request->From, $request->to))
                        ->get();
        $data2 = DB::table('invoice_history')->where('client_id',$request->customer_id)
                        ->where('updated_date', Carbon::parse($request->From)->subDays(1))
                            ->orderBy('id','desc')->first();
                        $bal = "";
                      if ($data2) {
                           $bal = $data2->closing_balance;
                        }  
                        else{
                            $bal = "";
                        }

                        $TotalDebit  =  0;
                        $TotalCredit =  0;
                        $Closing_bla =  0;
                        
                        foreach ($data as $key => $value) {

                           $TotalDebit = $value->debit + $TotalDebit;
                           $TotalCredit = $value->payment + $TotalCredit;
                           $Closing_bla = $TotalDebit - $TotalCredit;
                           if (!$value->payment_note) {
                               $value->payment_note = '';
                           }
                        }
                        $array = [
                            'Total_Debit' => $TotalDebit,
                            'TotalCredit' => $TotalCredit,
                            'Closing_bla' => $Closing_bla,
                            'closing_balance' =>$bal,
                            'data' => $data
                         ];
                 return json_encode($array);
    }

    public function CustomerDateFilter(Request $request)
    {
        $customer  = DB::table('zenrolle_customers')
                        ->whereBetween('cust_no', array($request->From, $request->to))
                        ->get();
        foreach ($customer as $key => $value) {
            $invoice = DB::table('invoice_history')->where('client_id',$value->id)->get();
            $last_record = DB::table('invoice_history')
                        ->select('closing_balance')
                        ->where('client_id',$value->id)
                        ->orderBy('id','desc')->first();
            $TotalDebit = 0;
            $TotalCredit = 0;
            foreach ($invoice as $invoicekey => $invoicevalue) {
               
                $TotalDebit = $invoicevalue->debit + $TotalDebit;
                $TotalCredit = $invoicevalue->payment + $TotalCredit;

            }
            $value->TotalDebit = $TotalDebit;
            $value->TotalCredit = $TotalCredit;
                if($last_record){
                    $value->closing_balance = $last_record->closing_balance;
                }else{
                    $value->closing_balance = 0.00;
                }             
        }
        return json_encode($customer);
    }

    //Customer Date Filter
    public function DateFilter(Request $request)
    {

        $data  = DB::table('zenrolle_customers')->get();
        foreach ($data as $key => $value) {
            $invoice = DB::table('invoice_history')->where('client_id',$value->id)->whereBetween('updated_date', array($request->From_date, $request->to_date))->get();
            $last_record = DB::table('invoice_history')
                        ->select('closing_balance')
                        ->where('client_id',$value->id)
                        ->orderBy('id','desc')->first();
            $TotalDebit = 0;
            $TotalCredit = 0;
            foreach ($invoice as $invoicekey => $invoicevalue) {
               
                $TotalDebit = $invoicevalue->debit + $TotalDebit;
                $TotalCredit = $invoicevalue->payment + $TotalCredit;

            }
            $value->TotalDebit = $TotalDebit;
            $value->TotalCredit = $TotalCredit;
                if($last_record){
                    $value->closing_balance = $last_record->closing_balance;
                }else{
                    $value->closing_balance = 0.00;
                }             
        }
        
        return json_encode($data);
    }

    //Trial Balance Date
    public function trialdate(Request $request)
    {
        $data = DB::table('invoice_history')->whereBetween('updated_date',
                          array($request->form_date,$request->to_date))->get();

        foreach ($data as $key => $value) {
          $gl_no= DB::table('zenrolle_account')->where('name',$value->payment_method)->get();
          foreach ($gl_no as $keys => $values) {
              $value->gl=$values->gl_no;
          }
          $value->opening_bla = DB::table('invoice_history')
                          ->where('updated_date', Carbon::parse($request->form_date)->subDays(1))
                          ->pluck('closing_balance')->first();
                         
        }
        $TotalDebit = 0;
        $TotalCredit = 0;
        $closing_bal = 0;
      
        foreach ($data as $key => $value) {
            $TotalDebit =$value->debit+$TotalDebit;
            $TotalCredit=$value->payment + $TotalCredit;
            $closing_bal=$value->closing_balance +$closing_bal;

        }

         $array = [
                    'TotalDebit' => $TotalDebit,
                    'TotalCredit' => $TotalCredit,
                    'closing_bal' => $closing_bal,
                    'data' => $data
                 ];
        return json_encode($array);
       
    }

}
