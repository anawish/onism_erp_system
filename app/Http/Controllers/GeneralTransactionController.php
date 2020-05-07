<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\GeneralTransaction;
use App\GeneralTransactionDetail;
use PDF;
use App\InvoiceHistory;
use App\paymentHistory;
use Validator;
class GeneralTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc_no = DB::table('zenrolle__general_transaction')->select('doc_no')
                            ->orderBy('doc_no','desc')->pluck('doc_no')->first();
        if(is_null($doc_no))
            $doc_no = '10001';
        else
            $doc_no = $doc_no+1;
        $account_detail = DB::table('zenrolle_account')->get();
        return view('Accounts.GeneralTransaction.index',compact('account_detail','doc_no'));
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
      
        $Transaction = new GeneralTransaction();
        $Transaction->transaction_type = $request->input('trans_type');
        $Transaction->doc_date = $request->input('doc_date');
        $Transaction->description = $request->input('description');
        $Transaction->posting_date = $request->input('posting_date');
        if( $request->input('net_balance') == 0){
            $Transaction->net_balance = $request->input('net_balance');
            $Transaction->cheq_no = $request->input('cheq_no');
            $Transaction->total_debit =  $request->input('total_debit');
            $Transaction->total_credit = $request->input('total_credit');
            $Transaction->doc_no = $request->input('doc_no');
            if($Transaction->save()){
                $pid = $Transaction->id;
                $gl_ids = $request->input('gl_id');
                $gl_no = $request->input('gl_no');
                $gl_name = $request->input('gl_name');
                $gl_des = $request->input('gl_des');
                $debit = $request->input('debit');
                $credit = $request->input('credit');
                for ($i=0; $i<sizeof($gl_ids); $i++) { 
                    $TransactionDetail = new GeneralTransactionDetail();
                        GeneralTransactionDetail::create([
                            'pid' =>  $pid,
                            'gl_id' => $gl_ids[$i],
                            'gl_no' => $gl_no[$i],
                            'name' => $gl_name[$i],
                            'description' => $gl_des[$i],
                            'debit' => $debit[$i],
                            'credit' => $credit[$i]
                    ]);
                }
            }
        }
        else{
            return Redirect::back()->with('message','Your Net Balace is not Zero');
        }
       
        if($Transaction->save()){
            $doc_number =  $request->input('doc_no');
            $type = $Transaction->transaction_type;
            $doc_date = $Transaction->doc_date;
            $gl_ids = $request->input('gl_id');
            $gl_name = $request->input('gl_name');
            $gl_des = $request->input('gl_des');
            $debit = $request->input('debit');
            $credit = $request->input('credit');
            for ($i=0; $i<sizeof($gl_ids); $i++) { 
               $paymentHistory = new paymentHistory();
                paymentHistory::create([
                    'gl_id' =>$gl_ids[$i],
                    'doc_no' => $doc_number,
                    'type' => $type,
                    'updated_date' => $doc_date,
                    'name' => $gl_name[$i],
                    'doc_description' => $gl_des[$i],
                    'debit' => $debit[$i],
                    'credit' => $credit[$i]
               ]);
              
            }
        }      
        return redirect('showtransaction/'.$pid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pid)
    {
        $data = GeneralTransaction::find($pid);
        $Trans_Detail = DB::table('zenrolle__general_transaction')->join('zenrolle__general_transaction_detail','zenrolle__general_transaction_detail.pid','=','zenrolle__general_transaction.id')
                    ->where('zenrolle__general_transaction.id',$pid)->get();
        $pdf = PDF::loadView('Accounts.GeneralTransaction.print_view', compact('data','Trans_Detail'));
         return $pdf->stream('ZenrolleVoucher.pdf');

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

    //Show Transaction
    public function showtransaction($id)
    {
        $data = GeneralTransaction::find($id);
        $Trans_Detail = DB::table('zenrolle__general_transaction')->join('zenrolle__general_transaction_detail','zenrolle__general_transaction_detail.pid','=','zenrolle__general_transaction.id')
                    ->where('zenrolle__general_transaction.id',$id)->get();
        return view('Accounts.GeneralTransaction.show',compact('data','Trans_Detail'));
    }

    // View All Transactions
    public function ViewTransaction()
    {

        $Trans_Detail = DB::table('zenrolle__general_transaction')->get();
        return view('Accounts.GeneralTransaction.viewTransaction',compact('Trans_Detail'));
    }

    // Download Pdf Format
    public function downloadPdf($id)
    {
        $data = GeneralTransaction::find($id);
        $Trans_Detail = DB::table('zenrolle__general_transaction')->join('zenrolle__general_transaction_detail','zenrolle__general_transaction_detail.pid','=','zenrolle__general_transaction.id')
                    ->where('zenrolle__general_transaction.id',$id)->get();
        $pdf = PDF::loadView('Accounts.GeneralTransaction.downloadPdf', compact('data','Trans_Detail'));
        return $pdf->download('ZenrolleVoucher.pdf');
    }
}
