@extends('layouts.master2')
@section('content')
<div class="nk-content-body">
        <div class="nk-content-wrap">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Add Warehouse</h4>
                            
                        </div>
                    </div>                       
                    <div class="form-group">
                        <form action="addwarehouse" method="post">
                            {!! csrf_field() !!}    
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="warehouse" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Warehouse Name</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="company" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Company Name</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="email" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Email</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="phonenumber" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Phone Number</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="location" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Location</label>
                                </div>
                            </div>
                            <label class="form-label">Status</label>   
                            <ul class="custom-control-group align-center flex-wrap">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" checked="" name="status" value="Active" id="reg-enable">
                                        <label class="custom-control-label" for="reg-enable">Active</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="status" value="Inactive" id="reg-disable">
                                        <label class="custom-control-label" for="reg-disable">Inactive</label>
                                    </div>
                                </li>
                            </ul>
                                
                            <div class="form-group mt-4">
                                <button type="submit" value="submit" class="btn btn-success">Add</button>
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