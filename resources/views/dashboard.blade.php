@extends('layouts.master')
@section('content')
    <div class="nk-content-body">
        <div class="nk-content-wrap">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Recent Files <a href="addfile" class="btn btn-primary btn-sm"><em class="ti-plus"></em>ADD NEW</button></a></h4>
                            
                        </div>
                    </div>
                    <div class="card card-bordered card-preview nk-activity is-scrollable h-400px">
                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                                <table class="datatable-init-export nowrap table" data-export-title="Export">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>File ID</th>
                                            <th>File Name</th>
                                            <th>Warehouse</th>
                                            <th>Stored In</th>
                                            <th>Last Modified</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($recents as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>

                                            <td><a href="#" class="btn-detail" data-toggle="modal" data-id="{{$data->id}}" data-target="#modal_aside_left">{{$data->filenumber}}</a></td>

                                            <td>{{$data->filename}}</td>

                                            <td>{{$data->warehouse}}</td>

                                            <td>Room-{{$data->roomnumber}}/Rack-{{$data->racknumber}}/Box-{{$data->boxnumber}}</td>

                                            <td>{{ $data['created_at']->format("M d Y")}}</td>

                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- .card-preview -->
                    </div> <!-- nk-block --> 
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="modal_aside_left" id="modal_aside_left" class="modal fixed-left fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        <h6>File ID</h6>
                        <p id="filenumber"></p>
                        <hr>
                        <h6>File Name</h6>
                        <p id="filename"></p>
                        <hr>
                        <h6>Warehouse</h6>
                        <p id="warehouse"></p>
                        <hr>
                        <h6>Stored In</h6>
                        <p id="storedin"></p>
                        <hr>
                        <h6>Last Modified</h6>
                        <p id="lastmodified"></p>
                        <hr>
                        <h6>Description</h6>
                        <p id="description">Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


    <script>

    $('#modal_aside_left').modal('hide');


    $(document).ready(function() {
    $('.btn-detail').click(function() {
        const id = $(this).attr('data-id');
        
        $.ajax({
        url: 'dashboard/'+id,
        type: 'GET',
        data: {
            "id": id
        },
        success:function(data) {
            console.log(data);
            $('#filenumber').html(data.filenumber); //html//text
            $('#filename').text(data.filename);
            $('#warehouse').text(data.warehouse);
            $('#storedin').html('Room-'+data.roomnumber+'/Rack-'+data.racknumber+'/Box-'+data.boxnumber);
            //$('#lastmodified').text(data.updated_at);

            //var updated_at = moment(data.updated_at).format('MM-DD-YYYY');  
            //$("#lastmodified").text(updated_at); 
            
            const updated_at = new Date(data.created_at);
            document.getElementById('lastmodified').innerHTML=updated_at.toDateString();

            //$('#status').text(data.status);
        }
        })
    });
    });
    
</script>
    
    <!-- Modal -->
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="dashboard" method="post">
                        {!! csrf_field() !!} 
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-control js-select2 select2-hidden-accessible" name="warehouse">
                                            @foreach ($warehouse as $data)
                                            <option value="{{$data->id}}">{{$data->warehouse}}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label-outlined" for="outlined-select">Select Warehouse</label>
                                    </div>
                                </div>
                            </div>
                
                            <div class="col">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-control js-select2 select2-hidden-accessible" name="roomnumber">
                                            @foreach ($room as $data)
                                            <option value="{{$data->id}}">{{$data->roomnumber}}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label-outlined" for="outlined-select">Select Room</label>
                                    </div>
                                </div>     
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-control js-select2 select2-hidden-accessible" name="racknumber">
                                            @foreach ($rack as $data)
                                            <option value="{{$data->id}}">{{$data->racknumber}}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label-outlined" for="outlined-select">Select Rack</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-control js-select2 select2-hidden-accessible" name="boxnumber">
                                            @foreach ($box as $data)
                                            <option value="{{$data->id}}">{{$data->racknumber}}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label-outlined" for="outlined-select">Select Box</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" name="filenumber" class="form-control form-control-sm form-control-outlined" id="outlined" placeholder="">
                                        <label class="form-label-outlined" for="outlined-sm">File ID</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" name="filename" class="form-control form-control-sm form-control-outlined" id="outlined" placeholder="">
                                        <label class="form-label-outlined" for="outlined-sm">File Name</label>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <div class="form-group mt-4">
                            <button type="submit" value="submit" class="btn btn-success">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>   
                  
@endsection
 