@extends('admin.dashboard')
@section('content')

    <div class="row">
        <div style="margin: 15px;" class="col-md-5 col-12">  {{--start col-md-6--}}
            <div class="box box-solid box-inverse box-info">
                <div class="box-header with-border">
                    <h4 class="box-title">Personal <strong>Information</strong></h4>
                </div>
                <div class="box-body">
                    <table class="table">

                        <tr>
                            <th>Full Name :</th>
                            <th>{{ $app_details->name_en }}</th>
                        </tr>
                        <tr>
                            <th>National ID :</th>
                            <th>{{ $app_details->national_id }}</th>
                        </tr>
                        <tr>
                            <th>Blood Group :</th>
                            <th>{{ $app_details->blood_group }}</th>
                        </tr>
                        <tr>
                            <th> Date of birth :</th>
                            <th>{{ $app_details->date_of_birth }}</th>
                        </tr>
                        <tr>
                            <th>Personal Number :</th>
                            <th>{{ $app_details->mobile }}</th>
                        </tr>
                        <tr>
                            <th>Email :</th>
                            <th>{{ $app_details->email }}</th>
                        </tr>
                        <tr>
                            <th>Validity :</th>
                            <th>{{ $app_details->validity }}</th>
                        </tr>
                        <tr>
                            <th>Gender :</th>
                            <th>{{ $app_details->gender }}</th>
                        </tr>
                        <tr>
                            <th>Marital Status :</th>
                            <th>{{ $app_details->marital_status }}</th>
                        </tr>
                        <tr>
                            <th>Religion :</th>
                            <th>{{ $app_details->religion }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>{{--end col-md-6--}}



        <div style="margin: 15px;" class="col-md-5 col-12">  {{--start col-md-6--}}
            <div class="box box-solid box-inverse box-info">
                <div class="box-header with-border">
                    <h4 class="box-title">Professional <strong>Information</strong></h4>
                    <ul class="box-controls pull-right">

                    </ul>
                </div>

                <div class="box-body">
                    <table class="table">

                        <tr>
                            <th>Organization Name :</th>
                            <th>{{ $app_details->organization_name }}</th>
                        </tr>
                        <tr>
                            <th>Organization Head :</th>
                            <th>{{ $app_details->head_of_organization }}</th>
                        </tr>
                        <tr>
                            <th>Cadre Num:</th>
                            <th>{{ $app_details->cadre_num }}</th>
                        </tr>
                        <tr>
                            <th>Pay Grade :</th>
                            <th>{{ $app_details->pay_grade }}</th>
                        </tr>
                        <tr>
                            <th>Controlling Officer :</th>
                            <th>{{ $app_details->controlling_officer }}</th>
                        </tr>
                        <tr>
                            <th>Working Stations :</th>
                            <th>{{ $app_details->working_station }}</th>
                        </tr>
                        <tr>
                            <th>Office Phone:</th>
                            <th>{{ $app_details->office_phone }}</th>
                        </tr>
                        <tr>
                            <th>Office Email:</th>
                            <th>{{ $app_details->office_email }}</th>
                        </tr>
                        <tr>
                            <th>University:</th>
                            <th>{{ $app_details->university }}</th>
                        </tr>
                        <tr>
                            <th>Passing Year:</th>
                            <th>{{ $app_details->passing_year }}</th>
                        </tr>
                        <tr>
                            <th>Degree:</th>
                            <th>{{ $app_details->degree }}</th>
                        </tr>

                    </table>

                </div>
            </div>
        </div>{{--end col-md-6--}}


        <div style="margin: 15px;" class="col-md-10 col-12">
            <div class="box box-slided-up">
                <div class="box-header with-border">
                    <h4 class="box-title">Basic <strong>Information</strong></h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide rotate-180" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>

                <div class="box-body" style="display: block;">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Address </th>
                            <th> Division </th>
                            <th> District </th>
                            <th> Upazila </th>
                            <th>Emergency Name </th>
                            <th>Emergency Relation </th>
                            <th>Emergency Phone </th>
                            <th>Photo </th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ $app_details->house_no }}</td>
                                <td>{{ $app_details->pdivision->division_name }}</td>
                                <td>{{ $app_details->pdistrict->district_name }}</td>
                                <td>{{ $app_details->pupozila->upozila_name }}</td>
                                <td>{{ $app_details->e_name }}</td>
                                <td>{{ $app_details->e_relation }}</td>
                                <td>{{ $app_details->e_phone }}</td>
                                <td><img style="width: 60px;height: 60px;" src="{{ URL::to('') }}/NATA_files/image/{{ $app_details->photo }}" alt=""></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>


@endsection
