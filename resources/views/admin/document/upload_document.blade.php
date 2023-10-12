@extends('admin.dashboard')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div style="margin: 10px;" class="wrap">

        <div class="row">
            <div class="col-md-8">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}<button class="close bg-dark" data-dismiss="alert">&times;</button></p>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h2>All Document</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>Batch Number</th>
                                <th>Topic</th>
                                <th>Description</th>
                                <th>Upload File Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($document as $d)
                                {{--                                @dd($d->course_a)--}}
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $d->course->course_name }}</td>
                                    <td>{{ $d->session->session_name }}</td>
                                    <td>{{ $d->title }}</td>
                                    <td>{{ Str::limit($d->description,30) }}</td>
                                    <td>{{ $d->file }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('edit.syllabus',$d->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('document.delete',$d->id) }}">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Add new Document</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.syllabus') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">Course Name</label>
                                <select class="form-control" name="course_id" id="">
                                    <option value="">-Select-</option>
                                    @foreach($courses as $all)

                                        <option value="{{ $all->id }}">{{ $all->course_name }}</option>
                                    @endforeach
                                </select>
                                @error('session_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Batch Name</label>
                                <select class="form-control" name="session_id" id="">
{{--                                    @foreach($session as $all)--}}
{{--                                        <option value="{{ $all->id }}">{{ $all->session_name }}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                                @error('session_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input name="title" class="form-control" type="text">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input name="description" class="form-control" type="text">
                                @error('description')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Document</label>
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
    </div>


    <script>

        $(document).ready(function (){

            $(document).on('change','select[name="course_id"]',function (){
                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('session/select') }}/"+id,
                        method: "GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="session_id"]').empty();
                            $('select[name="session_id"]').append('<option value="">Select Now</option>');
                            $.each(data,function (key,value){

                                $('select[name="session_id"]').append('<option value="'+value.id+'">'+value.session_name+'</option>');
                            })
                        }

                    })
                }
            })



        })
    </script>







@endsection
