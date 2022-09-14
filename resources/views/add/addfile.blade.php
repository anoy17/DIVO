@extends('layouts.master2')
@section('content')
<div class="nk-content-body">
        <div class="nk-content-wrap">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Add File</h4>
                            
                        </div>
                    </div>                       
                    <div class="form-group">
                        <form action="addfile" method="post">
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
                                    <select class="form-control" name="boxnumber" id="box">
                                        <option value="">Select Box</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="filenumber" class="form-control form-control-xl form-control-outlined" id="outlined" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">File ID</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="filename" class="form-control form-control-xl form-control-outlined" id="outlined" placeholder="">
                                    <label class="form-label-outlined" for="outlined-lg">File Name</label>
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
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function(){

		$('#warehouse').change (function(){
            let wid=$(this).val();

            $('#rack').html('<option value="">Select Rack</option>')
            $('#box').html('<option value="">Select Box</option>')

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

            $('#box').html('<option value="">Select Box</option>')
            
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

    $('#rack').change (function(){
            let raid=$(this).val();


            $.ajax({
            url: '/box',
            type: 'post',
            data: 'raid='+raid + 
            '&_token={{csrf_token()}}',
            success:function(result)
            {
                $('#box').html(result)
            }
        });
    });

});


		

</script>

@endsection