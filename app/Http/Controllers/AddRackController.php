<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\AddRack;
use App\Models\AddRoom;
use App\Models\AddWarehouse;
class AddRackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $warehouse['warehouse']=DB::table('addwarehouses')->orderBy('warehouse','asc')->get();
        return view ('add/addrack',$warehouse);
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
            $query = DB::table ('addracks')-> insert ([
            'warehouse' => $request->input('warehouse'),
            'roomnumber' => $request->input('roomnumber'),
            'rackname' => $request->input('rackname'),
            'racknumber' => $request->input('racknumber'),
            ]);
            return redirect('addbox');
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
