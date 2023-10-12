@extends('admin.dashboard')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="row">
        <div style="margin: 15px;" class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Syllabus</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('update.syllabus',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Course Name</label>
                            <select class="form-control" name="course_id" id="">
                                @foreach($course as $all)
                                    <option {{ $all->id==$edit_data->course_id ? 'selected':'' }} value="{{ $all->id }}">{{ $all->course_name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Batch Name</label>
                            <select class="form-control" name="session_id" id="">
                                @foreach($session as $all)
                                    <option {{ $all->id==$edit_data->session_id ? 'selected':'' }} value="{{ $all->id }}">{{ $all->session_name }}</option>
                                @endforeach
                            </select>
                            @error('session_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name="title" class="form-control" value="{{ $edit_data->title }}" type="text">
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input name="description" class="form-control" value="{{ $edit_data->description }}" type="text">
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Syllabus</label>
                            <input name="old_file" value="{{ $edit_data->file }}" type="hidden">
                            <input name="syllabus" class="form-control-file" type="file">
                            @error('syllabus')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input class="btn btn-success" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function (){

            $(document).on('change','select[name="course_id"]',function (){
                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('edit/session/select') }}/"+id,
                        method: "GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="session_id"]').empty();

                            $.each(data,function (key,value){
                                $('select[name="session_id"]').append('<option value="'+value.id+'">'+value.session_name+'</option>');
                            })
                        }

                    })
                }else{
                    alert('danger')
                }
            })



        })
    </script>


@endsection