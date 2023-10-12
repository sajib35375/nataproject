@extends('admin.dashboard')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Edit Course</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('course.update',$course_edit->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="course_name" value="{{ $course_edit->course_name }}" class="form-control" type="text">
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
    </div>


@endsection