@extends('admin.dashboard')
@section('content')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div style="margin: 10px;" class="wrap">

        <div class="row">




                    <div class="col-8">
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @endif

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Dormatory Room Assign</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Dormatory Name</th>
                                            <th>Grade Name</th>
                                            <th>Gender</th>
                                            <th>Room Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>





                                        @foreach( $show as $d )
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $d->apply_r->name_en }}</td>
                                                <td>{{ $d->dormatory_r->dormatory_name }}</td>
                                                <td>{{ $d->grade_r->grade_name }}</td>
                                                <td>{{ $d->gender_r->gender }}</td>
                                                <td>{{ $d->room_r->room_name }}</td>
                                                <td>{{ $d->start }}</td>
                                                <td>{{ $d->validity }}</td>
                                                <td>
                                                    <a class="btn btn-info" href="">Edit</a>
                                                    <a class="btn btn-danger" href="{{ route('room.assign.delete',$d->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Dormatory Name</th>
                                            <th>Grade Name</th>
                                            <th>Gender</th>
                                            <th>Room Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
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
                                @error('dormatory_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Grade</label><br>
                                <select class="form-control" name="grade_id" id="">
                                    <option value="">Select</option>

                                </select>
                                @error('grade_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Gender</label><br>
                                <select class="form-control" name="gender_id" id="">
                                    <option value="">Select</option>

                                </select>
                                @error('gender_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Room Select</label>
                                <select class="form-control" name="room_id" id="">
                                    <option value="">Select</option>

                                </select>
                                @error('room_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input name="start" class="form-control" id="datepicker3" type="text">
                                @error('start')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input name="validity" class="form-control" type="text" id="datepicker2">
                                @error('validity')
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

            // $("#datepicker").datepicker({
            //     dateFormat: 'dd-mm-yy',
            // });



            $(document).on('change','select[name="grade_id"]',function (){
                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('dormatory/gender/load') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){

                            var d = $('select[name="gender_id"]').empty();
                            $('select[name="gender_id"]').append('<option value="">-select-</option>');
                            $.each(data,function (key,value){
                                $('select[name="gender_id"]').append('<option value="'+value.id+'">'+value.gender+'</option>');
                            })

                        }
                    })
                }
            });

            var unavailableDates = [];
            $(document).on('change' , 'select[name="room_id"]' , function () {
                unavailableDates = [];

                let room_id = this.value;
                $.ajax({
                    url:"{{ url('dormatory/room/check') }}/"+room_id,
                    method:"GET",
                    dataType:"json",
                    success:function (data){


                        for (var key in data) {
                            unavailableDates.push(data[key]);
                        }
                        console.log(unavailableDates);
                        function unavailable(date) {
                            dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                            if ($.inArray(dmy, unavailableDates) == -1) {
                                return [true, ""];
                            } else {
                                return [false, "", "Unavailable"];
                            }
                        }

                        $(function() {
                            $("#datepicker3").datepicker({
                                // dateFormat: 'dd-mm-yy',
                                beforeShowDay: unavailable
                            });

                        });

                        $(function() {
                            $("#datepicker2").datepicker({
                                // dateFormat: 'dd-mm-yy',
                                beforeShowDay: unavailable
                            });

                        });



                    }
                });

            })



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
