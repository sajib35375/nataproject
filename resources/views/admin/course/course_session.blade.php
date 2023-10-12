@extends('admin.dashboard')
@section('content')


    <div style="margin: 10px;" class="wrap">

        <div class="row">

            <div class="col-8">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                @endif
                @if($errors->any())
                    <p class="text-danger">{{ $errors->first() }}</p>
                @endif
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Batch</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Batch Number</th>
                                    <th>Status</th>
                                    <th width="30%">Action</th>

                                </tr>
                                </thead>
                                <tbody>




                                @foreach($asss as $d)
                                    {{--                                @dd($d->course_a)--}}
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $d->course_a->course_name }}</td>
                                        <td>{{ $d->session_name }}</td>
                                        <td>
                                            @if($d->status==true)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('session.edit',$d->id) }}">Edit</a>
                                            <a class="btn btn-danger" href="{{ route('session.delete',$d->id) }}">Delete</a>
                                            @if($d->status==true)
                                                <a class="btn btn-warning" href="{{ route('status.inactive',$d->id) }}"><i class="fa fa-thumbs-down"></i></a>
                                            @else
                                                <a class="btn btn-success" href="{{ route('status.active',$d->id) }}"><i class="fa fa-thumbs-up"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Batch Number</th>
                                    <th>Status</th>
                                    <th width="30%">Action</th>

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
                        <h2>Create New Batch</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('add.session') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="#">Course Name</label>
                                <select class="form-control" name="course_id" id="">
                                    @foreach($course as $all)
                                    <option value="{{ $all->id }}">{{ $all->course_name }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Batch Number</label>
                                <input name="session_name" class="form-control" type="text">
                                @error('session_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">coordinator sign(size: 150*50)</label>
                                <input name="photo" class="form-control-file" type="file">
                                @error('photo')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">DG Signature(size: 150*50)</label>
                                <input name="dg_photo" class="form-control-file" type="file">
                                @error('dg_photo')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input name="start" class="form-control" type="date">
                                @error('start')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input name="end" class="form-control" type="date">
                                @error('end')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Coordinator Text</label>
                                <input name="coor_text" class="form-control" type="text">
                                @error('coor_text')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Memo No.</label>
                                <input name="memo" class="form-control" type="text">
                                @error('memo')
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



@endsection
