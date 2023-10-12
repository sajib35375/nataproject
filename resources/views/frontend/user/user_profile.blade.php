@extends('frontend.body.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-4 my-5" style="margin-bottom: 20px;">
                <img style="width: 150px;height: 150px;border-radius: 50%;display: block;margin: auto;" src="{{ URL::to('') }}/img/uploads/user/{{ $user_data->photo }}" alt="">
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
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" value="{{ $user_data->name }}" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" value="{{ $user_data->email }}" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input name="phone" value="{{ $user_data->phone }}" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <input name="old_photo" value="{{ $user_data->photo }}" type="hidden">
                        <input name="photo" class="form-control-file" type="file">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
















@endsection