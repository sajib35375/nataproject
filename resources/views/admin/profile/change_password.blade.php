@extends('admin.dashboard')
@section('content')


    <div class="wrap">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>Admin Change Password</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.change.pass') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Old Password</label>
                                <input name="old_password"  class="form-control" type="password">
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input name="password" class="form-control" type="password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input name="password_confirmation" class="form-control" type="password">
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