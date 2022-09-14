@extends('layouts.master2')
@section('content')
<div class="nk-content-body">
        <div class="nk-content-wrap">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Add Room</h4>
                            
                        </div>
                    </div>                       
                    <div class="form-group">
                        <form action="addroom" method="post">
                            {!! csrf_field() !!} 
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <select class="form-control" name="warehouse" id="warehouse">
                                    <option value="">Select Warehouse</option>
                                        @foreach ($warehouse as $data)
                                        <option value="{{$data->id}}">{{$data->warehouse}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="roomname" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Room Name</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="roomnumber" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Room Number</label>
                                </div>
                            </div>     
                            <div class="form-group mt-4">
                                <button type="submit" value="submit" class="btn btn-success">Next</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection