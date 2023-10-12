@extends('frontend.body.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-4 my-5" style="margin-bottom: 20px;">
                <img style="width: 150px;height: 150px;border-radius: 50%;display: block;margin: auto;" src="{{ URL::to('') }}/img/user/{{ Auth::user()->photo }}" alt="">
                <a class="btn btn-primary btn-block" href="{{ route('user.profile') }}">Profile</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.applicant') }}">User Info View</a>
                <a class="btn btn-primary btn-block" href="{{ route('change.pass.view') }}">Change Password</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.apply') }}">Registration Form</a>
                <a class="btn btn-danger btn-block" href="{{ route('logout') }}">logout</a>
            </div>
            <div class="col-md-8">
                @if( Session::has('success') )
                    <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                @endif
                <form action="{{ route('change.pass') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Current Password</label>
                        <input name="old_password" class="form-control" type="password">
                        @error('current_password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input name="password" class="form-control" type="password">
                        @error('new_password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input name="password_confirmation" class="form-control" type="password">
                        @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input value="Update" class="btn btn-success" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection