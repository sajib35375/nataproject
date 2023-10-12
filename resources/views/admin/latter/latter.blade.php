<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NATA Release Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- this is for drop and drog in this arrange of wish order (need) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

</head>
<body>
<style>
    html,body{
        margin: 0px !important;
        padding:70px 50px 0px 70px;
      }

    .center {
        text-align: center;
    }
    #left {
        float: left;
    }
    #right {
        float: right;
    }
    .para {
        display: block;
        margin-top: 69px!important;
    }
    .para p {
        text-align: justify;
    }
    table,th,td {
        text-align: left;
        border:1px solid black;
    }
    .address {
        margin-top: -4px;
    }
    .web {
        margin-top: -10px;
    }
    .right {
        float: right;
    }
    

</style>
<div class="">
    <div class="box">
        <div class="center">
            <span><strong>Government of the peoples Republic of Bangladesh</strong></span><br>
            <span>National Agriculture Training Academy (NATA)</span><br>
            <label class="address">Gazipur 1701</label> <br>
            <label class="web">www.nata.gov.bd</label> <br>
            <p><strong>Release Order</strong></p>
        </div>
        <div class="point">
            <p id="left">Memo No.{{ $coor->memo }}</p>
            <p id="right">Date: {{ date('d-m-Y', strtotime($coor->end)) }}</p>
        </div>
        <div class="para">
            <p>Perticipants of the different organization under the Mnistry of Agriculture joined the training course entitle "{{ $course_name->course->course_name }}" held
                at National Agriculture Training Academy (NATA), Gazipur from {{ date('d-m-Y', strtotime($coor->start)) }} to {{ date('d-m-Y', strtotime($coor->end)) }}. After successful completion of the training the
                participants are released on {{ date('d-m-Y', strtotime($coor->end)) }}. TA/DA should be given to the participants from their respective organizations as per Government rules.</p>
        </div>
        <table style="width:100%;padding-bottom:30px">
            <thead>
            <tr>
                <th style="text-align:center">SL</th>
                <th style="text-align:center">Name</th>
                <th style="text-align:center">Designation</th>
                <th style="text-align:center">Working Address</th>
            </tr>
            </thead>
            <tbody>
            @foreach($letter as $l)
                <tr>
                    <td style="text-align:center">{{ $loop->index+1 }}</td>
                    <td >{{ $l->name_en }}</td>
                    <td >{{ $l->designation }}</td>
                    <td >{{ $l->working_station }},{!! "&nbsp;" !!}{{ $l->c_upozila == 0 ? '' : $l->proupozila->upozila_name }}{{ $l->c_upozila == 0 ? '' : ',' }}{!! "&nbsp;" !!}{{ $l->b_district == '' ? '' : $l->prodistrict->district_name }}.</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>


    <div style="clear:both;margin:0;padding:0;">
    <div style="width: 25%; display: inline-block;float:right;">
        <img src="http://tmis.nata.gov.bd/certificate/signature/{{ $coor->dg_photo }}" style="padding-left:15px; margin-top:30px;">
            <p style="text-align:center;margin:0px;">Director General</p>
            <p style="text-align:center;margin:0px;">Phone: 02-49272104</p>
            <p style="text-align:center;margin:0px;">dgnata14@gmail.com</p>

    </div>


    <div style="width:70%; display: inline-block; float:left;">
    <p style="font-weight:bold;">A. Copy forwarded for kind information and necessary action ; (Not as seniority)</p>

        <table id="table" class="table table-bordered">

            <tbody id="tablecontents">
            <!-- get all data from Table by Controller -->
            @foreach($orgs as $one)
                <tr class="row1" data-id="{{ $one->id }}">
                    <td class="pl-3"><i class="fa fa-sort"></i></td>
                    <td><li>{{ $one->controlling_officer }},{!! "&nbsp;" !!}{{ $one->organization_name }},{!! "&nbsp;" !!}{{ $one->c_upozila==0 ? '' : $one->proupozila->upozila_name }}{{ !empty($one->proupozila->upozila_name) ? ',' : '' }}{!! "&nbsp;" !!}{{ $one->prodistrict->district_name }}</li></td>
                </tr>
            @endforeach
            </tbody>
        </table>


            <h4>B. Copy forwarded for kind information: (Not as seniority)</h4>
            <ul>
                <li>Additional Secretary, Extension Wing, Ministry of Agriculture, Dhaka</li>
                <li>Personal Secretary to Secretary, Ministry of Agriculture, Dhaka.</li>
                <li>Director(Admin/Training) NATA, Gazipur</li>
                <li>District Accounts and Finance Officer/Upazila Accounts Officer</li>
            </ul>
    </div>
       
</div>       
            

            

</div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





</body>
</html>