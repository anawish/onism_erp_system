<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ClientGroup;
class ClientGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data = DB::table('zenrolle_cust_group')->select('title', 
                    'zenrolle_cust_group.id',DB::raw('SUM(IF(gid IS NULL, 0, 1)) AS Totalclient'))
                ->leftJoin('zenrolle_customers','zenrolle_cust_group.id','=','zenrolle_customers.gid')
                ->groupBy('zenrolle_cust_group.id','zenrolle_cust_group.title')
                    ->get();
        return view('CRM.ClinetGroup.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRM.ClinetGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientGroup = new ClientGroup();
        $clientGroup->title = $request->input('group_name');
        $clientGroup->summary = $request->input('group_desc');
        $clientGroup->save();

        return redirect('/clientgroup')->with('status','Details successfully updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('zenrolle_cust_group')->join('zenrolle_customers','zenrolle_cust_group.id','=','zenrolle_customers.gid')->where('zenrolle_customers.gid',$id)->get();
        return view('CRM.ClinetGroup.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('zenrolle_cust_group')->where('id',$id)->get();
        return view('CRM.ClinetGroup.edit',compact('data'));
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
        $Updategroup = ClientGroup::findOrFail($id);
        DB::table('zenrolle_cust_group')->where('id',$id)->update([
            'title' => $request['group_name'],
            'summary' => $request['group_desc']
        ]);
        $Updategroup->save();
        return redirect('/clientgroup')->with('status','Details updated succfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('zenrolle_cust_group')->where('id',$id)->delete();
        return redirect('/clientgroup')->with('status','The entry has been deleted Successfully!');
    }

    /**
     * Client edit the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clientedit($id)
    {
       
    }
}
