<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suppliers;
use DB;
use App\PurchaseSupplier;
use PDF;
use App\PurchaseOrder;
use App\PurchaseItem;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('zenrolle_suppliers')->orderBy('id','DESC')->get();
        return view('purchasing.Supplier.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchasing.Supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new Suppliers();
        $supplier->name = $request->input('name');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->email = $request->input('email');
        $supplier->city = $request->input('city');
        $supplier->company = $request->input('company');
        $supplier->country = $request->input('country');
        $supplier->region = $request->input('region');
        $supplier->postbox = $request->input('postbox');
        $supplier->taxid = $request->input('taxid');
        $supplier->save();
        return redirect('/suppliers')->with('status','Your Supplier has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $db = DB::table('zenrolle_suppliers')->join('zenrolle_purcahse','zenrolle_suppliers.id','=','zenrolle_purcahse.supplier')->select('zenrolle_purcahse.total')->where('zenrolle_purcahse.supplier',$id)->get();


       $total_sum=0;
       foreach ($db as $key => $value) {
            $total_sum = $value->total+$total_sum;
            
       }
       $data = DB::table('zenrolle_suppliers')->where('id',$id)->get();
       return view('purchasing.Supplier.show',compact('data','total_sum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('zenrolle_suppliers')->where('id',$id)->get();
        return view('purchasing.Supplier.edit',compact('data'));
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
        $updatesupplier = Suppliers::findOrFail($id);
        DB::table('zenrolle_suppliers')->where('id',$id)->update([
            'name'    => $request['name'],
            'phone'   => $request['phone'],
            'email'   => $request['email'],
            'address' => $request['address'],
            'city'    => $request['city'],
            'region'  => $request['region'],
            'country' => $request['country'],
            'postbox' => $request['postbox'],
            'taxid'   => $request['taxid']
        ]);
        $updatesupplier->save();
        return redirect('/suppliers')->with('status','Details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('zenrolle_suppliers')->where('id',$id)->delete();
        return redirect('/suppliers')->with('status','The entry has been deleted Successfully!');
    }
    /**
     * PO Order the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PODetail($id)
    {
       $data = DB::table('zenrolle_purcahse')->where('supplier',$id)->get();
       $client = DB::table('zenrolle_suppliers')->where('id',$id)->pluck('name')->first();
       $clientDetail = DB::table('zenrolle_suppliers')->where('id',$id)->get();
       return view('purchasing.Supplier.po',compact('data','client','clientDetail'));
    }
    /**
     * PO PDF the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdf($id)
    {
        $customer = array();

        $data = PurchaseOrder::find($id);

        $SupplierDetail = DB::table('zenrolle_purcahse')->join('zenrolle_suppliers','zenrolle_purcahse.supplier','=','zenrolle_suppliers.id')
                ->select('zenrolle_suppliers.name','zenrolle_suppliers.address','zenrolle_suppliers.city','zenrolle_suppliers.country','zenrolle_suppliers.phone','zenrolle_suppliers.email','zenrolle_purcahse.invoice_no','zenrolle_purcahse.reference_no','zenrolle_purcahse.order_date','zenrolle_purcahse.due_date','zenrolle_purcahse.id','zenrolle_purcahse.subtotal','zenrolle_purcahse.total','zenrolle_purcahse.total_discount','zenrolle_purcahse.status','zenrolle_purcahse.total_tax','zenrolle_purcahse.shipping')
                    ->where('zenrolle_purcahse.id',$id)->get();

        $invoice  = PurchaseItem::where('pid',$id)->get();

        $customer['invoice'] = $invoice;        

        $pdf = PDF::loadView('purchasing.Supplier.pdf', compact('data','SupplierDetail','invoice'));
       return $pdf->download('zenroller.pdf');
    }


    public function transcation($id)
    {
        $data = DB::table('zenrolle_purcahse')->where('supplier',$id)->get();
        $clientDetail = DB::table('zenrolle_suppliers')
                            ->where('id',$id)->get();
        $client = DB::table('zenrolle_suppliers')->where('id',$id)
                            ->pluck('name')->first();
        return view('purchasing.Supplier.transcation',compact('data','clientDetail','client'));
    }

    public function transcationDetail($id)
    {
     
        $invoicesDetail = DB::table('zenrolle_purcahse')->where('id',$id)->get();
        $client = DB::table('zenrolle_purcahse')->join('zenrolle_suppliers','zenrolle_purcahse.supplier','=','zenrolle_suppliers.id')->where('zenrolle_purcahse.id',$id)->get();
        return view('purchasing.Supplier.viewTranscation',compact('client','invoicesDetail'));
    }

    public function delete($id)
    {
        PurchaseOrder::where('pid',$id)->delete(); 
        PurchaseItem::where('id',$id)->delete();
        return redirect('/clientinvoice'.$id)->with('status','The entry has been deleted Successfully!');
    }
}
