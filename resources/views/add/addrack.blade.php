@extends('layouts.master2')
@section('content')
<div class="nk-content-body">
        <div class="nk-content-wrap">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Add Rack</h4>
                            
                        </div>
                    </div>                       
                    <div class="form-group">
                        <form action="addrack" method="post">
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
                                    <select class="form-control" name="roomnumber" id="room">
                                        <option value="">Select Room</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="rackname" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Rack Name</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="racknumber" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Rack Number</label>
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function(){

		$('#warehouse').change (function(){
            let wid=$(this).val();


            $.ajax({
            url: '/room',
            type: 'post',
            data: 'wid='+wid + 
            '&_token={{csrf_token()}}',
            success:function(result)
            {
                $('#room').html(result)
            }
        });
    });

});


		

</script>

@endsection