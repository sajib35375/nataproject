@extends('admin.dashboard')
@section('content')


    <div style="margin: 10px;" class="wrap">

        <div class="row">
            <div class="col-md-8">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                    @endif
                <div class="card">
                    <div class="card-header">
                        <h2>All Course</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $d->course_name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('course.edit',$d->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('course.delete',$d->id) }}">Delete</a>
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
                        <h2>Add new Course</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('course.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="course_name" class="form-control" type="text">
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
