@extends('admin.dashboard')
@section('content')

    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h2>Edit Dormatory</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('grade.create.update',$edit_data->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Dormatory</label>
                        <select class="form-control" name="dormatory_id" id="">
                            @foreach($domatory as $dor)
                                <option {{ $dor->id == $edit_data->dormatory_id ? 'selected' : '' }} value="{{ $dor->id }}">{{ $dor->dormatory_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Grade create</label>
                        <input value="{{ $edit_data->grade_name }}" name="grade_name" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>










@endsection