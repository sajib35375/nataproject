@extends('admin.dashboard')
@section('content')
    @if(Session::has('success'))
        <p class="alert alert-danger">{{ Session::get('success') }}</p>
    @endif

    <div class="wrap">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Batch Wise Certificate</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Batch Number</th>
                            <th>Coordinator Signature</th>
                            <th>DG Signature</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sess as $d)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $d->course_a->course_name }}</td>
                                <td>{{ $d->session_name }}</td>
                                <td><img style="width: 50px;height: 50px;" src="{{ URL::to('') }}/certificate/signature/{{ $d->photo }}" alt=""></td>
                                <td><img style="width: 50px;height: 50px;" src="{{ URL::to('') }}/certificate/signature/{{ $d->dg_photo }}" alt=""></td>
                                <td>
                                    <a target="_blank" class="btn btn-danger btn-sm" href="{{ route('certificate.view',$d->id) }}">Certificate</a>
                                    <a target="_blank" class="btn btn-info btn-sm" href="{{ route('release.latter',$d->id) }}">Release Order</a>
                                    <a target="_blank" class="btn btn-success btn-sm" href="{{ route('release.view',$d->id) }}">Release View</a>
                                    <a target="_blank" class="btn btn-primary btn-sm" href="{{ route('excel.export',$d->id) }}">Export</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>










@endsection