@extends('admin.dashboard')

@section('content')

    <div class="col-12">
        @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
        @endif
        @if($errors->any())
            <p class="text-danger">{{ $errors->first() }}</p>
        @endif
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All Posts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Image</th>

                            <th width="30%">Action</th>

                        </tr>
                        </thead>
                        <tbody>




                        @foreach($all_post as $post)

                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->short_des }}</td>
                                <td><img src="{{ URL::to('') }}/NATA_files/image/{{ $post->photo }}" alt=""></td>

                                <td>
                                    <a class="btn btn-info" href="{{ route('edit.post',$post->id) }}"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger" href="{{ route('delete.post',$post->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Image</th>

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




@endsection