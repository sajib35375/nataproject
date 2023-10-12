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
                        <h2>Create Dormatory Room</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Dormatory Name</th>
                                <th>Grade Name</th>
                                <th>Gender Name</th>
                                <th>Room No</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $room as $d )
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $d->domatory->dormatory_name }}</td>
                                    <td>{{ $d->grade->grade_name }}</td>
                                    <td>{{ $d->gender->gender }}</td>
                                    <td>{{ $d->room_name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('dormatory.room.edit',$d->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('room.delete',$d->id) }}">Delete</a>
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
                        <h2>Add new Dormatory Room</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dormatory.wise.room') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="">Dormatory</label><br>
                                <select class="form-control" name="dormatory_id" id="">
                                    <option value="">Select</option>
                                    @foreach($dormatory as $dormatory)
                                    <option value="{{ $dormatory->id }}">{{ $dormatory->dormatory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Grade</label><br>
                                <select class="form-control" name="grade_id" id="">
                                    <option value="">Select</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Gender</label><br>
                                <select class="form-control" name="gender_id" id="">
                                    <option value="">Select</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Room create</label>
                                <input name="room_name" class="form-control" type="text">
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
            $(document).on('change','select[name="grade_id"]',function (){
                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('dormatory/gender/select') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="gender_id"]').empty();
                            $('select[name="gender_id"]').append('<option value="">-Select-</option>');
                            $.each(data,function (key,value){
                                $('select[name="gender_id"]').append('<option value="'+value.id+'">'+value.gender+'</option>');
                            })

                        }
                    })
                }
            });


            $(document).on('change','select[name="dormatory_id"]',function (){
                let id = $(this).val();
                if(id){
                    $.ajax({
                        url:"{{ url('dormatory/grade/select') }}/"+id,
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
            });

        })

    </script>







@endsection
