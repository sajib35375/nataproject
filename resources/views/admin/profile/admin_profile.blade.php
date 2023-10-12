@extends('admin.dashboard')
@section('content')

<div class="wrap" style="margin: 20px;">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
            @endif
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url('/images/gallery/full/10.jpg') center center;">
                    <h3 style="color: #0b0b0b;" class="widget-user-username">{{ $profile->name }}</h3>
                    <h6 style="color: #0b0b0b;" class="widget-user-desc">{{ $profile->email }}</h6>
                    <a style="float: right;" class="btn btn-secondary" href="{{ route('admin.profile.edit') }}">Edit</a>
                </div>
                <div class="widget-user-image">
                    <img class="rounded-circle" src="{{ URL::to('') }}/admin/img/{{ $profile->photo }}" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">{{ $profile->name }}</h5>
                                <span class="description-text">NAME</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 br-1 bl-1">
                            <div class="description-block">
                                <h5 class="description-header">{{ $profile->email }}</h5>
                                <span class="description-text">EMAIL</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">{{ $profile->phone }}</h5>
                                <span class="description-text">PHONE</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>


        </div>
    </div>
</div>









@endsection