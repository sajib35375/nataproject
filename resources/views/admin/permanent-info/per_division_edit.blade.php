@extends('admin.dashboard')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h2>Edit Permanent Division</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.per.division',$edit_data->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="division_name" value="{{ $edit_data->division_name }}" class="form-control" type="text">
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