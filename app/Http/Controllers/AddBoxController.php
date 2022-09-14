<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\AddBox;
use App\Models\AddRack;
use App\Models\AddRoom;
use App\Models\AddWarehouse;
class AddBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouse['warehouse']=DB::table('addwarehouses')->orderBy('warehouse','asc')->get();
        return view ('add/addbox',$warehouse);
        //return view('add/addroom',['addrooms'=>$addrooms]);
    }

    public function room(Request $request)
    {
        $wid = $request->post('wid');
        $room=DB::table('addrooms')->where('warehouse',$wid)->orderBy('roomnumber','asc')->get();
        $html = '<option value="">Select Room</option>';
        foreach($room as $data)
        {
            $html.='<option value ="'.$data->id.'">'.$data->roomnumber.'</option>';
        }
        echo $html;
    }

    public function rack(Request $request)
    {
        $roid = $request->post('roid');
        $rack=DB::table('addracks')->where('roomnumber',$roid)->orderBy('racknumber','asc')->get();
        $html = '<option value="">Select Rack</option>';
        foreach($rack as $data)
        {
            $html.='<option value ="'.$data->id.'">'.$data->racknumber.'</option>';
        }
        echo $html;
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
            $query = DB::table ('addboxes')-> insert ([
            'warehouse' => $request->input('warehouse'),
            'roomnumber' => $request->input('roomnumber'),
            'racknumber' => $request->input('racknumber'),
            'boxname' => $request->input('boxname'),
            'boxnumber' => $request->input('boxnumber'),
            ]);
            return redirect('addfile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AddWarehouse::findOrFail($id);
        return AddRoom::findOrFail($id);
        return AddRack::findOrFail($id);
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
