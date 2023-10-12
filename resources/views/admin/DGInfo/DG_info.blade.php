@extends('admin.dashboard')
@section('content')



    <div class="wrap" style="margin: 10px;">
        <div class="col-md-12">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
            @endif
            <div class="card">
                <div class="card-header">
                    <h2>Update DG Information</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('dg.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Director General</label>
                            <input name="name" value="{{ $info->name }}" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <input name="old_photo" value="{{ $info->photo }}" type="hidden">
                            <input name="photo" class="form-control-file" type="file">
                        </div>
                        <div class="form-group">
                            <h5>Long Description <span class="text-danger">*</span></h5>
                            <div class="controls">
                                            <textarea name="long_des" id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;">{!! $info->description !!}</textarea> <div class="help-block"></div></div>

                            <div class="form-control-feedback"></div>
                            @error('long_des')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection