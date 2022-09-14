<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ListAllWarehouse;
class ListAllWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouse = ListAllWarehouse::all();
        return view('list/listallwarehouse',['warehouse'=>$warehouse]);
      //return view ('dashboard')->with('recents', $recents);
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
        return ListAllWarehouse::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = ListAllWarehouse::find($id);
        return response()->json([
            'status'=> "200",
            'edit'=> $edit,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id=$request->input('id');
        $update = ListAllWarehouse::find($id);
        $update->warehouse = $request->input('warehouse');
        $update->company = $request->input('company');
        $update->email = $request->input('email');
        $update->phonenumber = $request->input('phonenumber');
        $update->status = $request->input('status');
        $update->update();
        return redirect('listallwarehouse');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ListAllWarehouse::find($id);
        $delete -> delete();

        return redirect('listallwarehouse');  
    }
}
