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
                        <h2>All Upozila</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>Upozila Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($upozila as $d)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $d->division->division_name }}</td>
                                    <td>{{ $d->perdistrict->district_name }}</td>
                                    <td>{{ $d->upozila_name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('edit.per.upozila',$d->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('delete.per.upozila',$d->id) }}">Delete</a>
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
                        <h2>Add new Upozila</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.per.upozila') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="#">Division Name</label>
                                <select class="form-control" name="division_id" id="">
                                    @foreach($division as $all)
                                        <option value="{{ $all->id }}">{{ $all->division_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="#">District Name</label>
                                <select class="form-control" name="district_id" id="">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Upozila Name</label>
                                <input name="upozila_name" class="form-control" type="text">
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

            $(document).on('change','select[name="division_id"]',function (){
                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('per/district/select') }}/"+id,
                        method: "GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="district_id"]').empty();

                            $.each(data,function (key,value){
                                $('select[name="district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
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
