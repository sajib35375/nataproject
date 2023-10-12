@extends('admin.dashboard')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h2>Edit Professional District</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.pro.district',$edit_data->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="#">Division Name</label>
                                    <select class="form-control" name="division_id" id="">
                                        @foreach($division as $all)
                                            <option {{ $all->id == $edit_data->division_id ? 'selected' : '' }} value="{{ $all->id }}">{{ $all->division_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input name="district_name" value="{{ $edit_data->district_name }}" class="form-control" type="text">
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