@extends('admin.dashboard')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div style="margin: 10px;" class="wrap">

        <div class="row">
            <div class="col-md-8">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                @endif
                @if($errors->any())
                    <p class="text-danger">{{ $errors->first() }}</p>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>All Gender</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Dormatory Name</th>
                                <th>Grade Name</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $gender as $d )
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $d->dormatory_G->dormatory_name }}</td>
                                    <td>{{ $d->grade_G->grade_name }}</td>
                                    <td>{{ $d->gender }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('gender.edit',$d->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('gender.delete',$d->id) }}">Delete</a>
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
                        <h2>Add new Gender</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gender.create') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="">Dormatory</label>
                                <select class="form-control" name="dormatory_id" id="">
                                    <option value="">Select</option>
                                    @foreach($dormatory as $dor)
                                        <option value="{{ $dor->id }}">{{ $dor->dormatory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Grade </label>
                                <select class="form-control" name="grade_id" id="">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Gender </label>
                                <input name="gender" class="form-control" type="text">
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
            $(document).on('change','select[name="dormatory_id"]',function (){
                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('select/grade') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="grade_id"]').empty();
                            $('select[name="grade_id"]').append('<option value="">-Select-</option>');
                            $.each(data,function (key,value){
                                $('select[name="grade_id"]').append('<option value="'+value.id+'">'+value.grade_name+'</option>');
                            })

                        }
                    })
                }
            })
        })



    </script>


@endsection
