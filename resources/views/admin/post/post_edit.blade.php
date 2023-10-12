@extends('admin.dashboard')
@section('content')

    <div style="margin: 10px;" class="box">

        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                    @endif



                    <form action="{{ route('update.post',$edit_post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $edit_post->title }}" name="title" class="form-control" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                    <div class="form-control-feedback"></div>
                                    @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Short Description <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                            <textarea class="form-control"  name="short_des" rows="4" cols="50">{{ $edit_post->short_des }}
                                            </textarea> <div class="help-block"></div></div>
                                </div>
                                @error('short_des')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Long Description <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                            <textarea name="long_des" id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;">{{ $edit_post->long_des }}												This is my textarea to be replaced with CKEditor.
						</textarea> <div class="help-block"></div></div>

                                    <div class="form-control-feedback"></div>
                                    @error('long_des')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Image <span class="text-danger">*</span></h5>
                                    <div class="controls mt-5 mb-5">
                                        <input name="old_photo" value="{{ $edit_post->photo }}" type="hidden">
                                        <input type="file" name="photo" class="form-control-file"> <div class="help-block"></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <h5>About <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <fieldset>
                                            <input {{ $edit_post->location == 1 ? 'checked' : '' }} name="location" type="checkbox" id="checkbox_2"  value="1">
                                            <label for="checkbox_2">Location</label>
                                        </fieldset>
                                        <fieldset>
                                            <input {{ $edit_post->background == 1 ? 'checked' : '' }} name="background" type="checkbox" id="checkbox_3" value="1">
                                            <label for="checkbox_3">Background</label>
                                        </fieldset>
                                        <fieldset>
                                            <input {{ $edit_post->vm == 1 ? 'checked' : '' }} name="vm" type="checkbox" id="checkbox_4"  value="1">
                                            <label for="checkbox_4">Vision and Mission</label>
                                        </fieldset>

                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>Function Values and Mission <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <fieldset>
                                            <input {{ $edit_post->function == 1 ? 'checked' : '' }} name="function" type="checkbox" id="checkbox_5"  value="1">
                                            <label for="checkbox_5">Function</label>
                                        </fieldset>
                                        <fieldset>
                                            <input {{ $edit_post->value == 1 ? 'checked' : '' }} name="value" type="checkbox" id="checkbox_6" value="1">
                                            <label for="checkbox_6">Values</label>
                                        </fieldset>
                                        <fieldset>
                                            <input {{ $edit_post->activity == 1 ? 'checked' : '' }} name="activity" type="checkbox" id="checkbox_7"  value="1">
                                            <label for="checkbox_7">Activities</label>
                                        </fieldset>

                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <h5>About <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <fieldset>
                                            <input {{ $edit_post->stakeholder == 1 ? 'checked' : '' }} name="stakeholder" type="checkbox" id="checkbox_8"  value="1">
                                            <label for="checkbox_8">Stakeholder</label>
                                        </fieldset>
                                        <fieldset>
                                            <input {{ $edit_post->organogram == 1 ? 'checked' : '' }} name="organogram" type="checkbox" id="checkbox_9" value="1">
                                            <label for="checkbox_9">Organogram of NATA</label>
                                        </fieldset>


                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>Academy Resourses <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <fieldset>
                                            <input {{ $edit_post->statistic == 1 ? 'checked' : '' }} name="statistic" type="checkbox" id="checkbox_10"  value="1">
                                            <label for="checkbox_10">Statistic of civil officers and staff</label>
                                        </fieldset>
                                        <fieldset>
                                            <input {{ $edit_post->physical == 1 ? 'checked' : '' }} name="physical" type="checkbox" id="checkbox_11" value="1">
                                            <label for="checkbox_11">Physical Facilities</label>
                                        </fieldset>


                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <h5>Training Activities <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <fieldset>
                                            <input {{ $edit_post->importance == 1 ? 'checked' : '' }} name="importance" type="checkbox" id="checkbox_12"  value="1">
                                            <label for="checkbox_12">Importance of Training</label>
                                        </fieldset>
                                        <fieldset>
                                            <input {{ $edit_post->training == 1 ? 'checked' : '' }} name="training" type="checkbox" id="checkbox_13" value="1">
                                            <label for="checkbox_13">Training Methods</label>
                                        </fieldset>


                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>Training Activities <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <fieldset>
                                            <input {{ $edit_post->nata_Strengthening == 1 ? 'checked' : '' }} name="nata_Strengthening" type="checkbox" id="checkbox_14"  value="1">
                                            <label for="checkbox_14">NATA Strengthening Project</label>
                                        </fieldset>
                                        <fieldset>
                                            <input {{ $edit_post->resources == 1 ? 'checked' : '' }} name="resources" type="checkbox" id="checkbox_15" value="1">
                                            <label for="checkbox_15">List of Resources Personnel</label>
                                        </fieldset>


                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <fieldset>
                                    <input {{ $edit_post->notice == 1 ? 'checked' : '' }} name="notice" type="checkbox" id="checkbox_16"  value="1">
                                    <label for="checkbox_16">Notice</label>
                                </fieldset>
                            </div>
                        </div>

                        <br><div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                        </div>
                    </form>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->







@endsection