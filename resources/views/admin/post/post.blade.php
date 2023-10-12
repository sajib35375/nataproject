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



                    <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                        <div class="form-control-feedback"></div>
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Short Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea class="form-control"  name="short_des" rows="4" cols="50">
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
                                            <textarea name="long_des" id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;">												This is my textarea to be replaced with CKEditor.
						</textarea> <div class="help-block"></div></div>

                                        <div class="form-control-feedback"></div>
                                        @error('long_des')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls mt-5 mb-5">
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
                                            <input name="location" type="checkbox" id="checkbox_2"  value="1">
                                            <label for="checkbox_2">Location</label>
                                        </fieldset>
                                        <fieldset>
                                            <input name="background" type="checkbox" id="checkbox_3" value="1">
                                            <label for="checkbox_3">Background</label>
                                        </fieldset>
                                        <fieldset>
                                            <input name="vm" type="checkbox" id="checkbox_4"  value="1">
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
                                            <input name="function" type="checkbox" id="checkbox_5"  value="1">
                                            <label for="checkbox_5">Function</label>
                                        </fieldset>
                                        <fieldset>
                                            <input name="value" type="checkbox" id="checkbox_6" value="1">
                                            <label for="checkbox_6">Values</label>
                                        </fieldset>
                                        <fieldset>
                                            <input name="activity" type="checkbox" id="checkbox_7"  value="1">
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
                                            <input name="stakeholder" type="checkbox" id="checkbox_8"  value="1">
                                            <label for="checkbox_8">Stakeholder</label>
                                        </fieldset>
                                        <fieldset>
                                            <input name="organogram" type="checkbox" id="checkbox_9" value="1">
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
                                            <input name="statistic" type="checkbox" id="checkbox_10"  value="1">
                                            <label for="checkbox_10">Statistic of civil officers and staff</label>
                                        </fieldset>
                                        <fieldset>
                                            <input name="physical" type="checkbox" id="checkbox_11" value="1">
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
                                            <input name="importance" type="checkbox" id="checkbox_12"  value="1">
                                            <label for="checkbox_12">Importance of Training</label>
                                        </fieldset>
                                        <fieldset>
                                            <input name="training" type="checkbox" id="checkbox_13" value="1">
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
                                            <input name="nata_Strengthening" type="checkbox" id="checkbox_14"  value="1">
                                            <label for="checkbox_14">NATA Strengthening Project</label>
                                        </fieldset>
                                        <fieldset>
                                            <input name="resources" type="checkbox" id="checkbox_15" value="1">
                                            <label for="checkbox_15">List of Resources Personnel</label>
                                        </fieldset>


                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <fieldset>
                                    <input name="notice" type="checkbox" id="checkbox_16"  value="1">
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