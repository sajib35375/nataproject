@extends('admin.dashboard')
@section('content')


    <div class="wrap">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Admin Profile</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input name="name" value="{{ $edit->name }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input name="email" value="{{ $edit->email }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input name="phone" value="{{ $edit->phone }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Photo</label>
                                <input name="old_photo" value="{{ $edit->photo }}" type="hidden">
                                <input name="photo" class="form-control-file" type="file">
                            </div>
                            <div class="form-group">
                                <input value="Update" class="btn btn-success" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>












    @endsection