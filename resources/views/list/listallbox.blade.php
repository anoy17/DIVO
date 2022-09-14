@extends('layouts.master2')
@section('content')
    <div class="nk-content-body">
        <div class="nk-content-wrap">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">All Boxes <a href="addbox" class="btn btn-primary btn-sm"><em class="ti-plus"></em>ADD NEW</button></a></h4>
                                
                        </div>
                    </div>
                    <div class="card card-bordered card-preview nk-activity is-scrollable h-400px">
                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                                <table class="datatable-init-export nowrap table" data-export-title="Export">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Warehouse</th>
                                            <th>Room</th>
                                            <th>Rack</th>
                                            <th>Box Name</th>
                                            <th>Box Number</th>
                                            <th>Last Modified</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($listallboxes as $data)
                                        <tr>
                                            <td>{{$data['id']}}</td>

                                            <td><a href="#" class="btn-detail" data-toggle="modal" data-id="{{$data['id']}}" data-target="#modal_aside_left">{{$data['warehouse']}}</a></td>

                                            <td>{{$data['roomnumber']}}</td>

                                            <td>{{$data['racknumber']}}</td>

                                            <td>{{$data['boxname']}}</td>

                                            <td>{{$data['boxnumber']}}</td>

                                            <td>{{ $data['created_at']->format("M d Y")}}</td>

                                            <td>
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><button type="button"  value="{{ $data->id }}" class="btn btn-link btn-block edit-btn" data-toggle="modal" data-target="#exampleModalCenter"><em class="icon ni ni-edit"></em><span>Edit</span></button></li>
                                                    <li><a href="delete/{{$data->id}}" value="{{ $data->id }}" class="btn btn-link btn-block edit-btn" onclick="return confirm(&quot;Confirm delete?&quot;)"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                </ul>
                                            </div>
                                            </td>

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
                        <h6>Warehouse</h6>
                        <p id="warehouse"></p>
                        <hr>
                        <h6>Room</h6>
                        <p id="roomnumber"></p>
                        <hr>
                        <h6>Rack</h6>
                        <p id="racknumber"></p>
                        <hr>
                        <h6>Box Name</h6>
                        <p id="boxname"></p>
                        <hr>
                        <h6>Box Number</h6>
                        <p id="boxnumber"></p>
                        <hr>
                        <h6>Last Modified</h6>
                        <p id="lastmodified"></p>
                        
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
        url: 'listallbox/'+id,
        type: 'GET',
        data: {
            "id": id
        },
        success:function(data) {
            console.log(data);
            $('#warehouse').html(data.warehouse); //html//text
            $('#roomnumber').html(data.roomnumber);
            $('#racknumber').html(data.racknumber);
            $('#boxname').text(data.boxname);
            $('#boxnumber').html(data.boxnumber);
            //$('#lastmodified').text(data.updated_at);

            //var updated_at = moment(data.updated_at).format('MM-DD-YYYY');  
            //$("#lastmodified").text(updated_at); 
            
            const updated_at = new Date(data.created_at);
            document.getElementById('lastmodified').innerHTML=updated_at.toDateString();
        }
        })
    });
    });
    
</script>
@endsection