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
                        <h2>Assign Dormatory Room List</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Dormatory Name</th>
                                <th>Grade Name</th>
                                <th>Gender Name</th>
                                <th>Room Select</th>
                                <th>Validity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $room as $d )
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $d->apply_r->name_en }}</td>
                                    <td>{{ $d->dormatory_r->dormatory_name }}</td>
                                    <td>{{ $d->grade_r->grade_name }}</td>
                                    <td>{{ $d->gender_r->gender }}</td>
                                    <td>{{ $d->room_r->room_name }}</td>
                                    <td>{{ $d->validity }}</td>
                                    <td>
                                        <a class="btn btn-info" href="">Edit</a>
                                        <a class="btn btn-danger" href="">Delete</a>
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
                        <h2>Assign new Dormatory Room</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('room.set') }}" method="POST">
                            @csrf
                            <div class="msg"></div>
                            <div class="form-group">
                                <label for="">Participant</label><br>
                                <select class="form-control" name="applicant_id" id="">
                                    <option value="">Select</option>
                                    @foreach($students as $student)


                                        @if(in_array($student->id,$filter_id))

                                        @else

                                            <option value="{{ $student->id }}">{{ $student->name_en }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

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
                                <label for="">Room Select</label>
                                <select class="form-control" name="room_id" id="">
                                    <option value="">Select</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input name="start" class="form-control" type="date">
                            </div>
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input name="validity" class="form-control" type="date">
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
                        url:"{{ url('dormatory/gender/load') }}/"+id,
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
                        url:"{{ url('dormatory/grade/load') }}/"+id,
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

            $(document).on('change','select[name="gender_id"]',function (){
                let id = $(this).val();
                if(id){
                    $.ajax({
                        url:"{{ url('dormatory/room/load') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="room_id"]').empty();
                            $('select[name="room_id"]').append('<option value="">-Select-</option>');
                            $.each(data,function (key,value){

                                $('select[name="room_id"]').append('<option value="'+value.id+'">'+value.room_name+'</option>');

                            })

                        }
                    })
                }
            });

            {{--$(document).on('change','select[name="gender_id"]',function (){--}}
            {{--    let id = $(this).val();--}}
            {{--    if(id){--}}
            {{--        $.ajax({--}}
            {{--            url:"{{ url('dormatory/room/disable') }}/"+id,--}}
            {{--            method:"GET",--}}
            {{--            dataType:"json",--}}
            {{--            success:function (data){--}}
            {{--                var d = $('select[name="room_id"]').empty();--}}

            {{--                $.each(data,function (key,value){--}}

            {{--                    if(value.validity) {--}}
            {{--                        $('select[name="room_id"]').append('<option disabled value="' + value.id + '">' + value.room_name + '</option>');--}}
            {{--                    }--}}
            {{--                })--}}

            {{--            }--}}
            {{--        })--}}
            {{--    }else{--}}
            {{--        alert('danger')--}}
            {{--    }--}}
            {{--});--}}





        })

        function msg($id){
            alert();
            // if ($id == null){
            //     alert('invalid applicant');
            // }
        }

    </script>







@endsection
