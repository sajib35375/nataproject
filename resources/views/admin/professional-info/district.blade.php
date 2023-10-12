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
                        <h2>All Districts</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($district as $d)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $d->division->division_name }}</td>
                                    <td>{{ $d->district_name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('edit.pro.district',$d->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('delete.pro.district',$d->id) }}">Delete</a>
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
                        <h2>Add new District</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.district') }}" method="POST">
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
                                <label for="">District Name</label>
                                <input name="district_name" class="form-control" type="text">
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
