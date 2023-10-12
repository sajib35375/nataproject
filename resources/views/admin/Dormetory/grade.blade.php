@extends('admin.dashboard')
@section('content')


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
                        <h2>All Grade</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Dormatory Name</th>
                                <th>Grade Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $grade as $d )
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $d->g_domatory->dormatory_name }}</td>
                                    <td>{{ $d->grade_name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('grade.create.edit',$d->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('grade.create.delete',$d->id) }}">Delete</a>
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
                        <h2>Add new Grade</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('grade.create.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="">Dormatory</label>
                                <select class="form-control" name="dormatory_id" id="">
                                    <option value="">Select</option>
                                    @foreach($domatory as $dor)
                                    <option value="{{ $dor->id }}">{{ $dor->dormatory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Grade create</label>
                                <input name="grade_name" class="form-control" type="text">
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
