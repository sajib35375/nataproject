@extends('admin.dashboard')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>





    <div class="box" style="margin: 10px;">

        <div class="box-header with-border">
            <h1 class="box-title">Edit Registration Form</h1>
        </div>
        <hr>

        <div class="box-body">

            <form action="{{ route('apply.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Course Select</label>
                            <select name="course_id" class="form-control" required>
                                <option  value="" selected="">select</option>
                                @foreach($courses as $course)
                                    <option {{ $course->id == $edit_data->course_id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Batch Number</label>
                            <select name="session_id" class="form-control" required>
                                <option value="" >select</option>
                                    @foreach($all_session as $session)
                                    <option {{ $session->id==$edit_data->session_id ? 'selected' : '' }} value="{{ $session->id }}" >{{ $session->session_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>




                    <div class="col-md-12">
                        <h2>Professional Information</h2>
                        <hr>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Organization Name</label>
                            <select class="form-control" name="organization_name" required="" id="">
                                <option value="">-select-</option>
                                <option {{ $edit_data->organization_name == "Department of Agricultural Extension (DAE)" ? 'selected' : '' }} value="Department of Agricultural Extension (DAE)">Department of Agricultural Extension (DAE)</option>
                                <option {{ $edit_data->organization_name == "Bangladesh Agricultural Research Council (BARC)" ? 'selected' : '' }} value="Bangladesh Agricultural Research Council (BARC)">Bangladesh Agricultural Research Council (BARC)</option>
                                <option {{ $edit_data->organization_name == "Bangladesh Agricultural Development Corporation (BADC)" ? 'selected' : '' }} value="Bangladesh Agricultural Development Corporation (BADC)">Bangladesh Agricultural Development Corporation (BADC)</option>
                                <option {{ $edit_data->organization_name == "Bangladesh Agricultural Research Institute (BARI)" ? 'selected' : '' }} value="Bangladesh Agricultural Research Institute (BARI)">Bangladesh Agricultural Research Institute (BARI)</option>
                                <option {{ $edit_data->organization_name == "Bangladesh Rice Research Institute (BRRI)" ? 'selected' : '' }} value="Bangladesh Rice Research Institute (BRRI)">Bangladesh Rice Research Institute (BRRI)</option>
                                <option {{ $edit_data->organization_name == "Bangladesh Institute of Nuclear Agriculture (BINA)" ? 'selected' : '' }} value="Bangladesh Institute of Nuclear Agriculture (BINA)">Bangladesh Institute of Nuclear Agriculture (BINA)</option>
                                <option {{ $edit_data->organization_name == "Bangladesh Sugarcrop Research Institute (BSRI)" ? 'selected' : '' }} value="Bangladesh Sugarcrop Research Institute (BSRI)">Bangladesh Sugarcrop Research Institute (BSRI)</option>
                                <option {{ $edit_data->organization_name == "Soil Resources Development Institute (SRDI)" ? 'selected' : '' }} value="Soil Resources Development Institute (SRDI)">Soil Resources Development Institute (SRDI)</option>
                                <option {{ $edit_data->organization_name == "Seed Certification Agency (SCA)" ? 'selected' : '' }} value="Seed Certification Agency (SCA)">Seed Certification Agency (SCA)</option>
                                <option {{ $edit_data->organization_name == "Barind Multipurpose Development Authority (BMDA)" ? 'selected' : '' }} value="Barind Multipurpose Development Authority (BMDA)">Barind Multipurpose Development Authority (BMDA)</option>
                                <option {{ $edit_data->organization_name == "Cotton Development Board (CDB)" ? 'selected' : '' }} value="Cotton Development Board (CDB)">Cotton Development Board (CDB)</option>
                                <option {{ $edit_data->organization_name == "Bangladesh Jute Research Institute (BJRI)" ? 'selected' : '' }} value="Bangladesh Jute Research Institute (BJRI)">Bangladesh Jute Research Institute (BJRI)</option>
                                <option {{ $edit_data->organization_name == "Agriculture Information Service (AIS)" ? 'selected' : '' }} value="Agriculture Information Service (AIS)">Agriculture Information Service (AIS)</option>
                                <option {{ $edit_data->organization_name == "Department of Agricultural Marketing (DAM)" ? 'selected' : '' }} value="Department of Agricultural Marketing (DAM)">Department of Agricultural Marketing (DAM)</option>
                                <option {{ $edit_data->organization_name == "Bangladesh Institute of Research and Training on Applied Nutrition (BIRTAN)" ? 'selected' : '' }} value="Bangladesh Institute of Research and Training on Applied Nutrition (BIRTAN)">Bangladesh Institute of Research and Training on Applied Nutrition (BIRTAN)</option>
                                <option {{ $edit_data->organization_name == "Bangladesh Wheat and Maize Research Institute (BWMRI)" ? 'selected' : '' }} value="Bangladesh Wheat and Maize Research Institute (BWMRI)">Bangladesh Wheat and Maize Research Institute (BWMRI)</option>
                                <option {{ $edit_data->organization_name == "National Agriculture Training Academy (NATA)" ? 'selected' : '' }} value="National Agriculture Training Academy (NATA)">National Agriculture Training Academy (NATA)</option>
                                <option {{ $edit_data->organization_name == "Directorate of Secondary and Higher Education" ? 'selected' : '' }} value="Directorate of Secondary and Higher Education">Directorate of Secondary and Higher Education</option>
                                <option {{ $edit_data->organization_name == "Others" ? 'selected' : '' }} value="Others">Others</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Head of the Organization</label>
                            <input name="head_of_organization" type="text" class="form-control" value="{{ $edit_data->head_of_organization }}">
                        </div>
                    </div>

                    <div class="col-md-6" >
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Cadre/non-cadre</label>
                            <select name="cadre_number" class="form-control">
                                <option value="" >select</option>
                                <option {{ $edit_data->cadre_num == 'cadre' ? 'selected':'' }} value="cadre">Cadre</option>
                                <option {{ $edit_data->cadre_num == 'Non-cadre'? 'selected':'' }} value="Non cadre">Non Cadre</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6" id="cadre">
                        <div class="form-group">
                            <label>Cadre Name</label>
                            <input name="cadre_name" type="text" class="form-control" value="{{ $edit_data->cadre_name }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Service ID</label>
                            <input name="service" type="text" class="form-control" value="{{ $edit_data->service_id }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Pay Grade</label>
                            <select name="pay" class="form-control">
                                <option value="">select</option>
                                <option {{ $edit_data->pay_grade=='1'?'selected':'' }} value="1">1</option>
                                <option {{ $edit_data->pay_grade=='2'?'selected':'' }} value="2">2</option>
                                <option {{ $edit_data->pay_grade=='3'?'selected':'' }} value="3">3</option>
                                <option {{ $edit_data->pay_grade=='4'?'selected':'' }} value="4">4</option>
                                <option {{ $edit_data->pay_grade=='5'?'selected':'' }} value="5">5</option>
                                <option {{ $edit_data->pay_grade=='6'?'selected':'' }} value="6">6</option>
                                <option {{ $edit_data->pay_grade=='7'?'selected':'' }} value="7">7</option>
                                <option {{ $edit_data->pay_grade=='8'?'selected':'' }} value="8">8</option>
                                <option {{ $edit_data->pay_grade=='9'?'selected':'' }} value="9">9</option>
                                <option {{ $edit_data->pay_grade=='10'?'selected':'' }} value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Current Controlling Officer</label>
                            <input name="controlling_off" type="text" class="form-control" value="{{ $edit_data->controlling_officer }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Current Working Station</label>
                            <input name="working_station" type="text" class="form-control" value="{{ $edit_data->working_station }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Designation</label>
                            <input name="designation" type="text" class="form-control" value="{{ $edit_data->designation }}" required>
                        </div>
                    </div>






                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Division</label>
                            <select name="division" class="form-control" required>
                                <option value="">select</option>
                                @foreach($division as $pro_div)
                                    <option {{ $pro_div->id == $edit_data->a_divisaion ? 'selected' : '' }} value="{{ $pro_div->id }}">{{ $pro_div->division_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">District</label>
                            <select name="district" class="form-control" required>
                                <option value="">select</option>
                                @foreach($district as $prodis)
                                    <option {{ $prodis->id==$edit_data->b_district ? 'selected' : '' }} value="{{ $prodis->id }}">{{ $prodis->district_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Upazila</label>
                            <select name="upozilla" class="form-control" required>
                                @if( !empty($edit_data->c_upozila) )
                                    @foreach($upozila as $proupo)

                                        <option {{ $proupo->id == $edit_data->c_upozila ?'selected' : '' }} value="{{ $proupo->id }}">{{ $proupo->upozila_name }}</option>

                                    @endforeach
                                @else
                                    <option selected value="0">N/A</option>
                                @endif

                            </select>
                        </div>
                    </div>







                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Office Telephone</label>
                            <input name="off_tele" type="text" class="form-control" value="{{ $edit_data->office_phone }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Office Email</label>
                            <input name="off_email" type="text" class="form-control" value="{{ $edit_data->office_email }}">
                        </div>
                    </div>










                    <div class="col-md-12">
                    <h2>Personal  Information</h2>
                    <hr>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name_en" type="text" class="form-control" value="{{ $edit_data->name_en }}" required>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name in Bengali</label>
                        <input name="name_bn" type="text" class="form-control" value="{{ $edit_data->name_bn }}" required>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>National ID</label>
                        <input name="national_id" type="text" class="form-control" value="{{ $edit_data->national_id }}" required>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input name="date_of_birth" type="date" class="form-control" value="{{ $edit_data->date_of_birth }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input name="mobile" type="text" class="form-control" value="{{ $edit_data->mobile }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" value="{{ $edit_data->email }}">
                        </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group form-group-float">
                        <label class="form-group-float-label">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">select</option>
                                <option {{ $edit_data->gender=='Male' ? 'selected' : '' }} value="Male">Male</option>
                                <option {{ $edit_data->gender=='Female' ? 'selected' : '' }} value="Female">Female</option>
                                <option {{ $edit_data->gender=='Others' ? 'selected' : '' }} value="Others">Others</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Marital status</label>
                            <select name="marital_status" class="form-control">
                                <option value="" selected="">select</option>

                                <option {{ $edit_data->marital_status=='Married' ? 'selected' : '' }} value="Married">Married</option>
                                <option {{ $edit_data->marital_status=='Unmarried' ? 'selected' : '' }} value="Unmarried">Unmarried</option>
                                <option {{ $edit_data->marital_status=='Divorced' ? 'selected' : '' }} value="Divorced">Divorced</option>
                                <option {{ $edit_data->marital_status=='Widowed' ? 'selected' : '' }} value="Widowed">Widowed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Religion</label>
                            <select name="religion" class="form-control">
                                <option value="" selected="">select</option>
                                <option {{ $edit_data->religion == 'Islam' ? 'selected':'' }} value="Islam">Islam</option>
                                <option {{ $edit_data->religion == 'Hindu' ? 'selected':'' }} value="Hindu">Hindu</option>
                                <option {{ $edit_data->religion == 'Christian' ? 'selected':'' }} value="Christian">Christian</option>
                                <option {{ $edit_data->religion == 'Buddism' ? 'selected':'' }} value="Buddism">Buddism</option>
                                <option {{ $edit_data->religion == 'Tribal' ? 'selected':'' }} value="Tribal">Tribal</option>
                                <option {{ $edit_data->religion == 'Others' ? 'selected':'' }} value="Others">Others</option>
                            </select>
                        </div>
                    </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Participant Image(120*100)</label>
                                <img style="width: 150px;height: 150px;" id="img" src="{{ URL::to('') }}/NATA_files/image/{{ $edit_data->photo }}" alt="">
                                <input name="old_photo" value="{{ $edit_data->photo }}" type="hidden">
                                <input name="photo" type="file" class="form-control-file" >
                            </div>
                        </div>



                    <div class="col-md-12">
                        <h2>Health Status</h2>
                        <hr>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Height (cm)</label>
                            <input name="height" type="text" class="form-control" value="{{ $edit_data->height }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Weight (kg)</label>
                            <input name="weight" type="text" class="form-control" value="{{ $edit_data->weight }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Blood Group</label>
                            <select name="blood" class="form-control">
                                <option value="">select</option>
                                <option {{ $edit_data->blood_group=='A+'?'selected':'' }} value="A+">A+</option>
                                <option {{ $edit_data->blood_group=='A-'?'selected':'' }} value="A-">A-</option>
                                <option {{ $edit_data->blood_group=='AB+'?'selected':'' }} value="AB+">AB+</option>
                                <option {{ $edit_data->blood_group=='AB-'?'selected':'' }} value="AB-">AB-</option>
                                <option {{ $edit_data->blood_group=='B+'?'selected':'' }} value="B+">B+</option>
                                <option {{ $edit_data->blood_group=='B-'?'selected':'' }} value="B-">B-</option>
                                <option {{ $edit_data->blood_group=='O+'?'selected':'' }} value="O+">O+</option>
                                <option {{ $edit_data->blood_group=='O-'?'selected':'' }} value="O-">O-</option>
                            </select>
                        </div>
                    </div>

























                    <div class="col-md-12">
                        <h2>Permanent Address</h2>
                        <hr>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Father's Name</label>
                            <input name="father" type="text" class="form-control" value="{{ $edit_data->father_name }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mother's Name</label>
                            <input name="mother" type="text" class="form-control" value="{{ $edit_data->mother_name }}">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Village/House No.</label>
                            <input name="house" type="text" class="form-control" value="{{ $edit_data->house_no }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Division</label>
                            <select name="division_id_per" class="form-control" required>
                                <option value="">select</option>
                                @foreach($perdivision as $div)
                                    <option {{ $div->id==$edit_data->p_division ? 'selected' : '' }} value="{{ $div->id }}">{{ $div->division_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">District</label>
                            <select name="district_id_per" class="form-control" required>
                                <option value="" selected="">select</option>

                                @foreach($perdistrict as $dis)
                                    <option {{ $dis->id==$edit_data->p_district ? 'selected' : '' }} value="{{ $dis->id }}">{{ $dis->district_name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Upazila</label>
                            <select name="upozila_id_per" class="form-control" required>
                                <option value="">select</option>
                                @foreach($perupozila as $upo)

                                    <option {{ $upo->id == $edit_data->p_upozila ? 'selected' : '' }} value="{{ $upo->id }}">{{ $upo->upozila_name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>





                    <div class="col-md-12">
                        <h2>Academic Information</h2>
                        <hr>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Name of Highest Degree</label>
                            <select name="degree" class="form-control">
                                <option value="">select</option>
                                <option {{ $edit_data->degree=='S.S.C./EQUIVALENT'?'selected':'' }} value="S.S.C./EQUIVALENT">S.S.C./EQUIVALENT</option>
                                <option {{ $edit_data->degree=='H.S.C./EQUIVALENT'?'selected':'' }} value="H.S.C./EQUIVALENT">H.S.C./EQUIVALENT</option>
                                <option {{ $edit_data->degree=='GRADUATION/EQUIVALENT'?'selected':'' }} value="GRADUATION/EQUIVALENT">GRADUATION/EQUIVALENT</option>
                                <option {{ $edit_data->degree=='MASTERS/EQUIVALENT'?'selected':'' }} value="MASTERS/EQUIVALENT">MASTERS/EQUIVALENT</option>
                                <option {{ $edit_data->degree=='Phd./EQUIVALENT'?'selected':'' }} value="Phd./EQUIVALENT">Phd./EQUIVALENT</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Year</label>
                            <input name="passing_year" type="text" class="form-control" value="{{ $edit_data->passing_year }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Board/University</label>
                            <input name="university" type="text" class="form-control" value="{{ $edit_data->university }}">
                        </div>
                    </div>




                    <div class="col-md-12">
                        <h2>Emergency Contact</h2>
                        <hr>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" value="{{ $edit_data->e_name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label">Relation</label>
                            <select name="e_relation" class="form-control">
                                <option value="">select</option>
                                <option {{ $edit_data->e_relation == 'Father' ? 'selected' : '' }} value="Father">Father</option>
                                <option {{ $edit_data->e_relation == 'Mother' ? 'selected' : '' }} value="Mother">Mother</option>
                                <option {{ $edit_data->e_relation == 'Sister' ? 'selected' : '' }} value="Sister">Sister</option>
                                <option {{ $edit_data->e_relation == 'Brother' ? 'selected' : '' }} value="Brother">Brother</option>
                                <option {{ $edit_data->e_relation == 'Spouse' ? 'selected' : '' }} value="Spouse">Spouse</option>
                                <option {{ $edit_data->e_relation == 'Other' ? 'selected' : '' }} value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input name="phone" type="text" class="form-control" value="{{ $edit_data->e_phone }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Certificate Number</label>
                            <input name="first_id" type="text" class="form-control" value="{{ $edit_data->first_id }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Certificate Number</label>
                            <input name="last_id" type="text" class="form-control" value="{{ $edit_data->last_id }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Update" >
                        </div>
                    </div>



                </div>

            </form>


    </div>

    </div>


    <script>
        $(document).ready(function (){

            $(document).on('change','input[name="photo"]',function (e){
                let url = URL.createObjectURL(e.target.files[0]);
                // alert(url);
                $('img#img').attr('src',url).width('150px').height('150px');
            })

            $(document).on('change','select[name="course_id"]',function(){

                let id = $(this).val();

                if (id){
                    $.ajax({
                        url:"{{ url('edit/session/get') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="session_id"]').empty();
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
                        url:"{{ url('pro/district/select/edit') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="district"]').empty();
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
                        url:"{{ url('pro/upozila/select/edit') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="upozilla"]').empty();
                            // $('select[name="upozilla"]').append('<option value="">-Select-</option>');
                            $('select[name="upozilla"]').append('<option  value="0">N/A</option>');
                            $.each(data,function (key,value){
                                $('select[name="upozilla"]').append('<option value="'+value.id+'">'+value.upozila_name+'</option>');
                            });
                        }
                    })
                }else{
                    alert('danger');
                }
            })


            $(document).on('change','select[name="course_id"]',function (){
                let id = $(this).val();

                if (id){
                    $.ajax({
                        url:"{{ url('batch/load/') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="session_id"]').empty();

                            $.each(data,function (key,value){
                                $('select[name="session_id"]').append('<option value="'+value.id+'">'+value.session_name+'</option>');
                            });
                        }
                    })
                }else{
                    alert('danger');
                }
            })


            $(document).on('change','select[name="cadre_number"]',function (){
                let cadre_select = $(this).val();
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

            $(document).on('change','select[name="division_id_per"]',function (){
                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('per/select/district/edit') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="district_id_per"]').empty();

                            $.each(data,function (key,value){
                                $('select[name="district_id_per"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                            });
                        }
                    })
                }else{
                    alert('danger');
                }
            });


            $(document).on('change','select[name="district_id_per"]',function (){
                let id = $(this).val();

                if(id){
                    $.ajax({
                        url:"{{ url('per/select/upozila/edit') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="upozila_id_per"]').empty();
                            
                            $.each(data,function (key,value){
                                $('select[name="upozila_id_per"]').append('<option value="'+value.id+'">'+value.upozila_name+'</option>');
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
















