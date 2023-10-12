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
                        <th>Course Name</th>
                        <th>Batch Name</th>
                        <th>Applicant Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($app as $data)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $data->course->course_name }}</td>
                        <td>{{ $data->session->session_name }}</td>
                        <td>{{ $data->name_en }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('user.apply.single',$data->id) }}">view</a>
                            @php
                            $id = $data->session->id;
                            $validity = \App\Models\Asession::find($id);
                            @endphp
                           @if( $validity->end < \Carbon\Carbon::now())

                            <a target="_blank" class="btn btn-danger" href="{{ route('user.certificate.download',$data->id) }}">Certificate Download</a>
                            <a target="_blank" class="btn btn-primary" href="{{ route('user.letter.download',$id) }}">Release Order</a>
                            @else
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>



@endsection