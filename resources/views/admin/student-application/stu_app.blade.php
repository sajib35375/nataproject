@extends('admin.dashboard')
@section('content')



        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row">



                    <div class="col-12">
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @endif
                        @if($errors->any())
                            <p class="text-danger">{{ $errors->first() }}</p>
                        @endif
                        <div class="box">
                            <div class="box-header with-border ">
                                <span class="text-danger count"></span>
                                <h3 class="box-title">Participant List </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Course Name</th>
                                            <th>Batch Number</th>
                                            <th>Mobile</th>
                                            <th>Organization Name</th>
                                            <th>Photo</th>
                                            <th>Status</th>
                                            <th width="30%">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>



                                        @foreach($allData as $data)

                                            <tr>

                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $data->name_en }}</td>
                                                <td>{{ $data->course->course_name }}</td>
                                                <td>{{ $data->session->session_name }}</td>
                                                <td>{{ $data->mobile }}</td>
                                                <td>{{ $data->organization_name }}</td>
                                                <td><img style="width: 60px;height: 60px;" src="{{ URL::to('') }}/NATA_files/image/{{ $data->photo }}" alt=""></td>
                                                <td>
                                                    @if($data->status==false)

                                                        <span class="badge badge-danger">Pending</span>
                                                    @else

                                                        <span class="badge badge-success">Approve</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{ route('app.detail',$data->id) }}"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-success" href="{{ route('edit.student',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger" href="{{ route('apply.delete',$data->id) }}"><i class="fa fa-trash"></i></a>
                                                    @if($data->status==false)
                                                        <a class="btn btn-warning" href="{{ route('status.approve',$data->id) }}"><i class="fa fa-angle-down"></i></a>
                                                    @else
                                                        <a class="btn btn-info" href="{{ route('status.pending',$data->id) }}"><i class="fa fa-angle-up"></i></a>
                                                    @endif

                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Course Name</th>
                                            <th>Course Batch Name</th>
                                            <th>mobile</th>
                                            <th>Organization Name</th>
                                            <th>Photo</th>
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




                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>

@endsection