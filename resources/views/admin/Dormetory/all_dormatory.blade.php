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
                        <h2>All Dormatory</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Dormatory Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $dormatory as $d )
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $d->dormatory_name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('edit.dormatory',$d->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('delete.dormatory',$d->id) }}">Delete</a>
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
                        <h2>Add new Dormatory</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('create.dormatory') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="">Dormatory create</label>
                                <input name="dormatory_name" class="form-control" type="text">
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
