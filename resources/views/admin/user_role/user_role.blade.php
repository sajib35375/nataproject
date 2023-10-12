@extends('admin.dashboard')
@section('content')

    <div class="wrap" style="margin: 6px;">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2> All Admin User </h2>
                        <a style="float: right;" class="btn btn-danger" href="{{ route('add.user.role') }}">Add New User</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Photo</th>
                                <th>Access</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $d)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td><img style="width: 50px;height: 50px;" src="{{ URL::to('') }}/admin/img/{{ $d->photo }}" alt=""></td>
                                    <td>
                                        @if($d->slider==1)
                                            <span class="badge badge-success">slider</span>
                                        @else
                                        @endif

                                            @if($d->course==1)
                                                <span class="badge badge-info">course</span>
                                            @else
                                            @endif

                                            @if($d->batch==1)
                                                <span class="badge badge-danger">batch</span>
                                            @else
                                            @endif

                                            @if($d->pro_info==1)
                                                <span class="badge badge-warning">pro_info</span>
                                            @else
                                            @endif

                                            @if($d->per_info==1)
                                                <span class="badge badge-danger">per_info</span>
                                            @else
                                            @endif

                                            @if($d->syllabus==1)
                                                <span class="badge badge-light">syllabus</span>
                                            @else
                                            @endif

                                            @if($d->participants==1)
                                                <span class="badge badge-success">participants</span>
                                            @else
                                            @endif

                                            @if($d->post==1)
                                                <span class="badge badge-primary">post</span>
                                            @else
                                            @endif

                                            @if($d->certificate==1)
                                                <span class="badge badge-success">certificate</span>
                                            @else
                                            @endif

                                            @if($d->dormatory==1)
                                                <span class="badge badge-secondary">dormatory</span>
                                            @else
                                            @endif

                                            @if($d->admin_role==1)
                                                <span class="badge badge-success">admin_role</span>
                                            @else
                                            @endif
                                            @if($d->dg_info==1)
                                                <span class="badge badge-success">dg_info</span>
                                            @else
                                            @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="">Edit</a>
                                        <a class="btn btn-danger" href="">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection