@extends('admin.dashboard')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h2>Edit Gender</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('gender.update',$edit_data->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Dormatory</label>
                        <select class="form-control" name="dormatory_id" id="">
                            @foreach($dormatory as $dor)
                                <option {{ $dor->id == $edit_data->dormatory_id ? 'selected' : '' }} value="{{ $dor->id }}">{{ $dor->dormatory_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Grade </label>
                        <select class="form-control" name="grade_id" id="">
                            @foreach($grade as $dor)
                                <option {{ $dor->id == $edit_data->grade_id ? 'selected' : '' }} value="{{ $dor->id }}">{{ $dor->grade_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Gender </label>
                        <input name="gender" value="{{ $edit_data->gender }}" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function (){
            $(document).on('change','select[name="dormatory_id"]',function (){
                let id = $(this).val();
                if (id){
                    $.ajax({
                        url:"{{ url('select/edit/grade') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="grade_id"]').empty();
                            $('select[name="grade_id"]').append('<option value="">-Select-</option>');
                            $.each(data,function (key,value) {
                                $('select[name="grade_id"]').append('<option value="'+value.id+'">'+value.grade_name+'</option>');
                            })
                        }
                    })
                }
            })
        })
    </script>




@endsection