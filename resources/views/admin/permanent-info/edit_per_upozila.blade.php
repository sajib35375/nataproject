@extends('admin.dashboard')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h2>Edit Permanent Upozila</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.per.upozila',$edit_data->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="#">Division Name</label>
                                    <select class="form-control" name="division_id" id="">
                                        @foreach($division as $all)
                                            <option {{ $all->id == $edit_data->division_id ? 'selected' : '' }} value="{{ $all->id }}">{{ $all->division_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="#">District Name</label>
                                    <select class="form-control" name="district_id" id="">
                                        @foreach($district as $all)
                                            <option {{ $all->id == $edit_data->district_id ? 'selected' : '' }} value="{{ $all->id }}">{{ $all->district_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input name="upozila_name" value="{{ $edit_data->upozila_name }}" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function (){
            $(document).on('change','select[name="division_id"]',function (e){
                e.preventDefault();

                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('select/per/district') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="district_id"]').empty();

                            $.each(data,function (key,value){
                                $('select[name="district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                            })
                        }
                    });
                }else{
                    alert('danger')
                }

            })
        })





    </script>







@endsection