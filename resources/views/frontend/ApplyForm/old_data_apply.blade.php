@extends('frontend.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <main>


        <div class="container" style="padding-bottom: 25px; margin-bottom: 10px;">


            <legend>
                <center>
                    <h3><b>Registration Form with Old Data (Participant)</b></h3>
                </center>
            </legend>
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
            @endif


            <form class="form" method="POST"  action="{{ route('apply.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <fieldset>


                        <fieldset class="the-fieldset" style="margin-top: 0px;margin-right: 15px;margin-left: 15px;">

                            <legend class="the-legend"><strong>Course Selection<span class="text-danger">*</span></strong></legend>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>

                                    <select name="course_id" class="form-control selectpicker">


                                        <option value="">Please Select Course</option>

                                        @foreach ($course as $course_select)

                                            @if(in_array($course_select->id, $disable_courses_id))
                                                <option disabled value="{{$course_select->id}}">{{$course_select->course_name}}</option>
                                            @else
                                                <option value="{{$course_select->id}}">{{$course_select->course_name}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    @error('course_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <legend class="the-legend"><strong>Batch Number<span class="text-danger">*</span></strong></legend>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                    <select name="session_id" class="form-control selectpicker">
                                        <option value="">Please Select Batch</option>
                                    </select>
                                    @error('session_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <fieldset class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">
                                <legend class="the-legend"><strong>Professional Information</strong></legend>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Organization Name<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-building"></i></span>


                                            <select class="form-control" name="organization" id="">
                                                <option value="">-select-</option>

                                                <option {{ $re_apply->organization_name == 'Department of Agricultural Extension (DAE)' ? 'selected':'' }} value="Department of Agricultural Extension (DAE)">Department of Agricultural Extension (DAE)</option>
                                                <option {{ $re_apply->organization_name == 'Bangladesh Agricultural Research Council (BARC)' ? 'selected':'' }} value="Bangladesh Agricultural Research Council (BARC)">Bangladesh Agricultural Research Council (BARC)</option>
                                                <option {{ $re_apply->organization_name == 'Bangladesh Agricultural Development Corporation (BADC)' ? 'selected':'' }} value="Bangladesh Agricultural Development Corporation (BADC)">Bangladesh Agricultural Development Corporation (BADC)</option>
                                                <option {{ $re_apply->organization_name == 'Bangladesh Agricultural Research Institute (BARI)' ? 'selected':'' }} value="Bangladesh Agricultural Research Institute (BARI)">Bangladesh Agricultural Research Institute (BARI)</option>
                                                <option {{ $re_apply->organization_name == 'Bangladesh Rice Research Institute (BRRI)' ? 'selected':'' }} value="Bangladesh Rice Research Institute (BRRI)">Bangladesh Rice Research Institute (BRRI)</option>
                                                <option {{ $re_apply->organization_name == 'Bangladesh Institute of Nuclear Agriculture (BINA)' ? 'selected':'' }} value="Bangladesh Institute of Nuclear Agriculture (BINA)">Bangladesh Institute of Nuclear Agriculture (BINA)</option>
                                                <option {{ $re_apply->organization_name == 'Bangladesh Sugarcrop Research Institute (BSRI)' ? 'selected':'' }} value="Bangladesh Sugarcrop Research Institute (BSRI)">Bangladesh Sugarcrop Research Institute (BSRI)</option>
                                                <option {{ $re_apply->organization_name == 'Soil Resources Development Institute (SRDI)' ? 'selected':'' }} value="Soil Resources Development Institute (SRDI)">Soil Resources Development Institute (SRDI)</option>
                                                <option {{ $re_apply->organization_name == 'Seed Certification Agency (SCA)' ? 'selected':'' }} value="Seed Certification Agency (SCA)">Seed Certification Agency (SCA)</option>
                                                <option {{ $re_apply->organization_name == 'Barind Multipurpose Development Authority (BMDA)' ? 'selected':'' }} value="Barind Multipurpose Development Authority (BMDA)">Barind Multipurpose Development Authority (BMDA)</option>
                                                <option {{ $re_apply->organization_name == 'Cotton Development Board (CDB)' ? 'selected':'' }} value="Cotton Development Board (CDB)">Cotton Development Board (CDB)</option>
                                                <option {{ $re_apply->organization_name == 'Bangladesh Jute Research Institute (BJRI)' ? 'selected':'' }} value="Bangladesh Jute Research Institute (BJRI)">Bangladesh Jute Research Institute (BJRI)</option>
                                                <option {{ $re_apply->organization_name == 'Agriculture Information Service (AIS)' ? 'selected':'' }} value="Agriculture Information Service (AIS)">Agriculture Information Service (AIS)</option>
                                                <option {{ $re_apply->organization_name == 'Department of Agricultural Marketing (DAM)' ? 'selected':'' }} value="Department of Agricultural Marketing (DAM)">Department of Agricultural Marketing (DAM)</option>
                                                <option {{ $re_apply->organization_name == 'Bangladesh Institute of Research and Training on Applied Nutrition (BIRTAN)' ? 'selected':'' }} value="Bangladesh Institute of Research and Training on Applied Nutrition (BIRTAN)">Bangladesh Institute of Research and Training on Applied Nutrition (BIRTAN)</option>
                                                <option {{ $re_apply->organization_name == 'Bangladesh Wheat and Maize Research Institute (BWMRI)' ? 'selected':'' }} value="Bangladesh Wheat and Maize Research Institute (BWMRI)">Bangladesh Wheat and Maize Research Institute (BWMRI)</option>
                                                <option {{ $re_apply->organization_name == 'National Agriculture Training Academy (NATA)' ? 'selected':'' }} value="National Agriculture Training Academy (NATA)">National Agriculture Training Academy (NATA)</option>
                                                <option {{ $re_apply->organization_name == 'Directorate of Secondary and Higher Education' ? 'selected':'' }} value="Directorate of Secondary and Higher Education">Directorate of Secondary and Higher Education</option>
                                                <option {{ $re_apply->organization_name == 'Others' ? 'selected':'' }} value="Others">Others</option>

                                            </select>

                                            @error('organization')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Designation of the Head</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-building"></i></span>
                                            <input name="head_of_org" class="form-control" type="text" value="{{ isset($re_apply->head_of_organization)? $re_apply->head_of_organization:'' }}">
                                            @error('head_of_org')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Cadre/non-cadre</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-building"></i></span>
                                            <select name="cadre" id="cadre_type" class="form-control selectpicker">
                                                <option value="">Please Choose</option>

                                                <option {{ $re_apply->cadre_num == 'cadre'?'selected' : '' }} value="cadre">Cadre</option>
                                                <option {{ $re_apply->cadre_num == 'non-cadre'?'selected' : '' }} value="non-cadre">Non Cadre</option>

                                            </select>
                                            @error('cadre')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div id="cadre" class="col-sm-3">
                                    <div class="form-group">
                                        <label>Cadre Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-building"></i></span>
                                            <input name="cadre_name" class="form-control" type="text" value="{{ isset($re_apply->cadre_name) ? $re_apply->cadre_name:'' }}">
                                            @error('cadre_name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Service ID (If any)</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-id-card-alt"></i></span>
                                            <input name="service_id" value="{{ isset($re_apply->service_id) ? $re_apply->service_id:'' }}" class="form-control" type="number">
                                            @error('service_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Pay Grade of Participant</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-trophy"></i></span>
                                            <select name="pay_grade" class="form-control">
                                                <option value="">select</option>

                                                <option {{ $re_apply->pay_grade=='1'?'selected':'' }} value="1">1</option>
                                                <option {{ $re_apply->pay_grade=='2'?'selected':'' }} value="2">2</option>
                                                <option {{ $re_apply->pay_grade=='3'?'selected':'' }} value="3">3</option>
                                                <option {{ $re_apply->pay_grade=='4'?'selected':'' }} value="4">4</option>
                                                <option {{ $re_apply->pay_grade=='5'?'selected':'' }} value="5">5</option>
                                                <option {{ $re_apply->pay_grade=='6'?'selected':'' }} value="6">6</option>
                                                <option {{ $re_apply->pay_grade=='7'?'selected':'' }} value="7">7</option>
                                                <option {{ $re_apply->pay_grade=='8'?'selected':'' }} value="8">8</option>
                                                <option {{ $re_apply->pay_grade=='9'?'selected':'' }} value="9">9</option>
                                                <option {{ $re_apply->pay_grade=='10'?'selected':'' }} value="10">10</option>

                                            </select>
                                            @error('pay_grade')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Designation of Controlling Officer<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-dharmachakra"></i></span>
                                            <input name="controlling_officer" value="{{ isset($re_apply->controlling_officer) ? $re_apply->controlling_officer : '' }}" class="form-control" required="" type="text">
                                            @error('controlling_officer')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Name of Current Office<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                            <input name="working_station" id="pre_house" value="{{ isset($re_apply->working_station) ? $re_apply->working_station:'' }}" class="form-control" type="text">
                                            @error('working_station')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label> Designation of Participant<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                            <input name="designation" id="pre_house" value="{{ isset($re_apply->designation) ? $re_apply->designation : '' }}" class="form-control" type="text">
                                            @error('designation')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Division<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                            <select name="division" class="form-control selectpicker">
                                                <option value="">Please Choose</option>

                                                @foreach($division as $div)
                                                    <option {{ $re_apply->a_divisaion == $div->id ?'selected':'' }} value="{{ $div->id }}">{{ $div->division_name }}</option>
                                                @endforeach

                                            </select>
                                            @error('division')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>District<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                            <select name="district" class="form-control selectpicker">
                                                <option value="">Please Choose</option>

                                                @foreach($district as $prodis)
                                                    <option {{ $prodis->id==$re_apply->b_district ? 'selected' : '' }} value="{{ $prodis->id }}">{{ $prodis->district_name }}</option>
                                                @endforeach

                                            </select>
                                            @error('district')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Upazila<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                            <select name="upozilla"  class="form-control selectpicker">
                                                @if( !empty($re_apply->c_upozila) )
                                                    @foreach($upozila as $proupo)

                                                        <option {{ $proupo->id == $re_apply->c_upozila ?'selected' : '' }} value="{{ $proupo->id }}">{{ $proupo->upozila_name }}</option>

                                                    @endforeach
                                                @else
                                                    <option selected value="0">N/A</option>
                                                @endif

                                            </select>
                                            @error('upozilla')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Office Telephone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                            <input name="org_tel" value="{{ isset($re_apply->office_phone)? $re_apply->office_phone : '' }}" class="form-control" style="font-family: 'Helvetica', Arial, Lucida Grande, sans-serif;" type="number">
                                            @error('org_tel')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Office Email</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-at"></i></span>
                                            <input name="org_email" value="{{ isset($re_apply->office_email) ? $re_apply->office_email:'' }}" class="form-control" type="email">
                                            @error('org_email')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                            </fieldset>


                            <legend class="the-legend"><strong>Personal Information</strong></legend>

                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <label>Name<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-user-edit"></i></span>
                                        <input name="name_en" value="{{ isset($re_apply->name_en) ? $re_apply->name_en:'' }}" class="form-control" type="text"  >
                                        @error('name_en')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name in Bengali<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-flag"></i></span>
                                        <input name="name_bn" id="transliteration" value="{{ isset($re_apply->name_bn) ? $re_apply->name_bn : '' }}" class="form-control" type="text">
                                        @error('name_bn')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>National ID<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="far fa-id-card"></i></span>
                                        <input name="nid" value="{{ isset($re_apply->national_id) ? $re_apply->national_id : '' }}" class="form-control" type="number">
                                        @error('nid')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                        <input name="dob" value="{{ isset($re_apply->date_of_birth) ? $re_apply->date_of_birth : '' }}" class="form-control number" style="font-family: 'Helvetica', Arial, Lucida Grande, sans-serif;" type="date">
                                        @error('dob')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-mobile-alt"></i></span>
                                        <input name="mobile" value="{{ isset($re_apply->mobile) ? $re_apply->mobile : '' }}" class="form-control" style="font-family: 'Helvetica', Arial, Lucida Grande, sans-serif;" type="number">
                                        @error('mobile')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-at"></i></span>
                                        <input name="email" value="{{ isset($re_apply->email) ? $re_apply->email : '' }}" class="form-control" type="email">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-venus-mars"></i></span>
                                        <select name="gender" class="form-control selectpicker"  >
                                            <option value="">Please Choose</option>

                                            <option {{ $re_apply->gender == 'Male'?'selected':'' }} value="Male">Male</option>
                                            <option {{ $re_apply->gender == 'Female'?'selected':'' }} value="Female">Female</option>
                                            <option {{ $re_apply->gender == 'Others'?'selected':'' }} value="Others">Others</option>

                                        </select>
                                        @error('gender')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Marital Status</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-user-shield"></i></span>
                                        <select name="marital_status" class="form-control selectpicker">
                                            <option value="">Please Choose</option>

                                            <option {{ $re_apply->marital_status == 'Married'?'selected':'' }} value="Married">Married</option>
                                            <option {{ $re_apply->marital_status == 'Unmarried'?'selected':'' }} value="Unmarried">Unmarried</option>
                                            <option {{ $re_apply->marital_status == 'Divorced'?'selected':'' }} value="Divorced">Divorced</option>
                                            <option {{ $re_apply->marital_status == 'Widowed'?'selected':'' }} value="Widowed">Widowed</option>

                                        </select>
                                        @error('marital_status')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Religion</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                        <select name="religion" class="form-control selectpicker">
                                            <option value="">Please Choose</option>

                                            <option {{ $re_apply->religion == 'Islam'?'selected':'' }} value="Islam">Islam</option>
                                            <option {{ $re_apply->religion == 'Hindu'?'selected':'' }} value="Hindu">Hindu</option>
                                            <option {{ $re_apply->religion == 'Christian'?'selected':'' }} value="Christian">Christian</option>
                                            <option {{ $re_apply->religion == 'Buddism'?'selected':'' }} value="Buddism">Buddism</option>
                                            <option {{ $re_apply->religion == 'Tribal'?'selected':'' }} value="Tribal">Tribal</option>
                                            <option {{ $re_apply->religion == 'Others'?'selected':'' }} value="Others">Others</option>

                                        </select>
                                        @error('religion')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Participant Image( size: 120*100 )<span class="text-danger">*</span></label>
                                    <input name="old_image" value="{{ isset($re_apply->photo)?$re_apply->photo:'' }}" type="hidden">
                                    <input type="file" name="image" class="form-control-file">
                                    <label></label>
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{--                                <fieldset class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">--}}

                            {{--                                    <legend class="the-legend"><strong>Health Status</strong></legend>--}}
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label> Height (cm)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <input name="height" id="pre_house" value="{{ isset($re_apply->height) ? $re_apply->height : '' }}" class="form-control" type="number">
                                        @error('height')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label> Weight (kg)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <input name="weight" id="weight" value="{{ isset($re_apply->weight)?$re_apply->weight:'' }}" class="form-control" type="number">
                                        @error('weight')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-tint"></i></span>
                                        <select name="blood_group" id="blood_group" class="form-control selectpicker"  >
                                            <option value="">select</option>

                                            <option {{ $re_apply->blood_group=='A+'?'selected':'' }} value="A+">A+</option>
                                            <option {{ $re_apply->blood_group=='A-'?'selected':'' }} value="A-">A-</option>
                                            <option {{ $re_apply->blood_group=='AB+'?'selected':'' }} value="AB+">AB+</option>
                                            <option {{ $re_apply->blood_group=='AB-'?'selected':'' }} value="AB-">AB-</option>
                                            <option {{ $re_apply->blood_group=='B+'?'selected':'' }} value="B+">B+</option>
                                            <option {{ $re_apply->blood_group=='B-'?'selected':'' }} value="B-">B-</option>
                                            <option {{ $re_apply->blood_group=='O+'?'selected':'' }} value="O+">O+</option>
                                            <option {{ $re_apply->blood_group=='O-'?'selected':'' }} value="O-">O-</option>

                                        </select>
                                        @error('blood_group')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>





                            <div class="row">
                                <div class="col-md-12">
                                    <legend class="the-legend"><strong>Permanent Address</strong></legend>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Father's Name</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                <input name="father" id="father" value="{{ isset($re_apply->father_name)?$re_apply->father_name:'' }}" class="form-control" type="text">
                                                @error('father')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Mother's Name</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                <input name="mother" id="mother" value="{{ isset($re_apply->mother_name)?$re_apply->mother_name:'' }}" class="form-control" type="text">
                                                @error('mother')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Village/House No.</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                <input name="village" id="village" value="{{ isset($re_apply->house_no) ? $re_apply->house_no :'' }}" class="form-control" type="text">
                                                @error('village')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Division<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                                <select name="permanent_division" class="form-control selectpicker"  >
                                                    <option value="">Please Choose</option>

                                                    @foreach($perdivision as $div)
                                                        <option {{ $re_apply->p_division == $div->id ? 'selected':'' }} value="{{ $div->id }}">{{ $div->division_name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('permanent_division')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>District<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                                <select name="permanent_district" class="form-control selectpicker">

                                                    @foreach($perdistrict as $dis)
                                                        <option {{ $dis->id==$re_apply->p_district ? 'selected' : '' }} value="{{ $dis->id }}">{{ $dis->district_name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('permanent_district')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Upazilla<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-place-of-worship"></i></span>
                                                <select name="permanent_upozilla" class="form-control selectpicker">

                                                    @foreach($perupozila as $upo)

                                                        <option {{ $upo->id == $re_apply->p_upozila ? 'selected' : '' }} value="{{ $upo->id }}">{{ $upo->upozila_name }}</option>

                                                    @endforeach

                                                </select>
                                                @error('permanent_upozilla')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </fieldset>


                        <fieldset class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">
                            <legend class="the-legend"><strong>Academic Information</strong></legend>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name of Highest Degree</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
                                        <select name="degree" class="form-control selectpicker">
                                            <option value="">select</option>

                                            <option {{ $re_apply->degree=='S.S.C./EQUIVALENT'?'selected':'' }} value="S.S.C./EQUIVALENT">S.S.C./EQUIVALENT</option>
                                            <option {{ $re_apply->degree=='H.S.C./EQUIVALENT'?'selected':'' }} value="H.S.C./EQUIVALENT">H.S.C./EQUIVALENT</option>
                                            <option {{ $re_apply->degree=='GRADUATION/EQUIVALENT'?'selected':'' }} value="GRADUATION/EQUIVALENT">GRADUATION/EQUIVALENT</option>
                                            <option {{ $re_apply->degree=='MASTERS/EQUIVALENT'?'selected':'' }} value="MASTERS/EQUIVALENT">MASTERS/EQUIVALENT</option>
                                            <option {{ $re_apply->degree=='Phd./EQUIVALENT'?'selected':'' }} value="Phd./EQUIVALENT">Phd./EQUIVALENT</option>

                                        </select>
                                        @error('degree')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Year</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-university"></i></span>
                                        <input name="passing_year" value="{{ isset($re_apply->passing_year) ? $re_apply->passing_year : '' }}" class="form-control" type="number">
                                        @error('passing_year')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Board/University</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-university"></i></span>
                                        <input name="board" value="{{ isset($re_apply->university) ? $re_apply->university : '' }}" class="form-control" type="text">
                                        @error('board')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </fieldset>




                        <fieldset class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">
                            <legend class="the-legend"><strong>Emergency Contact</strong></legend>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-university"></i></span>
                                        <input name="contact_name"  value="{{ isset($re_apply->e_name) ? $re_apply->e_name : '' }}" class="form-control" type="text">
                                        @error('contact_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Relation</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
                                        <select name="contact_relation" class="form-control selectpicker"  >
                                            <option value="">Please Choose</option>

                                            <option {{ $re_apply->e_relation == 'Father' ? 'selected' : '' }} value="Father">Father</option>
                                            <option {{ $re_apply->e_relation == 'Mother' ? 'selected' : '' }} value="Mother">Mother</option>
                                            <option {{ $re_apply->e_relation == 'Sister' ? 'selected' : '' }} value="Sister">Sister</option>
                                            <option {{ $re_apply->e_relation == 'Brother' ? 'selected' : '' }} value="Brother">Brother</option>
                                            <option {{ $re_apply->e_relation == 'Spouse' ? 'selected' : '' }} value="Spouse">Spouse</option>
                                            <option {{ $re_apply->e_relation == 'Other' ? 'selected' : '' }} value="Other">Other</option>

                                        </select>
                                        @error('contact_relation')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-university"></i></span>
                                        <input name="contact_phone" value="{{ isset($re_apply->e_phone) ? $re_apply->e_phone : '' }}" class="form-control" type="number">
                                        @error('contact_phone')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>





                        </fieldset>


                        {{--                            <fieldset class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">--}}
                        {{--                    <div class="the-fieldset" style="margin-top: 20px;margin-right: 15px;margin-left: 15px;">--}}


                        {{--                        <div class="col-sm-6">--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label>Captcha</label>--}}
                        {{--                                <div class="input-group">--}}
                        {{--                                    <span class="input-group-addon " style="padding: 0px 0px ;"><img src="http://tmis.nata.gov.bd/captcha/default?g6Lroeg6" ></span>--}}
                        {{--                                    <input type="text" name="captcha" placeholder="  ?" class="form-control" style="font-family: 'Helvetica', Arial, Lucida Grande, sans-serif;" required>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                    </fieldset>--}}



                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4"><br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <button type="submit" class="btn btn-success" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span
                                        class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                            </div>
                        </div>




                </div>

            </form>




        </div>


    </main>


    <script>
        $(document).ready(function (){

            $(document).on('change','select[name="course_id"]',function(){

                let id = $(this).val();

                if (id){
                    $.ajax({
                        url:"{{ url('session/get') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="session_id"]').empty();
                            $('select[name="session_id"]').append('<option value="">-Select-</option>');
                            $.each(data,function (key,value){
                                $('select[name="session_id"]').append('<option value="'+value.id+'">'+value.session_name+'</option>');
                            })
                        }
                    });
                }else{
                    alert('danger');
                }




            })

            $(document).on('change','select[name="division"]',function (){
                let id = $(this).val();
                if (id){
                    $.ajax({
                        url:"{{ url('pro/district/select') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="district"]').empty();
                            $('select[name="district"]').append('<option value="">-Select-</option>');

                            $.each(data,function (key,value){
                                $('select[name="district"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                            });
                        }
                    })
                }else{
                    alert('danger');
                }
            })

            $(document).on('change','select[name="district"]',function (){
                let id = $(this).val();

                if (id){
                    $.ajax({
                        url:"{{ url('pro/upozila/select') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="upozilla"]').empty();
                            $('select[name="upozilla"]').append('<option value="">-Select-</option>');
                            $('select[name="upozilla"]').append('<option value="0">N/A</option>');
                            $.each(data,function (key,value){
                                $('select[name="upozilla"]').append('<option value="'+value.id+'">'+value.upozila_name+'</option>');
                            });
                        }
                    })
                }else{
                    alert('danger');
                }
            })


            $(document).on('change','select[name="cadre"]',function (){
                let cadre_select = $('#cadre_type').val();
                if (cadre_select=='cadre'){
                    $('#cadre').show();
                }else{
                    $('#cadre').hide();
                }
            })



        })

    </script>

    <script>
        $(document).ready(function (){

            $(document).on('change','select[name="permanent_division"]',function (){
                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('per/select/district') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="permanent_district"]').empty();
                            $('select[name="permanent_district"]').append('<option value="">-Select-</option>');
                            $.each(data,function (key,value){
                                $('select[name="permanent_district"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                            });
                        }
                    })
                }else{
                    alert('danger');
                }
            });


            $(document).on('change','select[name="permanent_district"]',function (){
                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('per/select/upozila') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="permanent_upozilla"]').empty();
                            $('select[name="permanent_upozilla"]').append('<option value="">-select-</option>');
                            $.each(data,function (key,value){
                                $('select[name="permanent_upozilla"]').append('<option value="'+value.id+'">'+value.upozila_name+'</option>');
                            });
                        }
                    })
                }else{
                    alert('danger');
                }
            });
        })

    </script>



@endsection
