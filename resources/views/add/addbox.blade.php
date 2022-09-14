@extends('layouts.master2')
@section('content')
<div class="nk-content-body">
        <div class="nk-content-wrap">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Add Box</h4>
                            
                        </div>
                    </div>                       
                    <div class="form-group">
                        <form action="addbox" method="post">
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
                                    <select class="form-control" name="racknumber" id="rack">
                                        <option value="">Select Rack</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="boxname" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Box Name</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="boxnumber" class="form-control form-control-xl form-control-outlined" id="outlined-xl" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">Box Number</label>
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

            $('#rack').html('<option value="">Select Rack</option>')

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

    $('#room').change (function(){
            let roid=$(this).val();


            $.ajax({
            url: '/rack',
            type: 'post',
            data: 'roid='+roid + 
            '&_token={{csrf_token()}}',
            success:function(result)
            {
                $('#rack').html(result)
            }
        });
    });

});


		

</script>

@endsection