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
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Course Name</th>
                        <th>Batch Name</th>
                        <th>Mobile</th>
                        <th>Organization Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($app as $a)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $a->name_en }}</td>
                        <td>{{ $a->course->course_name }}</td>
                        <td>{{ $a->session->session_name }}</td>
                        <td>{{ $a->mobile }}</td>
                        <td>{{ $a->organization_name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('user.apply.single',$a->id) }}">view</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection