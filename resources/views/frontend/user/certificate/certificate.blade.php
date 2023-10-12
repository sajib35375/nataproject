
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NATA Certificate</title>

    <style>
        html,body{
            margin: 0px;
            padding: 0px;
        }

        #div1{
            width: 97%;
            height:97%;
            position:center;
            margin: auto;
            padding: 0px;
            background-image: url("http://tmis.nata.gov.bd/img/certificate.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: auto 100%;

        }

        #divt{
            height: 196px;
            margin-top: 0px;
            opacity: 0.3;
        }
        #div2{
            height: 17px;
            margin-left: 905px;
            margin-right: 80px;
        }
        #label1{
            font-size: 25px;
            font-weight: bold;
        }
        #label2{
            font-size: 20px;
            font-family: Candara;
            text-align: justify!important;
        }
        #label3{
            font-size: 20px;
        }
        #label4{
            font-style: italic;
            font-size: 20px;
            font-weight: bold;
        }

        #div3{
            height: 220px;
        }
        #div4{
            min-height: 120px;
            /*height: 110px;*/
            margin-left: 90px;
            margin-right: 90px;
            text-align: justify;



        }
        /*#label2 {*/
        /*    text-align: justify;*/
        /*    -webkit-hyphens: auto;*/
        /*    -moz-hyphens: auto;*/
        /*    hyphens: auto;*/

        /*}*/
        #div5{
            height: 80px;
            margin-left: 235px;
            margin-right: 200px;
            margin-bottom: 20px;



        }
        /*#div5 img {*/
        /*    margin: 80px!important;*/
        /*}*/

    </style>
</head>
<body>





    <div id="div1">
        <div id="divt">
        </div>
        <div id="div2">
            <label id="label3">{{ $app->first_id }}/{{ $app->last_id }}</label>
        </div>
        <div id="div3">
        </div>
        <div id="div4">
            <label id="label1"></label>
            <label id="label2"><strong>{{$app->name_en}}</strong>,{!! "&nbsp;" !!} {{ $app->designation }},{!! "&nbsp;" !!} {{ $app->working_station }}, {{ $app->c_upozila==0 ? '' : $app->proupozila->upozila_name }}{{ !empty($app->proupozila->upozila_name) ? ',' : '' }} {{ $app->b_district == '' ? '' : $app->prodistrict->district_name }} has successfully completed training course on</label><label id="label4"> {!! "&nbsp;&#8220;" !!}{{ $app->course->course_name }}{!! "&#x201D;" !!}</label> <label id="label2">held from {{ date('d-m-Y',strtotime($session->start)) }} to {{ date('d-m-Y',strtotime($session->end)) }} at National Agriculture Training Academy (NATA), Gazipur.</label>
        </div>
        <div style="height:90px;margin-left: 225px;">
            <img src="http://tmis.nata.gov.bd/certificate/signature/{{ $session->photo }}" alt="" style="width:150px; height:80px;margin-top:5px">
            <img src="http://tmis.nata.gov.bd/certificate/signature/{{ $session->dg_photo }}" alt="" style="margin-left:325px;margin-top:5px; width:150px; height:80px;">

        </div>
        <div style="height:90px;margin-left: 225px;">
            <p><strong>{{ $session->coor_text }}</strong></p>
            <p></p>
        </div>
    </div>




</body>

</html>