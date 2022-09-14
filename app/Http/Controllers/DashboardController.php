<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ListAllFile;
use App\Models\AddFile;
use App\Models\AddBox;
use App\Models\AddRack;
use App\Models\AddRoom;
use App\Models\AddWarehouse;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recents['recents']=ListAllFile::all();
        $warehouse['warehouse']=DB::table('addwarehouses')->get();
        $warehouse['room']=DB::table('addrooms')->get();
        $warehouse['rack']=DB::table('addracks')->get();
        $warehouse['box']=DB::table('addboxes')->get();
        return view ('dashboard',$warehouse,$recents);
        //return view('add/addroom',['addrooms'=>$addrooms]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             
            $query = DB::table ('addfiles')-> insert ([
            'filenumber' => $request->input('filenumber'),
            'filename' => $request->input('filename'),
            'warehouse' => $request->input('warehouse'),
            'roomnumber' => $request->input('roomnumber'),
            'racknumber' => $request->input('racknumber'),
            'boxnumber' => $request->input('boxnumber')
            ]);
            return redirect('dashboard');
        
        

    /* $input = $request->all();
        Dashboard::create($input);
        return redirect('dashboard')->with('flash_message', 'Contact Addedd!'); */
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data = Dashboard::find($id);
        //return view('dashboard')->with('data', $data);
        return ListAllFile::findOrFail($id);
        return AddWarehouse::findOrFail($id);
        return AddRoom::findOrFail($id);
        return AddRack::findOrFail($id);
        return AddBox::findOrFail($id);
        return AddFile::findOrFail($id);
        

        //$data= Dashboard::where('id',$id)->get(); //This will fetch the respective record from the table. 
        //return view('dashboard',compact('data','id'));
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
